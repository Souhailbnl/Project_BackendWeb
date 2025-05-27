<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔍 Publiek profiel bekijken (bv. /profiel/1)
Route::get('/profiel/{user}', [ProfileController::class, 'show'])->name('profile.show');

// ✏️ Profiel bewerken (alleen voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profiel', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profiel', [ProfileController::class, 'update'])->name('profile.update');
});

use App\Http\Controllers\Admin\NewsController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('nieuws', NewsController::class);
});


use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('faq-categorieen', FaqCategoryController::class);
    Route::resource('faq-vragen', \App\Http\Controllers\Admin\FaqItemController::class);
});

use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


require __DIR__.'/auth.php';

