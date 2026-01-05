$(document).ready(function () {
    $(".f2-dropdown-container").show();

    // Initial state
    restorePillButtonState();
    showBranchAndContactFields();

    $("#backtoForm1FromForm2-1").on("click", function (event) {
        event.preventDefault();
        var option1 = $("input[name='hdn_option1']").val();
        $("#" + option1).addClass("expanded");
        $("#form2-1").hide();
        $("#form1").show();
    });

    $("#cancelForm2-1").on("click", function () {
        $("#form2-1").hide();
        $("#accountAs").show();
        sessionStorage.removeItem("form1Data");
        $("#form2-1")[0].reset();
        history.replaceState(null, "", location.pathname); 
        sessionStorage.removeItem("form2-1Data");
        $("#form1")[0].reset();
        $(".pill-button").removeClass("expanded");
        $(".checkbox-input").prop("checked", false);
    });

    $("#noRepresentativeForm2-1").on("click", function () {
        hideBranchAndContactFields();
        $("#branchForm2-1").val("");
        $("#contactEmailF2-1").prop("checked", false);
        $("#contactSMSF2-1").prop("checked", false);
        $("#contactMessengerF2-1").prop("checked", false);
        $("#contactCallF2-1").prop("checked", false);
        $(".f2-1-representative-container .title-required span").removeClass("is-invalid-text");
    });

    $("#yesRepresentativeForm2-1").on("click", function () {
        showBranchAndContactFields();
        $(".f2-1-representative-container .title-required span").removeClass("is-invalid-text");
    });

    function showBranchAndContactFields() {
        $(
            ".f2-1-branch-container, .f2-1-dropdown-container, .f2-1-main-contact-container"
        )
            .css("opacity", 0)
            .slideDown(300)
            .animate({ opacity: 1 }, { queue: false, duration: 300 });
    }

    function hideBranchAndContactFields() {
        $(
            ".f2-1-branch-container, .f2-1-dropdown-container, .f2-1-main-contact-container"
        )
            .slideUp(300)
            .animate({ opacity: 0 }, { queue: false, duration: 300 });
        $("#branch2-1").val("");
        $("#contactEmailF2-1").prop("checked", false);
        $("#contactSMSF2-1").prop("checked", false);
        $("#contactMessengerF2-1").prop("checked", false);
        $("#contactCallF2-1").prop("checked", false);
    }

    function validatePolicyCheckboxes21() {
        let isChecked = $(".f2-1-contact-container input:checked").length > 0;

        if (isChecked) {
            $(".f2-1-contact-container input[type='checkbox']").removeClass("is-invalid");
            $(".f2-1-contact-container label").removeClass("is-invalid-text");
            $(".f2-1-content-title-4").removeClass("is-invalid-text");
            $(".f2-1-main-contact-container .title-required span").removeClass("is-invalid-text");
        } else {
            allValid = false;
            $(".f2-1-contact-container input[type='checkbox']").addClass("is-invalid");
            $(".f2-1-contact-container label").addClass("is-invalid-text");
            $(".f2-1-content-title-4 p").addClass("is-invalid-text");
            $(".f2-1-main-contact-container .title-required span").addClass("is-invalid-text");
        }
    }

    $(".f2-1-contact-container label").on("click", function () {
        $(".f2-1-contact-container input[type='checkbox']").removeClass("is-invalid");
        $(".f2-1-contact-container label").removeClass("is-invalid-text");
        $(".f2-1-content-title-4").removeClass("is-invalid-text");
        $(".f2-1-main-contact-container .title-required span").removeClass("is-invalid-text");
    });
    
    function restorePillButtonState() {
        let pillButtonState = sessionStorage.getItem("pillButtonState");
        if (pillButtonState === "yes") {
            $("#yesRepresentativeForm2-1").addClass("expanded");
            $("#noRepresentativeForm2-1").removeClass("expanded");
            showBranchAndContactFields();
        } else if (pillButtonState === "no") {
            $("#noRepresentativeForm2-1").addClass("expanded");
            $("#yesRepresentativeForm2-1").removeClass("expanded");
            hideBranchAndContactFields();
        }
    }

    function savePillButtonState(state) {
        sessionStorage.setItem("pillButtonState", state);
    }


    // Form validation
    function validateForm2_1() {
        let isValid = true;

        // Validate at least one policy is selected
        let policyContainer = $(".policy-grid");
        if (!$(".policy-grid input[type='checkbox']:checked").length) {
            isValid = false;
            policyContainer.find("input[type='checkbox']").addClass("is-invalid"); // Add red border to checkboxes
            policyContainer.find("label").addClass("is-invalid-text"); // Add red text to labels
        } else {
            policyContainer.find("input[type='checkbox']").removeClass("is-invalid"); // Remove red border from checkboxes
            policyContainer.find("label").removeClass("is-invalid-text"); // Remove red text from labels
        }

        // Validate representative selection
        let representativeContainer = $(".f2-1-pill-button-container");
        if (!$(".pill-button.expanded").length) {
            isValid = false;
            representativeContainer.addClass("is-invalid"); // Add red border to pill button container
        } else {
            representativeContainer.removeClass("is-invalid"); // Remove red border from pill button container
        }

        // Validate branch and contact fields if representative is needed
        if ($("#yesRepresentativeForm2-1").hasClass("expanded") || !$(".pill-button.expanded").length) {
            // Validate branch dropdown
            let branchInput = $("#branchForm2-1");
            if (!branchInput.val()) {
                isValid = false;
                branchInput.addClass("is-invalid");
                branchInput.css("background-color", "#FFE2E2");
                branchInput.closest(".dropdown-container").find("label").addClass("is-invalid-text");
            } else {
                branchInput.removeClass("is-invalid");
                branchInput.css("background-color", "").css("border", "");
                branchInput.closest(".dropdown-container").find("label").removeClass("is-invalid-text");
            }

            // Validate at least one contact method is selected
            let contactContainer = $(".f2-1-contact-container");
            if (!$(".f2-1-contact-container input[type='checkbox']:checked").length) {
                isValid = false;
                contactContainer.find("input[type='checkbox']").addClass("is-invalid"); 
                contactContainer.find("label").addClass("is-invalid-text"); 
            } else {
                contactContainer.find("input[type='checkbox']").removeClass("is-invalid"); 
                contactContainer.find("label").removeClass("is-invalid-text"); 
            }
        } else if ($("#noRepresentativeForm2-1").hasClass("expanded")) {

            $("#branchForm2-1").removeClass("is-invalid").css("background-color", "").css("border", "");
            $(".f2-1-contact-container input[type='checkbox']").removeClass("is-invalid");
            $(".f2-1-contact-container label").removeClass("is-invalid-text");
        }

        return isValid;
    }

    $("#branchForm2").on("change", function () {
        if ($(this).val()) {
            $(this).removeClass("is-invalid");
            $(this).css("background-color", "").css("border", "");
            $(this).closest(".dropdown-container").find("label").removeClass("is-invalid-text");
        }
    });

    $('.f2-contact-container input[type="checkbox"]').on("change", function () {
        let contactContainer = $(this).closest(".f2-contact-container");
        if ($(".f2-contact-container input[type='checkbox']:checked").length > 0) {
            contactContainer.find("input[type='checkbox']").removeClass("is-invalid"); 
            contactContainer.find("label").removeClass("is-invalid-text"); 
        }
    });

    $(".pill-button").removeClass("expanded");

    $("#form2-1").on("submit", function (e) {
        e.preventDefault();
        // $("#form1")[0].reset();
        // $("#form2")[0].reset();
        let form = $(this);

        let policyNumbers = [];
        let allValid = true;
        let form1Data = JSON.parse(sessionStorage.getItem("form1Data")) || {};
        let form2_1Data = {
            formType: "form2-1",
            policyOne: form.find("#policyOne").val() || null,
            policyTwo: form.find("#policyTwo").val() || null,
            policyThree: form.find("#policyThree").val() || null,

            branch: form.find("#branchForm2-1").val() || "None",

            contactEmail: form.find("#contactEmailF2-1").is(":checked")
                ? "yes"
                : "no",
            contactSMS: form.find("#contactSMSF2-1").is(":checked") ? "yes" : "no",
            contactMessenger: form.find("#contactMessengerF2-1").is(":checked")
                ? "yes"
                : "no",
            contactCall: form.find("#contactCallF2-1").is(":checked")
                ? "yes"
                : "no",
            AutoExcelPlus: form.find("#AutoExcelPlus").is(":checked")
                ? "yes"
                : "no",
            InternationalTravelPlus: form
                .find("#InternationalTravelPlus")
                .is(":checked")
                ? "yes"
                : "no",
            DomesticTravelPlus: form.find("#DomesticTravelPlus").is(":checked")
                ? "yes"
                : "no",
            ProTech: form.find("#ProTech").is(":checked") ? "yes" : "no",
            CondoExcelPlus: form.find("#CondoExcelPlus").is(":checked")
                ? "yes"
                : "no",
            ctpl: form.find("#ctpl").is(":checked")
                ? "yes"
                : "no",
            Covid: form.find("#Covid").is(":checked")
                ? "yes"
                : "no",
        };

        const policyIds = ["policyOne", "policyTwo", "policyThree"];
        policyIds.forEach(function(id) {
            let policyInput = $("#" + id);
            policyInput.removeClass("is-invalid");
            if (policyInput.length) {  
                if (!policyInput.val().trim()) { 
                    allValid = false;
                    policyInput.addClass("is-invalid");
                }
                var policyNumber = $("#" + id).val().trim();
                var policyPattern =  /^[A-Z]{2}-[A-Z]{3}-[A-Z]{2}-\d{2}-\d{7}-\d{2}$/;
                // console.log(policyPattern.test(policyNumber));
                
                if (policyPattern.test(policyNumber)) {
                } else {
                    allValid = false;
                    policyInput.addClass("is-invalid");
                }
            }
        });
        
        if (!$("#noRepresentativeForm2-1, #yesRepresentativeForm2-1").hasClass("expanded")) {
            allValid = false;
            $(".f2-1-representative-container .title-required span").addClass("is-invalid-text");
        }
        
        if ($("#yesRepresentativeForm2-1").hasClass("expanded") || !$("#noRepresentativeForm2-1, #yesRepresentativeForm2-1").hasClass("expanded")) {
            validatePolicyCheckboxes21();
            let inputField = $("#branchForm2-1");
            let parentFielddropdown = inputField.closest('.dropdown-input-container'); // Target the parent container 
            if(form.find("#branchForm2-1").val() == ""){
                allValid = false;
               parentFielddropdown.addClass("is-invalid");
            }else{
                parentFielddropdown.removeClass("is-invalid");
            }
           
        }
        // console.log(allValid);
        if (!allValid) {
            return;
        }
        let btnloading = $(this);
        handleButtonClick.call(btnloading);
        
        // return false;

        let combinedData = {
            ...form1Data,
            ...form2_1Data,
        };
        console.log(allValid);
        $.ajax({
            url: $('meta[name="url"]').attr("content") + "/submit-step1",
            type: "POST",
            data: combinedData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // return false;
                if (response.id) {
                    console.log(response.id);
                    sessionStorage.setItem("submittedID", response.id);
                    sessionStorage.setItem("policyholder_id", response.id);
                    $("input[name='hdn_id']").val(response.id);
                    //$("#form2-1").fadeOut(() => $("#form3").fadeIn());
                    $("#form2-1").fadeOut(() => $("#form3").fadeIn());
                    stopButtonLoading.call(btnloading);
                    // $('#form2-1').fadeOut(function() {
                    //     console.log("FadeIN");
                    //     $('#form3').fadeIn();
                    // });
                } else {
                    displayValidationMessage('Error: No ID returned from server.');
                }
                sessionStorage.removeItem("form1Data");
            },
            error: function(xhr, status, error) {
                console.log("error");
                console.log(xhr.responseText);

                let errorMsg = '';
                console.error("Submit error:", xhr.responseText);

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                console.log(errors);

                    for (let field in errors) {
                        errorMsg += field + ': ' + errors[field].join(', ') + '\n';
                    }
                    displayValidationMessage('Validation errors:\n' + errorMsg);
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    displayValidationMessage('Error: ' + xhr.responseJSON.message);
                } else {
                    displayValidationMessage('An unexpected error occurred: ' + error);
                }
            }
        });
    });

});
