<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nasabah extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nama', 'alamat', 'no_hp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
