<?php

use App\Http\Controllers\MemesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, "index"])->name('index')->middleware('auth');
Route::get('/user/{username}', [UserController::class, "userView"])->name('userView')->middleware('auth');
Route::get('/login', [UserController::class, "loginForm"])->name('loginForm')->middleware('guest');
Route::post('/login', [UserController::class, "login"])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, "registerForm"])->name('registerForm')->middleware('guest');
Route::post('/register', [UserController::class, "register"])->name('register')->middleware('guest');
Route::get('/update/{id}/{username}', [UserController::class, "updateForm"])->name('updateForm')->middleware('auth');
Route::put('/update/{id}/{username}', [UserController::class, "update"])->name('update')->middleware('auth');
Route::get('/logout', [UserController::class, "logout"])->name('logout')->middleware('auth');

Route::post('/create', [MemesController::class, "createMeme"])->name('createMeme');
Route::put('/update/{id}', [MemesController::class, "updateMeme"])->name('updateMeme');
Route::delete('/delete/{id}', [MemesController::class, "delMeme"])->name('delMeme');

Route::post('/api/liked/{meme}', [MemesController::class, "addLike"]);
Route::post('/api/disliked/{meme}', [MemesController::class, "removeLike"]);
