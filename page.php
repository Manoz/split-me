<?php
/**
 * Template for all Pages
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

get_header();

if ( have_posts() ) :

    while (have_posts()) : the_post();

        get_template_part( 'templates/content', 'page' );

    endwhile;

else :

    get_template_part( 'templates/content', 'nope' );

endif;

get_footer();
