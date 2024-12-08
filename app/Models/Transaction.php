<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'transactions';

    // Menentukan kolom yang bisa diisi secara massal (mass assignment)
    protected $fillable = [
        'jumlah_transaksi',
        'tanggal_transaksi',
        'jenis_transaksi',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
