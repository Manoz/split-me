<?php
/**
 * Template for Author Archive pages
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */
get_header();

if ( have_posts() ) :

    the_post(); ?>

    <header class="archive-header">
        <h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'splitme' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
    </header>

    <?php
    rewind_posts();

    if ( get_the_author_meta( 'description' ) ) : ?>

    <div class="author-info">
        <div class="author-avatar">
            <?php
            $author_bio_avatar_size = apply_filters( 'sme_author_bio_avatar_size', 70 );
            echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
            ?>
        </div>
        <div class="author-description">
            <h2><?php printf( __( 'About %s', 'splitme' ), get_the_author() ); ?></h2>
            <p><?php the_author_meta( 'description' ); ?></p>
        </div>
    </div>

    <?php endif; ?>

    <ul class="post-list">
    <?php

        while ( have_posts() ) : the_post();

            get_template_part( 'templates/content', get_post_format() );

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