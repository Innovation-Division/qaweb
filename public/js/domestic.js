

$("#phone").mask("(999) 999-9999");
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

	function noonly() {
	  var key = window.event.key;
	  var element = window.event.target;
	  var isAllowed = /\d|Backspace|Tab/;
	  if(!isAllowed.test(key)) window.event.preventDefault();
		  var inputValue = element.value;		 
		  element.value = inputValue;  
	}

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

     var j = jQuery.noConflict();
      
		jQuery('#dateofBirth_personal_info').datepicker({
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

	$('#occupation_personal_info').on('change', function() {
	  if(this.value == "Others"){
			$("#occupation_other_personal_info").removeAttr("disabled").show();	  		
	  }else{
			$("#occupation_other_personal_info").attr("disabled", "disabled").hide(); 
			$("#occupation_other_personal_info").val("");
			var occupation =  this.value;
			var _token = jQuery('input[name="_token"]').val();
			jQuery.ajax({
			      	url:'{{url('/')}}' + '/api/covid/occupation/getdata',
			      	method:"GET",
			      	data:{ _token:_token, occupation:occupation}, 
			      	success:function(result)
			      	{         
			            jQuery.each(result, function(key, value){
			            	if(value.covid_blacklist == "Y"){
											var check1;
							     		var check2;
							     		var check3;
							     		var check4;
							     		var check5;
							     		if ($('#checkbox-1').is(":checked")){
							     			check1 = "Y";
							     		}else{
							     			check1 = "N";			     			
							     		}if ($('#checkbox-2').is(":checked")){
							     			check2 = "Y";
							     		}else{
							     			check2 = "N";			     			
							     		}if ($('#checkbox-3').is(":checked")){
							     			check3 = "Y";
							     		}else{
							     			check3 = "N";			     			
							     		}if ($('#checkbox-4').is(":checked")){
							     			check4 = "Y";
							     		}else{
							     			check4 = "N";			     			
							     		}if ($('#checkbox-5').is(":checked")){
							     			check5 = "Y";
							     		}else{
							     			check5 = "N";			     			
							     		}

										var _token = jQuery('input[name="_token"]').val();
										var first = jQuery('input[name="firstName_personal_info"]').val();
										var middle = jQuery('input[name="middleName_personal_info"]').val();
										var last = jQuery('input[name="lastName_personal_info"]').val();
										var bday = jQuery('#dateofBirth_personal_info').val();
										var gender = jQuery('#gender_personal_info').val();
										var contact = jQuery('input[name="contactNo_personal_info"]').val();
										var tel = jQuery('input[name="tel_no_info"]').val();
										var occupation = jQuery('#occupation_personal_info').val();
										var occupationOther = jQuery('input[name="occupation_other_personal_info"]').val();
										var email = jQuery('input[name="email_personal_info"]').val();
										var beneficiary = jQuery('input[name="beneficiary_personal_info"]').val();
										var relationship = jQuery('input[name="relationship_personal_info"]').val();
										var coverage = jQuery('input[name="coverage_complete"]').val();
										var save_no = jQuery('input[name="pwd_stat_save"]').val();
										var count = jQuery('#primbasicval').val();
										var pwdother = jQuery('#others_pwd_personal_info').val();

						     			if(save_no == 1){	
						     			}else{
						     				jQuery.ajax({
										      	url:'{{url('/')}}' + '/api/covid/insert/datablocked',
										      	method:"GET",
										      	data:{ _token:_token, first:first, middle:middle, last:last, bday:bday, gender:gender, contact:contact, tel:tel, occupation:occupation, occupationOther:occupationOther, email:email, beneficiary:beneficiary, relationship:relationship, coverage:coverage, count:count, check1:check1, check2:check2, check3:check3, check4:check4, check5:check5, pwdother:pwdother},  
										      	success:function(result)
										      	{         
										            jQuery('input[name="pwd_stat_save"]').val(1);
											    }
										    })
						     			}

						     			jQuery('#occupation_modal').modal('show');
					            		jQuery('#occupation_personal_info').val("");
					            		jQuery('#occupation_personal_info').selectpicker("refresh");  

			            	}
				        })       
				     }
		    })
	  }
	});     
                                    
	function basicclick() {
		$('input[name=coverage_complete]').val("a");
  		document.getElementById("basic").style.background='#db3e8d';
  		document.getElementById("basic").style.color ='#ffffff';
  		document.getElementById("prime").style.background='#ffffff';
  		document.getElementById("prime").style.color ='#db3e8d';
  		document.getElementById("basicprinme").style.background='#ffffff';
  		document.getElementById("basicprinme").style.color ='#db3e8d';
  		document.getElementById('basicprinmepanel').style.display = 'flex';
	}

	function primeclick() {
		$('input[name=coverage_complete]').val("b");
  		document.getElementById("basic").style.background='#ffffff';
  		document.getElementById("basic").style.color ='#db3e8d';
  		document.getElementById("prime").style.background='#db3e8d';	
  		document.getElementById("prime").style.color ='#ffffff';
  		document.getElementById("basicprinme").style.background='#ffffff';
  		document.getElementById("basicprinme").style.color ='#db3e8d';
  		document.getElementById('basicprinmepanel').style.display = 'flex';
  		
	}
	function basicprinmeclick() {
		$('input[name=coverage_complete]').val("c");
  		document.getElementById("basic").style.background='#ffffff';
  		document.getElementById("basic").style.color ='#db3e8d';
  		document.getElementById("prime").style.background='#ffffff';
  		document.getElementById("prime").style.color ='#db3e8d';
  		document.getElementById("basicprinme").style.background='#db3e8d';
  		document.getElementById("basicprinme").style.color ='#ffffff';
  		document.getElementById('basicprinmepanel').style.display = 'none';
  		
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

	$( "#checkbox-5" ).click(function() {
	if ($('#checkbox-5').is(':checked')) {
	  		$('#pwd_div_others').css('display','block');		
		}else{
	  		$('#pwd_div_others').css('display','none');	
		}
	});

	if ($('#checkbox-5').is(':checked')) {
  		$('#pwd_div_others').css('display','block');		
	}else{
  		$('#pwd_div_others').css('display','none');	
	}

	$( "#btn_yes" ).click(function() { 
		$('input[name=check_agent]').val("Y");
		document.getElementById("btn_yes").style.background='#db3e8d';
		document.getElementById("btn_yes").style.color ='#ffffff';
		document.getElementById("btn_no").style.background='#ffffff';
		document.getElementById("btn_no").style.color ='#db3e8d';  
		$('#agentNameDiv').css('display','block');
	});	

	$( "#btn_no" ).click(function() { 
		$('input[name=check_agent]').val("N");
		document.getElementById("btn_no").style.background='#db3e8d';
  		document.getElementById("btn_no").style.color ='#ffffff';
  		document.getElementById("btn_yes").style.background='#ffffff';
  		document.getElementById("btn_yes").style.color ='#db3e8d'; 
  		$('#agentNameDiv').css('display','none');

	});

	$( "#btn_pwd_yes" ).click(function() { 
		document.getElementById("btn_pwd_yes").style.background='#db3e8d';
		document.getElementById("btn_pwd_yes").style.color ='#ffffff';
		document.getElementById("btn_pwd_no").style.background='#ffffff';
		document.getElementById("btn_pwd_no").style.color ='#db3e8d';  
		$('#pwd_div').css('display','block');
		$('input[name=pwd_stat]').val("yes");  		
	});

	$( "#btn_pwd_no" ).click(function() { 
		document.getElementById("btn_pwd_no").style.background='#db3e8d';
		document.getElementById("btn_pwd_no").style.color ='#ffffff';
		document.getElementById("btn_pwd_yes").style.background='#ffffff';
		document.getElementById("btn_pwd_yes").style.color ='#db3e8d'; 
		$('#pwd_div').css('display','none');
		$('input[name=pwd_stat]').val("no");
	});

	$( "#btnsubmit" ).click(function() { 
		$(".validation_email_summary").remove(); 
 		$(".validation_email_summary_check_error").remove(); 
 		$(".validation_email_summary_check_success").remove();
 		$(".validation_agent_name_summary").remove(); 
 		$(".validation_agent_name_summary_check_error").remove(); 
 		$(".validation_agent_name_summary_check_success").remove();

		var errornumber = 0
 		if ($('#email_summary').val() == "") {
 			// $('#email_summary').css('border-color', '#CF3C4B');	     			
			$("#email_summary").after("<div class='validation_email_summary v-error-msg'>Email is empty</div>");    
 			// $('#email_summary').after('<i class="fa fa-times-circle validation_email_summary_check_error fa-2x" aria-hidden="true" style="float: right; top:-43px; position: relative;left:-10px !important;"></i>');     
			$("#email_summary").fieldErrorState();
			errornumber = 1;           
 		} else {	  
 			if (IsEmail($('#email_summary').val()) == false) {
				// $('#email_summary').css('border-color', '#CF3C4B');	     			
				$("#email_summary").after("<div class='validation_email_summary v-error-msg'>Invalid email address!</div>");    
				// $('#email_summary').after('<i class="fa fa-times-circle validation_email_summary_check_error fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;color: #CF3C4B;size:20px;"></i>');     
				$("#email_summary").fieldErrorState();
				errornumber = 1;           
			} else {
				// $('#email_summary').after('<i class="fa fa-check-circle validation_email_summary_check_success fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;"></i>');
				// $('#email_summary').css('border-color', '#4BB543'); 
				$("#email_summary").fieldSuccessState();
			}                 
 		}

		if ($('input[name=check_agent]').val() == "Y") {
			if ($('#agent_name_summary').val() == "") {
				// $('#agent_name_summary').css('border-color', '#CF3C4B');	     			
				$("#agent_name_summary").after("<div class='validation_agent_name_summary v-error-msg'>Agent code is empty</div>");    
	 			// $('#agent_name_summary').after('<i class="fa fa-times-circle validation_agent_name_summary_check_error fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;"></i>');     
				$("#agent_name_summary").fieldErrorState();
				errornumber = 1;  
			} else {
				// $('#agent_name_summary').after('<i class="fa fa-check-circle validation_agent_name_summary_check_success fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;"></i>');
				// $('#agent_name_summary').css('border-color', '#4BB543'); 
				$("#agent_name_summary").fieldSuccessState();
			}

 		} else {
 			// $('#agent_name_summary').after('<i class="fa fa-check-circle validation_agent_name_summary_check_success fa-2x" aria-hidden="true" style=" float: right;top:-43px; position: relative;left:-10px !important;"></i>');
			// $('#agent_name_summary').css('border-color', '#4BB543'); 
			$("#agent_name_summary").fieldSuccessState();
 		}

 		if ($('input[name="checksummary"]').is(':checked')) {
			$('#iAggre_warning').css('display','none');
		} else {
			$('#iAggre_warning').css('display','block');
			errornumber = 1; 
		}

 		if (errornumber !== 0){
 			return false;
 		} 

 		jQuery('#modal_covid19_summary').modal('show');
	});     