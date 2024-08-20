<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Show as BlogShow;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/antrenamente', function () {
    return view('antrenamente');
});
Route::get('/galerie', function () {
    return view('galerie');
});
Route::get('/competitii', function () {
    return view('competitii');
});
Route::get('/sponsori', function () {
    return view('sponsori');
});
Route::get('/echipa', function () {
    return view('echipa');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/{slug}', BlogShow::class)->name('blog.show');