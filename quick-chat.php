<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://peacefulqode.com/
 * @since             1.0.0
 * @package           Quick_Chat
 *
 * @wordpress-plugin
 * Plugin Name:       quick chat - BetterHalf Social Chat
 * Plugin URI:        https://demo.peacefulqode.com/
 * Description:       This is a short description of what the plugin does.
 * Version:           1.0.0
 * Author:            peacefulqode
 * Author URI:        https://peacefulqode.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       quick-chat
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
define( 'QUICK_CHAT_VERSION', '1.0.0' );
define( 'QUICK_CHAT_NAME', plugin_basename( __FILE__ ) );
define( 'QUICK_CHAT_DIR', plugin_dir_path( __FILE__ ) );
define( 'QUICK_CHAT_URI', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-quick-chat-activator.php
 */
function activate_quick_chat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick-chat-activator.php';
	Quick_Chat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-quick-chat-deactivator.php
 */
function deactivate_quick_chat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick-chat-deactivator.php';
	Quick_Chat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_quick_chat' );
register_deactivation_hook( __FILE__, 'deactivate_quick_chat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-quick-chat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_quick_chat() {
	$plugin = new Quick_Chat();
	$plugin->run();

}
run_quick_chat();
