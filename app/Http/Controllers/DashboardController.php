<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard",

        ]);
    }

    public function posts()
    {
        return view('dashboard.posts', [
            "title" => "My posts",
            "posts" => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
