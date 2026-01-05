@props([
    'id' => null, // Unique ID for the checkbox
    'name' => 'checkbox', // Name attribute for the checkbox
    'label' => 'Click me', // Label text
    'checked' => false, // Whether the checkbox is checked
    'disabled' => false, // Whether the checkbox is disabled
    'required' => false, // Whether the checkbox is required
    'value' => 'on', // Value attribute for the checkbox
    'class' => '', // Additional CSS classes for the container
    'labelClass' => '', // Additional CSS classes for the label
    'inputClass' => '', // Additional CSS classes for the input
    'icon' => asset('assets/icons/Icon-Checkbox-Pink.svg'), // Custom check icon
])

@php
    // Generate a unique ID if none is provided
    $checkboxId = $id ?? uniqid('checkbox_');
@endphp

<div class="checkbox-button {{ $class }}" {{ $attributes }}>
    <input
        type="checkbox"
        id="{{ $checkboxId }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @checked($checked)
        @disabled($disabled)
        @required($required)
        class="checkbox-input {{ $inputClass }}"
        aria-labelledby="label-{{ $checkboxId }}"
    />
    <label for="{{ $checkboxId }}" id="label-{{ $checkboxId }}" class="checkbox-label {{ $labelClass }}">
        {{ $label }}
    </label>
</div>

<style>
    .checkbox-button {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px;
        height: 44px;
    }

    .checkbox-input {
        width: 20px !important;
        height: 20px !important;
        border-radius: 4px !important;
        border: 2px solid var(--Primary-Light-Pink, #FB9FCD) !important;
        appearance: none !important;
        background-color: transparent !important;
        cursor: pointer !important;
        transition: background-color 0.2s, border-color 0.2s !important;
    }

    .checkbox-input:checked {
        background-color: #FFF !important; /* Change background color to white when checked */
        background-image: url("{{ $icon }}") !important;
        background-size: 20px 20px !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        border: 2px solid #E4509A !important; /* Change border color to #E4509A when checked */
    }

    .checkbox-input:focus {
        outline: none !important; /* Remove the blue outline */
        box-shadow: none !important; /* Remove any box shadow */
    }

    .checkbox-input:focus-visible {
        outline: none !important; /* Remove the blue outline for keyboard focus */
        box-shadow: none !important; /* Remove any box shadow */
    }

    .checkbox-input:disabled {
        background-color: #e9ecef !important;
        border-color: #ced4da !important;
        cursor: not-allowed !important;
    }

    .checkbox-label {
        font-family: 'Inter', sans-serif !important;
        font-size: 14px !important;
        font-style: normal !important;
        font-weight: 400 !important;
        line-height: 24px !important;
        color:#1E1F21;
        cursor: pointer !important;
    }

    @media (max-width: 992px) {
        .checkbox-button {
            gap: 10px !important;
        }
    }
</style>

<script>
    // Event delegation for all checkboxes
    document.addEventListener("change", function(event) {
        if (event.target.matches('.checkbox-input')) {
            // Custom logic for checkbox change event
        }
    });
</script>