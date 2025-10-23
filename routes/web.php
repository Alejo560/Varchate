<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Models\Usuario;

// 🏠 Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 🔐 Autenticación (Login / Registro)
Route::get('/login', Login::class)->name('login');
Route::get('/registro', Register::class)->name('register');

// 🚪 Cerrar sesión
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home')->with('success', 'Has cerrado sesión correctamente.');
})->name('logout');

// 🧠 Rutas protegidas (solo usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// 🔑 Recuperación de contraseña con Livewire
// 1️⃣ Solicitud del correo
Route::get('/olvide-contrasena', ForgotPassword::class)->name('password.request');

// 2️⃣ Confirmación de envío del correo
Route::view('/password/sent', 'livewire.auth.password-sent')->name('password.sent');

// 3️⃣ Restablecimiento de contraseña desde el enlace del correo
Route::get('/restablecer-contrasena/{token}', ResetPassword::class)->name('password.reset');

// 4️⃣ Confirmación de contraseña actualizada
Route::view('/contrasena-actualizada', 'livewire.auth.password-updated')->name('password.updated');

// 📜 Página de Términos y Condiciones
Route::view('/terminos-y-condiciones', 'livewire.auth.terminos')->name('terminos');

// 📩 Página de aviso de verificación de correo
Route::view('/verificacion-aviso', 'livewire.auth.verificacion-aviso')->name('verificacion.aviso');

// 🔒 Verificación de correo
Route::get('/verificar/{token}', function ($token) {
    $usuario = Usuario::where('token_verificacion', $token)->first();

    if (!$usuario) {
        return redirect()->route('login')->with('error', 'El enlace de verificación no es válido o ya expiró.');
    }

    $usuario->markEmailAsVerified();
    Auth::login($usuario);

    return redirect()->route('dashboard')->with('success', '✅ Tu correo fue verificado correctamente.');
})->name('verificar.email');
