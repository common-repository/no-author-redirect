<?php
/**
 * @package no-author-redirect
 * @version 1.0.3
 */
/*
Plugin Name: No Author Redirect
Plugin URI: https://wordpress.org/plugins/no-author-redirect/
Description: Stop redirects from URLs containing the `author` query parameter and user ID to permalinks with usernames to make it a little harder to iterate through the system and collect valid usernames.
Author: Keith W. Shaw
Version: 1.0.3
Author URI: https://keithws.net/
Text Domain: no-author-redirect
*/

/**
 * Prevent `/?author=N` URLs from redirecting and
 * exposing author info in such an easy to way to automate
 */
function no_author_redirect( $redirect_url ) {

	// if requested URL contains the author search query parameter
	if ( is_author() && !empty($_GET['author']) && preg_match( '|^[0-9]+$|', $_GET['author'] ) ) {

		// returning false to this filter will cancel the redirect
		return false;

	}

	return $redirect_url;

}
add_filter( 'redirect_canonical', 'no_author_redirect' );
