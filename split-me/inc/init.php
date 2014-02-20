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
    add_editor_style( '/css/editor-style.css' );

}
add_action( 'after_setup_theme', 'sme_setup' );

/**
 * Function is_element_empty()
 * See navigation.php line 62
 * @since 1.0.0
 */
function is_element_empty($element) {
    $element = trim($element);
    return empty($element) ? false : true;
}
