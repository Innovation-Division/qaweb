<form id="form2-1" data-current-step="1" style="display: none;" >
    <div class="f2-1-main-container">
        <x-stepper :currentStep="session('currentStep', 1)" />

        <div class="f2-1-main-content-container">
            <x-back-title title="Create account as Policyholder" id="backtoForm1FromForm2-1" />

            <div class="f2-1-content-container">
                <x-register.form-title title="Getting to know you" />
                <x-reminders.add-policy-reminders />

                <div class="f2-1-policy-container">
                    <div class="f2-1-title">
                        <x-title-required title="Active Policy/s you have" :required="true" />
                    </div>

                    <div class="f2-1-active-policies" id="policyFieldsContainer">
                        <x-add-policy label="Policy No." required="true" />
                    </div>
                </div>
               
                <div class="f2-1-representative-container">
                    <x-title-required title="Do you want to be contacted by a Cocogen Representative?"
                        :required="true" />

                    <div class="f2-1-pill-button-container">
                        <x-buttons.pill-button idOne="noRepresentativeForm2-1" idTwo="yesRepresentativeForm2-1"
                            pillOneText="No, I will explore Cocogen products myself" class="f2-1-pill-button"
                            pillTwoText="Yes, I need a representative to talk to me" />
                    </div>
                </div>

                <!-- Branch Container -->
                <div class="f2-1-branch-container">
                    <div class="f2-1-title-container">
                        <x-title-required title="Which Cocogen branch should you wish to be contacted by?" />
                        <x-info-icon class="info-icon" />
                    </div>
                    <!-- Dropdown Container -->
                    <div class="f2-dropdown-container">
                        <x-dropdown id="branchForm2-1" name="branch" label="Select one (1) Cocogen branch" 
                             :options="['head_office' => 'Head Office'] + $branch"
                            placeholder="Select branch" />
                    </div>
                </div>

                <div class="f2-1-main-contact-container">
                    <!-- Title for Contact -->
                    <x-title-required title="How do you want to be contacted?" :required="true"
                        placeholder="(You may select more than one)" />

                    <!-- Main Contact Container -->
                    <div class="f2-1-contact-container">
                        <!-- Left Container -->
                        <div class="f2-1-left-container">
                            <x-checkbox id="contactEmailF2-1" name="contactEmail" label="Email" value="yes"
                                for="contactEmail" />
                            <x-checkbox id="contactSMSF2-1" name="contactSMS" label="SMS" value="yes"
                                for="contactSMS" />
                        </div>

                        <!-- Right Container -->
                        <div class="f2-1-right-container">
                            <x-checkbox id="contactMessengerF2-1" name="contactMessenger" label="Messenger"
                                value="yes" for="contactMessenger" />
                            <x-checkbox id="contactCallF2-1" name="contactCall" label="Call" value="yes"
                                for="contactCall" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="f2-1-button-container">
                <x-buttons.secondary-button id="cancelForm2-1">
                    Cancel
                </x-buttons.secondary-button>

                <x-buttons.secondary-button id="backToForm1FromForm2-1">
                    Back
                </x-buttons.secondary-button>

                <x-buttons.primary-button type="submit" id="submitForm2-1">
                    Next
                </x-buttons.primary-button>

            </div>
        </div>
    </div>
</form>
    
