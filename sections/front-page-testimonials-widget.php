<?php
/**
 *  The template for displaying the testimonials section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title            = get_theme_mod( 'illdy_testimonials_general_title', __( 'Testimonials', 'illdy' ) );
	$general_background_image = get_theme_mod( 'illdy_testimonials_general_background_image', '' );
	$number_of_posts          = get_theme_mod( 'illdy_testimonials_number_of_posts', absint( 4 ) );
} else {
	$general_title            = get_theme_mod( 'illdy_testimonials_general_title' );
	$general_background_image = get_theme_mod( 'illdy_testimonials_general_background_image' );
	$number_of_posts          = get_theme_mod( 'illdy_testimonials_number_of_posts', absint( 4 ) );
}

?>

<section id="testimonials" class="front-page-section" style="<?php if ( $general_background_image ) : echo 'background-image: url(' . esc_url( $general_background_image ) . ')';
endif; ?>">
	<?php if ( $general_title ) : ?>
        <div class="section-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3><?php echo do_shortcode( wp_kses_post( $general_title ) ); ?></h3>
                    </div><!--/.col-sm-12-->
                </div><!--/.row-->
            </div><!--/.container-->
        </div><!--/.section-header-->
	<?php endif; ?>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 no-padding">
                    <div class="testimonials-carousel owl-carousel-enabled">
						<?php
						if ( is_active_sidebar( 'front-page-testimonials-sidebar' ) ) :
							dynamic_sidebar( 'front-page-testimonials-sidebar' );
						endif;
						?>
                    </div><!--/.testimonials-carousel.owl-carousel-enabled-->
                </div><!--/.col-sm-10.col-sm-offset-1.no-padding-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.section-content-->
</section><!--/#testimonials.front-page-section-->
