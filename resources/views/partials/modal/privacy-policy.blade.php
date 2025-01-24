<div class="modal modal-light fade @if ($modalVersion === 3){{ 'modalv3' }}@endif" id="privacy-policy">
    <div class="modal-backdrop fade {{ $modalVersion === 3 ? 'in' : 'show' }}"></div>
    <div class="modal-dialog modal-lg privacy_with_pop @if ($modalVersion !== 3){{ 'modal-dialog-centered' }}@endif">
        <div class="modal-content">
            <div class="modal-body">
                <div class="bg-effect"></div>
                <div class="h-100 position-relative">
                    <div class="d-flex align-items-center h-100">
                        <div class="text-center">
                            <h4 class="heading-border pb-1 mb-4 mrfs-1-8 mrfs-lg-2">Your personal data belongs to you</h4>
                            <div class="mrfs-1 mrfs-lg-1-5">
                                We only collect the information you choose to give us, and we process it with your consent. For detailed information on how  we use your personal data, we encourage you to exercise your rights and read through our <a href="{{url('/')}}/data-privacy" target="_blank">Privacy Policy</a>.
                            </div>
                            <div class="mt-4">
                                <div class="d-inline-block">
                                  <div class="form-check text-start">
                                      <input type="checkbox" class="form-check-input" id="ChckPrivacyPolicy" name="ChckPrivacyPolicy" value="1"  <?php if(old('ChckPrivacyPolicy')){ echo "checked";} ?>>
                                      <label for="ChckPrivacyPolicy" class="fw-normal form-check-label mrfs-1 mrfs-lg-1-5 text-left"> I hereby confirm that I am aware of Cocogen's Privacy Policy</label>
                                  </div>
                                </div> 
                            </div>
                            <div class="agree_div_popup mt-4">
                                <a class="btn btn-secondary" href="#" id="cookiey">Agree </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
