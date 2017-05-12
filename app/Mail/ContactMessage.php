<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contact;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'message' => $this->contact->message,
            'order_reference' => $this->contact->order_reference,
            'from' => !is_null($this->contact->user_id) ? $this->contact->user->name : 'Guest'
        ];

        return $this
                ->from($this->contact->email_from)
                ->view('emails.contact')
                ->with('data', $data)
        ;
    }
}
