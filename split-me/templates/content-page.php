<?php
/**
 * Template for pages content
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */
?>
<article <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h1>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <footer class="entry-footer">
        <div class="footer-metas">
            <?php
                $args = array(
                    'before'           => '<div class="sm-page-links">' . __( 'Pages:', 'splitme' ),
                    'after'            => '</div>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'separator'        => ' ',
                    'pagelink'         => '<span>%</span>',
                    'echo'             => 1
                );
                wp_link_pages($args);
             ?>
            <span class="author"><?php _e('By', 'splitme'); ?> <?php the_author_posts_link(); ?></span>
            <?php edit_post_link( __( 'Edit', 'splitme' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
    </footer>
</article>

<?php
comments_template('/templates/comments.php');
