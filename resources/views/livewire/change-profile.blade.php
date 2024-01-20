<div class="container">
<form wire:submit.prevent="submit" class="p-4 shadow" style="margin:100px 300px">

    <div class="">
        <label for="name"  class="form-label">name</label>
        <input type="text" value="{{old('name')}}" class="form-control" id="name" wire:model="form.name">
        @error('form.name') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="">
        <label for="info"  class="form-label">info</label>
        <input type="text" value="{{old('info')}}" class="form-control" id="info" wire:model="form.info">
        @error('form.info') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="">
        <label for="img" class="form-label">image</label>
        <input class="form-control" type="file" wire:model="img">
    @error('img') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="">
        <input type="submit" class="btn btn-dark m-3">
    </div>

</form>
   

</div>
