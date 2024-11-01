<?php
/**
 * @package Visit_Site
 * @version 1.2
 */
/*
Plugin Name: Visit Site
Plugin URI: http://wordpress.org/plugins/visit-site/
Description: This plugin  Makes <strong>Visit Site</strong> Link in your admin screen open in new tab. When activated you will get <strong>Visit Site</strong> Link in the upper right of your admin screen on every page.
Author: Munaf Vichhi
Version: 1.2
Author URI: https://vichhimunaf.wordpress.com/
*/

function visit_site_get_url() {
	/** These are the url to your site */
	$text = "Visit Site";

	// And then return your url
	return $text;
}

// This just echo the site url, we'll position it later
function visit_site() {
	$url = visit_site_get_url();
	echo "<p id='site'><a href='".site_url()."' target='_blank' style='text-decoration:underline;'>$url</a></p>";
        
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'visit_site' );

// We need some CSS to position the visit site
function site_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#site {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 13px;
                font-style: italic;      
	}
        #site a {
                text-decoration: none;
        }
        #site a:hover {
                text-decoration: underline;
        }
	</style>
	";
}

add_action( 'admin_head', 'site_css' );

?>
