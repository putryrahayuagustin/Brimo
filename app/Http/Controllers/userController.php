<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial login
        if (Auth::attempt($request->only('email', 'password'))) {
            session(['name' => Auth::user()->name]);
            return redirect()->route('dashboard')->with('success', 'Login berhasil.');
        }

        // Kembali ke form login dengan error jika login gagal
        return back()->withErrors([
            'loginError' => 'email atau password salah.',
        ])->withInput(); // Mengembalikan input kecuali password
    }


    public function register(Request $request)
    {
        // Validasi inputan user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            

            'password' => 'required|confirmed|', // password dan password_confirmation harus sama
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
          
            'password' => Hash::make($request->password), // Enkripsi password
        ]);

        // Login user setelah registrasi berhasil
        Auth::login($user);

        // Redirect ke halaman dashboard atau halaman yang sesuai
        return redirect()->route('login');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

}
