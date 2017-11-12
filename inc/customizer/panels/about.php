<?php
// Set Panel ID
$panel_id = 'illdy_panel_about';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/********************* ABOUT  ******************/
/***********************************************/
$wp_customize->add_section( $panel_id, [
	'priority'    => illdy_get_section_position( $panel_id ),
	'capability'  => 'edit_theme_options',
	'title'       => __( 'About Section', 'illdy' ),
	'description' => __( 'Control various options for about section from front page.', 'illdy' ),
	'panel'       => 'illdy_frontpage_panel',
] );

/***********************************************/
/******************* General *******************/
/***********************************************/

// Show this section
$wp_customize->add_setting( $prefix . '_about_general_show', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_about_general_show', [
	'type'     => 'epsilon-toggle',
	'label'    => __( 'Show this section?', 'illdy' ),
	'section'  => $panel_id,
	'priority' => 1,
] ) );

// Title
$wp_customize->add_setting( $prefix . '_about_general_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'About', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_about_general_title', [
	'label'       => __( 'Title', 'illdy' ),
	'description' => __( 'Add the title for this section.', 'illdy' ),
	'section'     => $panel_id,
	'priority'    => 2,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_about_general_title', [
	'selector'        => '#about .section-header h3',
	'render_callback' => $prefix . '_about_general_title',
] );

// Entry
if ( get_theme_mod( $prefix . '_about_general_entry' ) ) {

	$wp_customize->add_setting( $prefix . '_about_general_entry', [
			'sanitize_callback' => 'wp_kses_post',
			'default'           => __( 'It is an amazing one-page theme with great features that offers an incredible experience. It is easy to install, make changes, adapt for your business. A modern design with clean lines and styling for a wide variety of content, exactly how a business design should be. You can add as many images as you want to the main header area and turn them into slider.', 'illdy' ),
			'transport'         => 'postMessage',
		] );
	$wp_customize->add_control( new Epsilon_Control_Text_Editor( $wp_customize, $prefix . '_about_general_entry', [
		'label'    => __( 'Entry', 'illdy' ),
		'section'  => $panel_id,
		'priority' => 3,
		'type'     => 'epsilon-text-editor',
	] ) );
} elseif ( ! defined( ILLDY_COMPANION ) ) {

	$wp_customize->add_setting( $prefix . '_about_general_text', [
		'sanitize_callback' => 'esc_html',
		'default'           => '',
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Illdy_Text_Custom_Control( $wp_customize, $prefix . '_about_general_text', [
		'label'       => __( 'Install Illdy Companion', 'illdy' ),
		'description' => sprintf( __( 'In order to edit description please install <a href="%s" target="_blank">Illdy Companion</a>', 'illdy' ), illdy_get_recommended_actions_url() ),
		'section'     => $panel_id,
		'settings'    => $prefix . '_about_general_text',
		'priority'    => 3,
	] ) );
}
$wp_customize->selective_refresh->add_partial( $prefix . '_about_general_entry', [
	'selector'        => '#about .section-header .section-description',
	'render_callback' => $prefix . '_about_general_entry',
] );

$wp_customize->add_setting( $prefix . '_about_tab', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Tab( $wp_customize, $prefix . '_about_tab', [
	'type'    => 'epsilon-tab',
	'section' => $panel_id,
	'buttons' => [
		[
			'name'   => __( 'Colors', 'illdy' ),
			'fields' => [
				$prefix . '_about_title_color',
				$prefix . '_about_descriptions_color',
				$prefix . '_about_general_color',
			],
			'active' => true,
		],
		[
			'name'   => __( 'Backgrounds', 'illdy' ),
			'fields' => [
				$prefix . '_about_general_image',
				$prefix . '_about_background_size',
				$prefix . '_about_background_repeat',
				$prefix . '_about_background_attachment',
				$prefix . '_about_background_position',
			],
		],
	],
] ) );

// Background Image
$wp_customize->add_setting( $prefix . '_about_general_image', [
	'sanitize_callback' => 'esc_url',
	'default'           => '',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_about_general_image', [
	'label'    => __( 'Background Image', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_about_general_image',
] ) );
$wp_customize->add_setting( $prefix . '_about_background_position_x', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_setting( $prefix . '_about_background_position_y', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Background_Position_Control( $wp_customize, $prefix . '_about_background_position', [
	'label'    => __( 'Background Position', 'illdy' ),
	'section'  => $panel_id,
	'settings' => [
		'x' => $prefix . '_about_background_position_x',
		'y' => $prefix . '_about_background_position_y',
	],
] ) );
$wp_customize->add_setting( $prefix . '_about_background_size', [
	'default'           => 'cover',
	'sanitize_callback' => 'illdy_sanitize_background_size',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_about_background_size', [
	'label'   => __( 'Image Size', 'illdy' ),
	'section' => $panel_id,
	'type'    => 'select',
	'choices' => [
		'auto'    => __( 'Original', 'illdy' ),
		'contain' => __( 'Fit to Screen', 'illdy' ),
		'cover'   => __( 'Fill Screen', 'illdy' ),
	],
] );

$wp_customize->add_setting( $prefix . '_about_background_repeat', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_about_background_repeat', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Repeat Background Image', 'illdy' ),
	'section' => $panel_id,
] ) );

$wp_customize->add_setting( $prefix . '_about_background_attachment', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_about_background_attachment', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Scroll with Page', 'illdy' ),
	'section' => $panel_id,
] ) );

$wp_customize->add_setting( $prefix . '_about_general_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',

] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_general_color', [
	'label'    => __( 'Background Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_about_general_color',
] ) );

$wp_customize->add_setting( $prefix . '_about_title_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#545454',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_title_color', [
	'label'    => __( 'Title Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_about_title_color',
] ) );

$wp_customize->add_setting( $prefix . '_about_descriptions_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#8c9597',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_about_descriptions_color', [
	'label'    => __( 'Description Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_about_descriptions_color',
] ) );
