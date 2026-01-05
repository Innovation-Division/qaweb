$(document).ready(function () {
    let dateInput = document.getElementById("dateOfBirth");
    let observer = new MutationObserver(function () {
        validateDateOfBirth();
    });

    observer.observe(dateInput, { attributes: true, attributeFilter: ["value"] });

    function validateDateOfBirth() {
        let inputField = $("#dateOfBirth");
        let parentField = inputField.closest(".input-container");
        let selectedDate = new Date(inputField.val());
        let today = new Date();
        today.setHours(0, 0, 0, 0); // Reset time to midnight for proper comparison

        if (!inputField.val()) {
            parentField.addClass("is-invalid"); // Empty date field
        } else if (selectedDate >= today) {
            parentField.addClass("is-invalid");
            alert("Date of Birth cannot be in the future.");
        } else {
            parentField.removeClass("is-invalid"); // ✅ Remove error when valid
        }
    }

    // Set CSRF token in AJAX headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#goBacktoLogin').on('click', function () {
        event.preventDefault();
        window.location.href = $('meta[name="url"]').attr("content") + "/login";
    });

    $('#goBacktoLogin2').on('click', function () {
        event.preventDefault();
        window.location.href = $('meta[name="url"]').attr("content") + "/login";
    });


    $('#backToAccountAsFromForm1').on('click', function () {
        event.preventDefault();
        $('#form1').hide();
        $('#accountAs').show();
        $(".icon-bday").show();
        $(".icon-bday-checked").hide();
        $(".pill-button").removeClass("expanded");
    });

    $('#cancelForm1').on('click', function () {
        $('#form1').hide();
        $('#accountAs').show();
        $('#form1').find('input[type="text"], input[type="email"], input[type="date"], input[type="mobile"]').val('');
        $('#form1').find('.input-container').removeClass('is-invalid');
        $('#form1').find('.dropdown-input-container').removeClass('is-invalid');
        $(".pill-button").removeClass("expanded");
        selectedOption = null;
    });
    $("#dateOfBirth").on("change", function () {
        alert("HERE");
        let parentField = $(this).closest(".input-container");
        let selectedDate = new Date($(this).val());
        let today = new Date();
        today.setHours(0, 0, 0, 0); // Reset time to avoid incorrect comparisons

        if (!$(this).val()) {
            parentField.addClass("is-invalid"); // Empty date field
        } else if (selectedDate >= today) {
            parentField.addClass("is-invalid");
            alert("Date of Birth cannot be in the future.");
        } else {
            parentField.removeClass("is-invalid"); 
        }
    });

    // Pill button functionality
    let selectedOption = null;

    $(document).on("click", ".pill-button", function (event) {
        event.preventDefault();
        $(".f1-question p").removeClass("is-invalid-text");
        $(".pill-button").removeClass("expanded");
        $(this).addClass("expanded");
        selectedOption = $(this).attr("id");
        if(selectedOption === "noOptionForm1" || selectedOption === "yesOptionForm1"){
            $("input[name='hdn_option1']").val($(this).attr("id"));
        }
    });


    $('input[type="text"], input[type="email"], input[type="date"], input[type="mobile"]').on('input', function () {
        let inputField = $(this);

        if (inputField.attr("required") !== undefined) { // Only apply if the field is required
            if ($(this).val()) {
                inputField.removeClass("is-invalid");
                inputField.closest('.input-container').removeClass("is-invalid");
            } else {
                inputField.closest('.input-container').addClass("is-invalid");
            }
        }
    });



    $(document).on("click", ".dropdown-option", function () {
        let selectedValue = $(this).text().trim(); // Get selected option text
        let inputField = $(this).closest(".dropdown-container").find("input.dropdown-text-field");

        inputField.val(selectedValue).trigger("change"); // Trigger change event
    });

    // Listen for changes in the input field
    $(document).on("change", ".dropdown-text-field", function () {
        let parentFielddropdown = $(this).closest('.dropdown-input-container'); // Target the parent containe
        if ($(this).val()) {
            parentFielddropdown.removeClass("is-invalid");
        }
    });

    // $(document).on("change", "#dateOfBirth", function () {
    //     let parentField = $(this).closest('.input-container'); // Target the parent containe
    //     if ($(this).val()) {
    //         parentField.removeClass("is-invalid");
    //     }
    // });


    // Next button functionality
    $('#nextForm1').on('click', function () {
        
        let isValid = true;
        let formData = {
            firstName: $("#firstName").val(),
            middleName: $("#middleName").val(),
            lastName: $("#lastName").val(),
            dateOfBirth: $("#dateOfBirth").val(),
            placeOfBirth: $("#placeOfBirth").val(),
            sex: $("#sex").val(),
            citizenship: $("#citizenship").val(),
            contactNumber: $("#contactNumber").val(),
            email: $("#email").val(),
        };
       

       
        // Email validation function
        function isValidEmail(email) {
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        // Check required fields
        for (let field in formData) {
            let inputField = $("#" + field);
            let parentField = inputField.closest('.input-container'); // Target the parent container
            let parentFieldDropdown = inputField.closest('.dropdown-input-container'); // Target dropdown container

            if (formData[field] === "" && inputField.attr("required")) {
                isValid = false;
                parentField.addClass("is-invalid");
                parentFieldDropdown.addClass("is-invalid");
            } else {
                parentField.removeClass("is-invalid");
                parentFieldDropdown.removeClass("is-invalid");
            }
            if (field === "dateOfBirth") {
                if (formData.dateOfBirth == "") {
                    isValid = false;
                    parentField.addClass("is-invalid");
                } else {
                    parentField.removeClass("is-invalid");
                }
            }
            if (field === "contactNumber") {
                if (formData.contactNumber.length !== 15) {
                    isValid = false;
                    parentField.addClass("is-invalid");
                } else {
                    parentField.removeClass("is-invalid");
                }
            }
            if (field === "email") {
                if (formData.email === "") {
                    isValid = false;
                    parentField.addClass("is-invalid");

                    if (!inputField.next(".error-message").length) {
                    }
                } else if (!isValidEmail(formData.email)) {
                    isValid = false;
                    parentField.addClass("is-invalid");

                } else {
                    parentField.removeClass("is-invalid");
                    inputField.next(".error-message").remove(); // Remove existing error message
                }
            }


        }

        $(".f1-question p").removeClass("is-invalid-text");
        if (!selectedOption) {
            isValid = false;
            $(".f1-question p").addClass("is-invalid-text");
        }
        if (!isValid) {
            return;
        }
        let btn = $(this);
        handleButtonClick.call(btn);
        
        $.ajax({
            url: $('meta[name="url"]').attr("content") + '/check-email',
            type: 'POST',
            data: { email: formData.email },
            success: function (response) {
                let inputField = $("#email"); // Get the jQuery object
                let inputWrapper = inputField.closest(".text-field-container"); // Now .closest() works

                inputWrapper.removeClass("invalid");
                stopButtonLoading.call(btn);
                if (response.exists) {
                    var iconPath = "{{ asset('assets/icons/Icon-Info3.svg') }}";

                    let validationMessageContainer = inputWrapper.find(".validation-message-container");
                    validationMessageContainer.html('<img src="' + $('meta[name="url"]').attr("content") + "/assets/icons/Icon-Info3.svg" + '" alt="Info Icon" /> Email already exists').show();
                    inputWrapper.addClass("invalid").removeClass("valid");
                    $(document).trigger('emailValidationResult', [false]);
                } else {
                    // Save form data to sessionStorage
                    sessionStorage.setItem('form1Data', JSON.stringify(formData));
                    $(".f2-branch-container, .f2-dropdown-container, .f2-contact-main-container").slideDown(300).css("opacity", 1);

                    // Hide all forms
                    $('#form1').hide();
                    $('#form2').hide();
                    $('#form2-1').hide();

                    // Navigate based on the selected option
                    if ($("input[name='hdn_option1']").val() === 'noOptionForm1') {
                        $('#form2').show(); // Show form2
                    } else if ($("input[name='hdn_option1']").val() === 'yesOptionForm1') {
                        $('#form2-1').show(); // Show form2-1
                    }
                   
                   
                }
            },
            // error: function () {
            //     alert('An error occurred while checking the email. Please try again.');
            // }
        });
    });

    // Load saved form data if it exists
    if (sessionStorage.getItem("form1Data")) {
        let formData = JSON.parse(sessionStorage.getItem("form1Data"));
        $('#firstName').val(formData.firstName);
        $('#middleName').val(formData.middleName);
        $('#lastName').val(formData.lastName);
        $('#dateOfBirth').val(formData.dateOfBirth);
        $('#placeOfBirth').val(formData.placeOfBirth);
        $('#sex').val(formData.sex);
        $('#citizenship').val(formData.citizenship);
        $('#contactNumber').val(formData.contactNumber);
        $('#email').val(formData.email);

        if (formData.hasExistingPolicy === 'Yes') {
            $('#yesOptionForm1').addClass('expanded');
            selectedOption = 'yesOptionForm1';
        } else if (formData.hasExistingPolicy === 'No') {
            $('#noOptionForm1').addClass('expanded');
            selectedOption = 'noOptionForm1';
        }
    }

    // $(document).on("emailValidationResult", function (event, isValid) {
    //     $("#nextForm1").prop("disabled", !isValid);
    // });
});