<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:225',
            'username' => ['required', 'min:8', 'max:12', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $roles = $request->input('role', []);

        $validatedData['is_pengelola_paket_wisata'] = in_array('pengelola_paket_wisata', $roles) ? 1 : 0;
        $validatedData['is_pengelola_wisata'] = in_array('pengelola_wisata', $roles) ? 1 : 0;

        // dd($validatedData);

        User::create($validatedData);

        $request->flash('success', 'Registration successfull! Please login');

        return redirect('dashboard/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username', $username)->first();


        if (!$user) {
            // Handle the case when the user is not found
            abort(404);
        }

        return view('dashboard.users.edit', ['user' => $user]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:225',
            'username' => ['required', 'min:8', 'max:12', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'email:dns', Rule::unique('users')->ignore($user)],

        ]);

        $roles = $request->input('role', []);

        // dd($roles);
        // dd($request->all());

        $validatedData['is_admin'] = in_array('pengujung', $roles) ? 0 : 1;
        $validatedData['is_pengelola_paket_wisata'] = in_array('pengelola_paket_wisata', $roles) ? 1 : 0;
        $validatedData['is_pengelola_wisata'] = in_array('pengelola_wisata', $roles) ? 1 : 0;

        User::where('username', $user)->update($validatedData);

        // return redirect('dashboard/paketwisata')->with('success', 'Post has been updated!');


        // dd($request->is_admin);

        return redirect('dashboard/users')->with('success', 'User has been updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
{
    $user = User::where('username', $username)->first();

    if ($user) {
        $user->delete();
        return redirect('dashboard/users')->with('success', 'User has been deleted!');
    }

    return redirect('dashboard/users')->with('error', 'User not found!');
}

}
