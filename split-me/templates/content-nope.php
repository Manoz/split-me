<?php
/**
 * Template used if there is no post
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */
?>
<div class="empty-content">
    <?php if ( is_search() ) : ?>

        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords. I offer you a motherf*cking badass search form : ', 'splitme' ); ?></p>
        <?php get_search_form();

        else : ?>

        <p><?php _e( 'Oops, I\'m not a genius but I think <em>"what you\'re looking for"</em> is not here. Or I don\'t see it.
        <br>The first thing that comes to my mind is that they are aliens who have stolen <em>"what you\'re looking for"</em>. I\'m not an expert but this is what seems the most logical.', 'splitme' ); ?> </p>

        <p><?php _e( 'Or, <em>"what you\'re looking for"</em> does not exist. And if it does not exist, we can consider that this is a <strong>paradox</strong>. Right?', 'splitme' ); ?> </p>

        <p><?php _e( 'Anyway.<br>You can use this little search form to find <em>"what you\'re looking for"</em>.<br>It\'s simple, fast and efficient.<br>I\'ll watch you while you recover <em>"what you\'re looking for"</em>. I think I need a little rest.', 'splitme' ); ?> </p>
        <p><?php _e( 'Good luck :&#41;', 'splitme'); ?> </p>
        <?php
        get_search_form();

    endif; ?>
</div>