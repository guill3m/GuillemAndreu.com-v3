/*
 * Menu
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.1.0
 */

(function($) {

	var $responsiveImg = $('img[data-responsive]'),
	    retina         = window.matchMedia('(-webkit-min-device-pixel-ratio: 1.5), (min-resolution: 144dpi)'),
	    max320         = window.matchMedia('screen and (max-width: 320px)'),                          // XXXS --> 320  / 320  / 320*
	    min321max580   = window.matchMedia('screen and (min-width: 321px) and (max-width: 580px)'),   // XXS  --> 580  / 580  / 580*
	    min581max649   = window.matchMedia('screen and (min-width: 581px) and (max-width: 649px)'),   // XS   --> 649  / 649  / 649*
	    min650max770   = window.matchMedia('screen and (min-width: 650px) and (max-width: 770px)'),   // S    --> 770  / 770  / 379
	    min771max899   = window.matchMedia('screen and (min-width: 771px) and (max-width: 899px)'),   // M    --> 899  / 899  / 444
	    min900max1010  = window.matchMedia('screen and (min-width: 900px) and (max-width: 1010px)'),  // L    --> 657  / 1010 / 323
	    min1001max1099 = window.matchMedia('screen and (min-width: 1001px) and (max-width: 1099px)'), // XL   --> 714  / 1099 / 351
	    min1100max1280 = window.matchMedia('screen and (min-width: 1100px) and (max-width: 1280px)'), // XXL  --> 959  / 1280 / 474
	    min1281        = window.matchMedia('screen and (min-width: 1281px)');                         // XXXL --> 1080 / 1440 / 534

	function loadImage(size) {
		$responsiveImg.each(function() {
			if (retina.matches) {
				$(this).attr('src', $(this).attr('data-responsive-' + size + '-2x'));
			} else {
				$(this).attr('src', $(this).attr('data-responsive-' + size));
			}
		});
	}

	function images() {

		if ($responsiveImg) {
			if (max320.matches) {
				loadImage('xxxs'); }
			else if (min321max580.matches) {
				loadImage('xxs'); }
			else if (min581max649.matches) {
				loadImage('xs'); }
			else if (min650max770.matches) {
				loadImage('s'); }
			else if (min771max899.matches) {
				loadImage('m'); }
			else if (min900max1010.matches) {
				loadImage('l'); }
			else if (min1001max1099.matches) {
				loadImage('xl'); }
			else if (min1100max1280.matches) {
				loadImage('xxl'); }
			else if (min1281.matches) {
				loadImage('xxxl'); }
		}

	}

	$(function() {

		images();

		max320.addListener(images);
		min321max580.addListener(images);
		min581max649.addListener(images);
		min650max770.addListener(images);
		min771max899.addListener(images);
		min900max1010.addListener(images);
		min1001max1099.addListener(images);
		min1100max1280.addListener(images);
		min1281.addListener(images);

	}); // Document Ready

})(jQuery);