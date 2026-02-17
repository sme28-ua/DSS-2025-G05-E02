<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billetera extends Model
{
    /** @use HasFactory<\Database\Factories\BilleteraFactory> */
    use HasFactory;

    public function jugador(){
        return $this->belongsTo(Jugador::class);
    }

    public function transacciones(){
        return $this->hasMany(Transaccion::class);
    }

}
