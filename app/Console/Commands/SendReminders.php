<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContractReminderMail;

class SendReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Envoyer les rappels de contrats par email';

    public function handle()
    {
        $today = now()->toDateString();
        $reminders = Reminder::where('reminder_date', $today)->with('contract')->get();

        foreach ($reminders as $reminder) {
            $contract = $reminder->contract;

            if ($contract && $contract->email) {
                Mail::to($contract->email)->send(new ContractReminderMail(
                    $contract->title,
                    $contract->description,
                    $contract->start_date,
                    $contract->end_date
                ));
            }
        }


        $this->info('Rappels envoyés : ' . $reminders->count());
    }
}
