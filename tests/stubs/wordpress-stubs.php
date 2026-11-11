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

if ( ! function_exists( 'wp_kses' ) ) {
    /**
     * Minimal wp_kses stub: strips disallowed tags and event-handler attributes.
     *
     * @param string               $content      Content to filter.
     * @param array<string, mixed> $allowed_html Allowed tags map.
     */
    function wp_kses( string $content, array $allowed_html ): string {
        $allowed_tags = array_keys( $allowed_html );
        $tag_list     = implode( '|', array_map( static function ( $tag ) {
            return preg_quote( $tag, '#' );
        }, $allowed_tags ) );

        // Remove disallowed tags (opening and closing), keep allowed ones.
        $content = preg_replace(
            '#<(?!/?(' . $tag_list . ')\b)[^>]*>#i',
            '',
            $content
        ) ?? $content;

        // Strip inline event handlers and javascript: URLs.
        $content = preg_replace( '/\s+on\w+\s*=\s*(["\']).*?\1/iu', '', $content ) ?? $content;
        $content = preg_replace( '/\s+on\w+\s*=\s*[^\s>]+/iu', '', $content ) ?? $content;
        $content = preg_replace( '/\s(href|src)\s*=\s*(["\'])\s*javascript:[^"\']*\2/iu', '', $content ) ?? $content;

        return $content;
    }
}
