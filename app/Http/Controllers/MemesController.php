<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class MemesController extends Controller
{
    public function index() {
        $memes = Meme::all();
        $context = [
            "memes"=>$memes
        ];
        
        return view('index', $context);
    }

    public function createMeme(Request $request) {

        $request->validate([
            "name"=>"required|string|max:255",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "description"=>"nullable|string"
        ]);

        $path = $request->file('image')->store('public/images');

        $meme = Meme::create(
            [
                "name"=> $request->name,
                "image"=> str_replace('public/', '', $path),
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

    public function updateMeme(Request $request, $id) {
        $request->validate([
            "name"=>"string|max:255",
            "image"=>"string|max:255",
            "description"=>"nullable|string"
        ]);

        $meme = Meme::findOrFail($id);

        $meme->update($request->all());

        return response()->json(
            ["message"=>"meme foi modificado"], 201
        );
    }

    public function delMeme($id) {
        $meme = Meme::findOrFail($id);

        $meme->destroy($id);
        return response()->json(["message"=>"Meme deletado com sucesso!", "meme"=> $meme], 201);
    }

    public function addLike($id) {
        $meme = Meme::findOrFail($id);
        $meme->update(['likes'=> $meme['likes'] + 1]);

        return response()->json(["message"=>"Like no post!", "meme"=> $meme], 201);
    }

    public function removeLike($id) {
        $meme = Meme::findOrFail($id);
        $meme->update(['likes'=> $meme['likes'] - 1]);

        return response()->json(["message"=>"Like removido no post!", "meme"=> $meme], 201);
    }
}
