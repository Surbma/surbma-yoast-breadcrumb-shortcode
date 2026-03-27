<?php
/**
 * Tests for Surbma | Yoast SEO Breadcrumb Shortcode plugin.
 *
 * Validates plugin header, shortcode function existence, and the
 * fallback messages returned when Yoast SEO is not active.
 *
 * Runs standalone — no WordPress installation required.
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ShortcodeTest extends TestCase {

    public function test_plugin_file_exists(): void {
        $this->assertFileExists( dirname( __DIR__, 2 ) . '/surbma-yoast-breadcrumb-shortcode.php' );
    }

    public function test_plugin_name_header_present(): void {
        $content = file_get_contents( dirname( __DIR__, 2 ) . '/surbma-yoast-breadcrumb-shortcode.php' );
        $this->assertStringContainsString( 'Plugin Name:', $content );
        $this->assertStringContainsString( 'Yoast', $content );
    }

    public function test_text_domain_declared(): void {
        $content = file_get_contents( dirname( __DIR__, 2 ) . '/surbma-yoast-breadcrumb-shortcode.php' );
        $this->assertStringContainsString( 'Text Domain: surbma-yoast-breadcrumb-shortcode', $content );
    }

    public function test_direct_access_guard_present(): void {
        $content = file_get_contents( dirname( __DIR__, 2 ) . '/surbma-yoast-breadcrumb-shortcode.php' );
        $this->assertStringContainsString( 'ABSPATH', $content );
    }

    public function test_shortcode_callback_function_exists(): void {
        $this->assertTrue( function_exists( 'surbma_yoast_breadcrumb_shortcode_shortcode' ) );
    }

    /**
     * When Yoast SEO is not installed (WPSEO_Breadcrumbs absent), the callback
     * must return an install-prompt message.
     */
    public function test_shortcode_returns_install_message_without_yoast(): void {
        $result = surbma_yoast_breadcrumb_shortcode_shortcode( [] );
        $this->assertIsString( $result );
        $this->assertStringContainsString( 'Yoast SEO', $result );
    }

    /**
     * Default shortcode attributes: before is a div.breadcrumb, after is /div.
     */
    public function test_shortcode_default_before_attribute(): void {
        $defaults = shortcode_atts( [
            'before' => '<div class="breadcrumb" itemprop="breadcrumb">',
            'after'  => '</div>',
        ], [] );
        $this->assertStringContainsString( 'breadcrumb', $defaults['before'] );
    }

    public function test_shortcode_default_after_attribute(): void {
        $defaults = shortcode_atts( [
            'before' => '<div class="breadcrumb" itemprop="breadcrumb">',
            'after'  => '</div>',
        ], [] );
        $this->assertSame( '</div>', $defaults['after'] );
    }

    /**
     * Custom shortcode attributes override defaults.
     */
    public function test_shortcode_custom_before_attribute(): void {
        $atts = shortcode_atts( [
            'before' => '<div class="breadcrumb" itemprop="breadcrumb">',
            'after'  => '</div>',
        ], [ 'before' => '<nav>' ] );
        $this->assertSame( '<nav>', $atts['before'] );
    }
}
