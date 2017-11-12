<?php

// Set prefix
$prefix = 'illdy';

/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_latest_news_general', [
	'title'       => __( 'Latest News Section', 'illdy' ),
	'description' => __( 'Control various options for latest news section from front page.', 'illdy' ),
	'priority'    => illdy_get_section_position( $prefix . '_latest_news_general' ),
	'panel'       => 'illdy_frontpage_panel',
] );

// Show this section
$wp_customize->add_setting( $prefix . '_latest_news_general_show', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_latest_news_general_show', [
	'type'     => 'epsilon-toggle',
	'label'    => __( 'Show this section?', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'priority' => 1,
] ) );

// Title
$wp_customize->add_setting( $prefix . '_latest_news_general_title', [
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Latest News', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_latest_news_general_title', [
	'label'       => __( 'Title', 'illdy' ),
	'description' => __( 'Add the title for this section.', 'illdy' ),
	'section'     => $prefix . '_latest_news_general',
	'priority'    => 2,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_latest_news_general_title', [
	'selector' => '#latest-news .section-header h3',
] );

// Entry
if ( get_theme_mod( $prefix . '_latest_news_general_entry' ) ) {

	$wp_customize->add_setting( $prefix . '_latest_news_general_entry', [
		'sanitize_callback' => 'wp_kses_post',
		'default'           => __( 'If you are interested in the latest articles in the industry, take a sneak peek at our blog. You have nothing to loose!', 'illdy' ),
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Epsilon_Control_Text_Editor( $wp_customize, $prefix . '_latest_news_general_entry', [
		'label'    => __( 'Entry', 'illdy' ),
		'section'  => $prefix . '_latest_news_general',
		'priority' => 3,
		'type'     => 'epsilon-text-editor',
	] ) );
} elseif ( ! defined( ILLDY_COMPANION ) ) {

	$wp_customize->add_setting( $prefix . '_latest_news_general_entry', [
		'sanitize_callback' => 'esc_html',
		'default'           => '',
		'transport'         => 'postMessage',
	] );
	$wp_customize->add_control( new Illdy_Text_Custom_Control( $wp_customize, $prefix . '_latest_news_general_entry', [
		'label'       => __( 'Install Illdy Companion', 'illdy' ),
		'description' => sprintf( __( 'In order to edit description please install <a href="%s" target="_blank">Illdy Companion</a>', 'illdy' ), illdy_get_recommended_actions_url() ),
		'section'     => $panel_id,
		'settings'    => $prefix . '_latest_news_general_text',
		'priority'    => 3,
	] ) );
}
$wp_customize->selective_refresh->add_partial( $prefix . '_latest_news_general_entry', [
	'selector' => '#latest-news .section-header .section-description',
] );

// Button Text
$wp_customize->add_setting( $prefix . '_latest_news_button_text', [
	'sanitize_callback' => 'sanitize_text_field',
	'default'           => __( 'See blog', 'illdy' ),
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_latest_news_button_text', [
	'label'       => __( 'Button Text', 'illdy' ),
	'description' => __( 'Add the button text for this section.', 'illdy' ),
	'section'     => $prefix . '_latest_news_general',
	'priority'    => 4,
] );
$wp_customize->selective_refresh->add_partial( $prefix . '_latest_news_button_text', [
	'selector' => '#latest-news .latest-news-button',
] );

// Number of posts
$wp_customize->add_setting( $prefix . '_latest_news_number_of_posts', [
	'sanitize_callback' => 'sanitize_text_field',
	'default'           => 3,
] );

$wp_customize->add_control( new Epsilon_Control_Slider( $wp_customize, $prefix . '_latest_news_number_of_posts', [
	'label'       => esc_html__( 'Number of posts', 'illdy' ),
	'description' => esc_html__( 'Add the number of posts to show in this section.', 'illdy' ),
	'choices'     => [
		'min'  => 3,
		'max'  => 9,
		'step' => 3,
	],
	'section'     => $prefix . '_latest_news_general',
	'priority'    => 5,
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_words_number', [
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 20,
	] );

$wp_customize->add_control( new Epsilon_Control_Slider( $wp_customize, $prefix . '_latest_news_words_number', [
	'label'    => esc_html__( 'Number of words in post entry', 'illdy' ),
	'choices'  => [
		'min'  => 20,
		'max'  => 100,
		'step' => 10,
	],
	'section'  => $prefix . '_latest_news_general',
	'priority' => 6,
] ) );

// Colors
// Colors & Backgrounds
$wp_customize->add_setting( $prefix . '_latest_news_tab', [
	'transport'         => 'postMessage',
	'sanitize_callback' => 'wp_kses_post',
] );
$wp_customize->add_control( new Epsilon_Control_Tab( $wp_customize, $prefix . '_latest_news_tab', [
	'type'    => 'epsilon-tab',
	'section' => $prefix . '_latest_news_general',
	'buttons' => [
		[
			'name'   => __( 'Colors', 'illdy' ),
			'fields' => [
				$prefix . '_latest_news_title_color',
				$prefix . '_latest_news_descriptions_color',
				$prefix . '_latest_news_general_color',
				$prefix . '_latest_news_button_background',
				$prefix . '_latest_news_second_button_background',
				$prefix . '_latest_news_button_background_hover',
				$prefix . '_latest_news_button_color',
				$prefix . '_latest_news_post_bakground_color',
				$prefix . '_latest_news_post_text_color',
				$prefix . '_latest_news_post_text_hover_color',
				$prefix . '_latest_news_post_content_color',
				$prefix . '_latest_news_post_button_color',
				$prefix . '_latest_news_post_button_hover_color',
			],
			'active' => true,
		],
		[
			'name'   => __( 'Backgrounds', 'illdy' ),
			'fields' => [
				$prefix . '_latest_news_general_image',
				$prefix . '_latest_news_background_size',
				$prefix . '_latest_news_background_repeat',
				$prefix . '_latest_news_background_attachment',
				$prefix . '_latest_news_background_position',
			],
		],
	],
] ) );

// Background Image
$wp_customize->add_setting( $prefix . '_latest_news_general_image', [
	'sanitize_callback' => 'esc_url',
	'default'           => '',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_latest_news_general_image', [
	'label'    => __( 'Background Image', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_general_image',
] ) );
$wp_customize->add_setting( $prefix . '_latest_news_background_position_x', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_setting( $prefix . '_latest_news_background_position_y', [
	'default'           => 'center',
	'sanitize_callback' => 'esc_html',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Background_Position_Control( $wp_customize, $prefix . '_latest_news_background_position', [
	'label'    => __( 'Background Position', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => [
		'x' => $prefix . '_latest_news_background_position_x',
		'y' => $prefix . '_latest_news_background_position_y',
	],
] ) );
$wp_customize->add_setting( $prefix . '_latest_news_background_size', [
	'default'           => 'cover',
	'sanitize_callback' => 'illdy_sanitize_background_size',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( $prefix . '_latest_news_background_size', [
	'label'   => __( 'Image Size', 'illdy' ),
	'section' => $prefix . '_latest_news_general',
	'type'    => 'select',
	'choices' => [
		'auto'    => __( 'Original', 'illdy' ),
		'contain' => __( 'Fit to Screen', 'illdy' ),
		'cover'   => __( 'Fill Screen', 'illdy' ),
	],
] );

$wp_customize->add_setting( $prefix . '_latest_news_background_repeat', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_latest_news_background_repeat', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Repeat Background Image', 'illdy' ),
	'section' => $prefix . '_latest_news_general',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_background_attachment', [
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new Epsilon_Control_Toggle( $wp_customize, $prefix . '_latest_news_background_attachment', [
	'type'    => 'epsilon-toggle',
	'label'   => __( 'Scroll with Page', 'illdy' ),
	'section' => $prefix . '_latest_news_general',
] ) );

// Background Color
$wp_customize->add_setting( $prefix . '_latest_news_general_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#222f36',
	'transport'         => 'postMessage',

] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_general_color', [
	'label'    => __( 'Background Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_general_color',
] ) );
$wp_customize->add_setting( $prefix . '_latest_news_title_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_title_color', [
	'label'    => __( 'Title Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_title_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_descriptions_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_descriptions_color', [
	'label'    => __( 'Description Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_descriptions_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_button_background', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#f1d204',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_button_background', [
	'label'    => __( 'Blog Button Background Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_button_background',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_button_background_hover', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#6a4d8a',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_button_background_hover', [
	'label'    => __( 'Blog Button Hover Background Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_button_background_hover',
] ) );

// Colors

$wp_customize->add_setting( $prefix . '_latest_news_button_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_button_color', [
	'label'    => __( 'Blog Button Text Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_button_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_post_bakground_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
] );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_post_bakground_color', [
	'label'    => __( 'Post Box Background Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_post_bakground_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_post_text_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#5e5e5e',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_post_text_color', [
	'label'    => __( 'Post Title Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_post_text_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_post_text_hover_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#f1d204',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_post_text_hover_color', [
	'label'    => __( 'Post Title Hover Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_post_text_hover_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_post_content_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#8c9597',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_post_content_color', [
	'label'    => __( 'Post Content Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_post_content_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_post_button_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#f1d204',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_post_button_color', [
	'label'    => __( 'Blog Button Background Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_post_button_color',
] ) );

$wp_customize->add_setting( $prefix . '_latest_news_post_button_hover_color', [
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#6a4d8a',
	'transport'         => 'postMessage',
] );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_latest_news_post_button_hover_color', [
	'label'    => __( 'Blog Button Hover Background Color', 'illdy' ),
	'section'  => $prefix . '_latest_news_general',
	'settings' => $prefix . '_latest_news_post_button_hover_color',
] ) );
