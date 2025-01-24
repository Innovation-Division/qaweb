jQuery(document).ready(function(){

	/**
	* --------------------------------------------------------------------------
	* INSTANTIATE MY ACCOUNT DATE PICKER
	* --------------------------------------------------------------------------
	*/
	jQuery('#birthdate').datepicker(
	{
		showOn: 'focus',
		dateFormat: 'yy-mm-dd',
		showClose: true,
		showButtonPanel: true,
		closeText: "OK",
		changeMonth: true,
		changeYear: true,
		maxDate: '-18y',
		beforeShow: function()
		{
			setTimeout(function()
			{
				jQuery('.ui-datepicker').css('z-index', 2000);
			}, 0);
		}
	});

	if (jQuery('#birthdate_hidden').val() != '') {
		jQuery('#birthdate').datepicker('setDate', new Date(jQuery('#birthdate_hidden').val()));
	}
});
