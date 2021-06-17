<?php

namespace App\Http\Livewire\Frontend\Tentang;
use App\Http\Livewire\Frontend\Base;
use App\Models\Facility;

class Fasilitas extends Base
{
    public function render()
    {
        $facilities = Facility::latest()->get();
        return view('livewire.frontend.tentang.fasilitas', compact([
            'facilities'
        ]))->layout($this->layouts);
    }
}
