<div id="accountAs" style="display: none;">
    <div class="account-as-container">
        <x-stepper id="stepper" :currentStep="session('currentStep', 1)" />
        <div class="account-as-main-container">
            <div class="back-button-row">
                <x-back-title id="goBacktoLogin" title="Create account" backUrl="#" :showIcon="false" class="hide-mobile" />
            </div>

            <div class="account-as-content-container">
                <x-select-account image="images/Image-Policyholder.png" title="Policyholder"
                    description="Sign up as Policyholder. Avail of Cocogen products, access policies conveniently, and file claims easily."
                    buttonText="Create account as Policyholder" id="goToPolicyholder" />
                <x-select-account :image="'images/Image-Partner.png'" :title="'Partner'" :description="'Sign up as Partner. Be a Cocogen agent to earn additional income, and get perks for being a partner of Cocogen.'" :buttonText="'Create account as Agent'"
                    id="goToPartner" />

                <div class="secondary-btn-container mobile-only">
                    <x-buttons.secondary-button id="goBacktoLogin2"> Back </x-buttons.secondary-button>
                </div>
            </div>
        </div>
    </div>
</div>
