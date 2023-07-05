<?php

use App\Models\Post;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DssController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardPackageController;
use App\Http\Controllers\DashboardSubkriteriaController;

// public

Route::get('/', [HomeController::class, 'index']);

Route::resource('/paketwisata', PaketWisataController::class);

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
Route::post('/dss', [DssController::class, 'store']);
Route::prefix('dss')->group(function () {
    Route::get('/rekomendasi', [DssController::class, 'rekomendasi']);
    Route::get('/calculate', [DssController::class, 'calculate']);
    // Rute lainnya di dalam DssController
});

// Route::get('/calculate', [DssController::class, 'calculate']);
// Route::get('/rekomendasi', [DssController::class, 'rekomendasi']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'posts' => Post::Where('user_id', auth()->user()->id)->get()
    ]);
})->middleware('auth');

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => 'category',
        'categories' => Category::all()
    ]);
});

Route::get('/dashboard/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
// Route::get('/dashboard/checkSlug', [DashboardPackageController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/paketwisata', DashboardPackageController::class)
    ->middleware('auth')
    ->only(['index', 'create', 'store', 'edit', 'update', 'show']);

Route::delete('/dashboard/paketwisata/{paketwisata}', [DashboardPackageController::class, 'destroy'])->name('dashboard.paketwisata.destroy');

Route::resource('/dashboard/subkriteria', DashboardSubkriteriaController::class)->middleware('auth');

Route::middleware(['admin'])->group(function () {
    Route::resource('dashboard/categories', AdminCategoryController::class);
    Route::get('/dashboard/categories', [AdminCategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('dashboard/categories/edit/{category:slug}', [AdminCategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::get('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'show'])->name('dashboard.categories.show');
    Route::delete('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->middleware('admin')->name('dashboard.categories.destroy');
    Route::put('dashboard/categories/update/{category:slug}', [AdminCategoryController::class, 'update'])->name('dashboard.categories.update');
});

Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');
