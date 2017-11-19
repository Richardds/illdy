<?php
/**
 *  The template for dispalying the team section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'illdy_team_general_title', __( 'Team', 'illdy' ) );
	$general_entry = get_theme_mod( 'illdy_team_general_entry', __( 'Meet the people that are going to take your business to the next level.', 'illdy' ) );
} else {
	$general_title = get_theme_mod( 'illdy_team_general_title' );
	$general_entry = get_theme_mod( 'illdy_team_general_entry' );
}

?>

<?php if ( '' != $general_title || '' != $general_entry || is_active_sidebar( 'front-page-team-sidebar' ) ) { ?>

    <section id="team" class="front-page-section">
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
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="section-description"><?php echo do_shortcode( wp_kses_post( $general_entry ) ); ?></div>
                            </div><!--/.col-sm-10.col-sm-offset-1-->
						<?php endif; ?>
                    </div><!--/.row-->
                </div><!--/.container-->
            </div><!--/.section-header-->
		<?php endif; ?>
        <div class="section-content">
            <div class="container">
                <div class="row inline-columns">
					<?php
					if ( is_active_sidebar( 'front-page-team-sidebar' ) ) :
						dynamic_sidebar( 'front-page-team-sidebar' );
					endif;
					?>
                </div><!--/.row-->
            </div><!--/.container-->
        </div><!--/.section-content-->
    </section><!--/#team.front-page-section-->

<?php }// End if().
?>
