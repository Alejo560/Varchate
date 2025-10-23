<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

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

        $usuario = Usuario::create([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'contrasena' => Hash::make($this->password),
            'acepto_terminos' => 1,
        ]);

        auth()->login($usuario);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
