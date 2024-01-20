<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Users extends Component
{
    public function render()
    {
        $this->user= Auth::user();
        $users= User::where('id', '<>', $this->user->id)->pluck('id');
        return view('livewire.users',  ['users'=> $users])->layout('layout', ['user' => $this->user]);
    }
}
