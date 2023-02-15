<?php
/**
 * Plugin Name: SaasPricing
 * Description: Ultimate pricing & comparison widget for Elementor. Three table options, customizable, scrollable, switchable, timer, ribbon, reviews, tooltip, mirror & more! Get the ultimate pricing experience with Saaspricing
 * Version: 1.0.0
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Elementor tested up to: 3.8.0
 * Author: Debuggers Studio
 * Author URI: https://debuggersstudio.com
 * Text Domain: saaspricing
 * Domain Path: /languages
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'SAAS_PRICING__FILE__', __FILE__ ); 
define( 'SAAS_PRICING__DIR__', __DIR__ );
define( 'SAAS_PRICING_URL', plugins_url( '/', SAAS_PRICING__FILE__ ) );
define( 'SAAS_PRICING_ASSETS_URL', SAAS_PRICING_URL . 'assets/' ); 

function saasp_load_plugin_data() {

	require_once( SAAS_PRICING__DIR__ . '/includes/plugin.php' );
    
	\Saas_Pricing_Table\Saas_Pricing::instance();

}
add_action( 'plugins_loaded', 'saasp_load_plugin_data' );