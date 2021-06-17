<?php

namespace App\Http\Livewire\Frontend\Post;
use App\Http\Livewire\Frontend\Base;
use App\Models\Post;

class Read extends Base
{
    public Post $post;
    public function render()
    {
        $post = $this->post;
        return view('livewire.frontend.post.read', compact('post'))->layout($this->layouts);
    }
}
