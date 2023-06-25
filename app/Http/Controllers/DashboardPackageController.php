<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaketPariwisata;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.paket.index', [
            'package' => PaketPariwisata::Where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.paket.create', [
            // 'categories' => Category::all()
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
        // ddd($request);
        // return $request->file('image')->store('post-image');

        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:paketpariwisata'],
            'image' => ['image', 'file', 'max:1024'],
            'body' => ['required'],
            'budget' => ['required'],
            'rating' => ['required'],
            'jumlah_destinasi' => ['required'],
            'popularitas' => ['required'],
            'keterangan' => []


        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('paketpariwisata-image');
        }

        $validatedData['user_id'] = auth()->user()->id;

        PaketPariwisata::create($validatedData);

        return redirect('dashboard/paketpariwisata')->with('success', 'New package has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(PaketPariwisata $paketpariwisata)
    {
        return view('dashboard.paketpariwisata.show', [
            'paketpariwisata' => $paketpariwisata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(PaketPariwisata $paketpariwisata)
    {
        return view('dashboard.paketpariwisata.edit', [
            'post' => $paketpariwisata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaketPariwisata $paketpariwisata)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'category_id' =>  ['required'],
            'image' => ['image', 'file', 'max:1024'],
            'body' => ['required']
        ];


        if ($request->slug != $paketpariwisata->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData =  $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('paketpariwisata-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        PaketPariwisata::where('id', $paketpariwisata->id)->update($validatedData);

        return redirect('dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaketPariwisata $paketpariwisata)
    {
        if ($paketpariwisata->image) {
            Storage::delete($paketpariwisata->image);
        }
        PaketPariwisata::destroy($paketpariwisata->id);
        return redirect('dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(PaketPariwisata::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
