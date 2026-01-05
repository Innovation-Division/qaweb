@extends('getaquote.new.compre.index')
@section('compre-section')
<style>
   

    #left {
        display: none;
    }

    #right {
        display: none;
    }

    .card-price {
        max-width: 95% !important;
        margin-left: 0px;
    }

    .active-aon {
        border: 1px solid #006666;
        background-color: #FBFAFA;
    }

    .toast {
        border: none !important;
    }

    #toast-container>.toast-success {
        background: #ffffff !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'%3E%3Cpath fill='%231465B4' d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2'/%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position-x: 15px !important;
        background-position-y: 28px !important;
        background-size: 20px auto, 100% !important;
    }

    #toast-container>div {
        width: 560px;
        opacity: 1;
        border-radius: 8px;
        box-shadow: none;
        padding: 25px 15px 15px 50px;
    }

    .toast-top-right {
        top: 115px;
        right: 30px;
    }

    .toast-title {
        font-weight: 700;
        font-size: 17px;
        font-family: 'Inter';
        color: #1D1F23;
    }

    .toast-message {
        -ms-word-wrap: break-word;
        word-wrap: break-word;
        font-size: 16px;
        font-family: 'Inter';
        line-height: 24px;
        color: #2D2727;
    }

    .toast-progress {
        top: 0 !important;
        right: 0 !important;
        background-color: #003592 !important;
        opacity: 1;
        height: 8px;
    }

    .toast-close-button {
        color: #848A90;
        padding: 10px !important;
        font-size: 30px;
        font-weight: 300;
    }

    .card-price:hover {
        transform: scale(1.1) !important;
    }

    @media (max-width: 991px) {
        .custom-col {
            flex: 1 0 100% !important;
            margin-bottom: 20px;
        }

        .car-details {
            font-size: 15px !important;
        }

        .car-sub-details {
            font-size: 12px !important;
        }

        .card-price {
            margin-left: 10px !important;
        }

        #slider-container {
            position: relative;
            overflow: hidden;
            margin: 0 auto;
            white-space: nowrap;
        }

        #slider-container div {
            position: relative;
            display: inline-block;
            margin-right: -4px;
            white-space: normal;
            vertical-align: top;
        }

        #toast-container>div {
            width: 375px !important; 
        }

        .toast-top-right {
            top: 80px !important;
            right: 5px !important;
        }

        #toast-container>.toast-success {
            background-size: 15px auto, 100% !important;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }

        .toast-title {
            font-size: 14px !important;
        }

        .toast-message {
            font-size: 12px !important;
        }

        .toast-close-button {
            padding: 3px !important;
            font-size: 25px !important;
        }

        .card-price:hover {
            transform: scale(1) !important;
        }

        #cardWithoutAONMarg {
            margin-left: -90px !important;
        }
    }
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/additional-car-information')}}"
    enctype="multipart/form-data" id="compreFormStep2">
    {{method_field('GET')}}
    <section class="col-12">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Auto Excel Plus Quotation</p>
            </div>
            <div class="col-12 personal-div car-details-summary" style="background-color: #EFF2F4; margin-bottom: 0px;">
                <div class="row text-center">
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$carInfo->brand}}</p>
                        <p class="car-sub-details text-center">Car</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$carInfo->model}}</p>
                        <p class="car-sub-details text-center">Model</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$carInfo->year}}</p>
                        <p class="car-sub-details text-center">Year</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center" id="formatter">P890K</p>
                        <p class="car-sub-details text-center">Value</p>
                    </div>
                    @if($accessories->count() !== 0)
                    <div class="col custom-col">
                        <p class="car-details text-center">{{$accessories->count()}}</p>
                        <p class="car-sub-details text-center">Additional Accessory(ies)</p>
                    </div>
                    @endif
                    <div class="col custom-col">
                        @if($carInfo->promoCode)
                        <p class="car-details text-center">Yes</p>
                        @else
                        <p class="car-details text-center">No</p>
                        @endif
                        <p class="car-sub-details text-center">Promo Code</p>
                    </div>
                </div>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <div class="row price-card">
                    <div id="slider-container">
                        <div class="slide active">
                            <div class="col-lg-6 mb-4 card-price">
                                <input type="hidden" name="aon" id="aon" value="{{$carInfo->isWithTotalGuard}}">
                                <input type="hidden" name="page" id="page" value="quotation">
                                <input type="hidden" name="transNo" id="transNo" value="{{$carInfo->transNo}}">
                                <p
                                    style="background: #006666;padding: 10px 22px;width: 100px;color: white;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                    Popular</p>
                                <div class="card active-aon" id="cardWithAON"
                                    style=" padding: 10px; border-top-left-radius: 0px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 d-flex justify-content-between"
                                                    style="padding-left: 0;">
                                                    <p class="prem"
                                                        style="font-size: 25px;font-weight: 700;text-align: left; color:#2D2727;">
                                                        Premium with Turbo Shield</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28"
                                                        id="svgWithAON" fill="currentColor"
                                                        class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                                                        <path fill="#54B947"
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-12 mb-4"
                                                    style="border-bottom: 1px solid #D7DEE3; padding-left: 0;">
                                                    <p class="prem-price"
                                                        style="font-size: 23px;font-weight: 700;text-align: left; color:#2D2727; padding-bottom: 15px;">
                                                        ₱{{number_format(($carInfo->grossPremWithAOM), 2)}}</p>
                                                </div>
                                                @if($carInfo->promoCode)
                                                <div class="col-lg-12 mb-4"
                                                    style="padding: 10px 15px; background: #F6F6F6;">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p style="font-size: 14px;">Promo code: {{$carInfo->promoCode}}</p>
                                                        </div>
                                                        @if($carInfo->promoType === 'P')
                                                        <div class="col-4 text-end" style="color: #DD0707; font-size: 14px;">
                                                            -{{$carInfo->promoRate}}% / ₱{{number_format($carInfo->grossPremWithAOM * ($carInfo->promoRate / 100), 2 )}}</div>
                                                        @else 
                                                        <div class="col-4 text-end" style="color: #DD0707; font-size: 14px;">
                                                            -₱{{$carInfo->promoRate}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">Get all the
                                                                necessary coverages for your car.</p>
                                                            <p style="color: #585858;">Auto Excel Plus includes
                                                                coverages for
                                                                Own
                                                                Damage and Theft, Third Party Liability, Auto Passenger
                                                                Personal
                                                                Accident, and Medical Expense Reimbursement.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">Trip Sagip Road Assistance Program</p>
                                                            <p style="color: #585858;">Enjoy the benefits of a 24-hour
                                                                road
                                                                assistance service in times of unexpected critical
                                                                moments.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">Gawa Agad</p>
                                                            <p style="color: #585858;">Bring your car to the nearest
                                                                Gawa Agad
                                                                accredited shop in case of a claim and for immediate
                                                                repairs.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">
                                                                Acts of Nature</p>
                                                            <p style="color: #585858;">Your additional protection for
                                                                your car
                                                                including its accessories and spare parts against
                                                                natural
                                                                calamities.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">
                                                                Turbo Shield</p>
                                                            <p style="color: #585858;">Your additional protection for your car, ensuring complete confidence on the road.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 text-start">
                                                    <div class="row" style="padding: 10px 15px 10px 0px; background: #F2F2F2; width: inherit; margin: auto;">
                                                    <p style="font-size: 14px; color: #2D2727; font-weight:500;">Deductible ₱{{number_format($carInfo->deductible, 2)}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <button class="d-none" style="border: none; width: inherit; padding: 10px 0px;background: #008080;color: white;"
                                                        id="withAON" class="getPlan"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                            fill="currentColor" class="bi bi-arrow-right-short d-none"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" fill="#ffffff"
                                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                                        </svg> Get Plan</button>
                                                    <button
                                                        style="border: none;width: inherit;padding: 10px 0px;background: #E4509A;color: white;"
                                                        id="buttonWithAON" disabled>Plan
                                                        Selected</button>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <button type="button" class="view"
                                                        style="font-weight: 600; line-height: 24px; width: inherit; text-decoration: none; color: #008080; border: none; background:none;" id="view"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                            fill="currentColor" class="bi bi-arrow-right-short d-none"
                                                            viewBox="0 0 16 20">
                                                            <path fill-rule="evenodd" fill="#008080"
                                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                                        </svg> View All Benefits</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="top: 40%; right: 15%;z-index: 99;" id="right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                <path fill="#2E2E2ECC"
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                            </svg>
                        </div>
                        <div style="top: 40%; z-index: 99;left: -9%;" id="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path fill="#2E2E2ECC"
                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                            </svg>
                        </div>


                        <div class="slide">
                            <div class="col-lg-6 card-price" style="margin-top: 42px;" id="cardWithoutAONMarg">
                                <div class="card" style="border-radius: 10px; padding: 10px;" id="cardWithoutAON">
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 d-flex justify-content-between"
                                                    style="padding-left: 0;">
                                                    <p class="prem"
                                                        style="font-size: 25px;font-weight: 700;text-align: left; color:#2D2727;">
                                                        Premium
                                                        without Turbo Shield</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="28"
                                                        id="svgWithoutAON" fill="currentColor"
                                                        class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                                                        <path fill="#54B947"
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-12 mb-4"
                                                    style="border-bottom: 1px solid #D7DEE3; padding-left: 0;">
                                                    <p class="prem-price"
                                                        style="font-size: 23px;font-weight: bolder;text-align: left; color:#2D2727; padding-bottom: 15px;">
                                                        ₱{{number_format($carInfo->grossPrem, 2)}}</p>
                                                </div>
                                                @if($carInfo->promoCode)
                                                <div class="col-lg-12 mb-4"
                                                    style="padding: 10px 15px; background: #F6F6F6;">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p style="font-size: 14px;">Promo code: {{$carInfo->promoCode}}</p>
                                                        </div>
                                                        @if($carInfo->promoType === 'P')
                                                        <div class="col-4 text-end" style="color: #DD0707; font-size: 14px;">
                                                            -{{$carInfo->promoRate}}% / ₱{{number_format($carInfo->grossPrem * ($carInfo->promoRate / 100), 2 )}}</div>
                                                        @else 
                                                        <div class="col-4 text-end" style="color: #DD0707; font-size: 14px;">
                                                            -₱{{$carInfo->promoRate}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">Get all the
                                                                necessary coverages for your car.</p>
                                                            <p style="color: #585858;">Auto Excel Plus includes
                                                                coverages for
                                                                Own
                                                                Damage and Theft, Third Party Liability, Auto Passenger
                                                                Personal
                                                                Accident, and Medical Expense Reimbursement.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">Trip Sagip Road Assistance Program</p>
                                                            <p style="color: #585858;">Enjoy the benefits of a 24-hour
                                                                road
                                                                assistance service in times of unexpected critical
                                                                moments.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">Gawa Agad</p>
                                                            <p style="color: #585858;">Bring your car to the nearest
                                                                Gawa Agad
                                                                accredited shop in case of a claim and for immediate
                                                                repairs.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 p-0">
                                                    <div class="row">
                                                        <div class="col-2 p-0 text-center align-self-center"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="currentColor"
                                                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path fill="#E4509A"
                                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                                <path fill="#E4509A"
                                                                    d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                            </svg>
                                                        </div>
                                                        <div class="col-10 p-0">
                                                            <p style="color: #2D2727; font-weight: 600;">
                                                                Acts of Nature</p>
                                                            <p style="color: #585858;">Your additional protection for
                                                                your car
                                                                including its accessories and spare parts against
                                                                natural
                                                                calamities.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4 text-start" >
                                                    <div class="row" style="padding: 10px 15px 10px 0px; background: #F2F2F2; width: inherit; margin: auto;">
                                                    <p style="font-size: 14px; color: #2D2727; font-weight:500;">Deductible ₱{{number_format($carInfo->deductible, 2)}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <button type="button"
                                                    style="border: none; width: inherit; padding: 10px 0px;background: #008080;color: white;" id="withoutAON"
                                                        class="getPlan"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                            fill="currentColor" class="bi bi-arrow-right-short d-none"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" fill="#ffffff"
                                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                                        </svg> Get Plan</button>
                                                    <button class="d-none" id="buttonWithoutAON"
                                                        style="border: none;width: inherit;padding: 10px 0px;background: #E4509A;color: white;"
                                                        disabled>Plan
                                                        Selected</button>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <button type="button" class="view" style="font-weight: 600; line-height: 24px; text-decoration: none; width: inherit; border: none; background: none; color: #008080;" id="view"> <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                            fill="currentColor" class="bi bi-arrow-right-short d-none"
                                                            viewBox="0 0 16 20">
                                                            <path fill-rule="evenodd" fill="#008080"
                                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                                        </svg>
                                                         View All Benefits</button>
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
            <div class="col-12 price-card"
                style="background-color: #F7FCFF; padding-top: 0 !important; padding-bottom: 0 !important;">
                <div class="row">
                    <div class="col-12 mb-5 " style="background-color: #FFF4DA; padding: 20px 60px;">
                        <p style="color: #2D2727;">By continuing this request for quotation, you hereby confirm that you
                            are
                            aware and have fully
                            read Cocogen Insurance Inc.'s
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#privacyPolicy"
                                style="font-weight: bold; color:#2D2727;">Privacy Policy</a>,
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#terms"
                                style="font-weight: bold; color:#2D2727;">Terms and Conditions</a>,
                            and
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exclusion"
                                style="font-weight: bold; color:#2D2727;">Exclusions and
                                Limitations</a> of this product.</p>
                    </div>
                </div>

            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <div class="row bottom-buttons">
                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back"> 
                        <button class="btn-back rotatable" id="back">Back</button>
                    </div>
                    <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">
                        <button class="btn-continue" id="continue">
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>


<script>
    $(document).ready(function () {

        var slideW = $('#slider-container').width();
        $('#right').click(function (e) {
            e.preventDefault();
            $('#slider-container').animate({
                scrollLeft: "+=" + slideW
            }, 615);
            if ($('#slider-container').next() == 0) {
                $('#slider-container').first().animate({
                    scrollLeft: "+=" + slideW
                }, 615);
            }
        });

        $('#left').click(function (e) {
            e.preventDefault();
            $('#slider-container').animate({
                scrollLeft: "-=" + slideW
            }, 600);
            if ($('#slider-container').next() == 0) {
                $('#slider-container').first().animate({
                    scrollLeft: "+=" + slideW
                }, 600);
            }
        });

        // var num = '{{$carInfo->fmvValue}}';
        // var final = Math.abs(num) > 999 ? Math.sign(num) * ((Math.abs(num) / 1000).toFixed(1)) + 'k' : Math
        //     .sign(num) * Math.abs(num);

        $('#formatter').html('₱' + '{{number_format($carInfo->default_value, 2)}}');

        $('#continue').click(function (e) {
            e.preventDefault();
            $("#compreFormStep2").attr('action',
                "{{ url('/get-quote/auto-excel-plus/additional-car-information')}}");

            $("#compreFormStep2").submit();
        });

        $('#back').click(function (e) {
            e.preventDefault();
            $("#compreFormStep2").attr('action', "{{ url('/get-quote/auto-excel-plus/new/')}}" +
                '/{{$carInfo->transNo}}');

            $("#compreFormStep2").submit();
        });

        $('.view').click(function (e) {
            e.preventDefault();

            $("#compreFormStep2").attr('action', "{{ url('/get-quote/auto-excel-plus/plans')}}");

            $("#compreFormStep2").submit();
        });

        if ($('#aon').val() === 'yes') {
            $("#cardWithAON").addClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $("#continue").prop("disabled", false);
        } else if ($('#aon').val() === 'default') {
            $("#cardWithAON").removeClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $("#buttonWithAON").addClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $("#continue").prop("disabled", true);
        } else {
            $("#cardWithoutAON").addClass('active-aon');
            $("#cardWithAON").removeClass('active-aon');
            $('#withoutAON').addClass('d-none');
            $("#buttonWithoutAON").removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $("#continue").prop("disabled", false);
        }

        if('{{$transaction}}' === 'apply') {
            if ($('#aon').val() === 'yes') {
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                toastr.success(
                    'You have selected <b style="font-family: Inter;">Auto Excel Plus Premium with Turbo Shield</b> with a total amount of <b style="font-family: Inter;">₱{{number_format($carInfo->grossPremWithAOM)}}</b>',
                    'Premium with Turbo Shield Selected!', {
                        timeOut: 3000
                    })

                var $toastContainer = $('.toast-success');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
            } else if ($('#aon').val() === 'default') {

            } else {
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                toastr.success(
                    'You have selected <b style="font-family: Inter;">Auto Excel Plus Premium without Turbo Shield</b> with a total amount of <b style="font-family: Inter;">₱{{number_format($carInfo->grossPrem)}}</b>',
                    'Premium without Turbo Shield Selected!', {
                        timeOut: 3000
                    })

                var $toastContainer = $('.toast-success');
                if ($toastContainer.length > 1) {
                    $toastContainer.last().remove();
                }
            }
        } else {
            
        }

        $('#withAON').click(function (e) {
            e.preventDefault()
            $('#aon').val('yes')
            $("#cardWithAON").addClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $(this).addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $('#svgWithAON').attr("class", "").removeClass('d-none');
            $('#svgWithoutAON').attr("class", "d-none");
            $("#continue").prop("disabled", false);

            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            toastr.success(
                'You have selected <b style="font-family: Inter;">Auto Excel Plus Premium with Turbo Shield</b> with a total amount of <b style="font-family: Inter;">₱{{number_format(($carInfo->grossPremWithAOM), 2)}}</b>',
                'Premium with Turbo Shield Selected!', {
                    timeOut: 3000
                })

            var $toastContainer = $('.toast-success');
            if ($toastContainer.length > 1) {
                $toastContainer.last().remove();
            }
        });

        $('#withoutAON').click(function (e) {
            e.preventDefault()
            $('#aon').val('no');
            $("#cardWithoutAON").addClass('active-aon');
            $("#cardWithAON").removeClass('active-aon');
            $('#withoutAON').addClass('d-none');
            $("#buttonWithoutAON").removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $('#svgWithoutAON').attr("class", "").removeClass('d-none');
            $('#svgWithAON').attr("class", "d-none");
            $("#continue").prop("disabled", false);

            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            toastr.success(
                'You have selected <b style="font-family: Inter;">Auto Excel Plus Premium without Turbo Shield</b> with a total amount of <b style="font-family: Inter;">₱{{number_format($carInfo->grossPrem, 2)}}</b>',
                'Premium without Turbo Shield Selected!', {
                    timeOut: 3000
                })

            var $toastContainer = $('.toast-success');
            if ($toastContainer.length > 1) {
                $toastContainer.last().remove();
            }
        });
    });
</script>
@endsection