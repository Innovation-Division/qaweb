/*
var url = document.location.href;
url = url.substring(url.lastIndexOf("/") + 2, url.length);
*/
var fdir = window.location.protocol + '//' + window.location.hostname;
//fdir = 'ucpb.tcapdm.com';
var loc = window.location.pathname;
var dir = loc.substring(0, loc.lastIndexOf('/')+1);
var predir = '';
//for 127 loopback local testing
if ( fdir.indexOf('127') >= 0 ) {
  predir = dir.replace("/test/", "");
  predir = dir.replace("/quote/getquote/", "");
}
//alert(fdir + ' : ' +predir);
function getVehiclemakeT(val) {
  geturl = predir; //window.location.protocol + '//' + window.location.hostname + dir;
  //alert(geturl+"/vehicleinfo/index/index/"+val);
	jQuery.ajax({
	type: "POST",
	url: geturl+"/vehicleinfo/index/index/",
	data:'makeyear_id='+val,
	success: function(data){
    //alert(data);
		jQuery('select[name="insurance_required_car_details[model_name]"]').html(data);
	}
	});
}
function getVehiclemake(val) {
  geturl = predir; //window.location.protocol + '//' + window.location.hostname + dir;
  alert (geturl+ ' '+val);
}
//------------------------------------------------------------------------------
function showBrand(val) {
  geturl = predir; //window.location.protocol + '//' + window.location.hostname + dir;
  //alert(geturl+"/vehicleinfo/index/index/"+val);
	jQuery.ajax({
	type: "POST",
	url: geturl+"/vehicleinfo/index/showbrand/",
	data:'makeyear_id='+val,
	success: function(data){
    //alert(data);
		jQuery('select[name="insurance_required_car_details[brand]"]').html(data);
	}
	});
}
//------------------------------------------------------------------------------
function showvehicleModel(val) {
  //modifyQuoteSliderRange(jQuery('.slider.value_vehicle-fmv'), 50, 10, 100);
  geturl = predir; //window.location.protocol + '//' + window.location.hostname + dir;
  //alert(geturl+"/vehicleinfo/index/showsliderinfo/"+val);
	jQuery.ajax({
	type: "POST",
	url: geturl+"/vehicleinfo/index/showsliderinfo/",
	data:'id='+val,
		success: function(data){
	    	//alert(data);
			//jQuery('select[name="insurance_required_car_details[brand]"]').html(data);
		    if(!data) {
		        //alert('empty');
		        return;
		    }
		    else {
		       //alert('proceed');
		       var hasil=data.split('|');
		       modifyQuoteSliderRange(jQuery('.slider.value_vehicle-fmv'), hasil[0], hasil[1], hasil[2]);
		       jQuery(".slider-range").draggable();
		    }
		}
	});
}
//------------------------------------------------------------------------------
function modifyQuoteSliderRange(ako, deflt, minN, maxX) {
  	// $this is a reference to .slider in current iteration of each
	// find any .slider-range element WITHIN scope of ako

    //override html dom attr
    jQuery(".slider-range", ako).attr('data-min-val', minN);
    jQuery(".slider-range", ako).attr('data-max-val', maxX);
    jQuery(".slider-range", ako).attr('data-default-val', deflt);

    //override jquery data object
    jQuery(".slider-range", ako).data('min-val', minN);
    jQuery(".slider-range", ako).data('max-val', maxX);
    jQuery(".slider-range", ako).data('default-val', deflt);

	jQuery(".slider-range", ako).slider(
	{
		range: false,
		min: parseFloat(jQuery(".slider-range", ako).attr('data-min-val')),
		max: parseFloat(jQuery(".slider-range", ako).attr('data-max-val')),
		value: parseInt(jQuery(".slider-range", ako).attr('data-default-val')),
		slide: function(event, ui)
		{
			// find any element with class .amount WITHIN scope of $this
			jQuery(".amount", ako).val(parseInt(ui.value));
			jQuery('.total_value', ako).text(parseFloat(ui.value, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

			reValidate(jQuery('.amount', ako));

			if (parseInt(jQuery('.slider-range', ako).slider('option', 'min')) <= parseInt(jQuery('.amount').val()) &&
				parseInt(jQuery('.amount').val()) <= parseInt(jQuery('.slider-range', ako).slider('option', 'max'))) {
				jQuery('.btn-change').removeAttr('disabled').prop('disabled', false);
			} else {
				jQuery('.btn-change').attr('disabled', 'disabled').prop('disabled', true);
			}
		}
	});

	jQuery(".amount").val(parseInt(jQuery(".slider-range").slider("value")));
	jQuery('.slider-left').text(parseFloat(jQuery(".slider-range").slider('option', 'min'), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
	jQuery('.slider-right').text(parseFloat(jQuery(".slider-range").slider('option', 'max'), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
	jQuery('.total_value').text(parseFloat(jQuery(".slider-range").slider("value"), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());

    jQuery(".amount", ako).attr('min', parseInt(jQuery(".slider-range", ako).attr('data-min-val')));
	jQuery(".amount", ako).attr('max', parseInt(jQuery(".slider-range", ako).attr('data-max-val')));
	jQuery(".amount", ako).attr('data-min-val', parseInt(jQuery(".slider-range", ako).attr('data-min-val')));
	jQuery(".amount", ako).attr('data-max-val', parseInt(jQuery(".slider-range", ako).attr('data-max-val')));
	jQuery(".amount", ako).data('min-val', parseInt(jQuery(".slider-range", ako).attr('data-min-val')));
	jQuery(".amount", ako).data('max-val', parseInt(jQuery(".slider-range", ako).attr('data-max-val')));

	if (parseInt(jQuery('.slider-range', ako).slider('option', 'min')) <= parseInt(jQuery('.amount').val()) &&
		parseInt(jQuery('.amount').val()) <= parseInt(jQuery('.slider-range', ako).slider('option', 'max'))) {
		jQuery('.btn-change').removeAttr('disabled').prop('disabled', false);
	} else {
		jQuery('.btn-change').attr('disabled', 'disabled').prop('disabled', true);
	}

	jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').resetForm();
	jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').destroy();
	reBindValidate();

	jQuery('.amount', ako).keyup(function(){
		if (parseInt(jQuery('.slider-range', ako).slider('option', 'min')) <= parseInt(jQuery(this).val()) &&
			parseInt(jQuery(this).val()) <= parseInt(jQuery('.slider-range', ako).slider('option', 'max'))) {
			jQuery('.btn-change').removeAttr('disabled').prop('disabled', false);
		} else {
			jQuery('.btn-change').attr('disabled', 'disabled').prop('disabled', true);
		}
	});

    jQuery('.btn-change', ako).click(function()
	{
		if (jQuery(this).closest('div[data-fieldset-row]').has('.has-error').length == 0) {
			jQuery(".slider-range", ako).slider("value", jQuery('input[name="value_vehicle[fmv]"]', ako).val());
			jQuery('.total_value', ako).text(parseFloat(jQuery('input[name="value_vehicle[fmv]"]', ako).val(), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
		} else {
			jQuery(".slider-range", ako).slider("value", parseInt(jQuery(".slider-range", ako).attr('data-default-val')));
		}
	});

    jQuery(".slider-range").draggable();
}
//------------------------------------------------------------------------------
function showTravelpackage(val) {
  geturl = predir; //window.location.protocol + '//' + window.location.hostname + dir;
  //alert(geturl+"/vehicleinfo/index/index/"+val);
  //var mydata = jQuery('select[name="itinerary_multiple[destination][]"]').val();
	jQuery.ajax({
	type: "POST",
	url: geturl+"/travelinsurance/index/showtravelpackage/",
	data:'countryid='+val,
	success: function(data){
    //alert(data);
		jQuery('select[name="package[package]"]').html(data);
	}
	});
}
//------------------------------------------------------------------------------

jQuery(document).ready(function () {
/*
  jQuery(".slider").each(function()
	{
    jQuery('[name="value_vehicle[fmv]]')
  }
*/
// jQuery('select[name="insurance_required_car_details[model_name]"]').empty().append('<option value="">Model Name *</option><!--option value="">Name</option-->');
// jQuery('select[name="insurance_required_car_details[brand]"]').empty().append('<option value="">Brand *</option><!--option value="">Brand</option-->');
 //-----------------------------------------------------------------------------
 //reset values when Insurance is reselected
 if (jQuery('input[value="personalInfo"]').closest('form').find('input[name="mailing_address[same_location]"]').prop('checked'))
   {
      //alert("called");
     autoFillLocations(
      {
          'location': 'province',
          'location': 'municipality',
          'location': 'brgy',
          'ap_el' : '.personalInfo'
      });

   }
var typeofinsurance = jQuery('[name="vehicle_information[typeofinsurance]"]'); //.val();
 if (typeofinsurance.length > 0) {
    switch (typeofinsurance.val()) {
      case 'CTPL' :
        jQuery(".vehicle_information-gpvfinalvalue,.vehicle_information-cptlgrosspremium").closest('div').hide();
        break;
      default : //show two premium values
        jQuery(".vehicle_information-gpv").closest('div').hide();
      }
    }

 jQuery('select[name="insurance_required[type_insurance]"]').change(function(){
   jQuery('select[name="insurance_required_car_details[model_name]"]').empty().append('<option value="">Model Name *</option><!--option value="">Name</option-->');
   //jQuery('select[name="insurance_required_car_details[year_model]"]').prepend('<option value="" selected="selected">Year *</option>');
   jQuery('select[name="insurance_required_car_details[year_model]"] option[value="0"]').val('Year *');
   jQuery('select[name="insurance_required_car_details[year_model]"] option:first').attr('selected','selected');
   jQuery('select[name="insurance_required_car_details[brand]"]').empty().append('<option value="">Brand *</option><!--option value="">Brand</option-->');
   jQuery('div[data-fieldset-row="value_vehicle"]').hide();
 	});
 //-----------------------------------------------------------------------------
 //modifyQuoteSliderRange(jQuery('.slider.value_vehicle-fmv'), 50, 10, 100);
 //jQuery(".slider-range").draggable();

 jQuery('select[name="insurance_required_car_details[year_model]"]').change(function(){
       // your code should be here
       //val = jQuery('[name="insurance_required_car_details[year_model]"]').val();
       //alert(jQuery(this).val());
       //console.log(val);
       //getVehiclemakeT(jQuery(this).val());
       showBrand(jQuery(this).val());
      jQuery('select[name="insurance_required_car_details[model_name]"]')
          //.find('option')
          .empty()
          //.end()
          .append('<option value="">Model Name *</option><!--option value="">Name</option-->');
          //.html('* Model Name');
      jQuery('select[name="insurance_required_car_details[brand]"]').empty().append('<option value="">Brand *</option><!--option value="">Brand</option-->');
      jQuery('div[data-fieldset-row="value_vehicle"]').hide();
 });
 jQuery('select[name="insurance_required_car_details[brand]"]').change(function(){
       getVehiclemakeT(jQuery(this).val());
       jQuery('div[data-fieldset-row="value_vehicle"]').hide();
       jQuery('select[name="insurance_required_car_details[model_name]"]').empty().append('<option value="">Model Name *</option><!--option value="">Name</option-->');
 });
 jQuery('select[name="insurance_required_car_details[model_name]"]').change(function(){
       //getVehiclemakeT(jQuery(this).val());
       showvehicleModel(jQuery(this).val());
 });
 //single trip
 jQuery('select[name="itinerary_single[destination]"]').change(function(){
     showTravelpackage(parseInt(jQuery(this).val()));
 });
 //multiple trip
 jQuery('.mega-form-builds [data-fieldset-row="itinerary_multiple"]').on('change', 'select[name="itinerary_multiple[destination]\[\]"]', function(){
     //showTravelpackage(parseInt(jQuery(this).val()));
     var $select = jQuery('select[name="itinerary_multiple[destination]\[\]"]');
     var output = '';
     for (var i = 0, len = $select.length; i < len; i++) {
         output = output + $select.eq(i).val() + ',';
     }
     //alert(output);
     showTravelpackage(output);
 });

 jQuery('select[name="location_vehicle[province]"]').change(function() {
    jQuery(this).closest('.col-md-12').addClass('has-error');
    jQuery(this).closest('.col-md-4').next().find('.help-block').css('display', 'block');

    jQuery('.icon-checkmark').hide();
    jQuery(this).next().css('display', 'block');

    jQuery('select[name="location_vehicle[city]"]').val('');
    jQuery('select[name="location_vehicle[barangay]"]').val('');
    jQuery('select[name="location_vehicle[barangay]"]').empty().append('<option value="">Barangay *');
    var val = jQuery(this).val();
    jQuery.ajax({
        type: "POST",
        url: "/vehicleinfo/index/fetchmunicipalities/",
        data:'parm='+val,
        success: function(data){
            jQuery('select[name="location_vehicle[city]"]').html(data);
        }
    });
});

 jQuery('select[name="location_vehicle[city]"]').change(function(){
    jQuery(this).closest('.col-md-12').addClass('has-error');
    jQuery(this).closest('.col-md-4').next().find('.help-block').css('display', 'block');
    var val = jQuery(this).val();
    jQuery.ajax({
        type: "POST",
        url: "/vehicleinfo/index/fetchbrgy/",
        data:'parm='+val,
        success: function(data){
            jQuery('select[name="location_vehicle[barangay]"]').html(data);
        }
    });
});

jQuery('select[name="location_vehicle[barangay]"]').change(function() {
    jQuery(this).closest('.col-md-12').removeClass('has-error');
});

// jQuery('select[name="mailing_address[province]"]').change(function(){
jQuery('input[value="personalInfo"]').closest('form').find('select[name="mailing_address[province]"]').change(function(){
     //alert('triggered');
      jQuery('select[name="mailing_address[barangay]"]').empty().append('<option value="">Barangay *');
      var val = jQuery(this).val();
      //jQuery('select[name="mailing_address[city]"]').html('img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif">loading...');
      jQuery.ajax({
     	type: "POST",
     	url: "/vehicleinfo/index/fetchmunicipalities/",
     	data:'parm='+val,
     	success: function(data){
         //alert(data);
     		 jQuery('input[value="personalInfo"]').closest('form').find('select[name="mailing_address[city]"]').html(data);
         autoFillLocations(
          {
              'location': 'municipality'
          });
     	}
     	});
 });
 //jQuery('select[name="mailing_address[city]"]').change(function(){
jQuery('input[value="personalInfo"]').closest('form').find('select[name="mailing_address[city]"]').change(function(){
     //alert('triggered');
      var val = jQuery(this).val();
      //jQuery('select[name="mailing_address[barangay]"]').html('loading...');
      jQuery.ajax({
     	type: "POST",
     	url: "/vehicleinfo/index/fetchbrgy/",
     	data:'parm='+val,
     	success: function(data){
         //alert(data);
     		 jQuery('select[name="mailing_address[barangay]"]').html(data);
         autoFillLocations(
          {
              'location': 'brgy'
          });
     	}
     	});
 });
//---------------------ITP related----------------------------------------
//jQuery('select[name="mailing_address[province]"]').change(function(){
jQuery('input[value="personalInfoItp"]').closest('form').find('select[name="mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('input[value="personalInfoItp"]').closest('form').find('select[name="mailing_address[barangay]"]').empty().append('<option value="">Barangay *');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalities/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('input[value="personalInfoItp"]').closest('form').find('select[name="mailing_address[city]"]').html(data);
     }
     });
});
//jQuery('select[name="mailing_address[city]"]').change(function(){
jQuery('input[value="personalInfoItp"]').closest('form').find('select[name="mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgy/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('input[value="personalInfoItp"]').closest('form').find('select[name="mailing_address[barangay]"]').html(data);
     }
     });
});
jQuery('select[name="secondary_mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('select[name="secondary_mailing_address[barangay]"]').empty().append('<option value="">Barangay');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalitiessecondary/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="secondary_mailing_address[city]"]').html(data);
     }
     });
});
jQuery('select[name="secondary_mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgysecondary/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="secondary_mailing_address[barangay]"]').html(data);
     }
     });
});

jQuery('select[name="company_contact_person_mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('select[name="company_contact_person_mailing_address[barangay]"]').empty().append('<option value="">Barangay *');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalities/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="company_contact_person_mailing_address[city]"]').html(data);
     }
     });
});
jQuery('select[name="company_contact_person_mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgy/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="company_contact_person_mailing_address[barangay]"]').html(data);
     }
     });
});

jQuery('select[name="group_contact_person_mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('select[name="group_contact_person_mailing_address[barangay]"]').empty().append('<option value="">Barangay *');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalities/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="group_contact_person_mailing_address[city]"]').html(data);
     }
     });
});
jQuery('select[name="group_contact_person_mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgy/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="group_contact_person_mailing_address[barangay]"]').html(data);
     }
     });
});

jQuery('select[name="company_contact_person_secondary_mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('select[name="company_contact_person_secondary_mailing_address[barangay]"]').empty().append('<option value="">Barangay');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalitiessecondary/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="company_contact_person_secondary_mailing_address[city]"]').html(data);
     }
     });
});
jQuery('select[name="company_contact_person_secondary_mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgysecondary/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="company_contact_person_secondary_mailing_address[barangay]"]').html(data);
     }
     });
});

jQuery('select[name="group_contact_person_secondary_mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('select[name="group_contact_person_secondary_mailing_address[barangay]"]').empty().append('<option value="">Barangay');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalitiessecondary/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="group_contact_person_secondary_mailing_address[city]"]').html(data);
     }
     });
});
jQuery('select[name="group_contact_person_secondary_mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgysecondary/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="group_contact_person_secondary_mailing_address[barangay]"]').html(data);
     }
     });
});

//---------------------ITP related----------------------------------------
//---------------------Fire related----------------------------------------
jQuery('select[name="property_location[province]"]').change(function(){
    //alert('triggered');
     jQuery('select[name="property_location[barangay]"]').empty().append('<option value="">Barangay *');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/firehppinfo/index/fetchmunicipalities/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="property_location[city]"]').html(data);
     }
     });
});
jQuery('select[name="property_location[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/firehppinfo/index/fetchbrgy/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('select[name="property_location[barangay]"]').html(data);
     }
     });
});
//---------------------Fire related----------------------------------------
jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="address[province]"]').change(function(){
    //alert('triggered');
     jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="address[barangay]"]').empty().append('<option value="">Barangay *');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalities/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="address[city]"]').html(data);
     }
     });
});
//jQuery('select[name="mailing_address[city]"]').change(function(){
jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgy/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="address[barangay]"]').html(data);
     }
     });
});

jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="mailing_address[province]"]').change(function(){
    //alert('triggered');
     jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="mailing_address[barangay]"]').empty().append('<option value="">Barangay *');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchmunicipalities/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="mailing_address[city]"]').html(data);
     }
     });
});
//jQuery('select[name="mailing_address[city]"]').change(function(){
jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="mailing_address[city]"]').change(function(){
    //alert('triggered');
     var val = jQuery(this).val();
     jQuery.ajax({
     type: "POST",
     url: "/vehicleinfo/index/fetchbrgy/",
     data:'parm='+val,
     success: function(data){
        //alert(data);
        jQuery('input[value="personalInfoFire"]').closest('form').find('select[name="mailing_address[barangay]"]').html(data);
     }
     });
});
//---------------------Fire related----------------------------------------
});
