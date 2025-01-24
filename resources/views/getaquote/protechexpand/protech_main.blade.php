@extends('layouts.app')

@section('content')

<input type="hidden" name="hidURL" name="hidURL" value="{{url('/')}}">
<input type="hidden" name="totalvalhid" id="totalvalhid"  value="{{session('totalvalhid')}}" >
<input type="hidden" name="with_agent" name="with_agent" value="{{url('/')}}">

<div class="category-name container">
                  <div class="row text-center">
                   
                      <h1 id="h111" name="h111" style="font-size: 35px !important;opacity: 0.8;font-weight: bold;">
                          <span style="color: #008080">Pro-Tech Expand</span></h1>
                  </div>
              </div>
             <br> 
<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>
 <div id="BlockCantFintCar" class="BlockCantFintCar"  style="display: none">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr-success" style="border-top: 7px solid #008080;">
         
        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
        <label style="font-size: 14px;" for="chckcConfirm">For further assistance, please contact our Client Services team at (02) 8-830-6000 to get your free quotation.</label> 
        </div>
        <div class="confirm-btn-panel pull-right">
          <div class="btn-holder pull-right">        
            <input type="button" id="btnCantFindCar" name="btnCantFindCar" class="row-dialog-btn btn btn-success btn-md" value="OK"  style="background-color: #008080;" />       
          </div>
          </div>
        </div>
    </div>
 
<div id="BlockUIConfirm2" class="BlockUIConfirm2"  style="display: none">
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr-success" style="border-top: 7px solid #008080;">
         
        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
        <label style="font-size: 12px;" for="chckcConfirm">   Cars for rent or hire are not covered by our Auto Excel Plus Insurance. For more information, you may reach us at 8830-6000 or at client_services@cocogen.com.</label> 
        </div>
        <div class="confirm-btn-panel pull-right">
          <div class="btn-holder pull-right">        
            <input type="button" id="btnConfirm2" name="btnConfirm2" class="row-dialog-btn btn btn-success btn-md" style="background-color:#008080"  value="OK"  />       
          </div>
          </div>
        </div>
    </div>
      
<div class="container">
  <div class="row">
        <div class="col-md-12">
      
        <input type="hidden" name="url" name="url" value="{{url('/')}}">       
        <input type="hidden" name="coverage_complete" name="coverage_complete" value="">
        <input type="hidden" name="check_agent" name="check_agent" value="">
        <input type="hidden" name="personal_info_complete" name="personal_info_complete" value="">
        <input type="hidden" name="pwd_stat" name="pwd_stat" value="">
        <input type="hidden" name="pwd_stat_save" name="pwd_stat_save" value="">
      <div class="progress"  class="col-md-12">
        <div class="progress-bar" style="max-height: 4px !important;"></div>
      </div>
        <button class="action back linkbutton"><< Back</button>
    <button class="action back6th  linkbutton"><< Back</button>
      <br><br>
    <form method="post"  enctype="multipart/form-data" id='submitForm' novalidate>
        <div class="step" style="background-color: #f5f5f5 !important;text-align: left;">
          @include('getaquote.protech.1stpage_protech')
        </div>
        <div class="step" style="text-align: left;">
          @include('getaquote.protech.2ndpage_protech')
        </div>
        <div class="step" style="text-align: left;">
           @include('getaquote.protech.3rdpage_protech')
        </div>
          {{ csrf_field() }}
          <div class="step" style="text-align: left;">
          </div>
   <!--    <div id="savebutton" name="savebutton" style="width:200px"> -->
        <!--   <button  id="last_page_submit" name="last_page_submit" type="button"  class="last_page_submit btn btn-default form-control" style="min-width: 267px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;">SUBMIT &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>  -->         
        <!-- </div> -->
    </form>
 
           
        </div>
  </div>
</div>

<style>
.palceholdermod::placeholder {
  opacity: 0.7; /* Firefox */
   font-style: italic;
   font-size: 15px;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  opacity: 0.7;
   font-style: italic;
   font-size: 15px;
}

::-ms-input-placeholder { /* Microsoft Edge */
  opacity: 0.7;
   font-style: italic;
   font-size: 15px;
}
</style>


<link rel="stylesheet" href="{{ asset('css/protech_express.css') }}">
<script src="{{ asset('js/address_protech.js') }}"></script>
<script type="text/javascript">
      
 
      jQuery('.dynamicvehicle').change(function() {
      if (jQuery(this).val() != "") { //Check if the dropdown has a value
      var select = jQuery(this).attr("id"); //This will fetch the value  store to select variavle
      var policyType = jQuery(this).val(); //This will fetch the value  store to optiion to selected variavle
      var dependent = jQuery(this).data('dependent'); //This will fetch the value  store to optiion to selected variavle
      var mvType =  jQuery('#mvType').val();
      var _token = jQuery('input[name="token"]').val(); //generated by csrf field 
 

      jQuery.ajax({
         url: " ",
        method: "POST",
        data: {
          select: select,
          policyType: policyType,
          _token: '{{ csrf_token() }}',
          dependent: dependent
        },
        success: function(result) {
          jQuery('#' + dependent).html(result);
          jQuery('#' + dependent).val(result);


        }
      })
      }
      });


 
function ReplaceNumberWithCommas(yourNumber) {
    //Seperates the components of the number
    var n= yourNumber.toString().split(".");
    //Comma-fies the first part
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //Combines the two sections
    return n.join(".");
}

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
      if (input_val === "") { return; }
      
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
    var accessory1 = jQuery( ".selectaccessory" ).val();
        if(accessory1 === "Others"){
                jQuery(".otherdivAccessory").show();
            }else{
                //jQuery(".otherdivAccessory").hide();
        }                                        
    jQuery('.selectaccessory').change(function(){                                        
        if(jQuery(this).val() != ''){                
             var accessory = jQuery(this).val();
             if(accessory === "Others"){
                jQuery(".otherdivAccessory").show();
             }else{
                //jQuery(".otherdivAccessory").hide();
             }        
        }
       }); 
$(document).ready(function(){
    var _token = jQuery('input[name="_token"]').val();
    var url = jQuery('input[name="url"]').val();
    jQuery.ajax({
        url:url + '/api/covid/province/get',
        method:"GET",
        data:{ _token:_token}, 
        success:function(result)
        {         
          console.log('asdf');
            jQuery.each(result, function(key, value){
           
                $('#residence_province').append($('<option>', { 
                    value: value.province,
                    text : value.province 
                }));

                $('#mailing_province').append($('<option>', { 
                    value: value.province,
                    text : value.province 
                }));

                $('#device_province').append($('<option>', { 
                    value: value.province,
                    text : value.province 
                }));

            })       
          }
        })

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
    btnsubmit   = $("#savebutton");

    btnNextPage = $(".next_1stpage");
    next_2ndpage = $(".next_2ndpage");
    next_3rdpage = $(".next_3rdpage");
   
    // Init buttons and UI
    widget.not(':eq(0)').hide();
    hideButtons(current);
    setProgress(current);

 
    //next button first page
    btnNextPage.click(function(){
        if(current < widget.length) {
          if(current == 1){
           // $(".gender").remove();
           // $(".validation_gender_check_error").remove(); 
           // $(".validation_gender_check_success").remove(); 

           // $(".dateOfBirth").remove();
           // $(".validation_dateOfBirth_check_error").remove(); 
           // $(".validation_dateOfBirth_check_success").remove(); 

           // $(".placeofbirth").remove();
           // $(".validation_placeofbirth_check_error").remove(); 
           // $(".validation_placeofbirth_check_success").remove(); 

           // $(".civilstatus").remove();
           // $(".validation_civilstatus_check_error").remove(); 
           // $(".validation_civilstatuse_check_success").remove(); 

           // $(".nationality").remove();
           // $(".validation_nationality_check_error").remove(); 
           // $(".validation_nationality_check_success").remove(); 

           // $(".occupation").remove();
           // $(".validation_occupation_check_error").remove(); 
           // $(".validation_occupation_check_success").remove(); 

           // $(".telNo").remove();
           // $(".validation_telNo_check_error").remove(); 
           // $(".validation_telNo_check_success").remove(); 

           // $(".sourceoffunds").remove();
           // $(".validation_sourceoffunds_check_error").remove(); 
           // $(".validation_sourceoffunds_check_success").remove(); 

           // $(".typeOfId").remove();
           // $(".validation_typeOfId_check_error").remove(); 
           // $(".validation_typeOfId_check_success").remove(); 

           // $(".idno").remove();
           // $(".validation_idno_check_error").remove(); 
           // $(".validation_idno_check_success").remove(); 

           // $(".present_address").remove();
           // $(".validation_present_address_check_error").remove(); 
           // $(".validation_present_address_check_success").remove(); 

           // $(".province").remove();
           // $(".validation_province_check_error").remove(); 
           // $(".validation_province_check_success").remove(); 

           // $(".residence_province").remove();
           // $(".validation_residence_province_check_error").remove(); 
           // $(".validation_residence_province_check_success").remove(); 

           // $(".residence_municipality").remove();
           // $(".validation_residence_municipality_check_error").remove(); 
           // $(".validation_residence_municipality_check_success").remove(); 

           //  $(".residence_barangay").remove();
           // $(".validation_residence_barangay_check_error").remove(); 
           // $(".validation_residence_barangayy_check_success").remove(); 


           var errornumber = 0;
           //     //Gender
           //     if($('#gender').val() == "" || $('#gender').val() == null){
              
           //          $('.select-input-border-color-gender').css('border-color', '#F44336');                 
           //          $("#gender").after("<div class='gender' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Gender is empty</div>");    
           //          $('#gender').after('<i class="fa fa-times-circle validation_gender_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#gender').after('<i class="fa fa-check-circle validation_gender_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-gender').css('border-color', '#4BB543');                   
           //      }  
           //      //Date of Birth
           //      if($('#dateOfBirth').val() == "" || $('#dateOfBirth').val() == null){
           //          $('#dateOfBirth').css('border-color', '#F44336');                 
           //          $("#dateOfBirth").after("<div class='dateOfBirth' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Date Of Birth is empty</div>");    
           //          $('.select-input-border-color-dateOfBirth').after('<i class="fa fa-times-circle validation_dateOfBirth_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#dateOfBirth').after('<i class="fa fa-check-circle validation_dateOfBirth_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-dateOfBirth').css('border-color', '#4BB543');                   
           //      }
           //       //Place of Birth
           //      if($('#placeofbirth').val() == "" || $('#placeofbirth').val() == null){
           //          $('#placeofbirth').css('border-color', '#F44336');                 
           //          $("#placeofbirth").after("<div class='placeofbirth' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Place Of Birth is empty</div>");    
           //          $('.select-input-border-color-placeofbirth').after('<i class="fa fa-times-circle validation_placeofbirth_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#placeofbirth').after('<i class="fa fa-check-circle validation_placeofbirth_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-placeofbirth').css('border-color', '#4BB543');                   
           //      }
           //      //civilstatus
           //       if($('#civilstatus').val() == "" || $('#civilstatus').val() == null){
           //          $('#civilstatus').css('border-color', '#F44336');                 
           //          $("#civilstatus").after("<div class='civilstatus' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Civil Status is empty</div>");    
           //          $('.select-input-border-color-civilstatus').after('<i class="fa fa-times-circle validation_civilstatus_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#civilstatus').after('<i class="fa fa-check-circle validation_civilstatuse_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-civilstatus').css('border-color', '#4BB543');                   
           //      }
           //      //Nationality

           //      if($('#nationality').val() == "" || $('#nationality').val() == null){
           //          $('#nationality').css('border-color', '#F44336');                 
           //          $("#nationality").after("<div class='nationality' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Nationality is empty</div>");    
           //          $('.select-input-border-color-nationality').after('<i class="fa fa-times-circle validation_nationality_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#nationality').after('<i class="fa fa-check-circle validation_nationality_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-nationality').css('border-color', '#4BB543');                   
           //      }
           //      //Occupation
             
           //       if($('#occupation').val() == "" || $('#occupation').val() == null){
           //          $('#occupation').css('border-color', '#F44336');                 
           //          $("#occupation").after("<div class='occupation' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Occupation is empty</div>");    
           //          $('.select-input-border-color-occupation').after('<i class="fa fa-times-circle validation_occupation_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
           //          $('#occupation').after('<i class="fa fa-check-circle validation_occupation_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-occupation').css('border-color', '#4BB543');                   
           //      }
           //      //Tel
           //       if($('#telNo').val() == "" || $('#telNo').val() == null){
           //          $('#telNo').css('border-color', '#F44336');                 
           //          $("#telNo").after("<div class='telNo' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Tel No. is empty</div>");    
           //          $('.select-input-border-color-telNo').after('<i class="fa fa-times-circle validation_telNo_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#telNo').after('<i class="fa fa-check-circle validation_telNo_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-telNo').css('border-color', '#4BB543');                   
           //      }
           //      // SOurce of funds
           //       if($('#sourceoffunds').val() == "" || $('#sourceoffunds').val() == null){
           //          $('#sourceoffunds').css('border-color', '#F44336');                 
           //          $("#sourceoffunds").after("<div class='sourceoffunds' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Source Of Fund is empty</div>");    
           //          $('.select-input-border-color-sourceoffunds').after('<i class="fa fa-times-circle validation_sourceoffunds_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#sourceoffunds').after('<i class="fa fa-check-circle validation_sourceoffunds_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-sourceoffunds').css('border-color', '#4BB543');                   
           //      }

           //      //Type of Id
           //        if($('#typeOfId').val() == "" || $('#typeOfId').val() == null){
           //          $('#typeOfId').css('border-color', '#F44336');                 
           //          $("#typeOfId").after("<div class='typeOfId' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Type of Id is empty</div>");    
           //          $('.select-input-border-color-typeOfId').after('<i class="fa fa-times-circle validation_typeOfId_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#typeOfId').after('<i class="fa fa-check-circle validation_typeOfId_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-typeOfId').css('border-color', '#4BB543');                   
           //      }
           //      // ID No.

           //       if($('#idno').val() == "" || $('#idno').val() == null){
           //          $('#idno').css('border-color', '#F44336');                 
           //          $("#idno").after("<div class='idno' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>ID No. is empty</div>");    
           //          $('.select-input-border-color-idno').after('<i class="fa fa-times-circle validation_idno_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#idno').after('<i class="fa fa-check-circle validation_idno_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-idno').css('border-color', '#4BB543');                   
           //      }
           //      //Present Address
                
           //      if($('#present_address').val() == "" || $('#present_address').val() == null){
           //          $('#present_address').css('border-color', '#F44336');                 
           //          $("#present_address").after("<div class='present_address' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Present Address is empty</div>");    
           //          $('.select-input-border-color-present_address').after('<i class="fa fa-times-circle validation_present_address_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#present_address').after('<i class="fa fa-check-circle validation_present_address_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-present_address').css('border-color', '#4BB543');                   
           //      }
           //      //Province
           //      if($('#residence_province').val() == "" || $('#residence_province').val() == null){
           //          $('#residence_province').css('border-color', '#F44336');                 
           //          $("#residence_province").after("<div class='residence_province' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Province is empty</div>");    
           //          $('.select-input-border-color-residence_province').after('<i class="fa fa-times-circle validation_residence_province_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#residence_province').after('<i class="fa fa-check-circle validation_residence_province_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-residence_province').css('border-color', '#4BB543');                   
           //      }
           //      // City
           //       if($('#residence_municipality').val() == "" || $('#residence_municipality').val() == null){
           //          $('#residence_municipality').css('border-color', '#F44336');                 
           //          $("#residence_municipality").after("<div class='residence_municipality' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>City is empty</div>");    
           //          $('.select-input-border-color-residence_municipality').after('<i class="fa fa-times-circle validation_residence_municipality_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#residence_municipality').after('<i class="fa fa-check-circle validation_residence_municipality_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-residence_municipality').css('border-color', '#4BB543');                   
           //      }
           //      //Barangay
           //       if($('#residence_barangay').val() == "" || $('#residence_barangay').val() == null){
           //          $('#residence_barangay').css('border-color', '#F44336');                 
           //          $("#residence_barangay").after("<div class='residence_barangay' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Barangay is empty</div>");    
           //          $('.select-input-border-color-residence_barangay').after('<i class="fa fa-times-circle validation_residence_barangay_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
           //          errornumber = 1;           
           //      }else{        
                                       
           //          $('#residence_barangay').after('<i class="fa fa-check-circle validation_residence_barangayy_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
           //          $('.select-input-border-color-residence_barangay').css('border-color', '#4BB543');                   
           //      }


                       
            }

            if(errornumber == 1){
                btnback.hide();

                current = 0;
                return false;
            }
            btnsubmit.hide();
            widget.show();          
            widget.not(':eq('+(current++)+')').hide();


            setProgress(current); 
        }   
       
       hideButtons(current);    
    });

  
       next_2ndpage.click(function(){
      
        if(current < widget.length) {
          if(current == 2){
                // $(".vehicleYear").remove();
                // $(".validation_vehicleMake_check_error").remove(); 
                // $(".validation_vehicleMake_check_success").remove(); 

                // $(".vehicleMake").remove();
                // $(".validation_vehicleMake_check_error").remove(); 
                // $(".validation_vehicleMake_check_success").remove(); 

                // $(".mvFileNo").remove();
                // $(".validation_mvFileNo_check_error").remove(); 
                // $(".validation_mvFileNo_check_success").remove(); 

                // $(".chassisNo").remove();
                // $(".validation_chassisNo_check_error").remove(); 
                // $(".validation_chassisNo_check_success").remove(); 

                // $(".plateNo").remove();
                // $(".validation_plateNo_check_error").remove(); 
                // $(".validation_plateNo_check_success").remove(); 

                var errornumber = 0;
               //Vehicle Year
                //  if($('#vehicleYear').val() == "" || $('#vehicleYear').val() == null){
                //     $('#vehicleYear').css('border-color', '#F44336');                 
                //     $("#vehicleYear").after("<div class='vehicleYear' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Vehicle Year is empty</div>");    
                //     $('.select-input-border-color-vehicleYear').after('<i class="fa fa-times-circle validation_vehicleYear_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
                //     errornumber = 1;           
                // }else{        
                                       
                //     $('#vehicleYear').after('<i class="fa fa-check-circle validation_vehicleYear_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
                //     $('.select-input-border-color-vehicleYear').css('border-color', '#4BB543');                   
                // }
                // //vehicle Make
                //  if($('#vehicleMake').val() == "" || $('#vehicleMake').val() == null){
                //     $('#vehicleMake').css('border-color', '#F44336');                 
                //     $("#vehicleMake").after("<div class='vehicleMake' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Vehicle Make is empty</div>");    
                //     $('.select-input-border-color-vehicleMake').after('<i class="fa fa-times-circle validation_vehicleMake_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
                //     errornumber = 1;           
                // }else{        
                                       
                //     $('#vehicleMake').after('<i class="fa fa-check-circle validation_vehicleMake_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
                //     $('.select-input-border-color-vehicleMake').css('border-color', '#4BB543');                   
                // }
                // // MV File no
                //    if($('#mvFileNo').val() == "" || $('#mvFileNo').val() == null){
                //     $('#mvFileNo').css('border-color', '#F44336');                 
                //     $("#mvFileNo").after("<div class='mvFileNo' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>MV File No is empty</div>");    
                //     $('.select-input-border-color-mvFileNo').after('<i class="fa fa-times-circle validation_mvFileNo_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
                //     errornumber = 1;           
                // }else{        
                                       
                //     $('#mvFileNo').after('<i class="fa fa-check-circle validation_mvFileNo_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
                //     $('.select-input-border-color-mvFileNo').css('border-color', '#4BB543');                   
                // }
                // // Chassis NO
                //   if($('#chassisNo').val() == "" || $('#chassisNo').val() == null){
                //     $('#chassisNo').css('border-color', '#F44336');                 
                //     $("#chassisNo").after("<div class='chassisNo' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Chassis No is empty</div>");    
                //     $('.select-input-border-color-chassisNo').after('<i class="fa fa-times-circle validation_chassisNo_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
                //     errornumber = 1;           
                // }else{        
                                       
                //     $('#chassisNo').after('<i class="fa fa-check-circle validation_chassisNo_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
                //     $('.select-input-border-color-chassisNo').css('border-color', '#4BB543');                   
                // }
                // //Plate No 
                //    if($('#plateNo').val() == "" || $('#plateNo').val() == null){
                //     $('#plateNo').css('border-color', '#F44336');                 
                //     $("#plateNo").after("<div class='plateNo' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Plate No is empty</div>");    
                //     $('.select-input-border-color-plateNo').after('<i class="fa fa-times-circle validation_plateNo_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
                //     errornumber = 1;           
                // }else{        
                                       
                //     $('#plateNo').after('<i class="fa fa-check-circle validation_plateNo_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
                //     $('.select-input-border-color-plateNo').css('border-color', '#4BB543');                   
                // }

                // if($('#engineInfo').val() == "" || $('#engineInfo').val() == null){
                //     $('#engineInfo').css('border-color', '#F44336');                 
                //     $("#engineInfo").after("<div class='engineInfo' style='opacity:0.7;color:#F44336;margin-bottom:10px;'>Engine No is empty</div>");    
                //     $('.select-input-border-color-engineInfo').after('<i class="fa fa-times-circle validation_engineInfo_check_error fa-2x" aria-hidden="true" style="z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #F44336;size:20px;"></i>');     
                //     errornumber = 1;           
                // }else{        
                                       
                //     $('#engineInfo').after('<i class="fa fa-check-circle validation_engineInfo_check_success fa-2x" aria-hidden="true" style=" z-index: 1;float: right;top:-45px; position: relative;left:-30px !important;color: #4BB543;size:20px;"></i>');
                //     $('.select-input-border-color-engineInfo').css('border-color', '#4BB543');                   
                // }
            }
       

            if(errornumber == 1){
                btnback.hide();
                current = 2;
                return false;
            }
            btnsubmit.hide();
            widget.show();          
            widget.not(':eq('+(current++)+')').hide();


            setProgress(current); 
        }   
       
       hideButtons(current);    
    });


     btnsubmit.click(function(){
      btnsubmit.show();
        if(current < widget.length) {
          
          if(current == 3){
          


              }


            if(errornumber == 1){
                btnback.show();
             

              jQuery('#savebutton').trigger('submit');
              $('#cb1').hide();
                $('#cb2').hide();
                $('#cb3').hide();

                $('#last_page_submit').click(function(){ 
                if($('#CBPrivacy3:checked').length == 0 )
                { var a = 0;}else{ var a = 1; }
                if($('#CBPrivacy2:checked').length == 0 )
                { var b = 0;}else{var b = 1;}
                if($('#CBPrivacy1:checked').length == 0 )
                {var c = 0;}else{var c = 1;}
                if( a == 1 && b == 1 && c == 1){
                $('#cb1').hide();
                $('#cb2').hide();
                $('#cb3').hide();
                
                jQuery('#submitForm').submit(function(e) {
                 e.preventDefault();
                 let formData = new FormData(this);
                 $.ajax({
                  type:'POST',
                  url: " ",
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: (response) => {
                   current = 0;

                 },
                 error: function(response){
                  console.log(response);
                }
              });
               });

              }else{
               $('#cb1').show();
               $('#cb2').show();
               $('#cb3').show();


             }
           });

                current = 3;
                return false;
            }
            

            widget.show();          
            widget.not(':eq('+(current++)+')').hide();
            setProgress(current); 
        }   
       
       hideButtons(current);    
    });


    // Back button click action     
    btnback.click(function(){  
        if(current == 5){
            $('#nextbutton').css('display','block');
        }   
        if(current > 1){
            current = current - 2;
            btnsubmit.trigger('click');
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
// Hide buttons according to the current step
hideButtons = function(current){
    var limit = parseInt(widget.length); 

    $(".action").hide();

    if(current < limit)
        btnnext.show();     
    if(current > 1){
        btnback.show();
        
        if (current == 5){
           btnsubmit.show();
            // btnnext.hide();
        }else{
            btnsubmit.show();
            btnnext.show();
        }
    }

    
        if(current == 1){
            next_2ndpage.hide();
            btnNextPage.show();
            
        }

        if(current == 2){
            next_2ndpage.show();
            btnnext.show();
        }
        if(current == 3){
            // btnsubmit.show();
            next_2ndpage.hide();
            next_3rdpage.show();
            btnnext.show();
        }
          if(current == 4){
            btnsubmit.show();
            btnnext.hide();
        }
       
    if(current == limit) { btnnext.hide(); btnsubmit.show(); btnAdd.show(); btnback.hide(); buy_insurance.show(); back6th.show();}
}


 function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}
   var j = jQuery.noConflict();
      jQuery(function () {
        jQuery('#policyincept').datetimepicker({
          format: 'YYYY-M-D',
          disabledHours: false,
          pickTime: false, 
          
        });
      });
$("#btn_pwd_yes").click(function() { 
      $("#divagent").show();
      document.getElementById("btn_pwd_yes").style.background='#008080';
      document.getElementById("btn_pwd_yes").style.color ='#ffffff';
      document.getElementById("btn_pwd_no").style.background='#C0C0C0';
      document.getElementById("btn_pwd_no").style.color ='#000000';  
      $('input[name=with_agent]').val("yes"); 
  });
$("#divagent").hide();
$("#btn_pwd_no").click(function() { 
      $("#divagent").hide();
      document.getElementById("btn_pwd_no").style.background='#008080';
      document.getElementById("btn_pwd_no").style.color ='#ffffff';
      document.getElementById("btn_pwd_yes").style.background='#C0C0C0';
      document.getElementById("btn_pwd_yes").style.color ='#000000'; 
      $('input[name=with_agent]').val("no");
  });

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




  jQuery('#present_province').change(function(){
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
              jQuery('#present_municipality').empty();
              $('#present_municipality').append($('<option>', { 
                value: "",
                text : "- Select City/Municipality -"
            }));
              jQuery.each(result, function(key, value){
                $('#present_municipality').append($('<option>', { 
                value: value.city,
                text : value.city 
            }));            
              })  
              jQuery('#present_municipality').selectpicker("refresh"); 
            }
        })
      }
    }); 
 jQuery('#present_municipality').change(function(){
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
              jQuery('#present_barangay').empty();
              $('#present_barangay').append($('<option>', { 
                value: "",
                text : "- Select Barangay -"
            }));
              jQuery.each(result, function(key, value){
                $('#present_barangay').append($('<option>', { 
                value: value.barangay,
                text : value.barangay 
            }));            
              })  
              jQuery('#present_barangay').selectpicker("refresh"); 
            }
        })
      }
    });




   jQuery('.uploadimg').click(function(e) {
      $('#file').trigger('click');
    
});

   var j = jQuery.noConflict();
      jQuery(function () {
        jQuery('#dateOfBirth').datetimepicker({
          format: 'YYYY-M-D',
          disabledHours: false,
          pickTime: false, 
          
        });
      });


</script>
@endsection
