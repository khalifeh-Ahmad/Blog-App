<div class="row">
    @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card post-card">
                <img src="{{ asset('storage/images/' . $post->photo) }}" alt="Post Image" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>{{ str($post->content)->words(15) }}...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/view/post/{{ $post->id }}" wire:navigate
                            wire:click="addViewers({{ $post->id }})" class="read-more">Read More →</a>
                        <livewire:post-viewers-count :pId='$post->id' />
                        <livewire:like-component :postId='$post->id' />
                    </div>

                </div>
                <div class="post-card-footer">
                    <span>🖊️ By {{ $post->name }}</span>
                    <livewire:follow-component :followedId="$post->followedId" />
                </div>
            </div>
        </div>
    @endforeach
</div>
