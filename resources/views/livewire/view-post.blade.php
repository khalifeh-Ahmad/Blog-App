<div class="row">
    @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card post-card">
                <img src="{{ asset('storage/images/' . $post->photo) }}" alt="Post Image" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>{{ str($post->content)->words(15) }}...</p>
                    <div class="post-meta">
                        <!-- "Read More" Link -->
                        <a href="/view/post/{{ $post->id }}" wire:navigate
                            wire:click="addViewers({{ $post->id }})" class="read-more">
                            Read More →
                        </a>

                        <!-- Date & Time -->
                        <small class="post-date">{{ date('d-m-Y H:i', strtotime($post->created_at)) }}</small>

                        <!-- Viewers & Likes -->
                        <div class="stats-container">
                            <livewire:post-viewers-count :pId='$post->id' />
                            <livewire:like-component :postId='$post->id' />
                        </div>
                    </div>

                </div>
                <div class="post-card-footer">
                    <a href="/view/profile/{{ $post->user_id }}" wire:navigate>
                        <img src="{{ asset('storage/images/' . $post->author_image) }}"
                            style="width: 30px !important; height: 30px !important;" alt="user Image"
                            class="rounded-circle">
                        <span>🖊️ By {{ $post->name }}</span>
                    </a>
                    <livewire:follow-component :followedId="$post->followedId" />
                </div>
            </div>
        </div>
    @endforeach
</div>
