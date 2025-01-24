
<script type="text/javascript">
var j = jQuery.noConflict();

window.onload = function() {
    var defaultProvince = j('#residence_province_default').val();
    j('#residence_province').val(defaultProvince).change();
    var defaultProvincemail = j('#mailing_province_default').val();
    j('#mailing_province').val(defaultProvincemail).change();
    var defaultModelCar = j('#model_default').val();
    j('.dynamic').val(defaultModelCar).change();


};


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


j('#residence_province').change(function() {
    if (j(this).val() != '') {
        var province = j(this).val();
        var _token = j('input[name="_token"]').val();
        j.ajax({
            url: '{{url('/')}}' + '/api/covid/city/get',
            method: "GET",
            data: { _token: _token, province: province },
            success: function(result) {
                j('#residence_municipality').empty();
                j('#residence_barangay').empty();
                j('#residence_municipality').append(j('<option>', {
                    value: "",
                    text: "- Select City/Municipality -"
                }));
                j.each(result, function(key, value) {
                    var option = j('<option>', {
                        value: value.city,
                        text: value.city
                    });
                    j('#residence_municipality').append(option);
                });

                // Set default selected municipality
                var defaultMunicipality = j('#residence_city_default').val();
                j('#residence_municipality').val(defaultMunicipality).change();

                j('#residence_municipality').selectpicker("refresh");
            }
        });
    }
});

j('#residence_municipality').change(function() {
    if (j(this).val() != '') {
        var city = j(this).val();
        var _token = j('input[name="_token"]').val();
        j.ajax({
            url: '{{url('/')}}' + '/api/covid/barangay/get',
            method: "GET",
            data: { _token: _token, city: city },
            success: function(result) {
                j('#residence_barangay').empty();
                j('#residence_barangay').append(j('<option>', {
                    value: "",
                    text: "- Select Barangay -"
                }));
                j.each(result, function(key, value) {
                    var option = j('<option>', {
                        value: value.barangay,
                        text: value.barangay
                    });
                    j('#residence_barangay').append(option);
                });

                // Set default selected barangay
                var defaultBarangay = j('#residence_barangay_default').val();
                j('#residence_barangay').val(defaultBarangay);

                j('#residence_barangay').selectpicker("refresh");
            }
        });
    }
});



j('#mailing_province').change(function() {
    if (j(this).val() != '') {
        var province = j(this).val();
        var _token = j('input[name="_token"]').val();
        j.ajax({
            url: '{{url('/')}}' + '/api/covid/city/get',
            method: "GET",
            data: { _token: _token, province: province },
            success: function(result) {
                j('#mailing_municipality').empty();
                j('#mailing_barangay').empty();
                j('#mailing_municipality').append(j('<option>', {
                    value: "",
                    text: "- Select City/Municipality -"
                }));
                j.each(result, function(key, value) {
                    var option = j('<option>', {
                        value: value.city,
                        text: value.city
                    });
                    j('#mailing_municipality').append(option);
                });

                // Set default selected municipality
                var defaultMunicipalityM = j('#mailing_municipality_default').val();
                j('#mailing_municipality').val(defaultMunicipalityM).change();

                j('#mailing_municipality').selectpicker("refresh");
            }
        });
    }
});

j('#mailing_municipality').change(function() {
    if (j(this).val() != '') {
        var city = j(this).val();
        var _token = j('input[name="_token"]').val();
        j.ajax({
            url: '{{url('/')}}' + '/api/covid/barangay/get',
            method: "GET",
            data: { _token: _token, city: city },
            success: function(result) {
                j('#mailing_barangay').empty();
                j('#mailing_barangay').append(j('<option>', {
                    value: "",
                    text: "- Select Barangay -"
                }));
                j.each(result, function(key, value) {
                    var option = j('<option>', {
                        value: value.barangay,
                        text: value.barangay
                    });
                    j('#mailing_barangay').append(option);
                });

                // Set default selected barangay
                var defaultBarangayM = j('#mailing_barangay_default').val();
                j('#mailing_barangay').val(defaultBarangayM);

                j('#mailing_barangay').selectpicker("refresh");
            }
        });
    }
});

    $( "#chckSameAddress" ).click(function() {
    if (jQuery(this).is(':checked') === true) {
           var residence_address = jQuery('#residence_address').val();
           var residence_province = jQuery('#residence_province').val();
           var residence_municipality = jQuery('#residence_municipality').val();
           var residence_barangay = jQuery('#residence_barangay').val();


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


var chckSameAddressValue = $("input[name='chckSameAddress']").val();
if (chckSameAddressValue === "1") {
  $("#chckSameAddress").prop("checked", true);
}
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

    // for

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


                        if(errornumber == 1){
                            return false;
                        }
                        widget.show();
                        widget.not(':eq('+(current++)+')').hide();


                        setProgress(current);
                    }
                    hideButtons(current);
                });


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
        }

        })
        }
    });


    jQuery(document).ready(function() {
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
        $('input[name="modelinfo"]').val(modelName);

        jQuery.ajax({
            url: url,
            method: "POST",
                 data: { _token: _token,yearName: yearName,brandName: brandName,modelName: modelName},
            error: function(data) {
                var errors = data.responseJSON;
                // alert(errors);
                jQuery.each(data, function(key, value) {
                    // console.log(value);
                });
                // Render the errors with js ...
            },
            success: function(result) {
                var data = JSON.parse(result);
                jQuery('#totalValue').val(addCommas(data));
                jQuery('#totalValuehid').val(jQuery('#totalValue').val());
                jQuery('#bodyType').val(data[0]['type']);
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
 // FOR SECOND PAGE JQUERY AJAX

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
