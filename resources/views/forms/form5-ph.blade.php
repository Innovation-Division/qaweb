<form id="form5" style="display: none;">
    <div class="f5-main-container">
        <x-stepper :currentStep="session('currentStep', 2)" />
        <div class="f5-main-content-container">

            <x-back-title id="backForm5" title="Create account as Policyholder" />
            <div class="f5-subtitle-container">
                <x-register.form-title title="Your identity" />
                <div class="f5-form-contents">
                    <div class="f5-payment-method">
                        <x-title-required title="Do you want to add payment method?" placeholder="(Optional)"
                            :required="false" />

                        <div class="f5-pill-buttons">
                            <div class="pill-buttons-container">
                                <x-buttons.pill-button idOne="noPaymentMethod" idTwo="yesPaymentMethod" pillOneText="No"
                                    direction="horizontal" pillTwoText="Yes" direction="horizontal" />
                            </div>
                        </div>

                        <div class="f5-payment-fields">
                            <x-dropdown label="Payment Type" id="payment" name="payment" :options="['Credit Card', 'Debit Card', 'OTC Banking', 'OTC Non-Bank','E-Wallet' ]"
                                placeholder="Payment type" disabled />

                            <x-dropdown label="Bank/E-Wallet" id="bankWallet" name="bankWallet" :options="[]"
                                disabled placeholder="Bank/E-Wallet Name" />
                        </div>
                    </div>
                </div>

                <div class="reminder-change">
                    <x-reminders.dynamic-reminder icon="assets/icons/Icon-Lightbulb.svg"
                        message="You may change your payment method later." />
                </div>

                <div class="f5-buttons-container">

                    <x-buttons.primary-button type="submit" id="nextForm5">
                        Next
                    </x-buttons.primary-button>

                    <x-buttons.secondary-button id="backtoForm4FromForm5">
                        Back
                    </x-buttons.secondary-button>
                </div>
            </div>

        </div>
    </div>
</form>
