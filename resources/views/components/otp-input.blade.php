<!-- resources/views/components/otp-input.blade.php -->
@props(['duration' => 60]) <!-- Timer duration in seconds -->

<div class="otp-container d-flex justify-content-center mt-3 ">
    <div class="otp-box d-flex gap-2 offset-1">
        @for ($i = 0; $i < 6; $i++)
            <input type="text" class="otp-input form-control text-center" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" disabled placeholder="-" />
        @endfor
    </div>
    
    <p class="otp-timer" id="otp-timer mt-3">Code to expire in <span class="countdown" id="countdown"></span></p>
    <p class="otp-expired d-none" id="otp-expired">OTP has expired. 
        <button class="resend-btn" type="button" id="resend-btn">Resend OTP</button> 
        <button class="resend-btn-hide" type="button" id="resend-btn-hide">Resend OTP</button>
    </p>
</div>

<script>
    $(document).ready(function() {
        let timerDuration = 330;//{{ $duration }};
        let countdownEl = $('#countdown');
        let otpTimer = $('#otp-timer');
        let otpExpired = $('#otp-expired');
        let resendBtn = $('#resend-btn');
        let resendBtnhide = $('#resend-btn-hide');
        let otpInputs = $('.otp-input');
        let interval;

        function startTimer() {
            clearInterval(interval);
            let timeLeft = timerDuration;
            countdownEl.text(formatTime(timeLeft));
            otpExpired.addClass('d-none');
            otpTimer.removeClass('d-none');
            otpInputs.prop('disabled', false).val('').attr('placeholder', ''); // Enable inputs and clear values
            interval = setInterval(function() {
                timeLeft--;
                countdownEl.text(formatTime(timeLeft));
                if (timeLeft <= 0) {
                    clearInterval(interval);
                    otpTimer.addClass('d-none');
                    otpExpired.removeClass('d-none');
                    otpInputs.prop('disabled', true).val('').attr('placeholder', '-'); // Disable inputs and set placeholder to '-'
                }
            }, 1000);
        }

        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            let secs = seconds % 60;
            return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
        }

        resendBtn.click(function() {
            startTimer();
        });
        resendBtnhide.click(function() {
            startTimer();
        });

        startTimer();

        otpInputs.on('input', function() {
            let inputVal = $(this).val();
            if (inputVal.length === 1) {
                $(this).next('.otp-input').focus();
            }
        }).on('keydown', function(e) {
            if (e.key === 'Backspace' && $(this).val() === '') {
                $(this).prev('.otp-input').focus();
            }
        });
    });
</script>

<style>
    #resend-btn-hide{
        display:none
    }
    .otp-container {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    .otp-box {
        display: flex;
        gap: 10px;
        align-items: center;
        width: 83%;
    }
    .otp-input {
        width: 100%;
        height: 60px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        border: none;
        border-bottom: 2px solid #008080;
        background-color: #F7FFFF;
        outline: none;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        padding: 0;
    }
    .otp-input:disabled {
        color: #666;
        background-color: #F7FFFF;
        border-bottom: 2px solid #848A90;

    }
    .otp-input:focus {
        border-bottom-color:rgb(4, 176, 176);
    }
    .otp-input::placeholder
    {
        color: #2D2727;
    }
    .otp-timer {
        color: #2D2727;
        font-size: 12px;
        margin: 0;
    }
    .countdown {
        color: #E4509A;
    }
    .otp-expired {
        color: #2D2727;
        font-size: 12px;
        margin: 0;
    }
    .resend-btn {
        background: none;
        border: none;
        color: #008080;
        cursor: pointer;
        font-size: 12px;
        padding: 0;
    }
    .resend-btn:hover {
        text-decoration: underline;
    }
    .d-none {
        display: none;
    }
</style>
