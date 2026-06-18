<?php

// ========== COLOR SECTION ==========
$wp_customize->add_section('my_theme_colors_section', array(
    'title'       => __('Theme Colors', 'my-theme'),
    'description' => __('Customize your theme colors', 'my-theme'),
    'panel'       => 'my_theme_global_panel',
    'priority'    => 10,
));

// Primary Color
$wp_customize->add_setting('my_theme_primary_color', array(
    'default'           => '#2563eb',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my_theme_primary_color', array(
    'label'    => __('Primary Color', 'my-theme'),
    'section'  => 'my_theme_colors_section',
    'settings' => 'my_theme_primary_color',
)));

// Secondary Color
$wp_customize->add_setting('my_theme_secondary_color', array(
    'default'           => '#3b82f6',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my_theme_secondary_color', array(
    'label'    => __('Secondary Color', 'my-theme'),
    'section'  => 'my_theme_colors_section',
    'settings' => 'my_theme_secondary_color',
)));

// Dark Color
$wp_customize->add_setting('my_theme_dark_color', array(
    'default'           => '#1e293b',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my_theme_dark_color', array(
    'label'    => __('Dark Color', 'my-theme'),
    'section'  => 'my_theme_colors_section',
    'settings' => 'my_theme_dark_color',
)));
