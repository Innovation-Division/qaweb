<!-- Secondary Arrow Button Component -->
<style>
    .btn-secondary-arrow {
        width: 342.5px;
        height: 44px;
        border-radius: 4px !important;
        background: #ffffff;
        padding: 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color: #008080;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        border: 1px solid #008080;
        cursor: pointer;
    }

    .btn-secondary-arrow:hover {
        background-color: #008080 !important;
        border: 1px solid #008080 !important;
        color: #ffffff !important;
    }

    .btn-secondary-arrow:focus,
    .btn-secondary-arrow:active {
        background-color: #60b3b3 !important;
        border: 1px solid #60b3b3 !important;
        color: #ffffff !important;
    }

    .btn-secondary-arrow:before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23008080' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: block;
        width: 24px !important;
        height: 24px !important;
    }

    .btn-secondary-arrow:hover:before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23ffffff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
    }
</style>

<button class="btn-secondary-arrow" id="{{ $id ?? 'default-id' }}">
    <span class="button-text">{{ $slot }}</span>
</button>
