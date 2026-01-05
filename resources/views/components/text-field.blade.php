@props([
    'id' => 'text-field-' . uniqid(), // Unique ID for the input
    'label' => 'Label', // Field label
    'type' => 'text', // Input type (text, number, email, mobile, any)
    'placeholder' => '', // Placeholder text
    'required' => false, // Whether the field is required
    'textMode' => 'default', // New prop: 'default' or 'any'
    'width' => '100%', // Width of the field container
    'validationMessage' => 'Input is incorrect', // Customizable validation message
    'maxlength' => null, // New prop for maxlength, default is null
])

<style>
    .text-field-container {
        height: 56px;
        width: {{ $width }};
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .text-field-container input {
        padding: 0;
        background: transparent; /* Ensure no background */
        font-size: 14px; /* Set font size to 14px */
    }

    .label-container {
        display: flex;
        padding: 0px 10px;
        align-items: center;
        gap: 10px;
        align-self: stretch;
    }

    .label-text {
        color: #033;
        font-family: 'Inter', sans-serif;
        font-size: 10px; /* Set font size to 10px */
        font-weight: 400;
        line-height: normal;
    }

    .required {
        color: #DD0707;
        font-family: 'Inter', sans-serif;
        font-size: 10px; /* Set font size to 10px */
        font-weight: 400;
        line-height: normal;
        margin-left: 0;
        padding-left: 0;
    }

    .input-container {
        display: flex;
        padding: 10px;
        align-items: center;
        gap: 10px;
        align-self: stretch;
        border-radius: 1px;
        border-bottom: 1px solid var(--Surfaces-LVL-5, #848A90);
        color: #1E1F21;
        transition: all 0.3s ease;
    }

    .input-container:hover {
        background: transparent !important;
        /* Force background to be transparent on hover */
    }

    .text-field {
        border: none;
        outline: none;
        width: 100%;
        padding: 0;
        font-family: 'Inter', sans-serif;
        font-size: 14px !important; /* Set font size to 14px */
        font-weight: 400;
        line-height: 24px;
        color: #1E1F21;
        background: transparent;
        /* Ensure no background */
    }

    .text-field::placeholder {
        color: #848A90;
        font-size: 14px important; /* Set font size to 14px */
    }

    .text-field:focus {
        outline: none;
        box-shadow: none;
        background: transparent;
    }

    input:focus {
        outline: none;
        box-shadow: none;
        background: transparent;
    }

    .text-field-container .text-field:focus {
        outline: none !important;
        box-shadow: none !important;
        background: transparent !important;
    }

    .text-field-container input:focus {
        outline: none !important;
        box-shadow: none !important;
        /* Remove the blue outline */
        background: transparent !important;
    }

    .text-field[type="number"]::-webkit-outer-spin-button,
    .text-field[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .text-field[type="number"] {
        -moz-appearance: textfield;
    }

    /* Valid State */
    .valid .label-text {
        color: #848A90;
    }

    .valid .input-container {
        border-bottom: 1px solid var(--Teal-LVL-9, #066);
    }

    .valid .input-container:hover {
        border-bottom: 1px solid var(--Teal-LVL-9, #066);
        background: var(--Teal-LVL-1, #F0FFFF);
    }

    /* Invalid State */
    .invalid .input-container {
        border-bottom: 1px solid var(--Status-Danger, #DD0707);
        background: #FFF7F7;
    }

    .invalid .text-field {
        color: #DD0707;
        background: transparent; /* Ensure no background */
    }

    .invalid .input-container:hover {
        background: #FFE2E2 !important;
    }

    .validation-message-container {
        display: flex;
        width: 214px;
        padding: 5px 0px 5px 10px;
        align-items: center;
        gap: 5px;
        color: #DD0707; /* Red color for validation message */
        font-family: 'Inter', sans-serif;
        font-size: 14px; /* Set font size to 14px */
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-top: 7px;
        /* Add space between input container and validation message */
    }

    .validation-message-container img {
        width: 12px;
        height: 12px;
        filter: invert(28%) sepia(95%) saturate(7481%) hue-rotate(353deg) brightness(91%) contrast(116%); /* Red color for icon */
    }
</style>

<div class="text-field-container" style="width: {{ $width }};">
    <div class="label-container">
        <span class="label-text">
            {{ $label }}
            @if ($required)
                <span class="required">*</span>
            @endif
        </span>
    </div>

    <div class="input-container">
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" class="text-field" autocomplete="off"
            placeholder="{{ $placeholder }}" @if ($required) required @endif data-textmode="{{ $textMode }}" 
            aria-label="{{ $label }}" maxlength="{{ $maxlength ?? ($type === 'mobile' ? 15 : ($type === 'email' ? 50 : ($type === 'text' ? 50 : ''))) }}" />
    </div>

    <div class="validation-message-container">
        <img src="{{ asset('assets/icons/Icon-Info3.svg') }}" alt="Info Icon" /> <!-- Use the SVG icon here -->
        <span>{{ $validationMessage }}</span>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>    
<script>
    $(document).ready(function() {
        let emailCheckTimeout;

        $(".text-field").on("input", function() {
            let inputField = $(this);
            let inputWrapper = inputField.closest(".text-field-container");
            let validationMessageContainer = inputWrapper.find(".validation-message-container");
            let value = inputField.val().trim();
            let isValid = false;

            // Clear previous timeout
            clearTimeout(emailCheckTimeout);

            // Validation rules based on input type
            switch (inputField.attr("type")) {
                case "text":
                    let textMode = $(this).data("textmode");
                    if (textMode === "default") {

                        isValid = /^[a-zA-Z\s\-']+$/.test(value); // Allow letters, spaces, hyphens, and apostrophes
                        let inputValuetext = $(this).val();
    
                        // Allow only letters, spaces, hyphens, and apostrophes
                        let editedValue = inputValuetext.replace(/[^a-zA-Z\s\-']/g, '');

                        // Update the input field
                        $(this).val(editedValue);
                    } else {
                        // Accept all characters (no validation)
                        isValid = true;
                    }
                    
                    break;
                case "number":
                    isValid = /^\d+$/.test(value); // Allow only numbers
                    break;
                case "mobile":
                    let numericValue = value.replace(/\D/g, '');
                    isValid = /^09\d{9}$/.test(numericValue); // Must start with 09 and have up to 13 digits
                    let inputValue = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters
                    if (inputValue.length > 4) {
                        inputValue = inputValue.replace(/^(\d{4})(\d)/, '($1) $2');
                    }
                    if (inputValue.length > 8) {
                        inputValue = inputValue.replace(/(\d{1,4})(\d{4}$)/, '$1-$2');
                    }
                    $(this).val(inputValue);

                    break;
                case "email":
                    isValid = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value); // Email validation
                    if (isValid) {
                        // emailCheckTimeout = setTimeout(function() {
                        //     $.ajax({
                        //         url: '{{ url('/check-email') }}',
                        //         method: 'POST',
                        //         data: {
                        //             email: value,
                        //             _token: '{{ csrf_token() }}'
                        //         },
                        //         success: function(response) {
                        //             if (response.exists) {
                        //                 validationMessageContainer.html('<img src="{{ asset('assets/icons/Icon-Info3.svg') }}" alt="Info Icon" /> Email already exists').show();
                        //                 inputWrapper.addClass("invalid").removeClass("valid");
                        //                 $(document).trigger('emailValidationResult', [false]);
                        //             } else {
                        //                 validationMessageContainer.hide();
                        //                 inputWrapper.addClass("valid").removeClass("invalid");
                        //                 $(document).trigger('emailValidationResult', [true]);
                        //                 $('#nextForm1').prop('disabled', false); // Enable the nextForm1 button
                        //             }
                        //         },
                        //         error: function() {
                        //             validationMessageContainer.html('<img src="{{ asset('assets/icons/Icon-Info3.svg') }}" alt="Info Icon" /> Error checking email').show();
                        //             inputWrapper.addClass("invalid").removeClass("valid");
                        //             $(document).trigger('emailValidationResult', [false]);
                        //         }
                        //     });
                        // }, 0);
                    } else {
                        validationMessageContainer.html('<img src="{{ asset('assets/icons/Icon-Info3.svg') }}" alt="Info Icon" /> Invalid email format').show();
                        inputWrapper.addClass("invalid").removeClass("valid");
                        $(document).trigger('emailValidationResult', [false]);
                    }
                    break;
                case "any":
                    isValid = /^[\s\S]*$/.test(value); // Allow any character
                    break;
                default:
                    isValid = true; // No validation for other types
            }

            // Update valid/invalid states and show/hide validation message for email only
            if (inputField.attr("type") === "email") {
                if (value === "") {
                    inputWrapper.removeClass("valid invalid");
                    validationMessageContainer.hide();
                } else if (isValid) {
                    inputWrapper.removeClass("invalid").addClass("valid");
                    validationMessageContainer.hide();
                } else {
                    inputWrapper.removeClass("valid").addClass("invalid");
                    validationMessageContainer.show();
                }
            } else {
                if (value === "") {
                    inputWrapper.removeClass("valid invalid");
                } else if (isValid) {
                    inputWrapper.removeClass("invalid").addClass("valid");
                } else {
                    inputWrapper.removeClass("valid").addClass("invalid");
                }
                validationMessageContainer.hide();
            }
        });

        // Initially hide all validation messages
        $(".validation-message-container").hide();
    });
</script>
