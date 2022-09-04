<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    }

    public function login_page()
    {
        return view('login', [
            "title" => "Login"
        ]);
    }
}
