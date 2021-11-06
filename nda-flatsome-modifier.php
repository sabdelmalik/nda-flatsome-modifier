<?php
namespace NDA_FLATSOME;
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              nda.ca
 * @since             1.0.0
 * @package           Nda_Flatsome_Modifier
 *
 * @wordpress-plugin
 * Plugin Name:       NDA Flatsome Modifier
 * Plugin URI:        nda.ca
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sami Abdel Malik
 * Author URI:        nda.ca
 * License:           GNU General Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       nda-flatsome-modifier
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if(!file_exists(plugin_dir_path( __FILE__ ) . 'nda-flatsome-modifier-defines.php')){
  die;
}

spl_autoload_register(
	function ( $class ) {
		$prefix   = __NAMESPACE__;
		$base_dir = __DIR__ . '/includes';

		$len = strlen( $prefix );
		if ( strncmp( $prefix, $class, $len ) !== 0 ) {
			return;
		}

		$relative_class_name = substr( $class, $len );

		$file = $base_dir . str_replace( '\\', '/', $relative_class_name ) . '.php';

		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);


require_once plugin_dir_path( __FILE__ ) . 'nda-flatsome-modifier-defines.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nda-flatsome-modifier-activator.php
 */
function activate_nda_flatsome_modifier() {
	require_once NDA_FLATSOME_MODIFIER_INC_DIR . 'class-nda-flatsome-modifier-activator.php';
	Nda_Flatsome_Modifier_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nda-flatsome-modifier-deactivator.php
 */
function deactivate_nda_flatsome_modifier() {
	require_once NDA_FLATSOME_MODIFIER_INC_DIR . 'class-nda-flatsome-modifier-deactivator.php';
	Nda_Flatsome_Modifier_Deactivator::deactivate();
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_nda_flatsome_modifier' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_nda_flatsome_modifier' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require NDA_FLATSOME_MODIFIER_INC_DIR . 'class-nda-flatsome-modifier.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nda_flatsome_modifier() {

	$plugin = new Nda_Flatsome_Modifier();
	$plugin->run();

}
run_nda_flatsome_modifier();
