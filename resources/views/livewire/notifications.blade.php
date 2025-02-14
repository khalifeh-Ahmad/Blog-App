<div class="notification-container">
    <div class="notification-header">
        <h4>Notifications (<span class="count">{{ $notifications->count() }}</span>)</h4>
        <button wire:click="markAllAsRead" class="mark-all-btn">Mark All as Read</button>
    </div>

    @if ($notifications->isEmpty())
        <p class="no-notifications">You have no new notifications.</p>
    @else
        <ul class="notification-list">
            @foreach ($notifications as $notification)
                <li class="notification-item">
                    <a href="{{ $notification->data['url'] }}" class="notification-link">
                        <i class="bi bi-bell-fill"></i> <!-- Notification icon -->
                        {{ $notification->data['message'] }}
                    </a>
                    <button wire:click="markAsRead('{{ $notification->id }}')" class="mark-btn">
                        <i class="bi bi-check2"></i> <!-- Check icon -->
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
