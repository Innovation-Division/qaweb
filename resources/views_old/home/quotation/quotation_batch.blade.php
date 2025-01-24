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
    }
</style>

<div class="container batch-container">
    <div class="row mb-4 mt-4">
        <div class="col-lg-12">
            <a href="{{url('/quotation')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-arrow-left-short" viewBox="0 0 18 18">
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
                <div class="col-lg-4 text-end">
                    @if($quotation->status != 'Issued')
                    <button class="batch-button batch-button-success issuePolicy"><svg
                            xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                            class="bi bi-file-earmark-check" viewBox="0 0 20 20">
                            <path
                                d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                        </svg>Issue policy</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body m-2">
                    <div class="d-flex justify-content-between">
                        <p class="policy-name">{{$quotation->first_name}} {{$quotation->middle_name}} {{$quotation->last_name}}</p>
                        <p
                            style="background-color: rgba(0, 128, 128, 0.08) !important; font-weight: bold; padding: 5px 10px 0px 10px; border-radius: 5px">
                            <span class="badge bg-success me-1"></span>  {{$quotation->status}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Date and time created</p>
                        <p class="policy-details">{{ date("M d, Y", strtotime($quotation->created_at))}} &#x2022; {{ date("H:i A", strtotime($quotation->created_at))}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Quote no.</p>
                        <p class="policy-details">000{{ $quotation->id}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Policy no.</p>
                        <p class="policy-details">
                            @if($quotation->response_policyNo)
                                {{$quotation->response_policyNo}}
                            @else 
                              --
                            @endif   
                        </p>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-lg-6">
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
                    <div class="row mb-3 p-4 m-2" style="background: #f8f8f8; border-radius: 10px;">
                        <div class="col-lg-4">
                            <p class="policy-label">Life insured</p>
                            <p class="policy-details">{{$quotation->first_name}} {{$quotation->middle_name}} {{$quotation->last_name}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p class="policy-label">Employment</p>
                            <p class="policy-details">{{$quotation->occupation}}</p>
                        </div>
                        <div class="col-lg-4">
                            <p class="policy-label">Contact Information</p>
                            <p class="policy-details mb-0">{{$quotation->contactno}}</p>
                            <p class="policy-details">{{$quotation->email}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <strong style="font-size: 20px;">Vehicle Information</strong>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Type of insurance</p>
                        <p class="policy-details">Comprehensive</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Location of vehicle</p>
                        <p class="policy-details">{{$quotation->assdAddress}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Year</p>
                        <p class="policy-details">{{$quotation->modelYear}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Brand</p>
                        <p class="policy-details">{{$quotation->carCompany}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Model</p>
                        <p class="policy-details">{{$quotation->carVariant}}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Market Value</p>
                        <p class="policy-details">₱ {{number_format($quotation->fmv, 2)}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="policy-label">Coverage</p>
                        <p class="policy-details">
                            @if($quotation->status === 'Issued')
                                {{ date("d/m/Y", strtotime($quotation->inceptDate))}}  - {{ date("d/m/Y", strtotime($quotation->expiryDate))}}
                            @else
                                {{ date("d/m/Y", strtotime($quotation->created_at))}}  - {{ date("d/m/Y", strtotime('+1 year', strtotime($quotation->created_at)))}}
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="col-lg-12 mb-3">
                        <strong style="font-size: 20px;">Documentary Stamps Tax</strong>
                    </div>
                    <p class="policy-details mb-4">Due to BIR implementation of EDST(Electronic Documentary Stamp Tax)
                        system
                        effective July 1, 2010, policy holders are mandated to pay DST portion of the premium once the
                        policy is issued. Refund on DST for cancelled policies is not allowed.</p>
                    <div class="form-group form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="checkPrivacy">
                        <label class="form-check-label" for="checkPrivacy"><strong>I agree with the Privacy
                                Policy</strong></label>
                    </div>
                    <div class="form-group form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="checkTerms">
                        <label class="form-check-label" for="checkTerms"><strong>I agree to the Terms and
                                Conditions</strong></label>
                    </div>
                    <div class="form-group form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="checkExclusion">
                        <label class="form-check-label" for="checkExclusion"><strong>I agree with Exclusion &
                                Limitations</strong></label>
                    </div>
                    <p class="policy-label">By proceeding, you read and understood the Terms and Conditions of Cocogen
                        Insurance.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="batch-button batch-button-secondary col-12" id="printPolicy"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                    class="bi bi-printer" viewBox="0 0 20 20">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                                </svg>Print</button>
                        </div>
                        <div class="col-lg-6">
                                @if($quotation->status != 'Issued')
                                    <button class="batch-button batch-button-success col-12 issuePolicy"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                            class="bi bi-file-earmark-check" viewBox="0 0 20 20">
                                            <path
                                                d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                        </svg>Issue policy</button>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 mb-3">
                        <strong style="font-size: 20px;">Premium computation</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Net Premium</p>
                            <p class="policy-details">₱ {{number_format($quotation->net, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Plus</p>
                            <p class="policy-details"></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Doc Stamps</p>
                            <p class="policy-details">₱ {{number_format($quotation->dst, 2)}}</p>
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
                            <p class="policy-details">₱ {{number_format($quotation->gross_amount, 2)}}</p>
                        </div>
                        <hr style="margin-top:-2px;margin-bottom:10px;">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Total amount due</p>
                            <p class="policy-details">₱ {{number_format($quotation->totalamount, 2)}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3" style="margin-bottom:10px !important;margin-top:10px !important;">
                        <strong style="font-size: 20px;">Coverage</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Own damage and theft</p>
                            <p class="policy-details">₱ {{number_format($quotation->od, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Bodily Injury</p>
                            <p class="policy-details">₱ {{number_format($quotation->vtplbi, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Property Damage</p>
                            <p class="policy-details">₱ {{number_format($quotation->vtplpd, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Auto personal accident</p>
                            <p class="policy-details">₱ {{number_format($quotation->aupa, 2)}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="policy-label">Acts of Nature</p>
                            <p class="policy-details">₱ {{number_format($quotation->aon, 2)}}</p>
                        </div>
                        <hr>
                        <p class="policy-label">Deductible</p>
                        <p class="policy-details">Non-standard Accessories (Note all declared accessories not factory
                            installed)</p>
                        <p class="policy-label">Disclaimer</p>
                        <p class="policy-details">The above quotation is applicable only for the unit describe and shall
                            be valid up to 30 days from the date of quotation</p>
                        <p class="policy-details">
                            Undeclared non-standard accessories will not be covered. For your protection please declare
                            all non-standard accessories, it's brand/model and purchase price which shall be subject to
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
            <form action="{{ url('/quotation/batch/sharePolicy/') }}/{{$quotation->trans_no}}" method="POST"
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

        $('.issuePolicy').click(function (e) {
            $('.loading-spinner').show();
            $('.outer-loading-page').show();
            window.location.href = "{{ url('/quotation/issue-policy/batch/')}}" + '/{{$quotation->trans_no}}';
        });

        $('#printPolicy').click(function (e) {
            e.preventDefault();
            url = "{{url('/quotation/view/batch/')}}" + '/{{$quotation->trans_no}}'
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


        $('.sharePolicy').click(function (e) {
            e.preventDefault();
            $('#modal-send-quotation').modal('show');
        });
        $('.downloadPolicy').click(function (e) {
            e.preventDefault();
            window.location.href = "{{url('/quotation/batch/download/')}}" + '/{{$quotation->trans_no}}';
        });
    });
</script>
@endsection