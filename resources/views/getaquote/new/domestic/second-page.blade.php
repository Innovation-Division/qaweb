@extends('getaquote.new.domestic.index')
@section('domestic-section')
<style>
    @media (max-width: 991px) {
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

        .car-details-summary {
            display: none !important;
        }

        .view {
            display: none !important;
        }
    }

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
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/additional-car-information')}}"
    enctype="multipart/form-data" id="compreFormStep2">
    {{method_field('GET')}}
    <section class="col-12">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Your Travel Insurance Quote</p>
            </div>
            <div class="col-12 personal-div car-details-summary"
                style="background-color: #EFF2F4; margin-bottom: 0px; padding: 30px 445px;">
                <div class="row text-center">
                    <div class="col custom-col" style="border-right: 1px solid #D7DEE3;">
                        <p class="car-details text-center mb-2">1</p>
                        <p class="car-sub-details text-center">Destination</p>
                    </div>
                    <div class="col custom-col" style="border-right: 1px solid #D7DEE3;">
                        <p class="car-details text-center mb-2" id="formatter"><svg width="22" height="22"
                                viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.49699 14.5392L5.47287 16.5271L7.46081 20.503L9.44875 18.5151V15.5332L12.9276 12.0543L15.9096 21L18.8915 18.0181L16.4065 8.57537L20.3824 4.59949C21.2059 3.77605 21.2059 2.44101 20.3824 1.61757C19.559 0.794142 18.2239 0.794142 17.4005 1.61757L13.4246 5.59346L3.98191 3.10853L1 6.09044L9.94573 9.07235L6.46684 12.5513H3.48493L1.49699 14.5392Z"
                                    fill="#2D2727" stroke="#2D2727" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </p>
                        <p class="car-sub-details text-center">Air Travel</p>
                    </div>
                    <div class="col custom-col" style="border-right: 1px solid #D7DEE3;">
                        <p class="car-details text-center mb-2" id="formatter"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#ffffff"
                                    d="M2.76753 5.33333L18.7681 20.9542M2.76753 5.33333C3.36285 4.65369 4.25202 4.22222 5.24544 4.22222H10.6545M2.76753 5.33333C2.28872 5.87996 2 6.58712 2 7.35948V18.8627C2 20.5954 3.45303 22 5.24544 22H17.1454C18.9378 22 20.3908 20.5954 20.3908 18.8627V14.1569M10.6545 14.1569L3.62272 20.9542M18.3218 5.55556V5.48872M22 5.47826C22 7.7971 18.3218 10.8889 18.3218 10.8889C18.3218 10.8889 14.6437 7.7971 14.6437 5.47826C14.6437 3.55727 16.2904 2 18.3218 2C20.3532 2 22 3.55727 22 5.47826Z"
                                    stroke="#2D2727" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </p>
                        <p class="car-sub-details text-center">Cebu</p>
                    </div>
                    <div class="col custom-col">
                        <p class="car-details text-center mb-2" id="formatter"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#ffffff"
                                    d="M7 17.8002V17.7143M12.625 17.8002V17.7143M12.625 13.1429V13.0569M17.625 13.1429V13.0569M3.25 8.57139H20.75M5.51191 2V3.71449M18.25 2V3.71428M18.25 3.71428H5.75C3.67893 3.71428 2 5.24929 2 7.14283V18.5714C2 20.465 3.67893 22 5.75 22H18.25C20.3211 22 22 20.465 22 18.5714L22 7.14283C22 5.24929 20.3211 3.71428 18.25 3.71428Z"
                                    stroke="#2D2727" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </p>
                        <p class="car-sub-details text-center">Aug 3-11, 2024</p>
                    </div>
                </div>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <div class="row price-card">
                    <div id="slider-container">
                        <div class="slide active">
                            <div class="col-lg-6 mb-4 card-price">
                                <input type="hidden" name="insurancePlan" id="insurancePlan" value="Pro">
                                <input type="hidden" name="page" id="page" value="quotation">
                                <input type="hidden" name="transNo" id="transNo" value="123">
                                <p
                                    style="background: #006666;padding: 10px 22px;width: 100px;color: white;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                    Popular</p>
                                <div class="card active-aon" id="cardWithAON"
                                    style=" padding: 10px; border-top-left-radius: 0px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 d-flex justify-content-between">
                                                    <p class="prem"
                                                        style="font-size: 20px;font-weight: 700;text-align: left; color:#2D2727;">
                                                        Pro</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                        id="svgWithAON" fill="currentColor"
                                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path fill="#54B947"
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <p class="prem-price"
                                                        style="font-size: 23px;font-weight: 700;text-align: left; color:#2D2727;">
                                                        P1,200.00</p>
                                                </div>
                                                <div class="col-lg-12 mb-4"
                                                    style="padding: 10px 25px; background: #F6F6F6;">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p>Promo code: DSBS2341SQs</p>
                                                        </div>
                                                        <div class="col-4 text-end" style="color: #DD0707;">
                                                            -₱100</div>
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
                                                            <p>Get all the necessary coverages for your car.</p>
                                                            <p style="color: #585858;">Auto Excel Plus includes
                                                                coverages fro
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
                                                            <p>Extended RoadPal Rescue</p>
                                                            <p style="color: #585858;">Enjoy the benefits of a 24-hour
                                                                road
                                                                assistance service in times of unexpected critical
                                                                moments</p>
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
                                                            <p>Gawa Agad</p>
                                                            <p style="color: #585858;">Bring your car to the nearest
                                                                Gawa Agad
                                                                accredited shop in case of a claim and for immediate
                                                                repairs</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-5 p-0">
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
                                                            <p>Acts of Nature</p>
                                                            <p style="color: #585858;">Your additional protection for
                                                                your car
                                                                including its accessories and spare parts against
                                                                natural
                                                                calamities
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <a href="javascript:void(0)" class="d-none"
                                                        style="font-weight: 600; line-height: 24px;" id="withAON">Get
                                                        Plan</a>
                                                    <button
                                                        style="border: none;width: inherit;padding: 10px 0px;background: #E4509A;color: white;"
                                                        id="buttonWithAON">Plan
                                                        Selected</button>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <a href="javascript:void(0)" class="view"
                                                        style="font-weight: 600; line-height: 24px;" id="view">View
                                                        All Benefits</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="top: 40%; right: 15%;z-index: 990;" id="right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                <path fill="#2E2E2ECC"
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                            </svg>
                        </div>
                        <div style="top: 40%; z-index: 99;left: 15%;" id="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path fill="#2E2E2ECC"
                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                            </svg>
                        </div>
                        <div class="slide">
                            <div class="col-lg-6 card-price" style="margin-top: 42px;">
                                <div class="card" style="border-radius: 10px; padding: 10px;" id="cardWithoutAON">
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-12 mb-3 d-flex justify-content-between">
                                                    <p class="prem"
                                                        style="font-size: 20px;font-weight: 700;text-align: left; color:#2D2727;">
                                                        Packet</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                                        id="svgWithoutAON" fill="currentColor"
                                                        class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                                                        <path fill="#54B947"
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <p class="prem-price"
                                                        style="font-size: 23px;font-weight: bolder;text-align: left; color:#2D2727;">
                                                        P900.10</p>
                                                </div>
                                                <div class="col-lg-12 mb-4"
                                                    style="padding: 10px 25px; background: #F6F6F6;">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p>Promo code: DSBS2341SQs</p>
                                                        </div>
                                                        <div class="col-4 text-end" style="color: #DD0707;">
                                                            -₱100</div>
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
                                                            <p>Get all the necessary coverages for your car.</p>
                                                            <p style="color: #585858;">Auto Excel Plus includes
                                                                coverages fro
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
                                                            <p>Extended RoadPal Rescue</p>
                                                            <p style="color: #585858;">Enjoy the benefits of a 24-hour
                                                                road
                                                                assistance service in times of unexpected critical
                                                                moments</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-5 p-0">
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
                                                            <p>Gawa Agad</p>
                                                            <p style="color: #585858;">Bring your car to the nearest
                                                                Gawa Agad
                                                                accredited shop in case of a claim and for immediate
                                                                repairs</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <a href="javascript:void(0)"
                                                        style="font-weight: 600; line-height: 24px;" id="withoutAON">Get
                                                        Plan</a>
                                                    <button class="d-none" id="buttonWithoutAON"
                                                        style="border: none;width: inherit;padding: 10px 0px;background: #E4509A;color: white;">Plan
                                                        Selected</button>
                                                </div>
                                                <div class="col-lg-12 text-center mb-4">
                                                    <a href="javascript:void(0)" class="view"
                                                        style="font-weight: 600; line-height: 24px;" id="view">View
                                                        All Benefits</a>
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
                                Limitations</a> of this product</p>
                    </div>
                </div>

            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <button class="btn-back" id="back"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" fill="#008080"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg> Back</button>
                <button class="btn-continue" id="continue"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" fill="#ffffff"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg> Continue</button>
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

        // $('#continue').click(function (e) {
        //     $("#compreFormStep2").attr('action',
        //         "{{ url('/get-quote/auto-excel-plus/additional-car-information')}}");

        //     $("#compreFormStep2").submit();
        // });

        $('#back').click(function (e) {

            $("#compreFormStep2").attr('action', "{{ url('/get-quote/domestic-travel-plus/new/')}}");

            $("#compreFormStep2").submit();
        });

        $('.view').click(function (e) {

            $("#compreFormStep2").attr('action', "{{ url('/get-quote/domestic-travel-plus/plans')}}");

            $("#compreFormStep2").submit();
        });

        if ($('#insurancePlan').val() === 'Pro') {
            $("#cardWithAON").addClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $(this).addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
        } else {
            $("#cardWithoutAON").addClass('active-aon');
            $("#cardWithAON").removeClass('active-aon');
            $('#withoutAON').addClass('d-none');
            $("#buttonWithoutAON").removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
        }

        $('#withAON').click(function (e) {
            $('#insurancePlan').val('Pro');
            $("#cardWithAON").addClass('active-aon');
            $("#cardWithoutAON").removeClass('active-aon');
            $(this).addClass('d-none');
            $("#buttonWithAON").removeClass('d-none');
            $('#withoutAON').removeClass('d-none');
            $("#buttonWithoutAON").addClass('d-none');
            $('#svgWithAON').attr("class", "").removeClass('d-none');
            $('#svgWithoutAON').attr("class", "d-none");
        });

        $('#withoutAON').click(function (e) {
            $('#insurancePlan').val('Packet');
            $("#cardWithoutAON").addClass('active-aon');
            $("#cardWithAON").removeClass('active-aon');
            $('#withoutAON').addClass('d-none');
            $("#buttonWithoutAON").removeClass('d-none');
            $('#withAON').removeClass('d-none');
            $("#buttonWithAON").addClass('d-none');
            $('#svgWithoutAON').attr("class", "").removeClass('d-none');
            $('#svgWithAON').attr("class", "d-none");
        });
    });
</script>
@endsection