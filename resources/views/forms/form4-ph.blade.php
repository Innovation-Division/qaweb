<form id="form4" style="display: none;" enctype="multipart/form-data" >

    <div class="f4-main-container">
        <x-stepper :currentStep="session('currentStep', 2)" />
        <div class="f4-content-container">
            <x-back-title title="Create account as Policyholder" id="backForm4" type="button" />
            <div class="f4-subtitle-container">
                <x-register.form-title title="Your identity" />
                <!-- Hidden input for policyholder_id -->
                <input type="hidden" id="policyholder_id" name="policyholder_id" value="">

                <div class="f4-content-title">
                    <div class="identification-title">
                        <span class="identification-text">Identification</span>
                        <span class="optional-text">(Optional)</span>
                    </div>

                    <!-- Upload ID Section -->
                    <div class="f4-upload-id">
                        <x-file-preview id="uploadID"  name="uploadID" buttonText="Upload ID" />
                        <x-reminders.file-format />
                    </div>

                    <!-- Upload Display Picture Section -->
                    <div class="f4-upload-dp">
                        <span class="upload-dp-title">Upload Display Picture (Optional)</span>
                        <x-file-preview id="uploadDisplayPicture" name="uploadDisplayPicture" buttonText="Upload" />
                        <x-reminders.file-format />
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="f4-button-container">
                    <div class="f4-button-group">
                        {{-- <x-buttons.secondary-button id="continueLaterForm4" type="button">
                            Continue later
                        </x-buttons.secondary-button>
     --}}
                        <x-buttons.primary-button id="nextForm4">
                            Next
                        </x-buttons.primary-button>

                        <x-buttons.secondary-button id="backtoForm3FromForm4">
                            Back
                        </x-buttons.secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
