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
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
    }

    .post-card:hover {
        transform: translateY(-2px);
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
                            <i class="bi bi-calendar"></i>
                            <span>{{ date('D M Y, h:i:s A', strtotime($post_data->created_at)) }}</span> <br>
                            <span>🖊️ By {{ $post_data->name }}</span>
                        </div>
                        <h2>{{ $post_data->title }}</h2>
                        <p>{{ $post_data->content }}</p>
                    </div>
                </div>
            </div>

            <!-- Related Posts Sidebar -->
            <div class="col-xl-4">
                <div class="card related-posts">
                    <div class="card-body">
                        <h5 class="card-title">Related Posts</h5>
                        <div class="news">
                            <div class="related-post-item">
                                <img src="assets/img/news-1.jpg" alt="">
                                <div>
                                    <h6><a href="#">Nihil blanditiis at in nihil autem</a></h6>
                                    <p>Sit recusandae non aspernatur laboriosam...</p>
                                </div>
                            </div>

                            <div class="related-post-item">
                                <img src="assets/img/news-2.jpg" alt="">
                                <div>
                                    <h6><a href="#">Quidem autem et impedit</a></h6>
                                    <p>Illo nemo neque maiores vitae officiis...</p>
                                </div>
                            </div>

                            <div class="related-post-item">
                                <img src="assets/img/news-3.jpg" alt="">
                                <div>
                                    <h6><a href="#">Id quia et et ut maxime</a></h6>
                                    <p>Fugiat voluptas vero eaque accusantium eos...</p>
                                </div>
                            </div>
                        </div><!-- End sidebar recent posts -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
