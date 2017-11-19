<?php
/**
 *  The template for displaying WooCommerce.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <section id="blog">
				<?php woocommerce_content(); ?>
            </section><!--/#blog-->
        </div><!--/.col-sm-7-->
		<?php if ( is_active_sidebar( 'woocommerce-sidebar' ) ) : ?>
            <div class="col-sm-4">
                <div id="sidebar">
					<?php dynamic_sidebar( 'woocommerce-sidebar' ); ?>
                </div><!--/#sidebar-->
            </div><!--/.col-sm-4-->
		<?php endif; ?>
    </div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>
