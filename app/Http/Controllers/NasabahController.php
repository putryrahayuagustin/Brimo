<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{


    public function edit($id)
    {
        $this->authorize("admin");
        $nasabah = Nasabah::findOrFail($id);
        $data = [
            'nasabah' => $nasabah
        ];
        return view('form.updatenasabah', compact('nasabah'));
    }
    public function destroy($id)
    {
        $this->authorize("admin");
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->delete();

        return redirect()->route('nasabah.index')->with('message', 'Profil berhasil dihapus.');
    }


    public function update(Request $request, $id)
    {
        $this->authorize("admin");
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        $nasabah = Nasabah::findOrFail($id);
        $nasabah->update($request->all());

        return redirect()->route('nasabah.index')->with('message', 'Profil berhasil diperbarui.');
    }

    public function index()
    {

        $this->authorize("admin");
        $nasabah = Nasabah::where('user_id', Auth::id())->first();

        return view('nasabah', compact('nasabah'));
    }

    public function create()
    {
        // Cek apakah user sudah terdaftar sebagai nasabah
        $this->authorize("admin");
        $nasabah = Nasabah::where('user_id', Auth::id())->first();
        if ($nasabah) {
            return redirect()->route('nasabah.index')->with('message', 'Anda sudah terdaftar sebagai nasabah.');
        }

        return view('nasabah.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $this->authorize("admin");
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Cek jika user belum login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Cek apakah sudah ada nasabah dengan user_id yang sama
        $nasabah = Nasabah::where('user_id', Auth::id())->first();

        if ($nasabah) {
            return redirect()->route('nasabah.index')->with('message', 'Anda sudah terdaftar sebagai nasabah.');
        }

        // Simpan data nasabah jika belum ada
        Nasabah::create([
            'user_id' => Auth::id(), // Menggunakan Auth::id() untuk mendapatkan ID user yang sedang login
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('nasabah.index')->with('message', 'Pendaftaran nasabah berhasil.');
    }
}
