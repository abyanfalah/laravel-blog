<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('dashboard.post.index', [
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
        return view('dashboard.post.create', [
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
        $rules = [
            "title"       => "required|max:255",
            "slug"        => "required|unique:posts",
            "category_id" => "required",
            "body"        => "required"
        ];

        if ($request->file('image')) {
            $rules["image"] = "file|image|max:2048";
        }

        // validate
        $validated_data = $request->validate($rules);

        // store the image, if any
        if ($validated_data['image']) {
            $validated_data['image'] = $request->file('image')->store('post-images');
        }

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
        return view('dashboard.post.show', [
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
        return view('dashboard.post.edit', [
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
            "body"        => "required"
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = "required|unique:posts";
        }

        if ($request->file('image')) {
            $rules['image'] = "image|max:2048";
        }

        // validate
        $validated_data = $request->validate($rules);


        // store new image, if any.
        if ($validated_data['image'] ?? false) {
            $validated_data['image'] = $request->file('image')->store('post-images');

            Storage::delete($request->old_image);
        }

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

        if ($post->image) {
            Storage::delete($post->image);
        }

        return redirect('/dashboard/posts')->with('post', 'deleted');
    }

    public function slugify(Request $request)
    {
    }
}
