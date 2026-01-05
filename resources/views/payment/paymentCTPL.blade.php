<div class="modal fade" id="product-info-ctpl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-right">
        <div class="modal-content" style="overflow-y: auto;">
            <div class="modal-header modal-header-product">
                <div class="col-md-12 position-relative">
                    <div class="row">
                        <div class="col-1 align-items-center justify-content-center">
                            <svg data-bs-dismiss="modal" aria-label="Close"
                                style="cursor:pointer; transform: translateY(3px);" xmlns="http://www.w3.org/2000/svg"
                                width="26" height="26" fill="none" viewBox="0 0 26 26">
                                <rect width="26" height="26" fill="#373A3D" rx="13" />
                                <path fill="#fff"
                                    d="M20.584 13a.637.637 0 0 1-.199.46.692.692 0 0 1-.479.19H6.646l4.938 4.74a.649.649 0 0 1 .198.46.627.627 0 0 1-.198.46.68.68 0 0 1-.48.19.702.702 0 0 1-.478-.19l-6.094-5.85a.648.648 0 0 1-.199-.46.627.627 0 0 1 .2-.46l6.093-5.85a.695.695 0 0 1 .958 0 .638.638 0 0 1 .198.46.638.638 0 0 1-.198.46l-4.939 4.74h13.261a.7.7 0 0 1 .48.19.637.637 0 0 1 .198.46Z" />
                            </svg>
                        </div>
                        <div class="col-10 d-flex align-items-center">
                            <h5 class="modal-title mdl-view-plan-title-main">{{ $titlepackage }}</h5>
                        </div>
                    </div>
                    @if (Agent::isMobile())
                    
                    @else
                      
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="card card-border-bottom">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="mdl-view-plan-name-field-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 24 24" style="margin-bottom: 3px;">
                               <path fill="#E4509A" d="M5 11l1.5-4.5A2 2 0 0 1 8.3 5h7.4a2 2 0 0 1 1.8 1.2L19 11h1a2 2 0 0 1 2 2v5a1 1 0 0 1-1 1h-1a2 2 0 1 1-4 0H8a2 2 0 1 1-4 0H3a1 1 0 0 1-1-1v-5a2 2 0 0 1 2-2h1Zm2.7-3a.5.5 0 0 0-.5.3L6.2 11h11.6l-1-2.7a.5.5 0 0 0-.5-.3H7.7ZM5 14a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm13.5 1.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                           </svg>
                           

                                Vehicle Information
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Vehicle Type</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->policyType   }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> MV Type</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->mvType   }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Plate no.</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->plateNo  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> MV File no.</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->mvFIleNo  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Engine no.</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->engineNO  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Chassis no.</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->chassisNo  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Year</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->year  }}</label></div>
                        </div>
                     
                    </div>
                </div>
                <div class="card card-border-bottom">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="mdl-view-plan-name-field-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                    viewBox="0 0 13 13" style="margin-bottom: 3px;">
                                    <path fill="#E4509A"
                                        d="M11.325 10.814A.375.375 0 0 1 11 11H2a.376.376 0 0 1-.324-.562A5.579 5.579 0 0 1 4.774 7.9a3.375 3.375 0 1 1 3.452 0 5.579 5.579 0 0 1 3.098 2.539.376.376 0 0 1 0 .375Z" />
                                </svg>

                                Insured Information
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> First Name</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->firstName    }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Last Name</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->lastName   }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Mobile</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->contactNo  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Email Address</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->emailAddress  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Date of Birth</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->birthDate  }}</label></div>
                        </div>
                    </div>
                </div>
                <div class="card card-border-bottom">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="mdl-view-plan-name-field-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                    viewBox="0 0 13 13" style="margin-bottom: 3px;">
                                    <path fill="#E4509A"
                                        d="M11.325 10.814A.375.375 0 0 1 11 11H2a.376.376 0 0 1-.324-.562A5.579 5.579 0 0 1 4.774 7.9a3.375 3.375 0 1 1 3.452 0 5.579 5.579 0 0 1 3.098 2.539.376.376 0 0 1 0 .375Z" />
                                </svg>

                                Present Address
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> House/Unit No</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->houseno    }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Street</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->street   }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Barangay</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->city  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> City</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->barangay  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Province</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->province  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Region</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->region  }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Zip Code</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-firstname">
                                    {{ $data->zip  }}</label></div>
                        </div>
                    </div>
                </div>
                <div class="card card-border-bottom" style="background-color:#f0f0f0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Premium</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-premium-piso">
                                &#8369; {{number_format( $data->due_premium, 2, '.', ',') }}</label></div>
                        </div>
                      
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>