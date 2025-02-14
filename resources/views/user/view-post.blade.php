<style>
    /* Main container styling */
    .post-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    /* Post card styling */
    .post-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        overflow: hidden;
        /* transition: transform 0.3s ease, box-shadow 0.3s ease; */
        /* box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15); */
        */
    }

    .post-card:hover {
        /* transform: translateY(-2px); */
        box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.25);
    }

    .post-card img {
        height: 250px;
        object-fit: fill;
        border-radius: 15px 15px 0 0;
        width: 100%;
    }

    .post-card .card-body {
        padding: 25px;
    }

    .post-card h2 {
        color: #007bff;
        font-size: 1.8rem;
        margin-bottom: 10px;
    }

    .post-meta {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 15px;
    }

    .post-meta i {
        margin-right: 5px;
        color: #007bff;
    }

    /* Related Posts Styling */
    .related-posts {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        padding: 20px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
    }

    .related-posts h5 {
        color: #333;
        font-weight: bold;
    }

    .related-post-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 8px;
        transition: background 0.3s ease-in-out;
    }

    .related-post-item:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    .related-post-item img {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        margin-right: 10px;
    }

    .related-post-item a {
        font-size: 0.95rem;
        font-weight: bold;
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .related-post-item a:hover {
        color: #0056b3;
    }

    .related-post-item p {
        font-size: 0.85rem;
        color: #666;
        margin: 5px 0 0;
    }
</style>

@extends('layouts/user-layout')
@section('space-work')
    <div class="post-container">
        <div class="row">
            <!-- Main Post Section -->
            <div class="col-xl-8">
                <div class="card post-card">
                    <img src="{{ asset('storage/images/' . $post_data->photo) }}" alt="Post Image" class="card-img-top">
                    <div class="card-body">
                        <div class="post-meta">
                            <livewire:like-component :postId='$post_data->id' />
                            <i class="bi bi-calendar"></i>
                            <span>{{ date('D M Y, h:i:s A', strtotime($post_data->created_at)) }}</span> <br>
                            <a href="/view/profile/{{ $post_data->user_id }}" wire:navigate>
                                <img src="{{ asset('storage/images/' . $user_image) }}"
                                    style="width: 30px !important; height: 30px !important;" alt="user Image"
                                    class="rounded-circle">
                                <span>🖊️ By {{ $post_data->name }}</span>
                            </a>

                            <livewire:follow-component :followedId="$post_data->user_id" />
                        </div>

                        <h2>{{ $post_data->title }}</h2>
                        <p>{{ $post_data->content }}</p>
                        <hr>
                        <h6 class="card-title">Leave a comment</h6>
                        <livewire:post-comment :postId='$post_data->id' />
                    </div>
                </div>
            </div>

            <!-- Related Posts Sidebar -->
            <div class="col-xl-4">
                <div class="card related-posts">
                    <div class="card-body">
                        <h5 class="card-title">More Posts from {{ $post_data->name }}</h5>

                        <livewire:related-posts :userId="$post_data->user_id" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
