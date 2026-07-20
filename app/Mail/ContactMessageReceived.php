<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Plain-text notification sent to the site inbox when a visitor submits the
 * contact form. Reply-To is set to the visitor so a reply goes straight back.
 *
 * Note: the property is named $inquirySubject (not $subject) because the
 * Mailable parent already declares a $subject of its own.
 */
class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $inquirySubject,
        public string $body,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->inquirySubject
                ? '[Contact] '.$this->inquirySubject
                : '[Contact] New message from '.$this->name,
            replyTo: [$this->email => $this->name],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.contact',
            with: [
                'subject' => $this->inquirySubject,
            ],
        );
    }
}
