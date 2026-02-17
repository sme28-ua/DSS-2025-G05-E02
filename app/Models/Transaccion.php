<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    public function billetera(){
        return $this->belongsTo(Billetera::class);
    }

    public function apuesta(){
        return $this->belongsTo(Apuesta::class);
    }
}

