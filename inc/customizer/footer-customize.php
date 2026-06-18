<?php

$wp_customize->add_section('my_theme_footer_section', array(
        'title'       => __('Footer Settings', 'my-theme'),
        'description' => __('Customize your footer area', 'my-theme'),
        'panel'       => 'my_theme_global_panel',
        'priority'    => 30,
    ));

    // Footer Copyright
    $wp_customize->add_setting('my_theme_copyright_text', array(
        'default'           => __('© 2026 My Website. All rights reserved.', 'my-theme'),
        'transport'         => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_copyright_text', array(
        'label'    => __('Copyright Text', 'my-theme'),
        'section'  => 'my_theme_footer_section',
        'type'     => 'textarea',
    ));

    // Footer Description
    $wp_customize->add_setting('my_theme_footer_description', array(
        'default'           => __('Professional WordPress theme development for modern businesses.', 'my-theme'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_footer_description', array(
        'label'    => __('Footer Description', 'my-theme'),
        'section'  => 'my_theme_footer_section',
        'type'     => 'textarea',
    ));

    // Footer Background Color
    $wp_customize->add_setting('my_theme_footer_bg', array(
        'default'           => '#1e293b',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my_theme_footer_bg', array(
        'label'    => __('Footer Background Color', 'my-theme'),
        'section'  => 'my_theme_footer_section',
        'settings' => 'my_theme_footer_bg',
    )));

    // Social Media Links
    $wp_customize->add_setting('my_theme_facebook_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_facebook_url', array(
        'label'    => __('Facebook URL', 'my-theme'),
        'section'  => 'my_theme_footer_section',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('my_theme_twitter_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_twitter_url', array(
        'label'    => __('Twitter URL', 'my-theme'),
        'section'  => 'my_theme_footer_section',
        'type'     => 'url',
    ));

    $wp_customize->add_setting('my_theme_linkedin_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_linkedin_url', array(
        'label'    => __('LinkedIn URL', 'my-theme'),
        'section'  => 'my_theme_footer_section',
        'type'     => 'url',
    ));
