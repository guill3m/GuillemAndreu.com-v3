/*
 * Menu
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */

(function($) {

	var minWidth650 = window.matchMedia('screen and (min-width: 650px)');

	function menu() {

		var MENU_SPEED        = 400,
		    $menuSwitch       = $('#menu-switch'),
		    $menuList         = $('#menu-list'),
		    $languageSelector = $('#language-selector'),
		    $languageSubmenu  = $('#language-submenu');

		if (minWidth650.matches) { // Tablet + Desktop
			$menuList.removeAttr('style');
		} else { // Mobile
			$menuSwitch.click(function(event) {
				event.preventDefault();
				$menuList.slideToggle(MENU_SPEED);
			});
		}

		$languageSelector.click(function(event) {
			event.preventDefault();
			$languageSubmenu.slideToggle(MENU_SPEED);
		});

	}

	$(function() {

		menu();

		minWidth650.addListener(menu);

	}); // Document Ready

})(jQuery);