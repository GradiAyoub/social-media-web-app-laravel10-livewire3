<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Post;
use App\Models\User;


class Search extends Component
{
    public $searchText; 
    public $posts=[]; 
    public $users= []; 

    public function rendered()
    {
        $this->searchText='';
        $this->posts= [];
        $this->users= [];
    }

    public function search()
    {
        if($this->searchText){
            $this->posts= Post::where('title', 'like', '%' .$this->searchText. '%')->get();
            $this->users= User::where('name', 'like', '%' .$this->searchText. '%')->get();
        }
       
    }

    public function render()
    {
        return view('livewire.search',['posts'=> $this->posts, 'users'=> $this->users]);
    }
}
