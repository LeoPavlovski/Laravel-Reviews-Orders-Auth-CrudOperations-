<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Notifications;

class InvoiceCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     * pass some data
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        //Database Channel store notifications in database (showing it to the frontend)
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("New invoice for you")
                    ->line('We just created a new invoice for you')
                    ->action('Download', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    //Toarray method works.
    public function toArray(object $notifiable)
    {
        return [
            'message'=>'We just created a new invoice for you',
            'url'=>'/'
        ];
    }
}
