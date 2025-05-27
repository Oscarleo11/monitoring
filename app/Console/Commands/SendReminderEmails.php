<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use App\Mail\ContractReminderMail;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Envoyer les emails de rappel prévus pour aujourd\'hui';

    public function handle()
    {
        $today = now()->toDateString();
        $reminders = Reminder::whereDate('reminder_date', $today)->get();

        foreach ($reminders as $reminder) {
            Mail::to($reminder->email)->send(new ContractReminderMail($reminder));
        }

        $this->info("Rappels envoyés pour $today");
    }
}
