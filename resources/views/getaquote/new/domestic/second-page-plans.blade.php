@extends('getaquote.new.domestic.index')
@section('domestic-section')
<style>
    @media only screen and (min-width: 768px) and (max-width: 991.98px) {

        .custom-col {
            flex: 1 0 100% !important;
            margin-bottom: 20px;
        }

        .car-details {
            font-size: 16px !important;
        }

        .car-sub-details {
            font-size: 12px !important;
        }

        .card-price {
            margin-left: 10px !important;
        }

        .price-card {
            padding: 70px 350px 30px 350px !important;
        }
    }


    @media only screen and (min-width: 992px) and (max-width: 1199.98px) {
        .price-card {
            padding: 70px 450px 30px 450px !important;
        }
    }


    @media only screen and (min-width: 1200px) and (max-width: 1399.98px) {
        .price-card {
            padding: 70px 450px 30px 450px !important;
        }
    }

    .card-price {
        max-width: 95% !important;
        margin-left: 0px;
    }

    .active-aon {
        border: 1px solid #006666;
        background-color: #FBFAFA;
    }
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/car-information') }}" enctype="multipart/form-data"
    id="compreFormStep2Plan">
    {{method_field('GET')}}
    <section class="col-12">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Travel Plans</p>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <input type="hidden" name="insurancePlan" id="insurancePlan" value="Pro">
                <input type="hidden" name="transNo" id="transNo" value="{{$trans_no}}">
                <input type="hidden" name="page" id="page" value="plan">
                <input type="hidden" name="transaction" id="transaction" value="apply">
                <div class="row price-card">
                    <div class="col-lg-6 card-price" style="margin-top: 32px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 mt-4 mb-5">
                                        <p class="prem" style="font-size: 20px;font-weight: 700; color:#2D2727;">
                                            Standard Coverages</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Accidental Death and Disablement</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Accidental Medical Reimbursement</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Accidental Burial Benefit</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Unprovoked Murder and Assault</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Medical Expenses (with Sabotage and Terrorism) and hospitalization</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Transport of repatriation in case of illness or accident</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Repatriation of mortal remains</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Pre-existing Condition within the Look Back Period</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Trip cancellation</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Trip curtailment</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Delayed Departure</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Baggage Delay</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Compensation for in-flight loss and damage (checked-in baggage)</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Long distance medical information services</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Medical referral/appointment of local medical specialists</p>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <p>Connection Services</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 card-price text-center" style="margin-top: 42px; padding-right: 0px;">
                        <div class="card" style="border-radius: 0px;" id="cardWithoutAON">
                            <div class="card-body" style="padding: 12px;">
                                <div class="col-lg-12" style="padding: 0;">
                                    <div class="row text-center">
                                        <div class="col-lg-12 mb-5">
                                            <p class="prem" style="font-size: 20px;font-weight: 700; color:#2D2727;">
                                                Packet</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5"
                                            style="background-color: #C0E6E6; padding: 5px 0px;">
                                            <p style="font-weight: bold;">P300.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center d-none" id="buttonWithoutAON"
                            style="background: #E4509A;padding: 10px;color: white;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                            Selected
                        </p>
                        <div class="col-12" style="margin-top: 13px;">
                            <a href="javascript:void(0)" id="withoutAON">Select</a>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4 card-price" style="padding-left: 0px;">
                        <p class="text-center"
                            style="background: #006666;padding: 10px;color: white;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                            Popular</p>
                        <div class="card active-aon" id="cardWithAON"
                            style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
                            <div class="card-body" style="padding: 12px;">
                                <div class="col-lg-12" style="padding: 0;">
                                    <div class="row text-center">
                                        <div class="col-lg-12 mb-5">
                                            <p class="prem" style="font-size: 20px;font-weight: 700; color:#2D2727;">
                                                Pro</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <p>Connection Services</p>
                                        </div>
                                        <div class="col-lg-12 mb-5"
                                            style="background-color: #C0E6E6; padding: 5px 0px;">
                                            <p style="font-weight: bold;">P500.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center" id="buttonWithAON"
                            style="background: #E4509A;padding: 10px;color: white;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                            Selected</p>
                        <div class="col-12 text-center" style="margin-top: 13px;"> <a href="javascript:void(0)"
                                class="d-none" id="withAON">Select</a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 price-card" style="background-color: #F7FCFF; padding-top: 0; padding-bottom: 0;">
                <div class="row">
                    <div class="col-12 mb-5 " style="background-color: #FFF4DA; padding: 20px 60px;">
                        <p style="color: #2D2727;">You have selected Auto Excel Plan Premium with AON amounting to
                            P500.00
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <button class="btn-back" id="back"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" fill="#008080"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg> Back</button>
                <button class="btn-continue" id="apply"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" fill="#ffffff"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg> Apply Plan</button>
            </div>
        </div>
    </section>
</form>

<script>
    $(document).ready(function () {
        $('#apply').click(function (e) {
            $("#transaction").val('apply');

            $("#compreFormStep2Plan").submit();
        });

        $('#back').click(function (e) {
            $("#transaction").val('back');

            $("#compreFormStep2Plan").submit();
        });

        if ($("#insurancePlan").val() === 'yes') {
            $("#cardWithAON").addClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $(this).addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $("#aon").val('yes');
        } else {
            $("#cardWithoutAON").addClass('active-aon');
            $("#cardWithAON").removeClass('active-aon');
            $('#withoutAON').addClass('d-none');
            $("#buttonWithoutAON").removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $("#aon").val('no');
        }

        $('#withAON').click(function (e) {
            $("#cardWithAON").addClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $(this).addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $("#insurancePlan").val('Pro');
        });

        $('#withoutAON').click(function (e) {
            $("#cardWithoutAON").addClass('active-aon');
            $("#cardWithAON").removeClass('active-aon');
            $('#withoutAON').addClass('d-none');
            $("#buttonWithoutAON").removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $("#insurancePlan").val('Packet');
        });

    });
</script>
@endsection