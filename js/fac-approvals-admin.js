(function($) {

	if ( $('body').hasClass('post-type-fac_approvals') ) {

		// Create the permalink with client email added to query string
		var thePermalink = $('#sample-permalink a').text();
		var theClientEmail = $('#acf-field-client_email').val()
		$('#acf-field-fac_url').val(thePermalink + '?email=' + theClientEmail).prop('disabled', false);

		$('#acf-field-fac_url').on('click', function() {
			$(this).select();
			document.execCommand('copy');
			alert('URL copied to clipboard.');
		})

		// Adjust available admin fields based on ad type
		function facAdminView() {
			if( $('.acf-radio-list input#acf-field-clicks_or_likes-clicks').attr('checked') ) { 
				// Clicks are selected
				
			} else { 
				// Likes are selected
				$('#acf-subtitle_1, #acf-subtitle_2, #acf-desc_1, #acf-desc_2').hide();
			}

		}
		facAdminView();  

		// Give author character count for ad fields. Use an input or textarea when defining targets.
		function countCharacters(target) {

			target.after('<span class="character-container"></span>');

			target.keyup(function() {

				value = $(this).val();
				keystrokes = value.length;
				$(this).next('.character-container').html(keystrokes + " characters");
			})
		}	

		// Defining character count targets for the ad copy fields.
		var facTargets = $('#acf-title_1 input, #acf-subtitle_1 input, #acf-desc_1 textarea, #acf-title_2 input, #acf-subtitle_2 input, #acf-desc_2 textarea');

		countCharacters(facTargets);
	}
	
})(jQuery);