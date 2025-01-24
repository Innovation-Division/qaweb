jQuery(document).ready(function($) {
		jQuery('#BlockUIConfirm').show();
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
		$(this).after('<span class="form-control-feedback fa fa-times-circle" aria-hidden="true"></span>');
	};
	$.fn.fieldSuccessState = function() {
		$(this).closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
		$(this).removeFormControlFeedback();
		$(this).after('<span class="form-control-feedback fa fa-check-circle" aria-hidden="true"></span>');
	};

	$(document).ready(function(){ 
	$(".pwed_select").hide(); 
	$("#PWD_DIV_").hide(); 

	$(".pwed_select_checkbox").hide();  
    $('#checkbox-1').prop('checked', false);
    $('#checkbox-2').prop('checked', false);
    $('#checkbox-3').prop('checked', false);
    $('#checkbox-4').prop('checked', false);
    $('#checkbox-5').prop('checked', false);
	$('#nextbutton').css('display','block');
  	$('#pwd_div_others').css('display','none');
  	$('#agentNameDiv').css('display','none');
	$('#pwd_div').css('display','none');
	$('#pop_warning1').css('display','block');
	$('#pop_warning2').css('display','none');	
	$('#pop_warning1_PWD').css('display','block');
	$('#pop_warning2_PWD').css('display','none');
	$('input[name=pwd_stat]').val("");
	$('input[name=check_agent]').val("");
	$("#occupation_other_personal_info").val("");




    jQuery.ajax({
      	url:'{{url('/')}}' + '/api/covid/getoccupation',
      	method:"GET",
      	data:{ _token:_token}, 
      	success:function(result)
      	{         
            jQuery.each(result, function(key, value){
            	$('#occupation_personal_info').append($('<option>', { 
			        value: value.occupation,
			        text : value.occupation 
			    }));	

	        })       
	      }
	    })

  	var current = 1;
    $('.NoPaste').on("cut copy paste",function(e) {
      e.preventDefault();
   	});
	
	$(".validation_date_of_Birth_personal_info").on('keypress', function (event) {
	    var regex = new RegExp("^[]+$");
	    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	    if (!regex.test(key)) {
	       event.preventDefault();
	       return false;
	    }
	});

	$('input[name=coverage_complete]').val("");
	jQuery('#warning_coverage_package').css("display", "none");
	jQuery('#warning_coverage_no').css("display", "none");
	widget      = $(".step");
	btnnext     = $(".next");
	btnback     = $(".backs"); 
	btnsubmit   = $(".submit");
	btnNew      = $(".NewApplicant");
	btncheck    = $(".CheckCoverage");
	btnAdd      = $(".addApplicant");
	btnNextPage = $(".next_2ndpage");
	btncheck_occ = $("#btn_back_to_applicant_occupation");
	btncheck_pwd = $("#btn_back_to_applicant");
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
	// Next button click action
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

		     		if($('#tel_no_info').val() == ""){
							$("#tel_no_info").after("<div class='validation_tel_no_info v-error-msg'>Telephone Number is empty</div>");    
		     			$('#tel_no_info').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#tel_no_info').fieldSuccessState();
					}  


		     		if($('#contactNo_personal_info').val() == ""){
							$("#contactNo_personal_info").after("<div class='validation_contactNo_personal_info v-error-msg'>Mobile Number is empty</div>");    
		     			$('#contactNo_personal_info').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#contactNo_personal_info').fieldSuccessState();
					}  



		     		if(errornumber == 1){
		     			return false;
		     		}
	     	}	    

	     	if(current == 3){
     		}

	     	if(current == 4){
	     		$(".validation_salutation_personal_info").remove();
     			$(".validation_salutation_personal_info_check_error").remove(); 
     			$(".validation_salutation_personal_info_check_success").remove();

     			$(".validation_suffix_4thpage").remove();
     			$(".validation_suffix_4thpage_check_error").remove(); 
     			$(".validation_suffix_4thpage_check_success").remove();

     			$(".validation_status_4thpage").remove();
     			$(".validation_status_4thpage_check_error").remove(); 
     			$(".validation_status_4thpage_check_success").remove();


     			$(".validation_gender_4thpage").remove();
     			$(".validation_gender_4thpage_check_error").remove(); 
     			$(".validation_gender_4thpage_check_success").remove();

     			$(".validation_placeofbirth_4thpage").remove();
     			$(".validation_placeofbirth_4thpage_check_error").remove(); 
     			$(".validation_placeofbirth_4thpage_check_success").remove();

     			$(".validation_sourceofFunds_4thpage").remove();
     			$(".validation_sourceofFunds_4thpage_check_error").remove(); 
     			$(".validation_sourceofFunds_4thpage_check_success").remove();

     			$(".validation_occupation_4thpage").remove();
     			$(".validation_occupation_4thpage_check_error").remove(); 
     			$(".validation_occupation_4thpage_check_success").remove();

     			$(".validation_tin_4thpage").remove();
     			$(".validation_tin_4thpage_check_error").remove(); 
     			$(".validation_tin_4thpage_check_success").remove();

     			$(".validation_employeer_4thpage").remove();
     			$(".validation_employeer_4thpage_check_error").remove(); 
     			$(".validation_employeer_4thpage_check_success").remove();

     			$(".validation_residence_address").remove();
     			$(".validation_residence_address_check_error").remove(); 
     			$(".validation_residence_address_check_success").remove();

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

     			


					if($('#status_4thpage').val() == ""){
						$("#status_4thpage").after("<div class='validation_status_4thpage v-error-msg'>Status is empty</div>");    
		     			$('#status_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#status_4thpage').fieldSuccessState();
					}  

				
					if($('#gender_4thpage').val() == ""){
						$("#gender_4thpage").after("<div class='validation_gender_4thpage v-error-msg'>Gender is empty</div>");    
		     			$('#gender_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#gender_4thpage').fieldSuccessState();
					}  

					if($('#placeofbirth_4thpage').val() == ""){
						$("#placeofbirth_4thpage").after("<div class='validation_placeofbirth_4thpage v-error-msg'>Place of birth is empty</div>");    
		     			$('#placeofbirth_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#placeofbirth_4thpage').fieldSuccessState();
					}  

					if($('#sourceofFunds_4thpage').val() == ""){
						$("#sourceofFunds_4thpage").after("<div class='validation_sourceofFunds_4thpage v-error-msg'>Source of funds is empty</div>");    
		     			$('#sourceofFunds_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#sourceofFunds_4thpage').fieldSuccessState();
					}  

					if($('#occupation_4thpage').val() == ""){
						$("#occupation_4thpage").after("<div class='validation_occupation_4thpage v-error-msg'>Occupation is empty</div>");    
		     			$('#occupation_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#occupation_4thpage').fieldSuccessState();
					}  

					if($('#tin_4thpage').val() == ""){
						$("#tin_4thpage").after("<div class='validation_tin_4thpage v-error-msg'>TIN no. is empty</div>");    
		     			$('#tin_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#tin_4thpage').fieldSuccessState();
					}  

					if($('#employeer_4thpage').val() == ""){
						$("#employeer_4thpage").after("<div class='validation_employeer_4thpage v-error-msg'>Employeer is empty</div>");    
		     			$('#employeer_4thpage').fieldErrorState();
							 errornumber = 1;           
		     		}else{	     				     			
		     			$('#employeer_4thpage').fieldSuccessState();
					}  

					if($('#residence_address').val() == ""){
						$("#residence_address").after("<div class='validation_residence_address v-error-msg'>Address is empty</div>");    
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
				}

				if(current == 5){
					$('input[name^="relation_bene_5thpage"]').each(function(){
				      if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();     			
				     			errornumber = 1;           
			     		}else{	     				     			
								$('#'+ this.id).fieldSuccessState();     			
						} 
					});


					$('input[name^="name_5thpage"]').each(function(){
				      if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();     			
				     			errornumber = 1;           
			     		}else{	     				     			
								$('#'+ this.id).fieldSuccessState();     			
						} 
					});

					$('input[name^="name_bene_5thpage"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 


					
					$('input[name^="contact_5thpage"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 

					$('input[name^="relation_5thpage"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 

					$('input[name^="bday_5thpage"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 

					$('select[name^="status_5thpage"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 

				


					$('#option_5thpage_label').text('I also declare that I am in good health and that');	 
					$('#option_5thpage_label').css('color', '#373737');	 
					$('#option_5thpage_label_no').css('color', '#373737');	 
					$('#option_5thpage_label_yes').css('color', '#373737');

            if (jQuery("#pwd_no_option").is(":checked") || jQuery("#pwd_yes_option").is(":checked")) {
            	if(jQuery("#pwd_no_option").is(":checked")) {
			                	$(".validation_type_of_disability").remove();
										 		$(".validation_type_of_disability_check_error").remove(); 
										 		$(".validation_type_of_disability_check_success").remove();

												if($('#type_of_disability').val() == ""){
													$("#type_of_disability").after("<div class='validation_type_of_disability v-error-msg'>Type of Disabililty is empty</div>");    
										 			$('#type_of_disability').fieldErrorState();
													errornumber = 1;           
										 		}else{	     				     			
										 			$('#type_of_disability').fieldSuccessState();
												} 

												$(".validation_year_disablement").remove();
										 		$(".validation_year_disablement_check_error").remove(); 
										 		$(".validation_year_disablement_check_success").remove();

												if($('#year_disablement').val() == ""){
													$("#year_disablement").after("<div class='validation_year_disablement v-error-msg'>Year of Disablement is empty</div>");    
										 			$('#year_disablement').fieldErrorState();
													errornumber = 1;           
										 		}else{	     				     			
										 			$('#year_disablement').fieldSuccessState();
												} 

												$(".validation_cause_of_disability").remove();
										 		$(".validation_cause_of_disability_check_error").remove(); 
										 		$(".validation_cause_of_disability_check_success").remove();

												if($('#cause_of_disability').val() == ""){
													$("#cause_of_disability").after("<div class='validation_cause_of_disability v-error-msg'>Cause of Disability is empty</div>");    
										 			$('#cause_of_disability').fieldErrorState();
													errornumber = 1;           
										 		}else{	     				     			
										 			$('#cause_of_disability').fieldSuccessState();
												} 
	                	}
              } else {
												errornumber = 1;           
												$('#option_5thpage_label').text('I also declare that I am in good health and that*');	 
												$('#option_5thpage_label').css('color', '#b94a48');	 
												$('#option_5thpage_label_no').css('color', '#b94a48');	 
												$('#option_5thpage_label_yes').css('color', '#b94a48');	 
              }

          name_bene_5thpage = $("input[name='name_bene_5thpage[]']").map(function(){return $(this).val();}).get();
	    		relation_bene_5thpage = $("input[name='relation_bene_5thpage[]']").map(function(){return $(this).val();}).get();

	    		name_5thpage = $("input[name='name_5thpage[]']").map(function(){return $(this).val();}).get();
	    		contact_5thpage = $("input[name='contact_5thpage[]']").map(function(){return $(this).val();}).get();
	    		relation_5thpage = $("input[name='relation_5thpage[]']").map(function(){return $(this).val();}).get();
	    		bday_5thpage = $("input[name='bday_5thpage[]']").map(function(){return $(this).val();}).get();
	    		status_5thpage = $("select[name='status_5thpage[]']").map(function(){return $(this).val();}).get();


	    		$("#tabl_summary_bene tfoot").empty();
	    		$("#tabl_summary_emargency tfoot").empty();
	    		numBene = 0;
	    		numCon = 0;
		     	for (let i = 0; i < name_bene_5thpage.length; i++) {
		     			numBene = numBene + 1;
					  	$("#tabl_summary_bene tfoot").append('\
					  	<tr>\
								<td>'+numBene+'</td>\
								<td>'+name_bene_5thpage[i]+'</td>\
								<td>'+relation_bene_5thpage[i]+'</td>\
							</tr>');
				  }
				  for (let i = 0; i < name_5thpage.length; i++) {
		     			numCon = numCon + 1;
					  	$("#tabl_summary_emargency tfoot").append('\
					  	<tr>\
								<td>'+numCon+'</td>\
								<td>'+name_5thpage[i]+'</td>\
								<td>'+contact_5thpage[i]+'</td>\
								<td>'+relation_5thpage[i]+'</td>\
								<td>'+bday_5thpage[i]+'</td>\
								<td>'+status_5thpage[i]+'</td>\
							</tr>');
				  }
				}

				var include_agent = $('input[name="include_agent"]:checked').val();
				if(include_agent == "Yes"){
						$(".validation_agent_name").remove();
				 		$(".validation_agent_name_check_error").remove(); 
				 		$(".validation_agent_name_check_success").remove();

						if($('#agent_name').val() == ""){
							$("#agent_name").after("<div class='validation_agent_name v-error-msg'>Agent name is empty</div>");    
				 			$('#agent_name').fieldErrorState();
							errornumber = 1;           
				 		}else{	     				     			
				 			$('#agent_name').fieldSuccessState();
						} 
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


	btnNextPage.click(function(){
    errornumber = 0; 
 		var _token = jQuery('input[name="_token"]').val();
    var url = jQuery('input[name="url"]').val();
		var promo = "";
		promo = $('#promo').val();
		$("#package_quote_summny").text($('#package').val());
		$("#package_quote_summny_final").text($('#package').val());
		$("#modeoftranspo_quote_summny").text( $('input[name="mode_transpo"]:checked').val());
		$("#modeoftranspo_quote_summny_final").text( $('input[name="mode_transpo"]:checked').val());
		var errornumber = 0;
		if(promo != ""){
			url = url  + '/api/get-quote/domestic-insurance/promo';
		    $.ajax({
		        url: url,
		        method:"GET",
		        data:{ _token:_token,promo:promo},
		        success:function(result){
		        	
		        	$(".validation_departure_date_itinerary").remove();
			 		$(".validation_departure_date_itinerary_check_error").remove(); 
			 		$(".validation_departure_date_itinerary_check_success").remove();

			 		$(".validation_return_date_itinerary").remove();
			 		$(".validation_return_date_itinerary_check_error").remove(); 
			 		$(".validation_return_date_itinerary_check_success").remove();

					if($('#departure_date_itinerary').val() == ""){
						$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>From place of residence is empty</div>");    
			 			$('#departure_date_itinerary').fieldErrorState();
						errornumber = 1;           
			 		}else{	     				     			
			 			$('#departure_date_itinerary').fieldSuccessState();
					} 

					if($('#return_date_itinerary').val() == ""){
						$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>To place of residence is empty</div>");    
			 			$('#return_date_itinerary').fieldErrorState();
						errornumber = 1;           
			 		}else{	     				     			
			 			$('#return_date_itinerary').fieldSuccessState();
					} 


					var from = $("#departure_date_itinerary").val();
					var to = $("#return_date_itinerary").val();

					if(Date.parse(from) > Date.parse(to)){
						errornumber = 1;  
					  //$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");    
			 			//$('#departure_date_itinerary').fieldErrorState();
						$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>Return date should later than the departure date1</div>");    
						$('#return_date_itinerary').fieldErrorState();
						
					}
						var noofdays = datediff(parseDate(from), parseDate(to));
						if(noofdays > 59){
							errornumber = 1;  ``
							$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>Date range should not exceed to 60 days</div>");    
							$('#return_date_itinerary').fieldErrorState();
						}

					$('select[name^="destination_itinerary"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 

					$('select[name^="package"]').each(function(){
					    if($('#'+ this.id).val() == ""){
				 			$('#'+ this.id).fieldErrorState();    			
				 			errornumber = 1;           
				 		}else{	     				     			
				 			$('#'+ this.id).fieldSuccessState();    			
						} 
					}); 


					if( $('#air').is(':checked') || $('#non_air').is(':checked') ){
						$('#mode_of_transspo').text('Mode of Transportation');	 
						$('#mode_of_transspo_span').css('color', '#373737');	 
						$('#mode_of_transspo').css('color', '#373737');	 
						$('#transpo_air_air').css('color', '#373737');	 
						$('#transpo_nonair_air').css('color', '#373737');
					}else{
						errornumber = 1;
						$('#mode_of_transspo').text('Mode of Transportation*');	 
						$('#mode_of_transspo_span').css('color', '#b94a48');	 
						$('#mode_of_transspo').css('color', '#b94a48');	 
						$('#transpo_air_air').css('color', '#b94a48');	 
						$('#transpo_nonair_air').css('color', '#b94a48');	 
					}

					if( $('#covid_yes').is(':checked') || $('#covid_no').is(':checked') ){
						$('#covid_label_title').text('COVID-19 Assist Coverage');	 
						$('#covid_label_title_span').css('color', '#373737');	 
						$('#covid_label_title').css('color', '#373737');	 
						$('#covid_yes_label').css('color', '#373737');	 
						$('#covid_no_label').css('color', '#373737');	
					}else{
						errornumber = 1;
						$('#covid_label_title').text('COVID-19 Assist Coverage*');	 
						$('#covid_label_title_span').css('color', '#b94a48');	 
						$('#covid_label_title').css('color', '#b94a48');	 
						$('#covid_yes_label').css('color', '#b94a48');	 
						$('#covid_no_label').css('color', '#b94a48');	 
					}


		        	if(result.length == 0){
		        		$(".validation_promo").remove();
				 		$(".validation_promo_check_error").remove(); 
				 		$(".validation_promo_check_success").remove();
				 		$("#promo").after("<div class='validation_promo v-error-msg'>Invalid promo code</div>");    
				 		$('#promo').fieldErrorState();
				 		return false;
		        	}else{
		        		$('#promo').fieldSuccessState();
		        		if(errornumber == 1){
				 			return false;
				 		}

				 		var departure_date_itinerary = $('#departure_date_itinerary').val();
						var package = $('#package').val();
						var return_date_itinerary = $('#return_date_itinerary').val();
						var mode_transpo = $('input[name="mode_transpo"]:checked').val();
						var covid = $('input[name="include_covid"]:checked').val();

						

						var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
						noofday = noofday + 1;
						$('#less').text("");
						$('#promo_tr').hide();
						$('#final_promo_tr').hide();
						$('#amountdue_tr').hide();
						$('#final_amountdue_tr').hide();

						destinations ="";
						$('select[name^="destination_itinerary"]').each(function(){
							if( $(this).val() != ""){
								if(destinations == ""){
									destinations =  $(this).val();
								}else{
									destinations = destinations + ', '+ $(this).val();
								}
							}
						});

						const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];


						var d = new Date($('#departure_date_itinerary').val()),
				        month = '' + (d.getMonth()+ 1),
				        day = '' + d.getDate(),
				        year = d.getFullYear();

				        var r = new Date($('#return_date_itinerary').val()),
				        month_r = '' + (r.getMonth()+ 1),
				        day_r = '' + r.getDate(),
				        year_r = r.getFullYear();

				        var q = new Date($('#dateofBirth_personal_info').val()),
				        month_q = '' + (q.getMonth()+ 1),
				        day_q = '' + q.getDate(),
				        year_q = q.getFullYear();


						var departure = monthNames[d.getMonth()]+ ' ' +  day + ', ' + year;
						var returndate = monthNames[r.getMonth()]+ ' ' +  day_r + ', ' + year_r;
						var bday = monthNames[q.getMonth()]+ ' ' +  day_q + ', ' + year_q;

						var bday_newformat = year_q + '-' + month_q + '-' + day_q;
						var departure_newformat = year + '-' + month + '-' + day;
						var return_newformat = year_r + '-' + month_r + '-' + day_r;

						jQuery('input[name="bday_new_format"]').val(bday_newformat);
						jQuery('input[name="departure_new_format"]').val(departure_newformat);
						jQuery('input[name="return_new_format"]').val(return_newformat);

						jQuery('input[name="quote_start_date_all"]').val(departure);
						$('#quote_start_date').text(departure);
						$('#quote_start_date_final').text(departure);

						jQuery('input[name="quote_end_date_all"]').val(returndate);
						$('#quote_end_date').text(returndate);
						$('#quote_end_date_final').text(returndate);


						var quotename = $('#firstName_personal_info').val() + " " + $('#middleName_personal_info').val() +" " + $('#lastName_personal_info').val();
						var quote_tel_no = $('#tel_no_info').val();
						var quote_mobile_no = $('#contactNo_personal_info').val();
						var quote_email = $('#email_personal_info').val();

						$('#fname_4thpage').val($('#firstName_personal_info').val());
						$('#lname_4thpage').val($('#lastName_personal_info').val());
						$('#mname_4thpage').val($('#middleName_personal_info').val());
						$('#dateofbirth_4thpage').val($('#dateofBirth_personal_info').val());
						$('#email_5thpage').val(quote_email);
						$('#tel_no_5thpage').val(quote_tel_no);
						$('#mobile_5thpage').val(quote_mobile_no);

						jQuery('input[name="quote_name_all"]').val(quotename);
						$('#quote_name').text(quotename);
						$('#quote_final_name').text(quotename);


						jQuery('input[name="quote_bday_all"]').val(bday);
						$('#quote_bday').text(bday);
						$('#quote_final_bday').text(bday);

						jQuery('input[name="quote_telno_all"]').val(quote_tel_no);
						$('#quote_telno').text(quote_tel_no);
						$('#quote_final_telno').text(quote_tel_no);

						jQuery('input[name="quote_mobile_no_all"]').val(quote_mobile_no);
						$('#quote_mobile_no').text(quote_mobile_no);
						$('#quote_mobile_final_no').text(quote_mobile_no);

						jQuery('input[name="quote_email_all"]').val(quote_email);
						$('#quote_email').text(quote_email);
						$('#quote_final_email').text(quote_email);


						jQuery('input[name="quoteprovince_all"]').val(destinations);
						$('#quoteprovince').text(destinations);
						$('#quote_final_province').text(destinations);



						var urlwithpromo = jQuery('input[name="url"]').val();
						var urlprem = urlwithpromo  + '/api/get-quote/domestic-insurance/get-prem';
					    $.ajax({
					        url: urlprem,
					        method:"GET",
					        data:{ _token:_token,noofday:noofday,mode_transpo:mode_transpo,package:package},
					        success:function(result)
					        {
				        		$.each(result, function(key, value){
				        					noofdaysorig = value.days;
					        				premium = value.prem;
						        			jQuery('input[name="net_premium_all"]').val(value.prem);
						        			$('#net_premium').text(ReplaceNumberWithCommas(value.prem));

						        			premtax = (premium *2)/100;
								        	premtax_com = premtax.toFixed(2);

						        			jQuery('input[name="premium_tax_all"]').val(premtax_com);
						        			jQuery('input[name="final_premium_tax_all"]').val(premtax_com);
						        			$('#premium_tax').text(ReplaceNumberWithCommas(premtax_com));
						        			$('#final_premium_tax').text(ReplaceNumberWithCommas(premtax_com));

						        			lgt = (parseFloat(value.prem) *0.2)/100;
						        			lgt_com = lgt.toFixed(2);
						        			jQuery('input[name="lgt_all"]').val(lgt);
						        			$('#lgt').text(ReplaceNumberWithCommas(lgt_com));
						        			$('#final_lgt').text(ReplaceNumberWithCommas(lgt_com));

						        			si = 0;
				        			if(package == "Packet"){
				        				si = 250000.00;
				        				prem_one = 250000.00;
				        				prem_two = 25000.00;
				        				prem_three = 12500.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').show();
				        				$('#quote_pro_head').hide();
				        				$('#quote_prime_head').hide();
				        				$('#quote_platinum_head').hide();

				        				$('#quote_packet_content_1').show();
				        				$('#quote_pro_content_1').hide();
				        				$('#quote_prime_content_1').hide();
				        				$('#quote_platinum_content_1').hide();

				        				$('#quote_packet_content_2').show();
				        				$('#quote_pro_content_2').hide();
				        				$('#quote_prime_content_2').hide();
				        				$('#quote_platinum_content_2').hide();

				        				$('#final_quote_packet_head').show();
				        				$('#final_quote_pro_head').hide();
				        				$('#final_quote_prime_head').hide();
				        				$('#final_quote_platinum_head').hide();

				        				$('#final_quote_packet_content_1').show();
				        				$('#final_quote_pro_content_1').hide();
				        				$('#final_quote_prime_content_1').hide();
				        				$('#final_quote_platinum_content_1').hide();

				        				$('#final_quote_packet_content_2').show();
				        				$('#final_quote_pro_content_2').hide();
				        				$('#final_quote_prime_content_2').hide();
				        				$('#final_quote_platinum_content_2').hide();

				        			}else if(package == "Pro"){
				        				si = 500000.00;
				        				prem_one = 500000.00;
				        				prem_two = 50000.00;
				        				prem_three = 25000.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').hide();
				        				$('#quote_pro_head').show();
				        				$('#quote_prime_head').hide();
				        				$('#quote_platinum_head').hide();

				        				$('#quote_packet_content_1').hide();
				        				$('#quote_pro_content_1').show();
				        				$('#quote_prime_content_1').hide();
				        				$('#quote_platinum_content_1').hide();

				        				$('#quote_packet_content_2').hide();
				        				$('#quote_pro_content_2').show();
				        				$('#quote_prime_content_2').hide();
				        				$('#quote_platinum_content_2').hide();

				        				$('#final_quote_packet_head').hide();
				        				$('#final_quote_pro_head').show();
				        				$('#final_quote_prime_head').hide();
				        				$('#final_quote_platinum_head').hide();

				        				$('#final_quote_packet_content_1').hide();
				        				$('#final_quote_pro_content_1').show();
				        				$('#final_quote_prime_content_1').hide();
				        				$('#final_quote_platinum_content_1').hide();

				        				$('#final_quote_packet_content_2').hide();
				        				$('#final_quote_pro_content_2').show();
				        				$('#final_quote_prime_content_2').hide();
				        				$('#final_quote_platinum_content_2').hide();

			        				}else if(package == "Prime"){
				        				si = 750000.00;
				        				prem_one = 750000.00;
				        				prem_two = 75000.00;
				        				prem_three = 37500.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').hide();
				        				$('#quote_pro_head').hide();
				        				$('#quote_prime_head').show();
				        				$('#quote_platinum_head').hide();

				        				$('#quote_packet_content_1').hide();
				        				$('#quote_pro_content_1').hide();
				        				$('#quote_prime_content_1').show();
				        				$('#quote_platinum_content_1').hide();

				        				$('#quote_packet_content_2').hide();
				        				$('#quote_pro_content_2').hide();
				        				$('#quote_prime_content_2').show();
				        				$('#quote_platinum_content_2').hide();

				        				$('#final_quote_packet_head').hide();
				        				$('#final_quote_pro_head').hide();
				        				$('#final_quote_prime_head').show();
				        				$('#final_quote_platinum_head').hide();

				        				$('#final_quote_packet_content_1').hide();
				        				$('#final_quote_pro_content_1').hide();
				        				$('#final_quote_prime_content_1').show();
				        				$('#final_quote_platinum_content_1').hide();

				        				$('#final_quote_packet_content_2').hide();
				        				$('#final_quote_pro_content_2').hide();
				        				$('#final_quote_prime_content_2').show();
				        				$('#final_quote_platinum_content_2').hide();

				        			}else{
				        				si = 1000000.00;
				        				prem_one = 1000000.00;
				        				prem_two = 100000.00;
				        				prem_three = 50000.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').hide();
				        				$('#quote_pro_head').hide();
				        				$('#quote_prime_head').hide();
				        				$('#quote_platinum_head').show();

				        				$('#quote_packet_content_1').hide();
				        				$('#quote_pro_content_1').hide();
				        				$('#quote_prime_content_1').hide();
				        				$('#quote_platinum_content_1').show();

				        				$('#quote_packet_content_2').hide();
				        				$('#quote_pro_content_2').hide();
				        				$('#quote_prime_content_2').hide();
				        				$('#quote_platinum_content_2').show();

				        				$('#final_quote_packet_head').hide();
				        				$('#final_quote_pro_head').hide();
				        				$('#final_quote_prime_head').hide();
				        				$('#final_quote_platinum_head').show();

				        				$('#final_quote_packet_content_1').hide();
				        				$('#final_quote_pro_content_1').hide();
				        				$('#final_quote_prime_content_1').hide();
				        				$('#final_quote_platinum_content_1').show();

				        				$('#final_quote_packet_content_2').hide();
				        				$('#final_quote_pro_content_2').hide();
				        				$('#final_quote_prime_content_2').hide();
				        				$('#final_quote_platinum_content_2').show();

				        			}

						        			mode_transpos = $('input[name="mode_transpo"]:checked').val();
						        			if(mode_transpos == "Air Plan"){
						        				$('#del_tr').show();
						        				$('#bag_tr').show();
						        				$('#com_tr').show();
						        				$('#del_tr_final').show();
						        				$('#bag_tr_final').show();
						        				$('#com_tr_final').show();
						        			}else{
						        				$('#del_tr').hide();
						        				$('#bag_tr').hide();
						        				$('#com_tr').hide();
						        				$('#del_tr_final').hide();
						        				$('#bag_tr_final').hide();
						        				$('#com_tr_final').hide();
						        			}
						        			jQuery('input[name="ac_dis_all"]').val(prem_one);
						        			$('#ac_dis').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));
						        			$('#ac_dis_final').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));

						        			jQuery('input[name="ac_bur_benefits_all"]').val(prem_two);
						        			$('#ac_bur_benefits').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));
						        			$('#ac_bur_benefits_final').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));

						        			jQuery('input[name="ac_med_reim_all"]').val(prem_two);
						        			$('#ac_med_reim').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));
						        			$('#ac_med_reim_final').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));

						        			jQuery('input[name="umprov_mur_all"]').val(prem_one);
						        			$('#umprov_mur').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));
						        			$('#umprov_mur_final').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));

						        			jQuery('input[name="travel_1__all"]').val(prem_one);
						        			$('#travel_1_').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));
						        			$('#travel_1_final').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));

						        			jQuery('input[name="travel_2__all"]').val(prem_three);
						        			$('#travel_2_').text(ReplaceNumberWithCommas(prem_three.toFixed(2)));
						        			$('#travel_2_final').text(ReplaceNumberWithCommas(prem_three.toFixed(2)));

						        			jQuery('input[name="travel_3__all"]').val(prem_four);
						        			$('#travel_3_').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));
						        			$('#travel_3_final').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));

						        			jQuery('input[name="travel_7__all"]').val(prem_four);
						        			$('#travel_7_').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));
						        			$('#travel_7_final').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));

						        			jQuery('input[name="travel_4__all"]').val(prem_four);
						        			$('#travel_4_').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));
						        			$('#travel_4_final').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));


						        			dst = 0;
						        			if(si <= 100000){
						        				dst = 0.00;
						        			}else if(si > 100000 && si <= 300000){
						        				dst = 20.00;
						        			}else if(si > 300000 && si <= 500000){
														dst = 50.00;
						        			}else if(si > 500000 && si <= 750000){
														dst = 100.00;
						        			}else if(si > 750000 && si <= 1000000){
														dst = 150.00;
						        			}else{
														dst = 200.00;
						        			}
						        			jQuery('#withcovid').hide();
						        			jQuery('#withcovid_final').hide();
						        			jQuery('input[name="doc_stamp_all"]').val(dst);
						        			jQuery('input[name="final_doc_stamp_all"]').val(dst);
						        			$('#doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));
						        			$('#final_doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));

						        			due = parseFloat(value.prem) + premtax + dst + lgt;

						        			jQuery('input[name="total_amount_due_all"]').val(due);
						        			jQuery('input[name="final_total_amount_due_all"]').val(due);
						        			$('#total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));
						        			$('#final_total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));

						        			jQuery('input[name="total_amount_all"]').val(due);
						        			jQuery('input[name="final_total_amount_all"]').val(due);
						        			$('#total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));
						        			$('#final_total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));
								
							        if(covid == "Yes"){
				        				  urlpremcovid = urlwithpromo  + '/api/get-quote/domestic-insurance/get-prem-covid';
										    	$.ajax({
										        url: urlpremcovid,
										        method:"GET",
										        data:{ _token:_token,noofdaysorig:noofdaysorig,package:package},
										        error: function(data){
							                  var errors = data.responseJSON;
							                    //alert(policyType);
							                   jQuery.each(data, function(key, value){
							                    alert(value);
							                    });
							                  }, 
										        success:function(result)
										        {
										        	$.each(result, function(key, value){
																jQuery('#withcovid').show();
																jQuery('#withcovid_final').show();

																premium = parseFloat(premium) + parseFloat(value.prem);
																jQuery('input[name="covid_amount"]').val(value.prem);
																			

																jQuery('input[name="net_premium_all"]').val(premium);
																jQuery('input[name="final_net_premium_all"]').val(premium);
									        			$('#net_premium').text(ReplaceNumberWithCommas(premium));
									        			$('#final_net_premium').text(ReplaceNumberWithCommas(premium));

									        			premtax = (parseFloat(premium) *2)/100;
									        			premtax_com = premtax.toFixed(2);
									        			jQuery('input[name="premium_tax_all"]').val(premtax_com);
									        			jQuery('input[name="final_premium_tax_all"]').val(premtax_com);
									        			$('#premium_tax').text(ReplaceNumberWithCommas(premtax_com));
									        			$('#final_premium_tax').text(ReplaceNumberWithCommas(premtax_com));

									        			lgt = (parseInt(premium) *0.2)/100;
									        			lgt_com = lgt.toFixed(2);
									        			jQuery('input[name="lgt_all"]').val(lgt);
									        			jQuery('input[name="final_lgt_all"]').val(lgt);
									        			$('#lgt').text(ReplaceNumberWithCommas(lgt_com));
									        			$('#final_lgt').text(ReplaceNumberWithCommas(lgt_com));

									        			due = parseFloat(premium) + premtax + dst + lgt;

									        			jQuery('input[name="total_amount_due_all"]').val(due);
									        			jQuery('input[name="final_total_amount_due_all"]').val(due);
									        			$('#total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));
									        			$('#final_total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));

									        			jQuery('input[name="total_amount_all"]').val(due);
									        			jQuery('input[name="final_total_amount_all"]').val(due);
									        			$('#total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));
									        			$('#final_total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));

									        			if(promo != ""){
																	$('#promo_tr').show();
																	$('#final_promo_tr').show();
																	$('#amountdue_tr').show();
																	$('#final_amountdue_tr').show();
								        				  urlpromo = urlwithpromo  + '/api/get-quote/domestic-insurance/promo';
								        				  $.ajax({
														        url: urlpromo,
														        method:"GET",
														        data:{ _token:_token,promo:promo},
														        error: function(data){
											                  var errors = data.responseJSON;
											                    //alert(policyType);
											                   jQuery.each(data, function(key, value){
											                    alert(value);
											                    });
											                  }, 
														        success:function(result)
														        {
														        	$.each(result, function(key, value){
														        		if(value.type == "A"){
														        			dueless = due - parseFloat(value.amount);
														        			less = parseFloat(value.amount);
														        			jQuery('input[name="less_all"]').val(less);
														        			jQuery('input[name="final_less_all"]').val(less);
														        			$('#less').text(ReplaceNumberWithCommas(less.toFixed(2)));
														        			$('#final_less').text(ReplaceNumberWithCommas(less.toFixed(2)));

														        			jQuery('input[name="total_amount_due_all"]').val(dueless);
														        			jQuery('input[name="final_total_amount_due_all"]').val(dueless);
									        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
									        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
														        		}else{
														        			rate = value.rate;
				                               		promotoless =  (due * (parseFloat(rate)/100));
				                               		dueless =  due - parseFloat(promotoless);

				                               		jQuery('input[name="less_all"]').val(rate+"%");
				                               		jQuery('input[name="final_less_all"]').val(rate+"%");
														        			$('#less').text(rate+"%");
														        			$('#final_less').text(rate+"%");

				                               		jQuery('input[name="total_amount_due_all"]').val(dueless);
				                               		jQuery('input[name="final_total_amount_due_all"]').val(dueless);
									        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
									        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
														        		}
																			}) 
														        }
														      });
								        			  }
															}) 
										        }
										      });
				        			  }else{
				        			  	if(promo != ""){
																	$('#final_promo_tr').show();
																	$('#promo_tr').show();
																	$('#amountdue_tr').show();
																	$('#final_amountdue_tr').show();
								        				  urlpromo = urlwithpromo  + '/api/get-quote/domestic-insurance/promo';
								        				  $.ajax({
														        url: urlpromo,
														        method:"GET",
														        data:{ _token:_token,promo:promo},
														        error: function(data){
											                  var errors = data.responseJSON;
											                    //alert(policyType);
											                   jQuery.each(data, function(key, value){
											                    alert(value);
											                    });
											                  }, 
														        success:function(result)
														        {
														        	$.each(result, function(key, value){
														        		if(value.type == "A"){
														        			dueless = due - parseFloat(value.amount);
														        			less = parseFloat(value.amount);
														        			jQuery('input[name="less_all"]').val(less);
														        			jQuery('input[name="final_less_all"]').val(less);
														        			$('#less').text(ReplaceNumberWithCommas(less.toFixed(2)));
														        			$('#final_less').text(ReplaceNumberWithCommas(less.toFixed(2)));

														        			jQuery('input[name="total_amount_due_all"]').val(dueless);
														        			jQuery('input[name="final_total_amount_due_all"]').val(dueless);
									        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
									        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
														        		}else{
														        			rate = value.rate;
				                               		promotoless =  (due * (parseFloat(rate)/100));
				                               		dueless =  due - parseFloat(promotoless);

				                               		jQuery('input[name="less_all"]').val(rate+"%");
				                               		jQuery('input[name="final_less_all"]').val(rate+"%");
														        			$('#less').text(rate+"%");
														        			$('#final_less').text(rate+"%");

				                               		jQuery('input[name="total_amount_due_all"]').val(dueless);
				                               		jQuery('input[name="final_total_amount_due_all"]').val(dueless);
									        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
									        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
														        		}
																			}) 
														        }
														      });
								        			  }
				        			  }

								}) 
					        }
					    })

						widget.show(); 			
						widget.not(':eq('+(current++)+')').hide();
						setProgress(current); 
						hideButtons(current); 	
				 	}
		        	
		        }
			});
		}else{

			$(".validation_departure_date_itinerary").remove();
	 		$(".validation_departure_date_itinerary_check_error").remove(); 
	 		$(".validation_departure_date_itinerary_check_success").remove();

	 		$(".validation_return_date_itinerary").remove();
	 		$(".validation_return_date_itinerary_check_error").remove(); 
	 		$(".validation_return_date_itinerary_check_success").remove();

			if($('#departure_date_itinerary').val() == ""){
				$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>From place of residence is empty</div>");    
	 			$('#departure_date_itinerary').fieldErrorState();
				errornumber = 1;           
	 		}else{	     				     			
	 			$('#departure_date_itinerary').fieldSuccessState();
			} 

			if($('#return_date_itinerary').val() == ""){
				$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>To place of residence is empty</div>");    
	 			$('#return_date_itinerary').fieldErrorState();
				errornumber = 1;           
	 		}else{	     				     			
	 			$('#return_date_itinerary').fieldSuccessState();
			} 


			var from = $("#departure_date_itinerary").val();
			var to = $("#return_date_itinerary").val();

			if(Date.parse(from) > Date.parse(to)){
				errornumber = 1;  
			  //$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");    
	 			//$('#departure_date_itinerary').fieldErrorState();
				$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>Return date should later than the departure date2 </div>");    
				$('#return_date_itinerary').fieldErrorState();
			}

			var noofdays = datediff(parseDate(from), parseDate(to));
			if(noofdays > 59){
				errornumber = 1;  ``
				$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>Date range should not exceed to 60 days</div>");    
				$('#return_date_itinerary').fieldErrorState();
			}


			$('select[name^="destination_itinerary"]').each(function(){
			    if($('#'+ this.id).val() == ""){
		 			$('#'+ this.id).fieldErrorState();    			
		 			errornumber = 1;           
		 		}else{	     				     			
		 			$('#'+ this.id).fieldSuccessState();    			
				} 
			}); 

			$('select[name^="package"]').each(function(){
			    if($('#'+ this.id).val() == ""){
		 			$('#'+ this.id).fieldErrorState();    			
		 			errornumber = 1;           
		 		}else{	     				     			
		 			$('#'+ this.id).fieldSuccessState();    			
				} 
			}); 


			if( $('#air').is(':checked') || $('#non_air').is(':checked') ){
				$('#mode_of_transspo').text('Mode of Transportation');	 
				$('#mode_of_transspo_span').css('color', '#373737');	 
				$('#mode_of_transspo').css('color', '#373737');	 
				$('#transpo_air_air').css('color', '#373737');	 
				$('#transpo_nonair_air').css('color', '#373737');
			}else{
				errornumber = 1;
				$('#mode_of_transspo').text('Mode of Transportation*');	 
				$('#mode_of_transspo_span').css('color', '#b94a48');	 
				$('#mode_of_transspo').css('color', '#b94a48');	 
				$('#transpo_air_air').css('color', '#b94a48');	 
				$('#transpo_nonair_air').css('color', '#b94a48');	 
			}

			if( $('#covid_yes').is(':checked') || $('#covid_no').is(':checked') ){
				$('#covid_label_title').text('COVID-19 Assist Coverage');	 
				$('#covid_label_title_span').css('color', '#373737');	 
				$('#covid_label_title').css('color', '#373737');	 
				$('#covid_yes_label').css('color', '#373737');	 
				$('#covid_no_label').css('color', '#373737');	
			}else{
				errornumber = 1;
				$('#covid_label_title').text('COVID-19 Assist Coverage*');	 
				$('#covid_label_title_span').css('color', '#b94a48');	 
				$('#covid_label_title').css('color', '#b94a48');	 
				$('#covid_yes_label').css('color', '#b94a48');	 
				$('#covid_no_label').css('color', '#b94a48');	 
			}


			if(errornumber == 1){
	 			return false;
	 		}

			departure_date_itinerary = $('#departure_date_itinerary').val();
			package = $('#package').val();
			return_date_itinerary = $('#return_date_itinerary').val();
			mode_transpo = $('input[name="mode_transpo"]:checked').val();
			covid = $('input[name="include_covid"]:checked').val();
			
			var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
			noofday = noofday + 1;
			$('#less').text("");
			$('#promo_tr').hide();
			$('#final_promo_tr').hide();
			$('#amountdue_tr').hide();
			$('#final_amountdue_tr').hide();

			destinations ="";
			$('select[name^="destination_itinerary"]').each(function(){
				if( $(this).val() != ""){
					if(destinations == ""){
						destinations =  $(this).val();
					}else{
						destinations = destinations + ', '+ $(this).val();
					}
				}
			});

			const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];


			var d = new Date($('#departure_date_itinerary').val()),
	        month = '' + (d.getMonth()+ 1),
	        day = '' + d.getDate(),
	        year = d.getFullYear();

	        var r = new Date($('#return_date_itinerary').val()),
	        month_r = '' + (r.getMonth()+ 1),
	        day_r = '' + r.getDate(),
	        year_r = r.getFullYear();

	        var q = new Date($('#dateofBirth_personal_info').val()),
	        month_q = '' + (q.getMonth()+ 1),
	        day_q = '' + q.getDate(),
	        year_q = q.getFullYear();


			departure = monthNames[d.getMonth()]+ ' ' +  day + ', ' + year;
			returndate = monthNames[r.getMonth()]+ ' ' +  day_r + ', ' + year_r;
			bday = monthNames[q.getMonth()]+ ' ' +  day_q + ', ' + year_q;

			var bday_newformat = year_q + '-' + month_q + '-' + day_q;
			var departure_newformat = year + '-' + month + '-' + day;
			var return_newformat = year_r + '-' + month_r + '-' + day_r;

			jQuery('input[name="bday_new_format"]').val(bday_newformat);
			jQuery('input[name="departure_new_format"]').val(departure_newformat);
			jQuery('input[name="return_new_format"]').val(return_newformat);


			quotename = $('#firstName_personal_info').val() + " " + $('#middleName_personal_info').val() +" " + $('#lastName_personal_info').val();
			quote_tel_no = $('#tel_no_info').val();
			quote_mobile_no = $('#contactNo_personal_info').val();
			quote_email = $('#email_personal_info').val();

			$('#fname_4thpage').val($('#firstName_personal_info').val());
			$('#lname_4thpage').val($('#lastName_personal_info').val());
			$('#mname_4thpage').val($('#middleName_personal_info').val());
			$('#dateofbirth_4thpage').val($('#dateofBirth_personal_info').val());
			$('#email_5thpage').val(quote_email);
			$('#tel_no_5thpage').val(quote_tel_no);
			$('#mobile_5thpage').val(quote_mobile_no);


	    jQuery('input[name="quote_start_date_all"]').val(departure);
			$('#quote_start_date').text(departure);
			$('#quote_start_date_final').text(departure);

			jQuery('input[name="quote_end_date_all"]').val(returndate);
			$('#quote_end_date').text(returndate);
			$('#quote_end_date_final').text(returndate);

			jQuery('input[name="quote_name_all"]').val(quotename);
			$('#quote_name').text(quotename);
			$('#quote_final_name').text(quotename);



			jQuery('input[name="quote_bday_all"]').val(bday);
			$('#quote_bday').text(bday);
			$('#quote_final_bday').text(bday);

			jQuery('input[name="quote_telno_all"]').val(quote_tel_no);
			$('#quote_telno').text(quote_tel_no);
			$('#quote_final_telno').text(quote_tel_no);

			jQuery('input[name="quote_mobile_no_all"]').val(quote_mobile_no);
			$('#quote_mobile_no').text(quote_mobile_no);
			$('#quote_mobile_final_no').text(quote_mobile_no);

			jQuery('input[name="quote_email_all"]').val(quote_email);
			$('#quote_email').text(quote_email);
			$('#quote_final_email').text(quote_email);


			jQuery('input[name="quoteprovince_all"]').val(destinations);
			$('#quoteprovince').text(destinations);
			$('#quote_final_province').text(destinations);



						
						urlprem = url  + '/api/get-quote/domestic-insurance/get-prem';
				    $.ajax({
				        url: urlprem,
				        method:"GET",
				        data:{ _token:_token,noofday:noofday,mode_transpo:mode_transpo,package:package},
				        error: function(data){
	                  var errors = data.responseJSON;
	                    //alert(policyType);
	                   jQuery.each(data, function(key, value){
	                    alert(value);
	                    });
	                  }, 
				        success:function(result)
				        {
			        		$.each(result, function(key, value){
			        				noofdaysorig = value.days;

			        				premium = value.prem;
				        			jQuery('input[name="net_premium_all"]').val(value.prem);
				        			$('#net_premium').text(ReplaceNumberWithCommas(value.prem));
				        			$('#final_net_premium').text(ReplaceNumberWithCommas(value.prem));
				        			premtax = (premium *2)/100;
						        	premtax_com = premtax.toFixed(2);

				        			jQuery('input[name="premium_tax_all"]').val(premtax_com);
				        			jQuery('input[name="final_premium_tax_all"]').val(premtax_com);
				        			$('#premium_tax').text(ReplaceNumberWithCommas(premtax_com));
				        			$('#final_premium_tax').text(ReplaceNumberWithCommas(premtax_com));


				        			lgt = (parseFloat(value.prem) *0.2)/100;
				        			lgt_com = lgt.toFixed(2);
				        			jQuery('input[name="lgt_all"]').val(lgt);
				        			$('#lgt').text(ReplaceNumberWithCommas(lgt_com));
				        			$('#final_lgt').text(ReplaceNumberWithCommas(lgt_com));

				        			si = 0;
				        			if(package == "Packet"){
				        				si = 250000.00;
				        				prem_one = 250000.00;
				        				prem_two = 25000.00;
				        				prem_three = 12500.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').show();
				        				$('#quote_pro_head').hide();
				        				$('#quote_prime_head').hide();
				        				$('#quote_platinum_head').hide();

				        				$('#quote_packet_content_1').show();
				        				$('#quote_pro_content_1').hide();
				        				$('#quote_prime_content_1').hide();
				        				$('#quote_platinum_content_1').hide();

				        				$('#quote_packet_content_2').show();
				        				$('#quote_pro_content_2').hide();
				        				$('#quote_prime_content_2').hide();
				        				$('#quote_platinum_content_2').hide();

				        				$('#final_quote_packet_head').show();
				        				$('#final_quote_pro_head').hide();
				        				$('#final_quote_prime_head').hide();
				        				$('#final_quote_platinum_head').hide();

				        				$('#final_quote_packet_content_1').show();
				        				$('#final_quote_pro_content_1').hide();
				        				$('#final_quote_prime_content_1').hide();
				        				$('#final_quote_platinum_content_1').hide();

				        				$('#final_quote_packet_content_2').show();
				        				$('#final_quote_pro_content_2').hide();
				        				$('#final_quote_prime_content_2').hide();
				        				$('#final_quote_platinum_content_2').hide();

				        			}else if(package == "Pro"){
				        				si = 500000.00;
				        				prem_one = 500000.00;
				        				prem_two = 50000.00;
				        				prem_three = 25000.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').hide();
				        				$('#quote_pro_head').show();
				        				$('#quote_prime_head').hide();
				        				$('#quote_platinum_head').hide();

				        				$('#quote_packet_content_1').hide();
				        				$('#quote_pro_content_1').show();
				        				$('#quote_prime_content_1').hide();
				        				$('#quote_platinum_content_1').hide();

				        				$('#quote_packet_content_2').hide();
				        				$('#quote_pro_content_2').show();
				        				$('#quote_prime_content_2').hide();
				        				$('#quote_platinum_content_2').hide();

				        				$('#final_quote_packet_head').hide();
				        				$('#final_quote_pro_head').show();
				        				$('#final_quote_prime_head').hide();
				        				$('#final_quote_platinum_head').hide();

				        				$('#final_quote_packet_content_1').hide();
				        				$('#final_quote_pro_content_1').show();
				        				$('#final_quote_prime_content_1').hide();
				        				$('#final_quote_platinum_content_1').hide();

				        				$('#final_quote_packet_content_2').hide();
				        				$('#final_quote_pro_content_2').show();
				        				$('#final_quote_prime_content_2').hide();
				        				$('#final_quote_platinum_content_2').hide();

			        				}else if(package == "Prime"){
				        				si = 750000.00;
				        				prem_one = 750000.00;
				        				prem_two = 75000.00;
				        				prem_three = 37500.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').hide();
				        				$('#quote_pro_head').hide();
				        				$('#quote_prime_head').show();
				        				$('#quote_platinum_head').hide();

				        				$('#quote_packet_content_1').hide();
				        				$('#quote_pro_content_1').hide();
				        				$('#quote_prime_content_1').show();
				        				$('#quote_platinum_content_1').hide();

				        				$('#quote_packet_content_2').hide();
				        				$('#quote_pro_content_2').hide();
				        				$('#quote_prime_content_2').show();
				        				$('#quote_platinum_content_2').hide();

				        				$('#final_quote_packet_head').hide();
				        				$('#final_quote_pro_head').hide();
				        				$('#final_quote_prime_head').show();
				        				$('#final_quote_platinum_head').hide();

				        				$('#final_quote_packet_content_1').hide();
				        				$('#final_quote_pro_content_1').hide();
				        				$('#final_quote_prime_content_1').show();
				        				$('#final_quote_platinum_content_1').hide();

				        				$('#final_quote_packet_content_2').hide();
				        				$('#final_quote_pro_content_2').hide();
				        				$('#final_quote_prime_content_2').show();
				        				$('#final_quote_platinum_content_2').hide();

				        			}else{
				        				si = 1000000.00;
				        				prem_one = 1000000.00;
				        				prem_two = 100000.00;
				        				prem_three = 50000.00;
				        				prem_four = 25000.00;

				        				$('#quote_packet_head').hide();
				        				$('#quote_pro_head').hide();
				        				$('#quote_prime_head').hide();
				        				$('#quote_platinum_head').show();

				        				$('#quote_packet_content_1').hide();
				        				$('#quote_pro_content_1').hide();
				        				$('#quote_prime_content_1').hide();
				        				$('#quote_platinum_content_1').show();

				        				$('#quote_packet_content_2').hide();
				        				$('#quote_pro_content_2').hide();
				        				$('#quote_prime_content_2').hide();
				        				$('#quote_platinum_content_2').show();

				        				$('#final_quote_packet_head').hide();
				        				$('#final_quote_pro_head').hide();
				        				$('#final_quote_prime_head').hide();
				        				$('#final_quote_platinum_head').show();

				        				$('#final_quote_packet_content_1').hide();
				        				$('#final_quote_pro_content_1').hide();
				        				$('#final_quote_prime_content_1').hide();
				        				$('#final_quote_platinum_content_1').show();

				        				$('#final_quote_packet_content_2').hide();
				        				$('#final_quote_pro_content_2').hide();
				        				$('#final_quote_prime_content_2').hide();
				        				$('#final_quote_platinum_content_2').show();

				        			}


				        			mode_transpos = $('input[name="mode_transpo"]:checked').val();
				        		if(mode_transpos == "Air Plan"){
						        				$('#del_tr').show();
						        				$('#bag_tr').show();
						        				$('#com_tr').show();
						        				$('#del_tr_final').show();
						        				$('#bag_tr_final').show();
						        				$('#com_tr_final').show();
						        			}else{
						        				$('#del_tr').hide();
						        				$('#bag_tr').hide();
						        				$('#com_tr').hide();
						        				$('#del_tr_final').hide();
						        				$('#bag_tr_final').hide();
						        				$('#com_tr_final').hide();
						        			}

				        			jQuery('input[name="ac_dis_all"]').val(prem_one);
				        			$('#ac_dis').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));
				        			$('#ac_dis_final').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));

				        			jQuery('input[name="ac_bur_benefits_all"]').val(prem_two);
				        			$('#ac_bur_benefits').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));
				        			$('#ac_bur_benefits_final').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));

				        			jQuery('input[name="ac_med_reim_all"]').val(prem_two);
				        			$('#ac_med_reim').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));
				        			$('#ac_med_reim_final').text(ReplaceNumberWithCommas(prem_two.toFixed(2)));

				        			jQuery('input[name="umprov_mur_all"]').val(prem_one);
				        			$('#umprov_mur').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));
				        			$('#umprov_mur_final').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));

				        			jQuery('input[name="travel_1__all"]').val(prem_one);
				        			$('#travel_1_').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));
				        			$('#travel_1_final').text(ReplaceNumberWithCommas(prem_one.toFixed(2)));

				        			jQuery('input[name="travel_2__all"]').val(prem_three);
				        			$('#travel_2_').text(ReplaceNumberWithCommas(prem_three.toFixed(2)));
				        			$('#travel_2_final').text(ReplaceNumberWithCommas(prem_three.toFixed(2)));

				        			jQuery('input[name="travel_3__all"]').val(prem_four);
				        			$('#travel_3_').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));
				        			$('#travel_3_final').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));

				        			jQuery('input[name="travel_7__all"]').val(prem_four);
				        			$('#travel_7_').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));
				        			$('#travel_7_final').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));

				        			jQuery('input[name="travel_4__all"]').val(prem_four);
				        			$('#travel_4_').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));
				        			$('#travel_4_final').text(ReplaceNumberWithCommas(prem_four.toFixed(2)));


				        			dst = 0;
				        			if(si <= 100000){
				        				dst = 0.00;
				        			}else if(si > 100000 && si <= 300000){
				        				dst = 20.00;
				        			}else if(si > 300000 && si <= 500000){
												dst = 50.00;
				        			}else if(si > 500000 && si <= 750000){
												dst = 100.00;
				        			}else if(si > 750000 && si <= 1000000){
												dst = 150.00;
				        			}else{
												dst = 200.00;
				        			}
				        			jQuery('#withcovid').hide();
				        			jQuery('#withcovid_final').hide();
				        			jQuery('#sub_final_1').hide();
				        			jQuery('#sub_final_2').hide();
				        			jQuery('#sub_final_3').hide();
				        			jQuery('#covid_quote_div_final').hide();
				        			jQuery('#covid_quote_div_final_1').hide();
				        			jQuery('#covid_quote_div').hide();
				        			jQuery('#covid_quote_div_1').hide();
				        			jQuery('#warranty_div_title').hide();
				        			jQuery('#warranty_div_content').hide();



				        			jQuery('input[name="doc_stamp_all"]').val(dst);
				        			jQuery('input[name="final_doc_stamp_all"]').val(dst);
				        			$('#doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));
				        			$('#final_doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));

				        			due = parseFloat(value.prem) + premtax + dst + lgt;

				        			jQuery('input[name="total_amount_due_all"]').val(due);
				        			jQuery('input[name="final_total_amount_due_all"]').val(due);
				        			$('#total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));
				        			$('#final_total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));

				        			jQuery('input[name="total_amount_all"]').val(due);
				        			jQuery('input[name="final_total_amount_all"]').val(due);
				        			$('#total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));
				        			$('#final_total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));
			        			  if(covid == "Yes"){
			        				  urlpremcovid = url  + '/api/get-quote/domestic-insurance/get-prem-covid';
									    	$.ajax({
									        url: urlpremcovid,
									        method:"GET",
									        data:{ _token:_token,noofdaysorig:noofdaysorig,package:package},
									        error: function(data){
						                  var errors = data.responseJSON;
						                    //alert(policyType);
						                   jQuery.each(data, function(key, value){
						                    alert(value);
						                    });
						                  }, 
									        success:function(result)
									        {
									        	$.each(result, function(key, value){
															jQuery('#withcovid').show();
															jQuery('#withcovid_final').show();
															jQuery('#sub_final_1').show();
								        			jQuery('#sub_final_2').show();
								        			jQuery('#sub_final_3').show();
								        			jQuery('#covid_quote_div_final').show();
								        			jQuery('#covid_quote_div_final_1').show();
								        			jQuery('#covid_quote_div').show();
								        			jQuery('#covid_quote_div_1').show();
					        						jQuery('#warranty_div_title').show();
								        			jQuery('#warranty_div_content').show();
															premium = parseFloat(premium) + parseFloat(value.prem);
															jQuery('input[name="covid_amount"]').val(value.prem);
															

															jQuery('input[name="net_premium_all"]').val(premium);
															jQuery('input[name="final_net_premium_all"]').val(premium);
								        			$('#net_premium').text(ReplaceNumberWithCommas(premium));
								        			$('#final_net_premium').text(ReplaceNumberWithCommas(premium));

								        			premtax = (parseFloat(premium) *2)/100;
								        			premtax_com = premtax.toFixed(2);
								        			jQuery('input[name="premium_tax_all"]').val(premtax_com);
								        			jQuery('input[name="final_premium_tax_all"]').val(premtax_com);
								        			$('#premium_tax').text(ReplaceNumberWithCommas(premtax_com));
								        			$('#final_premium_tax').text(ReplaceNumberWithCommas(premtax_com));

								        			lgt = (parseInt(premium) *0.2)/100;
								        			lgt_com = lgt.toFixed(2);
								        			jQuery('input[name="lgt_all"]').val(lgt);
								        			jQuery('input[name="final_lgt_all"]').val(lgt);
								        			$('#lgt').text(ReplaceNumberWithCommas(lgt_com));
								        			$('#final_lgt').text(ReplaceNumberWithCommas(lgt_com));

								        			due = parseFloat(premium) + premtax + dst + lgt;

								        			jQuery('input[name="total_amount_due_all"]').val(due);
								        			jQuery('input[name="final_total_amount_due_all"]').val(due);
								        			$('#total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));
								        			$('#final_total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));

								        			jQuery('input[name="total_amount_all"]').val(due);
								        			jQuery('input[name="final_total_amount_all"]').val(due);
								        			$('#total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));
								        			$('#final_total_amount').text(ReplaceNumberWithCommas(due.toFixed(2)));

								        			if(promo != ""){
																$('#promo_tr').show();
																$('#final_promo_tr').show();
																$('#amountdue_tr').show();
																$('#final_amountdue_tr').show();
							        				  urlpromo = url  + '/api/get-quote/domestic-insurance/promo';
							        				  $.ajax({
													        url: urlpromo,
													        method:"GET",
													        data:{ _token:_token,promo:promo},
													        error: function(data){
										                  var errors = data.responseJSON;
										                    //alert(policyType);
										                   jQuery.each(data, function(key, value){
										                    alert(value);
										                    });
										                  }, 
													        success:function(result)
													        {
													        	$.each(result, function(key, value){
													        		if(value.type == "A"){
													        			dueless = due - parseFloat(value.amount);
													        			less = parseFloat(value.amount);
													        			jQuery('input[name="less_all"]').val(less);
													        			jQuery('input[name="final_less_all"]').val(less);
													        			$('#less').text(ReplaceNumberWithCommas(less.toFixed(2)));
													        			$('#final_less').text(ReplaceNumberWithCommas(less.toFixed(2)));

													        			jQuery('input[name="total_amount_due_all"]').val(dueless);
													        			jQuery('input[name="final_total_amount_due_all"]').val(dueless);
								        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
								        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
													        		}else{
													        			rate = value.rate;
			                               		promotoless =  (due * (parseFloat(rate)/100));
			                               		dueless =  due - parseFloat(promotoless);

			                               		jQuery('input[name="less_all"]').val(rate+"%");
			                               		jQuery('input[name="final_less_all"]').val(rate+"%");
													        			$('#less').text(rate+"%");
													        			$('#final_less').text(rate+"%");

			                               		jQuery('input[name="total_amount_due_all"]').val(dueless);
			                               		jQuery('input[name="final_total_amount_due_all"]').val(dueless);
								        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
								        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
													        		}
																		}) 
													        }
													      });
							        			  }
														}) 
									        }
									      });
			        			  }else{
			        			  	if(promo != ""){
																$('#final_promo_tr').show();
																$('#promo_tr').show();
																$('#amountdue_tr').show();
																$('#final_amountdue_tr').show();
							        				  urlpromo = url  + '/api/get-quote/domestic-insurance/promo';
							        				  $.ajax({
													        url: urlpromo,
													        method:"GET",
													        data:{ _token:_token,promo:promo},
													        error: function(data){
										                  var errors = data.responseJSON;
										                    //alert(policyType);
										                   jQuery.each(data, function(key, value){
										                    alert(value);
										                    });
										                  }, 
													        success:function(result)
													        {
													        	$.each(result, function(key, value){
													        		if(value.type == "A"){
													        			dueless = due - parseFloat(value.amount);
													        			less = parseFloat(value.amount);
													        			jQuery('input[name="less_all"]').val(less);
													        			jQuery('input[name="final_less_all"]').val(less);
													        			$('#less').text(ReplaceNumberWithCommas(less.toFixed(2)));
													        			$('#final_less').text(ReplaceNumberWithCommas(less.toFixed(2)));

													        			jQuery('input[name="total_amount_due_all"]').val(dueless);
													        			jQuery('input[name="final_total_amount_due_all"]').val(dueless);
								        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
								        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
													        		}else{
													        			rate = value.rate;
			                               		promotoless =  (due * (parseFloat(rate)/100));
			                               		dueless =  due - parseFloat(promotoless);

			                               		jQuery('input[name="less_all"]').val(rate+"%");
			                               		jQuery('input[name="final_less_all"]').val(rate+"%");
													        			$('#less').text(rate+"%");
													        			$('#final_less').text(rate+"%");
													     

			                               		jQuery('input[name="total_amount_due_all"]').val(dueless);
			                               		jQuery('input[name="final_total_amount_due_all"]').val(dueless);
								        								$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
								        								$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
													        		}
																		}) 
													        }
													      });
							        			  }
			        			  }


			        		}) 
				        }
				     });

			widget.show(); 			
			widget.not(':eq('+(current++)+')').hide();
			setProgress(current); 
			hideButtons(current); 	
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


	function parseDate(str) {
    var mdy = str.split('/');
    return new Date(mdy[2], mdy[0]-1, mdy[1]);
	}

	function datediff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second-first)/(1000*60*60*24));
	}

	btn5thpage_add.click(function(){
		var minNumber = 1;
		var maxNumber = 40000000;

 		var date = new Date();
		date.setFullYear( date.getFullYear() - 4 );
 		var year = date.getFullYear();
 		var yearlist;
		for (i = new Date().getFullYear(); i > year; i--)
		{
			yearlist = yearlist +  '<option value="'+i+'">' + i + '</option>';
		}
		var colCount = $("#customFields_5thpage #hardware-body-5thpapge .row").length;
		if(colCount > 0){
			jQuery('.delete-row-col-person-emergency').css('display', 'flex');
		}else{
			jQuery('.delete-row-col-person-emergency').hide();
		}  	

		if(colCount == 3){
			return false;
		}
		var number = Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
		var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')"; 
		var numformat1 = "vf_clean_number('status_5thpage"+number+"');vf_commafy('status_5thpage"+number+"', 2)";
    	var $cloned = $('#divvv_5thpage').clone().prop('id', 'divvv_5thpage'+number); 
 	
		var new_row = '\
		<div class="row">\
			<span style="border-top: 1.5px solid #db3e8d; margin-top:50px;margin-bottom:20px;opacity:0.7;"></span>\
			<div class="col-md-4">\
				<div class="form-group">\
					<label for="name_5thpage">Name</label>\
					<input name="name_5thpage[]" id="name_5thpage' + number + '" type="text"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">\
				</div>\
			</div>\
			<div class="col-md-4">\
				<div class="form-group">\
					<label for="contact_5thpage">Contact No.</label>\
					<input name="contact_5thpage[]" id="contact_5thpage' + number + '" type="text"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">\
				</div>\
			</div>\
			<div class="col-md-4">\
				<div class="form-group">\
					<label for="relation_5thpage">Relation</label>\
					<input name="relation_5thpage[]" id="relation_5thpage' + number + '" type="text"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">\
				</div>\
			</div>\
			<div class="col-md-4">\
				<div class="form-group">\
					<label for="bday_5thpage">Birthday</label>\
					<input name="bday_5thpage[]" id="bday_5thpage' + number + '" type="text"  class="form-control input-lg NoPaste bday_5thpage" maxlength="100">\
				</div>\
			</div>\
			<div class="col-md-4">\
				<div class="form-group">\
					<label for="status_5thpage">Status</label>\
					<select  id="status_5thpage' + number + '" name="status_5thpage[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >\
							<option value="">- Select -</option>\
							<option value="Single">Single</option>\
							<option value="Married">Married</option>\
							<option value="Widowed">Widowed</option>\
							<option value="Seprated">Seprated</option>\
							<option value="Divorced">Divorced</option>\
					</select>\
				</div>\
			</div>\
			<div class="col-4 col-lg-1 delete-row-col-person-emergency justify-content-left" >\
				<button type="button" class="action_ delete-row-person-emergency btn btn-danger form-control_">\
				  <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
				    <path d="M2 30 L30 2 M30 30 L2 2" />\
				  </svg>\
				  <span class="d-inline d-lg-none">Remove</span>\
				</button>\
			</div>\
		</div>\
		<script type="text/javascript">\
		 jQuery("#bday_5thpage'+number+'").datepicker({\
			changeMonth: true,\
			changeYear: true,\
			dateFormat: \'mm/dd/yy\',\
			minDate: \'-90y\',\
			maxDate:\'0dy\',\
			yearRange: \'1910:9999\'\
		}).on(\'focus\', function(){\
				if(!jQuery(\'select\').parent().hasClass(\'fake-select\')){\
					jQuery(\'select\').wrap(\'<span class="fake-select"></span>\');\
				}\
		}); <\/script>\
		';
	  $('#hardware-body-5thpapge').append(new_row);  
	 	$cloned.find('#copy_select').prop('name', 'status_5thpage[]');
	 	$cloned.find('#copy_select').prop('display', 'block !important');
	 	$cloned.find('#copy_select').prop('id', 'status_5thpage'+number);
	  $cloned.appendTo('#new_select'+number);
	  jQuery('#status_5thpage'+number).selectpicker();
	  JQuery('#divvv_5thpage'+number).show();

	 


	  return false;
	});
	


  btn5thpage_add_bene.click(function(){
  	   var minNumber = 1;
		var maxNumber = 40000000;

 		var date = new Date();
		date.setFullYear( date.getFullYear() - 4 );
 		var year = date.getFullYear();
 		var yearlist;
		for (i = new Date().getFullYear(); i > year; i--)
		{
			yearlist = yearlist +  '<option value="'+i+'">' + i + '</option>';
		}
		var colCount = $("#customFields_5thpage_benefeciaries #hardware-body-5thpapge_benefeciaries .row").length;
		if(colCount > 0){
			jQuery('.delete-row-col-bene').css('display', 'flex');
		}else{
			jQuery('.delete-row-col-bene').hide();
		}  	

		if(colCount == 3){
			return false;
		}
		
		var number = Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
		var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')"; 
		var new_row = '<div class="row" >\
											<div class="col-md-4">\
												<div class="form-group">\
													<label for="name_bene_5thpage">Name</label>\
													<input name="name_bene_5thpage[]" id="name_bene_5thpage' + number + '" type="text"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">\
												</div>\
											</div>\
											<div class="col-md-4">\
												<div class="form-group">\
													<label for="relation_bene_5thpage">Relation</label>\
													<input name="relation_bene_5thpage[]" id="relation_bene_5thpage' + number + '" type="text"  class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">\
												</div>\
											</div>\
											<div class="col-4 col-lg-1 delete-row-col-bene justify-content-left" >\
												<button type="button" class="action_ delete-row-bene btn btn-danger form-control_">\
												  <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
												    <path d="M2 30 L30 2 M30 30 L2 2" />\
												  </svg>\
												  <span class="d-inline d-lg-none">Remove</span>\
												</button>	\
											</div>\
										</div>';
												
	  $('#hardware-body-5thpapge_benefeciaries').append(new_row);  
	  return false;
	});
 
  	// Back button click action 	
  btnback.click(function(){ 	
		if(current == 5){
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

	if(current < limit)btnnext.show(); 	
  	if(current > 1){
  		btnnext.show();
  		btnback.show();
  	}

  	if(current == 2){
  		btnnext.hide();
			btnNextPage.show();


  		
  	}

	if(current == limit) { btnnext.hide(); btnsubmit.show(); btnAdd.show(); btnback.show(); }
}

 function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}