<?php

// ========== CONTACT PAGE SECTION ==========
$wp_customize->add_section('my_theme_contact_page_section', array(
    'title'       => __('Contact Page Settings', 'my-theme'),
    'description' => __('Customize the Contact Us page template', 'my-theme'),
    'priority'    => 120,
));

// Hero Title
$wp_customize->add_setting('my_theme_contact_page_hero_title', array(
    'default'           => 'Get in Touch',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_contact_page_hero_title', array(
    'label'    => __('Hero Title', 'my-theme'),
    'section'  => 'my_theme_contact_page_section',
    'type'     => 'text',
));

// Hero Subtitle
$wp_customize->add_setting('my_theme_contact_page_hero_subtitle', array(
    'default'           => "Have a project in mind? We'd love to hear from you.",
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_contact_page_hero_subtitle', array(
    'label'    => __('Hero Subtitle', 'my-theme'),
    'section'  => 'my_theme_contact_page_section',
    'type'     => 'text',
));

