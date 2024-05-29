<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestFormBlade extends Mailable
{
    use Queueable, SerializesModels;
    public $mail;

    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Request Sistemi | Antalya Bilim Üniversitesi',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('backend.email.request-form-email')
            ->with([
                'title' => $this->mail['title'],
                'tableData' => $this->mail['tableData'],
            ])
            ->subject('Laravel Email with Array Test');
    }
}
