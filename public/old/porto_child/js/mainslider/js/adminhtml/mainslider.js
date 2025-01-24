var homeSlider = {
	initHomeSlider: function() {
		homeSlider.homeSlickCarousel(); // for home slider slick carousel
		homeSlider.homeSliderHeight(); // for home slider responsive height
		homeSlider.ellipsis(); // for home slider description ellipsis
	},
	homeSliderHeight: function() {
		var sliderHeight = jQuery('.home-slider').height();
		var sliderWidth = jQuery('.home-slider').width();
		var sliderHeightComputed = sliderWidth * 0.51;

		jQuery('.home-slider .image-lazy').height(sliderHeightComputed);
	},
	homeSlickCarousel: function() {
		jQuery(".home-slider").slick({
			lazyLoad: 'ondemand',
			autoplay: true,
			autoplaySpeed: 5000,
			dots: true,
			infinite: true,
			speed: 500,
			fade: true,
			cssEase: 'linear'
		});
	},
	ellipsis: function() {
		var homeSlideDescHeight = (jQuery(window).width() <= 1025) ? 70 : 100; // FOR HOME SLIDER DESCRIPTION
		jQuery(".home-slider-description").dotdotdot({
			/*	The text to add as ellipsis. */
			ellipsis	: '... ',

			/*	How to cut off the text/html: 'word'/'letter'/'children' */
			wrap		: 'word',

			/*	Wrap-option fallback to 'letter' for long words */
			fallbackToLetter: true,

			/*	jQuery-selector for the element to keep and put after the ellipsis. */
			after		: null,

			/*	Whether to update the ellipsis: true/'window' */
			watch		: false,

			/*	Optionally set a max-height, can be a number or function.
			If null, the height will be measured. */
			height		: homeSlideDescHeight,

			/*	Deviation for the height-option. */
			tolerance	: 0,

			/*	Callback function that is fired after the ellipsis is added,
			receives two parameters: isTruncated(boolean), orgContent(string). */
			callback	: function( isTruncated, orgContent ) {},

			lastCharacter	: {

				/*	Remove these characters from the end of the truncated text. */
				remove		: [ ' ', ',', ';', '.', '!', '?' ],

				/*	Don't add an ellipsis if this array contains
				the last character of the truncated text. */
				noEllipsis	: []
			}
		});
	}
}

jQuery(document).ready(function(){
	console.log('Main Slider Front JS Init');

	homeSlider.initHomeSlider(); // for home slider

});

jQuery(window).bind('resizeEnd', function() {
    //do something, window hasn't changed size in 500ms
    homeSlider.homeSliderHeight(); // for home slider responsive height
});