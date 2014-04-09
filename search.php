<?php
/**
 * Template for Search results pages
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

get_header();

if ( have_posts() ) : ?>

    <header class="archive-header">
        <h1 class="archive-title"><?php printf( __( 'Search Results for: %s', 'splitme' ), get_search_query( '', false ) ); ?></h1>
    </header>

    <ul class="post-list">
    <?php
        while ( have_posts() ) : the_post();

            get_template_part('templates/content', get_post_format());

        endwhile;
    ?>
    </ul>

    <div class="posts-links clearfix">
        <span class="sm-next"><?php next_posts_link('&larr;'. __('Older Entries', 'splitme') .' ', 0); ?></span>
        <span class="sm-prev"><?php previous_posts_link( __( 'Newer Entries', 'splitme' ). '&rarr;',0 ); ?></span>
    </div>

<?php else :

    get_template_part( 'templates/content', 'nope' );

endif;

get_footer();
