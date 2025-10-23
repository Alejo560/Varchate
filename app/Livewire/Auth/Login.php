<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('email', $this->email)->first();

        if (!$usuario || !Hash::check($this->password, $usuario->contrasena)) {
            session()->flash('error', 'Correo o contraseña incorrectos.');
            return;
        }

        Auth::login($usuario, $this->remember);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
