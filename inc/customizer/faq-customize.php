<?php

 // Define the FAQ section container
    $wp_customize->add_section('my_theme_faq_section', array(
        'title'       => __('FAQ Section', 'my-theme'),
        'description' => __('Customize the contents of your FAQ section', 'my-theme'),
        'panel'       => 'my_theme_homepage_panel',
        'priority'    => 40,
    ));

    // 1. FAQ Section Visibility Toggle
    $wp_customize->add_setting('my_theme_faq_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('my_theme_faq_enabled', array(
        'label'    => __('Enable FAQ Section', 'my-theme'),
        'section'  => 'my_theme_faq_section',
        'type'     => 'checkbox',
    ));

    // 2. FAQ Section Tag/Badge
    $wp_customize->add_setting('my_theme_faq_tag', array(
        'default'           => 'Common Questions',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_faq_tag', array(
        'label'    => __('Section Tag/Badge', 'my-theme'),
        'section'  => 'my_theme_faq_section',
        'type'     => 'text',
    ));

    // 3. FAQ Section Main Title
    $wp_customize->add_setting('my_theme_faq_title', array(
        'default'           => 'Frequently Asked Questions',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_faq_title', array(
        'label'    => __('Section Title', 'my-theme'),
        'section'  => 'my_theme_faq_section',
        'type'     => 'text',
    ));

    // 4. Dynamic Loop to Generate Settings for 4 FAQ Items
    $faq_defaults = array(
        1 => array(
            'q' => '❓ What IT services do you offer?',
            'a' => 'We offer cloud computing, cybersecurity, software development, IT consulting, data analytics, and 24/7 support.'
        ),
        2 => array(
            'q' => '❓ How long does a typical project take?',
            'a' => 'Project timelines vary from 2 weeks to 3 months depending on complexity and requirements.'
        ),
        3 => array(
            'q' => '❓ Do you provide ongoing support?',
            'a' => 'Yes, we offer 24/7 support and maintenance packages for all our clients.'
        ),
        4 => array(
            'q' => '❓ What industries do you serve?',
            'a' => 'We serve healthcare, finance, e-commerce, education, and manufacturing industries.'
        )
    );

    foreach ($faq_defaults as $i => $data) {
        // Dynamic Question Setting & Control
        $wp_customize->add_setting("my_theme_faq_q{$i}", array(
            'default'           => $data['q'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("my_theme_faq_q{$i}", array(
            'label'    => sprintf(__('Question %d', 'my-theme'), $i),
            'section'  => 'my_theme_faq_section',
            'type'     => 'text',
        ));

        // Dynamic Answer Setting & Control
        $wp_customize->add_setting("my_theme_faq_a{$i}", array(
            'default'           => $data['a'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control("my_theme_faq_a{$i}", array(
            'label'    => sprintf(__('Answer %d', 'my-theme'), $i),
            'section'  => 'my_theme_faq_section',
            'type'     => 'textarea',
        ));
    }