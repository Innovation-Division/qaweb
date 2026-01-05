@extends('getaquote.new.compre.index')
@section('compre-section')
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

    #messageCantFind:focus {
        background: #F7FCFF !important;
    }

    #messageCantFind {
        border-bottom: 1px solid #008080 !important;
    }

    .cant-find-car-p {
            font-size: 16px;
            font-weight: 600;
            line-height: 24px;
            padding: 0px 100px;
        }

        .bottom-text-p-div {
            background: #FBFBFB; 
            padding: 5px 50px;
        }

    @media (max-width: 991px) { 
        .sub-text-confirmation {
            padding: 0px 20px !important;
        }

        .sub-text-p {
            font-size: 13px;
        }

        .bottom-text-p {
            color: #585858; 
            font-size: 11px;
        }

        .confirmation-div {
            order: 1;
        }

        .cancelConfirmation-div {
            order: 2;
        }

        #cancelConfirmation {
            padding: 10px 130px !important;
            font-size: 12px;
            font-weight: 500;
        }

        #confirm {
            padding: 10px 130px !important;
            margin-bottom: 10px;
            font-size: 12px;
            font-weight: 500;
        }

        .modal-content {
            box-shadow: none !important;
            border-radius: 8px !important;
        }

        .cant-find-car-p {
            padding: 0px !important;
        }

        .bottom-text-p-div {
            padding: 5px 33px !important;
        }
    }
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/car-information') }}" enctype="multipart/form-data"
    id="compreFormStep1" autocomplete="off">
    {{method_field('GET')}}
    <section class="col-12" id="firstDiv">
        <div class="row">
            <div class="col-12 personal-div">
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
                    <div class="col-lg-4 mb-4 personal-input">
                        <input type="hidden" value="{{$trans_no}}" id="transNo" name="transNo">
                        <input type="hidden" value="firstPage" id="page" name="page">
                        <p class="text-start p-label">First Name<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Juan" maxlength="50" id="firstName" name="firstName"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-4 personal-input">
                        <p class="text-start p-label">
                            Surname<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Dela Cruz" maxlength="50" style="background-color: #F5F5F5;" id="lastName"
                            name="lastName">
                    </div>
                    <div class="col-lg-4 mb-4 personal-input">
                        <p class="text-start p-label">
                            Suffix<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="suffix" id="suffix">
                            <button class="btn dropdown-toggle" id="myFunction" type="button" data-toggle="dropdown">
                                <p class="p-dropdown-select">Select Suffix</p>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                <li><a href="javascript:void(0)" class="dropdown-select">N/A</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-select">Jr</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-select">Sr</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-select">I</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-select">II</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-select">III</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-select">IV</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Contact Number<span class="text-danger">*</span></p>
                        <input type="text" placeholder="09123456789" maxlength="11" id="contactNumber"
                            name="contactNumber" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Email Address<span class="text-danger">*</span></p>
                        <input type="text" placeholder="juandelacruz@gmail.com" maxlength="50" id="emailAddress"
                            name="emailAddress" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input customize-none">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12" id="secondDiv">
        <div class="row">
            <div class="col-12 car-information-div">
                <p class="div-title text-center">Car Information
                    <svg xmlns="http://www.w3.org/2000/svg" id="carInformationSuccess" class="d-none" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="carInformationDanger" class="d-none" width="56"
                        height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg></p>
            </div>
            <div class="col-12 text-center car-information-input">
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-4 car-input">
                        <p class="text-start p-label">
                            Brand<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="brand" id="brand">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                <p class="p-dropdown-select">Select Brand</p>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                @foreach($brands as $brand)
                                <li><a href="javascript:void(0)" value="{{$brand->brand}}"
                                        class="dropdown-select">{{$brand->brand}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 car-input">
                        <p class="text-start p-label">
                            Model<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="model" id="model">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                <p class="p-dropdown-select">Select Model</p>
                            </button>
                            <ul class="dropdown-menu" id="modelOption">
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 car-input">
                        <p class="text-start p-label">
                            Year<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="year" id="year">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                <p class="p-dropdown-select">Select Year</p>
                            </button>
                            <ul class="dropdown-menu" id="yearOption">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center car-cant">
                <button class="btn-back" type="button"  id="cantFindModal"> I can't find my car</button>
            </div>
        </div>
    </section>
    <section class="col-12" style="background-color: #F7FCFF">
        <div class="row">
            <div class="col-12 value-div">
                <p class="text-center div-sub-title">Value of Car</p>
            </div>
            <div class="col-12 text-center">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <p class="mb-4"
                            style="color: #09A12A; font-size: 16px; line-height: 24px; font-weight: 700; margin-left: 30px;"
                            class="text-center" id="carModel">
                        </p>
                        <div class="col-12">
                            <input type="range" name="quotationRange" id="quotationRange" class="text-center mb-4 ms-6" disabled>
                        </div>
                        
                        <div class="row value-row">
                            <div class="col-lg-12" style="padding: 0px;">
                                <div class="row ">
                                    <div class="col-2" style="padding: 0px;">
                                        <button class="btn btn-minus" type="button" id="minusTotal" disabled style="background: none !important;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                                <path stroke="#008080"
                                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                <path stroke="#008080"
                                                    d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-8" style="padding: 0px;">
                                        <input type="text" class="form-control text-center" name="total_value" id="total_value" value="0"
                                            style="background-color: #F7FCFF; width: 100% !important; font-size: 16px; font-weight: 500;" disabled>
                                        <input type="hidden" id="default_value" name="default_value" value="0">
                                    </div>
                                    <div class="col-2" style="padding: 0px;">
                                        <button class="btn btn-plus" type="button" id="addTotal" disabled style="background: none !important;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                <path stroke="#008080"
                                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                <path stroke="#008080"
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- <div class="input-group">
                                <div class="input-group-btn" style="width: 75px;">
                                    
                                </div>
                              
                                <div class="input-group-btn">
                                  
                                </div>
                            </div> -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12" style="background-color: #F7FCFF" id="thirdDiv">
        <div class="row">
            <div class="col-12 text-center insurance-coverage">
                <p class="text-center div-sub-title">Select Insurance Coverage</p>
            </div>
            <div class="col-12 mb-5 text-center insurance-coverage-input" id="row" style="height: 0px !important;">
                <div class="row justify-content-center">
                    <div class="col-lg-5 mb-4 non-input">
                        <p class="text-start p-label">
                            Bodily Injury<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="bi" id="bi">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                <p class="p-dropdown-select">Select Bodily Injury</p>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                @foreach($cocogen_compre_bipds as $bi)
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select d-none">{{number_format($bi->amount, 2)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 non-input">
                        <p class="text-start p-label">
                            Property Damage<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="pd" id="pd">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                <p class="p-dropdown-select">Select Property Damage</p>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                @foreach($cocogen_compre_bipds as $pd)
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select d-none">{{number_format($pd->amount, 2)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12" style="background-color: #F7FCFF">
        <div class="row">
            <div class="col-12 standard-div mb-5">
                <p class="text-center div-sub-title" class>Standard Accessories</p>
            </div>
            <div class="col-12 text-center standard-div-list">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-6 mb-5">
                        <div
                            style="border-radius: 50px; background-color: #EFF2F4; padding: 15px; width: 74px; height: 75.83px; display: inline-block;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-radio">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path stroke="#003592" fill="#EFF2F4"
                                    d="M14 3l-9.371 3.749a1 1 0 0 0 -.629 .928v11.323a1 1 0 0 0 1 1h14a1 1 0 0 0 1 -1v-11a1 1 0 0 0 -1 -1h-14.5" />
                                <path stroke="#003592" d="M4 12h16" />
                                <path stroke="#003592" d="M7 12v-2" />
                                <path stroke="#003592" d="M17 16v.01" />
                                <path stroke="#003592" d="M13 16v.01" />
                            </svg>
                        </div>
                        <p>Built-in Stereo</p>
                    </div>
                    <div class="col-lg-3 col-6 mb-5">
                        <div
                            style="border-radius: 50px; background-color: #EFF2F4; padding: 15px; width: 74px; height: 75.83px; display: inline-block;">
                            <svg width="50" height="42" viewBox="0 0 56 50" fill="#EFF2F4" xmlns="http://www.w3.org/2000/svg">
<path d="M45.9687 11.1992C50.2709 11.1992 53.7583 14.0825 53.7583 17.6392C53.7583 21.1959 50.2709 24.0792 45.9687 24.0792H2.23828" stroke="#003592" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="#EFF2F4" />
<path d="M44.6437 47.9993C47.8774 47.9993 51.9183 46.5273 51.9183 40.6393C51.9183 34.7513 47.8774 33.2793 44.6437 33.2793H2.23828" stroke="#003592" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="#EFF2F4"/>
<path d="M24.0586 2C28.2668 2 31.6783 5.29519 31.6783 9.36C31.6783 13.4248 28.2668 16.72 24.0586 16.72H2.23828" stroke="#003592" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="#EFF2F4"/>
</svg>

                        </div>

                        <p style="margin: 0;">Built-in Aircon</p>
                    </div>
                    <div class="col-lg-3 col-6 mb-5">
                        <div
                            style="border-radius: 50px; background-color: #EFF2F4; padding: 15px; width: 74px; height: 75.83px; display: inline-block;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-steering-wheel">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path stroke="#003592" fill="#EFF2F4" d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path stroke="#003592" fill="#EFF2F4" d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path stroke="#003592" d="M12 14l0 7" />
                                <path stroke="#003592" d="M10 12l-6.75 -2" />
                                <path stroke="#003592" d="M14 12l6.75 -2" />
                            </svg>
                        </div>

                        <p style="margin: 0;">5 Pieces Magwheels</p>
                    </div>
                    <div class="col-lg-3 col-6 mb-5">
                        <div
                            style="border-radius: 50px; background-color: #EFF2F4; padding: 15px; width: 74px; height: 75.83px; display: inline-block;">
                            <svg width="41" height="50" viewBox="0 0 41 50" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#EFF2F4" d="M34.75 2H6.25C3.62665 2 1.5 4.05949 1.5 6.6V43.4C1.5 45.9405 3.62665 48 6.25 48H34.75C37.3734 48 39.5 45.9405 39.5 43.4V6.6C39.5 4.05949 37.3734 2 34.75 2Z" stroke="#003592" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill="#EFF2F4" d="M20.5 38C25.4706 38 29.5 33.9706 29.5 29C29.5 24.0294 25.4706 20 20.5 20C15.5294 20 11.5 24.0294 11.5 29C11.5 33.9706 15.5294 38 20.5 38Z" stroke="#003592" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p style="margin: 0;">Built-in Speaker</p>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center standard-alert">
                <div class="row standard-alert-row">
                    <div class="col-1" style="padding: 0;"><svg width="18" height="22" viewBox="0 0 18 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5001 20.75C13.5001 20.9489 13.4211 21.1396 13.2805 21.2803C13.1398 21.4209 12.949 21.5 12.7501 21.5H5.25012C5.05121 21.5 4.86045 21.4209 4.71979 21.2803C4.57914 21.1396 4.50012 20.9489 4.50012 20.75C4.50012 20.551 4.57914 20.3603 4.71979 20.2196C4.86045 20.079 5.05121 20 5.25012 20H12.7501C12.949 20 13.1398 20.079 13.2805 20.2196C13.4211 20.3603 13.5001 20.551 13.5001 20.75ZM17.2501 8.74995C17.2534 10.0002 16.9709 11.2347 16.4243 12.3592C15.8778 13.4837 15.0815 14.4685 14.0964 15.2384C13.9122 15.3796 13.7627 15.561 13.6593 15.7688C13.556 15.9767 13.5015 16.2054 13.5001 16.4375V17C13.5001 17.3978 13.3421 17.7793 13.0608 18.0606C12.7795 18.3419 12.3979 18.5 12.0001 18.5H6.00012C5.6023 18.5 5.22077 18.3419 4.93946 18.0606C4.65816 17.7793 4.50012 17.3978 4.50012 17V16.4375C4.49997 16.2081 4.44724 15.9819 4.34599 15.7762C4.24474 15.5704 4.09766 15.3906 3.91606 15.2506C2.93337 14.4852 2.13767 13.5064 1.58916 12.3881C1.04066 11.2698 0.753744 10.0414 0.750123 8.79589C0.725748 4.32777 4.337 0.606828 8.80137 0.499953C9.90139 0.473445 10.9956 0.667253 12.0196 1.06997C13.0436 1.47269 13.9767 2.07617 14.7639 2.84491C15.5512 3.61365 16.1767 4.53211 16.6037 5.54622C17.0306 6.56034 17.2504 7.64962 17.2501 8.74995ZM14.2398 7.87433C14.0453 6.78804 13.5227 5.78742 12.7423 5.00717C11.9619 4.22692 10.9611 3.70451 9.87481 3.51027C9.77767 3.49389 9.67826 3.49681 9.58225 3.51886C9.48624 3.5409 9.39552 3.58164 9.31525 3.63875C9.23499 3.69586 9.16676 3.76821 9.11446 3.85169C9.06216 3.93517 9.02681 4.02813 9.01044 4.12527C8.99406 4.2224 8.99698 4.32181 9.01902 4.41782C9.04107 4.51383 9.08181 4.60456 9.13892 4.68482C9.19602 4.76509 9.26838 4.83332 9.35186 4.88562C9.43534 4.93792 9.5283 4.97327 9.62543 4.98964C11.1789 5.2512 12.497 6.56933 12.7604 8.12558C12.7901 8.30026 12.8807 8.45879 13.0161 8.57307C13.1515 8.68736 13.3229 8.75002 13.5001 8.74995C13.5425 8.7497 13.5848 8.74625 13.6267 8.73964C13.8227 8.70617 13.9974 8.59621 14.1124 8.43394C14.2274 8.27167 14.2732 8.07038 14.2398 7.87433Z"
                                fill="#54B947" />
                        </svg></div>
                    <div class="col-11" style="padding: 0;">
                        <p style="margin: 0; text-align: start;"> Standard accessories are automatically covered by Auto
                            Excel Plus
                            Insurance
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="col-12" style="background-color: #F7FCFF">
        <div class="row">
            <div class="col-12 text-center non-standard">
                <p class="text-center div-sub-title mb-3">Non-Standard Accessories</p>
                <p style="color: #585858;">All non-standard or non-factory fitted accessories must be declared to be
                    covered.</p>
            </div>
            <div id="newinput">
                <div class="col-12 mb-5 text-center non-standard-input accessories_inputs" id="row"
                    style="height: 0px !important;">
                    <div class="row justify-content-center">
                        <div class="col-12 non-input accessory-number">
                            <div class="row">
                                <div class="col-6 text-start">
                                    <p style="font-size: 14px;" id="accessoryNumber">Accessory 1</p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="javascript:void(0)" class="d-none deleteItem"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                            <path stroke="#DD0707"
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path stroke="#DD0707"
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3 non-input">
                            <p class="text-start p-label">
                                Accessories</p>

                            <div class="dropdown dropdown-customize">
                                <input type="hidden" name="accessory[]" id="accessory">
                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                    <p class="p-dropdown-select">Select Accessories</p>
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="input-icons" style="padding: 5px 15px;">
                                        <i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                        <input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput"
                                            style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                    </div>
                                    @foreach($accessories as $accessory)
                                    <li><a href="javascript:void(0)" class="dropdown-select">{{$accessory->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-3 non-input">
                            <p class="text-start p-label">
                                Amount</p><input name="accessory_value[]"
                                id="accessory_value" type="text" class="accessory_value" placeholder="Enter your amount"
                                style="background-color: #F5F5F5;">
                        </div>
                        <div class="col-lg-1 mb-3 text-center align-self-end deleteItem d-none delete-lg"
                            style="padding: 0; margin-right: -20px;">
                            <a href="javascript:void(0)" style="margin-right: 10px;"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-x-square" viewBox="0 0 16 16">
                                    <path stroke="#DD0707"
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path stroke="#DD0707"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg></a>

                        </div>
                        <div class="col-lg-1 pb-5 text-center align-self-end addLinkAccessories">
                            <a href="javascript:void(0)" class="addItem" id="addItem">Add Accessory</a>
                        </div>
                        <div class="col-lg-1 mb-3 text-left align-self-end addButtonAccessories">
                            <a href="javascript:void(0)" class="addItem" id="addItem"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path stroke="#008080"
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path stroke="#008080"
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12" id="fourthDiv">
        <div class="row">
            <div class="col-12 total-guard">
                <p class="div-title text-center">Turbo Shield 
                    <svg xmlns="http://www.w3.org/2000/svg" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill d-none" id="totalGuardSuccess" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="totalGuardDanger" width="56"
                        height="32" fill="currentColor" class="bi bi-exclamation-circle-fill d-none" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>
            </div>
            <div class="col-12 text-center total-guard-desc">
                <p style="color: #848A90;" class="mb-4">
                    <svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.25C8.07164 0.25 6.18657 0.821828 4.58319 1.89317C2.97982 2.96451 1.73013 4.48726 0.992179 6.26884C0.254225 8.05042 0.061142 10.0108 0.437348 11.9021C0.813554 13.7934 1.74215 15.5307 3.10571 16.8943C4.46928 18.2579 6.20656 19.1865 8.09787 19.5627C9.98919 19.9389 11.9496 19.7458 13.7312 19.0078C15.5127 18.2699 17.0355 17.0202 18.1068 15.4168C19.1782 13.8134 19.75 11.9284 19.75 10C19.7473 7.41498 18.7192 4.93661 16.8913 3.10872C15.0634 1.28084 12.585 0.25273 10 0.25ZM10 18.25C8.36831 18.25 6.77326 17.7661 5.41655 16.8596C4.05984 15.9531 3.00242 14.6646 2.378 13.1571C1.75358 11.6496 1.5902 9.99085 1.90853 8.3905C2.22685 6.79016 3.01259 5.32015 4.16637 4.16637C5.32016 3.01259 6.79017 2.22685 8.39051 1.90852C9.99085 1.59019 11.6497 1.75357 13.1571 2.37799C14.6646 3.00242 15.9531 4.05984 16.8596 5.41655C17.7661 6.77325 18.25 8.3683 18.25 10C18.2475 12.1873 17.3775 14.2843 15.8309 15.8309C14.2843 17.3775 12.1873 18.2475 10 18.25ZM11.5 14.5C11.5 14.6989 11.421 14.8897 11.2803 15.0303C11.1397 15.171 10.9489 15.25 10.75 15.25C10.3522 15.25 9.97065 15.092 9.68934 14.8107C9.40804 14.5294 9.25 14.1478 9.25 13.75V10C9.05109 10 8.86033 9.92098 8.71967 9.78033C8.57902 9.63968 8.5 9.44891 8.5 9.25C8.5 9.05109 8.57902 8.86032 8.71967 8.71967C8.86033 8.57902 9.05109 8.5 9.25 8.5C9.64783 8.5 10.0294 8.65804 10.3107 8.93934C10.592 9.22064 10.75 9.60218 10.75 10V13.75C10.9489 13.75 11.1397 13.829 11.2803 13.9697C11.421 14.1103 11.5 14.3011 11.5 14.5ZM8.5 5.875C8.5 5.6525 8.56598 5.43499 8.6896 5.24998C8.81322 5.06498 8.98892 4.92078 9.19449 4.83564C9.40005 4.75049 9.62625 4.72821 9.84448 4.77162C10.0627 4.81502 10.2632 4.92217 10.4205 5.0795C10.5778 5.23684 10.685 5.43729 10.7284 5.65552C10.7718 5.87375 10.7495 6.09995 10.6644 6.30552C10.5792 6.51109 10.435 6.68679 10.25 6.8104C10.065 6.93402 9.84751 7 9.625 7C9.32664 7 9.04049 6.88147 8.82951 6.6705C8.61853 6.45952 8.5 6.17337 8.5 5.875Z" fill="#848A90"/>
                    </svg>
                 Add extra protection against <span style="color:#008080; font-weight: 700;">Road Rage, Missed Key, Misfuelling</span> with Turbo Shield. <span style="font-weight:700; color: #505558;"><br>Get it for as low Php 1,250. Price is exclusive of taxes.</span>
                </p>
                <p style="color: #848A90;" class="mb-4">Learn more about <a href="javascript:void(0)" id="turboShield" style="font-weight: 700; text-decoration: underline !important; text-underline-offset: 5px;">TURBO SHIELD</a></p>
            </div>
            <div class="col-12 total-guard-buttons d-flex justify-content-center">
                <input type="hidden" name="buttonGuardValue" id="buttonGuardValue" value="default">
                <button class="btn-total-guard inactive-button-guard" id="noGuard">
                    <svg id="noGuardSvg" xmlns="http://www.w3.org/2000/svg" width="40" height="18" fill="currentColor"
                        class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>No, do not add <span class="total-guard-title">Turbo Shield</span></button>
                <button class="btn-total-guard inactive-button-guard" id="yesGuard">
                    <svg id="yesGuardSvg" class="bi bi-check-circle-fill d-none" xmlns="http://www.w3.org/2000/svg"
                        width="40" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Yes, add <span class="total-guard-title">Turbo Shield</span></button>
            </div>
        </div>
    </section>
    <section class="col-12">
        <div class="row">
            <div class="col-12" style="background-color: #F7FCFF; height: 103px; padding: 35px 0px;">
                <p class="div-title text-center">Do you have promo code?
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
            <div class="col-12 promo-code-buttons d-flex justify-content-center">
                <input type="hidden" name="buttonPromoValue" id="buttonPromoValue" value="default">
                <button class="btn-total-guard inactive-button-guard " id="noPromo">
                    <svg id="noGuardSvg" xmlns="http://www.w3.org/2000/svg" width="40" height="18" fill="currentColor"
                        class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>No</button>
                <button class="btn-total-guard inactive-button-guard" id="yesPromo">
                    <svg id="yesGuardSvg" class="bi bi-check-circle-fill d-none" xmlns="http://www.w3.org/2000/svg"
                        width="40" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>Yes</button>
            </div>
            <div class="col-12  d-none" id="promoCodeYes" style="background-color: #F7FCFF;">
                <div class="row mb-5">
                    <div class="col-12 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 promo-code">


                                <p class="text-start promo-label">
                                    Enter Promo Code<span class="text-danger">*</span></p>
                                <!-- <input type="text" class="promo-input" placeholder="Enter your promo code"
                                    id="promoCode" name="promoCode" style="background-color: #F5F5F5;"> -->
                                <div class="input-icons">
                                    <i class="fa fa-check-circle icon d-none" id="promoIconsSuccess"
                                        style=" padding: 15px 15px 15px 10px; min-width: 40px;"></i>
                                    <input class="input-field" type="text" maxlength="50" id="promoCode" name="promoCode"
                                        style="background-color: #F5F5F5;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5 text-center standard-alert d-none" id="promoAlert">
                        <div class="row promo-alert-row">
                            <div class="col-1" style="padding: 0;"><svg width="26" height="26" viewBox="0 0 26 26"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="#DD0707" />
                                    <path
                                        d="M13 4.875C11.393 4.875 9.82214 5.35152 8.486 6.24431C7.14985 7.1371 6.10844 8.40605 5.49348 9.8907C4.87852 11.3753 4.71762 13.009 5.03112 14.5851C5.34463 16.1612 6.11846 17.6089 7.25476 18.7452C8.39106 19.8815 9.8388 20.6554 11.4149 20.9689C12.991 21.2824 14.6247 21.1215 16.1093 20.5065C17.594 19.8916 18.8629 18.8502 19.7557 17.514C20.6485 16.1779 21.125 14.607 21.125 13C21.1227 10.8458 20.266 8.78051 18.7427 7.25727C17.2195 5.73403 15.1542 4.87727 13 4.875ZM13 19.875C11.6403 19.875 10.311 19.4718 9.18046 18.7164C8.04987 17.9609 7.16868 16.8872 6.64833 15.6309C6.12798 14.3747 5.99183 12.9924 6.2571 11.6588C6.52238 10.3251 7.17716 9.10013 8.13864 8.13864C9.10013 7.17716 10.3251 6.52237 11.6588 6.2571C12.9924 5.99183 14.3747 6.12798 15.631 6.64833C16.8872 7.16868 17.9609 8.04987 18.7164 9.18045C19.4718 10.311 19.875 11.6403 19.875 13C19.8729 14.8227 19.1479 16.5702 17.8591 17.8591C16.5702 19.1479 14.8227 19.8729 13 19.875ZM12.375 13.625V9.25C12.375 9.08424 12.4409 8.92527 12.5581 8.80806C12.6753 8.69085 12.8342 8.625 13 8.625C13.1658 8.625 13.3247 8.69085 13.4419 8.80806C13.5592 8.92527 13.625 9.08424 13.625 9.25V13.625C13.625 13.7908 13.5592 13.9497 13.4419 14.0669C13.3247 14.1842 13.1658 14.25 13 14.25C12.8342 14.25 12.6753 14.1842 12.5581 14.0669C12.4409 13.9497 12.375 13.7908 12.375 13.625ZM13.9375 16.4375C13.9375 16.6229 13.8825 16.8042 13.7795 16.9583C13.6765 17.1125 13.5301 17.2327 13.3588 17.3036C13.1875 17.3746 12.999 17.3932 12.8171 17.357C12.6352 17.3208 12.4682 17.2315 12.3371 17.1004C12.206 16.9693 12.1167 16.8023 12.0805 16.6204C12.0443 16.4385 12.0629 16.25 12.1339 16.0787C12.2048 15.9074 12.325 15.761 12.4792 15.658C12.6333 15.555 12.8146 15.5 13 15.5C13.2486 15.5 13.4871 15.5988 13.6629 15.7746C13.8387 15.9504 13.9375 16.1889 13.9375 16.4375Z"
                                        fill="#EFF2F4" />
                                </svg>
                            </div>
                            <div class="col-11" style="padding: 0;">
                                <p style="margin: 0; text-align: start; font-size: 16px;"> Invalid promo code. Kindly
                                    check if entered promo code is incorrect or it has been used.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5 text-center standard-alert d-none" id="promoAlertSuccess">
                        <div class="row promo-alert-row-success">
                            <div class="col-1" style="padding: 0;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 17.5C18 17.7967 17.912 18.0867 17.7472 18.3334C17.5824 18.58 17.3481 18.7723 17.074 18.8858C16.7999 18.9993 16.4983 19.0291 16.2074 18.9712C15.9164 18.9133 15.6491 18.7704 15.4393 18.5607C15.2296 18.3509 15.0867 18.0836 15.0288 17.7926C14.9709 17.5017 15.0007 17.2001 15.1142 16.926C15.2277 16.6519 15.42 16.4176 15.6666 16.2528C15.9133 16.088 16.2033 16 16.5 16C16.8978 16 17.2794 16.158 17.5607 16.4393C17.842 16.7206 18 17.1022 18 17.5ZM7.5 8C7.79667 8 8.08668 7.91203 8.33335 7.7472C8.58003 7.58238 8.77229 7.34811 8.88582 7.07403C8.99935 6.79994 9.02906 6.49834 8.97118 6.20736C8.9133 5.91639 8.77044 5.64912 8.56066 5.43934C8.35088 5.22956 8.08361 5.0867 7.79264 5.02882C7.50166 4.97094 7.20006 5.00065 6.92597 5.11418C6.65189 5.22771 6.41762 5.41997 6.2528 5.66665C6.08797 5.91332 6 6.20333 6 6.5C6 6.89782 6.15804 7.27936 6.43934 7.56066C6.72064 7.84196 7.10218 8 7.5 8ZM24 2V22C24 22.5304 23.7893 23.0391 23.4142 23.4142C23.0391 23.7893 22.5304 24 22 24H2C1.46957 24 0.960859 23.7893 0.585786 23.4142C0.210714 23.0391 0 22.5304 0 22V2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0H22C22.5304 0 23.0391 0.210714 23.4142 0.585786C23.7893 0.960859 24 1.46957 24 2ZM4 6.5C4 7.19223 4.20527 7.86892 4.58986 8.4445C4.97444 9.02007 5.52107 9.46867 6.16061 9.73358C6.80015 9.99849 7.50388 10.0678 8.18282 9.93275C8.86175 9.7977 9.48539 9.46436 9.97487 8.97487C10.4644 8.48539 10.7977 7.86175 10.9327 7.18282C11.0678 6.50388 10.9985 5.80015 10.7336 5.16061C10.4687 4.52107 10.0201 3.97444 9.4445 3.58986C8.86892 3.20527 8.19223 3 7.5 3C6.57174 3 5.6815 3.36875 5.02513 4.02513C4.36875 4.6815 4 5.57174 4 6.5ZM20 17.5C20 16.8078 19.7947 16.1311 19.4101 15.5555C19.0256 14.9799 18.4789 14.5313 17.8394 14.2664C17.1999 14.0015 16.4961 13.9322 15.8172 14.0673C15.1383 14.2023 14.5146 14.5356 14.0251 15.0251C13.5356 15.5146 13.2023 16.1383 13.0673 16.8172C12.9322 17.4961 13.0015 18.1999 13.2664 18.8394C13.5313 19.4789 13.9799 20.0256 14.5555 20.4101C15.1311 20.7947 15.8078 21 16.5 21C17.4283 21 18.3185 20.6313 18.9749 19.9749C19.6313 19.3185 20 18.4283 20 17.5ZM19.7075 4.2925C19.6146 4.19952 19.5043 4.12576 19.3829 4.07544C19.2615 4.02512 19.1314 3.99921 19 3.99921C18.8686 3.99921 18.7385 4.02512 18.6171 4.07544C18.4957 4.12576 18.3854 4.19952 18.2925 4.2925L4.2925 18.2925C4.10486 18.4801 3.99944 18.7346 3.99944 19C3.99944 19.2654 4.10486 19.5199 4.2925 19.7075C4.48014 19.8951 4.73464 20.0006 5 20.0006C5.26536 20.0006 5.51986 19.8951 5.7075 19.7075L19.7075 5.7075C19.8005 5.61463 19.8742 5.50434 19.9246 5.38294C19.9749 5.26154 20.0008 5.13142 20.0008 5C20.0008 4.86858 19.9749 4.73846 19.9246 4.61706C19.8742 4.49566 19.8005 4.38537 19.7075 4.2925Z" fill="#54B947"/>
                                </svg>
                            </div>
                            <div class="col-11" style="padding: 0;">
                                <p style="margin: 0; text-align: start; font-size: 16px;"> Promo code applied. <span id="promoAmount"></span> off of original premium price.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <div class="row bottom-buttons">
                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">  
                        <button class="btn-back rotatable" id="back"> Back
                        </button>
                    </div>
                    <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">  
                        <button class="btn-continue" id="continue"> Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 modal-pad" style="padding: 30px 70px; font-family: 'Inter';">
                    <div class="row">
                        <div class="col-12 mb-4 text-center">
                            <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" alt="" class="logo-modal">
                        </div>
                        <div class="col-12 text-center sub-text-confirmation">
                            <p style="font-size: 16px; font-weight: bold;" class="mb-4">Auto Excel Plus only quotes for
                                private cars
                                up to 12 years of age, and for clients
                                who are 18 years old and above.</p>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="row">
                                <div class="col-2 col-lg-1 align-self-center text-lg-end text-center"><input
                                        type="checkbox" class="form-check-input" name="checkboxConfirmation"
                                        id="checkboxConfirmation">
                                </div>
                                <div class="col-10 col-lg-11">
                                    <p style="color: #585858;" class="sub-text-p">I hereby confirm that the unit is not used to carry fare-paying passengers and that I am 18 years of age or older.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 cancelConfirmation-div text-center text-lg-end">
                                    <button class="btn-back cancel-btn-hover" id="cancelConfirmation"
                                        style="background-color: #ffffff !important;"> Cancel
                                    </button>
                                </div>
                                <div class="col-lg-6 confirmation-div text-center text-lg-start">
                                    <button class="btn-continue disabled-button" id="confirm" data-dismiss="modal"
                                        disabled> Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        function addCommas(num) {
            var str = num.toString().split('.');
            if (str[0].length >= 4) {
                str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
            }
            return str.join('.');
        }

        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,3})?$/;
            return emailReg.test($email);
        }

        $('#contactNumber').on('keypress', function (e) {
            return e.metaKey || // cmd/ctrl
                e.which <= 0 || // arrow keys
                e.which == 8 || // delete key
                /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        });

        $('#total_value').keypress(function(e) {
            if(e.which === 32 || e.which === 13) 
                return false;
        });

        $("#total_value").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^0-9,. \s]/gi, "");
        });

        $('.accessory_value').keypress(function(e) {
            if(e.which === 32 || e.which === 13) 
                return false;
        });

        $(".accessory_value").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^0-9,.\s]/gi, "");
        });

        $(".accessory_value").change(function () {
            var access_val = this.value.replace(/[^0-9\.]/gi, "");

            if (access_val !== '' || access_val !== '0') {
                if (!jQuery.isNumeric(access_val)) {
                    $(this).val("₱0.00");
                } else {
                    access_val = parseFloat(access_val).toFixed(2);
                    $(this).val("₱" + addCommas(access_val));
                }
            } else {
                $(this).val("₱0.00");
            }
        });

        jQuery('#confirmation').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');

        $("#back").click(function (e) {
            e.preventDefault();
            window.location.href = "{{ url('/get-quote')}}"
        });

        $("#cancelConfirmation").click(function (e) {
            e.preventDefault();
            jQuery('#confirmation').modal('hide');
            window.location.href = "{{ url('/get-quote')}}"
        });

        $("#checkboxConfirmation").change(function () {
            if ($(this).is(":checked")) {
                $('#confirm').removeClass('disabled-button');
                $('#confirm').removeAttr("disabled");
            } else {
                $('#confirm').addClass('disabled-button');
                $('#confirm').prop('disabled', true);
            }
        });

        $("#accessory").change(function () {
            $(".deleteItem").removeClass('d-none');
        });

        $("#accessory_value").change(function () {
            $(".deleteItem").removeClass('d-none');
        });

        $('#firstName').change(function () {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var suffix = $("#suffix").val();
            var contactNumber = $("#contactNumber").val();
            var emailAddress = $("#emailAddress").val();

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' && emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            // $('html').animate({
                            //     scrollTop: eval($("#secondDiv").offset().top - 300)
                            // }, 1000);
                        } else {
                            $("#contactNumber").addClass('danger-special');

                            $('#personalDataDanger').attr("class", "").removeClass('d-none');
                            $('#personalDataSuccess').attr("class", "d-none");
                        }
                    } else {
                        $("#contactNumber").addClass('danger-special');

                        $('#personalDataDanger').attr("class", "").removeClass('d-none');
                        $('#personalDataSuccess').attr("class", "d-none");
                    }
                } else {
                    $('#personalDataDanger').attr("class", "").removeClass('d-none');
                    $('#personalDataSuccess').attr("class", "d-none");
                }
            }
        });

        $('#lastName').change(function () {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var suffix = $("#suffix").val();
            var contactNumber = $("#contactNumber").val();
            var emailAddress = $("#emailAddress").val();

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' && emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            // $('html').animate({
                            //     scrollTop: eval($("#secondDiv").offset().top - 300)
                            // }, 1000);
                        } else {
                            $("#contactNumber").addClass('danger-special');

                            $('#personalDataDanger').attr("class", "").removeClass('d-none');
                            $('#personalDataSuccess').attr("class", "d-none");
                        }
                    } else {
                        $("#contactNumber").addClass('danger-special');

                        $('#personalDataDanger').attr("class", "").removeClass('d-none');
                        $('#personalDataSuccess').attr("class", "d-none");
                    }
                } else {
                    $('#personalDataDanger').attr("class", "").removeClass('d-none');
                    $('#personalDataSuccess').attr("class", "d-none");
                }
            }
        });

        $('#suffix').change(function () {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var suffix = $("#suffix").val();
            var contactNumber = $("#contactNumber").val();
            var emailAddress = $("#emailAddress").val();

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' && emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            // $('html').animate({
                            //     scrollTop: eval($("#secondDiv").offset().top - 300)
                            // }, 1000);
                        } else {
                            $("#contactNumber").addClass('danger-special');

                            $('#personalDataDanger').attr("class", "").removeClass('d-none');
                            $('#personalDataSuccess').attr("class", "d-none");
                        }
                    } else {
                        $("#contactNumber").addClass('danger-special');

                        $('#personalDataDanger').attr("class", "").removeClass('d-none');
                        $('#personalDataSuccess').attr("class", "d-none");
                    }
                } else {
                    $('#personalDataDanger').attr("class", "").removeClass('d-none');
                    $('#personalDataSuccess').attr("class", "d-none");
                }
            }
        });

        $('#contactNumber').change(function () {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var suffix = $("#suffix").val();
            var contactNumber = $("#contactNumber").val();
            var emailAddress = $("#emailAddress").val();

            if (contactNumber.substr(0, 2) === '09') {
                if (contactNumber.length === 11) {
                    $("#contactNumber").removeClass('danger-special');
                } else {
                    $("#contactNumber").addClass('danger-special');
                }
            } else {
                $("#contactNumber").addClass('danger-special');
            }

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' &&
                emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            // $('html').animate({
                            //     scrollTop: eval($("#secondDiv").offset().top - 300)
                            // }, 1000);
                        } else {
                            $("#contactNumber").addClass('danger-special');

                            $('#personalDataDanger').attr("class", "").removeClass('d-none');
                            $('#personalDataSuccess').attr("class", "d-none");
                        }
                    } else {
                        $("#contactNumber").addClass('danger-special');

                        $('#personalDataDanger').attr("class", "").removeClass('d-none');
                        $('#personalDataSuccess').attr("class", "d-none");
                    }
                } else {
                    $('#personalDataDanger').attr("class", "").removeClass('d-none');
                    $('#personalDataSuccess').attr("class", "d-none");
                }
            }
        });

        $('#emailAddress').change(function () {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var suffix = $("#suffix").val();
            var contactNumber = $("#contactNumber").val();
            var emailAddress = $("#emailAddress").val();

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' &&
                emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            // $('html').animate({
                            //     scrollTop: eval($("#secondDiv").offset().top - 300)
                            // }, 1000);
                        } else {
                            $("#contactNumber").addClass('danger-special');

                            $('#personalDataDanger').attr("class", "").removeClass('d-none');
                            $('#personalDataSuccess').attr("class", "d-none");
                        }
                    } else {
                        $("#contactNumber").addClass('danger-special');

                        $('#personalDataDanger').attr("class", "").removeClass('d-none');
                        $('#personalDataSuccess').attr("class", "d-none");
                    }
                } else {
                    $('#personalDataDanger').attr("class", "").removeClass('d-none');
                    $('#personalDataSuccess').attr("class", "d-none");
                }
            }
        });

        $('#brand').change(function () {
            var brand = $("#brand").val();
            var model = $("#model").val();
            var year = $("#year").val();

            if (brand !== '' && model !== '' && year !== '') {
                $('#carInformationSuccess').attr("class", "").removeClass('d-none');
                $('#carInformationDanger').attr("class", "d-none");

                // $('html').animate({
                //     scrollTop: eval($("#thirdDiv").offset().top - 300)
                // }, 1000);
            }
        });

        $('#model').change(function () {
            var brand = $("#brand").val();
            var model = $("#model").val();
            var year = $("#year").val();

            if (brand !== '' && model !== '' && year !== '') {
                $('#carInformationSuccess').attr("class", "").removeClass('d-none');
                $('#carInformationDanger').attr("class", "d-none");

                // $('html').animate({
                //     scrollTop: eval($("#thirdDiv").offset().top - 300)
                // }, 1000);
            }
        });

        $('#year').change(function () {
            var brand = $("#brand").val();
            var model = $("#model").val();
            var year = $("#year").val();
            if (brand !== '' && model !== '' && year !== '') {
                $('#carInformationSuccess').attr("class", "").removeClass('d-none');
                $('#carInformationDanger').attr("class", "d-none");

                // $('html').animate({
                //     scrollTop: eval($("#thirdDiv").offset().top - 300)
                // }, 1000);
            }
        });

        $('#bi').change(function () {
            var bi = $("#bi").val();
            var pd = $("#pd").val(bi);

            $("#pd").siblings('button').children('p').html(bi).addClass('button-background');

            if (bi !== '' && pd !== '') {
                $('#carInformationSuccess').attr("class", "").removeClass('d-none');
                $('#carInformationDanger').attr("class", "d-none");

                // $('html').animate({
                //     scrollTop: eval($("#fourthDiv").offset().top - 300)
                // }, 1000);
            }
        });

        $('#pd').change(function () {
            var pd = $("#pd").val();
            var bi = $("#bi").val(pd);
            
            $("#bi").siblings('button').children('p').html(pd).addClass('button-background');

            if (bi !== '' && pd !== '') {
                $('#carInformationSuccess').attr("class", "").removeClass('d-none');
                $('#carInformationDanger').attr("class", "d-none");

                // $('html').animate({
                //     scrollTop: eval($("#fourthDiv").offset().top - 300)
                // }, 1000);
            }
        });

        $('#yesGuard').click(function (e) {
            e.preventDefault();
            $("#buttonGuardValue").val('yes');
            $("#yesGuard").removeClass('inactive-button-guard');
            $("#yesGuard").addClass('active-button-guard');
            $("#noGuard").removeClass('active-button-guard');
            $("#noGuard").addClass('inactive-button-guard');
            $('#yesGuard > svg').attr("class", "").removeClass('d-none');
            $('#noGuard > svg').attr("class", "d-none");
            $('#totalGuardSuccess').attr("class", "").removeClass('d-none');
            $('#totalGuardDanger').attr("class", "d-none");
            $("#continue").attr("disabled", false);
        });

        $('#noGuard').click(function (e) {
            e.preventDefault();
            $("#buttonGuardValue").val('no');
            $("#noGuard").removeClass('inactive-button-guard');
            $("#noGuard").addClass('active-button-guard');
            $("#yesGuard").removeClass('active-button-guard');
            $("#yesGuard").addClass('inactive-button-guard');
            $('#noGuard > svg').attr("class", "").removeClass('d-none');
            $('#yesGuard > svg').attr("class", "d-none");
            $('#totalGuardSuccess').attr("class", "").removeClass('d-none');
            $('#totalGuardDanger').attr("class", "d-none");
            $("#continue").attr("disabled", false);
        });

        $('#yesPromo').click(function (e) {
            e.preventDefault();
            $("#buttonPromoValue").val('yes');
            $("#yesPromo").removeClass('inactive-button-guard');
            $("#yesPromo").addClass('active-button-guard');
            $("#noPromo").removeClass('active-button-guard');
            $("#noPromo").addClass('inactive-button-guard');
            $('#yesPromo > svg').attr("class", "").removeClass('d-none');
            $('#noPromo > svg').attr("class", "d-none");
            $('#promoCodeYes').removeClass("d-none");
            $('#promoCodeDanger').attr("class", "d-none");
            $('#promoCodeSuccess').attr("class", "d-none");
            $("#continue").attr("disabled", false);
        });

        $('#noPromo').click(function (e) {
            e.preventDefault();
            $("#buttonPromoValue").val('no');
            $("#noPromo").removeClass('inactive-button-guard');
            $("#noPromo").addClass('active-button-guard');
            $("#yesPromo").removeClass('active-button-guard');
            $("#yesPromo").addClass('inactive-button-guard');
            $('#noPromo > svg').attr("class", "").removeClass('d-none');
            $('#yesPromo > svg').attr("class", "d-none");
            $('#promoCodeYes').addClass("d-none");
            $('#promoCodeDanger').attr("class", "d-none");
            $('#promoCodeSuccess').attr("class", "d-none");
            $("#promoIconsSuccess").addClass('d-none');
            $("#promoCode").removeClass('input-field-padding');
            $("#promoCode").val('');
            $('#promoCodeSuccess').attr("class", "").removeClass('d-none');
            $("#continue").attr("disabled", false);
        });

        $('#continue').click(function (e) {
            e.preventDefault();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var contactNumber = $('#contactNumber').val();
            var emailAddress = $('#emailAddress').val();
            var brand = $("#brand").val();
            var model = $("#model").val();
            var year = $("#year").val();
            var total = $("#quotationRange").val();
            var bi = $("#bi").val();
            var pd = $("#pd").val();
            var suffix = $("#suffix").val();
            var total_value = $("#total_value").val();
            var buttonGuardValue = $("#buttonGuardValue").val();
            var buttonPromoValue = $("#buttonPromoValue").val();

            if (firstName === '') {
                $("#firstName").addClass('danger');
                // $("#firstName").prev().closest('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707'
                // });

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }

            if (lastName === '') {
                $("#lastName").addClass('danger');
                // $("#lastName").prev().closest('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707'
                // });

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }

            if (suffix === '') {
                $("#suffix").siblings('button').addClass('danger');
                // $("#suffix").closest('.dropdown').siblings('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707',
                // });

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }

            if (contactNumber === '') {
                $("#contactNumber").addClass('danger');

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }

            if (emailAddress === '') {
                $("#emailAddress").addClass('danger');

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }


            if (brand === '') {
                $("#brand").siblings('button').addClass('danger');
                // $("#brand").closest('.dropdown').siblings('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707',
                // });

                $('#carInformationDanger').attr("class", "").removeClass('d-none');
                $('#carInformationSuccess').attr("class", "d-none");
            }

            if (model === '') {
                $("#model").siblings('button').addClass('danger');
                // $("#model").closest('.dropdown').siblings('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707',
                // });

                $('#carInformationDanger').attr("class", "").removeClass('d-none');
                $('#carInformationSuccess').attr("class", "d-none");
            }

            if (year === '') {
                $("#year").siblings('button').addClass('danger');
                // $("#year").closest('.dropdown').siblings('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707',
                // });

                $('#carInformationDanger').attr("class", "").removeClass('d-none');
                $('#carInformationSuccess').attr("class", "d-none");
            }

            if (total_value === '' || total_value === '0') {
                $("#total_value").addClass('danger');
                // $("#total_value").prev().closest('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707'
                // });

                $('#carInformationDanger').attr("class", "").removeClass('d-none');
                $('#carInformationSuccess').attr("class", "d-none");
            }

            if (bi === '') {
                $("#bi").siblings('button').addClass('danger');
                // $("#bi").closest('.dropdown').siblings('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707',
                // });

                $('#carInformationDanger').attr("class", "").removeClass('d-none');
                $('#carInformationSuccess').attr("class", "d-none");
            }

            if (pd === '') {
                $("#pd").siblings('button').addClass('danger');
                // $("#pd").closest('.dropdown').siblings('p').css({
                //     'background': '#FFF7F7',
                //     'color': '#DD0707',
                // });

                $('#carInformationDanger').attr("class", "").removeClass('d-none');
                $('#carInformationSuccess').attr("class", "d-none");
            }

            if (buttonGuardValue === 'default') {

                $('#totalGuardDanger').attr("class", "").removeClass('d-none');
                $('#totalGuardSuccess').attr("class", "d-none");
            }

            if (buttonPromoValue === 'default') {

                $('#promoCodeDanger').attr("class", "").removeClass('d-none');
                $('#promoCodeSuccess').attr("class", "d-none");
            }

            if (firstName === '' || lastName === '' || suffix === '' || contactNumber === '' ||
            emailAddress === '') {
                $('html').animate({
                    scrollTop: eval($("#firstDiv").offset().top - 300)
                }, 1000);
            } else if (brand === '' || model === '' || year === '') {
                $('html').animate({
                    scrollTop: eval($("#secondDiv").offset().top - 300)
                }, 1000);
            } else if (bi === '' || pd === '') {
                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            } else if (buttonGuardValue === 'default') {
                $('html').animate({
                    scrollTop: eval($("#fourthDiv").offset().top - 300)
                }, 1000);
            } else {

            }

            if (firstName !== '' && lastName !== '' && contactNumber !== "" && emailAddress !== "" && brand !== '' && model !== '' && year !== '' &&
                total !== '' && bi !== '' && pd !== '' && suffix !== '' && buttonGuardValue !== 'default' && buttonPromoValue !== 'default') {

                $("#compreFormStep1").submit();

            } else {
                $("#continue").attr("disabled", true);
            }
        });

        $("body").on("click", ".addItem", function () {

            var colCount = $(".accessories_inputs").length;
            for (let i = 1; i < colCount; i++) {

                if (i !== 0) {
                    var accessory = $("#accessory" + i).val();
                    var accessory_value = $("#accessory_value" + i).val();

                    if (accessory === '' && accessory_value === '') {

                        $("#accessory" + i).addClass('danger');

                        $("#accessory_value" + i).addClass('danger');

                        return;
                    } else {
                        if (accessory === '') {
                            $("#accessory" + i).addClass('danger');
                            return;
                        } else if (accessory_value === '') {
                            $("#accessory_value" + i).addClass('danger');
                            return;
                        } else {
                            $("#accessory" + i).removeClass('danger');

                            $("#accessory_value" + i).removeClass('danger');
                        }
                    }

                    $("#accessory" + i).change(function () {
                        $("#accessory" + i).removeClass('danger');

                        $("#accessory_value" + i).removeClass('danger');
                    });

                    $("#accessory_value" + i).change(function () {
                        $("#accessory" + i).removeClass('danger');

                        $("#accessory_value" + i).removeClass('danger');
                    });

                } else {
                    var accessory = $("#accessory").val();
                    var accessory_value = $("#accessory_value").val();

                    if (accessory === '' && accessory_value === '') {

                        $("#accessory").addClass('danger');

                        $("#accessory_value").addClass('danger');

                        return;
                    } else {

                        if (accessory === '') {

                            $("#accessory").addClass('danger');

                            return;
                        } else if (accessory_value === '') {

                            $("#accessory_value").addClass('danger');
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
                .find("input, .p-dropdown-select").attr("id", function (i, oldVal) {
                    if (colCount !== 1) {
                        var newStr = oldVal.slice(0, -1);
                        return newStr + colCount;
                    } else {
                        return oldVal + colCount;
                    }
                }).val('').text('Select Accessories');

            $('.dropdown-select').click(function (e) {
                e.preventDefault();
                $(this).closest('.dropdown').find('a').removeClass('dropdown-select-active');
                $(this).closest('.dropdown').find('input').val($(this).text()).trigger(
                'change');
                $(this).closest('.dropdown').find('button > p').text($(this).text());
                $(this).addClass('dropdown-select-active');

                $(this).closest('.dropdown').find('button').addClass('button-background');
            });

            $(".accessory_value").change(function () {
                var access_val = this.value.replace(/[^0-9\.]/gi, "");

                if (access_val !== '' || access_val !== '0') {
                    if (!jQuery.isNumeric(access_val)) {
                        $(this).val("₱0.00");
                    } else {
                        access_val = parseFloat(access_val).toFixed(2);
                        $(this).val("₱" + addCommas(access_val));
                    }
                } else {
                    $(this).val("₱0.00");
                }
            });

            $(this).closest('.accessories_inputs').find('.addItem').addClass('prev-add');
            $(this).closest('.accessories_inputs').removeClass('mb-5').addClass('mb-2');
            $('.accessories_inputs').last().find('#accessoryNumber').html(`Accessory ${colCount + 1}`);
        });

        $("body").on("click", ".deleteItem", function () {
            
            var colCount = $("#newinput .accessories_inputs").length;

            if (colCount > 1) {
                $(this).parents("#row").remove();
                jQuery('.deleteItem').removeClass('d-none');

                $('.accessories_inputs').last().removeClass('mb-2').addClass('mb-5');

                var utcInstances = $('.accessories_inputs');

                utcInstances.each((i, instance) => {
                    $(instance).find(".dropdown").children('input').attr("id", function (e,
                        oldVal) {
                        if (i !== 0) {
                            return 'accessory' + i;
                        } else {
                            return 'accessory';
                        }
                    });

                    $(instance).find(".accessory_value").attr("id", function (e, oldVal) {
                        if (i !== 0) {
                            return 'accessory_value' + i;
                        } else {
                            return 'accessory_value';
                        }
                    });
                });
            } else {
                jQuery('.deleteItem').addClass('d-none');
                jQuery('.accessories_inputs').find(".dropdown").children('input').attr("id",
                    "accessory");
                jQuery('.accessories_inputs').find(".accessory_value").attr("id", "accessory_value");
                jQuery('.accessories_inputs').removeClass('mb-2').addClass('mb-5');

                $("#accessory").siblings('button').children('p').text('Select Accessories');

                $("#accessory_value").val('');
            }

            $('.accessories_inputs').last().find('.addItem').removeClass('prev-add');
        });

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

            $("#bi, #pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                $(this).addClass('d-none');
                        });

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

                        jQuery('#modelOption').empty();
                        $('#modelOption').append($(' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'));
                        jQuery.each(result, function (key, value) {
                            var modelRep = value.model.replace(brand, '');
                            $('#modelOption').append($('<li><a href="javascript:void(0)" class="dropdown-select" title="'+modelRep+'">' + modelRep + '</a></li>'));
                        })

                        $('#modelOption').siblings('button').children('p').text('Select Model');

                        $('#yearOption').siblings('button').children('p').text(
                            'Select Year');
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

            $("#bi, #pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                $(this).addClass('d-none');
                        });

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
                        jQuery('#yearOption').empty();
                        $('#yearOption').append($(' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'));
                        jQuery.each(result, function (key, value) {
                            $('#yearOption').append($('<li><a href="javascript:void(0)" class="dropdown-select" title="'+value.year+'">' + value.year + '</a></li>'));
                        })

                        $('#yearOption').siblings('button').children('p').text(
                            'Select Year');

                        $(".dropdown-search").keyup(function () {
                            var input, filter, ul, li, a, i;
                            filter = $(this).val().toUpperCase();
                            div = $(this).closest('.dropdown-menu');
                            a = div.find("a");
                            for (i = 0; i < a.length; i++) {
                                txtValue = a[i].textContent || a[i].innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    a[i].style.display = "";
                                } else {
                                    a[i].style.display = "none";
                                }
                            }
                        });

                        $('.dropdown-select').click(function (e) {
                            e.preventDefault();
                            $(this).closest('.dropdown-menu').removeClass('show');
                            $(this).closest('.dropdown').find('a').removeClass(
                                'dropdown-select-active');
                            $(this).closest('.dropdown').find('input').val($(this)
                                .text()).trigger('change');
                            $(this).closest('.dropdown').find('button > p').text($(
                                this).text());
                            $(this).addClass('dropdown-select-active');

                            $(this).closest('.dropdown').find('button').addClass(
                                'button-background');
                        });
                    }
                })
            }
        });

        $('#year').change(function () {
            $('#total_value').val(0);
            $('#quotationRange').val(0);

            $("#bi, #pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                $(this).addClass('d-none');
                        });
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

                        var svg =
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 24 24"><path fill="#09A12A" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/></svg>'

                            brand = brand.toLowerCase().replace(/\b[a-z]/g, function (
                                letter) {
                                return letter.toUpperCase();
                            });

                            model = model.toLowerCase().replace(/\b[a-z]/g, function (
                                letter) {
                                return letter.toUpperCase();
                            });

                            $('#carModel').html(`${svg} ${brand} ${model} ${year}`);
                     

                        var minval = (result * 0.9);
                        var maxval = (result * 1.1);

                        minval = Math.trunc(minval);
                        maxval = Math.trunc(maxval);

                        var limitval = 5000000;

                        if(parseFloat(maxval) > parseFloat(limitval)) {
                            maxval = 5000000;
                        } else {
                            maxval = maxval;
                        }

                        $('#quotationRange').attr({
                            'min': minval,
                            'max': maxval
                        });

                        $('#total_value').attr({
                            'min': minval,
                            'max': maxval
                        });

                        var final_val = Math.round((minval+maxval)/2)

                        $("#bi, #pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                $(this).removeClass('d-none');
                        });

                        $("#pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                            pd_value = $(this).text().split(",").join("");
                            pd_value = Math.trunc(pd_value);
                            if(parseFloat(pd_value) > parseFloat(final_val)) {
                                $(this).addClass('d-none');
                            }
                        });

                        $("#bi").siblings('.dropdown-menu').children('li').children('a').each(function() {
                            bi_value = $(this).text().split(",").join("");
                            bi_value = Math.trunc(bi_value);
                            if(parseFloat(bi_value) > parseFloat(final_val)) {
                                $(this).addClass('d-none');
                            }
                        });

                        $("#total_value").val(addCommas(final_val));
                        $("#total_value").removeClass('danger');
                        $("#quotationRange").val(addCommas(final_val));
                        $("#default_value").val(final_val);

                        $('#addTotal').prop("disabled", false);
                        $('#minusTotal').prop("disabled", false);
                        $('#total_value').prop("disabled", false);
                        $('#quotationRange').prop("disabled", false);

                        $("#total_value").change(function () {
                            var total = $("#total_value").val().split(",").join("");
                            
                            if (parseFloat(total) > parseFloat(maxval)) {
                                $("#total_value").val(addCommas(final_val));
                                $("#quotationRange").val(final_val);
                            } else if (parseFloat(total) < parseFloat(minval)) {
                                $("#total_value").val(addCommas(final_val));
                                $("#quotationRange").val(final_val);
                            } else {
                                if(total) {
                                    $("#total_value").val(addCommas(total));
                                    $("#quotationRange").val(total);
                                } else {
                                    $("#total_value").val(addCommas(minval));
                                    $("#quotationRange").val(minval);
                                }
                            }

                            $("#pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                pd_value = $(this).text().split(",").join("");
                                pd_value = Math.trunc(pd_value);
                                if(parseFloat(pd_value) > parseFloat(total)) {
                                    $(this).addClass('d-none');
                                } else {
                                    $(this).removeClass('d-none');
                                }
                            });

                            $("#bi").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                bi_value = $(this).text().split(",").join("");
                                bi_value = Math.trunc(bi_value);
                                if(parseFloat(bi_value) > parseFloat(total)) {
                                    $(this).addClass('d-none');
                                } else {
                                    $(this).removeClass('d-none');
                                }
                            });
                            
                            $("#total_value").removeClass('is-invalid');
                        });

                        $("#quotationRange").change(function () {
                            var total = $(this).val();
                            var final = parseFloat(total);

                            $("#pd").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                pd_value = $(this).text().split(",").join("");
                                pd_value = Math.trunc(pd_value);
                                if(parseFloat(pd_value) > parseFloat(total)) {
                                    $(this).addClass('d-none');
                                } else {
                                    $(this).removeClass('d-none');
                                }
                            });

                            $("#bi").siblings('.dropdown-menu').children('li').children('a').each(function() {
                                bi_value = $(this).text().split(",").join("");
                                bi_value = Math.trunc(bi_value);
                                if(parseFloat(bi_value) > parseFloat(total)) {
                                    $(this).addClass('d-none');
                                } else {
                                    $(this).removeClass('d-none');
                                }
                            });

                            $("#total_value").val(addCommas(final));
                            $("#total_value").removeClass('is-invalid');
                        });

                      
                    }
                })
            }
        });

        $("#addTotal").click(function (e) {
            e.preventDefault();
            var total = $("#quotationRange").val();
            if (parseFloat(total) < parseFloat($('#quotationRange').attr('max'))) {
                total = parseFloat(total) + 1;
                $("#quotationRange").val(total);
                $("#total_value").val(addCommas(total));
            }
        });

        $("#minusTotal").click(function (e) {
            e.preventDefault();
            var total = $("#quotationRange").val();
            if (parseFloat(total) > parseFloat($('#quotationRange').attr('min'))) {
                total = parseFloat(total) - 1;
                $("#quotationRange").val(total);
                $("#total_value").val(addCommas(total));
            }
        });

        $("#promoCode").keyup(function () {
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
                            $("#promoAlert").removeClass('d-none');
                            $("#promoAlertSuccess").addClass('d-none');
                            $("#promoCode").addClass('danger');
                            $("#promoIconsSuccess").addClass('d-none');
                            $("#promoCode").removeClass('input-field-padding');

                            $('#promoCodeDanger').attr("class", "").removeClass('d-none');
                            $('#promoCodeSuccess').attr("class", "d-none");

                            $("#continue").attr("disabled", true);
                            $("#continue").css({
                                'background': '#C0E6E6'
                            });

                        } else {
                            if(result.type === 'P') {
                                $("#promoAmount").html(`${result.rate}%`);
                            } else {
                                $("#promoAmount").html(`P${result.amount}`);
                            }
                            $("#promoAlert").addClass('d-none');
                            $("#promoAlertSuccess").removeClass('d-none');
                            $("#promoIconsSuccess").removeClass('d-none');
                            $("#promoCode").addClass('input-field-padding');
                            $('#promoCodeSuccess').attr("class", "").removeClass('d-none');
                            $('#promoCodeDanger').attr("class", "d-none");
                            $("#continue").attr("disabled", false);
                            $("#continue").css({
                                'background': '#008080'
                            });
                        }
                    }
                })
            }
        });
    });
</script>
@endsection