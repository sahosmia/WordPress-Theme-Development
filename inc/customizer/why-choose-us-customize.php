<?php

// ========== WHY CHOOSE US SECTION ==========
$wp_customize->add_section('my_theme_why_choose_section', array(
    'title'       => __('Why Choose Us Section', 'my-theme'),
    'description' => __('Customize the why choose us section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 45,
));

// Why Choose Us Enable/Disable
$wp_customize->add_setting('my_theme_why_choose_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_why_choose_enabled', array(
    'label'    => __('Enable Why Choose Us Section', 'my-theme'),
    'section'  => 'my_theme_why_choose_section',
    'type'     => 'checkbox',
));

// Section Tag
$wp_customize->add_setting('my_theme_why_choose_tag', array(
    'default'           => 'Why Choose Us',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_why_choose_tag', array(
    'label'    => __('Section Tag', 'my-theme'),
    'section'  => 'my_theme_why_choose_section',
    'type'     => 'text',
));

// Section Title
$wp_customize->add_setting('my_theme_why_choose_title', array(
    'default'           => 'What Makes Us Different',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_why_choose_title', array(
    'label'    => __('Section Title', 'my-theme'),
    'section'  => 'my_theme_why_choose_section',
    'type'     => 'text',
));

// Why Choose Us Items
$why_choose_defaults = array(
    1 => array('icon' => '⚡', 'title' => 'Fast Delivery', 'desc' => 'Agile methodology ensures quick turnaround times.'),
    2 => array('icon' => '💎', 'title' => 'Quality Assurance', 'desc' => 'Rigorous testing and quality checks at every stage.'),
    3 => array('icon' => '🤝', 'title' => 'Dedicated Support', 'desc' => 'Personal account manager and 24/7 assistance.'),
    4 => array('icon' => '💰', 'title' => 'Best Value', 'desc' => 'Competitive pricing with enterprise-grade solutions.'),
);

foreach ($why_choose_defaults as $i => $data) {
    // Icon
    $wp_customize->add_setting("my_theme_why_choose_{$i}_icon", array(
        'default'           => $data['icon'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("my_theme_why_choose_{$i}_icon", array(
        'label'    => sprintf(__('Item %d Icon', 'my-theme'), $i),
        'section'  => 'my_theme_why_choose_section',
        'type'     => 'text',
    ));

    // Title
    $wp_customize->add_setting("my_theme_why_choose_{$i}_title", array(
        'default'           => $data['title'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("my_theme_why_choose_{$i}_title", array(
        'label'    => sprintf(__('Item %d Title', 'my-theme'), $i),
        'section'  => 'my_theme_why_choose_section',
        'type'     => 'text',
    ));

    // Description
    $wp_customize->add_setting("my_theme_why_choose_{$i}_desc", array(
        'default'           => $data['desc'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control("my_theme_why_choose_{$i}_desc", array(
        'label'    => sprintf(__('Item %d Description', 'my-theme'), $i),
        'section'  => 'my_theme_why_choose_section',
        'type'     => 'textarea',
    ));
}
