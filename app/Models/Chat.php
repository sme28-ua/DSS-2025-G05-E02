<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fechaCreacion',
        'activo'
    ];

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }
}
