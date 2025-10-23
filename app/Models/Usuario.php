<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'contrasena',
        'oauth_provider',
        'oauth_id',
        'token_verificacion',
        'confirmado',
        'acepto_terminos',
        'avatar_id',
        'tema_id',
    ];

    protected $hidden = [
        'contrasena',
        'token_verificacion',
    ];

    public $timestamps = false;

    /**
     * Laravel necesita saber qué campo usar como contraseña
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Verifica si el correo fue confirmado (puedes adaptarlo según tu campo 'confirmado')
     */
    public function hasVerifiedEmail()
    {
        return (bool) $this->confirmado;
    }

    /**
     * Marca el correo como verificado
     */
    public function markEmailAsVerified()
    {
        $this->confirmado = 1;
        $this->save();
    }

    /**
     * Envía la notificación de verificación
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification());
    }

    /**
     * Envía la notificación para restablecer contraseña
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ResetPasswordNotification($token));
    }
}
