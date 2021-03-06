<?php
/**
 *    The template for displaying the contact us section in front page.
 *
 * @package    WordPress
 * @subpackage illdy
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$name                   = get_theme_mod( 'illdy_name', __( 'Company', 'illdy' ) );
	$address1               = get_theme_mod( 'illdy_address1', __( 'Street 221B Baker Street, ', 'illdy' ) );
	$address2               = get_theme_mod( 'illdy_address2', __( 'London, UK', 'illdy' ) );
	$email                  = get_theme_mod( 'illdy_email', __( 'contact@site.com', 'illdy' ) );
	$bank_name              = get_theme_mod( 'illdy_bank_name', __( 'Bank', 'illdy' ) );
	$ico                    = get_theme_mod( 'illdy_ico', __( '00000000', 'illdy' ) );
	$bank_account_iban      = get_theme_mod( 'illdy_bank_account_iban', __( 'XX0000000000000000000000', 'illdy' ) );
	$bank_account_swift_bic = get_theme_mod( 'illdy_bank_account_swift_bic', __( 'ABCDXXYYZZZ', 'illdy' ) );
	$general_title          = get_theme_mod( 'illdy_contact_us_general_title', __( 'Contact us', 'illdy' ) );
	$general_entry          = get_theme_mod( 'illdy_contact_us_entry', __( 'And we will get in touch as soon as possible.', 'illdy' ) );
	$general_contact_form_7 = get_theme_mod( 'illdy_contact_us_general_contact_form_7' );
	$general_contact_title  = get_theme_mod( 'illdy_contact_us_general_contact_title', __( 'E-Mail', 'illdy' ) );
	$general_bank_title     = get_theme_mod( 'illdy_contact_us_general_bank_title', __( 'Bank', 'illdy' ) );
} else {
	$name                   = get_theme_mod( 'illdy_name' );
	$address1               = get_theme_mod( 'illdy_address1' );
	$address2               = get_theme_mod( 'illdy_address2' );
	$email                  = get_theme_mod( 'illdy_email' );
	$bank_name              = get_theme_mod( 'illdy_bank_name' );
	$ico                    = get_theme_mod( 'illdy_ico' );
	$bank_account_iban      = get_theme_mod( 'illdy_bank_account_iban' );
	$bank_account_swift_bic = get_theme_mod( 'illdy_bank_account_swift_bic' );
	$general_title          = get_theme_mod( 'illdy_contact_us_general_title' );
	$general_entry          = get_theme_mod( 'illdy_contact_us_entry' );
	$general_contact_form_7 = get_theme_mod( 'illdy_contact_us_general_contact_form_7' );
	$general_contact_title  = get_theme_mod( 'illdy_contact_us_general_contact_title' );
	$general_bank_title     = get_theme_mod( 'illdy_contact_us_general_bank_title' );
}

if ( '' != $general_title || '' != $general_entry || '' != $general_bank_title || '' != $general_contact_title || '' != $name || '' != $bank_name || '' != $ico || '' != $bank_account_iban || '' != $bank_account_swift_bic || '' != $address1 || '' != $address2 || '' != $email || null != $general_contact_form_7 && 'default' != $general_contact_form_7 ) {

	?>
    <section id="contact-us" class="front-page-section">
		<?php if ( $general_title || $general_entry ) : ?>
            <div class="section-header">
                <div class="container">
                    <div class="row">
						<?php if ( $general_title ) : ?>
                            <div class="col-sm-12">
                                <h3><?=do_shortcode( wp_kses_post( $general_title ) );?></h3>
                            </div><!--/.col-sm-12-->
						<?php endif; ?>
						<?php if ( $general_entry ) : ?>
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="section-description"><?=do_shortcode( wp_kses_post( $general_entry ) );?></div>
                            </div><!--/.col-sm-10.col-sm-offset-1-->
						<?php endif; ?>
                    </div><!--/.row-->
                </div><!--/.container-->
            </div><!--/.section-header-->
		<?php endif; ?>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row" style="margin-bottom: 45px;">
                            <div class="col-md-5 col-sm-6">
                                <div class="contact-us-box contact-us-contact">
									<?php if ( $general_contact_title ) : ?>
                                        <div class="box-left" data-customizer="box-left-contact-title">
											<?=illdy_sanitize_html( $general_contact_title );?>
                                        </div><!--/.box-left-->
									<?php endif; ?>
                                    <div class="box-right">
										<?php if ( $name ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-name"><?=illdy_sanitize_html( $name );?></span>
										<?php endif; ?>
										<?php if ( $address1 ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-address-1"><?=illdy_sanitize_html( $address1 );?></span>
										<?php endif; ?>
										<?php if ( $address2 ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-address-2"><?=illdy_sanitize_html( $address2 );?></span>
										<?php endif; ?>
										<?php if ( $email ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-email">
                                                <a href="mailto:<?=esc_attr( $email );?>" title="<?=esc_attr( $email );?>"><?=esc_html( $email );?></a>
                                            </span>
										<?php endif; ?>
                                    </div><!--/.box-right-->
                                </div><!--/.contact-us-box-->
                            </div><!--/.col-sm-4-->
                            <div class="col-md-7 col-sm-6">
                                <div class="contact-us-box contact-us-bank">
									<?php if ( $general_bank_title ) : ?>
                                        <div class="box-left" data-customizer="box-left-bank-title">
											<?=illdy_sanitize_html( $general_bank_title );?>
                                        </div><!--/.box-left-->
									<?php endif; ?>
                                    <div class="box-right">
										<?php if ( $bank_name ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-bank-name">
                                                <?=illdy_sanitize_html( $bank_name );?></span>
										<?php endif; ?>
										<?php if ( $ico ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-ico">
                                                IČO: <?=illdy_sanitize_html( $ico );?></span>
										<?php endif; ?>
										<?php if ( $bank_account_iban ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-account-iban">
                                                IBAN: <?=illdy_sanitize_html( $bank_account_iban );?></span>
										<?php endif; ?>
										<?php if ( $bank_account_swift_bic ) : ?>
                                            <span class="box-right-row" data-customizer="contact-us-account-swift-bic">
                                                SWIFT/BIC: <?=illdy_sanitize_html( $bank_account_swift_bic );?></span>
										<?php endif; ?>
                                    </div><!--/.box-right-->
                                </div><!--/.contact-us-box-->
                            </div><!--/.col-sm-3-->
                        </div><!--/.row-->
                    </div><!--/.col-sm-12-->
                </div><!--/.row-->
                <div class="row">
                    <div class="col-sm-12">
						<?php if ( class_exists( 'WPCF7' ) && null != $general_contact_form_7 && 'default' != $general_contact_form_7 && get_post( $general_contact_form_7 ) ) : ?><?php $shortcode = '[contact-form-7 id="' . esc_html( $general_contact_form_7 ) . '"]'; ?><?=do_shortcode( $shortcode );?><?php endif; ?>
                    </div><!--/.col-sm-12-->
                </div><!--/.row-->
            </div><!--/.container-->
        </div><!--/.section-content-->
    </section><!--/#contact-us.front-page-section-->

<?php }// End if().
?>
