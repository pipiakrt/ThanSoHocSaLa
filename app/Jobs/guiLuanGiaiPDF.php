<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\guiLuanGiaiPDF as sendMail;
use Mail;

class guiLuanGiaiPDF
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $path)
    {
        $this->user = $user;
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new sendMail($this->user, $this->path);
        $mail->subject('File Luận Giải - Thần Số Học Sala');
        $mail->from(env('MAIL_USERNAME'), 'Thần Số Học Sala');
        Mail::to($this->user['email'])->send($mail);
    }
}
