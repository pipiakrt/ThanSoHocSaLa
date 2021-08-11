<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class guiLuanGiaiPDF extends Mailable
{
    use Queueable, SerializesModels;

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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        return $this->view('mail.guiPDF', compact('user'))->attach($this->path);
    }
}
