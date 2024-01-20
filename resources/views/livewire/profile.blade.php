<div>

    <div class="container p-3 my-3 shadow profileHeader">
        <div class="text-center row">
            <div class="col-3"></div>
            <div class="col-6 row">
                <img src="{{ url('storage/'. $profile->img)}}" alt="" width="230px" height="270px" class="rounded-circle col-sm-6">
                <div class="col-sm-6 pt-5">
                    <h5>{{$profile->name}}</h5>
                    <p>{{$profile->info}}</p>
                    <p>created at {{$profile->created_at}}</p>

                    @if($user->id != $profile->id)
                      @switch($userCard->relation)
                      @case('friends')
                      <button type="button" wire:click="removeFriend" class="btn ">remove friend</button>
                      @break

                      @case('sender')
                      <button type="button" wire:click="cancelInvitation" class="btn btn-dark">cancel invitation</button>
                      @break

                      @case('receiver')
                      <button type="button" wire:click="accept" class="btn btn-dark p-2 mb-1">accept invitation</button>
                      <button type="button" wire:click="declineInvitation" class="btn btn-dark p-2">decline invitation</button>
                      @break

                      @default
                      <button type="button" wire:click="sendInvitation" class="btn btn-dark">send invitation</button>
                      @endswitch
                    @endif


                </div>
            </div>
            <div class="col-3"></div>
        </div>

        <nav class="p-2">
        <div class="nav nav-pills justify-content-center" id="nav-tab" role="tablist">
          <button class="btn  active m-1" id="nav-posts-tab" data-bs-toggle="tab" data-bs-target="#nav-posts" type="button" role="tab" aria-controls="nav-posts" aria-selected="true">posts</button>
          <button class="btn m-1" id="nav-friends-tab" data-bs-toggle="tab" data-bs-target="#nav-friends" type="button" role="tab" aria-controls="nav-friends" aria-selected="false">friends</button>
          @if($user->id=== $profile->id)
            <button class="btn m-1" id="nav-sentInvitation-tab" data-bs-toggle="tab" data-bs-target="#nav-sentInvitation" type="button" role="tab" aria-controls="nav-sentInvitation" aria-selected="false">sent invitation</button>
            <button class="btn m-1" id="nav-receivedInvitation-tab" data-bs-toggle="tab" data-bs-target="#nav-receivedInvitation" type="button" role="tab" aria-controls="nav-receivedInvitation" aria-selected="false">received invitation</button>
            @endif
        </div>
      </nav>
    </div>


    <div class="container  p-3">
    


      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
          <livewire:CreatePost />
          <div class="row">
            @if($profile->posts)
              @forelse ($profile->posts as $id)
                <livewire:PostC :$id :key="$id" />
              @empty
              <div class="alert alert-danger my-3 mx-5">No posts</div>
              @endforelse
            @endif
          </div>
        </div>

        <div class="tab-pane fade row" id="nav-friends" role="tabpanel" aria-labelledby="nav-friends-tab">
              @if($profile->friends)
                @forelse ($profile->friends as $id)
                    <livewire:UserCard :$id :key="$id" />
                @empty
                  <div class="alert alert-danger my-3 mx-5">No users</div>
                @endforelse
              @endif
        </div>

        @if($user->id=== $profile->id)
          <div class="tab-pane fade" id="nav-sentInvitation" role="tabpanel" aria-labelledby="nav-sentInvitation-tab">
            @if($profile->sentInvitation)
              @forelse ($profile->sentInvitation as $id)
                <livewire:UserCard :$id :key="$id" />
              @empty
                <div class="alert alert-danger my-3 mx-5">No users</div>
              @endforelse
            @endif

          </div>

          <div class="tab-pane fade" id="nav-receivedInvitation" role="tabpanel" aria-labelledby="nav-receivedInvitation-tab">
            @if($profile->receivedInvitation)
              @forelse ($profile->receivedInvitation as $id)
                <livewire:UserCard :$id :key="$id" />
              @empty
                <div class="alert alert-danger my-3 mx-5">No users</div>
              @endforelse
            @endif

          </div>
        @endif


      </div>





    </div>








</div>




