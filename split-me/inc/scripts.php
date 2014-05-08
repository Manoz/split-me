<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

// Styles stuff
add_action( 'wp_enqueue_scripts', 'sme_styles' );
function sme_styles() {
    // Protocol (http or https) for webfonts
    $prot = is_ssl() ? 'https' : 'http';

    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.min.css', false, '2.4.6');
    wp_enqueue_style( 'main',      get_template_directory_uri() . '/css/main.min.css', false, '2.4.6' );
    wp_enqueue_style( 'sme_fonts', get_template_directory_uri() . '/css/fonts.min.css', false, '2.4.6');
    wp_enqueue_style( 'webfont',   "$prot://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,600" );

}

// Scripts stuff
add_action( 'wp_enqueue_scripts', 'sme_scripts' );
function sme_scripts() {

    if (is_single() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script(
        'sme_scripts',
        get_template_directory_uri() . '/js/scripts.min.js',
        array( 'jquery' ),
        '2.4.6',
        true
    );
}

