<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post', function () {
    return response()->json([
        "data" => Post::all(),
        "status" => 200
    ]);
});

Route::get('/user', function () {
    return User::all();
});

Route::get('/category', function () {
    return Category::all();
});

Route::get('/user/{user:username}', function (User $user) {
    return $user;
});

Route::get('/post/{post:slug}', function (Post $post) {
    return $post;
});

Route::get('/category/{category:slug}', function (Category $category) {
    return $category;
});
