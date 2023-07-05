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

    public function create()
    {
        return view('dashboard.subkriteria.create', []);
    }

    public function store(Request $request)
    {
        // return $request->file('image')->store('post-image');

        $validatedData = $request->validate([
            'nama' => ['required'],
            'rentang_min' => ['required'],
            'rentang_max' => ['required'],
            'bobot' => ['required'],
        ]);

        Subkriteria::create($validatedData);

        return redirect('dashboard/subkriteria')->with('success', 'New package has been added!');
    }
}
