<?php

// ========== PORTFOLIO SECTION ==========
$wp_customize->add_section('my_theme_portfolio_section', array(
    'title'       => __('Portfolio Section', 'my-theme'),
    'description' => __('Customize your portfolio section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 25,
));

// Portfolio Enable/Disable
$wp_customize->add_setting('my_theme_portfolio_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_portfolio_enabled', array(
    'label'    => __('Enable Portfolio Section', 'my-theme'),
    'section'  => 'my_theme_portfolio_section',
    'type'     => 'checkbox',
));

// Portfolio Tag
$wp_customize->add_setting('my_theme_portfolio_tag', array(
    'default'           => 'Our Portfolio',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_portfolio_tag', array(
    'label'    => __('Section Tag', 'my-theme'),
    'section'  => 'my_theme_portfolio_section',
    'type'     => 'text',
));

// Portfolio Title
$wp_customize->add_setting('my_theme_portfolio_title', array(
    'default'           => 'Featured Projects',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_portfolio_title', array(
    'label'    => __('Section Title', 'my-theme'),
    'section'  => 'my_theme_portfolio_section',
    'type'     => 'text',
));

// Portfolio Subtitle
$wp_customize->add_setting('my_theme_portfolio_subtitle', array(
    'default'           => 'Showcasing our latest work and success stories',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_portfolio_subtitle', array(
    'label'    => __('Section Subtitle', 'my-theme'),
    'section'  => 'my_theme_portfolio_section',
    'type'     => 'text',
));
