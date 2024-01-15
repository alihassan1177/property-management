<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\InvoiceCreated;
use Illuminate\Support\Facades\Notification;

class EmailReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email_reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', 'ah927481@gmail.com')->first();
        Notification::send($user, new InvoiceCreated());
    }
}
