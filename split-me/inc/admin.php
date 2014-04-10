<?php
/**
 * Split Me admin options
 *
 * @package Split Me
 * @since Split Me 2.0
 */

/**
 * Create our admin menu
 * @since Split Me 2.0
 */
add_action( 'admin_menu', 'sme_admin_menu' );
function sme_admin_menu() {
    add_theme_page(
        'Split Me Options',   // Page title
        'Split Me Options',   // Menu title
        'edit_theme_options', // Capability
        'sme-edit-options',   // Menu slug
        'sme_options_page'    // Function
    );
}

/**
 * Init our options
 * @since Split Me 2.0
 */
function sme_init_options() {
    // Register our settings
    register_setting(
        'sme_option_group',     // Options group
        'sme_options',          // Database option
        'sme_validate_options'  // Sanitization callback
    );

    // Add our settings group
    add_settings_section(
        'general',          // Unique identifier
        '',                 // Section title (not needed)
        '__return_false',   // Section callback (not needed)
        'sme_theme_options' // Menu slug
    );

    // Register our settings fields
    // Layout options
    add_settings_field(
        'sme_layout',                    // Unique identifier
        __( 'Theme layout', 'splitme' ), // Label
        'sme_layout_field',              // Function
        'sme_theme_options',             // Menu slug
        'general'                        // Settings section
    );

    // Analytics ID
    add_settings_field(
        'sme_analytics_id',
        __( 'Google Analytics ID', 'splitme' ),
        'sme_analytics_field',
        'sme_theme_options',
        'general'
    );
}
add_action( 'admin_init', 'sme_init_options' );

/**
 * Capability required to save our options
 * @since Split Me 2.0
*/
add_filter( 'option_page_capability_sme_option_group', 'sme_options_capability' );
function sme_options_capability( $capability ) {
    return 'edit_theme_options';
}

/**
 * Returns our layout options inside an array
 * @since Split Me 2.0
*/
function sme_layout_option() {
    $args = array(
        'left' => array(
            'value' => 'left',
            'label' => __( 'Left', 'splitme' )
        ),
        'top' => array(
            'value' => 'top',
            'label' => __( 'Top', 'splitme' )
        )
    );
    return apply_filters( 'sme_layout_option', $args );
}

/**
 * Returns the options array
 * @since Split Me 2.0
*/
function sme_get_options() {
    $saved    = (array) get_option( 'sme_options' );
    $defaults = array(
        'sme_analytics_id' => '',
        'sme_layout'       => '',
    );

    $defaults = apply_filters( 'sme_default_options', $defaults );
    $options  = wp_parse_args( $saved, $defaults );
    $options  = array_intersect_key( $options, $defaults );

    return $options;
}

/**
 * Render the layout field
 * @since Split Me 2.0
*/
function sme_layout_field() {
    $options = sme_get_options();

    foreach ( sme_layout_option() as $button ) {
    ?>
    <div class="layout sme-layout">
        <input type="radio" name="sme_options[sme_layout]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $options['sme_layout'], $button['value'] ); ?> />
    </div>
    <?php
    }
}

/**
 * Render the Analytics ID field
 * @since Split Me 2.0
*/
function sme_analytics_field() {
    $options = sme_get_options();
    ?>
    <input type="text" name="sme_options[sme_analytics_id]" placeholder="UA-XXXXXXXX-X" id="analytics-input" value="<?php echo esc_attr( $options['sme_analytics_id'] ); ?>" />
    <label class="description" for="analytics-input"><?php _e( 'Enter your analytics ID. Leave blank to disable', 'splitme' ); ?></label>
    <?php
}

/**
 * Render the options page
 * @since Split Me 2.0
*/
function sme_options_page() {
    ?>
    <div class="wrap">
        <?php $theme = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
        <h2><?php printf( __( '%s Theme Options', 'splitme' ), $theme ); ?></h2>
        <?php settings_errors(); ?>

        <p>
            <?php _e( 'Hello and welcome to your theme options :&#41; <br /> There are only two options at the moment but I\'m working on other interesting options like some "color scheme" choices. <br />Feel free to suggest me the options or features that you would like to have in this theme. You can ask me on <a target="_blank" href="http://twitter.com/Manoz">Twitter</a> (in French or English) on <a target="_blank" href="https://github.com/Manoz/split-me">Github</a> or in the <a target="_blank" href="http://wordpress.org/support/theme/split-me">WordPress Theme Forums</a>.', 'splitme' ) ?>
        </p>

        <form method="post" action="options.php">
            <?php
                settings_fields( 'sme_option_group' );
                do_settings_sections( 'sme_theme_options' );
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Sanitize and validate our fields
 * @since Split Me 2.0
*/
function sme_validate_options( $input ) {
    $output = array();

    /** Layout radio button must be in our array */
    if ( isset( $input['sme_layout'] ) && array_key_exists( $input['sme_layout'], sme_layout_option() ) )
        $output['sme_layout'] = $input['sme_layout'];

    /** No HTML tags in our Analytics ID field */
    if ( isset( $input['sme_analytics_id'] ) && ! empty( $input['sme_analytics_id'] ) )
        $output['sme_analytics_id'] = wp_filter_nohtml_kses( $input['sme_analytics_id'] );

    return apply_filters( 'sme_validate_options', $output, $input );
}

/**
 * Register and hook our admin css
 * @since Split Me 2.0
*/
add_action( 'admin_enqueue_scripts', 'sme_admin_styles' );
function sme_admin_styles() {
    wp_register_style( 'sme-admin-style', get_template_directory_uri() . '/css/sme-options.css', false, '2.0' );
    wp_enqueue_style( 'sme-admin-style' );
}

/**
 * Register our dashboard widget
 * @since Split Me 2.0
*/

add_action( 'wp_dashboard_setup', 'sme_dashboard_widget' );
function sme_dashboard_widget() {
    global $wp_meta_boxes;
    add_meta_box(
        'custom_help_widget',
        __( 'Welcome buddy!', 'splitme' ),
        'sme_dashboard_help',
        'dashboard',
        'normal',
        'high'
    );
}

// Dashboard widget content
function sme_dashboard_help() {
    _e( '<p>
        <a href="http://k-legrand.fr/" target="_blank"><img src="'.get_template_directory_uri().'/images/manoz.jpg" style="float: left; margin-right: 15px;" /></a>
        <span style="font-weight: bold; color: #777;">Thank you for choosing my theme :&#41;</span><br><br>
        You make me happy (really) and you motivate me to create more themes. <br>
        If something is not working properly, do not hesitate to <a href="mailto:manoz@outlook.com" target="_blank">contact me</a> to receive help.
    </p>', 'splitme' );

    _e( '<p>If you want some news about my themes, you can follow me on <a target="_blank" href="http://www.twitter.com/Manoz">Twitter</a>.</p>', 'splitme' );

    _e( '<p>Thank you again, I hope you will appreciate this theme :&#39;&#41;<br><a style="font-weight: bold; color: #738ac7;" href="http://k-legrand.fr/" target="_blank">Manoz</a>.</p>', 'splitme' );

}
