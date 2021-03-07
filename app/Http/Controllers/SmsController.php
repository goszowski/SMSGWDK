<?php

namespace App\Http\Controllers;

use App\Notifications\SmsNotification;
use Notification;

class SmsController extends Controller
{
    public function send(string $key, $phone)
    {
        $message = env($key);

        Notification::route('turbosms', $phone)
            ->notify(new SmsNotification($message));
    }
}
