<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;


class Login extends Component
{

    public $form = [
        'email'   => '',
        'password'=> '',
    ];

    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.password' => 'required',
        ]);


        if (Auth::attempt($this->form, true)) {
            session()->regenerate();
            return redirect('');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
