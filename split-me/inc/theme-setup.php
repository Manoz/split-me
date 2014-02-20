<?php
/**
 * Theme setup
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

/*
 * Custom Excerpt length
 * Custom Excerpt tag
 */
function custom_excerpt_length( $length ) {
    return 25; // Excerpt length
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Inside the excerpt, replace the default [...] by ...
function sme_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'sme_excerpt_more');

// Content width
if (!isset($content_width)) {$content_width = 730;}

// Custom background
$args = array(
    'default-color'          => 'fdf6e3',
);
add_theme_support( 'custom-background', $args );