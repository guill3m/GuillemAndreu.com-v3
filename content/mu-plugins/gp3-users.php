<?php
/*
Plugin Name: GP3 Users
Version: 1.0
Author: Guillem Andreu
Author URI: http://guillemandreu.com
Description: Some changes to the WP users
License: Proprietary - © 2013 Guillem Andreu
*/


/*
 * Contact methods (web profiles) for WP users
 */

function gp3_contact_methods($contactmethods) {
	// Add new
	$contactmethods['adcv']     = 'ADCV'; // Asociación de Diseñadores de la Comunidad Valenciana
	$contactmethods['behance']  = 'Behance';
	$contactmethods['dribble']  = 'Dribble';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['flickr']   = 'Flickr';
	$contactmethods['github']   = 'GitHub';
	$contactmethods['gplus']    = 'Google+';
	$contactmethods['lastfm']   = 'Last.fm';
	$contactmethods['linkedin'] = 'LinkedIn';
	$contactmethods['skype']    = 'Skype';
	$contactmethods['twitter']  = 'Twitter';
	$contactmethods['vimeo']    = 'Vimeo';
	$contactmethods['youtube']  = 'YouTube';
	// Remove unwanted
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	// Return the new contact methods
	return $contactmethods;
}

add_filter('user_contactmethods','gp3_contact_methods');



/*
 * Hability to use HTML on user descriptions
 */

remove_filter('pre_user_description', 'wp_filter_kses');