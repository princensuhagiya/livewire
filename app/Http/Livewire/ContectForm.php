<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContectForm extends Component
{

    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $message;
    public $successMessage;

    protected $rules = [
        'firstName' => 'required|',
        'lastName' => 'required|min:4',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        Contact::create([

            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],

        ]);

        $this->resetForm();
        $this->successMessage = 'This Contect Form is successFully Submited!';
    }
    private function resetForm()
    {
        $this->firstName = null;
        $this->lastName = null;
        $this->email = null;
        $this->phone = null;
        $this->message = null;
    }
    public function render()
    {
        return view('livewire.contect-form');
    }
}
