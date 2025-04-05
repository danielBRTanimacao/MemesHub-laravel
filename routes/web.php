<?php

use App\Http\Controllers\MemesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MemesController::class, "getAllMemes"]);
Route::post('/create', [MemesController::class, "createMeme"]);
Route::put('/update/{id}', [MemesController::class, "updateMeme"]);
Route::delete('/delete/{id}', [MemesController::class, "delMeme"]);