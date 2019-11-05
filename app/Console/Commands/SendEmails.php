<?php

namespace App\Console\Commands;

use App\Mail\AdminEmail;
use App\Preorder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $not_send_preorders = Preorder::where('send', 0)->get();
        foreach ($not_send_preorders as $preorder) {
            Mail::to(config('mail.from.address'))->send(new AdminEmail($preorder));
            $preorder->send = true;
            $preorder->save();
        }
    }
}
