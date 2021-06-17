<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Faculty extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function prodis(){
        return $this->belongsTo(Prodi::class, 'id', 'faculty_id');
    }

    public function getPathLogoAttribute(){
        if(Storage::exists($this->logo)){
            return Storage::url($this->logo);
        }
        return Storage::url('img/noimage.jpg');
        
       
    }

}
