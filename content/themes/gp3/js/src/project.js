/*
 * Project
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */

(function($) {

	function projectMore() {

		var SLIDE_SPEED     = 400,
		    $projectMore    = $('#project-more'),
		    $projectCharact = $('#project-charact');

		$projectMore.click(function(event) {
			event.preventDefault();
			$projectCharact.slideDown(SLIDE_SPEED);
			$projectMore.slideUp(SLIDE_SPEED);
		});

	}

	$(function() {

		projectMore();

	}); // Document Ready

})(jQuery);