<?php

namespace App\Http\Livewire\Frontend\Media;

use App\Http\Livewire\Frontend\Base;
use App\Models\Album;
use App\Models\Galery as ModelsGalery;

class Galery extends Base
{
    public function mount(Album $album)
    {
        $this->album = $album;
    }

    public function render()
    {
        $galeries = ModelsGalery::where('album_id', $this->album->id)
            ->paginate(10);
        return view('livewire.frontend.media.galery', compact([
            'galeries'
        ]))->layout($this->layouts);
    }
}
