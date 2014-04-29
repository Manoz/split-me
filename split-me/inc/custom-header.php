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
    $img =  !is_home() && is_a( $post, 'WP_Post' ) && has_post_thumbnail() ?
        wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ) :
        get_header_image();
    $custom_css = "
   .sm-inner-h {
       background: transparent url('%s');
       background-position: 50%% 30%%;
       background-size: cover;
   }
   ";
    if( $img ) {
        list( $img ) = (array)$img;
        wp_add_inline_style( 'main', sprintf( $custom_css, $img ) );
    }
}

/**
 * Output our theme options in a <style> tag
 * @see /inc/admin.php
 * @since Split Me 2.0
*/
add_action( 'wp_enqueue_scripts', 'sme_add_style_theme_layout' );
function sme_add_style_theme_layout() {
    global $options;
    $option = get_option( 'sme_options' );

    if( $option['sme_layout'] == 'top' ) {
        $layout_css = "
    .sm-inner-h {
        position: initial;
        width: 100%;
        height: 350px;
    }

    .sm-nav {
        height: 350px;
    }

    .site-title,
    .site-desc {
        margin-left: 0;
        text-align: center;
    }

    .main {
        width: 75%;
        margin: 0 auto;
    }

    .sm-f {
        position: initial;
        width: 100%;
        text-align: center;
        text-shadow: none;
        color: #657b83;
        background: none;
        background-color: #f5efde;
        background-color: rgba(0,0,0,.02);
    }

    .sm-f a {color: #3465a4;}

        ";
        wp_add_inline_style( 'main', $layout_css );
    }
}