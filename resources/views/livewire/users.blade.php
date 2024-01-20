
<div class="container" style="padding: 30px;">
    <div class="row">
        @forelse ($users as $id)
                  <livewire:UserCard :$id :key="$id" />
        @empty
            <div class="alert alert-danger my-3 mx-5">No users</div>
        @endforelse
    </div>
</div>

