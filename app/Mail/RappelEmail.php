<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RappelEmail extends Mailable
{
    public $contract;

    public function __construct($contract)
    {
        $this->contract = $contract;
    }

    public function build()
    {
        return $this->subject('⏰ Rappel de fin de contrat')
            ->view('emails.reminder')
            ->with(['title' => $this->contract->title, 'end_date' => $this->contract->end_date]);
    }
}
