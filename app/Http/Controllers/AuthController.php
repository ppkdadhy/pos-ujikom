<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        // jika user ditemukan / berhasil login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role_id === 1) {
                return redirect()->intended('admin/dashboard')->with('success', 'Login berhasil');
            } elseif (Auth::user()->role_id === 2) {
                return redirect()->intended('kasir/dashboard')->with('success', 'Login berhasil');
            } elseif (Auth::user()->role_id === 3) {
                return redirect()->intended('pimpinan/dashboard')->with('success', 'Login berhasil');
            }
        }
        // jika gagal
        return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
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
    public function destroy(string $id)
    {
        //
    }
}
