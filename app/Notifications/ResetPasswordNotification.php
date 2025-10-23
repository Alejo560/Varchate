<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotificationBase;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPasswordNotificationBase
{
    /**
     * Crea el correo con el enlace de restablecimiento de contraseña.
     */
    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage())
            ->subject('🔐 Recupera tu contraseña - Varchate')
            ->greeting('¡Hola ' . $notifiable->nombre . '!')
            ->line('Recibimos una solicitud para restablecer tu contraseña en Varchate.')
            ->action('Restablecer contraseña', $resetUrl)
            ->line('Si no solicitaste este cambio, puedes ignorar este mensaje.')
            ->salutation('Atentamente, el equipo de Varchate 🐱');
    }
}
