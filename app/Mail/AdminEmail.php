<?php

namespace App\Mail;

use App\Preorder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $preorder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Preorder $preorder)
    {
        $this->preorder = $preorder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.preorder')->with([
            'user_name' => $this->preorder->name,
            'user_email' => $this->preorder->email,
        ]);
    }
}
