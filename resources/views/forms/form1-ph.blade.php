<div class="col-md-12">
    <form id="form1" data-current-step="1" style="display: none;">
        <input type="hidden" name="hdn_option1" name="hdn_option1" value="">

        <div class="col-md-12">
            <div class="f1-main-container">
                <x-stepper :currentStep="session('currentStep', 1)" />
                <div class="f1-main-content-container">
                    <x-back-title title="Create account as Policyholder" id="backToAccountAsFromForm1" />
                    <div class="f1-content-container">
                        <x-register.form-title title="Getting to know you" />
                        <div class="f1-field-container">
                            <div class="form-row-1">
                                <x-text-field label="First Name" id="firstName" textMode="default" type="text"
                                    placeholder="First Name" onkeydown="return /[a-z -]/i.test(event.key)"
                                    maxlength="50" required="true" />
                                <x-text-field label="Middle Name" id="middleName" textMode="default" type="text"
                                    placeholder="Middle Name" onkeydown="return /[a-z -]/i.test(event.key)"
                                    maxlength="50" />
                                <x-text-field label="Last Name" id="lastName" textMode="default" type="text"
                                    placeholder="Last Name" onkeydown="return /[a-z -]/i.test(event.key)" maxlength="50"
                                    required="true" />
                            </div>

                            <div class="form-row-2">
                                {{-- <x-text-field label="Date of Birth" id="dateOfBirth" type="date"
                                placeholder="Date of Birth" required="true" /> --}}
                                <x-bday label="Date of Birth" id="dateOfBirth" placeholder="Date of Birth"
                                    required="true" width="100%" />
                                <x-text-field label="Place of Birth" id="placeOfBirth" textMode="any" type="text"
                                    placeholder="City, Province" required="true" />
                            </div>

                            <div class="form-row-3">
                                <x-dropdown id="sex" name="sex" label="Sex" :options="['Male', 'Female']"
                                    placeholder="Select Sex" required="true" />
                                <x-dropdown id="citizenship" name="citizenship" label="Citizenship" :options="[
                                    'Filipino Citizen',
                                    'Foreign Permanent Resident in the Philippines with Alien Certificate of Registration',
                                    'Other',
                                ]"
                                    placeholder="Select Citizenship" required="true" />
                            </div>

                            <div class="form-row-4">
                                <x-text-field label="Mobile" id="contactNumber" type="mobile"
                                    placeholder="(09XX) XXX-XXXX" required="true" />
                                <x-text-field label="Email Address" id="email" type="email"
                                    placeholder="Enter your email" required="true" />
                            </div>
                        </div>

                        <div class="reminder-email">
                            <x-reminders.dynamic-reminder icon="{{ asset('/assets/icons/Icon-Lightbulb.svg') }} " witdth
                                message="You may change your input data should you need to update your information. <br><strong>Note:</strong> Email address cannot be changed." />
                        </div>

                        <div class="f1-existing-policy">
                            <div class="f1-question">
                                <x-question-label text="Do you have an existing policy with Cocogen?" required="true"
                                    size="16px" weight=auto style="Inter" />
                            </div>

                            <div class="f1-pill-buttons">
                                <x-buttons.pill-button idOne="noOptionForm1" idTwo="yesOptionForm1" pillOneText="No"
                                    pillTwoText="Yes" />
                            </div>
                        </div>

                        <div class="f1-buttons">
                            <x-buttons.secondary-button id="cancelForm1">
                                Cancel
                            </x-buttons.secondary-button>

                            <x-buttons.primary-button id="nextForm1">
                                Next
                            </x-buttons.primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
