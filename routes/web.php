<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Artikel;
use App\Models\Produk;
use App\Models\Perusahaan;

Route::get('/', function () {
    $perusahaan = Perusahaan::first();
    $produk = Produk::latest()->take(3)->get();
    $artikel = Artikel::latest()->take(3)->get();
    return view('home', compact('perusahaan', 'produk', 'artikel'));
});

Route::get('/tentang', function () {
    $perusahaan = Perusahaan::first();
    return view('tentang', compact('perusahaan'));
});

Route::get('/produk', function () {
    $produk = Produk::latest()->get();
    return view('produk', compact('produk'));
});

Route::get('/artikel', function () {
    $artikel = Artikel::latest()->get();
    return view('artikel', compact('artikel'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
