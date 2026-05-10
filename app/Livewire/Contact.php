<?php

namespace App\Livewire;

use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Contact | Club Sportiv Victoria Maramureș')]
class Contact extends Component
{
    #[Validate('required|string|min:2|max:100')]
    public string $name = '';

    #[Validate('required|email:rfc|max:150')]
    public string $email = '';

    #[Validate('nullable|string|max:30')]
    public string $phone = '';

    #[Validate('nullable|string|max:60')]
    public string $discipline = '';

    #[Validate('required|string|min:10|max:2000')]
    public string $message = '';

    #[Validate('accepted')]
    public bool $gdpr = false;

    public bool $sent = false;

    public function submit(): void
    {
        $data = $this->validate();

        $key = 'contact-form:'.(request()->ip() ?? 'unknown');

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $this->addError('message', 'Ai trimis prea multe mesaje. Te rugăm să încerci din nou în câteva minute.');

            return;
        }

        RateLimiter::hit($key, 600);

        Mail::to('csvictoriamm@gmail.com')->send(new ContactFormSubmission([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?: null,
            'discipline' => $data['discipline'] ?: null,
            'message' => $data['message'],
        ]));

        $this->reset(['name', 'email', 'phone', 'discipline', 'message', 'gdpr']);
        $this->sent = true;
    }

    public function resetForm(): void
    {
        $this->sent = false;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
