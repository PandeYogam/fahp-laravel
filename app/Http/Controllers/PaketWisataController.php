<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaketWisata;
use App\Models\Post;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        $paketWisata = PaketWisata::all();
        $wisata = Post::all();

        // dd($paketWisata);
        return view('paketwisata.index', [
            "active" => 'paketwisata',
            "paketWisata" => $paketWisata,
            "posts" => $wisata,
            'categories' => Category::all()
        ]);
    }

    public function show($slug)
    {
        $paketWisata = PaketWisata::where('slug', $slug)->firstOrFail();

        $post = Post::latest()->first();;
        return view('paketwisata.show', [
            "active" => 'paketwisata',
            "paketWisata" => $paketWisata,
            "post" => $post,
            'categories' => Category::all()
        ]);
    }
}
