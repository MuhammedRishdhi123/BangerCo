<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComplaintEmail extends Mailable
{
    use Queueable, SerializesModels;
   

    public $date;
    public $licenseNo;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date,$licenseNo,$email)
    {
        $this->date=$date;
        $this->licenseNo=$licenseNo;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bangercosl@gmail.com')
                    ->subject('Banger Co. Complaint')
                    ->view('Mails.ComplaintEmail')
                    ->with(
                    [
                            'date' => $this->date,
                            'licenseNo'=>$this->licenseNo,
                            'email'=>$this->email,
                    ]);
    }
}