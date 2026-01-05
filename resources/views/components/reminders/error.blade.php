@props([
    'icon' => 'assets/icons/Icon-WarningCircleRed.svg',
    'message' => 'Your personal information is automatically entered in the form. If you need to update your information, go to Profile > Personal Information.',
])

<style>
    .error-container {
        background-color: #eff2f4 ;
        display: flex;
        align-items: start;
        gap: 12px;
        padding: 16px;
        max-width: 705px;
        width: 100%;
        display: none;
    }

    .reminder-icon {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
    }

    .reminder-icon img {
        width: 24px;
        height: 24px;
    }

    .error-content {
        flex-grow: 16px;
        /* color: #fff; */
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
    }
</style>

<div class="error-container">
    <!-- Fixed 24x24 Icon -->
    <div class="reminder-icon">
        <img src="{{ asset($icon) }}" alt="Icon">
    </div>

    <!-- Dynamic Content -->
    <div class="error-content">
        {{ $message }}
    </div>
</div>
