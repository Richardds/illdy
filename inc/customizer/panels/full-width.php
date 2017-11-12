<?php
// Set Panel ID
$panel_id = 'illdy_full_width';

// Set prefix
$prefix = 'illdy';

$wp_customize->add_section( $panel_id, [
	'priority'    => illdy_get_section_position( $panel_id ),
	'capability'  => 'edit_theme_options',
	'title'       => __( 'Full Width Section', 'illdy' ),
	'description' => __( 'Control title and description of full width section.', 'illdy' ),
	'panel'       => 'illdy_frontpage_panel',
] );

// Show this section
$wp_customize->add_setting( $prefix . '_full_width_general_show', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_full_width_general_show', [
	'type'     => 'epsilon-toggle',
	'label'    => __( 'Show this section?', 'illdy' ),
	'section'  => $panel_id,
	'priority' => 1,
] ) );

// Show this section
$wp_customize->add_setting( $prefix . '_full_width_padding', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_full_width_padding', [
	'type'     => 'epsilon-toggle',
	'label'    => __( 'Add padding to section ?', 'illdy' ),
	'section'  => $panel_id,
	'priority' => 1,
] ) );

// Title
$wp_customize->add_setting( $prefix . '_full_width_general_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => '',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_full_width_general_title', [
	'label'       => __( 'Title', 'illdy' ),
	'description' => __( 'Add the title for this section.', 'illdy' ),
	'section'     => $panel_id,
	'priority'    => 2,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_full_width_general_title', [
	'selector' => '#full-width .section-header h3',
] );

$wp_customize->add_setting( $prefix . '_full_width_general_entry', [
	'sanitize_callback' => 'wp_kses_post',
	'default'           => '',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Text_Editor( $wp_customize, $prefix . '_full_width_general_entry', [
	'label'       => __( 'Entry', 'illdy' ),
	'description' => __( 'Add the content for this section.', 'illdy' ),
	'section'     => $panel_id,
	'priority'    => 3,
	'type'        => 'epsilon-text-editor',
] ) );
$wp_customize->selective_refresh->add_partial( $prefix . '_full_width_general_entry', [
	'selector' => '#full-width .section-header .section-description',
] );
$wp_customize->add_setting( $prefix . '_full_width_widget_button', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Button( $wp_customize, $prefix . '_full_width_widget_button', [
	'text'       => __( 'Add & Edit widgets', 'illdy' ),
	'section_id' => 'sidebar-widgets-front-page-full-width-sidebar',
	'icon'       => 'dashicons-plus',
	'section'    => $panel_id,
	'priority'   => 5,
] ) );
$wp_customize->add_setting( $prefix . '_full_width_tab', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Tab( $wp_customize, $prefix . '_full_width_tab', [
	'type'    => 'epsilon-tab',
	'section' => $panel_id,
	'buttons' => [
		[
			'name'   => __( 'Colors', 'illdy' ),
			'fields' => [
				$prefix . '_full_width_title_color',
				$prefix . '_full_width_descriptions_color',
				$prefix . '_full_width_general_color',
				$prefix . '_full_width_full_text',
			],
			'active' => true,
		],
		[
			'name'   => __( 'Backgrounds', 'illdy' ),
			'fields' => [
				$prefix . '_full_width_general_image',
				$prefix . '_full_width_background_size',
				$prefix . '_full_width_background_repeat',
				$prefix . '_full_width_background_attachment',
				$prefix . '_full_width_background_position',
			],
		],
	],
] ) );

// Background Image
$wp_customize->add_setting( $prefix . '_full_width_general_image', [
	'sanitize_callback' => 'esc_url',
	'default'           => '',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_full_width_general_image', [
	'label'    => __( 'Background Image', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_full_width_general_image',
] ) );
$wp_customize->add_setting( $prefix . '_full_width_background_position_x', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_setting( $prefix . '_full_width_background_position_y', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Background_Position_Control( $wp_customize, $prefix . '_full_width_background_position', [
	'label'    => __( 'Background Position', 'illdy' ),
	'section'  => $panel_id,
	'settings' => [
		'x' => $prefix . '_full_width_background_position_x',
		'y' => $prefix . '_full_width_background_position_y',
	],
] ) );
$wp_customize->add_setting( $prefix . '_full_width_background_size', [
	'default'           => 'cover',
	'sanitize_callback' => 'illdy_sanitize_background_size',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_full_width_background_size', [
	'label'   => __( 'Image Size', 'illdy' ),
	'section' => $panel_id,
	'type'    => 'select',
	'choices' => [
		'auto'    => __( 'Original', 'illdy' ),
		'contain' => __( 'Fit to Screen', 'illdy' ),
		'cover'   => __( 'Fill Screen', 'illdy' ),
	],
] );

$wp_customize->add_setting( $prefix . '_full_width_background_repeat', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_full_width_background_repeat', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Repeat Background Image', 'illdy' ),
	'section' => $panel_id,
] ) );

$wp_customize->add_setting( $prefix . '_full_width_background_attachment', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_full_width_background_attachment', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Scroll with Page', 'illdy' ),
	'section' => $panel_id,
] ) );

$wp_customize->add_setting( $prefix . '_full_width_general_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',

] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_general_color', [
	'label'    => __( 'Background Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_full_width_general_color',
] ) );

$wp_customize->add_setting( $prefix . '_full_width_title_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#545454',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_title_color', [
	'label'    => __( 'Title Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_full_width_title_color',
] ) );

$wp_customize->add_setting( $prefix . '_full_width_descriptions_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#8c9597',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_descriptions_color', [
	'label'    => __( 'Description Color', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_full_width_descriptions_color',
] ) );

$wp_customize->add_setting( $prefix . '_full_width_full_text', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_full_width_full_text', [
	'label'    => __( 'Title & Description Color for Full & Small Parallax Widget', 'illdy' ),
	'section'  => $panel_id,
	'settings' => $prefix . '_full_width_full_text',
] ) );
