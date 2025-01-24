jQuery(document).ready(function(e){	 

 	jQuery('select[name="mailing_address[province]"]').change(function(){
     	
     	jQuery('select[name="mailing_address[barangay]"]').empty().append('<option value="">Barangay *');
      	var val = jQuery(this).val();
      	jQuery.ajax({
     	type: "POST",
     	url: "/vehicleinfo/index/fetchmunicipalities/",
     	data:'parm='+val,
     		success: function(data){
        	 jQuery('select[name="mailing_address[city]"]').html(data);
     		}
     	});
 	});

	jQuery('select[name="mailing_address[city]"]').change(function(){
	    
	    var val = jQuery(this).val();
	    jQuery.ajax({
	     	type: "POST",
	     	url: "/vehicleinfo/index/fetchbrgy/",
	     	data:'parm='+val,
	     	success: function(data){
	     		 jQuery('select[name="mailing_address[barangay]"]').html(data);
	     	}
	   	});
	});

	jQuery('#mailing_address').on('click', function(e){
		var form = jQuery(this).serialize();
		jQuery.ajax({
	     	type: "POST",
	     	url: "/customer/account/editMail/",
	     	//data:'parm='+val,
	     	//success: function(data){
	     		 //jQuery('select[name="mailing_address[barangay]"]').html(data);
	     	//}
	   	});

	});
});

function sortByKey(array, key) {
    return array.sort(function(a, b) {
        var x = a[key]; var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}
function formatJSON(param)
{
	var _url = BASE_URL + "skin/frontend/base/default/megaform_builder/json/";
	console.log(_url + param["location"]);
	jQuery.getJSON(_url + param["location"] + '.json', function(_location)
	{
		loadLocation(sortByKey(_location[param['location']], param['desc']), param);

		autoFillLocations(param);
	});
}

function loadLocation(location, param)
{
	jQuery(location).each(function(key, val)
		{
			if (param['com_el'])
			{
				if (jQuery(param['com_el']).attr('data-id') == val[param['com_code']])
				{
					jQuery(param['ap_el']).attr('data-id', val[param['code']]).append(
						jQuery('<option></option>').val(val[param['desc']]).html(val[param['desc']]).attr('data-id', val[param['code']])
					);
				}
			}
			else
			{
				jQuery(param['ap_el']).append(
					jQuery('<option></option>').val(val[param['desc']]).html(val[param['desc']]).attr('data-id', val[param['code']])
				);
			}
		});
}

//NOT USED BY MOTOR
function autoFillLocations(param)
{

	var parent_set = jQuery(param['ap_el']).closest('.fieldset-group');
	var mProv = jQuery('select[name$="[province]"]');
	var mCity = jQuery('select[name$="[city]"]');
	var mBrgy = jQuery('select[name$="[barangay]"]');
	var mProv_v = null;

	if(jQuery(parent_set).length)
	{
		mProv = jQuery(parent_set).find('select[name$="[province]"]');
		mCity = jQuery(parent_set).find('select[name$="[city]"]');
		mBrgy = jQuery(parent_set).find('select[name$="[barangay]"]');
	}
	console.log(mCity.data('builder-default-value'));
	var _location = param['location']

	if(_location == "province")
	{
		if((mProv_v = mProv.data('builder-default-value')) && (mProv.val() == ""))
		{
			var mProv_v_el = jQuery(mProv).find('option[value="' + mProv_v + '"]');

			if(mProv_v_el.length)
			{
				mProv_v_el.attr('selected','selected');
				mProv_v_el.prop('selected',true);
				mProv_v_el.closest('select').trigger('change');
			}
		}
	}

	if(_location == "municipality")
	{
			
		if((mCity_v = mCity.data('builder-default-value')) && (mCity.val() == ""))
		{
			//console.log(mCity_v);

			var mCity_v_el = jQuery(mCity).find('option[value="' + mCity_v + '"]');
			
			if(mCity_v_el.length)
			{
				mCity_v_el.attr('selected','selected');
				mCity_v_el.prop('selected',true);
				mCity_v_el.closest('select').trigger('change');
			}
		}
	}
	if(_location == "brgy")
	{
		if((mBrgy_v = mBrgy.data('builder-default-value')) && (mBrgy.val() == ""))
		{
			var mBrgy_v_el = jQuery(mBrgy).find('option[value="' + mBrgy_v + '"]');
			if(mBrgy_v_el.length)
			{
				mBrgy_v_el.attr('selected','selected');
				mBrgy_v_el.prop('selected',true);
				mBrgy_v_el.closest('select').trigger('change');
			}
		}
	}

}



