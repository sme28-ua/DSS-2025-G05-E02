<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory;

    public function jugador(){
        return $this->hasOne(Jugador::class);
    }

    public function operador(){
        return $this->hasOne(Operador::class);
    }

}
