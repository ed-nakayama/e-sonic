<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeEmail extends Notification
{
    use Queueable; 
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
            ->subject('【イーソニック】メールアドレス変更') // 件名
            ->view('emails.changeEmail') // メールテンプレートの指定
            ->action(
                'メールアドレス変更',
                url('cust/reset', $this->token) //アクセスするURL
            );
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
