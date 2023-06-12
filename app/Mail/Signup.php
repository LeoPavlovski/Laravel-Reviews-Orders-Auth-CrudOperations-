<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Signup extends Mailable
{
    use Queueable, SerializesModels;
    public $surname;
    public $name;
    public $book;
    public $order;
    public $author;


    /**
     * Create a new message instance.
     */
    public function __construct($name,$surname, $book , $order, $author)
    {
        //Display the properties in the mail function
        $this->surname = $surname;
        $this->name = $name;
        $this->order = $order;
        $this->book = $book;
        $this->author= $author;

    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Signup',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build(){
        return $this->markdown('Signup');
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
