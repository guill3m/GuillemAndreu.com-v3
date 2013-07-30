/*
 * Project
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */

(function($) {

	function contact() {

		var $contactForm    = $('#contact-form'),
		    $contactContent = $('#contact-content');

		$contactForm.submit(function(event) {

			event.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'http://dev.guill3m.me/content/themes/gp3/send-contact-form.php',
				data: $contactForm.serialize(),
				success: function(response) {
					$contactContent.html(response);
				},
				error: function() {
					alert('Error');
				}
			});

		});

	}


	$(function() {

		contact();

	}); // Document Ready


}(jQuery));