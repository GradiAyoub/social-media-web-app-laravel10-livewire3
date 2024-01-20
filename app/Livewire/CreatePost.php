<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class CreatePost extends Component
{
    use WithFileUploads;

    #[Rule('image|max:4000')]
    public $img;
    public $title;
    public $text;



    public function submit()
    {
        $user= Auth::user();

        $this->validate([
            'title'     => 'required',
        ]);

        if($this->img){
            $imgName=  Auth::id() . date("-ymd-Gis") . 'po.' . $this->img->getClientOriginalExtension();
            $this->img->storeAs('public',$imgName);
            $post = Post::create([
                'user_id' => $user->id,
                'title' => $this->title,
                'text' => $this->text,
                'img' => $imgName,
            ]);
        return redirect('/');

        }else{
            $post = Post::create([
                'user_id' => $user->id,
                'title' => $this->title,
                'text' => $this->text,
            ]);
             return redirect('/');
        }      
    }

    public function render()
    {
        $user= Auth::user();
        return view('livewire.create-post')->layout('layout', ['user' => $user]);
    }
}
