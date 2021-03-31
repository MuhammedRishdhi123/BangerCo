<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;
   
    public $name;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$status)
    {
        $this->name = $name;
        $this->status=$status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bangercosl@gmail.com')
                    ->subject('Banger Co. registration')
                    ->view('Mails.RegisterEmail')
                    ->with(
                    [
                            'name' => $this->name,
                            'status' => $this->status,
                    ]);
    }
}