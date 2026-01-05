<style>
    .btn-base {
        display: flex;
        width: 100%; 
        height: 44px;
        padding: 10px 0px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        align-self: stretch;
        border-radius: 3px;
        font-family: Inter, sans-serif !important;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        cursor: pointer;
        transition: background-color 0.2s ease, color 0.2s ease, border 0.2s ease;
    }

    /* Non-Lined Button */
    .secondary-btn {
        background: #FFF;
        color: #008080;
        border: none;
    }

    .secondary-btn:hover {
        background: #008080;
        color: white;
    }

    .secondary-btn:active,
    .secondary-btn:focus {
        background: #60B3B3;
        color: white;
        outline: none;
    }

    /* Lined Button */
    .secondary-btn-lined {
        background: white;
        color: #008080;
        border: 1px solid var(--Primary-Teal, #008080);
    }

    .secondary-btn-lined:hover {
        background: #008080;
        color: white;
    }

    .secondary-btn-lined:active,
    .secondary-btn-lined:focus {
        background: #60B3B3;
        color: white;
        outline: none;
    }
</style>

@props([
    'id' => null, // Unique ID for the button
    'class' => '', // Additional CSS classes
    'type' => 'button', // Button type (button, submit, reset)
    'disabled' => false, // Whether the button is disabled
    'onclick' => '', // Optional onclick event handler
    'lined' => false, // If true, uses the lined style
    'fontSize' => '16px', // Custom font size
    'fontWeight' => '500', // Custom font weight
    'lineHeight' => '24px', // Custom line height
])

<button id="{{ $id ?? 'default-id' }}" type="{{ $type }}" 
    class="btn-base {{ $lined ? 'secondary-btn-lined' : 'secondary-btn' }} {{ $class }}"
    style="font-size: {{ $fontSize }}; font-weight: {{ $fontWeight }}; line-height: {{ $lineHeight }};"
    {{ $disabled ? 'disabled' : '' }} {!! $onclick ? 'onclick="' . $onclick . '"' : '' !!} {{ $attributes }}>
    <span class="button-text">{{ $slot }}</span>
</button>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.stepper-container').classList.add('visible');
    });
</script>
