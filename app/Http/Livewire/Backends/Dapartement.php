<?php

namespace App\Http\Livewire\Backends;

use App\Models\Dapartement as Models;


class Dapartement extends Base
{


    public $name,  $position;

    protected function rules()
    {
        return [
            'name' => 'required|min:2',
            'position' => 'required|unique:dapartements, position', 
        ];
    }



    protected function resetFields()
    {
        $this->name         = '';
        $this->position      = '';
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = $this->checkRow($id, 'App\Models\Dapartement');
        if ($data) {
            $this->name             = $data->name;
            $this->position           = $data->position;
            $this->Mode             = 'Edit';
            $this->globalIds        = $id;
        }
    }

    public function show($id)
    {
        $this->resetFields();
        $row = $this->checkRow($id, 'App\Models\Dapartement');
        if ($row) {
            $this->name              = $row->name;
            $this->position          = $row->position;
            $this->Mode              = 'Show';
            $this->globalIds         = $id;
        }
    }

    public function store()
    {
        $this->validate();

        Models::create([
            'name' => $this->name,
            'position' => $this->position,
        ]);

        $this->Mode        = 'Data';
        $this->notif('success', 'Berhasil Melakukan Penambahan Kategori.');
        $this->resetFields();
    }

    public function update()
    {
        $row = $this->checkRow($this->globalIds, 'App\Models\Dapartement');
        $this->validate([
            'name' => 'required|min:2',
            'position' => 'required|unique:dapartements, position,'  . $row->id
        ]);
        if ($row) {

            $row->update([
                'name'                  => $this->name,
                'position'              => $this->position,
            ]);

            $this->Mode         = 'Data';
            $this->notif('success', 'Berhasil Melakukan Perubahan Kategori.');
            $this->resetFields();
        }
    }


    public function destroy($id)
    {
        $this->triggerDestroy($id, 'App\Models\Dapartement');
    }

    public function render()
    {
        $DataAll = Models::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        return view('livewire.backends.dapartement', compact('DataAll'));
    }
}
