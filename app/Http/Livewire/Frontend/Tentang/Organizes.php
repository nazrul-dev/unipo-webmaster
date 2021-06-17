<?php

namespace App\Http\Livewire\Frontend\Tentang;
use App\Http\Livewire\Frontend\Base;


class Organizes extends Base
{
    public function render()
    {
        return view('livewire.frontend.tentang.organizes')->layout($this->layouts);
    }
}
