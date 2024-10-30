<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://nuttifox.com
 * @since      1.0.0
 *
 * @package    Browser_Theme_Colors
 * @subpackage Browser_Theme_Colors/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Browser_Theme_Colors
 * @subpackage Browser_Theme_Colors/includes
 * @author     Nuttifox <dev@nuttifox.com>
 */
class Browser_Theme_Colors_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'browser-theme-colors',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
