<div class="card">
    <div class="card-body">
        <h5 class="card-title">All My Posts</h5>

        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col"data-type="date" data-format="YYYY/DD/MM">Posted At</th>
                    <th scope="col">Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr wire:key="{{ $post->id }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

    </div>
</div>
