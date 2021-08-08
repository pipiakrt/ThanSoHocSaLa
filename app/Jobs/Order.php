<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\Order as sendMail;
use Mail;

class Order
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
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
        $mail->subject('Thần Số Học Sala đã nhận đơn hàng: #' . $this->order['code']);
        $mail->from(env('MAIL_USERNAME'), 'Thần Số Học Sala');
        Mail::to($this->order['email'])->send($mail);
    }
}
