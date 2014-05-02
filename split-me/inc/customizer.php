<?php
/**
 * Split Me Theme Customizer
 *
 * @package Split Me
 * @since Split Me 2.4.4
*/

/**
 * Load $wp_customize object
 * Add our sections, add our settings, add our controls
 * @link https://codex.wordpress.org/Theme_Customization_API
*/
add_action( 'customize_register', 'sme_customize_register' );
function sme_customize_register( $wp_customize ) {

    /**
     * Add our sections.
     * @link http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
    */
    $wp_customize->add_section(
        'sme_layout_section',
        array(
            'title'       => __( 'Split Me Layout', 'splitme' ),
            'capability'  => 'edit_theme_options',
            'description' => __( 'Choose your theme\'s layout.', 'splitme' )
        )
    );

    /**
     * Add our settings
     * @link http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
    */

    // Layout setting
    $wp_customize->add_setting(
        'sme_layout[layout_setting]',
        array(
            'default' => 'left-header',
            'type'    => 'option'
        )
    );

    // Excerpt length
    $wp_customize->add_setting(
        'sme_excerpt_length',
        array(
            'default'           => '25',
            'sanitize_callback' => 'sme_sanitize_text',
        )
    );

    // Header menu text color setting
    $wp_customize->add_setting(
        'sme_menu_icn_color',
        array(
            'default'           => '#e7e7e7',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Post titles color setting
    $wp_customize->add_setting(
        'sme_post_title_color',
        array(
            'default'           => '#3465a4',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Global text color
    $wp_customize->add_setting(
        'sme_text_color',
        array(
            'default'           => '#657b83',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    // Post icons color
    $wp_customize->add_setting(
        'sme_post_icn_color',
        array(
            'default'           => '#cb4b16',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    /**
     * Add our controls
     * @link http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
    */

    // Layout control
    $wp_customize->add_control(
        'layout_control',
        array(
            'type'    => 'radio',
            'label'   => __( 'Theme layout', 'splitme' ),
            'section' => 'sme_layout_section',
            'choices' => array(
                'left-header' => __( 'Left header', 'splitme' ),
                'top-header'  => __( 'Top header', 'splitme' )
            ),
            'settings' => 'sme_layout[layout_setting]'
        )
    );

    // Excerpt length control
    $wp_customize->add_control(
        'sme_excerpt_length',
        array(
            'label'    => __( 'Excerpt length &#40;words number&#41;', 'splitme' ),
            'section'  => 'sme_layout_section',
            'settings' => 'sme_excerpt_length',
            'type'     => 'text'
        )
    );

    // Header menu color control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sme_menu_icn_color_control',
            array(
                'label'    => __( 'Menu icon color', 'splitme' ),
                'section'  => 'colors',
                'settings' => 'sme_menu_icn_color'
            )
        )
    );

    // Post titles color control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sme_post_title_color_control',
            array(
                'label'    => __( 'Post titles color', 'splitme' ),
                'section'  => 'colors',
                'settings' => 'sme_post_title_color'
            )
        )
    );

    // Global text color control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sme_text_color_control',
            array(
                'label'    => __( 'Text color', 'splitme' ),
                'section'  => 'colors',
                'settings' => 'sme_text_color'
            )
        )
    );

    // Post icons color control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sme_post_icn_color_control',
            array(
                'label'    => __( 'Post icons color', 'splitme' ),
                'section'  => 'colors',
                'settings' => 'sme_post_icn_color'
            )
        )
    );

}

/**
 * Add a CSS class to the body tag depending
 * on which layout is chosen in the customizer.
 * @link https://codex.wordpress.org/Function_Reference/body_class#Add_Classes_By_Filters
*/
add_filter( 'body_class', 'sme_body_classes' );
function sme_body_classes( $classes ) {

    $sme_layout = get_option( 'sme_layout' );
    $classes[]  = $sme_layout['layout_setting'];

    return $classes;

}

/**
 * Sanitize some fields
*/
function sme_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}