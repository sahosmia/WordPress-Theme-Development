<?php

// =======================================================
// TESTIMONIALS SECTION CUSTOMIZER
// =======================================================
$wp_customize->add_section('my_theme_testimonials_section', array(
    'title'       => __('Testimonials Section', 'my-theme'),
    'description' => __('Customize the client testimonials section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 50,
));

// Section visibility toggle
$wp_customize->add_setting('my_theme_testimonials_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_testimonials_enabled', array(
    'label'    => __('Enable Testimonials Section', 'my-theme'),
    'section'  => 'my_theme_testimonials_section',
    'type'     => 'checkbox',
));

// Section tag
$wp_customize->add_setting('my_theme_testimonials_tag', array(
    'default'           => 'Client Feedback',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_testimonials_tag', array(
    'label'    => __('Section Tag/Badge', 'my-theme'),
    'section'  => 'my_theme_testimonials_section',
    'type'     => 'text',
));

// Section heading
$wp_customize->add_setting('my_theme_testimonials_title', array(
    'default'           => 'What Our Clients Say',
    'transport'         => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('my_theme_testimonials_title', array(
    'label'    => __('Section Title', 'my-theme'),
    'section'  => 'my_theme_testimonials_section',
    'type'     => 'text',
));

// Testimonial cards default loop data
$testimonial_defaults = array(
    1 => array(
        'text' => 'Outstanding service! TechSolutions transformed our IT infrastructure completely.',
        'name' => 'Sarah Johnson',
        'desc' => 'CEO, TechStart'
    ),
    2 => array(
        'text' => 'Professional team, excellent communication, and top-notch technical expertise.',
        'name' => 'Michael Chen',
        'desc' => 'CTO, InnovateCorp'
    ),
    3 => array(
        'text' => 'Their cloud migration service saved us 40% on operational costs. Highly recommended!',
        'name' => 'Emily Rodriguez',
        'desc' => 'Director, GlobalSoft'
    )
);

foreach ($testimonial_defaults as $i => $data) {
    // Feedback Text
    $wp_customize->add_setting("my_theme_testimonial_text{$i}", array(
        'default'           => $data['text'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control("my_theme_testimonial_text{$i}", array(
        'label'    => sprintf(__('Testimonial %d: Review Text', 'my-theme'), $i),
        'section'  => 'my_theme_testimonials_section',
        'type'     => 'textarea',
    ));

    // Client Name
    $wp_customize->add_setting("my_theme_testimonial_name{$i}", array(
        'default'           => $data['name'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("my_theme_testimonial_name{$i}", array(
        'label'    => sprintf(__('Testimonial %d: Client Name', 'my-theme'), $i),
        'section'  => 'my_theme_testimonials_section',
        'type'     => 'text',
    ));

    // Client Designation / Company
    $wp_customize->add_setting("my_theme_testimonial_desc{$i}", array(
        'default'           => $data['desc'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control("my_theme_testimonial_desc{$i}", array(
        'label'    => sprintf(__('Testimonial %d: Client Title', 'my-theme'), $i),
        'section'  => 'my_theme_testimonials_section',
        'type'     => 'text',
    ));
}
