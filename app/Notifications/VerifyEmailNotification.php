<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends Notification
{
    public $usuario;

    public function __construct($usuario)
    {
        $this->usuario = $usuario;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = route('verificar.email', ['token' => $this->usuario->token_verificacion]);

        return (new MailMessage())
            ->subject('📧 Verifica tu correo electrónico - Varchate')
            ->greeting('¡Hola, ' . $this->usuario->nombre . '!')
            ->line('Gracias por registrarte en **Varchate** 🐱.')
            ->line('Por favor, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.')
            ->action('Verificar mi correo', $url)
            ->line('Si no creaste una cuenta, ignora este mensaje.');
    }
}
