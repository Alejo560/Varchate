<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail;

class Usuario extends Authenticatable
{
    use Notifiable;
    use MustVerifyEmail;

    protected $table = 'usuarios';

    protected $fillable = [
         'nombre',
         'email',
         'contrasena',
         'oauth_provider',
         'oauth_id',
         'verificacion',
         'confirmado',
         'token_verificacion',
         'avatar_id',
         'tema_id',
         'acepto_terminos',
     ];

    protected $hidden = [
       'contrasena',
       'token_verificacion',
       'reset_token',
    ];

    public $timestamps = false;

    // Laravel busca este método para validar contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
