<?php

namespace App\Http\Livewire\Frontend\Akademik;

use App\Http\Livewire\Frontend\Base;


class Faculty extends Base
{
    public function render()
    {
        return view('livewire.frontend.akademik.faculty')->layout($this->layouts);
    }
}
