<?php

namespace App\Http\Livewire\Frontend\Tentang;
use App\Http\Livewire\Frontend\Base;

class VisiMisi extends Base
{
    public function render()
    {
        $visi = 'Pusat unggulan dalam pengembangan insani, ilmu pengetahuan, teknologi, seni, dan budaya berbasis Benua Maritim Indonesia';
        $misi = 'Menyediakan lingkungan belajar berkualitas untuk mengembangkan kapasitas pembelajar yang inovatif dan proaktif
        Melestarikan, mengembangkan, menemukan, dan menciptakan ilmu pengetahuan, teknologi, seni, dan budaya
        Menerapkan dan menyebarluaskan ilmu pengetahuan, teknologi, seni, dan budaya bagi kemaslahatan Benua Maritim Indonesia';
        return view('livewire.frontend.tentang.visi-misi',
        compact([
            'visi', 'misi'
        ]))->layout($this->layouts);
    }
}
