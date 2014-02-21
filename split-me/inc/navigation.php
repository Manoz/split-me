<?php
/**
 * Better walker for wp_nav_menu()
 *
 * This menu is cleaner than default WP Menu.
 * WordPress adds a lot of classes on <li>
 * We do not need as many classes. And it's ugly >_<
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */

class SME_Nav_Walker extends Walker_Nav_Menu {
    function check_current($classes) {
        return preg_match('/(current[-_])|active|submenu/', $classes);
    }

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"sub-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        $item_html = apply_filters('sme_menu_item', $item_html);
        $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $element->is_submenu = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_submenu) {
            $element->classes[] = 'sub-menu';
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

function sme_menu_css_class($classes, $item) {
    $slug = sanitize_title($item->title);
    $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
    $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

    $classes[] = 'menu-' . $slug;

    $classes = array_unique($classes);

    return array_filter($classes, 'sme_is_element_empty');
}
add_filter('nav_menu_css_class', 'sme_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');

function sme_menu_args($args = '') {
    $sme_menu_args['container'] = false;

    return array_merge($args, $sme_menu_args);
}
add_filter('wp_nav_menu_args', 'sme_menu_args');