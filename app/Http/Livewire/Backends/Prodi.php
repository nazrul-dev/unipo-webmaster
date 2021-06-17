<?php

namespace App\Http\Livewire\Backends;

use App\Models\Faculty;
use App\Models\Prodi as Models;
use Illuminate\Support\Facades\Storage;

class Prodi extends Base
{

    public $oldlogo = '';
    public $name, $alias, $active,  $logo, $faculty_id;

    protected function rules()
    {
        return [
            'faculty_id' => 'required',
            'name' => 'required|min:6',
            'alias' => 'required|max:10',
            'logo' => $this->Mode == 'Add' ? 'required|image|mimes:jpg,png,jpeg,gif' : 'image|mimes:jpg,png,jpeg,gif'
        ];
    }



    protected function resetFields()
    {
        $this->faculty_id   = '';
        $this->name         = '';
        $this->alias        = '';
        $this->active       = '';
        $this->logo         = '';
        $this->oldlogo      = '';
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = $this->checkRow($id, 'App\Models\Prodi');
        if ($data) {
            $this->faculty_id   = $data->faculty_id;
            $this->name         = $data->name;
            $this->alias        = $data->alias;
            $this->active       = $data->active;
            $this->oldlogo      = $data->logo;
            $this->Mode         = 'Edit';
            $this->globalIds          = $id;
        }
    }

    public function show($id)
    {
        $this->resetFields();
        $row = $this->checkRow($id, 'App\Models\Prodi');
        if ($row) {
            $this->name         = $row->name;
            $this->alias        = $row->alias;
            $this->active       = $row->active;
            $this->logo         = $row->logo;
            $this->Mode         = 'Show';
            $this->globalIds    = $id;
        }
    }

    public function store()
    {
        $this->validate();
        $logo = $this->logo->store('logo');
        Models::create([
            'faculty_id'    => $this->faculty_id,
            'name'          => $this->name,
            'alias'         => $this->alias,
            'active'        => $this->active ?? false,
            'logo'          => $logo,
        ]);

        $this->Mode        = 'Data';
        $this->notif('success', 'Berhasil Melakukan Penambahan Program Studi.');
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $row = $this->checkRow($this->globalIds, 'App\Models\Prodi');
        if ($row) {
            if ($this->logo) {
                Storage::delete($row->logo);
                $logo = $this->logo->store('logo');
            }

            $row->update([
                'faculty_id'    => $this->faculty_id,
                'name'          => $this->name,
                'alias'         => $this->alias,
                'active'        => $this->active ?? false,
                'logo'          => $logo ?? $row->logo,
            ]);

            $this->Mode         = 'Data';
            $this->notif('success', 'Berhasil Melakukan Perubahan Program Studi.');
            $this->resetFields();
        }
    }


    public function destroy($id)
    {
        $this->triggerDestroy($id, 'App\Models\Prodi');
    }

    public function render()
    {
        $DataAll = Models::with('faculty')->where('name', 'like', '%' . $this->search . '%')->paginate(10);
    
        $faculties = Faculty::where('active', true)->get();
        return view('livewire.backends.prodi', compact(['DataAll', 'faculties']));
    }
}
