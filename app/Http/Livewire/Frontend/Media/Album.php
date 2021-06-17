<?php

namespace App\Http\Livewire\Frontend\Media;

use App\Http\Livewire\Frontend\Base;
use App\Models\Album as ModelsAlbum;

class Album extends Base
{
    public function render()
    {
        $albums = ModelsAlbum::withCount('galeries')->latest()->paginate(9);
        return view('livewire.frontend.media.album', compact('albums'))->layout($this->layouts);
    }
}
