<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DssController extends Controller
{
    public function index()
    {
        return view('dss.index', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all()
        ]);
    }
    public function calculate()
    {
        return view('dss.calculate', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all()
        ]);
    }
    public function rekomendasi()
    {
        return view('dss.rekomendasi', [
            'title' => 'Rekomendasi Paket Pariwisata',
            'active' => 'dss',
            'categories' => Category::all()
        ]);
    }
}
