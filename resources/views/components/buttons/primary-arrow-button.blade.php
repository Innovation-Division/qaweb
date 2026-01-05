<style>
    .primary-arrow-btn {
        width: 342.5px;
        height: 44px;
        border-radius: 4px !important;
        background: #008080;
        padding: 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color: #ffffff;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        border: none;
        cursor: pointer;
    }

    .primary-arrow-btn:hover {
        background-color: #008080 !important;
        border: 1px solid #008080 !important;
        color: #fff !important;
    }

    .primary-arrow-btn:focus,
    .primary-arrow-btn:active {
        background-color: #60b3b3 !important;
        border: 1px solid #60b3b3 !important;
        color: #fff !important;
    }

    .primary-arrow-btn:before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: block;
        width: 24px !important;
        height: 24px !important;
    }

    .primary-arrow-btn:visited:before,
    .primary-arrow-btn:target:before,
    .primary-arrow-btn:hover:before {
        background-color: transparent !important;
        color: #fff !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: block;
        width: 24px !important;
        height: 24px !important;
    }
</style>

<button class="primary-arrow-btn" id="{{ $id ?? 'default-id' }}">
    <span class="button-text">{{ $slot }}</span>
</button>

