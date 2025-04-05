<?php

namespace App\Http\Controllers;

class FrontEndController extends Controller
{
    public function index() {
        return view('index');
    }
}
