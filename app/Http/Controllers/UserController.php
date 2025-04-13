<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $memes = Meme::all();
        $context = [
            "title"=> "index",
            "memes"=>$memes
        ];
        
        return view('index', $context);
    }

    public function userView($username) {
        $memes = Meme::all();
        $context = [
            "title"=> $username,
            "memes"=> $memes
        ];
        return view('user', $context);
    }

    public function registerForm() {
        $context = [
            "title"=> "Register",
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
        $credentials = $request->validate([
            "name"=>"required|string|max:255",
            "password"=>"required|string|min:8"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }
    }

    public function updateForm($id, $username) {
        $context = [
            "title"=>"Update $username"
        ];

        if (Auth::user()->id == $id) {
            return view('update', $context);
        }
        return redirect()->route('index');
    }

    public function update(Request $request, $id, $username) {
        $user = Auth::user();

        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users,email," . $id,
            "password" => "required|string|min:8|same:password_confirm",
        ]);

        if ($user->id == $id) {
            DB::table('users')->where('id', $user->id)->update(
                [
                    'name'=>$request->input('name'),
                    'email'=>$request->input('email'),
                    'password'=>bcrypt($request->password)
                ]
            );

            return redirect()->route('index');
        }
        return redirect()->route('index');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
