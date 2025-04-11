<?php

use App\Http\Controllers\MemesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MemesController::class, "index"])->name('index')->middleware('auth');
Route::get('/login', [MemesController::class, "login"])->name('login')->middleware('guest');
Route::get('/register', [MemesController::class, "registerForm"])->name('registerForm')->middleware('guest');
Route::post('/register', [MemesController::class, "register"])->name('register')->middleware('guest');

Route::post('/create', [MemesController::class, "createMeme"])->name('createMeme');
Route::put('/update/{id}', [MemesController::class, "updateMeme"])->name('updateMeme');
Route::delete('/delete/{id}', [MemesController::class, "delMeme"])->name('delMeme');

Route::post('/api/liked/{id}', [MemesController::class, "addLike"]);
Route::post('/api/disliked/{id}', [MemesController::class, "removeLike"]);
