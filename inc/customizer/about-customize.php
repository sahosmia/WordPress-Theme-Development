<?php

// ========== ABOUT SECTION ==========
$wp_customize->add_section('my_theme_about_section', array(
    'title'       => __('About Section', 'my-theme'),
    'description' => __('Customize the contents of the about section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 30,
));

// 1. About Section Visibility Toggle
$wp_customize->add_setting('my_theme_about_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_about_enabled', array(
    'label'    => __('Enable About Section', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'type'     => 'checkbox',
));

// 2. About Section Tag/Badge
$wp_customize->add_setting('my_theme_about_tag', array(
    'default'           => 'About Us',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_about_tag', array(
    'label'    => __('Section Tag/Badge', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'type'     => 'text',
));

// 3. About Section Title
$wp_customize->add_setting('my_theme_about_title', array(
    'default'           => 'We Deliver Excellence in IT Services Since 2015',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_about_title', array(
    'label'    => __('About Title', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'type'     => 'textarea',
));

// 4. About Description
$wp_customize->add_setting('my_theme_about_desc', array(
    'default'           => 'TechSolutions Pro is a leading IT service provider helping businesses transform digitally. Our team of 50+ experts delivers innovative solutions tailored to your needs.',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control('my_theme_about_desc', array(
    'label'    => __('About Description', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'type'     => 'textarea',
));

// 5. Dynamic Features List Settings & Controls
$features_defaults = array(
    1 => '8+ Years Experience',
    2 => 'Certified Professionals',
    3 => 'Global Client Base',
    4 => '99.9% Uptime Guarantee'
);

foreach ($features_defaults as $i => $default_text) {
    $wp_customize->add_setting("my_theme_about_feature{$i}", array(
        'default'           => $default_text,
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("my_theme_about_feature{$i}", array(
        'label'    => sprintf(__('Feature Keypoint %d', 'my-theme'), $i),
        'section'  => 'my_theme_about_section',
        'type'     => 'text',
    ));
}

// 6. Action Button Properties
$wp_customize->add_setting('my_theme_about_btn_text', array(
    'default'           => 'Learn More About Us →',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_about_btn_text', array(
    'label'    => __('Button Text', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'type'     => 'text',
));

$wp_customize->add_setting('my_theme_about_btn_url', array(
    'default'           => 'about.php',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('my_theme_about_btn_url', array(
    'label'    => __('Button Destination URL', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'type'     => 'url',
));

// 7. About Right Side Image Media Control
$wp_customize->add_setting('my_theme_about_image', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_theme_about_image', array(
    'label'    => __('About Featured Image', 'my-theme'),
    'section'  => 'my_theme_about_section',
    'settings' => 'my_theme_about_image',
)));
