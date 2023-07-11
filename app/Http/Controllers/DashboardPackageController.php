<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use App\Models\Paketwisata_pariwisata;
use App\Models\Post;
use App\Models\Subkriteria;
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
        if (auth()->user()->is_admin == 1) {
            $post = PaketWisata::all();
        } else {
            $post = PaketWisata::Where('user_id', auth()->user()->id)->get();
        }

        return view('dashboard.paketwisata.index', [
            'packages' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wisata = Post::all();

        return view('dashboard.paketwisata.create', [
            'wisata' => $wisata
        ]);
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
            // 'jumlah_wisata_dikunjungi' => ['required']
        ]);

        $validatedData = $request->body;

        $roles = $request->input('role');
        $validatedData['jumlah_wisata_dikunjungi'] = count($roles);

        // Ambil nilai kriteria dari input
        $harga = $validatedData['harga'];
        $popularitas = $validatedData['popularitas'];
        $rating = $validatedData['rating'];
        $durasi = $validatedData['durasi'];
        $jumlahWisata = $validatedData['jumlah_wisata_dikunjungi'];

        // Ambil bobot berdasarkan rentang kriteria
        $hargaBobot = $this->getBobotByRange('harga', $harga);
        $popularitasBobot = $this->getBobotByRange('popularitas', $popularitas);
        $ratingBobot = $this->getBobotByRange('rating', $rating);
        $durasiBobot = $this->getBobotByRange('durasi', $durasi);
        $jumlahWisataBobot = $this->getBobotByRange('jumlah_wisata_dikunjungi', $jumlahWisata);

        // Assign bobot ke dalam validatedData
        $validatedData['harga_bobot'] = $hargaBobot;
        $validatedData['popularitas_bobot'] = $popularitasBobot;
        $validatedData['rating_bobot'] = $ratingBobot;
        $validatedData['durasi_bobot'] = $durasiBobot;
        $validatedData['jumlah_wisata_bobot'] = $jumlahWisataBobot;


        $validatedData['user_id'] = auth()->user()->id;
        PaketWisata::create($validatedData);
        // dd($validatedData);

        $paketwisatalast = PaketWisata::latest()->first();
        $idlast = $paketwisatalast->id;

        foreach ($roles as $role) {
            $paketwisata_pariwisata['post_id'] = $role;
            $paketwisata_pariwisata['paketwisata_id'] = $idlast;
            Paketwisata_pariwisata::create($paketwisata_pariwisata);
        }

        return redirect('dashboard/paketwisata')->with('success', 'New package has been added!');
    }

    private function getBobotByRange($kriteria, $nilai)
    {
        // Menentukan bobot berdasarkan kriteria dan nilai
        $subkriteria = Subkriteria::where('nama', $kriteria)
            ->where('rentang_min', '<=', $nilai)
            ->where('rentang_max', '>=', $nilai)
            ->first();

        if ($subkriteria) {
            return $subkriteria->bobot;
        }

        return null;
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
    public function update(Request $request, $slug)
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

        if ($request->slug != $slug) {
            $rules['slug'] = 'required|unique:paket_wisata';
        }

        $validatedData =  $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        // dd($slug);
        PaketWisata::where('slug', $slug)->update($validatedData);
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
