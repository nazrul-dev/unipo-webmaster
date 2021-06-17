<?php
namespace App\Http\Livewire\Backends;

use App\Models\Album as Models;
use Illuminate\Support\Facades\Storage;

class Album extends Base
{
    public $oldthumb = '';
    public $name, $content, $thumb;

    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'content' => 'required|max:200',
            'thumb' => $this->Mode == 'Add' ? 'required|image|mimes:jpg,png,jpeg,gif' : 'image|mimes:jpg,png,jpeg,gif'
        ];
    }



    protected function resetFields()
    {
        $this->name         = '';
        $this->content      = '';
        $this->thumb        = '';
        $this->oldthumb     = '';
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = $this->checkRow($id, 'App\Models\Album');
        if ($data) {
            $this->name             = $data->name;
            $this->content          = $data->content;
            $this->oldthumb         = $data->thumb;
            $this->Mode             = 'Edit';
            $this->globalIds        = $id;
        }
    }

    public function show($id)
    {
        $this->resetFields();
        $row = $this->checkRow($id, 'App\Models\Album');
        if ($row) {
            $this->name             = $row->name;
            $this->content          = $row->content;
            $this->thumb            = $row->thumb;
            $this->Mode             = 'Show';
            $this->globalIds        = $id;
        }
    }

    public function store()
    {
        $this->validate();
        $thumb = $this->thumb->store('facilities');
        Models::create([
            'name' => $this->name,
            'content' => $this->content,
            'thumb' => $thumb,
        ]);

        $this->Mode        = 'Data';
        $this->notif('success', 'Berhasil Melakukan Penambahan Album.');
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $row = $this->checkRow($this->globalIds, 'App\Models\Album');
        if ($row) {
            if ($this->thumb) {
                Storage::delete($row->thumb);
                $thumb = $this->thumb->store('Album');
            }

            $row->update([
                'name'          => $this->name,
                'content'         => $this->content,
                'thumb'          => $thumb ?? $row->thumb,
            ]);

            $this->Mode         = 'Data';
            $this->notif('success', 'Berhasil Melakukan Perubahan Album.');
            $this->resetFields();
        }
    }


    public function destroy($id)
    {
        $this->triggerDestroy($id, 'App\Models\Album');
    }

    public function render()
    {
        $DataAll = Models::withCount('galeries')->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.backends.album', compact('DataAll'));
    }
}

