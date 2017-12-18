<?php

/*
Plugin Name: Yoast SEO Breadcrumb Shortcode
Plugin URI: http://surbma.com/wordpress-plugins/
Description: A simple shortcode to include Yoast SEO's breadcrumb function into WordPress.

Version: 1.0.3

Author: Surbma
Author URI: http://surbma.com/

License: GPLv2

Text Domain: surbma-yoast-breadcrumb-shortcode
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
	die( 'Good try! :)' );
}

// Localization
function surbma_yoast_breadcrumb_shortcode_init() {
	load_plugin_textdomain( 'surbma-yoast-breadcrumb-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'surbma_yoast_breadcrumb_shortcode_init' );

function surbma_yoast_breadcrumb_shortcode_shortcode( $atts ) {
	extract( shortcode_atts( array(
		"before" => '<div class="breadcrumb" itemprop="breadcrumb">',
		"after" => '</div>'
	), $atts ) );

	$wpseo_internallinks = get_option( 'wpseo_internallinks' );

	if ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] == 1 ) {
		return yoast_breadcrumb( $before, $after, false );
	}
	elseif ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] != 1 ) {
		return __( '<p>Please enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
	}
	else {
		return __( '<p>Please install <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> plugin and enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
	}
}
add_shortcode( 'yoast-breadcrumb', 'surbma_yoast_breadcrumb_shortcode_shortcode' );
