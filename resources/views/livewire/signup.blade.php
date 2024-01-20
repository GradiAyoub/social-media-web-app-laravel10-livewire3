<div class="container">
<form wire:submit.prevent="submit" class="p-4 shadow" style="margin:100px 300px">
    <div class="">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" id="name" placeholder="john" wire:model="form.name">
        @error('form.name') <p class="text-danger">{{ $message }}</p> @enderror

    </div>

    <div class="">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" wire:model="form.email">
        @error('form.email') <p class="text-danger">{{ $message }}</p> @enderror

    </div>

    <div class="">
        <label for="password" class="form-label">password</label>
        <input type="password" class="form-control" id="password" wire:model="form.password">
        @error('form.password') <p class="text-danger">{{ $message }}</p> @enderror

    </div>

    <div class="">
        <label for="password_confirmation" class="form-label">password_confirmation</label>
        <input type="password" class="form-control" id="password_confirmation" wire:model="form.password_confirmation">

    </div>

    <div class="">
    <input type="submit" class="btn btn-dark m-3">
    <a href="{{url('login')}}" class="btn btn-dark">login</a>

    </div>


  
</form>
   

</div>
