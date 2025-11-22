<?php

use App\Livewire\Antrenamente;
use Illuminate\Support\Facades\Route;
use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Show as BlogShow;
use App\Livewire\Competitii;
use App\Livewire\Contact;
use App\Livewire\Echipa;
use App\Livewire\Galerie;
use App\Livewire\PrimaPagina;
use App\Livewire\Sponsori;
use App\Http\Controllers\Api\PostAnalyticsController;

Route::get('/', PrimaPagina::class)->name('prima-pagina');
Route::get('/antrenamente', Antrenamente::class)->name('antrenamente');
Route::get('/galerie', Galerie::class)->name('galerie');
Route::get('/competitii', Competitii::class)->name('competitii');
Route::get('/sponsori', Sponsori::class)->name('sponsori');
Route::get('/echipa', Echipa::class)->name('echipa');
Route::get('/contact', Contact::class)->name('contact');




Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/{slug}', BlogShow::class)->name('blog.show');

// API Routes for Post Analytics
Route::prefix('api/posts/{post}')->group(function () {
    Route::post('/track-share', [PostAnalyticsController::class, 'trackShare']);
    Route::post('/track-time', [PostAnalyticsController::class, 'trackTime']);
    Route::get('/stats', [PostAnalyticsController::class, 'getStats']);
});