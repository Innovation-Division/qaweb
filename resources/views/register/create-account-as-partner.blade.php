<body>
    
    <div class="partner-main-container" id="asPartner" style="display: none;">

        <div class="stepper-logo-container-mobile">
            <div class="hamburger-menu-container">
                <div class="hamburger-icon-container">
                    <img src="{{ asset('assets/icons/Icon-Hamburger.svg') }}" alt="Hamburger Menu" class="hamburger-icon">
                </div>
            </div>
            <img src="{{ asset('assets/icons/Icon-Cocogen-Black.png') }}" alt="Logo" class="stepper-logo">
        </div>
        <div class="partner-cocogen-logo">
            <img src="{{ asset('assets/images/cocogen-logo.svg') }}" alt="Cocogen Logo" width="335" height="422">
        </div>

        <div class="partner-content-container">
            <div class="partner-back-button-container">
                <x-back-title title="Create account as Partner" id="backToAccountAsFromPartner" />
            </div>

            <div class="partner-main-content-container">
                <div class="partner-logo">
                    <img src="{{ asset('assets/images/Image-Partner.png') }}" alt="Partner Image" width="335" height="422">
                </div>

                <div class="partner-content">
                    <div class="title">Cocogen Partner Benefits</div>
                    <div class="description">
                        Becoming a Cocogen partner means working with a company that puts your career development before
                        anything else. We want you to have as much freedom and control as you want while making sure
                        that we
                        give you the proper support to help you maximize your profits. Working with us means you'll make
                        money and develop your skills and knowledge as an insurance agent.
                    </div>

                    <div class="partner-button-container">
                        <a href="https://www.cocogen.com/be-a-partner">
                            <x-buttons.primary-button id="button_signup">Signup as Partner</x-buttons.primary-button>
                        </a>

                        <a href="https://www.cocogen.com/client-services">
                            <x-buttons.secondary-button id="button_email" lined>Email Cocogen</x-buttons.secondary-button>
                        </a>

                        <a href="https://www.cocogen.com/locate-a-branch">
                            <x-buttons.secondary-button id="button_branch" lined>Locate a branch</x-buttons.secondary-button>
                        </a>
                    </div>
                </div>
                <div class="secondary-btn-container-wrapper">
                    <div class="back-btn-container">
                        <x-buttons.secondary-button id="backButtonCreateAs"> Back </x-buttons.secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

