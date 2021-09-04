<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\successOrder as sendMail;
use Mail;

class successOrder
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new sendMail($this->order);
        $mail->subject('Đã Kích Hoạt Đơn Hàng - Thần Số Học Sala');
        $mail->from(env('MAIL_USERNAME'), 'Thần Số Học Sala');
        Mail::to($this->order['email'])->send($mail);
    }
}
