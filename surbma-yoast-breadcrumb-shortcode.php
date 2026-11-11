<?php

/*
Plugin Name: Surbma | Yoast SEO Breadcrumb Shortcode
Plugin URI: http://surbma.com/wordpress-plugins/
Description: A simple shortcode to include Yoast SEO's breadcrumb function into WordPress.

Version: 1.2.1

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-yoast-breadcrumb-shortcode
Domain Path: /languages/
*/

defined( 'ABSPATH' ) || exit;

add_action( 'init', static function () {
	load_plugin_textdomain( 'surbma-yoast-breadcrumb-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
} );

/**
 * Allowed HTML tags/attributes for shortcode before/after wrappers.
 *
 * @return array<string, array<string, bool>>
 */
function surbma_yoast_breadcrumb_shortcode_allowed_html() {
	$attrs = array(
		'class'      => true,
		'id'         => true,
		'itemprop'   => true,
		'itemscope'  => true,
		'itemtype'   => true,
		'role'       => true,
		'aria-label' => true,
	);

	return array(
		'div'     => $attrs,
		'nav'     => $attrs,
		'span'    => $attrs,
		'p'       => $attrs,
		'ol'      => $attrs,
		'ul'      => $attrs,
		'li'      => $attrs,
		'section' => $attrs,
		'header'  => $attrs,
	);
}

/**
 * [yoast-breadcrumb] shortcode callback.
 *
 * @param array|string $atts Shortcode attributes.
 * @return string
 */
function surbma_yoast_breadcrumb_shortcode_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'before' => '<div class="breadcrumb" itemprop="breadcrumb">',
			'after'  => '</div>',
		),
		$atts,
		'yoast-breadcrumb'
	);

	$allowed_html = surbma_yoast_breadcrumb_shortcode_allowed_html();
	$before       = wp_kses( $atts['before'], $allowed_html );
	$after        = wp_kses( $atts['after'], $allowed_html );

	$wpseo_titles        = get_option( 'wpseo_titles' );
	$breadcrumbs_enabled = is_array( $wpseo_titles ) && ! empty( $wpseo_titles['breadcrumbs-enable'] );

	if ( class_exists( 'WPSEO_Breadcrumbs' ) && $breadcrumbs_enabled ) {
		return WPSEO_Breadcrumbs::breadcrumb( $before, $after, false );
	}

	if ( class_exists( 'WPSEO_Breadcrumbs' ) ) {
		return __( '<p>Please enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
	}

	return __( '<p>Please install <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">Yoast SEO</a> plugin and enable the breadcrumb option to use this shortcode!</p>', 'surbma-yoast-breadcrumb-shortcode' );
}
add_shortcode( 'yoast-breadcrumb', 'surbma_yoast_breadcrumb_shortcode_shortcode' );
