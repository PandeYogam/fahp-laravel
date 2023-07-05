<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\PaketWisata;

class PaketWisataController extends Controller
{
    public function index()
    {
        $paketwisata = PaketWisata::all();
        // dd($paketwisata);
        return view('paketwisatas', [
            "title" => "Paket Wisata",
            "active" => 'paketwisata',
            'paketwisata' => PaketWisata::all(),
            'categories' => Category::all()
        ]);
    }

    public function show(PaketWisata $paketwisata)
    {

        dd($paketwisata);

        return view('paketwisata/1', [
            "title" => "Single Paket",
            "active" => 'paketwisata',

            'paketwisata' => $paketwisata,
            'categories' => Category::all()
        ]);
    }
}
