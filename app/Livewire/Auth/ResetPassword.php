<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ResetPassword extends Component
{
    public $token;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        // Buscar el token (Laravel los guarda con Hash::make)
        $tokenData = DB::table('password_reset_tokens')->get();
        $match = null;

        foreach ($tokenData as $row) {
            if (Hash::check($this->token, $row->token)) {
                $match = $row;
                break;
            }
        }

        if (!$match) {
            session()->flash('error', 'El enlace de restablecimiento no es válido o ha expirado.');
            return;
        }

        // Verificar si el token aún es válido (60 minutos)
        $tokenCreado = Carbon::parse($match->created_at);
        if ($tokenCreado->diffInMinutes(now()) > 60) {
            session()->flash('error', 'El enlace de restablecimiento ha expirado. Solicita uno nuevo.');
            return;
        }

        // Buscar el usuario asociado
        $usuario = Usuario::where('email', $match->email)->first();
        if (!$usuario) {
            session()->flash('error', 'No existe un usuario con ese correo electrónico.');
            return;
        }

        // Actualizar la contraseña
        $usuario->contrasena = Hash::make($this->password);
        $usuario->save();

        // Eliminar el token usado
        DB::table('password_reset_tokens')->where('email', $match->email)->delete();

        // 🔑 Iniciar sesión automáticamente
        Auth::login($usuario);

        //  Redirigir a la vista de confirmación
        return redirect()->route('password.updated');

    }

    public function render()
    {
        return view('livewire.auth.reset-password')->layout('layouts.auth');
    }
}
