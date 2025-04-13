<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemesController extends Controller
{

    public function createMeme(Request $request) {

        $request->validate([
            "name"=>"required|string|max:255",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "description"=>"nullable|string"
        ]);

        $path = $request->file('image')->store('images', 'public');

        Meme::create(
            [
                "user_id"=> Auth::id(),
                "name"=> $request->name,
                "image"=> str_replace('public/', '', $path),
                "description"=> $request->description,
            ]
        );
        
        return redirect()->route('index');
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

    public function removeLike($id) {
        $meme = Meme::findOrFail($id);
        $meme->likes = max(0, $meme->likes - 1);
        $meme->save();

        return response()->json(['success' => true, 'likes' => $meme->likes]);
    }

    public function addLike($id) {
        $meme = Meme::findOrFail($id);
        $meme->likes += 1;
        $meme->save();

        return response()->json(['success' => true, 'likes' => $meme->likes]);
    }
}
