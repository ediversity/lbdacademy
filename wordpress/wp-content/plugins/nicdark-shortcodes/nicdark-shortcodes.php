<?php
/*
Plugin Name:       Baby Kids Shortcodes
Description:       Custom shortcodes for baby kids wordpress version.
Version:           2.0
Author:            Nicdark
Author URI:        http://www.nicdarkthemes.com/
License:           GPLv2 or later
*/

//translation
function nicdark_shortcodes_load_textdomain()
{
	load_plugin_textdomain("nicdark-shortcodes", false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'nicdark_shortcodes_load_textdomain');

//register custom post types
include 'cpt/courses.php';
include 'cpt/events.php';
include 'cpt/excursions.php';

//shortcodes
include ('shortcodes/divider_nd.php');
include ('shortcodes/alert_nd.php');
include ('shortcodes/testimonial_nd.php');
include ('shortcodes/table_nd.php');
include ('shortcodes/badge_nd.php');
include ('shortcodes/price_horizontal_nd.php');
include ('shortcodes/price_vertical_nd.php');
include ('shortcodes/service_horizontal_nd.php');
include ('shortcodes/service_vertical_nd.php');
include ('shortcodes/team_horizontal_nd.php');
include ('shortcodes/team_vertical_nd.php');
include ('shortcodes/counter_nd.php');
include ('shortcodes/focus_text_nd.php');
include ('shortcodes/focus_number_nd.php');
include ('shortcodes/focus_title_nd.php');
include ('shortcodes/title_nd.php');
include ('shortcodes/iframe_nd.php');
include ('shortcodes/posts_grid_nd.php');
include ('shortcodes/countdown_nd.php');
include ('shortcodes/advanced_search_nd.php');