<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekeningController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_telepon' => 'required|string|max:255',
           
            'saldo' => 'required|numeric|min:0',
        ]);
    
        // Simpan rekening baru
        Rekening::create([
            'user_id' =>  Auth::id(),
            'no_telepon' => $request->no_telepon,
          
            'saldo' => $request->saldo,
        ]);
    
        // Redirect setelah berhasil
        return redirect()->route('rekening.index')->with('message', 'Rekening berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $this->authorize("admin");
        $rekening = Rekening::findOrFail($id);
        return view('form.updaterekening', compact('rekening'));
    }

    // Mengupdate rekening
    public function update(Request $request, $id)
    {
        // Validasi input
        $this->authorize("admin");
        $request->validate([
            'no_telepon' => 'required|string|max:255',
           
            'saldo' => 'required|numeric|min:0',
        ]);

        // Mencari rekening berdasarkan id
        $rekening = Rekening::findOrFail($id);

        // Update data rekening
        $rekening->update([
            'no_telepon' => $request->no_telepon,
          
            'saldo' => $request->saldo,
        ]);

        // Redirect setelah update berhasil
        return redirect()->route('rekening.index')->with('message', 'Rekening berhasil diperbarui.');
    }


    public function destroy(String $id){
        $this->authorize("admin");
        $rekening = Rekening::findOrFail($id);

        if (!$rekening) {
           return redirect()->route('rekening.index')->with('message', 'Id tidak ditemukan');
        }


        $rekening->delete();

        return redirect()->route('rekening.index')->with('message', 'Rekening berhasil dihapus.');
    }
}
