

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

	$("#cb_par_total_loss").change(function(){
	if(this.checked){
		$(".motor_claim_loss_partial").show();
	}else{
		if($("#cb_theft_accessory").prop("checked") == true){
			$(".motor_claim_loss_partial").show();
		}
		else if($(this).prop("checked") == false){
			$(".motor_claim_loss_partial").hide();
		}
	}
	});

	$("#cb_par_total_loss_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_partial_view").show();
	}else{
		if($("#cb_theft_accessory_view").prop("checked") == true){
			$(".motor_claim_loss_partial_view").show();
		}
		else if($(this).prop("checked") == false){
			$(".motor_claim_loss_partial_view").hide();
		}
	}
	});


	$("#cb_bi").change(function(){
	if(this.checked){
		$(".motor_claim_loss_bi").show();
	}else{
		$(".motor_claim_loss_bi").hide();
	}
	});

	$("#cb_bi_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_bi_view").show();
	}else{
		$(".motor_claim_loss_bi_view").hide();
	}
	});



	$("#cb_bi_tp").change(function(){
	if(this.checked){
		$(".motor_claim_loss_BITP").show();
	}else{
		$(".motor_claim_loss_BITP").hide();
	}
	});

	$("#cb_bi_tp_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_BITP_view").show();
	}else{
		$(".motor_claim_loss_BITP_view").hide();
	}
	});


	$("#cb_theft_accessory").change(function(){
	if(this.checked){
		$(".motor_claim_loss_partial").show();
	}else{
		if($("#cb_par_total_loss").prop("checked") == true){
			$(".motor_claim_loss_partial").show();
		}
		else if($(this).prop("checked") == false){
			$(".motor_claim_loss_partial").hide();
		}
	}
	});

	$("#cb_theft_accessory_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_partial_view").show();
	}else{
		if($("#cb_par_total_loss_view").prop("checked") == true){
			$(".motor_claim_loss_partial_view").show();
		}
		else if($(this).prop("checked") == false){
			$(".motor_claim_loss_partial_view").hide();
		}
	}
	});


	$("#cb_vec_tp").change(function(){
	if(this.checked){
		$(".motor_claim_loss_vehicleTP").show();
	}else{
		$(".motor_claim_loss_vehicleTP").hide();
	}
	});
	$("#cb_vec_tp_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_vehicleTP_view").show();
	}else{
		$(".motor_claim_loss_vehicleTP_view").hide();
	}
	});


	$("#cb_recovery").change(function(){
	if(this.checked){
		$(".motor_claim_loss_recovery").show();
	}else{
		$(".motor_claim_loss_recovery").hide();
	}
	});
	$("#cb_recovery_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_recovery_view").show();
	}else{
		$(".motor_claim_loss_recovery_view").hide();
	}
	});


	$("#cb_carnap").change(function(){
	if(this.checked){
		$(".motor_claim_loss_carnap").show();
	}else{
		$(".motor_claim_loss_carnap").hide();
	}
	});
	$("#cb_carnap_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_carnap_view").show();
	}else{
		$(".motor_claim_loss_carnap_view").hide();
	}
	});


	$("#cb_pd_tp").change(function(){
	if(this.checked){
		$(".motor_claim_loss_PDTP").show();
	}else{
		$(".motor_claim_loss_PDTP").hide();
	}
	});
	$("#cb_pd_tp_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_PDTP_view").show();
	}else{
		$(".motor_claim_loss_PDTP_view").hide();
	}
	});

	$("#cb_recovery_other_insurance").change(function(){
	if(this.checked){
		$(".motor_claim_loss_recovery_other_insurance").show();
	}else{
		$(".motor_claim_loss_recovery_other_insurance").hide();
	}
	});

	$("#cb_recovery_other_insurance_view").change(function(){
	if(this.checked){
		$(".motor_claim_loss_recovery_other_insurance_view").show();
	}else{
		$(".motor_claim_loss_recovery_other_insurance_view").hide();
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


    jQuery('.drpYear_claim_not').change(function(){
		if(jQuery(this).val() != '')
		{         
			var yearval = jQuery(this).val();
			$hidURL = jQuery('input[name="hidURL"]').val();
			var url = $hidURL+ '/dynamic_dependent/fetch/brand';    
			var _token = jQuery('input[name="_token"]').val();
			
		jQuery.ajax({
		url: url,
		method:"POST",
		data:{ _token:_token,yearval:yearval},
		success:function(result)
		{        
			jQuery('#brand_claim_not').html(result);    
			jQuery('#brand_claim_not').selectpicker("refresh");   
		}

		})
		}
	}); 
	jQuery('.dynamicbrand_claim_not').change(function(){
		if(jQuery(this).val() != '')
		{
			var yearval = jQuery( "#drpYear_claim_not option:selected" ).text();        
			var brandval = jQuery(this).val();
			$hidURL =jQuery('input[name="hidURL"]').val();
			var url = $hidURL+ '/dynamic_dependent/fetch/model';    
			var _token = jQuery('input[name="_token"]').val();
			
		jQuery.ajax({
		url: url,
		method:"POST",
		data:{ _token:_token,yearval:yearval,brandval:brandval},
		success:function(result)
		{        
			jQuery('#model_claim_not').html(result); 
			jQuery('#model_claim_not').selectpicker("refresh");        
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
  
		  $(".validation_drpYear_claim_not").remove();
		  $(".validation_drpYear_claim_not_check_error").remove(); 
		  $(".validation_drpYear_claim_not_check_success").remove();
  
		  $(".validation_brand_claim_not").remove();
		  $(".validation_brand_claim_not_check_error").remove(); 
		  $(".validation_brand_claim_not_check_success").remove();
  
		  $(".validation_model_claim_not").remove();
		  $(".validation_model_claim_not_check_error").remove(); 
		  $(".validation_model_claim_not_check_success").remove();
  
		  $(".validation_mv_file_no_claim").remove();
		  $(".validation_mv_file_no_claim_check_error").remove(); 
		  $(".validation_mv_file_no_claim_check_success").remove();
  
		  $(".validation_palte_no_claim").remove();
		  $(".validation_palte_no_claim_check_error").remove(); 
		  $(".validation_palte_no_claim_check_success").remove();
  
		  $(".validation_engine_no_claim").remove();
		  $(".validation_engine_no_claim_check_error").remove(); 
		  $(".validation_engine_no_claim_check_success").remove();
  
		  $(".validation_color_claim").remove();
		  $(".validation_color_claim_check_error").remove(); 
		  $(".validation_color_claim_check_success").remove();
  
		  $(".validation_chassis_no_claim").remove();
		  $(".validation_chassis_no_claim_check_error").remove(); 
		  $(".validation_chassis_no_claim_check_success").remove();
  
		  $(".validation_conduction_sticker_no_claim").remove();
		  $(".validation_conduction_sticker_no_claim_check_error").remove(); 
		  $(".validation_conduction_sticker_no_claim_check_success").remove();
  
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
		  
		  if($('#drpYear_claim_not').val() == "" || $('#drpYear_claim_not').val() == null){
			  $('.drpYear_claim_not').css('border-color', '#F44336');                 
			  $("#drpYear_claim_not").after("<div class='validation_drpYear_claim_not v-error-msg'>Year is empty</div>");    
			  $('#drpYear_claim_not').after('<i class="form-control-feedback fa fa-times-circle validation_drpYear_claim_not_check_error fa-sm" aria-hidden="true" style="z-index: 1;float: right;top:-30px; position: relative;left:-25px !important;color: #CF3C4B;"></i>');     
			  errornumber = 1;           
		  }else{                                      
			  $('#drpYear_claim_not').after('<i class="form-control-feedback fa fa-check-circle validation_drpYear_claim_not_check_success fa-sm" aria-hidden="true" style=" z-index: 1;float: right;top:-30px; position: relative;left:-25px !important;color: #4BB543;size:10px;"></i>');
			  $('.drpYear_claim_not').css('border-color', '#4BB543');                   
		  }
		  
		  if($('#brand_claim_not').val() == "" || $('#brand_claim_not').val() == null){
			  $('.brand_claim_not').css('border-color', '#F44336');                 
			  $("#brand_claim_not").after("<div class='validation_brand_claim_not v-error-msg'>Brand is empty</div>");    
			  $('#brand_claim_not').after('<i class="form-control-feedback fa fa-times-circle validation_brand_claim_not_check_error fa-sm" aria-hidden="true" style="z-index: 1;float: right;top:-30px; position: relative;left:-25px !important;color: #CF3C4B;"></i>');     
			  errornumber = 1;           
		  }else{                                      
			  $('#brand_claim_not').after('<i class="form-control-feedback fa fa-check-circle validation_brand_claim_not_check_success fa-sm" aria-hidden="true" style=" z-index: 1;float: right;top:-30px; position: relative;left:-25px !important;color: #4BB543;size:10px;"></i>');
			  $('.brand_claim_not').css('border-color', '#4BB543');                   
		  }
		  
		  if($('#model_claim_not').val() == "" || $('#model_claim_not').val() == null){
			  $('.model_claim_not').css('border-color', '#F44336');                 
			  $("#model_claim_not").after("<div class='validation_model_claim_not v-error-msg'>Model is empty</div>");    
			  $('#model_claim_not').after('<i class="form-control-feedback fa fa-times-circle validation_model_claim_not_check_error fa-sm" aria-hidden="true" style="z-index: 1;float: right;top:-30px; position: relative;left:-25px !important;color: #CF3C4B;"></i>');     
			  errornumber = 1;           
		  }else{                                      
			  $('#model_claim_not').after('<i class="form-control-feedback fa fa-check-circle validation_model_claim_not_check_success fa-sm" aria-hidden="true" style=" z-index: 1;float: right;top:-30px; position: relative;left:-25px !important;color: #4BB543;size:10px;"></i>');
			  $('.model_claim_not').css('border-color', '#4BB543');                   
		  }
		  
		  if($('#mv_file_no_claim').val() == ""){
			  $("#mv_file_no_claim").after("<div class='validation_mv_file_no_claim v-error-msg'>MV File No. is empty</div>");    
			  $('#mv_file_no_claim').fieldErrorState();
				  errornumber = 1;           
		  }else{	     				     			
			  $('#mv_file_no_claim').fieldSuccessState();
		  } 
		  
		  if($('#palte_no_claim').val() == ""){
			  $("#palte_no_claim").after("<div class='validation_palte_no_claim v-error-msg'>Plate No. is empty</div>");    
			  $('#palte_no_claim').fieldErrorState();
				  errornumber = 1;           
		  }else{	     				     			
			  $('#palte_no_claim').fieldSuccessState();
		  } 
		  
		  if($('#engine_no_claim').val() == ""){
			  $("#engine_no_claim").after("<div class='validation_engine_no_claim v-error-msg'>Engine No. is empty</div>");    
			  $('#engine_no_claim').fieldErrorState();
				  errornumber = 1;           
		  }else{	     				     			
			  $('#engine_no_claim').fieldSuccessState();
		  } 
		  
		  if($('#color_claim').val() == ""){
			  $("#color_claim").after("<div class='validation_color_claim v-error-msg'>Color is empty</div>");    
			  $('#color_claim').fieldErrorState();
				  errornumber = 1;           
		  }else{	     				     			
			  $('#color_claim').fieldSuccessState();
		  } 
		  
		  if($('#chassis_no_claim').val() == ""){
			  $("#chassis_no_claim").after("<div class='validation_chassis_no_claim v-error-msg'>Chassis No. is empty</div>");    
			  $('#chassis_no_claim').fieldErrorState();
				  errornumber = 1;           
		  }else{	     				     			
			  $('#chassis_no_claim').fieldSuccessState();
		  } 
		  if($('#conduction_sticker_no_claim').val() == ""){
			  $("#conduction_sticker_no_claim").after("<div class='validation_chassis_no_claim v-error-msg'>Conduction Sticker No. is empty</div>");    
			  $('#conduction_sticker_no_claim').fieldErrorState();
				  errornumber = 1;           
		  }else{	     				     			
			  $('#conduction_sticker_no_claim').fieldSuccessState();
		  } 

		//   if($("#cb_par_total_loss").prop("checked") == true || $("#cb_theft_accessory").prop("checked") == true){
			  
		// 	  $('input[name^="file_upload_motor_partial_loss"]').each(function(){
		// 		  var idpartial = "file_upload_motor_td_name_partial" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idpartial).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idpartial).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
		  
		//   if($("#cb_carnap").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_carnap"]').each(function(){
		// 		  var idcarnap = "file_upload_motor_td_name_carnap" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;
		// 			  $("#"+ idcarnap).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idcarnap).attr('style',  'color:#373737');
		// 		  }
				  
		// 	  });
		//   }
		  
  
		//   if($("#cb_bi").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_bi"]').each(function(){6
		// 		  var idbi = "file_upload_motor_td_name_bi" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idbi).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idbi).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
  
		//   if($("#cb_bi_tp").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_BITP"]').each(function(){
		// 		  var idbitp = "file_upload_motor_td_name_bitp" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idbitp).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idbitp).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
  
		//   if($("#cb_vec_tp").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_vehicleTP"]').each(function(){
		// 		  var idvecTP = "file_upload_motor_td_name_vec_TP" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idvecTP).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idvecTP).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
  
			
		//   if($("#cb_recovery").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_recovery"]').each(function(){
		// 		  var idrec = "file_upload_motor_td_name_rec" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idrec).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idrec).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
		  
		//   if($("#cb_recovery_other_insurance").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_recovery_other_insurance"]').each(function(){
		// 		  var idrecOther = "file_upload_motor_td_name_rec_other" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idrecOther).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idrecOther).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
		  
		//   if($("#cb_pd_tp").prop("checked") == true){
		// 	  $('input[name^="file_upload_motor_PDTP"]').each(function(){
		// 		  var idpdTP = "file_upload_motor_td_name_pdTP" + $(this).data("id");
		// 		  if($('#'+ this.id).val() == ""){
		// 			  errornumber = 1;    
		// 			  $("#"+ idpdTP).attr('style',  'color:#CF3C4B');
		// 		  }else{
		// 			  $("#"+ idpdTP).attr('style',  'color:#373737');
		// 		  }
		// 	  });
		//   }
		  if(errornumber == 1){				
			  return false;
		  }
	  });
	  $("#claim_motor_aget_yes_not").click(function() { 
		document.getElementById("claim_motor_aget_yes_not").style.background='#008080';
		document.getElementById("claim_motor_aget_yes_not").style.color ='#ffffff';
		document.getElementById("claim_motor_aget_no_not").style.background='#C0C0C0';
		document.getElementById("claim_motor_aget_no_not").style.color ='#000000';  
		$('input[name=hd_third_party_not]').val("yes"); 
	});
	$("#claim_motor_aget_no_not").click(function() { 
		document.getElementById("claim_motor_aget_no_not").style.background='#008080';
		document.getElementById("claim_motor_aget_no_not").style.color ='#ffffff';
		document.getElementById("claim_motor_aget_yes_not").style.background='#C0C0C0';
		document.getElementById("claim_motor_aget_yes_not").style.color ='#000000'; 
		$('input[name=hd_third_party_not]').val("no");
	});

	$("#claim_motor_recovery_yes").click(function() { 
		document.getElementById("claim_motor_recovery_yes").style.background='#008080';
		document.getElementById("claim_motor_recovery_yes").style.color ='#ffffff';
		document.getElementById("claim_motor_recovery_no").style.background='#C0C0C0';
		document.getElementById("claim_motor_recovery_no").style.color ='#000000';  
		$('input[name=hd_recovery_claim]').val("yes"); 
	});

	$("#claim_motor_recovery_no").click(function() { 
		document.getElementById("claim_motor_recovery_no").style.background='#008080';
		document.getElementById("claim_motor_recovery_no").style.color ='#ffffff';
		document.getElementById("claim_motor_recovery_yes").style.background='#C0C0C0';
		document.getElementById("claim_motor_recovery_yes").style.color ='#000000'; 
		$('input[name=hd_recovery_claim]').val("no");
	});

	$("#claim_motor_aget_yes_view").click(function() { 
		document.getElementById("claim_motor_aget_yes_view").style.background='#008080';
		document.getElementById("claim_motor_aget_yes_view").style.color ='#ffffff';
		document.getElementById("claim_motor_aget_no_view").style.background='#C0C0C0';
		document.getElementById("claim_motor_aget_no_view").style.color ='#000000';  
		$('input[name=hd_third_party_not_view]').val("yes"); 
	});
	$("#claim_motor_aget_no_view").click(function() { 
		document.getElementById("claim_motor_aget_no_view").style.background='#008080';
		document.getElementById("claim_motor_aget_no_view").style.color ='#ffffff';
		document.getElementById("claim_motor_aget_yes_view").style.background='#C0C0C0';
		document.getElementById("claim_motor_aget_yes_view").style.color ='#000000'; 
		$('input[name=hd_third_party_not_view]').val("no");
	});

	$("#claim_motor_recovery_yes_view").click(function() { 
		document.getElementById("claim_motor_recovery_yes_view").style.background='#008080';
		document.getElementById("claim_motor_recovery_yes_view").style.color ='#ffffff';
		document.getElementById("claim_motor_recovery_no_view").style.background='#C0C0C0';
		document.getElementById("claim_motor_recovery_no_view").style.color ='#000000';  
		$('input[name=hd_recovery_claim_view]').val("yes"); 
	});

	$("#claim_motor_recovery_no_view").click(function() { 
		document.getElementById("claim_motor_recovery_no_view").style.background='#008080';
		document.getElementById("claim_motor_recovery_no_view").style.color ='#ffffff';
		document.getElementById("claim_motor_recovery_yes_view").style.background='#C0C0C0';
		document.getElementById("claim_motor_recovery_yes_view").style.color ='#000000'; 
		$('input[name=hd_recovery_claim_view]').val("no");
	});