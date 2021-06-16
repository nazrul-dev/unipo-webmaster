<?php


use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('home');



require_once __DIR__.'/auth.php';
require_once __DIR__.'/frontend.php';
require_once __DIR__.'/backend.php';
