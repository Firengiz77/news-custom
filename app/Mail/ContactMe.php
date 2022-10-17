<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    private $dataReceived;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dataReceived = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from(env('MAIL_USERNAME'), 'LAravel test')
        ->subject('Laravel Confirmation')
        ->view('email-template')
        ->with([
            'name' => 'New Mailtrap User',
            'link' => 'https://mailtrap.io/inboxes'
        ]);

        return $this->view('email-template');
    }
}
