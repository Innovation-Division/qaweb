@props([
    'id' => 'dropdown-' . uniqid(),
    'name' => 'dropdown',
    'label' => 'Label',
    'options' => [], // Array of options (simple values)
    'placeholder' => 'Select an option',
    'required' => false,
    'disabled' => false,
])

<style>
    * {
        outline: none !important;
    }

    .search-bar {
        outline: none !important;
        box-shadow: none !important;
        border: 1px solid #F7F7F7 !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        padding: 0 !important;
        /* Force remove padding */
        position: relative;
        width: 100%;
        /* Ensure the search bar takes full width */
        height: 2.3125rem;
    }

    .search-bar input {
        width: auto !important;
        padding: 0 !important;
        /* Force remove padding */
    }

    /* Ensure the container doesn't show outlines either */
    .search-bar-container {
        outline: none !important;
        position: sticky;
        top: -10px !important;
        padding: 8px 16px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        width: 100%;
        gap: 10px;
        background: white;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Remove default focus styles for all browsers */
    .search-bar:focus,
    .search-bar:active,
    .search-bar:hover,
    .search-bar:-webkit-autofill,
    .search-bar:-moz-focusring {
        outline: none !important;
        box-shadow: none !important;
        border-color: #F7F7F7 !important;
    }

    .search-bar:focus {
        background: #F7FFFF !important;
        /* Change background when typing */
    }

    .dropdown-container {
        display: flex;
        flex-direction: column;
        position: relative;
        gap: 10px;
        /* Set gap between elements */
        width: 100%;
    }

    .dropdown-text-field-container {
        height: 56px;
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-bottom: 15px;
    }

    .dropdown-label-container {
        display: flex;
        padding: 0px 10px;
        align-items: center;
        align-self: stretch;
        width: 100%;
    }

    .dropdown-label-text {
        color: var(--Teal-LVL-12, #033);
        /* Default state color */
        font-family: 'Inter', sans-serif;
        font-size: 10px;
        /* Set font size to 10px */
        font-weight: 400;
        line-height: normal;
        width: auto;
        margin: 0;
    }

    .dropdown-required {
        color: var(--Status-Danger, #DD0707);
        font-family: 'Inter', sans-serif;
        font-size: 10px;
        /* Set font size to 10px */
        font-weight: 400;
        line-height: normal;
        margin-left: 0;
        padding-left: 0;
    }

    .dropdown-input-container {
        display: flex;
        align-items: center;
        align-self: stretch;
        border-radius: 1px;
        border-bottom: 1px solid var(--Teal-LVL-9, #066);
        color: #1E1F21;
        transition: all 0.3s ease;
        width: 100%;
    }

    .dropdown-input-container input {
        padding: 10px;
    }

    .dropdown-text-field {
        border: none;
        outline: none;
        width: 100%;
        padding: 0;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        /* Set font size to 14px */
        font-weight: 400;
        line-height: 24px;
        /* 171.429% */
        color: var(--Surfaces-LVL-5, #848A90);
        /* Default state color */
        background: transparent;
        cursor: pointer;
        pointer-events: none;
        text-align: left;
        margin: 0;
    }

    .dropdown-text-field::placeholder {
        color: var(--Surfaces-LVL-5, #848A90);
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        /* Set font size to 14px */
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 171.429% */
    }

    .dropdown-text-field:not(:placeholder-shown) {
        color: var(--Surfaces-LVL-9, #1E1F21);
        /* Text state color */
    }

    .dropdown-text-field:not(:placeholder-shown)~.dropdown-label-container .dropdown-label-text {
        color: var(--Surfaces-LVL-5, #848A90);
        /* Text state color */
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        width: 100%;
        max-height: 200px;
        /* Limit the height */
        overflow-y: auto;
        /* Add vertical scroll */
        background: white;
        border-radius: 6px;
        border: 1px solid var(--Surfaces-LVL-1, #F2F2F2);
        box-shadow: 4px 2px 10px rgba(230, 230, 230, 0.5);
        z-index: 10;
        box-sizing: border-box;
    }

    .dropdown-menu.open {
        display: flex;
        flex-direction: column;
        gap: 10px;
        /* Set gap between elements */
        outline: none !important;
        border: none !important;
        width: 100%;
        position: absolute;
        /* Ensure the dropdown menu is positioned absolutely */
        top: calc(100% + 5px);
        /* Position it below the input field */
        left: 0;
        z-index: 10;
    }

    .dropdown-icon {
        width: 20px;
        height: 20px;
        margin-left: auto;
        transition: transform 0.3s ease, filter 0.3s ease;
        user-select: none;
    }

    .search-bar::placeholder {
        font-size: 14px;
        /* Set font size to 14px */
    }

    .search-icon {
        width: 19px !important;
        height: 19px !important;
        filter: invert(22%) sepia(4%) saturate(529%) hue-rotate(180deg) brightness(92%) contrast(91%);
        /* Default color */
    }

    .search-bar:focus+.search-icon,
    .search-bar:active+.search-icon,
    .search-bar:hover+.search-icon {
        filter: invert(50%) sepia(100%) saturate(1000%) hue-rotate(180deg) brightness(100%) contrast(100%);
    }

    .dropdown-options {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 10px;
        /* Set gap between elements */
    }

    .dropdown-option {
        /* padding: 8px 16px; */
        cursor: pointer;
        transition: background 0.2s;
        width: 100%;
        width: 100%;
        height: auto;
        padding: 4px 0px 10px 17px;
    }

    .dropdown-option:hover {
        background: var(--Teal-LVL-2, #E0F5F5);
    }

    .dropdown-container.disabled .dropdown-input-container {
        border-bottom: 1px solid var(--Surfaces-LVL-5, #848A90);
        background: var(--Surfaces-LVL-1, #F5F5F5);
        cursor: not-allowed;
    }

    .dropdown-container.disabled .dropdown-text-field {
        background: var(--Surfaces-LVL-1, #F5F5F5 );
        cursor: not-allowed;
        color: var(--Surfaces-LVL-5, #848A90);
        font-family: 'Inter', sans-serif;
    }

    .dropdown-container.disabled .dropdown-text-field::placeholder {
        color: var(--Surfaces-LVL-5, #848A90);
        font-family: 'Inter', sans-serif;
    }

    .dropdown-container.disabled .dropdown-icon {
        filter: invert(80%) sepia(0%) saturate(0%) hue-rotate(180deg) brightness(90%) contrast(90%);
    }

    .suggestion {
        font-style: italic;
        color: #585858;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        pointer-events: none;
        opacity: 0.5;
    }

    .search-bar-container {
        outline: none !important;
        position: sticky;
        top: -10px !important;
        padding: 8px 16px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        width: 100%;
        background: white;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .search-input-wrapper {
        position: relative;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .search-bar {
        width: 100%;
        padding: 10px 10px 10px 40px;
        /* Space for the icon */
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
        padding-left: 31px !important;
    }

    .search-icon {
        position: absolute;
        left: 8px;
        /* Adjust icon position */
        width: 20px;
        height: auto;
        pointer-events: none;
        /* Prevent interaction */
        z-index: 1;
    }
</style>

<div class="dropdown-container @if ($disabled) disabled @endif">
    <!-- Closed Dropdown Field -->
    <div class="dropdown-text-field-container">
        <div class="dropdown-label-container">
            <span class="dropdown-label-text">
                {{ $label }}
                @if ($required)
                    <span class="dropdown-required">*</span>
                @endif
            </span>
        </div>
        <div class="dropdown-input-container"
            onclick="!this.closest('.dropdown-container').classList.contains('disabled') && toggleDropdown('{{ $id }}')">
            <input type="text" id="{{ $id }}" name="{{ $name }}" class="dropdown-text-field"
                autocomplete="off" placeholder="{{ $placeholder }}" readonly
                @if ($disabled) disabled @endif @if ($required) required @endif />
            <input type="hidden" id="{{ $id }}-hidden" name="{{ $name }}" value="">
            <img src="{{ asset('assets/icons/Icon-ArrowDown.svg') }}" id="dropdown-icon-{{ $id }}"
                class="dropdown-icon" onload="initializeIcon('{{ $id }}')">
        </div>
    </div>

    <!-- Open Dropdown Menu -->
    <div class="dropdown-menu" id="dropdown-menu-{{ $id }}">
        <!-- Search Bar -->
        <div class="search-bar-container">
            <div class="search-input-wrapper">
                <img src="{{ asset('assets/icons/Icon-Search.svg') }}" class="search-icon">
                <input type="text" class="search-bar" placeholder="Type here to search"
                    oninput="filterOptions(this.value, '{{ $id }}')">
            </div>
        </div>
        <!-- Dropdown Options -->
        <div class="dropdown-options">
            @foreach ($options as $option)
                <div class="dropdown-option"
                    onclick="!this.closest('.dropdown-container').classList.contains('disabled') && selectOption('{{ $option }}', '{{ $id }}')">
                    {{ $option }}
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function initializeIcon(id) {
        const icon = document.getElementById(`dropdown-icon-${id}`);
        icon.style.filter =
            'invert(22%) sepia(4%) saturate(529%) hue-rotate(180deg) brightness(92%) contrast(91%)';
    }

    function toggleDropdown(id) {
        const allMenus = document.querySelectorAll('.dropdown-menu');
        const allIcons = document.querySelectorAll('.dropdown-icon');

        allMenus.forEach(menu => {
            if (menu.id !== `dropdown-menu-${id}`) {
                menu.classList.remove('open');
            }
        });

        allIcons.forEach(icon => {
            if (icon.id !== `dropdown-icon-${id}`) {
                icon.src = '{{ asset('assets/icons/Icon-ArrowDown.svg') }}';
                icon.style.filter =
                    'invert(22%) sepia(4%) saturate(529%) hue-rotate(180deg) brightness(92%) contrast(91%)';
            }
        });

        const menu = document.getElementById(`dropdown-menu-${id}`);
        const icon = document.getElementById(`dropdown-icon-${id}`);
        menu.classList.toggle('open');

        if (menu.classList.contains('open')) {
            icon.src = '{{ asset('assets/icons/Icon-ArrowUp.svg') }}';
            icon.style.filter =
                'invert(92%) sepia(4%) saturate(0%) hue-rotate(180deg) brightness(98%) contrast(90%)';
            menu.style.outline = 'none'; // Remove outline when open
            menu.style.border = 'none'; // Remove border when open
            resetOptions(id); // Reset options when dropdown is opened
            focusSearchBar(id); // Focus the search bar when dropdown is opened
        } else {
            icon.src = '{{ asset('assets/icons/Icon-ArrowDown.svg') }}';
            icon.style.filter =
                'invert(22%) sepia(4%) saturate(529%) hue-rotate(180deg) brightness(92%) contrast(91%)';
        }
    }

    function filterOptions(input, id) {
        const options = document.querySelectorAll(`#dropdown-menu-${id} .dropdown-option`);
        options.forEach(option => {
            if (option.textContent.toLowerCase().includes(input.toLowerCase())) {
                option.style.display = 'flex';
            } else {
                option.style.display = 'none';
            }
        });
    }

    function resetOptions(id) {
        const options = document.querySelectorAll(`#dropdown-menu-${id} .dropdown-option`);
        options.forEach(option => {
            option.style.display = 'flex';
        });

        const searchBar = document.querySelector(`#dropdown-menu-${id} .search-bar`);
        searchBar.value = ''; // Clear the search bar
    }

    function focusSearchBar(id) {
        const searchBar = document.querySelector(`#dropdown-menu-${id} .search-bar`);
        searchBar.focus(); // Focus the search bar
    }

    function selectOption(value, id) {
        const inputField = document.getElementById(id);
        const hiddenField = document.getElementById(`${id}-hidden`);
        inputField.value = value; // Set the selected option as the value
        hiddenField.value = value; // Set the hidden input value

        const searchBar = document.querySelector(`#dropdown-menu-${id} .search-bar`);
        searchBar.value = ''; // Clear the search bar

        toggleDropdown(id); // Close the dropdown
    }

    document.addEventListener('click', function(event) {
        const dropdowns = document.querySelectorAll('.dropdown-container');
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdown-menu');
            if (!dropdown.contains(event.target)) {
                dropdownMenu.classList.remove('open');
                const icon = dropdown.querySelector('.dropdown-icon');
                icon.src = '{{ asset('assets/icons/Icon-ArrowDown.svg') }}';
                icon.style.filter =
                    'invert(22%) sepia(4%) saturate(529%) hue-rotate(180deg) brightness(92%) contrast(91%)';
            }
        });
    });
</script>
