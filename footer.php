<?php
/**
 *    The template for dispalying the footer.
 *
 * @package    WordPress
 * @subpackage illdy
 */
?>
<?php

if ( current_user_can( 'edit_theme_options' ) ) {
	$footer_copyright = get_theme_mod( 'illdy_footer_copyright', __( '&copy; Copyright 2016. All Rights Reserved.', 'illdy' ) );
} else {
	$footer_copyright = get_theme_mod( 'illdy_footer_copyright' );
}
?>
<footer id="footer">
    <div class="bottom-footer">
        <div class="container">
            <p class="copyright">
                <span class="bottom-copyright" data-customizer="copyright-credit"><?php echo illdy_sanitize_html( $footer_copyright ); ?></span>
            </p>
        </div>
    </div>
</footer><!--/#footer-->
<?php wp_footer(); ?>
</body></html>
