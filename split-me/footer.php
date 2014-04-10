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
    </footer>


<?php wp_footer(); ?>

<?php
    $o = get_option( 'sme_options' );
    if( isset( $o['sme_analytics_id'] ) )
        $id = $o['sme_analytics_id'];

    if( isset( $o['sme_analytics_id'] ) ) {
        echo '
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src=\'//www.google-analytics.com/analytics.js\';
    r.parentNode.insertBefore(e,r)}(window,document,\'script\',\'ga\'));
    ga(\'create\', \''.$id.'\');ga(\'send\',\'pageview\');
</script>
    ';
    }
?>

</body>
</html>