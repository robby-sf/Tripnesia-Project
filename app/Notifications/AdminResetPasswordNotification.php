<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password Admin - Tripnesia')
            ->line('Klik tombol di bawah untuk mengatur ulang password Anda.')
            ->action('Reset Password', url(route('admin.password.reset', [
                'token' => $this->token,
                'email' => $notifiable->email,
            ], false)))
            ->line('Jika Anda tidak meminta pengaturan ulang password, abaikan email ini.');
    }
}
