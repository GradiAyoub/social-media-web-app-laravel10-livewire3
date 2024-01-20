<div class="container ">
<form wire:submit.prevent="submit" class="p-4 profileHeader shadow" style="margin:100px 300px">
    <h3 class="text-center">create post</h3>
    <div class="">
        <label for="title"  class="form-label">title</label>
        <input type="text" class="form-control" id="title" wire:model="title">
        @error('title') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="">
        <label for="text"  class="form-label">text</label>
        <textarea  rows="3"  class="form-control" id="text" wire:model="text"></textarea>
        @error('text') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="">
        <label for="img" class="form-label">image</label>
        <input class="form-control" type="file" wire:model="img">
        @error('img') <p class="text-danger">{{ $message }}</p> @enderror
    </div>

    <div class="">
        <input type="submit" class="btn btn-dark m-3" vlaue="create">
    </div>

</form>
   

</div>
