@extends('layouts.epartner')
@section('main-content')
<style>
    .batch-title {
        font-size: 25px;
        font-weight: 700;
    }

    .batch-button {
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        color: white;
    }

    .batch-secondary {
        background: grey;
        color: #ffffff;
    }

    .button-light {
        border: 1px solid black;
        padding: 7px 9px !important;
        font-size: 17px;
    }

    #quotationRange {
        accent-color: grey;
    }

    #quotationRange::-webkit-slider-thumb {
        -webkit-appearance: none;
        background-color: rgb(250%, 250%, 250%);
    }

    .card {
        border-radius: 10px !important;
    }

    body {
        background-color: #f3f3f3;
    }

    .batch-button>svg {
        fill: #ffffff;
    }

    .batch-button>svg>path {
        stroke: #ffffff;
        stroke-width: 1px;
    }

    .batch-button-success {
        background: #008080 !important;
    }

    .batch-button-secondary {
        background: #60B3B3 !important;
    }


    .batch-button-success:hover {
        background: #60B3B3 !important;
    }

    .batch-button-secondary:hover {
        background: #008080 !important;
    }

    .quote-button {
        background: rgba(0, 128, 128, 0.08) !important;
        color: #008080 !important;
        font-weight: bolder;
    }

    .quote-button>svg {
        fill: #008080 !important;
    }

    .quote-button>svg>path {
        stroke: #008080;
        stroke-width: 1px;
    }

    .policy-name {
        font-weight: bold;
        font-size: 22px;
    }

    .policy-label {
        color: #888888;
    }

    .policy-details {
        font-weight: bold;
    }

    .badge {
        color: #2fb344;
        text-align: center;
        border-radius: 5px;
        font-size: 20px;
        padding: 0 !important;
    }

    .section-p {
        font-size: 20px !important;
        font-weight: 700 !important;
    }

    @media (min-width: 992px) {

        aside {
            display: none !important;
        }

        .navbar-expand-lg.navbar-vertical~.navbar,
        .navbar-expand-lg.navbar-vertical~.page-wrapper {
            margin-left: 0 !important;
        }

        .batch-container {
            padding-left: 100px;
            padding-right: 100px;
        }

        .mobile-view {
            display: none !important;
        }

    }

    @media (max-width: 991px) {

        p {
            font-size: 12px !important;
        }

        .section-p {
            font-size: 15px !important;
            font-weight: 700 !important;
        }


        .mobile-responsive {
            display: none !important;
        }

        .life-insured {
            padding: 10px !important;
            margin: 0 !important;
            margin-bottom: 20px !important;
        }

        .batch-title {
            font-size: 20px !important;
            font-weight: 700 !important;
        }

    }

    @page {
        size: auto;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    @media print {
        .pagebreak {
            page-break-before: always;
        }

        .print-div {
            margin-top: -25px;
        }

        /* page-break-after works, as well */
    }

    .custom-tooltip {
        --bs-tooltip-bg: black;
    }

    .terms {
        border-color: #d63939 !important;
    }
</style>

<div class="container batch-container d-print-none">
    @if ($message = Session::get('success'))
    <div class="alert alert-important alert-success alert-dismissible" role="alert"
        style="background: #008080 !important;">
        <div class="d-flex">
            <div>
                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" /></svg>
            </div>
            <div>
                Wow! Everything worked!
            </div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
    @endif
    <div class="row mb-4 mt-4">
        <div class="col-lg-12">
            <a href="{{url('/quotation')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                    fill="#008080" class="bi bi-arrow-left-short" viewBox="0 0 18 18">
                    <path fill-rule="evenodd"
                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                </svg> <strong style="color: #008080 !important;">Back to quotations</strong></a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8">
                    <p class="batch-title">{{$quotation->product}}</p>
                </div>
                @if($quotation->status !== 'Processing' || $quotation->status !== 'Issued')
                <div class="col-lg-4 text-end">
                    <button class="batch-button batch-button-secondary" id="modifyPolicy"><svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="16" fill="currentColor"
                            class="bi bi-pen" viewBox="0 0 20 20">
                            <path
                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                        </svg>Modify policy</button>
                    <button class="batch-button batch-button-success issuePolicy"><svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                            class="bi bi-file-earmark-check" viewBox="0 0 20 20">
                            <path
                                d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                        </svg>Issue policy</button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body m-2">
                    <div class="d-flex justify-content-between">
                        <p class="policy-name">{{$quotation->first_name}} {{$quotation->middle_name}}
                            {{$quotation->last_name}}</p>
                        <p
                            style="background-color: rgba(0, 128, 128, 0.08) !important; font-weight: bold; padding: 5px 10px 0px 10px; border-radius: 5px">
                            <span class="badge bg-success me-1"></span> Quoted</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Date and time created</p>
                        <p class="policy-details">{{ date("M d, Y", strtotime($quotation->created_at))}} &#x2022;
                            {{ date("H:i A", strtotime($quotation->created_at))}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Quote no.</p>
                        <p class="policy-details">000{{ $quotation->id}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Policy no.</p>
                        <p class="policy-details">FI-FLS-CB-22-000243-01</p>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-lg-6 mb-2">
                            <button class="batch-button quote-button col-12 downloadPolicy" id="downloadPolicy"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor"
                                    class="bi bi-download" viewBox="0 0 18 20">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                </svg>Download</button>
                        </div>
                        <div class="col-lg-6">
                            <button class="batch-button quote-button col-12 sharePolicy" id="sharePolicy"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor"
                                    class="bi bi-box-arrow-in-right" viewBox="0 0 18 20">
                                    <path fill-rule="evenodd" stroke="black"
                                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg>Share</button>
                        </div>
                    </div>
                    <div class="row mb-3 p-4 m-2 life-insured" style="background: #f8f8f8; border-radius: 10px;">
                        <div class="col-lg-4">
                            <p class="policy-label">Life insured</p>
                            <p class="policy-details">{{$quotation->first_name}} {{$quotation->middle_name}}
                                {{$quotation->last_name}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p class="policy-label">Employment</p>
                            <p class="policy-details">{{$quotation->occupation}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p class="policy-label">Contact Information</p>
                            <p class="policy-details mb-0">{{$quotation->phone_number}}</p>
                            <p class="policy-details">{{$quotation->email_address}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <p class="section-p">Vehicle Information</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Type of insurance</p>
                        <p class="policy-details" style="text-align: end;">Comprehensive</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Location of vehicle</p>
                        <p class="policy-details" style="text-align: end;">Ortigas Center</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Year</p>
                        <p class="policy-details" style="text-align: end;">{{$quotation->year}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Brand</p>
                        <p class="policy-details" style="text-align: end;">{{$quotation->brand}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Model</p>
                        <p class="policy-details" style="text-align: end;">{{$quotation->model}}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Market Value</p>
                        <p class="policy-details" style="text-align: end;">₱
                            {{number_format($quotation->market_value, 2)}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Coverage</p>
                        <p class="policy-details" style="text-align: end;">
                            {{ date("d / m / Y", strtotime($quotation->created_at))}} -
                            {{ date("d / m / Y", strtotime('+1 year', strtotime($quotation->created_at)))}}</p>
                    </div>
                    <hr>
                    <div class="col-lg-12 mb-2 mobile-view">
                        <p class="section-p">Premium Computation</p>
                    </div>
                    <div class="col-lg-12 mobile-view">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Net Premium</p>
                            <p class="policy-details">₱{{number_format($quotation->net_premium, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Plus</p>
                            <p class="policy-details">₱0.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Doc Stamps</p>
                            <p class="policy-details">₱{{number_format($quotation->doc_stamps, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">VAT</p>
                            <p class="policy-details">₱{{number_format($quotation->vat, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Local Goverment Tax</p>
                            <p class="policy-details">₱{{number_format($quotation->lgt, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Gross premium</p>
                            <p class="policy-details">₱{{number_format($quotation->gross_premium, 2)}}</p>
                        </div>
                        <hr style="margin: 10px 0 !important;">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Total amount due</p>
                            <p class="policy-details">₱{{number_format($quotation->total_amount_due, 2)}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 mobile-view">
                        <p class="section-p">Coverage</p>
                    </div>
                    <div class="col-lg-12 mobile-view">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Own damage and theft</p>
                            <p class="policy-details">₱{{number_format($quotation->od, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Bodily Injury</p>
                            <p class="policy-details">₱{{number_format($quotation->bodily_injury, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Property Damage</p>
                            <p class="policy-details">₱{{number_format($quotation->property_damage, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Auto personal accident</p>
                            <p class="policy-details">₱275,000.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Acts of Nature</p>
                            <p class="policy-details">₱{{number_format($quotation->aon_amount, 2)}}</p>
                        </div>
                        <hr style="margin: 10px 0 !important;">
                        <p class="policy-label">Deductible</p>
                        <p class="policy-details">Non-standard Accessories (Note all declared accessories not
                            factory
                            installed)</p>
                        <p class="policy-label">Disclaimer</p>
                        <p class="policy-details">The above quotation is applicable only for the unit describe and
                            shall
                            be valid up to 30 days from the date of quotation</p>
                        <p class="policy-details">
                            Undeclared non-standard accessories will not be covered. For your protection please
                            declare
                            all non-standard accessories, it's brand/model and purchase price which shall be subject
                            to
                            approval and additional premium shall be changed.
                        </p>
                    </div>
                    <hr class="mobile-view" style="margin: 10px 0 !important;">
                    <div class="col-lg-12 mb-3">
                        <p class="section-p">Documentary Stamps Tax</p>
                    </div>
                    <p class="policy-details mb-4">Due to BIR implementation of EDST (Electronic Documentary Stamp
                        Tax)
                        system
                        effective July 1, 2010, policy holders are mandated to pay DST portion of the premium once
                        the
                        policy is issued. Refund on DST for cancelled policies is not allowed.</p>
                    <div class="form-group form-check mb-2">
                        <input type="checkbox" class="form-check-input" value="agree" id="privacy" name="privacy">
                        <label class="form-check-label" for="exampleCheck1"><strong>I agree with the Privacy
                                Policy</strong></label>
                    </div>
                    <div class="form-group form-check mb-2">
                        <input type="checkbox" class="form-check-input" value="agree" id="terms" name="terms">
                        <label class="form-check-label" for="exampleCheck1"><strong>I agree to the Terms and
                                Conditions</strong></label>
                    </div>
                    <div class="form-group form-check mb-2">
                        <input type="checkbox" class="form-check-input" value="agree" id="exclusions" name="exclusions">
                        <label class="form-check-label" for="exampleCheck1"><strong>I agree with Exclusion &
                                Limitations</strong></label>
                    </div>
                    <p style="color: #d63939 !important; " class="d-none" id="termsConditions">Please check Privacy Policy, Terms & Conditions, and Exclusion & Limitations</p>
                    <p class="policy-label">By proceeding, you read and understood the Terms and Conditions of
                        Cocogen
                        Insurance.</p>
                    <div class="row">
                        @if($quotation->status !== 'Processing' || $quotation->status !== 'Issued')
                            <div class="col-lg-6 mb-3">
                                <button class="batch-button batch-button-secondary col-12 printPolicy" id="printPolicy"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                        class="bi bi-printer" viewBox="0 0 20 20">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                                    </svg>Print</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="batch-button batch-button-success col-12 issuePolicy"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                        class="bi bi-file-earmark-check" viewBox="0 0 20 20">
                                        <path
                                            d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                    </svg>Issue policy</button>
                            </div>
                            @else
                            <div class="col-lg-12 mb-3">
                                <button class="batch-button batch-button-secondary col-12 printPolicy" id="printPolicy"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                        class="bi bi-printer" viewBox="0 0 20 20">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                                    </svg>Print</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mobile-responsive">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 mb-3">
                        <p class="section-p">Premium computation</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Net Premium</p>
                            <p class="policy-details">₱ {{number_format($quotation->net_premium, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Plus</p>
                            <p class="policy-details">₱ 0.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Doc Stamps</p>
                            <p class="policy-details">₱ {{number_format($quotation->doc_stamps, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">VAT</p>
                            <p class="policy-details">₱ {{number_format($quotation->vat, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Local Goverment Tax</p>
                            <p class="policy-details">₱ {{number_format($quotation->lgt, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Gross premium</p>
                            <p class="policy-details">₱ {{number_format($quotation->gross_premium, 2)}}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Total amount due</p>
                            <p class="policy-details">₱ {{number_format($quotation->total_amount_due, 2)}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <p class="section-p">Coverage</p>
                    </div>
                    <div class="col-lg-12" style="background-color: #F8F8F8CC; padding: 15px;">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Own damage and theft</p>
                            <p class="policy-details">₱ {{number_format($quotation->od, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Bodily Injury</p>
                            <p class="policy-details">₱ {{number_format($quotation->bodily_injury, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Property Damage</p>
                            <p class="policy-details">₱ {{number_format($quotation->property_damage, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Auto personal accident</p>
                            <p class="policy-details">₱ 275,000.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Acts of Nature</p>
                            <p class="policy-details">₱ {{number_format($quotation->aon_amount, 2)}}</p>
                        </div>
                        <hr>
                        <p class="policy-label">Deductible</p>
                        <p class="policy-details">Non-standard Accessories (Note all declared accessories not
                            factory
                            installed)</p>
                        <p class="policy-label">Disclaimer</p>
                        <p class="policy-details">The above quotation is applicable only for the unit describe and
                            shall
                            be valid up to 30 days from the date of quotation</p>
                        <p class="policy-details">
                            Undeclared non-standard accessories will not be covered. For your protection please
                            declare
                            all non-standard accessories, it's brand/model and purchase price which shall be subject
                            to
                            approval and additional premium shall be changed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-send-quotation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ url('/quotation/sharePolicy/') }}/{{$quotation->trans_no}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{method_field('POST')}}
                <div class="modal-header">
                    <h5 class="modal-title">Share Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@123.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="6"
                            placeholder="Message.."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Share Link</label>
                        <div class="input-group input-group-flat">
                            <input type="text" value="{{url('/quotation/get-a-quote/quote/')}}/{{$quotation->trans_no}}"
                                class="form-control" placeholder="Search…" name="url" id="url" readonly>
                            <span class="input-group-text">
                                <a href="javascript:void(0)" class="link-secondary" id="copy">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                    <svg xmlns="http://www.w3.org/2000/svg" id="copyClipboard" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 3v4a1 1 0 0 0 1 1h4" stroke="#000000" />
                                        <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"
                                            stroke="#000000" />
                                        <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"
                                            stroke="#000000" /></svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal" style="color:#008080;">
                        Cancel
                    </a>
                    <button type="submit" class="batch-button batch-button-success ms-auto">
                        Send Quotation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#modifyPolicy').click(function (e) {
            e.preventDefault();
            window.location.href = "{{ url('/quotation/get-a-quote/edit-first-page/')}}" +
                '/{{$quotation->trans_no}}';
        });

        $("#privacy").change(function () {
            $("#privacy").removeClass('terms');

            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();

            if(privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {
                $("#termsConditions").addClass('d-none');
            }
        });

        $("#terms").change(function () {
            $("#terms").removeClass('terms');

            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();

            if(privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {
                $("#termsConditions").addClass('d-none');
            }
        });

        $("#exclusions").change(function () {
            $("#exclusions").removeClass('terms');

            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();

            if(privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {
                $("#termsConditions").addClass('d-none');
            }
        });

        $('.issuePolicy').click(function (e) {
            var privacy = $("input[name='privacy']:checked").val();
            var terms = $("input[name='terms']:checked").val();
            var exclusions = $("input[name='exclusions']:checked").val();
            if(privacy === 'agree' && terms === 'agree' && exclusions === 'agree') {

                $('.loading-spinner').show();
                $('.outer-loading-page').show();
                window.location.href = "{{ url('/quotation/issue-policy/')}}" + '/{{$quotation->trans_no}}';
            } else {
                $("#privacy").addClass('terms');
                $("#terms").addClass('terms');
                $("#exclusions").addClass('terms');
                $("#termsConditions").removeClass('d-none');
            }
        });

        $('.sharePolicy').click(function (e) {
            e.preventDefault();
            $('#modal-send-quotation').modal('show');
        });
        //downloadPolicy

        $('.downloadPolicy').click(function (e) {
            e.preventDefault();
            window.location.href = "{{url('/quotation/download/')}}" + '/{{$quotation->trans_no}}';
        });


        $('.printPolicy').click(function (e) {
            e.preventDefault();
            url = "{{url('/quotation/view/')}}" + '/{{$quotation->trans_no}}'
            var printWindow = window.open(url, 'Print',
                'left=200, top=200, width=1250, height=700, toolbar=0, resizable=0');

            printWindow.addEventListener('load', function () {
                if (Boolean(printWindow.chrome)) {
                    printWindow.print();
                    setTimeout(function () {
                        printWindow.close();
                    }, 500);
                } else {
                    printWindow.print();
                    printWindow.close();
                }
            }, true);
        });

        $("#copy").hover(function () {
            $(this).attr('data-bs-original-title', 'Copy to clipboard')
                .tooltip('update');
        });

        $('#copy').click(function (e) {

            const txt = document.createElement('textarea');
            document.body.appendChild(txt);
            txt.value = $('#url').val(); // chrome uses this
            txt.textContent = $('#url').val(); // FF uses this
            var sel = getSelection();
            var range = document.createRange();
            range.selectNode(txt);
            sel.removeAllRanges();
            sel.addRange(range);
            document.execCommand('copy');
            document.body.removeChild(txt);

            $(".tooltip-inner").css({"background-color" : "green"});

            $('#copy').attr('data-bs-original-title', 'Copied!')
                .tooltip('update')
                .tooltip('show');

            setTimeout(function () {
                $('#copy').attr('data-bs-original-title', 'Copy to clipboard')
                .tooltip('update')
                .tooltip('hide');
            }, 5000);
        });

    });
</script>
@endsection