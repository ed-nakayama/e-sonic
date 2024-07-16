<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactLP extends Mailable
{
    use Queueable, SerializesModels;

    // 下記を追記
    /**
     * メール送信引数
     *
     * @var array
     */
    private $name;
    private $mail;
    private $title;
    private $content;
    // 上記までを追記

    // 下記内容を修正
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mail, $title, $content)
    {
		$this->name    = isset($name)     ? $name    : '';
		$this->mail    = isset($mail)     ? $mail    : '';
		$this->title   = isset($title)    ? $title : '';
		$this->content = isset($content)  ? $content  : '';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = config('const.mail_from_address');
		$to = array($this->mail, $from);

	    return $this->to($to)       // 送信先アドレス
    	    ->subject('【イーソニック】' . $this->title . 'のお問い合わせ')        // 件名
        	->text('mail_templates.contact_lp') // 本文
        	->with([
        		'name' => $this->name,
        		'mail' => $this->mail,
        		'title' => $this->title,
        		'content' => $this->content
        	]
        	);       // 本文に送る値
    }

}