<?php

/**
 * The plugin bootstrap file.
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.1
 *
 * @wordpress-plugin
 * Plugin Name:       Slider plugin
 * Plugin URI:        http://example.com/social-link-uri/
 * Description:       Simple plugin for save && retrive social links
 * Version:           1.0.0
 * Author:            Yoan marchal
 * Author URI:        http://yoanmarchal.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       social-link
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-slider-plugin-activator.php.
 */
function activate_slider_plugin()
{
    require_once plugin_dir_path(__FILE__).'includes/class-slider-plugin-activator.php';
    slider_plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-slider-plugin-deactivator.php.
 */
function deactivate_slider_plugin()
{
    require_once plugin_dir_path(__FILE__).'includes/class-slider-plugin-deactivator.php';
    slider_plugin_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_slider_plugin');
register_deactivation_hook(__FILE__, 'deactivate_slider_plugin');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/class-slider-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_slider_plugin()
{
    $plugin = new slider_plugin();
    $plugin->run();
}
run_slider_plugin();
