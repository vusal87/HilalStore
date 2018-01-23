<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\istifadeci;

class IstifadeciQeydiyyatMail extends Mailable
{
    use Queueable, SerializesModels;
    public $istifadeci;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Istifadeci $istifadeci)
    {
        $this->istifadeci=$istifadeci;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->subject(config('app.name') . '- Istifadeci Qeydiyyati')
            ->view('FrontEnd/mail.istifadeciQeydiyyatMail');
    }
}
