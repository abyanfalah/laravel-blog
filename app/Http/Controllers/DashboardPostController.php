<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts', [
            "title" => "My posts",
            "posts" => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post-create', [
            "title" => "New post",
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            "title"       => "required|max:255",
            "slug"        => "required|unique:posts",
            "category_id" => "required",
            "body"        => "required"
        ]);
        $validated_data['user_id'] = auth()->user()->id;

        $excerpt = strip_tags($validated_data['body']);
        $excerpt = Str::limit($excerpt, 200, '...');
        $validated_data['excerpt'] = $excerpt;

        Post::create($validated_data);


        return redirect('/dashboard/posts')->with('post', 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post-view', [
            "title" => "My post",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post-edit', [
            "title" => "Edit post",
            "categories" => Category::all(),
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            "title"       => "required|max:255",
            "category_id" => "required",
            "slug"        => "required",
            "body"        => "required"
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = "required|unique:posts";
        }

        $validated_data = $request->validate($rules);

        $excerpt = strip_tags($validated_data['body']);
        $excerpt = Str::limit($excerpt, 200, '...');
        $validated_data['excerpt'] = $excerpt;

        $post->update($validated_data);

        return redirect('/dashboard/posts')->with('post', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard/posts')->with('post', 'deleted');
    }

    public function slugify(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
