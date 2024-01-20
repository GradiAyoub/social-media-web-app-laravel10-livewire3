<div class="card col-sm-3 m-2 text-center shadow" style="width: 18rem;">
    <img src="{{url('storage/'. $userCard->img)}}"  alt="...">
    <div class="card-body">
        
        <a class="card-title fs-3" href="{{url('/profile/'. $userCard->id)}}">{{$userCard->name}}</a><br>

        @switch($userCard->relation)
            @case('friends')
                <button type="button" wire:click="removeFriend" class="btn btn-dark">remove friend</button>
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

        
    </div>
</div>