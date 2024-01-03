<?php

namespace App\Http\Services;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class EmailService
{
  public static function send_email(string $email, string $text)
  {
    Mail::raw($text, function(Message $message) use($email) {
      $message->to($email)->from('mesrop.araqelyan.04@yandex.ru');
    });
  }
}