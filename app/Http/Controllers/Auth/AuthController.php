<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $a)
    {
        // dd($a->all());
        $data = User::where('email', $a->email)->firstOrFail();
        // dd($data->email);
        if ($data) {
            if (Hash::check($a->password, $data->password)) {
                session(['berhasil_login' => true]);
                return redirect('/dashboard');
            }
        }
        return redirect('/')->with('massage', 'Email Atau Password Salah');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('massage_logout', 'Berhasil Logout!');
    }
}
