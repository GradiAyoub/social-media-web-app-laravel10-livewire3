<div class="container ">
<form wire:submit.prevent="submit" class="p-4 shadow" style="margin:100px 300px">

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
        <input type="submit" class="btn btn-dark m-3">
        <a href="{{url('signup')}}" class="btn btn-dark">signup</a>
    </div>


  
</form>
   

</div>
