<div class="modal-background" id="continueLaterModal" style="display:none">
    <div class="modal-container">
        <form id="form_modal" method="post" action="{{ route('continueLater') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="hdn_id" name="hdn_id" value="">
        <img src="{{ asset('assets/icons/Icon-WarningTriangle.svg') }}" alt="Warning Icon" class="warning-icon">
        <div id="hidden-fields"></div>
        <div class="modal-content">
            <div class="modal-text">
                <h3 class="content-title">
                    Continue Later
                </h3>
                <p class="content-p">
                    Access and update your information through
                    the link we will send to your email
                </p>

            </div>
            <div class="modal-continue-later-button-container">
                <x-buttons.primary-button id="yes_continue_later_form3" type="submit"> Yes, continue later </x-buttons.primary-button>
                <x-buttons.secondary-button id="no_continue_later"> Close </x-buttons.secondary-button>

            </div>
        </div>
        <f/orm>
    </div>
</div>
