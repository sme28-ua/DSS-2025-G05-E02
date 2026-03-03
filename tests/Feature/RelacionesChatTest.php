<?php
// tests/Feature/RelacionesChatTest.php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Chat;
use App\Models\Mensaje;
use App\Models\User;

class RelacionesChatTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_pertenece_a_un_usuario()
    {
        $usuario = User::factory()->create();
        $chat = Chat::factory()->create([
            'usuario_id' => $usuario->id
        ]);
        
        $this->assertInstanceOf(User::class, $chat->usuario);
        $this->assertEquals($usuario->id, $chat->usuario->id);
    }

    public function test_chat_puede_tener_muchos_mensajes()
    {
        $chat = Chat::factory()->create();
        
        Mensaje::factory()->count(4)->create([
            'chat_id' => $chat->id
        ]);
        
        $this->assertCount(4, $chat->mensajes);
        $this->assertInstanceOf(Mensaje::class, $chat->mensajes->first());
    }

    public function test_mensajes_se_eliminan_al_eliminar_chat()
    {
        $chat = Chat::factory()->create();
        Mensaje::factory()->count(3)->create([
            'chat_id' => $chat->id
        ]);
        
        $chat->delete();
        
        $this->assertDatabaseMissing('mensajes', ['chat_id' => $chat->id]);
    }
}