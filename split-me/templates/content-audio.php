<?php
/**
 * Template for 'audio' post format.
 *
 * @package Split Me
 * @since Split Me 2.0
 */

if ( !is_singular() ) :
$comm = get_comments_number();

?>

<li <?php post_class('clearfix'); ?> >
    <a class="post-link" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

    <div class="sm-content">
        <?php the_content(''); ?>
    </div>

    <div class="metas">
        <?php if( $comm != 0 ) { ?>
        <span class="comments">
            <a href="<?php the_permalink(); ?>#comments"><i class="icn-chat"></i></a>
        </span>
        <?php } ?>

        <span class="date">
            <i class="icn-calendar" title="<?php _e('Published on ', 'splitme'); echo get_the_date(); ?>">
                <time class="published" datetime="<?php echo get_the_time('c'); ?>"></time>
            </i>
        </span>

        <span class="author">
            <a title="<?php _e('by ', 'splitme'); the_author_meta( 'display_name' ); ?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="icn-user"></i></a>
        </span>
    </div>
</li>

<?php else: ?>

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
                <?php if( get_the_category() ) { ?><span class="category"><?php _e('In', 'splitme'); ?> <?php the_category(' &middot; '); ?></span><?php } ?>
                <span class="tag-links"><?php
                    $tags_list = get_the_tag_list( '', __( ' ', 'splitme' ) );
                    if ( $tags_list ) :

                        printf( __( 'Tags: %1$s', 'splitme' ), $tags_list );
                    else :
                        _e( 'No tags', 'splitme' ) ;
                endif; ?></span>
                <?php edit_post_link( __( 'Edit', 'splitme' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
        </footer>
    </article>

<?php endif;
