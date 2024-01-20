<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class ChangeProfile extends Component
{
    use WithFileUploads;

    public $form = [
        'name' => '',
        'info' => ''   
    ];
    #[Rule('image|max:4000')]
    public $img;

    public function submit()
    {
        $this->validate([
            'form.name'     => 'required',
        ]);

        User::where('id', Auth::id())->update([
            'name' => $this->form['name'],
            'info' => $this->form['info'],
        ]);

        if($this->img){
            $imgName=  Auth::id() . date("-ymd-Gis") . 'pr.' . $this->img->getClientOriginalExtension();
            $this->img->storeAs('public',$imgName);
            User::where('id', Auth::id())->update([ 'img'=> $imgName ]);
        }
    }

    public function render()
    {
        $user= Auth::user();
        $this->form=[
            'name' => $user->name,
            'info' => $user->info,
        ];

        return view('livewire.change-profile')->layout('layout', ['user' => $user]);
    }
}
