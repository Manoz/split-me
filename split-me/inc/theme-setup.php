<?php
/**
 * Theme setup
 *
 * @package Split Me
 * @since Split Me 1.0.1
 */

/*
 * Custom Excerpt length
 * Custom Excerpt tag
 */
function sme_custom_excerpt_length( $length ) {
    return 25; // Excerpt length
}
add_filter( 'excerpt_length', 'sme_custom_excerpt_length', 999 );

// Inside the excerpt, replace the default [...] by ...
function sme_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'sme_excerpt_more');

// Content width
if (!isset($content_width)) {$content_width = 730;}
