<!-- Unified Styles -->
<style>
    .link-icon {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 406px; /* Set width to 406px */
        height: 44px; /* Set height to 44px */
        padding: 10px 0;
        align-self: stretch;
        border-radius: 3px;
        background-color: #FFF; /* Background color */
        color: #008080; /* Text and icon color */
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        text-decoration: none;
        justify-content: flex-start; /* Align content to the left */
    }

    .link-icon i {
        font-size: 20px; /* Icon size for Bootstrap icons */
    }

    .link-icon img {
        width: 20px; /* Local icon size */
        height: 20px; /* Local icon size */
    }

    .link-icon span {
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
    }
</style>

<!-- Link Icon Component -->
<a href="{{ $href }}" class="link-icon">
    @if(strpos($icon, 'bi-') === 0) <!-- Check if it's a Bootstrap icon class -->
        <i class="bi {{ $icon }}"></i> <!-- Bootstrap icon -->
    @else
        <img src="{{ asset('assets/icons/' . $icon) }}" alt="{{ $text }} icon" /> <!-- Local icon -->
    @endif
    <span>{{ $text }}</span> <!-- Text next to the icon -->
</a>
