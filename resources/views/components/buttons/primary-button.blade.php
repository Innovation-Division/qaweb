@props([
    'id' => 'primary-button-' . uniqid(),
    'class' => '',
    'type' => 'button',
    'disabled' => false,
    'onclick' => '',
    'ariaLabel' => '',
])

<style>
    .primary-btn {
        display: flex;
        padding: 10px 20px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        width: 100%;
        border-radius: 3px;
        background: #008080;
        color: #FFF;
        font-family: Inter, sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .primary-btn:hover {
        background: #006666;
    }

    .primary-btn:active {
        background: #60B3B3;
        transform: scale(0.98);
    }

    .primary-btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 128, 128, 0.3);
    }

    .primary-btn:disabled {
        background: #60B3B3;;
        color: #fff;
        cursor: not-allowed;
        pointer-events: none;
    }

    .loading-spinner {
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top: 2px solid #FFF;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        animation: spin 0.6s linear infinite;
        display: none; /* Hidden by default */
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<button
    id="{{ $id }}"
    type="{{ $type }}"
    class="primary-btn {{ $class }}"
    data-onclick="{{ $onclick }}"
    {{ $disabled ? 'disabled' : '' }}
    aria-label="{{ $ariaLabel }}"
>
    <span class="button-text-primary">{{ $slot }}</span>
    <span class="loading-spinner"></span>
</button>

<script>
 function handleButtonClick() {
    event.preventDefault();
    let button = $(this); // Using $(this) for the clicked button
    let buttonText = button.find(".button-text-primary");
    let spinner = button.find(".loading-spinner");

    if (button.data("loading")) {
        return; // Prevent multiple clicks while loading
    }

    // Set loading state
    button.data("loading", true);
    button.prop("disabled", true);
    buttonText.hide();
    spinner.show();
}


function stopButtonLoading() {
    let button = $(this); // Use $(this) to target the button calling this function
    let buttonText = button.find(".button-text-primary");
    let spinner = button.find(".loading-spinner");

    // Reset loading state
    button.removeData("loading");
    button.prop("disabled", false);
    buttonText.show();
    spinner.hide();
}
</script>
