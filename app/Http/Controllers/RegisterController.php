<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'register',
            'active' => 'register',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:225',
            'username' => ['required', 'min:8', 'max:12', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Mengatur nilai 'is_pengelola_paket_wisata' dan 'is_pengelola_wisata' berdasarkan role yang dipilih
        $roles = $request->input('role', []);

        // Mengatur nilai 'is_pengelola_paket_wisata' dan 'is_pengelola_wisata' berdasarkan role yang dipilih
        $validatedData['is_pengelola_paket_wisata'] = in_array('pengelola_paket_wisata', $roles) ? 1 : 0;
        $validatedData['is_pengelola_wisata'] = in_array('pengelola_wisata', $roles) ? 1 : 0;

        User::create($validatedData);

        $request = session();

        $request->flash('success', 'Registration successfull! Please login');

        return redirect('/login');
    }
}
