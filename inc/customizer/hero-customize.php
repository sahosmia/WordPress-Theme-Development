<?php

// ========== HERO SECTION ==========
$wp_customize->add_section('my_theme_hero_section', array(
    'title'       => __('Hero Section', 'my-theme'),
    'description' => __('Customize the main hero banner', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 10,
));

// ১. Hero Enable/Disable
$wp_customize->add_setting('my_theme_hero_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_hero_enabled', array(
    'label'    => __('Enable Hero Section', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'checkbox',
));

// Hero Badge Text
$wp_customize->add_setting('my_theme_hero_badge', array(
    'default'           => 'Premium IT Services',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_hero_badge', array(
    'label'    => __('Hero Badge Text', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'text',
));

// Hero Title
$wp_customize->add_setting('my_theme_hero_title', array(
    'default'           => 'Future-Ready <span>Tech Solutions</span> for Your Business',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control('my_theme_hero_title', array(
    'label'    => __('Hero Title', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'textarea',
));

// Hero Subtitle 
$wp_customize->add_setting('my_theme_hero_subtitle', array(
    'default'           => 'We provide cutting-edge IT services including cloud computing, cybersecurity, software development, and 24/7 technical support.',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control('my_theme_hero_subtitle', array(
    'label'    => __('Hero Subtitle', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'textarea',
));

// Primary Button
$wp_customize->add_setting('my_theme_hero_btn_text', array(
    'default'           => 'Get Started →',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_hero_btn_text', array(
    'label'    => __('Button 1 Text', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'text',
));

$wp_customize->add_setting('my_theme_hero_btn_url', array(
    'default'           => '#contact',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('my_theme_hero_btn_url', array(
    'label'    => __('Button 1 URL', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'url',
));

// Outline Button
$wp_customize->add_setting('my_theme_hero_btn2_text', array(
    'default'           => 'Explore Services',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_hero_btn2_text', array(
    'label'    => __('Button 2 Text', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'text',
));

$wp_customize->add_setting('my_theme_hero_btn2_url', array(
    'default'           => '#services',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('my_theme_hero_btn2_url', array(
    'label'    => __('Button 2 URL', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'type'     => 'url',
));

// Stat 1
$wp_customize->add_setting('my_theme_hero_stat1', array('default' => '500+ Projects Done', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field'));
$wp_customize->add_control('my_theme_hero_stat1', array('label' => __('Stat 1 (e.g. 500+ Projects Done)', 'my-theme'), 'section' => 'my_theme_hero_section', 'type' => 'text'));

// Stat 2
$wp_customize->add_setting('my_theme_hero_stat2', array('default' => '120+ Happy Clients', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field'));
$wp_customize->add_control('my_theme_hero_stat2', array('label' => __('Stat 2', 'my-theme'), 'section' => 'my_theme_hero_section', 'type' => 'text'));

// Stat 3
$wp_customize->add_setting('my_theme_hero_stat3', array('default' => '24/7 Support', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field'));
$wp_customize->add_control('my_theme_hero_stat3', array('label' => __('Stat 3', 'my-theme'), 'section' => 'my_theme_hero_section', 'type' => 'text'));

// ---------- Hero Right Side Image / Illustration
$wp_customize->add_setting('my_theme_hero_bg_image', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_theme_hero_bg_image', array(
    'label'    => __('Hero Right Side Image', 'my-theme'),
    'section'  => 'my_theme_hero_section',
    'settings' => 'my_theme_hero_bg_image',
)));
