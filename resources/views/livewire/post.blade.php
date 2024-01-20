<div class="container" style="padding: 30px 260px;">
        <div class="card m-5 shadow">
          <div class="card-header text-white postHeader">
            <div class="row">
              <div class="col-2">
                  <img src="{{url('storage/' . $post->user->img)}}" alt="" width="60px" height="60px" class="rounded-circle">
              </div>
              <div class="col-8">
                  <h5>{{$post->user->name}}</h5>
                  <span>created at : {{$post->created_at}}</span>
              </div>
              <div class="col-2">
                @if($post->user_id=== $user->id)
                  <button type="button" class="btn btn-light mt-2" id="btnLight" wire:click="deletePost({{$post->id}})" wire:confirm="Are you sure you want to delete this post ?">delete</button>  
                @endif
              </div>
            </div>
          </div>
          <div class="card-body  text-center profileHeader">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->text}}</p>
            @if($post->img)
              <img src="{{url('storage/' . $post->img)}}" alt="" width="500px" height="400px" class="rounded">
            @endif
            <br>
            <div class="card-footer row">
              <div class="col-4">
                @if ($post->reported)
                  <button type="button" class="btn btn-dark"  wire:click="report">{{count($post->reports)}} report</button>
                @else
                  <button type="button" class="btn btn-light" id="btnLight" wire:click="report">{{count($post->reports)}} report</button>  
                @endif
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-dark" data-bs-toggle="collapse" data-bs-target="{{'#collapse'. $post->id}}" aria-expanded="false" aria-controls="{{'collapse'. $post->id}}">{{count($post->comments)}} comments</button>
              </div>
              <div class="col-4">
              @if ($post->liked)
                <button type="button" class="btn btn-dark" wire:click="like">{{count($post->likes)}} like</button>
              @else
                <button type="button" class="btn btn-light" id="btnLight" wire:click="like">{{count($post->likes)}} like</button>  
              @endif

              @if ($post->disliked)
                <button type="button" class="btn btn-dark" wire:click="dislike">{{count($post->dislikes)}} dislike</button>
              @else
                <button type="button" class="btn btn-light" id="btnLight" wire:click="dislike">{{count($post->dislikes)}} dislike</button>  
              @endif
              </div>
            </div>
          </div>

          <div class="collapse row p-2" id="{{'collapse'. $post->id}}">
          
            <div class="input-group px-5 py-3">
              <input type="text" wire:model="commentText" class="form-control" placeholder="comment">
              <button wire:click="addComment" class="btn btn-dark">add</button>
            </div>
            @forelse ($post->comments as $comment)
              <div class="col-12 row">
                <div class="col-2">
                  <img src="{{url('storage/'. $comment->user->img )}}" alt="" width="60px" height="60px" class="rounded-circle">
                </div>
                <div class="col-8">
                  <h5>{{ $comment->user->name}}</h5>
                  <span>{{$comment->text}}</span>
                </div>
                <div class="col-2">
                  @if($comment->user_id=== $user->id)
                    <button type="button" class="btn btn-light" wire:click="deleteComment({{$comment->id}})" wire:confirm="Are you sure you want to delete this comment ?">delete</button>  
                  @endif
                </div>
              </div>
            @empty
              <p class="py-2 px-4">No comments</p>
            @endforelse

        

           

            
          

          </div>




        </div>
      </div>