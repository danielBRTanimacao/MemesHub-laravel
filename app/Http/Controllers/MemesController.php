<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class MemesController extends Controller
{
    public function getAllMemes() {
        $memes = Meme::all();

        return $memes->toArray();
    }

    public function createMeme(Request $request) {

        $request->validate([
            "name"=>"required|string|max:255",
            "image"=>"required|string|max:255",
            "description"=>"nullable|string"
        ]);

        $meme = Meme::create(
            [
                "name"=> $request->name,
                "image"=> $request->image,
                "description"=> $request->description,
            ]
        );
        
        return response()->json(
            [
                "message"=>"meme criado com sucesso!", 
                "meme"=>$meme
            ], 201
        );
    }
}
