<?php

namespace App\Http\Livewire\Backends;

use App\Models\Post as ModelsPost;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    use WithFileUploads;
    public $search;
    public $readyToLoad = false;
    protected $queryString = ['search'];
    public $Mode = 'Data';
    public $ids;
    public $tempImage = '';
    public $category_id, $publish, $slider, $content = '',  $image, $title;


  

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }


    protected function rules()
    {
        return [
            'title' => 'required|min:6',
            'content' => 'required|min:150',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif' 
        ];
    }

    public function updatedImage()
    {
        if(in_array($this->image->getClientOriginalExtension(), ['jpg', 'png', 'jpeg', 'gif'])){
            if ($this->Mode == 'Edit') {
                $this->tempImage = $this->image->temporaryUrl();
            }
           
        }else{
    
            $this->tempImage = '';
        }
       
    }


    protected function resetFields()
    {
       
        $this->category_id = '';
        $this->publish     = '';
        $this->slider      = '';
        $this->content     = '';
        $this->image       = '';
        $this->title       = '';
    }

    public function edit($id)
    {
        $this->resetFields();
        $data = ModelsPost::find($id);
        $this->category_id = $data->category_id;
        $this->publish     = $data->publish;
        $this->slider      = $data->slider;
        $this->content     = $data->content;
        $this->image       = $data->postimage;
        $this->title       = $data->title;
        $this->Mode        = 'Edit';
        $this->ids         = $id;
    }

    public function show($id)
    {
        $this->resetFields();
        $data = ModelsPost::find($id);
        $this->category_id = $data->category_id;
        $this->publish     = $data->publish;
        $this->slider      = $data->slider;
        $this->content     = $data->content;
        $this->image       = $data->postimage;
        $this->title       = $data->title;
        $this->Mode        = 'Show';
        $this->ids         = $id;
    }

    public function store()
    {
        $this->validate();
        $image = $this->image->store('image');
    
        ModelsPost::create([
            'slug' => \Str::slug($this->title),
            'title' => $this->title,
            'content' => $this->content,
            'publish' => $this->publish ?? false,
            'slider' => $this->slider ?? false,
            'category_id' =>  $this->category_id ?? 1,
            'user_id' => auth()->id(),
            'image' => $image,
            
        ]);

        $this->Mode        = 'Data';
        $this->resetFields();
    }

    public function update()
    {
        $this->validate();
        $post =  ModelsPost::find($this->ids);
        $image = $post->postimage;

        if ($post->postimage !== $this->image) {
            Storage::delete($post->image);
            $image = $this->image->store('image');
        }

       

        $post->update([
            'title' => $this->title,
            'content' => $this->content,
            'publish' => $this->publish ?? false,
            'slider' => $this->slider ?? false,
            'category_id' =>  $this->category_id ?? 1,
            'user_id' => auth()->id(),
            'image' => $image,
        ]);

        $this->Mode        = 'Data';
        $this->resetFields();
    }
    public function updatedMode(){
        $this->resetFields();
     
    }
    public function render()
    {
        $DataAll = $this->readyToLoad ? ModelsPost::where('title', 'like', '%'.$this->search.'%')->paginate(10) : [];
        return view('livewire.backends.post', compact('DataAll'));
    }
}
