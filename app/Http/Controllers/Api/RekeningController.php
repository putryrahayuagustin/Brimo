<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RekeningController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_telepon' => 'required|unique:rekenings,no_telepon',
            'saldo' => 'required|min:0',

        ]);



        $user = $request->user();

        if (!$user) {
            return $this->sendError('404', 'Harap Login Terlebih Dahulu!');
        }

        $exists = Rekening::where('no_telepon', $request->no_telepon)->exists();
        if ($exists) {
            return $this->sendError('401', 'No Telepon sudah terdaftar');
        }


        $rekening = Rekening::create([
            'no_telepon' => $request->no_telepon,
            'saldo' => $request->saldo,
            'user_id' => $user->id,
        ]);

        return $this->sendResponse(['data' => $rekening], 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function showAllMyRekening(Request $request, $id)
    {
        $rekening = Rekening::where('user_id', $id)->first();

        if ($rekening == null) {
            return $this->sendError('404', 'Not Found');
        }

        return $this->sendResponse($rekening, 'Data berhasil ditemukan!');
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
    public function updateSaldo(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_telepon' => 'required|exists:rekenings,no_telepon', // Memastikan no_telepon ada dalam tabel
            'saldo' => 'required|numeric|min:0', // Memastikan saldo adalah angka dan tidak kurang dari 0
        ]);

        // Mencari rekening berdasarkan no_telepon
        $rekening = Rekening::where('no_telepon', $request->no_telepon)->first();

        if (!$rekening) {
            return $this->sendError('404', 'No Telepon Tidak Ditemukan');
        }

        // Memperbarui saldo
        $rekening->update([
            'saldo' => $request->saldo
        ]);

        return $this->sendResponse(['data' => $rekening], 'Saldo sudah diperbarui');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no_telepon)
    {
        $rekening = Rekening::where('no_telepon', $no_telepon)->first();

        if (!$rekening) {
            return $this->sendError('404', 'Rekening dengan no telepon ' . $no_telepon . ' tidak ditemukan.');
        }

        $rekening->delete();

        return $this->sendResponse(['success' => true], 'Rekening dengan no telepon ' . $rekening->no_telepon . ' sudah dihapus');
    }

    public function findRekening(String $rekening)
    {
        $rekening = Rekening::where('no_telepon', $rekening)->with('user_id')->first();


        if (!$rekening) {
            return $this->sendError('404', 'Rekening not found');
        }

        return $this->sendResponse($rekening, 'success');
    }

    public function kredit(Request $request)
    {
        $user_id = $request->user_id;
        $nominal = $request->nominal;

        $rekening = Rekening::where('user_id', $user_id)->first();

        if (!$rekening) {
            return $this->sendError('404', 'User not found');
        }

        if ($rekening->saldo < $nominal) {
            return $this->sendError('401', 'Saldo tidak mencukupi');
        }

        DB::beginTransaction();
        try {
            $rekening->saldo -= $nominal;
            $rekening->save();

            Transaction::create([
                'user_id' => $user_id,
                'jumlah_transaksi' => $nominal,
                'jenis_transaksi' => 'kredit',
                'tanggal_transaksi' => now(),
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            return $this->sendError('500', $th->getMessage());
        }

        return $this->sendResponse(null, 'Kredit berhasil');
    }
}
