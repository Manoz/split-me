<?php
/**
 * Clean wp_head()
 *
 * @package Split Me
 * @since Split Me 1.0.0
 *
 * Remove feed links
 * Remove extra feed links
 * Remove RSD & Windows Live Writer links
 * Remove WP version
 * Remove nav links
 */

function sme_clean_head() {
    // Originally from http://wpengineer.com/1438/wordpress-header/
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
        )
    );

    if (!class_exists('WPSEO_Frontend')) {
        remove_action('wp_head', 'rel_canonical');
        add_action('wp_head', 'sme_rel_canonical');
    }
}

function sme_rel_canonical() {
    global $wp_the_query;

    if (!is_singular()) {
        return;
    }

    if (!$id = $wp_the_query->get_queried_object_id()) {
        return;
    }

    $link = get_permalink($id);
    echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}
add_action('init', 'sme_clean_head');

/**
 * Remove the WordPress version from RSS feeds
 */
add_filter('the_generator', '__return_false');

/**
 * Clean up language_attributes() used in <html> tag
 *
 * Remove dir="ltr"
 */
function sme_lang_attr() {
    $attributes = array();
    $output = '';

    if (is_rtl()) {
        $attributes[] = 'dir="rtl"';
    }

    $lang = get_bloginfo('language');

    if ($lang) {
        $attributes[] = "lang=\"$lang\"";
    }

    $output = implode(' ', $attributes);
    $output = apply_filters('sme_lang_attr', $output);

    return $output;
}
add_filter('language_attributes', 'sme_lang_attr');

/**
 * Clean up output of stylesheet <link> tags
 */
function sme_clean_style($input) {
    preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
    // Only display media if it is meaningful
    $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
    // Add a 4 spaces indent before <link...
    return '    <link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
add_filter('style_loader_tag', 'sme_clean_style');

/**
 * Add and remove body_class() classes
 */
function sme_body_class($classes) {
    // Add post/page slug
    if (is_single() || is_page() && !is_front_page()) {
        $classes[] = basename(get_permalink());
    }

  // Remove unnecessary classes
    $home_id_class = 'page-id-' . get_option('page_on_front');
    $remove_classes = array(
        'page-template-default',
        $home_id_class
    );
    $classes = array_diff($classes, $remove_classes);

    return $classes;
}
add_filter('body_class', 'sme_body_class');

/**
 * Wrap embedded media as suggested by Readability
 *
 * @link https://gist.github.com/965956
 * @link http://www.readability.com/publishers/guidelines#publisher
 */
function sme_embed_wrap($cache, $url, $attr = '', $post_ID = '') {
    return '<div class="entry-content-asset">' . $cache . '</div>';
}
add_filter('embed_oembed_html', 'sme_embed_wrap', 10, 4);

/**
 * Remove unnecessary self-closing tags
 */
function sme_self_closing($input) {
    return str_replace(' />', '>', $input);
}
add_filter('get_avatar',          'sme_self_closing'); // <img />
add_filter('comment_id_fields',   'sme_self_closing'); // <input />
add_filter('post_thumbnail_html', 'sme_self_closing'); // <img />

/**
 * Redirects search results from /?s=query to /search/query/, converts %20 to +
 *
 * @link http://txfx.net/wordpress-plugins/nice-search/
 */
function sme_nice_search() {
  global $wp_rewrite;
  if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks()) {
    return;
  }

  $search_base = $wp_rewrite->search_base;
  if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false) {
    wp_redirect(home_url("/{$search_base}/" . urlencode(get_query_var('s'))));
    exit();
  }
}
if (current_theme_supports('nice-search')) {
  add_action('template_redirect', 'sme_nice_search');
}

/**
 * Fix for empty search queries redirecting to home page
 *
 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
 * @link http://core.trac.wordpress.org/ticket/11330
 */
function sme_request_filter($query_vars) {
  if (isset($_GET['s']) && empty($_GET['s'])) {
    $query_vars['s'] = ' ';
  }

  return $query_vars;
}
add_filter('request', 'sme_request_filter');

/**
 * Don't return the default description in the RSS feed if it hasn't been changed
 */
function sme_default_desc($bloginfo) {
    $default_tagline = 'Just another WordPress site';
    return ($bloginfo === $default_tagline) ? '' : $bloginfo;
}
add_filter('get_bloginfo_rss', 'sme_default_desc');

/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function sme_get_search_form($form) {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'sme_get_search_form');
