<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rolunk', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/egyesuletek', [HomeController::class, 'clubs'])->name('clubs');
Route::get('/szabalyzatok', [HomeController::class, 'rules'])->name('rules');
Route::get('/versenynaptar', [HomeController::class, 'calendar'])->name('calendar');
Route::get('/kapcsolat', [HomeController::class, 'contact'])->name('contact');
Route::get('/hirek', [PostController::class, 'index'])->name('posts.index');
Route::get('/hirek/{slug}', [PostController::class, 'show'])->name('posts.show');
