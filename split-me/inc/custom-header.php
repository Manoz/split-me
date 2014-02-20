<?php
/**
 * Custom header functions
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

/**
 * Add custom header image support
 * @since 1.0.0
 */
$sme_custom_header = array(
    'width'         => 810,
    'height'        => 810,
    'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
    'uploads'       => true,
);
add_theme_support( 'custom-header', $sme_custom_header );

/**
 * Add a <style> tag for the custom header image.
 * @since 1.0.0
 */
function sme_add_style_custom_header() {
    if ( is_home() or !has_post_thumbnail() ) {
        $img = get_header_image();
        $custom_css = "
    .sm-inner-h {
        background: linear-gradient(
            to bottom, rgba(0, 0, 0, 0.4) 0%, transparent 30%),
            url('{$img}');
        background-position: center 30%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
    }
        ";
    }
    elseif ( has_post_thumbnail() ) {
        global $post;
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large' )[0];
        $custom_css = "
    .sm-inner-h {
        background: linear-gradient(
            to bottom, rgba(0, 0, 0, 0.4) 0%, transparent 30%),
            url('{$img}');
        background-position: center 30%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
    }
        ";
    }
    wp_add_inline_style( 'main', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'sme_add_style_custom_header' );
