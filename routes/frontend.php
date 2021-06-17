<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\{
    Home,
};
Route::name('frontend.')->group(function () {
    Route::get('/',  Home::class)->name('home');
    Route::get('tentang',  Home::class)->name('tentang');
    Route::get('artikel',  Home::class)->name('artikel');
    Route::get('fakultas',  Home::class)->name('fakultas');
    Route::get('galeri',  Home::class)->name('galeri');
    Route::get('struktur-organisasi',  Home::class)->name('struktur-organisasi');
    Route::get('kontak',  Home::class)->name('kontak');
});