@extends('layouts.layout1')
@section('content')
@include('getaquote.motor_net.update.motor_header')

<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">

    <style type="text/css">
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding : 0px;
            margin-left: 0px;
            display: inline;
            border: 0px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            border: 0px;
        }
        .v-error-msg {
            color: #CF3C4B;
            font-size: 15px;
        }
        .bonds_label{
            font-size:20px !important;
        }
    </style>
<form id="motor_project" name="motor_project" method="post" enctype="multipart/form-data">
<input type="hidden" name="url" name="url" value="{{url('/')}}">
<div class="container_ b5form">
    <div class="row_">
        <input type="hidden" name="hidURL" id="hidURL" value="{{url('/')}}">
    <div id='motor_proj_info'>
        <div class="alert alert-success" id="motor_proj01">
            <span id="motor_success"></span>
    </div>
    <div class="alert alert-danger d-none" id="motor_proj02">
            <span id="motor_failed"></span>
    </div>
</div>
@foreach ($getDetail as $item)
<input id="transno" name="transno" type="text" value="{{ $idencrpyt }}" class="hide">
<input type='hidden' name='check_disable' id='check_disable' class='check_disable'>
    <h1 style='color: #008080;'> Personal Data</h1>
    <input id="disabletext" name="disabletext" type="text" value="{{ !empty($item->disableAll) ? $item->disableAll : ''}}" class="hide">
        <input id="copytransno" name="copytransno" type="text" value="{{ !empty($item->transno) ? $item->transno : ''}}" class="hide">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstName_personal_info">First Name</label>
                    <input name="firstName" id="firstName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value='{{ $item->firstName }}'>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="middleName_personal_info">Middle Name</label>
                    <input name="middleName" id="middleName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value='{{ $item->middleName }}'>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lastName_personal_info">Last Name</label>
                    <input name="lastName" id="lastName_personal_info" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z\/.]+"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100" value='{{ $item->lastName }}'>
                </div>
            </div>
            <div class="col-md-12 break-two"><br></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contactNo_personal_info">Mobile No.</label>
                    <input name="contactNo" id="contactNo_personal_info" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX" value='{{ $item->contactNo }}'>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email_personal_info">Email Address</label>
                    <input name="emailAddress" id="email_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value='larren_aguilar@cocogen.com' value='{{ $item->emailAddress }}'>

                </div>
            </div>


        <div class="col-md-12 break-two"> <br> </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="address"> Present Address</label> <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street" maxlength="250" value='{{ $item->residenceAddress }}'>
        </div>
        </div>
        <div class="col-md-12 break-two"> <br> </div>


        <div class="col-md-4 ">
            <div class="form-group">
                <select  id="residence_province" name="residence_province" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                        <option value="">- Select Province -</option>
                </select>
            </div>
        </div>
        <input type='hidden' name='residence_province_default' id='residence_province_default' value='{{ $item->residence_province }}'>
        <input type='hidden' name='residence_city_default' id='residence_city_default' value='{{ $item->residence_municipality }}'>
        <input type='hidden' name='residence_barangay_default' id='residence_barangay_default' value='{{ $item->residence_barangay }}'>
        <div class="col-md-4 ">
            <div class="form-group">
            <select  id="residence_municipality" name="residence_municipality" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                    <option value="">- Select City/Municipality -</option>
            </select>
            </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
                <select  id="residence_barangay" name="residence_barangay" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                        <option value="">- Select Barangay-</option>
                </select>
            </div>
        </div>
         <div class="col-md-12 break-two">
                <br>
        </div>
        <div class="col-md-12 break-two">
                <br>
        </div>

         <div class="col-md-12">

            <label for="mailing_address"> Permanent Address</label><br><br>
            <input type="checkbox" class="form-check-input" id="chckSameAddress" name="chckSameAddress" value="{{ $item->copyMailing  }}">
            <label for="chckSameAddress">Same as Present Address </label>
         </div>
            <div class="col-md-12 break-two">
                <br>
        </div>
         <div class="col-md-12 ">
            <div class="form-group">
            <input name="mailing_address" id="mailing_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No. Floor No./Building/Street" value="{{ $item->mailing_address }}"></div>
        </div>

            <div class="col-md-12 break-two"> <br>
        </div>
        <input type='hidden' name='mailing_province_default' id='mailing_province_default' value='{{ $item->mailing_province }}'>
        <input type='hidden' name='mailing_municipality_default' id='mailing_municipality_default' value='{{ $item->mailing_municipality }}'>
        <input type='hidden' name='mailing_barangay_default' id='mailing_barangay_default' value='{{ $item->mailing_barangay }}'>
        <div class="col-md-4 ">
            <div class="form-group">
            <select  id="mailing_province" name="mailing_province" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                <option value="">- Select Province -</option>
            </select>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="form-group">
            <select  id="mailing_municipality" name="mailing_municipality" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                    <option value="">- Select City/Municipality -</option>
            </select>
        </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
                <select  id="mailing_barangay" name="mailing_barangay" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                <option value="">- Select Barangay-</option>
            </select>
            </div>
         </div>
        <div class="col-md-12 break-two"><br></div>
        <div class="col-md-4">
        <div class="form-group">
                <label for="firstName_personal_info">Source of Funds</label>
                <input name="sourceOfFund" id="sourceOfFund" type="text" onkeypress="return /[a-z. ]/i.test(event.key)" pattern="[a-zA-Z/\.]+" class="form-control input-lg NoPaste personal_ifno_mobile"  data-style="input-lg btn-white btn-white-source" maxlength="100" value='{{ $item->sourceOfFund  }}'>
            </div>
        </div>
        <div class="col-md-12 break-two"><br></div>
        <div class="col-md-12 break-two"><br></div>
        <div class="col-md-4" style="text-align: left;">
            @endforeach
                <br>
                {{-- <input name="submit" type="submit" id='test' class="btnSubmit btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;" value='Save'></input> --}}
                {{-- <button type="submit" id="sav_motornet" name="save_motor" class="btn btn-primary"><span class='fa fa-plus'></span></button> --}}
            </div>
        </form>

            {{-- <div class="col-md-4" style="text-align: left;">
                <br>
                <button  id="next_1stpage" name="next_1stpage" type="button"  class="action next_1stpage btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
            </div> --}}
            </form>
        <div class="col-md-12_ break-two"> <br> </div>
        <div  class="col-md-12">

        <div class="text-center mt-4">
            <input type="submit" id="next_page_2nd" name="next_page_2nd" class="form-control_ btn btn-lg_ btn-secondary a-btn-slide-text_ btn-buy" value="Next">
            <!-- <input type="button" id="ViewQuote"  name="ViewQuote"  class="btn btn-primary a-btn-slide-text btn-buy" onclick="location.href='http://cocogentest.cocogen.com.ph/DragonPay/'" value="Buy"> -->
            <!--   <input type="submit" id="CompreFirstTab"  name="CompreFirstTab" class="btn btn-primary a-btn-slide-text btn-buy"    value="Next"> -->
          </div>
        <div class="progress mt-5 p-0">
            <div class="progress-bar" style="width: 20%;"></div>
        </div>
    </div>
</div>
    @include('getaquote.motor_net.update.otherline_motor')

</div>
</div>
</div>
</div>
</div>



<style type="text/css">
/* .modal {
text-align: center;
top:30%;
} */
.hide {
display: none;
}
#homepagediv{
margin-top: 150px;
margin-bottom: 220px;
}


@media screen and (min-width: 768px) {
/* .modal:before {
display: inline-block;
vertical-align: middle;
content: " ";
height: 100%;
} */
}

/* .modal-dialog {
display: inline-block;
text-align: left;
vertical-align: middle;
} */

#btnnewApplication,
#btnRenewal{
min-width: 267px;
margin-left: 20px;
min-height: 60px;
background-color: #C0C0C0;
color: #000000;
margin-top: 20px;
}


#btnnewApplication:hover {
background-color: #4CAF50; /* Green */
color: white;
}

#btnRenewal:hover {
background-color: #4CAF50; /* Green */
color: white;
}


@media only screen and (max-width: 800px) {
#homepagediv{
margin-top: 10px;
margin-bottom: 30px;
}

}
</style>

<script>


$(window).on('load', function() {
    // Retrieve the URI ID from the window location
    var transno = window.location.pathname.split('/').pop();

    // Send an AJAX request to the controller
    $.ajax({
        url: "{{ route('motorController.check_disable', ['id' => ':id']) }}".replace(':id', transno),
        method: 'GET',
        success: function(response) {
            $('#check_disable').val(response.status);
            // Perform actions based on the response
            if (response.status == 1) {

                // Value contains "disabled all"
                // Perform corresponding actions
               $('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_barangay, #chckSameAddress, #source_personal_info, #residence_address, #mailing_province, #sourceOfFund').prop('readonly', true);

                $('#residence_province,#residence_municipality,#residence_barangay,#mailing_address,#mailing_province, #mailing_municipality, #mailing_barangay').prop('disabled', true);
            } else {
                // Value does not contain "disabled all"
                // Perform other actions if needed
            }
        }
    });
});



  jQuery(document).ready(function() {

    $('#motor_proj_info').hide();
    $('#next_page_2nd').on('click', function(e) {
        e.preventDefault();
        jQuery.noConflict();

        var transno = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var errornumber = 0;

        $(".validation_firstName_personal_info").remove();
             $(".validation_firstName_personal_info_check_error").remove();
             $(".validation_firstName_personal_info_check_success").remove();

             $(".validation_middleName_personal_info").remove();
             $(".validation_middleName_personal_info_check_error").remove();
             $(".validation_middleName_personal_info_check_success").remove();

             $(".validation_lastName_personal_info").remove();
             $(".validation_lastName_personal_info_check_error").remove();
             $(".validation_lastName_personal_info_check_success").remove();

             $(".validation_email_personal_info").remove();
             $(".validation_email_personal_info_check_error").remove();
             $(".validation_email_personal_info_check_success").remove();

             $(".validation_tel_no_info").remove();
             $(".validation_tel_no_info_check_error").remove();
             $(".validation_tel_no_info_check_success").remove();

             $(".validation_contactNo_personal_info").remove();
             $(".validation_contactNo_personal_info_check_error").remove();
             $(".validation_contactNo_personal_info_check_success").remove();

             $(".validation_residence_address_info").remove();
             $(".validation_residence_address_info_check_error").remove();
             $(".validation_residence_address_info_check_success").remove();

             $(".validation_residence_province").remove();
             $(".validation_residence_province_check_error").remove();
             $(".validation_residence_province_check_success").remove();

             $(".validation_residence_municipality").remove();
             $(".validation_residence_municipality_check_error").remove();
             $(".validation_residence_municipality_check_success").remove();

             $(".validation_residence_barangay").remove();
             $(".validation_residence_barangay_check_error").remove();
             $(".validation_residence_barangay_check_success").remove();

             $(".validation_mailing_address").remove();
             $(".validation_mailing_address_check_error").remove();
             $(".validation_mailing_addresscheck_success").remove();

             $(".validation_mailing_address").remove();
             $(".validation_mailing_address_check_error").remove();
             $(".validation_mailing_address_check_success").remove();

             $(".validation_mailing_province").remove();
             $(".validation_mailing_province_check_error").remove();
             $(".validation_mailing_province_check_success").remove();

             $(".validation_mailing_municipality").remove();
             $(".validation_mailing_municipality_check_error").remove();
             $(".validation_mailing_municipality_check_success").remove();

             $(".validation_mailing_barangay").remove();
             $(".validation_mailing_barangay_check_error").remove();
             $(".validation_mailing_barangay_check_success").remove();

             $(".validation_sourceoffund_info").remove();
             $(".validation_sourceoffund_check_error").remove();
             $(".validation_sourceoffund_check_success").remove();

             if($('#sourceOfFund').val() == ""){
                    $("#sourceOfFund").after("<div class='validation_sourceoffund_info v-error-msg'>Source of Fund is empty</div>");
                 $('#sourceOfFund').fieldErrorState();
                     errornumber = 1;
             }else{
                 $('#sourceOfFund').fieldSuccessState();
            }


             if($('#firstName_personal_info').val() == ""){
                    $("#firstName_personal_info").after("<div class='validation_firstName_personal_info v-error-msg'>First Name is empty</div>");
                 $('#firstName_personal_info').fieldErrorState();
                     errornumber = 1;
             }else{
                 $('#firstName_personal_info').fieldSuccessState();
                }

                if($('#middleName_personal_info').val() == ""){
                        $("#middleName_personal_info").after("<div class='validation_middleName_personal_info v-error-msg'>Middle Name is empty</div>");
                     $('#middleName_personal_info').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#middleName_personal_info').fieldSuccessState();
                }

                if($('#lastName_personal_info').val() == ""){
                        $("#lastName_personal_info").after("<div class='validation_lastName_personal_info v-error-msg'>Last Name is empty</div>");
                     $('#lastName_personal_info').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#lastName_personal_info').fieldSuccessState();
                }

                if($('#contactNo_personal_info').val() == ""){
                        $("#contactNo_personal_info").after("<div class='validation_contactNo_personal_info v-error-msg'>Mobile No. is empty</div>");
                     $('#contactNo_personal_info').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#contactNo_personal_info').fieldSuccessState();
                }

                if($('#email_personal_info').val() == ""){
                        $("#email_personal_info").after("<div class='validation_email_personal_info v-error-msg'>Email address is empty</div>");
                        $("#email_personal_info").fieldErrorState();
                        errornumber = 1;
                 }else{
                     if(IsEmail($('#email_personal_info').val())==false){
                            $("#email_personal_info").after("<div class='validation_email_personal_info v-error-msg'>Invalid format</div>");
                            $("#email_personal_info").fieldErrorState();
                            errornumber = 1;
                        }else{
                            $("#email_personal_info").fieldSuccessState();
                        }
                 }

                 if($('#residence_address').val() == "" ){
                        $("#residence_address").after("<div class='validation_residence_address_info v-error-msg'>Address is empty</div>");
                     $('#residence_address').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_address').fieldSuccessState();
                }

                if($('#residence_province').val() === null || $('#residence_province_default').val() == ""){
                    $("#residence_province").after("<div class='validation_residence_province v-error-msg'>Province is empty</div>");
                     $('#residence_province').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_province').fieldSuccessState();
                }


                if($('#residence_municipality').val() === null || $('#residence_municipality_default').val() == ""){
                    $("#residence_municipality").after("<div class='validation_residence_municipality v-error-msg'>Municipality is empty</div>");
                     $('#residence_municipality').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_municipality').fieldSuccessState();
                }



                if($('#residence_barangay').val() === null || $('#residence_barangay_default').val() == ""){
                    $("#residence_barangay").after("<div class='validation_residence_barangay v-error-msg'>Barangay is empty</div>");
                     $('#residence_barangay').fieldErrorState();

                         errornumber = 1;
                 }else{
                     $('#residence_barangay').fieldSuccessState();
                }

                if($('#mailing_address').val() == ""){
                    $("#mailing_address").after("<div class='validation_mailing_address v-error-msg'>Address is empty</div>");
                     $('#mailing_address').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_address').fieldSuccessState();
                }


                if($('#mailing_province').val() === null || $('#mailing_province_default').val() == ""){
                    $("#mailing_province").after("<div class='validation_mailing_province v-error-msg'>Province is empty</div>");
                     $('#mailing_province').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_province').fieldSuccessState();
                }

                if($('#mailing_municipality').val() === null || $('#mailing_municipality_default').val() == ""){
                    $("#mailing_municipality").after("<div class='validation_mailing_municipality v-error-msg'>Municipality is empty</div>");
                     $('#mailing_municipality').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_municipality').fieldSuccessState();
                }


                    if($('#mailing_barangay').val() === null || $('#mailing_barangay_default').val() == ""){
                    $("#mailing_barangay").after("<div class='validation_mailing_barangay v-error-msg'>Barangay is empty</div>");
                     $('#mailing_barangay').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_barangay').fieldSuccessState();
                }


                 if(errornumber == 1){
                     return false;
                 }

    // $('#sendform_project1').html('Saving...');
    /* Submit form data using ajax*/
        $.ajax({
        url: "{{ url('/get-policy-quote/save')}}",
        method: "POST",
        data: $('#motor_project').serialize() + "&transno=" + transno + "&_token=" + csrf_token,
        dataType: 'json',
        success: function(response){
            console.log(response);
            // Assuming the transno value is retrieved from an input field with the id "transno"
            if(response.cocogen_redirect != 1){
                var id = $('#transno').val();
                var url = "{{ route('record_motor', ':id') }}";
                url = url.replace(':id', id);
                window.location.href = url;
            }else{
                var id = $('#transno').val();
                var url = "{{ route('record_motor_new', ':id') }}";
                url = url.replace(':id', id);
                window.location.href = url;
            }
         }

        });

    });

});


</script>
<section class="divider">
<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
