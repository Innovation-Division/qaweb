<form id="form3" style="display: none;">
    {{-- <x-modal-continue-later /> --}}
    <div class="f3-main-container">
        <x-stepper :currentStep="session('currentStep', 2)" />
        <div class="f3-main-content-container">

            <h1 class="f3-title">Create account as Policyholder</h1>

            <div class="f3-content">
                <x-register.form-title title="Your identity" />
                <div class="f3-field-container">
                    <div class="f3-content-title">
                        <x-question-label text="Present residence" required="true" size="16px" weight=auto />
                    </div>
                    <div class="row-1">
                        <x-dropdown label="Region" id="region" name="region" :options="$location" placeholder="Region"
                            required="true" />
                        <x-dropdown label="Province" id="province" name="province" placeholder="Province"
                            required="true" />
                        <x-dropdown label="City" id="city" name="city" placeholder="City" required="true" />


                    </div>
                    <div class="row-2">
                        <x-dropdown label="Barangay" id="barangay" name="barangay" placeholder="Barangay"
                            required="true" />
                        <x-text-field label="Street" id="street" textMode="any" type="text" placeholder="Street"
                            maxlength="50" required="true" />
                        <x-text-field label="House/Unit No." id="unitNo" textMode="any" type="text"
                            placeholder="House No." maxlength="50" required="true" />




                    </div>

                    <div class="row-3">
                        <div class="zip-container">
                            <x-text-field label="Zip Code/Postal" id="zip" type="number" placeholder="Zip Code/Postal" maxlength="4"
                                class="zip-field" width="221.33px" />
                        </div>
                    </div>
                </div>
                <div class="f3-button-container">
                    <x-buttons.secondary-button id="continueForm3">
                        Continue later
                    </x-buttons.secondary-button>

                    <x-buttons.primary-button id="nextForm3">
                        Next
                    </x-buttons.primary-button>
                </div>
            </div>
        </div>
    </div>
</form>
