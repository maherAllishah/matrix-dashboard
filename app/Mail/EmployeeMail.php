<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): EmployeeMail
    {
        return $this->view('admin.email._email')
            ->subject('A New Contact Message From Matrix Company')
            ->from('Ali-alajee@matrix-erp.sy')
            ->with('request', $this->request);
    }
}
