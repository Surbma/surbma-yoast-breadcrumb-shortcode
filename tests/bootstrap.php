<?php
/**
 * PHPUnit bootstrap for Surbma | Yoast SEO Breadcrumb Shortcode plugin.
 */

if ( file_exists( __DIR__ . '/../vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php' ) ) {
    require_once __DIR__ . '/../vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php';
}

require_once __DIR__ . '/stubs/wordpress-stubs.php';

if ( ! defined( 'SURBMA_YOAST_BC_LOADED' ) ) {
    define( 'SURBMA_YOAST_BC_LOADED', true );
    require dirname( __DIR__ ) . '/surbma-yoast-breadcrumb-shortcode.php';
}
