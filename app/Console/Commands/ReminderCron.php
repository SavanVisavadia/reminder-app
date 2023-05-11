<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

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
        $newDateTime = Carbon::now()->subMinutes(1);
       $users = User::all();
     
	
	foreach($users as $user) {

        $reminder = Reminder::get();
        
        foreach($reminder as $val){
            if ($val->reminder > $newDateTime && $val->reminder < $now) {
        
                $email = $user->email;
                $msg = $val->description;
                dd($msg);
                Mail::raw($msg, function ($message) use ($email) {
                    $message->to($email);
                    $message->subject('Reminder');
                });
            }
        }
		
	}
       
       
    }
}
