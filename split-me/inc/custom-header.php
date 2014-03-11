<?php
/**
 * Custom header functions
 * If we use a global $post; in a 404 or an archive page,
 * the $post is NULL. We should use if ( is_a( $post, 'WP_Post' ) ) instead.
 * See : https://twitter.com/BoiteAWeb/status/442783684899254273 (french tweets)
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

/**
 * Add a <style> tag for the custom header image.
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', 'sme_add_style_custom_header' );
function sme_add_style_custom_header() {
    global $post;
    $img =  ( !is_home() && is_a( $post, 'WP_Post' ) && has_post_thumbnail() ) ?
        wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0] :
        get_header_image();
    $custom_css = "
    .sm-inner-h {
        background: linear-gradient(
            to bottom, rgba(0, 0, 0, 0.4) 0%%, transparent 30%%),
            url('%s');
        background-position: center 30%%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
    }
    ";
    if( $img ) {
        wp_add_inline_style( 'main', sprintf( $custom_css, $img ) );
    }
}