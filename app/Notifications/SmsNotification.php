<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\TurboSMS\TurboSMSMessage;

class SmsNotification extends Notification
{
    use Queueable;

    protected string $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $body)
    {
        $this->body = $body;
    }

    public function via($notifiable)
    {
        return ["turbosms"];
    }

    public function toTurboSMS($notifiable)
    {
        return (new TurboSMSMessage($this->body));
    }
}
