<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
            'categories' => Category::all()
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed :(');
        // $request = session();
        // $request->flash('loginError', 'Login Failed');
        // // session()->flash('success','Register Success ,Please Login');

        // // return redirect('/login')->with('success', 'Registration successfull! Please login');
        // return back('/login');

        // dd('berhasil login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
