<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApuestaController;
use App\Http\Controllers\BilleteraController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\UserController;

use App\Models\Apuesta;
use App\Models\Chat;
use App\Models\Juego;

Route::get('/', function () {
    return view('home', [
        'juegos' => Juego::all(),
        'ultimas_apuestas' => Apuesta::with(['user','juego'])->latest('fecha')->take(5)->get(),
        'chats' => Chat::with('user')->latest()->take(5)->get(),
    ]);
});

Route::resource('users', UserController::class);
Route::resource('apuestas', ApuestaController::class);
Route::resource('billeteras', BilleteraController::class);
Route::resource('chats', ChatController::class);
Route::resource('juegos', JuegoController::class);
Route::resource('mensajes', MensajeController::class);

