<?php

// ========== SERVICES SECTION ==========
$wp_customize->add_section('my_theme_services_section', array(
    'title'       => __('Services Section', 'my-theme'),
    'description' => __('Customize your services section (Add services via Services Post Type)', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 20,
));

// Services Enable/Disable
$wp_customize->add_setting('my_theme_services_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_services_enabled', array(
    'label'    => __('Enable Services Section', 'my-theme'),
    'section'  => 'my_theme_services_section',
    'type'     => 'checkbox',
));

// Services Tag
$wp_customize->add_setting('my_theme_services_tag', array(
    'default'           => __('What We Offer', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_services_tag', array(
    'label'    => __('Section Tag', 'my-theme'),
    'section'  => 'my_theme_services_section',
    'type'     => 'text',
));

// Services Title
$wp_customize->add_setting('my_theme_services_title', array(
    'default'           => __('Comprehensive IT Services', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_services_title', array(
    'label'    => __('Section Title', 'my-theme'),
    'section'  => 'my_theme_services_section',
    'type'     => 'text',
));

// Services Subtitle
$wp_customize->add_setting('my_theme_services_subtitle', array(
    'default'           => __('End-to-end technology solutions to accelerate your business growth', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_services_subtitle', array(
    'label'    => __('Section Subtitle', 'my-theme'),
    'section'  => 'my_theme_services_section',
    'type'     => 'text',
));
