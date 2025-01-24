<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('input[type=radio][name=include_agent]').change(function() {
		    if (this.value == "Yes") {
		        $("#agent_div").css("display", "block");
		    }
		    else if (this.value == "No") {
		        $("#agent_div").css("display", "none");
		    }
		});
	});
</script>

<script type="text/javascript">

	jQuery(document).ready(function($) {
	jQuery('#BlockUIConfirm').show();
	jQuery('#BlockUIConfirm2').hide();
		jQuery(function () {
		jQuery("#btnConfirm").click(function () {
				 errornumber = 0;
	     		jQuery(".validation_dateofBirth_personal_info").remove();
	     		jQuery(".validation_dateofBirth_personal_info_check_error").remove(); 
	     		jQuery(".validation_dateofBirth_personal_info_check_success").remove();

	     		jQuery(".validation_nationality_4thpage").remove();
	     		jQuery(".validation_nationality_4thpage_check_error").remove(); 
	     		jQuery(".validation_nationality_4thpage_check_success").remove();

						if(jQuery('#dateofBirth_personal_info').val() == ""){
								jQuery("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info v-error-msg'>Date of Birth is empty</div>");
								jQuery('#dateofBirth_personal_info').css('border-color', '#F44336');	   
								jQuery('#dateofBirth_personal_info').css('border-top', '#F44336 !important');	   
								jQuery('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #F44336;size:20px;: "></i>');     
								 	errornumber = 1; 
								 	jQuery('#BlockUIConfirm').show();          
			     		}else{	    
									$('#dateofBirth_personal_info').after('<i class="fa fa-check-circle validation_dateofBirth_personal_info_check_success fa-2x" aria-hidden="true" style=" float: right;top:-35px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
			     				$('#dateofBirth_personal_info').css('border-color', '#4BB543');   

								var dateofBirth_personal_info = $('#dateofBirth_personal_info').val();
								dateofBirth_personal_info = moment(dateofBirth_personal_info).format('MMMM DD, YYYY');  
								$(".date_of_birth").html(dateofBirth_personal_info);
						} 

						if($('#nationality_4thpage').val() == "novalue"){
		     			$('#nationality_4thpage').css('border-color', '#F44336');	     			
              $("#nationality_4thpage").after("<div class='validation_nationality_4thpage' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Citizenship is empty</div>");    
		     			$('#nationality_4thpage').after('<i class="fa fa-times-circle validation_nationality_4thpage_check_error fa-lg" aria-hidden="true" style=" float: right;top:-35px !important; position: relative;left:-35px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');     
		     			errornumber = 1;
		     		}else{	
		     			if($('#nationality_4thpage').val() == "Others"){
		     				errornumber = 2;
		     			}				     			
		     			$('#nationality_4thpage').after('<i class="fa fa-check-circle validation_nationality_4thpage_check_success fa-lg" aria-hidden="true" style=" float: right;top:-35px !important; position: relative;left:-35px !important;color: #4BB543;size:20px;z-index: 2 !important;"></i>');
		     			$('#nationality_4thpage').css('border-color', '#4BB543');                   
		     		}
						if(errornumber == 2){
							jQuery('#BlockUIConfirm').hide();
							jQuery('#BlockUIConfirm2').show();
						}
						if(errornumber == 1){
				 			return false;
				 		}else{
				 			jQuery('#BlockUIConfirm').hide();
				 		}

					let birthdate = jQuery('#dateofBirth_personal_info').val();
				birthdate = new Date(birthdate);
				let today = new Date();
				let age = today.getFullYear() - birthdate.getFullYear();
				let monthDiff = today.getMonth() - birthdate.getMonth();
				if(birthdate == 'Invalid Date'){
					jQuery(".validation_dateofBirth_personal_info").remove();
	     			jQuery(".validation_dateofBirth_personal_info_check_error").remove(); 
	     			jQuery(".validation_dateofBirth_personal_info_check_success").remove();
					$('#dateofBirth_personal_info').css('border-color', '#F44336');
					$("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Date of Birth is invalid</div>");
					$('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-26px !important; position: relative;left:-20px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
					
					jQuery('#BlockUIConfirm').show();
					jQuery('#BlockUIConfirm2').hide();
				}
				if(today.getDate() < 10){
					var datemonthtoday = today.getMonth()+ '0' +today.getDate();
				}else{
					var datemonthtoday = today.getMonth()+ '' +today.getDate();
				}
				
				if(birthdate.getDate() < 10){
					var datemonthbirthdate = birthdate.getMonth()+ '0' +birthdate.getDate();
				}else{
					var datemonthbirthdate = birthdate.getMonth()+ '' +birthdate.getDate();
				}
              if (age === 18 && datemonthtoday < datemonthbirthdate) {
                    age--;
                }

             if (age === 60 && datemonthtoday > datemonthbirthdate) {
                    age++;
                }
				if (age < 18) {
						jQuery(".validation_dateofBirth_personal_info").remove();
		     		jQuery(".validation_dateofBirth_personal_info_check_error").remove(); 
		     		jQuery(".validation_dateofBirth_personal_info_check_success").remove();
						$('#dateofBirth_personal_info').css('border-color', '#F44336');
						$("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>You must be at least 18 years old</div>");
						$('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-26px !important; position: relative;left:-20px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
						
						jQuery('#BlockUIConfirm').show();
						jQuery('#BlockUIConfirm2').hide();
					}else if(age > 60) {
							jQuery(".validation_dateofBirth_personal_info").remove();
		     			jQuery(".validation_dateofBirth_personal_info_check_error").remove(); 
		     			jQuery(".validation_dateofBirth_personal_info_check_success").remove();
							$('#dateofBirth_personal_info').css('border-color', '#F44336');
							$("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>You must not be older than 60 years old.</div>");
							$('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-26px !important; position: relative;left:-20px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
							
							jQuery('#BlockUIConfirm').show();
							jQuery('#BlockUIConfirm2').hide();
            } 
	});
});
	if (jQuery(this).is(':checked') === true) {
			jQuery('#btnConfirm').prop('disabled', false);
	}else{
		jQuery('#btnConfirm').prop('disabled', true);
	}
	jQuery("#chckcovid").on('change', function () { 
			if (jQuery(this).is(':checked') === true) {
			jQuery('#btnConfirm').prop('disabled', false);
		}else{
			jQuery('#btnConfirm').prop('disabled', true);
		}
	});
});


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