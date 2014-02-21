<?php
/**
 * Split Me tweaks and utils
 * You can add your tweaks and utils functions here.
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

/**
 * Better wp_title
 * @since 1.0.0
 */
function sme_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    $title .= get_bloginfo( 'name' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'splitme' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'sme_wp_title', 10, 2 );