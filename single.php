<?php
/**
 * The Template for displaying all single posts
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

get_header();

while ( have_posts() ) : the_post();

    get_template_part('templates/content', get_post_format());
    ?>

    <div class="post-pagination clearfix">
        <div class="post-prev"><?php next_post_link('%link', '&larr; '. __('Previous post','splitme'), false); ?></div>
        <div class="post-next"><?php previous_post_link('%link', __('Next post','splitme'). ' &rarr;', false); ?></div>
    </div>

    <?php
    if ( comments_open() || get_comments_number() ) {
        comments_template('/templates/comments.php');
    }

endwhile;

get_footer();