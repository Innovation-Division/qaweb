<form id="form2" data-current-step="1" style="display: none;">

    <div class="f2-main-container">
        <x-stepper :currentStep="session('currentStep', 1)" />
        <div class="f2-main-content-container">
            <x-back-title title="Create account as Policyholder" id="backtoForm1FromForm2" />

            <div class="f2-content-container">
                <x-register.form-title title="Getting to know you" />

                <div class="f2-policy-container">
                    <div class="f2-content-title">
                        <x-question-label text="What policy are you interested in? " required="true" size="16px"
                            weight="500" info="You may select as many as you want" />
                    </div>
                    <!-- Reorganized checkbox grid: 2 rows, 3 columns -->
                    <div class="policy-grid">
                        <!-- Row 1 -->
                        <x-checkbox id="AutoExcelPlus" name="AutoExcelPlus" label="Auto Excel Plus" value="yes" />
                        <x-checkbox id="Covid" name="Covid" label="Covid 19 Assist Plus" value="yes" />
                        <x-checkbox id="DomesticTravelPlus" name="DomesticTravelPlus" label="Domestic Travel Excel Plus"
                            value="yes" />
                        <!-- Row 2 -->
                        <x-checkbox id="ProTech" name="ProTech" label="Pro-Tech" value="yes" />
                        <x-checkbox id="ctpl" name="ctpl" label="Compulsory Third Party Liability "
                            value="yes" />
                        <x-checkbox id="InternationalTravelPlus" name="InternationalTravelPlus"
                            label="International Travel Excel Plus" value="yes" />


                    </div>
                </div>

                <div class="f2-representative-container">
                    <div class="f2-content-title-2">
                        <x-question-label text="Do you want to be contacted by a Cocogen Representative? "
                            required="true" size="16px" weight="500" />
                    </div>
                    <div class="f2-pill-button-container">
                        <x-buttons.pill-button idOne="noRepresentativeForm2" idTwo="yesRepresentativeForm2"
                            class="f2-pill-button" pillOneText="No, I will explore Cocogen products myself"
                            pillTwoText="Yes, I need a representative to talk to me" />
                    </div>
                </div>

                <!-- Branch Container -->
                <div class="f2-branch-container">
                    <div class="f2-title-container">
                        <div class="f2-content-title-3">
                            <x-question-label text="Which Cocogen branch should you wish to be contacted by? "
                                required="true" size="16px" weight="500" class="invalid-text" />
                        </div>
                        <x-info-icon />
                    </div>
                </div>

                <!-- Dropdown Container -->
                <div class="f2-dropdown-container">
                    <x-dropdown id="branchForm2" name="branch" label="Select one (1) Cocogen branch"  :options="['head_office' => 'Head Office'] + $branch"
                        placeholder="Select branch" />
                </div>
            </div>

            <div class="f2-contact-main-container">
                <!-- Title for Contact -->
                <div class="f2-content-title-4">
                    <x-question-label text="How do you want to be contacted? " required="true" size="16px"
                        weight="500" info="You may select more than one" />
                </div>
                <!-- Main Contact Container -->
                <div class="f2-contact-container">
                    <!-- Left Container -->
                    <div class="f2-left-container">
                        <x-checkbox id="contactEmailF2" name="contactEmail" label="Email" value="yes" />
                        <x-checkbox id="contactSMSF2" name="contactSMS" label="SMS" value="yes" />
                    </div>

                    <!-- Right Container -->
                    <div class="f2-right-container">
                        <x-checkbox id="contactMessengerF2" name="contactMessenger" label="Messenger" value="yes" />
                        <x-checkbox id="contactCallF2" name="contactCall" label="Call" value="yes" />
                    </div>
                </div>
            </div>

            <div class="f2-button-container">
                <x-buttons.secondary-button id="cancelForm2">
                    Cancel
                </x-buttons.secondary-button>
                
                <x-buttons.secondary-button id="backToForm1FromForm2">
                    Back
                </x-buttons.secondary-button>

                <x-buttons.primary-button type="submit" id="submitForm2">
                    Next
                </x-buttons.primary-button>

                

            </div>
        </div>
    </div>
</form>
