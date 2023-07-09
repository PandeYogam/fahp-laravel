<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category1 = Category::find(5); // Ambil record kategori dengan id 1
        $posts1 = Post::where('category_id', $category1->id)->latest()->get();

        $category2 = Category::find(4); // Ambil record kategori dengan id 1
        $posts2 = Post::where('category_id', $category2->id)->latest()->get();

        $category3 = Category::find(3); // Ambil record kategori dengan id 1
        $posts3 = Post::where('category_id', $category3->id)->latest()->get();

        // dd($posts2);
        // dd($posts1);
        return view('home', [
            "title" => "home",
            'categories' => Category::all(),
            "active" => 'index',
            "total_posts" => Post::all(),
            "post_1" => $posts1,
            "post_2" => $posts2,
            "post_3" => $posts3,

            // "posts_beach" => Post::latest()->filter(''),
        ]);
    }
}
