<?php

namespace Tests\Feature;

use App\Mail\ContectEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContectFormTest extends TestCase
{

    public function test_main_page_contains_contect_form_livewire_component(): void
    {
        $response = $this->get('/');

        $response->assertSeeLivewire('contect-form');
    }

    public function contect_form_sends_out_an_email()
    {

        Livewire::test(ContectForm::class)

            ->set('first_name', 'prince')
            ->set('last_name', 'suhagiya')
            ->set('email', 'princesuvagiya88@gmail.com')
            ->set('phone', '12345')
            ->set('message', 'This is my message')
            ->call('submitForm')
            ->assetSee('This Contect Form is successFully Submited!');


        Mail::assertSend(function (ContectEmail $mail) {

            $mail->build();

            return $mail->hasTO('princesuhagiya191@gmail.com') &&
                $mail->hasFrom('princesuvagiya88@gmail.com') &&
                $mail->subject === 'Contect Form Submission';
        });
    }
}
