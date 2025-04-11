<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerForm() {
        $context = [
            "title"=> "Register"
        ];
        return view('register', $context);
    }

    public function register(Request $request) {
        $request->validate([
            "name"=>"required|string|max:255",
            "email"=>"required|string|email|max:255|unique:users",
            "password"=>"required|string|min:8"
        ]);

        $user = User::create(
            [
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password
            ]
        );

        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('index');
    }

    public function loginForm() {
        $context = [
            "title"=>"login"
        ];
        return view('login', $context);
    }

    public function login(Request $request) {
      
        $request->validate([
            "name"=>"required|string|max:255",
            "email"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "password"=>"nullable|string"
        ]);
    }

    public function logout() {
        return "Saiu da conta";
    }
}
