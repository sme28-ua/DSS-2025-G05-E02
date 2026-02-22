<?php
// tests/Feature/RelacionesUserTest.php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Mensaje;
use App\Models\Chat;
use App\Models\Billetera;
use App\Models\Apuesta;

class RelacionesUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_puede_tener_muchos_mensajes()
    {
        // Crear usuario
        $usuario = User::factory()->create();
        
        // Crear mensajes para el usuario
        Mensaje::factory()->count(3)->create([
            'emisor_id' => $usuario->id
        ]);
        
        // Verificar relación
        $this->assertCount(3, $usuario->mensajes);
        $this->assertInstanceOf(Mensaje::class, $usuario->mensajes->first());
    }

    public function test_usuario_puede_tener_muchos_chats()
    {
        $usuario = User::factory()->create();
        
        Chat::factory()->count(2)->create([
            'usuario_id' => $usuario->id
        ]);
        
        $this->assertCount(2, $usuario->chats);
        $this->assertInstanceOf(Chat::class, $usuario->chats->first());
    }

    public function test_usuario_tiene_una_billetera()
    {
        $usuario = User::factory()->create();
        $billetera = Billetera::factory()->create([
            'user_id' => $usuario->id
        ]);
        
        $this->assertInstanceOf(Billetera::class, $usuario->billetera);
        $this->assertEquals($billetera->id, $usuario->billetera->id);
    }

    public function test_usuario_puede_tener_muchas_apuestas()
    {
        $usuario = User::factory()->create();
        
        Apuesta::factory()->count(5)->create([
            'user_id' => $usuario->id
        ]);
        
        $this->assertCount(5, $usuario->apuestas);
        $this->assertInstanceOf(Apuesta::class, $usuario->apuestas->first());
    }

    public function test_eliminar_usuario_cascade_en_billetera()
    {
        $usuario = User::factory()->create();
        $billetera = Billetera::factory()->create([
            'user_id' => $usuario->id
        ]);
        
        $usuario->delete();
        
        $this->assertDatabaseMissing('billeteras', ['id' => $billetera->id]);
    }
}