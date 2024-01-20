<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class Posts extends Component
{
    public $user;

    public function render()
    {
        $this->user= Auth::user();
        $posts= Post::pluck('id');
        return view('livewire.posts', ['posts'=> $posts])->layout('layout', ['user' => $this->user]);
    }
}
