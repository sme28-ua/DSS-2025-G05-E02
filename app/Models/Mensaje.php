<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    public function chat(){
        return $this->belongsTo(Chat::class);
    }

    public function emisor(){
        return $this->belongsTo(Usuario::class, 'emisor_id');
    }

    public function receptor(){
        return $this->belongsTo(Usuario::class, 'receptor_id');
    }
}

