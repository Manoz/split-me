<?php
/**
 * Split Me Footer
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */
?>
    </div>
    <footer class="sm-f">
        <small class="copyright">&copy; <?php echo date( 'Y' ); ?> - <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>" ><?php bloginfo('name'); ?></a></small>

        <div class="sm-social-nav">
            <?php
            if ( has_nav_menu( 'social_navigation' ) ) :

                wp_nav_menu( array(
                    'theme_location'  => 'social_navigation',
                    'container'       => 'div',
                    'container_class' => 'social-wrap',
                    'menu_class'      => 'sm-social-menu',
                    'link_before'     => '<span class="screen-reader-text">',
                    'link_after'      => '</span>',
                    'depth'           => 1
                ));

            endif;
            ?>
        </div>
    </footer>


<?php wp_footer(); ?>

</body>
</html>