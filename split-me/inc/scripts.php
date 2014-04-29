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
    $prot    = is_ssl() ? 'https' : 'http';
    // Theme options
    global $options;
    $options = get_option( 'sme_options' );

    wp_enqueue_style('normalize',  get_template_directory_uri() . '/css/normalize.min.css', false, '2.4.3');
    wp_enqueue_style('main',       get_template_directory_uri() . '/css/main.min.css', false, '2.4.3' );
    wp_enqueue_style('sme_fonts',  get_template_directory_uri() . '/css/fonts.min.css', false, '2.4.3');
    wp_enqueue_style('webfont',    "$prot://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,600" );

    // Register color schemes but don't enqueue them until the user has chosen one.
    wp_register_style('sme_tm_red', get_template_directory_uri() . '/css/tm-red.css', false, '2.4.3' );
    wp_register_style('sme_tm_ora', get_template_directory_uri() . '/css/tm-orange.css', false, '2.4.3' );
    wp_register_style('sme_tm_gre', get_template_directory_uri() . '/css/tm-green.css', false, '2.4.3' );

    if( isset( $options['sme_colors'] ) ) :
        if( $options['sme_colors'] == 'red' ) {
            wp_enqueue_style( 'sme_tm_red' );
        } elseif( $options['sme_colors'] == 'orange' ) {
            wp_enqueue_style( 'sme_tm_ora' );
        } elseif( $options['sme_colors'] == 'green' ) {
            wp_enqueue_style( 'sme_tm_gre' );
        }
    endif;
}
add_action( 'wp_enqueue_scripts', 'sme_styles' );

function sme_scripts() {

    if (is_single() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script(
        'sme_scripts',
        get_template_directory_uri() . '/js/scripts.min.js',
        array( 'jquery' ),
        '2.4.3',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'sme_scripts' );
