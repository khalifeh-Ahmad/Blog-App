<div class="comment-box">
    <form wire:submit.prevent="leaveComment">
        <div class="form-group">
            <textarea wire:model="comment" class="comment-input" cols="30" rows="3" placeholder="Write a comment..."></textarea>
            @error('comment')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="comment-btn my-2">Publish</button>
    </form>

    <hr>

    <h6>Comments</h6>
    <div class="comment-list">
        @if (count($postComments) > 0)
            @foreach ($postComments as $item)
                <div class="comment-item">
                    <img src="{{ asset('storage/avatars/' . ($item->avatar ?? 'default-avatar.png')) }}" alt="Avatar"
                        class="comment-avatar">
                    <div class="comment-content">
                        <span class="comment-author">{{ $item->name }}</span>
                        <p class="comment-text">{{ $item->comment }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <span class="no-comments">No comments yet!</span>
        @endif
    </div>
</div>
