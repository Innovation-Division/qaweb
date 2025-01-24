<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/domestic.css') }}" media="all">
<script src="{{ asset('/js/domestic.js') }}"></script>
<script src="{{ asset('/js/claim_motor_step.js') }}"></script>

<input type="hidden" name="url" name="url" value="{{url('/')}}">
<input type="hidden" name="hd_thirst_party" name="hd_thirst_party" value="1">
<input type="hidden" name="hd_recovery_claim" name="hd_recovery_claim" value="1">

<input type="hidden" name="hd_thirst_party_view" name="hd_thirst_party_view" value="1">
<input type="hidden" name="hd_recovery_claim_view" name="hd_recovery_claim_view" value="1">


<button id="claimBack" class="btn btn-primary btn-lg" style="background-color:#008088"> &lt;&lt; Back </button>
<button id="claimBacktoList" class="btn btn-primary btn-lg" style="background-color:#008088"> &lt;&lt; Back</button>

<div id="claimlsiting_div">
    @include('epartnerhub.claims.claimslist')
</div>
<div id="claimllisting_div">
    @include('epartnerhub.claims.claimsline')
</div>

<div id="CreateNewClaimMotor_div">
    @include('epartnerhub.claims.motor.createclaimmotor')
</div>
 
<div id="CreateNewClaimproperty_div">
    @include('epartnerhub.claims.property.createclaimproperty')
</div>

<div id="CreateNewClaimpa_div">
    @include('epartnerhub.claims.pa.createclaimpa')
</div>
@include('getaquote.domestic.otherline')
<script src="{{ asset('/js/address_epartnerhub.js') }}"></script>
<script src="{{ asset('/js/timepicker.js') }}"></script>
<script src="{{ asset('/js/currency.js') }}"></script>

<script>

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


    btnclm_motor_submit = $("#clm_motor_submit");
    btnclm_motor_submit.click(function(){
        errornumber = 0; 
        $(".validation_gross_estimate").remove();
        $(".validation_gross_estimate_check_error").remove(); 
        $(".validation_gross_estimate_check_success").remove();

        $(".validation_drpYear_claim").remove();
        $(".validation_drpYear_claim_check_error").remove(); 
        $(".validation_drpYear_claim_check_success").remove();

        $(".validation_brand_claim").remove();
        $(".validation_brand_claim_check_error").remove(); 


        $(".validation_palte_no_claim").remove();
        $(".validation_palte_no_claim_check_error").remove(); 
        $(".validation_palte_no_claim_check_success").remove();


        if($('#gross_estimate').val() == ""){
            $("#gross_estimate").after("<div class='validation_gross_estimate v-error-msg'>Gross estimate is empty</div>");    
            $('#gross_estimate').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#gross_estimate').fieldSuccessState();
        } 
       
        
        if($("#cb_par_total_loss").prop("checked") == false &&
            $("#cb_bi").prop("checked") == false && 
            $("#cb_bi_tp").prop("checked") == false && 
            $("#cb_theft_accessory").prop("checked") == false && 
            $("#cb_vec_tp").prop("checked") == false && 
            $("#cb_recovery").prop("checked") == false && 
            $("#cb_carnap").prop("checked") == false && 
            $("#cb_pd_tp").prop("checked") == false && 
            $("#cb_recovery_other_insurance").prop("checked") == false){
            $("#lbl_cat_loss").attr('style',  'color:#CF3C4B');
            $("#lbl_par_total_loss").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_bi").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_bi_tp").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_theft_accessory").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_vec_tp").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_recovery").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_carnap").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_pd_tp").attr('style',  'color:#CF3C4B');
            $("#lbl_cb_recovery_other_insurance").attr('style',  'color:#CF3C4B');
            $("#cb_par_total_loss").attr('style',  'border: 2px solid #CF3C4B;');
            errornumber = 1; 
        }else{
            $("#lbl_cat_loss").attr('style',  'color:#373737');
            $("#lbl_par_total_loss").attr('style',  'color:#373737');
            $("#lbl_cb_bi").attr('style',  'color:#373737');
            $("#lbl_cb_bi_tp").attr('style',  'color:#373737');
            $("#lbl_cb_theft_accessory").attr('style',  'color:#373737');
            $("#lbl_cb_vec_tp").attr('style',  'color:#373737');
            $("#lbl_cb_recovery").attr('style',  'color:#373737');
            $("#lbl_cb_carnap").attr('style',  'color:#373737');
            $("#lbl_cb_pd_tp").attr('style',  'color:#373737');
            $("#lbl_cb_recovery_other_insurance").attr('style',  'color:#373737');
        }
        
        if($('#drpYear_claim').val() == "" || $('#drpYear_claim').val() == null){
            $('.drpYear_claim').css('border-color', '#F44336');                 
            $("#drpYear_claim").after("<div class='validation_drpYear_claim v-error-msg'>Year is empty</div>"); 
            ('#drpYear_claim').fieldErrorState();   
            errornumber = 1;           
        }else{                                      
            $('#drpYear_claim').fieldSuccessState();                     
        }
        
        if($('#brand_claim').val() == "" || $('#brand_claim').val() == null){
            $('.brand_claim').css('border-color', '#F44336');                 
            $("#brand_claim").after("<div class='validation_brand_claim v-error-msg'>Brand is empty</div>");    
             $('#brand_claim').fieldErrorState();
            errornumber = 1;           
        }else{                                      
            $('#brand_claim').fieldSuccessState();                 
        }
        
       
        if($('#palte_no_claim').val() == ""){
            $("#palte_no_claim").after("<div class='validation_palte_no_claim v-error-msg'>Plate No. / Conduction Sticker No. is empty</div>");    
            $('#palte_no_claim').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#palte_no_claim').fieldSuccessState();
        } 
      
       
        if(errornumber == 1){				
            return false;
        }
    });

    btnclm_property_upload = $("#clm_property_upload");
    btnclm_property_upload.click(function(){
        errornumber = 0; 

        $(".validation_gross_estimate_property").remove();
        $(".validation_gross_estimate_property_check_error").remove(); 
        $(".validation_gross_estimate_property_check_success").remove();

        if($('#gross_estimate_property').val() == ""){
            $("#gross_estimate_property").after("<div class='validation_gross_estimate_property v-error-msg'>Gross estimate is empty</div>");    
            $('#gross_estimate_property').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#gross_estimate_property').fieldSuccessState();
        } 

        $(".validation_property_first_name_owner").remove();
        $(".validation_property_first_name_owner_check_error").remove(); 
        $(".validation_property_first_name_owner_check_success").remove();

        if($('#property_first_name_owner').val() == ""){
            $("#property_first_name_owner").after("<div class='validation_property_first_name_owner v-error-msg'>First name is empty</div>");    
            $('#property_first_name_owner').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#property_first_name_owner').fieldSuccessState();
        } 

        $(".validation_property_middle_name_owner").remove();
        $(".validation_property_middle_name_owner_check_error").remove(); 
        $(".validation_property_middle_name_owner_check_success").remove();

        if($('#property_middle_name_owner').val() == ""){
            $("#property_middle_name_owner").after("<div class='validation_property_middle_name_owner v-error-msg'>Middle name is empty</div>");    
            $('#property_middle_name_owner').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#property_middle_name_owner').fieldSuccessState();
        } 

        $(".validation_property_last_name_owner").remove();
        $(".validation_property_last_name_owner_check_error").remove(); 
        $(".validation_property_last_name_owner_check_success").remove();

        if($('#property_last_name_owner').val() == ""){
            $("#property_last_name_owner").after("<div class='validation_property_last_name_owner v-error-msg'>Last name is empty</div>");    
            $('#property_last_name_owner').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#property_last_name_owner').fieldSuccessState();
        } 

        $(".validation_property_acc_happen").remove();
        $(".validation_property_acc_happen_check_error").remove(); 
        $(".validation_property_acc_happen_check_success").remove();

        if($('#property_acc_happen').val() == ""){
            $("#property_acc_happen").after("<div class='validation_property_acc_happen v-error-msg'>How did the accident happen is empty</div>");    
            $('#property_acc_happen').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#property_acc_happen').fieldSuccessState();
        } 
        
        if($("#cb_property_building").prop("checked") == false &&
            $("#cb_property_stocl_building").prop("checked") == false){
            $("#lbl_cat_loss_property").attr('style',  'color:#CF3C4B');
            $("#lbl_cat_loss_property_building").attr('style',  'color:#CF3C4B');
            $("#lbl_cat_loss_property_stock").attr('style',  'color:#CF3C4B');
            errornumber = 1; 
        }else{
            $("#lbl_cat_loss_property").attr('style',  'color:#373737');
            $("#lbl_par_total_loss").attr('style',  'color:#373737');
            $("#lbl_cat_loss_property_building").attr('style',  'color:#373737');
            $("#lbl_cat_loss_property_stock").attr('style',  'color:#373737');
        }

        if(errornumber == 1){				
            return false;
        }
    });

    btnclm_pa_upload = $("#clm_pa_upload");
    btnclm_pa_upload.click(function(){
        errornumber = 0;

        if($('input[name=hd_claim_motor_pa_recovery]').val() == "no" || $('input[name=hd_claim_motor_pa_recovery]').val() == "yes"){
            $("#lbl_claim_motor_pa_recovery").attr('style',  'color:#373737');
            $("#claim_motor_pa_recovery_yes").attr('style',  'border: 1px solid #C0C0C0;');
            $("#claim_motor_pa_recovery_no").attr('style',  'border: 1px solid #C0C0C0;');
            if($('input[name=hd_claim_motor_pa_recovery]').val() == "yes"){
                document.getElementById("claim_motor_pa_recovery_yes").style.background='#008080';
                document.getElementById("claim_motor_pa_recovery_yes").style.color ='#ffffff';
                document.getElementById("claim_motor_pa_recovery_no").style.background='#C0C0C0';
                document.getElementById("claim_motor_pa_recovery_no").style.color ='#000000';  
            }else{
                document.getElementById("claim_motor_pa_recovery_no").style.background='#008080';
                document.getElementById("claim_motor_pa_recovery_no").style.color ='#ffffff';
                document.getElementById("claim_motor_pa_recovery_yes").style.background='#C0C0C0';
                document.getElementById("claim_motor_pa_recovery_yes").style.color ='#000000'; 
            }
        }else{	 
            $("#lbl_claim_motor_pa_recovery").attr('style',  'color:#CF3C4B');
            $("#claim_motor_pa_recovery_yes").attr('style',  'border: 1px solid #CF3C4B;');
            $("#claim_motor_pa_recovery_no").attr('style',  'border: 1px solid #CF3C4B;');
                errornumber = 1;           
        } 

        $(".validation_gross_estimate_pa").remove();
        $(".validation_gross_estimate_pa_check_error").remove(); 
        $(".validation_gross_estimate_pa_check_success").remove();

        if($('#gross_estimate_pa').val() == ""){
            $("#gross_estimate_pa").after("<div class='validation_gross_estimate_pa v-error-msg'>Gross estimate is empty</div>");    
            $('#gross_estimate_pa').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#gross_estimate_pa').fieldSuccessState();
        } 

        $(".validation_pa_acc_happen").remove();
        $(".validation_pa_acc_happen_check_error").remove(); 
        $(".validation_pa_acc_happen_check_success").remove();

        if($('#pa_acc_happen').val() == ""){
            $("#pa_acc_happen").after("<div class='validation_pa_acc_happen v-error-msg'>How did the accident happen is empty</div>");    
            $('#pa_acc_happen').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_acc_happen').fieldSuccessState();
        } 

        $(".validation_pa_first_name_owner").remove();
        $(".validation_pa_first_name_owner_check_error").remove(); 
        $(".validation_pa_first_name_owner_check_success").remove();

        if($('#pa_first_name_owner').val() == ""){
            $("#pa_first_name_owner").after("<div class='validation_pa_first_name_owner v-error-msg'>First name is empty</div>");    
            $('#pa_first_name_owner').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_first_name_owner').fieldSuccessState();
        } 

        $(".validation_pa_middle_name_owner").remove();
        $(".validation_pa_middle_name_owner_check_error").remove(); 
        $(".validation_pa_middle_name_owner_check_success").remove();

        if($('#pa_middle_name_owner').val() == ""){
            $("#pa_middle_name_owner").after("<div class='validation_pa_middle_name_owner v-error-msg'>Middle name is empty</div>");    
            $('#pa_middle_name_owner').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_middle_name_owner').fieldSuccessState();
        } 

        $(".validation_pa_last_name_owner").remove();
        $(".validation_pa_last_name_owner_check_error").remove(); 
        $(".validation_pa_last_name_owner_check_success").remove();

        if($('#pa_last_name_owner').val() == ""){
            $("#pa_last_name_owner").after("<div class='validation_pa_last_name_owner v-error-msg'>Last name is empty</div>");    
            $('#pa_last_name_owner').fieldErrorState();
                errornumber = 1;           
        }else{	     				     			
            $('#pa_last_name_owner').fieldSuccessState();
        } 

        
        if($("#cb_med_expense_reim").prop("checked") == false &&
            $("#cb_dis_de").prop("checked") == false &&
            $("#cb_educ_asst_claim").prop("checked") == false &&
            $("#cb_fire_asst_bene_claim").prop("checked") == false){
            $("#lbl_par_total_loss_pa").attr('style',  'color:#CF3C4B');
            $("#lbl_med_expense_reim").attr('style',  'color:#CF3C4B');
            $("#lbl_dis_de").attr('style',  'color:#CF3C4B');
            $("#lbl_educ_asst_claim").attr('style',  'color:#CF3C4B');
            $("#lbl_fire_asst_bene_claim").attr('style',  'color:#CF3C4B');
            errornumber = 1; 
        }else{
            $("#lbl_par_total_loss_pa").attr('style',  'color:#373737');
            $("#lbl_par_total_loss").attr('style',  'color:#373737');
            $("#lbl_med_expense_reim").attr('style',  'color:#373737');
            $("#lbl_dis_de").attr('style',  'color:#373737');
            $("#lbl_educ_asst_claim").attr('style',  'color:#373737');
            $("#lbl_fire_asst_bene_claim").attr('style',  'color:#373737');
        }
        // if($("#cb_med_expense_reim").prop("checked") == true){
        //     $('input[name^="file_upload_pa_reimbursment"]').each(function(){
        //         var pareimburse = "file_upload_pa_med_reim_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ pareimburse).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ pareimburse).attr('style',  'color:#373737');
        //         }
        //     });
        // }

       

        // if($("#cb_dis_de").prop("checked") == true){
        //     $('input[name^="file_upload_pa_dis_death_claim"]').each(function(){
        //         var paDisDeaClaim = "file_upload_pa_dis_dea_claim_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ paDisDeaClaim).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ paDisDeaClaim).attr('style',  'color:#373737');
        //         }
        //     });
        // }

        // if($("#cb_educ_asst_claim").prop("checked") == true){
        //     $('input[name^="file_upload_pa_edu_asstnce"]').each(function(){
        //         var propertyStocknew = "file_upload_pa_edu_asstanc_claim_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ propertyStocknew).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ propertyStocknew).attr('style',  'color:#373737');
        //         }
        //     });
        // }
        

        // if($("#cb_fire_asst_bene_claim").prop("checked") == true){
        //     $('input[name^="file_upload_pa_fire_asstance_bene"]').each(function(){
        //         var paFireBene_laim = "file_upload_pa_fire_asst_bene_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ paFireBene_laim).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ paFireBene_laim).attr('style',  'color:#373737');
        //         }
        //     });
        // }

        if(errornumber == 1){				
            return false;
        }
    });
</script>

<script>

jQuery('.dynamicyearclaim').change(function(){
    if(jQuery(this).val() != '')
    {         
          var yearval = jQuery(this).val();
          $hidURL = jQuery('input[name="url"]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/brand';    
          var _token = jQuery('input[name="_token"]').val();
          
     jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval},
      success:function(result)
      {        
        jQuery('#brand_claim').html(result);    
        jQuery('#brand_claim').selectpicker("refresh");   
      }

     })
    }
}); 
jQuery('.dynamicbrand_claim').change(function(){
    if(jQuery(this).val() != '')
    {
          var yearval = jQuery( "#drpYear_claim option:selected" ).text();        
          var brandval = jQuery(this).val();
          $hidURL =jQuery('input[name="url"]').val();
          var url = $hidURL+ '/dynamic_dependent/fetch/model';    
          var _token = jQuery('input[name="_token"]').val();
          
    jQuery.ajax({
      url: url,
      method:"POST",
      data:{ _token:_token,yearval:yearval,brandval:brandval},
      success:function(result)
      {        
        jQuery('#model_claim').html(result); 
        jQuery('#model_claim').selectpicker("refresh");        
      }

     })
    }
}); 

$('.input-img').change(function() {
        var no = $(this).data("id");
        var filenamelabel = "file_upload_motor_label" + no;
        var filename = "file_upload_motor_" + no;
        var filenameClose = "file_upload_motor_close" + no;
        var filenameError = "file_upload_motor_label_error" + no;
        var file = "";
        $("#" + filenameError).hide();
        $("#" + filenameClose).hide();
        for (let i = 0; i < this.files.length; i++) {
            $("#" + filenameClose).show();
            if(file == ""){
                file = $('#'+ filename)[0].files[i].name;
            }else{
                file = file + ", " +$('#'+ filename)[0].files[i].name;
            }
            if (this.files[i].size > 5000000) {
                $("#" + filenameError).html("File size must not be greater than 5MB.");   
                $("#"+ filenameError).show();    
                $("#" + filenameClose).hide();
                $("#" + filenamelabel).empty();
                $("#" + filename).val("");
                return false;
            }else{
               
            }
        } 
       
        $("#" + filenamelabel).show();
        $("#" + filenamelabel).empty();
        $("#" + filenamelabel).html(file);
    });

    $('.empty_fileupload').click(function() {
        var no = $(this).data("id");
        var filename = "file_upload_motor_" + no;
        var filenamelabel = "file_upload_motor_label" + no;
        var filenameClose = "file_upload_motor_close" + no;
        $("#" + filenamelabel).empty();
        $("#" + filename).val("");
        $("#" + filenameClose).hide();
    });
  
	$('.input-img_property').change(function() {
        var no = $(this).data("id");
        var filenamelabel = "file_upload_property_label" + no;
        var filename = "file_upload_property_" + no;
        var filenameClose = "file_upload_property_close" + no;
        var filenameError = "file_upload_property_label_error" + no;
        var file = "";
        $("#" + filenameError).hide();
        $("#" + filenameClose).hide();
        for (let i = 0; i < this.files.length; i++) {
            $("#" + filenameClose).show();
            if(file == ""){
                file = $('#'+ filename)[0].files[i].name;
            }else{
                file = file + ", " +$('#'+ filename)[0].files[i].name;
            }
            if (this.files[i].size > 5000000) {
                $("#" + filenameError).html("File size must not be greater than 5MB.");   
                $("#"+ filenameError).show();    
                $("#" + filenameClose).hide();
                $("#" + filenamelabel).empty();
                $("#" + filename).val("");
                return false;
            }else{
               
            }
        } 
        $("#" + filenamelabel).show();
        $("#" + filenamelabel).empty();
        $("#" + filenamelabel).html(file);
    });

    $('.empty_fileupload').click(function() {
        var no = $(this).data("id");
        var filename = "file_upload_property_" + no;
        var filenamelabel = "file_upload_property_label" + no;
        var filenameClose = "file_upload_property_close" + no;
        $("#" + filenamelabel).empty();
        $("#" + filename).val("");
        $("#" + filenameClose).hide();
    });


	$('.input-img_pa').change(function() {
        var no = $(this).data("id");
        var filenamelabel = "file_upload_pa_label" + no;
        var filename = "file_upload_pa_" + no;
        var filenameClose = "file_upload_pa_close" + no;
        var filenameError = "file_upload_pa_label_error" + no;
        var file = "";
        $("#" + filenameError).hide();
        $("#" + filenameClose).hide();
        for (let i = 0; i < this.files.length; i++) {
            $("#" + filenameClose).show();
            if(file == ""){
                file = $('#'+ filename)[0].files[i].name;
            }else{
                file = file + ", " +$('#'+ filename)[0].files[i].name;
            }
            if (this.files[i].size > 5000000) {
                $("#" + filenameError).html("File size must not be greater than 5MB.");   
                $("#"+ filenameError).show();    
                $("#" + filenameClose).hide();
                $("#" + filenamelabel).empty();
                $("#" + filename).val("");
                return false;
            }else{
               
            }
        } 
        $("#" + filenamelabel).show();
        $("#" + filenamelabel).empty();
        $("#" + filenamelabel).html(file);
    });

    $('.empty_fileupload').click(function() {
        var no = $(this).data("id");
        var filename = "file_upload_pa_" + no;
        var filenamelabel = "file_upload_pa_label" + no;
        var filenameClose = "file_upload_pa_close" + no;
        $("#" + filenamelabel).empty();
        $("#" + filename).val("");
        $("#" + filenameClose).hide();
    });




jQuery('#Loss_date').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'mm/dd/yy',
      maxDate:'0d',
      yearRange: '1910:9999'
}).on('focus', function(){
	if(!jQuery('select').parent().hasClass('fake-select')){
		jQuery('select').wrap('<span class="fake-select"></span>');
	}
}); 

jQuery('#Loss_date_view').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'mm/dd/yy',
      maxDate:'0d',
      yearRange: '1910:9999'
}).on('focus', function(){
	if(!jQuery('select').parent().hasClass('fake-select')){
		jQuery('select').wrap('<span class="fake-select"></span>');
	}
}); 


jQuery('#Loss_date_pa').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'mm/dd/yy',
      maxDate:'0d',
      yearRange: '1910:9999'
}).on('focus', function(){
	if(!jQuery('select').parent().hasClass('fake-select')){
		jQuery('select').wrap('<span class="fake-select"></span>');
	}
}); 

jQuery('#Loss_date_pa_view').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'mm/dd/yy',
      maxDate:'0d',
      yearRange: '1910:9999'
}).on('focus', function(){
	if(!jQuery('select').parent().hasClass('fake-select')){
		jQuery('select').wrap('<span class="fake-select"></span>');
	}
}); 


jQuery('#Loss_date_property').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'mm/dd/yy',
      maxDate:'0d',
      yearRange: '1910:9999'
}).on('focus', function(){
	if(!jQuery('select').parent().hasClass('fake-select')){
		jQuery('select').wrap('<span class="fake-select"></span>');
	}
}); 

jQuery('#Loss_date_property_view').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'mm/dd/yy',
      maxDate:'0d',
      yearRange: '1910:9999'
}).on('focus', function(){
	if(!jQuery('select').parent().hasClass('fake-select')){
		jQuery('select').wrap('<span class="fake-select"></span>');
	}
}); 


$('#claimllisting_div').hide(); 
$('#claimBacktoList').hide(); 
$('#claimBack').hide(); 
$('#CreateNewClaimMotor_div').hide();
$('#CreateNewClaimproperty_div').hide();
$('#CreateNewClaimpa_div').hide();

$('#FileaClaim').click(function() {
	$('#claimllisting_div').show();
	$('#claimBacktoList').show();
	$('#claimlsiting_div').hide();
	$('#CreateNewClaimMotor_div').hide();
	$('#CreateNewClaimproperty_div').hide();
	$('#CreateNewClaimpa_div').hide();
	$('#claimBack').hide(); 
});

$('#claimBacktoList').click(function() {
	$('#claimllisting_div').hide();
	$('#claimBacktoList').hide();
	$('#claimlsiting_div').show();
	$('#CreateNewClaimMotor_div').hide();
	$('#CreateNewClaimproperty_div').hide();
	$('#CreateNewClaimpa_div').hide();
	$('#clmspropertynext').show(); 
	$('#claimBack').hide(); 
});

$('#claimBack').click(function() {
	$('#claimllisting_div').show();
	$('#claimBacktoList').show();
	$('#claimlsiting_div').hide();
	$('#CreateNewClaimMotor_div').hide();
	$('#CreateNewClaimproperty_div').hide();
	$('#CreateNewClaimpa_div').hide();
	$('#claimBack').hide(); 
	$('#clmspropertynext').show(); 
});

$('#CreateNewClaimMotor').click(function() {
	$('#claimllisting_div').hide();
	$('#claimBacktoList').hide();
	$('#claimlsiting_div').hide();
	$('#claimBacktoList').hide();
	$('#CreateNewClaimMotor_div').show();
	$('#CreateNewClaimproperty_div').hide();
	$('#CreateNewClaimpa_div').hide();
	$('#claimBack').show(); 
    //page1
    $('#policyNo').val("");
    $('#driver').val("");
    $('#relationship_motor').val("");
    $('#Loss_date').val("");
    $('#Loss_time').val("");
    $('#location_loss').val("");
    jQuery('#claim_motor_permanent_province').append('<option selected value="">- Select Province -</option>');    
    jQuery('#claim_motor_permanent_province').selectpicker("refresh");
    jQuery('#permanent_municipality_motor').append('<option selected value="">- Select City/Municipality -</option>');    
    jQuery('#permanent_municipality_motor').selectpicker("refresh");
    jQuery('#permanent_barangay_motor').append('<option selected value="">- Select Barangay -</option>');    
    jQuery('#permanent_barangay_motor').selectpicker("refresh");
    //page2
    $('#fname_motor').val("");
    $('#mname_motor').val("");
    $('#lname_motor').val("");
    $('#acc_happen_motor').val("");
    $('#acc_happen_motor').text("");
    $('#edamage_motor').val("");
    $('#driving_vec_motor').val("");
    $('#purpose_vec_motor').val("");
    $('#tel_no_motor').val("");
    $('#mobile_no_motor').val("");
    $('#email_address_motor').val("");
    $('#no_passenger_motor').val("");
    $('#name_reportee_motor').val("");
    document.getElementById("claim_motor_aget_yes").style.background='#C0C0C0';
    document.getElementById("claim_motor_aget_yes").style.color ='#000000';  
    document.getElementById("claim_motor_aget_no").style.background='#C0C0C0';
    document.getElementById("claim_motor_aget_no").style.color ='#000000';  
    //page3
    $('#gross_estimate').val("");
    document.getElementById("claim_motor_recovery_no_view").style.background='#C0C0C0';
    document.getElementById("claim_motor_recovery_no_view").style.color ='#000000';  
    document.getElementById("claim_motor_recovery_yes_view").style.background='#C0C0C0';
    document.getElementById("claim_motor_recovery_yes_view").style.color ='#000000'; 
    $( "#cb_par_total_loss" ).prop( "checked", false );
    $( "#cb_bi" ).prop( "checked", false );
    $( "#cb_bi_tp" ).prop( "checked", false );
    $( "#cb_theft_accessory" ).prop( "checked", false );
    $( "#cb_vec_tp" ).prop( "checked", false );
    $( "#cb_recovery" ).prop( "checked", false );
    $( "#cb_carnap" ).prop( "checked", false );
    $( "#cb_pd_tp" ).prop( "checked", false );
    $( "#cb_recovery_other_insurance" ).prop( "checked", false );
    jQuery('#drpYear_claim').append('<option selected value="">Year *</option>');    
    jQuery('#drpYear_claim').selectpicker("refresh");
    jQuery('#brand_claim').append('<option selected value="">Brand *</option>');    
    jQuery('#brand_claim').selectpicker("refresh");
    jQuery('#model_claim').append('<option selected value="">Model *</option>');    
    jQuery('#model_claim').selectpicker("refresh");
    $('#mv_file_no_claim').val("");
    $('#palte_no_claim').val("");
    $('#engine_no_claim').val("");
    $('#color_claim').val("");
    $('#chassis_no_claim').val("");
    $('#conduction_sticker_no_claim').val("");
    
});

$('#CreateNewClaimProperty').click(function() {
	$('#claimllisting_div').hide();
	$('#claimBacktoList').hide();
	$('#claimlsiting_div').hide();
	$('#claimBacktoList').hide();
	$('#CreateNewClaimpa_div').hide();
	$('#CreateNewClaimproperty_div').show();
	$('#CreateNewClaimpa_div').hide();
	$('#claimBack').show(); 
    //page1
    $('#policyNo_property').val("");
    $('#Loss_date_property').val("");
    $('#Loss_time_property').val("");
    $('#location_loss_property').val("");
    jQuery('#permanent_province_property').append('<option selected value="">- Select Province -</option>');    
    jQuery('#permanent_province_property').selectpicker("refresh");
    jQuery('#permanent_municipality_property').append('<option selected value="">- Select City/Municipality -</option>');    
    jQuery('#permanent_municipality_property').selectpicker("refresh");
    jQuery('#permanent_barangay_property').append('<option selected value="">- Select Barangay -</option>');    
    jQuery('#permanent_barangay_property').selectpicker("refresh");
    $('#contact_no_property').val("");
    $('#email_address_property').val("");
    //page2
    $('#morgaged_to_property').val("");
    $('#relate_accident_property').val("");
    document.getElementById("claim_property_same_insured_yes").style.background='#C0C0C0';
    document.getElementById("claim_property_same_insured_yes").style.color ='#000000';  
    document.getElementById("claim_property_same_insured_no").style.background='#C0C0C0';
    document.getElementById("claim_property_same_insured_no").style.color ='#000000'; 
    document.getElementById("claim_property_prem_paid_yes").style.background='#C0C0C0';
    document.getElementById("claim_property_prem_paid_yes").style.color ='#000000';  
    document.getElementById("claim_property_prem_paid_no").style.background='#C0C0C0';
    document.getElementById("claim_property_prem_paid_no").style.color ='#000000'; 
    document.getElementById("claim_property_within_inception_yes").style.background='#C0C0C0';
    document.getElementById("claim_property_within_inception_yes").style.color ='#000000';  
    document.getElementById("claim_property_within_inception_no").style.background='#C0C0C0';
    document.getElementById("claim_property_within_inception_no").style.color ='#000000'; 
    document.getElementById("claim_property_risk_insured_yes").style.background='#C0C0C0';
    document.getElementById("claim_property_risk_insured_yes").style.color ='#000000';  
    document.getElementById("claim_property_risk_insured_no").style.background='#C0C0C0';
    document.getElementById("claim_property_risk_insured_no").style.color ='#000000'; 
    document.getElementById("claim_property_morgagee_yes").style.background='#C0C0C0';
    document.getElementById("claim_property_morgagee_yes").style.color ='#000000';  
    document.getElementById("claim_property_morgagee_no").style.background='#C0C0C0';
    document.getElementById("claim_property_morgagee_no").style.color ='#000000'; 
    //page3
    document.getElementById("claim_motor_property_recovery_yes").style.background='#C0C0C0';
    document.getElementById("claim_motor_property_recovery_yes").style.color ='#000000';  
    document.getElementById("claim_motor_property_recovery_no").style.background='#C0C0C0';
    document.getElementById("claim_motor_property_recovery_no").style.color ='#000000'; 
    $( "#cb_property_building" ).prop( "checked", false );
    $( "#cb_property_stocl_building" ).prop( "checked", false );
    $('#property_first_name_owner').val("");
    $('#property_middle_name_owner').val("");
    $('#property_last_name_owner').val("");
    $('#property_acc_happen').val("");



});

$('#CreateNewClaimPA').click(function() {
	$('#claimllisting_div').hide();
	$('#claimBacktoList').hide();
	$('#claimlsiting_div').hide();
	$('#claimBacktoList').hide();
	$('#CreateNewClaimpa_div').show();
	$('#CreateNewClaimproperty_div').hide();
	$('#claimBack').show(); 
    //page1
    $('#policyNo_pa').val("");
    $('#Loss_date_pa').val("");
    $('#Loss_time_pa').val("");
    jQuery('#permanent_province_pa').append('<option selected value="">- Select Province -</option>');    
    jQuery('#permanent_province_pa').selectpicker("refresh");
    jQuery('#permanent_municipality_pa').append('<option selected value="">- Select City/Municipality -</option>');    
    jQuery('#permanent_municipality_pa').selectpicker("refresh");
    jQuery('#permanent_barangay_pa').append('<option selected value="">- Select Barangay -</option>');    
    jQuery('#permanent_barangay_pa').selectpicker("refresh");
    $('#contact_no_pa').val("");
    $('#email_address_pa').val("");
    //page2
    document.getElementById("claim_pa_same_insured_yes").style.background='#C0C0C0';
    document.getElementById("claim_pa_same_insured_yes").style.color ='#000000';  
    document.getElementById("claim_pa_same_insured_no").style.background='#C0C0C0';
    document.getElementById("claim_pa_same_insured_no").style.color ='#000000'; 
    document.getElementById("claim_pa_within_inception_yes").style.background='#C0C0C0';
    document.getElementById("claim_pa_within_inception_yes").style.color ='#000000';  
    document.getElementById("claim_pa_within_inception_no").style.background='#C0C0C0';
    document.getElementById("claim_pa_within_inception_no").style.color ='#000000'; 
    document.getElementById("claim_pa_prem_paid_yes").style.background='#C0C0C0';
    document.getElementById("claim_pa_prem_paid_yes").style.color ='#000000';  
    document.getElementById("claim_pa_prem_paid_no").style.background='#C0C0C0';
    document.getElementById("claim_pa_prem_paid_no").style.color ='#000000'; 
    document.getElementById("claim_pa_required_doc_yes").style.background='#C0C0C0';
    document.getElementById("claim_pa_required_doc_yes").style.color ='#000000';  
    document.getElementById("claim_pa_required_doc_no").style.background='#C0C0C0';
    document.getElementById("claim_pa_required_doc_no").style.color ='#000000'; 
    document.getElementById("claim_pa_not_submitted_yes").style.background='#C0C0C0';
    document.getElementById("claim_pa_not_submitted_yes").style.color ='#000000';  
    document.getElementById("claim_pa_not_submitted_no").style.background='#C0C0C0';
    document.getElementById("claim_pa_not_submitted_no").style.color ='#000000'; 
    document.getElementById("claim_pa_required_doc_no").style.color ='#000000'; 
    document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#C0C0C0';
    document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#000000';  
    document.getElementById("claim_pa_checklist_accomplished_no").style.background='#C0C0C0';
    document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#000000'; 
    //page3
    $('#gross_estimate_pa').val("");
    document.getElementById("claim_motor_pa_recovery_yes").style.background='#C0C0C0';
    document.getElementById("claim_motor_pa_recovery_yes").style.color ='#000000';  
    document.getElementById("claim_motor_pa_recovery_no").style.background='#C0C0C0';
    document.getElementById("claim_motor_pa_recovery_no").style.color ='#000000'; 
    $( "#cb_med_expense_reim" ).prop( "checked", false );
    $( "#cb_dis_de" ).prop( "checked", false );
    $( "#cb_educ_asst_claim" ).prop( "checked", false );
    $( "#cb_fire_asst_bene_claim" ).prop( "checked", false );
});


$("#cb_par_total_loss").change(function(){
  if(this.checked){
      $(".motor_claim_loss_partial").show();
      $(".motor_claim_other").show();
  }else{
      if($("#cb_theft_accessory").prop("checked") == true){
          $(".motor_claim_loss_partial").show();
          $(".motor_claim_other").show();
      }
      else if($(this).prop("checked") == false){
          $(".motor_claim_loss_partial").hide();

            if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
      }
  }
});

$("#cb_par_total_loss_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_partial_view").show();
      $(".motor_claim_other").show();
  }else{
      if($("#cb_theft_accessory_view").prop("checked") == true){
          $(".motor_claim_loss_partial_view").show();
          $(".motor_claim_other").show();
      } else if($(this).prop("checked") == false){
          $(".motor_claim_loss_partial_view").hide();
          
          if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
      }
  }
});


$("#cb_bi").change(function(){
  if(this.checked){
      $(".motor_claim_loss_bi").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_bi").hide();
      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});

$("#cb_bi_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_bi_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_bi_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});



$("#cb_bi_tp").change(function(){
  if(this.checked){
      $(".motor_claim_loss_BITP").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_BITP").hide();
      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});

$("#cb_bi_tp_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_BITP_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_BITP_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});


$("#cb_theft_accessory").change(function(){
  if(this.checked){
      $(".motor_claim_loss_partial").show();
      $(".motor_claim_other").show();
  }else{
      if($("#cb_par_total_loss").prop("checked") == true){
          $(".motor_claim_loss_partial").show();
      }
      else if($(this).prop("checked") == false){
          $(".motor_claim_loss_partial").hide();

          if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
      }
  }
});

$("#cb_theft_accessory_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_partial_view").show();
      $(".motor_claim_other").show();
  }else{
      if($("#cb_par_total_loss_view").prop("checked") == true){
          $(".motor_claim_loss_partial_view").show();
      }
      else if($(this).prop("checked") == false){
          $(".motor_claim_loss_partial_view").hide();

          if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
      }
  }
});


$("#cb_vec_tp").change(function(){
  if(this.checked){
      $(".motor_claim_loss_vehicleTP").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_vehicleTP").hide();

      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});
$("#cb_vec_tp_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_vehicleTP_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_vehicleTP_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});


$("#cb_recovery").change(function(){
  if(this.checked){
      $(".motor_claim_loss_recovery").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_recovery").hide();

      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});
$("#cb_recovery_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_recovery_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_recovery_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});


$("#cb_carnap").change(function(){
  if(this.checked){
      $(".motor_claim_loss_carnap").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_carnap").hide();

      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});
$("#cb_carnap_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_carnap_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_carnap_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});


$("#cb_pd_tp").change(function(){
  if(this.checked){
      $(".motor_claim_loss_PDTP").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_PDTP").hide();

      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});
$("#cb_pd_tp_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_PDTP_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_PDTP_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});

$("#cb_recovery_other_insurance").change(function(){
  if(this.checked){
      $(".motor_claim_loss_recovery_other_insurance").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_recovery_other_insurance").hide();

      if($("#cb_par_total_loss").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false && $("#cb_bi").prop("checked") == false
          && $("#cb_bi_tp").prop("checked") == false && $("#cb_theft_accessory").prop("checked") == false
          && $("#cb_vec_tp").prop("checked") == false && $("#cb_recovery").prop("checked") == false && $("#cb_carnap").prop("checked") == false
          && $("#cb_pd_tp").prop("checked") == false && $("#cb_recovery_other_insurance").prop("checked") == false) {
            $(".motor_claim_other").hide();
          }
  }
});

$("#cb_recovery_other_insurance_view").change(function(){
  if(this.checked){
      $(".motor_claim_loss_recovery_other_insurance_view").show();
      $(".motor_claim_other").show();
  }else{
      $(".motor_claim_loss_recovery_other_insurance_view").hide();

      if($("#cb_par_total_loss_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false && $("#cb_bi_view").prop("checked") == false
          && $("#cb_bi_tp_view").prop("checked") == false && $("#cb_theft_accessory_view").prop("checked") == false
          && $("#cb_vec_tp_view").prop("checked") == false && $("#cb_recovery_view").prop("checked") == false && $("#cb_carnap_view").prop("checked") == false
          && $("#cb_pd_tp_view").prop("checked") == false && $("#cb_recovery_other_insurance_view").prop("checked") == false) {
            $(".motor_claim_other_view").hide();
          }
  }
});


$("#cb_property_building").change(function(){
  if(this.checked){
      $(".property_claim_building").show();
  }else{
      $(".property_claim_building").hide();
  }
});

$("#cb_property_view_building").change(function(){
  if(this.checked){
      $(".property_view_claim_building").show();
  }else{
      $(".property_view_claim_building").hide();
  }
});


$("#cb_property_stocl_building").change(function(){
  if(this.checked){
      $(".property_claim_cstocks").show();
  }else{
      $(".property_claim_cstocks").hide();
  }
});

$("#cb_property_view_stocl_building").change(function(){
  if(this.checked){
      $(".property_view_claim_cstocks").show();
  }else{
      $(".property_view_claim_cstocks").hide();
  }
});

$("#cb_med_expense_reim").change(function(){
  if(this.checked){
      $(".pa_claim_reimbursenment").show();
  }else{
      $(".pa_claim_reimbursenment").hide();
  }
});

$("#cb_med_expense_reim_view").change(function(){
  if(this.checked){
      $(".pa_claim_reimbursenment_view").show();
  }else{
      $(".pa_claim_reimbursenment_view").hide();
  }
});



$("#cb_dis_de").change(function(){
  if(this.checked){
      $(".pa_claim_dis_dea_claim").show();
  }else{
      $(".pa_claim_dis_dea_claim").hide();
  }
});

$("#cb_dis_de_view").change(function(){
  if(this.checked){
      $(".pa_claim_dis_dea_claim_view").show();
  }else{
      $(".pa_claim_dis_dea_claim_view").hide();
  }
});


$("#cb_fire_asst_bene_claim").change(function(){
  if(this.checked){
      $(".pa_claim_fire_asstance_bene").show();
  }else{
      $(".pa_claim_fire_asstance_bene").hide();
  }
});

$("#cb_fire_asst_bene_claim_view").change(function(){
  if(this.checked){
      $(".pa_claim_fire_asstance_bene_view").show();
  }else{
      $(".pa_claim_fire_asstance_bene_view").hide();
  }
});

$("#cb_educ_asst_claim").change(function(){
  if(this.checked){
      $(".pa_claim_edu_asstnce").show();
  }else{
      $(".pa_claim_edu_asstnce").hide();
  }
});

$("#cb_educ_asst_claim_view").change(function(){
  if(this.checked){
      $(".pa_claim_edu_asstnce_view").show();
  }else{
      $(".pa_claim_edu_asstnce_view").hide();
  }
});



</script>
<style type="text/css">
	#btn_pwd_no,
	#btn_pwd_yes{
		min-width: 120px;
		min-height: 60px;
		background-color: #C0C0C0;
		color: #000000;
		margin-right: 15px;
	}
	.ui-datepicker {
	background-color: #fff;
			font-size: 160%;
	}

	.ui-datepicker-header {
	background-color: #008080;
	border-color: #008080;

	}

	.ui-datepicker-title {
	color: white;
	}

	.ui-widget-content .ui-state-default {
	border: 0px;
	text-align: center;
	background: #fff;
	font-weight: normal;
	color: #008080;
	}

	.ui-widget-content .ui-state-default:hover {
	border: 0px;
	text-align: center;
	background: #008080;
	font-weight: normal;
	color: #fff;
	}

	.ui-widget-content .ui-state-active {
	border: 0px;
	background: #008080;
	color: #fff;
	}
	option:checked {
		background: red linear-gradient(0deg, red 0%, red 100%);
	}
</style>
<style>
    .btn_upload {
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    position: relative;
    color: #fff;
    background-color: #db3e8d;;
    border: 1px solid #db3e8d;
    border-radius:20px;
    height: 20px;
    font-size:12px;
    padding-top:1px;
    padding-bottom:1px;
    padding-left:10px;
    padding-right:10px;
    }

    .btn_upload:hover,
    .btn_upload:focus {
    background-color: #fff;
    color: #db3e8d;
    border: 1px solid #db3e8d;
    }

    .yes {
    display: flex;
    align-items: flex-start;
    margin-top: 10px !important;
    }

    .btn_upload input {
    cursor: pointer;
    height: 100%;
    position: absolute;
    filter: alpha(opacity=1);
    -moz-opacity: 0;
    opacity: 0;
    }

    .it {
    height: 100px;
    margin-left: 10px;
    }

    .btn-rmv1,
    .btn-rmv2,
    .btn-rmv3,
    .btn-rmv4,
    .btn-rmv5 {
    display: none;
    }

    .rmv {
    cursor: pointer;
    color: #fff;
    border-radius: 30px;
    border: 1px solid #fff;
    display: inline-block;
    background: rgba(255, 0, 0, 1);
    margin: -5px -10px;
    }

    .rmv:hover {
    background: rgba(255, 0, 0, 0.5);
    }
</style>
<style>
    .readonly{
        background-color:#ffffff !important;
        cursor:pointer !important;
    }

    .time-picker {
        z-index: 999;
    }
</style>

