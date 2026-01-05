<style>
    .danger-lined-btn {
        width: 100%
        height: 44px;
        display: flex;
        padding: 10px 20px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        border-radius: 3px;
        border: 1px solid var(--Status-Danger, #DD0707);
        cursor: pointer;
        user-select: none;
        background: none; /* Keeps the button background transparent */
    }

    .danger-lined-btn {
        color: var(--Status-Danger, #DD0707);
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
    }

    /* Active/Clicked State */
    .danger-lined-btn:active {
        border: none; /* Remove border when clicked */
        background: var(--Status-Light-Red, #FFE2E2); /* Background change on click */
    }
</style>


<button class="danger-lined-btn" id="{{ $id ?? 'default-id' }}">
    <span class="btn-text">{{ $slot }}</span>
</button>

