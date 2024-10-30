<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nuttifox.com
 * @since      1.0.0
 *
 * @package    Browser_Theme_Colors
 * @subpackage Browser_Theme_Colors/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Browser_Theme_Colors
 * @subpackage Browser_Theme_Colors/admin
 * @author     Nuttifox <dev@nuttifox.com>
 */
class Browser_Theme_Colors_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/browser-theme-colors-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'huebee', plugin_dir_url( __FILE__ ) . 'css/huebee.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/browser-theme-colors-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'hubee', plugin_dir_url( __FILE__ ) . 'js/huebee.pkgd.min.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Create menu entry the admin area.
	 *
	 * @since    1.0.0
	 */
	public function create_menu() {
		if (!function_exists('nuttifox_panel')) {
			function nuttifox_panel() {
				add_menu_page(__( 'Nuttifox'), __( 'Nuttifox'), 'manage_options', 'nuttifox-panel', 'nuttifox_panel');
				}
			nuttifox_panel();
		}
    add_submenu_page('nuttifox-panel',__('Browser Theme Color'), __('Browser Theme Color'),'manage_options', 'nuttifox-btc-options', 'nuttifox_btc_admin_page' );
	remove_submenu_page( 'nuttifox-panel', 'nuttifox-panel' );
	}
	/**
	 * Register settings variables
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {
	register_setting( 'nuttifox_btc', 'nuttifox_btc_color' );
	}

}
