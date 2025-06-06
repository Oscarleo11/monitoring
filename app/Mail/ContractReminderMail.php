<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContractReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $description;
    public $startDate;
    public $endDate;

    public function __construct($title, $description, $startDate, $endDate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function build()
    {
        return $this->from('noreply@gmail.com', 'UBA Group') // Définit l'expéditeur
                   ->replyTo('noreply@gmail.com') // Définit l'adresse de réponse
                   ->subject('UBA Compliance Monitoring : ' . $this->title)
                   ->view('emails.reminder')
                   ->with([
                       'title' => $this->title,
                       'description' => $this->description,
                       'startDate' => $this->startDate,
                       'endDate' => $this->endDate,
                   ]);
    }
}

