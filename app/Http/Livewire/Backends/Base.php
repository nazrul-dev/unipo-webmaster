<?php

namespace App\Http\Livewire\Backends;

use Illuminate\Database\QueryException;
use Livewire\WithFileUploads;
use Livewire\Component;

class Base extends Component
{
    use WithFileUploads;
    public $Mode = 'Data';
    public $search;
    public $globalIds, $globalModel = '';
    protected $queryString = ['search'];
    protected $listeners = [
        'confirmed',
        'cancelled',
    ];

    public function updatedMode()
    {
        $this->search = '';
        $this->resetFields();
    }


    public function notif($type, $text, $content = '')
    {
        $this->alert($type, $text, [
            'position' =>  'top-end',
            'timer' =>  3000,
            'text' =>  $content,
        ]);
    }

    public function confirmed()
    {

        $row = $this->globalModel::find($this->globalIds);
        try {
            $row->delete();
            $this->alert(
                'success',
                'Berhasil Melakukan Penghapusan Data'
            );
        } catch (QueryException $e) {
            $this->notif('error', 'Terjadi Kesalahan', $e->getMessage());
        }

        $this->resetGlobal();
    }

    public function cancelled()
    {
        $this->notif('info', 'Berhasil Membatalkan Penghapusan');
        $this->resetGlobal();
    }

    public function resetGlobal()
    {
        $this->globalModel = '';
        $this->globalIds = '';
    }

    public function triggerDestroy($ids, $model)
    {

        $row = $model::find($ids);

        if ($row) {
            $this->globalModel = $model;
            $this->globalIds = $row->id;
            $this->confirm('Penghapusan Data', [
                'toast' => false,
                'position' => 'center',
                'text' => 'Apakah Anda yakin Melakukan Penghapusan Data ini ? ',
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'onCancelled' => 'cancelled',
            ]);
        } else {
            $this->notif('error', 'Tampaknya Data Tidak Ditemukan');
        }
    }

    public function checkRow($ids, $model)
    {
        $row = $model::find($ids);
        if ($row) {
            return $row;
        }

        $this->notif('error', 'Tampaknya Data Tidak Ditemukan');
        return false;
    }
}
