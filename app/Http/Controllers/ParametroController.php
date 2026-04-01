<?php

namespace App\Http\Controllers;

use App\Models\ParametroGanancia;
use Illuminate\Http\Request;

class ParametroGananciaController extends Controller
{
    public function getData(Request $request)
    {
        $query = ParametroGanancia::query();

        $sort = $request->get('sort', 'id');
        $dir = $request->get('dir', 'asc');
        $query->orderBy($sort, $dir);

        $perPage = $request->get('per', 6);
        return response()->json($query->paginate($perPage));
    }

    public function show($id)
    {
        return response()->json(ParametroGanancia::findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'multiplicacion_por_juego' => 'required|numeric|min:0',
            'bonus_por_racha' => 'required|numeric|min:0',
        ]);

        $parametro = ParametroGanancia::create($data);

        return response()->json([
            'success' => true,
            'data' => $parametro,
            'message' => 'Parámetro creado correctamente'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $parametro = ParametroGanancia::findOrFail($id);

        $data = $request->validate([
            'multiplicacion_por_juego' => 'sometimes|numeric|min:0',
            'bonus_por_racha' => 'sometimes|numeric|min:0',
        ]);

        $parametro->update($data);

        return response()->json([
            'success' => true,
            'data' => $parametro,
            'message' => 'Parámetro actualizado correctamente'
        ]);
    }

    public function destroy($id)
    {
        $parametro = ParametroGanancia::findOrFail($id);
        $parametro->delete();

        return response()->json([
            'success' => true,
            'message' => 'Parámetro eliminado correctamente'
        ]);
    }
}
