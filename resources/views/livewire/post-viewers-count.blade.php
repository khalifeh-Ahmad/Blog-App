<style>
    .viewers-container {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 1rem;
    }

    .viewers-icon {
        font-size: 1.2rem;
        color: #007bff;
        transition: transform 0.2s ease-in-out;
    }

    .viewers-container:hover .viewers-icon {
        transform: scale(1.2);
    }

    .viewers-count {
        font-weight: bold;
        color: #444;
    }
</style>

<div class="viewers-container">
    <span class="viewers-count">{{ $post_viewers }}</span>
    <i class="bi bi-eye-fill viewers-icon"></i>
</div>
