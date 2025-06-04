<?php

namespace App\Jobs;

use App\Models\Contract;
use App\Mail\RappelEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ContractReminderMail;

class RappelEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contractId;
    protected $email;

    public function __construct($contractId, $email)
    {
        $this->contractId = $contractId;
        $this->email = $email;
    }


    public function handle()
    {
        $contract = Contract::findOrFail($this->contractId);

        Mail::to($this->email)
            ->bcc('monitoring@gmail.com')
            // ->replyTo('noreply@ubagroup.com')
            ->queue(new ContractReminderMail(
                $contract->title,
                $contract->description,
                $contract->start_date,
                $contract->end_date
            ));
    }
}
