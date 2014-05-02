<?php
/**
 * Split Me - functions and definitions
 *
 * If you want to add more functions, don't add them in this file.
 * Keep it clean. I created a custom function file.
 * You can uncomment the last line and add your functions
 * inside the '/inc/custom.php' file :)
 *
 * Also, be careful with your functions names.
 * Don't use 'sme_your_function()' to avoid conflicts \o/
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

require_once locate_template( '/inc/init.php' );          // Lang, nav and some theme support
require_once locate_template( '/inc/theme-setup.php' );   // Theme config (excerpt, content width,...)
require_once locate_template( '/inc/scripts.php' );       // Scripts and stylesheets
require_once locate_template( '/inc/tweaks.php' );        // Tweaks and utils
require_once locate_template( '/inc/comments.php' );      // Custom comments template
require_once locate_template( '/inc/custom-header.php' ); // Custom header stuff
require_once locate_template( '/inc/navigation.php' );    // Custom walker for better wp_nav_menu
require_once locate_template( '/inc/pagination.php' );    // Better pagination
require_once locate_template( '/inc/customizer.php' );    // Theme customizer @since 2.4.4

// require_once locate_template('/inc/custom.php');        // Your Custom functions
