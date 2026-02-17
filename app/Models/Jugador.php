<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    /** @use HasFactory<\Database\Factories\JugadorFactory> */
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'nivelVIP',
        'puntosFidelidad'
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function billetera(){
        return $this->hasOne(Billetera::class);
    }

    public function apuestas(){
        return $this->hasMany(Apuesta::class);
    }

}
