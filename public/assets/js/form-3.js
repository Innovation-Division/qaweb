$(document).ready(function () {

    let selectedOption = null;



    $(document).on("click", ".dropdown-option", function () {
        let selectedValue = $(this).text().trim(); // Get selected option text
        let inputField = $(this).closest(".dropdown-container").find("input.dropdown-text-field");

        inputField.val(selectedValue).trigger("change"); // Trigger change event
    });

    // Listen for changes in the input field
    $(document).on("change", ".dropdown-text-field", function () {
        let parentFielddropdown = $(this).closest('.dropdown-input-container'); // Target the parent container
        if ($(this).val()) {
            parentFielddropdown.removeClass("is-invalid");
        }

        if ($(this).attr('id') === 'region') {
            $.ajax({
                url: $('meta[name="url"]').attr("content") + "/get-province",
                type: "POST",
                data: { region: $(this).val() },
                headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },
                success: function (response) {
                    let dropdownMenu = $("#dropdown-menu-province .dropdown-options");
                    dropdownMenu.empty();
                    const inputField = document.getElementById("province");
                    const hiddenField = document.getElementById(`province-hidden`);
                    inputField.value = "";
                    hiddenField.value = ""; 
                    const searchBar = document.querySelector(`#dropdown-menu-province .search-bar`);
                    searchBar.value = '';

                    const inputFieldcity = document.getElementById("city");
                    const hiddenFieldcity = document.getElementById(`city-hidden`);
                    inputFieldcity.value = "";
                    hiddenFieldcity.value = ""; 
                    const searchBarcity = document.querySelector(`#dropdown-menu-city .search-bar`);
                    searchBarcity.value = '';

                    const inputFieldbarangay= document.getElementById("barangay");
                    const hiddenFieldbarangay= document.getElementById(`barangay-hidden`);
                    inputFieldbarangay.value = "";
                    hiddenFieldbarangay.value = ""; 
                    const searchBarbarangay= document.querySelector(`#dropdown-menu-barangay .search-bar`);
                    searchBarbarangay.value = '';


                    $.each(response, function (index, item) {
                        let optionElement = `<div class="dropdown-option" 
                        onclick="selectOption('${item.province}', 'province')">${item.province}</div>`;
                        dropdownMenu.append(optionElement);
                    });
                },
                error: function (xhr) {
                    console.error("Submit error:", xhr.responseText);
                },
            });
        }
        if ($(this).attr('id') === 'province') {
            $.ajax({
                url: $('meta[name="url"]').attr("content") + "/get-city",
                type: "POST",
                data: { province: $(this).val() },
                headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },
                success: function (response) {
                    let dropdownMenu = $("#dropdown-menu-city .dropdown-options");
                    dropdownMenu.empty();

                    const inputFieldcity = document.getElementById("city");
                    const hiddenFieldcity = document.getElementById(`city-hidden`);
                    inputFieldcity.value = "";
                    hiddenFieldcity.value = ""; 
                    const searchBarcity = document.querySelector(`#dropdown-menu-city .search-bar`);
                    searchBarcity.value = '';

                    const inputFieldbarangay= document.getElementById("barangay");
                    const hiddenFieldbarangay= document.getElementById(`barangay-hidden`);
                    inputFieldbarangay.value = "";
                    hiddenFieldbarangay.value = ""; 
                    const searchBarbarangay= document.querySelector(`#dropdown-menu-barangay .search-bar`);
                    searchBarbarangay.value = '';


                    $.each(response, function (index, item) {
                        let optionElement = `<div class="dropdown-option" 
                        onclick="selectOption('${item.city}', 'city')">${item.city}</div>`;
                        dropdownMenu.append(optionElement);
                    });
                },
                error: function (xhr) {
                    console.error("Submit error:", xhr.responseText);
                },
            });
        }

        if ($(this).attr('id') === 'city') {
            $.ajax({
                url: $('meta[name="url"]').attr("content") + "/get-barangay",
                type: "POST",
                data: { city: $(this).val() },
                headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },
                success: function (response) {
                    let dropdownMenu = $("#dropdown-menu-barangay .dropdown-options");
                    dropdownMenu.empty();
                    const inputFieldbarangay= document.getElementById("barangay");
                    const hiddenFieldbarangay= document.getElementById(`barangay-hidden`);
                    inputFieldbarangay.value = "";
                    hiddenFieldbarangay.value = ""; 
                    const searchBarbarangay= document.querySelector(`#dropdown-menu-barangay .search-bar`);
                    searchBarbarangay.value = '';
                    $.each(response, function (index, item) {
                        let optionElement = `<div class="dropdown-option" 
                        onclick="selectOption('${item.barangay}', 'barangay')">${item.barangay}</div>`;
                        dropdownMenu.append(optionElement);
                    });
                },
                error: function (xhr) {
                    console.error("Submit error:", xhr.responseText);
                },
            });
        }
    });

    $("#zip").on("input", function () {
        let value = $(this).val().replace(/\D/g, ""); // Remove non-numeric characters
        if (value.length > 4) {
            value = value.substring(0, 4); // Limit to 4 characters
        }
        $(this).val(value);
    });
    $("#street").on("input", function () {
        let value = $(this).val(); // Allow all characters
        if (value.length > 50) {
            value = value.substring(0, 50); // Limit to 50 characters
        }
        $(this).val(value);
    });
    $("#nextForm3").on("click", function (e) {
        e.preventDefault();

        let isValid = true;
        let formData = {
            unitNo: $("#unitNo").val(),
            street: $("#street").val(),
            barangay: $("#barangay").val(),
            city: $("#city").val(),
            province: $("#province").val(),
            region: $("#region").val(),
            zip: $("#zip").val(),
        };
        sessionStorage.setItem("form3Data", JSON.stringify(formData));
        //Next Button Validation
        for (let field in formData) {
            let inputField = $("#" + field);
            let parentField = inputField.closest('.input-container'); // Target the parent container
            let parentFielddropdown = inputField.closest('.dropdown-input-container'); // Target the parent container

            if (formData[field] === "" && inputField.attr("required")) {
                isValid = false;
                parentField.addClass("is-invalid");
                parentFielddropdown.addClass("is-invalid");
                // $(".f3-content-title p").addClass("is-invalid-text");
            } else {
                parentField.removeClass("is-invalid");
                parentFielddropdown.removeClass("is-invalid");
            }
        }

        if (isValid) {
            // $(".f3-content-title").removeClass("is-invalid-text");
        }

        if (!isValid) {
            return;
        }
        let btnloading = $(this);
        handleButtonClick.call(btnloading);

        document.getElementById("form3").style.display = "none";
        document.getElementById("form4").style.display = "block";
        stopButtonLoading.call(btnloading);
        var form4Content = document.querySelector(".identity-form2");
        if (form4Content) {
            form4Content.style.display = "block";
        }
    });

    // Pre-populate form fields if data is available in sessionStorage
    if (sessionStorage.getItem("form3Data")) {
        let formData = JSON.parse(sessionStorage.getItem("form3Data"));
        // $("#unitNo").val(formData.unitNo);
        // $("#street").val(formData.street);
        // $("#barangay").val(formData.barangay);
        // $("#city").val(formData.city);
        // $("#province").val(formData.province);
        // $("#region").val(formData.region);
        // $("#zip").val(formData.zip);
    }

    // Show modal when "Continue later" button is clicked
    $("#continueForm3").on("click", function (e) {
        e.preventDefault();
        $("#continueLaterModal").fadeIn();
    });

    // Hide modal when "Close" button is clicked
    $("#no_continue_later").on("click", function () {
        $("#continueLaterModal").fadeOut();
    });
    $("#yes_continue_later").on("click", function () {
        window.location.href = $('meta[name="url"]').attr("content");
    });
    
    // Hide modal when clicking outside the modal container
    $("#continueLaterModal").on("click", function (event) {
        if (!$(event.target).closest(".modal-container").length) {
            $("#continueLaterModal").fadeOut();
        }
    });
});
