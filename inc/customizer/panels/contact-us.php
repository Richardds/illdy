<?php
// Set prefix
$prefix = 'illdy';

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_contact_us', [
	'title'       => __( 'Contact us Section', 'illdy' ),
	'description' => __( 'Control various options for contact us section from front page.', 'illdy' ),
	'priority'    => illdy_get_section_position( $prefix . '_contact_us' ),
	'panel'       => 'illdy_frontpage_panel',
] );

$wp_customize->add_setting( $prefix . '_contact_tab', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Tab( $wp_customize, $prefix . '_contact_tab', [
	'type'     => 'epsilon-tab',
	'section'  => $prefix . '_contact_us',
	'priority' => 1,
	'buttons'  => [
		[
			'name'   => __( 'General', 'illdy' ),
			'fields' => illdy_create_contact_tab_sections(),
			'active' => true,
		],
		[
			'name'   => __( 'Details', 'illdy' ),
			'fields' => [
				$prefix . '_address1',
				$prefix . '_address2',
				$prefix . '_email',
				$prefix . '_bank_name',
				$prefix . '_bank_account_number',
				$prefix . '_bank_account_iban',
				$prefix . '_bank_account_swift_bic',
			],
		],
	],
] ) );

// Show this section
$wp_customize->add_setting( $prefix . '_contact_us_show', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_contact_us_show', [
	'type'     => 'epsilon-toggle',
	'label'    => __( 'Show this section?', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 1,
] ) );

// Title
$wp_customize->add_setting( $prefix . '_contact_us_general_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Contact us', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_contact_us_general_title', [
	'label'       => __( 'Title', 'illdy' ),
	'description' => __( 'Add the title for this section.', 'illdy' ),
	'section'     => $prefix . '_contact_us',
	'priority'    => 2,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_contact_us_general_title', [
	'selector' => '#contact-us .section-header h3',
] );

// Entry
if ( get_theme_mod( $prefix . '_contact_us_entry' ) ) {

	$wp_customize->add_setting( $prefix . '_contact_us_entry', [
		'sanitize_callback' => 'wp_kses_post',
		'default'           => __( 'Meet the people that are going to take your business to the next level.', 'illdy' ),
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Epsilon_Control_Text_Editor( $wp_customize, $prefix . '_contact_us_entry', [
		'label'    => __( 'Entry', 'illdy' ),
		'section'  => $panel_id,
		'priority' => 3,
		'type'     => 'epsilon-text-editor',
	] ) );
	$wp_customize->selective_refresh->add_partial( $prefix . '_contact_us_entry', [
		'selector' => '#contact-us .section-header .section-description',
	] );
} elseif ( ! defined( ILLDY_COMPANION ) ) {

	$wp_customize->add_setting( $prefix . '_contact_us_entry', [
		'sanitize_callback' => 'esc_html',
		'default'           => '',
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Illdy_Text_Custom_Control( $wp_customize, $prefix . '_contact_us_entry', [
		'label'       => __( 'Install Illdy Companion', 'illdy' ),
		'description' => sprintf( __( 'In order to edit description please install <a href="%s" target="_blank">Illdy Companion</a>', 'illdy' ), illdy_get_recommended_actions_url() ),
		'section'     => $panel_id,
		'settings'    => $prefix . '_contact_us_entry',
		'priority'    => 3,
	] ) );
}

// Address Title
$wp_customize->add_setting( $prefix . '_contact_us_general_address_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Address', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_contact_us_general_address_title', [
	'label'    => __( 'Address Title', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 4,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_contact_us_general_address_title', [
	'selector' => '#contact-us .section-content .row .col-sm-4 .box-left',
] );

// E-Mail Title
$wp_customize->add_setting( $prefix . '_contact_us_general_email_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'E-Mail', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_contact_us_general_email_title', [
	'label'    => __( 'E-Mail Title', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 5,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_contact_us_general_email_title', [
	'selector' => '#contact-us .section-content .row .col-sm-4 .box-left',
] );

// Bank Title
$wp_customize->add_setting( $prefix . '_contact_us_general_bank_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Bank', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_contact_us_general_bank_title', [
	'label'    => __( 'Bank Title', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 6,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_contact_us_general_bank_title', [
	'selector' => '#contact-us .section-content .row .col-sm-4 .box-left',
] );

// Contact Form 7
$wp_customize->add_setting( 'illdy_contact_us_general_contact_form_7', [
	'sanitize_callback' => 'sanitize_key',
] );
$wp_customize->add_control( new Illdy_CF7_Custom_Control( $wp_customize, 'illdy_contact_us_general_contact_form_7', [
	'label'    => __( 'Select the contact form you\'d like to display (powered by Contact Form 7)', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 7,
	'type'     => 'illdy_contact_form_7',
] ) );

// Contact Form Creation
$wp_customize->add_setting( $prefix . '_contact_us_install_contact_form_7', [
	'sanitize_callback' => 'esc_html',
	'default'           => '',
	'transport'         => 'refresh',
] );
$wp_customize->add_control( new Illdy_Text_Custom_Control( $wp_customize, $prefix . '_contact_us_install_contact_form_7', [
	'label'           => __( 'Contact Form Creation', 'illdy' ),
	'description'     => sprintf( '%s %s %s', __( 'Install', 'illdy' ), '<a href="https://wordpress.org/plugins/contact-form-7/" title="Contact Form 7" target="_blank">Contact Form 7</a>', __( 'and select a contact form to work this setting.', 'illdy' ) ),
	'section'         => $prefix . '_contact_us',
	'settings'        => $prefix . '_contact_us_install_contact_form_7',
	'priority'        => 7,
	'active_callback' => 'illdy_is_not_active_contact_form_7',
] ) );

$wp_customize->add_setting( $prefix . '_contact_us_create_contact_form_7', [
	'sanitize_callback' => 'esc_html',
	'default'           => '',
	'transport'         => 'refresh',
] );
$wp_customize->add_control( new Illdy_Text_Custom_Control( $wp_customize, $prefix . '_contact_us_create_contact_form_7', [
	'label'           => __( 'Contact Form Creation', 'illdy' ),
	'description'     => sprintf( '%s %s', __( 'Create a contact form from ', 'illdy' ), '<a href="' . admin_url( 'admin.php?page=wpcf7-new' ) . '" title="Contact Form 7" target="_blank">here</a>' ),
	'section'         => $prefix . '_contact_us',
	'settings'        => $prefix . '_contact_us_create_contact_form_7',
	'priority'        => 8,
	'active_callback' => 'illdy_have_not_contact_form_7',
] ) );

/***********************************************/
/************** Contact Details  ***************/
/***********************************************/

// Address 1
$wp_customize->add_setting( $prefix . '_address1', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Street 221B Baker Street, ', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_address1', [
	'label'    => __( 'Address 1', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 2,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_address1', [
	'selector' => '#contact-us .contact-us-address .box-right span:first-child',
] );

// Address 2
$wp_customize->add_setting( $prefix . '_address2', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'London, UK', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_address2', [
	'label'    => __( 'Address 2', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 3,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_address2', [
	'selector'        => '#contact-us .contact-us-address .box-right span:nth-child(2)',
	'render_callback' => $prefix . '_address2',
] );

/* email */
$wp_customize->add_setting( $prefix . '_email', [
	'sanitize_callback' => 'sanitize_text_field',
	'default'           => __( 'contact@site.com', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_email', [
	'label'    => __( 'E-Mail address', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'settings' => $prefix . '_email',
	'priority' => 1,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_email', [
	'selector'        => '#contact-us .contact-us-email .box-right span:first-child',
	'render_callback' => $prefix . '_email',
] );

// Bank name
$wp_customize->add_setting( $prefix . '_bank_name', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Bank', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_bank_name', [
	'label'    => __( 'Bank name', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 4,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_bank_name', [
	'selector'        => '#contact-us .contact-us-bank .box-right span:first-child',
	'render_callback' => $prefix . '_bank_name',
] );

// Account number
$wp_customize->add_setting( $prefix . '_bank_account_number', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( '0000000000/0000', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_bank_account_number', [
	'label'    => __( 'Account number', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 5,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_bank_account_number', [
	'selector'        => '#contact-us .contact-us-bank .box-right span:nth-child(2)',
	'render_callback' => $prefix . '_bank_account_number',
] );

// IBAN
$wp_customize->add_setting( $prefix . '_bank_account_iban', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'XX0000000000000000000000', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_bank_account_iban', [
	'label'    => __( 'IBAN', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 6,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_bank_account_iban', [
	'selector'        => '#contact-us .contact-us-bank .box-right span:nth-child(3)',
	'render_callback' => $prefix . '_bank_account_iban',
] );

// SWIFT/BIC
$wp_customize->add_setting( $prefix . '_bank_account_swift_bic', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'ABCDXXYYZZZ', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_bank_account_swift_bic', [
	'label'    => __( 'SWIFT/BIC', 'illdy' ),
	'section'  => $prefix . '_contact_us',
	'priority' => 7,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_bank_account_swift_bic', [
	'selector'        => '#contact-us .contact-us-bank .box-right span:nth-child(4)',
	'render_callback' => $prefix . '_bank_account_swift_bic',
] );
