<div class="col-sm-6 col-md-3">
    <div class="stats-card {{ $type }}">
        <div class="icon">
            @switch($type)
                @case('likes')
                    ❤️
                @break

                @case('comments')
                    💬
                @break

                @case('posts')
                    📝
                @break

                @case('followers')
                    👥
                @break

                @default
                    ❓
            @endswitch
        </div>
        <h6 class="font-weight-bold">
            @switch($type)
                @case('likes')
                    Likes
                @break

                @case('comments')
                    Comments
                @break

                @case('posts')
                    Posts
                @break

                @case('followers')
                    Followers
                @break

                @default
                    Unknown
            @endswitch
        </h6>
        <p class="display-4 mb-0">{{ $count }}</p>
        <div class="stats-card-footer">
            Total
            @switch($type)
                @case('likes')
                    Likes
                @break

                @case('comments')
                    Comments
                @break

                @case('posts')
                    Posts
                @break

                @case('followers')
                    Followers
                @break

                @default
                    Data
            @endswitch
        </div>
    </div>
</div>
