<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $email;
    public $phone;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$message,$email,$phone)
    {
        //
        $this->name = $name;
        $this->message = $message;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('vendor.mail.contact_us');
        return $this->from(env('MAIL_USERNAME'))
            ->subject('Contact Us')
            ->markdown('vendor.mail.contact_us');
    }
}
