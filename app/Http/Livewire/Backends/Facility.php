<?php

namespace App\Http\Livewire\Backends;

use App\Models\Facility as Models;
use Illuminate\Support\Facades\Storage;

class Facility extends Base
{

    public $oldimage = '';
    public $name, $content, $image;

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'content' => 'required|max:200',
            'image' => $this->Mode == 'Add' ? 'required|image|mimes:jpg,png,jpeg,gif' : 'image|mimes:jpg,png,jpeg,gif'
        ];
    }



    protected function resetFields()
    {
        $this->name         = '';
        $this->content      = '';
        $this->image        = '';
        $this->oldimage     = '';
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = $this->checkRow($id, 'App\Models\Facility');
        if ($data) {
            $this->name             = $data->name;
            $this->content          = $data->content;
            $this->oldimage         = $data->image;
            $this->Mode             = 'Edit';
            $this->globalIds        = $id;
        }
    }

    public function show($id)
    {
        $this->resetFields();
        $row = $this->checkRow($id, 'App\Models\Facility');
        if ($row) {
            $this->name             = $row->name;
            $this->content          = $row->content;
            $this->image            = $row->image;
            $this->Mode             = 'Show';
            $this->globalIds        = $id;
        }
    }

    public function store()
    {
        $this->validate();
        $image = $this->image->store('facilities');
        Models::create([
            'name' => $this->name,
            'content' => $this->content,
            'image' => $image,
        ]);

        $this->Mode        = 'Data';
        $this->notif('success', 'Berhasil Melakukan Penambahan Fasilitas.');
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $row = $this->checkRow($this->globalIds, 'App\Models\Facility');
        if ($row) {
            if ($this->image) {
                Storage::delete($row->image);
                $image = $this->image->store('image');
            }

            $row->update([
                'name'          => $this->name,
                'content'         => $this->content,
                'image'          => $image ?? $row->image,
            ]);

            $this->Mode         = 'Data';
            $this->notif('success', 'Berhasil Melakukan Perubahan Fasilitas.');
            $this->resetFields();
        }
    }


    public function destroy($id)
    {
        $this->triggerDestroy($id, 'App\Models\Facility');
    }

    public function render()
    {
        $DataAll = Models::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.backends.facility', compact('DataAll'));
    }
}
