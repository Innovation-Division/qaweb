$(document).ready(function () {
    $('#resend-btn').click(function () { //resend-btn
        $.ajax({
            url: $('meta[name="url"]').attr("content") + "/otp/resend",
            type: 'POST',
            headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },
            data: { email:sessionStorage.getItem("submittedID") },
            success: function (response) {
                $(".f6-main-otp-content .reminder-container .reminder-content").text(response);
                console.log('OTP sent successfully:', response);
            },
            error: function (xhr, status, error) {
                console.error('Error sending OTP:', xhr.responseText);
            }
        });
    });

    let otpAttempts = 0;
    const maxAttempts = 3;

    $('#nextForm6').on('click', function (e) {
        e.preventDefault();
        let otp = "";
        let isValid = true;

        $(".otp-input").each(function() {
            let value = $(this).val().trim();

            if (value === "") {
                $(this).addClass("is-invalid");
                isValid = false;
            } else {
                $(this).removeClass("is-invalid"); 
                otp += value;
            }
        });
        $(".error-container").hide();
        console.log(isValid);
        if (!isValid) {
            console.log(11);
            
            return;
        }
        let btnloading = $(this);
        handleButtonClick.call(btnloading);
        if (otpAttempts >= maxAttempts) {
            $(".error-container").css("display", "flex");
            $(".error-content").text("Maximum OTP attempts reached. Please try again later.");
            $("#nextForm6").prop("disabled", true); // Disable the button
            $(".otp-input").prop("disabled", true);  // Disable OTP input fields
            return;
        }

        
        $.ajax({
            url: $('meta[name="url"]').attr("content") + "/otp/verify",
            data: {otp:otp, id:$("input[name='hdn_id']").val()},
            type: "POST",
            headers: { "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content") },
            success: function (response) {
                stopButtonLoading.call(btnloading);
                if(response =="OTP verified successfully."){
                    $(".error-container").hide();
                    window.location.href = $('meta[name="url"]').attr("content") + "/account-created";
                }else{
                    otpAttempts++; // Increment failed attempts
                    $(".error-container").css("display", "flex");
                    $(".error-content").text(response);

                    if(response === "Incorrect OTP."){
                        let remainingAttempts = maxAttempts - otpAttempts;
                        $(".error-container").css("display", "flex");
                        $(".error-content").text("Invalid OTP. You have " + remainingAttempts + " attempt(s) left.");
                    }
                    if (otpAttempts >= maxAttempts) {
                        $("#nextForm6").prop("disabled", true); // Disable button after 3 tries
                        $(".otp-input").prop("disabled", true);  // Disable input fields
                        window.location.href = $('meta[name="url"]').attr("content") + "/otp-failed";
                    }

                    return false;
                }
            },
            error: function (xhr, status, error) {
                console.error("ID check error:", xhr.responseText);
            },
        });
    });

});
