<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaketWisata;
use App\Models\Paketwisata_pariwisata;
use App\Models\Post;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        $paketWisata = PaketWisata::all();
        $wisata = Post::all();
        $jumlahwisata = $paketWisata->count();
        // dd($randomPosts);
        // dd($paketWisata);
        return view('paketwisata.index', [
            "active" => 'paketwisata',
            "paketWisata" => $paketWisata,
            "jumlahwisata" => $jumlahwisata,

            "posts" => $wisata,
            'categories' => Category::all()
        ]);
    }

    public function show($slug)
    {
        $paketWisata = PaketWisata::where('slug', $slug)->firstOrFail();
        $jumlahwisata = $paketWisata->jumlah_wisata_dikunjungi;

        $wisataIds = Paketwisata_pariwisata::where('paketwisata_id', $paketWisata->id)->pluck('post_id');
        $wisataPosts = Post::whereIn('id', $wisataIds)->get();

        return view('paketwisata.show', [
            "active" => 'paketwisata',
            "paketWisata" => $paketWisata,
            "wisataPosts" => $wisataPosts,
            "jumlahwisata" => $jumlahwisata,
            'categories' => Category::all(),
            "total_posts" => Post::all(),
            // "posts" => Post::withCount('comments')->latest()->filter(request(['search', 'admin', 'category']))->paginate(7)->withQueryString(),
        ]);
    }
}
