<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function getPostImageAttribute(){
        if(Storage::exists($this->image)){
            return Storage::url($this->image);
        }
        return Storage::url('img/noimage.jpg');
        
       
    }
}
