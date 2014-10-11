<?php
/**
 * Global searchform
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field" placeholder="<?php _e('Search', 'splitme'); ?>">
    <button type="submit" class="search-btn"><?php _e( 'Search...', 'splitme' ) ?></button>
</form>
