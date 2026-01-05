<style>
    .secondary-btn {
        display: flex;
        padding: 10px 20px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        width: 100%;
        border-radius: 3px;
        background: #F7FCFF;
        color: #008080;
        font-family: Inter, sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    /* Hover Effect */
    .secondary-btn:hover {
        background: #008080;
        color: white;
    }

    /* Click Effect */
    .secondary-btn:active,
    .secondary-btn:focus {
        background: #60B3B3;
        color: white;
        outline: none; /* Removes the default focus outline */
    }
</style>

<button class="secondary-btn" id="{{ $id ?? 'default-id' }}">
    <span class="button-text">{{ $slot }}</span>
</button>
