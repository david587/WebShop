<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $shipping;
    public $order;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email, $shipping, $order)
    {
        $this->user = $user;
        $this->shipping= $shipping;
        $this->order = $order;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->subject('Order details')
                    ->view('emails.order-submitted');
    }
}
