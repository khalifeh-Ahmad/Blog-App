<div class="card">
    @if (session()->has('message'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('message') }}',
                icon: 'success',
                confirmButtonText: 'Okay'
            });
        </script>
    @endif
    <div class="card-body">
        <h5 class="card-title"> My Dashboard</h5>

        <div class="row g-4 mb-5" wire:poll>
            <div class="col-sm-6 col-md-3">
                <div class="stats-card followers">
                    <div class="icon">👥</div>
                    <h6 class="font-weight-bold">Followers</h6>
                    <p class="display-4 mb-0">{{ $follower_count ?? '100' }}</p>
                    <div class="stats-card-footer">Total Followers</div>
                </div>
            </div>

            <livewire:post-data-counter />

            <div class="col-sm-6 col-md-3">
                <div class="stats-card comments">
                    <div class="icon">💬</div>
                    <h6 class="font-weight-bold">Comments</h6>
                    <p class="display-4 mb-0">{{ $comment_count ?? '1333' }}</p>
                    <div class="stats-card-footer">Total Comments</div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3" wire:poll>
                <div class="stats-card posts">
                    <div class="icon">📝</div>
                    <h6 class="font-weight-bold">Posts</h6>
                    <p class="display-4 mb-0">{{ $post_count ?? '0' }}</p>
                    <div class="stats-card-footer">Total Posts</div>
                </div>
            </div>
        </div>

        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Content</th>
                    <th scope="col">Posted At</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    {{-- for livewire to keep track and work efficient with loops use keys to uniquely identify each row in a loop --}}
                    <tr wire:key="{{ $post->id }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $post->title }}</td>
                        <td><img height="50px" width="50px" style="border-radius: 50%"
                                src="{{ asset('storage/images/' . $post->photo) }}" alt="post image">
                        </td>
                        <td>{{ str($post->content)->words(10) }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td><a href="/edit/post/{{ $post->id }}" wire:navigate
                                class="btn btn-primary btn-sm">Edit</a></td>
                        <td>
                        <td><button wire:click="deletePost({{ $post->id }})"
                                wire:confirm="Are you sure you want to delete this?"
                                class="btn btn-danger btn-sm">Delete</button></td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

    </div>
</div>
