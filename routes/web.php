<?php

use App\Http\Controllers\MemesController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [MemesController::class, "getAllMemes"]);
Route::post('/create', [MemesController::class, "createMeme"]);