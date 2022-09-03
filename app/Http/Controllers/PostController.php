<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::filter(
            request(['search', 'author', 'category'])
        )
            ->get();

        return view('posts', [
            "title" => "Blog posts",
            "posts" => $post
        ]);
    }

    public function show(Post $post)
    {


        return view('post-view', [
            "title" => $post->title,
            "post" => $post
        ]);
    }
}
