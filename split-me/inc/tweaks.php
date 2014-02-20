<?php
/**
 * Split Me tweaks and utils
 * You can add your tweaks and utils functions here.
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

/**
 * Add nice search tweak
 * @since 1.0.0
 */
add_theme_support( 'nice-search' );

/**
 * Add post formats support
 * @since 1.0.0
 * @todo move this tweak
 */
add_theme_support(
    'post-formats',
    array( 'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' )
);
