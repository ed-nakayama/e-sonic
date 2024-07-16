<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class RepairRequest extends Mailable
{
    use Queueable, SerializesModels;

    // 下記を追記
    /**
     * メール送信引数
     *
     * @var array
     */
    private $customer;
    private $prodList;
    private $content;
    // 上記までを追記

    // 下記内容を修正
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer ,$prodList, $content)
    {
        $this->customer = $customer;
        $this->prodList = $prodList;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $from = config('const.mail_from_address');
		$to = array($this->customer->email, $from);

	    return $this->to($to)       // 送信先アドレス
    	    ->subject('【イーソニック】修理依頼')        // 件名
        	->text('mail_templates.repair_request') // 本文
        	->with(['customer' => $this->customer,
        			'prodList' => $this->prodList,
        			'content' => $this->content,
        			]);       // 本文に送る値
    }

}