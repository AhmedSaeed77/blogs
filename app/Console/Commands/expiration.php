<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire for user every 5 minutes automatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('expire',0)->get();
        foreach($users as $user)
        {
            Mail::to($user->email)->send(new \App\Mail\MailTest());
        }
    }
}
