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

    public function edit($id)
    {
        $subkriteria = Subkriteria::findOrFail($id);

        return view('dashboard.subkriteria.edit', ['subkriteria' => $subkriteria]);
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            'nama' => 'required',
            'rentang_min' => 'required|numeric',
            'rentang_max' => 'required|numeric',
            'bobot' => 'required|integer',
        ]);

        $subkriteria = Subkriteria::findOrFail($id);

        $subkriteria->nama = $validatedData['nama'];
        $subkriteria->rentang_min = $validatedData['rentang_min'];
        $subkriteria->rentang_max = $validatedData['rentang_max'];
        $subkriteria->bobot = $validatedData['bobot'];

        $subkriteria->save();

        return redirect('/dashboard/subkriteria')->with('success', 'Subkriteria telah diperbarui!');
    }

    public function destroy($id)
    {
        $subkriteria = Subkriteria::findOrFail($id);

        $subkriteria->delete();

        return redirect('/dashboard/subkriteria')->with('success', 'Subkriteria telah dihapus!');
    }
}
