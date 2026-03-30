<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'juego_id',
        'monto',
        'cuota',
        'estado',
        'fecha'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }

    // SCOPES
    public function scopeActivas($query)
    {
        return $query->where('estado', 'pendiente');
    }

    public function scopeGanadas($query)
    {
        return $query->where('estado', 'ganada');
    }

    public function scopePerdidas($query)
    {
        return $query->where('estado', 'perdida');
    }

    public function scopePorUsuario($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Helpers
    public function calcularGanancia()
    {
        if ($this->estado === 'ganada') {
            return $this->monto * $this->cuota;
        }
        return 0;
    }

    // Lógica para liquidar victoria y actualizar billetera, puntos, ranking, notificación
    public function liquidarVictoria()
    {
        if ($this->estado !== 'ganada') {
            $this->estado = 'ganada';
            $this->save();
        }
        // Calcular ganancia
        $ganancia = $this->monto * $this->cuota;
        $user = $this->user;
        // Añadir dinero a la billetera
        $user->billetera->saldo += $ganancia;
        $user->billetera->save();
        // Añadir puntos de fidelidad (puedes establecer la fórmula deseada)
        $puntos = intval($ganancia / 10);
        $user->sumarPuntosFidelidad($puntos);
        // Actualizar ranking
        \App\Models\Ranking::actualizarRankingUsuario($user, $ganancia, $puntos);
        // (Opcional: lanzar evento/crear notificación si sube de nivel o ranking)
    }
}
