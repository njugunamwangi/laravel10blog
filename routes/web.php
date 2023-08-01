<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index'])->name('home');

// site pages
Route::get('/about-us', [SiteController::class, 'about'])->name('about-us');
Route::get('/terms-and-conditions', [SiteController::class, 'terms'])->name('terms-and-conditions');
Route::get('/privacy-policy', [SiteController::class, 'privacy'])->name('privacy-policy');
Route::get('/contact-us', [SiteController::class, 'contacts'])->name('contact-us');

Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])->name('by-category');
Route::get('/location/{location:slug}', [PostController::class, 'byLocation'])->name('by-location');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('view');
