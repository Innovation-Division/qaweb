<form id="form6" style="display: none;" method="POST" action="{{ route('otp.verify') }}">
    @csrf
    <x-stepper :currentStep="session('currentStep', 2)" />
    <div class="f6-otp-page-container">
        <div class="f6-page-contents">
            <x-register.form-title title="Your identity" />
            <div class="f6-main-otp-content">
                <x-reminders.dynamic-reminder icon="assets/icons/Icon-LockKey.svg" fontWeight="700"
                    message="An OTP has been sent to your registered email address." />
                    <x-reminders.error icon="assets/icons/Icon-WarningCircleRed.svg" fontWeight="700"
                    message="Invalid OTP" />
                <x-otp-input duration="300" />
            </div>
          
            <div class="f6-otp-btns">
                <x-buttons.primary-button id="nextForm6">Next</x-button.primary-button>
            </div>
        </div>
    </div>
</form>
