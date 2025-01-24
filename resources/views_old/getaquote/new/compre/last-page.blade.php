@extends('getaquote.new.compre.index')
@section('compre-section')
<style>
    .accordion {
        width: 90%;
        max-width: 1000px;
        margin: 2rem auto;
    }

    .accordion-item {
        background-color: #fff;
        color: #111;
        margin: 1rem 0;
        border-radius: 10px !important;
    }

    .accordion-item.active {
        border: 1px solid #008080 !important;
    }

    #cardSummary.active {
        border: 1px solid #008080 !important;
    }

    .accordion-item-header {
        padding: 0.5rem 3rem 0.5rem 1rem;
        min-height: 3.5rem;
        line-height: 1.25rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        position: relative;
        cursor: pointer;
        border-radius: 10px;
        color: #2D2727;
        font-size: 16px;
    }

    .accordion-item-header::after {
        /* content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='100' cy='50' r='40' stroke='black' stroke-width='2' fill='red'/%3E%3Cpolyline points='20,20 40,25 60,40 80,120 120,140 200,180' style='fill:none;stroke:black;stroke-width:3'/%3E%3C/svg%3E "); */
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' fill='%23008080' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708'/%3E%3C/svg%3E ");
        font-size: 25px;
        position: absolute;
        right: 1rem;
        padding: 0px 4px;
    }

    /* .accordion-item-header.active {
        background: #F7FFFF;
    } */

    .accordion-item-header.active::after {
        transform: rotate(180deg);
        background-color: #E0F5F5;
        border-radius: 15px;
        padding: 0px 4px;
    }

    .accordion-item-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        border-radius: 10px;
    }

    .accordion-item-body-content {
        padding: 1rem;
        line-height: 1.5rem;
    }

    .card-summary {
        width: 90%;
        max-width: 1000px;
        display: inline-block;
        padding: 25px;
        border-radius: 10px;
    }

    .accordion-additional-header {
        padding: 35px 85px;
        font-size: 23px;
    }

    .accordion-additional-header::after {
        right: 5rem;
        font-size: 35px;
    }

    .accordion-item-coll {
        border: 1px solid rgba(0, 0, 0, 0.125) !important;
    }

    .details-label {
        font-size: 14px;
    }

    .details-value {
        font-weight: 700;
        font-size: 14px;
    }

    .total-premium {
        color: #2D2727;
        font-weight: 700;
        font-size: 21px;
    }

    .total-premium-label {
        color: #585858;
        font-weight: 600;
        font-size: 16px;
    }

    .personal-data-web {
        display: block;
    }

    .personal-data-mob {
        display: none;
    }

    .additional-car-mob {
        display: none;
    }

    .additional-car-web {
        display: block;
    }

    .border-accordion {
        border-bottom: 1px solid #F2F2F2;
        padding: 8px 10px;
    }

    .border-accordion-two {
        border-bottom: 1px solid #F2F2F2;
        padding: 8px 70px;
    }

    .premium-title {
        color: #2D2727;
        font-weight: bold;
        font-size: 21px;
        line-height: 27.84px;
    }

    .premium-title > svg {
        width: 56px;
        height: 32px;
        margin-right: -10px;
    }

    .premium-subtitle {
        color: #585858;
        font-weight: 600;
        font-size: 15px;
        line-height: 24px;
    }

    .accordion-inside {
        border-radius: 0 !important;
    }

    @media (max-width: 991px) {
        .card-summary {
            padding: 0 !important;
        }

        .accordion-additional-header {
            font-size: 17px !important;
            padding: 20px 10px !important;
        }

        .accordion-additional-header::after {
            right: 1rem !important;
            font-size: 35px !important;
        }

        .premium-card-summary {
            padding: 0 !important;
        }

        .personal-data-web {
            display: none !important;
        }

        .personal-data-mob {
            display: block !important;
        }

        .additional-car-mob {
            display: block !important;
        }

        .additional-car-web {
            display: none !important;
        }

        .info-mob {
            margin-bottom: 10px !important;
        }

        .total-premium {
            font-size: 17px !important;
        }

        .total-premium-label {
            font-size: 15px !important;
        }

        .details-label {
            font-size: 12px !important;
            text-align: left !important;
        }

        .details-value {
            font-size: 12px !important;
            text-align: right !important;
        }

        .border-accordion {
            padding: 0px !important;
        }

        .border-accordion-two {
            padding: 0px !important;
        }

        .accordion-item-header {
            font-size: 15px !important;
        }

        .premium-title {
            font-size: 17px !important;
        }

        .premium-title > svg {
            width: 56px !important;
            height: 20px !important;
        }

        #noReview {
            padding: 10px 95px !important;
            font-weight: 500;
        }

        #proceed {
            padding: 10px 65px !important;
            font-weight: 500;
        }

        .modal-payment-body {
            text-align: center !important;
        }
    }
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/summary-auto-excel')}}" enctype="multipart/form-data"
    id="formLastStep">
    {{method_field('GET')}}
    <section class="col-12">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">You are about to get Auto Excel Plus Insurance</p>
            </div>
            <div class="col-12 text-center personal-input-div">
                <div class="card card-summary info-mob" id="cardSummary">
                    <div class="card-body premium-card-summary">
                        <div class="accordion">
                            <input type="hidden" name="transNo" id="transNo" value="{{$personalInfo->transNo}}">
                            @if($carInfo->isWithAon === 'yes')
                            <p class="text-left mb-4 premium-title" style="display: flex; justify-content: space-between;">Premium
                                with Acts of Nature <svg xmlns="http://www.w3.org/2000/svg" id="carInformationSuccess"
                                 fill="#09A12A" class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16">
                                    <path fill="#09A12A"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg></p>
                            @else
                            <p class="text-left mb-4 premium-title" style="display: flex; justify-content: space-between;">Premium
                                without Acts of Nature <svg xmlns="http://www.w3.org/2000/svg"
                                    id="carInformationSuccess" fill="#09A12A"
                                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path fill="#09A12A"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg></p>
                            @endif
                            <div class="accordion-item accordion-inside"
                                style="border-radius: 0px; border: 1px solid #c0e6e6">
                                <div class="accordion-item-header">
                                    Coverage
                                </div><!-- /.accordion-item-header -->
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Own
                                                damage and theft</p>
                                            <p class="details-value">P{{number_format($carInfo->ODTheft, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Bodily Injury
                                            </p>
                                            <p class="details-value">P{{number_format($carInfo->bodilyInjury, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Property Damage
                                            </p>
                                            <p class="details-value">P{{number_format($carInfo->propertyDamage, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Auto personal accident</p>
                                            <p class="details-value">P{{number_format($additionalInfo->seatingNo * 55000, 2)}}
                                            </p>
                                        </div>
                                        <!-- <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Medical
                                                expense
                                                reimbursement</p>
                                            <p class="details-value">P{{number_format($carInfo->autoPA, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Extended
                                                RoadPal rescue
                                            </p>
                                            <p class="details-value">P{{number_format($carInfo->autoPA, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Gawa Agad
                                            </p>
                                            <p class="details-value">P{{number_format($carInfo->autoPA, 2)}}
                                            </p>
                                        </div> -->
                                        @if($carInfo->isWithAon === 'yes')
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="font-weight: 800; color: #2D2727;">Acts of
                                                Nature</p>
                                            <p class="details-value">P{{number_format($carInfo->actsOfNature, 2)}}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item accordion-inside"
                                style="border-radius: 0px; border: 1px solid #c0e6e6">
                                <div class="accordion-item-header">
                                    Insured Car Information
                                </div><!-- /.accordion-item-header -->
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Insurance Type</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">Auto Excel
                                                Plus (Comprehensive Motor Insurance)
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Comprehensive Period of
                                                Insurance</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">1 Year</p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Year</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$carInfo->year}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Brand</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$carInfo->brand}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Model</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$carInfo->model}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Market Value</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                PHP {{number_format($carInfo->fmvValue, 2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Standard Accessories</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">Built-in
                                                Stereo, Speaker, Aircon, 5 pieces
                                                Magwheels
                                            </p>
                                        </div>
                                        <!-- <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label">Standard Accessories</p>
                                            <p class="details-value">@foreach($accessories as $accessory) @if($loop->last) {{$accessory->accessory}} @else {{$accessory->accessory}}  @endif @endforeach
                                            </p>
                                        </div> -->
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label" style="color: #585858;">Insurance Coverage</p>
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion"
                                            style="border-bottom: 1px solid #F8F8F8;">
                                            <div class="row">
                                                <div class="col-3 text-right">
                                                    <p class="details-label" style="color: #585858;">Bodily Injury</p>
                                                </div>
                                                <div class="col-9 text-right">
                                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                        {{number_format($carInfo->bodilyInjury, 2)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion"
                                            style="border-bottom: 1px solid #F8F8F8;">
                                            <div class="row">
                                                <div class="col-3 text-right">
                                                    <p class="details-label" style="color: #585858;">Property Damage</p>
                                                </div>
                                                <div class="col-9 text-right">
                                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                        {{number_format($carInfo->propertyDamage, 2)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label">Non-Standard Accessories</p>
                                            @if($accessories->count() !== 0)
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </p>
                                            @else
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-x-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </p>
                                            @endif
                                        </div>
                                        @if($accessories->count() !== 0)
                                            @foreach($accessories as $accessory)
                                            <div class="col-12 mb-3 border-accordion"
                                                style="border-bottom: 1px solid #F8F8F8;">
                                                <div class="row">
                                                    <div class="col-3 text-right">
                                                        <p class="details-label" style="color: #585858;">{{$accessory->accessory}}</p>
                                                    </div>
                                                    <div class="col-9 text-right">
                                                        <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                        {{$accessory->amount}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label">Total Guard</p>
                                            @if($carInfo->isWithTotalGuard === 'yes')
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </p>
                                            @else
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-x-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </p>
                                            @endif
                                        </div>
                                        @if($carInfo->isWithTotalGuard === 'yes')
                                        <div class="col-12 mb-3 border-accordion"
                                            style="border-bottom: 1px solid #F8F8F8;">
                                            <div class="row">
                                                <div class="col-3 text-right">
                                                    <p class="details-label" style="color: #585858;">Total Guard</p>
                                                </div>
                                                <div class="col-9 text-right">
                                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                        1,250.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion">
                                            <p class="details-label">Promo</p>
                                            @if($carInfo->promoCode)
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </p>
                                            @else
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-x-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </p>
                                            @endif
                                        </div>
                                        @if($carInfo->promoCode)
                                        <div class="col-12 mb-3 border-accordion"
                                            style="border-bottom: 1px solid #F8F8F8;">
                                            <div class="row">
                                                <div class="col-3 text-right">
                                                    <p class="details-label" style="color: #585858;">Promo Code</p>
                                                </div>
                                                <div class="col-9 text-right">
                                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                        {{$carInfo->promoCode}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion"
                                            style="border-bottom: 1px solid #F8F8F8;">
                                            <div class="row">
                                                <div class="col-3 text-right">
                                                    <p class="details-label" style="color: #585858;">Amount</p>
                                                </div>
                                                <div class="col-9 text-right">
                                                    @if($carInfo->promoType === 'P')
                                                        @if($carInfo->isWithAon === 'yes')
                                                        <p class="details-value" style="color: #DD0707">
                                                        -{{number_format($carInfo->netPremwithAOM * ($carInfo->promoRate / 100), 2 )}}</p>
                                                        @else
                                                        <p class="details-value" style="color: #DD0707">
                                                        -{{number_format($carInfo->netPrem * ($carInfo->promoRate / 100), 2 )}}</p>
                                                        @endif
                                                    @else 
                                                        <p class="details-value" style="color: #DD0707">
                                                        -{{$carInfo->promoRate}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item personal-data-mob accordion-inside"
                                style="border: 1px solid #C0E6E6;">
                                <div class="accordion-item-header">
                                    Personal Data
                                </div><!-- /.accordion-item-header -->
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">First Name</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->firstName}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Surname</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->lastName}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Suffix</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->suffix}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Contact No</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->contactNo}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Email Address</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->emailAddress}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Date of Birth</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->birthDate}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Gender</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->gender}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Nationality</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->nationality}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Place of Birth</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->palceofbirth}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Country</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->country}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion-two">
                                            <div class="row">
                                                <div class="col-4 text-left">
                                                    <p class="details-label" style="color: #585858;">Present Address</p>
                                                </div>
                                                <div class="col-8 text-right">
                                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                        {{$personalInfo->residence_address}} {{$personalInfo->street}}
                                                        {{$personalInfo->residence_barangay}}
                                                        {{$personalInfo->residence_municipality}}
                                                        {{$personalInfo->residence_province}} {{$personalInfo->zipNo}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Emergency Contact</p>
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion-two">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="details-label text-right" style="color: #585858;">Full
                                                        Name</p>
                                                </div>
                                                <div class="col-8">
                                                    <p class="details-value text-right"
                                                        style="color: #2D2727; font-weight:800;">
                                                        {{$personalInfo->emergencyFullName}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion-two">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="details-label text-right" style="color: #585858;">Mobile
                                                        No</p>
                                                </div>
                                                <div class="col-8">
                                                    <p class="details-value text-right"
                                                        style="color: #2D2727; font-weight:800;">
                                                        {{$personalInfo->emergencyMobile}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3  border-accordion-two">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="details-label text-right" style="color: #585858;">Relation
                                                    </p>
                                                </div>
                                                <div class="col-8">
                                                    <p class="details-value text-right"
                                                        style="color: #2D2727; font-weight:800;">
                                                        {{$personalInfo->emergencyRelation}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Identification</p>
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg></p>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion-two">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="details-label text-right" style="color: #585858;">ID
                                                        Picture</p>
                                                </div>
                                                <div class="col-8">
                                                    <p class="details-value text-right"
                                                        style="color: #2D2727; font-weight:800;">Accepted</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion-two">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="details-label text-right" style="color: #585858;">ID Type
                                                    </p>
                                                </div>
                                                <div class="col-8">
                                                    <p class="details-value text-right"
                                                        style="color: #2D2727; font-weight:800;">
                                                        {{$personalInfo->typeofid}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 border-accordion-two">
                                            <div class="row">
                                                <div class="col-4">
                                                    <p class="details-label text-right" style="color: #585858;">ID No
                                                    </p>
                                                </div>
                                                <div class="col-8">
                                                    <p class="details-value text-right"
                                                        style="color: #2D2727; font-weight:800;">{{$personalInfo->idno}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item d-lg-none additional-car-mob accordion-inside"
                                style="border: 1px solid #C0E6E6;">
                                <div class="accordion-item-header">
                                    Additional Car Information
                                </div><!-- /.accordion-item-header -->
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">MV File No</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->mvFileNo}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Plate No</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->plateNo}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Engine No.</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->engineNo}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Body Type</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->bodyType}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Color</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->color}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Chassis No</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->chassisNo}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Authorized Seating Capacity
                                            </p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->seatingNo}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Inception Date</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->inceptDate}}
                                            </p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Mortgagee</p>
                                            @if($additionalInfo->mortgagee === 'yes')
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                            </p>
                                            @else
                                            <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-x-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                                </svg>
                                            </p>
                                            @endif
                                        </div>
                                        @if($additionalInfo->mortgagee === 'yes')
                                        <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                            <p class="details-label" style="color: #585858;">Bank Name</p>
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->mortgagee_name}}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($carInfo->isWithAon === 'yes')
                            <div class="d-flex justify-content-between"
                                style="background: #FCFCFC; padding: 20px 15px 5px 15px;">
                                <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Net
                                    Premium
                                </p>
                                <p class="text-left" style="color: #2D2727; font-weight: 800; font-size: 16px;">
                                    P{{number_format($carInfo->netPremwithAOM, 2)}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Plus</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">0.00
                                    </p>
                                </div>
                            <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">
                                    Documentary
                                    Stamp</p>
                                <p class="text-left" style="color: #2D2727; font-weight: 800; font-size: 16px;">
                                    P{{number_format($carInfo->dstWithAOM, 2)}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">VAT</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                        P{{number_format($carInfo->vatWithAOM, 2)}}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Local
                                        Goverment Tax</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                        P{{number_format($carInfo->lgtWithAOM, 2)}}
                                    </p>
                                </div>
                            <div class="d-flex justify-content-between"
                                    style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Gross
                                        premium</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                        P{{number_format($carInfo->grossPremWithAOM, 2)}}
                                    </p>
                                </div>
                            @if($carInfo->promoCode)
                            <div class="d-flex justify-content-between"
                                style="background: #FCFCFC; padding: 5px 15px 20px 15px;">
                                <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Promo
                                </p>
                                @if($carInfo->promoType === 'P')
                                <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 14px;">
                                    -P{{number_format($carInfo->netPremwithAOM * ($carInfo->promoRate / 100), 2 )}}
                                </p>
                                @else 
                                <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                    -P{{number_format($carInfo->promoRate, 2)}}
                                </p>
                                @endif
                            </div>
                            @endif
                            <div class="d-flex justify-content-between"
                                style="background: #F5F5F5; padding: 20px 15px;">
                                <p class="text-left total-premium-label">Total
                                    Premium</p>
                                <p class="text-left total-premium">
                                    P{{number_format($carInfo->finalDueWithAOM, 2)}}
                                </p>
                            </div>
                            @else
                            <div class="d-flex justify-content-between"
                                style="background: #FCFCFC; padding: 20px 15px 5px 15px;">
                                <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Net
                                    Premium
                                </p>
                                <p class="text-left" style="color: #2D2727; font-weight: 800; font-size: 16px;">
                                    P{{number_format($carInfo->netPrem, 2)}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Plus</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">0.00
                                    </p>
                                </div>
                            <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">
                                    Documentary Stamp</p>
                                <p class="text-left" style="color: #2D2727; font-weight: 800; font-size: 16px;">
                                    P{{number_format($carInfo->dst, 2)}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">VAT</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                        P{{number_format($carInfo->vat, 2)}}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between" style="background: #FCFCFC; padding: 5px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Local
                                        Goverment Tax</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                        P{{number_format($carInfo->lgt, 2)}}
                                    </p>
                                </div>
                            <div class="d-flex justify-content-between"
                                    style="background: #FCFCFC; padding: 5px 15px 20px 15px;">
                                    <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Gross
                                        premium</p>
                                    <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                        P{{number_format($carInfo->grossPrem, 2)}}
                                    </p>
                                </div>
                            @if($carInfo->promoCode)
                            <div class="d-flex justify-content-between"
                                style="background: #FCFCFC; padding: 5px 15px 20px 15px;">
                                <p class="text-left" style="color: #2D2727; font-weight: 600; font-size: 14px;">Promo
                                </p>
                                @if($carInfo->promoType === 'P')
                                <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 14px;">
                                    -P{{number_format($carInfo->netPrem * ($carInfo->promoRate / 100), 2 )}}
                                </p>
                                @else 
                                <p class="text-left" style="color: #2D2727; font-weight: 700; font-size: 16px;">
                                    -P{{number_format($carInfo->promoRate, 2)}}
                                </p>
                                @endif
                            </div>
                            @endif
                            <div class="d-flex justify-content-between"
                                style="background: #F5F5F5; padding: 20px 15px;">
                                <p class="text-left total-premium-label">Total
                                    Premium</p>
                                <p class="text-left total-premium">
                                    P{{number_format($carInfo->finalDue, 2)}}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion additional-car-web">
                    <div class="accordion-item mb-4">
                        <div class="accordion-item-header accordion-additional-header">
                            Additional Car information
                        </div><!-- /.accordion-item-header -->
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">MV File No</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->mvFileNo}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Plate No</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->plateNo}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Engine No.</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->engineNo}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Body Type</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->bodyType}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Color</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->color}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Chassis No</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->chassisNo}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Authorized Seating Capacity</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->seatingNo}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Inception Date</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$additionalInfo->inceptDate}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Mortgagee</p>
                                    @if($additionalInfo->mortgagee === 'yes')
                                    <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    </p>
                                    @else
                                    <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-x-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                        </svg>
                                    </p>
                                    @endif
                                </div>
                                @if($additionalInfo->mortgagee === 'yes')
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">Bank Name</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">
                                                {{$additionalInfo->mortgagee_name}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-4 personal-data-web accordion-item-coll">
                        <div class="accordion-item-header accordion-additional-header">
                            Personal Data
                        </div><!-- /.accordion-item-header -->
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">First Name</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->firstName}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Surname</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->lastName}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Suffix</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->suffix}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Contact No</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->contactNo}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Email Address</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->emailAddress}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Date of Birth</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->birthDate}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Gender</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->gender}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Nationality</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->nationality}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Place of Birth</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->palceofbirth}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Country</p>
                                    <p class="details-value" style="color: #2D2727; font-weight:800;">
                                        {{$personalInfo->country}}
                                    </p>
                                </div>
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-4 text-left">
                                            <p class="details-label" style="color: #585858;">Present Address</p>
                                        </div>
                                        <div class="col-8 text-right">
                                            <p class="details-value" style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->residence_address}} {{$personalInfo->street}}
                                                {{$personalInfo->residence_barangay}}
                                                {{$personalInfo->residence_municipality}}
                                                {{$personalInfo->residence_province}} {{$personalInfo->zipNo}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Emergency Contact</p>
                                    <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    </p>
                                </div>
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">Full Name</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->emergencyFullName}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">Mobile No</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->emergencyMobile}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3  border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">Relation</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">
                                                {{$personalInfo->emergencyRelation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 d-flex justify-content-between border-accordion-two">
                                    <p class="details-label" style="color: #585858;">Identification</p>
                                    <p class="details-value"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg></p>
                                </div>
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">ID Picture</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">Accepted</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">ID Type</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">{{$personalInfo->typeofid}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 border-accordion-two">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="details-label text-right" style="color: #585858;">ID No</p>
                                        </div>
                                        <div class="col-10">
                                            <p class="details-value text-right"
                                                style="color: #2D2727; font-weight:800;">{{$personalInfo->idno}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2"
                    style="background: #E1F4E5; width: 90%; max-width: 950px; display: inline-block; padding: 25px 20px;">
                    <div class="col-12">
                        <div class="row ">
                            <div class="col-1 text-center" style="padding: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                                    <path fill="#54B947"
                                        d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </div>
                            @if($carInfo->isWithAon === 'yes')
                            <div class="col-11 text-left" style="padding: 0;">
                                <p style="color: #303030;">You have selected Auto
                                    Excel Plus Comprehensive Motor Insurance Premium Plan with
                                    <span style="font-weight: bold;">Acts of Nature (AON)</span> with total amount of
                                    <span
                                        style="font-weight: bold;">P{{number_format($carInfo->finalDueWithAOM, 2)}}</span>
                                </p>
                            </div>
                            @else
                            <div class="col-11 text-left" style="padding: 0;">
                                <p style="color: #303030;">You have selected Auto
                                    Excel Plus Comprehensive Motor Insurance Premium Plan with total amount of
                                    <span style="font-weight: bold;">P{{number_format($carInfo->finalDue, 2)}}</span>
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-2"
                    style="background: #FFF4DA; width: 90%; max-width: 950px; display: inline-block; padding: 25px 20px;">
                    <div class="col-12">
                        <div class="row ">
                            <div class="col-12 text-left" style="padding: 10px 35px;">
                                <p style="color: #2D2727;">By continuing this request for quotation, you hereby confirm
                                    that
                                    you are aware and have fully
                                    read Cocogen Insurance Inc.'s
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#privacyPolicy"
                                        style="font-weight: bold; color:#2D2727;">Privacy Policy</a>,
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#terms"
                                        style="font-weight: bold; color:#2D2727;">Terms and Conditions</a>, and
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exclusion"
                                        style="font-weight: bold; color:#2D2727;">Exclusions and
                                        Limitations</a> of this product</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="mb-2" style="width: 95%; max-width: 950px; display: inline-block; padding: 25px 20px;">
                <p style="font-size: 16px; line-height: 24px;">By continuing, you hereby agree to <a href=""
                        style="color: #000; font-weight:bold; text-decoration: underline;">Privacy Policy</a>, <a
                        href="" style="color: #000; font-weight:bold; text-decoration: underline;">Exclusions and
                        Limitations</a>, and <a href=""
                        style="color: #000; font-weight:bold; text-decoration: underline;">Marketing Consent</a></p>
            </div> -->

            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <div class="row bottom-buttons">
                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">
                        <button type="button" class="btn-back" id="back"> Back</button>
                    </div>
                    <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">
                        <button type="button" class="btn-continue" id="payNow"> Pay
                        now</button>
                    </div>
                </div>
             
              
            </div>

            <div class="modal fade" id="payNowModal" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="col-12 modal-payment-body" style="padding: 10px 0px;">
                                <div class="row">
                                    <div class="col-lg-3 d-lg text-center align-self-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="none"
                                            viewBox="0 0 140 140">
                                            <rect width="140" height="140" fill="url(#a)" rx="70" />
                                            <defs>
                                                <pattern id="a" width="1" height="1"
                                                    patternContentUnits="objectBoundingBox">
                                                    <use href="#b" transform="scale(.00093)" />
                                                </pattern>
                                                <image id="b" width="1080" height="1080"
                                                    data-name="Proceed to Payment 08142024.png"
                                                    href="data:image/png;base64,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" />
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="mb-3"
                                                    style="font-size: 27px; font-weight:700; color:#2D2727;">
                                                    Proceed to
                                                    payment</p>
                                            </div>
                                            <div class="col-12">
                                                @if($carInfo->isWithAon === 'yes')
                                                    <p class="mb-4"
                                                        style="font-size: 16px; font-weight:600; color:#3B3939;">You
                                                        are about to pay <b>P{{number_format($carInfo->finalDueWithAOM, 2)}}</b> to Cocogen Insurance Inc.,
                                                        for <b> Auto Excel Plus Insurance - Premium with Acts of Nature </b>
                                                    </p>
                                                @else
                                                    <p class="mb-4"
                                                        style="font-size: 16px; font-weight:600; color:#3B3939;">You
                                                        are about to pay <b>P{{number_format($carInfo->finalDue, 2)}}</b> to Cocogen Insurance Inc.,
                                                        for <b> Auto Excel Plus Insurance - Premium without Acts of Nature </b>
                                                    </p>
                                                @endif

                                                <p class="mb-5">Do you want to proceed to payment?</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12">
                                                <div class="row bottom-buttons">
                                                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">
                                                        <button type="button" class="btn-back" id="noReview" style="background: #ffffff;"> No, review
                                                        quote</button>
                                                    </div>
                                                    <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">
                                                        <button type="button" class="btn-continue" id="proceed"> Yes, proceed to payment</button>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

    accordionItemHeaders.forEach(accordionItemHeader => {
        accordionItemHeader.addEventListener("click", event => {

            // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

            //     const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
            //     if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
            //        currentlyActiveAccordionItemHeader.classList.toggle("active");
            //        currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
            //      }

            accordionItemHeader.classList.toggle("active");
            accordionItemHeader.parentNode.classList.toggle("active");
            const accordionItemBody = accordionItemHeader.nextElementSibling;
            if (accordionItemHeader.classList.contains("active")) {
                accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
                // accordionItemBody.style.background = '#F7FFFF';
            } else {
                accordionItemBody.style.maxHeight = 0;
            }

        });
    });

    $(".btn-continue").on({
            mouseenter: function () {
                if ($(this).is(':disabled')) {

                } else {
                    $(this).children('svg').attr("class", "").removeClass('d-none');
                }
            },
            mouseleave: function () {
                $('.btn-continue > svg').attr("class", "d-none");
            },
            mousedown: function () {
                $(this).children('svg').attr("class", "").removeClass('d-none');
                $(this).css({
                    'background': '#60B3B3'
                });
            },
            mouseup: function () {
                $(this).children('svg').attr("class", "d-none");
                $(this).css({
                    'background': '#008080'
                });
            },
        });

    function addCommas(num) {
        var str = num.toString().split('.');
        if (str[0].length >= 4) {
            str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
        }
        return str.join('.');
    }

    $('.accordion-inside').click(function (e) {
        e.preventDefault();
        if ($(".accordion-inside").hasClass('active')) {
            $('#cardSummary').addClass("active");
        } else {
            $('#cardSummary').removeClass("active");
        }
    });

    $('#payNow').click(function (e) {
        e.preventDefault();
        jQuery('#payNowModal').modal('show');
    });

    $('#noReview').click(function (e) {
        e.preventDefault();
        jQuery('#payNowModal').modal('hide');
    });

    $('#back').click(function (e) {
        e.preventDefault();
        $("#formLastStep").attr('action',
            "{{ url('/get-quote/auto-excel-plus/personal-data')}}");

        $("#formLastStep").submit();
    });

    $('#proceed').click(function (e) {
        e.preventDefault();
        $("#formLastStep").attr('action',
            "{{ url('/get-quote/auto-excel-plus/payment')}}");

        $("#formLastStep").submit();
    });
</script>
@endsection