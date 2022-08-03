<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        dd($data);
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        return $this->from('admin@ecommerce.com')
            ->view('emails.order_mail')
            ->with('content',$this->data);
    }
}
