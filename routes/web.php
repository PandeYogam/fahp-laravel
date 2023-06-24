<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DssController;

// public

Route::get('/', function () {
    return view('home', [
        "title" => "home",
        'categories' => Category::all(),
        "active" => 'index',
        "total_posts" => Post::latest(),
        "posts_beach" => Post::latest()->filter(''),
        'categories' => Category::all(),
    ]);
});

Route::get('/', function () {
    $category1 = Category::find(1); // Ambil record kategori dengan id 1
    $posts1 = Post::where('category_id', $category1->id)->latest()->get();

    $category2 = Category::find(2); // Ambil record kategori dengan id 1
    $posts2 = Post::where('category_id', $category2->id)->latest()->get();

    $category3 = Category::find(3); // Ambil record kategori dengan id 1
    $posts3 = Post::where('category_id', $category3->id)->latest()->get();

    return view('home', [
        "title" => "home",
        'categories' => Category::all(),
        "active" => 'index',
        "total_posts" => Post::latest(),
        "post_1" => $posts1,
        "post_2" => $posts2,
        "post_3" => $posts3
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "Pande Yogam",
        "email" => "pandeyogam321@gmail.com",
        "image" => "pande.png",
        'categories' => Category::all(),
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => 'category',
        'categories' => Category::all()
    ]);
});

Route::get('/dss', [DssController::class, 'index']);
Route::get('/calculate', [DssController::class, 'calculate']);
Route::get('/rekomendasi', [DssController::class, 'rekomendasi']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::post('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::middleware(['admin'])->group(function () {
    Route::resource('dashboard/categories', AdminCategoryController::class);
    Route::get('/dashboard/categories', [AdminCategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('dashboard/categories/edit/{category:slug}', [AdminCategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::get('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'show'])->name('dashboard.categories.show');
    Route::delete('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->middleware('admin')->name('dashboard.categories.destroy');
    Route::put('dashboard/categories/update/{category:slug}', [AdminCategoryController::class, 'update'])->name('dashboard.categories.update');
});

Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
