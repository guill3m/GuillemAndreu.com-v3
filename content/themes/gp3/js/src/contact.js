/*
 * Project
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */

(function($) {

	$.ajaxSetup({
		cache: false
	});

	function contact() {

		var $contactForm    = $('#the-contact-form'),
		    $contactContent = $('#contact-content');

		$contactForm.submit(function(event) {

			event.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'http://guillemandreu.com/content/themes/gp3/js/send-contact-form.php',
				data: $contactForm.serialize(),
				success: function(response) {
					if (response === 'OK') {
						$contactContent.html($contactForm.attr('data-success'));
						$contactForm.slideUp(400);
					} else {
						$contactContent.html($contactForm.attr('data-error'));
					}
				},
				error: function() {
					$contactContent.html($contactForm.attr('data-error'));
				}
			});

		});

	}


	$(function() {

		contact();

	}); // Document Ready


}(jQuery));