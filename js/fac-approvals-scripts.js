(function($) {

	// Disable the submit button if logged in to WP. Turns back on after a warning message.
	if($('body').hasClass('logged-in') == true) {
		$('input.gform_button[type=submit]').prop('disabled', true)
		$('body').on('click', '.fac-submit', function() {
			if ( $('input.gform_button[type=submit]').prop('disabled') ) {
				alert('You\'re logged in! As a safety measure, this submit button was disabled. If you really want to submit this form, you can click the Submit button again.');
				$('input.gform_button[type=submit]').prop('disabled', false);
			}
		});

	} 

	// Get the ads moved inside the form element
	$('.fac-form-start').after($('.fac-form'));
	$('.fac-form-fields-1').prepend($('.fac-form-section-1'));
	$('.fac-form-fields-2').prepend($('.fac-form-section-2'));
	$('.fac-submit .fac-col-full').prepend($('.fac-image-upload'));
	//$('.fac-image-upload').before($('.gform_button_select_files'));
	if($('body').hasClass('admin-bar')) {
		$('.fac-image-upload').css('display', 'block');
		$('.fac-image-upload label').html('YOU\'RE LOGGED IN! You can add images to this record.');
		$('.gform_drop_instructions').html('Drop your images here.');
	}
	
	
	$('.fac-submit .fac-col-full').append($('.fac-approval-form input.button'));



	// Turn on tooltips 
    $('.tip').tipr({
    	'mode': 'bottom'
    });


	// Show fields based on ad type
	if($('.footer-right').hasClass('hide-likes')) {
		$('.gfield').removeClass('fac-clicks-only');
	}


	// Move Ad next to the other on success message (form fields are gone)     
	if($('.fac-approval-form div').hasClass('gform_confirmation_message')) {
		$('.fac-submit h3, .fac-note').hide();
		moveOnSuccess('.gform_confirmation_message');
	}

	function moveOnSuccess(selector) {
		var target = $(selector);
		if (target.length) {
			$('.fac-form-2 .proof-title, .fac-form-2 .fac-col-left .fb-container').prependTo($('.fac-form-1 .fac-col-right'));
			$('.fac-form-2').hide();
		}
	}

	// Scroll to validation message (GForms)	
	if($('.validation_error, .gform_confirmation_message')) {
		scrollOnMessage('.validation_error, .gform_confirmation_message');
	}
	function scrollOnMessage(selector) {
		var target = $(selector);
		if (target.length) {
			$('html, body').animate({ scrollTop: target.offset().top - 38 }, 1000);
		} 		
	}


	// Fade in the form section after a time out. Prevents the page elements that
	// are moved with JS from looking clunky on load.
	setTimeout(function() {
		$('.fac-form').addClass('fade-in')
	}, 1000);


})(jQuery);