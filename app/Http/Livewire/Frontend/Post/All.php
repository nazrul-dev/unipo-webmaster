<?php

namespace App\Http\Livewire\Frontend\Post;
use App\Http\Livewire\Frontend\Base;
use App\Models\Post;

class All extends Base
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {   
        $posts = Post::where('title', 'like', '%'.$this->search.'%')->where('publish', true)->paginate(10);
        return view('livewire.frontend.post.all',compact([
            'posts'
        ]))->layout($this->layouts);
    }
}
