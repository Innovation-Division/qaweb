$(document).ready(function () {
    restorePillButtonState();
    $(".icon-bday").show();
    $(".icon-bday-checked").hide();
    let selectedOption = null;

    $(document).on("click", ".dropdown-option", function () {
        let selectedValue = $(this).text().trim(); // Get selected option text
        let inputField = $(this).closest(".dropdown-container").find("input.dropdown-text-field");

        inputField.val(selectedValue).trigger("change"); // Trigger change event
        $(".f2-content-title-3").removeClass("is-invalid-text"); // Remove invalid state from .f2-content-title-3
    });

    // Listen for changes in the input field
    $(document).on("change", ".dropdown-text-field", function () {
        let parentFielddropdown = $(this).closest('.dropdown-input-container'); // Target the parent container
        if ($(this).val()) {
            parentFielddropdown.removeClass("is-invalid");
        }
    });

    // Checkbox validation and title error removal
    $('.policy-grid input[type="checkbox"]').on('change', function () {
        validatePolicyCheckboxes();
        $(".f2-content-title").removeClass("is-invalid-text");
    });

    $('.f2-contact-container input[type="checkbox"]').on('change', function () {
        validatePolicyCheckboxes2();
        $(".f2-content-title-4").removeClass("is-invalid-text");
    });

    function validatePolicyCheckboxes() {
        let isChecked = $(".policy-grid input:checked").length > 0;
        console.log("val 1");
        // Remove invalid class from checkboxes, labels, and content title when at least one is checked
        if (isChecked) {
            $(".policy-grid input[type='checkbox']").removeClass("is-invalid");
            $(".policy-grid label").removeClass("is-invalid-text");
            $(".f2-content-title").removeClass("is-invalid-text");
            $(".f2-content-title p").removeClass("is-invalid-text");
            $(".f2-content-title p span").removeClass("is-invalid-text");
        } else {
            isValid = false;
            $(".policy-grid input[type='checkbox']").addClass("is-invalid");
            $(".policy-grid label").addClass("is-invalid-text");
            $(".f2-content-title").removeClass("is-invalid-text");
            $(".f2-content-title p").addClass("is-invalid-text");
            $(".f2-content-title p span").addClass("is-invalid-text");
        }
    }

    function validatePolicyCheckboxes2() {
        let isChecked = $(".f2-contact-container input:checked").length > 0;
        if (isChecked) {
            $(".f2-contact-container input[type='checkbox']").removeClass("is-invalid");
            $(".f2-contact-container label").removeClass("is-invalid-text");
            $(".f2-content-title-4").removeClass("is-invalid-text");
            $(".f2-content-title-4 p span").removeClass("is-invalid-text");
        } else {
            isValid = false;
            $(".f2-contact-container input[type='checkbox']").addClass("is-invalid");
            $(".f2-contact-container label").addClass("is-invalid-text");
            $(".f2-content-title-4 ").addClass("is-invalid-text");
            $(".f2-content-title-4 p").addClass("is-invalid-text");
            $(".f2-content-title-4 p span").addClass("is-invalid-text");
        }
    }

    // Ensure clicking the label also removes the invalid state
    $(".policy-grid label").on("click", function () {
        $(".f2-content-title p").removeClass("is-invalid-text");
        $(".f2-content-title p span").removeClass("is-invalid-text");
    });

    $(".f2-contact-container label").on("click", function () {
        $(".f2-content-title-4 p").removeClass("is-invalid-text");
    });

    $(document).on("click", ".pill-button", function (event) {
        event.preventDefault();
        $(".f2-content-title-2 p").removeClass("is-invalid-text");
        $(".f2-pill-button-container").removeClass("is-invalid-text");
        $(".f2-pill-button-container").removeClass("is-invalid");
        $(".pill-button").removeClass("expanded");
        $(this).addClass("expanded");
        selectedOption = $(this).attr("id");
        
    });

    // Back to Form 1
    $("#backtoForm1FromForm2").on("click", function (event) {
        event.preventDefault();
        var option1 = $("input[name='hdn_option1']").val();
        $("#" + option1).addClass("expanded");
        $("#form2").hide();
        $("#form1").show();
    });

    // Cancel Form 2
    $("#cancelForm2").on("click", function () {
        $(".icon-bday").show();
        $(".icon-bday-checked").hide();
        sessionStorage.clear();
        $("#form2, #form1")[0].reset();
        history.replaceState(null, "", location.pathname);
        $("#form2").hide();
        $("#form1").hide();
        $("#accountAs").show();
        $(".pill-button").removeClass("expanded");
        $(".checkbox-input").prop("checked", false);
    });

    // Representative selection
    $("#noRepresentativeForm2").on("click", function () {
        hideBranchAndContactFields();
        savePillButtonState("no");
    });

    $("#yesRepresentativeForm2").on("click", function () {
        showBranchAndContactFields();
        savePillButtonState("yes");
    });

    function showBranchAndContactFields() {
        $(".f2-branch-container, .f2-dropdown-container, .f2-contact-main-container").slideDown(300).css("opacity", 1);
    }

    function hideBranchAndContactFields() {
        $(".f2-branch-container, .f2-dropdown-container, .f2-contact-main-container").slideUp(300).css("opacity", 0);
        $("#branchForm2").val("");
        $(".f2-contact-container input[type='checkbox']").prop("checked", false);
    }

    function restorePillButtonState() {
        let state = sessionStorage.getItem("pillButtonState");
        if (state === "yes") {
            $("#yesRepresentativeForm2").addClass("expanded");
            showBranchAndContactFields();
        } else if (state === "no") {
            $("#noRepresentativeForm2").addClass("expanded");
            hideBranchAndContactFields();
        }
    }

    function savePillButtonState(state) {
        sessionStorage.setItem("pillButtonState", state);
    }

    $(".f2-contact-container input[type='checkbox']").on("change", function () {
        if ($(".f2-contact-container input:checked").length > 0) {
            $(".f2-contact-container input, .f2-contact-container label").removeClass("is-invalid is-invalid-text");
        }
    });

    $("#form2").on("submit", function (e) {

        
        e.preventDefault();
        let isValid = true, needsRep = $("#yesRepresentativeForm2").hasClass("expanded");
        let isChecked = $(".policy-grid input:checked").length > 0;
        if (isChecked) {
            $(".policy-grid input[type='checkbox']").removeClass("is-invalid");
            $(".policy-grid label").removeClass("is-invalid-text");
            $(".f2-content-title").removeClass("is-invalid-text");
            $(".f2-content-title p").removeClass("is-invalid-text");
            $(".f2-content-title p span").removeClass("is-invalid-text");
            $(".f2-content-title").removeClass("is-invalid-text");
        } else {
            isValid = false;
            $(".policy-grid input[type='checkbox']").addClass("is-invalid");
            $(".policy-grid label").addClass("is-invalid-text");
            $(".f2-content-title").removeClass("is-invalid-text");
            $(".f2-content-title p").addClass("is-invalid-text");
            $(".f2-content-title p span").addClass("is-invalid-text");
        }
        validatePolicyCheckboxes2();
        if (!$("#yesRepresentativeForm2, #noRepresentativeForm2").hasClass("expanded")) {
            isValid = false;
             $(".f2-content-title-2 p").addClass("is-invalid-text")
        }
        
        if ($("#yesRepresentativeForm2").hasClass("expanded") || !$("#noRepresentativeForm2, #yesRepresentativeForm2").hasClass("expanded")) {
            let isChecked2 = $(".f2-contact-container div div input:checked").length > 0;
            if (isChecked2) {
                $(".f2-contact-container input[type='checkbox']").removeClass("is-invalid");
                $(".f2-contact-container label").removeClass("is-invalid-text");
                $(".f2-content-title-4").removeClass("is-invalid-text");
            } else {
                isValid = false;
                $(".f2-contact-container input[type='checkbox']").addClass("is-invalid");
                $(".f2-contact-container label").addClass("is-invalid-text");
                $(".f2-content-title-4 p").addClass("is-invalid-text");
            }
            // validatePolicyCheckboxes2(); // Ensure checkboxes are validated on submission
            let inputFieldbranch = $("#branchForm2");
            let parentFielddropdownbranch = inputFieldbranch.closest('.dropdown-input-container');
            if ($("#branchForm2").val() == "") {
                isValid = false;
                parentFielddropdownbranch.addClass("is-invalid");
            } else {
                parentFielddropdownbranch.removeClass("is-invalid");
            }
        }
        $(".f2-policy-container input[type='checkbox']").each(function () {
            if ($(this).attr("required") && !$(this).is(":checked")) {
                isValid = false;
                $(this).addClass("is-invalid").closest(".input-container").find("label").addClass("is-invalid-text");
            }
        });
        $(".policy-grid input[type='checkbox']").each(function () {
            if ($(this).attr("required") && !$(this).is(":checked")) {
                isValid = false;
                $(this).addClass("is-invalid").closest(".policy-grid").find(".f2-content-title").addClass("is-invalid-text");
            }
        });
        $(".f2-contact-container input[type='checkbox']").each(function () {
            if ($(this).attr("required") && !$(this).is(":checked")) {
                isValid = false;
                $(this).addClass("is-invalid").closest(".f2-contact-container").find(".f2-content-title-4").addClass("is-invalid-text");
                $(this).addClass("is-invalid").closest(".f2-contact-container").find(".f2-content-title-4 p").addClass("is-invalid-text");
                $(this).addClass("is-invalid").closest(".f2-contact-container").find(".f2-content-title-4 p span").addClass("is-invalid-text");
            }
        });
        if (isValid) {

            $(".f2-contact-container input[type='checkbox']").removeClass("is-invalid");
            $(".f2-contact-container label").removeClass("is-invalid-text");
            $(".f2-content-title-4").removeClass("is-invalid-text");
            $(".f2-content-title-4 span").removeClass("is-invalid-text");
            $(".f2-content-title-4 p span").removeClass("is-invalid-text");
            let form1Data = JSON.parse(sessionStorage.getItem("form1Data")) || {};
            let form2Data = {
                formType: "form2",
                branch: needsRep ? $("#branchForm2").val() : "None",
                contactEmail: $("#contactEmailF2").is(":checked") ? "yes" : "no",
                contactSMS: $("#contactSMSF2").is(":checked") ? "yes" : "no",
                contactMessenger: $("#contactMessengerF2").is(":checked") ? "yes" : "no",
                contactCall: $("#contactCallF2").is(":checked") ? "yes" : "no",
                needsRepresentative: needsRep ? "yes" : "no",
            };

            $(".policy-grid input[type='checkbox']").each(function () {
                form2Data[$(this).attr("name")] = $(this).is(":checked") ? "yes" : "no";
            });
            let combinedData = { ...form1Data, ...form2Data };
            sessionStorage.setItem("form2Data", JSON.stringify(form2Data));
            let btnloading = $(this);
            handleButtonClick.call(btnloading);
            $.ajax({
                url: $('meta[name="url"]').attr("content") + "/submit-step1",
                type: "POST",
                data: combinedData,
                headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },
                success: function (response) {
                    if (response.id) {
                        sessionStorage.setItem("submittedID", response.id);
                        sessionStorage.setItem("policyholder_id", response.id);
                        $("input[name='hdn_id']").val(response.id);
                        stopButtonLoading.call(btnloading);
                        $("#form2").fadeOut(() => $("#form3").fadeIn());
                    }
                    sessionStorage.removeItem("form1Data");
                },
                error: function (xhr) {
                },
            });
        } else {
            //$(".f2-content-title p, .f2-content-title-2 p, .f2-content-title-3 p, .f2-content-title-4 p").addClass("is-invalid-text");
        }
    });
});
