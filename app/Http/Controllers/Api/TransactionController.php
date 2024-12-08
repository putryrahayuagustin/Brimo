<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController;
use App\Models\Rekening;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends BaseController
{
    public function transaction(Request $request){
        $validator = Validator::make($request->all(),[
            'no_telepon' => 'required',
            'noTelepon_tujuan' => 'required',
            'jumlah_transaksi' => 'required',
            'jenis_transaksi' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('404' , 'Not Found');
        }

        $no_telepon = Rekening::where('no_telepon', $request['no_telepon'])->get();
        if ($no_telepon == null) {
            return $this->sendError('404' , 'No Telepon NOT FOUND');
        }

        
        $no_telepon_tujuan = Rekening::where('no_telepon', $request['noTelepon_tujuan'])->get();
        if ($no_telepon == null) {
            return $this->sendError('404' , 'No Telepon tujuan NOT FOUND');
        }

        $no_telepon_tujuan = $no_telepon_tujuan->first();
        $no_telepon = $no_telepon->first();


        if ($no_telepon['saldo'] < $request['jumlah_transaksi']) {
            return $this->sendError('Saldo Kurang' , 'Saldo Tidak Mencukupi');
        }

        $input = [
            'no_telepon' => $no_telepon['id'],
            'noTelepon_tujuan' => $no_telepon_tujuan['id'],
            'jumlah_transaksi' => $request['jumlah_transaksi'],
            "jenis_transaksi" => $request['jenis_transaksi'],

        ];

        $transaksi = Transaction::create($input);

        if ($transaksi) {
            $no_telepon['saldo'] = $no_telepon['saldo'] - $request['jumlah_transaksi'];
            $no_telepon_tujuan['saldo'] = $no_telepon_tujuan['saldo'] + $request['jumlah_transaksi'];
            $no_telepon->save();
            $no_telepon_tujuan->save();
        }

        return $this->sendResponse($transaksi, 'Transaksi Berhasil');

    }
}
