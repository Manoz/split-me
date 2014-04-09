<?php
/**
 * Split me - constants
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

function sme_setup() {
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
     * The function is in /inc/custom-header.php
     * @since 1.0.0
     */
    $sme_custom_header = array(
        'width'         => 810,
        'height'        => 810,
        'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
        'uploads'       => true,
    );
    add_theme_support( 'custom-header', $sme_custom_header );

    // Add editor styles
    add_editor_style( '/css/editor-style.css' );

}
add_action( 'after_setup_theme', 'sme_setup' );

/**
 * Function is_element_empty()
 * See navigation.php line 50
 * @since 1.0.0
 */
function sme_is_element_empty($element) {
    $element = trim($element);
    return empty($element) ? false : true;
}
