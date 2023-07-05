<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search'));

        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }

        if (request('admin')) {
            $admin = User::firstWhere('username', request('admin'));
            $title = 'by ' . $admin->name;
        }

        $totalPosts = Post::filter(request(['search', 'admin', 'category']))->paginate(7);
        $totalPostsCount = $totalPosts->total();

        return view('posts', [
            "title" => "All Posts " . $title,
            "active" => 'posts',
            "total_posts_count" => $totalPostsCount,
            "posts" => Post::withCount('comments')->latest()->filter(request(['search', 'admin', 'category']))->paginate(7)->withQueryString(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {

        dd($post);
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post,
            'categories' => Category::all()
        ]);
    }
}
