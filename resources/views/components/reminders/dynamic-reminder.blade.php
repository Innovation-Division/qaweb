@props([
    'icon' => 'assets/icons/Icon-Lightbulb.svg',
    'message' => 'Your personal information is automatically entered in the form. If you need to update your information, go to Profile > Personal Information.',
])

<style>
    .reminder-container {
        background-color: #FFF9EC;
        display: flex;
        align-items: start;
        gap: 12px;
        padding: 16px;
        max-width: 705px;
        width: 100%;
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

    .reminder-content {
        flex-grow: 16px;
        color: #303030;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
    }
</style>

<div class="reminder-container">
    <!-- Fixed 24x24 Icon -->
    <div class="reminder-icon">
        <img src="{{ asset($icon) }}" alt="Icon">
    </div>

    <!-- Dynamic Content -->
    <div class="reminder-content">
        {!! $message !!}
    </div>
</div>
