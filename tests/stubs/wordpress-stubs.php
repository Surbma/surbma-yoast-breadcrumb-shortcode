<?php
/**
 * WordPress stubs for Yoast Breadcrumb Shortcode unit tests.
 */

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', sys_get_temp_dir() . '/wp/' );
}

if ( ! function_exists( 'plugin_basename' ) ) {
    function plugin_basename( string $file ): string {
        return basename( dirname( $file ) ) . '/' . basename( $file );
    }
}

if ( ! function_exists( 'add_action' ) ) {
    function add_action( string $hook, $callback, int $priority = 10, int $args = 1 ): bool {
        return true;
    }
}

if ( ! function_exists( 'add_shortcode' ) ) {
    function add_shortcode( string $tag, $callback ): void {}
}

if ( ! function_exists( 'shortcode_atts' ) ) {
    function shortcode_atts( array $pairs, array $atts, string $shortcode = '' ): array {
        return array_merge( $pairs, array_intersect_key( $atts, $pairs ) );
    }
}

if ( ! function_exists( 'get_option' ) ) {
    function get_option( string $option, $default = false ) {
        return $default;
    }
}

if ( ! function_exists( '__' ) ) {
    function __( string $text, string $domain = 'default' ): string {
        return $text;
    }
}
