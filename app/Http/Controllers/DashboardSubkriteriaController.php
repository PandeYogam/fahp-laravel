<?php

namespace App\Http\Controllers;


use App\Models\Subkriteria;
use Illuminate\Http\Request;

class DashboardSubkriteriaController extends Controller
{
    public function index()
    {
        // $subkriteria = Subkriteria::all();
        // dd($subkriteria);
        return view('dashboard.subkriteria.index', [
            'subkriteria' => Subkriteria::all(),
        ]);
    }
}
