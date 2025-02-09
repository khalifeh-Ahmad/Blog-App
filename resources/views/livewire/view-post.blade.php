<style>
    /* Modern card design */
    .post-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
    }

    .post-card:hover {
        transform: translateY(-1px);
        box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.25);
    }

    .post-card img {
        height: 250px;
        object-fit: fill;
        border-radius: 15px 15px 0 0;
    }

    .post-card .card-body {
        padding: 10px;
    }

    .post-card .card-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #333;
    }

    .post-card p {
        color: #666;
        font-size: 0.95rem;
    }

    .post-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 0 0 15px 15px;
    }

    .post-card-footer span {
        font-size: 0.85rem;
        color: #555;
    }

    .read-more {
        text-decoration: none;
        font-weight: bold;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .read-more:hover {
        color: #0056b3;
        text-decoration: underline;
    }
</style>

<div class="row">
    @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card post-card">
                <img src="{{ asset('storage/images/' . $post->photo) }}" alt="Post Image" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>{{ str($post->content)->words(15) }}...</p>
                    <a href="/view/post/{{ $post->id }}" wire:navigate class="read-more">Read More →</a>
                </div>
                <div class="post-card-footer">
                    <span>🖊️ By {{ $post->name }}</span>

                </div>
            </div>
        </div>
    @endforeach
</div>
