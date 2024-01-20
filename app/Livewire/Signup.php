<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;


class Signup extends Component
{

    public $form = [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];

    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.name'     => 'required',
            'form.password' => 'required|confirmed',
        ]);
        User::create($this->form);
        return redirect('login');
    }


    public function render()
    {
        return view('livewire.signup');
    }
}
