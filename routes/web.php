<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/home', [FrontendController::class, 'index']);
Route::get('/categories/{id}', [FrontendController::class, 'onKategori'])->name('onKategori');
Route::get('/search', [ArtikelController::class, 'search'])->name('search');
Route::get('/detail-artikel/{slug}', [FrontendController::class, 'detail'])->name('detail-artikel');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('kategori', KategoriController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('slides', SlidesController::class);
Route::resource('komentar', CommentController::class);
Route::post('/reply', [ReplyController::class, 'store'])->name('reply.store');


// Login and Register routes without guest middleware
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

// Logout route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Other authentication-related routes (password reset, email verification, etc.)
Auth::routes();