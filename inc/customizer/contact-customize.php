<?php

// ========== CONTACT SECTION ==========
$wp_customize->add_section('my_theme_contact_section', array(
    'title'       => __('Contact Section', 'my-theme'),
    'description' => __('Customize the contact section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 70,
));

// Contact Enable/Disable
$wp_customize->add_setting('my_theme_contact_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_contact_enabled', array(
    'label'    => __('Enable Contact Section', 'my-theme'),
    'section'  => 'my_theme_contact_section',
    'type'     => 'checkbox',
));

// Title
$wp_customize->add_setting('my_theme_contact_title', array(
    'default'           => "Let's Discuss Your Project",
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_contact_title', array(
    'label'    => __('Section Title', 'my-theme'),
    'section'  => 'my_theme_contact_section',
    'type'     => 'text',
));

// Description
$wp_customize->add_setting('my_theme_contact_desc', array(
    'default'           => 'Ready to transform your business with cutting-edge IT solutions?',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_contact_desc', array(
    'label'    => __('Section Description', 'my-theme'),
    'section'  => 'my_theme_contact_section',
    'type'     => 'textarea',
));
