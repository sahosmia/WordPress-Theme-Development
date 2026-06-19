<?php

// ========== HEADER SECTION ==========
$wp_customize->add_section('my_theme_header_section', array(
    'title'       => __('Header Settings', 'my-theme'),
    'description' => __('Customize your header area', 'my-theme'),
    'panel'       => 'my_theme_global_panel',
    'priority'    => 20,
));

// Header Layout
$wp_customize->add_setting('my_theme_header_layout', array(
    'default'           => 'standard',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_header_layout', array(
    'label'    => __('Header Layout', 'my-theme'),
    'section'  => 'my_theme_header_section',
    'type'     => 'select',
    'choices'  => array(
        'standard' => __('Standard (Logo Left, Menu Right)', 'my-theme'),
        'centered' => __('Centered (Logo and Menu Centered)', 'my-theme'),
        'stacked'  => __('Stacked (Logo Above Menu)', 'my-theme'),
    ),
));

// Header Background Color
$wp_customize->add_setting('my_theme_header_bg', array(
    'default'           => '#ffffff',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my_theme_header_bg', array(
    'label'    => __('Header Background Color', 'my-theme'),
    'section'  => 'my_theme_header_section',
    'settings' => 'my_theme_header_bg',
)));

// Logo Text
$wp_customize->add_setting('my_theme_logo_text', array(
    'default'           => '🚀 TechSolutions',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_logo_text', array(
    'label'    => __('Logo Text', 'my-theme'),
    'section'  => 'my_theme_header_section',
    'type'     => 'text',
));

// Header Button Text
$wp_customize->add_setting('my_theme_header_btn_text', array(
    'default'           => 'Contact Us',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_header_btn_text', array(
    'label'    => __('Header Button Text', 'my-theme'),
    'section'  => 'my_theme_header_section',
    'type'     => 'text',
));

// Header Button URL
$wp_customize->add_setting('my_theme_header_btn_url', array(
    'default'           => '#contact',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('my_theme_header_btn_url', array(
    'label'    => __('Header Button URL', 'my-theme'),
    'section'  => 'my_theme_header_section',
    'type'     => 'url',
));
