<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Album;
use App\Models\Faculty;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
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
        ]))->layout('layouts.frontend');
    }
}
