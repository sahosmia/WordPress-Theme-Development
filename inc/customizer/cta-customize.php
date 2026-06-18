<?php

// ========== CTA SECTION ==========
$wp_customize->add_section('my_theme_cta_section', array(
    'title'       => __('CTA Section', 'my-theme'),
    'description' => __('Customize the call to action section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 35,
));

// CTA Enable/Disable
$wp_customize->add_setting('my_theme_cta_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_cta_enabled', array(
    'label'    => __('Enable CTA Section', 'my-theme'),
    'section'  => 'my_theme_cta_section',
    'type'     => 'checkbox',
));

// CTA Title
$wp_customize->add_setting('my_theme_cta_title', array(
    'default'           => __('Ready to Get Started?', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_cta_title', array(
    'label'    => __('CTA Title', 'my-theme'),
    'section'  => 'my_theme_cta_section',
    'type'     => 'text',
));

// CTA Description
$wp_customize->add_setting('my_theme_cta_description', array(
    'default'           => __('Contact us today for a free consultation.', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_cta_description', array(
    'label'    => __('CTA Description', 'my-theme'),
    'section'  => 'my_theme_cta_section',
    'type'     => 'textarea',
));

// CTA Button Text
$wp_customize->add_setting('my_theme_cta_btn_text', array(
    'default'           => __('Contact Us', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_cta_btn_text', array(
    'label'    => __('CTA Button Text', 'my-theme'),
    'section'  => 'my_theme_cta_section',
    'type'     => 'text',
));

// CTA Button URL
$wp_customize->add_setting('my_theme_cta_btn_url', array(
    'default'           => '#',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('my_theme_cta_btn_url', array(
    'label'    => __('CTA Button URL', 'my-theme'),
    'section'  => 'my_theme_cta_section',
    'type'     => 'url',
));
