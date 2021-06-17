<?php

namespace App\Http\Livewire\Backends;

use App\Models\Faculty as Models;
use Illuminate\Support\Facades\Storage;

class Faculty extends Base
{

    public $oldlogo = '';
    public $name, $alias, $active,  $logo;

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'alias' => 'required|max:10',
            'logo' => $this->Mode == 'Add' ? 'required|image|mimes:jpg,png,jpeg,gif' : 'image|mimes:jpg,png,jpeg,gif'
        ];
    }



    protected function resetFields()
    {
        $this->name = '';
        $this->alias     = '';
        $this->active      = '';
        $this->logo       = '';
        $this->oldlogo = '';
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = $this->checkRow($id, 'App\Models\Faculty');
        if ($data) {
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
        $row = $this->checkRow($id, 'App\Models\Faculty');
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
            'name' => $this->name,
            'alias' => $this->alias,
            'active' => $this->active ?? false,
            'logo' => $logo,
        ]);

        $this->Mode        = 'Data';
        $this->notif('success', 'Berhasil Melakukan Penamabahan Fakultas.');
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $row = $this->checkRow($this->globalIds, 'App\Models\Faculty');
        if ($row) {
            if ($this->logo) {
                Storage::delete($row->logo);
                $logo = $this->logo->store('logo');
            }

            $row->update([
                'name'          => $this->name,
                'alias'         => $this->alias,
                'active'        => $this->active ?? false,
                'logo'          => $logo ?? $row->logo,
            ]);

            $this->Mode         = 'Data';
            $this->notif('success', 'Berhasil Melakukan Perubahan Fakultas.');
            $this->resetFields();
        }
    }


    public function destroy($id)
    {
        $this->triggerDestroy($id, 'App\Models\Faculty');
    }

    public function render()
    {
        $DataAll = Models::withCount('prodis')->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.backends.faculty', compact('DataAll'));
    }
}
