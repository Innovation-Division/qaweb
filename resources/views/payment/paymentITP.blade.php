<div class="modal fade" id="product-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-1 d-flex justify-content-center align-items-center">
                            </div>
                            <div class="col-3 col-md-1 d-flex justify-content-center align-items-center">
                                <label class="mdl-view-plan-name-field-title">Insured</label>
                            </div>
                            <div class="col-6 col-md-1-0 d-flex justify-content-center align-items-center">
                                <label class="mdl-view-plan-value-field-title">{{ $data[0]['fname'] }}
                                    {{ $data[0]['lname'] }}</label>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-3 col-md-1 d-flex justify-content-center align-items-center">
                                <label class="mdl-view-plan-name-field-title">Policy no.</label>
                            </div>
                            <div class="col-6 col-md-4 d-flex justify-content-center align-items-center">
                                <label class="mdl-view-plan-value-field-title">{{ $trans_id }}</label>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12 col-md-1 d-inline-flex" style="align-items: center;">
                            </div>
                            <div class="col-4 col-md-2 d-inline-flex me-0 pe-0" style="align-items: center;">
                                <label class="mdl-view-plan-name-field-title">Insured</label>
                            </div>
                            <div class="col-5 col-md-3 d-inline-flex ms-0 ps-0" style="align-items: center;">
                                <label class="mdl-view-plan-value-field-title">{{ $fullname }}</label>
                            </div>
                            <div class="col-4 col-md-2 d-inline-flex me-0 pe-0" style="align-items: center;">
                                <label class="mdl-view-plan-name-field-title">Policy no</label>
                            </div>
                            <div class="col-5 col-md-4 d-inline-flex ms-0 ps-0" style="align-items: center;">
                                <label class="mdl-view-plan-value-field-title">{{ $trans_id }}</label>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
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
                                    {{ $data[0]['fname'] }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Last Name</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-lastname">
                                    {{ $data[0]['lname'] }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Mobile</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-mobile">
                                    {{ $data[0]['mobile_no'] }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Email Address</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-email">
                                    {{ $data[0]['email_add'] }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Present Location</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-present-location">
                                    Philippines</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Citizenship</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-present-citizenship">
                                    Filipino</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Date of Birth</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-present-date-of-birth">
                                    {{ $data[0]['bday'] }}</label></div>
                        </div>
                    </div>
                </div>
                <div class="card card-border-bottom">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="mdl-view-plan-name-field-header">
                                <svg xmlns="http://www.w3.org/2000/svg"width="16" height="16" fill="none"
                                    viewBox="0 0 13 13" style="margin-bottom: 3px;">
                                    <path fill="#E4509A"
                                        d="M9.875 11H7.557c.389-.348.756-.72 1.1-1.113 1.286-1.48 1.968-3.04 1.968-4.512a4.125 4.125 0 0 0-8.25 0c0 1.472.68 3.032 1.969 4.512.343.393.71.765 1.1 1.113h-2.32a.375.375 0 1 0 0 .75h6.75a.375.375 0 0 0 0-.75ZM6.5 3.875a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                                Trip Details
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Type</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-type">Individual</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Air or Non-Air</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-airornonair"> Air</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Destination</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-destination">{{ $destination }}
                                </label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Duration</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-duration">{{ $data[0]['from_date'] }}
                                    - {{ $data[0]['to_date'] }} </label></div>
                        </div>
                    </div>
                </div>
                <div class="card card-border-bottom">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="mdl-view-plan-name-field-header">
                                <svg xmlns="http://www.w3.org/2000/svg"width="16" height="16" fill="none"
                                    viewBox="0 0 13 13" style="margin-bottom: 3px;">
                                    <path fill="#E4509A"
                                        d="M11.75 10.25H11V5.915a.75.75 0 0 0-.242-.553l-3.75-3.538a.75.75 0 0 0-1.014-.005l-.006.005-3.746 3.538A.75.75 0 0 0 2 5.916v4.333h-.75a.375.375 0 1 0 0 .75h10.5a.375.375 0 0 0 0-.75Zm-4.125 0h-2.25V8a.375.375 0 0 1 .375-.376h1.5A.375.375 0 0 1 7.625 8v2.25Z" />
                                </svg>

                                Present Address
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> House/Unit No</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-house-no">{{ $data[0]['house_no'] }}
                                </label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Street</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-street">{{ $data[0]['present_address'] }}
                                </label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">City</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-city">{{ $data[0]['present_city'] }}
                                </label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Province</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-province">{{ $data[0]['present_province'] }}
                                </label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Region</label></div>
                            <div><label
                                    class="mdl-view-plan-value-field mdl-view-plan-region">{{ $data[0]['region'] }}
                                </label></div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Zip Code</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-zip">{{ $data[0]['zip'] }}
                                </label></div>
                        </div>
                    </div>
                </div>

                <div class="card card-border-bottom" style="background-color:#f0f0f0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field"> Total Premium</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-premium">$
                                    {{ number_format($data[0]['amount_due'], 2, '.', ',') }}</label></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><label class="mdl-view-plan-name-field">Indicative Peso Equivalent</label></div>
                            <div><label class="mdl-view-plan-value-field mdl-view-plan-premium-piso">&#8369;
                                    {{ number_format($data[0]['final_amount_piso'], 2, '.', ',') }} </label></div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>
