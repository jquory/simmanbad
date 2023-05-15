<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)) {
            if(auth()->user()->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            }
            else if(auth()->user()->role == 'user') {
                return redirect()->intended('user/dashboard');
            }
        } else {
            return Redirect::back()->withErrors(['error' => 'Username atau Password salah.']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
