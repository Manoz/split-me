<?php
/**
 * Enqueue scripts and stylesheets
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

/**
 * I chose to create multiple files. It is easier to navigate and this allows
 * to not load styles that do not have to be loaded if they are not useful on the page.
*/

function sme_styles() {
    // Protocol (http or https) for webfonts
    $prot = is_ssl() ? 'https' : 'http';

    wp_register_style('normalize',  get_template_directory_uri() . '/css/a-normalize.css', false, '1.0.1');
    wp_register_style('main',       get_template_directory_uri() . '/css/main.css', false, '1.0.1' );
    wp_register_style('sme_fonts',  get_template_directory_uri() . '/css/fonts.css', false, '1.0.1');
    wp_register_style('webfont',    "$prot://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,600" );

    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'main' );
    wp_enqueue_style( 'sme_fonts' );
    wp_enqueue_style( 'webfont' );

}
add_action( 'wp_enqueue_scripts', 'sme_styles' );

function sme_scripts() {

    if (is_single() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script(
        'sme_scripts',
        get_template_directory_uri() . '/js/scripts.js',
        array( 'jquery' ),
        '1.0.1',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'sme_scripts' );
