@extends('getaquote.new.compre.index')
@section('compre-section')

<style>
    .mortgage-div {
        margin-top: -45px;
    }

    .mortgage-label {
        margin-bottom: 30px;
        margin-left: 45px;
        font-size: 13px;
    }

    .active-mortgagee {
        padding: 10px 25px;
        border-radius: 25px;
        border: 1px solid #E4509A;
        background: #E4509A;
        color: #ffffff;
    }

    .inactive-mortgagee {
        padding: 10px 25px;
        border-radius: 25px;
        border: 1px solid #E4509A;
        color: #E4509A;
        background-color: #F7FCFF;
    }

    .inactive-mortgagee:hover {
        background: #E4509A;
        color: #ffffff;
    }

    .nav-tabs .nav-item button.active:before {
        display: none;
    }

    .nav-modal {
        background-color: #ffffff !important;
        font-size: 20px !important;
    }

    .nav-tabs {
        border-bottom: none !important;
    }

    .nav-tabs > li {
        margin-bottom: 1px !important;
    }

    .nav-tabs .nav-item button.active {
        border-bottom: 1px solid !important;
        border-radius: 0 !important;
        color: #008080 !important;
        background: #F0FFFF !important;
    }

    .nav-tabs .nav-item {
        margin: 0;
    }

    .nav-tabs .nav-item button {
        padding: 5px 25px;
        text-align: center;
        font-weight: 700;
        border: none;
        color: #90CCCC;
        border-bottom: 1px solid #90CCCC;
        border-radius: 0;
        font-size: 16px !important;
    }

    .old-registration {
        width: 480px;
        height: 215px;
    }
    .new-registration {
        width: 480px; 
        height: 300px;
    }

    .car-information-modal-title {
        font-size: 23px; 
        font-weight: 600; 
        line-height: 24.84px;
    }

    .car-information-modal-message {
        font-size: 15px; 
        font-weight: 400; 
        line-height: 24px;
    }

    @media (max-width: 991px) {
        .mortgage-div {
            margin-top: -25px !important;
        }

        .mortgage-label {
            margin-bottom: 15px !important;
        }

        .old-registration {
            width: 300px !important;
            height: 135px !important;
        }

        .new-registration {
            width: 300px !important;
            height: 180px !important;
        }

        .car-information-modal-title {
            font-size: 21px !important; 
        }

        .car-information-modal-message {
            font-size: 14px !important; 
        }
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
        z-index: 99;
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
<form method="post" action="{{ url('/get-quote/auto-excel-plus/personal-data')}}" enctype="multipart/form-data"
    id="compreFormStep2Additional" autocomplete="off">
    {{method_field('GET')}}
    <section class="col-12" id="firstDiv">
        <div class="row">
            <div class="col-12 personal-div">
                <p class="div-title text-center mb-5">Additional Car Information
                    <svg xmlns="http://www.w3.org/2000/svg" id="additionalCarSuccess" class="d-none" width="56"
                        height="32" fill="#039855" class="bi bi-check-circle-fill" viewBox="0 0 24 24">
                        <path fill="#039855"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" id="additionalCarDanger" class="d-none" width="56"
                        height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 24 24">
                        <path fill="#DD0707"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                    </svg>
                </p>
                <p class="text-center" style="font-size: 17px; line-height: 24px; font-weight: 600;">You can find car
                    information <a href="javascript:void(0)" style="color: #E4509A;" id="showModal"
                        data-toggle="modal" data-target="#informationHere">here</a></p>

            </div>
            <div class="col-12 text-center personal-input-div">
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <input type="hidden" value="{{$trans_no}}" id="transNo" name="transNo">
                        <input type="hidden" value="additionalCar" id="page" name="page">
                        <p class="text-start p-label">
                            MV File No.<span class="text-danger">*</span></p>

                        <input type="text" name="mvFileNo" maxlength="50" id="mvFileNo" value="{{$addtlcarinfo->mvFileNo}}"
                            placeholder="Enter mv file no" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Plate No.<span class="text-danger">*</span></p>
                        <input type="text" name="plateNo" id="plateNo" maxlength="50" value="{{$addtlcarinfo->plateNo}}"
                            placeholder="ABC-123" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Engine No.<span class="text-danger">*</span></p>
                        <input type="text" name="engineNo" id="engineNo" maxlength="50" value="{{$addtlcarinfo->engineNo}}"
                            placeholder="Enter engine no." style="background-color: #F5F5F5;">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Body Type<span class="text-danger">*</span></p>
                        <input type="text" name="bodyType" id="bodyType" maxlength="50" value="{{$addtlcarinfo->bodyType}}"
                            placeholder="Enter body type" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Color<span class="text-danger">*</span></p>
                        <input type="text" name="color" id="color" maxlength="50" value="{{$addtlcarinfo->color}}"
                            placeholder="Enter color" style="background-color: #F5F5F5;">
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Chasis No.<span class="text-danger">*</span></p>
                        <input type="text" name="chasisNo" maxlength="50" id="chasisNo" value="{{$addtlcarinfo->chassisNo}}"
                            placeholder="Enter chassis no." style="background-color: #F5F5F5;">
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label" style="background: #f5f5f5 !important;">
                            Authorized Seating Capacity<span class="text-danger">*</span></p>
                        <input type="text" name="capacity" maxlength="2" id="capacity" value="{{$addtlcarinfo->seatingNo}}" style="background: #f5f5f5 !important;"
                            placeholder="Enter seating capacity" disabled>
                    </div>
                    <div class="col-lg-4 mb-5 personal-input customize-none"></div>
                    <div class="col-lg-4 mb-5 personal-input customize-none"></div>
                </div>
                <div class="row justify-content-center">
                    <!-- <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Policy Inception Date<span class="text-danger">*</span></p>
                        <input type="date" name="policyDate" id="policyDate" placeholder="Enter mv file no"
                            value="{{$addtlcarinfo->inceptDate}}" style="background-color: #F5F5F5; line-height: 24px;">
                    </div> -->
                    <div class="col-lg-4 mb-5 personal-input">
        <div class="form-group">
            <p class="text-start p-label">Policy Inception Date<span class="text-danger">*</span></p>
            <input  id="policyDate" name="policyDate" value="{{$addtlcarinfo->inceptDate}}" onkeydown="return false" type="text" placeholder="Policy Inception Date" class="birdthday cp-spacing-input">
            <svg class="icon-bday icon-bday-default" id="icon-bday-default" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z"/>
            </svg>

            <svg class="icon-bday-checked d-none" id="icon-bday-checked" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1ZM8.604 7.354l-3 3a.502.502 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L5.25 9.293l2.646-2.647a.5.5 0 1 1 .708.708ZM1 4V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2H1Z"/>
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
            <button id="applybday" type="button" class="calendar-apply btn" >Apply</button>
        </div>
    </div>
    </div>
                    <div class="col-lg-4 mb-5 personal-input mortgage-div">
                        <p class="text-start mortgage-label">Mortgagee</p>
                        <div class="d-flex justify-content-evenly">
                            <input type="hidden" name="btnMortgagee" id="btnMortgagee" value="default">
                            <button class="inactive-mortgagee" id="yesMortgagee"><svg id="noGuardSvg"
                                    xmlns="http://www.w3.org/2000/svg" width="40" height="24" fill="currentColor"
                                    class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                                    <path fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>Yes</button>
                            <button class="inactive-mortgagee" id="noMortgagee"><svg id="noGuardSvg"
                                    xmlns="http://www.w3.org/2000/svg" width="40" height="24" fill="currentColor"
                                    class="bi bi-check-circle-fill d-none" viewBox="0 0 16 16">
                                    <path fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>No</button>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 personal-input">
                        <p class="text-start p-label">
                            Mortgagee<span class="text-danger d-none" id="optionalMortgagee">*</span></p>
                        <input type="text" name="mortgagee" id="mortgagee" maxlength="50" placeholder="Enter mortgagee"
                            value="{{$addtlcarinfo->mortgagee_name}}" style="background-color: #F5F5F5;">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center" style="background-color: #F7FCFF; height: 156px;">
                <div class="row bottom-buttons">
                    <div class="col-lg-6 mb-3 text-center text-lg-end bottom-buttons-back">    
                        <button class="btn-back" id="back"> Back</button>
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

<div class="modal fade" id="informationHere" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12 modal-pad" style="padding: 30px 40px; font-family: 'Inter';">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <p class="car-information-modal-title">Car Information</p>
                        </div>
                        <div class="col-12 mb-3">
                            <p class="car-information-modal-message">For
                            You can find your car information from ORCR document</p>
                        </div>
                        <div class="col-12 mb-4">
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content: center;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link nav-modal active" id="home-tab" data-toggle="tab" data-target="#home"
                                        type="button" role="tab" aria-controls="home" aria-selected="true">Old</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link nav-modal" id="profile-tab" data-toggle="tab" data-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">New</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active text-center" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <img src="{{ URL::to('/') }}/images/old-registration.png" class="old-registration" style="object-fit: cover; object-position: top;">
                                </div>
                                <div class="tab-pane fade text-center" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <img src="{{ URL::to('/') }}/images/new-registration.png" class="new-registration" style="object-fit: cover; object-position: top;">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn-back" type="button"
                                style="background-color: white;" data-dismiss="modal"> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $("input").change(function () {
            $(this).removeClass('danger');
            
            $(this).siblings('button').removeClass('danger');

            $("#continue").attr("disabled", false);
        });


        if('{{$addtlcarinfo->seatingNo}}') {
            $("#capacity").trigger('change');
            // $("#capacity").trigger('change').val('{{$addtlcarinfo->seatingNo}}');
            // $("#capacity").siblings('button').removeClass('danger');
            // $("#capacity").siblings('button').css({
            //     'background': '#F7FCFF',
            // });
            // $("#capacity").siblings('button').text('{{$addtlcarinfo->seatingNo}}');
            // $("#capacity").closest('.dropdown').siblings('p').css({
            //     'background': '#F7FCFF',
            //     'color':  '',
            // });
        }

        if('{{$addtlcarinfo->mvFileNo}}') {
            $("#mvFileNo").trigger('change');
        }

        if('{{$addtlcarinfo->plateNo}}') {
            $("#plateNo").trigger('change');
        }

        if('{{$addtlcarinfo->engineNo}}') {
            $("#engineNo").trigger('change');
        }

        if('{{$addtlcarinfo->bodyType}}') {
            $("#bodyType").trigger('change');
        }

        if('{{$addtlcarinfo->color}}') {
            $("#color").trigger('change');
        }

        if('{{$addtlcarinfo->chassisNo}}') {
            $("#chasisNo").trigger('change');
        }
        if('{{$addtlcarinfo->inceptDate}}') {
            $("#policyDate").trigger('change').val('{{$addtlcarinfo->inceptDate}}');;
            $('.icon-bday-default').css('display', 'none');
            $('.icon-bday-checked').css('display', '');
        }

        $("#mvFileNo").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^0-9-\s]/gi, "");
        });
        
        $("#plateNo").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z0-9-\s]/gi, "");
        });

        $("#engineNo").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z0-9-\s]/gi, "");
        });

        $("#bodyType").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("#color").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z\s]/gi, "");
        });

        $("#chasisNo").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^a-z0-9\s]/gi, "");
        });

        $("#capacity").on("input", function (event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[^0-9\s]/gi, "");
        });


        $('#mvFileNo').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#plateNo').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#engineNo').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#bodyType').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

           if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#color').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#chasisNo').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#capacity').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        $('#policyDate').change(function () {
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {

                if ($('#btnMortgagee').val() === 'yes') {

                    var mortgagee = $('#mortgagee').val();

                    if(mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");
                    }

                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");
                }
            }
        });

        // $('#capacity').on('keypress', function (e) {
        //     return e.metaKey || // cmd/ctrl
        //         e.which <= 0 || // arrow keys
        //         e.which == 8 || // delete key
        //         /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        // });

        if ('{{$addtlcarinfo->mortgagee}}' === 'yes') {
            $("#yesMortgagee").removeClass('inactive-mortgagee');
            $("#yesMortgagee").addClass('active-mortgagee');
            $("#noMortgagee").removeClass('active-mortgagee');
            $("#noMortgagee").addClass('inactive-mortgagee');
            $('#yesMortgagee > svg').attr("class", "").removeClass('d-none');
            $('#noMortgagee > svg').attr("class", "d-none");
            $('#mortgagee').prop("disabled", false);
            $('#btnMortgagee').val('yes');
            $('#mortgagee').removeClass('danger');
            $('#mortgagee').val('{{$addtlcarinfo->mortgagee_name}}');
            $('#optionalMortgagee').removeClass('d-none');
        } else if ('{{$addtlcarinfo->mortgagee}}' === 'no') {
            $("#noMortgagee").removeClass('inactive-mortgagee');
            $("#noMortgagee").addClass('active-mortgagee');
            $("#yesMortgagee").removeClass('active-mortgagee');
            $("#yesMortgagee").addClass('inactive-mortgagee');
            $('#noMortgagee > svg').attr("class", "").removeClass('d-none');
            $('#yesMortgagee > svg').attr("class", "d-none");
            $('#mortgagee').prop("disabled", true);
            $('#btnMortgagee').val('no');
            $('#mortgagee').removeClass('danger');
            $('#mortgagee').val('');
            $('#optionalMortgagee').addClass('d-none');
        } else {

        }

        $('#continue').click(function (e) {
            e.preventDefault();
            var mvFileNo = $('#mvFileNo').val();
            var plateNo = $('#plateNo').val();
            var engineNo = $('#engineNo').val();
            var bodyType = $('#bodyType').val();
            var color = $('#color').val();
            var chasisNo = $('#chasisNo').val();
            var capacity = $('#capacity').val();
            var policyDate = $('#policyDate').val();

            if (mvFileNo === '') {
                $("#mvFileNo").addClass('danger');
            }

            if (plateNo === '') {
                $("#plateNo").addClass('danger');
            }

            if (engineNo === '') {
                $("#engineNo").addClass('danger');
            }

            if (bodyType === '') {
                $("#bodyType").addClass('danger');
            }

            if (color === '') {
                $("#color").addClass('danger');
            }

            if (chasisNo === '') {
                $("#chasisNo").addClass('danger');
            }

            if (capacity === '') {
                $("#capacity").addClass('danger');
            }

            if (policyDate === '') {
                $("#policyDate").addClass('danger');
            }

            if ($('#btnMortgagee').val() === 'yes') {
                var mortgagee = $('#mortgagee').val();
                if (mortgagee === '') {
                    $("#mortgagee").addClass('danger');
                }
            }

            if ($('#btnMortgagee').val() === 'default') {
                $("#mortgagee").addClass('danger');
            }

            if (mvFileNo === '' || plateNo === '' || engineNo === '' || bodyType === '' || color ===
                '' || chasisNo === '' || capacity === '' || policyDate === '') {
                $('html').animate({
                    scrollTop: eval($("#firstDiv").offset().top - 300)
                }, 1000);
            }

            if (mvFileNo !== '' && plateNo !== '' && engineNo !== '' && bodyType !== '' && color !==
                '' && chasisNo !== '' && capacity !== '' && policyDate !== '' && $('#btnMortgagee').val() !== 'default') {
                if ($('#btnMortgagee').val() === 'yes') {
                    if (mortgagee !== '') {
                        $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                        $('#additionalCarDanger').attr("class", "d-none");

                        $("#compreFormStep2Additional").attr('action',
                            "{{ url('/get-quote/auto-excel-plus/personal-data')}}");

                        $("#compreFormStep2Additional").submit();
                    }
                } else {
                    $('#additionalCarSuccess').attr("class", "").removeClass('d-none');
                    $('#additionalCarDanger').attr("class", "d-none");

                    $("#compreFormStep2Additional").attr('action',
                        "{{ url('/get-quote/auto-excel-plus/personal-data')}}");

                    $("#compreFormStep2Additional").submit();
                }
            } else {
                $("#continue").attr("disabled", true);
                $('#additionalCarDanger').attr("class", "").removeClass('d-none');
                $('#additionalCarSuccess').attr("class", "d-none");
            }
        });

        $('#back').click(function (e) {

            $("#compreFormStep2Additional").attr('action',
                "{{ url('/get-quote/auto-excel-plus/car-information')}}");

            $("#compreFormStep2Additional").submit();
        });

        $('#yesMortgagee').click(function (e) {
            e.preventDefault();
            $("#yesMortgagee").removeClass('inactive-mortgagee');
            $("#yesMortgagee").addClass('active-mortgagee');
            $("#noMortgagee").removeClass('active-mortgagee');
            $("#noMortgagee").addClass('inactive-mortgagee');
            $('#yesMortgagee > svg').attr("class", "").removeClass('d-none');
            $('#noMortgagee > svg').attr("class", "d-none");
            $('#mortgagee').prop("disabled", false);
            $('#btnMortgagee').val('yes');
            $('#mortgagee').removeClass('danger');
            $('#optionalMortgagee').removeClass('d-none');

        });

        $('#noMortgagee').click(function (e) {
            e.preventDefault();
            $("#noMortgagee").removeClass('inactive-mortgagee');
            $("#noMortgagee").addClass('active-mortgagee');
            $("#yesMortgagee").removeClass('active-mortgagee');
            $("#yesMortgagee").addClass('inactive-mortgagee');
            $('#noMortgagee > svg').attr("class", "").removeClass('d-none');
            $('#yesMortgagee > svg').attr("class", "d-none");
            $('#mortgagee').prop("disabled", true);
            $('#btnMortgagee').val('no');
            $('#mortgagee').removeClass('danger');
            $('#mortgagee').val('');
            $('#optionalMortgagee').addClass('d-none');
        });

        $('#showModal').click(function (e) {
            e.preventDefault();
            jQuery('#home-tab').click();
        });

        $('#home-tab').click(function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $("#profile-tab").removeClass('active');
        });

        $('#profile-tab').click(function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $("#home-tab").removeClass('active');
        });
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
    const minAge = 0; // Minimum age
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
            } else if (dateString === document.getElementById("policyDate").value) {
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
        // if ($('#policyDate').val() !== "") {
        //     alert('hey')
            $('#icon-bday-default').attr("class", "icon-bday icon-bday-default d-none");
            $('#icon-bday-checked').attr("class", "icon-bday-checked").removeClass('d-none');
        // }

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