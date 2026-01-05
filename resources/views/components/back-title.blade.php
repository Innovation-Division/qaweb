@props([
    'title' => 'Back', // Default title
    'id' => 'default-id', // Default ID
    'onclick' => '', // Optional onclick event handler
])

<style>
    .back-button-container {
        display: flex;
        align-items: center;
        height: 33px;
        gap: 23px; /* Add spacing between icon and title */
    }

    .back-button {
        display: flex;
        align-items: center;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }

    .back-button-icon {
        width: 32px;
        height: 32px;
    }

    .back-button-title {
        color: var(--Primary-Black, #2D2727);
        font-family: 'Inter', sans-serif;
        font-size: 27px;
        font-weight: 700;
        user-select: none; /* Prevents text selection */
        pointer-events: none; /* Prevents any click events on the title */
    }
</style>

<div class="back-button-container">
    <button
        class="back-button"
        id="{{ $id }}"
        {{ $onclick ? 'onclick="' . $onclick . '"' : '' }}
        {{ $attributes }} 
    >
        <img src="{{ asset('assets/icons/Icon-ArrowLeft.svg') }}" alt="Back" class="back-button-icon">
    </button>
    <div class="back-button-title">{{ $title }}</div>
</div>