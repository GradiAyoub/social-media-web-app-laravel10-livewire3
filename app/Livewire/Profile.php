<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Friend;
use App\Models\Invitation;




class Profile extends Component
{
    public $user;
    public $userCard;
    public $relation;

    public function mount($id){
        $this->userCard= User::find($id);
        $this->user= Auth::user();

        $this->userCard->posts= Post::where('user_id', $id)->pluck('id');

        $friends1= Friend::where('user1_id', $id)->pluck('user2_id');
        $friends2= Friend::where('user2_id', $id)->pluck('user1_id');
        $this->userCard->friends= $friends1->merge($friends2);

        $this->userCard->sentInvitation= Invitation::where('user_sender_id', $id)->pluck('user_received_id');
        $this->userCard->receivedInvitation= Invitation::where('user_received_id', $id)->pluck('user_sender_id');

        
    }


    public function accept(){
        Invitation::where([['user_received_id',  $this->user->id], ['user_sender_id', $this->userCard->id ] ])->delete();
        Friend::create([
            'user1_id' =>  $this->user->id,
            'user2_id' =>  $this->userCard->id,
        ]);
    }

    public function removeFriend(){
        $friend= Friend::where([['user1_id',  $this->user->id], ['user2_id', $this->userCard->id ] ])
                ->orWhere([['user2_id',  $this->user->id], ['user1_id', $this->userCard->id ] ])->delete();
    }

    public function sendInvitation(){
        Invitation::create([
            'user_sender_id' =>  $this->user->id,
            'user_received_id' =>  $this->userCard->id,
        ]);
    }

    public function cancelInvitation(){
       $invitation= Invitation::where([['user_sender_id',  $this->user->id], ['user_received_id', $this->userCard->id ] ])->delete();
    }

    public function declineInvitation(){
        $invitation= Invitation::where([['user_received_id',  $this->user->id], ['user_sender_id', $this->userCard->id ] ])->delete();
    }

    public function render()
    {
        $this->user= Auth::user();

        $isFriend= Friend::where([['user1_id',  $this->user->id], ['user2_id', $this->userCard->id ] ])
        ->orWhere([['user2_id',  $this->user->id], ['user1_id', $this->userCard->id ] ])->exists();
        
        if($isFriend){
            $this->relation= 'friends';
        }else if(Invitation::where([['user_sender_id',  $this->user->id], ['user_received_id', $this->userCard->id ] ])->exists() ) {
            $this->relation= 'sender';
        }else if(Invitation::where([['user_received_id',  $this->user->id], ['user_sender_id', $this->userCard->id ] ])->exists()){
            $this->relation= 'receiver';
        }else{
            $this->relation= 'nothing';
        }        

        $this->userCard->relation= $this->relation;
        return view('livewire.profile', ['profile' => $this->userCard])->layout('layout', ['user' => $this->user]);;
    }
}
