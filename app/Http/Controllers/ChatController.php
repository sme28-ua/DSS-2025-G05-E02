<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::with(['mensajes', 'user'])->get();
    }

    public function show(Chat $chat)
    {
        return $chat->load(['mensajes', 'user']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fechaCreacion' => ['required', 'date'],
            'activo' => ['required', 'boolean'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        return Chat::create($data);
    }

    public function update(Request $request, Chat $chat)
    {
        $data = $request->validate([
            'nombre' => ['sometimes', 'string', 'max:255'],
            'fechaCreacion' => ['sometimes', 'date'],
            'activo' => ['sometimes', 'boolean'],
            'user_id' => ['sometimes', 'integer', 'exists:users,id'],
        ]);

        $chat->update($data);

        return $chat;
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->json(null, 204);
    }
}
