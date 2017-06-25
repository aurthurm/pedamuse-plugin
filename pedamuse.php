<?php
/*
 * Plugin Name: Pedamuse Pro
 * Version: 1.0
 * Plugin URI: http://www.aurthurmusendame.com/
 * Description: This Plugin adds more Functionality to the Pedamuse Theme and its a requirement otherwise you wont be able to implement the theme to its awesomeness.
 * Author: Aurthur Musendame
 * Author URI: http://www.aurthurmusendame.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: pedamuse
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Aurthur Musendame
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Defines constastants
 */
define( 'PEDAMUSE_DIR', plugin_dir_path( __FILE__ ) );

// Load plugin CMB2
if ( file_exists( dirname( __FILE__ ) . '/libraries/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/libraries/CMB2/init.php';
    // echo " loaded ";
    // die();
} elseif ( !file_exists( dirname( __FILE__ ) . '/libraries/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/libraries/CMB2/init.php';
   // echo " failed ";
   // die();
}

// Load plugin class files
require_once( 'includes/class-pedamuse.php' );
require_once( 'includes/class-pedamuse-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-pedamuse-admin-api.php' );
require_once( 'includes/lib/class-pedamuse-post-type.php' );
require_once( 'includes/lib/class-pedamuse-taxonomy.php' );

// Load pedamuse custom post types, taxonomies and metaboxes
require_once PEDAMUSE_DIR . 'includes/pedamuse-post-types.php'; 
require_once PEDAMUSE_DIR . 'includes/pedamuse-metaboxes.php'; 

// Load pedamuse custom fields for page header info section
require_once PEDAMUSE_DIR . 'includes/pedamuse-pages-custom-fields.php'; 
/**
 * Returns the main instance of Pedamuse to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Pedamuse
 */
function Pedamuse () {
	$instance = Pedamuse::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Pedamuse_Settings::instance( $instance );
	}

	return $instance;
}

Pedamuse();