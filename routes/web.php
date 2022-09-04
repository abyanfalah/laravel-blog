<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        "title" => "categories",
        "categories" => Category::all()
    ]);
});

Route::get('/authors', function () {
    return view('authors', [
        "title" => "authors",
        "authors" => User::all()
    ]);
});

Route::get('/login', [UserController::class, 'login_page']);


Route::get('/testpage', function () {
    return dd(request());
});
