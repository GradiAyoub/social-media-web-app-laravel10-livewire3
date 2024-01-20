<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Comment;
use App\Models\Report;




class PostC extends Component
{
    public $post;
    public $user;
    public $liked;
    public $disliked;
    public $reported;
    public $commentText;
    public $message;
  
    public function mount($id){
        $this->post= Post::find($id);
    }

    public function like(){
        if( $this->liked){
            $like = Like::where([['user_id',  $this->user->id], ['post_id', $this->post->id ] ])->delete();
            return redirect()->to('/');

        }else{
            if( $this->disliked){
                $dislike = Dislike::where([['user_id',  $this->user->id], ['post_id', $this->post->id ] ])->delete();
            }
            $like=Like::create([
                'post_id'=> $this->post->id,
                'user_id'=>   $this->user->id
            ]);
        }
    }

    public function dislike(){
        if( $this->disliked ){
            $dislike = Dislike::where([['user_id',$this->user->id], ['post_id', $this->post->id ] ])->delete();
            return redirect()->to('/');
            
        }else{
            if( $this->liked){
                $like = Like::where([['user_id',$this->user->id], ['post_id', $this->post->id ] ])->delete();
            }
            $dislike=Dislike::create([
                'post_id'=> $this->post->id,
                'user_id'=> $this->user->id
            ]);
        }
    }

    public function report(){
        if( $this->reported ){
            $report= Report::where([['user_id',$this->user->id], ['post_id', $this->post->id ] ])->delete();
        }else{
            $report= Report::create([
                'post_id'=> $this->post->id,
                'user_id'=> $this->user->id
            ]);
        }
    }

    public function addComment(){
        $comment=Comment::create([
            'post_id'=> $this->post->id,
            'user_id'=> $this->user->id,
            'text'   => $this->commentText,
        ]);
    }

    public function deleteComment($id){
        $comment=Comment::find($id)->delete();
    }

    public function deletePost($id){
        $post=Post::find($id)->delete();
        return redirect('/');

    }

    public function render()
    {
        $this->user= Auth::user();
        $this->post->liked= Like::where([['user_id', $this->user->id], ['post_id', $this->post->id ] ] )->exists();
        $this->liked= $this->post->liked;
        $this->post->disliked= Dislike::where([['user_id', $this->user->id], ['post_id', $this->post->id ] ] )->exists();
        $this->disliked= $this->post->disliked;
        $this->post->reported= Report::where([['user_id', $this->user->id], ['post_id', $this->post->id ] ] )->exists();
        $this->reported= $this->post->reported;
        return view('livewire.post', ['post'=> $this->post])->layout('layout', ['user' => $this->user]);
    }
}
