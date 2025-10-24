<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->to('admin@example.com')  // Адрес администратора
                    ->subject('Новая заявка с контактной формы')
                    ->view('emails.contact')          // Представление для письма
                    ->with([
                        'name' => $this->contact->name,
                        'phone' => $this->contact->phone,
                        'email' => $this->contact->email,
                    ]);
    }
}
