<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetForgottenPasswordNotification extends Notification
{
    
    protected $timestamp;
    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
        $this->timestamp = date('F j, Y g:i A'); 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Your Password Has Been Changed')
        ->greeting('Hello!')
        ->line('This is a confirmation that your password has been successfully changed.')
        ->line('Time of change: ' . $this->timestamp)
        ->line('If you did not request this change, please contact our support team immediately.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}