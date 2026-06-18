<?php

// ========== ABOUT PAGE SECTION ==========
$wp_customize->add_section('my_theme_about_page_section', array(
    'title'       => __('About Page Settings', 'my-theme'),
    'description' => __('Customize the About Us page template', 'my-theme'),
    'priority'    => 100,
));

// Hero Title
$wp_customize->add_setting('my_theme_about_page_hero_title', array(
    'default'           => 'About TechSolutions Pro',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_about_page_hero_title', array(
    'label'    => __('Hero Title', 'my-theme'),
    'section'  => 'my_theme_about_page_section',
    'type'     => 'text',
));

// Hero Subtitle
$wp_customize->add_setting('my_theme_about_page_hero_subtitle', array(
    'default'           => 'Innovative IT solutions for the modern enterprise',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_about_page_hero_subtitle', array(
    'label'    => __('Hero Subtitle', 'my-theme'),
    'section'  => 'my_theme_about_page_section',
    'type'     => 'text',
));

// Journey Title
$wp_customize->add_setting('my_theme_about_page_journey_title', array(
    'default'           => 'Our Journey',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_about_page_journey_title', array(
    'label'    => __('Journey Title', 'my-theme'),
    'section'  => 'my_theme_about_page_section',
    'type'     => 'text',
));

// Journey Content
$wp_customize->add_setting('my_theme_about_page_journey_content', array(
    'default'           => 'Founded in 2015, TechSolutions Pro started with a mission to democratize enterprise-grade IT services for businesses of all sizes. Today, we serve over 120 clients globally, providing cutting-edge solutions in cloud computing, cybersecurity, and software development.',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control('my_theme_about_page_journey_content', array(
    'label'    => __('Journey Content', 'my-theme'),
    'section'  => 'my_theme_about_page_section',
    'type'     => 'textarea',
));
