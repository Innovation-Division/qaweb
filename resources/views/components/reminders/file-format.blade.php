<style>
    .file-format-reminder {
        width: 100%;
        height: 54px;
        display: flex;
        padding: 15px 0px;
        align-items: center;
        gap: 12px;
        align-self: stretch;
    }

    .info-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
    }

    .reminder-text {
        color: var(--Primary-Caption-Black-text, #585858);
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px; /* 171.429% */
    }
</style>

<div class="file-format-reminder">
    <img src="{{ asset('assets/icons/Icon-Info3.svg') }}" alt="Info Icon" class="info-icon">
    <span class="reminder-text">File must be an image (JPG, PNG, GIF, BMP, WebP) and must not exceed 5MB.</span>
</div>
