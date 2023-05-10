<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Mail;
class ReminderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $now = Carbon::now();
       
       if (Reminder::where('reminder', $now)) {
        
        $email = "vivek.sakhiya@drcsystems.com";
        $msg = "mail send testing";
        Mail::raw($msg, function ($message) use ($email) {
            $message->to($email);
            $message->subject('test');
        });
    }
    }
}
