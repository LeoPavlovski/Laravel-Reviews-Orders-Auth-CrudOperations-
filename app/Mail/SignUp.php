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


    /**
     * Create a new message instance.
     * $table->string('name');
    $table->string('nickname')->nullable();
    $table->date('date_of_birth');
    $table->unsignedBigInteger('agent_id');
    $table->foreign('agent_id')->references('id')->on('agents');
     */
    public $name;
    public $date;
    public $agent_id;
    public $nickname;
    public function __construct($name,$date,$agent_id, $nickname)
    {
        $this->name =$name;
        $this->date = $date;
        $this->agent_id = $agent_id;
        $this->nickname = $nickname;
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
        return $this->markdown('SignUpView');
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
