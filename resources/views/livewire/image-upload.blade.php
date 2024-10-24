<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputName">Image</label>
            <input type="file" class="form-control" id="exampleInputName" wire:model="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
