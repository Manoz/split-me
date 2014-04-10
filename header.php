<?php
/**
 * Split Me Header
 *
 * @package Split Me
 * @since Split Me 1.0.0
 */
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" >
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
        $options = get_option( 'sme_options' );
        $layout  = $options['sme_layout'];
    ?>
    <header class="sm-h <?php if( $layout == 'top') {echo 'sm-top'; } ?>" role="banner">
        <div class="sm-inner-h">
            <div class="sm-icn">
                <div class="menu-icn-wrap">
                    <div class="menu-icn"></div>
                </div>
            </div>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-desc"><?php bloginfo('description'); ?></h2>
            <div class="sm-nav">
                <?php
                if (has_nav_menu('primary_navigation')) :

                    wp_nav_menu( array(
                        'theme_location' => 'primary_navigation',
                        'menu_class'     => 'sm-menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'          => 2,
                        'walker'         => new SME_Nav_Walker
                    ));

                else :

                    if ( current_user_can( 'manage_options' ) ) {
                        _e( '<p style="color: white; padding-left: 10px;">You should add a navigation menu <a href="wp-admin/nav-menus.php">here</a>.</p>', 'splitme' );
                    }

                endif;
                ?>
            </div>

        </div>
    </header>

    <div class="main" role="main">
