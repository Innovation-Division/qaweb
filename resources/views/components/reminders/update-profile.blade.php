<div class="update-profile">
    <img src="{{ asset('assets/icons/Icon-Lightbulb.svg') }}" alt="Icon" class="update-profile-icon">
    <span class="update-profile-text">
        <!-- Your text goes here -->
        You may change your input data should you need to update your information. Note: Email address cannot be changed.
    </span>
</div>

<style>
    .update-profile {
        display: flex;
        padding: 25px 20px;
        align-items: flex-start;
        gap: 20px;
        align-self: stretch;
        width: 100%;
        height: auto;
        background: #FFF9EC;
    }

    .update-profile-icon {
        width: 24px;
        height: 24px;
    }

    .update-profile-text {
        color: var(--Primary-Black-Text, #303030);
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px; /* 150% */
    }
</style>
