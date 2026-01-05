@extends('getaquote.new.domestic.index')
@section('domestic-section')
<style>
    .btn-minus:focus {
        box-shadow: 0 0 0 0.0 !important;
    }

    .btn-minus:focus>svg>path {
        stroke: #006666;
    }

    .btn-plus:focus {
        box-shadow: 0 0 0 0.0 !important;
    }

    .btn-plus:focus>svg>path {
        stroke: #006666;
    }

    input[type="range"] {
        padding: 0 !important;
    }

    .select-modal {
        width: 440px;
        background-color: #ffffff;
    }

    .label-modal {
        width: 440px;
        background-color: #ffffff;
    }

    .input-modal-div {
        margin-left: 150px;
    }

    @media (max-width: 991px) {
        .input-modal-div {
            margin-left: 0px !important;
        }
    }
</style>
<form method="post" action="{{ url('/get-quote/domestic-travel-plus/insurance-plan') }}" enctype="multipart/form-data"
    id="domesticFormStep1">
    {{method_field('GET')}}
    <section class="col-12">
        <div class="row">
            <div class="col-12 personal-div" style="">
                <p class="div-title text-center">Personal Data
                    <svg xmlns="http://www.w3.org/2000/svg" id="personalDataSuccess" class="d-none" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="personalDataDanger" class="d-none" width="56"
                        height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>

            </div>
            <div class="col-12 text-center personal-input-div">
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <input type="hidden" value="{{$trans_no}}" id="transNo" name="transNo">
                        <input type="hidden" value="firstPage" id="page" name="page">
                        <p class="text-start p-label">First Name<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter your first name" id="firstName" name="firstName"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Surname<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter your surname" style="background-color: #F5F5F5;"
                            id="lastName" name="lastName">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Suffix</p>
                        <input type="text" placeholder="Enter your suffix" style="background-color: #F5F5F5;"
                            id="suffix" name="suffix">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">Mobile<span class="text-danger">*</span></p>
                        <input type="number" placeholder="Enter your mobile" id="mobile" name="mobile"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Email Address<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter your email address" style="background-color: #F5F5F5;"
                            id="emailAddress" name="emailAddress">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Citizenship<span class="text-danger">*</span></p>
                        <select name="citizenship" id="citizenship" class="citizenship"
                            style="background-color: #F5F5F5;">
                            <option value="Filipino Citizen">Filipino Citizen</option>
                            <option value="Foreign Permanent Resident">Foreign Permanent Resident in the
                                Philippines with Alien Certificate of Registration</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12 total-guard">
                <p class="div-title text-center">Travel Details <svg xmlns="http://www.w3.org/2000/svg" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg></p>
            </div>
            <div class="col-12 text-center total-guard-desc">
                <p class="text-center div-sub-title">Choose one type of destination</p>
            </div>
            <div class="col-12 total-guard-buttons d-flex justify-content-center"
                style="padding: 25px 250px 55px 250px !important;">
                <input type="hidden" name="buttonDestinationValue" id="buttonDestinationValue" value="single">
                <button class="btn-total-guard active-button-guard" id="singleDestination">
                    <svg id="singleDestinationSvg" xmlns="http://www.w3.org/2000/svg" width="40" height="24"
                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Single Destination</button>
                <button class="btn-total-guard inactive-button-guard" id="multiDestination">
                    <svg id="multipleDestinationSvg" class="bi bi-check-circle-fill d-none"
                        xmlns="http://www.w3.org/2000/svg" width="40" height="24" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Multi-Destination</button>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12" style="background-color: #F7FCFF; height: 145px; padding: 35px 0px;">
                <p class="div-title text-center">Where in the Philippines are you going?
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" id="promoCodeSuccess" height="32" fill="#039855"
                        class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="promoCodeDanger" width="56" height="32"
                        fill="currentColor" class="bi bi-exclamation-circle-fill d-none" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>
            </div>
            <div class="col-12 accessories_inputs" style="background-color: #F7FCFF;">
                <div id="newinput" style="height: 225px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 mb-5 destination">
                            <p class="text-start destination-label">
                                Select Destination</p>

                            <select name="destination" id="destination" style="background-color: #F5F5F5;"
                                class="destination-select">
                                <option value="">Select Destination</option>
                                @foreach($locations as $location)
                                <option value="{{$location->province}}">{{$location->province}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 mb-4 destination-input">
                            <p class="text-start date-label">From<span class="text-danger">*</span></p>
                            <input type="date" id="from" name="from[]" class="destination-date"
                                style="background-color: #F5F5F5;">
                        </div>
                        <div class="col-lg-4 mb-4 text-start"
                            style="margin-top: 10px; width: 55px; padding: 0; margin-left: -15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill="#E4509A" fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg>
                        </div>
                        <div class="col-lg-4 mb-4 destination-input">
                            <p class="text-start date-label">
                                Until<span class="text-danger">*</span></p>
                            <input type="date" style="background-color: #F5F5F5;" class="destination-date" id="until"
                                name="until[]">
                        </div>
                        <div class="col-lg-12 mb-5 text-center">
                            <a href="javascript:void(0)" style="font-weight: bold;" id="addDestination"
                                class="addDestination d-none"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path stroke="#008080"
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path stroke="#008080"
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" style="font-weight: bold;" id="addDestination"
                                class="addDestination d-none"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path stroke="#DD0707"
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path stroke="#DD0707"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="newinput" style="height: 225px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 mb-5 destination">
                            <p class="text-start destination-label">
                                Select Destination</p>

                            <select name="destination" id="destination" style="background-color: #F5F5F5;"
                                class="destination-select">
                                <option value="">Select Destination</option>
                                @foreach($locations as $location)
                                <option value="{{$location->province}}">{{$location->province}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 mb-4 destination-input">
                            <p class="text-start date-label">From<span class="text-danger">*</span></p>
                            <input type="date" id="from" name="from[]" class="destination-date"
                                style="background-color: #F5F5F5;">
                        </div>
                        <div class="col-lg-4 mb-4 text-start"
                            style="margin-top: 10px; width: 55px; padding: 0; margin-left: -15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill="#E4509A" fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                            </svg>
                        </div>
                        <div class="col-lg-4 mb-4 destination-input">
                            <p class="text-start date-label">
                                Until<span class="text-danger">*</span></p>
                            <input type="date" style="background-color: #F5F5F5;" class="destination-date" id="until"
                                name="until[]">
                        </div>
                        <div class="col-lg-12 mb-5 text-center">
                            <a href="javascript:void(0)" style="font-weight: bold;" id="addDestination"
                                class="addDestination d-none"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path stroke="#008080"
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path stroke="#008080"
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" style="font-weight: bold;" id="addDestination"
                                class="addDestination d-none"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path stroke="#DD0707"
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path stroke="#DD0707"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12 total-guard">
                <p class="div-title text-center">Are you traveling via air or non-air? <svg
                        xmlns="http://www.w3.org/2000/svg" width="56" height="32" fill="#039855"
                        class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg></p>
            </div>
            <div class="col-12 total-guard-buttons d-flex justify-content-center">
                <input type="hidden" name="buttonTravelingValue" id="buttonTravelingValue" value="Air Plan">
                <button class="btn-total-guard active-button-guard" id="viaAir">
                    <svg id="noGuardSvg" xmlns="http://www.w3.org/2000/svg" width="40" height="24" fill="currentColor"
                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Air</button>
                <button class="btn-total-guard inactive-button-guard" id="viaNonAir">
                    <svg id="yesGuardSvg" class="bi bi-check-circle-fill d-none" xmlns="http://www.w3.org/2000/svg"
                        width="40" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Non-Air</button>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <p class="text-center mb-3" style="color:#848A90; font-size: 13px;"><svg
                        xmlns="http://www.w3.org/2000/svg" width="13" height="24" fill="currentColor"
                        class="bi bi-airplane-fill" viewBox="0 0 16 20">
                        <path fill="#848A90"
                            d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849" />
                    </svg>&nbsp;&nbsp;&nbsp;AIR: Travel via plane</p>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <p class="text-center mb-5" style="color:#848A90; font-size: 13px;"><svg
                        xmlns="http://www.w3.org/2000/svg" width="13" height="24" fill="currentColor"
                        class="bi bi-compass-fill" viewBox="0 0 16 20">
                        <path fill="#848A90"
                            d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.5 7.5 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                    </svg>&nbsp;&nbsp;&nbsp;NON-AIR: Travel via land or sea. Minimum of 125 km. away from usual place of
                    residence.
                    Verify distance via Google Maps</p>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12 total-guard">
                <p class="div-title text-center">Add COVID-19 Coverage? <svg xmlns="http://www.w3.org/2000/svg"
                        width="56" height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg></p>
            </div>
            <div class="col-12 total-guard-buttons d-flex justify-content-center">
                <input type="hidden" name="buttonCovidValue" id="buttonCovidValue" value="No">
                <button class="btn-total-guard active-button-guard" id="noCovid">
                    <svg id="noGuardSvg" xmlns="http://www.w3.org/2000/svg" width="40" height="24" fill="currentColor"
                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>No</button>
                <button class="btn-total-guard inactive-button-guard" id="yesCovid">
                    <svg id="yesGuardSvg" class="bi bi-check-circle-fill d-none" xmlns="http://www.w3.org/2000/svg"
                        width="40" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Yes</button>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <p class="text-center mb-5" style="color:#848A90; font-size: 16px; font-weight: 600;"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-info-circle" viewBox="0 0 16 20">
                        <path fill="#848A90" d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path fill="#848A90"
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>&nbsp;&nbsp;<span style="color: #008080;">COVID-19 Assist+</span> provides coverage for
                    medical expense and hospitalization, and transport<br /> and repatriation in case of illness for
                    international trips.</p>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12 total-guard">
                <p class="div-title text-center">Add Cruise Coverage? <svg xmlns="http://www.w3.org/2000/svg" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg></p>
            </div>
            <div class="col-12 total-guard-buttons d-flex justify-content-center">
                <input type="hidden" name="buttonCruiseValue" id="buttonCruiseValue" value="no">
                <button class="btn-total-guard active-button-guard" id="noCruise">
                    <svg id="noGuardSvg" xmlns="http://www.w3.org/2000/svg" width="40" height="24" fill="currentColor"
                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>No</button>
                <button class="btn-total-guard inactive-button-guard" id="yesCruise">
                    <svg id="yesGuardSvg" class="bi bi-check-circle-fill d-none" xmlns="http://www.w3.org/2000/svg"
                        width="40" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Yes</button>
            </div>
            <div class="col-12" style="background-color: #F7FCFF;">
                <p class="text-center mb-5" style="color:#848A90; font-size: 17px; font-weight: 600;"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-info-circle" viewBox="0 0 16 20">
                        <path fill="#848A90" d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path fill="#848A90"
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>&nbsp;&nbsp;<span style="color: #008080;">Cruise Surcharge</span> is an optional coverage for
                    international travel with benefits such as cruise cancellation,<br /> cruise curtailment, cruise
                    delay, and more.</p>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12" style="background-color: #F7FCFF; height: 103px; padding: 35px 0px;">
                <p class="div-title text-center">Promo Code
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" id="promoCodeSuccess" height="32" fill="#039855"
                        class="bi bi-check-circle-fill d-none" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="promoCodeDanger" width="56" height="32"
                        fill="currentColor" class="bi bi-exclamation-circle-fill d-none" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>
            </div>
            <div class="col-12" style="background-color: #F7FCFF; height: 156px;">
                <div class="row justify-content-center">
                    <div class="col-lg-4 promo-code">
                        <p class="text-start promo-label">
                            Enter Promo Code</p>
                        <input type="text" class="promo-input" placeholder="Enter your promo code" id="promoCode"
                            name="promoCode" style="background-color: #F5F5F5;">
                    </div>
                </div>
            </div>

            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <button class="btn-continue" id="continue"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" fill="#ffffff"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg> Continue</button>
            </div>
        </div>
    </section>
</form>

<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 modal-pad" style="padding: 30px 70px;">
                    <div class="row">
                        <div class="col-12 mb-5 text-center">
                            <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" alt="" width="250">
                        </div>
                        <div class="col-12 mb-4 text-center">
                            <p style="font-size: 16px; font-weight: 700; line-height: 24px;">Travel Excel Plus only
                                quotes clients who are
                                18 to 60 years old. <br />Before we proceed, please provide and confirm the following:
                            </p>
                        </div>
                        <div class="col-lg-12 mb-5 personal-input input-modal-div">
                            <p class="text-start p-label label-modal">
                                Citizenship<span class="text-danger">*</span></p>
                            <select name="citizenshipModal" id="citizenshipModal">
                                <option value="Filipino Citizen">Filipino Citizen</option>
                                <option value="Foreign Permanent Resident">Foreign Permanent Resident in the
                                    Philippines with Alien Certificate of Registration</option>
                            </select>
                        </div>
                        <div class="col-12 mb-4" style="padding: 0px 50px">
                            <div class="row">
                                <div class="col-2 text-right align-self-center align-self-lg-right"><input
                                        type="checkbox" class="form-check-input" name="checkboxConfirmation"
                                        id="checkboxConfirmation"></div>
                                <div class="col-10" style="padding: 0;">
                                    <p style="font-weight:500; font-size: 14px;" class="text-left">I hereby certify that
                                        this trip will be for leisure purposes only, and I am <br />over 18 years of age
                                        but not more than 60 years of age.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn-back" id="cancelConfirmation" style="background-color: white;"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" fill="#008080"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg> Cancel</button>
                            <button class="btn-continue disabled-button" id="confirm" disabled><svg
                                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" fill="#ffffff"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg> Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {



        $('option').each(function () {
            var optionText = this.text;
            var newOption = optionText.substring(0, 36);
            $(this).text(newOption + '...');
        });

        jQuery('#confirmation').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');

        $("#confirm").click(function (e) {
            e.preventDefault();
            var citizenship = $('#citizenshipModal').val();
            $('#citizenship').val(citizenship);
            jQuery('#confirmation').modal('hide');
        });

        $("#cancelConfirmation").click(function () {
            jQuery('#confirmation').modal('hide');
            window.location.href = "{{ url('/get-quote')}}"
        });

        $("#checkboxConfirmation").change(function () {
            if ($(this).is(":checked")) {
                $('#confirm').removeClass('disabled-button');
                $('#confirm').removeAttr("disabled");
            } else {
                $('#confirm').addClass('disabled-button');
                $('#confirm').addAttr("disabled");
            }
        });

        window.addEventListener('beforeunload', function (e) {
            var firstName = $("#firstName").val();
            var lastName = ("#lastName").val();
            var brand = $("#brand").val();
            var model = $("#model").val();
            var year = $("#year").val();
            var total = $("#quotationRange").val();

            if (firstName !== '' || lastName !== '' || total !== '') {
                e.preventDefault();
            }
        });

        $('#singleDestination').click(function (e) {
            e.preventDefault();
            $("#buttonDestinationValue").val('single');
            $("#singleDestination").removeClass('inactive-button-guard');
            $("#singleDestination").addClass('active-button-guard');
            $("#multiDestination").removeClass('active-button-guard');
            $("#multiDestination").addClass('inactive-button-guard');
            $('#singleDestination > svg').attr("class", "").removeClass('d-none');
            $('#multiDestination > svg').attr("class", "d-none");
            $(".addDestination").addClass('d-none');
        });

        $('#multiDestination').click(function (e) {
            e.preventDefault();
            $("#buttonDestinationValue").val('multiple');
            $("#multiDestination").removeClass('inactive-button-guard');
            $("#multiDestination").addClass('active-button-guard');
            $("#singleDestination").removeClass('active-button-guard');
            $("#singleDestination").addClass('inactive-button-guard');
            $('#multiDestination > svg').attr("class", "").removeClass('d-none');
            $('#singleDestination > svg').attr("class", "d-none");
            $(".addDestination").removeClass('d-none');
        });

        $('#viaAir').click(function (e) {
            e.preventDefault();
            $("#buttonTravelingValue").val('Air Plan');
            $("#viaAir").removeClass('inactive-button-guard');
            $("#viaAir").addClass('active-button-guard');
            $("#viaNonAir").removeClass('active-button-guard');
            $("#viaNonAir").addClass('inactive-button-guard');
            $('#viaAir > svg').attr("class", "").removeClass('d-none');
            $('#viaNonAir > svg').attr("class", "d-none");

        });

        $('#viaNonAir').click(function (e) {
            e.preventDefault();
            $("#buttonTravelingValue").val('Non-Air Plan');
            $("#viaNonAir").removeClass('inactive-button-guard');
            $("#viaNonAir").addClass('active-button-guard');
            $("#viaAir").removeClass('active-button-guard');
            $("#viaAir").addClass('inactive-button-guard');
            $('#viaNonAir > svg').attr("class", "").removeClass('d-none');
            $('#viaAir > svg').attr("class", "d-none");
        });

        $('#yesCovid').click(function (e) {
            e.preventDefault();
            $("#buttonCovidValue").val('Yes');
            $("#yesCovid").removeClass('inactive-button-guard');
            $("#yesCovid").addClass('active-button-guard');
            $("#noCovid").removeClass('active-button-guard');
            $("#noCovid").addClass('inactive-button-guard');
            $('#yesCovid > svg').attr("class", "").removeClass('d-none');
            $('#noCovid > svg').attr("class", "d-none");

        });

        $('#noCovid').click(function (e) {
            e.preventDefault();
            $("#buttonCovidValue").val('No');
            $("#noCovid").removeClass('inactive-button-guard');
            $("#noCovid").addClass('active-button-guard');
            $("#yesCovid").removeClass('active-button-guard');
            $("#yesCovid").addClass('inactive-button-guard');
            $('#noCovid > svg').attr("class", "").removeClass('d-none');
            $('#yesCovid > svg').attr("class", "d-none");
        });

        $('#yesCruise').click(function (e) {
            e.preventDefault();
            $("#buttonCruiseValue").val('Yes');
            $("#yesCruise").removeClass('inactive-button-guard');
            $("#yesCruise").addClass('active-button-guard');
            $("#noCruise").removeClass('active-button-guard');
            $("#noCruise").addClass('inactive-button-guard');
            $('#yesCruise > svg').attr("class", "").removeClass('d-none');
            $('#noCruise > svg').attr("class", "d-none");

        });

        $('#noCruise').click(function (e) {
            e.preventDefault();
            $("#buttonCruiseValue").val('No');
            $("#noCruise").removeClass('inactive-button-guard');
            $("#noCruise").addClass('active-button-guard');
            $("#yesCruise").removeClass('active-button-guard');
            $("#yesCruise").addClass('inactive-button-guard');
            $('#noCruise > svg').attr("class", "").removeClass('d-none');
            $('#yesCruise > svg').attr("class", "d-none");
        });

        $('#continue').click(function (e) {
            e.preventDefault();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var mobile = $("#mobile").val();
            var emailAddress = $("#emailAddress").val();
            var citizenship = $("#citizenship").val();

            if (firstName === '') {
                $("#firstName").addClass('danger');
                $("#firstName").prev().closest('p').css({
                    'background': '#FFF7F7'
                });
            }

            if (lastName === '') {
                $("#lastName").addClass('danger');
                $("#lastName").prev().closest('p').css({
                    'background': '#FFF7F7'
                });
            }

            if (mobile === '') {
                $("#mobile").addClass('danger');
                $("#mobile").prev().closest('p').css({
                    'background': '#FFF7F7'
                });
            }

            if (emailAddress === '') {
                $("#emailAddress").addClass('danger');
                $("#emailAddress").prev().closest('p').css({
                    'background': '#FFF7F7'
                });
            }

            if (citizenship === '') {
                $("#citizenship").addClass('danger');
                $("#citizenship").prev().closest('p').css({
                    'background': '#FFF7F7'
                });
            }

            // if (firstName !== '' && lastName !== '' && mobile !== '' && emailAddress !== '' && citizenship !== '') {
            // window.location.href = "{{ url('/get-quote/auto-excel-plus/car-information')}}"

            $("#domesticFormStep1").submit();
            // }
        });

        $("body").on("click", ".addDestination", function () {

            var colCount = $(".accessories_inputs").length;
            for (let i = 1; i < colCount; i++) {

                if (i !== 0) {
                    var accessory = $("#accessory" + i).val();
                    var accessory_value = $("#accessory_value" + i).val();

                    if (accessory === '' && accessory_value === '') {

                        $("#accessory" + i).addClass('danger');
                        $("#accessory" + i).prev().closest('p').css({
                            'background': '#FFF7F7'
                        });

                        $("#accessory_value" + i).addClass('danger');
                        $("#accessory_value" + i).prev().closest('p').css({
                            'background': '#FFF7F7'
                        });

                        return;
                    } else {
                        if (accessory === '') {
                            $("#accessory" + i).addClass('danger');
                            $("#accessory" + i).prev().closest('p').css({
                                'background': '#FFF7F7'
                            });
                            return;
                        } else if (accessory_value === '') {
                            $("#accessory_value" + i).addClass('danger');
                            $("#accessory_value" + i).prev().closest('p').css({
                                'background': '#FFF7F7'
                            });
                            return;
                        } else {
                            $("#accessory" + i).removeClass('danger');
                            $("#accessory" + i).css({
                                'background': '#F7FCFF'
                            });

                            $("#accessory" + i).prev().closest('p').css({
                                'background': '#F7FCFF'
                            });

                            $("#accessory_value" + i).removeClass('danger');
                            $("#accessory_value" + i).css({
                                'background': '#F7FCFF'
                            });

                            $("#accessory_value" + i).prev().closest('p').css({
                                'background': '#F7FCFF'
                            });
                        }
                    }

                    $("#accessory" + i).change(function () {
                        $("#accessory" + i).removeClass('danger');
                        $("#accessory" + i).css({
                            'background': '#F7FCFF'
                        });

                        $("#accessory" + i).prev().closest('p').css({
                            'background': '#F7FCFF'
                        });

                        $("#accessory_value" + i).removeClass('danger');
                        $("#accessory_value" + i).css({
                            'background': '#F7FCFF'
                        });

                        $("#accessory_value" + i).prev().closest('p').css({
                            'background': '#F7FCFF'
                        });
                    });

                    $("#accessory_value" + i).change(function () {
                        $("#accessory" + i).removeClass('danger');
                        $("#accessory" + i).css({
                            'background': '#F7FCFF'
                        });

                        $("#accessory" + i).prev().closest('p').css({
                            'background': '#F7FCFF'
                        });

                        $("#accessory_value" + i).removeClass('danger');
                        $("#accessory_value" + i).css({
                            'background': '#F7FCFF'
                        });

                        $("#accessory_value" + i).prev().closest('p').css({
                            'background': '#F7FCFF'
                        });
                    });

                } else {
                    var accessory = $("#accessory").val();
                    var accessory_value = $("#accessory_value").val();

                    if (accessory === '' && accessory_value === '') {

                        $("#accessory").addClass('danger');
                        $("#accessory").prev().closest('p').css({
                            'background': '#FFF7F7'
                        });

                        $("#accessory_value").addClass('danger');
                        $("#accessory_value").prev().closest('p').css({
                            'background': '#FFF7F7'
                        });

                        return;
                    } else {

                        if (accessory === '') {

                            $("#accessory").addClass('danger');
                            $("#accessory").prev().closest('p').css({
                                'background': '#FFF7F7'
                            });

                            return;
                        } else if (accessory_value === '') {

                            $("#accessory_value").addClass('danger');
                            $("#accessory_value").prev().closest('p').css({
                                'background': '#FFF7F7'
                            });
                            return;
                        } else {

                        }
                    }
                }
            }

            if (colCount > 0) {
                jQuery('.deleteItem').removeClass('d-none');
            } else {
                jQuery('.deleteItem').addClass('d-none');
            }

            var $div = $('.accessories_inputs').last()
                .clone()
                .appendTo('#newinput')
                .find("select, input").attr("id", function (i, oldVal) {
                    if (colCount !== 1) {
                        var newStr = oldVal.slice(0, -1);

                        return newStr + colCount;
                    } else {
                        return oldVal + colCount;
                    }
                }).val('');

            $(this).closest('.accessories_inputs').find('.addDestination').addClass('prev-add');
            $(this).closest('.accessories_inputs').removeClass('mb-5').addClass('mb-2');
            $('.accessories_inputs').last().find('#accessoryNumber').html(`Accessory ${colCount + 1}`);
        });

        $("body").on("click", ".deleteItem", function () {
            $(this).parents("#row").remove();

            var colCount = $("#newinput .accessories_inputs").length;

            if (colCount > 1) {
                jQuery('.deleteItem').removeClass('d-none');
            } else {
                jQuery('.deleteItem').addClass('d-none');
                jQuery(this).closest('.accessories_inputs').find("select").attr("id", "accessory");
                jQuery(this).closest('.accessories_inputs').find("input").attr("id", "accessory_value");
            }

            $('.accessories_inputs').last().find('.addDestination').removeClass('prev-add');
        });

        function addCommas(num) {
            var str = num.toString().split('.');
            if (str[0].length >= 4) {
                str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
            }
            return str.join('.');
        }

        $("#brand").change(function () {
            $('#model').val('');
            $('#year').val('');
            $('#total_value').val(0);
            $('#quotationRange').val(0);
            $('#addTotal').prop("disabled", true);
            $('#minusTotal').prop("disabled", true);
            $('#total_value').prop("disabled", true);
            $('#quotationRange').prop("disabled", true);
            $('#carModel').html('');
            if (jQuery(this).val() != '') {
                var brand = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/get-quote/auto-excel-plus/model')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        brand: brand
                    },
                    success: function (result) {
                        jQuery('#model').empty();
                        $('#model').append($('<option>', {
                            value: "",
                            text: "Select Model"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#model').append($('<option>', {
                                value: value.model,
                                text: value.model
                            }));
                        })
                    }
                })
            }
        });


        $('#model').change(function () {
            $('#carModel').html('');
            $('#total_value').val(0);
            $('#quotationRange').val(0);
            $('#year').val('');
            $('#addTotal').prop("disabled", true);
            $('#minusTotal').prop("disabled", true);
            $('#total_value').prop("disabled", true);
            $('#quotationRange').prop("disabled", true);
            if (jQuery(this).val() != '') {
                var brand = $('#brand').val();
                var model = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/get-quote/auto-excel-plus/year')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        model: model,
                        brand: brand,
                    },
                    success: function (result) {
                        jQuery('#year').empty();
                        $('#year').append($('<option>', {
                            value: "",
                            text: "Select Year"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#year').append($('<option>', {
                                value: value.year,
                                text: value.year
                            }));
                        })
                    }
                })
            }
        });

        $('#year').change(function () {
            $('#total_value').val(0);
            $('#quotationRange').val(0);
            if (jQuery(this).val() != '') {
                var brand = $('#brand').val();
                var model = $('#model').val();
                var year = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/get-quote/auto-excel-plus/car-value')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        year: year,
                        brand: brand,
                        model: model,
                    },
                    success: function (result) {

                        var brands = brand.split(" ");

                        var values = model.split(" ");

                        if (brands.length > 1) {

                            $('#carModel').html(`${values[0]} ${values[1]} ${values[2]}`);
                        } else {
                            $('#carModel').html(`${values[0]} ${values[1]}`);
                        }

                        var minval = (result * 0.9);
                        var maxval = (result * 1.1);

                        minval = minval.toFixed(2);
                        maxval = maxval.toFixed(2);

                        $('#quotationRange').attr({
                            'min': minval,
                            'max': maxval
                        });

                        $('#total_value').attr({
                            'min': minval,
                            'max': maxval
                        });

                        var total = $("#total_value").val(addCommas(minval));
                        $("#default_value").val(minval);

                        $('#addTotal').prop("disabled", false);
                        $('#minusTotal').prop("disabled", false);
                        $('#total_value').prop("disabled", false);
                        $('#quotationRange').prop("disabled", false);

                        $("#total_value").change(function () {
                            total = $("#total_value").val();

                            if (parseFloat(total) > parseFloat(max_val)) {
                                $("#total_value").val(addCommas(max_val));
                            } else if (parseFloat(total) < parseFloat(min_val)) {
                                $("#total_value").val(addCommas(min_val));
                            } else {

                            }

                            $("#quotationRange").val(total);
                            $("#total_value").removeClass('is-invalid');
                        });

                        $("#quotationRange").change(function () {
                            var total = $(this).val();
                            var final = parseFloat(total).toFixed(2);
                            $("#total_value").val(addCommas(final));
                            $("#total_value").removeClass('is-invalid');
                        });

                        $("#addTotal").click(function (e) {
                            e.preventDefault();
                            var total = $("#quotationRange").val();
                            if (parseFloat(total) < parseFloat(maxval)) {
                                total = parseFloat(total) + 1;
                                $("#quotationRange").val(total);
                                $("#total_value").val(addCommas(total.toFixed(2)));
                            }
                        });

                        $("#minusTotal").click(function (e) {
                            e.preventDefault();
                            var total = $("#quotationRange").val();
                            if (parseFloat(total) > parseFloat(minval)) {
                                total = parseFloat(total) - 1;
                                $("#quotationRange").val(total);
                                $("#total_value").val(addCommas(total.toFixed(2)));
                            }
                        });
                    }
                })
            }
        });

        $("#promoCode").change(function () {
            var promo = $(this).val();
            if (promo !== '') {
                jQuery.ajax({
                    url: "{{url('/get-quote/auto-excel-plus/checkPromo')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        promo: promo
                    },
                    success: function (result) {
                        if (jQuery.isEmptyObject(result)) {
                            $("#promoCode").addClass('danger');
                            $("#promoCode").prev().closest('p').css({
                                'background': '#FFF7F7'
                            });

                            $('#promoCodeDanger').attr("class", "").removeClass('d-none');
                            $('#promoCodeSuccess').attr("class", "d-none");
                        } else {
                            $('#promoCodeSuccess').attr("class", "").removeClass('d-none');
                            $('#promoCodeDanger').attr("class", "d-none");
                        }
                    }
                })
            }
        });
    });
</script>
@endsection