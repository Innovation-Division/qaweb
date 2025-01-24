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

		jQuery('#departure_date_cruise_itinerary').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm/dd/yy',
			minDate: '0d',
			maxDate:'20y',
			yearRange: '1910:9999'
		}).on('focus', function(){
				if(!jQuery('select').parent().hasClass('fake-select')){
					jQuery('select').wrap('<span class="fake-select"></span>');
				}
		});  

		jQuery('#return_date_cruise_itinerary').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'mm/dd/yy',
			minDate: '0d',
			maxDate:'20y',
			yearRange: '1910:9999'
		}).on('focus', function(){
				if(!jQuery('select').parent().hasClass('fake-select')){
					jQuery('select').wrap('<span class="fake-select"></span>');
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
jQuery('.delete-row-col').hide();
jQuery('.delete-row-col-person-emergency').hide();
jQuery('.delete-row-col-bene').hide();
jQuery(document).on("click", ".delete-row-bene", function () {
  $(this).closest('.row').remove();
  var colCount = $("#customFields_5thpage_benefeciaries #hardware-body-5thpapge_benefeciaries .row").length;
  if (colCount > 1) {
    jQuery('.delete-row-col-bene').css('display', 'flex');
  } else {
    jQuery('.delete-row-col-bene').hide();
  }    
  return false;
});
jQuery(document).on("click", ".delete-row-person-emergency", function () {
  $(this).closest('.row').remove();
  var colCount = $("#customFields_5thpage #hardware-body-5thpapge .row").length;
  if (colCount > 1) {
    jQuery('.delete-row-col-person-emergency').css('display', 'flex');
  } else {
    jQuery('.delete-row-col-person-emergency').hide();
  }    
  return false;
});
jQuery(document).on("click", ".delete-row", function () {
  $(this).closest('.row').remove();
  var colCount = $("#customFields #hardware-body .row").length;
  if (colCount > 1) {
    jQuery('.delete-row-col').css('display', 'flex');
  } else {
    jQuery('.delete-row-col').hide();
  }    
  return false;
});