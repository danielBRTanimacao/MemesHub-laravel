<?php

namespace App\Http\Controllers;

use App\Models\Meme;

class FrontEndController extends Controller
{
    public function index() {
        $memes = Meme::all();
        $context = [
            "memes"=>$memes
        ];
        
        return view('index', $context);
    }
}
