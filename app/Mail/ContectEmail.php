<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ContectEmail extends Mailable
{

    public $contact = [];
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $message;


    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($contact)
    {
        $this->firstName = $contact['first_name'];
        $this->lastName = $contact['last_name'];
        $this->email = $contact['email'];
        $this->phone = $contact['phone'];
        $this->message = $contact['message'];
    }


    public function build()
    {

        return $this->from($this->email)
            ->subject('Contect Form Submission')
            ->markdown('emails.contect-email');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contect Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contect-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
