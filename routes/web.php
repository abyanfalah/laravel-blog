<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\admin\DashboardPostController;
use App\Http\Controllers\admin\DashboardUserController;
use Illuminate\Support\Facades\File;

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
    return view('home', [
        "title" => "Home",
        "posts" => Post::limit(9)->latest()->get()
    ]);
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
        "title"   => "authors",
        "authors" => User::all()
    ]);
});

Route::get('/login', [UserController::class, 'login_page'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/registration', [UserController::class, 'registration_page'])->middleware('guest');
Route::post('/registration', [UserController::class, 'registration'])->middleware('guest');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/users/{user:username}/posts', [DashboardUserController::class, 'user_posts']);


// RESOURCE ===============================
Route::resource('/dashboard/posts', DashboardPostController::class)
    ->middleware('auth');

Route::resource('/dashboard/categories', CategoryController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin')
    ->except(['edit', 'update', 'store']);


// ========================================

// UTILITIES ===================================
Route::get('/utility/slugify', function () {
    $slug = SlugService::createSlug(Post::class, 'slug', request()->source);
    return response()->json(['slug' => $slug]);
});

Route::get('/testpage', function () {
    return view('modals.logout');
});
