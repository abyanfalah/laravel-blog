<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            "title" => "categories",
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create', [
            "title" => "new category"
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
            "name" => "required|max:64",
            "slug" => "required|unique:categories"
        ];

        if ($request->file('image')) {
            $rules['image'] = "image|max:2048";
        }

        $validated_data = $request->validate($rules);

        // store image, if any
        if ($validated_data['image'] ?? false) {
            $validated_data['image'] = $request->file('image')->store('category-images');
        }

        Category::create($validated_data);

        return redirect('/dashboard/categories')->with('category', 'created');
    }

    /**new
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            "title" => "edit category",
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            "name" => "required|max:64",
        ];

        // new slug should be unique
        if ($request->slug != $category->slug) {
            $rules['slug'] = "required|unique:categories";
        }

        if ($request->file('image')) {
            $rules['image'] = "image|max:2048";
        }

        $validated_data = $request->validate($rules);

        // store image, if any
        if ($validated_data['image'] ?? false) {
            $validated_data['image'] = $request->file('image')->store('category-images');
        }

        $category->update($validated_data);

        return redirect('/dashboard/categories')->with('category', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/dashboard/categories')->with("category", "deleted");
    }
}
