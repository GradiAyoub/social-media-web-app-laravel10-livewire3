<div>
<livewire:CreatePost />

    <div>
        @foreach ($posts as $id)
            <livewire:PostC :$id :key="$id" />
        @endforeach
    </div>
</div>
