<?php

use App\Http\Controllers\Api\PostAnalyticsController;
use App\Livewire\Antrenamente;
use App\Livewire\Blog\Index as BlogIndex;
use App\Livewire\Blog\Show as BlogShow;
use App\Livewire\Competitii;
use App\Livewire\Contact;
use App\Livewire\Echipa;
use App\Livewire\Galerie;
use App\Livewire\PrimaPagina;
use App\Livewire\Sponsori;
use Illuminate\Support\Facades\Route;

Route::livewire('/', PrimaPagina::class)->name('prima-pagina');
Route::livewire('/antrenamente', Antrenamente::class)->name('antrenamente');
Route::livewire('/galerie', Galerie::class)->name('galerie');
Route::livewire('/competitii', Competitii::class)->name('competitii');
Route::livewire('/sponsori', Sponsori::class)->name('sponsori');
Route::livewire('/echipa', Echipa::class)->name('echipa');
Route::livewire('/contact', Contact::class)->name('contact');

Route::livewire('/blog', BlogIndex::class)->name('blog.index');
Route::livewire('/blog/{slug}', BlogShow::class)->name('blog.show');

// API Routes for Post Analytics
Route::prefix('api/posts/{post}')->group(function () {
    Route::post('/track-share', [PostAnalyticsController::class, 'trackShare']);
    Route::post('/track-time', [PostAnalyticsController::class, 'trackTime']);
    Route::get('/stats', [PostAnalyticsController::class, 'getStats']);
});
