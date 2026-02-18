<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Juego extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria',
        'estado'
    ];

    public function apuestas()
    {
        return $this->hasMany(Apuesta::class);
    }
}
