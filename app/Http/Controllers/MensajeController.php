<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index()
    {
        return Mensaje::with(['chat', 'emisor', 'receptor'])->get();
    }

    public function show(Mensaje $mensaje)
    {
        return $mensaje->load(['chat', 'emisor', 'receptor']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'chat_id' => ['required', 'integer', 'exists:chats,id'],
            'emisor_id' => ['required', 'integer', 'exists:users,id'],
            'receptor_id' => ['required', 'integer', 'exists:users,id'],
            'contenido' => ['required', 'string'],
            'fechaHora' => ['required', 'date'],
            'editado' => ['required', 'boolean'],
        ]);

        return Mensaje::create($data);
    }

    public function update(Request $request, Mensaje $mensaje)
    {
        $data = $request->validate([
            'chat_id' => ['sometimes', 'integer', 'exists:chats,id'],
            'emisor_id' => ['sometimes', 'integer', 'exists:users,id'],
            'receptor_id' => ['sometimes', 'integer', 'exists:users,id'],
            'contenido' => ['sometimes', 'string'],
            'fechaHora' => ['sometimes', 'date'],
            'editado' => ['sometimes', 'boolean'],
        ]);

        $mensaje->update($data);

        return $mensaje;
    }

    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();

        return response()->json(null, 204);
    }
}
