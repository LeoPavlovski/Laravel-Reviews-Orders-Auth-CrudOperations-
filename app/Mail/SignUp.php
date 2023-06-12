<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SignUp extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;
    public $user_surname;
    public $book;
    public $author;
    /**
     * Create a new message instance.
     */
    public function __construct($user_name, $user_surname, $book, $author)
    {
        //Assign the values here.
        $this->user_name=$user_name;
        $this->user_surname=$user_surname;
        $this->book=$book;
        $this->author=$author;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sign Up',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->markdown('SignUp');
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
