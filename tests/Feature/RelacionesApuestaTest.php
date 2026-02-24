<?php
// tests/Feature/RelacionesApuestaTest.php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Apuesta;
use App\Models\User;
use App\Models\Juego;

class RelacionesApuestaTest extends TestCase
{
    use RefreshDatabase;

    public function test_apuesta_pertenece_a_un_usuario()
    {
        $usuario = User::factory()->create();
        $apuesta = Apuesta::factory()->create([
            'user_id' => $usuario->id
        ]);
        
        $this->assertInstanceOf(User::class, $apuesta->usuario);
        $this->assertEquals($usuario->id, $apuesta->usuario->id);
    }

    public function test_apuesta_pertenece_a_un_juego()
    {
        $juego = Juego::factory()->create();
        $apuesta = Apuesta::factory()->create([
            'juego_id' => $juego->id
        ]);
        
        $this->assertInstanceOf(Juego::class, $apuesta->juego);
        $this->assertEquals($juego->id, $apuesta->juego->id);
    }

    public function test_usuario_puede_tener_multiples_apuestas_en_diferentes_juegos()
    {
        $usuario = User::factory()->create();
        $juego1 = Juego::factory()->create();
        $juego2 = Juego::factory()->create();
        
        Apuesta::factory()->create([
            'user_id' => $usuario->id,
            'juego_id' => $juego1->id
        ]);
        
        Apuesta::factory()->create([
            'user_id' => $usuario->id,
            'juego_id' => $juego2->id
        ]);
        
        $this->assertCount(2, $usuario->apuestas);
        $this->assertEquals($juego1->id, $usuario->apuestas[0]->juego->id);
        $this->assertEquals($juego2->id, $usuario->apuestas[1]->juego->id);
    }
}