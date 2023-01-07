<?php
/**
 * Plugin Name: Saaspricing
 * Description: Hello
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.3
 * Elementor tested up to: 3.8.0
 * Author: Debuggers Studio
 * Author URI: 
 * Text Domain: saaspricing
 * Domain Path: /languages
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'SAAS_PRICINNG_TXT_DOMAIN', 'saaspricing'); 
define( 'SAAS_PRICING__FILE__', __FILE__ ); 
define( 'SAAS_PRICING__DIR__', __DIR__ );
define( 'SAAS_PRICING_URL', plugins_url( '/', SAAS_PRICING__FILE__ ) );
define( 'SAAS_PRICING_ASSETS_URL', SAAS_PRICING_URL . 'assets/' ); 


function saasp_load_plugin_data() {

	require_once( SAAS_PRICING__DIR__ . '/includes/plugin.php' );
    
	\SaasPricingTable\SaasPricing::instance();

}
add_action( 'plugins_loaded', 'saasp_load_plugin_data' );
