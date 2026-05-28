<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

// Rute umum non-autentikasi
Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', function () {
    $articles = \App\Models\Article::with(['category', 'user', 'tags'])
        ->latest()
        ->paginate(9);
    return view('user.beranda', compact('articles'));
});
Route::get('/tentang', function () {
    return view('user.tentang');
});

// Rute publik untuk menampilkan detail artikel berita
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Autentikasi bawaan Laravel UI
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute Group untuk Admin (Hanya boleh diakses oleh user yang sudah Login)
Route::middleware(['auth'])->group(function () {

    
    // Halaman Utama Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUD Pengguna, Kategori & Berita
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/articles', ArticleController::class);

    Route::resource('/admin/tags', TagController::class);

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
});
