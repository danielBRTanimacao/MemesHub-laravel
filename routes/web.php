<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MemesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontEndController::class, "index"]);

Route::get('/api', [MemesController::class, "getAllMemes"]);
Route::post('/api/create', [MemesController::class, "createMeme"]);
Route::put('/api/update/{id}', [MemesController::class, "updateMeme"]);
Route::delete('/api/delete/{id}', [MemesController::class, "delMeme"]);