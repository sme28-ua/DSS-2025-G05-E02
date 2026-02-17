<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    /** @use HasFactory<\Database\Factories\OperadorFactory> */
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

}
