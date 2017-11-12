<?php
// Set Panel ID
$panel_id = 'illdy_panel_projects';

// Set prefix
$prefix = 'illdy';

/***********************************************/
/****************** PROJECTS  ******************/
/***********************************************/
$wp_customize->add_section( $panel_id, [
	'priority'       => illdy_get_section_position( $panel_id ),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __( 'Projects Section', 'illdy' ),
	'description'    => __( 'Control various options for projects section from front page.', 'illdy' ),
	'panel'          => 'illdy_frontpage_panel',
] );

/***********************************************/
/******************* General *******************/
/***********************************************/

// Show this section
$wp_customize->add_setting( $prefix . '_projects_general_show', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_projects_general_show', [
	'type'     => 'epsilon-toggle',
	'label'    => __( 'Show this section?', 'illdy' ),
	'section'  => $panel_id,
	'priority' => 1,
] ) );

// Title
$wp_customize->add_setting( $prefix . '_projects_general_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Projects', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_projects_general_title', [
	'label'       => __( 'Title', 'illdy' ),
	'description' => __( 'Add the title for this section.', 'illdy' ),
	'section'     => $panel_id,
	'priority'    => 2,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_projects_general_title', [
	'selector' => '#projects .section-header h3',
] );

// Entry
if ( get_theme_mod( $prefix . '_projects_general_entry' ) ) {

	$wp_customize->add_setting( $prefix . '_projects_general_entry', [
		'sanitize_callback' => 'wp_kses_post',
		'default'           => __( 'You\'ll love our work. Check it out!', 'illdy' ),
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Epsilon_Control_Text_Editor( $wp_customize, $prefix . '_projects_general_entry', [
		'label'    => __( 'Entry', 'illdy' ),
		'section'  => $panel_id,
		'priority' => 3,
		'type'     => 'epsilon-text-editor',
	] ) );

	$wp_customize->selective_refresh->add_partial( $prefix . '_projects_general_entry', [
		'selector' => '#projects .section-header .section-description',
	] );
} elseif ( ! defined( ILLDY_COMPANION ) ) {

	$wp_customize->add_setting( $prefix . '_projects_entry_text', [
		'sanitize_callback' => 'esc_html',
		'default'           => '',
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Illdy_Text_Custom_Control( $wp_customize, $prefix . '_projects_entry_text', [
		'label'       => __( 'Install Illdy Companion', 'illdy' ),
		'description' => sprintf( __( 'In order to edit description please install <a href="%s" target="_blank">Illdy Companion</a>', 'illdy' ), illdy_get_recommended_actions_url() ),
		'section'     => $panel_id,
		'settings'    => $prefix . '_projects_entry_text',
		'priority'    => 3,
	] ) );
}

$wp_customize->add_setting( $prefix . '_projects_widget_button', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Button( $wp_customize, $prefix . '_projects_widget_button', [
	'text'       => __( 'Add & Edit Projects', 'illdy' ),
	'section_id' => 'sidebar-widgets-front-page-projects-sidebar',
	'icon'       => 'dashicons-plus',
	'section'    => $panel_id,
	'priority'   => 5,
] ) );

$wp_customize->add_setting( $prefix . '_projects_tab', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Tab( $wp_customize, $prefix . '_projects_tab', [
	'type'    => 'epsilon-tab',
	'section' => $panel_id,
	'buttons' => [
		[
			'name'   => __( 'Colors', 'illdy' ),
			'fields' => [
				$prefix . '_projects_title_color',
				$prefix . '_projects_descriptions_color',
				$prefix . '_projects_general_color',
			],
			'active' => true,
		],
		[
			'name'   => __( 'Backgrounds', 'illdy' ),
			'fields' => [
				$prefix . '_projects_general_image',
				$prefix . '_projects_background_size',
				$prefix . '_projects_background_repeat',
				$prefix . '_projects_background_attachment',
				$prefix . '_projects_background_position',
			],
		],
	],
] ) );

// Background Image
$wp_customize->add_setting( $prefix . '_projects_general_image', [
	'sanitize_callback' => 'esc_url',
	'default'           => esc_url( get_template_directory_uri() . '/layout/images/front-page/pattern.png' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_projects_general_image', [
	'label'    => __( 'Background Image', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_projects_general_image',
] ) );
$wp_customize->add_setting( $prefix . '_projects_background_position_x', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_setting( $prefix . '_projects_background_position_y', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Background_Position_Control( $wp_customize, $prefix . '_projects_background_position', [
	'label'    => __( 'Background Position', 'illdy' ),
	'section'  => $panel_id,
	'settings' => [
		'x' => $prefix . '_projects_background_position_x',
		'y' => $prefix . '_projects_background_position_y',
	],
] ) );
$wp_customize->add_setting( $prefix . '_projects_background_size', [
	'default'           => 'auto',
	'sanitize_callback' => 'illdy_sanitize_background_size',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_projects_background_size', [
	'label'   => __( 'Image Size', 'illdy' ),
	'section' => $panel_id,
	'type'    => 'select',
	'choices' => [
		'auto'    => __( 'Original', 'illdy' ),
		'contain' => __( 'Fit to Screen', 'illdy' ),
		'cover'   => __( 'Fill Screen', 'illdy' ),
	],
] );

$wp_customize->add_setting( $prefix . '_projects_background_repeat', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_projects_background_repeat', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Repeat Background Image', 'illdy' ),
	'section' => $panel_id,
] ) );

$wp_customize->add_setting( $prefix . '_projects_background_attachment', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_projects_background_attachment', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Scroll with Page', 'illdy' ),
	'section' => $panel_id,
] ) );

$wp_customize->add_setting( $prefix . '_projects_general_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',

] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_projects_general_color', [
	'label'    => __( 'Background Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_projects_general_color',
] ) );

$wp_customize->add_setting( $prefix . '_projects_title_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#545454',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_projects_title_color', [
	'label'    => __( 'Title Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_projects_title_color',
] ) );

$wp_customize->add_setting( $prefix . '_projects_descriptions_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#8c9597',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_projects_descriptions_color', [
	'label'    => __( 'Description Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_projects_descriptions_color',
] ) );
