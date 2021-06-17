<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPathThumbAttribute(){
        if(Storage::exists($this->thumb)){
            return Storage::url($this->thumb);
        }
        return Storage::url('img/noimage.jpg');
    }

    public function galeries(){
        return $this->hasMany(Galery::class);
    }
}
