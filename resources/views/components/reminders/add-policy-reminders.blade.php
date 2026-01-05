<style>
    .file-format-reminders {
        width: 100%;
        height: 54px;
        display: flex;
        align-items: center;
        gap: 12px;
        align-self: stretch;
        background-color: #FFF9EC;
        padding: 16px;
        max-width: 705px;
        width: 100%;
        padding: 54px 20px 54px 20px;
        border-radius: 5px;
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

<div class="file-format-reminders mb-4 mt-3">
    <img src="{{ asset('assets/icons/Icon-Info3.svg') }}" alt="Info Icon" class="info-icon">
    <span class="reminder-text">Please enter your existing policy number as provided by your insurer. <strong>This is required for verification purposes.
Note: Policy numbers that are not matched with our records will not be reflected in your ePolicyHub account.</strong></span>
</div>
