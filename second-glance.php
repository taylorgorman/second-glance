<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thegorman.group
 * @since             1.0.0
 * @package           Second_Glance
 *
 * @wordpress-plugin
 * Plugin Name:       Second Glance
 * Plugin URI:        https://thegorman.group/wordpress/second-glance
 * Description:       A customizable dashboard widget that shows you basic quick info about your site.
 * Version:           1.0.0
 * Author:            Taylor Gorman
 * Author URI:        https://thegorman.group
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       second-glance
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SECOND_GLANCE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-second-glance-activator.php
 */
function activate_second_glance() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-second-glance-activator.php';
	Second_Glance_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-second-glance-deactivator.php
 */
function deactivate_second_glance() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-second-glance-deactivator.php';
	Second_Glance_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_second_glance' );
register_deactivation_hook( __FILE__, 'deactivate_second_glance' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-second-glance.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_second_glance() {

	$plugin = new Second_Glance();
	$plugin->run();

}
run_second_glance();
