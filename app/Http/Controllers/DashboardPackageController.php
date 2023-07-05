<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.paketwisata.index', [
            'packages' => PaketWisata::Where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.paketwisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-image');

        $validatedData = $request->validate([
            'nama' => ['required', 'max:255'],
            'slug' => ['required'],
            'harga' => ['required'],
            'popularitas' => ['required'],
            'rating' => ['required'],
            'durasi' => ['required'],
            'jumlah_wisata_dikunjungi' => ['required']
        ]);



        $validatedData['user_id'] = auth()->user()->id;
        PaketWisata::create($validatedData);

        return redirect('dashboard/paketwisata')->with('success', 'New package has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function show(PaketWisata $paketpariwisata)
    // {
    //     // return view('dashboard.paketpariwisata.show', [
    //     //     'paketpariwisata' => $paketpariwisata
    //     // ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit($slug)
    {
        $paketWisataData = PaketWisata::where('slug', $slug)->first();
        return view('dashboard.paketwisata.edit', [
            'paketwisata' => $paketWisataData
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaketWisata $paketwisata)
    {
        $rules = [
            'nama' => ['required', 'max:255'],
            'slug' => ['required'],
            'harga' => ['required'],
            'popularitas' => ['required'],
            'rating' => ['required'],
            'durasi' => ['required'],
            'jumlah_wisata_dikunjungi' => ['required']
        ];

        if ($request->slug != $paketwisata->slug) {
            $rules['slug'] = 'required|unique:paket_wisata';
        }

        $validatedData =  $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        PaketWisata::where('id', $paketwisata->id)->update($validatedData);

        return redirect('dashboard/paketwisata')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function destroy(PaketWisata $paketwisata)
    // {
    //     $paketwisata->delete();
    //     return redirect('dashboard/paketwisata')->with('success', 'Post has been deleted!');
    // }

    public function destroy(PaketWisata $paketwisata)
    {
        $paketwisata->delete();
        return redirect('dashboard/paketwisata')->with('success', 'Package has been deleted!');
    }

    // public function destroy(PaketWisata $paketwisata)
    // {
    //     $paketwisata->delete();

    //     return redirect()->route('dashboard.paketwisata.index')
    //         ->with('success', 'Paket wisata berhasil dihapus!');
    // }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(PaketWisata::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
