<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\{
    Home,
};

use App\Http\Livewire\Frontend\Tentang\{
    VisiMisi,
    Fasilitas,
    Organizes
};

use App\Http\Livewire\Frontend\Post\{
    All,
    Read,
 
};
use App\Http\Livewire\Frontend\Akademik\{
   Faculty
};
use App\Http\Livewire\Frontend\Media\{
    Album,
    Galery
 };
Route::name('frontend.')->group(function () {
    Route::get('/',  Home::class)->name('home');
    Route::get('artikel/{post:slug}',  Read::class)->name('post.read');
    Route::get('artikel', All::class)->name('post.all');
    Route::get('tentang/visi-misi',  VisiMisi::class)->name('tentang.visimisi');
    Route::get('tentang/fasilitas',  Fasilitas::class)->name('tentang.fasilitas');
    Route::get('tentang/struktur-organisasi',  Organizes::class)->name('tentang.organizer');
    Route::get('fakultas',  Faculty::class)->name('fakultas');
    Route::get('album-galeri',  Album::class)->name('album');
    Route::get('album/{album}',  Galery::class)->name('galery');
});