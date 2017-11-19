<?php
/**
 *  The template for displaying sponsors section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */

if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'illdy_sponsors_general_title', __( 'sponsors', 'illdy' ) );
	$general_entry = get_theme_mod( 'illdy_sponsors_general_entry', __( 'It is an amazing one-page theme with great features that offers an incredible experience. It is easy to install, make changes, adapt for your business. A modern design with clean lines and styling for a wide variety of content, exactly how a business design should be. You can add as many images as you want to the main header area and turn them into slider.', 'illdy' ) );
} else {
	$general_title = get_theme_mod( 'illdy_sponsors_general_title' );
	$general_entry = get_theme_mod( 'illdy_sponsors_general_entry' );
}

if ( '' != $general_title || '' != $general_entry || is_active_sidebar( 'front-page-sponsors-sidebar' ) ) { ?>

    <section id="sponsors" class="front-page-section" style="<?php if ( ! $general_title && ! $general_entry ) : echo 'padding-top: 130px;';
	endif; ?>">
		<?php if ( $general_title || $general_entry ) : ?>
            <div class="section-header">
                <div class="container">
                    <div class="row">
						<?php if ( $general_title ) : ?>
                            <div class="col-sm-12">
                                <h3><?php echo do_shortcode( wp_kses_post( $general_title ) ); ?></h3>
                            </div><!--/.col-sm-12-->
						<?php endif; ?>
						<?php if ( $general_entry ) : ?>
                            <div class="col-sm-12">
                                <div class="section-description"><?php echo do_shortcode( wp_kses_post( $general_entry ) ); ?></div>
                            </div><!--/.col-sm-10.col-sm-offset-1-->
						<?php endif; ?>
                    </div><!--/.row-->
                </div><!--/.container-->
            </div><!--/.section-header-->
            <div class="section-content">
                <div class="container">
                    <div class="row inline-columns">
						<?php
						if ( is_active_sidebar( 'front-page-sponsors-sidebar' ) ) :
							dynamic_sidebar( 'front-page-sponsors-sidebar' );
						endif;
						?>
                    </div><!--/.row-->
                </div><!--/.container-->
            </div><!--/.section-content-->
		<?php endif; ?>
    </section><!--/#sponsors.front-page-section-->

	<?php
}
?>
