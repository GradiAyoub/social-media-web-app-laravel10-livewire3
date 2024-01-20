  <div>
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Search here to find posts and users</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body container">

    <div class="input-group px-5 py-3">
      <input type="text" wire:model="searchText" class="form-control">
      <button wire:click="search" class="btn btn-dark">search</button>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <h3 class="text-center"> {{count($posts)}} posts</h3>
        @foreach ($posts as $post)
          <div class="row m-1 searchResullt">
            <div class="col-2">
                <img src="{{url('storage/' . $post->user->img)}}" alt="" width="60px" height="60px" class="rounded-circle">
            </div>
            <div class="col-8">
                <a class="h5 text-decoration-none" href="{{url('/profile/'. $post->user->id)}}">{{$post->user->name}}</a><br>
                <a class="h5 text-decoration-none" href="{{url('/post/'. $post->id)}}">{{$post->title}}</a>
            </div>
          </div>
        
            
        @endforeach
      </div>

      <div class="col-sm-6">
        <h3 class="text-center"> {{count($users)}} users</h3>
        @foreach ($users as $user)
        <a class="h5 text-decoration-none" href="{{url('/profile/'. $user->id)}}">
          <div class="row m-1 searchResullt">
            <div class="col-2">
                <img src="{{url('storage/' . $user->img)}}" alt="" width="60px" height="60px" class="rounded-circle">
            </div>
            <div class="col-8">
                <h5>{{$user->name}}</h5>
                <span>created at : {{$user->created_at}}</span>
            </div>
          </div>
        </a>
     
        @endforeach

      </div>
    </div>
  </div>
</div>