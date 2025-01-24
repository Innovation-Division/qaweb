@extends('layouts.epartnerpdf')
@section('main-content')
<style>
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

        .containerView {
            width: 850px;
        }
    }

    @media (max-width: 991px) {
        p {
            font-size: 12px !important;
        }
    }

    p {
        font-weight: 500 !important;
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

    .batch-button-success {
        background: #008080 !important;
    }

    .batch-button-secondary {
        background: #60B3B3 !important;
    }

    .batch-button>svg>path {
        stroke: #ffffff;
        stroke-width: 1px;
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
</style>
<div class="container-xl containerView">
    
    <div class="card card-lg" style="border-radius: 8px; " id="print-div">
        <div class="card-body" style="padding: 2rem !important;">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" width="110" height="32" alt="Cocogen"
                        class="navbar-brand-image" style="width: 210px; height: 100%">
                </div>
                <div class="col-12 my-2" style="background: #FFF4F9; padding:15px 15px 10px 15px; border-radius: 8px;">
                    <div class="row">
                        <div class="col-4">
                            <p style="color: #888888;">Life insured</p>
                            <p style="font-weight: bold !important;">{{$quotation->first_name}}
                                {{$quotation->middle_name}}
                                {{$quotation->last_name}}</p>
                        </div>
                        <div class="col-4">
                            <p style="color: #888888;">Employment</p>
                            <p style="font-weight: bold !important;">{{$quotation->occupation}}</p>
                        </div>
                        <div class="col-4">
                            <p style="color: #888888;">Contact information</p>
                            <p style="font-weight: bold !important;" class="mb-2">{{$quotation->contactno}}</p>
                            <p style="font-weight: bold !important;">{{$quotation->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <h2 style="font-weight: bold;">Vehicle Information</h2>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Type of Insurance</p>
                </div>
                <div class="col-6 text-end">
                    <p>Comprehensive</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Location of Vehicle</p>
                </div>
                <div class="col-6 text-end">
                    <p>Ortigas</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Year</p>
                </div>
                <div class="col-6 text-end">
                    <p>{{$quotation->modelYear}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Brand</p>
                </div>
                <div class="col-6 text-end">
                    <p>{{$quotation->carCompany}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Model</p>
                </div>
                <div class="col-6 text-end">
                    <p>{{$quotation->carVariant}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Market Value</p>
                </div>
                <div class="col-6 text-end">
                    <p>₱ {{number_format($quotation->fmv)}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Coverage</p>
                </div>
                <div class="col-6 text-end">
                    <p>{{ date("d / m / Y", strtotime($quotation->created_at))}} -
                        {{ date("d / m / Y", strtotime('+1 year', strtotime($quotation->created_at)))}}</p>
                </div>
                <hr style="margin-bottom: 20px;">
                <div class="col-12 my-0">
                    <h2 style="font-weight: bold;">Premium Computation</h2>
                </div>
                <hr>
                <div class="col-6">
                    <p style="color: #888888;">Net Premium</p>
                </div>
                <div class="col-6 text-end">
                    <p>₱ {{number_format($quotation->net, 2)}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Plus</p>
                </div>
                <div class="col-6 text-end">
                    <p></p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Doc Stamps</p>
                </div>
                <div class="col-6 text-end">
                    <p>₱ {{number_format($quotation->dst, 2)}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">VAT</p>
                </div>
                <div class="col-6 text-end">
                    <p>₱ {{number_format($quotation->vat, 2)}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Local Goverment Tax</p>
                </div>
                <div class="col-6 text-end">
                    <p>₱ {{number_format($quotation->lgt, 2)}}</p>
                </div>
                <div class="col-6">
                    <p style="color: #888888;">Gross Premium</p>
                </div>
                <div class="col-6 text-end">
                    <p>₱ {{number_format($quotation->gross_amount ,2)}}</p>
                </div>
                <hr style="margin-bottom: 10px;">
                <div class="col-6 my-3">
                    <p style="color: #888888;">Total amount due</p>
                </div>
                <div class="col-6 text-end my-3">
                    <p style="font-weight: bold;">₱ {{number_format($quotation->gross_amount, 2)}}</p>
                </div>
                <div class="col-12 my-1 pagebreak">
                    <h2 style="font-weight: bold;">Coverage</h2>
                </div>
                <div class="col-12" style="background: #F8F8F8; padding:20px; border-radius: 8px;">
                    <div class="row">
                        <div class="col-6">
                            <p style="color: #888888;">Own Damage and theft</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>₱ {{number_format($quotation->od ,2)}}</p>
                        </div>
                        <div class="col-6">
                            <p style="color: #888888;">Bodily Injury</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>₱ {{number_format($quotation->vtplbi ,2)}}</p>
                        </div>
                        <div class="col-6">
                            <p style="color: #888888;">Property Damage</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>₱ {{number_format($quotation->vtplpd ,2)}}</p>
                        </div>
                        <div class="col-6">
                            <p style="color: #888888;">Auto Personal Accident</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>₱ {{number_format($quotation->aupa ,2)}}</p>
                        </div>
                        <div class="col-6">
                            <p style="color: #888888;">Acts of Nature</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>₱ {{number_format($quotation->aon, 2)}}</p>
                        </div>
                        <div class="col-12">
                            <p style="color: #888888;">Deductible</p>
                            <p>Non-standard Accessories (Note all declared accessories not factory installed)</p>
                        </div>
                        <div class="col-12">
                            <p style="color: #888888;">Disclaimer</p>
                            <p>The above quotation is applicable only for the unit describe and shall be valid up to 30
                                days from the date of quotation.</p>
                            <p>Undeclared non-standard accessories will not be covered. For your protection please
                                declare all non-standard accessories, it’s brand/model and purchase price which shall be
                                subject to approval and additional premium shall be changed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-print-none">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button class="batch-button batch-button-secondary col-12" id="printPolicy"
                                onclick="javascript:window.print();"><svg xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 20 20">
                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                                </svg>Print</button>
                        </div>
                        <div class="col-lg-6">
                            <button class="batch-button batch-button-success col-12 issuePolicy" id="onClick"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor"
                                    class="bi bi-box-arrow-in-right" viewBox="0 0 18 20">
                                    <path fill-rule="evenodd" stroke="black"
                                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg>Share policy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
    integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    // $(".export-pdf").click(function() {
    //     // Convert the DOM element to a drawing using kendo.drawing.drawDOM
    //     kendo.drawing.drawDOM($(".containerView"))
    //     .then(function(group) {
    //         // Render the result as a PDF file
    //         return kendo.drawing.exportPDF(group, {
    //             paperSize: "auto",
    //             margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
    //         });
    //     })
    //     .done(function(data) {
    //         // Save the PDF file
    //         kendo.saveAs({
    //             dataURI: data,
    //             fileName: "HR-Dashboard.pdf",
    //             proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
    //         });
    //     });
    // });


    $('#onClick').click(function () {
            var win = window.open('', 'print', 'height=720,width=300');

            win.document.write(document.getElementsByClassName(".containerView").innerHTML);

            win.document.close(); 
            win.focus();
            win.print();
    });
</script>
@endsection