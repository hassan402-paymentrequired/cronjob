<?php

namespace App\Notifications\V1;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResendCodeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $code, public string $user)
    {
        //
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
            ->subject('Resend Verification Code')
            ->greeting('Hello '.$notifiable->name.'!')
            ->line('We noticed you requested a new verification code.')
            ->line('We have sent a One-Time Password (OTP) to your email address. Please enter the OTP below to Proceed.')
            ->line('Your OTP is: ' . $this->code)
            ->line('If you did not request this, please ignore this email.')
            ->salutation('Thank you for using our application!');

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
