<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Mail\SendMailable;
use App\Events\PreorderAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendPreorderNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PreorderAdded  $event
     * @return void
     */
    public function handle(PreorderAdded $event)
    {
        Mail::to($event->preorder->email)->send(new SendMailable($event->preorder));
    }
}
