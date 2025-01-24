$("#cb_property_building").change(function(){
    if(this.checked){
        $(".property_claim_building").show();
    }else{
        $(".property_claim_building").hide();
    }
    });


    $("#cb_property_stocl_building").change(function(){
    if(this.checked){
        $(".property_claim_cstocks").show();
    }else{
        $(".property_claim_cstocks").hide();
    }
    });

     $("#claim_property_same_insured_yes").click(function() { 
        document.getElementById("claim_property_same_insured_yes").style.background='#008080';
        document.getElementById("claim_property_same_insured_yes").style.color ='#ffffff';
        document.getElementById("claim_property_same_insured_no").style.background='#C0C0C0';
        document.getElementById("claim_property_same_insured_no").style.color ='#000000';  
        $('input[name=hd_claim_property_same_insured]').val("yes"); 
    });
    $("#claim_property_same_insured_no").click(function() { 
        document.getElementById("claim_property_same_insured_no").style.background='#008080';
        document.getElementById("claim_property_same_insured_no").style.color ='#ffffff';
        document.getElementById("claim_property_same_insured_yes").style.background='#C0C0C0';
        document.getElementById("claim_property_same_insured_yes").style.color ='#000000'; 
        $('input[name=hd_claim_property_same_insured]').val("no");
    });


    $("#claim_property_prem_paid_yes").click(function() { 
        document.getElementById("claim_property_prem_paid_yes").style.background='#008080';
        document.getElementById("claim_property_prem_paid_yes").style.color ='#ffffff';
        document.getElementById("claim_property_prem_paid_no").style.background='#C0C0C0';
        document.getElementById("claim_property_prem_paid_no").style.color ='#000000';  
        $('input[name=hd_claim_property_prem_paid]').val("yes"); 
    });
    $("#claim_property_prem_paid_no").click(function() { 
        document.getElementById("claim_property_prem_paid_no").style.background='#008080';
        document.getElementById("claim_property_prem_paid_no").style.color ='#ffffff';
        document.getElementById("claim_property_prem_paid_yes").style.background='#C0C0C0';
        document.getElementById("claim_property_prem_paid_yes").style.color ='#000000'; 
        $('input[name=hd_claim_property_prem_paid]').val("no");
    });

    $("#claim_property_within_inception_yes").click(function() { 
        document.getElementById("claim_property_within_inception_yes").style.background='#008080';
        document.getElementById("claim_property_within_inception_yes").style.color ='#ffffff';
        document.getElementById("claim_property_within_inception_no").style.background='#C0C0C0';
        document.getElementById("claim_property_within_inception_no").style.color ='#000000';  
        $('input[name=hd_claim_property_within_inception]').val("yes"); 
    });
    $("#claim_property_within_inception_no").click(function() { 
        document.getElementById("claim_property_within_inception_no").style.background='#008080';
        document.getElementById("claim_property_within_inception_no").style.color ='#ffffff';
        document.getElementById("claim_property_within_inception_yes").style.background='#C0C0C0';
        document.getElementById("claim_property_within_inception_yes").style.color ='#000000'; 
        $('input[name=hd_claim_property_within_inception]').val("no");
    });

    $("#claim_property_risk_insured_yes").click(function() { 
        document.getElementById("claim_property_risk_insured_yes").style.background='#008080';
        document.getElementById("claim_property_risk_insured_yes").style.color ='#ffffff';
        document.getElementById("claim_property_risk_insured_no").style.background='#C0C0C0';
        document.getElementById("claim_property_risk_insured_no").style.color ='#000000';  
        $('input[name=hd_claim_property_risk_insured]').val("yes"); 
    });
    $("#claim_property_risk_insured_no").click(function() { 
        document.getElementById("claim_property_risk_insured_no").style.background='#008080';
        document.getElementById("claim_property_risk_insured_no").style.color ='#ffffff';
        document.getElementById("claim_property_risk_insured_yes").style.background='#C0C0C0';
        document.getElementById("claim_property_risk_insured_yes").style.color ='#000000'; 
        $('input[name=hd_claim_property_risk_insured]').val("no");
    });

    $("#claim_property_morgagee_yes").click(function() { 
        document.getElementById("claim_property_morgagee_yes").style.background='#008080';
        document.getElementById("claim_property_morgagee_yes").style.color ='#ffffff';
        document.getElementById("claim_property_morgagee_no").style.background='#C0C0C0';
        document.getElementById("claim_property_morgagee_no").style.color ='#000000';  
        $('input[name=hd_claim_property_morgagee]').val("yes"); 
    });
    $("#claim_property_morgagee_no").click(function() { 
        document.getElementById("claim_property_morgagee_no").style.background='#008080';
        document.getElementById("claim_property_morgagee_no").style.color ='#ffffff';
        document.getElementById("claim_property_morgagee_yes").style.background='#C0C0C0';
        document.getElementById("claim_property_morgagee_yes").style.color ='#000000'; 
        $('input[name=hd_claim_property_morgagee]').val("no");
    });

    $("#claim_motor_property_recovery_yes").click(function() { 
        document.getElementById("claim_motor_property_recovery_yes").style.background='#008080';
        document.getElementById("claim_motor_property_recovery_yes").style.color ='#ffffff';
        document.getElementById("claim_motor_property_recovery_no").style.background='#C0C0C0';
        document.getElementById("claim_motor_property_recovery_no").style.color ='#000000';  
        $('input[name=hd_claim_motor_property_recovery]').val("yes"); 
    });
    $("#claim_motor_property_recovery_no").click(function() { 
        document.getElementById("claim_motor_property_recovery_no").style.background='#008080';
        document.getElementById("claim_motor_property_recovery_no").style.color ='#ffffff';
        document.getElementById("claim_motor_property_recovery_yes").style.background='#C0C0C0';
        document.getElementById("claim_motor_property_recovery_yes").style.color ='#000000'; 
        $('input[name=hd_claim_motor_property_recovery]').val("no");
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

    btnclm_property_upload = $("#clm_property_upload_new_not");
    btnclm_property_upload.click(function(){
        errornumber = 0; 

        // if($("#cb_property_building").prop("checked") == true){
        //     $('input[name^="file_upload_property_building"]').each(function(){
        //         var propertyBuilding = "file_upload_property_building_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ propertyBuilding).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ propertyBuilding).attr('style',  'color:#373737');
        //         }
        //     });
        // }

        // if($("#cb_property_stocl_building").prop("checked") == true){
        //     $('input[name^="file_upload_property_cstocks"]').each(function(){
        //         var propertyStock = "file_upload_property_stock_lbl" + $(this).data("id");
        //         if($('#'+ this.id).val() == ""){
        //             errornumber = 1;    
        //             $("#"+ propertyStock).attr('style',  'color:#CF3C4B');
        //         }else{
        //             $("#"+ propertyStock).attr('style',  'color:#373737');
        //         }
        //     });
        // }

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
		$(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true" style="margin-top:12px;margin-right:10px;z-index:0;"></span>');
	};
	$.fn.fieldSuccessState = function() {
		$(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
		$(this).removeFormControlFeedback();
		$(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true" style="margin-top:12px;margin-right:10px;z-index:0;"></span>');
	};
