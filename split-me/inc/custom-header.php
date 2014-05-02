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
 * Thanks to Julio Potier > ‏@BoiteAWeb for the trick
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', 'sme_add_style_custom_header' );
function sme_add_style_custom_header() {
    global $post;
    $img = !is_home() && is_a( $post, 'WP_Post' ) && has_post_thumbnail() ?
        wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ) :
        get_header_image();
    $title_color      = get_header_textcolor();
    $menu_icn_color   = get_theme_mod( 'sme_menu_icn_color' );
    $post_title_color = get_theme_mod( 'sme_post_title_color' );
    $text_color       = get_theme_mod( 'sme_text_color' );
    $post_icn_color   = get_theme_mod( 'sme_post_icn_color' );

    if( $img ) {
        $custom_css = "
       .sm-inner-h {
           background: transparent url('%s');
           background-position: 50%% 30%%;
           background-size: cover;
       }

       .site-title a, .site-desc {color: #$title_color;}
       .menu-icn {background: $menu_icn_color;}
       .menu-icn:before, .menu-icn:after {background: $menu_icn_color;}
       .post-list li .post-link {color: $post_title_color;}
       body {color: $text_color}
       .metas span, .metas span a {color: $post_icn_color}
       ";
   } else {
        $custom_css = "

       .site-title a, .site-desc {color: #$title_color;}
       .menu-icn {background: $menu_icn_color;}
       .menu-icn:before, .menu-icn:after {background: $menu_icn_color;}
       .post-list li .post-link {color: $post_title_color;}
       body {color: $text_color}
       .metas span, .metas span a {color: $post_icn_color}
       ";

   }

    if( $img || $title_color || $menu_icn_color || $post_title_color || $text_color ) {
        list( $img ) = (array)$img;
        wp_add_inline_style( 'main', sprintf( $custom_css, $img ) );
    }
}
