<?php

use App\Http\Controllers\MemesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MemesController::class, "index"])->name('index');
Route::post('/create', [MemesController::class, "createMeme"])->name('createMeme');

Route::put('/api/update/{id}', [MemesController::class, "updateMeme"]);
Route::delete('/api/delete/{id}', [MemesController::class, "delMeme"]);
Route::post('/api/liked/{id}', [MemesController::class, "addLike"]);
Route::post('/api/disliked/{id}', [MemesController::class, "removeLike"]);
