<?php

// ========== CONTACT & SOCIAL PANEL ==========
$wp_customize->add_panel('my_theme_contact_social_panel', array(
    'title'       => __('Contact & Social Settings', 'my-theme'),
    'description' => __('Centralized settings for contact info and social links', 'my-theme'),
    'priority'    => 25,
));

// ========== CONTACT INFO SECTION ==========
$wp_customize->add_section('my_theme_contact_info_section', array(
    'title'    => __('Contact Information', 'my-theme'),
    'panel'    => 'my_theme_contact_social_panel',
    'priority' => 10,
));

// Phone
$wp_customize->add_setting('my_theme_contact_phone', array(
    'default'           => '+1 (555) 123-4567',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_contact_phone', array(
    'label'    => __('Phone Number', 'my-theme'),
    'section'  => 'my_theme_contact_info_section',
    'type'     => 'text',
));

// Email
$wp_customize->add_setting('my_theme_contact_email', array(
    'default'           => 'hello@techsolutions.com',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_email',
));
$wp_customize->add_control('my_theme_contact_email', array(
    'label'    => __('Email Address', 'my-theme'),
    'section'  => 'my_theme_contact_info_section',
    'type'     => 'email',
));

// Address
$wp_customize->add_setting('my_theme_contact_address', array(
    'default'           => '123 Tech Street, Silicon Valley, CA',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_contact_address', array(
    'label'    => __('Office Address', 'my-theme'),
    'section'  => 'my_theme_contact_info_section',
    'type'     => 'text',
));

// Map Embed Code (for Contact Page)
$wp_customize->add_setting('my_theme_contact_map', array(
    'default'           => '',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control('my_theme_contact_map', array(
    'label'    => __('Google Map Embed Code', 'my-theme'),
    'section'  => 'my_theme_contact_info_section',
    'description' => __('This will be displayed on the Contact Page template.', 'my-theme'),
    'type'     => 'textarea',
));

// ========== SOCIAL LINKS SECTION ==========
$wp_customize->add_section('my_theme_social_links_section', array(
    'title'    => __('Social Media Links', 'my-theme'),
    'panel'    => 'my_theme_contact_social_panel',
    'priority' => 20,
));

$social_platforms = array(
    'facebook'  => 'Facebook',
    'twitter'   => 'Twitter',
    'linkedin'  => 'LinkedIn',
    'instagram' => 'Instagram',
    'whatsapp'  => 'WhatsApp',
);

foreach ($social_platforms as $id => $label) {
    $wp_customize->add_setting('my_theme_' . $id . '_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_' . $id . '_url', array(
        'label'   => sprintf(__('%s URL', 'my-theme'), $label),
        'section' => 'my_theme_social_links_section',
        'type'    => 'url',
    ));
}

// ========== FOOTER EXTRA INFO SECTION ==========
$wp_customize->add_section('my_theme_footer_extra_section', array(
    'title'    => __('Footer Extra Info', 'my-theme'),
    'panel'    => 'my_theme_contact_social_panel',
    'priority' => 30,
));

$wp_customize->add_setting('my_theme_footer_short_desc', array(
    'default'           => __('Professional WordPress theme development for modern businesses.', 'my-theme'),
    'transport'         => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control('my_theme_footer_short_desc', array(
    'label'    => __('Footer Short Description', 'my-theme'),
    'section'  => 'my_theme_footer_extra_section',
    'type'     => 'textarea',
));
