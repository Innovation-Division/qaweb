
	
	
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
		$(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true" style="margin-right:10px;z-index:0;"></span>');
	};
	$.fn.fieldSuccessState = function() {
		$(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
		$(this).removeFormControlFeedback();
		$(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true" style="margin-right:10px;z-index:0;"></span>');
	};

	$(document).ready(function(){

    $('.NoPaste').on("cut copy paste",function(e) {
      e.preventDefault();
   	});
	
	//motor
	var currentclmmotor = 1;
	widgetclmmotor     = $(".clmmotorstep");
	btnnextclmmotor     = $(".clmmotornext");
	btnbackclmmotor     = $(".clmmotorbacks"); 
	


	//property
	var clmspropertycurrent = 1;
	widgetclmsproperty      = $(".clmspropertystep");
	btnnextclmsproperty   = $(".clmspropertynext");
	clmspropertybacks     = $(".clmspropertybacks"); 

	//pa
	var clmspacurrent = 1;
	widgetclmspa      = $(".cmlpastep");
	btnnextclmspa   = $(".cmlpanext");
	clmspabacks     = $(".cmlpabacks"); 


	// Init buttons and UI

	//motor
	widgetclmmotor.not(':eq(0)').hide();
	hideButtonsclmmotor(currentclmmotor);
	setProgressclmmotor(currentclmmotor);

    //property
	widgetclmsproperty.not(':eq(0)').hide();
	hideButtonsclmsproperty(clmspropertycurrent);
	setProgressclmsproperty(clmspropertycurrent);

	//pa
	widgetclmspa.not(':eq(0)').hide();
	hideButtonsclmspa(clmspacurrent);
	setProgressclmspa(clmspacurrent);
	// Next button click action

	//motor
	btnnextclmmotor.click(function(){
			if(currentclmmotor < widgetclmmotor.length) {
			
	    	//coverage		
	    	errornumber = 0; 
	     	if(currentclmmotor == 1){
				$(".validation_policyNo").remove();
	     		$(".validation_policyNo_check_error").remove(); 
	     		$(".validation_policyNo_check_success").remove();

				$(".validation_driver").remove();
	     		$(".validation_driver_check_error").remove(); 
	     		$(".validation_driver_check_success").remove();

				$(".validation_relationship_motor").remove();
	     		$(".validation_relationship_motor_check_error").remove(); 
	     		$(".validation_relationship_motor_check_success").remove();

				$(".validation_Loss_date").remove();
	     		$(".validation_Loss_date_check_error").remove(); 
	     		$(".validation_Loss_date_check_success").remove();

				$(".validation_Loss_time").remove();
	     		$(".validation_Loss_time_check_error").remove(); 
	     		$(".validation_Loss_time_check_success").remove();

				$(".validation_location_loss_motor").remove();
	     		$(".validation_location_loss_motor_check_error").remove(); 
	     		$(".validation_location_loss_motor_check_success").remove();

				$(".validation_location_loss").remove();
	     		$(".validation_location_loss_check_error").remove(); 
	     		$(".validation_location_loss_check_success").remove();



				if($('#policyNo').val() == ""){
					$("#policyNo").after("<div class='validation_policyNo v-error-msg'>Policy Number is empty</div>");    
					$('#policyNo').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#policyNo').fieldSuccessState();
				}  

				if($('#driver').val() == ""){
					$("#driver").after("<div class='validation_driver v-error-msg'>Driver is empty</div>");    
					$('#driver').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#driver').fieldSuccessState();
				}  

				if($('#relationship_motor').val() == ""){
					$("#relationship_motor").after("<div class='validation_relationship_motor v-error-msg'>Relationship to the driver is empty</div>");    
					$('#relationship_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#relationship_motor').fieldSuccessState();
				}  

				if($('#Loss_date').val() == ""){
					$("#Loss_date").after("<div class='validation_Loss_date v-error-msg'>Loss date is empty</div>");    
					$('#Loss_date').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#Loss_date').fieldSuccessState();
				}  

				if($('#Loss_time').val() == ""){
					$("#Loss_time").after("<div class='validation_Loss_time v-error-msg'>Loss time is empty</div>");    
					$('#Loss_time').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#Loss_time').fieldSuccessState();
				}  

				if($('#location_loss').val() == ""){
					$("#location_loss").after("<div class='validation_location_loss v-error-msg'>Location of loss is empty</div>");    
					$('#location_loss').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#location_loss').fieldSuccessState();
				}  
	     	}	    

			if(currentclmmotor == 2){
				$(".validation_email_address_motor").remove();
	     		$(".validation_email_address_motor_check_error").remove(); 
	     		$(".validation_email_address_motor_check_success").remove();


				$(".validation_fname_motor").remove();
	     		$(".validation_fname_motor_check_error").remove(); 
	     		$(".validation_fname_motor_check_success").remove();

				$(".validation_mname_motor").remove();
	     		$(".validation_mname_motor_check_error").remove(); 
	     		$(".validation_mname_motor_check_success").remove();

				$(".validation_lname_motor").remove();
	     		$(".validation_lname_motor_check_error").remove(); 
	     		$(".validation_lname_motor_check_success").remove();

				$(".validation_acc_happen_motor").remove();
	     		$(".validation_acc_happen_motor_check_error").remove(); 
	     		$(".validation_acc_happen_motor_check_success").remove();

				$(".validation_acc_happen_motor").remove();
	     		$(".validation_acc_happen_motor_check_error").remove(); 
	     		$(".validation_acc_happen_motor_check_success").remove();

				$(".validation_edamage_motor").remove();
	     		$(".validation_edamage_motor_check_error").remove(); 
	     		$(".validation_edamage_motor_check_success").remove();

				$(".validation_driving_vec_motor").remove();
	     		$(".validation_driving_vec_motor_check_error").remove(); 
	     		$(".validation_driving_vec_motor_check_success").remove();

				$(".validation_purpose_vec_motor").remove();
	     		$(".validation_purpose_vec_motor_check_error").remove(); 
	     		$(".validation_purpose_vec_motor_check_success").remove();

				$(".validation_tel_no_motor").remove();
	     		$(".validation_tel_no_motor_check_error").remove(); 
	     		$(".validation_tel_no_motor_check_success").remove();

				$(".validation_mobile_no_motor").remove();
	     		$(".validation_mobile_no_motor_check_error").remove(); 
	     		$(".validation_mobile_no_motor_check_success").remove();

				$(".validation_name_reportee_motor").remove();
	     		$(".validation_name_reportee_motor_check_error").remove(); 
	     		$(".validation_name_reportee_motor_check_success").remove();

				$(".validation_no_passenger_motor").remove();
	     		$(".validation_no_passenger_motor_check_error").remove(); 
	     		$(".validation_no_passenger_motor_check_success").remove();

				$(".validation_pwd_div_1").remove();
	     		$(".validation_pwd_div_1_check_error").remove(); 
	     		$(".validation_pwd_div_1_check_success").remove();


				if($('#fname_motor').val() == ""){
					$("#fname_motor").after("<div class='validation_fname_motor v-error-msg'>First name is empty</div>");    
					$('#fname_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#fname_motor').fieldSuccessState();
				}  

				if($('#mname_motor').val() == ""){
					$("#mname_motor").after("<div class='validation_mname_motor v-error-msg'>Middle name is empty</div>");    
					$('#mname_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#mname_motor').fieldSuccessState();
				}  

				if($('#lname_motor').val() == ""){
					$("#lname_motor").after("<div class='validation_lname_motor v-error-msg'>Last name is empty</div>");    
					$('#lname_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#lname_motor').fieldSuccessState();
				}  

				if($('#acc_happen_motor').val() == ""){
					$("#acc_happen_motor").after("<div class='validation_acc_happen_motor v-error-msg'>How did the accident happen is empty</div>");    
					$('#acc_happen_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#acc_happen_motor').fieldSuccessState();
				}  

				if($('#edamage_motor').val() == ""){
					$("#edamage_motor").after("<div class='validation_edamage_motor v-error-msg'>Extend of damage is empty</div>");    
					$('#edamage_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#edamage_motor').fieldSuccessState();
				}  

				if($('#driving_vec_motor').val() == ""){
					$("#driving_vec_motor").after("<div class='validation_driving_vec_motor v-error-msg'>Who was driving the insured vehicle is empty</div>");    
					$('#driving_vec_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#driving_vec_motor').fieldSuccessState();
				} 

				if($('#purpose_vec_motor').val() == ""){
					$("#purpose_vec_motor").after("<div class='validation_purpose_vec_motor v-error-msg'>What is the purpose of the trip is empty</div>");    
					$('#purpose_vec_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#purpose_vec_motor').fieldSuccessState();
				} 

				if($('#email_address_motor').val() == ""){
					$("#email_address_motor").after("<div class='validation_email_address_motor v-error-msg'>Email address is empty</div>");    
					$('#email_address_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     			
					if(IsEmail($('#email_address_motor').val())==false){
						$("#email_address_motor").after("<div class='validation_email_address_motor v-error-msg'>Invalid format</div>");    
						$("#email_address_motor").fieldErrorState();   
						errornumber = 1;  
					}else{
						$('#email_address_motor').fieldSuccessState();
					}   	     			
					
				}  

				if($('#tel_no_motor').val() == ""){
					$("#tel_no_motor").after("<div class='validation_tel_no_motor v-error-msg'>Tel. no. is empty</div>");    
					$('#tel_no_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#tel_no_motor').fieldSuccessState();
				} 

				if($('#mobile_no_motor').val() == ""){
					$("#mobile_no_motor").after("<div class='validation_mobile_no_motor v-error-msg'>Mobile no. is empty</div>");    
					$('#mobile_no_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#mobile_no_motor').fieldSuccessState();
				} 

				if($('#name_reportee_motor').val() == ""){
					$("#name_reportee_motor").after("<div class='validation_name_reportee_motor v-error-msg'>Name of reportee is empty</div>");    
					$('#name_reportee_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#name_reportee_motor').fieldSuccessState();
				} 

				if($('#no_passenger_motor').val() == ""){
					$("#no_passenger_motor").after("<div class='validation_no_passenger_motor v-error-msg'>No./Who were the passenger is empty</div>");    
					$('#no_passenger_motor').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#no_passenger_motor').fieldSuccessState();
				} 
				if($('input[name=hd_third_party]').val() == "no" || $('input[name=hd_third_party]').val() == "yes"){
					$("#lbl_third_party_motor").attr('style',  'color:#373737');
					$("#claim_motor_aget_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_motor_aget_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_third_party]').val() == "yes"){
						document.getElementById("claim_motor_aget_yes").style.background='#008080';
						document.getElementById("claim_motor_aget_yes").style.color ='#ffffff';
						document.getElementById("claim_motor_aget_no").style.background='#C0C0C0';
						document.getElementById("claim_motor_aget_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_motor_aget_no").style.background='#008080';
						document.getElementById("claim_motor_aget_no").style.color ='#ffffff';
						document.getElementById("claim_motor_aget_yes").style.background='#C0C0C0';
						document.getElementById("claim_motor_aget_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_third_party_motor").attr('style',  'color:#CF3C4B');
					$("#claim_motor_aget_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_motor_aget_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 
			}

			if(errornumber == 1){				
	 			return false;
	 		}
			btnbackclmmotor.show();	
			widgetclmmotor.show(); 			
			widgetclmmotor.not(':eq('+(currentclmmotor++)+')').hide();


			setProgressclmmotor(currentclmmotor); 
		} 		
		hideButtonsclmmotor(currentclmmotor); 	
	});


	//property
	btnnextclmsproperty.click(function(){
		if(clmspropertycurrent < widgetclmsproperty.length) {
			
	    	//coverage		
	    	errornumber = 0; 	
	     	if(clmspropertycurrent == 1){
				$(".validation_policyNo_property").remove();
				$(".validation_policyNo_property_check_error").remove(); 
				$(".validation_policyNo_property_check_success").remove();

				$(".validation_Loss_date_property").remove();
				$(".validation_Loss_date_property_check_error").remove(); 
				$(".validation_Loss_date_property_check_success").remove();

				$(".validation_Loss_time_property").remove();
				$(".validation_Loss_time_property_check_error").remove(); 
				$(".validation_Loss_time_property_check_success").remove();

				$(".validation_location_loss_property").remove();
				$(".validation_location_loss_property_check_error").remove(); 
				$(".validation_location_loss_property_check_success").remove();

				$(".validation_contact_no_property").remove();
				$(".validation_contact_no_property_check_error").remove(); 
				$(".validation_contact_no_property_check_success").remove();

				$(".validation_email_address_property").remove();
				$(".validation_email_address_property_check_error").remove(); 
				$(".validation_email_address_property_check_success").remove();

				if($('#policyNo_property').val() == ""){
					$("#policyNo_property").after("<div class='validation_policyNo_property v-error-msg'>Enter Your Policy No. is empty</div>");    
					$('#policyNo_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#policyNo_property').fieldSuccessState();
				}  

				if($('#Loss_date_property').val() == ""){
					$("#Loss_date_property").after("<div class='validation_Loss_date_property v-error-msg'>Date of Loss is empty</div>");    
					$('#Loss_date_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#Loss_date_property').fieldSuccessState();
				}  

				if($('#Loss_time_property').val() == ""){
					$("#Loss_time_property").after("<div class='validation_Loss_time_property v-error-msg'>Estimate Loss Time is empty</div>");    
					$('#Loss_time_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#Loss_time_property').fieldSuccessState();
				}  

				if($('#location_loss_property').val() == ""){
					$("#location_loss_property").after("<div class='validation_location_loss_property v-error-msg'>Location of Loss is empty</div>");    
					$('#location_loss_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#location_loss_property').fieldSuccessState();
				}  

				if($('#contact_no_property').val() == ""){
					$("#contact_no_property").after("<div class='validation_contact_no_property v-error-msg'>Contact No. is empty</div>");    
					$('#contact_no_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#contact_no_property').fieldSuccessState();
				}  

				if($('#email_address_property').val() == ""){
					$("#email_address_property").after("<div class='validation_email_address_property v-error-msg'>Email address is empty</div>");    
					$('#email_address_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     			
					if(IsEmail($('#email_address_property').val())==false){
						$("#email_address_property").after("<div class='validation_email_address_property v-error-msg'>Invalid format</div>");    
						$("#email_address_property").fieldErrorState();   
						errornumber = 1;  
					}else{
						$('#email_address_property').fieldSuccessState();
					}   	     			
					
				} 
	     	}	    

			if(clmspropertycurrent == 2){

				$(".validation_relate_accident_property").remove();
				$(".validation_relate_accident_property_check_error").remove(); 
				$(".validation_relate_accident_property_check_success").remove();

				$(".validation_morgaged_to_property").remove();
				$(".validation_morgaged_to_property_check_error").remove(); 
				$(".validation_morgaged_to_property_check_success").remove();

				if($('#morgaged_to_property').val() == ""){
					$("#morgaged_to_property").after("<div class='validation_morgaged_to_property v-error-msg'>The account has been mortgaged to is empty</div>");    
					$('#morgaged_to_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#morgaged_to_property').fieldSuccessState();
				} 

				if($('#relate_accident_property').val() == ""){
					$("#relate_accident_property").after("<div class='validation_relate_accident_property v-error-msg'>Is the damage directly related to the accident is empty</div>");    
					$('#relate_accident_property').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#relate_accident_property').fieldSuccessState();
				} 

				if($('input[name=hd_claim_property_same_insured]').val() == "no" || $('input[name=hd_claim_property_same_insured]').val() == "yes"){
					$("#lbl_claim_property_same_insured").attr('style',  'color:#373737');
					$("#claim_property_same_insured_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_property_same_insured_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_property_same_insured]').val() == "yes"){
						document.getElementById("claim_property_same_insured_yes").style.background='#008080';
						document.getElementById("claim_property_same_insured_yes").style.color ='#ffffff';
						document.getElementById("claim_property_same_insured_no").style.background='#C0C0C0';
						document.getElementById("claim_property_same_insured_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_property_same_insured_no").style.background='#008080';
						document.getElementById("claim_property_same_insured_no").style.color ='#ffffff';
						document.getElementById("claim_property_same_insured_yes").style.background='#C0C0C0';
						document.getElementById("claim_property_same_insured_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_property_same_insured").attr('style',  'color:#CF3C4B');
					$("#claim_property_same_insured_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_property_same_insured_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_property_prem_paid]').val() == "no" || $('input[name=hd_claim_property_prem_paid]').val() == "yes"){
					$("#lbl_claim_property_prem_paid").attr('style',  'color:#373737');
					$("#claim_property_prem_paid_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_property_prem_paid_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_property_prem_paid]').val() == "yes"){
						document.getElementById("claim_property_prem_paid_yes").style.background='#008080';
						document.getElementById("claim_property_prem_paid_yes").style.color ='#ffffff';
						document.getElementById("claim_property_prem_paid_no").style.background='#C0C0C0';
						document.getElementById("claim_property_prem_paid_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_property_prem_paid_no").style.background='#008080';
						document.getElementById("claim_property_prem_paid_no").style.color ='#ffffff';
						document.getElementById("claim_property_prem_paid_yes").style.background='#C0C0C0';
						document.getElementById("claim_property_prem_paid_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_property_prem_paid").attr('style',  'color:#CF3C4B');
					$("#claim_property_prem_paid_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_property_prem_paid_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_property_within_inception]').val() == "no" || $('input[name=hd_claim_property_within_inception]').val() == "yes"){
					$("#lbl_claim_property_within_inception").attr('style',  'color:#373737');
					$("#claim_property_within_inception_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_property_within_inception_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_property_within_inception]').val() == "yes"){
						document.getElementById("claim_property_within_inception_yes").style.background='#008080';
						document.getElementById("claim_property_within_inception_yes").style.color ='#ffffff';
						document.getElementById("claim_property_within_inception_no").style.background='#C0C0C0';
						document.getElementById("claim_property_within_inception_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_property_within_inception_no").style.background='#008080';
						document.getElementById("claim_property_within_inception_no").style.color ='#ffffff';
						document.getElementById("claim_property_within_inception_yes").style.background='#C0C0C0';
						document.getElementById("claim_property_within_inception_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_property_within_inception").attr('style',  'color:#CF3C4B');
					$("#claim_property_within_inception_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_property_within_inception_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_property_risk_insured]').val() == "no" || $('input[name=hd_claim_property_risk_insured]').val() == "yes"){
					$("#lbl_claim_property_risk_insured").attr('style',  'color:#373737');
					$("#claim_property_risk_insured_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_property_risk_insured_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_property_risk_insured]').val() == "yes"){
						document.getElementById("claim_property_risk_insured_yes").style.background='#008080';
						document.getElementById("claim_property_risk_insured_yes").style.color ='#ffffff';
						document.getElementById("claim_property_risk_insured_no").style.background='#C0C0C0';
						document.getElementById("claim_property_risk_insured_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_property_risk_insured_no").style.background='#008080';
						document.getElementById("claim_property_risk_insured_no").style.color ='#ffffff';
						document.getElementById("claim_property_risk_insured_yes").style.background='#C0C0C0';
						document.getElementById("claim_property_risk_insured_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_property_risk_insured").attr('style',  'color:#CF3C4B');
					$("#claim_property_risk_insured_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_property_risk_insured_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_property_morgagee]').val() == "no" || $('input[name=hd_claim_property_morgagee]').val() == "yes"){
					$("#lbl_claim_property_morgagee").attr('style',  'color:#373737');
					$("#claim_property_morgagee_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_property_morgagee_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_property_morgagee]').val() == "yes"){
						document.getElementById("claim_property_morgagee_yes").style.background='#008080';
						document.getElementById("claim_property_morgagee_yes").style.color ='#ffffff';
						document.getElementById("claim_property_morgagee_no").style.background='#C0C0C0';
						document.getElementById("claim_property_morgagee_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_property_morgagee_no").style.background='#008080';
						document.getElementById("claim_property_morgagee_no").style.color ='#ffffff';
						document.getElementById("claim_property_morgagee_yes").style.background='#C0C0C0';
						document.getElementById("claim_property_morgagee_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_property_morgagee").attr('style',  'color:#CF3C4B');
					$("#claim_property_morgagee_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_property_morgagee_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 
			}
			if(errornumber == 1){
	 			return false;
	 		}
			clmspropertybacks.show();	
			widgetclmsproperty.show(); 			
			widgetclmsproperty.not(':eq('+(clmspropertycurrent++)+')').hide();


			setProgressclmsproperty(clmspropertycurrent); 
		} 		
		hideButtonsclmsproperty(clmspropertycurrent); 	
	});
	//pa
	btnnextclmspa.click(function(){
		if(clmspacurrent < widgetclmspa.length) {
	    	//coverage	
	    	errornumber = 0; 	
			if(clmspacurrent == 1){
				$(".validation_policyNo_pa").remove();
				$(".validation_policyNo_pa_check_error").remove(); 
				$(".validation_policyNo_pa_check_success").remove();

				$(".validation_Loss_date_pa").remove();
				$(".validation_Loss_date_pa_check_error").remove(); 
				$(".validation_Loss_date_pa_check_success").remove();

				$(".validation_Loss_time_pa").remove();
				$(".validation_Loss_time_pa_check_error").remove(); 
				$(".validation_Loss_time_pa_check_success").remove();

				$(".validation_location_loss_pa").remove();
				$(".validation_location_loss_pa_check_error").remove(); 
				$(".validation_location_loss_pa_check_success").remove();

				$(".validation_contact_no_pa").remove();
				$(".validation_contact_no_pa_check_error").remove(); 
				$(".validation_contact_no_pa_check_success").remove();

				$(".validation_email_address_pa").remove();
				$(".validation_email_address_pa_check_error").remove(); 
				$(".validation_email_address_pa_check_success").remove();

				
				if($('#policyNo_pa').val() == ""){
					$("#policyNo_pa").after("<div class='validation_policyNo_pa v-error-msg'>Enter Your Policy No. is empty</div>");    
					$('#policyNo_pa').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#policyNo_pa').fieldSuccessState();
				}   

				if($('#Loss_date_pa').val() == ""){
					$("#Loss_date_pa").after("<div class='validation_Loss_date_pa v-error-msg'>Date of Loss is empty</div>");    
					$('#Loss_date_pa').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#Loss_date_pa').fieldSuccessState();
				}  

				if($('#Loss_time_pa').val() == ""){
					$("#Loss_time_pa").after("<div class='validation_Loss_time_pa v-error-msg'>Estimate Loss Time is empty</div>");    
					$('#Loss_time_pa').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#Loss_time_pa').fieldSuccessState();
				}  

				if($('#location_loss_pa').val() == ""){
					$("#location_loss_pa").after("<div class='validation_location_loss_pa v-error-msg'>Where the accident happened is empty</div>");    
					$('#location_loss_pa').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#location_loss_pa').fieldSuccessState();
				} 

				if($('#contact_no_pa').val() == ""){
					$("#contact_no_pa").after("<div class='validation_contact_no_pa v-error-msg'>Contact No. is empty</div>");    
					$('#contact_no_pa').fieldErrorState();
					 errornumber = 1;           
				}else{	     				     			
					$('#contact_no_pa').fieldSuccessState();
				}  

				if($('#email_address_pa').val() == ""){
					$("#email_address_pa").after("<div class='validation_email_address_pa v-error-msg'>Email address is empty</div>");    
					$('#email_address_pa').fieldErrorState();
					 errornumber = 1;           
				}else{	     			
					if(IsEmail($('#email_address_pa').val())==false){
						$("#email_address_pa").after("<div class='validation_email_address_pa v-error-msg'>Invalid format</div>");    
						$("#email_address_pa").fieldErrorState();   
						errornumber = 1;  
					}else{
						$('#email_address_pa').fieldSuccessState();
					}   	     			
					
				}  
	     	}
			if(clmspacurrent == 2){
				if($('input[name=hd_claim_pa_same_insured]').val() == "no" || $('input[name=hd_claim_pa_same_insured]').val() == "yes"){
					$("#lbl_claim_pa_same_insured").attr('style',  'color:#373737');
					$("#claim_pa_same_insured_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_pa_same_insured_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_pa_same_insured]').val() == "yes"){
						document.getElementById("claim_pa_same_insured_yes").style.background='#008080';
						document.getElementById("claim_pa_same_insured_yes").style.color ='#ffffff';
						document.getElementById("claim_pa_same_insured_no").style.background='#C0C0C0';
						document.getElementById("claim_pa_same_insured_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_pa_same_insured_no").style.background='#008080';
						document.getElementById("claim_pa_same_insured_no").style.color ='#ffffff';
						document.getElementById("claim_pa_same_insured_yes").style.background='#C0C0C0';
						document.getElementById("claim_pa_same_insured_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_pa_same_insured").attr('style',  'color:#CF3C4B');
					$("#claim_pa_same_insured_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_pa_same_insured_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_pa_within_inception]').val() == "no" || $('input[name=hd_claim_pa_within_inception]').val() == "yes"){
					$("#lbl_claim_pa_within_inception").attr('style',  'color:#373737');
					$("#claim_pa_within_inception_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_pa_within_inception_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_pa_within_inception]').val() == "yes"){
						document.getElementById("claim_pa_within_inception_yes").style.background='#008080';
						document.getElementById("claim_pa_within_inception_yes").style.color ='#ffffff';
						document.getElementById("claim_pa_within_inception_no").style.background='#C0C0C0';
						document.getElementById("claim_pa_within_inception_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_pa_within_inception_no").style.background='#008080';
						document.getElementById("claim_pa_within_inception_no").style.color ='#ffffff';
						document.getElementById("claim_pa_within_inception_yes").style.background='#C0C0C0';
						document.getElementById("claim_pa_within_inception_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_pa_within_inception").attr('style',  'color:#CF3C4B');
					$("#claim_pa_within_inception_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_pa_within_inception_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 
				
				if($('input[name=hd_claim_pa_prem_paid]').val() == "no" || $('input[name=hd_claim_pa_prem_paid]').val() == "yes"){
					$("#lbl_claim_pa_prem_paid").attr('style',  'color:#373737');
					$("#claim_pa_prem_paid_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_pa_prem_paid_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_pa_prem_paid]').val() == "yes"){
						document.getElementById("claim_pa_prem_paid_yes").style.background='#008080';
						document.getElementById("claim_pa_prem_paid_yes").style.color ='#ffffff';
						document.getElementById("claim_pa_prem_paid_no").style.background='#C0C0C0';
						document.getElementById("claim_pa_prem_paid_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_pa_prem_paid_no").style.background='#008080';
						document.getElementById("claim_pa_prem_paid_no").style.color ='#ffffff';
						document.getElementById("claim_pa_prem_paid_yes").style.background='#C0C0C0';
						document.getElementById("claim_pa_prem_paid_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_pa_prem_paid").attr('style',  'color:#CF3C4B');
					$("#claim_pa_prem_paid_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_pa_prem_paid_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_pa_required_doc]').val() == "no" || $('input[name=hd_claim_pa_required_doc]').val() == "yes"){
					$("#lbl_claim_pa_required_doc").attr('style',  'color:#373737');
					$("#claim_pa_required_doc_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_pa_required_doc_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_pa_required_doc]').val() == "yes"){
						document.getElementById("claim_pa_required_doc_yes").style.background='#008080';
						document.getElementById("claim_pa_required_doc_yes").style.color ='#ffffff';
						document.getElementById("claim_pa_required_doc_no").style.background='#C0C0C0';
						document.getElementById("claim_pa_required_doc_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_pa_required_doc_no").style.background='#008080';
						document.getElementById("claim_pa_required_doc_no").style.color ='#ffffff';
						document.getElementById("claim_pa_required_doc_yes").style.background='#C0C0C0';
						document.getElementById("claim_pa_required_doc_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_pa_required_doc").attr('style',  'color:#CF3C4B');
					$("#claim_pa_required_doc_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_pa_required_doc_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_pa_not_submitted]').val() == "no" || $('input[name=hd_claim_pa_not_submitted]').val() == "yes"){
					$("#lbl_claim_pa_not_submitted").attr('style',  'color:#373737');
					$("#claim_pa_not_submitted_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_pa_not_submitted_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_pa_not_submitted]').val() == "yes"){
						document.getElementById("claim_pa_not_submitted_yes").style.background='#008080';
						document.getElementById("claim_pa_not_submitted_yes").style.color ='#ffffff';
						document.getElementById("claim_pa_not_submitted_no").style.background='#C0C0C0';
						document.getElementById("claim_pa_not_submitted_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_pa_not_submitted_no").style.background='#008080';
						document.getElementById("claim_pa_not_submitted_no").style.color ='#ffffff';
						document.getElementById("claim_pa_not_submitted_yes").style.background='#C0C0C0';
						document.getElementById("claim_pa_not_submitted_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_pa_not_submitted").attr('style',  'color:#CF3C4B');
					$("#claim_pa_not_submitted_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_pa_not_submitted_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 

				if($('input[name=hd_claim_pa_checklist_accomplished]').val() == "no" || $('input[name=hd_claim_pa_checklist_accomplished]').val() == "yes"){
					$("#lbl_claim_pa_checklist_accomplished").attr('style',  'color:#373737');
					$("#claim_pa_checklist_accomplished_yes").attr('style',  'border: 1px solid #C0C0C0;');
					$("#claim_pa_checklist_accomplished_no").attr('style',  'border: 1px solid #C0C0C0;');
					if($('input[name=hd_claim_pa_checklist_accomplished]').val() == "yes"){
						document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#008080';
						document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#ffffff';
						document.getElementById("claim_pa_checklist_accomplished_no").style.background='#C0C0C0';
						document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#000000';  
					}else{
						document.getElementById("claim_pa_checklist_accomplished_no").style.background='#008080';
						document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#ffffff';
						document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#C0C0C0';
						document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#000000'; 
					}
				}else{	 
					$("#lbl_claim_pa_checklist_accomplished").attr('style',  'color:#CF3C4B');
					$("#claim_pa_checklist_accomplished_yes").attr('style',  'border: 1px solid #CF3C4B;');
					$("#claim_pa_checklist_accomplished_no").attr('style',  'border: 1px solid #CF3C4B;');
					 errornumber = 1;           
				} 
			}

			if(errornumber == 1){
	 			return false;
	 		}
			clmspabacks.show();	
			widgetclmspa.show(); 			
			widgetclmspa.not(':eq('+(clmspacurrent++)+')').hide();


			setProgressclmspa(clmspacurrent); 
		} 		
		hideButtonsclmspa(clmspacurrent); 	
	});

 
  	// Back button click action 
	
	//motor
  	btnbackclmmotor.click(function(){ 	
		if(currentclmmotor == 5){
		  	$('#nextbutton').css('display','block');
		}	
		if(currentclmmotor == 2){
			$('#claimBack').show(); 
		}
      	if(currentclmmotor > 1){
		    currentclmmotor = currentclmmotor - 2;
		    btnnextclmmotor.trigger('click');
	    }
        hideButtonsclmmotor(currentclmmotor);
   	});		

	//property
	clmspropertybacks.click(function(){ 	
		if(clmspropertycurrent == 5){
		  	$('#nextbuttonclmsproperty').css('display','block');
		}	
		if(clmspropertycurrent == 2){
			$('#claimBack').show(); 
		}
      	if(clmspropertycurrent > 1){
		    clmspropertycurrent = clmspropertycurrent - 2;
		    btnnextclmsproperty.trigger('click');
	    }
        hideButtonsclmsproperty(clmspropertycurrent);
   	});		

	//pa
	clmspabacks.click(function(){ 	
		if(clmspacurrent == 5){
		  	$('#nextbuttonclmspa').css('display','block');
		}	
		if(clmspacurrent == 2){
			$('#claimBack').show(); 
		}
      	if(clmspacurrent > 1){
		    clmspacurrent = clmspacurrent - 2;
		    btnnextclmspa.trigger('click');
	    }
        hideButtonsclmspa(clmspacurrent);
   	});	
});

// Change progress bar action
setProgressclmmotor = function(currstep){
	var percent = parseFloat(100 / widgetclmmotor.length) * currstep;
	percent = percent.toFixed();
	$(".progress-bar-clmmotor")
        .css("width",percent+"%");
        // .html(percent+"%");		
}

setProgressclmsproperty = function(currstep){
	var percent = parseFloat(100 / widgetclmsproperty.length) * currstep;
	percent = percent.toFixed();
	$(".progress-bar-clmmproperty")
        .css("width",percent+"%");
        // .html(percent+"%");		
}

setProgressclmspa = function(currstep){
	var percent = parseFloat(100 / widgetclmspa.length) * currstep;
	percent = percent.toFixed();
	$(".progress-bar-clmmpa")
        .css("width",percent+"%");
        // .html(percent+"%");		
}

// Hide buttons according to the currentclmmotor step
hideButtonsclmmotor = function(currentclmmotor){
	var limit = parseInt(widgetclmmotor.length); 
    
	$(".actionclmmotor").hide();
	
	if(currentclmmotor < limit)btnnextclmmotor.show(); 	
  	if(currentclmmotor > 1){
		$('#claimBack').hide(); 
  		btnnextclmmotor.show();
  		btnbackclmmotor.show();
  	}

	if(currentclmmotor == limit) { btnnextclmmotor.hide();btnback.show(); }
}

hideButtonsclmsproperty = function(clmspropertycurrent){
	var limit = parseInt(widgetclmsproperty.length); 

	$(".actionclmproperty").hide();
	
	clmspropertybacks.hide();
	if(clmspropertycurrent < limit)btnnextclmsproperty.show(); 	
	
  	if(clmspropertycurrent > 1){
		$('#claimBack').hide(); 
  		btnnextclmsproperty.show();
  		clmspropertybacks.show();
  	}

	if(clmspropertycurrent == limit) { btnnextclmsproperty.hide();  }
}

hideButtonsclmspa = function(clmspacurrent){
	var limit = parseInt(widgetclmspa.length); 

	$(".actionclmpa").hide();
	
	clmspabacks.hide();
	if(clmspacurrent < limit)btnnextclmspa.show(); 	
	
  	if(clmspacurrent > 1){
		$('#claimBack').hide(); 
  		btnnextclmspa.show();
  		clmspabacks.show();
  	}

	if(clmspacurrent == limit) { btnnextclmspa.hide();  }
}

function IsEmail(email) {
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regex.test(email)) {
	  return false;
	}else{
	  return true;
	}
  }
