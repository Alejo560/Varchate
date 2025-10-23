<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register extends Component
{
    public $nombre;
    public $email;
    public $password;
    public $password_confirmation;
    public $acepto_terminos;

    public function register()
    {
        $this->validate([
            'nombre' => 'required|min:3',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
            'acepto_terminos' => 'accepted',
        ]);

        // Crear usuario con token de verificación
        $usuario = Usuario::create([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'contrasena' => Hash::make($this->password),
            'acepto_terminos' => 1,
            'confirmado' => 0,
            'token_verificacion' => Str::random(60),
        ]);

        // ✅ Enviar correo de verificación
        $usuario->notify(new \App\Notifications\VerifyEmailNotification($usuario));

        // Iniciar sesión, pero redirigir a aviso de verificación
        auth()->login($usuario);

        return redirect()->route('verificacion.aviso');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth', ['title' => 'Crear cuenta - Varchate']);
    }
}
