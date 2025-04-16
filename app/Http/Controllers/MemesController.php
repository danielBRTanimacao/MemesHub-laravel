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
            "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "description"=>"nullable|string"
        ]);

        $path = $request->file('image')->store('images', 'public');

        $meme = Meme::findOrFail($id);

        $meme->update([
            "name"=>"string|max:255",
            "image"=>str_replace('public/', '', $path),
            "description"=>"nullable|string"
        ]);

        return redirect()->route('index');
    }

    public function delMeme($id) {
        $meme = Meme::findOrFail($id);

        $meme->destroy($id);
        return redirect()->route('index');
    }

    public function removeLike($id) {
        $meme = Meme::findOrFail($id);
        $meme->likes = max(0, $meme->likes - 1);
        $meme->save();

        return response()->json(['success' => true, 'likes' => $meme->likes]);
    }

    public function addLike(Meme $meme) {
        $meme->increment('likes');

        return response()->json(['success' => true, 'likes' => $meme->likes]);
    }
}
