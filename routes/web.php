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


require __DIR__.'/auth.php';

