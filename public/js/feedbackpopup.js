jQuery(function () {
	/**
	* --------------------------------------------------------------------------
	* Feed back chat popup
	* --------------------------------------------------------------------------
	*/


	function showChat2() {
		$(".pop-up-chat2").addClass("show");
		$(".chat-header2 .icons span").stop(true, true).attr("class", "icon-error2");
	}

	function hideChat2() {
		$(".pop-up-chat2").removeClass("show");
		var chat_height2 = jQuery(".pop-up-chat2").outerHeight(true),
			chat_header2 = jQuery(".chat-header2").outerHeight(true),
			a2 = chat_height2 - chat_header2,
			b2 = '-' + a2,
			t2 = parseInt(b2);
		$(".pop-up-cha2").css('bottom', t2);
		$(".chat-header2 .icons span").stop(true, true).attr("class", "icon-add2");
	}

	setTimeout(function () {
		hideChat2();
	}, 3000);

	$('.chat-header2').click(function () {
		if ($(this).closest('.pop-up-chat2').hasClass('show')) {
			hideChat2();
		} else {
			showChat2();
		}
	})
})
