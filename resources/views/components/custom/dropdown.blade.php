<head>
    <style>
        .dropdown-container {
            display: flex;
            flex-direction: column;
            position: relative;
            font-family: 'Inter', sans-serif;
            width: {{ $width ?? '330px' }};
        }

        .dropdown-label {
            font-size: 12px;
            color: #333;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .asterisk {
            color: red;
        }

        .dropdown-wrapper {
            position: relative;
            width: 100%;
        }

        .dropdown-input {
            width: 100%;
            font-size: 14px;
            padding: 10px;
            border: none;
            border-bottom: teal 1px solid;
            background-color: white;
            outline: none;
            cursor: pointer;
            padding-right: 30px;
        }

        .dropdown-arrow {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            pointer-events: none;
            filter: invert(67%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(85%) contrast(90%);
        }

        .dropdown-menu {
            position: absolute;
            width: 100%;
            background: white;
            border-bottom: 1px solid #ccc;
            border-radius: 4px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            z-index: 10;
            margin-top: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-search {
            width: 100%;
            padding: 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .dropdown-item {
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<div class="dropdown-container">
    <!-- Dynamic Label with Required Indicator -->
    <label class="dropdown-label" for="{{ $id ?? $name }}">
        {{ $label }}
        @if($required ?? false)
            <span class="asterisk">*</span>
        @endif
    </label>

    <div class="dropdown-wrapper">
        <input type="text" id="{{ $id ?? $name }}" name="{{ $name }}" class="dropdown-input" 
            placeholder="{{ $placeholder ?? 'Select an option' }}" 
            readonly data-toggle="dropdown" required="{{ $required ?? false }}">

        <!-- SVG Icon for Dropdown Arrow -->
        <img src="{{ asset('assets/icons/Icon-ArrowDown.svg') }}" alt="Dropdown Arrow" class="dropdown-arrow">

        <!-- Dynamic Dropdown Options -->
        <div class="dropdown-menu">
            <!-- Search Input Inside Dropdown -->
            <input type="text" class="dropdown-search" placeholder="Type here to search...">

            @foreach ($options as $value => $text)
                <div class="dropdown-item" data-value="{{ $value }}">{{ $text }}</div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.dropdown-wrapper').forEach(wrapper => {
            const input = wrapper.querySelector('.dropdown-input');
            const arrow = wrapper.querySelector('.dropdown-arrow');
            const menu = wrapper.querySelector('.dropdown-menu');
            const search = wrapper.querySelector('.dropdown-search');
            const items = wrapper.querySelectorAll('.dropdown-item');

            input.addEventListener('click', () => {
                const isOpen = menu.classList.toggle('show');
                arrow.src = isOpen 
                    ? "{{ asset('assets/icons/Icon-ArrowUp.svg') }}" 
                    : "{{ asset('assets/icons/Icon-ArrowDown.svg') }}";
            });

            // Search filter logic
            search.addEventListener('input', () => {
                const query = search.value.toLowerCase();
                items.forEach(item => {
                    item.style.display = item.textContent.toLowerCase().includes(query) ? "" : "none";
                });
            });

            items.forEach(item => {
                item.addEventListener('click', () => {
                    input.value = item.textContent;
                    menu.classList.remove('show');
                    arrow.src = "{{ asset('assets/icons/Icon-ArrowDown.svg') }}"; // Reset arrow to down
                });
            });

            document.addEventListener('click', (event) => {
                if (!wrapper.contains(event.target)) {
                    menu.classList.remove('show');
                    arrow.src = "{{ asset('assets/icons/Icon-ArrowDown.svg') }}"; // Reset arrow to down
                }
            });
        });
    });
</script>
