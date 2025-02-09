<div class="like-container float-end">
    <span class="likes-count">{{ $likesCount }}</span>
    @if ($isLiked)
        <i class="bi bi-heart-fill like-icon liked" wire:click.prevent="likeUnLike"></i>
    @else
        <i class="bi bi-heart like-icon" wire:click.prevent="likeUnLike"></i>
    @endif
</div>
