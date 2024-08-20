<?php

use Illuminate\Support\Facades\Route;

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