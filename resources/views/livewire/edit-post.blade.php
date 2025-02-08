<div class="card">
    {{-- here create a form to add new post --}}
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">
        {{-- here we call save function --}}
        <form class="my-3" wire:submit="update">
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" wire:model="title" value="{{ $post->title }}"
                        id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Post Title</label>
                </div>
                {{-- show validation error here --}}
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="post details" wire:model="content" id="floatingTextarea"
                        style="height: 100px;">{{ $post->content }}</textarea>
                    <label for="floatingInput">Your post goes here..</label>
                </div>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" placeholder="post details" wire:model="photo"
                        id="">
                    <label for="floatingInput">Your post image</label>
                </div>
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/my/posts" wire:navigate class="btn btn-secondary">cancel</a>
    </div>
    </form>
</div>
</div>
