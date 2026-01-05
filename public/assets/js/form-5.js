$(document).ready(function () {
    // Define categories mapping
    const categories = {
        1: "Debit Card",
        2: "OTC Banking",
        4: "OTC Non-Bank",
        8: "E-Wallet",
        32: "Credit Card",
        64: "Credit Card",
    };

    // Declare bankWalletData in a higher scope
    let bankWalletData = {
        "Debit Card": [],
        "OTC Banking": [],
        "OTC Non-Bank": [],
        "E-Wallet": [],
        "Credit Card": [],
    };

    
    let selectedOption = null;

    // Pill button functionality
    $(document).on("click", ".pill-button", function (event) {
        event.preventDefault();
        $(".f5-payment-method .title-required span").removeClass("is-invalid-text"); // Remove invalid state
        $(".pill-button").removeClass("expanded");
        $(this).addClass("expanded");
        selectedOption = $(this).attr("id");
    });


    // Handle "No" button click
    $("#noPaymentMethod").on("click", function () {
        $("#yesPaymentMethod").removeClass("expanded");
        $(this).addClass("expanded");

        // Disable and clear the dropdowns
        
        $("#payment, #bankWallet")
            .closest(".dropdown-container")
            .removeClass("is-invalid") // Remove invalid state
            .addClass("disabled");

        // Update the arrow icon to the "down" state
        $("#payment, #bankWallet").each(function () {
            const dropdownIcon = $(this)
                .closest(".dropdown-container")
                .find(".dropdown-icon");
            dropdownIcon.attr(
                "src",
                "{{ asset('assets/icons/Icon-ArrowDown.svg') }}"
            );
        });
        $("#bankWallet").prop("disabled", true).val("");
        $("#payment").prop("disabled", true).val("");
    });

    // Handle "Yes" button click
    $("#yesPaymentMethod").on("click", function () {
        $("#noPaymentMethod").removeClass("expanded");
        $(this).addClass("expanded");

        $("#payment, #bankWallet").prop("disabled", false);
        $("#payment, #bankWallet")
            .closest(".dropdown-container")
            .removeClass("disabled");

        // Update the arrow icon to the "down" state
        $("#payment, #bankWallet").each(function () {
            const dropdownIcon = $(this)
                .closest(".dropdown-container")
                .find(".dropdown-icon");
            dropdownIcon.attr(
                "src",
                "{{ asset('assets/icons/Icon-ArrowDown.svg') }}"
            );
        });

        // Clear existing data before fetching new data
        for (let key in bankWalletData) {
            bankWalletData[key] = [];
        }

        // Fetch payment methods from backend
        $.ajax({
            url: $('meta[name="url"]').attr("content") + "/payment-methods",
            type: "GET",
            success: function (data) {
                console.log("Received data from API:", data); // Debugging: Log the API response

                let paymentDropdown = $("#payment");
                let bankWalletDropdown = $("#bankWallet");

                if (!Array.isArray(data) || data.length === 0) {
                    console.error("Invalid response from API:", data);
                    return;
                }

                // Process each payment method
                data.forEach((method) => {
                    if (
                        method.procId &&
                        method.shortName &&
                        method.logo &&
                        categories[method.type]
                    ) {
                        let category = categories[method.type];
                        console.log(
                            `Processing method: ${method.shortName}, Type: ${method.type}, Category: ${category}`
                        );

                        // Create an object with logo and shortName
                        let option = {
                            procId: method.procId,
                            logo: method.logo,
                            shortName: method.shortName,
                        };

                        // Group bank/wallet options under the respective payment type
                        bankWalletData[category].push(option);
                    } else {
                        console.warn("Skipping invalid method:", method);
                    }
                });

                //console.log("Bank/Wallet Data:", bankWalletData); // Debugging: Log the grouped data

                // Update Payment Type dropdown
                let paymentOptions = `
                    <option value="">Select Payment Type</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="OTC Banking">OTC Banking</option>
                    <option value="OTC Non-Bank">OTC Non-Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                `;
                paymentDropdown.html(paymentOptions);

                console.log(paymentDropdown);
                console.log("Dropdown updated successfully!");

                // Ensure dropdown refresh
                paymentDropdown.trigger("change");
                bankWalletDropdown.trigger("change");
                console.log(paymentDropdown.trigger("change"));
                console.log(bankWalletDropdown.trigger("change"));
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText); // Debugging: Log AJAX errors
            },
        });
    });

    // Filter Bank/E-Wallet options when Payment Type changes
    $("#payment").on("change", function () {
        let selectedCategory = $(this).val();
        // console.log(`Selected Category: ${selectedCategory}`);
        // Disable the bankWallet dropdown if Credit Card is selected
        if (selectedCategory === "Credit Card") {
            $("#bankWallet").prop("disabled", true).val(""); // Disable and clear the value
            $("#bankWallet")
                .closest(".dropdown-container")
                .addClass("disabled");
        } else {
            $("#bankWallet").prop("disabled", false); // Enable the dropdown
            $("#bankWallet")
                .closest(".dropdown-container")
                .removeClass("disabled");
        }
        $("#bankWallet").val("");
        // console.log(bankWalletData);
        // Append filtered options
        if (
            bankWalletData[selectedCategory] &&
            bankWalletData[selectedCategory].length > 0
        ) {
            // console.log(
            //     `Options for ${selectedCategory}:`,
            //     bankWalletData[selectedCategory]
            // );

            // Update the custom dropdown options
            updateDropdownOptions(
                "bankWallet",
                bankWalletData[selectedCategory]
            );
        } else {
            console.warn(`No options found for category: ${selectedCategory}`);
        }
    });


    
    function updateDropdownOptions(dropdownId, options) {
        let dropdownMenu = $("#dropdown-menu-bankWallet .dropdown-options");
        dropdownMenu.empty();
        options.forEach((option) => {
            let optionElement = `<div class="dropdown-option" onclick="!this.closest('.dropdown-container').classList.contains('disabled') && selectOption('${option.shortName}', 'bankWallet')"> 
                <img src="${option.logo}" alt="" class="option-logo" />${option.shortName}</div>`;
            dropdownMenu.append(optionElement);
        });

    }
    
    // Form submission validation
    $("#form5").on("submit", function (e) {
        e.preventDefault();
        let isValid = true;

        // Check if either "Yes" or "No" pill button is selected
        const isYesSelected = $("#yesPaymentMethod").hasClass("expanded");
        const isNoSelected = $("#noPaymentMethod").hasClass("expanded");

            // Additional validation for payment fields if "Yes" is selected
        if (isYesSelected) {
            let payment = $("#payment").val();
            let bankWallet = $("#bankWallet").val();

            if (!payment) {
                $("#payment")
                    .closest(".dropdown-input-container")
                    .addClass("is-invalid");
                isValid = false;
            } else {
                $("#payment")
                    .closest(".dropdown-input-container")
                    .removeClass("is-invalid");
            }

            if (!bankWallet && $("#payment").val() !== "Credit Card") {
                $("#bankWallet")
                    .closest(".dropdown-input-container")
                    .addClass("is-invalid");
                isValid = false;
            } else {
                $("#bankWallet")
                    .closest(".dropdown-input-container")
                    .removeClass("is-invalid");
            }
        }
        if (!isValid) return;
            
        
        
        let form5Data = {
            payment: $("#payment").val(),
            bankWallet: $("#bankWallet").val(),
        };
        sessionStorage.setItem("form5Data", JSON.stringify(form5Data));

        let id = sessionStorage.getItem("submittedID");
        if (!id) {
            alert("Error: No ID found. Please start over.");
            return;
        }
        let btnloading = $(this);
        handleButtonClick.call(btnloading);
        $('#countdown').text("5:00");
        $('#countdown').val("5:00");
        $("#form5").hide();
        $("#form6").fadeIn().promise().done(function() {
            $('#resend-btn-hide').click();
        });
        $(this).prop("disabled", true).css("pointer-events", "none").off("click");
        // Check if the ID exists in the database before proceeding
        $.ajax({
            url: $('meta[name="url"]').attr("content") + "/check-id/" + id,
            type: "GET",
            success: function (response) {
                if (response.exists) {
                    let form3Data =
                        JSON.parse(sessionStorage.getItem("form3Data")) || {};
                    let combinedData = { ...form3Data, ...form5Data };
                    
                    $.ajax({
                        url: $('meta[name="url"]').attr("content") + "/submit-step2/" + id,
                        type: "POST",
                        data: combinedData,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        success: function () {
                            sessionStorage.removeItem("form3Data");
                            sessionStorage.removeItem("form4Data");
                            sessionStorage.removeItem("form5Data");
                            stopButtonLoading.call(btnloading);
                             
                        },
                        error: function (xhr, status, error) {
                            console.error("Submit error:", xhr.responseText);
                        },
                    });
                } else {
                    alert(
                        "Error: ID not found in the database. Please start over."
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("ID check error:", xhr.responseText);
            },
        });
    });

    // Restore saved data
    if (sessionStorage.getItem("form5Data")) {
        let savedData = JSON.parse(sessionStorage.getItem("form5Data"));
        if (savedData.payment) {
            $("#yesPaymentMethod").addClass("expanded");
            $("#noPaymentMethod").removeClass("expanded");
            $("#payment, #bankWallet")
                .prop("disabled", false)
                .val(savedData.payment);
        } else {
            $("#noPaymentMethod").addClass("expanded");
            $("#yesPaymentMethod").removeClass("expanded");
            $("#payment, #bankWallet").prop("disabled", true).val("");
        }
    }
    $("#continueForm5").on("click", function (e) {
        e.preventDefault();
        $("#continueLaterModal").fadeIn();
        return false;
    });
    // Handle back button click
    $("#backForm5").on("click", function () {
        $("#form6").hide();
        $("#form5").hide();
        $("#form4").show();
        return false;   
    });

    // Prevent opening dropdown when disabled
    $(".dropdown-container").on("click", function (e) {
    if ($(this).hasClass("disabled")) {
            e.stopPropagation();
            e.preventDefault();
        }
    });
});