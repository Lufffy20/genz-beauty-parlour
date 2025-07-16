<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $desc;

    public function __construct($email, $desc)
    {
        $this->email = $email;
        $this->desc = $desc;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Confirmation - GenZ Beauty'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'appointmentemail',
            with: [
                'email' => $this->email,
                'desc' => $this->desc,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
