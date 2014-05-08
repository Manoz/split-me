<?php
/**
 * Split me - constants
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

function sme_setup() {

    // Set the content width
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 730;
    }

    // Load our textdomain
    load_theme_textdomain( 'splitme', get_template_directory() . '/lang' );

    register_nav_menus(array(
        'primary_navigation' => __( 'Main nav', 'splitme' ),
    ));

    // Add some theme support
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );

    // Add post formats
    add_theme_support( 'post-formats', array(
        'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
    ) );

    /**
     * Add custom background
     * @since 1.0.0
     */
    add_theme_support( 'custom-background', apply_filters( 'sme_custom_background', array(
        'default-color' => 'fdf6e3',
    ) ) );

    /**
     * Add custom background
     * @see /inc/custom-header.php
     * @since 1.0.0
     */
    $sme_custom_header = array(
        'width'              => 1200,
        'height'             => 1200,
        'default-image'      => get_template_directory_uri() . '/images/default-header-2.jpg',
        'default-text-color' => 'e7e7e7',
        'uploads'            => true,
    );
    add_theme_support( 'custom-header', $sme_custom_header );

    // Add editor styles
    add_editor_style( '/css/editor-style.min.css' );

}
add_action( 'after_setup_theme', 'sme_setup' );
