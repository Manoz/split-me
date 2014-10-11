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
function sme_custom_excerpt_length( $length ) {
    $value = get_theme_mod( 'sme_excerpt_length' );

    return $value; // Excerpt length
}
add_filter( 'excerpt_length', 'sme_custom_excerpt_length', 999 );

// Inside the excerpt, replace the default [...] by ...
function sme_excerpt_more( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'sme_excerpt_more');

