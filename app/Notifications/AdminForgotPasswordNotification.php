<?php

// app/Notifications/AdminForgotPasswordNotification.php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminForgotPasswordNotification extends Notification
{
    use Queueable;

    protected $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Notifikasi dikirim lewat email dan disimpan di database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Permintaan Reset Password Admin')
                    ->line('Ada permintaan reset password dari admin dengan email: ' . $this->adminEmail)
                    ->line('Hanya superadmin yang dapat melakukan reset password untuk admin ini.')
                    ->action('Kelola Admin', url('/superadmin/manage-admins')) // Sesuaikan URL ini
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    public function toArray($notifiable)
    {
        return [
            'email' => $this->adminEmail,
            'message' => 'Ada permintaan reset password dari admin dengan email: ' . $this->adminEmail,
        ];
    }
}
