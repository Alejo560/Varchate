<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de autenticación (Livewire)
Route::get('/login', Login::class)->name('login');
Route::get('/registro', Register::class)->name('register');

// Verificación de correo
Route::view('/verificacion-aviso', 'livewire.auth.verificacion-aviso')->name('verificacion.aviso');

Route::get('/verificar/{token}', function ($token) {
    $usuario = Usuario::where('token_verificacion', $token)->first();

    if (!$usuario) {
        return redirect()->route('login')->with('error', 'El enlace de verificación no es válido o ya expiró.');
    }

    $usuario->markEmailAsVerified();
    Auth::login($usuario);

    return redirect()->route('dashboard')->with('success', 'Tu correo fue verificado correctamente.');
})->name('verificar');

// Dashboard (solo para usuarios logueados)
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'livewire.auth.dashboard')->name('dashboard');
});
