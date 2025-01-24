<script type="text/javascript">
		var j = jQuery.noConflict();
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
				}


				if($('#nationality_4thpage').val()===""){
					$('#nationality_4thpage').css('border-color', '#F44336');
					$("#nationality_4thpage").after("<div class='validation_nationality_4thpage' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Citizenship is empty</div>");
					$('#nationality_4thpage').after('<i class="fa fa-times-circle validation_nationality_4thpage_check_error fa-lg" aria-hidden="true" style=" float: right;top:-35px !important; position: relative;left:-35px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
					errornumber = 1;
					jQuery('#BlockUIConfirm').show();
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

				
				if(errornumber === 1){
					return false;
				}else{
					jQuery('#BlockUIConfirm').hide();
				}

				let birthdate = $("#dateofBirth_personal_info").val();

				birthdate = new Date(birthdate);
				let today = new Date();
				let age = today.getFullYear() - birthdate.getFullYear();
				let monthDiff = today.getMonth() - birthdate.getMonth();

				if(birthdate == 'Invalid Date'){
					jQuery(".validation_dateofBirth_personal_info_check_error").remove();
					jQuery(".validation_dateofBirth_personal_info_check_success").remove();
					$('#dateofBirth_personal_info').css('border-color', '#F44336');
					$("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>Date of Birth is invalid</div>");
					$('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-35px !important; position: relative;left:-35px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
					
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
					$('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-35px !important; position: relative;left:-35px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
					
					jQuery('#BlockUIConfirm').show();
					jQuery('#BlockUIConfirm2').hide();
				}else if(age > 60) {
					jQuery(".validation_dateofBirth_personal_info").remove();
					jQuery(".validation_dateofBirth_personal_info_check_error").remove();
					jQuery(".validation_dateofBirth_personal_info_check_success").remove();
					$('#dateofBirth_personal_info').css('border-color', '#F44336');
					$("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info' style='opacity:0.7;color:#F44336;margin-top: 5px;font-size:13px;'>You must not be older than 60 years old.</div>");
					$('#dateofBirth_personal_info').after('<i class="fa fa-times-circle validation_dateofBirth_personal_info_check_error fa-lg" aria-hidden="true" style=" float: right;top:-35px !important; position: relative;left:-35px !important;color: #F44336;size:20px;z-index: 2 !important;"></i>');
					
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

		jQuery('#departure_date_itinerary').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm/dd/yy',
			minDate: '1d',
			maxDate:'20y',
			yearRange: '1910:9999'
		}).on('change', function(){
				jQuery('#departure_date_cruise_itinerary').val('');
				jQuery('#return_date_cruise_itinerary').val('');


				$("#covid_no").prop('checked', true);
				$("#cruise_no").prop('checked', true);
				$("#div_cruise").hide();

				$('#covid_period_title').hide();
				$('#covid_period_duration').hide();
				if(!jQuery('select').parent().hasClass('fake-select')){
					jQuery('select').wrap('<span class="fake-select"></span>');
				}
		});

		jQuery('#return_date_itinerary').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm/dd/yy',
			minDate: '1d',
			maxDate:'20y',
			yearRange: '1910:9999'
		}).on('change', function(){
				jQuery('#departure_date_cruise_itinerary').val('');
				jQuery('#return_date_cruise_itinerary').val('');

				$("#covid_no").prop('checked', true);
				$("#cruise_no").prop('checked', true);
				$("#div_cruise").hide();

				$('#destination_cruise').find("option:selected").attr("value");

				$('#covid_period_title').hide();
				$('#covid_period_duration').hide();

				if(!jQuery('select').parent().hasClass('fake-select')){
					jQuery('select').wrap('<span class="fake-select"></span>');
				}
		});

		jQuery('#bday_5thpage').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm/dd/yy',
			minDate: '-90y',
			maxDate:'0d',
			yearRange: '1910:9999'
		}).on('focus', function(){
				if(!jQuery('select').parent().hasClass('fake-select')){
					jQuery('select').wrap('<span class="fake-select"></span>');
				}
		});
		
		jQuery(document).ready(function($) {
			$('input[type=radio][name=include_agent]').change(function() {
				if (this.value == "Yes") {
					$("#agent_div").css("display", "block");
				}
				else if (this.value == "No") {
					$("#agent_div").css("display", "none");
				}
			});

			 $("#fromCopy").hide();
			$('input[type=radio][name=country_covid]').change(function() {
				if (this.value == "Yes") {
					$("#fromCopy").show();
				}
				else if (this.value == "No") {
					$("#fromCopy").hide();
				}
			});

		});
	 
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

		jQuery('#destination_itinerary').on('change', function() {
			var country_destination = $('#destination_itinerary').val();
			var url = jQuery('input[name="url"]').val();
			var urlpackage = url  + '/api/get-quote/itp-insurance/package';
			var destinations =jQuery('#destination_itinerary').val();
			var _token = jQuery('input[name="_token"]').val();
			jQuery.ajax({
						url: urlpackage,
						method:"GET",
						data:{ _token:_token,destinations:destinations},
						success:function(result)
						{
							   $('#package').html('');
								$('#package').append($('<option>', {
									value: "",
									text : "- Select Package -"
								}));


								jQuery.each(result.data, function(key, value){
								$('#package').append($('<option>', {
									value: value.package,
									text : value.package
								}));
							})
							jQuery('#package').selectpicker("refresh");
					}
			});
		});

		jQuery('#destination_cruise').on('change', function() {
			var country_destination = $('#destination_cruise').val();
			var url = jQuery('input[name="url"]').val();
			var urlpackage = url  + '/api/get-quote/itp-insurance/package';
			var destinations =$('#destination_cruise').val();
			var _token = jQuery('input[name="_token"]').val();

		jQuery.ajax({
				url: urlpackage,
				method:"GET",
				data:{ _token:_token,destinations:destinations},
				success:function(result)
				{

					if(result.continent === 'Y'){
						$('#package').html('');
							$('#package').append($('<option>', {
								value: "",
								text : "- Select Package -"
							}));


							jQuery.each(result.data, function(key, value){
							$('#package').append($('<option>', {
								value: value.package,
								text : value.package
							}));
							})
						jQuery('#package').selectpicker("refresh");
					}



				}
			});

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

		jQuery(function () {
			jQuery("#pwd_no_option").click(function () {
				if (jQuery(this).is(":checked")) {
					jQuery("#pwd_yes_option").prop("checked", false);
					jQuery('#PWD_DIV_').show();
				} else {
				   jQuery('#PWD_DIV_').hide();
				}
			});

			jQuery("#pwd_yes_option").click(function () {
				if (jQuery(this).is(":checked")) {
					jQuery("#pwd_no_option").prop("checked", false);
					   jQuery('#PWD_DIV_').hide();

				}
			});
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
			$('#covid_period_title').hide();
			$('#covid_period_duration').hide();

			$('#cruise_quote_div_1').hide();
			$('#cruise_quote_div_final').hide();
			$('#cruise_quote_div_1_page').hide();
			$('#cruise_quote_div_final_page').hide();
			$('.delete-row-destiney').hide();
			//For label  of cruise in  Travel Insurance
			$('#cruise_destination_header').hide();
			$('#cruise_destination_first').hide();
			$('#cruise_destination_start_first').hide();
			$('#cruise_destination_end_first').hide();
			//For label  of cruise in  Travel Insurance Final
			$('#cruise_destination_final_label').hide();
			$('#cruise_destination_final').hide();
			$('#cruise_destination_final_start').hide();
			$('#cruise_destination_final_end').hide();

			$('#withcovid_first').hide();
			$('#withcruise_first').hide();
			$('#withcovidcruise_first').hide();


			$('#withcovid_final').hide();
			$('#withcruise_final').hide();
			$('#withcovidcruise_final').hide();

			jQuery('#covid_quote_div_1').hide();
			jQuery('#warranty_div_title').hide();
			jQuery('#warranty_div_content').hide();


			$('#fromCopy').hide();
			$('#check_if_covid_label').hide();
			$('#check_if_covid_radio').hide();
			$('#covid_subjectivity').hide();


			jQuery('#covid_travel_info_header').hide();
			jQuery('#covid_travel_info_start').hide();
			jQuery('#covid_travel_info_end').hide();


			jQuery('#covid_travel_info_header_final').hide();
			jQuery('#covid_travel_info_start_final').hide();
			jQuery('#covid_travel_info_end_final').hide();

			jQuery('#PWD_DIV_').hide();


			jQuery('.delete-row-col-person-emergency').hide();
			jQuery('.delete-row-col-bene').hide();

		$('#covid_yes').click(function() {
			var departure_date_itinerary = $('#departure_date_itinerary').val();
			var return_date_itinerary = $('#return_date_itinerary').val();
			$('#check_if_covid_label').show();
			$('#check_if_covid_radio').show();
			$('#covid_subjectivity').show();
				var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
				if(noofday >= 15){
					noofday = noofday-1;
				}else{
					noofday;
				}
				//A
				if(noofday >= 15){
					$('#covid_period_title').show();
					$('#covid_period_duration').show();
					$('#warranty_div_title').show();
					$('#warranty_div_content').show();
					jQuery('#covid_quote_div_final_2').show();
			   
				}else{
				   if(noofday <= 15){
					$("#covid_period_yes").prop('checked', true);

				   }else{
					$('#covid_period_title').show();
					$('#covid_period_duration').show();
				   }
				}
				   jQuery('#covid_travel_info_header').show();
					jQuery('#covid_travel_info_start').show();
					jQuery('#covid_travel_info_end').show();

					jQuery('#covid_travel_info_header_final').show();
					jQuery('#covid_travel_info_start_final').show();
					jQuery('#covid_travel_info_end_final').show();

					$('#covid_coverage_list').show();
					$('#covid_assitance').text('Yes');

			});
			$('#covid_no').click(function() {
					$('#covid_period_title').hide();
					$('#covid_period_duration').hide();
					$('#warranty_div_title').hide();
					$('#warranty_div_content').hide();
					$('#fromCopy').hide();
					$('#check_if_covid_label').hide();
					$('#check_if_covid_radio').hide();
					$('#covid_subjectivity').hide();
					jQuery('#covid_quote_div_final_2').hide();
					$('#covid_assitance').text('No');
					jQuery('#covid_travel_info_header').hide();
					jQuery('#covid_travel_info_start').hide();
					jQuery('#covid_travel_info_end').hide();
					jQuery('#covid_travel_info_header_final').hide();
					jQuery('#covid_travel_info_start_final').hide();
					jQuery('#covid_travel_info_end_final').hide();
			});
			$('#cruise_yes').click(function() {
				$('#cruise_quote_div_1').show();
				$('#cruise_quote_div_final').show();
				$('#cruise_quote_div_1_page').show();
				$('#cruise_quote_div_final_page').show();
				$('#withcruise_first').show();
				$('#withcruise_final').show();
				$('#cruise_coverage_list').show();
				$('#cruise_destination').text('Yes');
				jQuery("#departure_date_cruise_itinerary").datepicker("destroy");
				jQuery("#return_date_cruise_itinerary").datepicker("destroy");
					var dateStart = $('#departure_date_itinerary').val();
					var currentTime = new Date(dateStart);
					var minDateVal = new Date(currentTime.getFullYear(), currentTime.getMonth(), currentTime.getDate()); //current date
					var dateEnd = $('#return_date_itinerary').val();
					var currentTimedateEnd = new Date(dateEnd);
					var maxDateVal = new Date(currentTimedateEnd.getFullYear(), currentTimedateEnd.getMonth(), currentTimedateEnd.getDate()); //current date
					jQuery('#departure_date_cruise_itinerary').datepicker({
						dateFormat: 'mm/dd/yy',
						changeMonth: true,
						changeYear: true,
						yearRange: '1910:9999',
						minDate: minDateVal,
						maxDate: maxDateVal,
						inline: true
					}).on('focus', function(){

							if(!jQuery('select').parent().hasClass('fake-select')){
								jQuery('select').wrap('<span class="fake-select"></span>');
							}
					});

					jQuery('#return_date_cruise_itinerary').datepicker({
						changeMonth: true,
						changeYear: true,
						dateFormat: 'mm/dd/yy',
						minDate: minDateVal,
						maxDate: maxDateVal,
						yearRange: '1910:9999'
					}).on('focus', function(){
							if(!jQuery('select').parent().hasClass('fake-select')){
								jQuery('select').wrap('<span class="fake-select"></span>');
							}
					});


				});
				$('#cruise_no').click(function() {

					$('#cruise_quote_div_1').hide();
					$('#cruise_quote_div_final').hide();
					$('#cruise_quote_div_1_page').hide();

					$('#cruise_quote_div_final_page').hide();
					$('#cruise_destination').text('No');
				});

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
		btnback     = $(".back");
		btnsubmit   = $(".submit");
		btnNew      = $(".NewApplicant");
		btncheck    = $(".CheckCoverage");
		btnAdd      = $(".addApplicant");
		btnNextPage = $(".next_2ndpage");
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
		// Next button click action
		btnnext.click(function(){
			if(current < widget.length) {
				btnback.show();
				//coverage
				errornumber = 0;
				var action = "";
				var status = "Success";
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

					 $(".validation_dateofBirth_personal_info").remove();
					 $(".validation_dateofBirth_personal_info_check_error").remove();
					 $(".validation_dateofBirth_personal_info_check_success").remove();

					 $(".validation_email_personal_info").remove();
					 $(".validation_email_personal_info_check_error").remove();
					 $(".validation_email_personal_info_check_success").remove();

					 $(".validation_tel_no_info").remove();
					 $(".validation_tel_no_info_check_error").remove();
					 $(".validation_tel_no_info_check_success").remove();

					 $(".validation_contactNo_personal_info").remove();
					 $(".validation_contactNo_personal_info_check_error").remove();
					 $(".validation_contactNo_personal_info_check_success").remove();

					 $(".validation_salutation_personal_info").remove();
					 $(".validation_salutation_personal_info_check_error").remove();
					 $(".validation_salutation_personal_info_check_success").remove();

					 if($('#firstName_personal_info').val() == ""){
							$("#firstName_personal_info").after("<div class='validation_firstName_personal_info v-error-msg'>First Name is empty</div>");
						 $('#firstName_personal_info').fieldErrorState();
							errornumber = 1;
							action = action + "First name is empty. ";
							status = "Failed";
					 }else{
						 $('#firstName_personal_info').fieldSuccessState();
						}

						if($('#middleName_personal_info').val() == ""){
								$("#middleName_personal_info").after("<div class='validation_middleName_personal_info v-error-msg'>Middle Name is empty</div>");
							 $('#middleName_personal_info').fieldErrorState();
								 errornumber = 1;
								action = action + "Middle name is empty. ";
								status = "Failed";
						 }else{
							 $('#middleName_personal_info').fieldSuccessState();
						}

						if($('#lastName_personal_info').val() == ""){
								$("#lastName_personal_info").after("<div class='validation_lastName_personal_info v-error-msg'>Last Name is empty</div>");
							 $('#lastName_personal_info').fieldErrorState();
								 errornumber = 1;
								action = action + "Last name is empty. ";
								status = "Failed";
						 }else{
							 $('#lastName_personal_info').fieldSuccessState();
						}

						if($('#dateofBirth_personal_info').val() == ""){
								$("#dateofBirth_personal_info").after("<div class='validation_dateofBirth_personal_info v-error-msg'>Date of Birth is empty</div>");
							 $('#dateofBirth_personal_info').fieldErrorState();
								 errornumber = 1;
								action = action + "Date of Birth is empty. ";
								status = "Failed";
						 }else{
							 $('#dateofBirth_personal_info').fieldSuccessState();
						}

						if($('#email_personal_info').val() == ""){
								$("#email_personal_info").after("<div class='validation_email_personal_info v-error-msg'>Email address is empty</div>");
								$("#email_personal_info").fieldErrorState();
								errornumber = 1;
								action = action + "Email address is empty. ";
								status = "Failed";
						 }else{
							 if(IsEmail($('#email_personal_info').val())==false){
									$("#email_personal_info").after("<div class='validation_email_personal_info v-error-msg'>Invalid format</div>");
									$("#email_personal_info").fieldErrorState();
									errornumber = 1;
								action = action + "Email address is invalid. ";
								status = "Failed";
								}else{
									$("#email_personal_info").fieldSuccessState();
								}
						 }

						   if ($('#tel_no_info').val() || $('#contactNo_personal_info').val()) {
							  
								$('#contactNo_personal_info').fieldSuccessState();
								$('#tel_no_info').fieldSuccessState();
							} else {
							// Display an error message
								if (!$('#tel_no_info').val()) {
									$("#tel_no_info").after("<div class='validation_tel_no_info v-error-msg'>Telephone Number is empty</div>");
									$('#tel_no_info').fieldErrorState();
								}
								if (!$('#contactNo_personal_info').val()) {
									$("#contactNo_personal_info").after("<div class='validation_contactNo_personal_info v-error-msg'>Mobile Number is empty</div>");
									$('#contactNo_personal_info').fieldErrorState();
								}
								errornumber = 1;
								action = action + "Mobile Number is empty. ";
								status = "Failed";
							}



						if($('#salutation_personal_info').val() == ""){
								$("#salutation_personal_info").after("<div class='validation_salutation_personal_info v-error-msg'>Salutation is empty</div>");
							 $('#salutation_personal_info').fieldErrorState();
								 errornumber = 1;
								action = action + "Salutation is empty. ";
								status = "Failed";
						 }else{
							 $('#salutation_personal_info').fieldSuccessState();
						}


						 if(errornumber == 1){
							 return false;
						 }

							var quotename = $('#firstName_personal_info').val() + " " + $('#middleName_personal_info').val() +" " + $('#lastName_personal_info').val();
							var quote_tel_no = $('#tel_no_info').val();
							var quote_mobile_no = $('#contactNo_personal_info').val();
							var quote_email = $('#email_personal_info').val();
							var bday = $('#dateofBirth_personal_info').val();
							var ddate_itinerary = $('#departure_date_itinerary').val();


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
						if(status == "Success"){
							var action = "Open 2nd Page";
						}
				}

				if(current == 3){
					$('#quote_start_date').text($('#departure_date_itinerary').val());
					$('#fname_4thpage').val($('#firstName_personal_info').val());
					$('#lname_4thpage').val($('#lastName_personal_info').val());
					$('#mname_4thpage').val($('#middleName_personal_info').val());
					$('#dateofbirth_4thpage').val($('#dateofBirth_personal_info').val());
					if(status == "Success"){
						var action = "Open 4th Page";
					}
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
					 errornumber = 0;
					 if($('#salutation_personal_info').val() == ""){
						$("#salutation_personal_info").after("<div class='validation_salutation_personal_info v-error-msg'>Salutation is empty</div>");
						 $('#salutation_personal_info').fieldErrorState();
							errornumber = 1;
								action = action + "Salutation is empty. ";
								status = "Failed";
					 }else{
						 $('#salutation_personal_info').fieldSuccessState();
						}


						if($('#status_4thpage').val() == ""){
							$("#status_4thpage").after("<div class='validation_status_4thpage v-error-msg'>Status is empty</div>");
							 $('#status_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "Status is empty. ";
								status = "Failed";
						 }else{
							 $('#status_4thpage').fieldSuccessState();
						}


						if($('#gender_4thpage').val() == ""){
							$("#gender_4thpage").after("<div class='validation_gender_4thpage v-error-msg'>Gender is empty</div>");
							 $('#gender_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "Gender is empty. ";
								status = "Failed";
						 }else{
							 $('#gender_4thpage').fieldSuccessState();
						}

						if($('#placeofbirth_4thpage').val() == ""){
							$("#placeofbirth_4thpage").after("<div class='validation_placeofbirth_4thpage v-error-msg'>Place of birth is empty</div>");
							 $('#placeofbirth_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "Place of birth is empty. ";
								status = "Failed";
						 }else{
							 $('#placeofbirth_4thpage').fieldSuccessState();
						}

						if($('#sourceofFunds_4thpage').val() == ""){
							$("#sourceofFunds_4thpage").after("<div class='validation_sourceofFunds_4thpage v-error-msg'>Source of funds is empty</div>");
							 $('#sourceofFunds_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "Source of funds is empty. ";
								status = "Failed";
						 }else{
							 $('#sourceofFunds_4thpage').fieldSuccessState();
						}

						if($('#occupation_4thpage').val() == ""){
							$("#occupation_4thpage").after("<div class='validation_occupation_4thpage v-error-msg'>Occupation is empty</div>");
							 $('#occupation_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "Occupation is empty. ";
								status = "Failed";
						 }else{
							 $('#occupation_4thpage').fieldSuccessState();
						}

						if($('#tin_4thpage').val() == ""){
							$("#tin_4thpage").after("<div class='validation_tin_4thpage v-error-msg'>TIN no. is empty</div>");
							 $('#tin_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "TIN no. is empty. ";
								status = "Failed";
						 }else{
							 $('#tin_4thpage').fieldSuccessState();
						}

						if($('#employeer_4thpage').val() == ""){
							$("#employeer_4thpage").after("<div class='validation_employeer_4thpage v-error-msg'>Employeer is empty</div>");
							 $('#employeer_4thpage').fieldErrorState();
								errornumber = 1;
								action = action + "Employeer is empty. ";
								status = "Failed";
						 }else{
							 $('#employeer_4thpage').fieldSuccessState();
						}

						if($('#residence_address').val() == ""){
							$("#residence_address").after("<div class='validation_residence_address v-error-msg'>Address is empty</div>");
							 $('#residence_address').fieldErrorState();
								errornumber = 1;
								action = action + "Address is empty. ";
								status = "Failed";
						 }else{
							 $('#residence_address').fieldSuccessState();
						}

						if($('#residence_province').val() == ""){
							$("#residence_province").after("<div class='validation_residence_province v-error-msg'>Province is empty</div>");
							 $('#residence_province').fieldErrorState();
								errornumber = 1;
								action = action + "Province is empty. ";
								status = "Failed";
						 }else{
							 $('#residence_province').fieldSuccessState();
						}

						if($('#residence_municipality').val() == ""){
							$("#residence_municipality").after("<div class='validation_residence_municipality v-error-msg'>Municipality is empty</div>");
							 $('#residence_municipality').fieldErrorState();
								errornumber = 1;
								action = action + "Municipality is empty. ";
								status = "Failed";
						 }else{
							 $('#residence_municipality').fieldSuccessState();
						}

						if($('#residence_barangay').val() == ""){
							$("#residence_barangay").after("<div class='validation_residence_barangay v-error-msg'>Barangay is empty</div>");
							 $('#residence_barangay').fieldErrorState();
								errornumber = 1;
								action = action + "Barangay is empty. ";
								status = "Failed";
						 }else{
							 $('#residence_barangay').fieldSuccessState();
						}

						if($('#mailing_address').val() == ""){
							$("#mailing_address").after("<div class='validation_mailing_address v-error-msg'>Address is empty</div>");
							 $('#mailing_address').fieldErrorState();
								errornumber = 1;
								action = action + "Address is empty. ";
								status = "Failed";
						 }else{
							 $('#mailing_address').fieldSuccessState();
						}

						if($('#mailing_province').val() == ""){
							$("#mailing_province").after("<div class='validation_mailing_province v-error-msg'>Province is empty</div>");
							 $('#mailing_province').fieldErrorState();
								errornumber = 1;
								action = action + "Province is empty. ";
								status = "Failed";
						 }else{
							 $('#mailing_province').fieldSuccessState();
						}

						if($('#mailing_municipality').val() == ""){
							$("#mailing_municipality").after("<div class='validation_mailing_municipality v-error-msg'>Municipality is empty</div>");
							 $('#mailing_municipality').fieldErrorState();
								errornumber = 1;
								action = action + "Municipality is empty. ";
								status = "Failed";
						 }else{
							 $('#mailing_municipality').fieldSuccessState();
						}

						if($('#mailing_barangay').val() == ""){
							$("#mailing_barangay").after("<div class='validation_mailing_barangay v-error-msg'>Barangay is empty</div>");
							 $('#mailing_barangay').fieldErrorState();
								errornumber = 1;
								action = action + "Barangay is empty. ";
								status = "Failed";
						 }else{
							 $('#mailing_barangay').fieldSuccessState();
						}






						if(errornumber == 1){
							 return false;
						 }
						if(status == "Success"){
							var action = "Open 5th Page";
						}

				}

				if(current == 5){
						errornumber = 0;
						cruise = $('input[name="include_cruise"]:checked').val();
						covid = $('input[name="include_covid"]:checked').val();
						 updateExchangeRate2();//Added 03112024
						if(covid==='Yes'){
							$('#withcovid_final_coverage').show();
						}else{
							$('#withcovid_final_coverage').hide();
						}
						if(cruise=='Yes'){
							$('#withcruise_final_coverage').show();
						}else{
							$('#withcruise_final_coverage').hide();
						}

						if(cruise == 'Yes' && covid=='Yes'){
							jQuery('#withcovid_final_coverage').hide();
							jQuery('#withcruise_final_coverage').hide();
							jQuery('#withcovidcruises_final_coverage').show();
						}
						$('input[name^="relation_bene_5thpage"]').each(function(){
						  if($('#'+ this.id).val() == ""){
									$('#'+ this.id).fieldErrorState();
									errornumber = 1;
									action = action + "Emergency relation is empty. ";
									status = "Failed";
							 }else{
									$('#'+ this.id).fieldSuccessState();
							}
						});

						$('input[name^="name_5thpage"]').each(function(){
						  if($('#'+ this.id).val() == ""){
									$('#'+ this.id).fieldErrorState();
									errornumber = 1;
									action = action + "Emergency name is empty. ";
									status = "Failed";
							 }else{
									$('#'+ this.id).fieldSuccessState();
							}
						});

						$('input[name^="name_bene_5thpage"]').each(function(){
							if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();
								errornumber = 1;
								action = action + "Beneficiaries name is empty. ";
								status = "Failed";
							 }else{
								 $('#'+ this.id).fieldSuccessState();
							}
						});


						$('input[name^="contact_5thpage"]').each(function(){
							if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();
								errornumber = 1;
								action = action + "Emergency contact is empty. ";
								status = "Failed";
							 }else{
								 $('#'+ this.id).fieldSuccessState();
							}
						});

						$('input[name^="relation_5thpage"]').each(function(){
							if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();
								errornumber = 1;
								action = action + "Emergency relation is empty. ";
								status = "Failed";
							 }else{
								 $('#'+ this.id).fieldSuccessState();
							}
						});

						$('input[name^="bday_5thpage"]').each(function(){
							if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();
								errornumber = 1;
								action = action + "Emergency bday is empty. ";
								status = "Failed";
							 }else{
								 $('#'+ this.id).fieldSuccessState();
							}
						});

						$('select[name^="status_5thpage"]').each(function(){
							if($('#'+ this.id).val() == ""){
								$('#'+ this.id).fieldErrorState();
								errornumber = 1;
								action = action + "Emergency status is empty. ";
								status = "Failed";
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
											action = action + "Type of Disabililty is empty. ";
											status = "Failed";
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
											action = action + "Year of Disablement is empty. ";
											status = "Failed";
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
											action = action + "Cause of Disability is empty. ";
											status = "Failed";
											}else{
												$('#cause_of_disability').fieldSuccessState();
										}
				  }
					} else {
										errornumber = 1;
										action = action + "I also declare that I am in good health and that. ";
										status = "Failed";
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
									action = action + "Agent name is empty. ";
									status = "Failed";
								}else{
									$('#agent_name').fieldSuccessState();
								}
							}

					  var include_covid_country = $('input[name="country_covid"]:checked').val();
						if(include_covid_country == "Yes"){
										$('#file-upload').change(function() {
											var i = $(this).prev('label').clone();
											var file = $('#file-upload')[0].files[0].name;
											if (this.files[0].size > 5000000) {
												$("#upload_Error").html("File size must not be greater than 5MB.");
												$("#upload_Error").show();
												$("#upload_label").hide();
												$("#upload_file").hide();
												$('#file-upload').val("");
												errornumber = 1;
												action = action + "size must not be greater than 5MB. ";
											   status = "Failed";
											}else{
												$("#upload_Error").hide();
												$("#upload_file").show();
												$("#upload_label").hide();
												$("#upload_file_file").empty();
												$("#upload_file_file").html(file);
											}
										});

									if($('#file-upload').val() == ""){
									   $("#upload_Error").html("Please upload your COVID-19 Testing Protocols");
										$("#upload_Error").show();
										$("#upload_label").hide();
										$("#upload_file").hide();
										errornumber = 1;
										action = action + "Please upload your COVID-19 Testing Protocols. ";
										status = "Failed";
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
			var _token = jQuery('input[name="_token"]').val();
			var url = jQuery('input[name="url"]').val();
			var promo = "";
			promo = $('#promo').val();

			$('#promo_tr').hide();
			$('#final_promo_tr').hide();
			$('#amountdue_tr_3rdpage').hide();
			$('#promo_tr_3rdpage').hide();
			$('#amountdue_tr').hide();

			var departure_date_itinerary = $('#departure_date_itinerary').val();
			var package = $('#package').val();
			$("#package_quote_summny").text(package);
			$("#package_quote_summny_final").text(package);
			$("#package_quote_summny_final_travel_info").text(package);
			$("#package_quote_summny_final_travel_info_all").text(package);

			return_date_itinerary = $('#return_date_itinerary').val();
			cruise = $('input[name="include_cruise"]:checked').val();
			covid = $('input[name="include_covid"]:checked').val();
			var departure_date_cruise_itinerary = $('#departure_date_cruise_itinerary').val();
			var return_date_cruise_itinerary = $('#return_date_cruise_itinerary').val();

			if(covid=='Yes'){
				$('#withcovid_first').show();
				$('#withcovid_final_coverage').show();
			}else{
				$('#withcovid_first').hide();
				$('#withcovid_final').hide();
				jQuery('#withcovidcruise_first').hide();
				jQuery('#withcovidcruises_final_coverage').hide();
			}
			if(cruise=='Yes'){
				$('#withcruise_first').show();
				$('#withcruise_final_coverage').show();

				$('#cruise_destination_header').show();
				$('#cruise_destination_first').show();
				$('#cruise_destination_start_first').show();
				$('#cruise_destination_end_first').show();
				$('#cruise_destination_label').show();

				$('#cruise_destination_final_label').show();
				$('#cruise_destination_final').show();
				$('#cruise_destination_final_start').show();
				$('#cruise_destination_final_end').show();

				const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];

					var cd = new Date(departure_date_cruise_itinerary),
					cmonth = '' + (cd.getMonth()+ 1),
					cday = '' + cd.getDate(),
					cyear = cd.getFullYear();

					var cr = new Date(return_date_cruise_itinerary),
					month_cr = '' + (cr.getMonth()+ 1),
					day_cr = '' + cr.getDate(),
					year_cr = cr.getFullYear();


					var departurecruise = monthNames[cd.getMonth()]+ ' ' +  cday + ', ' + cyear;
					var returncruise = monthNames[cr.getMonth()]+ ' ' +  day_cr + ', ' + year_cr;
					$('#quotecruise_start_date').text(departurecruise);
					$('#quotecruise_end_date').text(returncruise);


				$('#quotecruise_start_date_all').val(departurecruise);
				// $('#quotecruise_end_date').text(return_date_cruise_itinerary);
				$('#quotecruise_end_date_all').val(returncruise);


				$('#quotecruise_start_date_final').text(departurecruise);
				$('#quotecruise_end_date_final').text(returncruise);


			}else{
				$('#withcruise_first').hide();
				$('#withcruise_final').hide();
				jQuery('#withcovidcruise_first').hide();
				jQuery('#withcovidcruises_final_coverage').hide();
				$('#cruise_destination_header').hide();
				$('#cruise_destination_first').hide();
				$('#cruise_destination_start_first').hide();
				$('#cruise_destination_end_first').hide();

				$('#cruise_destination_final_label').hide();
				$('#cruise_destination_final').hide();
				$('#cruise_destination_final_start').hide();
				$('#cruise_destination_final_end').hide();


				$('#quotecruise_start_date').text('');
				$('#quotecruise_start_date_all').val('');
				$('#quotecruise_end_date').text('');
				$('#quotecruise_end_date_all').val('');

				$('#quotecruise_start_date_final').text('');
				$('#quotecruise_end_date_final').text('');

			}


			if(cruise == 'Yes' && covid=='Yes'){
				jQuery('#withcovid_first').hide();
				jQuery('#withcovid_final_coverage').hide();
				jQuery('#withcruise_first').hide();
				jQuery('#withcruise_final_coverage').hide();
				jQuery('#withcovidcruise_first').show();
				jQuery('#withcovidcruises_final_coverage').show();

			}




			noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
			noofday = noofday + 1;
			destinations ="";
			$('select[name^="destination_itinerary"]').each(function(){
				if( $(this).val() != ""){
					if(destinations == ""){
						destinations =  $(this).val();
					}else{
						destinations = destinations + ','+ $(this).val();
					}
				}
			});

			destinations_cruise ="";
			$('select[name^="destination_cruise"]').each(function(){
				if( $(this).val() != ""){
					if(destinations_cruise == ""){
						destinations_cruise =  $(this).val();
					}else{
						destinations_cruise = destinations_cruise + ','+ $(this).val();
					}
				}
			});
			$(".validation_promo").remove();
			$(".validation_promo_check_error").remove();
			$(".validation_promo_check_success").remove();

			var errornumber = 0;
			var action = "";
			var status = "Success";
			if(promo != ""){
				urlpromo = url  + '/api/get-quote/itp-insurance/promo';
				$.ajax({
					url: urlpromo,
					method:"GET",
					data:{ _token:_token,promo:promo},
					success:function(result){
						$.each(result, function(key, valuepromo){				

								$(".validation_promo").remove();
								$(".validation_promo_check_error").remove();
								$(".validation_promo_check_success").remove();

								$(".validation_departure_date_itinerary").remove();
								$(".validation_departure_date_itinerary_check_error").remove();
								$(".validation_departure_date_itinerary_check_success").remove();

								$(".validation_return_date_itinerary").remove();
								$(".validation_return_date_itinerary_check_error").remove();
								$(".validation_return_date_itinerary_check_success").remove();

								$(".validation_departure_date_cruise_itinerary").remove();
								$(".validation_departure_date_cruise_itinerary_check_error").remove();
								$(".validation_departure_date_cruise_itinerary_check_success").remove();

								$(".validation_return_date_cruise_itinerary").remove();
								$(".validation_return_date_cruise_itinerary_check_error").remove();
								$(".validation_return_date_cruise_itinerary_check_success").remove();



								if($('#departure_date_itinerary').val() == ""){
									$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg' style='color:#CF3C4B'>From place of residence is empty</div>");
									$('#departure_date_itinerary').fieldErrorState();
									errornumber = 1;
									action = action + "From place of residence is empty. ";
									status = "Failed";
								}else{
									$('#departure_date_itinerary').fieldSuccessState();
								}

								if($('#return_date_itinerary').val() == ""){
									$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>To place of residence is empty</div>");
									$('#return_date_itinerary').fieldErrorState();
									errornumber = 1;
									action = action + "To place of residence is empty. ";
									status = "Failed";
								}else{
									$('#return_date_itinerary').fieldSuccessState();
								}


								var from = $("#departure_date_itinerary").val();
								var to = $("#return_date_itinerary").val();

								var from_cruise = $("#departure_date_cruise_itinerary").val();
								var to_cruise = $("#return_date_cruise_itinerary").val();

								if(Date.parse(from_cruise) > Date.parse(to_cruise)){
									errornumber = 1;
									action = action + "Return cruise date should later than the departure cruise date2. ";
									status = "Failed";
								//$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
									//$('#departure_date_itinerary').fieldErrorState();
									$("#return_date_cruise_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>Return cruise date should later than the departure cruise date2 </div>");
									$('#return_date_cruise_itinerary').fieldErrorState();
								}

								if(Date.parse(from) > Date.parse(from_cruise) || Date.parse(to) < Date.parse(from_cruise)){
									errornumber = 1;
									action = action + "departure cruise date should be in between of departure date. ";
									status = "Failed";
								//$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
									//$('#departure_date_itinerary').fieldErrorState();
									$("#departure_date_cruise_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>departure cruise date should be in between of departure date </div>");
									$('#departure_date_cruise_itinerary').fieldErrorState();
								}else{
									$('#departure_date_cruise_itinerary').fieldSuccessState();
								}

								if(Date.parse(from) > Date.parse(to_cruise) || Date.parse(to) < Date.parse(to_cruise)){
									errornumber = 1;
									action = action + "Return cruise date should be in between of departure date. ";
									status = "Failed";
								//$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
									//$('#departure_date_itinerary').fieldErrorState();
									$("#return_date_cruise_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>Return cruise date should be in between of departure date </div>");
									$('#return_date_cruise_itinerary').fieldErrorState();
								}else{
									$('#return_date_cruise_itinerary').fieldSuccessState();
								}

								var from = $("#departure_date_itinerary").val();
								var to = $("#return_date_itinerary").val();

								if(Date.parse(from) > Date.parse(to)){
									errornumber = 1;
									action = action + "Return date should later than the departure date2. ";
									status = "Failed";
								//$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
									//$('#departure_date_itinerary').fieldErrorState();
									$("#return_date_cruise_itinerary").after("<div class='validation_return_date_cruise_itinerary v-error-msg' style='color:#CF3C4B'>Return date should later than the departure date2 </div>");
									$('#return_date_cruise_itinerary').fieldErrorState();
								}


								var noofdays = datediff(parseDate(from), parseDate(to));
								if(noofdays >= 180){
									errornumber = 1;
									action = action + "Travel duration should not exceed 180 days. ";
									status = "Failed";
									$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>Travel duration should not exceed 180 days</div>");
									$('#return_date_itinerary').fieldErrorState();
								}


								$('select[name^="package"]').each(function(){
									if($('#'+ this.id).val() == ""){
										$('#'+ this.id).fieldErrorState();
										errornumber = 1;
										action = action + "No Package selected. ";
										status = "Failed";
									}else{
										$('#'+ this.id).fieldSuccessState();
									}
								});


								if( $('#cruise_yes').is(':checked') || $('#cruise_no').is(':checked') ){
									$('#cruise_label_title').text('Cruise Coverage');
									$('#cruise_label_title_span').css('color', '#373737');
									$('#cruise_label_title').css('color', '#373737');
									$('#cruise_yes_label').css('color', '#373737');
									$('#cruise_no_label').css('color', '#373737');
								}else{
									errornumber = 1;
									action = action + "No Cruise selected. ";
									status = "Failed";
									$('#cruise_label_title').text('Cruise Coverage');
									$('#cruise_label_title_span').css('color', '#b94a48');
									$('#cruise_label_title').css('color', '#b94a48');
									$('#cruise_yes_label').css('color', '#b94a48');
									$('#cruise_no_label').css('color', '#b94a48');
								}
								if( $('#cruise_yes').is(':checked')){
									$('select[name^="destination_cruise"]').each(function(){
										if($('#'+ this.id).val() == ""){
											$('#'+ this.id).fieldErrorState();
											errornumber = 1;
											action = action + "No Cruise selected. ";
											status = "Failed";
										}else{
											$('#'+ this.id).fieldSuccessState();
										}
									});
								}

								if( $('#covid_yes').is(':checked') || $('#covid_no').is(':checked') ){
									$('#covid_label_title').text('COVID-19 Assist Coverage');
									$('#covid_label_title_span').css('color', '#373737');
									$('#covid_label_title').css('color', '#373737');
									$('#covid_yes_label').css('color', '#373737');
									$('#covid_no_label').css('color', '#373737');


								}else{
									errornumber = 1;
									action = action + "No COVID Selected. ";
									status = "Failed";
									$('#covid_label_title').text('COVID-19 Assist Coverage*');
									$('#covid_label_title_span').css('color', '#b94a48');
									$('#covid_label_title').css('color', '#b94a48');
									$('#covid_yes_label').css('color', '#b94a48');
									$('#covid_no_label').css('color', '#b94a48');
								}

								if( $('#covid_yes').is(':checked')){
									if( $('#covid_period_yes').is(':checked') || $('#covid_period_no').is(':checked') ){
											$('#covid_label_title_period').css('color', '#373737');
											$('#covid_period_title').css('color', '#373737');
											$('#covid_period_day_trip').css('color', '#373737');
											$('#covid_period_trip').css('color', '#373737');
										}else{
											errornumber = 1;
											action = action + "No COVID selected. ";
											status = "Failed";
											$('#covid_label_title_period').css('color', '#b94a48');
											$('#covid_period_title').css('color', '#b94a48');
											$('#covid_period_day_trip').css('color', '#b94a48');
											$('#covid_period_trip').css('color', '#b94a48');
										}
								}
								
								if(result == 0 || result.length == ""){
									$(".validation_promo").remove();
									$(".validation_promo_check_error").remove();
									$(".validation_promo_check_success").remove();
									$("#promo").after("<div style='color:#CF3C4B' class='validation_promo v-error-msg'>Invalid promo code</div>");
									$('#promo').fieldErrorState();
									return false;
								}else{
										$('#promo').fieldSuccessState();

								departure_date_itinerary = $('#departure_date_itinerary').val();
								var package = $('#package').val();
								return_date_itinerary = $('#return_date_itinerary').val();
								include_cruise = $('input[name="include_cruise"]:checked').val();
								covid = $('input[name="include_covid"]:checked').val();
								covid_period = $('input[name="covid_period"]:checked').val();
								var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
								noofday = noofday + 1;
								$('#less').text("");
								$('#promo_tr').hide();
								$('#final_promo_tr').hide();
								$('#amountdue_tr').hide();
								$('#final_amountdue_tr').hide();
								if(include_cruise == 'Yes'){
								destinations_cruise ="";
								$('select[name^="destination_cruise"]').each(function(){
									if( $(this).val() != ""){
										if(destinations_cruise == ""){
											destinations_cruise =  $(this).val();
										}else{
											destinations_cruise = destinations_cruise +','+ $(this).val();
										}
									}
								});
								}else{
									destinations_cruise ="";
								}
								destinations ="";

								$('select[name^="destination_itinerary"]').each(function(){

									if( $(this).val() != ""){
										if(destinations == ""){
											destinations =  $(this).val();
										}else{
											destinations = destinations +','+ $(this).val();
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
								$('#covid_start_date').text(departure);
								$('#covid_start_date_final').text(departure);

								jQuery('input[name="quote_end_date_all"]').val(returndate);
								$('#quote_end_date').text(returndate);
								$('#quote_end_date_final').text(returndate);

								if(covid_period ==='Yes'){
									//var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
									var covid_no_of_days =noofday - 1;
									if(covid_no_of_days >= 16){
												var covidrDate = new Date($('#departure_date_itinerary').val());
												var date_fiftheen = covidrDate.setDate(covidrDate.getDate() + 15);
												var covidr = new Date(date_fiftheen),
												month_covid = '' + (covidr.getMonth() + 1),
												day_covid = '' +  (covidr.getDate() - 1) ,
												year_covid = covidr.getFullYear();
												var returndate = monthNames[covidr.getMonth()]+ ' ' +  day_covid + ', ' + year_covid;
												var returndateval = year_covid + '-' +  month_covid + '-' + day_covid;
												$('#covid_return').val(returndateval);
												// noofday = noofday + 1; 
									}else{
											if(noofdays < 14){
											var covidrDate = new Date($('#return_date_itinerary').val());
											$('#covid_return').val(return_date_itinerary);
											}else{
											var covidrDate = new Date($('#departure_date_itinerary').val());
											// Add 15 days to specified date
											var date_fiftheen = covidrDate.setDate(covidrDate.getDate() + 15);
											var covidr = new Date(date_fiftheen),
											month_covid = '' + (covidr.getMonth()+ 1),
											day_covid = '' +  (covidr.getDate() - 1),
											year_covid = covidr.getFullYear();
											var returndate = monthNames[covidr.getMonth()]+ ' ' +  day_covid + ', ' + year_covid;
											var returndateval = year_covid + '-' +  month_covid + '-' + day_covid;
											$('#covid_return').val(return_date_itinerary);
											// noofday = noofday + 1; 
										}
									}
								}else{
									var covidr = new Date($('#return_date_itinerary').val()),
									month_covid = '' + (covidr.getMonth()+ 1),
									day_covid = '' + covidr.getDate(),
									year_covid = covidr.getFullYear();
									var returndate = monthNames[covidr.getMonth()]+ ' ' +  day_covid + ', ' + year_covid;
									var returndateval = year_covid + '-' +  month_covid + '-' + day_covid;
									$('#covid_return').val(returndateval);
								}
									$('#covid_end_date').text(returndate);
									$('#covid_end_date_final').text(returndate);
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
									jQuery('input[name="quoteprovince_all_cruise"]').val(destinations_cruise);
									$('#quoteprovincecruise').text(destinations_cruise);
									$('#quotecruise_final_provincecruise').text(destinations_cruise);
									urlprem = url  + '/api/get-quote/itp-insurance/get-prem';
										$.ajax({
											url: urlprem,
											method:"GET",
											data:{ _token:_token,noofday:noofday,include_cruise:include_cruise,package:package,destinations:destinations,destinations_cruise:destinations_cruise,covid:covid},
											error: function(data){
											var errors = data.responseJSON;
											jQuery.each(data, function(key, value){

											});
										},
											success:function(result)
											{
												var data = result.data_prem;
												var myObject = result;
												var dataPremTravel = myObject.data_prem_travel;
												var dataPremLiability = myObject.data_prem_liability;
												var dataPremBurialBenefits = myObject.data_prem_burial_benefits;
												var dataadd = myObject.data_prem_add;
												var myObjectString = JSON.stringify(dataPremTravel);
												var myObjectStringLiability = JSON.stringify(dataPremLiability);
												var myObjectStringBurialBenefits = JSON.stringify(dataPremBurialBenefits);
												var myObjectStringadd = JSON.stringify(dataadd);
												var myObject = JSON.parse(myObjectString);
												var myObjectliability = JSON.parse(myObjectStringLiability);
												var myObjectburialbenefits= JSON.parse(myObjectStringBurialBenefits);
												var myObjectadd= JSON.parse(myObjectStringadd);

												var parameterNames = Object.keys(myObject[0]);
												var parameterNamesliability = Object.keys(myObjectliability[0]);
												var parameterNamesburialbenefits = Object.keys(myObjectburialbenefits[0]);
												var parameterNamesadd = Object.keys(myObjectadd[0]);

												var finalTravelAssistance = myObject[0][parameterNames[0]];
												var finalliability= myObjectliability[0][parameterNamesliability[0]];
												var finalburialbenefits= myObjectburialbenefits[0][parameterNamesburialbenefits[0]];
												var finaladd= myObjectadd[0][parameterNamesadd[0]];
												$('#travel_assistance').val(finalTravelAssistance);
												$('#liability_assistance').val(finalliability);
												$('#burialbenefits_assistance').val(finalburialbenefits);
												$('#add').val(finaladd);
												$.each(data, function(key, value){
													var continent = value.continent;
													var noofdaysorig = value.days;
														if(data.length == 0){
														}else{

																var prem = "";

																if (package == "Economy"){
																	prem = value.economy_individual;
																	prem_one = '10,000 US$';
																	prem_two = '250 US$';
																	dst = 2.00;

																	travel_0= '20,000 US$';
																	travel_1= '200 US$';
																	travel_1_1='1,000 US$ (ded. 100US$)';
																	travel_1_2='20,000 US$';
																	travel_2= 'Travel cost plus up 100 US$/day maximum 1,000US$';
																	travel_3='1,000 US$';
																	travel_4='3,000 US$';
																	travel_5='3,000 US$';
																	travel_6='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																	travel_7='200 US$';
																	travel_8='200 US$';
																	travel_9='40 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 40US$)';
																	travel_10='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	travel_11='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	travel_12='250 US$';
																	travel_13='250 US$';
																	cruise_a='10,000 US$';
																	cruise_b='1,000 US$ (ded. 100US$)';
																	cruise_c='250 US$ ';
																	cruise_1='20,000 US$';
																	cruise_2='3,000 US$';
																	cruise_3='3,000 US$';
																	cruise_4='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	cruise_5='200 US$ Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																}else if (package == "Esteem"){
																	prem = value.esteem_individual;
																	prem_one = '25,000 US$';
																	prem_two ='500 US$';
																	dst = 4.00;
																	travel_0 = '45,000 US$';
																	travel_1= '200 US$';
																	travel_1_1='10,000 US$ (ded. 1,000US$)';
																	travel_1_2='45,000 US$';
																	travel_2= 'Travel cost plus up 100 US$/day maximum 1,000US$';
																	travel_3='1,000 US$';
																	travel_4='3,000 US$';
																	travel_5='3,000 US$';
																	travel_6='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																	travel_7='200 US$';
																	travel_8='200 US$';
																	travel_9='90 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 90US$)';
																	travel_10='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	travel_11='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	travel_12='250 US$';
																	travel_13='250 US$';
																	cruise_a='25,000 US$';
																	cruise_b='10,000 US$ (ded. 1,000US$)';
																	cruise_c='500 US$ ';
																	cruise_1='45,000 US$';
																	cruise_2='3,000 US$';
																	cruise_3='3,000 US$';
																	cruise_4='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	cruise_5='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';

																}else if (package == "Executive"){
																	prem = value.executive_individual;
																	prem_one = '50,000 US$';
																	prem_two ='1,000 US$';
																	dst = 4.00;
																	travel_0 = '50,000 US$';
																	travel_1= '200 US$';
																	travel_1_1='20,000 US$ (ded. 2,000US$)';
																	travel_1_2='50,000 US$';
																	travel_2= 'Travel cost plus up 100 US$/day maximum 1,000US$';
																	travel_3='1,000 US$';
																	travel_4='3,000 US$';
																	travel_5='3,000 US$';
																	travel_6='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																	travel_7='200 US$';
																	travel_8='200 US$';
																	travel_9='100 US$  (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																	travel_10='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	travel_11='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	travel_12='250 US$';
																	travel_13='250 US$';
																	cruise_a='50,000 US$';
																	cruise_b='20,000 US$ (ded. 2,000US$)';
																	cruise_c='1,000 US$ ';
																	cruise_1='50,000 US$';
																	cruise_2='3,000 US$';
																	cruise_3='3,000 US$';
																	cruise_4='Up to 1,200 US$ subject to limit 150 US$ for any item ';
																	cruise_5='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																}else{
																	prem = value.elite_individual;
																	prem_one = '100,000 US$';
																	prem_two ='2,000 US$';
																	dst = 4.00;
																	travel_0 = '100,000 US$';
																	travel_1= '400 US$';
																	travel_1_1='25,000 US$ (ded. 2,000US$)';
																	travel_1_2='100,000 US$';
																	travel_2= 'Travel cost plus up 200 US$/day maximum 2,000US$';
																	travel_3='2,000 US$';
																	travel_4='5,000 US$';
																	travel_5='5,000 US$';
																	travel_6='500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																	travel_7='400 US$';
																	travel_8='400 US$';
																	travel_9='250 US $(Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)';
																	travel_10='Up to 2,400 US$ subject to limit 300 US$ for any item';
																	travel_11='Up to 2,400 US$ subject to limit 300 US$ for any item ';
																	travel_12='250 US$';
																	travel_13='250 US$';
																	cruise_a='100,000 US$';
																	cruise_b='25,000 US$ (ded. 2,000US$)';
																	cruise_c='2,000 US$ ';
																	cruise_1='100,000 US$';
																	cruise_2='5,000 US$';
																	cruise_3='5,000 US$';
																	cruise_4='Up to 2,400 US$ subject to limit 300 US$ for any item ';
																	cruise_5='500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
																}

																if($('input[name="include_covid"]:checked').val() == "Yes"){
																	dst = 4.00;
																}
													
															jQuery('input[name="net_premium_all"]').val(prem);
															$('#net_premium').text(ReplaceNumberWithCommas(prem));
															$('#final_net_premium').text(ReplaceNumberWithCommas(prem));

															premtax = (prem *2)/100;
															premtax_com = premtax.toFixed(2);

															jQuery('input[name="premium_tax_all"]').val(premtax_com);
															jQuery('input[name="final_premium_tax_all"]').val(premtax_com);
															jQuery('#travel_assistance').val(finalTravelAssistance);

															jQuery('input[name="travel_0_all"]').val(travel_0);
															$('#travel_0_').text(travel_0);
															$('#travel_0_final').text(travel_0);


															jQuery('input[name="travel_1_all"]').val(travel_1);
															$('#travel_1_').text(travel_1);
															$('#travel_1_final').text(travel_1);

															jQuery('input[name="travel_1_1_all"]').val(travel_1_1);
															$('#travel_1_1').text(travel_1_1);
															$('#travel_1_1_final').text(travel_1_1);


															jQuery('input[name="travel_1_2_all"]').val(travel_1_2);
															$('#travel_1_2').text(travel_1_2);
															$('#travel_1_2_final').text(travel_1_2);

															jQuery('input[name="travel_2_all"]').val(travel_2);
															$('#travel_2_').text(travel_2);
															$('#travel_2_final').text(travel_2);

															jQuery('input[name="travel_3_all"]').val(travel_3);
															$('#travel_3_').text(travel_3);
															$('#travel_3_final').text(travel_3);

															jQuery('input[name="travel_4_all"]').val(travel_4);
															$('#travel_4_').text(travel_4);
															$('#travel_4_final').text(travel_4);

															jQuery('input[name="travel_5_all"]').val(travel_5);
															$('#travel_5_').text(travel_5);
															$('#travel_5_final').text(travel_5);

															jQuery('input[name="travel_6_all"]').val(travel_6);
															$('#travel_6_').text(travel_6);
															$('#travel_6_final').text(travel_6);

															jQuery('input[name="travel_7_all"]').val(travel_7);
															$('#travel_7_').text(travel_7);
															$('#travel_7_final').text(travel_7);

															jQuery('input[name="travel_8_all"]').val(travel_8);
															$('#travel_8_').text(travel_8);
															$('#travel_8_final').text(travel_8);

															jQuery('input[name="travel_9_all"]').val(travel_9);
															$('#travel_9_').text(travel_9);
															$('#travel_9_final').text(travel_9);

															jQuery('input[name="travel_10_all"]').val(travel_10);
															$('#travel_10_').text(travel_10);
															$('#travel_10_final').text(travel_10);

															jQuery('input[name="travel_11_all"]').val(travel_11);
															$('#travel_11_').text(travel_11);
															$('#travel_11_final').text(travel_11);

															jQuery('input[name="travel_12_all"]').val(travel_12);
															$('#travel_12_').text(travel_12);
															$('#travel_12_final').text(travel_12);

															jQuery('input[name="travel_13_all"]').val(travel_13);
															$('#travel_13_').text(travel_13);
															$('#travel_13_final').text(travel_13);

															$('#cruise_a').text(cruise_a);
															$('#cruise_a_final').text(cruise_a);

															$('#cruise_b').text(cruise_b);
															$('#cruise_b_final').text(cruise_b);

															$('#cruise_c').text(cruise_c);
															$('#cruise_c_final').text(cruise_c);

															$('#cruise_first').text(cruise_1);
															$('#cruise_first_final').text(cruise_1);

															$('#cruise_second').text(cruise_2);
															$('#cruise_second_final').text(cruise_2);
															$('#cruise_third').text(cruise_3);
															$('#cruise_third_final').text(cruise_3);
															$('#cruise_fourth').text(cruise_4);
															$('#cruise_fourth_final').text(cruise_4);
															$('#cruise_fifth').text(cruise_5);
															$('#cruise_fifth_final').text(cruise_5);

															$('#premium_tax').text(ReplaceNumberWithCommas(premtax_com));
															$('#final_premium_tax').text(ReplaceNumberWithCommas(premtax_com));

															lgt = (parseFloat(prem) *0.2)/100;
															lgt_com = lgt.toFixed(2);
															jQuery('input[name="lgt_all"]').val(lgt);
															$('#lgt').text(ReplaceNumberWithCommas(lgt_com));
															$('#final_lgt').text(ReplaceNumberWithCommas(lgt_com));

															jQuery('input[name="ac_dis_all"]').val(prem_one);
															$('#ac_dis').text(prem_one);
															$('#ac_dis_final').text(prem_one);

															jQuery('input[name="ac_bur_benefits_all"]').val(prem_two);
															$('#ac_bur_benefits').text(prem_two);
															$('#ac_bur_benefits_final').text(prem_two);

															jQuery('#withcovid').hide();
															jQuery('#withcovid_final').hide();
															jQuery('#sub_final_1').hide();
															jQuery('#sub_final_2').hide();
															jQuery('#sub_final_3').hide();
															jQuery('#covid_quote_div_final').hide();
															jQuery('#covid_quote_div_final_1').hide();
															jQuery('#covid_quote_div_final_2').hide();
															jQuery('#covid_quote_div').hide();
															jQuery('#covid_quote_div_1').hide();
															jQuery('#warranty_div_title').hide();
															jQuery('#warranty_div_content').hide();

															jQuery('input[name="doc_stamp_all"]').val(dst);
															jQuery('input[name="final_doc_stamp_all"]').val(dst);
															$('#doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));
															$('#final_doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));
															duetotal = parseFloat(prem) + premtax + dst + lgt;
															jQuery('input[name="final_total_amount_all"]').val(duetotal);
															$('#total_amount_due').text(ReplaceNumberWithCommas(duetotal.toFixed(2)));
															$('#final_total_amount').text(ReplaceNumberWithCommas(parseFloat(duetotal).toFixed(2)));
															
															$('#promo_tr').show();
															$('#final_promo_tr').show();
															$('#amountdue_tr_3rdpage').show();
															$('#promo_tr_3rdpage').show();
															$('#amountdue_tr').show();
															if(valuepromo.type == "A"){
																lessamount = parseFloat(valuepromo.amount)/parseFloat(jQuery('#convert_to_php_update').val());
																duetotal = duetotal - lessamount;
																less = parseFloat(valuepromo.amount);
																jQuery('input[name="less_all"]').val(less);
																jQuery('input[name="final_less_all"]').val(less);
																$('#less').text(ReplaceNumberWithCommas("Php" +less.toFixed(2)));
																$('#final_less').text(ReplaceNumberWithCommas("Php" +less.toFixed(2)));
															}else{
																var rate = valuepromo.rate;
																var promotoless =  (duetotal * (parseFloat(rate)/100));
																duetotal =  duetotal - parseFloat(promotoless);

																jQuery('input[name="less_all"]').val(Math.round(rate)+"%");
																jQuery('input[name="final_less_all"]').val(Math.round(rate)+"%");
																$('#less').text(Math.round(rate)+"%");
																$('#final_less').text(Math.round(rate)+"%");

															}

															due =  duetotal;
															jQuery('input[name="total_amount_due_all"]').val(due);
															jQuery('input[name="final_total_amount_due_all"]').val(due);
															 $('#final_total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));
														
															$('#total_amount_due_final').text(ReplaceNumberWithCommas(due.toFixed(2)));

															var totalAmountDue = parseFloat(jQuery('#final_total_amount_due_all').val());
															var conversionRate = parseFloat(jQuery('#convert_to_php_update').val());
															var result = (due * conversionRate).toFixed(2);
															$('#convert_to_php').text(ReplaceNumberWithCommas(parseFloat(result)));
															jQuery('input[name="total_amount_all"]').val(due);
															$('#total_amount').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));

															if(covid == "No"){
																return false;
															}
														if(covid == "Yes"){


															var range_covid_period = $('input[name="covid_period"]:checked').val();
															var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
														
															noofdays = noofday + 1;
															if(range_covid_period === 'Yes' || range_covid_period ==''){
																
																if(noofday <= 15){
																	noofdaysorig = noofdays;
																}else{
																	noofdaysorig = 15;
																}


															}else{
																noofdaysorig = noofdays;

															}
														


															urlpremcovid = url  + '/api/get-quote/itp-insurance/get-prem-covid';

																	$.ajax({
																	url: urlpremcovid,
																	method:"GET",
																	data:{ _token:_token,noofdaysorig:noofdaysorig,package:package},
																	success:function(result)
																	{
																		$.each(result, function(key, value){
																			// jQuery('#withcovid').show();
																			// jQuery('#withcovid_final').show();


																			jQuery('#sub_final_1').show();
																			jQuery('#sub_final_2').show();
																			jQuery('#sub_final_3').show();
																			jQuery('#covid_quote_div_final').show();
																			jQuery('#covid_quote_div_final_1').show();
																			jQuery('#covid_quote_div_final_2').show();
																			jQuery('#covid_quote_div').show();
																			jQuery('#covid_quote_div_1').show();
																			jQuery('#warranty_div_title').show();
																			jQuery('#warranty_div_content').show();
																			premium = parseFloat(prem) + parseFloat(value.prem);
																			jQuery('input[name="covid_amount"]').val(value.prem);
																			jQuery('input[name="net_premium_all"]').val(premium);
																			jQuery('input[name="final_net_premium_all"]').val(premium);
																			// $('#net_premium').text(ReplaceNumberWithCommas(premium));
																			$('#net_premium').text(ReplaceNumberWithCommas(premium.toFixed(2)));
																			$('#final_net_premium').text(ReplaceNumberWithCommas(premium.toFixed(2)));

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

																			dst = 0;
																			if(package == "Economy"){
																				dst = 2.00;
																				var covid_head ='Economy';
																				var covid_first ='US$ 20,000 for COVID-19 Cases';
																				var covid_second='up to US$ 15,000 for COVID-19 Cases';
																				var covid_third='Up to US$ 15,000 for COVID-19 Cases';

																			}else if(package == "Esteem"){
																				dst = 4.00;
																				var covid_head ='Esteem';
																				var covid_first ='US$ 45,000 for COVID-19 Cases';
																				var covid_second='up to US$ 25,000 for COVID-19 Cases';
																				var covid_third='up to US$ 25,000 for COVID-19 Cases';
																			}else if(package == "Executive"){
																				dst = 4.00;
																				var covid_head ='Executive';
																				var covid_first ='US$ 45,000 for COVID-19 Cases';
																				var covid_second='up to US$ 25,000 for COVID-19 Cases';
																				var covid_third='up to US$ 25,000 for COVID-19 Cases';
																			}else{
																				dst = 4.00;
																				var covid_head ='Elite';
																				var covid_first ='US$ 45,000 for COVID-19 Cases';
																				var covid_second='up to US$ 25,000 for COVID-19 Cases';
																				var covid_third='up to US$ 25,000 for COVID-19 Cases';
																			}

																			if($('input[name="include_covid"]:checked').val() == "Yes"){
																				dst = 4.00;
																			}
																			var prem_covid = parseFloat(prem) + parseFloat(value.prem);

																			duetotal = prem_covid + parseFloat(premtax_com) + parseFloat(dst) + parseFloat(lgt_com);

																			jQuery('input[name="final_total_amount_all"]').val(duetotal);
																			$('#total_amount_due').text(ReplaceNumberWithCommas(duetotal.toFixed(2)));
																			$('#final_total_amount').text(ReplaceNumberWithCommas(parseFloat(duetotal).toFixed(2)));
																			
																			$('#promo_tr').show();
																			$('#final_promo_tr').show();
																			$('#amountdue_tr_3rdpage').show();
																			$('#promo_tr_3rdpage').show();
																			$('#amountdue_tr').show();
																			if(valuepromo.type == "A"){
																				lessamount = parseFloat(valuepromo.amount)/parseFloat(jQuery('#convert_to_php_update').val());
																				duetotal = duetotal - lessamount;
																				less = parseFloat(valuepromo.amount);
																				jQuery('input[name="less_all"]').val(less);
																				jQuery('input[name="final_less_all"]').val(less);
																				$('#less').text(ReplaceNumberWithCommas("Php" +less.toFixed(2)));
																				$('#final_less').text(ReplaceNumberWithCommas("Php" +less.toFixed(2)));
																			}else{
																				var rate = valuepromo.rate;
																				var promotoless =  (duetotal * (parseFloat(rate)/100));
																				duetotal =  duetotal - parseFloat(promotoless);

																				jQuery('input[name="less_all"]').val(Math.round(rate)+"%");
																				jQuery('input[name="final_less_all"]').val(Math.round(rate)+"%");
																				$('#less').text(Math.round(rate)+"%");
																				$('#final_less').text(Math.round(rate)+"%");

																			}

																			
																			due =  duetotal;
																			jQuery('input[name="total_amount_due_all"]').val(due);
																			jQuery('input[name="final_total_amount_due_all"]').val(due);
																			$('#covid_head').text(covid_head);
																			$('#covid_first').text(covid_first);
																			$('#covid_second').text(covid_second);
																			$('#covid_third').text(covid_third);

																			$('#covid_head_final').text(covid_head);
																			$('#covid_first_final').text(covid_first);
																			$('#covid_second_final').text(covid_second);
																			$('#covid_third_final').text(covid_third);

																			$('#total_amount_due_final').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));
																			$('#final_total_amount_due').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));

																			var totalAmountDue = parseFloat(jQuery('#final_total_amount_due_all').val());
																			var conversionRate = parseFloat(jQuery('#convert_to_php_update').val());
																			var resultwithcovid = (due * conversionRate).toFixed(2);
																			$('#convert_to_php').text(ReplaceNumberWithCommas(parseFloat(resultwithcovid)));
																			jQuery('input[name="total_amount_all"]').val(due);
																			$('#total_amount').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));
																		})
																	}

																});
																return false;
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

						})				
					}

				});
			}else{
				 $(".validation_departure_date_itinerary").remove();
				 $(".validation_departure_date_itinerary_check_error").remove();
				 $(".validation_departure_date_itinerary_check_success").remove();

				 $(".validation_return_date_itinerary").remove();
				 $(".validation_return_date_itinerary_check_error").remove();
				 $(".validation_return_date_itinerary_check_success").remove();

				 $(".validation_departure_date_cruise_itinerary").remove();
				 $(".validation_departure_date_cruise_itinerary_check_error").remove();
				 $(".validation_departure_date_cruise_itinerary_check_success").remove();

				 $(".validation_return_date_cruise_itinerary").remove();
				 $(".validation_return_date_cruise_itinerary_check_error").remove();
				 $(".validation_return_date_cruise_itinerary_check_success").remove();



				if($('#departure_date_itinerary').val() == ""){
					$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg' style='color:#CF3C4B'>From place of residence is empty</div>");
					 $('#departure_date_itinerary').fieldErrorState();
					errornumber = 1;
					action = action + "From place of residence is empty. ";
					status = "Failed";
				 }else{
					 $('#departure_date_itinerary').fieldSuccessState();
				}

				if($('#return_date_itinerary').val() == ""){
					$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>To place of residence is empty</div>");
					 $('#return_date_itinerary').fieldErrorState();
					errornumber = 1;
					action = action + "To place of residence is empty. ";
					status = "Failed";
				 }else{
					 $('#return_date_itinerary').fieldSuccessState();
				}


				var from = $("#departure_date_itinerary").val();
				var to = $("#return_date_itinerary").val();

				var from_cruise = $("#departure_date_cruise_itinerary").val();
				var to_cruise = $("#return_date_cruise_itinerary").val();

				if(Date.parse(from_cruise) > Date.parse(to_cruise)){
					errornumber = 1;
					action = action + "Return cruise date should later than the departure cruise date2. ";
					status = "Failed";
				  //$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
					 //$('#departure_date_itinerary').fieldErrorState();
					$("#return_date_cruise_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>Return cruise date should later than the departure cruise date2 </div>");
					$('#return_date_cruise_itinerary').fieldErrorState();
				}

				if(Date.parse(from) > Date.parse(from_cruise) || Date.parse(to) < Date.parse(from_cruise)){
					errornumber = 1;
					action = action + "departure cruise date should be in between of departure date. ";
					status = "Failed";
				  //$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
					 //$('#departure_date_itinerary').fieldErrorState();
					$("#departure_date_cruise_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>departure cruise date should be in between of departure date </div>");
					$('#departure_date_cruise_itinerary').fieldErrorState();
				}else{
					 $('#departure_date_cruise_itinerary').fieldSuccessState();
				}

				if(Date.parse(from) > Date.parse(to_cruise) || Date.parse(to) < Date.parse(to_cruise)){
					errornumber = 1;
					action = action + "Return cruise date should be in between of departure date. ";
					status = "Failed";
				  //$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
					 //$('#departure_date_itinerary').fieldErrorState();
					$("#return_date_cruise_itinerary").after("<div class='validation_return_date_itinerary v-error-msg' style='color:#CF3C4B'>Return cruise date should be in between of departure date </div>");
					$('#return_date_cruise_itinerary').fieldErrorState();
				}else{
					 $('#return_date_cruise_itinerary').fieldSuccessState();
				}

				var from = $("#departure_date_itinerary").val();
				var to = $("#return_date_itinerary").val();

				if(Date.parse(from) > Date.parse(to)){
					errornumber = 1;
					action = action + "Return date should later than the departure date2. ";
					status = "Failed";
				  //$("#departure_date_itinerary").after("<div class='validation_departure_date_itinerary v-error-msg'>Invalid Date Range</div>");
					 //$('#departure_date_itinerary').fieldErrorState();
					$("#return_date_cruise_itinerary").after("<div class='validation_return_date_cruise_itinerary v-error-msg' style='color:#CF3C4B'>Return date should later than the departure date2 </div>");
					$('#return_date_cruise_itinerary').fieldErrorState();
				}


				var noofdays = datediff(parseDate(from), parseDate(to));
				if(noofdays >= 180){
					errornumber = 1;
					action = action + "Travel duration should not exceed 180 days. ";
					status = "Failed";
					$("#return_date_itinerary").after("<div class='validation_return_date_itinerary v-error-msg'>Travel duration should not exceed 180 days</div>");
					$('#return_date_itinerary').fieldErrorState();
				}


				$('select[name^="package"]').each(function(){
					if($('#'+ this.id).val() == ""){
						 $('#'+ this.id).fieldErrorState();
						 errornumber = 1;
						action = action + "No Package selected. ";
						status = "Failed";
					 }else{
						 $('#'+ this.id).fieldSuccessState();
					}
				});


				if( $('#cruise_yes').is(':checked') || $('#cruise_no').is(':checked') ){
					$('#cruise_label_title').text('Cruise Coverage');
					$('#cruise_label_title_span').css('color', '#373737');
					$('#cruise_label_title').css('color', '#373737');
					$('#cruise_yes_label').css('color', '#373737');
					$('#cruise_no_label').css('color', '#373737');
				}else{
					errornumber = 1;
					action = action + "No Cruise selected. ";
					status = "Failed";
					$('#cruise_label_title').text('Cruise Coverage');
					$('#cruise_label_title_span').css('color', '#b94a48');
					$('#cruise_label_title').css('color', '#b94a48');
					$('#cruise_yes_label').css('color', '#b94a48');
					$('#cruise_no_label').css('color', '#b94a48');
				}
				if( $('#cruise_yes').is(':checked')){
					$('select[name^="destination_cruise"]').each(function(){
						if($('#'+ this.id).val() == ""){
							$('#'+ this.id).fieldErrorState();
							errornumber = 1;
							action = action + "No Cruise selected. ";
							status = "Failed";
						}else{
							$('#'+ this.id).fieldSuccessState();
						}
					});
				}

				if( $('#covid_yes').is(':checked') || $('#covid_no').is(':checked') ){
					$('#covid_label_title').text('COVID-19 Assist Coverage');
					$('#covid_label_title_span').css('color', '#373737');
					$('#covid_label_title').css('color', '#373737');
					$('#covid_yes_label').css('color', '#373737');
					$('#covid_no_label').css('color', '#373737');


				}else{
					errornumber = 1;
					action = action + "No COVID Selected. ";
					status = "Failed";
					$('#covid_label_title').text('COVID-19 Assist Coverage*');
					$('#covid_label_title_span').css('color', '#b94a48');
					$('#covid_label_title').css('color', '#b94a48');
					$('#covid_yes_label').css('color', '#b94a48');
					$('#covid_no_label').css('color', '#b94a48');
				}

				if( $('#covid_yes').is(':checked')){
					if( $('#covid_period_yes').is(':checked') || $('#covid_period_no').is(':checked') ){
							$('#covid_label_title_period').css('color', '#373737');
							$('#covid_period_title').css('color', '#373737');
							$('#covid_period_day_trip').css('color', '#373737');
							$('#covid_period_trip').css('color', '#373737');
						}else{
							errornumber = 1;
							action = action + "No COVID selected. ";
							status = "Failed";
							$('#covid_label_title_period').css('color', '#b94a48');
							$('#covid_period_title').css('color', '#b94a48');
							$('#covid_period_day_trip').css('color', '#b94a48');
							$('#covid_period_trip').css('color', '#b94a48');
						}
				}




				if(errornumber == 1){
					
					 return false;
				 }

				departure_date_itinerary = $('#departure_date_itinerary').val();
				var package = $('#package').val();
				return_date_itinerary = $('#return_date_itinerary').val();
				include_cruise = $('input[name="include_cruise"]:checked').val();
				covid = $('input[name="include_covid"]:checked').val();
				covid_period = $('input[name="covid_period"]:checked').val();
				var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
				noofday = noofday + 1;
				$('#less').text("");
				$('#promo_tr').hide();
				$('#final_promo_tr').hide();
				$('#amountdue_tr').hide();
				$('#final_amountdue_tr').hide();
				 if(include_cruise == 'Yes'){
				destinations_cruise ="";
				$('select[name^="destination_cruise"]').each(function(){
					if( $(this).val() != ""){
						if(destinations_cruise == ""){
							destinations_cruise =  $(this).val();
						}else{
							destinations_cruise = destinations_cruise +','+ $(this).val();
						}
					}
				});
				}else{
					destinations_cruise ="";
				}
				destinations ="";
				$('select[name^="destination_itinerary"]').each(function(){

					if( $(this).val() != ""){
						if(destinations == ""){
							destinations =  $(this).val();
						}else{
							destinations = destinations +','+ $(this).val();
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
				$('#covid_start_date').text(departure);
				$('#covid_start_date_final').text(departure);

				jQuery('input[name="quote_end_date_all"]').val(returndate);
				$('#quote_end_date').text(returndate);
				$('#quote_end_date_final').text(returndate);

				if(covid_period ==='Yes'){
					//var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
					var covid_no_of_days =noofday - 1;
					if(covid_no_of_days >= 16){
								var covidrDate = new Date($('#departure_date_itinerary').val());
								var date_fiftheen = covidrDate.setDate(covidrDate.getDate() + 15);
								var covidr = new Date(date_fiftheen),
								month_covid = '' + (covidr.getMonth() + 1),
								day_covid = '' +  (covidr.getDate() - 1) ,
								year_covid = covidr.getFullYear();
								var returndate = monthNames[covidr.getMonth()]+ ' ' +  day_covid + ', ' + year_covid;
								var returndateval = year_covid + '-' +  month_covid + '-' + day_covid;
								$('#covid_return').val(returndateval);
								// noofday = noofday + 1; 
						}else{
								if(noofdays < 14){
								var covidrDate = new Date($('#return_date_itinerary').val());
								$('#covid_return').val(return_date_itinerary);
								}else{
								var covidrDate = new Date($('#departure_date_itinerary').val());
								// Add 15 days to specified date
								var date_fiftheen = covidrDate.setDate(covidrDate.getDate() + 15);
								var covidr = new Date(date_fiftheen),
								month_covid = '' + (covidr.getMonth()+ 1),
								day_covid = '' +  (covidr.getDate() - 1),
								year_covid = covidr.getFullYear();
								var returndate = monthNames[covidr.getMonth()]+ ' ' +  day_covid + ', ' + year_covid;
								var returndateval = year_covid + '-' +  month_covid + '-' + day_covid;
								$('#covid_return').val(return_date_itinerary);
								// noofday = noofday + 1; 
							}
						}
					}else{
						var covidr = new Date($('#return_date_itinerary').val()),
						month_covid = '' + (covidr.getMonth()+ 1),
						day_covid = '' + covidr.getDate(),
						year_covid = covidr.getFullYear();
						var returndate = monthNames[covidr.getMonth()]+ ' ' +  day_covid + ', ' + year_covid;
						var returndateval = year_covid + '-' +  month_covid + '-' + day_covid;
						$('#covid_return').val(returndateval);
					}
					$('#covid_end_date').text(returndate);
					$('#covid_end_date_final').text(returndate);
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
					jQuery('input[name="quoteprovince_all_cruise"]').val(destinations_cruise);
					$('#quoteprovincecruise').text(destinations_cruise);
					$('#quotecruise_final_provincecruise').text(destinations_cruise);
					urlprem = url  + '/api/get-quote/itp-insurance/get-prem';
						$.ajax({
							url: urlprem,
							method:"GET",
							data:{ _token:_token,noofday:noofday,include_cruise:include_cruise,package:package,destinations:destinations,destinations_cruise:destinations_cruise,covid:covid},
							error: function(data){
							var errors = data.responseJSON;
							jQuery.each(data, function(key, value){

							});
						  },
							success:function(result)
							{
								var data = result.data_prem;
								var myObject = result;
								var dataPremTravel = myObject.data_prem_travel;
								var dataPremLiability = myObject.data_prem_liability;
								var dataPremBurialBenefits = myObject.data_prem_burial_benefits;
								var dataadd = myObject.data_prem_add;
								var myObjectString = JSON.stringify(dataPremTravel);
								var myObjectStringLiability = JSON.stringify(dataPremLiability);
								var myObjectStringBurialBenefits = JSON.stringify(dataPremBurialBenefits);
								var myObjectStringadd = JSON.stringify(dataadd);
								var myObject = JSON.parse(myObjectString);
								var myObjectliability = JSON.parse(myObjectStringLiability);
								var myObjectburialbenefits= JSON.parse(myObjectStringBurialBenefits);
								var myObjectadd= JSON.parse(myObjectStringadd);

								var parameterNames = Object.keys(myObject[0]);
								var parameterNamesliability = Object.keys(myObjectliability[0]);
								var parameterNamesburialbenefits = Object.keys(myObjectburialbenefits[0]);
								var parameterNamesadd = Object.keys(myObjectadd[0]);

								var finalTravelAssistance = myObject[0][parameterNames[0]];
								var finalliability= myObjectliability[0][parameterNamesliability[0]];
								var finalburialbenefits= myObjectburialbenefits[0][parameterNamesburialbenefits[0]];
								var finaladd= myObjectadd[0][parameterNamesadd[0]];
								$('#travel_assistance').val(finalTravelAssistance);
								$('#liability_assistance').val(finalliability);
								$('#burialbenefits_assistance').val(finalburialbenefits);
								$('#add').val(finaladd);
								$.each(data, function(key, value){
									var continent = value.continent;
									   var noofdaysorig = value.days;
										if(data.length == 0){
											}else{

												var prem = "";

												if (package == "Economy"){
													prem = value.economy_individual;
													prem_one = '10,000 US$';
													prem_two = '250 US$';
													dst = 2.00;

													travel_0= '20,000 US$';
													travel_1= '200 US$';
													travel_1_1='1,000 US$ (ded. 100US$)';
													travel_1_2='20,000 US$';
													travel_2= 'Travel cost plus up 100 US$/day maximum 1,000US$';
													travel_3='1,000 US$';
													travel_4='3,000 US$';
													travel_5='3,000 US$';
													travel_6='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
													travel_7='200 US$';
													travel_8='200 US$';
													travel_9='40 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 40US$)';
													travel_10='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													travel_11='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													travel_12='250 US$';
													travel_13='250 US$';
													cruise_a='10,000 US$';
													cruise_b='1,000 US$ (ded. 100US$)';
													cruise_c='250 US$ ';
													cruise_1='20,000 US$';
													cruise_2='3,000 US$';
													cruise_3='3,000 US$';
													cruise_4='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													cruise_5='200 US$ Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
												}else if (package == "Esteem"){
													prem = value.esteem_individual;
													prem_one = '25,000 US$';
													prem_two ='500 US$';
													dst = 4.00;
													travel_0 = '45,000 US$';
													travel_1= '200 US$';
													travel_1_1='10,000 US$ (ded. 1,000US$)';
													travel_1_2='45,000 US$';
													travel_2= 'Travel cost plus up 100 US$/day maximum 1,000US$';
													travel_3='1,000 US$';
													travel_4='3,000 US$';
													travel_5='3,000 US$';
													travel_6='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
													travel_7='200 US$';
													travel_8='200 US$';
													travel_9='90 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 90US$)';
													travel_10='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													travel_11='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													travel_12='250 US$';
													travel_13='250 US$';
													cruise_a='25,000 US$';
													cruise_b='10,000 US$ (ded. 1,000US$)';
													cruise_c='500 US$ ';
													cruise_1='45,000 US$';
													cruise_2='3,000 US$';
													cruise_3='3,000 US$';
													cruise_4='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													cruise_5='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';

												}else if (package == "Executive"){
													prem = value.executive_individual;
													prem_one = '50,000 US$';
													prem_two ='1,000 US$';
													dst = 4.00;
													travel_0 = '50,000 US$';
													travel_1= '200 US$';
													travel_1_1='20,000 US$ (ded. 2,000US$)';
													travel_1_2='50,000 US$';
													travel_2= 'Travel cost plus up 100 US$/day maximum 1,000US$';
													travel_3='1,000 US$';
													travel_4='3,000 US$';
													travel_5='3,000 US$';
													travel_6='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
													travel_7='200 US$';
													travel_8='200 US$';
													travel_9='100 US$  (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
													travel_10='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													travel_11='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													travel_12='250 US$';
													travel_13='250 US$';
													cruise_a='50,000 US$';
													cruise_b='20,000 US$ (ded. 2,000US$)';
													cruise_c='1,000 US$ ';
													cruise_1='50,000 US$';
													cruise_2='3,000 US$';
													cruise_3='3,000 US$';
													cruise_4='Up to 1,200 US$ subject to limit 150 US$ for any item ';
													cruise_5='200 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
												}else{
													prem = value.elite_individual;
													prem_one = '100,000 US$';
													prem_two ='2,000 US$';
													dst = 4.00;
													travel_0 = '100,000 US$';
													travel_1= '400 US$';
													travel_1_1='25,000 US$ (ded. 2,000US$)';
													travel_1_2='100,000 US$';
													travel_2= 'Travel cost plus up 200 US$/day maximum 2,000US$';
													travel_3='2,000 US$';
													travel_4='5,000 US$';
													travel_5='5,000 US$';
													travel_6='500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
													travel_7='400 US$';
													travel_8='400 US$';
													travel_9='250 US $(Lump Sum cash benefit per occurrence)/ Non-Receipted up to 100US$)';
													travel_10='Up to 2,400 US$ subject to limit 300 US$ for any item';
													travel_11='Up to 2,400 US$ subject to limit 300 US$ for any item ';
													travel_12='250 US$';
													travel_13='250 US$';
													cruise_a='100,000 US$';
													cruise_b='25,000 US$ (ded. 2,000US$)';
													cruise_c='2,000 US$ ';
													cruise_1='100,000 US$';
													cruise_2='5,000 US$';
													cruise_3='5,000 US$';
													cruise_4='Up to 2,400 US$ subject to limit 300 US$ for any item ';
													cruise_5='500 US$ (Lump Sum cash benefit per occurrence/Non-Receipted up to 100US$)';
												}

												if($('input[name="include_covid"]:checked').val() == "Yes"){
													dst = 4.00;
												}
									
											jQuery('input[name="net_premium_all"]').val(prem);
											$('#net_premium').text(ReplaceNumberWithCommas(prem));
											$('#final_net_premium').text(ReplaceNumberWithCommas(prem));

											premtax = (prem *2)/100;
											premtax_com = premtax.toFixed(2);

											jQuery('input[name="premium_tax_all"]').val(premtax_com);
											jQuery('input[name="final_premium_tax_all"]').val(premtax_com);
											jQuery('#travel_assistance').val(finalTravelAssistance);

											jQuery('input[name="travel_0_all"]').val(travel_0);
											$('#travel_0_').text(travel_0);
											$('#travel_0_final').text(travel_0);


											jQuery('input[name="travel_1_all"]').val(travel_1);
											$('#travel_1_').text(travel_1);
											$('#travel_1_final').text(travel_1);

											jQuery('input[name="travel_1_1_all"]').val(travel_1_1);
											$('#travel_1_1').text(travel_1_1);
											$('#travel_1_1_final').text(travel_1_1);


											jQuery('input[name="travel_1_2_all"]').val(travel_1_2);
											$('#travel_1_2').text(travel_1_2);
											$('#travel_1_2_final').text(travel_1_2);

											jQuery('input[name="travel_2_all"]').val(travel_2);
											$('#travel_2_').text(travel_2);
											$('#travel_2_final').text(travel_2);

											jQuery('input[name="travel_3_all"]').val(travel_3);
											$('#travel_3_').text(travel_3);
											$('#travel_3_final').text(travel_3);

											jQuery('input[name="travel_4_all"]').val(travel_4);
											$('#travel_4_').text(travel_4);
											$('#travel_4_final').text(travel_4);

											jQuery('input[name="travel_5_all"]').val(travel_5);
											$('#travel_5_').text(travel_5);
											$('#travel_5_final').text(travel_5);

											jQuery('input[name="travel_6_all"]').val(travel_6);
											$('#travel_6_').text(travel_6);
											$('#travel_6_final').text(travel_6);

											jQuery('input[name="travel_7_all"]').val(travel_7);
											$('#travel_7_').text(travel_7);
											$('#travel_7_final').text(travel_7);

											jQuery('input[name="travel_8_all"]').val(travel_8);
											$('#travel_8_').text(travel_8);
											$('#travel_8_final').text(travel_8);

											jQuery('input[name="travel_9_all"]').val(travel_9);
											$('#travel_9_').text(travel_9);
											$('#travel_9_final').text(travel_9);

											jQuery('input[name="travel_10_all"]').val(travel_10);
											$('#travel_10_').text(travel_10);
											$('#travel_10_final').text(travel_10);

											jQuery('input[name="travel_11_all"]').val(travel_11);
											$('#travel_11_').text(travel_11);
											$('#travel_11_final').text(travel_11);

											jQuery('input[name="travel_12_all"]').val(travel_12);
											$('#travel_12_').text(travel_12);
											$('#travel_12_final').text(travel_12);

											jQuery('input[name="travel_13_all"]').val(travel_13);
											$('#travel_13_').text(travel_13);
											$('#travel_13_final').text(travel_13);

											$('#cruise_a').text(cruise_a);
											$('#cruise_a_final').text(cruise_a);

											$('#cruise_b').text(cruise_b);
											$('#cruise_b_final').text(cruise_b);

											$('#cruise_c').text(cruise_c);
											$('#cruise_c_final').text(cruise_c);

											$('#cruise_first').text(cruise_1);
											$('#cruise_first_final').text(cruise_1);

											$('#cruise_second').text(cruise_2);
											$('#cruise_second_final').text(cruise_2);
											$('#cruise_third').text(cruise_3);
											$('#cruise_third_final').text(cruise_3);
											$('#cruise_fourth').text(cruise_4);
											$('#cruise_fourth_final').text(cruise_4);
											$('#cruise_fifth').text(cruise_5);
											$('#cruise_fifth_final').text(cruise_5);

											$('#premium_tax').text(ReplaceNumberWithCommas(premtax_com));
											$('#final_premium_tax').text(ReplaceNumberWithCommas(premtax_com));

											lgt = (parseFloat(prem) *0.2)/100;
											lgt_com = lgt.toFixed(2);
											jQuery('input[name="lgt_all"]').val(lgt);
											$('#lgt').text(ReplaceNumberWithCommas(lgt_com));
											$('#final_lgt').text(ReplaceNumberWithCommas(lgt_com));

											jQuery('input[name="ac_dis_all"]').val(prem_one);
											$('#ac_dis').text(prem_one);
											$('#ac_dis_final').text(prem_one);

											jQuery('input[name="ac_bur_benefits_all"]').val(prem_two);
											$('#ac_bur_benefits').text(prem_two);
											$('#ac_bur_benefits_final').text(prem_two);

											jQuery('#withcovid').hide();
											jQuery('#withcovid_final').hide();
											jQuery('#sub_final_1').hide();
											jQuery('#sub_final_2').hide();
											jQuery('#sub_final_3').hide();
											jQuery('#covid_quote_div_final').hide();
											jQuery('#covid_quote_div_final_1').hide();
											jQuery('#covid_quote_div_final_2').hide();
											jQuery('#covid_quote_div').hide();
											jQuery('#covid_quote_div_1').hide();
											jQuery('#warranty_div_title').hide();
											jQuery('#warranty_div_content').hide();

											jQuery('input[name="doc_stamp_all"]').val(dst);
											jQuery('input[name="final_doc_stamp_all"]').val(dst);
											$('#doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));
											$('#final_doc_stamp').text(ReplaceNumberWithCommas(dst.toFixed(2)));
											duetotal = parseFloat(prem) + premtax + dst + lgt;


											due =  duetotal;

											jQuery('input[name="total_amount_due_all"]').val(due);
											jQuery('input[name="final_total_amount_due_all"]').val(due);
											$('#total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));
											$('#total_amount_due_final').text(ReplaceNumberWithCommas(due.toFixed(2)));
											$('#final_total_amount_due').text(ReplaceNumberWithCommas(due.toFixed(2)));

											var totalAmountDue = parseFloat(jQuery('#total_amount_due_all').val());
											var conversionRate = parseFloat(jQuery('#convert_to_php_update').val());
											var result = (totalAmountDue * conversionRate).toFixed(2);
											$('#convert_to_php').text(ReplaceNumberWithCommas(parseFloat(result)));
											jQuery('input[name="total_amount_all"]').val(due);
											jQuery('input[name="final_total_amount_all"]').val(due);
											$('#total_amount').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));
											$('#final_total_amount').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));

											if(covid == "No"){
												return false;
											}


									  if(covid == "Yes"){


										var range_covid_period = $('input[name="covid_period"]:checked').val();
										var noofday = datediff(parseDate(departure_date_itinerary), parseDate(return_date_itinerary));
									  
										noofdays = noofday + 1;
										if(range_covid_period === 'Yes' || range_covid_period ==''){
											
											if(noofday <= 15){
												noofdaysorig = noofdays;
											}else{
												noofdaysorig = 15;
											}


										}else{
											noofdaysorig = noofdays;

										}
									  


										  urlpremcovid = url  + '/api/get-quote/itp-insurance/get-prem-covid';

												$.ajax({
												url: urlpremcovid,
												method:"GET",
												data:{ _token:_token,noofdaysorig:noofdaysorig,package:package},
												success:function(result)
												{
													$.each(result, function(key, value){
														// jQuery('#withcovid').show();
														// jQuery('#withcovid_final').show();


														jQuery('#sub_final_1').show();
														jQuery('#sub_final_2').show();
														jQuery('#sub_final_3').show();
														jQuery('#covid_quote_div_final').show();
														jQuery('#covid_quote_div_final_1').show();
														jQuery('#covid_quote_div_final_2').show();
														jQuery('#covid_quote_div').show();
														jQuery('#covid_quote_div_1').show();
														jQuery('#warranty_div_title').show();
														jQuery('#warranty_div_content').show();
														premium = parseFloat(prem) + parseFloat(value.prem);
														jQuery('input[name="covid_amount"]').val(value.prem);
														jQuery('input[name="net_premium_all"]').val(premium);
														jQuery('input[name="final_net_premium_all"]').val(premium);
														// $('#net_premium').text(ReplaceNumberWithCommas(premium));
														$('#net_premium').text(ReplaceNumberWithCommas(premium.toFixed(2)));
														$('#final_net_premium').text(ReplaceNumberWithCommas(premium.toFixed(2)));

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

														dst = 0;
														if(package == "Economy"){
															dst = 2.00;
															var covid_head ='Economy';
															var covid_first ='US$ 20,000 for COVID-19 Cases';
															var covid_second='up to US$ 15,000 for COVID-19 Cases';
															var covid_third='Up to US$ 15,000 for COVID-19 Cases';

														}else if(package == "Esteem"){
															dst = 4.00;
															var covid_head ='Esteem';
															var covid_first ='US$ 45,000 for COVID-19 Cases';
															var covid_second='up to US$ 25,000 for COVID-19 Cases';
															var covid_third='up to US$ 25,000 for COVID-19 Cases';
														}else if(package == "Executive"){
															dst = 4.00;
															var covid_head ='Executive';
															var covid_first ='US$ 45,000 for COVID-19 Cases';
															var covid_second='up to US$ 25,000 for COVID-19 Cases';
															var covid_third='up to US$ 25,000 for COVID-19 Cases';
														}else{
															dst = 4.00;
															var covid_head ='Elite';
															var covid_first ='US$ 45,000 for COVID-19 Cases';
															var covid_second='up to US$ 25,000 for COVID-19 Cases';
															var covid_third='up to US$ 25,000 for COVID-19 Cases';
														}

														if($('input[name="include_covid"]:checked').val() == "Yes"){
															dst = 4.00;
														}
														var prem_covid = parseFloat(prem) + parseFloat(value.prem);

														duetotal = prem_covid + parseFloat(premtax_com) + parseFloat(dst) + parseFloat(lgt_com);

														due =  duetotal;
														jQuery('input[name="total_amount_due_all"]').val(due);
														jQuery('input[name="final_total_amount_due_all"]').val(due);
														$('#covid_head').text(covid_head);
														$('#covid_first').text(covid_first);
														$('#covid_second').text(covid_second);
														$('#covid_third').text(covid_third);

														$('#covid_head_final').text(covid_head);
														$('#covid_first_final').text(covid_first);
														$('#covid_second_final').text(covid_second);
														$('#covid_third_final').text(covid_third);

														$('#total_amount_due').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));
														$('#total_amount_due_final').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));
														$('#final_total_amount_due').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));

														var totalAmountDue = parseFloat(jQuery('#total_amount_due_all').val());
														var conversionRate = parseFloat(jQuery('#convert_to_php_update').val());
														var resultwithcovid = (totalAmountDue * conversionRate).toFixed(2);
														$('#convert_to_php').text(ReplaceNumberWithCommas(parseFloat(resultwithcovid)));
														jQuery('input[name="total_amount_all"]').val(due);
														jQuery('input[name="final_total_amount_all"]').val(due);
														$('#total_amount').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));
														$('#final_total_amount').text(ReplaceNumberWithCommas(parseFloat(due).toFixed(2)));

														if(promo != ""){
																	$('#promo_tr').show();
																	$('#final_promo_tr').show();
																	$('#amountdue_tr').show();
																	$('#final_amountdue_tr').show();
														  urlpromo = url  + '/api/get-quote/international-insurance/promo';
														  $.ajax({
																url: urlpromo,
																method:"GET",
																data:{ _token:_token,promo:promo},
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
																			$('#total_amount_due_final').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
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
																			$('#total_amount_due_final').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																			$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																		}
																	})
																}
															  });
															}
														})
													}

											  });
											  return false;
									  }else{

										  if(promo != ""){
											
																	$('#final_promo_tr').show();
																	$('#promo_tr').show();
																	$('#amountdue_tr').show();
																	$('#final_amountdue_tr').show();
														  urlpromo = url  + '/api/get-quote/itp-insurance/promo';
														  $.ajax({
																url: urlpromo,
																method:"GET",
																data:{ _token:_token,promo:promo},
																error: function(data){
															  var errors = data.responseJSON;
															   jQuery.each(data, function(key, value){
														   
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
																			$('#total_amount_due_final').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																			$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																		}else{
																			rate = value.rate;
																			promotoless =  (due * (parseFloat(rate)/100));
																			// if(continent == 'Asia'){
																			//         dueless =  duetotal  - parseFloat(promotoless);
																			//     }else if(continent =='World'){
																			//         dueless =  duetotal - lgt_com - parseFloat(promotoless);
																			//     }else{
																			//         dueless =  duetotal + lgt_com - parseFloat(promotoless);
																			//     }


																			jQuery('input[name="less_all"]').val(rate+"%");
																			jQuery('input[name="final_less_all"]').val(rate+"%");
																			$('#less').text(rate+"%");
																			$('#final_less').text(rate+"%");
																			jQuery('input[name="total_amount_due_all"]').val(dueless);
																			jQuery('input[name="final_total_amount_due_all"]').val(dueless);
																			$('#total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																			$('#total_amount_due_final').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																			$('#final_total_amount_due').text(ReplaceNumberWithCommas(dueless.toFixed(2)));
																		}
																			})
																}
															  });
											}
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

			var _token = jQuery('input[name="_token"]').val();
			var page = "ITP";
			var action = "Open 3rd Page";
			
		});
		btn4thpage_add.click(function(){

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
			var colCount = $("#customFields #hardware-body .row").length;
			if(colCount > 0){
				jQuery('.delete-row-col-destiney').css('display', 'flex');
			}else{
				jQuery('.delete-row-col-destiney').hide();
			}
			var number = Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
			var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')";
			var numformat1 = "vf_clean_number('destination_itinerary"+number+"');vf_commafy('destination_itinerary"+number+"', 2)";
			var $cloned = $('#divvv').clone().prop('id', 'divvv'+number);
			var new_row = '<div class="row">\
												<div class="col-md-4">\
													<div class="form-group">\
														<label for="destination_itinerary">Destination</label>\
														<select  id="destination_itinerary' + number + '"" name="destination_itinerary[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-destination_itinerary" data-size="10"  data-live-search="true" >\
																<option value="">- Select -</option>\
																@foreach($cocogen_itp_countries as $cocogen_itp_country)\
																	<option value="{{$cocogen_itp_country->country}}">{{$cocogen_itp_country->country}}</option>\
																@endforeach\
														</select>\
													</div>\
												</div>\
												<div class="col-4 col-lg-1 delete-row-col-destiney justify-content-left">\
											<button type="button" class="action delete-row-destiney btn btn-danger form-control_">\
															<svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
																<path d="M2 30 L30 2 M30 30 L2 2" />\
															</svg>\
															<span class="d-inline d-lg-none">Remove</span>\
											</button>   \
										  </div>\
											</div>';




		  $('#hardware-body').append(new_row);
			 $cloned.find('#copy_select').prop('name', 'destination_itinerary[]');
			 $cloned.find('#copy_select').prop('display', 'block !important');
			 $cloned.find('#copy_select').prop('id', 'destination_itinerary'+number);
		  $cloned.appendTo('#new_select'+number);
		  jQuery('#destination_itinerary'+number).selectpicker();
		   jQuery('#divvv'+number).show();


		jQuery(document).on("click", ".delete-row-destiney", function () {

		var colCount = $("#customFields #hardware-body .row").length;


		if (colCount > 1) {
			if(colCount == 2){
				destinations_check ="";
					$('select[name^="destination_itinerary"]').each(function(){

						if( $(this).val() != ""){
							if(destinations_check == ""){
								destinations_check =  $(this).val();
							}else{
								destinations_check = destinations_check + ',' + $(this).val();
							}
						}
					});


					var url = jQuery('input[name="url"]').val();
					var urlpackage = url  + '/api/get-quote/itp-insurance/package_delete';
					//   var destinations =jQuery('#destination_itinerary' + number ).val();
					var destinations =destinations_check;
					var _token = jQuery('input[name="_token"]').val();

					  jQuery.ajax({
							url: urlpackage,
							method:"GET",
							data:{ _token:_token,destinations:destinations},
							success:function(result)
							{
								if(result.continent ==0){
										$('#package').html('');
										$('#package').append($('<option>', {
												value: "",
												text : "- Select Package -"
											}));
										jQuery.each(result.data, function(key, value){
										$('#package').append($('<option>', {
											value: value.package,
											text : value.package
										}));
									})
										jQuery('#package').selectpicker("refresh");
								}
							}// end sccess
						});
			}

			destinations_check ="";
			$('select[name^="destination_itinerary"]').each(function(){

				if( $(this).val() != ""){
					if(destinations_check == ""){
						destinations_check =  $(this).val();
					}else{
						destinations_check = destinations_check + ',' + $(this).val();
					}
				}
			});


		  var url = jQuery('input[name="url"]').val();
			  var urlpackage = url  + '/api/get-quote/itp-insurance/package_delete';
			//   var destinations =jQuery('#destination_itinerary' + number ).val();
			  var destinations =destinations_check;
			  var _token = jQuery('input[name="_token"]').val();

			  jQuery.ajax({
						  url: urlpackage,
						  method:"GET",
						  data:{ _token:_token,destinations:destinations},
						  success:function(result)
						  {

								if(result.continent ==1){

									$('#package').html('');
									$('#package').append($('<option>', {
											value: "",
											text : "- Select Package -"
										}));


									  jQuery.each(result.data, function(key, value){
									  $('#package').append($('<option>', {
										  value: value.package,
										  text : value.package
									  }));
								  })
									jQuery('#package').selectpicker("refresh");
								}

						  }// end sccess
					  });
		  $(this).closest('.row').remove();
		  jQuery('.delete-row-col-destiney').css('display', 'flex');
		} else {

		  jQuery('.delete-row-col-destiney').hide();
		}
		return false;
		});

		   jQuery('#destination_itinerary' + number ).on('change', function() {
				var country_destination = $('#destination_itinerary').val();
				var url = jQuery('input[name="url"]').val();
				var urlpackage = url  + '/api/get-quote/itp-insurance/package';
				var destinations =jQuery('#destination_itinerary' + number ).val();
				// var destinations =destinations_check;
				var _token = jQuery('input[name="_token"]').val();



				jQuery.ajax({
							url: urlpackage,
							method:"GET",
							data:{ _token:_token,destinations:destinations},
							success:function(result)
							{

								if(result.continent === 'Y'){
									$('#package').html('');
										$('#package').append($('<option>', {
											value: "",
											text : "- Select Package -"
										}));


										jQuery.each(result.data, function(key, value){
										$('#package').append($('<option>', {
											value: value.package,
											text : value.package
										}));
										})
									jQuery('#package').selectpicker("refresh");
								}

							}
						});

			});

		  return false;
		});

		btn4thpage_add_cruise.click(function(){
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
			var colCount = $("#customFields #hardware-body .row").length;
			if(colCount > 0){

				jQuery('.delete-row-col-cruise').css('display', 'flex');
			}else{

				jQuery('.delete-row-col-cruise').hide();
			}
			var number = Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
			var noonly = "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\\..*)\\./g, '$1')";
			var numformat1 = "vf_clean_number('destination_cruise"+number+"');vf_commafy('destination_cruise"+number+"', 2)";
			var $cloned = $('#divvv').clone().prop('id', 'divvv'+number);
			var new_row = ' <div class="row">\
												<div class="col-md-4">\
													<div class="form-group">\
														<label for="destination_cruise">Destination</label>\
														<select  id="destination_cruise' + number + '"" name="destination_cruise[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-destination_cruise-itinerary" data-size="10"  data-live-search="true" >\
																<option value="">- Select -</option>\
																@foreach($cocogen_itp_countries as $cocogen_itp_country)\
																	<option value="{{$cocogen_itp_country->country}}">{{$cocogen_itp_country->country}}</option>\
																@endforeach\
														</select>\
													</div>\
												</div>\
												<div class="col-4 col-lg-1 delete-row-col justify-content-left">\
											<button type="button" class="action delete-row-cruise btn btn-danger form-control_">\
															<svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
																<path d="M2 30 L30 2 M30 30 L2 2" />\
															</svg>\
															<span class="d-inline d-lg-none">Remove</span>\
											</button>   \
										  </div>\
											</div>';



		  $('#hardware-body-cruise').append(new_row);
			 $cloned.find('#copy_select').prop('name', 'destination_cruise[]');
			 $cloned.find('#copy_select').prop('display', 'block !important');
			 $cloned.find('#copy_select').prop('id', 'destination_cruise'+number);
		  $cloned.appendTo('#new_select'+number);
		  jQuery('#destination_cruise'+number).selectpicker();
		   jQuery('#divvv'+number).show();

		   jQuery('#destination_cruise'+number ).on('change', function() {
				var country_destination = jQuery('#destination_cruise'+number ).val();
				var url = jQuery('input[name="url"]').val();
				var urlpackage = url  + '/api/get-quote/itp-insurance/package';
				var destinations =jQuery('#destination_cruise' + number ).val();
				var _token = jQuery('input[name="_token"]').val();

				jQuery.ajax({
							url: urlpackage,
							method:"GET",
							data:{ _token:_token,destinations:destinations},
							success:function(result)
							{


								if(result.continent === 'Y'){
									$('#package').html('');
										$('#package').append($('<option>', {
											value: "",
											text : "- Select Package -"
										}));


										jQuery.each(result.data, function(key, value){
										$('#package').append($('<option>', {
											value: value.package,
											text : value.package
										}));
										})
									jQuery('#package').selectpicker("refresh");
								}

							}
						});

			});


		  return false;
		});

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
					<button type="button" class="action_ delete-row btn btn-danger form-control_">\
														<svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
															<path d="M2 30 L30 2 M30 30 L2 2" />\
													  </svg>\
													  <span class="d-inline d-lg-none">Remove</span>\
													</button>   \
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
		//   JQuery('#divvv_5thpage'+number).show();
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
													<button type="button" class="action_ delete-row btn btn-danger form-control_">\
														<svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">\
															<path d="M2 30 L30 2 M30 30 L2 2" />\
													  </svg>\
													  <span class="d-inline d-lg-none">Remove</span>\
													</button>   \
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
			updateExchangeRate(); // added 03112024
			btnback.show();
		  }
		  if(current == 2){
			btnnext.hide();
			updateExchangeRate(); //
			btnNextPage.show();
		  }

		if(current == limit) {
			btnnext.hide();
			btnsubmit.show();
			btnAdd.show();
			btnback.show(); }
		}
		var url = jQuery('input[name="url"]').val();
		 var urlpackageexchange = url  + '/get-quote/international-travel-excel-plus/get-exchange-rate';
		function updateExchangeRate() {
			$.ajax({
				url: urlpackageexchange,
				method: 'GET',
				success: function (response) {
					$('#convert_to_php_update').val(response.exchange_rate);
					$('#exchangerate').text(response.exchange_rate);
  					var serverDateTime = response.server_date_time;
				    var dateObject = new Date(serverDateTime);
				      var formattedDateTime = dateObject.getFullYear() + '-' +
				                              ('0' + (dateObject.getMonth() + 1)).slice(-2) + '-' +
				                              ('0' + dateObject.getDate()).slice(-2) + ' ' +
				                              ('0' + dateObject.getHours()).slice(-2) + ':' +
				                              ('0' + dateObject.getMinutes()).slice(-2);

				      // Update the element with the formatted date and time
				      $('#convert_date_now').val(formattedDateTime);
				},
				error: function (error) 
				{
				},
			});
		}

		function updateExchangeRate2() {
			$.ajax({
				url: urlpackageexchange,
				method: 'GET',
				success: function (response) {
					$('#convert_to_php_update2').val(response.exchange_rate);
					$('#exchangerate2').text(response.exchange_rate);
					// var totalAmountDueAll = parseFloat($('#total_amount_due_all').val());
					// var exchangeRate = parseFloat($('#convert_to_php_update2').val());
					// var exchangerate2total = totalAmountDueAll * exchangeRate;
					 
					// $('#convert_to_php2').text(ReplaceNumberWithCommas(exchangerate2total.toFixed(2)));

							
						var totalAmountDue = parseFloat(jQuery('#total_amount_due_all').val());
						var conversionRate2 = parseFloat(jQuery('#convert_to_php_update2').val());
						var result = (totalAmountDue * conversionRate2).toFixed(2);
						$('#convert_to_php2').text(ReplaceNumberWithCommas(parseFloat(result)));


				},
				error: function (error) 
				{

				},
			});
		}
		function IsEmail(email) {
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regex.test(email)) {
			return false;
			}else{
			return true;
			}
		}
		
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

	</script>

	<script type="text/javascript">2
		$(document).ready(function() {
			if (jQuery(this).is(':checked') === true) {
				jQuery('#btnConfirm').prop('disabled', false);
			}else{
				jQuery('#btnConfirm').prop('disabled', true);
			}
		$("#chckcovid").on('change', function () {
			if (jQuery(this).is(':checked') === true) {
				jQuery('#btnConfirm').prop('disabled', false);
			}else{
				jQuery('#btnConfirm').prop('disabled', true);
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
