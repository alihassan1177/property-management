<?php

namespace App\Console\Commands;

use App\Enums\Util;
use App\Mail\EmailReminderMail;
use Illuminate\Console\Command;
use App\Models\{User, EmailReminder, Tenant};
use App\Notifications\InvoiceCreated;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


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
        $email_reminders = EmailReminder::whereDate('reminder_date', '=', now())->where('reminder_sent', Util::No)->get();
        // dd($email_reminders->toArray());

        foreach ($email_reminders as $email_reminder) {
            $reminder_time = Carbon::parse($email_reminder->reminder_date);
            $current_time = Carbon::parse(now());

            // dd($reminder_time->isoFormat('LLL'));
            // dd($current_time->isoFormat('LLL'));

            if ($current_time->hour == $reminder_time->hour && $current_time->minute == $reminder_time->minute) {
                try {
                    info("SENDING MAIL TO : " . $email_reminder->email . PHP_EOL);
                    Mail::to($email_reminder->email)->send(new EmailReminderMail());
                    $email_reminder->update(['reminder_sent' => Util::Yes]);
                    info("MAIL SENT" . PHP_EOL);
                } catch (\Exception $e) {
                    info("EMAIL REMINDER COMMAND ERROR : " . $e->getMessage());
                }
            } else {
                info("NO MATCH EMAIL : " . $email_reminder->email . PHP_EOL);
            }
        }
    }
}
