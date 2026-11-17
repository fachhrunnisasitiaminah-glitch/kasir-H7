<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('/sapa', function () {
    return 'Halo, kelompok 6!';
});

Route::get('/katalog',
    [KatalogController::class, 'index']
)->name('katalog.index');


Route::get('/katalog/{id}',
    [KatalogController::class, 'show']
)->whereNumber('id')
 ->name('katalog.show');

// /katalog/1    → detail
// /katalog/999  → 404 (tidak ada)
// /katalog/abc  → 404 (pola route)
