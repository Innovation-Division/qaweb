jQuery(function () {
	var $ = jQuery,
		$window = jQuery(window),
		$document = jQuery(document),
		docHeight = $document.innerHeight(),
		winWidth = $window.innerWidth(),
		winHeight = $window.innerHeight(),
		$header = jQuery('.header-content'),
		hh = $header.innerHeight(),
		scrolled = jQuery(window).scrollTop(),
		win_height_padded = $window.height() * 1.1,
		prodPage = $("body").hasClass("category-products"),
		fixed_bot_h = $(".fixed-bottom").outerHeight(true);

	/**
	* --------------------------------------------------------------------------
	* AUTOHEIGHT JQUERY PLUGIN
	* --------------------------------------------------------------------------
	*/
	!function (t) { "use strict"; "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery) }(function (t) { var e = -1, o = -1, a = function (t) { return parseFloat(t) || 0 }, n = function (e) { var o = 1, n = t(e), i = null, r = []; return n.each(function () { var e = t(this), n = e.offset().top - a(e.css("margin-top")), s = r.length > 0 ? r[r.length - 1] : null; null === s ? r.push(e) : Math.floor(Math.abs(i - n)) <= o ? r[r.length - 1] = s.add(e) : r.push(e), i = n }), r }, i = function (e) { var o = { byRow: !0, property: "height", target: null, remove: !1 }; return "object" == typeof e ? t.extend(o, e) : ("boolean" == typeof e ? o.byRow = e : "remove" === e && (o.remove = !0), o) }, r = t.fn.matchHeight = function (e) { var o = i(e); if (o.remove) { var a = this; return this.css(o.property, ""), t.each(r._groups, function (t, e) { e.elements = e.elements.not(a) }), this } return this.length <= 1 && !o.target ? this : (r._groups.push({ elements: this, options: o }), r._apply(this, o), this) }; r.version = "master", r._groups = [], r._throttle = 80, r._maintainScroll = !1, r._beforeUpdate = null, r._afterUpdate = null, r._rows = n, r._parse = a, r._parseOptions = i, r._apply = function (e, o) { var s = i(o), h = t(e), l = [h], c = t(window).scrollTop(), p = t("html").outerHeight(!0), u = h.parents().filter(":hidden"); return u.each(function () { var e = t(this); e.data("style-cache", e.attr("style")) }), u.css("display", "block"), s.byRow && !s.target && (h.each(function () { var e = t(this), o = e.css("display"); "inline-block" !== o && "flex" !== o && "inline-flex" !== o && (o = "block"), e.data("style-cache", e.attr("style")), e.css({ display: o, "padding-top": "0", "padding-bottom": "0", "margin-top": "0", "margin-bottom": "0", "border-top-width": "0", "border-bottom-width": "0", height: "100px", overflow: "hidden" }) }), l = n(h), h.each(function () { var e = t(this); e.attr("style", e.data("style-cache") || "") })), t.each(l, function (e, o) { var n = t(o), i = 0; if (s.target) i = s.target.outerHeight(!1); else { if (s.byRow && n.length <= 1) return void n.css(s.property, ""); n.each(function () { var e = t(this), o = e.attr("style"), a = e.css("display"); "inline-block" !== a && "flex" !== a && "inline-flex" !== a && (a = "block"); var n = { display: a }; n[s.property] = "", e.css(n), e.outerHeight(!1) > i && (i = e.outerHeight(!1)), o ? e.attr("style", o) : e.css("display", "") }) } n.each(function () { var e = t(this), o = 0; s.target && e.is(s.target) || ("border-box" !== e.css("box-sizing") && (o += a(e.css("border-top-width")) + a(e.css("border-bottom-width")), o += a(e.css("padding-top")) + a(e.css("padding-bottom"))), e.css(s.property, i - o + "px")) }) }), u.each(function () { var e = t(this); e.attr("style", e.data("style-cache") || null) }), r._maintainScroll && t(window).scrollTop(c / p * t("html").outerHeight(!0)), this }, r._applyDataApi = function () { var e = {}; t("[data-match-height], [data-mh]").each(function () { var o = t(this), a = o.attr("data-mh") || o.attr("data-match-height"); a in e ? e[a] = e[a].add(o) : e[a] = o }), t.each(e, function () { this.matchHeight(!0) }) }; var s = function (e) { r._beforeUpdate && r._beforeUpdate(e, r._groups), t.each(r._groups, function () { r._apply(this.elements, this.options) }), r._afterUpdate && r._afterUpdate(e, r._groups) }; r._update = function (a, n) { if (n && "resize" === n.type) { var i = t(window).width(); if (i === e) return; e = i } a ? -1 === o && (o = setTimeout(function () { s(n), o = -1 }, r._throttle)) : s(n) }, t(r._applyDataApi); var h = t.fn.on ? "on" : "bind"; t(window)[h]("load", function (t) { r._update(!1, t) }), t(window)[h]("resize orientationchange", function (t) { r._update(!0, t) }) });

	/**
	* --------------------------------------------------------------------------
	* EVENTS (you can add codes here but never delete)
	* --------------------------------------------------------------------------
	*/

	// TOOLTIP
	jQuery('span.tooltip-icon').on('mouseenter', function () {
		jQuery(this).next().css('visibility', 'visible');
	});

	jQuery('span.tooltip-icon').on('mouseout', function () {
		jQuery(this).next().css('visibility', 'hidden');
	});

	$window.on('resize', function () {
		updateOnResize();
	});

	$window.on('scroll', function (event) {
		var scrolled = $window.scrollTop();
		didScroll = true;
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	});
	//for about us our milestone page only
	$window.on("scroll", revealOnScroll);

	$window.on('load', function () {
		// preloader
		$("body").addClass('loading');
		$(".preloader").addClass("up")
		setTimeout(function () {
			$('body').removeClass('loading');
		}, 500);
	});

	$('.btn-modal').click(function () {
		$('#modal-get-help').fadeIn(50);
		$('body').removeClass('mobile-nav-shown');
		$('body').addClass('modal-open');
	});

	$('.select-ul').click(function () {
		$('ul.ul-toggle').toggle();
	});

	$('.ul-toggle li').click(function () {
		$('.span-text').text($(this).text());
	});

	$('button.close, .hide-modal, .btn-no').click(function () {
		$('#modal-get-help').fadeOut(50);
		$('body').removeClass('modal-open');
	});

	/**
	* --------------------------------------------------------------------------
	* PUSH NAVBAR BELOW HEADER ON MOBILE VIEW
	* --------------------------------------------------------------------------
	*/
	$('header .nav-wrap').css('top', $('header').outerHeight());

	/**
	* --------------------------------------------------------------------------
	* REDIRECT FOR LET US HELP YOU -- MODAL
	* --------------------------------------------------------------------------
	*/
	$('#let-us-help-you button[name="btn-let-us-help-you"]').click(function () {
		switch ($('select[name="let-us-help-you"] option:selected').val().toLowerCase()) {
			case 'home':
				window.location.href = "/protection-for-my-home/";
				break;
			case 'vehicle':
				window.location.href = "/protection-for-my-vehicle/";
				break;
			case 'business':
				window.location.href = "/protection-for-my-business/";
				break;
			case 'loved ones':
				window.location.href = "/protection-for-my-loved-ones/";
				break;
			case 'self':
				window.location.href = "/protection-for-my-self/";
				break;
		}
	});

	/**
	* --------------------------------------------------------------------------
	* CHANGE URL OF HOME BUTTON
	* --------------------------------------------------------------------------
	*/
	$(".header a.logo").click(function () {
		$('a.logo').attr("href", "https://www.ucpbgen.com/");
	});

	/**
	* --------------------------------------------------------------------------
	* ADD TARGET _blank FOR QUICK VIEW INQUIRY LINKS
	* --------------------------------------------------------------------------
	*/
	$('body.page-quickview a.produt_click_here').click(function () {
		$('a.produt_click_here').attr('target', '_blank');
	});

	/**
	* --------------------------------------------------------------------------
	* MY ACCOUNT CHANGE PHOTO
	* --------------------------------------------------------------------------
	*/
	$('a#change-photo').click(function () {
		$('#account-upload').trigger('click');
	});

	$('#account-upload').change(function () {
		accountImageUpload(this);
	});

	function accountImageUpload(image) {
		var accountUploadReader = new FileReader();

		accountUploadReader.onload = function (e) {
			$('.block-image-wrap span.image-wrap img').attr('src', e.target.result);
			$('form#avatar-img').submit();
		}

		accountUploadReader.readAsDataURL(image.files[0]);
	}

	var updateOnResize = debounce(function () {
		updateValueOnResize();
		updateStyleOnResize();
	}, 250);

	function updateValueOnResize() {
		winWidth = $window.innerWidth();
		winHeight = $window.innerHeight();
		hh = $header.innerHeight();
		fixed_bot_h = $(".fixed-bottom").outerHeight(true);
		autoHeightUpload();
		autoHeightCatalogDetails();
		autoHeightDownloadableForm();
		updateItpTab();
		updateFireTab();
		responsiveLogout();
		paddingTop();
		checkPageCms();
		hideChat();
		mobileMenu();
	}

	function updateStyleOnResize() {
		$('header .nav-wrap').css('top', $('header').outerHeight());
	}

	function debounce(func, wait, immediate) {
		var timeout;
		return function () {
			var context = this, args = arguments;
			var later = function () {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	/**
	* --------------------------------------------------------------------------
	* HIDE HEADER ON ON SCROLL DOWN
	* --------------------------------------------------------------------------
	*/
	var didScroll;
	var lastScrollTop = 0;
	var delta = 0;

	function hasScrolled() {
		var st = $(this).scrollTop();
		if (Math.abs(lastScrollTop - st) <= delta) {
			return;
		}
		if (st > lastScrollTop && st > hh) {
			$('.header-content').css('top', '-' + hh + 'px');
		} else {
			// if(st + winHeight < docHeight) {
			$('.header-content').css('top', 0);
			// }
		}
		lastScrollTop = st;
	}
	/**
	* --------------------------------------------------------------------------
	* BACK TO TOP
	* --------------------------------------------------------------------------
	*/
	$('.footer-to-top').click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
	});

	/**
	* --------------------------------------------------------------------------
	* TWITTER FEED (RESTRUCTURE TIMEPOSTED TO USER)
	* --------------------------------------------------------------------------
	*/
	// var iframeFB = $('.tab-pane#facebook iframe'),
	// 	iframeFB_contents = iframeFB.contents()
	// 	iframeFB_body = iframeFB_contents.find('body'),
	// 	iframeFB_contents.find('head').append('<style>._2p3a {width:100% !important;}</style>').children('style');

	/**
	* --------------------------------------------------------------------------
	* ADD PADDING TOP ON ALL PAGE EXCEPT FOR HOME PAGE
	* --------------------------------------------------------------------------
	*/
	if (!$('body').hasClass('cms-index-index')) {
		$('.page').css('padding-top', $('.page .header-content').outerHeight());
	}

	/**
	* --------------------------------------------------------------------------
	* SUMMARY AND CONFIRMATION CHECKBOX TICKED FOR TERMS AND CONDITIONS
	* --------------------------------------------------------------------------
	*/
	$('#termsCondition').change(function () {
		if (this.checked) {
			$("#termsConditions").modal({ show: true });
		}
	});

	/**
	* --------------------------------------------------------------------------
	* CHECKBOX FOR EXCLUSION AND LIMITATIONS
	* --------------------------------------------------------------------------
	*/
	$('#exclusionslimitation').change(function () {
		if (this.checked) {
			$("#exclusionslimitations").modal({ show: true });
		}
	});

	/**
	* --------------------------------------------------------------------------
	* ALIGNMENT FOR CHROME OF 2 BUTTONS IN PDP PAGE
	* --------------------------------------------------------------------------
	*/
	if (navigator.appVersion.indexOf("Chrome/") != -1) {
		$(".product-essential .add-to-box .add-to-cart button.btn-cart").css({
			'height': '40px',
			'line-height': '1.6',
			'max-height': '40px'
		});
	}
	if (navigator.userAgent.toLowerCase().indexOf('firefox') != -1) {
		$(".product-essential .add-to-box .add-to-cart button.btn-cart").css({
			'height': '41px',
			'line-height': '1.8',
			'max-height': '41px'
		});
	}
	/**
	* --------------------------------------------------------------------------
	* SCROLL ON VEHICLE INFO ON ADDING ACCESSORIES
	* --------------------------------------------------------------------------
	*/
	$('.fieldset-group[data-fieldset-row="accessories_other_standard"] .form-group.fieldset-group-set .actions .btn-add').live('click', function () {
		var accessory_click = setTimeout(accessory, 100);

		function accessory() {
			jQuery('.mega-form-builds div[data-slide] div[data-fieldset-row="accessories_other_standard"] div .fieldset-group').scrollTop(jQuery(this).height());
			clearTimeout(accessory_click);
		}
	});

	/**
	* --------------------------------------------------------------------------
	* AUTOEHIGHT UPLOAD SECTION ON ADDITIONAL INFO
	* --------------------------------------------------------------------------
	*/
	function autoHeightUpload() {
		var checkAdntlPage = $("body").hasClass("customquote-additional-index");
		if (checkAdntlPage) {
			$('div[data-fieldset-group="upload_orcr"] .fieldset-group-set .uploader #file-drag').matchHeight({
				byRow: false
			});
		}
	};
	$('div[data-fieldset-group="upload_orcr"]').live('change', '.btn-delete', function () {
		$('div[data-fieldset-group="upload_orcr"] .fieldset-group-set .uploader #file-drag')
			.css('height', 'auto')
			.matchHeight({
				byRow: false
			});
	});

	/**
	* --------------------------------------------------------------------------
	* AUTO-HEIGHT OF PRODUCT LISTING DETAILS
	* --------------------------------------------------------------------------
	*/
	function autoHeightCatalogDetails() {
		var checkCatalogPage = $("body").hasClass("catalog-category-view"),
			checkProductPage = $("body").hasClass("catalog-product-view");
		if (checkCatalogPage || checkProductPage) {
			$(".category-products.like-category-grid-block .products-grid .details-area").matchHeight({
				byRow: false
			});
			if (winWidth > 991) {
				$(".category-products.like-category-grid-block .products-grid li.item .item-area .product-image-area .product-image, .product-wrapper .row-wrapper .item-area .product-image .product-image").matchHeight({
					byRow: false
				});
			} else {
				$(".category-products.like-category-grid-block .products-grid li.item .item-area .product-image-area .product-image, .product-wrapper .row-wrapper .item-area .product-image .product-image").matchHeight({
					byRow: true
				});
			}
		}
	}
	/**
	* --------------------------------------------------------------------------
	* AUTO-HEIGHT DOWNLOADABLE FORMS
	* --------------------------------------------------------------------------
	*/
	function autoHeightDownloadableForm() {
		var checkDownloadPage = $("body").hasClass("cms-services-downloadable-forms");
		if (checkDownloadPage) {
			$(".effect-ruby img").matchHeight({
				byRow: false
			});
		}
	}
	/**
	* --------------------------------------------------------------------------
	* UPDATE ITP SLIDER TABS IF ITP
	* --------------------------------------------------------------------------
	*/
	function updateItpTab() {
		var checkItpForm = $('.no-view').children('input[value="itp"]').length,
			summaryConf = $('body').hasClass('customquote-summary-confirmation'),
			itpQuoteSummary = $('body').hasClass('customquote-summary-index'),
			itpPersonalInfo = $('body').hasClass('customquote-personal-index'),
			itpSummaryConfirmation = $('body').hasClass('checkout-onepage-index'),
			itpQuoteSummaryTitle = $('.top-container .category-name .row h1:contains(INTERNATIONAL TRAVEL PROTECT)').length;

		if (checkItpForm != 0) {
			$('.quote-process li:nth-child(2)').addClass('hidden');
		} else if ((itpQuoteSummary) && (itpQuoteSummaryTitle != 0)) {
			$('.quote-process li:nth-child(2)').addClass('hidden');
		} else if ((itpPersonalInfo) && (itpQuoteSummaryTitle != 0)) {
			$('.quote-process li:nth-child(2)').addClass('hidden');
		} else if ((itpSummaryConfirmation) && (itpQuoteSummaryTitle != 0)) {
			$('.quote-process li:nth-child(2)').addClass('hidden');
		}

		if ((summaryConf || itpSummaryConfirmation) && (itpQuoteSummaryTitle != 0) && (winWidth > 841)) {
			$('.summary-and-confirmation:last-child').css('border-bottom', 0)
		} else if (winWidth < 840) {
			$('.summary-and-confirmation:last-child').css('border-bottom', '1px solid #798087')
		}
	};
	/**
	* --------------------------------------------------------------------------
	* UPDATE FIRE SLIDER TABS IF FIRE
	* --------------------------------------------------------------------------
	*/
	function updateFireTab() {
		var checkFireForm = $('.no-view').children('input[value="fire"]').length,
			summaryConf = $('body').hasClass('customquote-summary-confirmation'),
			fireQuoteSummary = $('body').hasClass('customquote-summary-index'),
			firePersonalInfo = $('body').hasClass('customquote-personal-index'),
			fireSummaryConfirmation = $('body').hasClass('checkout-onepage-index'),
			fireQuoteSummaryTitle = $('.top-container .category-name .row h1:contains(HOME EXCEL PLUS QUOTE)').length;

		if (checkFireForm != 0) {
			jQuery('.quote-process li:nth-child(2)').addClass('hidden');
		} else if ((fireQuoteSummary) && (fireQuoteSummaryTitle != 0)) {
			jQuery('.quote-process li:nth-child(2)').addClass('hidden');
		} else if ((firePersonalInfo) && (fireQuoteSummaryTitle != 0)) {
			jQuery('.quote-process li:nth-child(2)').addClass('hidden');
		} else if ((fireSummaryConfirmation) && (fireQuoteSummaryTitle != 0)) {
			jQuery('.quote-process li:nth-child(2)').addClass('hidden');
		}
		if ((summaryConf || fireSummaryConfirmation) && (fireQuoteSummaryTitle != 0) && (winWidth > 841)) {
			$('.summary-and-confirmation:last-child').css('border-bottom', 0)
		} else if (winWidth < 840) {
			$('.summary-and-confirmation:last-child').css('border-bottom', '1px solid #798087')
		}
	};

	/**
	* --------------------------------------------------------------------------
	* LOGIN MODAL INITIATE TABS
	* --------------------------------------------------------------------------
	*/
	$('.social-media-wrapper a, #loginPage a, .block-account-nav-tabs a, .accnt-prod-tabs a, .corp-gov-tab a').on('show.bs.tab', function (trgt) {
		$(trgt.relatedTarget).show();
	});

	var checkLoginPage = $('body').hasClass('customer-account-login');
	if (checkLoginPage) {
		setTimeout(
			function () {
				$('.my-account a').removeAttr("data-target data-toggle href");
			}, 500);
	}

	/**
	* --------------------------------------------------------------------------
	* RESPONSIVE OF LOGOUT ICON IN HEADER
	* --------------------------------------------------------------------------
	*/
	function responsiveLogout() {
		var checkAccntPage = $('body').hasClass('customer-account-index');
		if (checkAccntPage && (winWidth <= 640)) {
			$(".top-links-area .links li a:contains('Log Out')").html('<i class="fa fa-fw" aria-hidden="true">&#xf08b;</i>');
		} else {
			$(".top-links-area .links li a").has("i.fa.fa-fw").html("Log Out");
		}
	}

	/**
	* --------------------------------------------------------------------------
	* CHECKBOX VALIDATION ON POLICIES TAB UNDER MY ACCOUNT PAGE
	* --------------------------------------------------------------------------
	*/
	$('.accnt-prod-notes button.btn').click(function (e) {
		var checked = $(this).parent().siblings('.box-account').find(".account-order-table tbody tr td:nth-child(2) input[type=checkbox]:checked").length;
		var selectedOpt = [];
		$('#modal-request-hardcopy .modal-body').find('li').remove();
		if (!checked) {
			alert("Select at least one record.");
		} else {
			e.preventDefault();
			$('.my-account').find('input[type=checkbox]:checked').each(function () {
				selectedOpt.push($(this).attr('id'));
			});

			$('#modal-request-hardcopy').modal({ show: true });
			var policyList = [];
			setTimeout(function () {
				selectedOpt.each(function (opt) {
					var policyId = jQuery('#policy_' + opt).closest('tr').attr('id');
					var policy = $('#' + policyId).find('a').html();
					var policyname = $('#' + policyId).find('td:eq(2)').html();
					policyList.push(policyname);
					$("#modal-request-hardcopy .modal-body").append("<li class='policy-code'>" + policyname + "</li>");
				});
			}, 100);

			$("#modal-request-hardcopy .btn-yes").click(function (response) {
				$.ajax({
					type: "POST",
					data: { policies: policyList },
					url: "/customer/account/requestpolicy"
				}).done(function () {
					if (!response.error) location.reload(true);
					$('.modal-header .close').click();
				})
			});
		}
		return false;

	});

	/**
	* --------------------------------------------------------------------------
	* SIDEBAR
	* --------------------------------------------------------------------------
	*/
	jQuery('.sidebar-main').on('hover', function () {
		jQuery(this).closest('.sidebar-main').find('.sidebar-text').stop(true, true).toggleClass("view");
	});

	/**
	* --------------------------------------------------------------------------
	* HOMEPAGE SLIDER OWL CAROUSEL TRIGGER
	* --------------------------------------------------------------------------
	*/
	$(".banner-slider-demo-1").slick({
		lazyLoad: 'ondemand',
		autoplay: true,
		autoplaySpeed: 5000,
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear'
	});

	/**
	* --------------------------------------------------------------------------
	* ADD TOP PADDING TO GET THE BODY CONTENTS UNDER THE HEADER
	* --------------------------------------------------------------------------
	*/
	function paddingTop() {
		$('.page').css('padding-top', $('.page .header-content').outerHeight());
	}

	/**
	* --------------------------------------------------------------------------
	* ADDING ANIMATED BORDER ON EVERY SLICK DOTS
	* --------------------------------------------------------------------------
	*/
	var circleSlickDot = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 16 16" preserveAspectRatio="none"><circle cx="8" cy="8" r="6.215"></circle></svg>';
	$(".slick-dots li").append(circleSlickDot);

	/**
	* --------------------------------------------------------------------------
	* ADD ENTRANCE ANIMATION ON TIMELINE (ABOUT US PAGE) AND BLUE SIDEBAR (ALL PAGE)
	* --------------------------------------------------------------------------
	*/
	// for the about us milestone timeline
	var milestonePage = $('body').hasClass('cms-about-us-our-milestone'),
		mileItem = $('.cd-timeline-block').length,
		mileArrow = $('.cd-timeline-block .cd-timeline-img'),
		mileBox = $('.cd-timeline-block .cd-timeline-content'),
		mileBoxOdd = $('.cd-timeline-block:nth-child(odd) .cd-timeline-content'),
		mileBoxEven = $('.cd-timeline-block:nth-child(even) .cd-timeline-content'),
		sideBar = $('.custom-sidebar .sidebar-main');

	if (milestonePage) {
		mileBox.add(mileArrow).addClass('animated');
		mileArrow.attr('data-animation', 'slideInDown');
		mileBoxOdd.attr('data-animation', 'slideInLeft');
		mileBoxEven.attr('data-animation', 'slideInRight');
	}
	// for the sidebar
	sideBar.addClass('animated slideInLeft');
	sideBar.each(function (index) {
		$(this).css({
			'animation-delay': '0.' + (1 + index) + 's'
		});
	});

	function revealOnScroll() {
		var scrolled = $window.scrollTop(),
			win_height_padded = $window.height() * 0.9;

		// Showed...
		$(".cd-timeline-content:not(.animated), .cd-timeline-img:not(.animated)").each(function () {
			var $this = $(this),
				offsetTop = $this.offset().top;

			if (scrolled + win_height_padded > offsetTop) {
				if ($this.data("timeout")) {
					window.setTimeout(function () {
						$this.addClass("animated " + $this.data("animation"));
					}, parseInt($this.data("timeout"), 10));
				} else {
					$this.addClass("animated " + $this.data("animation"));
				}
			}
		});

		// Hidden...
		$(".cd-timeline-content.animated, .cd-timeline-img.animated").each(function (index) {
			var $this = $(this),
				offsetTop = $this.offset().top;
			if (scrolled + win_height_padded < offsetTop) {
				$(this).removeClass("animated slideInRight slideInLeft slideInDown");
			}
		});
	}
	/**
	* --------------------------------------------------------------------------
	* ADD TEXT ELLIPSIS IN SUB DESCRIPTION IN FILE A CLAIM ITEMS
	* --------------------------------------------------------------------------
	*/
	if (winWidth > 345) {
		$(".effect-ruby:hover .effect-ruby-caption p").dotdotdot({
			height: 85,
			fallbackToLetter: true,
			watch: true,
		});
	}
	/**
	* --------------------------------------------------------------------------
	* GOOGLE MAP (USED IN DOWNLOADABLE FORM | STORE LOCATOR)
	* --------------------------------------------------------------------------
	*/
	var customStoreLocator = $('body').hasClass("ucpb-customstorelocator-index-storelocator");

	if (customStoreLocator) {
		$(".gawa-agad-motor-city-list ul li").first().addClass("active");

		// add onchange listener to the newly created select tag.
		/* @param $elem - add onchange event listener to target element */
		function addListener($elem) {
			$elem.on('change', function () {
				var latlng = $elem.find(':selected').attr('value');
				$('.gawa-agad-motor-city-list li a[data-latlng="' + latlng + '"]').click();
			})
		}

		// Generate Select based on selected region.
		function generateSelectCity() {
			if ($('#gen-select-city').length)
				$('#gen-select-city').remove();

			var elem = $('.gawa-agad-motor-city-list ul li.show');
			var html = '<div class="select-form-wrapper gen-select-city-wrap"><select id="gen-select-city" class="form-control">';
			elem.each(function () {
				var _this = $(this),
					latlng = _this.find('a').data('latlng')
				text = _this.find('a').text();
				html += '<option value=' + latlng + '>' + text + '</option>';
			})
			html += '</select></div>';
			$(html).insertAfter('.select-form-wrapper');
			addListener($('#gen-select-city'));
		}

		/* @ param $selected - text content of selected option in $('#store-region').
		   - Will show hidden links if the data-region=$selected */
		function updateMapCities($selected) {
			var list = $('.gawa-agad-motor-city-list li');
			list.removeClass('show active').each(function () {
				var _this = $(this);
				if (_this.find('a').data('region').toLowerCase() == $selected) {
					_this.addClass('show');
				}
			});
			$('.gawa-agad-motor-city-list li.show').first().addClass('active').find('a').click();
			generateSelectCity();
		}

		// State change of select $('#store-region')
		$('#store-region').on('change', function () {
			var newSelect = $(this).find(":selected").text().toLowerCase();
			updateMapCities(newSelect);
		});

		updateMapCities($('#store-region').find(":selected").text().toLowerCase());
	}

	/**
	* --------------------------------------------------------------------------
	* DISABLE THE ABOUT-US LANDING PAGE
	* --------------------------------------------------------------------------
	*/
	$(".menu-wrapper ul.menu > li > a").each(function () {
		var text = $(this).text().toLowerCase();
		if (text == "about us") {
			$(this).on('click', function (e) {
				e.preventDefault();
			})
		}
	});

	/**
	* --------------------------------------------------------------------------
	* ADJUST PROMOS PAGE LAY-OUT
	* --------------------------------------------------------------------------
	*/
	if ($('body').hasClass('blog-cat-view')) {
		if ($('body .wrapper .page').children().hasClass('col1-layout')) {
			var _children = $('body').find('div.col1-layout .main.container .col-main .postWrapper');

			$(_children).each(function () {
				$(this).addClass('col-sm-6');
			});
		}

		Ellipsis.setTarget($(".postWrapper .postContent .postContentWrapper .truncate"));
		Ellipsis.options.height = 90;
		Ellipsis.truncate();

		equalHeight($(".postWrapper .postContent"));
	}

	/**
	* --------------------------------------------------------------------------
	* LOCATE A BRANCH & SHOP LOCATOR | REMOVE CONTAINER
	* --------------------------------------------------------------------------
	*/
	if ($('body').hasClass('dealers-index-index')) {
		$('body').find('.wrapper .page .main-container .main').removeClass('container');
	}

	if ($('body').hasClass('dealers-index-shops')) {
		$('body').find('.wrapper .page .main-container .main').removeClass('container');
	}

	/**
	* --------------------------------------------------------------------------
	* PRODUCT LIST AUTOHEIGHT FOR DESCIPTION BOX
	* --------------------------------------------------------------------------
	*/

	if (prodPage) {
		prodEllipsis();
	} else {
		cmsEllipsis();
	}

	$('.category-grid-block .category-grid-block-content').onImagesComplete(function () {
		if (prodPage) {
			prodEllipsis();
		} else {
			cmsEllipsis();
		}
	});

	function prodEllipsis() {
		if ($(".category-row .lib-row.lib-desc").length) {
			Ellipsis.setTarget($(".category-row .lib-row.lib-desc"));
			Ellipsis.options.height = 50;
			Ellipsis.truncate();
		}
	}

	function cmsEllipsis() {
		if ($(".category-row .lib-row.lib-desc").length) {
			Ellipsis.setTarget($(".category-row .lib-row.lib-desc"));
			Ellipsis.options.height = 30;
			Ellipsis.truncate();
		}
		if (winWidth <= 768) {
			Ellipsis.setTarget($(".category-row .lib-row.lib-desc"));
			Ellipsis.options.height = 55;
			Ellipsis.truncate();
		}
	}

	function checkPageCms() {
		var prodPage = $("body").hasClass("category-products"),
			homePage = $("body").hasClass("cms-index-index");
		if (!homePage) {
			if (prodPage) {
				cmsHeightProd();
				prodEllipsis();
			} else {
				cmsHeightDb();
				cmsEllipsis();
			}
		}
	}

	function cmsHeightProd() {
		var captionBoxHeader = $('.caption-box.detail-box .lib-header'),
			captionBoxDesc = $('.caption-box.detail-box .lib-desc');
		if (winWidth <= 991) {
			captionBoxHeader.autoHeight({ column: 2, clear: 2 });
			captionBoxDesc.autoHeight({ column: 2, clear: 2 });
		} else if (winWidth <= 767) {
			captionBoxHeader.autoHeight({ column: 1, clear: 1 });
			captionBoxDesc.autoHeight({ column: 1, clear: 1 });
		} else if (winWidth > 992) {
			captionBoxHeader.autoHeight({ column: 3, clear: 3 });
			captionBoxDesc.autoHeight({ column: 3, clear: 3 });
		}
	}

	function cmsHeightDb() {
		var captionBox = $('.caption-box.detail-box'),
			captionBoxDesc = $('.caption-box.detail-box .lib-desc');;
		if (winWidth <= 767) {
			captionBox.css({ 'min-height': '' });
			setTimeout(function () { captionBox.autoHeight({ column: 1, clear: 1 }); }, 150);
		} else if (winWidth <= 991) {
			setTimeout(function () { captionBox.autoHeight({ column: 1, clear: 1 }); }, 150);
			captionBox.css({ 'min-height': '' });
			setTimeout(function () { captionBox.autoHeight({ column: 1, clear: 1 }); }, 150);
		} else if (winWidth > 992) {
			captionBox.css({ 'min-height': '' });
			setTimeout(function () { captionBox.autoHeight({ column: 1, clear: 1 }); }, 150);
		}
	}

	/**
	* --------------------------------------------------------------------------
	* MY ACCOUNT
	* --------------------------------------------------------------------------
	*/

	$('.for-approval-btn .btn-home').on('click', function () {
		window.location.href = BASE_URL;
	});

	$('.for-approval-btn .btn-get-quote').on('click', function () {
		window.location.href = BASE_URL + 'products/fire.html';
	});

	$('#changePassButton').on('click', function (e) {
		e.preventDefault();
		$(this).closest('form').submit();
	});

	$('#changeContactButton').on('click', function (e) {
		if ($('#contact_informations input[name="email"]').val() == '' || $('#contact_informations input[name="mobile_num"]').val() == '__-___-_______' || $('#contact_informations input[name="mobile_num"]').val() == '') {
			return false;
		} else {
			$('#help-blockemailnempty').hide();
			$(this).closest('form').submit();
		}
	});

	$('#changeMailButton').on('click', function (e) {
		if ($('input[name="mailing_address[address]"]').val() == '') {
			$('#mailaddress').show();
			return false;
		} else {
			$('#mailaddress').hide();
			$(this).closest('form').submit();
		}
	});

	$('#personalaccount').on('click', function (e) {

		if ($('select[name="indiviual_personal_information[nationality]"]').val() == '' || $('select[name="indiviual_personal_information[occupation]"]').val() == '' || $('select[name="indiviual_personal_information[gender]"]').val() == '' || $('select[name="indiviual_personal_information[birth_date]"]').val() == '') {

			if($('select[name="indiviual_personal_information[occupation]"]').val() == '') {
				$('#occupationempty').show();
			}

			if($('select[name="indiviual_personal_information[gender]"]').val() == '') {
				$('#genderempty').show();
			}

			if($('select[name="indiviual_personal_information[birth_date]"]').val() == '') {
				$('#birthdateempty').show();
			}

			if($('select[name="indiviual_personal_information[nationality]"]').val() == '') {
				$('#nationalityempty').show();
			}

			return false;
		} else {
			$(this).closest('form').submit();
		}

	});

	window.setTimeout(function () {
		if (localStorage['personal'] != '' || typeof localStorage['personal'] != 'undefined') {
			localStorage['checkout'] == localStorage['personal'];
		}

		$('.btn-default').addClass("current");
		$('.quote-process .current').prevAll('li').click(function (e) {
			e.preventDefault();
			var el = $(this).attr('name');
			var fkey = localStorage[el];

			if (typeof fkey != 'undefined' || fkey != '') {
				window.location.href = '/quote/' + el + '/index/form_key/' + localStorage[el];
			}
		});
	}, 500);

	$('.quote-process li.btn').each(function () {
		var step = $(this).attr('name');
		if (localStorage[step] != '' && typeof localStorage[step] != 'undefined') {
			$(this).addClass('btn-success past');
			if ($(this).hasClass('current') == true) {
				$(this).removeClass('past');
			}
		}
	});

	$('.header-right-area').find('a[title="Log Out"]').on('click', function () {
		sessionStorage.removeItem('isPop');
	});

	$('#contact_informations input[name="mobile_num"]').focusout(function (e) {
		var mobNum = $(this).val();
		var filter = /^^\(?([0-9]{2})\)?[-. ]?([0-9]{3})?[-. ]?([0-9]{7})$/;

		if (filter.test(mobNum)) {
			if (mobNum.length == 14) {
				$('#mobilevalid').hide();
			} else {
				$(this).focus();
				$('#mobilevalid').show();
				return false;
			}
		}
		else {
			$(this).focus();
			$('#mobilevalid').show();
			return false;
		}
	});

	$('#contact_informations input[name="email"]').focusout(function (e) {
		$(this).filter(function () {
			var emil = $(this).val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if (!emailReg.test(emil)) {
				$('#help-blockemail').hide();
				$('#help-blockemailnempty').show();

				$(this).focus();
			} else {
				if (emil == '') {
					$('#help-blockemail').show();
					$(this).focus();
				} else {
					$('#help-blockemail').hide();
					$('#help-blockemailnempty').hide();
				}
			}
		})
	});

	$('select[name="indiviual_personal_information[occupation]"]').change(function (e) {
		if ($(this).val() == '') {
			$('#occupationempty').show();
		} else {
			$('#occupationempty').hide();
		}
	});

	$('select[name="indiviual_personal_information[gender]"]').change(function (e) {
		if ($(this).val() == '') {
			$('#genderempty').show();
		} else {
			$('#genderempty').hide();
		}
	});

	$('#changeContactButtonClose').on('click', function () {
		location.reload();
	});

	$('#changeMailButtonClose').on('click', function () {
		location.reload();
	});

	$('#closeaddress').on('click', function () {
		location.reload();
	});

	$('#closemailadd').on('click', function () {
		location.reload();
	});
	// personalaccountclose
	$('#btnpersonal').on('click', function () {
		location.reload();
	});
	$('#personalaccountclose').on('click', function () {
		location.reload();
	});

	/**
	* --------------------------------------------------------------------------
	* FAQS FILTER
	* --------------------------------------------------------------------------
	*/

	$('.category-faqs .sort-by select').change(function () {
		var filter = $(this).val()
		filterList(filter);
	});

	function filterList(value) {
		var list = $(".faq-list > div");
		$(list).fadeOut("fast");
		if (value == "faqs-all") {
			$(list).each(function (i) {
				$(this).delay(200).slideDown("fast");
			});
		} else {
			$(".faq-list").find("div[data-faqs*=" + value + "]").each(function (i) {
				$(this).delay(200).slideDown("fast");
			});
		}
	}

	/**
	* --------------------------------------------------------------------------
	* BLOG, NEWS AND EVENTS, PROMOS
	* --------------------------------------------------------------------------
	*/
	jQuery('.post-actions .post-actions-btn .a-left-link').mouseenter(function () {
		var _left = jQuery('.post-actions .post-actions-title .a-left-title');
		jQuery(_left).css({ visibility: 'visible' });
	});

	jQuery('.post-actions .post-actions-btn .a-left-link').mouseleave(function () {
		var _left = jQuery('.post-actions .post-actions-title .a-left-title');
		jQuery(_left).css({ visibility: 'hidden' });
	});

	jQuery('.post-actions .post-actions-btn .a-right-link').mouseenter(function () {
		var _right = jQuery('.post-actions .post-actions-title .a-right-title');
		jQuery(_right).css({ visibility: 'visible' });
	});

	jQuery('.post-actions .post-actions-btn .a-right-link').mouseleave(function () {
		var _right = jQuery('.post-actions .post-actions-title .a-right-title');
		jQuery(_right).css({ visibility: 'hidden' });
	});

	/**
	* --------------------------------------------------------------------------
	* CAREER OPPORTUNITIES
	* Selected JOB == Position Applied
	* --------------------------------------------------------------------------
	*/
	$('.career-wrapper .career-list').on('click', function () {
		var _selCareer = $(this).find('.panel-heading .panel-title a').text();

		if (!$(this).find('.panel-collapse').hasClass('collapse in')) {
			$('select[name="positionApplied"] option[data-value="' + _selCareer + '"]')
				.prop('selected', true)
				.attr('selected', 'selected');

			$('select[name="positionApplied"] option:not([data-value="' + _selCareer + '"])')
				.prop('selected', false)
				.removeAttr('selected');
		}
		else {
			$('select[name="positionApplied"]').children()
				.prop('selected', false)
				.removeAttr('selected');
		}
	});

	/**
	* --------------------------------------------------------------------------
	* GENERAL SEARCH, MY ACCOUNT & CHAT 2.0
	* --------------------------------------------------------------------------
	*/

	// TOGGLING SEARCH AND ACCOUNT IN PC
	$(".search-btn").on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$(".pop-up-accnt").removeClass("show");
		$(".pop-up-search").toggleClass("show");
	})

	$(".user-btn").on('click', function (e) {
		e.preventDefault();
		e.stopPropagation();
		$(".pop-up-search").removeClass("show");
		$(".pop-up-accnt").toggleClass("show");
	})

	$('.pop-up-search form, .pop-up-accnt ul').on('click', function (e) {
		e.stopPropagation();
	});

	// CLOSE ALL POPUPS
	$(document).click(function (e) {
		$(".pop-up-search, .pop-up-accnt").removeClass("show");
	});

	// CHAT EVENTS
	function showChat() {
		$(".pop-up-chat").addClass("show");
		$(".chat-header .icons span").stop(true, true).attr("class", "icon-error2");
	}

	function hideChat() {
		$(".pop-up-chat").removeClass("show");
		var chat_height = jQuery(".pop-up-chat").outerHeight(true),
			chat_header = jQuery(".chat-header").outerHeight(true),
			a = chat_height - chat_header,
			b = '-' + a,
			t = parseInt(b);
		$(".pop-up-chat").css('bottom', t);
		$(".chat-header .icons span").stop(true, true).attr("class", "icon-add2");
	}

	setTimeout(function () {
		hideChat();
	}, 3000);

	$('.chat-header').click(function () {
		if ($(this).closest('.pop-up-chat').hasClass('show')) {
			hideChat();
		} else {
			showChat();
		}
	})

	/**
	* --------------------------------------------------------------------------
	* MENU 2.0
	* --------------------------------------------------------------------------
	*/

	function mobileMenu() {
		var varTime = 0,
			currentLi = '',
			mainNav = $("header .nav-wrap > ul"),
			btnBack = $(".submenu-back"),
			menu_overlay = '<div class="menu-overlay"></div>',
			have_overlay = $(".header-content").children(".menu-overlay").length;

		$('header .nav-wrap ul li:has(ul)').addClass('has-child');

		if (winWidth >= 1091) {
			var mainNavLi = $("header .nav-wrap ul li");
			$(".menu-overlay").remove();
			mainNavLi.off('click');
			btnBack.off('click');
			mainNavLi.on('mouseenter', function () {
				if ($(this).children('ul').length) {
					$(this).addClass("has-child").children('ul').stop(true, true).slideDown('fast');
				}
				if (currentLi[0] == $(this)[0]) {
					clearTimeout(varTime);
				}
				currentLi = $(this);
			});
			mainNavLi.on('mouseleave', function () {
				if ($(this).children('ul').length) {
					$(this).children('ul').stop(true, true).slideUp('fast');
				}
			});

		} else if (winWidth <= 1090) {
			var mainNavLi = $("header .nav-wrap ul li a, header .nav-wrap ul li span");
			mainNavLi.off('mouseenter, mouseleave');

			$("div.page #totop").css('bottom', fixed_bot_h);

			if (have_overlay == 0) {
				$(".header-content").prepend(menu_overlay);
			} else {
				$(".menu-overlay").remove();
			}

			mainNavLi.click(function (e) {
				var _this = $(this);

				if ($(this).siblings('ul').length) {
					e.preventDefault();

					// Toggling the back button
					if (mainNav.length) {
						btnBack.addClass('active');
					} else {
						btnBack.removeClass('active');
					}
				}

				// Add class open to closest li
				mainNav.find('.active').removeClass('active');
				_this.closest('li')
					.addClass('open active')
					.siblings()
					.removeClass('open');
			});

			btnBack.click(function (e) {
				e.preventDefault();
				var p = mainNav.find('.active').removeClass('open active').closest('.open');
				if (p.closest(mainNav).length) {
					p.addClass('active')
				} else {
					btnBack.removeClass('active');
				}
			});
		}

		$(".menu-btn").on("click", function (e) {
			var menuOverlay = $(".menu-overlay");
			e.preventDefault();
			menuOverlay.fadeIn();
			$(".nav-wrap").addClass("open");
		});

		$(".menu-close, .menu-overlay").on("click", function (e) {
			e.preventDefault();
			$(".nav-wrap").removeClass("open");
			btnBack.removeClass('active');
			mainNav.find('.open').removeClass('open');
			$(".menu-overlay").fadeOut();
			$(".pop-up-search").removeClass('show');
		});
	}

	/**
	* --------------------------------------------------------------------------
	* FAQS FILTER
	* --------------------------------------------------------------------------
	*/

	$('.category-faqs .sort-by select').change(function () {
		var filter = $(this).val()
		filterList(filter);
	});

	function filterList(value) {
		var list = $(".faq-list > div");
		$(list).fadeOut("fast");
		if (value == "faqs-all") {
			$(list).each(function (i) {
				$(this).delay(200).slideDown("fast");
			});
		} else {
			$(".faq-list").find("div[data-faqs*=" + value + "]").each(function (i) {
				$(this).delay(200).slideDown("fast");
			});
		}
	}

	/**
	* --------------------------------------------------------------------------
	* SLICK HOMEPAGE FEATURED SLIDER
	* --------------------------------------------------------------------------
	*/
	$('.featured_prod_slick').slick({
		dots: true,
		loop: true,
		slidesToShow: 1,
		arrows: false
	});

	/**
	* --------------------------------------------------------------------------
	* RELEASE THE PRELOADER!!!!
	* --------------------------------------------------------------------------
	*/

	var buyBtn = $(".quote-results input[type=button][value=Buy]"),
		backBtnn = $(".mega-form-builds input[type=button][value=Back]"),
		clickCount = 0,
		body = $("body");

	buyBtn.on('click', function () {
		clickCount++;

		if (isLoggedIn == 1 && clickCount == 1) {
			// if buy now button is clicked from quote request and user is logged in.
			ilabasPreloader()
		} else if (isLoggedIn == '' && clickCount == 2) {
			// if buy now button is clicked twice after proceeding as guest and user is not logged in
			console.log(clickCount);
			ilabasPreloader()
		}
	});

	$(".addtocart").click(function(){
		ilabasPreloader()
	});



	function ilabasPreloader() {
		$(".preloader").removeClass("up");
	}

	/**
	* --------------------------------------------------------------------------
	* ONLOAD FUNCTIONS (MUST ALWAYS BE AT THE END)
	* --------------------------------------------------------------------------
	*/
	autoHeightUpload();
	autoHeightCatalogDetails();
	autoHeightDownloadableForm();
	updateItpTab();
	updateFireTab();
	responsiveLogout();
	paddingTop();
	revealOnScroll();
	checkPageCms();
	mobileMenu();
});
