<?php

namespace Tests\Feature;

use App\Livewire\Contact;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_page_renders_with_form_and_locations(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSeeLivewire(Contact::class)
            ->assertSee('Vorbește cu noi')
            ->assertSee('Trimite mesajul')
            ->assertSee('Baia Mare')
            ->assertSee('Petrova')
            ->assertSee('Poienile de sub Munte')
            ->assertSee('csvictoriamm@gmail.com')
            ->assertSee('0734 411 115')
            ->assertDontSee('google.com/maps');
    }

    public function test_form_validates_required_fields(): void
    {
        Mail::fake();

        Livewire::test(Contact::class)
            ->set('name', '')
            ->set('email', 'not-an-email')
            ->set('message', 'too short')
            ->set('gdpr', false)
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'email',
                'message' => 'min',
                'gdpr' => 'accepted',
            ]);

        Mail::assertNothingSent();
    }

    public function test_valid_submission_sends_mail_and_resets_form(): void
    {
        Mail::fake();

        Livewire::test(Contact::class)
            ->set('name', 'Ion Popescu')
            ->set('email', 'ion@example.com')
            ->set('phone', '0712 345 678')
            ->set('discipline', 'Freestyle Kickboxing')
            ->set('message', 'Salut, vreau să vin la o sesiune de probă.')
            ->set('gdpr', true)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('sent', true)
            ->assertSet('name', '')
            ->assertSet('email', '')
            ->assertSet('message', '');

        Mail::assertSent(ContactFormSubmission::class, function (ContactFormSubmission $mail) {
            $this->assertSame('Ion Popescu', $mail->payload['name']);
            $this->assertSame('ion@example.com', $mail->payload['email']);
            $this->assertSame('Freestyle Kickboxing', $mail->payload['discipline']);

            return $mail->hasTo('csvictoriamm@gmail.com')
                && str_contains($mail->envelope()->subject, 'Ion Popescu');
        });
    }

    public function test_optional_fields_can_be_blank(): void
    {
        Mail::fake();

        Livewire::test(Contact::class)
            ->set('name', 'Maria')
            ->set('email', 'maria@example.com')
            ->set('message', 'Mesaj suficient de lung pentru validare.')
            ->set('gdpr', true)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('sent', true);

        Mail::assertSent(ContactFormSubmission::class, function (ContactFormSubmission $mail) {
            return $mail->payload['phone'] === null
                && $mail->payload['discipline'] === null;
        });
    }
}
