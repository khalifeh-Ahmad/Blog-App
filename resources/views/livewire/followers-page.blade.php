<div class="container mt-4">
    <h2 class="mb-3">People Who Follow Me</h2>

    @if (session('message'))
        <p class="text-muted">{{ session('message') }}</p>
    @endif

    @if (!empty($followers) && $followers->count() > 0)

        <div class="list-group">
            @foreach ($followers as $follower)
                <div class="list-group-item d-flex align-items-center">
                    <img src="{{ asset('storage/images/' . ($follower->profile_image ?? 'default-profile.jpg')) }}"
                        alt="Profile Image" class="rounded-circle me-3" width="50" height="50">

                    <div>
                        <h5 class="mb-0">{{ $follower->follower->name }}</h5>
                        <p class="text-muted mb-0">{{ $follower->follower->email }}</p>
                    </div>

                    <a href="#" class="btn btn-danger btn-sm ms-auto"
                        wire:click="removeFollower({{ $follower->follower->id }})">
                        Remove
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
