<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://vitexsoftware.cz/
 * @since             1.0.0
 * @package           Anyshape_Importer
 *
 * @wordpress-plugin
 * Plugin Name:       AnyShape Importer
 * Plugin URI:        https://github.com/Vitexus/AnyShapeImp
 * Description:       Import AnyShape database & files to WordPress
 * Version:           1.0.0
 * Author:            Vítězslav Dvořák
 * Author URI:        https://vitexsoftware.cz/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       anyshape-importer
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ANYSHAPE_IMPORTER_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-anyshape-importer-activator.php
 */
function activate_anyshape_importer() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-anyshape-importer-activator.php';
    Anyshape_Importer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-anyshape-importer-deactivator.php
 */
function deactivate_anyshape_importer() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-anyshape-importer-deactivator.php';
    Anyshape_Importer_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_anyshape_importer');
register_deactivation_hook(__FILE__, 'deactivate_anyshape_importer');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-anyshape-importer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_anyshape_importer() {

    $plugin = new Anyshape_Importer();
    $plugin->run();
}

run_anyshape_importer();
