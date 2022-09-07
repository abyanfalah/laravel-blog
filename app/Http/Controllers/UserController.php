<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return redirect()->intended('/dashboard')->with("login_message", "welcome " . auth()->user()->name);
        }

        $login_message = [
            "That was invalid credentials. Try again...",
            "C'mon, try again..",
            "You prolly forgot your credentials, bruh..."
        ];

        return back()->with("login_message", $login_message[0]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function registration_page()
    {
        return view('registration', [
            "title" => 'registration'
        ]);
    }

    public function registration(Request $request)
    {

        $validated_data = $request->validate([
            "name" => "required|max:255",
            "username" => "required|unique:users|min:4|max:128",
            "email" => "required|unique:users|email",
            "password" => "required|min:8|max:64"
        ]);

        User::create($validated_data);

        return redirect('/login')->with('login_message', "You've been registered, now try login :)");
    }
}
