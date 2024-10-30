<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nuttifox.com
 * @since             1.0.0
 * @package           Browser_Theme_Colors
 *
 * @wordpress-plugin
 * Plugin Name:       Browser Theme Colors
 * Plugin URI:        https://nuttifox.com/plugins/
 * Description:       Add the "theme-color" meta tag to your website. Compatible with (Android, iOS and Windows Phone).
 * Version:           1.0.0
 * Author:            Nuttifox
 * Author URI:        https://nuttifox.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       browser-theme-colors
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-browser-theme-colors-activator.php
 */
function activate_browser_theme_colors() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-browser-theme-colors-activator.php';
	Browser_Theme_Colors_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-browser-theme-colors-deactivator.php
 */
function deactivate_browser_theme_colors() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-browser-theme-colors-deactivator.php';
	Browser_Theme_Colors_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_browser_theme_colors' );
register_deactivation_hook( __FILE__, 'deactivate_browser_theme_colors' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-browser-theme-colors.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_browser_theme_colors() {

	$plugin = new Browser_Theme_Colors();
	$plugin->run();
	add_action( 'wp_head', 'nuttifox_btc_meta' );

}
function nuttifox_btc_admin_page() {
?>
	<h2>Nuttifox Browser Theme Color</h2>
	
	<form method="post" action="options.php"><?php
		settings_fields('nuttifox_btc');
		do_settings_sections('nuttifox_btc');?>
		<table class="form-table">
		<tbody>
		<h3>Pick or type the desired color</h3>
		<p class="description" id="tagline-description">You can use the colorpicker or type HEX color code</p>
		<p><input id="color" name="nuttifox_btc_color" class="color-input regular-text" value="<?php echo esc_attr(get_option('nuttifox_btc_color')); ?>"/></p>
		<p><input type="submit" value="Save Changes" class="button-primary" name="Submit"></p>
		</tbody></table>
	</form><table class="form-table">
		<tbody>
			<h3>Use the iframe below to check the color against your website</h3>
			<form>
			<input type="text" id="nuttifox-iframe-source" class="regular-text"/>
			<p class="description" id="tagline-description">Enter your domain name (Do not include http, https or www)</p>
			<input type="button" class="button-primary" value="Load my website" onclick="SetSrc()" />
			</tbody></table>
			</form>
			<!--Browser window demonstration -->
			<table class="form-table">
			<tbody>
			<div class='nuttifox-browser-window'>
				<div class='top-bar'>
				<div class='circles'>
					<div class="circle circle-red"></div>
					<div class="circle circle-yellow"></div>
					<div class="circle circle-green"></div>
				</div>
			</div>
			<div class='content'>
			<iframe class="nuttifox-iframe" id="nuttifox-iframe" src="https://nuttifox.com">
			</div>
			</tbody></table>
			<!--Browser window demonstration -->
<?php
}
function nuttifox_btc_meta() {
	
	$color = esc_attr(get_option('nuttifox_btc_color'));
		
	echo '<meta name="theme-color" content="'.$color.'">';
	echo '<meta name="msapplication-TileColor" content="'.$color.'">';
    echo '<meta name="msapplication-navbutton-color" content="'.$color.'">';
    echo '<meta name="apple-mobile-web-app-status-bar-style" content="'.$color.'">';

}
run_browser_theme_colors();