<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Billetera extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'saldoDisponible',
        'moneda'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
