<?php
/**
 * Main template file.
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

get_header(); ?>

<ul class="post-list">
<?php

    if ( have_posts() ) :

        while ( have_posts() ) : the_post();

            get_template_part( 'templates/content', get_post_format() );

        endwhile;

    else :

        get_template_part( 'templates/content', 'nope' );

    endif;

?>
</ul>

<div class="posts-links clearfix">
    <span class="sm-next"><?php next_posts_link('&larr;'. __('Older Entries', 'splitme') .' ', 0); ?></span>
    <span class="sm-prev"><?php previous_posts_link( __( 'Newer Entries', 'splitme' ). '&rarr;',0 ); ?></span>
</div>

<?php
get_footer();