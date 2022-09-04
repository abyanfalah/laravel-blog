<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {
        $validated_credentials = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($validated_credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with("login_message", "welcome " . auth()->user()->name);
        }

        $login_message = [
            "That was invalid credentials. Try again...",
            "C'mon, try again..",
            "You prolly forgot your credentials, bruh..."
        ];

        return back()->with("login_message", $login_message[0]);
    }
}
