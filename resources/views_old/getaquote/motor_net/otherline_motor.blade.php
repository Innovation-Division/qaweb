
<script type="text/javascript">
var j = jQuery.noConflict();
jQuery('#residence_province').change(function(){
    if(jQuery(this).val() != '')
    {
        var province = jQuery(this).val();
         var _token = jQuery('input[name="_token"]').val();
         jQuery.ajax({
             url:'{{url('/')}}' + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province},
              success:function(result)
              {
                  jQuery('#residence_municipality').empty();
                  $('#residence_municipality').append($('<option>', {
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#residence_municipality').append($('<option>', {
                    value: value.city,
                    text : value.city
                }));
            })
                jQuery('#residence_municipality').selectpicker("refresh");
              }
        })
    }
});

jQuery('#mailing_province').change(function(){
    if(jQuery(this).val() != '')
    {
        var province = jQuery(this).val();
         var _token = jQuery('input[name="_token"]').val();
         jQuery.ajax({
             url:'{{url('/')}}' + '/api/covid/city/get',
              method:"GET",
              data:{ _token:_token,province:province},
              success:function(result)
              {
                  jQuery('#mailing_municipality').empty();
                  $('#mailing_municipality').append($('<option>', {
                    value: "",
                    text : "- Select City/Municipality -"
                }));
                jQuery.each(result, function(key, value){
                $('#mailing_municipality').append($('<option>', {
                    value: value.city,
                    text : value.city
                }));
            })
                jQuery('#mailing_municipality').selectpicker("refresh");
              }
        })
    }
});

jQuery('#residence_municipality').change(function(){
    if(jQuery(this).val() != '')
    {
        var city = jQuery(this).val();
         var _token = jQuery('input[name="_token"]').val();
         jQuery.ajax({
             url:'{{url('/')}}' + '/api/covid/barangay/get',
              method:"GET",
              data:{ _token:_token,city:city},
              success:function(result)
              {
                  jQuery('#residence_barangay').empty();
                  $('#residence_barangay').append($('<option>', {
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#residence_barangay').append($('<option>', {
                    value: value.barangay,
                    text : value.barangay
                }));
            })
                jQuery('#residence_barangay').selectpicker("refresh");
              }
        })
    }
});

jQuery('#mailing_municipality').change(function(){
    if(jQuery(this).val() != '')
    {
        var city = jQuery(this).val();
         var _token = jQuery('input[name="_token"]').val();
         jQuery.ajax({
             url:'{{url('/')}}' + '/api/covid/barangay/get',
              method:"GET",
              data:{ _token:_token,city:city},
              success:function(result)
              {
                  jQuery('#mailing_barangay').empty();
                  $('#mailing_barangay').append($('<option>', {
                    value: "",
                    text : "- Select Barangay -"
                }));
                jQuery.each(result, function(key, value){
                $('#mailing_barangay').append($('<option>', {
                    value: value.barangay,
                    text : value.barangay
                }));
            })
                jQuery('#mailing_barangay').selectpicker("refresh");
              }
        })
    }
});

// PROVNCE CITY BARANGAY

$(document).ready(function() {
        $('#residence_province').on('change', function() {
            var residenceprovince = $(this).val();
        $('input[name="residence_province_hide"]').val(residenceprovince);
        });
    });
    $(document).ready(function() {
        $('#residence_municipality').on('change', function() {
            var residencemunicipality = $(this).val();
        $('input[name="residence_municipality_hide"]').val(residencemunicipality);
        });
    });
    $(document).ready(function() {
        $('#residence_barangay').on('change', function() {
            var residencebarangay = $(this).val();
        $('input[name="residence_barangay_hide"]').val(residencebarangay);
        });
    });
    $(document).ready(function() {
        $('#mailing_province').on('change', function() {
            var mailprovince = $(this).val();
        $('input[name="mailing_province_hide"]').val(mailprovince);
        });
    });
    $(document).ready(function() {
        $('#mailing_municipality').on('change', function() {
            var mailingmunicipality = $(this).val();
        $('input[name="mailing_municipality_hide"]').val(mailingmunicipality);
        });
    });
    $(document).ready(function() {
        $('#mailing_barangay').on('change', function() {
            var mailbarangay = $(this).val();
        $('input[name="mailing_barangay_hide"]').val(mailbarangay);
        });
    });

function addCommas(num) {
            var str = num.toString().split('.');
            if (str[0].length >= 4) {
                //add comma every 3 digits befor decimal
                str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
            }
            /* Optional formating for decimal places
            if (str[1] && str[1].length >= 4) {
                //add space every 3 digits after decimal
                str[1] = str[1].replace(/(\d{3})/g, '$1 ');
            }*/
            return str.join('.');
        }

    $( "#chckSameAddress" ).click(function() {
    if (jQuery(this).is(':checked') === true) {
           var residence_address = jQuery('#residence_address').val();
           var residence_province = jQuery('#residence_province').val();
           var residence_municipality = jQuery('#residence_municipality').val();
           var residence_barangay = jQuery('#residence_barangay').val();


        $('#residence_province_hide').val(residence_province);
        $('#residence_municipality_hide').val(residence_municipality);
        $('#residence_barangay_hide').val(residence_barangay);

        $('#mailing_province_hide').val(residence_province);
        $('#mailing_municipality_hide').val(residence_municipality);
        $('#mailing_barangay_hide').val(residence_barangay);

        jQuery('#mailing_address').val(residence_address);
        $('#mailing_province').append('<option selected value="' + residence_province + '">' + residence_province + '</option>');
        $('#mailing_municipality').append('<option selected value="' + residence_municipality + '">' + residence_municipality + '</option>');
        $('#mailing_barangay').append('<option selected value="' + residence_barangay + '">' + residence_barangay + '</option>');
        jQuery('#mailing_province').selectpicker("refresh");
        jQuery('#mailing_municipality').selectpicker("refresh");
        jQuery('#mailing_barangay').selectpicker("refresh");

      }else{
        jQuery('#mailing_address').val("");
        jQuery('#mailing_province').val("");
        jQuery('#mailing_municipality').val("");
        jQuery('#mailing_barangay').val("");
             jQuery('#mailing_province').selectpicker("refresh");
        jQuery('#mailing_municipality').selectpicker("refresh");
        jQuery('#mailing_barangay').selectpicker("refresh");

      }
});

</script>

<script type="text/javascript">
$.fn.removeFormControlFeedback = function() {
    if ($(this).closest('.form-group').find('.form-control-feedback').length) {
        $(this).closest('.form-group').find('.form-control-feedback').remove();
    }
};
$.fn.fieldDefaultState = function() {
    $(this).closest('.form-group').removeClass('has-success has-error has-feedback');
    $(this).removeFormControlFeedback();
};
$.fn.fieldErrorState = function() {
    $(this).closest('.form-group').removeClass('has-success').addClass('has-error has-feedback');
    $(this).removeFormControlFeedback();
    $(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true"></span>');
};
$.fn.fieldSuccessState = function() {
    $(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
    $(this).removeFormControlFeedback();
    $(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true"></span>');
};

$(document).ready(function(){

var _token = j
var _token = jQuery('input[name="_token"]').val();
jQuery.ajax({
      url:'{{url('/')}}' + '/api/covid/province/get',
      method:"GET",
      data:{ _token:_token},
      success:function(result)
      {
        jQuery.each(result, function(key, value){
            $('#residence_province').append($('<option>', {
                value: value.province,
                text : value.province
            }));

            $('#mailing_province').append($('<option>', {
                value: value.province,
                text : value.province
            }));

        })
      }
    })



// SAVING   WITH NO NEXT PAGE ONLY
jQuery(document).ready(function() {

    $('#motor_proj_info').hide();
    $('#sav_motornet, #next_1stpage').on('click', function(e) {
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

                 if($('#residence_address').val() == ""){
                        $("#residence_address").after("<div class='validation_residence_address_info v-error-msg'>Address is empty</div>");
                     $('#residence_address').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_address').fieldSuccessState();
                }
                 if($('#residence_province').val() == ""){
                    $("#residence_province").after("<div class='validation_residence_province v-error-msg'>Province is empty</div>");
                     $('#residence_province').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_province').fieldSuccessState();
                }

                if($('#residence_municipality').val() == ""){
                    $("#residence_municipality").after("<div class='validation_residence_municipality v-error-msg'>Municipality is empty</div>");
                     $('#residence_municipality').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_municipality').fieldSuccessState();
                }


                if($('#residence_barangay').val() == ""){
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

                if($('#mailing_province').val() == ""){
                    $("#mailing_province").after("<div class='validation_mailing_province v-error-msg'>Province is empty</div>");
                     $('#mailing_province').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_province').fieldSuccessState();
                }

                if($('#mailing_municipality').val() == ""){
                    $("#mailing_municipality").after("<div class='validation_mailing_municipality v-error-msg'>Municipality is empty</div>");
                     $('#mailing_municipality').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_municipality').fieldSuccessState();
                }

                if($('#mailing_barangay').val() == ""){
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
            jQuery('#transno').val(response.transno);

            if ($.isEmptyObject(response.error)) {
                $('#alert_msg9').hide();
                $('#msg_div9').show();

                $('#motor_proj_info').show();
                $('#motor_proj01').show();
                $('#motor_success').html(response.success);
                $('#msg_div9').removeClass('d-none');


            } else {
                $('#motor_proj_info').show();
                $('#motor_proj02').show();
                $('#req_finance_failed').html(response.error);

            }
         }

        });

    });

});
// END OF SAVING


jQuery(document).ready(function($) {
            jQuery("#CBCantFind").prop("checked", false);
                jQuery(function () {
                        jQuery("#btnCantFindCar").click(function () {
                            jQuery('#BlockCantFintCar').hide();
                            jQuery("#CBCantFind").prop("checked", false);
                        });
                        });
                jQuery(function () {
                    jQuery("#CBCantFind").click(function () {
                        if (jQuery(this).is(":checked")) {
                            jQuery('#BlockCantFintCar').show();
                        } else {
                            jQuery('#BlockCantFintCar').hide();
                        }
                });
        });
    });
  var current = 1;
$('.NoPaste').on("cut copy paste",function(e) {
  e.preventDefault();
   });





$('input[name=coverage_complete]').val("");
jQuery('#warning_coverage_package').css("display", "none");
jQuery('#warning_coverage_no').css("display", "none");
widget      = $(".step");
btnnext     = $(".next");
btnback     = $(".back");
btnsubmit   = $(".submit");
btnSubmit   = $(".btnSubmit");
btnNew      = $(".NewApplicant");
btncheck    = $(".CheckCoverage");
btnAdd      = $(".addApplicant");
btnNextPage = $("#2nd_page");
btncheck_occ = $("#btn_back_to_applicant_occupation");
btncheck_pwd = $("#btn_back_to_applicant");
btn4thpage_add = $(".4thpage_add");
btn4thpage_add_cruise = $(".4thpage_add_cruise");
btn5thpage_add = $(".5thpage_add");
btnsubmit_lastpage = $(".btnsubmit");
btn5thpage_add_bene = $(".5thpage_add_bene");
jQuery('#save_last').hide();
jQuery('#pdfview').hide();
jQuery('#pdfviewbank').hide();
jQuery('#ComprefourthTabBuy').hide();
// Init buttons and UI
widget.not(':eq(0)').hide();
hideButtons(current);
setProgress(current);


btnsubmit_lastpage.click(function(){
    if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {
        $("#warning_summary").show();
        return false;
    }
});



// // Next button click action
btnnext.click(function(){

    if(current < widget.length) {
        btnback.show();
        //coverage
        errornumber = 0;
         if(current == 1){

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

                 if($('#residence_address').val() == ""){
                        $("#residence_address").after("<div class='validation_residence_address_info v-error-msg'>Address is empty</div>");
                     $('#residence_address').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_address').fieldSuccessState();
                }
                 if($('#residence_province').val() == ""){
                    $("#residence_province").after("<div class='validation_residence_province v-error-msg'>Province is empty</div>");
                     $('#residence_province').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_province').fieldSuccessState();
                }

                if($('#residence_municipality').val() == ""){
                    $("#residence_municipality").after("<div class='validation_residence_municipality v-error-msg'>Municipality is empty</div>");
                     $('#residence_municipality').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#residence_municipality').fieldSuccessState();
                }


                if($('#residence_barangay').val() == ""){
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

                if($('#mailing_province').val() == ""){
                    $("#mailing_province").after("<div class='validation_mailing_province v-error-msg'>Province is empty</div>");
                     $('#mailing_province').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_province').fieldSuccessState();
                }

                if($('#mailing_municipality').val() == ""){
                    $("#mailing_municipality").after("<div class='validation_mailing_municipality v-error-msg'>Municipality is empty</div>");
                     $('#mailing_municipality').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_municipality').fieldSuccessState();
                }

                if($('#mailing_barangay').val() == ""){
                    $("#mailing_barangay").after("<div class='validation_mailing_barangay v-error-msg'>Barangay is empty</div>");
                     $('#mailing_barangay').fieldErrorState();
                         errornumber = 1;
                 }else{
                     $('#mailing_barangay').fieldSuccessState();
                }


                 if(errornumber == 1){
                     return false;
                 }
                 var transno = $("input[name='transno']").val();
                 var csrf_token = $('meta[name="csrf-token"]').attr('content');
                 $.ajax({
                    url: "{{ url('/get-policy-quote/save')}}",
                    method: "POST",
                    data: $('#motor_project').serialize() + "&transno=" + transno + "&_token=" + csrf_token,
                    dataType: 'json',
                    success: function(response){
                        jQuery('#transno').val(response.transno);
                        jQuery('#quoteno').val(response.quotetrans);
                        $('#quotenumber3').text(response.quotetrans);
                        $('#quotenumber5').text(response.quotetrans);
                        if ($.isEmptyObject(response.error)) {
                            $('#alert_msg9').hide();
                            $('#msg_div9').show();

                            $('#motor_proj_info').show();
                            $('#motor_proj01').show();
                            $('#motor_success').html(response.success);
                            $('#msg_div9').removeClass('d-none');


                        } else {
                            $('#motor_proj_info').show();
                            $('#motor_proj02').show();
                            $('#req_finance_failed').html(response.error);

                        }
                    }
            });
        }



         if(current == 3){
            var year = $('#drpYear').val();
            var brand = $('#brand').val();
            var model = $('#model').val();
            var marketval = $('#totalValue').val();

            // Append the values to the respective <span> elements
            $('#year').text(year);
            $('#brand').text(brand);
            $('#model').text(model);
            $('#marketval').text(marketval);



         }

         if(current == 4){
            }

            // if(current == 5){
            //     errornumber = 0;
            //     cruise = $('input[name="include_cruise"]:checked').val();
            //     covid = $('input[name="include_covid"]:checked').val();
            //     if(covid==='Yes'){
            //         $('#withcovid_final_coverage').show();
            //         $('#file-upload').change(function() {
            //             var i = $(this).prev('label').clone();
            //             var file = $('#file-upload')[0].files[0].name;
            //             if (this.files[0].size > 5000000) {
            //                 $("#upload_Error").html("File size must not be greater than 5MB.");
            //                 $("#upload_Error").show();
            //                 $("#upload_label").hide();
            //                 $("#upload_file").hide();
            //                 $('#file-upload').val("");
            //                 errornumber = 1;
            //             }else{
            //                 $("#upload_Error").hide();
            //                 $("#upload_file").show();
            //                 $("#upload_label").hide();
            //                 $("#upload_file_file").empty();
            //                 $("#upload_file_file").html(file);
            //             }
            //         });

            //         if($('#file-upload').val() == ""){
            //             $("#upload_Error").html("Please upload your COVID-19 Testing Protocols");
            //             $("#upload_Error").show();
            //             $("#upload_label").hide();
            //             $("#upload_file").hide();
            //             errornumber = 1;
            //         }


            //     }else{
            //         $('#withcovid_final_coverage').hide();

            //     }




            // }

                        if(errornumber == 1){
                            return false;
                        }
                        widget.show();
                        widget.not(':eq('+(current++)+')').hide();


                        setProgress(current);
                    }
                    hideButtons(current);
                });


        // btnNextPage.click(function(){
        //     var _token = jQuery('input[name="_token"]').val();
        //     var url = jQuery('input[name="url"]').val();
        //     var promo = "";
        //     promo = $('#promo').val();


        // });



jQuery('.dynamicyear').change(function(){
    if(jQuery(this).val() != '')
    {
          var yearval = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/brand';
          var _token = jQuery('input[name="_token"]').val();

     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval},
      success:function(result)
      {
        jQuery('#brand').html(result);
        jQuery('#brand').selectpicker("refresh");
      }

     })
    }
});
jQuery('.dynamicbrand').change(function(){
    if(jQuery(this).val() != '')
    {
          var yearval = jQuery( "#drpYear option:selected" ).text();
          var brandval = jQuery(this).val();
          $hidURL = jQuery('input[name=hidURL]').val();
          var url = $hidURL+ '/get-policy-quote/dynamic_dependent/fetch/model';
          var _token = jQuery('input[name="_token"]').val();

     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval,brandval:brandval},
      success:function(result)
      {
        jQuery('#model').html(result);
        jQuery('#model').selectpicker("refresh");
        jQuery('#grossPrem').val();
      }

     })
    }
});


    jQuery('.dynamic').change(function() {
    if (jQuery(this).val() != '') {
        var yearName = jQuery("#drpYear option:selected").text();
        var brandName = jQuery("#brand option:selected").text();
        var modelName = jQuery(this).val();
        var transno = ''; // Provide the value for 'transno' variable
        $hidURL = jQuery('input[name=hidURL]').val();
        var url = $hidURL+ '/get-policy-quote/dynamic_dependent/fetch';
        // var url = '/get-policy-quote/dynamic_dependent/fetch';
        var _token = $('meta[name="csrf-token"]').attr('content');
        $('input[name="modelinfo"]').val(modelName)

        jQuery.ajax({
            url: url,
            method: "POST",
                 data: { _token: _token,yearName: yearName,brandName: brandName,modelName: modelName},
            error: function(data) {
                var errors = data.responseJSON;
                // alert(errors);
                jQuery.each(data, function(key, value) {
                    console.log(value);
                });
                // Render the errors with js ...
            },
            success: function(result) {

                var data = JSON.parse(result);
                jQuery('#grossPrem').val('');
                jQuery('#totalValue').val(addCommas(data));
                jQuery('#totalValuehid').val(jQuery('#totalValue').val());
                // jQuery('#bodyType').val(data[0]['type']);
                var origval = jQuery('#totalValuehid').val();
                var totalValue = jQuery('#totalValue').val();

                if (origval) {

                    var origval_org =  origval.replace(/[^a-z0-9\s.]/gi, '');

                    var minval = (origval_org * 0.9);
                    var maxval = (origval_org * 1.1);
                    minval = minval.toFixed(2);
                    maxval = maxval.toFixed(2);
                    jQuery('#fader').attr('min', minval);
                    jQuery('#fader').attr('max', maxval);
                    jQuery('#fader').val(totalValue);
                    jQuery('#minValue').html("Php " + addCommas(minval));
                    jQuery('#maxValue').html("Php " + addCommas(maxval));
                    jQuery('input[name=totalvalhid]').val(origval_org);

                }
            }
        });
    }
});


   jQuery(document).ready(function($) {
        jQuery("#CBCantFind").prop("checked", false);
        jQuery(function () {
                 jQuery("#btnCantFindCar").click(function () {
                       jQuery('#BlockCantFintCar').hide();
                       jQuery("#CBCantFind").prop("checked", false);
                  });
                 });
        jQuery(function () {
            jQuery("#CBCantFind").click(function () {
                if (jQuery(this).is(":checked")) {
                      jQuery('#BlockCantFintCar').show();
                } else {
                     jQuery('#BlockCantFintCar').hide();
                }
            });
        });
      });


// END OF SECOND PAGE

function parseDate(str) {
var mdy = str.split('/');
return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

function datediff(first, second) {
// Take the difference between the dates and divide by milliseconds per day.
// Round to nearest whole number to deal with DST.
return Math.round((second-first)/(1000*60*60*24));
}

  // Back button click action
btnback.click(function(){
        if(current == 6){
            $('#transno').val($('#transno').val());
            $('#nextbutton').css('display','block');
        }
        if(current > 1){
            current = current - 2;
            btnnext.trigger('click');
        }
        hideButtons(current);
    });
});

// Change progress bar action
setProgress = function(currstep){
var percent = parseFloat(100 / widget.length) * currstep;
percent = percent.toFixed();
$(".progress-bar")
    .css("width",percent+"%");
    // .html(percent+"%");
}

// Hide buttons according to the current step
hideButtons = function(current){
var limit = parseInt(widget.length);

$(".action").hide();

if(current < limit)
    btnnext.show();
  if(current > 1){

      btnnext.show();
      btnback.show();
  }

  if(current == 2){
      btnnext.hide();
        btnNextPage.show();

  }
  if(current == 3){
      btnnext.hide();
        // btnNextPage.show();

  }
  if(current == 4){
      btnnext.hide();
        // btnNextPage.show();

  }
//   if(current == 5){
//       btnnext.hide();
//         btnNextPage.show();

//   }
if(current == limit) {
    btnnext.hide();
    btnsubmit.show();
    btnAdd.show();
    btnback.show(); }
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
         return true;
        }
    }

$("#contactNo_personal_info").mask("(999) 999-9999");
    function phoneMaskPHno() {
      var key = window.event.key;
      var element = window.event.target;
      var isAllowed = /\d|Backspace|Tab/;
      if(!isAllowed.test(key)) window.event.preventDefault();
      if(element.value.length < 15){
          var inputValue = element.value;
          inputValue = inputValue.replace(/\D/g,'');
          inputValue = inputValue.replace(/(^\d{4})(\d)/,'($1) $2');
          inputValue = inputValue.replace(/(\d{1,5})(\d{3}$)/,'$1-$2');

          element.value = inputValue;
      }

    }
</script>


<script>

function vf_clean_number(elementid) {
  if(document.getElementById(elementid).value != '') {
    var ival = new String(document.getElementById(elementid).value);
    var oval = '';
    var oi = 0;
    for(oi=0;oi<ival.length;oi++) {
      if( !isNaN(ival.charAt(oi)) ) {
        if(ival.charAt(oi) != ' ') {
          oval += ival.substr(oi, 1);
        }
      } else {
        if(ival.charAt(oi)=='.') {
          oval += '.';
        }
      }
    }
  }
  document.getElementById(elementid).value = parseFloat(oval);
  return true;
}

     function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            // input_val = "$" + input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }

    jQuery(".otherdivAccessory").show();
    var accessory1 = jQuery(".selectaccessory").val();
    if (accessory1 === "Others") {
        jQuery(".otherdivAccessory").show();
    } else {
        //jQuery(".otherdivAccessory").hide();
    }
    jQuery('.selectaccessory').change(function() {
        if (jQuery(this).val() != '') {
            var accessory = jQuery(this).val();
            if (accessory === "Others") {
                jQuery(".otherdivAccessory").show();
            } else {
                //jQuery(".otherdivAccessory").hide();
            }

        }
    });


</script>

<script> // SECOND PaGE JS SECOND PAGE

$(document).ready(function() {
            $('#bodilyInjury').change(function() {
                var selectedValue = $(this).val();
                $('input[name="bodilyInjuryVal"]').val(selectedValue);
            });
        });
        $(document).ready(function() {
            $('#drpYear').on('change', function() {
                var selectedValuebrandyear = $(this).val();
            $('input[name="hiddenYear"]').val(selectedValuebrandyear);
            });
        });
        $(document).ready(function() {
            $('#brand').on('change', function() {
                var selectedValuebrand = $(this).val();
            $('input[name="hiddenBrand"]').val(selectedValuebrand);
            });
        });
        $(document).ready(function() {
            // Event listener to update hidden field value when dropdown changes
            $('#model').on('change', function() {
                var selectedValuemodel = $(this).val();
            $('input[name="hiddenModel"]').val(selectedValuemodel);

            });
        });


        jQuery("#totalValue").change(function() {
        var origval = jQuery('input[name=totalValuehid]').val();
        if(origval){
        var origvalue =  origval.replace(/[^a-z0-9\s.]/gi, '');
        var onwvalue =jQuery(this).val();
        onwvalue = onwvalue.replace(/,/g, '')
        if(jQuery.isNumeric(onwvalue)){
            var getmin = (origvalue*0.9);
            var getmax = (origvalue*1.1);
            minval = getmin.toFixed(2);
            maxval= getmax.toFixed(2);
                if(getmin > onwvalue){
                    // alert("Value should be greater than Php " + addCommas(minval));
                    var totalvalminmax = $('#totalvalminmax');
                    totalvalminmax.html("Value should be greater than Php" + Number(minval).toLocaleString('en')).css('color', 'red');
                    $('#totalvalminmax').css('border-color', '#F44336');

                    jQuery("#totalValue").val(addCommas(origvalue));
                }else if(getmax < onwvalue){
                    var totalvalminmax = $('#totalvalminmax');
                    totalvalminmax.html("Value should be less than Php " + Number(maxval).toLocaleString('en')).css('color', 'red');
                    $('#totalvalminmax').css('border-color', '#F44336');
                    jQuery("#totalValue").val(addCommas(origvalue));
                }else{
                    jQuery('#fader').val(onwvalue);
                    $('#totalvalminmax').hide();
                }
            }else{
                totalvalminmax.html("Incorrect Format").css('color', 'red');
                    $('#totalvalminmax').css('border-color', '#F44336');
                    jQuery("#totalValue").val(addCommas(origvalue));
            }
        }else{
        alert("Please select brand and model first");
        }
        });
        /// Compute
    $("#aon"). prop("checked", false);

        jQuery("#aon").click(function () {
            if (jQuery(this).is(':checked') === true) {
            jQuery('#grossPrem').val('');
            jQuery(".aon").val('1');
            jQuery('#actOfNature').val('0.005');
            jQuery("#aon").prop("checked", true);
            jQuery("#aon_hide_summary").show();
            jQuery("#aon_hide_summary_last").show();
        }else{
            jQuery('#grossPrem').val('');
            jQuery(".aon").val('0');
            jQuery('#actOfNature').val('0');
            jQuery("#aon").prop("checked", false);
            jQuery("#aon_hide_summary").hide();
            jQuery("#aon_hide_summary_last").hide();

        }
    });



    var j = jQuery.noConflict();
    jQuery('#bodilyInjury').change(function() {
    jQuery('.bodyDropdown').val('1');
        if (jQuery(this).val() != "") { //Check if the dropdown has a value
            var bodilyInjury = jQuery('#bodilyInjury').val(); //This will fetch the value  store to select variavle

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            jQuery.ajax({
                url: "{{ route('motorController.fetchBodyInjury') }}",
                method: "POST",
                data: $('#car_vehicle').serialize()+ "&bodilyInjury=" + bodilyInjury + "&_token=" + csrf_token,
                success: function(result) {
                    var parsedResult = JSON.parse(result);

                jQuery('#bodyInjuryPc').val(parsedResult[0]);
                jQuery('#propertyDamagePc').val(parsedResult[1]);
                }
            })
        }

    });
    jQuery('.accessoryValue,#totalValue').on('input', function() {
     jQuery('#grossPrem').val('');
});

    $('#vehiclesave').click(function(e){
        e.preventDefault();
        jQuery.noConflict();


        var errornumber = 0;
             $(".validate_year").remove();
             $(".validate_brand").remove();
             $(".validate_model").remove();
             $(".validate_seatNo").remove();

             $(".validation_bodilyInjury").remove();
             $(".validation_grossPrem").remove();
             $(".validation_accessory").remove();
             $(".validation_accessoryValue").remove();


             if($('#drpYear').val() === null || $('#drpYear').val() == ""){
                $('#drpYear').css('border-color', '#F44336');
                $("#drpYear").after("<div class='validate_year v-error-msg'>Year is Empty</div>");
                errornumber = 1;
              }else{
                $('#drpYear').css('border-color', '#4BB543');
              }


              if($('#hiddenBrand').val() === null || $('#hiddenBrand').val() == ""){
                $('#brand').css('border-color', '#F44336');
                $("#brand").after("<div class='validate_brand v-error-msg'  >Brand is Empty</div>");
                errornumber = 1;
              }else{
                $('#brand').css('border-color', '#4BB543');
              }

              if($('#hiddenModel').val() === null || $('#hiddenModel').val() == ""){
                $('#model').css('border-color', '#F44336');
                $("#model").after("<div class='validate_model v-error-msg'  >Model is Empty</div>");
                errornumber = 1;
              }else{
                $('#model').css('border-color', '#4BB543');
              }
              if($('#seatNo').val() === null || $('#seatNo').val() == ""){
                $('#seatNo').css('border-color', '#F44336');
                $("#seatNo").after("<div class='validate_seatNo v-error-msg'  >Seat is Empty</div>");
                errornumber = 1;
              }else{
                $('#seatNo').css('border-color', '#4BB543');
              }


            if($('#bodilyInjury').val() === null || $('#bodilyInjury').val() == ""){
                $('#bodilyInjury').css('border-color', '#F44336');
                $("#bodilyInjury").after("<div class='validation_bodilyInjury v-error-msg'  > Body Injury and Property Damage  is Empty</div>");
                errornumber = 1;
              }else{
                $('#bodilyInjury').css('border-color', '#4BB543');
              }


        if($('#grossPrem').val() === null || $('#grossPrem').val() == ""){
                $('#displayrange').css('border-color', '#F44336');
                $("#displayrange").after("<div class='validation_grossPrem v-error-msg' >Desire Gross Premium is Empty</div>");
            errornumber = 1;
          }else{
            $('#displayrange').css('border-color', '#4BB543');
          }

          if($('#device_access_year').val() === null || $('#device_access_year').val() == ""){
                $('#device_access_year').css('border-color', '#F44336');
                $("#device_access_year").after("<div class='validation_accessory v-error-msg' >Accessory is Empty</div>");
            errornumber = 1;
          }else{
            $('#device_access_year').css('border-color', '#4BB543');
          }

          if($('#device_access_value').val() === null || $('#device_access_value').val() == ""){
                $('#device_access_value').css('border-color', '#F44336');
                $("#device_access_value").after("<div class='validation_accessoryValue v-error-msg' >Accessory Value is Empty</div>");
            errornumber = 1;
          }else{
            $('#device_access_value').css('border-color', '#4BB543');
          }


        if(errornumber == 1){
          return false;
        }

        var transno = $("input[name='transno']").val();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var form = $('#car_vehicle')[0]; // Get the underlying DOM form element
        var formData = new FormData(form);
        formData.append('trans_id', transno);
        formData.append('_token', _token);


            // Iterate over the accessory dropdowns and text fields
            $('select[name="device_access_year[]"]').each(function(index) {
            var accessory = $(this).val();
            formData.append('device_access_year[]', accessory);
            });

            var isFirstValue = true;
            $('input[name="device_access_value[]"]').each(function(index, element) {
            if (isFirstValue) {
                isFirstValue = false;
                return; // Skip adding the first value to the formData
            }
            var accessoryValue = $(element).val();
            formData.append('device_access_value[]', accessoryValue);
            });

            $.ajax({
                type:'POST',
                url: "{{ url('/get-policy-quote/vehicle/save')}}",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: (response) => {

                    if(response.seattype != 'Truck' || response.seattype != 'TRUCK' ){

                        $('#car_body_type').show();
                        $('#car_body_type_last1').show();
                    }else{

                        $("#car_body_type").hide();
                        $('#car_body_type_last1').hide();
                    }
                    if(response.check_aon == 0){
                        $('#aon_hide_summary').hide();
                        $('#aon_hide_summary_last1').hide();
                    }else{
                        $('#aon_hide_summary').show();
                        $('#aon_hide_summary_last1').show();
                    }
                // Get the type of car
                var year = $('#hiddenYear').val();
                var brand = $('#hiddenBrand').val();
                var modelval = $('#hiddenModel').val();
                var marketval = $('#totalValue').val();
                $('#transnolast').val(response.transno);
                $("#encrpyttransno").val($('#encrypt_last_trans').val());

                $('#yearinfo').text(year);
                $('#brandinfo').text(brand);
                $('#displayModel').text(modelval);
                $('#marketval').text(marketval);
                // Display for THe last page.
                $('#year_info_vehicle').text(year);
                $('#brand_info_vehicle').text(brand);
                $('#model_info_vehicle').html(modelval);
                $('#marketval_info_vehicle').text(marketval);

                // Coverage

                var aon_coverage = response.aon_coverage;
                $('#aon_coverage').val(aon_coverage);
                $('#aon_coverage_label1').html(aon_coverage);




                var owndamage_coverage = response.owndamage_coverage;
                $('#owndamage_coverage').val(owndamage_coverage);
                $('#owndamage_coverage_label').html(owndamage_coverage);
                //add last part
                $('#ODTheft_coverage').html(owndamage_coverage);
                $('#aon_coverage_label_riot1').html(owndamage_coverage);
                $('#aon_coverage_check').html(owndamage_coverage);

                var bodyInjury_PropertyDamage_coverage = response.bodyInjury_PropertyDamage_coverage;
                $('#bodyInjury_PropertyDamage_coverage').val(bodyInjury_PropertyDamage_coverage);
                $('#bodyInjury_PropertyDamage_coverage_label_first').html(bodyInjury_PropertyDamage_coverage);
                $('#bodyInjury_PropertyDamage_coverage_label_second').html(bodyInjury_PropertyDamage_coverage);
                // add last part
                $('#bodilyinjury_property_coverage').html(bodyInjury_PropertyDamage_coverage);
                $('#bodilyinjury_property_coverage2').html(bodyInjury_PropertyDamage_coverage);

                var perseat_coverage = response.perseat_coverage;
                $('#perseat_coverage').val(perseat_coverage);
                $('#perseat_coverage_label1').html(perseat_coverage);
                $('#autoPersonalAccident').val(perseat_coverage);
                        // add last part
                $('#personal_accident_coverage').html(perseat_coverage);

                var deduct_coverage = response.deduct_coverage;
                $('#deduct_coverage').val(deduct_coverage);
                $('#deduct_coverage_label').html(deduct_coverage);
                        // add last part
                $('#deductible_coverage').html(deduct_coverage);


                //premium computation
                var base_format = response.base_format;
                if (typeof base_format === "undefined") {
                    $('#base_format_label,#netprem_computation').html('PHP&nbsp;' + $('#base_format_last').val());
                    $('#base_format').val($('#base_format_last').val());
                } else {
                    $('#base_format').val(base_format);
                    $('#base_format_label,#netprem_computation').html('PHP&nbsp;' + base_format);
                }

                var doc_format = response.doc_format;
                $('#doc_format').val(doc_format);
                $('#doc_format_label').text(doc_format);
                $('#doc_computation').text(doc_format);

                var final_format = response.final_format;
                if (typeof final_format === "undefined") {
                    $('#final_format_label,#finalamount_computation').html('PHP&nbsp;' + $('#final_format_last').val());
                    $('#final_format').val($('#final_format_last').val());
                } else {
                    $('#final_format').val(final_format);
                    $('#final_format_label,#finalamount_computation').html('PHP&nbsp;' + final_format);
                }

                // var fire_format = response.fire_format;
                // $('#fire_format').val(fire_format);
                // $('#fire_format_label').text(fire_format);

                var gross_format = response.gross_format;
                if (typeof gross_format === "undefined") {
                    $('#gross_format_label,#gross_computation').html('PHP&nbsp;' + $('#gross_format_last').val());
                    $('#gross_format').val($('#gross_format_last').val());
                } else {
                    $('#gross_format').val(gross_format);
                    $('#gross_format_label,#gross_computation').html('PHP&nbsp;' + gross_format);
                }


                var local_format = response.local_format;
                $('#local_format').val(local_format);
                $('#local_format_label').text(local_format);
                $('#local_computation').text(local_format);

                var vat_format = response.vat_format;
                $('#vat_format').val(vat_format);
                $('#vat_format_label').text(vat_format);
                $('#vat_computation').text(vat_format);


                var firstname = $('#firstName_personal_info').val();
                var middlename = $('#middleName_personal_info').val();
                var lastname = $('#lastName_personal_info').val();
                var full = firstname+' '+middlename+' '+lastname;
                $('#fullname_personal').html(full);

                var address_personal = $('#residence_address').val();
                $('#address_personal_check').html(address_personal);

                var contactNo_personal = $('#contactNo_personal_info').val();
                $('#contactNo_personal').html(contactNo_personal);

                var emailadd_personal = $('#email_personal_info').val();
                $('#emailadd_personal_check').html(emailadd_personal);


                btnnext.trigger('click');
                },
                error: function(response){
                console.log('www.cocogen.com - Vehicle Info');

                }
            });

        });


        jQuery(document).on('input', '#fader', function() {
            jQuery('#slider_value').html( jQuery(this).val() );
            jQuery("#totalValue").val(addCommas((jQuery(this).val()).toString(2)));
        });

        jQuery("#grossPrem,#totalValue,#device_access_value").on({
            keyup: function() {
            formatCurrency(jQuery(this));
            },
            blur: function() {
            formatCurrency(jQuery(this), "blur");
            }

        });
        $(document).ready(function() {
            $('#grossPrem').change(function(e) {
                var txtVal = $(this).val();
                $('#grossPrem1').val(txtVal );

                var valuesAccesory = $("input[name='device_access_value[]']").map(function(){
                    return $(this).val().replace(/[^a-z0-9\s.]/gi, '');
                    }).get();

                    var AccesoryTotal = 0;
                    $.each( valuesAccesory, function( index, value ){
                    AccesoryTotal +=parseFloat(value);
                    });

                    jQuery('#totalAcceso').val(AccesoryTotal);
                    var eVal = (isNaN(AccesoryTotal)) ? 0 : AccesoryTotal;

                    // Body INJURY
                    var bodyInjury = jQuery('#bodyInjuryPc').val();
                    var propertyDamage = jQuery('#propertyDamagePc').val();



                    // Property damage
                    // var propertyDamage = jQuery('#bodyInjury').val();

                    // TOTAL VALUE FAIR MARKET VALUE
                    var totalValue =  jQuery('#totalValue').val();

                    var totalval = totalValue.replace(/[^a-z0-9\s.]/gi, '');

                    var totalValCompute =  parseFloat(totalval)   + parseFloat(eVal) ;
                    //AOD AOD
                    var aod = jQuery('#actOfNature').val();
                    if( typeof aod === 'undefined' || aod === null  || aod === '' ){
                    // myVar is undefined or null
                    var aod = '0.00';
                    }else{
                        var aod = jQuery('#actOfNature').val();
                    }


                    // OWND DAMAGE THEF
                    var seattypevalue = $('#model').val().toLowerCase();
                    var owdRate;

                    if (seattypevalue.indexOf('truck') !== -1 || seattypevalue.indexOf('bus') !== -1) {
                        owdRate = 0.00;
                    } else if (seattypevalue.indexOf('suv') !== -1 || seattypevalue.indexOf('van') !== -1 ||
                            seattypevalue.indexOf('pick-up') !== -1 || seattypevalue.indexOf('auv') !== -1) {
                        owdRate = 0.009;
                    } else {
                        //sedan
                        owdRate = 0.007;
                    }


                    var minODT = owdRate *  parseFloat(totalValCompute)
                    // var maxODT = 0.03 *  parseFloat(totalValCompute)

                    // COMPUTATION WILL UNDERGO HERE  MINIMUM DESIRE GROSS PREMIUM


                    var getMinOdt = parseFloat(minODT);
                    var getAOD =  parseFloat(totalValCompute) * parseFloat(aod);
                    var basepremium = parseFloat(getMinOdt) + parseFloat(bodyInjury) + parseFloat(propertyDamage) + parseFloat(getAOD);


                    var docstomp = Math.ceil(basepremium/4)/2;
                    var vat = basepremium * 0.12;
                    var localgovernment = basepremium  * 0.002;
                    var minGross = basepremium + docstomp + vat + localgovernment;

                    // var validateMinGross  = Number(minGross.toFixed(2)).toLocaleString('en');
                    var validateMinGross = parseFloat(minGross.toFixed(2).replace(/,/g, ''));
                    /// END OF MINIMUM COMPUTATION

                    //  COMPUTATION WILL UNDERGO HERE  MAXIMUM DESIRE GROSS PREMIUM COMMENTED THE MAXIMUM PAYMENT

                    // var getMaxOdt =parseFloat(maxODT);
                    // var getAOD =  parseFloat(totalValCompute) * parseFloat(aod);
                    // var basepremium = parseFloat(getMaxOdt) + parseFloat(bodyInjury) + parseFloat(propertyDamage) + parseFloat(getAOD);

                    // var docstomp = Math.ceil(basepremium/4)/2;
                    // var vat = basepremium * 0.12;
                    // var localgovernment = basepremium  * 0.002;
                    // var maxGross = basepremium + docstomp + vat + localgovernment;
                    // var validateMaxGross = parseFloat(maxGross.toFixed(2).replace(/,/g, ''));

                    // /// END OF MAXIMUM COMPUTATION
                    var grossPrem =  parseFloat($('#grossPrem1').val().replace(/,/g, ''));
                // if (parseFloat(grossPrem) >= parseFloat(validateMinGross) && parseFloat(grossPrem) <= parseFloat(validateMaxGross)) {

                if (parseFloat(grossPrem) >= parseFloat(validateMinGross) ) {
                    console.log('good');
                    $('#displayrange').hide();
                } else {
                    console.log('error');
                        var min = minGross.toFixed(2);
                        jQuery('#minVal').html(Number(min).toLocaleString('en'));
                        // var max = maxGross.toFixed(2);
                        // jQuery('#maxVal').html(Number(max).toLocaleString('en'));
                        var displayRange = $('#displayrange');
                        displayRange.html("Min: " + Number(min).toLocaleString('en')).css('color', 'red');

                        $('#displayrange').css('border-color', '#F44336');
                        jQuery('#grossPrem').val('');
                     // Update the appended value when an error occurs
                        displayRange.html("Min: " + Number(minGross).toLocaleString('en') ).css('color', 'red');
                    $('#displayrange').show();
                    }

            });
        });


function vf_commafy(elementid, decimalplaces, roundupinteger) {
  var strNumber = document.getElementById(elementid).value;
  if(strNumber != '') {
    var intValue = '';
    var decimalValue = '';
    var cparts = new Array();
    if(strNumber.indexOf('.') >= 0) {
        cparts = strNumber.split('.');
    } else {
        cparts[0] = strNumber;
    }
    if(cparts[0].length > 3) {
      var comma_iterator = 0;
      for (var i = cparts[0].length-1; i>=0; i--) {
        intValue = cparts[0].charAt(i) + intValue;
        comma_iterator++;
        if(comma_iterator == 3) {
          comma_iterator = 0;
          if(i != 0) {
            intValue = ',' + intValue;
          }
        }
      }
    } else {
      intValue = cparts[0];
    }

    if(cparts[1] > 0) {
      decimalValue = cparts[1];
    }
    if(decimalplaces > 0) {
      if(decimalValue.length > decimalplaces) {
        var remainder = decimalValue.substr(decimalplaces)
        if( remainder >= ( 10**remainder.length / 2)) {
          decimalValue = decimalValue.substr(0, decimalplaces);
          decimalValue = parseInt(decimalValue) + 1;
        } else {
          decimalValue = decimalValue.substr(0, decimalplaces);
        }
      }
      else if(decimalValue.length < decimalplaces) {
        for( var i = decimalValue.length; i < decimalplaces; i++) {
          decimalValue = decimalValue + '0';
        }
      }
    }
    if(roundupinteger) {
        var roundingFactor = 5;
        if(decimalValue.length > 1) {
          roundingFactor = roundingFactor * (10 * (decimalValue.length - 1));
        }
        if(decimalValue >= roundingFactor) {
          intValue = parseInt(intValue) + 1;
        }
        decimalValue = '';
    } else {
      intValue = intValue + '.' + decimalValue;
    }
    document.getElementById(elementid).value = intValue;
  }
}
    </script>
<script> // THIRD PAGE TATLO
 $(document).ready(function() {
  $('#chckquote_agree').change(function() {
    if ($(this).is(':checked')) {
      // The checkbox is checked, perform your validation or other actions here
     $('#checkvalidate').val('1');
      // Add your validation logic or other actions here
    } else {
      // The checkbox is not checked
      $('#checkvalidate').val('0');
      // Handle the case when the checkbox is not checked, if needed
    }
  });
});

 $('#proceed').hide();
        $('#save_summary').click(function(e){
            e.preventDefault();
            jQuery.noConflict();

            $(".validation_check").remove();
            $(".validation_check_error").remove();
            $(".validation_check_success").remove();

            var errornumber = 0;
            if (!$('#chckquote_agree').is(':checked')) {
            $('#acceptSummarycheck').css('border-color', '#F44336');
            $("#acceptSummarycheck").after("<div class='validation_check' style='opacity:0.7;color:#F44336;'>Please confirm</div>");
            errornumber = 1;
            } else {
            $('#acceptSummarycheck').css('border-color', '#4BB543');
            }

            if (errornumber === 1) {
            return false;
            }

            var transno = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type:'POST',
                url: "{{ url('/get-policy-quote/vehicle/saveSummaryInfo')}}",
                data: $('#car_vehicle_summary').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
                dataType: 'json',
            success: (response) => {
                // Get the type of car
                    var sessionId = $('#transno').val();

                jQuery('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model,#seatNo, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #residence_address, #mailing_province').prop('readonly', true);
                jQuery("#fader").prop("disabled", true);
                jQuery('#drpYear').prop("disabled", true);
                jQuery('#brand').prop("disabled", true);
                jQuery('#model').prop("disabled", true);
                jQuery('input[name="device_access_value[]"]').prop("readonly", true);
                jQuery("select[name='device_access_year[]']").prop("disabled", true);
                jQuery('#bodilyInjury').prop("disabled", true);

                jQuery('#residence_province').prop("disabled", true);
                jQuery('#residence_municipality').prop("disabled", true);
                jQuery('#residence_barangay').prop("disabled", true);


                jQuery('#mailing_province').prop("disabled", true);
                jQuery('#mailing_municipality').prop("disabled", true);
                jQuery('#mailing_barangay').prop("disabled", true);

                jQuery('#chckquote_agree').prop("disabled", true);

                jQuery('#aon').on('click', function(event) {
                    event.preventDefault(); // Prevent any click events from affecting the checkbox state.
                    return false;
                });
                jQuery(".a-btn-slide-text").css("pointer-events", "none");
                jQuery('#proceed').show();
            },
            error: function(response){
                console.log('www.cocogen.com');

            }
        });

    });
  $('#proceed').click(function() {
    var transno = $("input[name='transno']").val();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
            type:'POST',
                url: "{{ url('/get-policy-quote/vehicle/procceedSummary')}}",
                data: $('#car_vehicle_summary').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
                dataType: 'json',
            success: (response) => {
                // Get the type of car

                jQuery('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model,#seatNo, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #residence_address, #mailing_province').prop('readonly', true);
                jQuery("#fader").prop("disabled", true);
                jQuery('#drpYear').prop("disabled", true);
                jQuery('#brand').prop("disabled", true);
                jQuery('#model').prop("disabled", true);
                jQuery('input[name="device_access_value[]"]').prop("readonly", true);
                jQuery("select[name='device_access_year[]']").prop("disabled", true);
                jQuery('#bodilyInjury').prop("disabled", true);

                jQuery('#residence_province').prop("disabled", true);
                jQuery('#residence_municipality').prop("disabled", true);
                jQuery('#residence_barangay').prop("disabled", true);


                jQuery('#mailing_province').prop("disabled", true);
                jQuery('#mailing_municipality').prop("disabled", true);
                jQuery('#mailing_barangay').prop("disabled", true);
                jQuery('#aon').prop("disabled", true);
                jQuery('#chckquote_agree').prop("disabled", true);
                jQuery(".a-btn-slide-text").css("pointer-events", "none");
                btnnext.trigger('click');
            },
            error: function(response){
                console.log('www.cocogen.com');

            }
        });


    });

  $('#send_mail').click(function(e){
        e.preventDefault();
        jQuery.noConflict();

        $(".validation_check").remove();
        $(".validation_check_error").remove();
        $(".validation_check_success").remove();

        var errornumber = 0;
        if (!$('#chckquote_agree').is(':checked')) {
        $('#acceptSummarycheck').css('border-color', '#F44336');
        $("#acceptSummarycheck").after("<div class='validation_check' style='opacity:0.7;color:#F44336;'>Please confirm</div>");
        errornumber = 1;
        } else {
        $('#acceptSummarycheck').css('border-color', '#4BB543');
        }

        if (errornumber === 1) {
        return false;
        }
        var transno = $("input[name='transno']").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
          type:'POST',
            url: "{{ url('/get-policy-quote/vehicle/saveSummaryMail')}}",
            data: $('#car_vehicle_summary').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
            dataType: 'json',
           success: (response) => {
            console.log(response);
            // Get the type of car
            jQuery('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model,#seatNo, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #residence_address, #mailing_province').prop('readonly', true);
            jQuery("#fader").prop("disabled", true);
            jQuery('#drpYear').prop("disabled", true);
            jQuery('#brand').prop("disabled", true);
            jQuery('#model').prop("disabled", true);
            jQuery('input[name="device_access_value[]"]').prop("readonly", true);
            jQuery("select[name='device_access_year[]']").prop("disabled", true);
            jQuery('#bodilyInjury').prop("disabled", true);
            jQuery('#residence_province').prop("disabled", true);
            jQuery('#residence_municipality').prop("disabled", true);
            jQuery('#residence_barangay').prop("disabled", true);
            jQuery('#mailing_province').prop("disabled", true);
            jQuery('#mailing_municipality').prop("disabled", true);
            jQuery('#mailing_barangay').prop("disabled", true);
            jQuery('#chckquote_agree').prop("disabled", true);
            jQuery(".a-btn-slide-text").css("pointer-events", "none");
            jQuery('#aon').prop("disabled", true);
            $('#showSendMail').trigger('click');
           },
           error: function(response){
            console.log(response);

          }
       });

  });

</script>


<script type="text/javascript"> // PAGE Four APAT
    $('#CompreThirdTabNext').click(function(e){
            e.preventDefault();

              $(".validation_plateno").remove();
                    $(".validation_plateno_check_error").remove();
                    $(".validation_plateno_check_success").remove();

                    $(".validation_engineno").remove();
                    $(".validation_engineno_check_error").remove();
                    $(".validation_engineno_check_success").remove();

                    $(".validation_color").remove();
                    $(".validation_color_check_error").remove();
                    $(".validation_color_check_success").remove();

                    // $(".validation_conduction").remove();
                    // $(".validation_conduction_check_error").remove();
                    // $(".validation_conduction_check_success").remove();

                    // $(".validation_mvfileno").remove();
                    // $(".validation_mvfileno_check_error").remove();
                    // $(".validation_mvfileno_check_success").remove();

                    $(".validation_policyincept").remove();
                    $(".validation_policyincept_check_error").remove();
                    $(".validation_policyincept_check_success").remove();

                    $(".validation_chasis").remove();
                    $(".validation_chasis_check_error").remove();
                    $(".validation_chasis_check_success").remove();

                    $(".validation_gender_personal_info").remove();
                     $(".validation_gender_personal_info_check_error").remove();
                     $(".validation_gender_personal_info_check_success").remove();

                     $(".validation_status_other_personal_info").remove();
                     $(".validation_status_other_personal_info_check_error").remove();
                     $(".validation_status_other_personal_info_check_success").remove();

                    $(".validation_birthDate_validation").remove();
                     $(".validation_birthDate_check_error").remove();
                     $(".validation_birthDate_check_success").remove();

                     $(".validation_status_other_personal_info").remove();
                     $(".validation_status_other_personal_info_check_error").remove();
                     $(".validation_status_other_personal_info_check_success").remove();

                     $(".validation_nationality_other_personal_info").remove();
                     $(".validation_nationality_other_personal_info_check_error").remove();
                     $(".validation_nationality_other_personal_info_check_success").remove();

                     $(".validation_place_of_birth_other_personal_info").remove();
                     $(".validation_place_of_birth_other_personal_info_check_error").remove();
                     $(".validation_place_of_birth_other_personal_info_check_success").remove();

                     $(".validation_type_of_id_personal_info").remove();
                     $(".validation_type_of_id_personal_info_check_error").remove();
                     $(".validation_type_of_id_personal_info_check_success").remove();

                     $(".validation_idno_other_personal_info").remove();
                     $(".validation_idno_other_personal_info_check_error").remove();
                     $(".validation_idno_other_personal_info_check_success").remove();


                     $(".validation_occupation_personal_info").remove();
                     $(".validation_occupation_personal_info_check_error").remove();
                     $(".validation_occupation_personal_info_check_success").remove();

                     $(".validation_tel_no_info").remove();
                     $(".validation_tel_no_info_check_error").remove();
                     $(".validation_tel_no_info_check_success").remove();

                     errornumber= 0;
                    // if($('#mvfileno').val() == "" || $('#mvfileno').val() == null){
                    //     $('#mvfileno').css('border-color', '#F44336');
                    //     $("#mvfileno").after("<div class='validation_mvfileno v-error-msg'>MV File no is empty</div>");
                    //     $('#mvfileno').after('<i class="fa fa-times-circle validation_mvfileno_check_error fa-1x " aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    //     errornumber = 1;
                    // }else{
                    //     $('#mvfileno').after('<i class="fa fa-check-circle validation_mvfileno_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    //     $('#mvfileno').css('border-color', '#4BB543');
                    // }


                    if($('#plateno').val() == "" || $('#plateno').val() == null){
                        $('#plateno').css('border-color', '#F44336');
                        $("#plateno").after("<div class='validation_plateno v-error-msg''>Plate no is empty</div>");
                        $('#plateno').after('<i class="fa fa-times-circle validation_plateno_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                        errornumber = 1;
                    }else{
                        $('#plateno').after('<i class="fa fa-check-circle validation_plateno_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                        $('#plateno').css('border-color', '#4BB543');

                    }

                    if($('#engineno').val() == "" || $('#engineno').val() == null){
                        $('#engineno').css('border-color', '#F44336');
                        $("#engineno").after("<div class='validation_engineno v-error-msg'>Engine no is empty</div>");
                        $('#engineno').after('<i class="fa fa-times-circle validation_engineno_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                        errornumber = 1;
                    }else{
                        $('#engineno').after('<i class="fa fa-check-circle validation_engineno_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                        $('#engineno').css('border-color', '#4BB543');
                    }

                    if($('#color').val() == "" || $('#color').val() == null){
                        $('#color').css('border-color', '#F44336');
                        $("#color").after("<div class='validation_color v-error-msg''>Color is empty</div>");
                        $('#color').after('<i class="fa fa-times-circle validation_color_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                        errornumber = 1;
                    }else{
                        $('#color').after('<i class="fa fa-check-circle validation_color_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                        $('#color').css('border-color', '#4BB543');
                    }

                    // if($('#conduction').val() == "" || $('#conduction').val() == null){
                    //     $('#conduction').css('border-color', '#F44336');
                    //     $("#conduction").after("<div class='validation_conduction v-error-msg''>Conduction Sticker No is empty</div>");
                    //     $('#conduction').after('<i class="fa fa-times-circle validation_conduction_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                    //     errornumber = 1;
                    // }else{
                    //     $('#conduction').after('<i class="fa fa-check-circle validation_conduction_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                    //     $('#conduction').css('border-color', '#4BB543');
                    // }
                    if($('#plateno').val() == "" || $('#plateno').val() == null){

                        if($('#chasis').val() == ""){
                            $('#chasis').css('border-color', '#F44336');
                            $("#chasis").after("<div class='validation_mvfileno v-error-msg''>Chasis is empty</div>");
                            $('#chasis').after('<i class="fa fa-times-circle validation_chasis_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                            errornumber = 1;
                        }else{
                            $('#chasis').after('<i class="fa fa-check-circle validation_chasis_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                            $('#chasis').css('border-color', '#4BB543');
                        }

                    }

                    if($('#policyincept').val() == "" || $('#policyincept').val() == null){
                        $('#policyincept').css('border-color', '#F44336');
                        $("#policyincept").after("<div class='validation_policyincept v-error-msg''>Policy Incept is empty</div>");
                        $('#policyincept').after('<i class="fa fa-times-circle validation_policyincept_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                        errornumber = 1;
                    }else{
                        $('#policyincept').after('<i class="fa fa-check-circle validation_policyincept_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                        $('#policyincept').css('border-color', '#4BB543');
                    }



                     //validation gender
                     if($('#gender_personal_info').val() == ""){
                            $("#gender_personal_info").after("<div class='validation_gender_personal_info v-error-msg'>Gender is empty</div>");
                            $('#gender_personal_info').fieldErrorState();
                         errornumber = 1;
                     }else{
                            $('#gender_personal_info').fieldSuccessState();
                     }

                     if($('#birthDate').val() == "" || $('#mvfileno').val() == null){
                        $('#birthDate').css('border-color', '#F44336');
                        $("#birthDate").after("<div class='validation_birthDate_validation v-error-msg'>Birth Date is empty</div>");
                        $('#birthDate').after('<i class="fa fa-times-circle validation_birthDate_check_error fa-1x" aria-hidden="true" style="z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #F44336;size:20px;"></i>');
                        errornumber = 1;
                    }else{
                        $('#birthDate').after('<i class="fa fa-check-circle validation_birthDate_check_success fa-1x" aria-hidden="true" style=" z-index: 1;float: right;top:-32px; position: relative;left:-20px !important;color: #4BB543;size:20px;"></i>');
                        $('#birthDate').css('border-color', '#4BB543');
                    }

                                 //validation place of birth
                     if($('#place_of_birth_other_personal_info').val() == ""){
                        $("#place_of_birth_other_personal_info").after("<div class='validation_place_of_birth_other_personal_info v-error-msg'>Place of birth is empty</div>");
                         $('#place_of_birth_other_personal_info').fieldErrorState();
                         errornumber = 1;
                     }else{
                     // $('#place_of_birth_other_personal_info').css('border-color', '#4BB543');
                         $('#place_of_birth_other_personal_info').fieldSuccessState();
                     }


                     if($('#status_other_personal_info').val() == ""){
                            $("#status_other_personal_info").after("<div class='validation_status_other_personal_info v-error-msg'>Status is empty</div>");
                         $('#status_other_personal_info').fieldErrorState();
                         errornumber = 1;
                     }else{
                         $('#status_other_personal_info').fieldSuccessState();
                     }

                     //validation nationality
                     if($('#nationality_other_personal_info').val() == ""){
                            $("#nationality_other_personal_info").after("<div class='validation_nationality_other_personal_info v-error-msg'>Nationality is empty</div>");
                         $('#nationality_other_personal_info').fieldErrorState();
                         errornumber = 1;
                     }else{
                         $('#nationality_other_personal_info').fieldSuccessState();
                     }

                        //validation occupation
                     if($('#occupation').val() == ""){
                         // $('.btn-white-occupation_personal_info').css('border-color', '#CF3C4B');
                            $("#occupation").after("<div class='validation_occupation_personal_info v-error-msg'>Occupation is empty</div>");
                         // $('#occupation_personal_info').after('<i class="fa fa-times-circle validation_occupation_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-40px !important;color: #CF3C4B;size:20px;z-index: 2 !important;"></i>');
                            $('#occupation').fieldErrorState();
                         errornumber = 1;
                     }else{
                         // $('#occupation_personal_info').after('<i class="fa fa-check-circle validation_occupation_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;coccupation_personal_info;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
                         // $('.btn-white-occupation_personal_info').css('border-color', '#4BB543');
                            $('#occupation').fieldSuccessState();
                     }

                     //validation type of ID
                     if($('#type_of_id_personal_info').val() == ""){
                         // $('.btn-white-type_of_id_personal_info').css('border-color', '#CF3C4B');
                            $("#type_of_id_personal_info").after("<div class='validation_type_of_id_personal_info v-error-msg'>Type of ID is empty</div>");
                         // $('#type_of_id_personal_info').after('<i class="fa fa-times-circle validation_type_of_id_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;color: #CF3C4B;z-index: 2 !important;"></i>');
                         $('#type_of_id_personal_info').fieldErrorState();
                         errornumber = 1;
                     }else{
                         // $('#type_of_id_personal_info').after('<i class="fa fa-check-circle validation_type_of_id_personal_info_check_success fa-lg" aria-hidden="true" style=" float: right;top:-32px; position: relative;left:-25px !important;color: #4BB543;z-index: 2 !important;"></i>');
                         // $('.btn-white-type_of_id_personal_info').css('border-color', '#4BB543');
                         $('#type_of_id_personal_info').fieldSuccessState();
                     }

                     //validation id no
                     if($('#idno_other_personal_info').val() == ""){
                         // $('#idno_other_personal_info').css('border-color', '#CF3C4B');
                            $("#idno_other_personal_info").after("<div class='validation_idno_other_personal_info v-error-msg'>ID No is empty</div>");
                         // $('#idno_other_personal_info').after('<i class="fa fa-times-circle validation_idno_other_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #CF3C4B;size:20px;"></i>');
                         $('#idno_other_personal_info').fieldErrorState();
                         errornumber = 1;
                     }else{
                         // $('#idno_other_personal_info').after('<i class="fa fa-check-circle validation_idno_other_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                         // $('#idno_other_personal_info').css('border-color', '#4BB543');
                         $('#idno_other_personal_info').fieldSuccessState();
                     }



                     if ($('#file-upload')[0].files.length == 0) {

                         $("#upload_Error").html("Please upload your ID.");
                          $("#upload_Error").show();
                          $("#upload_label").hide();
                          $("#upload_file").hide();
                          errornumber = 1;
                     }




                    if(errornumber == 1){
                         return false;
                     }


            var transno = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var form = $('#car_vehicle_others')[0]; // Get the underlying DOM form element
            var formData = new FormData(form);
            formData.append('trans_id', transno);
            formData.append('_token', csrf_token);


           $.ajax({
              type:'POST',
                url: "{{ url('/get-policy-quote/vehicle/additionalInfo')}}",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
               success: (response) => {
                var encrpyttransno = $('#encrpyttransno').val(response.transno);
                var policyincept = $('#policyincept').val();
                var date = new Date(policyincept);
                var options = { month: 'long', day: 'numeric', year: 'numeric' };
                var formattedDate = date.toLocaleString('default', options);
                date.setFullYear(date.getFullYear() + 1);
                var updatedFormattedDate = date.toLocaleString('default', options);
                var policywithdate = formattedDate + ' - '+ updatedFormattedDate;
                $('#policyincept_coverage_check').html(policywithdate);
                // Get the type of car
                $('#mvfileno_final').html($('#mvfileno').val())
                $('#plateno_final').html($('#plateno').val())
                $('#engineno_final').html($('#engineno').val())
                $('#color_final').html($('#color').val())
                $('#chassis_final').html($('#chasis').val())

                if (typeof $('#mortgagee').val() !== 'undefined' && $('#mortgagee').val() !== '') {
                $('#mortgage_label_final').show();
                $('#mortgage_final').html($('#mortgagee').val());
            } else {
                $('#mortgage_label_final').hide();
            }


                btnnext.trigger('click');
               },
               error: function(response){
                console.log('cocogen.com additional Info');

              }
           });

      });



        $('#file-upload').change(function() {
          var i = $(this).prev('label').clone();
          var file = $('#file-upload')[0].files[0].name;

            if (this.files[0].size > 5000000) {
                $("#upload_Error").html("File size must not be greater than 5MB.");
                $("#upload_Error").show();
                $("#upload_label").hide();
                $("#upload_file").hide();

                $('#file-upload').val("");
            }else{
                $("#upload_Error").hide();
                $("#upload_file").show();
                $("#upload_label").hide();
                $("#upload_file_file").empty();
                $("#upload_file_file").html(file);


            }

        });


        jQuery(document).ready(function(e) {
             var j = jQuery.noConflict();
            jQuery('#policyincept').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'mm/dd/yy',
                // minDate: '1d',
                maxDate: '20y',
                yearRange: '1910:9999'
            }).on('change', function() {

                if (!jQuery('select').parent().hasClass('fake-select')) {
                    jQuery('select').wrap('<span class="fake-select"></span>');
                }
            });
        });

        jQuery('#policyincept').on('change', function() {
            var selectedDate = new Date(this.value);
            var currentDate = new Date();

            // Compare the selected date with the current date
            if (selectedDate < currentDate) {
                jQuery('#policyDate').show();
            }
        });

        jQuery("#btnConfirmPolicy").click(function () {
        jQuery('#policyDate').hide();
      });

        jQuery(document).ready(function(e) {
             var j = jQuery.noConflict();
               jQuery('#birthDate').datepicker({
                 changeMonth: true,
                 changeYear: true,
                 dateFormat: 'mm/dd/yy',
                 minDate: '-60y',
                 maxDate:'-18y',
                 yearRange: '1910:9999'
                }).on('focus', function(){
                    if(!jQuery('select').parent().hasClass('fake-select')){
                        jQuery('select').wrap('<span class="fake-select"></span>');
                    }
                });
            });

            function CheckNumeric(e) {
            if (window.event) // IE
            {
                if ((e.keyCode < 48 || e.keyCode > 57) & e.keyCode != 8 && e.keyCode != 44) {
                    event.returnValue = false;
                    return false;
                }
            }
            else { // Fire Fox
                if ((e.which < 48 || e.which > 57) & e.which != 8 && e.which != 44) {
                    e.preventDefault();
                    return false;
                }
            }
        }
        </script>


<script>//LAST PAGE LIMA
    function generatePDF() {

    if ($("#CBPrivacy").prop('checked') != true) {
        message = "Please accept our Privacy Policy before proceeding to payment.";
    }

    if ($("#CBTerms").prop('checked') != true) {
        message = "Please accept our Terms & Conditions before proceeding to payment.";
    }

    if ($("#CBExclusion").prop('checked') != true) {
        message = "Please accept our Exclusion & Limitations before proceeding to payment.";
    }

    if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

        return false;
    }
    // Disable all
    $('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #chckquote_agree, #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #mortgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info, #residence_address, #mailing_province').prop('readonly', true);
  	$('#file-upload').prop('readonly', true);
    $("select, input[type='checkbox'],#fader,#file-upload").prop("disabled", true);
    $(".a-btn-slide-text").css("pointer-events", "none");

        var transno = $("input[name='encrpyttransno']").val();
        var transno2 = $('#encrypt_last_trans').val();
        var transno3 = $('#transno').val();


            var transnum = transno ? $("input[name='encrpyttransno']").val() :
                        transno2 ? $('#encrypt_last_trans').val() :
                        transno3 ? $('#transno').val() : null;


        var url = "{{ url('get-policy-quote/viewpdf', 'transno') }}".replace('transno', transnum);

        // Open the URL in a new window or tab
        window.open(url);
        $('#check_disable1').val('1');
        $('#check_disable2').val('1');
        $('#check_disable3').val('1');
        $('#check_disable4').val('1');
        $('#base_format_last').val($('#base_format').val());
        $('#gross_format_last').val($('#gross_format').val());
        $('#final_format_last').val($('#final_format').val());
        $('#transnolast').val($('#transno').val());
        $('#encrypt_last_trans').val(transno);



    }

    function generatePDFBank() {

    if ($("#CBPrivacy").prop('checked') != true) {
        message = "Please accept our Privacy Policy before proceeding to payment.";
    }

    if ($("#CBTerms").prop('checked') != true) {
        message = "Please accept our Terms & Conditions before proceeding to payment.";
    }

    if ($("#CBExclusion").prop('checked') != true) {
        message = "Please accept our Exclusion & Limitations before proceeding to payment.";
    }

    if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

        return false;
    }
    // Disable all
    $('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #chckquote_agree, #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #mortgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info, #residence_address, #mailing_province').prop('readonly', true);
    $('#file-upload').prop('readonly', true);
    $("select, input[type='checkbox'],#fader,#file-upload").prop("disabled", true);
    $(".a-btn-slide-text").css("pointer-events", "none");
        var transno = $("input[name='encrpyttransno']").val();
        var transno2 = $('#encrypt_last_trans').val();
        var transno3 = $('#transno').val();

        var transnum = transno ? $("input[name='encrpyttransno']").val() :
                        transno2 ? $('#encrypt_last_trans').val() :
                        transno3 ? $('#transno').val() : null;

        var url = "{{ url('get-policy-quote/viewpdf/bankcert', 'transno') }}".replace('transno', transnum);

        // Open the URL in a new window or tab
        window.open(url);
        $('#check_disable1').val('1');
        $('#check_disable2').val('1');
        $('#check_disable3').val('1');
        $('#check_disable4').val('1');
        $('#base_format_last').val($('#base_format').val());
        $('#gross_format_last').val($('#gross_format').val());
        $('#final_format_last').val($('#final_format').val());
        $('#transnolast').val($('#transno').val());
        $('#encrypt_last_trans').val(transno);



    }

  $(document).ready(function() {
    $('#car_vehicle_pay').submit(function(event) {
      var message = "";

      if (!$('#CBPrivacy').prop('checked')) {
        message += "Please accept our Privacy Policy before proceeding to payment. ";
      }

      if (!$('#CBTerms').prop('checked')) {
        message += "Please accept our Terms & Conditions before proceeding to payment. ";
      }

      if (!$('#CBExclusion').prop('checked')) {
        message += "Please accept our Exclusion & Limitations before proceeding to payment.";
      }

      if (message !== "") {
        event.preventDefault(); // Prevent form submission if any checkbox is not checked
        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>" + message + "</div>");
      }
    });
  });

$('#check_payment').hide();

  $('#save_last').click(function(e){
        e.preventDefault();
        jQuery.noConflict();
        jQuery('#check_payment').hide();
        var transno;
        if ($("input[name='transno']").val() !== "") {
            transno = $("input[name='transno']").val();
        } else {
            transno = $("input[name='encrpyttransno']").val();
        }

        var csrf_token = $('meta[name="csrf-token"]').attr('content');
    	var message = "";


    if ($("#CBPrivacy").prop('checked') != true) {
        message = "Please accept our Privacy Policy before proceeding to payment.";
    }

    if ($("#CBTerms").prop('checked') != true) {
        message = "Please accept our Terms & Conditions before proceeding to payment.";
    }

    if ($("#CBExclusion").prop('checked') != true) {
        message = "Please accept our Exclusion & Limitations before proceeding to payment.";
    }

    if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

        return false;
    }
       $.ajax({
          type:'GET',
            url: "{{ url('/get-policy-quote/viewpdf/sendmailwithattachement') }}/" + transno,
            data: $('#car_vehicle_pay').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
            dataType: 'json',
           success: (response) => {

                    $('#firstName_personal_info, #middleName_personal_info, #lastName_personal_info, #contactNo_personal_info, #email_personal_info, #residence_province, #residence_municipality, #residence_barangay, #chckSameAddress, #mailing_address, #mailing_municipality, #mailing_barangay, #source_personal_info, #drpYear, #brand, #model, #totalValue, #device_access_year, #device_access_value, #bodilyInjury, #grossPrem, #chckquote_agree, #mvfileno, #plateno, #engineno, #color, #conduction, #chasis, #policyincept, #mortgagee, #gender_personal_info, #birthDate, #place_of_birth_other_personal_info, #nationality_other_personal_info, #occupation, #telNo, #type_of_id_personal_info, #idno_other_personal_info, #residence_address, #mailing_province').prop('readonly', true);
  	                $('#file-upload').prop('readonly', true);
                    $("select, input[type='checkbox'],#fader").prop("disabled", true);
                    $(".a-btn-slide-text").css("pointer-events", "none");
                    $("#file-upload").css("display", "none");
                    $('#transno').val(response.transno);
                    // $('#check_disable').val('1');
                    $('#check_disable1').val('1');
                    $('#check_disable2').val('1');
                    $('#check_disable3').val('1');
                    $('#check_disable4').val('1');
                    $('#showSendMail').trigger('click');
                    console.log('cocogen.com send email');

            },
            error: function(response){

            console.log('cocogen.com');

          }
       });

  });

  $('#postpolicy').click(function(e){
        e.preventDefault();
        jQuery.noConflict();
        jQuery('#check_payment').hide();
        var transno;
        if ($("input[name='transno']").val() !== "") {
            transno = $("input[name='transno']").val();
        } else {
            transno = $("input[name='encrpyttransno']").val();
        }

        var csrf_token = $('meta[name="csrf-token"]').attr('content');
    	var message = "";


    if ($("#CBPrivacy").prop('checked') != true) {
        message = "Please accept our Privacy Policy before proceeding to payment.";
    }

    if ($("#CBTerms").prop('checked') != true) {
        message = "Please accept our Terms & Conditions before proceeding to payment.";
    }

    if ($("#CBExclusion").prop('checked') != true) {
        message = "Please accept our Exclusion & Limitations before proceeding to payment.";
    }

    if ($('#CBPrivacy:checked, #CBTerms:checked, #CBExclusion:checked').length < 3) {

        $('#checkfirst').html("<div class='validation_occupation_personal_info v-error-msg'>"+ message + "</div>")

        return false;
    }
       $.ajax({
          type:'POST',
            url: "{{ url('/get-policy-quote/vehicle/postpolicy') }}/" + transno,
            data: $('#car_vehicle_pay').serialize()+ "&trans_id=" + transno + "&_token=" + csrf_token,
            dataType: 'json',
           success: (response) => {

                jQuery('#save_last').show();
                jQuery('#pdfview').show();
                if (typeof $('#mortgagee').val() !== 'undefined' && $('#mortgagee').val() !== '') {
                    jQuery('#pdfviewbank').show();
                }else{
                    jQuery('#pdfviewbank').hide();
                }

                jQuery('#ComprefourthTabBuy').hide();
                jQuery('#postpolicy').hide();
                console.log('cocogen.com post');

            },
            error: function(response){

            console.log('cocogen.com');

          }
       });

  });
</script>
<style type="text/css">

    .progress {
    height: 11px;
    background-color: #F1F1F1;
    box-shadow: none;
    }
    .progress-bar {
    background: #008080;
    }
    .table-data1 .table > thead:first-child > tr:first-child > th,
    .table-data1 .table > tbody > tr > td,
    .table-data1 .table > tfoot > tr > td {
    padding: 0.8rem 0.8rem;
    border-right: 1px solid #B8B8B8;
    }


</style>
