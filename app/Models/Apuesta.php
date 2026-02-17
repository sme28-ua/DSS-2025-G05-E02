<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apuesta extends Model
{
    /** @use HasFactory<\Database\Factories\ApuestaFactory> */
    use HasFactory;

    protected $fillable = [
        'jugador_id',
        'mesa_id',
        'monto',
        'cuota',
        'estado',
        'fecha'
    ];

    public function jugador(){
        return $this->belongsTo(Jugador::class);
    }

    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }

    public function transacciones(){
        return $this->hasMany(Transaccion::class);
    }

}
