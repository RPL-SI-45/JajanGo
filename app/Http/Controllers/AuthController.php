<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Menampilkan form login untuk pengguna
    public function showUserLoginForm()
    {
        return view('auth.user-login');
    }

    // Menampilkan form registrasi untuk pengguna
    public function showUserRegisterForm()
    {
        return view('auth.user-register');
    }

    // Menangani login pengguna
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/home');
        }

        throw ValidationException::withMessages([
            'email' => [__('auth.failed')],
        ]);
    }

    // Menangani registrasi pengguna
    public function userRegister(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'nomor_telepon_user' => 'required|string|max:15|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'username_user' => 'required|string|max:255|unique:users',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'nomor_telepon_user' => $request->nomor_telepon_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username_user' => $request->username_user,
        ]);

        return redirect()->route('user.login');
    }

    public function showPedagangLoginForm()
    {
        return view('auth.pedagang-login');
    }

    // Menampilkan form registrasi untuk pedagang
    public function showPedagangRegisterForm()
    {
        return view('auth.pedagang-register');
    }

    // Menangani login pedagang
    public function pedagangLogin(Request $request)
    {
        $request->validate([
            'username_pedagang' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('pedagang')->attempt($request->only('username_pedagang', 'password'))) {
            return redirect()->intended('/pedagang/daftarmenu');
        }

        throw ValidationException::withMessages([
            'username_pedagang' => [__('auth.failed')],
        ]);
    }

    // Menangani registrasi pedagang
    public function pedagangRegister(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat_toko' => 'required|string|max:255',
            'no_telepon_pedagang' => 'required|string|max:15|unique:pedagang',
            'username_pedagang' => 'required|string|max:255|unique:pedagang',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Pedagang::create([
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
            'no_telepon_pedagang' => $request->no_telepon_pedagang,
            'username_pedagang' => $request->username_pedagang,
            'password' => Hash::make($request->password),
            'deskripsi_toko' => $request->deskripsi_toko,
        ]);

        return redirect()->route('pedagang.login');
    }
}
