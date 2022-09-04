<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::filter(
            request(['search', 'author', 'category'])
        );

        $filtered = [];
        if (request('author')) {
            $filtered["author"] = User::where('username', request('author'))->value('name');
        }

        if (request('category')) {
            $filtered["category"] = Category::where('slug', request('category'))->value('name');
        }

        return view('posts', [
            "title" => "Blog posts",
            "posts" => $posts->get(),
            "filtered" => $filtered
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
