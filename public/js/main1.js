console.log('megaform_builder main js init');

function reBindCalendar()
{
	jQuery('.mega-form-builds .calendar_input[data-date-range="false"]').datepicker(
	{
		showOn: 'focus',
		dateFormat: 'yy-mm-dd',
		showClose: true,
		showButtonPanel: true,
		closeText: "OK",
		changeMonth: true,
		changeYear: true,
		minDate: 0,
		beforeShow: function()
		{
			setTimeout(function()
			{
				jQuery('.ui-datepicker').css('z-index', 2);
			}, 0);
		}
	}).on("change", function(e)
	{
		reValidate(jQuery(this).prop('name'));
	});;

	jQuery('.mega-form-builds .calendar_input[data-date-range="true"][data-date-range-line="start"]').datepicker(
	{
		showOn: 'focus',
		dateFormat: 'yy-mm-dd',
		showClose: true,
		minDate: '+1d',
		showButtonPanel: true,
		closeText: "OK",
		changeMonth: true,
		changeYear: true,
		beforeShow: function()
		{
			if (jQuery(this).attr('readonly'))
			{
				return false;
			}

			setTimeout(function()
			{
				jQuery('.ui-datepicker').css('z-index', 2);
			}, 0);
		}
	}).on("change", function(e)
	{

		var _to = jQuery(this).closest('.fieldset-group-set').find('.calendar_input[data-date-range="true"][data-date-range-line="end"]')

		if (_to.length)
		{
			jQuery(_to).datepicker("option", "minDate", jQuery(this).val());
		}

		reValidate(jQuery(this));
	});

	jQuery('.mega-form-builds .calendar_input[data-date-range="true"][data-date-range-line="end"]').datepicker(
	{
		showOn: 'focus',
		dateFormat: 'yy-mm-dd',
		showClose: true,
		minDate: '+1d',
		showButtonPanel: true,
		closeText: "OK",
		changeMonth: true,
		changeYear: true,
		beforeShow: function()
		{
			if (jQuery(this).attr('readonly'))
			{
				return false;
			}

			setTimeout(function()
			{
				jQuery('.ui-datepicker').css('z-index', 2);
			}, 0);
		}
	}).on("change", function(e)
	{
		reValidate(jQuery(this));
	});

}

function reBindValidate()
{
	if(Object.size(jQuery('#megaForm-defaultForm-1').data('bootstrapValidator')))
	{
		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
	}

	jQuery('#megaForm-defaultForm-1').bootstrapValidator(
	{
		excluded: [':disabled', ':hidden', ':not(:visible)']
	}).on('success.form.bv', function(e)
	{
		var status = saveFormData(e);
	});
}

function saveFormData(evt, bvdata)
{
	if (jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').isValid())
	{
		var $submitbutton = jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').getSubmitButton();
		// console.log($submitbutton);

		// Get the form instance
		var $form = jQuery(evt.target).closest('form');

		// Prevent form submission
		if ((!$form.data('action-saved')) && Object.size($submitbutton))
		{
			evt.preventDefault();

			console.log('Saving Datas');
			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');

			// if (event.target.type == 'button')
			// {
			// 	return false;
			// }
			// else
			// {
			// }

			var payload_array = $form.serialize()
		        + '&'
		        + encodeURI($submitbutton.attr('name'))
		        + '='
		        + encodeURI($submitbutton.attr('value'))
		    ;


			// Use Ajax to submit form data
			jQuery.ajax(
			{
				url: $form.data('action-save'),
				type: 'POST',
				dataType: "json",
				//async: false,
				//cache: false,
				//timeout: 30000,
				data: payload_array,
				error: function()
				{
					alert('Somethings wrong. Please try again.');
					$form.find('input[type="submit"]').removeAttr('disabled');
					$form.data('bootstrapValidator').resetForm();
					$form.data('action-saved', false);
					$form.attr('data-action-saved', 'false');
					return true;
				},
				success: function(result)
				{
					jQuery(".preloader").removeClass("up");
					if ($submitbutton.attr('value') == 'Save')
					{
						alert('An email is successfully sent to your email address. Please check your email.');
					}

                    jQuery('li.btn-default').addClass('current');
                    jQuery('.quote-process li.btn').each(function() {
                        if (jQuery(this).hasClass('current')) {
                            var step = jQuery(this).attr('name');
                            localStorage[step] = result.form_key;
                        }
                    });

					if(Object.size(result.form_key) && Object.size(result.id))
					{
						$form.data('action-saved', true);
						$form.attr('data-action-saved', 'true');
						$form.find('input[name="form_key"]').val(result.form_key);
						// $form.trigger('submit');
						// var $button_submitter = jQuery(jQuery(event.target).closest('form')).data('bootstrapValidator').getSubmitButton();
						// if (jQuery(event.target).get(0) === jQuery('[value="Save"]').get(0))
						// {
						// 	$button_submitter = jQuery(event.target);
						// }
						setTimeout(function()
						{
							jQuery($submitbutton).removeAttr('disabled').trigger('click');
						}, 500);
					}
					else
					{
						alert('Somethings wrong. Please try again.');
						$form.find('input[type="submit"]').removeAttr('disabled');
						$form.data('bootstrapValidator').resetForm();
						$form.data('action-saved', false);
						$form.attr('data-action-saved', 'false');
						return true;
					}
				}
			});

			// return jQuery.post($form.data('action-save'), $form.serialize(), function(result)
			// {
			// 	console.log(result);
			// 	$form.data('action-saved', true);
			// 	$form.attr('data-action-saved', 'true');
			// 	$form.trigger('submit');
			// 	// setTimeout(function(){
			// 	// 	jQuery('#megaForm-defaultForm-1 input[type="submit"]').trigger('click');
			// 	// }, 500);

			// 	//todo optimize redirect or success
			// 	//window.location.href = jQuery('[name="on_success_url"]').val();

			// }, 'json');
		}
	}
}

function reValidate(_el)
{
	jQuery('#megaForm-defaultForm-1').bootstrapValidator('revalidateField', _el);
}

function reBindMask()
{
	jQuery(".mega-form-builds [data-mask-config]").each(function()
	{
		var mask_config = {
			completed: function()
			{
				reValidate(jQuery(this));
			}
		};

		if (typeof jQuery(this).data('mask-placeholder') != "undefined" && jQuery(this).data('mask-placeholder') != "")
		{
			mask_config.placeholder = jQuery(this).data('mask-placeholder');
		}

		// if(typeof jQuery(this).data('pattern') != "undefined" && jQuery(this).data('pattern') != "")
		// {
		// 	mask_config.pattern = jQuery(this).data('pattern');
		// }

		jQuery(this).mask(jQuery(this).data('mask-config'), mask_config);
	});
}

function hideDependency(_el)
{
	if (typeof _el == "undefined")
	{
		return false;
	}
	jQuery(_el).bootstrapValidateToggleAllExclude(true);
	jQuery(_el).hide();
	reBindValidate();
}

function showDependency(_el)
{
	if (typeof _el == "undefined")
	{
		return false;
	}
	jQuery(_el).bootstrapValidateToggleAllExclude();
	jQuery(_el).show();
	reBindValidate();
}

function displayFields(condition)
{
	jQuery('div[data-fieldset-group-condition]').each(function(ind, _div)
	{

		// if (jQuery(this).attr('data-fieldset-group-condition')) {

			var dgc = jQuery.parseJSON(jQuery(this).attr('data-fieldset-group-condition').replaceAll("'", '"'));
			var dg = jQuery.parseJSON(jQuery(this).attr('data-fieldset-group').replaceAll("'", '"'));
			var dgc_split;

			dgc.forEach(function(_dgc)
			{ // Split data-group-condition
				dgc_split = _dgc.split('-');
				dgc_split.shift();
			});

			var ctr = [];

			for (i = 0; i < condition.length; i++)
			{
				if (jQuery.inArray(dgc_split[i], dg))
				{
					if (jQuery.inArray(condition[i], dg[dgc_split[i]]) > -1)
					{
						ctr.push(true);
					}
				}
			}

			if (condition.length == ctr.length)
			{
				showDependency(_div);
			}
			else
			{
				hideDependency(_div);
			}
		// }
	});
}

function sortByKey(array, key) {
    return array.sort(function(a, b) {
        var x = a[key]; var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}

function formatJSON(param)
{
	var _url = BASE_URL + "skin/frontend/base/default/megaform_builder/json/";

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

// Gets current date
function getToday()
{
	var d = new Date();
	var dd = d.getDate();
	var mm = d.getMonth() + 1;
	var yyyy = d.getFullYear();

	if (mm < 10)
	{
		mm = '0' + mm;
	}

	return {
		'today'   : yyyy + '-'         + mm + '-' + dd,
		'one_y'   : parseInt(yyyy + 1) + '-' + mm + '-' + dd,
		'three_y' : parseInt(yyyy + 3) + '-' + mm + '-' + dd,
	};
}

function toggleExclude(_to_exclude)
{
	jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').resetForm();

	var excluded_fields = [];
	var included_fields = [];

	jQuery('[data-on-save-exclude]').each(function()
	{
		if (jQuery(this).data('on-save-exclude') == false)
		{
			excluded_fields.push(jQuery(this));
		}
		else
		{
			included_fields.push(jQuery(this));
		}

	});

	if (typeof _to_exclude == 'undefined')
	{
		_to_exclude = true;
	}

	exclude(included_fields, _to_exclude);
}

function exclude(fieldsets, _to_exclude)
{
	var bv_excluded = [];

	jQuery.each(fieldsets, function()
	{
		if (jQuery(this).attr('data-bv-excluded') == 'false')
		{
			bv_excluded.push(jQuery(this));
		}
	});

	jQuery.each(bv_excluded, function()
	{
		jQuery(this).attr('data-bv-excluded', _to_exclude).data('bv-excluded', _to_exclude);
	});

	jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');

	reBindValidate();

	jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();

	jQuery.each(bv_excluded, function()
	{
		jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
	});
}

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

/*new auto fill*/
function autoFillLocation(param)
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

	var _location = param['location'];
	if(_location == "province")
	{
		if(((mProv_v = mProv.data('builder-default-value')) || (mProv_v = mProv.data('location-vehicle-value'))) && (mProv.val() == ""))
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
		if(((mCity_v = mCity.data('builder-default-value')) || (mCity_v = mCity.data('location-vehicle-value'))) && (mCity.val() == ""))
		{
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
		if(((mBrgy_v = mBrgy.data('builder-default-value')) || (mBrgy_v = mBrgy.data('location-vehicle-value'))) && (mBrgy.val() == ""))
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


/*new auto fill*/
function autoFillLocationItp(param)
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

	var _location = param['location'];
	var _municipality = param['municipality'];
	var _brgy = param['brgy'];
	if(_location == "province")
	{
		if(((mProv_v = mProv.data('builder-default-value')) || (mProv_v = mProv.data('location-vehicle-value'))) && (mProv.val() == ""))
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
	if(_municipality == "municipality")
	{
		if(((mCity_v = mCity.data('builder-default-value')) || (mCity_v = mCity.data('location-vehicle-value'))) && (mCity.val() == ""))
		{
			var mCity_v_el = jQuery(mCity).find('option[value="' + mCity_v + '"]');

			if(mCity_v_el.length)
			{
				mCity_v_el.attr('selected','selected');
				mCity_v_el.prop('selected',true);
				mCity_v_el.closest('select').trigger('change');
			}
		}
	}
	if(_brgy == "brgy")
	{
		if(((mBrgy_v = mBrgy.data('builder-default-value')) || (mBrgy_v = mBrgy.data('location-vehicle-value'))) && (mBrgy.val() == ""))
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

/*new auto fill*/
function autoFillLocationGroupItp(param)
{
	var parent_set = jQuery(param['ap_el']);
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
	var _location = param['location'];
	var _municipality = param['municipality'];
	var _brgy = param['brgy'];
	if(_location == "province")
	{
		if(((mProv_v = mProv.data('builder-default-value')) || (mProv_v = mProv.data('location-vehicle-value'))) && (mProv.val() == ""))
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
	if(_municipality == "municipality")
	{
		if(((mCity_v = mCity.data('builder-default-value')) || (mCity_v = mCity.data('location-vehicle-value'))) && (mCity.val() == ""))
		{
			var mCity_v_el = jQuery(mCity).find('option[value="' + mCity_v + '"]');

			if(mCity_v_el.length)
			{
				mCity_v_el.attr('selected','selected');
				mCity_v_el.prop('selected',true);
				mCity_v_el.closest('select').trigger('change');
			}
		}
	}
	if(_brgy == "brgy")
	{
		if(((mBrgy_v = mBrgy.data('builder-default-value')) || (mBrgy_v = mBrgy.data('location-vehicle-value'))) && (mBrgy.val() == ""))
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

function autoFillGender(param)
{
	var mProv = jQuery('.personalInfo select[name$="[gender]"]');
	var mProv_v = null;

	var _location = param['gender']

	if(_location == "gender")
	{
		if((mProv_v = mProv.data('location-vehicle-value')) && (mProv.val() == ""))
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
}

function autoFillAllItp(param)
{
	var mProv = jQuery(param['ap_el'] +' select[name$="['+param['element']+']"]');
	var mProv_v = null;

	var _location = param['element']

	if(_location == "gender" || _location == "nationality" || _location == "occupation")
	{
		if((mProv_v = mProv.data('location-vehicle-value')) && (mProv.val() == ""))
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
}

function autoFillGenderItp(param)
{
	var mProv = jQuery('.personalInfoItp select[name$="[gender]"]');
	var mProv_v = null;

	var _location = param['gender']

	if(_location == "gender")
	{
		if((mProv_v = mProv.data('location-vehicle-value')) && (mProv.val() == ""))
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
}

function autoFillNation(param)
{
	var mProv = jQuery(param['ap_el'] + ' select[name$="[nationality]"]');
	var mProv_v = null;
	var _location = param['nationality']

	if(_location == "nationality")
	{
		if((mProv_v = mProv.data('location-vehicle-value')) && (mProv.val() == ""))
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
}

function autoFillOccu(param)
{
	var mProv = jQuery(param['ap_el'] + ' select[name$="[occupation]"]');
	var mProv_v = null;
	var _location = param['occupation']

	if(_location == "occupation")
	{
		if((mProv_v = mProv.data('location-vehicle-value')) && (mProv.val() == ""))
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
}

function motor()
{
	displayFields([""]);

	var btnCont     = '<div class="row"><div class="col-md-12 btn-cont-back"><div class="pull-right col-cus-btn-12"><input type="button" class="btn btn-continue" value="Continue"></div></div></div>';
	var btnBack     = '<div class="pull-left col-cus-btn-12"><div class="btn-back-wrapper"><input type="button" class="btn btn-back" value="Back"></div></div>';
	var btnBackLast = '<input type="button" class="btn btn-back" value="Back">';
	var btnAppend   = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';

	jQuery('div[data-slide]:first-child').append(btnCont);
	jQuery('div[data-slide]:not(:first-child):not(:last)').append(btnAppend);
	jQuery('div[data-slide]:last').next().find('.btn-cont-back').prepend(btnBackLast);

	jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set')
		.first()
		.find('.btn-delete')
		.addClass('hide');

	if (jQuery('select[name="insurance_required[type_insurance]"]').val() != '') {
		jQuery('select[name="insurance_required[type_insurance]"]').trigger('change');
	}

	jQuery(".slider").each(function()
	{
		// $this is a reference to .slider in current iteration of each
		var ako = jQuery(this);

		jQuery('.btn-change', ako).attr('disabled', 'disabled').prop('disabled', true);

		// find any .slider-range element WITHIN scope of ako
		jQuery(".slider-range", ako).slider(
		{
			range: false,
			min: parseInt(jQuery(".slider-range", ako).attr('data-min-val')),
			max: parseInt(jQuery(".slider-range", ako).attr('data-max-val')),
			value: parseInt(jQuery(".slider-range", ako).attr('data-default-val')),
			slide: function(event, ui)
			{
				// find any element with class .amount WITHIN scope of $this
				jQuery(".amount", ako).val(ui.value);
				jQuery('.total_value', ako).text(parseFloat(ui.value, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
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

	    jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').resetForm();
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').destroy();
		reBindValidate();

	    jQuery('.amount', ako).keyup(function(){
	    	if (jQuery('.slider-range', ako).slider('option', 'min') <= parseInt(jQuery(this).val()) && parseInt(jQuery(this).val()) <= jQuery('.slider-range', ako).slider('option', 'max')) {
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
	});

	// Hide /show select options based on checkbox
	jQuery('input[name="insurance_required[for_rent]"]').change(function()
	{
		if (jQuery('input[name="insurance_required[for_rent]"]').prop('checked'))
		{
			jQuery('select[name="insurance_required[type_insurance]"] option[value=""]').prop('selected', false);
			jQuery('select[name="insurance_required[type_insurance]"] option[value=""]').removeAttr('selected');
			jQuery('select[name="insurance_required[type_insurance]"] option[value="CTPL"]').attr('selected', 'selected');
			jQuery('select[name="insurance_required[type_insurance]"] option[value="CTPL"]').prop('selected', true);
			jQuery('select[name="insurance_required[type_insurance]"] option[value!="CTPL"]').hide();
			displayFields(["CTPL"]);
		}
		else
		{
			jQuery('select[name="insurance_required[type_insurance]"] option').removeAttr('selected');
			jQuery('select[name="insurance_required[type_insurance]"] option').prop('selected', false);
			jQuery('select[name="insurance_required[type_insurance]"] option[value=""]').prop('selected', true);
			jQuery('select[name="insurance_required[type_insurance]"] option[value=""]').attr('selected', 'selected');
			jQuery('select[name="insurance_required[type_insurance]"] option').show();
		}

		jQuery('select[name="insurance_required[type_insurance]"]').trigger('change');

	});

	if (jQuery('select[name="insurance_required[type_insurance]"]').val() != '') {
		jQuery('select[name="insurance_required[type_insurance]"]').trigger('change');
	}

	jQuery('input:radio[name="cover_information[group_type]"]').on('change', function()
	{
		displayFields(["Group", jQuery(this).val()]);
	});

	jQuery('select[name="insurance_required[type_insurance]"]').on('change', function()
	{
		displayFields([jQuery(this).val()]);

		if (jQuery(this).val() != 'CTPL' &&
			jQuery('select[name="insurance_required_car_details[model_name]"]').val() != '') {
			jQuery('div[data-fieldset-row="value_vehicle"]').show();
		} else {
			jQuery('div[data-fieldset-row="value_vehicle"]').hide();
		}

		if (jQuery(this).val() == 'CTPL') {
			hideDependency(jQuery('div[data-fieldset-row="accessories_non_standard"]'));
		} else {
			showDependency(jQuery('div[data-fieldset-row="accessories_non_standard"]'));
		}
	});

	if (jQuery('select[name="insurance_required[type_insurance]"]').val() != 'CTPL' &&
		jQuery('select[name="insurance_required_car_details[model_name]"]').val() != '')
	{
		jQuery('div[data-fieldset-row="value_vehicle"]').show();
	}
	else
	{
		jQuery('div[data-fieldset-row="value_vehicle"]').hide();
	}

	jQuery('select[name="insurance_required_car_details[model_name]"]').on('change', function()
	{
		if (jQuery(this).val() != '' &&
			jQuery('select[name="insurance_required[type_insurance]"]').val() != 'CTPL') {
			jQuery('div[data-fieldset-row="value_vehicle"]').show();
		}
		else
		{
			jQuery('div[data-fieldset-row="value_vehicle"]').hide();
		}
	});

	jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"]').on('change',
		'select[name="accessories_non_standard[accessory][]"]', function()
	{
		if (jQuery(this).val() != '')
		{
			jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery(this).closest('.fieldset-group-set')
				.find('input[name="accessories_non_standard[value][]"]')
				.attr('data-bv-excluded', false)
				.data('bv-excluded', false);
		}
		else
		{
			jQuery(this).attr('data-bv-excluded', true).data('bv-excluded', true);
			jQuery(this).closest('.fieldset-group-set')
				.find('input[name="accessories_non_standard[value][]"]')
				.attr('data-bv-excluded', true)
				.data('bv-excluded', true);
		}

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
	});

	jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"]').on('change',
		'input[name="accessories_non_standard[value][]"]', function()
	{
		if (jQuery(this).val() != '')
		{
			jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery(this).closest('.fieldset-group-set')
				.find('select[name="accessories_non_standard[accessory][]"]')
				.attr('data-bv-excluded', false)
				.data('bv-excluded', false);
		}
		else
		{
			jQuery(this).attr('data-bv-excluded', true).data('bv-excluded', true);
			jQuery(this).closest('.fieldset-group-set')
				.find('select[name="accessories_non_standard[accessory][]"]')
				.attr('data-bv-excluded', true)
				.data('bv-excluded', true);
		}

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
	});

	jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"]').on('click',
		'.btn-add', function()
	{
		jQuery(this).closest('.fieldset-group-set')
			.find('select[name="accessories_non_standard[accessory][]"]')
			.attr('data-bv-excluded', false)
			.data('bv-excluded', false);

		jQuery(this).closest('.fieldset-group-set')
			.find('input[name="accessories_non_standard[value][]"]')
			.attr('data-bv-excluded', false)
			.data('bv-excluded', false);

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();

		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();

		if (jQuery(this).closest('.fieldset-group-set').hasClass('has-error'))
		{
			return false;
		}
		else
		{
			jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set')
				.first()
				.find('.btn-delete')
				.removeClass('hide');

			var observer = new MiniDaemon(jQuery(this),
            function(nIndex, nLength, bBackwards, owner)
            {
                var _next_set = jQuery(owner.owner).closest('.fieldset-group-set').next();

                if(_next_set.length)
                {
                	jQuery(_next_set).find('select[name="accessories_non_standard[accessory][]"]')
						.attr('data-bv-excluded', true)
						.data('bv-excluded', true);

					jQuery(_next_set).find('input[name="accessories_non_standard[value][]"]')
						.attr('data-bv-excluded', true)
						.data('bv-excluded', true);

					jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
					reBindValidate();
                }

                return false;

            }, 100, 8);
        observer.start();
		}
	});

	jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"]').on('click',
		'.btn-delete', function()
	{
		var observer = new MiniDaemon(jQuery(this),
            function(nIndex, nLength, bBackwards, owner)
            {
                if (jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').length == 1)
                {
                	jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set')
						.first()
						.find('.btn-delete')
						.addClass('hide');

					var _firstAccessory      = jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').first().find('select[name="accessories_non_standard[accessory][]"]').attr('data-bv-excluded', true).data('bv-excluded', true);
					var _firstAccessoryValue = jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').first().find('input[name="accessories_non_standard[value][]"]').attr('data-bv-excluded', true).data('bv-excluded', true);

					if (jQuery(_firstAccessory).val() == '' ||
						jQuery(_firstAccessoryValue).val() == '')
					{
						jQuery(_firstAccessory).attr('data-bv-excluded', true).data('bv-excluded', true);
						jQuery(_firstAccessoryValue).attr('data-bv-excluded', true).data('bv-excluded', true);

						reBindValidate();
					}
                }

                return false;

            }, 100, 8);
        observer.start();
	});

	jQuery('input[type="submit"][value="GET QUOTE"]').on('click', function()
	{
		var _firstAccessory      = jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').first().find('select[name="accessories_non_standard[accessory][]"]');
		var _firstAccessoryValue = jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').first().find('input[name="accessories_non_standard[value][]"]');


		var _lastAccessory      = jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').last().find('select[name="accessories_non_standard[accessory][]"]');
		var _lastAccessoryValue = jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').last().find('input[name="accessories_non_standard[value][]"]');

		if (jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').length == 1)
		{
			if (jQuery(_firstAccessory).val() != '' ||
				jQuery(_firstAccessoryValue).val() != '')
			{
				jQuery(_firstAccessory).attr('data-bv-excluded', false).data('bv-excluded', false);
				jQuery(_firstAccessoryValue).attr('data-bv-excluded', false).data('bv-excluded', false);
			}
			else
			{
				jQuery(_firstAccessory).attr('data-bv-excluded', true).data('bv-excluded', true);
				jQuery(_firstAccessoryValue).attr('data-bv-excluded', true).data('bv-excluded', true);
			}
		}
		else if (jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').length > 1)
		{
			jQuery('.mega-form-builds [data-fieldset-row="accessories_non_standard"] .fieldset-group-set').each(function()
			{
				if (jQuery(this).find('select[name="accessories_non_standard[accessory][]"]').val() != '')
				{
					jQuery(this).find('select[name="accessories_non_standard[accessory][]"]')
						.attr('data-bv-excluded', false)
						.data('bv-excluded', false);

					jQuery(this).find('input[name="accessories_non_standard[value][]"]')
						.attr('data-bv-excluded', false)
						.data('bv-excluded', false);
				}

				if (jQuery(this).find('input[name="accessories_non_standard[value][]"]').val() != '')
				{
					jQuery(this).find('select[name="accessories_non_standard[accessory][]"]')
						.attr('data-bv-excluded', false)
						.data('bv-excluded', false);

					jQuery(this).find('input[name="accessories_non_standard[value][]"]')
						.attr('data-bv-excluded', false)
						.data('bv-excluded', false);
				}
			});

			if (jQuery(_lastAccessory).val() == '' &&
				jQuery(_lastAccessoryValue).val() == '')
			{
				jQuery(_lastAccessory).attr('data-bv-excluded', true).data('bv-excluded', true);
				jQuery(_lastAccessoryValue).attr('data-bv-excluded', true).data('bv-excluded', true);
			}
			else
			{
				jQuery(_lastAccessory).attr('data-bv-excluded', false).data('bv-excluded', false);
				jQuery(_lastAccessoryValue).attr('data-bv-excluded', false).data('bv-excluded', false);
			}
		}

		jQuery('input[name="promo_code[promo_code]"]').attr('data-bv-excluded', 'true');
		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();
	});
}

function generatePreview(input_files)
{
	input_files.each(function(){
		var _img_url = jQuery(this).attr('data-builder-default-value');
		if(_img_url != "") {
			if(_img_url.slice(-4) == ".pdf") {
				_img_url = BASE_URL + "/skin/frontend/smartwave/porto_child/images/adobe-pdf-icon.png";
			}
			var img_container = jQuery(this).siblings('label#file-drag').find('.file-img').removeClass('hidden').find('#file-image');
			img_container.parent().siblings('#start').addClass('hidden').parent().addClass("upload-disabled");
			imageUrlToBase(_img_url, function(canvas){
				_base64 = canvas.toDataURL();
				fName = "<p>"+_img_url.substring(_img_url.lastIndexOf('/')+1)+"</p>";
				img_container.attr('src', _base64).parent().siblings("#response").removeClass('hidden').append(fName);
			});
		}
	});
}

function vehicleInfo()
{
	// INITIAL HIDE PAG MAGISA LANG ANG FIELDSET-GROUP-SET
	counterFieldsetGs(jQuery('[data-fieldset-row="accessories_other_standard"]'));

	function counterFieldsetGs(_targetParent) {
		var d = setTimeout(function(){
			var child = _targetParent.find('.fieldset-group-set').length;
			if(child == 1) {
				_targetParent.find('.btn-delete').addClass('hide');
			} else {
				_targetParent.find('.btn-delete').removeClass('hide');
			}
		}, 1, function(){
			clearTimeout(d);
		});
	}

	function isPreviousDay(date_element)
	{
		if (getToday().today > jQuery(date_element).val() == true) {
			jQuery(date_element).val(getToday().today);
		}
	}

	function u_formatBytes(bytes,decimals) {
	   if(bytes == 0) return '0 Bytes';
	   var k = 1024,
	       dm = decimals || 2,
	       sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
	       i = Math.floor(Math.log(bytes) / Math.log(k));
	   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
	}

	function checkFileType(input) {
		acceptedFileType = ["jpg","gif","png", "jpeg", "bmp", "pdf"];
		//var _file = document.getElementById('file-upload-0');
		var sizeInMb;
		var sizeIn = 0;
		var sizeLimit= 2000000; //2048000 or 2MB
		if(input.files[0].size !== null && input.files[0].size !== '') {
			 //sizeInMb = input.files[0].size/1024;
			 sizeInMb = u_formatBytes(input.files[0].size);
			 sizeIn = input.files[0].size;
		}
		if(Object.size(input.value))
		{
			fileType = input.value.substring(input.value.lastIndexOf('.') + 1);
			fileType = fileType.toLowerCase();
			//sizeIn = '1 cond';
		}
		else
		{
			fileType = jQuery(input).data('builder-default-value').substring(jQuery(input).data('builder-default-value').lastIndexOf('.') + 1);
			//_file = input.files[0];
			//sizeInMb = _file.size/1024;
			//sizeIn = '2 cond';
		}
		if(acceptedFileType.indexOf(fileType)>-1) {
			if(fileType == "pdf")
				return fileType;
				if (sizeIn > sizeLimit) {
					//alert(' The image you\'ve uploaded is too big '+sizeInMb.toString()+' ( must be less than 2000 KB)');
					alert(' The image you\'ve uploaded exceeds 2MB (2000KB)');
					return false;}
			return true;
		} else {
			//alert(sizeInMb.toString()+ ' '+sizeLimit.toString()+" File type not accepted");
			//alert(_file.files[0].size.toString()+ ' '+" File type not accepted");
			alert(" File type not accepted");
			return false;
		}
	}

	this.updateIdAndLabel = function() {
		_elms = jQuery('div[data-fieldset-group="upload_orcr"] .fieldset-group-set');
	  	_len = _elms.length;
		for (i=0; i<_len; i++) {
	  		_elms.eq(i).find('input.fileUpload').attr('id','file-upload-'+i)
	  			.siblings('label').attr('for', 'file-upload-'+i);
	  	}
	}
	this.updateIdAndLabel = function() {
		_elms = jQuery('div[data-fieldset-group="upload_orcr"] .fieldset-group-set');
	  	_len = _elms.length;
		for (i=0; i<_len; i++) {
	  		_elms.eq(i).find('input.fileUpload').attr('id','file-upload-'+i)
	  			.siblings('label').attr('for', 'file-upload-'+i);
	  	}
	}
	function readURL(input,imgContainerElement,pdfSrc) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e) {
	    	if(gImgPreview.indexOf(e.target.result)>-1){
	    		alert('File is already selected');
	    		jQuery('.fieldset-group-set:last-child #file-drag .file-img').siblings('#response').empty();
	    		input.value = '';
	    	} else {
	    		if(pdfSrc) {
					image_preview = BASE_URL + "/skin/frontend/smartwave/porto_child/images/adobe-pdf-icon.png";
	    		} else {
	    			image_preview = e.target.result;
	    		}

	    	currentImg = jQuery(imgContainerElement).attr('data-preview');
	    	if(gImgPreview.indexOf(currentImg) > -1)
			{
				gImgPreview.splice(gImgPreview.indexOf(currentImg), 1);
			}

		      imgContainerElement.attr({
		      	'src' : image_preview,
		      	'data-preview': e.target.result
		      }).parent().removeClass("hidden").siblings('#start').addClass("hidden").parent().addClass("upload-disabled");
		      gImgPreview.push(e.target.result);
	    	}
	    }
	    reader.readAsDataURL(input.files[0]);
	  }
	}
	function purgeUploadedFile(val) {
		jQuery.ajax({
		type: "POST",
		url: "/fileupload/index/purgeupload/",
		//data:'file_id='+val,
		data: { file_id: val, folder_key: jQuery('[name="form_key"]').val() },
		success: function(data){
	    // alert(data);
		}
		});
	}
	jQuery('[data-fieldset-group="upload_orcr"]').on('click', '.btn-delete', function(){
		var _current = jQuery(this).closest('.fieldset-group-set');
		var _parent_set = jQuery(_current).closest('[data-fieldset-group]');

		if(jQuery(_parent_set).find('.fieldset-group-set').length == 1){
			jQuery(_current).find('.btn-add').click();
		}

		purgeUploadedFile(jQuery(_current).find('input[type="file"]').attr('data-builder-default-value'));

		if(jQuery(_parent_set).find('.fieldset-group-set').length > 1)
		{
			deleteImg = jQuery(_current).find('.file-img #file-image').attr('data-preview');
			if(gImgPreview.indexOf(deleteImg) > -1)
			{
				gImgPreview.splice(gImgPreview.indexOf(deleteImg), 1);
			}
		}
	});

	jQuery('[data-fieldset-group="upload_orcr"] .actions .btn-add').live('click',function(){
		updateIdAndLabel();
		jQuery('.fieldset-group-set:last-child #file-drag .file-img #file-image').attr('src', '');
		jQuery('.fieldset-group-set:last-child #file-drag .file-img #file-image').data('preview','').attr('data-preview', '');
		jQuery('.fieldset-group-set:last-child #file-drag .file-img').addClass("hidden").siblings('#start').removeClass("hidden").parent().removeClass("upload-disabled");
		jQuery('.fieldset-group-set:last-child #file-drag .file-img').siblings('#response').empty();
	});

	jQuery('.fieldset-group-set input.fileUpload').live('change',function(e) {
		 var file_name;
		 if(Object.size(e.target.files))
		 {
		 	file_name = e.target.files[0].name;
		 }
		 else
		 {
		 	file_name = jQuery(e.target).data('builder-default-value');
		 }
		if(checkFileType(this)){
			if(checkFileType(this) == "pdf") {
				readURL(this,jQuery(this).siblings('#file-drag').find('.file-img').children('#file-image'),true);
				jQuery(this).siblings('#file-drag').children('#response').removeClass('hidden').html('<p>' + file_name + '<p/>')
			} else {
				readURL(this,jQuery(this).siblings('#file-drag').find('.file-img').children('#file-image'),false);
				jQuery(this).siblings('#file-drag').children('#response').removeClass('hidden').html('<p>' + file_name + '<p/>')
			}
		} else {
		}
	});

	var btnAppend   = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';

	jQuery('div[data-slide]').append(btnAppend);
	jQuery('.append-btn').hide();

	jQuery('<br>').insertAfter(jQuery('div[data-fieldset-group="coverage_details"]').find('label'));


	jQuery('select[name="accessories_other_standard[other_standard][]"]').removeAttr('required').attr('data-bv-excluded', true).data('bv-excluded', true);

	// ADD BUTTON NG OTHER STANDARD

	jQuery('.mega-form-builds [data-fieldset-row="accessories_other_standard"]').on('click', '.btn-add', function()
	{
		counterFieldsetGs(jQuery('[data-fieldset-row="accessories_other_standard"]'));
		jQuery(this).closest('.fieldset-group-set')
			.find('select[name="accessories_other_standard[other_standard][]"]')
			.attr('required', 'required')
			.attr('data-bv-excluded', false)
			.data('bv-excluded', false);

		if (jQuery(this).closest('.fieldset-group-set').find('select[name="accessories_other_standard[other_standard][]"]').val() == '')
		{
			jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
			reBindValidate();
			jQuery(this).closest('.fieldset-group-set').find('select[name="accessories_other_standard[other_standard][]"]').trigger('change');
			return false;
		}

		if(jQuery(this).closest('[data-fieldset-group="accessories_other_standard"]').find('select[name="accessories_other_standard[other_standard][]"]').length > 1 )
		{
			jQuery(this).closest('[data-fieldset-group="accessories_other_standard"]').find('select[name="accessories_other_standard[other_standard][]"]').each(function(){
				if(!Object.size(jQuery(this).val()))
				{
					jQuery(this).trigger('change');
				}
			});

			if(jQuery(this).closest('[data-fieldset-group="accessories_other_standard"]').find('.fieldset-group-set.has-error').length)
			{
				return false;
			}
		}

		var observer = new MiniDaemon(jQuery(this),
            function(nIndex, nLength, bBackwards, owner)
            {
                var _next_set = jQuery(owner.owner).closest('.fieldset-group-set').next();

                if(_next_set.length)
                {
                	jQuery(_next_set).find('select[name="accessories_other_standard[other_standard][]"]')
						.removeAttr('required')
						.attr('data-bv-excluded', true)
						.data('bv-excluded', true);

					jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
					reBindValidate();
                }

                var _parent_group_set = jQuery(owner.owner).closest('[data-fieldset-group="accessories_other_standard"]');
                var _accessories_other_standards = jQuery(_parent_group_set).find('select[name="accessories_other_standard[other_standard][]"]');
		        if(_accessories_other_standards.length <= 1)
		        {
					jQuery(_accessories_other_standards).first()
						.removeAttr('required')
						.attr('data-bv-excluded', true)
						.data('bv-excluded', true);
		        }
		        else
		        {
				    jQuery(_accessories_other_standards)
							.attr('required' , 'required')
							.attr('data-bv-excluded', false)
							.data('bv-excluded', false);

		        }
                return false;
            }, 100, 8);
        observer.start();
	});

	// DELETE BUTTON NG OTHER STANDARD

	jQuery('.mega-form-builds [data-fieldset-row="accessories_other_standard"]').on('click', '.btn-delete', function()
	{
		counterFieldsetGs(jQuery('[data-fieldset-row="accessories_other_standard"]'));
		var _parent_group_set = jQuery(this).closest('[data-fieldset-group="accessories_other_standard"]');
		var observer = new MiniDaemon(_parent_group_set,
            function(nIndex, nLength, bBackwards, owner)
            {
            	var _parent_group_set = owner.owner;
		        var _accessories_other_standards = jQuery(_parent_group_set).find('select[name="accessories_other_standard[other_standard][]"]');
		        if(_accessories_other_standards.length <= 1)
		        {
					jQuery(_accessories_other_standards).first()
						.removeAttr('required')
						.attr('data-bv-excluded', true)
						.data('bv-excluded', true);
		        }
		        else
		        {
				    jQuery(_accessories_other_standards)
							.attr('required' , 'required')
							.attr('data-bv-excluded', false)
							.data('bv-excluded', false);

		        }
		        jQuery('#megaForm-defaultForm-1').bootstrapValidator('resetForm');
				jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
				reBindValidate();

                return false;
            }, 100, 4);
        observer.start();
	});

	jQuery('.btn-continue').on('click', function()
	{
		jQuery('.mega-form-builds [data-fieldset-row="accessories_other_standard"] [data-bv-excluded]').each(function()
		{
			if (jQuery(this).val() == '')
			{
				jQuery(this).attr('data-bv-excluded', true).data('bv-excluded', true);
			}
		});

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();
	});

	jQuery('input[name="other_info[plate_number]"]').on('change', function()
	{
		var DM = Object.create(DateModifier);

		var plateNoVal      = jQuery('input[name="other_info[plate_number]"]').val();
		var lastPlatenoChar = plateNoVal.substr(plateNoVal.length - 1);
		var typeofinsurance = jQuery('input[name="vehicle_information[typeofinsurance]"]').val();
		var isBrandNew		= jQuery('input[name="ctpl_policy_period[brand_new]"]').data('value');
		var insuranceType		= jQuery('input[name="ctpl_policy_period[insurance_type]"]').data('value');
		jQuery('input[name="ctpl_policy_period[brand_new]"]').data('value');
		if(typeofinsurance === 'CTPL'){
			var policyPeriod    = parseInt(jQuery('.vehicle_information-year').data('ctpl-period-of-inssurance'));
		} else {
			var policyPeriod    = parseInt(jQuery('.vehicle_information-year').data('comprehensive-period-of-inssurance'));
		}
		if (isBrandNew == 'on' && insuranceType == 'Comprehensive with CTPL')
		{
			var policyPeriod = 3;
		}
		if (jQuery.isNumeric(lastPlatenoChar))
		{
			/*
			 Start Date(s) of CTPL Policy Period cannot go back to past dates
			 When Plate Number ending in:
			 1 - Feb 1
			 2 - Mar 1
			 3 - Apr 1
			 4 - May 1
			 5 - June 1
			 6 - July 1
			 7 - Aug 1
			 8 - Sept 1
			 9 - Oct 1
			 0 - Nov 1
			*/

			var setStartMonth = 0;
			var currentYear   = DM.createDate().getFullYear();

			switch(lastPlatenoChar)
			{
				case '1' : setStartMonth = 1;  break;
				case '2' : setStartMonth = 2;  break;
				case '3' : setStartMonth = 3;  break;
				case '4' : setStartMonth = 4;  break;
				case '5' : setStartMonth = 5;  break;
				case '6' : setStartMonth = 6;  break;
				case '7' : setStartMonth = 7;  break;
				case '8' : setStartMonth = 8;  break;
				case '9' : setStartMonth = 9;  break;
				case '0' : setStartMonth = 10; break;
			}

			jQuery('input[name="ctpl_policy_period[start_date]"]').datepicker('option', 'minDate', new Date(currentYear, setStartMonth, 01));
			jQuery('input[name="ctpl_policy_period[start_date]"]').datepicker('setDate', new Date(currentYear, setStartMonth, 01));
			jQuery('input[name="ctpl_policy_period[end_date]"]').datepicker('setDate', new Date((currentYear+policyPeriod), setStartMonth, 01));
			reBindCalendar();
		}
	});

	jQuery('input[name="comprehensive_policy_period[start_date]"]').on('change', function()
	{
		var DM = Object.create(DateModifier);
		var _plus_days     = 0;
        var _plus_months   = 0;
        var _plus_years    = 0;
        var _policy_period = parseInt(jQuery('.vehicle_information-year').data('comprehensive-period-of-inssurance'));

        if (_policy_period == '')
        {
        	_policy_period = 0;
        }

        // Set start date for CTPL Policy Period
        DM.initPluses(_plus_days, _plus_months, _plus_years);
        var _start_date = DM.createDate(jQuery(this));

        // Set end date for Comprehensive & CTPL Policy Period
        DM.initPluses(_plus_days, _plus_months, (_plus_years + _policy_period));
        var _end_date = DM.createDate(jQuery(this));
        jQuery('input[name="comprehensive_policy_period[end_date]"]').datepicker('setDate', _end_date);

        reBindCalendar();
	});

	var typeInsurance = jQuery('input[name="vehicle_information[typeofinsurance]"]').val();

	switch(typeInsurance) {
		case 'Comprehensive' :
			// Policy Period
			jQuery('[data-fieldset-row="ctpl_policy_period"]').hide();
			jQuery('input[name="ctpl_policy_period[start_date]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true);
			jQuery('input[name="ctpl_policy_period[end_date]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true);
			break;
		case 'CTPL' :
			// If car is brand new == 3 | Old == 1
			if (parseInt(jQuery('.vehicle_information-year').data('ctpl-period-of-inssurance')) == 3)
			{
				// MV File No. is not required
				jQuery('input[name="other_info[mv_number]"]').attr('placeholder', 'MV Number').attr('data-bv-excluded', true).data('bv-excluded', true).removeAttr('required').prop('required', false);
			}
			// Coverage Details
			jQuery('[data-fieldset-row="coverage_details"]').hide();
			jQuery('input[name="coverage_details[coveage_details]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true);
			// Policy Period
			jQuery('[data-fieldset-row="comprehensive_policy_period"]').hide();
			jQuery('input[name="comprehensive_policy_period[start_date]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true);
			jQuery('input[name="comprehensive_policy_period[end_date]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true);
			break;
	}

	jQuery('div[data-slide]:first').find('.btn-back').removeClass('btn-back').attr('id', 'btn-vehicleinfo-back');
	jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');

	jQuery('#btn-vehicleinfo-back').on('click', function()
	{
		if(jQuery('[name$="previous_form_key"]').val() != "")
		{
			jQuery(".preloader").removeClass("up");
			window.location.href = BASE_URL + "/quote/summary/index/previous_form_key/" +  jQuery('[name$="previous_form_key"]').val();
		}
		else
		{
			window.history.back();
		}
	});
	updateIdAndLabel();
}

function personalInfo()
{
	var btnAppend   = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';

	jQuery('div[data-slide]').append(btnAppend);
	jQuery('.append-btn').hide();

	jQuery('input[name="personal_information[birth_date]"]').datepicker('option', 'minDate', null);
	jQuery('input[name="personal_information[birth_date]"]').datepicker('option', 'maxDate', new Date());
	jQuery('input[name="personal_information[birth_date]"]').datepicker('option', 'yearRange', '-100:+0');
	reBindValidate();

	jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="agent_information[agent_id]"]').hide();

	jQuery('label.same_location').parent().parent().hide();
  /*
	var pProv = jQuery('select[name="mailing_address[province]"]');
	var pCity = jQuery('select[name="mailing_address[city]"]');
	var pBrgy = jQuery('select[name="mailing_address[barangay]"]');

	formatJSON(
	{
		'location': 'province',
		'desc': 'provDesc',
		'code': 'provCode',
		'ap_el': pProv
	});

	pProv.on('change', function()
	{
		pCity.find('option').not(':first').remove();
		pBrgy.find('option').not(':first').remove();

		pCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		pBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		pCity.trigger('change');
		pBrgy.trigger('change');

		formatJSON(
		{
			'location': 'municipality',
			'desc': 'citymunDesc',
			'code': 'citymunCode',
			'com_el': jQuery('select[name="mailing_address[province]"] :selected'),
			'com_code': 'provCode',
			'ap_el': pCity
		});
	});

	pCity.on('change', function()
	{
		pBrgy.find('option').not(':first').remove();
		pBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		pBrgy.trigger('change');

		formatJSON(
		{
			'location': 'brgy',
			'desc': 'brgyDesc',
			'code': 'brgyCode',
			'com_el': jQuery('select[name="mailing_address[city]"] :selected'),
			'com_code': 'citymunCode',
			'ap_el': pBrgy
		});
	});
  */
  	if (jQuery('input[name="agent_information[agent_group_id]"]').data('value') == 4)
  	{
  		jQuery("div[data-fieldset-row='agent_information']").addClass("agent_information").hide();
  		jQuery("input#Yes").prop("checked", true);
  		jQuery('input[name="agent_information[agent_name]"]').val(jQuery('input[name="agent_information[agent_name]"]').data('value'));
  		var telephone_number = jQuery('input[name$="contact_information[telephone_number]"]').val();
  		var mobile_number 	 = jQuery('input[name$="contact_information[mobile_number]"]').val();
  		var contact = telephone_number ? telephone_number : mobile_number;
  		jQuery('input[name="agent_information[agent_number]"]').val(contact);
  	}
	jQuery('input[name="agent_information[agent_group_id]"]').hide();

	if (jQuery('input:radio[name="agent_information[agent_status]"]:checked').val() == "Yes")
	{
		jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		jQuery('input[name="agent_information[agent_number]"]').siblings('label').show();
	}
	else
	{
		jQuery('input[name="agent_information[agent_name]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		jQuery('input[name="agent_information[agent_number]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();
	}

	jQuery('input:radio[name="agent_information[agent_status]"]').on('change', function(){
		if (jQuery(this).val() == 'No') {
			jQuery('input[name="agent_information[agent_name]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
			jQuery('input[name="agent_information[agent_number]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
			jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();
			jQuery('input[name="agent_information[agent_id]"]').hide();
		} else {
			jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
			jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
			jQuery('input[name="agent_information[agent_number]"]').siblings('label').show();
			jQuery('input[name="agent_information[agent_id]"]').show();
		}

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
	});

	jQuery('div[data-slide]:first').find('.btn-back').removeClass('btn-back').attr('id', 'btn-personal-back');
	// jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');

	jQuery('#btn-personal-back').on('click', function()
	{
		if(jQuery('[name$="previous_form_key"]').val() != "")
		{
			jQuery(".preloader").removeClass("up");
			window.location.href = BASE_URL + "/quote/additional/index/form_key/" +  jQuery('[name$="previous_form_key"]').val();
		}
		else
		{
			window.history.back();
		}
	});

	jQuery('input[name="personal_information[birth_date]"]').change(function(){ validateDob(); });

	jQuery('.btn-continue').on('click', function() { validateDob(); });
}

function validateDob()
{
	var dobPicker = jQuery('input[name="personal_information[birth_date]"]');
	var age = getAge(dobPicker);
	if (age < 18) {
		var message = dobPicker.data('bv-underage-message'),
			dataFor = dobPicker.parent('div').siblings('small').data('bv-for');

		setTimeout(function() {
			dobPicker.parent('div').parent('div').parent('div').removeClass('has-success').addClass('has-error');
			dobPicker.siblings('i').addClass('icon icon-cancel2').css('display', 'block');
			jQuery('small[data-bv-for="'+dataFor+'"]').attr('data-bv-validator', 'underAge').attr('data-bv-result', 'INVALID').text(message).css({'display': 'block', 'color': '#a94442;'});
		}, 100);
	} else {
		dobPicker.siblings('i').addClass('icon icon-checkmark').css('display', 'block');
	}
}

function personalInfoItp()
{
	var btnAppend     = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';
	var _date_element = '';
	var coverage = 'input[name="extras[type_of_coverage]"]';

	jQuery('div[data-slide]').append(btnAppend);
	jQuery('.append-btn').hide();

	jQuery('input[name$="[birth_date]"]').datepicker('option', 'minDate', null);
	jQuery('input[name$="[birth_date]"]').datepicker('option', 'maxDate', new Date());
	jQuery('input[name$="[birth_date]"]').datepicker('option', 'yearRange', '-100:+0');

	jQuery('input[name="person_to_contact[birth_date][]"]').datepicker('option', 'minDate', null);
	jQuery('input[name="person_to_contact[birth_date][]"]').datepicker('option', 'maxDate', new Date());
	jQuery('input[name="person_to_contact[birth_date][]"]').datepicker('option', 'yearRange', '-100:+0');

	jQuery('input[name="company_information[date_of_inc]"]').datepicker('option', 'minDate', null);
	jQuery('input[name="company_information[date_of_inc]"]').datepicker('option', 'maxDate', new Date());
	jQuery('input[name="company_information[date_of_inc]"]').datepicker('option', 'yearRange', '-100:+0');

    setBirthdates();
    jQuery('input[name="person_to_contact[divider][]"]').css('display', 'none');

	reBindValidate();

	jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="agent_information[agent_id]"]').hide();

	if (jQuery('input[name="agent_information[agent_group_id]"]').data('value') == 4)
  	{
  		jQuery("div[data-fieldset-row='agent_information']").addClass("agent_information").hide();
  		jQuery("input#Yes").prop("checked", true);
  		jQuery('input[name="agent_information[agent_name]"]').val(jQuery('input[name="agent_information[agent_name]"]').data('value'));
  		var telephone_number = jQuery('input[name$="contact_information[telephone_number]"]').val();
  		var mobile_number 	 = jQuery('input[name$="contact_information[mobile_number]"]').val();
  		var contact = telephone_number ? telephone_number : mobile_number;
  		jQuery('input[name="agent_information[agent_number]"]').val(contact);
  	}
	jQuery('input[name="agent_information[agent_group_id]"]').hide();

	if (jQuery('input[name="extras[type_of_coverage]"]').val() != '')
	{
		displayFields([jQuery('input[name="extras[type_of_coverage]"]').val()]);

		switch(jQuery('input[name="extras[type_of_coverage]"]').val())
		{
			case 'Individual' :
				_date_element = jQuery('input[name="indiviual_personal_information[birth_date]"]');
				break;
			case 'Family' :
				_date_element = jQuery('input[name="family_personal_information[birth_date]"]');
				break;
			case 'Group' :
				_date_element = jQuery('input[name="group_contact_person[birth_date]"]');
				break;
			case 'Company' :
				_date_element = jQuery('input[name="company_contact_person[birth_date]"]');
				break;
		}
	}

	if (jQuery(_date_element).val() != '')
	{
		if (getAge(_date_element) < 18)
		{
			showDependency(jQuery('[data-fieldset-row="parent_guardian_information"]'));
		}
		else
		{
			hideDependency(jQuery('[data-fieldset-row="parent_guardian_information"]'));
		}
	}
  /*
	var mailingroupProvince = jQuery('select[name="mailing_address[province]"]');
	var mailingroupCity     = jQuery('select[name="mailing_address[city]"]');
	var mailingroupBrgy     = jQuery('select[name="mailing_address[barangay]"]');

	var secondaryProv = jQuery('select[name="secondary_mailing_address[province]"]');
	var secondaryCity = jQuery('select[name="secondary_mailing_address[city]"]');
	var secondaryBrgy = jQuery('select[name="secondary_mailing_address[barangay]"]');

	var companyProv = jQuery('select[name="company_contact_person_mailing_address[province]"]');
	var companyCity = jQuery('select[name="company_contact_person_mailing_address[city]"]');
	var companyBrgy = jQuery('select[name="company_contact_person_mailing_address[barangay]"]');

	var groupProv = jQuery('select[name="group_contact_person_mailing_address[province]"]');
	var groupCity = jQuery('select[name="group_contact_person_mailing_address[city]"]');
	var groupBrgy = jQuery('select[name="group_contact_person_mailing_address[barangay]"]');

	var companySecondProv = jQuery('select[name="company_contact_person_secondary_mailing_address[province]"]');
	var companySecondCity = jQuery('select[name="company_contact_person_secondary_mailing_address[city]"]');
	var companySecondBrgy = jQuery('select[name="company_contact_person_secondary_mailing_address[barangay]"]');

	var groupSecondProv = jQuery('select[name="group_contact_person_secondary_mailing_address[province]"]');
	var groupSecondCity = jQuery('select[name="group_contact_person_secondary_mailing_address[city]"]');
	var groupSecondBrgy = jQuery('select[name="group_contact_person_secondary_mailing_address[barangay]"]');

	formatJSON(
	{
		'location': 'province',
		'desc'    : 'provDesc',
		'code'    : 'provCode',
		'ap_el'   : mailingroupProvince
	});

	formatJSON(
	{
		'location': 'province',
		'desc'    : 'provDesc',
		'code'    : 'provCode',
		'ap_el'   : secondaryProv
	});

	formatJSON(
	{
		'location': 'province',
		'desc'    : 'provDesc',
		'code'    : 'provCode',
		'ap_el'   : companyProv
	});

	formatJSON(
	{
		'location': 'province',
		'desc'    : 'provDesc',
		'code'    : 'provCode',
		'ap_el'   : groupProv
	});

	formatJSON(
	{
		'location': 'province',
		'desc'    : 'provDesc',
		'code'    : 'provCode',
		'ap_el'   : companySecondProv
	});

	formatJSON(
	{
		'location': 'province',
		'desc'    : 'provDesc',
		'code'    : 'provCode',
		'ap_el'   : groupSecondProv
	});

	mailingroupProvince.on('change', function()
	{
		mailingroupCity.find('option').not(':first').remove();
		mailingroupBrgy.find('option').not(':first').remove();

		mailingroupCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		mailingroupBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		// mailingroupCity.trigger('change');
		// mailingroupBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'municipality',
			'desc'     : 'citymunDesc',
			'code'     : 'citymunCode',
			'com_el'   : jQuery('select[name="mailing_address[province]"] :selected'),
			'com_code' : 'provCode',
			'ap_el'    : mailingroupCity
		});
	});

	secondaryProv.on('change', function()
	{
		secondaryCity.find('option').not(':first').remove();
		secondaryBrgy.find('option').not(':first').remove();

		secondaryCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		secondaryBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		// secondaryCity.trigger('change');
		// secondaryBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'municipality',
			'desc'     : 'citymunDesc',
			'code'     : 'citymunCode',
			'com_el'   : jQuery('select[name="secondary_mailing_address[province]"] :selected'),
			'com_code' : 'provCode',
			'ap_el': secondaryCity
		});
	});

	groupProv.on('change', function()
	{
		groupCity.find('option').not(':first').remove();
		groupBrgy.find('option').not(':first').remove();

		groupCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		groupBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		// groupCity.trigger('change');
		// groupBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'municipality',
			'desc'     : 'citymunDesc',
			'code'     : 'citymunCode',
			'com_el'   : jQuery('select[name="group_contact_person_mailing_address[province]"] :selected'),
			'com_code' : 'provCode',
			'ap_el'    : groupCity
		});
	});

	groupSecondProv.on('change', function()
	{
		groupSecondCity.find('option').not(':first').remove();
		groupSecondBrgy.find('option').not(':first').remove();

		groupSecondCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		groupSecondBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		// groupSecondCity.trigger('change');
		// groupSecondBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'municipality',
			'desc'     : 'citymunDesc',
			'code'     : 'citymunCode',
			'com_el'   : jQuery('select[name="group_contact_person_secondary_mailing_address[province]"] :selected'),
			'com_code' : 'provCode',
			'ap_el'    : groupSecondCity
		});
	});

	companyProv.on('change', function()
	{
		companyCity.find('option').not(':first').remove();
		companyBrgy.find('option').not(':first').remove();

		companyCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		companyBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		// companyCity.trigger('change');
		// companyBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'municipality',
			'desc'     : 'citymunDesc',
			'code'     : 'citymunCode',
			'com_el'   : jQuery('select[name="company_contact_person_mailing_address[province]"] :selected'),
			'com_code' : 'provCode',
			'ap_el'    : companyCity
		});
	});

	companySecondProv.on('change', function()
	{
		companySecondCity.find('option').not(':first').remove();
		companySecondBrgy.find('option').not(':first').remove();

		companySecondCity.find('option:first').attr('selected', 'selected').prop('selected' , true);
		companySecondBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);

		// companySecondCity.trigger('change');
		// companySecondBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'municipality',
			'desc'     : 'citymunDesc',
			'code'     : 'citymunCode',
			'com_el'   : jQuery('select[name="company_contact_person_secondary_mailing_address[province]"] :selected'),
			'com_code' : 'provCode',
			'ap_el'    : companySecondCity
		});
	});

	mailingroupCity.on('change', function()
	{
		mailingroupBrgy.find('option').not(':first').remove();
		mailingroupBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		// mailingroupBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'brgy',
			'desc'     : 'brgyDesc',
			'code'     : 'brgyCode',
			'com_el'   : jQuery('select[name="mailing_address[city]"] :selected'),
			'com_code' : 'citymunCode',
			'ap_el'    : mailingroupBrgy
		});
	});

	secondaryCity.on('change', function()
	{
		secondaryBrgy.find('option').not(':first').remove();
		secondaryBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		// secondaryBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'brgy',
			'desc'     : 'brgyDesc',
			'code'     : 'brgyCode',
			'com_el'   : jQuery('select[name="secondary_mailing_address[city]"] :selected'),
			'com_code' : 'citymunCode',
			'ap_el'   : secondaryBrgy
		});
	});

	companyCity.on('change', function()
	{
		companyBrgy.find('option').not(':first').remove();
		companyBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		// companyBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'brgy',
			'desc'     : 'brgyDesc',
			'code'     : 'brgyCode',
			'com_el'   : jQuery('select[name="company_contact_person_mailing_address[city]"] :selected'),
			'com_code' : 'citymunCode',
			'ap_el'   : companyBrgy
		});
	});

	companySecondCity.on('change', function()
	{
		companySecondBrgy.find('option').not(':first').remove();
		companySecondBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		// companySecondBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'brgy',
			'desc'     : 'brgyDesc',
			'code'     : 'brgyCode',
			'com_el'   : jQuery('select[name="company_contact_person_secondary_mailing_address[city]"] :selected'),
			'com_code' : 'citymunCode',
			'ap_el'   : companySecondBrgy
		});
	});

	groupCity.on('change', function()
	{
		groupBrgy.find('option').not(':first').remove();
		groupBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		// groupBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'brgy',
			'desc'     : 'brgyDesc',
			'code'     : 'brgyCode',
			'com_el'   : jQuery('select[name="group_contact_person_mailing_address[city]"] :selected'),
			'com_code' : 'citymunCode',
			'ap_el'   : groupBrgy
		});
	});

	groupSecondCity.on('change', function()
	{
		groupSecondBrgy.find('option').not(':first').remove();
		groupSecondBrgy.find('option:first').attr('selected', 'selected').prop('selected' , true);
		// groupSecondBrgy.trigger('change');

		formatJSON(
		{
			'location' : 'brgy',
			'desc'     : 'brgyDesc',
			'code'     : 'brgyCode',
			'com_el'   : jQuery('select[name="group_contact_person_secondary_mailing_address[city]"] :selected'),
			'com_code' : 'citymunCode',
			'ap_el'   : groupSecondBrgy
		});
	});
  */
	// PERSON TO CONTACT IN CASE OF EMERGENCY
	// Show add button for person to contact in case of emergency
	jQuery('[data-fieldset-row="person_to_contact"]').find('.btn-add').css('display', 'inline-block');

	// Hide delete button on first row for person to contact in case of emergency
	jQuery('[data-fieldset-row="person_to_contact"]').find('.fieldset-group-set').first().find('.btn-delete').addClass('hide');


	// BENEFICIARY
	if (jQuery('input[name="extras[type_of_coverage]"]').val() != 'Individual'
		&& jQuery('input[name="extras[type_of_coverage]"]').val() != 'Family') {
		// Hide add button for beneficiary
		jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').find('.btn-add').addClass('hide');
		jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').first().find('.btn-delete').addClass('hide');
	} else {
		jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').first().find('.btn-add').removeClass('hide');

		jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').first().find('.btn-delete').addClass('hide');
	}

    if (jQuery('input[name="extras[type_of_coverage]"]').val() == 'Family') {
        jQuery('input[name="beneficiaries[member_name][]"]').attr('data-bv-notempty', false).data('bv-excluded', true);
        jQuery('[data-fieldset-row="beneficiaries"]').find('.col-md-4').hide();
        jQuery('[data-fieldset-row="beneficiaries"]').find('.col-md-3').attr('class', 'col-md-5');
    }

	// AGENT INFO
	if (jQuery('input:radio[name="agent_information[agent_status]"]:checked').val() == "Yes")
	{
		jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		jQuery('input[name="agent_information[agent_number]"]').siblings('label').show();
		jQuery('input[name="agent_information[agent_id]"]').show();
	} else {
		jQuery('input[name="agent_information[agent_name]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		jQuery('input[name="agent_information[agent_number]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();
		jQuery('input[name="agent_information[agent_id]"]').hide();
	}

	jQuery('input:radio[name="agent_information[agent_status]"]').on('change', function(){
		if (jQuery(this).val() == 'No') {
			jQuery('input[name="agent_information[agent_name]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
			jQuery('input[name="agent_information[agent_number]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
			jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();
			jQuery('input[name="agent_information[agent_id]"]').hide();
		} else {
			jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
			jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
			jQuery('input[name="agent_information[agent_number]"]').siblings('label').show();
			jQuery('input[name="agent_information[agent_id]"]').show();
		}

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
	});

	jQuery('[data-birthdate="true"]').on('change', function()
	{
		var age = getAge(jQuery(this));

		if (age < 18)
		{
			showDependency(jQuery('[data-fieldset-row="parent_guardian_information"]'));
		}
		else
		{
			hideDependency(jQuery('[data-fieldset-row="parent_guardian_information"]'));
		}
	});

	var personToContact = jQuery('[data-fieldset-row="person_to_contact"]').find('.fieldset-group-set');
	var  divider = personToContact.find('input[name="person_to_contact[divider][]"]').parent();
	if (divider.length > 0) {
		divider.addClass('clearfix-divider');
	}

	if (jQuery(coverage).val() == 'Family') {
        var col3 = personToContact.find('.col-md-3');
        col3.removeClass('col-md-3').addClass('col-md-2');

        personToContact.find('.clearfix').hide();
        personToContact.find('input[name="person_to_contact[divider][]"]').parent().remove();

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		jQuery('input[name="person_to_contact[member_name][]"]').attr('data-bv-notempty', false).data('bv-excluded', true);

		if (jQuery('input[name="person_to_contact[name][]').val() == '') {
			personToContact.nextAll('.fieldset-group-set').remove();
		}

		jQuery('input[name="person_to_contact[member_name][]').parent().remove()
		reBindValidate();
	} else if ( jQuery(coverage).val().match(/company/i) ) {
	//fix for Company single trip hiding personal info section
				jQuery('[data-fieldset-row="person_to_contact"]').find('.fieldset-group-set').first().find('.btn-add').addClass('hide');
				jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)').find('input[name="person_to_contact[member_name][]"]').val('\'\'');
				jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)').find('input[name="person_to_contact[name][]"]').val('bypassed');
				jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)').find('input[name="person_to_contact[mobile_number][]"]').val('00-000-0000000');
				jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)').find('input[name="person_to_contact[birth_date][]"]').val('1901-02-02');
				jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)').find('select[name="person_to_contact[relation][]"] option[value=Others]').attr('selected','selected'); //attr('data-bv-notempty', false).data('bv-excluded', true).append('<option value="_bypassed_">_bypassed_</option>');
				jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)').find('select[name="person_to_contact[status][]"] option[value=Single]').attr('selected','selected'); //.val('Others');
				hideDependency(jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child(2)'));
 	}
  //fix for Company multiple trips hiding personal info section
	if ( jQuery('input[name="extras[type_of_coverage]"]').val().match(/company/i) ) {
			var countStep = jQuery('input[name="person_to_contact[name][]"]').length;
			for (ii = 0; ii <= countStep; ii++) {
					if (ii > 1) {
						jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')').find('input[name="person_to_contact[member_name][]"]').val('\'\'');
						jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')').find('input[name="person_to_contact[name][]"]').val('bypassed');
						jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')').find('input[name="person_to_contact[mobile_number][]"]').val('00-000-0000000');
						jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')').find('input[name="person_to_contact[birth_date][]"]').val('1901-02-02');
						jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')').find('select[name="person_to_contact[relation][]"] option[value=Others]').attr('selected','selected');
						jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')').find('select[name="person_to_contact[status][]"] option[value=Single]').attr('selected','selected');
						hideDependency(jQuery('div[data-fieldset-row="person_to_contact"] .fieldset-group-set:nth-child('+ii+')'));
					}
			}
	}

	jQuery('.mega-form-builds [data-fieldset-group]').on('click', '.btn-add', function()
	{
		if (jQuery(this).closest('[data-fieldset-group]').data('fieldset-group') == 'person_to_contact')
		{
			jQuery(this).closest('.fieldset-group-set').find('input[name="person_to_contact[member_name][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery(this).closest('.fieldset-group-set').find('input[name="person_to_contact[name][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery(this).closest('.fieldset-group-set').find('input[name="person_to_contact[mobile_number][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery(this).closest('.fieldset-group-set').find('select[name="person_to_contact[relation][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);

			jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
			reBindValidate();
			jQuery('#megaForm-defaultForm-1').bootstrapValidator('validate');

			if (jQuery('input[name="extras[type_of_coverage]"]').val() == 'Individual')
    		{
    			if (jQuery(this).closest('.fieldset-group').children().length == 2)
    			{
    				alert('Only 2 Emergency contact are allowed per member.');
    				return false;
    			}

    		} else if (jQuery(coverage).val() == 'Family') {
    			var countPoc = jQuery('input[name="person_to_contact[name][]"]').length;
    			if (countPoc >= 3) {
    				alert('Only 3 Emergency contact are allowed per family.');
    				return false;
    			}
    		}
    		else
    		{
    			if (jQuery(this).closest('.fieldset-group-set').find('input[name="person_to_contact[member_name][]"]').val() ==
    				jQuery(this).closest('.fieldset-group-set').prev().find('input[name="person_to_contact[member_name][]"]').val() ||
    				jQuery(this).closest('.fieldset-group-set').find('input[name="person_to_contact[member_name][]"]').val() ==
    				jQuery(this).closest('.fieldset-group-set').next().find('input[name="person_to_contact[member_name][]"]').val())
    			{
    				alert('Only 2 Emergency contact are allowed per member.');
    				return false;
    			}
    		}
		}
		else if (jQuery(this).closest('[data-fieldset-group]').data('fieldset-group') == 'beneficiaries')
		{
			if (jQuery('input[name="extras[type_of_coverage]"]').val() == 'Individual')
    		{
    			jQuery(this).closest('.fieldset-group-set').find('input[name="beneficiaries[member_name][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);
				jQuery(this).closest('.fieldset-group-set').find('input[name="beneficiaries[name][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);
				jQuery(this).closest('.fieldset-group-set').find('select[name="beneficiaries[relation][]"]').attr('data-bv-excluded', false).data('bv-excluded', false);

				jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
				reBindValidate();
				jQuery('#megaForm-defaultForm-1').bootstrapValidator('validate');

    			if (jQuery(this).closest('.fieldset-group').children().length == 4)
    			{
    				alert('Only 4 Beneficiaries are allowed per member.');
    				return false;
    			}
    		}
		}

		if (jQuery(this).closest('.fieldset-group-set').hasClass('has-error'))
		{
			return false;
		}
		else
		{
			jQuery(this).next().removeClass('hide');

			var observer = new MiniDaemon(jQuery(this),
	            function(nIndex, nLength, bBackwards, owner)
	            {
	                var _next_set = jQuery(owner.owner).closest('.fieldset-group-set').next();

	     			if (jQuery(this).closest('[data-fieldset-group]').data('fieldset-group') == 'person_to_contact')
	            	{
	            		jQuery('[data-fieldset-row="person_to_contact"]').find('.fieldset-group-set').first().find('.btn-delete').addClass('hide');

	            		if (_next_set.length)
	            		{
	            			jQuery(_next_set).find('input[name="person_to_contact[birth_date][]"]').datepicker('option', 'minDate', null);
							jQuery(_next_set).find('input[name="person_to_contact[birth_date][]"]').datepicker('option', 'maxDate', new Date());
							jQuery(_next_set).find('input[name="person_to_contact[birth_date][]"]').datepicker('option', 'yearRange', '-100:+0');
	            		}

	            		if (jQuery('input[name="extras[type_of_coverage]"]').val() == 'Individual')
	            		{
	            			jQuery('[data-fieldset-row="person_to_contact"]').find('.fieldset-group-set').first().find('.btn-add').addClass('hide');

	            			if (jQuery(_next_set).find('input[name="person_to_contact[member_name][]"]').val() == '')
	            			{
		            			jQuery(_next_set).find('input[name="person_to_contact[member_name][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);
	            			}

	            			if (jQuery(_next_set).find('input[name="person_to_contact[name][]"]').val() == '')
	            			{
		            			jQuery(_next_set).find('input[name="person_to_contact[name][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);
	            			}

	            			if (jQuery(_next_set).find('input[name="person_to_contact[mobile_number][]"]').val() == '')
	            			{
		            			jQuery(_next_set).find('input[name="person_to_contact[mobile_number][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);
	            			}

	            			if (jQuery(_next_set).find('select[name="person_to_contact[relation][]"]').val() == '')
	            			{
		            			jQuery(_next_set).find('select[name="person_to_contact[relation][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);
	            			}

	            			jQuery('#megaForm-defaultForm-1').bootstrapValidator('resetForm');
	            			jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
							reBindValidate();
	            		}
	            		else
	            		{
	            			var currentIndex = jQuery(this).closest('.fieldset-group-set').index();
	            			var lastAppended = jQuery(this).closest('.fieldset-group').children().last();

	            			jQuery(this).closest('.fieldset-group').find('.fieldset-group-set:eq('+ currentIndex +')').after(lastAppended);

	            			if (jQuery(this).closest('.fieldset-group').find('.fieldset-group-set:eq('+ currentIndex +')').find('input[name="person_to_contact[member_name][]"]').val() ==
	            				jQuery(lastAppended).find('input[name="person_to_contact[member_name][]"]').val())
	            			{
	            				if (jQuery(lastAppended).find('input[name="person_to_contact[member_name][]"]').val() == '')
		            			{
			            			jQuery(lastAppended).find('input[name="person_to_contact[member_name][]"]')
			            				.attr('data-bv-excluded', true)
			            				.data('bv-excluded', true);
		            			}

		            			if (jQuery(lastAppended).find('input[name="person_to_contact[name][]"]').val() == '')
		            			{
			            			jQuery(lastAppended).find('input[name="person_to_contact[name][]"]')
			            				.attr('data-bv-excluded', true)
			            				.data('bv-excluded', true);
		            			}

		            			if (jQuery(lastAppended).find('input[name="person_to_contact[mobile_number][]"]').val() == '')
		            			{
			            			jQuery(lastAppended).find('input[name="person_to_contact[mobile_number][]"]')
			            				.attr('data-bv-excluded', true)
			            				.data('bv-excluded', true);
		            			}

		            			if (jQuery(lastAppended).find('select[name="person_to_contact[relation][]"]').val() == '')
		            			{
			            			jQuery(lastAppended).find('select[name="person_to_contact[relation][]"]')
			            				.attr('data-bv-excluded', true)
			            				.data('bv-excluded', true);
		            			}

		            			jQuery('#megaForm-defaultForm-1').bootstrapValidator('resetForm');
		            			jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
								reBindValidate();
	            			}
	            		}
	            	}

	            	if (jQuery(this).closest('[data-fieldset-group]').data('fieldset-group') == 'beneficiaries')
	            	{
	            		if (jQuery('input[name="extras[type_of_coverage]"]').val() == 'Individual')
	            		{
	            			jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').first().find('.btn-delete').addClass('hide');

	            			if (_next_set.length)
	            			{
	            				jQuery(_next_set).find('input[name="beneficiaries[member_name][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);

		            			jQuery(_next_set).find('input[name="beneficiaries[name][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);

		            			jQuery(_next_set).find('select[name="beneficiaries[relation][]"]')
		            				.attr('data-bv-excluded', true)
		            				.data('bv-excluded', true);

		            			jQuery('#megaForm-defaultForm-1').bootstrapValidator('resetForm');
		            			jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
								reBindValidate();
	            			}
	            		}
	            	}

	            	jQuery('[data-mask-placeholder]').each(function()
	            	{
						jQuery(this).on('keyup', function()
						{
							if (jQuery(this).val().replace(/[_-]/g, '') == '')
							{
								jQuery(this).val('');
							}

							reValidate(jQuery(this));
						});
					});

	            }, 100, 1);
	        observer.start();
		}
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('click', '.btn-delete', function()
	{
		if (jQuery(this).closest('[data-fieldset-group]').data('fieldset-group') == 'beneficiaries')
    	{
    		if (jQuery('input[name="extras[type_of_coverage]"]').val() == 'Individual')
    		{
    			jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').first().find('.btn-delete').addClass('hide');
    		}
    		else
    		{
    			jQuery('[data-fieldset-row="beneficiaries"]').find('.fieldset-group-set').find('.btn-add').addClass('hide');
    		}
    	}
    	else
    	{
    		jQuery(this).closest('.fieldset-group').find('.btn-add').removeClass('hide');
    	}
	});

	jQuery('.btn-continue').on('click', function()
	{
		jQuery('.mega-form-builds [data-fieldset-row="person_to_contact"] [data-bv-excluded]').each(function()
		{
			if (jQuery(this).val() == '')
			{
				jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			}
		});

		jQuery('.mega-form-builds [data-fieldset-row="beneficiaries"] [data-bv-excluded]').each(function()
		{
			if (jQuery(this).val() == '')
			{
				jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			}
		});

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();
	});

	jQuery('div[data-slide]:first').find('.btn-back').removeClass('btn-back').attr('id', 'btn-personal-back');
	//jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');

	jQuery('#btn-personal-back').on('click', function()
	{
		if(jQuery('[name$="previous_form_key"]').val() != "")
		{
			jQuery(".preloader").removeClass("up");
			window.location.href = BASE_URL + "/quote/summary/index/previous_form_key/" +  jQuery('[name$="previous_form_key"]').val();
		}
		else
		{
			window.history.back();
		}
	});
}
//--------------------------------
function _Verifyvalidage(birthdate,senddate,wtoreturn) {
if ( (birthdate.length)>4 && (senddate.length)>4 && (wtoreturn.length)>4 ) {
var x = birthdate.split("-");
var y = senddate.split("-");
var byear = x[0];
var bmonths = x[1];
var bdays = x[2];
//alert(bdays);
var syear = y[0];
var smonths = y[1];
var sdays = y[2];
//alert(sdays);
if (sdays < bdays) {
sdays = parseInt(sdays) + 30;
smonths = parseInt(smonths) - 1;
//alert(sdays);
var fdays = sdays - bdays;
//alert(fdays);
}
else {
var fdays = sdays - bdays;
}
if (smonths < bmonths) {
smonths = parseInt(smonths) + 12;
syear = syear - 1;
var fmonths = smonths - bmonths;
}
else {
var fmonths = smonths - bmonths;
}
var fyear = syear - byear;
//alert(fyear + ' years ' + fmonths + ' months ' + fdays + ' days');
switch (wtoreturn) {
	case 'days':
		return fdays;
		break;
	case 'months':
		return fmonths;
		break;
	default:
		return fyear;
}
}
}
//--------------------------------

function getAge(element)
{
	var DM 	  = Object.create(DateModifier);
	var dob   = DM.createDate(jQuery(element));
	var today = DM.createDate();
	var years = 0;

	if (element.val() != '')
	{
		// years = Math.floor((today.getTime() - dob.getTime()) / (365.25 * 24 * 60 * 60 * 1000));

		years = today.getFullYear() - dob.getFullYear();

		if (today.getMonth() < dob.getMonth())
		{
			years--;
		}
		else if (today.getMonth() == dob.getMonth())
		{
			if (today.getDate() < dob.getDate())
			{
				years--;
			}
		}
	}
	else
	{
		years = 0;
	}

	return years;
}

function setBirthdates()
{
	jQuery('[data-birthdate="true"]').each(function()
	{
		jQuery(this).datepicker('option', 'minDate', null);
		jQuery(this).datepicker('option', 'maxDate', new Date());
		jQuery(this).datepicker('option', 'yearRange', '-100:+0');
	});

	jQuery('[data-birthdate="true"]').on('change', function()
	{
		var age = getAge(jQuery(this));

		jQuery(this).closest('.fieldset-group').find('input[name$="[age]"]').val(age);


		if (jQuery(this).closest('.fieldset-row').data('fieldset-row') == 'individual_personal_information' ||
			jQuery(this).closest('.fieldset-row').data('fieldset-row') == 'family_personal_information' ||
			jQuery(this).closest('.fieldset-row').data('fieldset-row') == 'group_contact_person' ||
			jQuery(this).closest('.fieldset-row').data('fieldset-row') == 'company_contact_person'
		   )
		{
			if (age < 18)
			{
				showDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}
			else
			{
				hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}

			jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		}
	});

	reBindValidate();
}

function resetItinerary(type, _current, _prev)
{
	jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');

	jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group-set:not(:first)').remove();

	var DM = Object.create(DateModifier);

	var _destination    = jQuery(_prev).find('select[name*="destination"]').val();
	var _start          = jQuery(_prev).find('input[name*="start_date"]');
	var _end            = jQuery(_prev).find('input[name*="end_date"]');
	var singleMaxDays   = 180 -1;
	var multipleMaxDays = 90 - 1;

	DM.initPluses(0, 0, 0);
	var _startDate   = DM.createDate(_start);
	var _endDate     = DM.createDate(_end);

	if (jQuery(_start).val() != '') {
		var daysDiff = (DM.getDaysDiff(_start, _end) + 1);

		jQuery(_current).find('select[name*="destination"]').val(_destination);

		DM.initPluses(1, 0, 0);

		var startMinDate = _startDate;
		var endMinDate   = _endDate;

		// Start Date properties
		DM.adjustDateOption(jQuery(_current).find('input[name*="start_date"]'), 'minDate', startMinDate);
		jQuery(_current).find('input[name*="start_date"]').datepicker('setDate', startMinDate);

		if (type == 'Multiple Trip')
		{
			if (daysDiff <= 90)
			{
				// End Date Properties
				jQuery(_current).find('input[name*="end_date"]').datepicker('setDate', _endDate);
				DM.adjustDateOption(jQuery(_current).find('input[name*="end_date"]'), 'setDate', endMinDate);
			}
			else
			{
				DM.initPluses((multipleMaxDays + 1), 0, 0);
				_endDate = DM.createDate(_startDate);

				// End Date Properties
				jQuery(_current).find('input[name*="end_date"]').datepicker('setDate', _endDate);
				DM.adjustDateOption(jQuery(_current).find('input[name*="end_date"]'), 'setDate', endMinDate);
			}

			jQuery(_current).closest('.fieldset-group').attr('data-total-days', daysDiff).data('total-days', daysDiff);
			jQuery(_current).closest('.fieldset-group-set').attr('data-no-of-days', daysDiff).data('no-of-days', daysDiff);
		}
		else
		{
			DM.initPluses((singleMaxDays + 1), 0, 0);

			// End Date Properties
			jQuery(_current).find('input[name*="end_date"]').datepicker('setDate', _endDate);
			DM.adjustDateOption(jQuery(_current).find('input[name*="end_date"]'), 'setDate', endMinDate);
		}

		jQuery(_current).find('input[name*="no_of_days"]').val(daysDiff);

		jQuery('input[name="itinerary_options[total_no_of_days]"]').val(daysDiff).attr('data-total-days', daysDiff).data('total-days', daysDiff);
	}

	reBindValidate();
}

function singleSetEnDate()
{
	var DM = Object.create(DateModifier);

	var _max_num_day  = 180 - 1;
	var _plus_days	  = 0;
	var _plus_months  = 0;
	var _plus_years   = 0;

	if (jQuery('[data-fieldset-row="itinerary_single"]').find('input[name="itinerary_single[start_date]"]').val() != '')
	{
		DM.initPluses(_plus_days, _plus_months, _plus_years);
		var _minDate      = DM.createDate(jQuery('[data-fieldset-row="itinerary_single"]').find('input[name="itinerary_single[start_date]"]'));
		var _end_calendar = jQuery('[data-fieldset-row="itinerary_single"]').find('input[name="itinerary_single[end_date]"]');

		DM.initPluses((_plus_days + _max_num_day), _plus_months, _plus_years);
		var _maxDate = DM.createDate(jQuery('[data-fieldset-row="itinerary_single"]').find('input[name="itinerary_single[start_date]"]'));

		DM.adjustDateOption(_end_calendar, 'minDate', _minDate);
		DM.adjustDateOption(_end_calendar, 'maxDate', _maxDate);

		jQuery(_end_calendar).removeAttr('readonly').prop('readonly', false);
	}

	jQuery('[data-fieldset-row="itinerary_single"]').on('change', 'input[name="itinerary_single[start_date]"]', function(){
		var _current      = jQuery(this).closest('.fieldset-group-set');
		var _end_calendar = jQuery(this).closest('.fieldset-group').find('.calendar_input[data-date-range="true"][data-date-range-line="end"]');

		if(jQuery(this).val() != "")
		{
			DM.initPluses(_plus_days, _plus_months, _plus_years);
			var _minDate      = DM.createDate(jQuery(this));

			DM.adjustDateOption(_end_calendar, 'minDate', _minDate);

			DM.initPluses((_plus_days + _max_num_day), _plus_months, _plus_years);
			var _maxDate = DM.createDate(jQuery(this));
			DM.adjustDateOption(_end_calendar, 'maxDate', _maxDate);

			jQuery(_end_calendar).removeAttr('readonly').prop('readonly', false);
		}
		else
		{
			jQuery(_end_calendar).attr('readonly', 'readonly').prop('readonly', true).val('');
		}
	});

	jQuery('[data-fieldset-row="itinerary_single"]').on('change', 'input[name="itinerary_single[end_date]"]', function(){
		var _start_calendar = jQuery(this).closest('.fieldset-group').find('.calendar_input[data-date-range="true"][data-date-range-line="start"]');
		var _no_of_days = (DM.getDaysDiff(_start_calendar , jQuery(this)) + 1);

		if(jQuery(this).val() != '')
		{
			jQuery(this).closest('.fieldset-group').attr('data-no-of-days' , _no_of_days).data('no-of-days' , _no_of_days);
			jQuery(this).closest('.fieldset-group').find('input[name="itinerary_single[no_of_days]"]').val(_no_of_days);
			jQuery('input[name="itinerary_options[total_no_of_days]"]').val(_no_of_days).attr('data-total-days', _no_of_days).data('total-days', _no_of_days);
		}
	});

	jQuery('[data-fieldset-row="itinerary_single"]').find('[data-bv-excluded]').each(function(){
		jQuery(this).attr('data-bv-excluded', false);
		jQuery(this).data('bv-excluded', false);
	});

	jQuery('[data-fieldset-row="itinerary_multiple"]').find('[data-bv-excluded]').each(function(){
		jQuery(this).attr('data-bv-excluded', true);
		jQuery(this).data('bv-excluded', true);
	});
}

function multipleSetEndDate()
{
	var DM = Object.create(DateModifier);

	//init no of days
	var _sets = jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group-set');
	DateModifier.resetNumberOfDays(_sets);

	if (jQuery('[data-fieldset-row="itinerary_multiple"]').children.length > 0)
	{
		var totalDays = 0;

		if (jQuery('input[name$="itinerary_multiple[start_date][]"]').val() != '' &&
			jQuery('input[name$="itinerary_multiple[end_date][]"]').val() != '' )
		{
			jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group-set').each(function()
			{
				if (jQuery(this).find('select[name="itinerary_multiple[destination][]"]').val() != '' ||
					jQuery(this).find('input[name="itinerary_multiple[start_date][]"]').val() != '' ||
					jQuery(this).find('input[name="itinerary_multiple[end_date][]"]').val() != '')
				{
					jQuery(this).find('select').attr('readonly', 'readonly').prop('readonly', true);
					jQuery(this).find('input').attr('readonly', 'readonly').prop('readonly', true);

					var no_of_days = (DM.getDaysDiff(jQuery(this).find('input[name="itinerary_multiple[start_date][]"]'), jQuery(this).find('input[name="itinerary_multiple[end_date][]"]')) + 1);

					jQuery(this).find('input[name="itinerary_multiple[no_of_days][]"]').val(no_of_days);
					jQuery(this).closest('.fieldset-group-set').attr('data-no-of-days', no_of_days).data('no-of-days', no_of_days);
				}

				totalDays += no_of_days;
			});

			jQuery('input[name="itinerary_options[total_no_of_days]"]').val(totalDays).attr('data-total-days', totalDays).data('total-days', totalDays);
			jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group').attr('data-total-days', totalDays).data('total-days', totalDays);

			if (totalDays >= 180)
			{
				jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group').find('.fieldset-group-set .btn-add').addClass('hide')
			}
		}
	}

	jQuery('.mega-form-builds [data-fieldset-row="itinerary_multiple"]').on('click', '.btn-add', function()
	{
		//replace observer param1 = button then observ the next please pass the dom instance
        var observer = new MiniDaemon(jQuery(this),
            function(nIndex, nLength, bBackwards, owner)
            {
            	var _sets = jQuery(this).closest('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group-set');

                var _next_set = jQuery(owner.owner).closest('.fieldset-group-set').next();
                var _previous_set = jQuery(owner.owner).closest('.fieldset-group-set');

                if (_previous_set.length)
                {
                	jQuery(_previous_set).find('select').attr('readonly', 'readonly').prop('readonly', true);
                	jQuery(_previous_set).find('input').attr('readonly', 'readonly').prop('readonly', true);

                	reBindCalendar();
                }

                if (_next_set.length)
                {
                    var _plus_days      = 0;
                    var _plus_months    = 0;
                    var _plus_years     = 0;

                    checkRemainingDays(_next_set);

	                jQuery(_next_set).customClearForm();

                    _next_set.attr('data-no-of-days' , 0).data('no-of-days' ,0);

                    var _previous_start_calendar = DM.getStartDate(_previous_end_calendar);
                    var _previous_end_calendar 	 = DM.getEndDate(_previous_set.find('input'));

                    if (jQuery(_previous_end_calendar).val() != '')
                    {
                        var _next_start_calendar 	= DM.getStartDate(_next_set.find('input'));
                        var _next_end_calendar 		= DM.getEndDate(_next_start_calendar);

                        DM.initPluses(_plus_days, _plus_months, _plus_years);

                        // Set start date : Same day as previous end date
                        var _startMinDate = DM.createDate(jQuery(_previous_end_calendar));
                        DM.adjustDateOption(_next_start_calendar, 'minDate', _startMinDate);
                        DM.adjustDateOption(_next_start_calendar, 'maxDate', _startMinDate);
                        DM.adjustDateOption(_next_start_calendar, 'setDate', _startMinDate);
                        DM.reValidate(_next_start_calendar);
                        jQuery(_next_start_calendar).trigger('change');

                        // Check if previous date range is day tour
                        DM.initPluses(_plus_days, _plus_months, _plus_years);
                        var daysDiff = parseInt(jQuery(_previous_set).find('input[name="itinerary_multiple[no_of_days][]"]').val());

                        if (daysDiff == 1)
                        {
                        	DM.initPluses((_plus_days + 1), _plus_months, _plus_years);
                        }
                        else
                        {
                        	DM.initPluses(_plus_days, _plus_months, _plus_years);
                        }

                        // Set minimum date for end calendar
                        var _endMinDate = DM.createDate(jQuery(_previous_end_calendar));
                        DM.adjustDateOption(_next_end_calendar, 'minDate', _endMinDate);
                        DM.reValidate(_next_end_calendar);
                        jQuery(_next_end_calendar).trigger('change');
                    }

                    jQuery(_next_set).find('select').removeAttr('readonly').prop('readonly', false);
                	jQuery(_next_set).find('input').removeAttr('readonly').prop('readonly', false);

                    return false;
                }
            }, 100, 8);
        observer.start();
	});

	jQuery('.mega-form-builds [data-fieldset-row="itinerary_multiple"]').on('click', '.btn-delete', function()
	{
		var DM = Object.create(DateModifier);

		var previous_sets = jQuery(this).closest('.fieldset-group').children().not(jQuery(this).closest('.fieldset-group-set'));
		var parent_set    = jQuery(this).closest('.fieldset-group');
        var first_set 	  = jQuery(this).closest('.fieldset-group').children().first();
        var last_set 	  = jQuery(this).closest('.fieldset-group').children().last();
		var prev_set 	  = jQuery(this).closest('.fieldset-group-set').prev();
        var next_set 	  = jQuery(this).closest('.fieldset-group-set').next();
        var maxDays       = 90 - 1;
        var total_days    = 0;
        var first_trip;
        var last_trip;

		//replace observer param1 = button then observ the next please pass the dom instance
        var observer = new MiniDaemon(jQuery(this),
            function(nIndex, nLength, bBackwards, owner)
            {
				// If there is a previous set existing prior to deleted set
				if (prev_set.length)
				{
					DM.initPluses(0, 0, 0);
					var _prevEndDate = DM.createDate(DM.getEndDate(prev_set));

					// Check if there are next set existing
					if (next_set.length)
					{
						var _nextStartCalendar = DM.getStartDate(next_set);
						var _nextEndCalendar   = DM.getEndDate(next_set);

						// If next set fields are not blank
						if (jQuery(next_set).find('select[name="itinerary_multiple[destination][]"]').val() != '' &&
							jQuery(next_set).find('input[name="itinerary_multiple[start_date][]"]').val() != '' &&
							jQuery(next_set).find('input[name="itinerary_multiple[end_date][]"]').val() != ''
							)
						{
							DM.initPluses(0, 0, 0);
							var _nextStartDate = DM.createDate(DM.getStartDate(next_set));

							if (_prevEndDate != _nextStartDate)
							{
								// If previous end date is not equal to next start date
								// Set next start date to previous end date
								DM.adjustDateOption(_nextStartCalendar, 'minDate', _prevEndDate);
								jQuery(_nextStartCalendar).datepicker('setDate', _prevEndDate);

								// Set no. of days after changing start date
								var _noOfDays = (DM.getDaysDiff(DM.getStartDate(next_set), DM.getEndDate(next_set)) + 1);
								jQuery(next_set).find('input[name="itinerary_multiple[no_of_days][]"]').val(_noOfDays);
								jQuery(next_set).attr('data-no-of-days', _noOfDays).data('no-of-days', _noOfDays);

								if (_noOfDays > 90)
								{
									DM.initPluses(maxDays, 0, 0);
									var _nextEndMaxDate = DM.createDate(_nextStartCalendar);
									DM.adjustDateOption(_nextEndCalendar, 'maxDate', _nextEndMaxDate);
									jQuery(_nextEndCalendar).datepicker('setDate', _nextEndMaxDate);
								}
							}
						}
						// If next set fields are blank
						else
						{
							DM.adjustDateOption(_nextStartCalendar, 'minDate', _prevEndDate);
							DM.adjustDateOption(_nextStartCalendar, 'maxDate', _prevEndDate);

						}
					}

					first_trip = first_set;
				}
				// If no previous sets
				else
				{
					if (jQuery(next_set).find('input[name="itinerary_multiple[start_date][]"]').val() == '' &&
						jQuery(next_set).find('input[name="itinerary_multiple[end_date][]"]').val() == '')
					{
						var _nextStartCalendar = DM.getStartDate(next_set);
						var _nextEndCalendar   = DM.getEndDate(next_set);

						DM.initPluses(1, 0, 0);
						var _nextStartDate = DM.createDate();

						DM.adjustDateOption(_nextStartCalendar, 'minDate', _nextStartDate);

						DM.initPluses(maxDays, 0, 0);
						var _nextEndMaxDate = DM.createDate();
						DM.adjustDateOption(_nextEndCalendar, 'maxDate', _nextEndMaxDate);
					}

					first_trip = next_set;
				}

				if (next_set.length)
				{
					if (jQuery(last_set).find('select[name="itinerary_multiple[destination][]"]').val() != '' &&
						jQuery(last_set).find('input[name="itinerary_multiple[start_date][]"]').val() != '' &&
						jQuery(last_set).find('input[name="itinerary_multiple[end_date][]"]').val() != ''
						)
					{
						last_trip = last_set;
					}
				}
				else
				{
					if (jQuery(prev_set).find('select[name="itinerary_multiple[destination][]"]').val() != '' &&
						jQuery(prev_set).find('input[name="itinerary_multiple[start_date][]"]').val() != '' &&
						jQuery(prev_set).find('input[name="itinerary_multiple[end_date][]"]').val() != ''
						)
					{
						last_trip = prev_set;
					}
				}

				// TOTAL DAYS Computation
				// If computation is based on 1st start date to nth end date
				total_days = (DM.getDaysDiff(jQuery(first_trip).find('input[name="itinerary_multiple[start_date][]"]'),
											 jQuery(last_trip).find('input[name="itinerary_multiple[end_date][]"]')) + 1);

				jQuery(parent_set).attr('data-total-days', total_days).data('total-days', total_days);
				jQuery('input[name="itinerary_options[total_no_of_days]"]').val(total_days).attr('data-total-days', total_days).data('total-days', total_days);

				if (total_days < 180)
				{
					jQuery('.btn-add').removeClass('hide');
				}

            	return false;

            }, 1000, 8);
        observer.start();
	});

	jQuery('[data-fieldset-row="itinerary_multiple"]').on('mouseenter click', 'select[name="itinerary_multiple[destination][]"]', function()
	{
		if (jQuery(this).prop('readonly'))
		{
			jQuery(this).find('option').hide();
		}
		else
		{
			jQuery(this).find('option').show();
		}
	});

	jQuery('[data-fieldset-row="itinerary_multiple"]').on('change', 'select[name="itinerary_multiple[destination][]"]', function()
	{
		if (jQuery(this).closest('.fieldset-group').attr('data-total-days') >= 180)
		{
			jQuery(this).attr('readonly', 'readonly').prop('readonly', true);
		}
	});

	jQuery('[data-fieldset-row="itinerary_multiple"]').on('change', 'input[name="itinerary_multiple[start_date][]"]', function()
	{
		var DM = Object.create(DateModifier);

		var _plus_days    = 0;
		var _plus_months  = 0;
		var _plus_years   = 0;
		var _max_num_day  = 90 - 1;

		var _current 	  = jQuery(this).closest('.fieldset-group-set');
		var _previous 	  = jQuery(this).closest('.fieldset-group-set').prev();

		var _end_calendar = DM.getEndDate(jQuery(this));

		if (jQuery(this).val() != '')
		{
			// Set mindate for end calendar
			DM.initPluses(_plus_days, _plus_months, _plus_years);
			var _minDate = DM.createDate(jQuery(this));
			DM.adjustDateOption(_end_calendar, 'minDate', _minDate);

			// set maxdate for end calendar
			DM.initPluses(_max_num_day, _plus_months, _plus_years);
			var _maxDate = DM.createDate(jQuery(this));
			DM.adjustDateOption(_end_calendar, 'maxDate', _maxDate);

			if(jQuery(_end_calendar).val() != '')
			{
				var _no_of_days = parseInt(jQuery(DM.getGroupSetParent(jQuery(this))).data('no-of-days'));

				if(_no_of_days != 0 )
				{
					_plus_days = (_plus_days + _no_of_days);
				}

				DM.initPluses(_plus_days, _plus_months, _plus_years);
				DM.adJustEndDate(jQuery(this));
				jQuery(_end_calendar).trigger('change');
				DM.reValidate(_end_calendar);
			}

			jQuery(_end_calendar).removeAttr('readonly').prop('readonly', false);
		}
		else
		{
			jQuery(_end_calendar).attr('readonly', 'readonly').prop('readonly', true).val('');
		}
	});

	jQuery('[data-fieldset-row="itinerary_multiple"]').on('change', 'input[name="itinerary_multiple[end_date][]"]', function()
	{
		var DM = Object.create(DateModifier);
		var _plus_days		= 0;
		var _plus_months  	= 0;
		var _plus_years 	= 0;
		var _start_calendar = DM.getStartDate(jQuery(this));
		var _no_of_days     = (DM.getDaysDiff(_start_calendar , jQuery(this)) + 1);
		var _total_days     = 0;
		var first_set 	    = jQuery(this).closest('.fieldset-group').children().first();

		if (jQuery(this).val() != '')
		{
			jQuery(this).closest('.fieldset-group-set').attr('data-no-of-days' , _no_of_days).data('no-of-days' , _no_of_days);
			jQuery(this).closest('.fieldset-group-set').find('input[name="itinerary_multiple[no_of_days][]"]').val(_no_of_days);

			_total_days = (DM.getDaysDiff(jQuery(first_set).find('input[name="itinerary_multiple[start_date][]"]'), jQuery(this)) + 1);

			jQuery(this).closest('.fieldset-group').attr('data-total-days', _total_days).data('total-days', _total_days);
			jQuery('input[name="itinerary_options[total_no_of_days]"]').val(_total_days).attr('data-total-days', _total_days).data('total-days', _total_days);

			if (jQuery(this).closest('.fieldset-group').attr('data-total-days') >= 180)
			{
				jQuery(this).closest('.fieldset-group-set').find('.btn-add').addClass('hide');

				jQuery(this).closest('.fieldset-group-set').find('input').attr('readonly', 'readonly').prop('readonly', true);

				if (jQuery(this).closest('.fieldset-group-set').find('select[name="itinerary_multiple[destination][]"]').val() != '')
				{
					jQuery(this).closest('.fieldset-group-set').find('select').attr('readonly', 'readonly').prop('readonly', true);
				}
			}
			else
			{
				jQuery(this).closest('.fieldset-group-set').find('.btn-add').removeClass('hide');
			}
		}
	});

	jQuery('[data-fieldset-row="itinerary_single"]').find('[data-bv-excluded]').each(function(){
		jQuery(this).attr('data-bv-excluded', true);
		jQuery(this).data('bv-excluded', true);
	});

	jQuery('[data-fieldset-row="itinerary_multiple"]').find('[data-bv-excluded]').each(function(){
		jQuery(this).attr('data-bv-excluded', false);
		jQuery(this).data('bv-excluded', false);
	});
}

function validateDates()
{
	jQuery('.calendar_input.hasDatepicker').on('keyup change', function()
	{
		var DM = Object.create(DateModifier);
		var thisDate = jQuery(this).datepicker('getDate');
		var minDate  = jQuery(this).datepicker('option', 'minDate');
		var maxDate  = jQuery(this).datepicker('option', 'maxDate');

		if (thisDate != null)
		{
			if (minDate != null)
			{
				if (minDate == '+1d')
				{
					DM.initPluses(1, 0, 0);
					minDate = DM.createDate();
				}

				minDate.setHours(0, 0, 0, 0);

				if (minDate > thisDate)
				{
					jQuery(this).val('');
					jQuery(this).attr('data-bv-notempty-message', 'Please enter a valid date').data('bv-notempty-message', 'Please enter a valid date');
					jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
					reBindValidate();
				}
				else
				{
					jQuery(this).attr('data-bv-notempty-message', 'This is required and cannot be empty').data('bv-notempty-message', 'This is required and cannot be empty');
					jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
					reBindValidate();
				}
			}

			if (maxDate != null)
			{
				if (maxDate == '-18Y')
				{
					DM.initPluses(0, 0, -18);
					maxDate = DM.createDate();
				}

				maxDate.setHours(0, 0, 0, 0);

				if (maxDate < thisDate)
				{
					jQuery(this).val('');
					jQuery(this).attr('data-bv-notempty-message', 'Please enter a valid date').data('bv-notempty-message', 'Please enter a valid date');
					jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
					reBindValidate();
				}
				else
				{
					jQuery(this).attr('data-bv-notempty-message', 'This is required and cannot be empty').data('bv-notempty-message', 'This is required and cannot be empty');
					jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
					reBindValidate();
				}
			}
		}
	});
}

function checkRemainingDays(element)
{
	var totalDays     = 180;
	var currentMax	  = 90;
	var currentTotal  = parseInt(jQuery(element).closest('.fieldset-group').attr('data-total-days'));
	var remainingDays = totalDays - currentTotal;
	var previous_set  = jQuery(element).closest('.fieldset-group-set').prev();
	var previous_days = parseInt(jQuery(previous_set).find('input[name="itinerary_multiple[no_of_days][]"]').val());

	var DM = Object.create(DateModifier);

	jQuery(element).find('input[name="itinerary_multiple[start_date][]"]').on('change', function()
	{
		if (remainingDays < 90)
		{
			// if previous is day tour
			if (previous_days == 1)
			{
				DM.initPluses(1, 0, 0);
			}
			else
			{
				DM.initPluses(0, 0, 0);
			}

			var _next_min_date = DM.createDate(jQuery(this));

			DM.initPluses((remainingDays - 1), 0, 0);
			var _next_max_date = DM.createDate(jQuery(this));

			DM.adjustDateOption(jQuery(element).find('input[name="itinerary_multiple[end_date][]"]'), 'minDate', _next_min_date);
			DM.adjustDateOption(jQuery(element).find('input[name="itinerary_multiple[end_date][]"]'), 'maxDate', _next_max_date);

			if (jQuery(this).val() != '')
			{
				jQuery(element).find('input[name="itinerary_multiple[end_date][]"]').removeAttr('readonly').prop('readonly', false);
			}
			else
			{
				jQuery(element).find('input[name="itinerary_multiple[end_date][]"]').attr('readonly', 'readonly').prop('readonly', true).val('');
			}
		}
		else
		{
			// if previous is day tour
			if (previous_days == 1)
			{
				DM.initPluses(1, 0, 0);
			}
			else
			{
				DM.initPluses(0, 0, 0);
			}

			var _next_min_date = DM.createDate(jQuery(this));

			DM.initPluses((currentMax - 1), 0, 0);
			var _next_max_date = DM.createDate(jQuery(this));

			DM.adjustDateOption(jQuery(element).find('input[name="itinerary_multiple[end_date][]"]'), 'minDate', _next_min_date);
			DM.adjustDateOption(jQuery(element).find('input[name="itinerary_multiple[end_date][]"]'), 'maxDate', _next_max_date);

			if (jQuery(this).val() != '')
			{
				jQuery(element).find('input[name="itinerary_multiple[end_date][]"]').removeAttr('readonly').prop('readonly', false);
			}
			else
			{
				jQuery(element).find('input[name="itinerary_multiple[end_date][]"]').attr('readonly', 'readonly').prop('readonly', true).val('');
			}
		}

		return false;
	});
}

function populatePrincipalMember()
{
	var principalMember = jQuery('[data-fieldset-group="family_members"] .fieldset-group-set').first();

	principalMember.find('input[name="family_members[first_name][]"]').val(jQuery('input[name="family_personal_information[first_name]"]').val());
	principalMember.find('input[name="family_members[last_name][]"]').val(jQuery('input[name="family_personal_information[last_name]"]').val());
	principalMember.find('input[name="family_members[birth_date][]"]').val(jQuery('input[name="family_personal_information[birth_date]"]').val());
	principalMember.find('select[name="family_members[relationship][]"] option').remove();
	principalMember.find('select[name="family_members[relationship][]"]').append(jQuery('<option></option>').attr('value', 'Principal Member').text('Principal Member'));

	principalMember.find('input').attr('readonly', 'readonly').prop('readonly', 'true');
	principalMember.find('select').attr('readonly', 'readonly').prop('readonly', 'true');
	principalMember.find('input[name="family_members[birth_date][]"]').removeAttr('id').removeClass('date calendar_input hasDatepicker');
}

function itp()
{
	var btnCont     = '<div class="row"><div class="col-md-12 btn-cont-back"><div class="pull-right col-cus-btn-12"><input type="button" class="btn btn-continue" value="Continue"></div></div></div>';
	var btnAppend   = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';
	var btnBackLast = '<input type="button" class="btn btn-back" value="Back">';
	var _url 		= BASE_URL + "skin/frontend/base/default/megaform_builder/json/";

	jQuery('div[data-slide]:first-child').append(btnCont);
	jQuery('div[data-slide]:not(:first-child):not(:last)').append(btnAppend);
	jQuery('div[data-slide]:last').next().find('.btn-cont-back').prepend(btnBackLast);

	jQuery('input[name="cover_information[group_type]"]').parent().parent().hide();
	jQuery('[data-fieldset-row="itinerary_multiple"]').hide();
	hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));

	var familySection = jQuery('[data-fieldset-group="family_members"] .fieldset-group-set').first().clone();
	jQuery('[data-fieldset-group="family_members"]').prepend(familySection);
	jQuery('[data-fieldset-group="family_members"] .fieldset-group-set').first().find('.btn-delete').addClass('hide');

	if(!Object.size(jQuery('[name="cover_information[cover_type]"]').data('builder-default-value')))
	{
		displayFields([jQuery('[name="cover_information[cover_type]"]').data('builder-default-value')]);
	}
	else
	{
		displayFields(["Individual"]);
	}

	validateDates();
	singleSetEnDate();
	setBirthdates();

	if (jQuery('.mega-form-builds [data-fieldset-group] .fieldset-group-set').siblings().length < 1) {
		jQuery('.mega-form-builds [data-fieldset-group] .fieldset-group-set').find('.btn-delete').addClass('hide');
	}

	if (jQuery('input[name="individual_personal_information[birth_date]"]').val() == '')
	{
		hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
	}
	else
	{
		jQuery('input[name="individual_personal_information[age]"]').val(getAge(jQuery('input[name="individual_personal_information[birth_date]"]')));
	}

	if (jQuery('input[name="family_personal_information[birth_date]"]').val() == '')
	{
		hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
	}
	else
	{
		jQuery('input[name="family_personal_information[age]"]').val(getAge(jQuery('input[name="family_personal_information[birth_date]"]')));
	}

	if (jQuery('input[name="group_contact_person[birth_date]"]').val() == '')
	{
		hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
	}
	else
	{
		jQuery('input[name="group_contact_person[age]"]').val(getAge(jQuery('input[name="group_contact_person[birth_date]"]')));
	}

	if (jQuery('input[name="company_contact_person[birth_date]"]').val() == '')
	{
		hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
	}
	else
	{
		jQuery('input[name="company_contact_person[age]"]').val(getAge(jQuery('input[name="company_contact_person[birth_date]"]')));
	}

	jQuery('.btn-continue').on('click', function()
	{
		jQuery('.calendar_input.hasDatepicker').each(function()
		{
			if (jQuery(this).val() == '')
			{
				jQuery(this).attr('data-bv-notempty-message', 'This is required and cannot be empty').data('bv-notempty-message', 'This is required and cannot be empty');
			}
		});

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();

		populatePrincipalMember();
	});

	jQuery('input[name$="[first_name]"], input[name$="[last_name]"]').on('change', function()
	{
		if (jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'family_personal_information' ||

			jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'group_contact_person' ||
			jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'company_contact_person')
		{
			var members          = '';
			var member_names     = [];
			var principal_member = jQuery(this).closest('.fieldset-group').find('input[name$="[first_name]"]').val() + ' ' + jQuery(this).closest('.fieldset-group').find('input[name$="[last_name]"]').val();

			switch(jQuery(this).closest('[data-fieldset-row]').data('fieldset-row'))
    		{
				case 'family_personal_information' :
					members = jQuery('[data-fieldset-row="family_members"]').find('.fieldset-group').children();
					break;
				case 'group_contact_person' :
					members = jQuery('[data-fieldset-row="group_members"]').find('.fieldset-group').children();
					break;
				case 'company_contact_person' :
					members = jQuery('[data-fieldset-row="company_members"]').find('.fieldset-group').children();
					break;
			}

			if (members.length)
			{
				members.each(function()
				{
					member_names.push(jQuery(this).find('input[name$="[first_name][]"]').val() + ' ' + jQuery(this).find('input[name$="[last_name][]"]').val());
				});

				if (jQuery.inArray(principal_member, member_names) > -1)
				{
					alert('Member already exist.');

					jQuery(this).closest('.fieldset-group').find('input[name$="_name]"]').val('');

					reValidate(jQuery(this).closest('.fieldset-group').find('input[name$="_name]"]'));
				}
			}
		}
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('change', 'input[name$="[first_name][]"], input[name$="[last_name][]"]', function()
	{
		if (jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'family_members' ||
			jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'group_members' ||
			jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'company_members' )
    	{
    		var members = [];
	    	var previous_members = jQuery(this).closest('.fieldset-group').children().not(jQuery(this).closest('.fieldset-group-set'));
	    	var principal_member = '';
	    	var current_member   = '';

	    	switch(jQuery(this).closest('[data-fieldset-row]').data('fieldset-row'))
    		{
				case 'family_members' :
					principal_member = jQuery('input[name="family_personal_information[first_name]"]').val() + ' ' + jQuery('input[name="family_personal_information[last_name]"]').val();
					current_member   = jQuery(this).closest('.fieldset-group-set').find('input[name="family_members[first_name][]"]').val() + ' ' + jQuery(this).closest('.fieldset-group-set').find('input[name="family_members[last_name][]"]').val();
					break;
				case 'group_members' :
					principal_member = jQuery('input[name="group_contact_person[first_name]"]').val() + ' ' + jQuery('input[name="group_contact_person[last_name]"]').val();
					current_member   = jQuery(this).closest('.fieldset-group-set').find('input[name="group_members[first_name][]"]').val() + ' ' + jQuery(this).closest('.fieldset-group-set').find('input[name="group_members[last_name][]"]').val();
					break;
				case 'company_members' :
					principal_member = jQuery('input[name="company_contact_person[first_name]"]').val() + ' ' + jQuery('input[name="company_contact_person[last_name]"]').val();
					current_member   = jQuery(this).closest('.fieldset-group-set').find('input[name="company_members[first_name][]"]').val() + ' ' + jQuery(this).closest('.fieldset-group-set').find('input[name="company_members[last_name][]"]').val();
					break;
			}

			if (previous_members.length == 0)
			{
				if (principal_member == current_member)
				{
					alert('Member already exist.');
				}
			}

			switch(jQuery(this).closest('[data-fieldset-row]').data('fieldset-row'))
    		{
				case 'family_personal_information' :
					members = jQuery('[data-fieldset-row="family_members"]').find('.fieldset-group').children();
					break;
				case 'group_contact_person' :
					members = jQuery('[data-fieldset-row="group_members"]').find('.fieldset-group').children();
					break;
				case 'company_contact_person' :
					members = jQuery('[data-fieldset-row="company_members"]').find('.fieldset-group').children();
					break;
			}

			if (members.length)
			{
				members.each(function()
				{
					member_names.push(jQuery(this).find('input[name$="[first_name][]"]').val() + ' ' + jQuery(this).find('input[name$="[last_name][]"]').val());
				});

				if (jQuery.inArray(principal_member, member_names) > -1)
				{
					alert('Member already exist.');

					jQuery(this).closest('.fieldset-group').find('input[name$="_name]"]').val('');

					reValidate(jQuery(this).closest('.fieldset-group').find('input[name$="_name]"]'));
				}
			}
		}
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('change', 'input[name$="[first_name][]"], input[name$="[last_name][]"]', function()
	{
		if (jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'family_members' ||
			jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'group_members' ||
			jQuery(this).closest('[data-fieldset-row]').data('fieldset-row') == 'company_members' )
    	{
    		var members = [];
	    	var previous_members = jQuery(this).closest('.fieldset-group').children().not(jQuery(this).closest('.fieldset-group-set'));
	    	var principal_member = '';
	    	var current_member   = '';

	    	switch(jQuery(this).closest('[data-fieldset-row]').data('fieldset-row'))
    		{
				case 'family_members' :
					principal_member = jQuery('input[name="family_personal_information[first_name]"]').val() + ' ' + jQuery('input[name="family_personal_information[last_name]"]').val();
					current_member   = jQuery(this).closest('.fieldset-group-set').find('input[name="family_members[first_name][]"]').val() + ' ' + jQuery(this).closest('.fieldset-group-set').find('input[name="family_members[last_name][]"]').val();
					break;
				case 'group_members' :
					principal_member = jQuery('input[name="group_contact_person[first_name]"]').val() + ' ' + jQuery('input[name="group_contact_person[last_name]"]').val();
					current_member   = jQuery(this).closest('.fieldset-group-set').find('input[name="group_members[first_name][]"]').val() + ' ' + jQuery(this).closest('.fieldset-group-set').find('input[name="group_members[last_name][]"]').val();
					break;
				case 'company_members' :
					principal_member = jQuery('input[name="company_contact_person[first_name]"]').val() + ' ' + jQuery('input[name="company_contact_person[last_name]"]').val();
					current_member   = jQuery(this).closest('.fieldset-group-set').find('input[name="company_members[first_name][]"]').val() + ' ' + jQuery(this).closest('.fieldset-group-set').find('input[name="company_members[last_name][]"]').val();
					break;
			}

			if (previous_members.length == 0)
			{
				if (principal_member == current_member)
				{
					alert('Member already exist.');


					jQuery(this).closest('.fieldset-group-set').find('input[name$="_name][]"]').val('');

					reValidate(jQuery(this).closest('.fieldset-group-set').find('input[name$="_name][]"]'));
				}
			}
			else if (previous_members.length >= 1)
			{
				members = [];

				previous_members.each(function()
				{
					members.push(jQuery(this).find('input[name$="[first_name][]"]').val() + ' ' + jQuery(this).find('input[name$="[last_name][]"]').val());
				});

				if (principal_member == current_member || jQuery.inArray(current_member, members) > -1)
				{
					alert('Member already exist.');

					jQuery(this).closest('.fieldset-group-set').find('input[name$="_name][]"]').val('');

					reValidate(jQuery(this).closest('.fieldset-group-set').find('input[name$="_name][]"]'));
				}
			}
    	}
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('click', '.btn-add', function()
	{
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();

		if (jQuery(this).closest('.fieldset-group-set').hasClass('has-error'))
		{
			return false;
		}
		else
		{
			jQuery(this).next().removeClass('hide');

			var observer = new MiniDaemon(jQuery(this),
	            function(nIndex, nLength, bBackwards, owner)
	            {
	                var _next_set = jQuery(owner.owner).closest('.fieldset-group-set').next();

	            	if (jQuery(this).closest('.mega-form-builds [data-fieldset-group]').data('fieldset-group') == 'family_members')
	            	{
	        			if (jQuery(this).closest('.mega-form-builds [data-fieldset-group]').children().length == 6)
	        			{
							jQuery(_next_set).find('.btn-add').addClass('hide');
						}
	            	}

	                if (_next_set.length)
	                {
	                	jQuery(_next_set).customClearForm();

	                	jQuery(_next_set).find('input[name*="birth_date"]').datepicker('option', 'minDate', null);
	                	jQuery(_next_set).find('input[name*="birth_date"]').datepicker('option', 'maxDate', new Date());
	                	jQuery(_next_set).find('input[name*="birth_date"]').datepicker('option', 'yearRange', '-100:+0');
	                }

	                setBirthdates();

	                validateDates();

	                jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').resetForm();
	            }, 100, 2);
	        observer.start();
		}

		jQuery('[data-fieldset-group="family_members"] .fieldset-group-set').first().find('.btn-add').addClass('hide');
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('click', '.btn-delete', function()
	{
		if (jQuery(this).closest('.mega-form-builds [data-fieldset-group]').data('fieldset-group') == 'family_members')
		{
			if (jQuery(this).closest('.mega-form-builds [data-fieldset-group]').children().length < 7)
			{
				jQuery('.mega-form-builds [data-fieldset-group="family_members"] .fieldset-group-set:last').find('.btn-add').removeClass('hide');
			}
		}

		if (jQuery(this).closest('[data-fieldset-group]').children().length < 3)
		{
			jQuery(this).closest('[data-fieldset-group]').find('.btn-delete').addClass('hide');
		}
		else
		{
			jQuery(this).closest('[data-fieldset-group]').find('.btn-delete').removeClass('hide');
		}

		jQuery('[data-fieldset-group="family_members"] .fieldset-group-set').first().find('.btn-delete').addClass('hide');
	});

	jQuery('input:radio[name="cover_information[cover_type]"]').on('change', function()
	{
		var age;

		if (jQuery(this).val() == 'Group') {
			jQuery('input[name="cover_information[group_type]"]').parent().parent().show();
			jQuery('input:radio[name="cover_information[group_type]"][value="Family"]').attr('checked', 'checked').prop('checked', true);
			displayFields(["Group", "Family"]);

			if (jQuery('input[name="family_personal_information[birth_date]"]').val() != '')
			{
				age = getAge(jQuery('input[name="family_personal_information[birth_date]"]'));
			}
			else
			{
				hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}
		}
		else
		{
			jQuery('input[name="cover_information[group_type]"]').parent().parent().hide();
			displayFields(["Individual"]);

			if (jQuery('input[name="individual_personal_information[birth_date]"]').val() != '')
			{
				age = getAge(jQuery('input[name="individual_personal_information[birth_date]"]'));
			}
			else
			{
				hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}
		}

		if (age < 18)
		{
			showDependency(jQuery('[data-fieldset-row="parent_consent"]'));
		}
		else
		{
			hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
		}

		setBirthdates();

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');

		reBindValidate();
	});

	jQuery('input:radio[name="cover_information[group_type]"]').on('change', function()
	{
		var age;

		displayFields(["Group", jQuery(this).val()]);

		if (jQuery(this).val() == 'Family')
		{
			if (jQuery('input[name="family_personal_information[birth_date]"]').val() != '')
			{
				age = getAge(jQuery('input[name="family_personal_information[birth_date]"]'));
			}
			else
			{
				hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}
		}
		else if (jQuery(this).val() == 'Group')
		{
			if (jQuery('input[name="group_contact_person[birth_date]"]').val() != '')
			{
				age = getAge(jQuery('input[name="group_contact_person[birth_date]"]'));
			}
			else
			{
				hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}
		}
		else if (jQuery(this).val() == 'Company')
		{
			if (jQuery('input[name="company_contact_person[birth_date]"]').val() != '')
			{
				age = getAge(jQuery('input[name="company_contact_person[birth_date]"]'));
			}
			else
			{
				hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
			}
		}

        if (age < 18)
		{
			showDependency(jQuery('[data-fieldset-row="parent_consent"]'));
		}
		else
		{
			hideDependency(jQuery('[data-fieldset-row="parent_consent"]'));
		}

		setBirthdates();

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');

		reBindValidate();
	});

	jQuery('input[name="group_contact_person[birth_date]"]').on('change', function()
    {
        var age = getAge(jQuery(this));

        if (age <= 18)
        {
            jQuery('select[name="group_contact_person[civil_status]"] option[value="Single"]').prop('selected', true).attr('selected', 'selected');
            jQuery('select[name="group_contact_person[civil_status]"] > option:not(:nth-child(1), :nth-child(2))').prop('disabled', true).attr('disabled', 'disabled').hide();
        }
        else
        {
            jQuery('select[name="group_contact_person[civil_status]"] option[value="Single"]').prop('selected', false).removeAttr('selected');
            jQuery('select[name="group_contact_person[civil_status]"] > option:not(:nth-child(1), :nth-child(2))').prop('disabled', false).removeAttr('disabled').show();
        }
    });

	jQuery('.mega-form-builds [data-fieldset-group]').on('change', 'input[name="family_members[birth_date][]"]', function()
	{
		var birth_date = jQuery(this).closest('.fieldset-group-set').find('input[name="family_members[birth_date][]"]');
		var relationship = jQuery(this).closest('.fieldset-group-set').find('select[name="family_members[relationship][]"]');
		var noofdays = jQuery('input[name="itinerary_options[total_no_of_days]"]').val();
		var senddate = jQuery('input[name="itinerary_single[end_date]"]').val();
		if (senddate == '') {
			senddate = jQuery('input[name="itinerary_multiple[end_date]"]').val();
		}
		var getYears = _Verifyvalidage(jQuery(birth_date).val(),senddate,'years');
		if (jQuery(relationship).val() == 'Child')
		{
			var age = getAge(jQuery(this));

			if (getYears>17) {
				jQuery(this).val('');
				reValidate(jQuery(this));
				//alert(' Child must be 18 years old and below during the trip');
				alert(' Child must be 17yrs old and below during the trip');
			}
			else if (age > 17)
			{
				jQuery(this).val('');
				reValidate(jQuery(this));
				alert(' Child must be 17 yrs old and below.');
			}
		}
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('change', 'select[name="family_members[relationship][]"]', function()
	{
		if (jQuery(this).val() == 'Child')
		{
			var birth_date = jQuery(this).closest('.fieldset-group-set').find('input[name="family_members[birth_date][]"]');
			var age        = getAge(birth_date);
			var noofdays = jQuery('input[name="itinerary_options[total_no_of_days]"]').val();
			var senddate = jQuery('input[name="itinerary_single[end_date]"]').val();
			if (senddate == '') {
				senddate = jQuery('input[name="itinerary_multiple[end_date]"]').val();
			}
			var getYears = _Verifyvalidage(jQuery(birth_date).val(),senddate,'years');

			if (jQuery(this).val() == 'Child')
			{
				if (getYears>17) {
					jQuery(birth_date).val('');
					reValidate(jQuery(birth_date));
					alert(' Child must be 17yrs old and below during the trip');
				}
				else if (age > 17)
				{
					jQuery(birth_date).val('');
					reValidate(jQuery(birth_date));
					alert(' Child must be 17 yrs old and below.');
				}
			}
		}
	});

	jQuery('.mega-form-builds [data-fieldset-group]').on('change', 'input[name="group_members[birth_date][]"]', function()
	{
		var age = getAge(jQuery(this));

		if (age < 18)
		{
			jQuery(this).closest('.fieldset-group-set').find('select[name="group_members[civil_status][]"] > option[value="Single"]').prop('selected', true).attr('selected', 'selected');
			jQuery(this).closest('.fieldset-group-set').find('select[name="group_members[civil_status][]"] > option:not(:nth-child(1), :nth-child(2))').prop('disabled', true).attr('disabled', 'disabled').hide();
		}
		else
		{
			jQuery(this).closest('.fieldset-group-set').find('select[name="group_members[civil_status][]"] > option[value="Single"]').prop('selected', false).removeAttr('selected');
			jQuery(this).closest('.fieldset-group-set').find('select[name="group_members[civil_status][]"] > option:not(:nth-child(1), :nth-child(2))').prop('disabled', false).removeAttr('disabled').show();
		}
	});

	if (jQuery('select[name="travel_information[purpose_of_travel]"]').val() == 'Others')
	{
		jQuery('input[name="travel_information[purpose_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
	}
	else
	{
		jQuery('input[name="travel_information[purpose_others]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	}

	jQuery('select[name="travel_information[purpose_of_travel]"]').on('change', function()
	{
		if (jQuery(this).val() == 'Others')
		{
			jQuery('input[name="travel_information[purpose_others]"]').val('').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		}
		else
		{
			jQuery('input[name="travel_information[purpose_others]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		}

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
	});

	jQuery('input:radio[name="itinerary_options[options]"]').on('change', function()
	{
		var _current = '';
		var _prev    = '';

		if (jQuery(this).val() == 'Single Trip')
		{
			_current = jQuery('[data-fieldset-row="itinerary_single"]').find('.fieldset-group');
			_prev    = jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group-set');

			jQuery('[data-fieldset-row="itinerary_single"]').show();
			jQuery('[data-fieldset-row="itinerary_multiple"]').hide();

			singleSetEnDate();
		}
		else
		{
			_current = jQuery('[data-fieldset-row="itinerary_multiple"]').find('.fieldset-group-set');
			_prev    = jQuery('[data-fieldset-row="itinerary_single"]').find('.fieldset-group');

			jQuery('[data-fieldset-row="itinerary_multiple"]').show();
			jQuery('[data-fieldset-row="itinerary_single"]').hide();

			multipleSetEndDate();
		}

		resetItinerary(jQuery(this).val(), _current, _prev);
	});

	if(Object.size(jQuery('[name="cover_information[cover_type]"]').data('builder-default-value')))
	{
		jQuery('input:radio[name="cover_information[cover_type]"][value="'+ jQuery('[name="cover_information[cover_type]"]').data('builder-default-value') +'"]')
		.attr('checked', 'checked')
		.prop('checked', true)
		.trigger('change');
	}
	else
	{
		jQuery('input:radio[name="cover_information[cover_type]"][value]:first')
		.attr('checked', 'checked')
		.prop('checked', true)
		.trigger('change');
	}

	if(Object.size(jQuery('[name="cover_information[group_type]"]').data('builder-default-value')))
	{
		if(jQuery('[name="cover_information[cover_type]"]').data('builder-default-value') == "Group")
		{
			jQuery('input:radio[name="cover_information[group_type]"][value="'+ jQuery('[name="cover_information[group_type]"]')
			.data('builder-default-value') +'"]').attr('checked', 'checked')
			.prop('checked', true)
			.trigger('change');
		}
	}
	else
	{
		if(jQuery('[name="cover_information[cover_type]"]').data('builder-default-value') == "Group")
		{
			jQuery('input:radio[name="cover_information[group_type]"][value]:first')
			.attr('checked', 'checked')
			.prop('checked', true)
			.trigger('change');
		}
	}

	if(Object.size(jQuery('[name="itinerary_options[options]"]').data('builder-default-value')))
	{
		jQuery('input:radio[name="itinerary_options[options]"][value="'+ jQuery('[name="itinerary_options[options]"]').data('builder-default-value') +'"]').attr('checked', 'checked').prop('checked', true);

		if (jQuery('[name="itinerary_options[options]"]').data('builder-default-value') == 'Single Trip')
		{
			jQuery('[data-fieldset-row="itinerary_single"]').show();
			jQuery('[data-fieldset-row="itinerary_multiple"]').hide();

			singleSetEnDate();
		}
		else
		{
			jQuery('[data-fieldset-row="itinerary_multiple"]').show();
			jQuery('[data-fieldset-row="itinerary_single"]').hide();

			multipleSetEndDate();
		}
	}
	else
	{
		jQuery('input:radio[name="itinerary_options[options]"][value]:first')
		.attr('checked', 'checked')
		.prop('checked', true)
		.trigger('change');
	}

}

function fire()
{
	var btnCont     = '<div class="row"><div class="col-md-12 btn-cont-back"><div class="pull-right col-cus-btn-12"><input type="button" class="btn btn-continue" value="Continue"></div></div></div>';
	var btnAppend   = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';
	var btnBackLast = '<input type="button" class="btn btn-back" value="Back">';

	jQuery('div[data-slide]:first-child').append(btnCont);
	jQuery('div[data-slide]:not(:first-child):not(:last)').append(btnAppend);
	jQuery('div[data-slide]:last').next().find('.btn-cont-back').prepend(btnBackLast);

	jQuery('select[name="property_occupancy[others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).parent().hide();
	jQuery('input[name="address_details[village_details]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="address_details[subdivision_details]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	hideDependency(jQuery('[data-fieldset-row="property_valuation_others"]'));
	jQuery('input[name="property_boundaries[left_others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="property_boundaries[right_others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="property_boundaries[back_others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();

	// TOOLTIP
	jQuery('span.tooltip-icon').on('mouseenter', function()
	{
		jQuery(this).next().css('visibility', 'visible');
	});

	jQuery('span.tooltip-icon').on('mouseout', function()
	{
		jQuery(this).next().css('visibility', 'hidden');
	});

	jQuery('[data-fieldset-row="property_boundaries"]').find('.fieldset-group')
		.prepend('<div class="boundary-img"><img src=" ' + BASE_URL + '/skin/frontend/smartwave/porto_child/images/boundaries.png" alt="Boundary"></div>');

	jQuery('select[name="property_occupancy[purely_residential]"]').on('change', function()
	{
		if (jQuery(this).val() == 'Others')
		{
			jQuery('select[name="property_occupancy[others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).parent().show();
		}
		else
		{
			jQuery('select[name="property_occupancy[others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).parent().hide();

		}

		reBindValidate();
	});

	jQuery('input[name="address_details[situated_in_village]"]').on('change', function()
	{
		if (jQuery(this).is(':checked'))
		{
			jQuery('input[name="address_details[village_details]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		}
		else
		{
			jQuery('input[name="address_details[village_details]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		}

		reBindValidate();
	});

	jQuery('input[name="address_details[subdivision]"]').on('change', function()
	{
		if (jQuery(this).is(':checked'))
		{
			jQuery('input[name="address_details[subdivision_details]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		}
		else
		{
			jQuery('input[name="address_details[subdivision_details]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		}

		reBindValidate();
	});
	if(jQuery('input:radio[name="property_valuation[property_valuation]"]:checked').val() == 'Yes')
	{
		showDependency(jQuery('[data-fieldset-row="property_valuation_others"]'));
	}
	jQuery('input:radio[name="property_valuation[property_valuation]"]').on('change', function()
	{
		if (jQuery(this).val() == 'No')
		{
			hideDependency(jQuery('[data-fieldset-row="property_valuation_others"]'));
		}
		else
		{
			showDependency(jQuery('[data-fieldset-row="property_valuation_others"]'));
		}

		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
	});

	if(jQuery('select[name="property_boundaries[left_boundary]"]').val() == 'Others')
	{
		jQuery('input[name="property_boundaries[left_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
	}
	jQuery('select[name="property_boundaries[left_boundary]"]').on('change', function()
	{
		if (jQuery(this).val() == 'Others')
		{
			jQuery('input[name="property_boundaries[left_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		}
		else
		{
			jQuery('input[name="property_boundaries[left_others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		}

		reBindValidate();
	});



	if(jQuery('select[name="property_boundaries[right_boundary]"]').val() == 'Others')
	{
		jQuery('input[name="property_boundaries[right_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
	}
	jQuery('select[name="property_boundaries[right_boundary]"]').on('change', function()
	{
		if (jQuery(this).val() == 'Others')
		{
			jQuery('input[name="property_boundaries[right_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		}
		else
		{
			jQuery('input[name="property_boundaries[right_others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		}

		reBindValidate();
	});

	if(jQuery('select[name="property_boundaries[back_boundary]"]').val() == 'Others')
	{
		jQuery('input[name="property_boundaries[back_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
	}
	jQuery('select[name="property_boundaries[back_boundary]"]').on('change', function()
	{
		if (jQuery(this).val() == 'Others')
		{
			jQuery('input[name="property_boundaries[back_others]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
		}
		else
		{
			jQuery('input[name="property_boundaries[back_others]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
		}

		reBindValidate();
	});

	jQuery('input[name="property_valuation_others[date_of_valuation]"]')
		.datepicker('option', 'minDate', null)
		.datepicker('option', 'maxDate', new Date())
		.datepicker('option', 'yearRange', '-100:+0');

	reBindValidate();

	jQuery('input[name^="construction[walls_"]').on('change', function()
	{
		if (jQuery(this).is(':checked'))
		{
			jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery('input[name^="construction[walls_"]').not(jQuery(this)).not(':checked').attr('data-bv-excluded', true).data('bv-excluded', true);
		}
		else
		{
			jQuery(this).attr('data-bv-excluded', true).data('bv-excluded', true);
		}

		reBindValidate();
	});

	jQuery('input[name^="construction[roof_"]').on('change', function()
	{
		if (jQuery(this).is(':checked'))
		{
			jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery('input[name^="construction[roof_"]').not(jQuery(this)).not(':checked').attr('data-bv-excluded', true).data('bv-excluded', true);
		}
		else
		{
			jQuery(this).attr('data-bv-excluded', true).data('bv-excluded', true);
		}

		reBindValidate();
	});

	jQuery('input[name^="construction[deck_"]').on('change', function()
	{
		if (jQuery(this).is(':checked'))
		{
			jQuery(this).attr('data-bv-excluded', false).data('bv-excluded', false);
			jQuery('input[name^="construction[deck_"]').not(jQuery(this)).not(':checked').attr('data-bv-excluded', true).data('bv-excluded', true);
		}
		else
		{
			jQuery(this).attr('data-bv-excluded', true).data('bv-excluded', true);
		}

		reBindValidate();
	});

	jQuery('input[value="GET QUOTE"]').on('click', function()
	{
		if (jQuery('input[name^="construction[walls_"]:checked').length == 0)
		{
			jQuery('input[name^="construction[walls_"]').attr('data-bv-excluded', false).data('bv-excluded', false);
		}

		if (jQuery('input[name^="construction[roof_"]:checked').length == 0)
		{
			jQuery('input[name^="construction[roof_"]').attr('data-bv-excluded', false).data('bv-excluded', false);
		}

		if (jQuery('input[name^="construction[deck_"]:checked').length == 0)
		{
			jQuery('input[name^="construction[deck_"]').attr('data-bv-excluded', false).data('bv-excluded', false);
		}

		reBindValidate();
	});
}

function personalInfoFire()
{
	var btnAppend     = '<div class="row"><div class="col-md-12 btn-cont-back"><input type="button" class="btn btn-back" value="Back"><input type="button" class="btn btn-continue" value="Continue"></div></div>';

    jQuery('div[data-slide]').append(btnAppend);
    jQuery('.append-btn').hide();

	jQuery('input[name="personal_information[birth_date]"]').datepicker('option', 'minDate', null)
		.datepicker('option', 'maxDate', new Date())
		.datepicker('option', 'yearRange', '-100:+0');

	jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
	jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();

	jQuery('input[name="same_location[same_location]"]').on('change', function()
	{
		if (jQuery(this).prop('checked'))
		{
			hideDependency(jQuery('div[data-fieldset-row="mailing_address"]'));
		}
		else
		{
			showDependency(jQuery('div[data-fieldset-row="mailing_address"]'));
		}
	});

	jQuery('input:radio[name="agent_information[agent_status]"]').on('change', function()
	{
		if (jQuery(this).val() == 'No')
		{
			jQuery('input[name="agent_information[agent_name]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
			jQuery('input[name="agent_information[agent_number]"]').val('').attr('data-bv-excluded', true).data('bv-excluded', true).hide();
			jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();
		}
		else
		{
			jQuery('input[name="agent_information[agent_name]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
			jQuery('input[name="agent_information[agent_number]"]').attr('data-bv-excluded', false).data('bv-excluded', false).show();
			jQuery('input[name="agent_information[agent_number]"]').siblings('label').hide();
		}

		reBindValidate();
	});

	jQuery('div[data-slide]:first').find('.btn-back').removeClass('btn-back').attr('id', 'btn-personal-back');
	jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');

	jQuery('#btn-personal-back').on('click', function()
	{
		if(jQuery('[name$="previous_form_key"]').val() != "")
		{
			jQuery(".preloader").removeClass("up");
			window.location.href = BASE_URL + "/quote/summary/index/previous_form_key/" +  jQuery('[name$="previous_form_key"]').val();
		}
		else
		{
			window.history.back();
		}
	});
}

function cocaf()
{
	jQuery('input[type="submit"][value="Save"]').hide();
	jQuery('input[type="submit"][value="GET QUOTE"]').val('SUBMIT');
}

var gImgPreview = [];



function validatePromoCode()
{
	var exist = jQuery('input[name="promo_code[promo_code]"]').attr('data-bv-remote-url-default');
	if (currEmail = jQuery('input[name="contact_information[email]"]').val()) {
		jQuery('input[name="promo_code[promo_code]"]').attr('data-bv-remote-url', exist + '?email=' + currEmail);
	}

	jQuery('input[name="contact_information[email]"]').on('change', function(){
		var i = jQuery(this).val();
		jQuery('input[name="promo_code[promo_code]"]').attr('data-bv-remote-url', exist + '?email=' + i);
		jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');
		reBindValidate();
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();
	});
}

jQuery(document).ready(function()
{

	reBindMask();
	reBindCalendar();
	reBindValidate();

	generatePreview(jQuery('.fieldset-group-set input.fileUpload'));

	switch(jQuery('.no-view').find('input[name="form_code"]').val()){
		case 'motor' :
			motor();
			validatePromoCode();
			break;
		case 'vehicleInfo' :
			vehicleInfo();
			break;
		case 'personalInfo' :
			personalInfo();
			if(isLoggedIn) validateDob();
			break;
		case 'personalInfoItp' :
			personalInfoItp();
			break;
		case 'itp' :
			itp();
			validatePromoCode();
			break;
		case 'fire' :
			fire();
			break;
		case 'personalInfoFire' :
			personalInfoFire();
			break;
		case 'cocaf' :
			cocaf();
			break;
	}

	jQuery('div[data-slide]:first-child').show();

	if (jQuery('div[data-slide]').length == 0)
	{
		jQuery('.append-btn').show();
	}

	jQuery('.btn-continue').on('click', function()
	{
		jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();

		if (jQuery(this).closest('div[data-slide]').has('.has-error').length == 0)
		{
			jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').resetForm();
			jQuery(this).closest('div[data-slide]').hide().next().show();
			window.scrollTo(0, 0);
		}
	});

	/**
    * --------------------------------------------------------------------------
    * UPDATE PERSONAL INFORATION PROMPT MESSAGE
    * --------------------------------------------------------------------------
    */
	jQuery('div[data-slide]:last').find('input[value="Continue"]').on('click', function(){
		
		jQuery('div[data-slide]:last').show().next().hide();
		if (isLoggedIn && isagent != 4 && (jQuery('.no-view').find('input[name="form_code"]').val() == 'personalInfo' || jQuery('.no-view').find('input[name="form_code"]').val() == 'personalInfoItp'))
		{
			jQuery("#personalUpdateModal").removeClass('in').attr('aria-hidden', true);

		    if(sessionStorage.getItem('isPop') != 1 && jQuery('div[data-slide]:last').find('.btn-continue').length && jQuery('div[data-slide]:last').has('.has-error').length == 0)
	        {
	    		jQuery("#personalUpdateModal").modal({
		        	show: true,
		        	backdrop: 'static'
		        });
		        sessionStorage.setItem('isPop', 1);
		        jQuery('#personalUpdateModal .btn-yes').on('click', function(evt)
			    {
			    	if(	_customerData[0].firstname != jQuery('input[name$="[first_name]"]').val() ||
		                _customerData[0].lastname != jQuery('input[name$="[last_name]"]').val() ||
		                _customerData[0].dob != jQuery('input[name$="[birth_date]"]').val() ||
		                _customerData[0].gender != jQuery('select[name$="[gender]"] option:selected').val() ||
		                _customerData[0].province != jQuery('select[name$="[province]"] option:selected').val() ||
		                _customerData[0].city != jQuery('select[name$="[city]"] option:selected').val() ||
		                _customerData[0].barangay != jQuery('select[name$="[barangay]"] option:selected').val() ||
		                _customerData[0].address != jQuery('input[name$="mailing_address[address]"]').val() ||
		                _customerData[0].email != jQuery('input[name$="contact_information[email]"]').val() ||
		                _customerData[0].cust_occu != jQuery('select[name$="[occupation]"] option:selected').val() ||
		                _customerData[0].nationality != jQuery('select[name$="[nationality]"] option:selected').val() ||
		                _customerData[0].phone_num != jQuery('input[name$="contact_information[telephone_number]"]').val() ||
		                _customerData[0].mobile_num != jQuery('input[name$="contact_information[mobile_number]"]').val()
			       	) //if loggedin true and there are changes made in personal information
				    {
				    	// SAVE PERSONAL INFO UPDATES IN MY ACCOUNT
				        var form = jQuery('#megaForm-defaultForm-1').serialize();
				        jQuery.ajax({
				            type: "POST",
				            data: form,
				            url: "/personalinfo/index/updateInfo/",
				            success: function(response){
								// success saving
								console.log("lhoraine");
				            }
				        });
				    }
		            jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');
		            jQuery('div[data-slide]:last').find('input[type="submit"]').click();
				    jQuery("#personalUpdateModal").modal('hide');
			    });

			    jQuery('#personalUpdateModal .btn-no').on('click', function()
			    {
			        // GO BACK TO PERSONAL INFO FIRST PAGE
			        window.location.href=BASE_URL + "/quote/personal/index/previous_form_key/" +  jQuery('[name$="previous_form_key"]').val();
			        jQuery('div[data-slide]:last').find('input[type="submit"]').addClass('btn-continue').prop('type', 'button');
			    });
		    } else {
		    	if(jQuery('div[data-slide]:last').has('.has-error').length == 1){
		    		return false;
		    	}
		    	if(	_customerData[0].firstname != jQuery('input[name$="[first_name]"]').val() ||
	                _customerData[0].lastname != jQuery('input[name$="[last_name]"]').val() ||
	                _customerData[0].dob != jQuery('input[name$="[birth_date]"]').val() ||
	                _customerData[0].gender != jQuery('select[name$="[gender]"] option:selected').val() ||
	                _customerData[0].province != jQuery('select[name$="[province]"] option:selected').val() ||
	                _customerData[0].city != jQuery('select[name$="[city]"] option:selected').val() ||
	                _customerData[0].barangay != jQuery('select[name$="[barangay]"] option:selected').val() ||
	                _customerData[0].address != jQuery('input[name$="mailing_address[address]"]').val() ||
	                _customerData[0].email != jQuery('input[name$="contact_information[email]"]').val() ||
	                _customerData[0].cust_occu != jQuery('select[name$="[occupation]"] option:selected').val() ||
		            _customerData[0].nationality != jQuery('select[name$="[nationality]"] option:selected').val() ||
	                _customerData[0].phone_num != jQuery('input[name$="contact_information[telephone_number]"]').val() ||
	                _customerData[0].mobile_num != jQuery('input[name$="contact_information[mobile_number]"]').val()
		       	) //if loggedin true and there are changes made in personal information
			    {
			    	// SAVE PERSONAL INFO UPDATES IN MY ACCOUNT
			        var form = jQuery('#megaForm-defaultForm-1').serialize();
			        jQuery.ajax({
			            type: "POST",
			            data: form,
			            url: "/personalinfo/index/updateInfo/",
			            success: function(response){
			            	setTimeout(function()
					        {
					        	//remove code
					        }, 500);
			            }
			        });
			    }
			    jQuery("#personalUpdateModal").modal('hide');
            	jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');
		    }
		    jQuery('#personalUpdateModal .btn-no').on('click', function()
		    {
		        // GO BACK TO PERSONAL INFO FIRST PAGE
		        window.location.href=BASE_URL + "/quote/personal/index/previous_form_key/" +  jQuery('[name$="previous_form_key"]').val();
		        jQuery('div[data-slide]:last').find('input[type="submit"]').addClass('btn-continue').prop('type', 'button');
		    });
		} else {
			jQuery('div[data-slide]:last').find('.btn-continue').removeClass('btn-continue').prop('type', 'submit');
		}
		//reBindValidate();
	});

	jQuery('.btn-back').click(function()
	{
		if (jQuery(this).closest('div[data-slide]').length == 0)
		{
			jQuery(this).closest('.append-btn').prev().hide().prev().show();
		}
		else
		{
			jQuery(this).closest('div[data-slide]').hide().prev().show();
		}

		window.scrollTo(0, 0);
	});

	jQuery('.btn-save').click(function()
	{
		toggleExclude();
	});

	jQuery('[data-mask-placeholder]').each(function(){
		jQuery(this).on('keyup', function(){
			if (jQuery(this).val().replace(/[_-]/g, '') == '') {
				jQuery(this).val('');
			}
			reValidate(jQuery(this));
		});
	});

	/**
	 * Country lists file
	 * js/bootstrapvalidator-master/src/data/gistfile1.json
	 */
	 jQuery('.mega-form-builds').on('click', '.btn-delete', function()
	 {
	 	jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');

	 	var ctr = jQuery(this).closest('[data-fieldset-group]').children().length;

	 	if (ctr > 1) {
	 		jQuery(this).closest('.fieldset-group-set').remove();
	 	}

	 	reBindValidate();

	 	jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();

	 });

	 jQuery('.mega-form-builds').on('click', '.btn-add', function()
	 {
	 	jQuery('.mega-form-builds .calendar_input').datepicker("destroy");

	 	jQuery('#megaForm-defaultForm-1').bootstrapValidator('destroy');

	 	var _cl = jQuery(this).closest('.fieldset-group-set').clone();

	 	jQuery(_cl).find('input').val('');

	 	jQuery(_cl).find('.calendar_input').removeAttr('id');

	 	jQuery(_cl).clearForm();

	 	jQuery(this).closest('.fieldset-group').append(_cl);

	 	reBindMask();
	 	reBindCalendar();
	 	setBirthdates();
        reBindValidate();

	 	jQuery('#megaForm-defaultForm-1').data('bootstrapValidator').validate();
	 });

    jQuery('.mega-form-builds [data-fieldset-group]').on('change',
        'select[name="person_to_contact[status][]"], input[name="person_to_contact[birth_date][]"]', function() {
        var birthDate = jQuery(this).closest('.fieldset-group-set').find('input[name="person_to_contact[birth_date][]"]');
        var status = jQuery(this).closest('.fieldset-group-set').find('select[name="person_to_contact[status][]"]');
        var age = getAge(birthDate);
        if (birthDate.val()  != '' && age < 18) {
            if (status.val() != 'Single' &&  status.val() != '') {
                status.val('');
                alert('Contact person below 18 years old must be Single');
            }
        }

    reBindValidate();

    });

    jQuery('li.btn-default').addClass('current');
    jQuery('.quote-process .current').prevAll('li').click(function(e) {
        e.preventDefault();
        var countPrev = jQuery(this).prevAll('li').length;
        var name = jQuery(this).attr('name');
        var fkey = localStorage[name];
        if (countPrev > 0) {
            window.location.href = '/quote/' + name + '/index/previous_form_key/' + fkey  ;
        } else {
            window.location.href = '/quote/' + name + '/index/form_key/' + fkey  ;
        }

    });

    if (typeof localStorage['personal'] != 'undefined') {
        localStorage['checkout'] = localStorage['personal'];
    }

    jQuery('.quote-process li.btn').each(function() {
        var step = jQuery(this).attr('name');
        if (localStorage[step] != '' && typeof localStorage[step] != 'undefined' ) {
            jQuery(this).addClass('btn-success past');
            if (jQuery(this).hasClass('current') == true) {
                jQuery(this).removeClass('past');
            }
        }
    });

    jQuery('li.btn-default').addClass('current');
    jQuery('.quote-process .current').prevAll('li').click(function(e) {
        e.preventDefault();
        var countPrev = jQuery(this).prevAll('li').length;
        var name = jQuery(this).attr('name');
        var fkey = localStorage[name];
        if (countPrev > 0) {
            window.location.href = '/quote/' + name + '/index/previous_form_key/' + fkey  ;
        } else {
            window.location.href = '/quote/' + name + '/index/form_key/' + fkey  ;
        }

    });

		//-------------------------------------------------------------------------
		jQuery('input[value="personalInfo"]').closest('form').find('.personalInfo .btn-continue').on('click', function(){
    	    jQuery('[name="mailing_address[province]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-vehicle-value'));
		    jQuery('[name="mailing_address[city]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-vehicle-value'));
		    jQuery('[name="mailing_address[barangay]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-vehicle-value'));
		    autoFillLocations(
		    {
		        'location': 'province',
						'location': 'municipality',
						'location': 'brgy',
		        'apl' : '.personalInfo'
		    });
				autoFillLocation(
		    {
						'location': 'municipality',
						'apl' : '.personalInfo'
				});
    });
    jQuery('input[value="personalInfoItp"]').closest('form').find('.personalInfoItp select[name="indiviual_personal_information[salutation]"]').on('change', function(){
    	    jQuery('[name="mailing_address[province]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-vehicle-value'));
		    jQuery('[name="mailing_address[city]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-vehicle-value'));
		    jQuery('[name="mailing_address[barangay]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-vehicle-value'));
				autoFillLocations(
		    {
		        'location': 'province',
						'location': 'municipality',
						'location': 'brgy',
		        'apl' : '.personalInfoItp'
		    });
				autoFillLocation(
		    {
						'location': 'municipality',
						'apl' : '.personalInfoItp'
				});
    });

    jQuery('.personalInfo .btn-continue').on('click', function(){
  	    jQuery('[name="mailing_address[province]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[province]"]').data('location-vehicle-value'));
		    jQuery('[name="mailing_address[city]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[city]"]').data('location-vehicle-value'));
		    jQuery('[name="mailing_address[barangay]"]')
		        .attr('data-builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-vehicle-value'))
		        .data('builder-default-value', jQuery('[name="mailing_address[barangay]"]').data('location-vehicle-value'));
		    autoFillLocation(
		    {
		        'location': 'province',
		        'apl' : '.personalInfo'
		    });
    });

    autoFillLocationItp(
            {
                'apl' : '.motor',
                'location': 'province',
                'municipality' : 'municipality',
                'brgy' : 'brgy',
            });
});
