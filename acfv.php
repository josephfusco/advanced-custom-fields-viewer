<?php
/*
 * Plugin Name: Advanced Custom Fields Viewer
 * Version: 1.1.4
 * Plugin URI: http://josephfus.co/
 * Description: View Advanced Custom Fields data on the front end of your theme while developing.
 * Author: Joseph Fusco
 * Author URI: http://josephfus.co/
 * Requires at least: 3.9
 * Tested up to: 4.1.1
 *
 * @package WordPress
 * @author Joseph Fusco
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) exit;

global $acfv;

require_once( plugin_dir_path( __FILE__ ) . 'admin/options.php' );
require_once( plugin_dir_path( __FILE__ ) . 'viewer.php' );

function acfv( $arg_custom = NULL ){

	global $acfv;

	$acfv = $arg_custom;

}