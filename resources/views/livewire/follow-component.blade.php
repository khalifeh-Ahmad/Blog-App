<div>
    <button wire:poll class="follow-btn {{ $isFollowed ? 'followed' : '' }}"
        wire:click.prevent="followUnFollow({{ $followed_Id }})">
        {{ $isFollowed ? 'Followed' : 'Follow' }}
        <i class="bi bi-people-fill followers-icon"></i> {{ $followers_number }}
    </button>
</div>
