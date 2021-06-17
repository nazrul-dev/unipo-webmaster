<?php

namespace App\Http\Livewire\Backends;

use App\Models\Category as Models;


class Category extends Base
{

   
    public $name, $slug, $active;

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
        ];
    }



    protected function resetFields()
    {
        $this->name         = '';
        $this->active      = '';
        $this->slug        = '';
      
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = $this->checkRow($id, 'App\Models\Category');
        if ($data) {
            $this->name             = $data->name;
            $this->active           = $data->active;
            $this->Mode             = 'Edit';
            $this->globalIds        = $id;
        }
    }

    public function show($id)
    {
        $this->resetFields();
        $row = $this->checkRow($id, 'App\Models\Category');
        if ($row) {
            $this->name             = $row->name;
            $this->active          = $row->active;
            $this->Mode             = 'Show';
            $this->globalIds        = $id;
        }
    }

    public function store()
    {
        $this->validate();
      
        Models::create([
            'name' => $this->name,
            'active' => $this->active ? true :  false,
            'slug' => \Str::slug($this->name),
        ]);

        $this->Mode        = 'Data';
        $this->notif('success', 'Berhasil Melakukan Penambahan Kategori.');
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $row = $this->checkRow($this->globalIds, 'App\Models\Category');
        if ($row) {
           
            $row->update([
                'name'            => $this->name,
                'active'          => $this->active ?? $row->active,
            ]);

            $this->Mode         = 'Data';
            $this->notif('success', 'Berhasil Melakukan Perubahan Kategori.');
            $this->resetFields();
        }
    }


    public function destroy($id)
    {
        $this->triggerDestroy($id, 'App\Models\Category');
    }

    public function render()
    {
        $DataAll = Models::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.backends.category', compact('DataAll'));
    }
}
