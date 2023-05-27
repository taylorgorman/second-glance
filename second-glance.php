<?php
/**
 * Plugin Name:       Second Glance
 * Plugin URI:        https://thegorman.group/wordpress/second-glance
 * Description:       A customizable dashboard widget that shows you basic quick info about your site.
 * Version:           0.1.0
 * Author:            Taylor Gorman
 * Author URI:        https://thegorman.group
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       second-glance
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

// Very basic data about this plugin. Title, name, version.
require_once 'config/constants.php';
require_once 'admin/dashboard-widget.php';

// Activation and deactivation
register_activation_hook( __FILE__, function(){

	// Hide "At A Glance" dashboard widget

} );
register_deactivation_hook( __FILE__, function(){

	// Show "At A Glance" dashboard widget

} );
