<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $email = $this->subject($this->details['subject'])
            ->view('emails.contact')
            ->with('details', $this->details);

        if (!empty($this->details['resume'])) {
            $email->attachFromStorage('public/' . basename($this->details['resume']), basename($this->details['resume']));
        }

        return $email;
    }
}
