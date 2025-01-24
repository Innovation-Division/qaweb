@extends('getaquote.new.compre.index')
@section('compre-section')
<style>
    @media (max-width: 991px) {
        .id-div {
            width: 275px !important;
            text-align: center !important;
        }

        .upload-file-name {
            font-size: 20px !important;
            margin-left: 0 !important;
        }

        .upload-file-size {
            font-size: 13px !important;
        }

        .id-type-div {
            width: 325px !important;
        }

        .alert-upload-id {
            padding: 0px 40px;
        }

        .alert-upload-id-text {
            font-size: 13px !important;
        }

        #uploadID {
            padding: 10px 20px !important;
        }
    }

    .alert-upload-id-text {
        color: #585858;
        font-size: 16px;
        font-family: 'Inter'
    }


    #uploadID {
        background: #E4509A;
        color: #FFFFFF;
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
    }

    .upload-file-name {
        margin-left: -40px;
    }

    .upload-file-size {
        margin-left: -40px;
    }

    .identification-input-div {
        padding: 0 250px;
        background-color: #F7FCFF;
    }

    /* div:where(.swal2-icon) {
        width: 45.5px;
        height: 45.5px;
    }

    div:where(.swal2-icon).swal2-warning {
        border-color:#BB251A;
        color: #BB251A;
    }

    div:where(.swal2-icon) .swal2-icon-content {
        display: flex;
        align-items: center;
        font-size: 37px;
        font-weight: 700;
    }

    button.swal2-confirm.swal2-styled.swal2-default-outline {
        color: #DD0707;
        border: 1px solid #DD0707;
    } */

    .swal2-confirm {
        box-shadow: none !important;
        background-color: #ffffff !important;
        color: #DD0707 !important;
        border: 1px solid #DD0707 !important;
    }

    .swal2-cancel {
        background-color: #008080 !important;
    }

    .delete-photo {
        font-size: 27px;
        font-weight: 700;
        font-family: 'Inter';
        margin-bottom: 20px;
        color: #2D2727 !important;
    }

    .swal2-content {
        font-size: 16px !important;
        font-weight: 500 !important;
        font-family: 'Inter' !important;
        color: #3B3939 !important;
    }

    .progress-uploading {
        height: 4px;
    }

    .progress-uploading>.progress-bar {
        background: #09A12A;
    }

    #overlay {
        padding: 0px 70px;
    }
</style>
<style>
    .icon-bday {
        position: absolute;
        right: 1.3rem;
        pointer-events: none;
        margin-top: 12px;
        height: 18px;
        width: 18px;
    }

    .icon-bday-checked {
        position: absolute;
        right: 1.3rem;
        pointer-events: none;
        margin-top: 12px;
        height: 18px;
        width: 18px;
    }

    @-moz-document url-prefix(){
        .icon-bday-checked {
            margin-top: -30px !important;
        }
    }

    .calendar-date-option {
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
        background: #ffffff !important;
        border-radius: 4px !important;
        border-style: solid !important;
        border-color: #eff2f4 !important;
        border-width: 1px !important;
        padding: 0rem 0px 0px 1rem !important;
        align-items: center !important;
        justify-content: flex-start !important;
        width: 120px !important;
        height: 32px !important;
        margin-left: 16px !important;
        font-family: "Inter-Medium", sans-serif;
    }

    .calendar-apply {
        background: #008080;
        border-radius: 3px;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 120px;
        position: relative;
        color: #ffffff;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 12px;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        height: 40px;
    }

    .calendar-apply:hover {
        background: #fff;
        color: #008080;
        border: 1px solid #008080;
    }

    .calendar-close {
        background: #fff;
        color: #008080;
        border: 0px;
        border-radius: 3px;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 120px;
        position: relative;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 12px;
        line-height: 20px;
        font-weight: 500;
        position: relative;
        height: 40px;
    }

    .date1,
    .date2 {
        width: 150px;
        cursor: pointer;
    }

    .date-picker-bday {
        display: none;
        position: absolute;
        border: 1px solid #ccc;
        background: white;
        padding: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .daybday {
        cursor: pointer;
        border-radius: 50%;
        transition: background-color 0.3s;
        display: inline-block;
        margin: 5px;
        width: 30px;
        height: 28px;
        padding: 5px;
        color: #1d1f23;
        font-family: "Inter", sans-serif;
        font-size: 12px;
        font-weight: 400;
    }

    .daybday:hover {
        background-color: #008080;
        color: #fff;
    }

    .daybday.selected {
        background-color: #e4509a;
        color: white;
    }

    .daybday.disabled {
        color: #ccc;
        cursor: not-allowed;
    }

    .daysbday {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .day-name {
        text-align: center;
        color: #7a7f89;
        font-family: "Inter-Medium", sans-serif;
        font-size: 12px;
        line-height: 16px;
        font-weight: 500;
        position: relative;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
</style>
<form method="post" action="{{ url('/get-quote/auto-excel-plus/summary-auto-excel')}}" enctype="multipart/form-data"
    id="compreFormStep3" autocomplete="off">
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
                    <div class="col-lg-4 mb-5 personal-input">
                        <input type="hidden" name="transNo" id="transNo" value="{{$trans_no}}">
                        <p class="text-start p-label">
                            First Name<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter first name" maxlength="50" id="firstName" name="firstName"
                            value="{{$personalInfo->firstName}}" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Surname<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter last name" maxlength="50" id="lastName" name="lastName"
                            value="{{$personalInfo->lastName}}" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Suffix<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="suffix" id="suffix" value="{{$personalInfo->suffix}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->suffix)
                                <p class="p-dropdown-select">{{$personalInfo->suffix}}</p>
                                @else
                                <p class="p-dropdown-select">Select Suffix</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon"
                                        style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text"
                                        placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->suffix === 'Jr' ? 'dropdown-select-active' : '' }}">Jr</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->suffix === 'Sr' ? 'dropdown-select-active' : '' }}">Sr</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->suffix === 'I' ? 'dropdown-select-active' : '' }}">I</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->suffix === 'II' ? 'dropdown-select-active' : '' }}">II</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->suffix === 'III' ? 'dropdown-select-active' : '' }}">III</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->suffix === 'IV' ? 'dropdown-select-active' : '' }}">IV</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Contact Number<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter contact number" maxlength="11" id="contactNumber"
                            name="contactNumber" value="{{$personalInfo->contactNo}}"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Email Address<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter email address" maxlength="50" id="emailAddress"
                            name="emailAddress" value="{{$personalInfo->emailAddress}}"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input customize-none">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12" id="secondDiv">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Additional Personal Information
                    <svg xmlns="http://www.w3.org/2000/svg" id="additionalPersonalDataSuccess" class="d-none" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="additionalPersonalDataDanger" class="d-none" width="56"
                        height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>
            </div>
            <div class="col-12 text-center personal-input-div">
                <div class="row justify-content-center">
                    <!-- <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Date of Birth<span class="text-danger">*</span></p>
                        <input type="date" placeholder="Enter mv file no" id="dateOfBirth" name="dateOfBirth"
                            value="{{$personalInfo->birthDate}}" style="background-color: #F5F5F5; line-height: 24px;">
                    </div> -->

                    <div class="col-lg-4 mb-5 personal-input">
                        <div class="form-group">
                            <p class="text-start p-label"> Date of Birth<span class="text-danger">*</span></p>
                            <input id="dateOfBirth" name="dateOfBirth" onkeydown="return false" type="text"
                                placeholder="Date of Birth" class="birdthday cp-spacing-input">
                            <svg class="icon-bday icon-bday-default" xmlns="http://www.w3.org/2000/svg" width="12"
                                height="13" fill="none" viewBox="0 0 12 13">
                                <path fill="#309999"
                                    d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z" />
                            </svg>

                            <svg class="icon-bday-checked" style="display: none" xmlns="http://www.w3.org/2000/svg"
                                width="12" height="13" fill="none" viewBox="0 0 12 13">
                                <path fill="#309999"
                                    d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1ZM8.604 7.354l-3 3a.502.502 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L5.25 9.293l2.646-2.647a.5.5 0 1 1 .708.708ZM1 4V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2H1Z" />
                            </svg>
                        </div>
                        <div id="date-picker-bday" class="date-picker-bday">
                            <div class="header">
                                <select id="monthbday" class="calendar-date-option"></select>
                                <select id="yearbday" class="calendar-date-option"></select>
                            </div>
                            <div class="daysbday">
                                <div class="day-name">Sun</div>
                                <div class="day-name">Mon</div>
                                <div class="day-name">Tue</div>
                                <div class="day-name">Wed</div>
                                <div class="day-name">Thu</div>
                                <div class="day-name">Fri</div>
                                <div class="day-name">Sat</div>
                            </div>
                            <div id="daysbday" class="daysbday"></div>
                            <div class="buttons">
                                <button id="closebday" type="button" class="calendar-close">Close</button>
                                <button id="applybday" type="button" class="calendar-apply btn">Apply</button>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Gender<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="gender" id="gender" value="{{$personalInfo->gender}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->gender)
                                <p class="p-dropdown-select">{{$personalInfo->gender}}</p>
                                @else
                                <p class="p-dropdown-select">Select Gender</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon"
                                        style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text"
                                        placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->gender === 'Male' ? 'dropdown-select-active' : '' }}">Male</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->gender === 'Female' ? 'dropdown-select-active' : '' }}">Female</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->gender === 'Others' ? 'dropdown-select-active' : '' }}">Others</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Nationality<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="nationality" id="nationality"
                                value="{{$personalInfo->nationality}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->nationality)
                                <p class="p-dropdown-select">{{$personalInfo->nationality}}</p>
                                @else
                                <p class="p-dropdown-select">Select nationality</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon"
                                        style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text"
                                        placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->nationality === 'Filipino' ? 'dropdown-select-active' : '' }}">Filipino</a>
                                </li>
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->nationality === 'Foreign Permanent Resident in the
                                        Philippines with Alien Certificate of Registration' ? 'dropdown-select-active' : '' }}">Foreign
                                        Permanent Resident in the
                                        Philippines with Alien Certificate of Registration</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Place of Birth<span class="text-danger">*</span></p>
                        <input type="text" placeholder="City, Region" maxlength="100" id="placeOfBirth"
                            name="placeOfBirth" value="{{$personalInfo->palceofbirth}}"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Country<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="country" id="country" value="{{$personalInfo->country}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->country)
                                <p class="p-dropdown-select">{{$personalInfo->country}}</p>
                                @else
                                <p class="p-dropdown-select">Select Country</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon"
                                        style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text"
                                        placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                @foreach($countries as $country)
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->country === $country->country ? 'dropdown-select-active' : '' }}">{{$country->country}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 personal-input customize-none">

                    </div>
                </div>
                <div class="row justify-content-center" style="height: 45px;">
                    <div class="col-lg-4 personal-input">
                        <p class="text-start"
                            style="font-size: 18px;font-weight: 600;line-height: 24px;text-align: left;color:#303030;">
                            Present Address</p>
                    </div>
                    <div class="col-lg-4 personal-input"></div>
                    <div class="col-lg-4 personal-input"></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            House/Unit No.<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter  House/Unit No." id="address" name="address"
                            maxlength="100" value="{{$personalInfo->residence_address}}"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Street<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter Street" id="street" name="street" maxlength="50"
                            value="{{$personalInfo->street}}" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Region<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="region" id="region" value="{{$personalInfo->region}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->region)
                                <p class="p-dropdown-select">{{$personalInfo->region}}</p>
                                @else
                                <p class="p-dropdown-select">Select region</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu" id="regionOption">
                                <div class="input-icons" style="padding: 5px 15px;">
                                    <i class="fa fa-search icon"
                                        style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                    <input class="input-field dropdown-search" type="text"
                                        placeholder="Type here to search" id="myInput" name="myInput"
                                        style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                </div>
                                @foreach($regions as $region)
                                <li><a href="javascript:void(0)"
                                        class="dropdown-select {{$personalInfo->region === $region->region ? 'dropdown-select-active' : '' }}">{{$region->region}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Province<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="province" id="province"
                                value="{{$personalInfo->residence_province}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->residence_province)
                                <p class="p-dropdown-select">{{$personalInfo->residence_province}}</p>
                                @else
                                <p class="p-dropdown-select">Select province</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu" id="provinceOption">

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            City<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="city" id="city"
                                value="{{$personalInfo->residence_municipality}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->residence_municipality)
                                <p class="p-dropdown-select">{{$personalInfo->residence_municipality}}</p>
                                @else
                                <p class="p-dropdown-select">Select city</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu" id="cityOption">

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Barangay<span class="text-danger">*</span></p>
                        <div class="dropdown dropdown-customize">
                            <input type="hidden" name="brgy" id="brgy" value="{{$personalInfo->residence_barangay}}">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                @if($personalInfo->residence_barangay)
                                <p class="p-dropdown-select">{{$personalInfo->residence_barangay}}</p>
                                @else
                                <p class="p-dropdown-select">Select barangay</p>
                                @endif
                            </button>
                            <ul class="dropdown-menu" id="brgyOption">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 personal-input">
                        <p class="text-start p-label">
                            Zip<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter zip no." name="zipNo" id="zipNo" maxlength="4"
                            value="{{$personalInfo->zipNo}}" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 personal-input customize-none">
                    </div>
                    <div class="col-lg-4 personal-input customize-none">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="col-12" id="thirdDiv">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Identification
                    <svg xmlns="http://www.w3.org/2000/svg" id="identificationSuccess" class="d-none" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="identificationDanger" class="d-none" width="56"
                        height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>
            </div>
            <div class="col-12 text-center identification-input-div">
                <div class="row justify-content-center">
                    <div class="col-12 mb-5 uploadID">
                        <input name="upload" type="file" id="fileinput" class="d-none" accept="image/jpeg,image/png" />
                        <button id="uploadID" class="uploadID"><svg xmlns="http://www.w3.org/2000/svg" width="40"
                                height="20" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                <path fill="#ffffff"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                <path fill="#ffffff"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                            </svg> Upload</button>
                    </div>
                    <div class="col-12 mb-5 alert-upload-id uploadID">
                        <p class="alert-upload-id-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="24" fill="currentColor"
                                class="bi bi-info-circle" viewBox="0 0 16 20">
                                <path fill="#848A90"
                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path fill="#848A90"
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg> File must be in JPG or PDF format. Must not be more than 5MB, not less than 15KB
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-12 mb-3 d-none" id="overlay">
                                <div class="progress progress-uploading">
                                    <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                        id="myBar"></div>
                                </div>
                            </div>
                            <div class="col-8 mb-5 personal-input text-start d-none id-div" style="width: 700px;">
                                <div class="row">
                                    <div class="col-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                            fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                            <path fill="#6A6F74" d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                            <path fill="#6A6F74"
                                                d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </div>
                                    <div class="col-10">
                                        <p style="font-size:23px; word-wrap: break-word;" class="upload-file-name">No
                                            file
                                            chosen</p>
                                        <p style="color: #848A90; font-size:16px;" class="upload-file-size d-none"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mb-5 personal-input text-lg-end d-none viewID" style="width: 300px;">
                                <button class="viewID d-none" data-toggle="modal" data-target="#idModal"
                                    style="background: #008080; color: #FFFFFF; padding: 10px 20px; border:none; border-radius: 5px;"
                                    id="viewID"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" fill="#ffffff"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                    </svg> View</button>
                                <button class="d-none" type="button" data-toggle="modal" data-target="#deleteModal"
                                    style="background-color: #ffffff; color: #DD0707; border: 1px solid #DD0707; padding: 10px 20px; border-radius: 5px;"
                                    id="deleteID"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" fill="#DD0707"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                    </svg> Delete</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-6 mb-5 personal-input id-type-div d-none" style="width: 500px;">
                                <p class="text-start p-label" style="width: 475px;">
                                    ID Type<span class="text-danger">*</span></p>
                                <div class="dropdown dropdown-customize">
                                    <input type="hidden" name="idType" id="idType" value="{{$personalInfo->typeofid}}">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                                        style="width: 475px;">
                                        @if($personalInfo->typeofid)
                                        <p class="p-dropdown-select">{{$personalInfo->typeofid}}</p>
                                        @else
                                        <p class="p-dropdown-select">Select ID Type</p>
                                        @endif
                                    </button>
                                    <ul class="dropdown-menu">
                                        <div class="input-icons" style="padding: 5px 15px;">
                                            <i class="fa fa-search icon"
                                                style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i>
                                            <input class="input-field dropdown-search" type="text"
                                                placeholder="Type here to search" id="myInput" name="myInput"
                                                style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;">
                                        </div>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'Philippine Passport' ? 'dropdown-select-active' : '' }}">Philippine
                                                Passport</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === "Driver's License" ? 'dropdown-select-active' : '' }}">Driver's
                                                License</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'SSS/GSIS UNID Card' ? 'dropdown-select-active' : '' }}">SSS/GSIS
                                                UNID Card</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'Philhealth ID' ? 'dropdown-select-active' : '' }}">Philhealth
                                                ID</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'Postal ID' ? 'dropdown-select-active' : '' }}">Postal
                                                ID</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'TIN Card' ? 'dropdown-select-active' : '' }}">TIN
                                                Card</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === "Voter's ID" ? 'dropdown-select-active' : '' }}">Voter's
                                                ID</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'PRC ID' ? 'dropdown-select-active' : '' }}">PRC
                                                ID</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'Senior Citizen ID' ? 'dropdown-select-active' : '' }}">Senior
                                                Citizen ID</a>
                                        </li>
                                        <li><a href="javascript:void(0)"
                                                class="dropdown-select {{$personalInfo->typeofid === 'OFW ID' ? 'dropdown-select-active' : '' }}">OFW
                                                ID</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 mb-5 personal-input id-type-div d-none" style="width: 500px;">
                                <p class="text-start p-label" style="width: 475px;">
                                    ID No.<span class="text-danger">*</span></p>
                                <input type="text" placeholder="Enter ID No." name="idNo" id="idNo" maxlength="50"
                                    value="{{$personalInfo->idno}}" style="background-color: #F5F5F5; width: 475px;">
                                <input type="text" name="uploadTrans" id="uploadTrans" value="create" class="d-none" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-12" id="fourthDiv">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center">Emergency Contact
                    <svg xmlns="http://www.w3.org/2000/svg" id="emergencySuccess" class="d-none" width="56" height="32"
                        fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="emergencyDanger" class="d-none" width="56" height="32"
                        fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg></p>
            </div>
            <div class="col-12 text-center personal-input-div">
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Full Name<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter Full Name" name="emergencyFullName" id="emergencyFullName"
                            maxlength="50" value="{{$personalInfo->emergencyFullName}}"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Relation<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter Relation" name="emergencyRelation" id="emergencyRelation"
                            maxlength="50" value="{{$personalInfo->emergencyRelation}}"
                            style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Mobile<span class="text-danger">*</span></p>
                        <input type="text" placeholder="Enter Mobile" name="emergencyMobile" id="emergencyMobile"
                            maxlength="11" value="{{$personalInfo->emergencyMobile}}"
                            style="background-color: #F5F5F5;">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <div class="row bottom-buttons">
                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">
                        <button class="btn-back" id="back"> Back</button>
                    </div>
                    <div class="col-lg-6 mb-3 text-center text-lg-start bottom-buttons-continue">
                        <button class="btn-continue" id="continue"> Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 modal-pad" style="padding: 15px; font-family: 'Inter';">
                    <div class="row">
                        <div class="col-12 mb-5 text-center">
                            <div class="row justify-content-center">
                                <div
                                    style="background: #FDE1E1;width: 100px;height: 100px;display: inline-block;border: 8px solid #FEF3F2;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                        style="margin: 16px 0px;" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path fill="#BB251A"
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path fill="#BB251A"
                                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 mb-5 text-center">
                            <p class="mb-3"
                                style="font-size: 27px; font-weight: 700; line-height: 23px; color: #2D2727;">Delete
                                Photo</p>
                            <p style="font-size: 16px; font-weight: 500; line-height: 23px; color: #3B3939;">Do you
                                really want to delete the uploaded photo?
                                This process cannot be undone.</p>
                        </div>
                        <div class="col-12 text-center">
                            <button type="button"
                                style="background-color: #ffffff; color: #DD0707; border: 1px solid #DD0707; padding: 10px 20px; border-radius: 5px;"
                                id="confirmDelete"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="30"
                                    fill="currentColor" class="bi bi-arrow-right-short d-none" viewBox="0 0 16 18">
                                    <path fill-rule="evenodd" fill="#DD0707"
                                        d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                                </svg> Delete</button>
                            <button data-dismiss="modal" class="btn-continue"
                                style="background: #008080; color: #FFFFFF; padding: 10px 20px; border:none; border-radius: 5px;">
                                Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="idModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 modal-pad" style="padding: 15px; font-family: 'Inter';">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <p style="font-size: 23px; font-weight: 600; line-height: 23px;">Uploaded ID</p>
                        </div>
                        <div class="col-12 mb-4 text-center">
                            <img src="{{ URL::to('/') }}/images/COCOGEN LOGO.png" width="100%" height="auto"
                                id="preview">
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn-back" type="button" id="cancelFindMyCar" style="background-color: white;"
                                data-dismiss="modal"> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1; // jan=0; feb=1 .......
        var day = dtToday.getDate();
        var year = dtToday.getFullYear() - 18;
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var minDate = (year - 42) + '-' + month + '-' + day;
        var maxDate = year + '-' + month + '-' + day;
        $('#dateOfBirth').attr('max', maxDate);
        $('#dateOfBirth').attr('min', minDate);
    });
</script>
<script>
    $(document).ready(function () {
        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,3})?$/;
            return emailReg.test($email);
        }

        $("input").change(function () {
            $(this).removeClass('danger');
            $(this).css({
                'background': '#F7FCFF'
            });

            $(this).prev().closest('p').css({
                'background': '#F7FCFF',
                'color': ''
            });

            $(this).siblings('button').removeClass('danger');
            $(this).closest('.dropdown').find('button').addClass('button-background');
        });


        $("#viewID").on({
            mouseenter: function () {
                if ($("#viewID").is(':disabled')) {

                } else {
                    $('#viewID > svg').attr("class", "").removeClass('d-none');
                }
            },
            mouseleave: function () {
                $('#viewID > svg').attr("class", "d-none");
            },
            mousedown: function () {
                $('#viewID').children('svg').attr("class", "").removeClass('d-none');
                $('#viewID').css({
                    'background': '#60B3B3'
                });
            },
            mouseup: function () {
                $('#viewID > svg').attr("class", "d-none");
                $(this).css({
                    'background': '#008080'
                });
            },
        });

        $("#confirmDeleteCancel").on({
            mouseenter: function () {
                if ($("#confirmDeleteCancel").is(':disabled')) {

                } else {
                    $('#confirmDeleteCancel > svg').attr("class", "").removeClass('d-none');
                }
            },
            mouseleave: function () {
                $('#confirmDeleteCancel > svg').attr("class", "d-none");
            },
            mousedown: function () {
                $('#confirmDeleteCancel').children('svg').attr("class", "").removeClass('d-none');
                $('#confirmDeleteCancel').css({
                    'background': '#60B3B3'
                });
            },
            mouseup: function () {
                $('#confirmDeleteCancel > svg').attr("class", "d-none");
                $('#confirmDeleteCancel').css({
                    'background': '#008080'
                });
            },
        });

        $("#deleteID").on({
            mouseenter: function () {
                if ($("#deleteID").is(':disabled')) {

                } else {
                    $('#deleteID > svg').attr("class", "").removeClass('d-none');
                }
            },
            mouseleave: function () {
                $('#deleteID > svg').attr("class", "d-none");
            },
            mousedown: function () {
                $('#deleteID').children('svg').attr("class", "").removeClass('d-none');
                $('#deleteID').css({
                    'background': '#FFE2E2'
                });
            },
            mouseup: function () {
                $('#deleteID > svg').attr("class", "d-none");
                $('#deleteID').css({
                    'background': '#ffffff'
                });
            }
        });

        $("#confirmDelete").on({
            mouseenter: function () {
                if ($("#confirmDelete").is(':disabled')) {

                } else {
                    $('#confirmDelete > svg').attr("class", "").removeClass('d-none');
                }
            },
            mouseleave: function () {
                $('#confirmDelete > svg').attr("class", "d-none");
            },
            mousedown: function () {
                $('#confirmDelete').children('svg').attr("class", "").removeClass('d-none');
                $('#confirmDelete').css({
                    'background': '#FFE2E2'
                });
            },
            mouseup: function () {
                $('#confirmDelete > svg').attr("class", "d-none");
                $('#confirmDelete').css({
                    'background': '#ffffff'
                });
            }
        });

        $("#uploadID").on({
            mousedown: function () {
                $('#uploadID').children('svg').attr("class", "").removeClass('d-none');
                $('#uploadID').css({
                    'background': '#EDCADC',
                });
            }
        });

        // function validateEmail($email) {
        //     var emailReg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        //     return emailReg.test($email);
        // }

        $("#emailAddress").change(function () {
            var email = $("#emailAddress").val();
            if (!validateEmail(email)) {
                $("#emailAddress").addClass('danger');
            }
        });

        $("#placeOfBirth").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        // $("#street").on("input", function (event) {
        //     var inputValue = this.value;
        //     this.value = this.value.replace(/[^a-z\s]/gi, "");
        // });

        $("#zipNo").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^0-9\s]/gi, "");
        });

        $("#idNo").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z0-9-\s]/gi, "");
        });

        $("#emergencyFullName").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("#emergencyRelation").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("#emergencyMobile").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^0-9\s]/gi, "");
        });


        $('#firstName').change(function () {
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

                            $('html').animate({
                                scrollTop: eval($("#secondDiv").offset().top - 300)
                            }, 1000);
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

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' &&
                emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            $('html').animate({
                                scrollTop: eval($("#secondDiv").offset().top - 300)
                            }, 1000);
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

            if (firstName !== '' && lastName !== '' && suffix !== '' && contactNumber !== '' &&
                emailAddress !== '') {
                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            $("#contactNumber").removeClass('danger-special');

                            $('#personalDataSuccess').attr("class", "").removeClass('d-none');
                            $('#personalDataDanger').attr("class", "d-none");

                            $('html').animate({
                                scrollTop: eval($("#secondDiv").offset().top - 300)
                            }, 1000);
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

                            $('html').animate({
                                scrollTop: eval($("#secondDiv").offset().top - 300)
                            }, 1000);
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

                            $('html').animate({
                                scrollTop: eval($("#secondDiv").offset().top - 300)
                            }, 1000);
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

        $('#dateOfBirth').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {
                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#gender').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#nationality').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#placeOfBirth').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#country').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#address').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#street').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#region').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#province').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#city').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {

                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#brgy').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {
                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#zipNo').change(function () {
            var dateOfBirth = $("#dateOfBirth").val();
            var gender = $("#gender").val();
            var nationality = $("#nationality").val();
            var placeOfBirth = $("#placeOfBirth").val();
            var country = $("#country").val();
            var address = $("#address").val();
            var street = $("#street").val();
            var region = $("#region").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var brgy = $("#brgy").val();
            var zipNo = $("#zipNo").val();

            if (dateOfBirth !== '' && gender !== '' && nationality !== '' && placeOfBirth !== '' &&
                country !== '' && address !== '' && street !== '' && region !== '' && province !== '' &&
                city !== '' && brgy !== '' && zipNo !== '') {
                $('#additionalPersonalDataSuccess').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#idType').change(function () {
            var idType = $("#idType").val();
            var idNo = $("#idNo").val();
            var uploadTrans = $("#uploadTrans").val();

            if (idType !== '' && idNo !== '' && uploadTrans !== '') {
                $('#identificationSuccess').attr("class", "").removeClass('d-none');
                $('#identificationDanger').attr("class", "d-none");

                $('html').animate({
                    scrollTop: eval($("#fourthDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#idNo').change(function () {
            var idType = $("#idType").val();
            var idNo = $("#idNo").val();
            var uploadTrans = $("#uploadTrans").val();

            if (idType !== '' && idNo !== '' && uploadTrans !== '') {
                $('#identificationSuccess').attr("class", "").removeClass('d-none');
                $('#identificationDanger').attr("class", "d-none");


                $('html').animate({
                    scrollTop: eval($("#fourthDiv").offset().top - 300)
                }, 1000);
            }
        });

        $('#emergencyFullName').change(function () {
            var emergencyFullName = $("#emergencyFullName").val();
            var emergencyRelation = $("#emergencyRelation").val();
            var emergencyMobile = $("#emergencyMobile").val();

            if (emergencyFullName !== '' && emergencyRelation !== '' && emergencyMobile !== '') {
                if (emergencyMobile.substr(0, 2) === '09') {
                    if (emergencyMobile.length === 11) {
                        $("#emergencyMobile").removeClass('danger-special');
                        $('#emergencySuccess').attr("class", "").removeClass('d-none');
                        $('#emergencyDanger').attr("class", "d-none");
                    } else {
                        $("#emergencyMobile").addClass('danger-special');
                        $('#emergencyDanger').attr("class", "").removeClass('d-none');
                        $('#emergencySuccess').attr("class", "d-none");
                    }
                } else {
                    $("#emergencyMobile").addClass('danger-special');
                    $('#emergencyDanger').attr("class", "").removeClass('d-none');
                    $('#emergencySuccess').attr("class", "d-none");
                }
            }
        });

        $('#emergencyRelation').change(function () {
            var emergencyFullName = $("#emergencyFullName").val();
            var emergencyRelation = $("#emergencyRelation").val();
            var emergencyMobile = $("#emergencyMobile").val();

            if (emergencyFullName !== '' && emergencyRelation !== '' && emergencyMobile !== '') {
                if (emergencyMobile.substr(0, 2) === '09') {
                    if (emergencyMobile.length === 11) {
                        $("#emergencyMobile").removeClass('danger-special');
                        $('#emergencySuccess').attr("class", "").removeClass('d-none');
                        $('#emergencyDanger').attr("class", "d-none");
                    } else {
                        $("#emergencyMobile").addClass('danger-special');
                        $('#emergencyDanger').attr("class", "").removeClass('d-none');
                        $('#emergencySuccess').attr("class", "d-none");
                    }
                } else {
                    $("#emergencyMobile").addClass('danger-special');
                    $('#emergencyDanger').attr("class", "").removeClass('d-none');
                    $('#emergencySuccess').attr("class", "d-none");
                }
            }
        });

        $('#emergencyMobile').change(function () {
            var emergencyFullName = $("#emergencyFullName").val();
            var emergencyRelation = $("#emergencyRelation").val();
            var emergencyMobile = $("#emergencyMobile").val();


            if (emergencyMobile.substr(0, 2) === '09') {
                if (emergencyMobile.length === 11) {
                    $("#emergencyMobile").removeClass('danger-special');
                } else {
                    $("#emergencyMobile").addClass('danger-special');
                }
            } else {
                $("#emergencyMobile").addClass('danger-special');
            }


            if (emergencyFullName !== '' && emergencyRelation !== '' && emergencyMobile !== '') {
                if (emergencyMobile.substr(0, 2) === '09') {
                    if (emergencyMobile.length === 11) {
                        $("#emergencyMobile").removeClass('danger-special');
                        $('#emergencySuccess').attr("class", "").removeClass('d-none');
                        $('#emergencyDanger').attr("class", "d-none");
                    } else {
                        $("#emergencyMobile").addClass('danger-special');
                        $('#emergencyDanger').attr("class", "").removeClass('d-none');
                        $('#emergencySuccess').attr("class", "d-none");
                    }
                } else {
                    $("#emergencyMobile").addClass('danger-special');
                    $('#emergencyDanger').attr("class", "").removeClass('d-none');
                    $('#emergencySuccess').attr("class", "d-none");
                }
            }
        });


        if ($('#fileinput').val() === '') {
            jQuery(".upload-file-name").css({
                'color': 'rgb(117, 117, 117)'
            });
        } else {
            jQuery(".upload-file-name").css({
                'color': '#2D2727'
            });
        }

        if ("{{$personalInfo->idOriginalName}}") {

            $(".upload-file-size").removeClass('d-none');

            jQuery(".upload-file-name").css({
                'color': '#2D2727'
            });

            $(".upload-file-name").html("{{$personalInfo->idOriginalName}}");

            if ("{{$personalInfo->idOriginalSize}}".length < 7) {
                var size = `${Math.round(+"{{$personalInfo->idOriginalSize}}"/1024)} KB`
            } else {
                var size = `${(Math.round(+"{{$personalInfo->idOriginalSize}}"/1024)/1000)} MB`
            }

            $('#preview').attr('src', "{{asset('/storage/compre/')}}" + "/{{$personalInfo->idFile}}").fadeIn(
                'slow');

            $(".upload-file-size").html(size);
            $(".uploadID").addClass('d-none');
            $(".viewID").removeClass('d-none');
            $(".id-div").removeClass('d-none');
            $(".id-type-div").removeClass('d-none');
            $("#deleteID").removeClass('d-none');
            $("#uploadTrans").attr('value', 'edit');
        }

        $('#contactNumber').on('keypress', function (e) {
            return e.metaKey || // cmd/ctrl
                e.which <= 0 || // arrow keys
                e.which == 8 || // delete key
                /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        });

        $('#emergencyMobile').on('keypress', function (e) {
            return e.metaKey || // cmd/ctrl
                e.which <= 0 || // arrow keys
                e.which == 8 || // delete key
                /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        });

        $("#emergencyFullName").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g, "");
        });

        $("#emergencyRelation").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g, "");
        });

        jQuery.ajax({
            url: "{{url('/get-quote/auto-excel-plus/get-region')}}",
            method: "GET",
            data: {
                '_token': '{{csrf_token()}}',
            },
            success: function (result) {

                jQuery('#regionOption').empty();

                $('#regionOption').append($(
                    ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                ));

                jQuery.each(result, function (key, value) {
                    if ('{{$personalInfo->region}}' === value.region) {
                        $('#regionOption').append($(
                            '<li><a href="javascript:void(0)" class="dropdown-select dropdown-select-active">' +
                            value.region + '</a></li>'));
                    } else {
                        $('#regionOption').append($(
                            '<li><a href="javascript:void(0)" class="dropdown-select">' +
                            value.region + '</a></li>'));
                    }
                })

                $('.dropdown-select').click(function (e) {
                    e.preventDefault();
                    $(this).closest('.dropdown').find('a').removeClass(
                        'dropdown-select-active');
                    $(this).closest('.dropdown').find('input').val($(this).text()).trigger(
                        'change');
                    $(this).closest('.dropdown').find('button > p').text($(this).text());
                    $(this).addClass('dropdown-select-active');
                    $(this).closest('.dropdown').find('button').addClass(
                        'button-background');
                    $(this).closest('.dropdown').siblings('.p-label').css({
                        'background': '#F7FCFF'
                    });
                });

                $.ajax({
                    url: "{{url('/get-quote/auto-excel-plus/get-province')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        region: $('#region').val(),
                    },
                    success: function (result) {

                        jQuery('#provinceOption').empty();

                        $('#provinceOption').append($(
                            ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                        ));

                        jQuery.each(result, function (key, value) {
                            if ('{{$personalInfo->residence_province}}' ===
                                value.province) {
                                $('#provinceOption').append($(
                                    '<li><a href="javascript:void(0)" class="dropdown-select dropdown-select-active">' +
                                    value.province + '</a></li>'));
                            } else {
                                $('#provinceOption').append($(
                                    '<li><a href="javascript:void(0)" class="dropdown-select">' +
                                    value.province + '</a></li>'));
                            }
                        })

                        $.ajax({
                            url: "{{url('/api/covid/city/get')}}",
                            method: "GET",
                            data: {
                                '_token': '{{csrf_token()}}',
                                province: $('#province').val(),
                            },
                            success: function (result) {

                                jQuery('#cityOption').empty();

                                $('#cityOption').append($(
                                    ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                                ));

                                jQuery.each(result, function (key, value) {
                                    if ('{{$personalInfo->residence_municipality}}' ===
                                        value.city) {
                                        $('#cityOption').append($(
                                            '<li><a href="javascript:void(0)" class="dropdown-select dropdown-select-active">' +
                                            value.city +
                                            '</a></li>'));
                                    } else {
                                        $('#cityOption').append($(
                                            '<li><a href="javascript:void(0)" class="dropdown-select">' +
                                            value.city +
                                            '</a></li>'));
                                    }
                                })

                                jQuery.ajax({
                                    url: "{{url('/api/covid/barangay/get')}}",
                                    method: "GET",
                                    data: {
                                        '_token': '{{csrf_token()}}',
                                        city: $("#city").val(),
                                    },
                                    success: function (result) {

                                        jQuery('#brgyOption')
                                            .empty();

                                        $('#brgyOption').append(
                                            $(
                                                ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                                            )
                                        );

                                        jQuery.each(result,
                                            function (key,
                                                value) {
                                                if ('{{$personalInfo->residence_barangay}}' ===
                                                    value
                                                    .barangay
                                                ) {
                                                    $('#brgyOption')
                                                        .append(
                                                            $(
                                                                '<li><a href="javascript:void(0)" class="dropdown-select dropdown-select-active">' +
                                                                value
                                                                .barangay +
                                                                '</a></li>'
                                                            )
                                                        );
                                                } else {
                                                    $('#brgyOption')
                                                        .append(
                                                            $(
                                                                '<li><a href="javascript:void(0)" class="dropdown-select">' +
                                                                value
                                                                .barangay +
                                                                '</a></li>'
                                                            )
                                                        );
                                                }
                                            })

                                        $(".dropdown-search")
                                            .keyup(function () {
                                                var input,
                                                    filter,
                                                    ul, li,
                                                    a, i;
                                                filter = $(
                                                        this
                                                    )
                                                    .val()
                                                    .toUpperCase();
                                                div = $(
                                                        this
                                                    )
                                                    .closest(
                                                        '.dropdown-menu'
                                                    );
                                                a = div
                                                    .find(
                                                        "a"
                                                    );
                                                for (i =
                                                    0; i < a
                                                    .length; i++
                                                ) {
                                                    txtValue
                                                        = a[
                                                            i
                                                        ]
                                                        .textContent ||
                                                        a[i]
                                                        .innerText;
                                                    if (txtValue
                                                        .toUpperCase()
                                                        .indexOf(
                                                            filter
                                                        ) >
                                                        -1
                                                    ) {
                                                        a[i].style
                                                            .display =
                                                            "";
                                                    } else {
                                                        a[i].style
                                                            .display =
                                                            "none";
                                                    }
                                                }
                                            });

                                        $('.dropdown-select')
                                            .click(function (
                                                e) {
                                                e
                                                    .preventDefault();
                                                $(this)
                                                    .closest(
                                                        '.dropdown-menu'
                                                    )
                                                    .removeClass(
                                                        'show'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'a')
                                                    .removeClass(
                                                        'dropdown-select-active'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'input'
                                                    )
                                                    .val($(
                                                            this
                                                        )
                                                        .text()
                                                    )
                                                    .trigger(
                                                        'change'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'button > p'
                                                    )
                                                    .text($(
                                                            this
                                                        )
                                                        .text()
                                                    );
                                                $(this)
                                                    .addClass(
                                                        'dropdown-select-active'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'button'
                                                    )
                                                    .addClass(
                                                        'button-background'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .siblings(
                                                        '.p-label'
                                                    )
                                                    .css({
                                                        'background': '#F7FCFF'
                                                    });
                                            });

                                        $('.dropdown-select')
                                            .click(function (
                                                e) {
                                                e
                                                    .preventDefault();
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'a')
                                                    .removeClass(
                                                        'dropdown-select-active'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'input'
                                                    )
                                                    .val($(
                                                            this
                                                        )
                                                        .text()
                                                    )
                                                    .trigger(
                                                        'change'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'button > p'
                                                    )
                                                    .text($(
                                                            this
                                                        )
                                                        .text()
                                                    );
                                                $(this)
                                                    .addClass(
                                                        'dropdown-select-active'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .find(
                                                        'button'
                                                    )
                                                    .addClass(
                                                        'button-background'
                                                    );
                                                $(this)
                                                    .closest(
                                                        '.dropdown'
                                                    )
                                                    .siblings(
                                                        '.p-label'
                                                    )
                                                    .css({
                                                        'background': '#F7FCFF'
                                                    });
                                            });
                                    }
                                })

                            }
                        })
                    }
                })
            }
        })


        $('#region').change(function () {
            if (jQuery(this).val() != '') {
                var region = jQuery(this).val();
                $('#province').siblings('button').children('p').text('Select province');
                $('#province').val('');
                $('#city').siblings('button').children('p').text('Select city');
                $('#city').val('');
                $('#brgy').siblings('button').children('p').text('Select brgy');
                $('#brgy').val('');
                jQuery.ajax({
                    url: "{{url('/get-quote/auto-excel-plus/get-province')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        region: region
                    },
                    success: function (result) {
                        jQuery('#provinceOption').empty();

                        $('#provinceOption').append($(
                            ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                        ));
                        jQuery.each(result, function (key, value) {
                            $('#provinceOption').append($(
                                '<li><a href="javascript:void(0)" class="dropdown-select">' +
                                value.province + '</a></li>'));
                        })

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
                            $(this).closest('.dropdown').siblings('.p-label').css({
                                'background': '#F7FCFF'
                            });
                        });

                        $('.dropdown-select').click(function (e) {
                            e.preventDefault();
                            $(this).closest('.dropdown').find('a').removeClass(
                                'dropdown-select-active');
                            $(this).closest('.dropdown').find('input').val($(this)
                                .text()).trigger('change');
                            $(this).closest('.dropdown').find('button > p').text($(
                                this).text());
                            $(this).addClass('dropdown-select-active');
                            $(this).closest('.dropdown').find('button').addClass(
                                'button-background');
                            $(this).closest('.dropdown').siblings('.p-label').css({
                                'background': '#F7FCFF'
                            });
                        });
                    }
                })
            }
        });

        $('#province').change(function () {
            if (jQuery(this).val() != '') {
                var province = jQuery(this).val();
                $('#city').siblings('button').children('p').text('Select city');
                $('#city').val('');
                $('#brgy').siblings('button').children('p').text('Select brgy');
                $('#brgy').val('');
                jQuery.ajax({
                    url: "{{url('/api/covid/city/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        province: province
                    },
                    success: function (result) {
                        jQuery('#cityOption').empty();
                        $('#cityOption').append($(
                            ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                        ));
                        jQuery.each(result, function (key, value) {
                            $('#cityOption').append($(
                                '<li><a href="javascript:void(0)" class="dropdown-select">' +
                                value.city + '</a></li>'));
                        })

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
                            $(this).closest('.dropdown').siblings('.p-label').css({
                                'background': '#F7FCFF'
                            });
                        });

                        $('.dropdown-select').click(function (e) {
                            e.preventDefault();
                            $(this).closest('.dropdown').find('a').removeClass(
                                'dropdown-select-active');
                            $(this).closest('.dropdown').find('input').val($(this)
                                .text()).trigger('change');
                            $(this).closest('.dropdown').find('button > p').text($(
                                this).text());
                            $(this).addClass('dropdown-select-active');
                            $(this).closest('.dropdown').find('button').addClass(
                                'button-background');
                            $(this).closest('.dropdown').siblings('.p-label').css({
                                'background': '#F7FCFF'
                            });
                        });
                    }
                })
            }
        });

        $('#city').change(function () {
            if (jQuery(this).val() != '') {
                var city = jQuery(this).val();
                $('#brgy').siblings('button').children('p').text('Select brgy');
                $('#brgy').val('');
                jQuery.ajax({
                    url: "{{url('/api/covid/barangay/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        city: city
                    },
                    success: function (result) {
                        jQuery('#brgyOption').empty();
                        $('#brgyOption').append($(
                            ' <div class="input-icons" style="padding: 5px 15px;"><i class="fa fa-search icon" style=" padding: 10px 15px 20px 10px; min-width: 40px; color: #585858; transform: rotate(82deg); font-weight: 100; font-size: 14px;"></i><input class="input-field dropdown-search" type="text" placeholder="Type here to search" id="myInput" name="myInput" style="background-color: #F5F5F5; border:none !important; padding: 5px !important; padding-left: 40px !important; border-radius: 5px !important; font-size: 16px;"></div>'
                        ));
                        jQuery.each(result, function (key, value) {
                            $('#brgyOption').append($(
                                '<li><a href="javascript:void(0)" class="dropdown-select">' +
                                value.barangay + '</a></li>'));
                        })

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
                            $(this).closest('.dropdown').siblings('.p-label').css({
                                'background': '#F7FCFF'
                            });
                        });

                        $('.dropdown-select').click(function (e) {
                            e.preventDefault();
                            $(this).closest('.dropdown').find('a').removeClass(
                                'dropdown-select-active');
                            $(this).closest('.dropdown').find('input').val($(this)
                                .text()).trigger('change');
                            $(this).closest('.dropdown').find('button > p').text($(
                                this).text());
                            $(this).addClass('dropdown-select-active');
                            $(this).closest('.dropdown').find('button').addClass(
                                'button-background');
                            $(this).closest('.dropdown').siblings('.p-label').css({
                                'background': '#F7FCFF'
                            });
                        });
                    }
                })
            }
        });

        $('#continue').click(function (e) {
            e.preventDefault();
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var suffix = $('#suffix').val();
            var contactNumber = $('#contactNumber').val();
            var emailAddress = $('#emailAddress').val();


            var dateOfBirth = $('#dateOfBirth').val();
            var gender = $('#gender').val();
            var nationality = $('#nationality').val();
            var placeOfBirth = $('#placeOfBirth').val();
            var country = $('#country').val();

            var address = $('#address').val();
            var street = $('#street').val();
            var region = $('#region').val();
            var province = $('#province').val();
            var city = $('#city').val();
            var brgy = $('#brgy').val();
            var zipNo = $('#zipNo').val();

            var fileinput = $('#fileinput').val();
            var uploadTrans = $('#uploadTrans').val();
            var idType = $('#idType').val();
            var idNo = $('#idNo').val();

            var emergencyFullName = $('#emergencyFullName').val();
            var emergencyRelation = $('#emergencyRelation').val();
            var emergencyMobile = $('#emergencyMobile').val();

            if (firstName === '') {
                $("#firstName").addClass('danger');

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }

            if (lastName === '') {
                $("#lastName").addClass('danger');

                $('#personalDataDanger').attr("class", "").removeClass('d-none');
                $('#personalDataSuccess').attr("class", "d-none");
            }

            if (suffix === '') {
                $("#suffix").siblings('button').addClass('danger');

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

            if (dateOfBirth === '') {
                $("#dateOfBirth").addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (gender === '') {
                $("#gender").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (nationality === '') {
                $("#nationality").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (placeOfBirth === '') {
                $("#placeOfBirth").addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (country === '') {
                $("#country").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (address === '') {
                $("#address").addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (street === '') {
                $("#street").addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (region === '') {
                $("#region").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (province === '') {
                $("#province").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (city === '') {
                $("#city").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (brgy === '') {
                $("#brgy").siblings('button').addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (zipNo === '') {
                $("#zipNo").addClass('danger');

                $('#additionalPersonalDataDanger').attr("class", "").removeClass('d-none');
                $('#additionalPersonalDataSuccess').attr("class", "d-none");
            }

            if (fileinput === '') {
                if (uploadTrans === '') {
                    $('#identificationDanger').attr("class", "").removeClass('d-none');
                    $('#identificationSuccess').attr("class", "d-none");
                }
            }

            if (idType === '') {
                $("#idType").siblings('button').addClass('danger');

                $('#identificationDanger').attr("class", "").removeClass('d-none');
                $('#identificationSuccess').attr("class", "d-none");
            }

            if (idNo === '') {
                $("#idNo").addClass('danger');

                $('#identificationDanger').attr("class", "").removeClass('d-none');
                $('#identificationSuccess').attr("class", "d-none");
            }

            if (emergencyFullName === '') {
                $("#emergencyFullName").addClass('danger');

                $('#emergencyDanger').attr("class", "").removeClass('d-none');
                $('#emergencySuccess').attr("class", "d-none");
            }

            if (emergencyRelation === '') {
                $("#emergencyRelation").addClass('danger');

                $('#emergencyDanger').attr("class", "").removeClass('d-none');
                $('#emergencySuccess').attr("class", "d-none");
            }

            if (emergencyMobile === '') {
                $("#emergencyMobile").addClass('danger');

                $('#emergencyDanger').attr("class", "").removeClass('d-none');
                $('#emergencySuccess').attr("class", "d-none");
            }

            if (firstName === '' || lastName === '' || suffix === '' || contactNumber === '' ||
                emailAddress === '') {
                $('html').animate({
                    scrollTop: eval($("#firstDiv").offset().top - 300)
                }, 1000);
            } else if (dateOfBirth === '' || placeOfBirth === '' || gender === '' || address === '' ||
                street === '' || region === '' || brgy === '' || city === '' || province === '' ||
                zipNo === '') {
                $('html').animate({
                    scrollTop: eval($("#secondDiv").offset().top - 300)
                }, 1000);
            } else if (idNo === '' || idType === '' || uploadTrans === '') {
                $('html').animate({
                    scrollTop: eval($("#thirdDiv").offset().top - 300)
                }, 1000);
            } else if (emergencyFullName === '' || emergencyRelation === '' || emergencyMobile === '') {
                $('html').animate({
                    scrollTop: eval($("#fourthDiv").offset().top - 300)
                }, 1000);
            } else {

            }

            if (firstName !== "" &&
                lastName !== "" &&
                suffix !== "" &&
                contactNumber !== "" &&
                emailAddress !== "" &&
                dateOfBirth !== "" &&
                gender !== "" &&
                nationality !== "" &&
                placeOfBirth !== "" &&
                country !== "" &&
                address !== "" &&
                street !== "" &&
                region !== "" &&
                brgy !== "" &&
                city !== "" &&
                province !== "" &&
                zipNo !== "" &&
                idType !== "" &&
                idNo !== "" &&
                uploadTrans !== "" &&
                emergencyFullName !== "" &&
                emergencyRelation !== "" &&
                emergencyMobile !== ""
            ) {

                if (validateEmail(emailAddress)) {
                    if (contactNumber.substr(0, 2) === '09') {
                        if (contactNumber.length === 11) {
                            if (emergencyMobile.substr(0, 2) === '09') {
                                if (emergencyMobile.length === 11) {
                                    $("#compreFormStep3").attr('action',
                                        "{{ url('/get-quote/auto-excel-plus/summary-auto-excel')}}");

                                    $("#compreFormStep3").submit();
                                } else {
                                    $("#emergencyMobile").addClass('danger-special');
                                    $('#emergencyDanger').attr("class", "").removeClass('d-none');
                                    $('#emergencySuccess').attr("class", "d-none");
                                }
                            } else {
                                $("#emergencyMobile").addClass('danger-special');
                                $('#emergencyDanger').attr("class", "").removeClass('d-none');
                                $('#emergencySuccess').attr("class", "d-none");
                            }
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

            } else {
                $("#continue").attr("disabled", true);
            }
        });

        $('#back').click(function (e) {
            e.preventDefault();
            $("#compreFormStep3").attr('action',
                "{{ url('/get-quote/auto-excel-plus/additional-car-information')}}");

            $("#compreFormStep3").submit();
        });

        $("#uploadID").click(function (e) {
            e.preventDefault();
            $('#fileinput').trigger('click');
            $(".upload-file-size").addClass('d-none');
            $(".upload-file-size").html();
        });

        $("#changeID").click(function (e) {
            e.preventDefault();
            $('#fileinput').trigger('click');
        });


        $("#fileinput").on('change', function (e) {
            e.preventDefault();
            var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');

            var input = $(this)[0];

            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }

            jQuery(".upload-file-name").css({
                'color': '#2D2727'
            });

            let fileSize = input.files[0].size.toString();

            if (fileSize.length < 7) {
                var size = `${Math.round(+fileSize/1024)} KB`
            } else {
                var size = `${(Math.round(+fileSize/1024)/1000)} MB`
            }

            $('#overlay').removeClass('d-none');
            $('#overlay').css({
                'display': 'block'
            });

            jQuery("#myBar").css({
                'width': '0%'
            });

            $('#myBar').animate({
                width: '100%'
            }, 2000);
            setTimeout(function () {
                $('#overlay').fadeOut();
                $("#viewID").removeClass('d-none');
                $("#deleteID").removeClass('d-none');
                $(".id-type-div").removeClass('d-none');
            }, 3000);

            $(".upload-file-name").html(filename);
            $(".upload-file-size").removeClass('d-none');
            $(".upload-file-size").html(size);
            $(".viewID").removeClass('d-none');
            $("#viewID").addClass('d-none');
            $(".uploadID").addClass('d-none');
            $(".id-div").removeClass('d-none');
            $("#uploadTrans").attr('value', 'create');
        })

        $("#confirmDelete").click(function (e) {
            e.preventDefault();
            $("#uploadTrans").attr('value', '');
            $('#fileinput').val('');
            $(".upload-file-size").addClass('d-none');
            $(".upload-file-size").html();
            $(".upload-file-name").html('No file chosen');
            $(".uploadID").removeClass('d-none');
            $(".viewID").addClass('d-none');
            $(".id-div").addClass('d-none');
            $("#deleteID").addClass('d-none');
            $(".id-type-div").addClass('d-none');
            $("#idNo").val('');
            $('#idType').siblings('button').children('p').text('Select ID Type');
            $(".id-type-div").addClass('d-none');
            $('#uploadID').css({
                'background': '#E4509A',
            });

            $('#identificationSuccess').attr("class", "d-none");

            jQuery('#deleteModal').modal('toggle');
        });

        $("#viewID").click(function (e) {
            e.preventDefault();

        });

        $("#firstName").trigger('change').val('{{$personalInfo->firstName}}');
        $("#lastName").trigger('change').val('{{$personalInfo->lastName}}');
        $("#suffix").trigger('change').val('{{$personalInfo->suffix}}');

        if ('{{$personalInfo->contactNo}}') {
            $("#contactNumber").trigger('change').val('{{$personalInfo->contactNo}}');
        }

        if ('{{$personalInfo->emailAddress}}') {
            $("#emailAddress").trigger('change').val('{{$personalInfo->emailAddress}}');
        }

        if ('{{$personalInfo->birthDate}}') {
            $("#dateOfBirth").trigger('change').val('{{$personalInfo->birthDate}}');
            $('.icon-bday-default').css('display', 'none');
            $('.icon-bday-checked').css('display', '');
        }

        if ('{{$personalInfo->gender}}') {
            $("#gender").trigger('change').val('{{$personalInfo->gender}}');
        }

        if ('{{$personalInfo->nationality}}') {
            $("#nationality").trigger('change').val('{{$personalInfo->nationality}}');
        }

        if ('{{$personalInfo->palceofbirth}}') {
            $("#placeOfBirth").trigger('change').val('{{$personalInfo->palceofbirth}}');
        }

        if ('{{$personalInfo->country}}') {
            $("#country").trigger('change').val('{{$personalInfo->country}}');
        }

        if ('{{$personalInfo->residence_address}}') {
            $("#address").trigger('change').val('{{$personalInfo->residence_address}}');
        }

        if ('{{$personalInfo->street}}') {
            $("#street").trigger('change').val('{{$personalInfo->street}}');
        }

        if ('{{$personalInfo->region}}') {
            $("#region").siblings('button').removeClass('danger');
            $("#region").closest('.dropdown').find('button').addClass('button-background');
        }

        if ('{{$personalInfo->residence_province}}') {
            $("#province").siblings('button').removeClass('danger');
            $("#province").closest('.dropdown').find('button').addClass('button-background');
        }

        if ('{{$personalInfo->residence_municipality}}') {
            $("#city").siblings('button').removeClass('danger');
            $("#city").closest('.dropdown').find('button').addClass('button-background');
        }

        if ('{{$personalInfo->residence_barangay}}') {
            $("#brgy").siblings('button').removeClass('danger');
            $("#brgy").closest('.dropdown').find('button').addClass('button-background');
        }

        if ('{{$personalInfo->zipNo}}') {
            $("#zipNo").trigger('change').val('{{$personalInfo->zipNo}}');
        }

        if ('{{$personalInfo->idno}}') {
            $("#idNo").trigger('change').val('{{$personalInfo->idno}}');
        }

        if ('{{$personalInfo->emergencyFullName}}') {
            $("#emergencyFullName").trigger('change').val('{{$personalInfo->emergencyFullName}}');
        }

        if ('{{$personalInfo->emergencyRelation}}') {
            $("#emergencyRelation").trigger('change').val('{{$personalInfo->emergencyRelation}}');
        }

        if ('{{$personalInfo->emergencyMobile}}') {
            $("#emergencyMobile").trigger('change').val('{{$personalInfo->emergencyMobile}}');
        }
    });
</script>
<script>
    const yearSelectbday = document.getElementById('yearbday');
    const monthSelectbday = document.getElementById('monthbday');
    const daysContainerbday = document.getElementById('daysbday');
    const selectedDateInputsbday = document.querySelectorAll('.birdthday'); // Select by class
    const datePickerbday = document.getElementById('date-picker-bday');

    let dateselectedbday = null;
        let dateOldBday = "";
        let activeInputbday = null;

    const currentDate = new Date();
    const minAge = 18; // Minimum age
    const maxAge = 60; // Maximum age

    const minDate = new Date(currentDate.getFullYear() - maxAge, currentDate.getMonth(), currentDate.getDate());
    const maxDate = new Date(currentDate.getFullYear() - minAge, currentDate.getMonth(), currentDate.getDate());

    function populateYearbday() {

        for (let year = minDate.getFullYear(); year <= maxDate.getFullYear(); year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelectbday.appendChild(option);
        }
        yearSelectbday.value = maxDate.getFullYear();
    }

    function populateMonthbday() {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        monthNames.forEach((month, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = month;
            monthSelectbday.appendChild(option);
        });
        monthSelectbday.value = maxDate.getMonth();
    }

    function isDateDisabled(date) {
        return date < minDate || date > maxDate;
    }

    function updateDaysbday() {
        $('#applybday').prop('disabled', true);
        const year = parseInt(yearSelectbday.value);
        const month = parseInt(monthSelectbday.value);
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();


        daysContainerbday.innerHTML = '';
        // Fill in empty spaces for the first week
        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement('div');
            daysContainerbday.appendChild(emptyDiv);
        }
        // Create day elements
        for (let day = 1; day <= daysInMonth; day++) {
            const dayDiv = document.createElement('div');
            const date = new Date(year, month, day);
            const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            dayDiv.textContent = day;
            dayDiv.classList.add('daybday');

            // Disable dates outside the age range
            if (isDateDisabled(date)) {
                dayDiv.classList.add('disabled');
                dayDiv.onclick = () => {};
            } else if (dateString === document.getElementById("dateOfBirth").value) {
                dayDiv.classList.add('selected');
            } else {
                dayDiv.onclick = () => {
                    $('#applybday').prop('disabled', false);
                    const selectedDays = document.querySelectorAll('.daybday.selected');
                    selectedDays.forEach(selectedDay => selectedDay.classList.remove('selected'));
                    dayDiv.classList.add('selected');

                    if (activeInputbday) {
                        dateselectedbday = dateString;
                    }
                };
            }

            daysContainerbday.appendChild(dayDiv);
        }
    }

    monthSelectbday.onchange = updateDaysbday;
    yearSelectbday.onchange = updateDaysbday;

    document.getElementById('applybday').onclick = () => {
            $('.icon-bday-default').css('display', 'none');
            $('.icon-bday-checked').css('display', '');

        activeInputbday.value = dateselectedbday;
        dateOldBday=dateselectedbday;
        datePickerbday.style.display = 'none';
    };

    document.getElementById('closebday').onclick = () => {
        if(dateOldBday){
                    activeInputbday.value =dateOldBday;
                }else{
                    activeInputbday.value ="";
                }
            datePickerbday.style.display = 'none';
    };

    selectedDateInputsbday.forEach(input => {
        input.onfocus = () => {
            activeInputbday = input;
            const rect = input.getBoundingClientRect();
            datePickerbday.style.display = 'block';
            // datePickerbday.style.top = `${rect.bottom + window.scrollY-600}px`;
            // datePickerbday.style.top = `${57}px`;

            // datePickerbday.style.left = `${rect.left}px`;
            updateDaysbday();
        };

        input.onblur = () => {
            setTimeout(() => {
                // datePickerbday.style.display = 'none';
            }, 100);
        };

        // Prevent pasting into the textbox
        input.onpaste = (e) => {
            e.preventDefault();
        };
    });

    populateYearbday();
    populateMonthbday();
    updateDaysbday();
</script>
@endsection