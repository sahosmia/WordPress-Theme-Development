<?php

// ========== 404 PAGE SECTION ==========
$wp_customize->add_section('my_theme_404_page_section', array(
    'title'       => __('404 Page Settings', 'my-theme'),
    'description' => __('Customize the 404 error page', 'my-theme'),
    'priority'    => 110,
));

// Title
$wp_customize->add_setting('my_theme_404_title', array(
    'default'           => 'Oops! Page Not Found',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_404_title', array(
    'label'    => __('Error Title', 'my-theme'),
    'section'  => 'my_theme_404_page_section',
    'type'     => 'text',
));

// Description
$wp_customize->add_setting('my_theme_404_description', array(
    'default'           => "We searched high and low, but couldn't find the page you're looking for. It might have been moved, deleted, or never existed.",
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_404_description', array(
    'label'    => __('Error Description', 'my-theme'),
    'section'  => 'my_theme_404_page_section',
    'type'     => 'textarea',
));
