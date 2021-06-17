<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Album;
use App\Models\Faculty;
use App\Models\Post;


class Home extends Base
{
    public $activeSlide = 1;
    public function render()
    {
        $sliders = Post::where([
            'slider' => true,
            'publish' => true,
        ])->latest()->limit(5)->get();
        $posts = Post::where('publish', true)->latest()->get();
        $faculties = Faculty::latest()->get();
        $albums = Album::latest()->limit(6)->get();
        return view('livewire.frontend.home', compact([
            'posts',
            'faculties',
            'albums',
            'sliders'
        ]))->layout($this->layouts);
    }
}
