/**
 * --------------------------------------------------------------------------
 * Start Global Functions
 * --------------------------------------------------------------------------
 */

// check if the device is mobile
function checkIsMobile()
{
	var isMobile = false; //initiate as false
	// device detection
	if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) isMobile = true;
	return isMobile;
}

// check if the browser is IE
function detectIE()
{
	var ua = window.navigator.userAgent;

	var msie = ua.indexOf('MSIE ');
	var trident = ua.indexOf('Trident/');
	var edge = ua.indexOf('Edge/');

	if (msie > 0 || trident > 0)
	{
		// IE 10 or older => return version number
		jQuery('head').append('<link rel="stylesheet" type="text/css" href="/skin/frontend/cocolife/default/css/ie_ovr_style.css" media="all">');
	}
	else if (edge > 0)
	{
		jQuery('head').append('<link rel="stylesheet" type="text/css" href="/skin/frontend/cocolife/default/css/ie_ovr_style.css" media="all">');
	}

}

function getParameterByName(name, url)
{
	if (!url)
	{
		url = window.location.href;
	}
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function getWindowHeight()
{
	return (window.innerHeight ? window.innerHeight : jQuery(window).height());
}

function getWindowWidth()
{
	return (window.innerWidth ? window.innerWidth : jQuery(window).width());
}

function recalibrateHashes()
{
	var url_hases = window.location.hash;
	url_hases = window.location.hash.split('#');
	jQuery.each(url_hases, function(index, item)
	{
		if (item != "")
		{
			if (jQuery('[href="#' + item + '"]').length)
			{
				setTimeout(function()
				{
					jQuery('[href="#' + item + '"]').trigger('click');
				}, 500); // delay 500 ms
			}
		}
	});
}

function removeURLParameter(url, parameter)
{
	//prefer to use l.search if you have a location/link object
	var urlparts = url.split('?');
	if (urlparts.length >= 2)
	{

		var prefix = encodeURIComponent(parameter) + '=';
		var pars = urlparts[1].split(/[&;]/g);

		//reverse iteration as may be destructive
		for (var i = pars.length; i-- > 0;)
		{
			//idiom for string.startsWith
			if (pars[i].lastIndexOf(prefix, 0) !== -1)
			{
				pars.splice(i, 1);
			}
		}

		url = urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : "");
		return url;
	}
	else
	{
		return url;
	}
}

/**
 * --------------------------------------------------------------------------
 * BIND FOR PURE NUMBER ONLY TEXTS VALIDATION
 * also compatible with crossbrowsers
 * --------------------------------------------------------------------------
 */
function validate_number_only()
{
	jQuery('input.validate-number-only').keydown(function(e)
	{
		// Allow: backspace, delete, tab, escape, enter and .
		// if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
			// Allow: Ctrl+A, Command+A
			(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
			// Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40))
		{
			// let it happen, don't do anything
			return;
		}

		// get all exeptions
		var exceptions = jQuery(this).data('validate-number-only-except').split(',');

		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105))
		{
			e.preventDefault();
		}
		if (jQuery.inArray(e.key, exceptions) !== -1)
		{
			e.preventDefault();
		}

	});
}

/**
 * --------------------------------------------------------------------------
 * BIND FOR CUSTOMS VARIEN VALIDATIONS
 * --------------------------------------------------------------------------
 */
function varien_add_custom_validations()
{
	var add_validators_execute = setInterval(function()
	{

		//lazy workaround for require-config
		if (typeof Validation === "function")
		{
			Validation.add('validate-custom-telephone', 'Please enter any valid contact number', function(value)
			{
				var pattern = /^\+?\d+$/;
				return pattern.test(value);
			});

			clearInterval(add_validators_execute);
			// console.log('added custom validations on jquery.validate');
		}
		else
		{
			console.log('waiting for jquery.validate');
		}
	}, 200);
}

/**
 * --------------------------------------------------------------------------
 * Bootstrap thumbnail image heigth equality
 * --------------------------------------------------------------------------
 */
function equalHeight(group, height)
{
	var tallest = 0;
	group.each(function()
	{
		var thisHeight = jQuery(this).height();
		if (thisHeight > tallest)
		{
			tallest = thisHeight;
		}
	});

	if (typeof height != "undefined")
	{
		tallest = height;
	}

	group.each(function()
	{
		jQuery(this).height(tallest);
	});
}

function getTallest() {
	var tallest = 0;
	var curHeight = 0;

}

/**
 * --------------------------------------------------------------------------
 * PRODUCT HEIGHT
 * --------------------------------------------------------------------------
 */

function detailWrapper()
{
	var length = jQuery('.category-products.like-category-grid-block .products-grid .details-area').length;
	var row = 0;

	for (c1 = 0; c1 < length; c1 += 3)
	{
		var max = 0;
		var shortMax = 0;

		for (c2 = c1; c2 < c1 + 3; c2++)
		{
			if (c2 >= length)
			{
				break;
			}
			else
			{
				var productH = jQuery('.product-name').eq(c2).height();
				if (max < productH)
				{
					max = productH;
				}

				var shortH = jQuery('.short-description-wrapper').eq(c2).height();
				if (shortMax < shortH)
				{
					shortMax = shortH;
				}

				var padding = 25;
				var finalHeight = max + shortMax + padding * 3;

				for (c3 = c1; c3 < c1 + 3; c3++)
				{
					jQuery('.category-products.like-category-grid-block .products-grid .details-area').eq(c3).height(finalHeight);
				}
			}
		}
	}

}

function resizeDetailWrapper()
{
	var windowWidth = jQuery(window).width() + 6;

	if (windowWidth >= 992)
	{
		threeColumn();
	}
	else if (windowWidth <= 991)
	{
		twoColumn();
	}
}

function fourColumn()
{
	var length = jQuery('.details-area').length;
	var row = 0;

	for (c1 = 0; c1 < length; c1 += 4)
	{
		var max = 0;
		var shortMax = 0;

		for (c2 = c1; c2 < c1 + 4; c2++)
		{
			if (c2 >= length)
			{
				break;
			}
			else
			{
				var productH = jQuery('.product-name').eq(c2).height();
				if (max < productH)
				{
					max = productH;
				}

				var shortH = jQuery('.short-description-wrapper').eq(c2).height();
				if (shortMax < shortH)
				{
					shortMax = shortH;
				}

				var padding = 25;
				var finalHeight = max + shortMax + padding * 3;

				for (c3 = c1; c3 < c1 + 4; c3++)
				{
					jQuery('.category-products.like-category-grid-block .products-grid .details-area').eq(c3).height(finalHeight);
				}
			}
		}
	}
}

function threeColumn()
{
	var length = jQuery('.details-area').length;
	var row = 0;

	for (c1 = 0; c1 < length; c1 += 3)
	{
		var max = 0;
		var shortMax = 0;

		for (c2 = c1; c2 < c1 + 3; c2++)
		{
			if (c2 >= length)
			{
				break;
			}
			else
			{
				var productH = jQuery('.product-name').eq(c2).height();
				if (max < productH)
				{
					max = productH;
				}

				var shortH = jQuery('.short-description-wrapper').eq(c2).height();
				if (shortMax < shortH)
				{
					shortMax = shortH;
				}

				var padding = 25;
				var finalHeight = max + shortMax + padding * 3;

				for (c3 = c1; c3 < c1 + 3; c3++)
				{
					jQuery('.category-products.like-category-grid-block .products-grid .details-area').eq(c3).height(finalHeight);
				}
			}
		}
	}
}

function twoColumn()
{
	var length = jQuery('.details-area').length;
	var row = 0;

	for (c1 = 0; c1 < length; c1 += 2)
	{
		var max = 0;
		var shortMax = 0;

		for (c2 = c1; c2 < c1 + 2; c2++)
		{
			if (c2 >= length)
			{
				break;
			}
			else
			{
				var productH = jQuery('.product-name').eq(c2).height();
				if (max < productH)
				{
					max = productH;
				}

				var shortH = jQuery('.short-description-wrapper').eq(c2).height();
				if (shortMax < shortH)
				{
					shortMax = shortH;
				}

				var padding = 25;
				var finalHeight = max + shortMax + padding * 3;

				for (c3 = c1; c3 < c1 + 2; c3++)
				{
					jQuery('.category-products.like-category-grid-block .products-grid .details-area').eq(c3).height(finalHeight);
				}
			}
		}
	}
}

/**
 * --------------------------------------------------------------------------
 * Convert image http url into string base 64
 * @param image_url http url of the image
 * @param callback , needs to be a function callback with canvas as arguments passed
 * --------------------------------------------------------------------------
 */
function imageUrlToBase(image_url, callback)
{
	var canvas = document.createElement("canvas"),
		context = canvas.getContext('2d');

	if(typeof image_url == "undefined")
	{
		if(typeof callback == "function")
		{
			callback("");
		}
		else
		{
			return "";
		}
	}

	base_image = new Image(60, 45);
	base_image.src = image_url;
	base_image.onload = function()
	{
		// use the intrinsic size of image in CSS pixels for the canvas element
		  canvas.width = this.naturalWidth;
		  canvas.height = this.naturalHeight;

		  // will draw the image as 300x227 ignoring the custom size of 60x45 given in the constructor
		  context.drawImage(this, 0, 0);

		  // To use the custom size we'll have to specify the scale parameters using the element's width and height properties - lets draw one on top in the corner:
		  // context.drawImage(this, 0, 0, this.width, this.height);

			if(typeof callback == "function")
			{
			  callback(canvas);
			}
			else
			{
				return canvas.toDataURL();
			}
	}
}


/**
 * --------------------------------------------------------------------------
 * Jquery Plugin dotdot to truncate html content
 * --------------------------------------------------------------------------
 */
var Ellipsis = {

	target_element:
	{},
	options:
	{
		/*  The text to add as ellipsis. */
		ellipsis: '... ',

		/*  How to cut off the text/html: 'word'/'letter'/'children' */
		wrap: 'word',

		/*  Wrap-option fallback to 'letter' for long words */
		fallbackToLetter: true,

		/*  jQuery-selector for the element to keep and put after the ellipsis. */
		after: null,

		/*  Whether to update the ellipsis: true/'window' */
		watch: "window",

		/*  Optionally set a max-height, can be a number or function.
			If null, the height will be measured. */
		height: 50,

		/*  Deviation for the height-option. */
		tolerance: 0,
	},
	setTarget: function(target_element)
	{
		this.target_element = target_element;
	},
	truncate: function()
	{
		if (!this.target_element instanceof jQuery)
		{
			console.log("Target element is not an instance of Jquery.");
			return false;
		}

		this.target_element.dotdotdot(
		{
			/*  The text to add as ellipsis. */
			ellipsis: Ellipsis.options.ellipsis,

			/*  How to cut off the text/html: 'word'/'letter'/'children' */
			wrap: Ellipsis.options.wrap,

			/*  Wrap-option fallback to 'letter' for long words */
			fallbackToLetter: Ellipsis.options.fallbackToLetter,

			/*  jQuery-selector for the element to keep and put after the ellipsis. */
			after: Ellipsis.options.after,

			/*  Whether to update the ellipsis: true/'window' */
			watch: Ellipsis.options.watch,

			/*  Optionally set a max-height, can be a number or function.
				If null, the height will be measured. */
			height: Ellipsis.options.height,

			/*  Deviation for the height-option. */
			tolerance: Ellipsis.options.tolerance,

			/*  Callback function that is fired after the ellipsis is added,
				receives two parameters: isTruncated(boolean), orgContent(string). */
			callback: function(isTruncated, orgContent) {},

			lastCharacter:
			{

				/*  Remove these characters from the end of the truncated text. */
				remove: [' ', ',', ';', '.', '!', '?'],

				/*  Don't add an ellipsis if this array contains
					the last character of the truncated text. */
				noEllipsis: []
			}
		});
	}
}

/**
 * --------------------------------------------------------------------------
 * Waiter for image to load
 * --------------------------------------------------------------------------
 */
var Loader = {
	options:
	{
		_outInstance:
		{},
		_inInstance:
		{},
		overlay:
		{},
		progstat:
		{},
		_callback:
		{},
		_c: 0,
		_tot: 0
	},
	init: function()
	{
		this.overlay = document.createElement("DIV");
		this.progstat = document.createElement("DIV");
		this.overlay.setAttribute("id", "overlay");
		this.progstat.setAttribute("id", "progstat");
	},
	run: function()
	{
		jQuery('body').append(this.overlay);
		jQuery('body').append(this.progstat);

		//for dev test only progress image loader
		jQuery(this.overlay).hide();
		jQuery(this.progstat).hide();

		Loader.options._c = 0;

		var _img = this.options._inInstance.find('img');
		Loader.options._tot = _img.length;

		if (Loader.options._tot == 0) return Loader.doneLoading();

		for (var _i = 0; _i < Loader.options._tot; _i++)
		{
			var _tImg = new Image();
			_tImg.onload = this.imgLoaded;
			_tImg.onerror = this.imgLoaded;
			_tImg.src = _img.get(_i).src;
		}
	},
	imgLoaded: function()
	{
		Loader.options._c += 1;
		var _perc = ((100 / Loader.options._tot * Loader.options._c) << 0) + "%";
		//prog.style.width = _perc;
		jQuery(Loader.progstat).html(_perc);

		if (Loader.options._c === Loader.options._tot) return Loader.doneLoading();
	},
	doneLoading: function()
	{
		jQuery(Loader.overlay).addClass('finished');

		if (typeof this.options._callback === "function")
		{
			if (Object.size(this.options._callback_options))
			{
				this.options._callback(this.options._callback_options);
			}
			else
			{
				this.options._callback();
			}
		}
	},
	setCallback: function(callback, options)
	{
		this.options._callback = callback;
		this.options._callback_options = options;
	}
}

jQuery.fn.onImagesComplete = function(callback)
{
	Loader.options._outInstance = this;
	Loader.options._inInstance = jQuery(Loader.options._outInstance.selector);

	if (!Loader.options._inInstance.length)
	{
		console.log('Loader warning: target element is missing');
		return false;
	}

	Loader.init();

	if (typeof callback === "function")
	{
		Loader.setCallback(callback, Loader.options._inInstance);
	}

	Loader.run();

	return Loader.options._inInstance;
};

jQuery.fn.clearForm = function()
{
	jQuery(this).wrap('<form id="clearForm"></form>');
	var _fl = jQuery(this).closest('form#clearForm');
	_fl.append('<input type="reset" id="clearFormReset" style="display:none;" />');
	_fl.find('#clearFormReset[type="reset"]').trigger('click');
	_fl.find('#clearFormReset[type="reset"]').remove();
	this.unwrap();
	return this;
};

jQuery.fn.customClearForm = function()
{
	jQuery(this).wrap('<form id="custom"></form>');

	var _fl = jQuery(this).closest('form#custom');

	jQuery(_fl).find('select option:selected').removeAttr('selected');
	jQuery(_fl).find('input[type=checkbox]').attr('checked', false);
	jQuery(_fl).find('input[type=radio]').attr('checked', false);
	jQuery(_fl).find('input[type=text]').val('');

	jQuery(_fl).find('select').trigger('change');
	reValidate(jQuery(_fl).find('input'));

	this.unwrap();
	return this;
};

jQuery.fn.bootstrapValidateToggleAllExclude = function(_toggle_boolean)
{
	if(typeof _toggle_boolean == "undefined")
	{
		_toggle_boolean = false;
	}

	jQuery(this).find('[data-bv-excluded]').attr('data-bv-excluded' , _toggle_boolean);
	jQuery(this).find('[data-bv-excluded]').data('bv-excluded' , _toggle_boolean);

	return this;
};

var Sizer = {
	options:
	{
		_element: null,
		_attributeName: null
	},
	setElement: function(_element)
	{
		this.options._element = _element;
		return this;
	},
	setAttributeName: function(_attributeName)
	{
		this.options._attributeName = _attributeName;
		return this;
	},
	getMaxAttribute: function(_element, _attributeName)
	{
		if (typeof _element == "undefined")
		{
			console.log('Sizer: Invalid Element!');
			return false;
		}

		if (typeof _attributeName != "undefined")
		{
			this.setAttributeName(_attributeName);
		}

		if (typeof this.options._attributeName == "undefined")
		{
			console.log('Sizer: Invalid Element Attribute Name!');
			return false;
		}

		this.setElement(_element);

		// Get an array of all element attributes
		var elementAttribute = jQuery(this.options._element).map(function()
		{
			return parseInt(jQuery(this).css(Sizer.options._attributeName))
		}).get();

		// Math.max takes a variable number of arguments
		// `apply` is equivalent to passing each attribute as an argument
		var maxAttribute = Math.max.apply(null, elementAttribute);
		return maxAttribute;
	}
};


var DateModifier = {
	fieldset_group : 0
	,current_fieldset_group_set : 0
	,options : {
		plus_days : 0
		,plus_months : 0
		,plus_years : 0
		,default_days : 0
		,default_months : 0
		,default_years : 0
	}
	,initPluses: function(_plus_days, _plus_months, _plus_years) {

		if(typeof _plus_days == "undefined")
		{
			_plus_days = this.options.default_days;
		}
		if(typeof _plus_months == "undefined")
		{
			_plus_months = this.options.default_months;
		}
		if(typeof _plus_years == "undefined")
		{
			_plus_years = this.options.default_years;
		}

		/**
		* Initialize attributes
		*/
		this.options.plus_days = _plus_days;
		this.options.plus_months = _plus_months;
		this.options.plus_years = _plus_years;

		return this;
	}
	,createDate : function(_target) {
		/**
		* Contrcut Date() ISO =
		*/
		if(typeof _target != "undefined" && _target instanceof jQuery)
		{
			var newDate = new Date(jQuery(_target).datepicker('getDate'))
		}
		else
		{
			var newDate = new Date();
		}

		// day
		newDate.setDate(newDate.getDate() + this.options.plus_days);
		// month
		newDate.setMonth(newDate.getMonth() + this.options.plus_months);
		// year
		newDate.setYear(newDate.getFullYear() + this.options.plus_years);

		return newDate;
	}
	,getEndDate: function(ako)
	{
		/**
		* Return relevant sibling (end date)
		*/
		return jQuery(ako).closest('.fieldset-group-set').find('.calendar_input[data-date-range="true"][data-date-range-line="end"]');
	}
	,getStartDate: function(ako)
	{
		/**
		* Return relevant sibling (end date)
		*/
		return jQuery(ako).closest('.fieldset-group-set').find('.calendar_input[data-date-range="true"][data-date-range-line="start"]');
	}
	,getGroupParent: function(ako)
	{
		this.fieldset_group = jQuery(ako).closest('.fieldset-group-set');
		return this.fieldset_group;
	}
	,getGroupSetParent: function(ako)
	{
		this.current_fieldset_group_set = jQuery(ako).closest('.fieldset-group-set');
		return this.current_fieldset_group_set;
	}
	,adjustDate: function(ako, val, _format)
	{
		if (ako.length)
		{
			if(typeof _format != "undefined")
			{
				_date_str = moment(val).format('M-D-Y');
			}

			_date_str = moment(val).format(_format);

			jQuery(ako).val(_date_str);
		}
		return this;
	}
	,adjustDateOption: function(ako, attribute, val)
	{
		if (ako.length)
		{
			jQuery(ako).datepicker("option", attribute, val);
		}
		return this;
	}
	,adJustEndDate: function(ako)
	{
		/**
		* Adjust only end date (sibling) via change
		*/
		var _to = this.getEndDate(ako);
		
		var newDate = this.createDate(jQuery(ako));

		if (_to.length)
		{
			this.adjustDate(_to, newDate , 'Y-M-D');
		}
		return this;
	}
	,reValidate: function(ako)
	{
		reValidate(jQuery(ako));
		return this;
	}
	,calibrateAllDateRange: function(_group)
	{
		/**
		* Foreach of data-field-group => fieldset-group=-set | (start) date
		*/

		return this;
	}
	,resetNumberOfDays : function(_sets)
	{
		jQuery(_sets).each(function(){
			jQuery(this).attr('data-no-of-days', 0)
			jQuery(this).data('no-of-days', 0);
		});
		return this;
	}
	,getDaysDiff: function(_target1, _target2 ) {
		var date1 = new Date(jQuery(_target1).datepicker('getDate'));
		var date2 = new Date(jQuery(_target2).datepicker('getDate'));
		var timeDiff = Math.abs(date2.getTime() - date1.getTime());
		var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
		return diffDays;
	}
};

Object.size = function(obj)
{
	var size = 0,
		key;
	for (key in obj)
	{
		if (obj.hasOwnProperty(key)) size++;
	}
	return size;
};

String.prototype.replaceAll = function(search, replacement) {
	var target = this;
	return target.split(search).join(replacement);
};

/*\
|*|
|*|  :: MiniDaemon ::
|*|
|*|  Revision #2 - September 26, 2014
|*|
|*|  https://developer.mozilla.org/en-US/docs/Web/API/window.setInterval
|*|  https://developer.mozilla.org/User:fusionchess
|*|  https://github.com/madmurphy/minidaemon.js
|*|
|*|  This framework is released under the GNU Lesser General Public License, version 3 or later.
|*|  http://www.gnu.org/licenses/lgpl-3.0.html
|*|
\*/
 
function MiniDaemon (oOwner, fTask, nRate, nLen) {
  if (!(this && this instanceof MiniDaemon)) { return; }
  if (arguments.length < 2) { throw new TypeError('MiniDaemon - not enough arguments'); }
  if (oOwner) { this.owner = oOwner; }
  this.task = fTask;
  if (isFinite(nRate) && nRate > 0) { this.rate = Math.floor(nRate); }
  if (nLen > 0) { this.length = Math.floor(nLen); }
}
 
MiniDaemon.prototype.owner = null;
MiniDaemon.prototype.task = null;
MiniDaemon.prototype.rate = 100;
MiniDaemon.prototype.length = Infinity;
 
  /* These properties should be read-only */
 
MiniDaemon.prototype.SESSION = -1;
MiniDaemon.prototype.INDEX = 0;
MiniDaemon.prototype.PAUSED = true;
MiniDaemon.prototype.BACKW = true;
 
  /* Global methods */
 
MiniDaemon.forceCall = function (oDmn) {
  oDmn.INDEX += oDmn.BACKW ? -1 : 1;
  if (oDmn.task.call(oDmn.owner, oDmn.INDEX, oDmn.length, oDmn.BACKW, oDmn) === false || oDmn.isAtEnd()) { oDmn.pause(); return false; }
  return true;
};
 
  /* Instances methods */
 
MiniDaemon.prototype.isAtEnd = function () {
  return this.BACKW ? isFinite(this.length) && this.INDEX < 1 : this.INDEX + 1 > this.length;
};
 
MiniDaemon.prototype.synchronize = function () {
  if (this.PAUSED) { return; }
  clearInterval(this.SESSION);
  this.SESSION = setInterval(MiniDaemon.forceCall, this.rate, this);
};
 
MiniDaemon.prototype.pause = function () {
  clearInterval(this.SESSION);
  this.PAUSED = true;
};
 
MiniDaemon.prototype.start = function (bReverse) {
  var bBackw = Boolean(bReverse);
  if (this.BACKW === bBackw && (this.isAtEnd() || !this.PAUSED)) { return; }
  this.BACKW = bBackw;
  this.PAUSED = false;
  this.synchronize();
};
