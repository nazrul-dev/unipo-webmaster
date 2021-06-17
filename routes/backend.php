<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backends\{
    Post,
    Category,
    Album,
    Galery,
    Institution,
    Setting,
    Faculty,
    Prodi,
    Facility,
    File,
    Page,
    Link,
    Social,
    Slider,
    Widget,
    Employee,
    Event,
    Dapartement,
    Dashboard,
};


Route::prefix('backend')->name('backend.')->middleware(['auth'])->group(function () {

    Route::get('/',  Dashboard::class)->name('Dashboard');

    Route::get('Post',  Post::class)->name('Post');

    Route::get('Category',  Category::class)->name('Category');

    Route::get('Album',  Album::class)->name('Album');

    Route::get('Galery/{album}',  Galery::class)->name('Galery');

    Route::get('Institution',  Institution::class)->name('Institution');

    Route::get('Setting',  Setting::class)->name('Setting');

    Route::get('Faculty',  Faculty::class)->name('Faculty');

    Route::get('Prodi',  Prodi::class)->name('Prodi');

    Route::get('Facility',  Facility::class)->name('Facility');

    Route::get('File',  File::class)->name('File');

    Route::get('Page',  Page::class)->name('Page');

    Route::get('Link',  Link::class)->name('Link');

    Route::get('Social',  Social::class)->name('Social');

    Route::get('Slider',  Slider::class)->name('Slider');

    Route::get('Widget',  Widget::class)->name('Widget');

    Route::get('Employee',  Employee::class)->name('Employee');

    Route::get('Event',  Event::class)->name('Event');

    Route::get('Dapartement',  Dapartement::class)->name('Dapartement');
});
