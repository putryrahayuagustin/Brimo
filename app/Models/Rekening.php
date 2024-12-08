<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekenings';

    protected $primaryKey = 'id';


    protected $fillable = [
        'no_telepon',
        'saldo',
        'user_id',
    ];

    public function user_id(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
