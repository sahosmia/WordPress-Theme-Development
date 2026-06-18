<?php

function my_theme_customizer_register($wp_customize)
{
    $customizer_path = get_template_directory() . '/inc/customizer/';

    // ========== PANELS ==========
    $wp_customize->add_panel('my_theme_global_panel', array(
        'title'       => __('Theme Global Settings', 'my-theme'),
        'description' => __('Global theme settings including colors and layout', 'my-theme'),
        'priority'    => 5,
    ));

    $wp_customize->add_panel('my_theme_homepage_panel', array(
        'title'       => __('Home Page Sections', 'my-theme'),
        'description' => __('Customize all sections on the home page', 'my-theme'),
        'priority'    => 10,
    ));

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

    // ========== HEADER SECTION ==========
    $wp_customize->add_section('my_theme_header_section', array(
        'title'       => __('Header Settings', 'my-theme'),
        'description' => __('Customize your header area', 'my-theme'),
        'panel'       => 'my_theme_global_panel',
        'priority'    => 20,
    ));

    // Header Layout
    $wp_customize->add_setting('my_theme_header_layout', array(
        'default'           => 'standard',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_header_layout', array(
        'label'    => __('Header Layout', 'my-theme'),
        'section'  => 'my_theme_header_section',
        'type'     => 'select',
        'choices'  => array(
            'standard' => __('Standard (Logo Left, Menu Right)', 'my-theme'),
            'centered' => __('Centered (Logo and Menu Centered)', 'my-theme'),
            'stacked'  => __('Stacked (Logo Above Menu)', 'my-theme'),
        ),
    ));

    // Header Background Color
    $wp_customize->add_setting('my_theme_header_bg', array(
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'my_theme_header_bg', array(
        'label'    => __('Header Background Color', 'my-theme'),
        'section'  => 'my_theme_header_section',
        'settings' => 'my_theme_header_bg',
    )));

    // ========== HERO SECTION ==========
    $wp_customize->add_section('my_theme_hero_section', array(
        'title'       => __('Hero Section', 'my-theme'),
        'description' => __('Customize the main hero banner', 'my-theme'),
        'panel'       => 'my_theme_homepage_panel',
        'priority'    => 10,
    ));

    // ১. Hero Enable/Disable
    $wp_customize->add_setting('my_theme_hero_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('my_theme_hero_enabled', array(
        'label'    => __('Enable Hero Section', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'checkbox',
    ));

    // Hero Badge Text
    $wp_customize->add_setting('my_theme_hero_badge', array(
        'default'           => 'Premium IT Services',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_hero_badge', array(
        'label'    => __('Hero Badge Text', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'text',
    ));

    // Hero Title
    $wp_customize->add_setting('my_theme_hero_title', array(
        'default'           => 'Future-Ready <span>Tech Solutions</span> for Your Business',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_hero_title', array(
        'label'    => __('Hero Title', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'textarea',
    ));

    // Hero Subtitle 
    $wp_customize->add_setting('my_theme_hero_subtitle', array(
        'default'           => 'We provide cutting-edge IT services including cloud computing, cybersecurity, software development, and 24/7 technical support.',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'textarea',
    ));

    // ------------------------------------------
    // Primary Button
    // ------------------------------------------
    $wp_customize->add_setting('my_theme_hero_btn_text', array(
        'default'           => 'Get Started →',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_hero_btn_text', array(
        'label'    => __('Button 1 Text', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_hero_btn_url', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_hero_btn_url', array(
        'label'    => __('Button 1 URL', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'url',
    ));


    // Outline Button
    $wp_customize->add_setting('my_theme_hero_btn2_text', array(
        'default'           => 'Explore Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_hero_btn2_text', array(
        'label'    => __('Button 2 Text', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_hero_btn2_url', array(
        'default'           => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_hero_btn2_url', array(
        'label'    => __('Button 2 URL', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'type'     => 'url',
    ));


    // Stat 1
    $wp_customize->add_setting('my_theme_hero_stat1', array('default' => '500+ Projects Done', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('my_theme_hero_stat1', array('label' => __('Stat 1 (e.g. 500+ Projects Done)', 'my-theme'), 'section' => 'my_theme_hero_section', 'type' => 'text'));

    // Stat 2
    $wp_customize->add_setting('my_theme_hero_stat2', array('default' => '120+ Happy Clients', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('my_theme_hero_stat2', array('label' => __('Stat 2', 'my-theme'), 'section' => 'my_theme_hero_section', 'type' => 'text'));

    // Stat 3
    $wp_customize->add_setting('my_theme_hero_stat3', array('default' => '24/7 Support', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('my_theme_hero_stat3', array('label' => __('Stat 3', 'my-theme'), 'section' => 'my_theme_hero_section', 'type' => 'text'));

    // ---------- Hero Right Side Image / Illustration
    $wp_customize->add_setting('my_theme_hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_theme_hero_bg_image', array(
        'label'    => __('Hero Right Side Image', 'my-theme'),
        'section'  => 'my_theme_hero_section',
        'settings' => 'my_theme_hero_bg_image',
    )));

    // ========== SERVICES SECTION ==========
    $wp_customize->add_section('my_theme_services_section', array(
        'title'       => __('Services Section', 'my-theme'),
        'description' => __('Customize your services section', 'my-theme'),
        'panel'       => 'my_theme_homepage_panel',
        'priority'    => 20,
    ));

    // Services Enable/Disable
    $wp_customize->add_setting('my_theme_services_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('my_theme_services_enabled', array(
        'label'    => __('Enable Services Section', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'checkbox',
    ));

    // Services Title
    $wp_customize->add_setting('my_theme_services_title', array(
        'default'           => __('Our Services', 'my-theme'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_services_title', array(
        'label'    => __('Section Title', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    // Services Subtitle
    $wp_customize->add_setting('my_theme_services_subtitle', array(
        'default'           => __('What we offer to our clients', 'my-theme'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_services_subtitle', array(
        'label'    => __('Section Subtitle', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    // Service 1
    $wp_customize->add_setting('my_theme_service_1_icon', array(
        'default'           => '💻',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_service_1_icon', array(
        'label'    => __('Service 1 Icon', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_service_1_title', array(
        'default'           => __('Web Development', 'my-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_service_1_title', array(
        'label'    => __('Service 1 Title', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_service_1_desc', array(
        'default'           => __('Custom WordPress websites built with latest technologies and best practices.', 'my-theme'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_service_1_desc', array(
        'label'    => __('Service 1 Description', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'textarea',
    ));

    // Service 2
    $wp_customize->add_setting('my_theme_service_2_icon', array(
        'default'           => '📱',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_service_2_icon', array(
        'label'    => __('Service 2 Icon', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_service_2_title', array(
        'default'           => __('Mobile Responsive', 'my-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_service_2_title', array(
        'label'    => __('Service 2 Title', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_service_2_desc', array(
        'default'           => __('Fully responsive designs that look perfect on all devices.', 'my-theme'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_service_2_desc', array(
        'label'    => __('Service 2 Description', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'textarea',
    ));

    // Service 3
    $wp_customize->add_setting('my_theme_service_3_icon', array(
        'default'           => '🚀',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_service_3_icon', array(
        'label'    => __('Service 3 Icon', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_service_3_title', array(
        'default'           => __('SEO Optimized', 'my-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_service_3_title', array(
        'label'    => __('Service 3 Title', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_service_3_desc', array(
        'default'           => __('Built with SEO best practices to help you rank higher.', 'my-theme'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_service_3_desc', array(
        'label'    => __('Service 3 Description', 'my-theme'),
        'section'  => 'my_theme_services_section',
        'type'     => 'textarea',
    ));

    // ========== ABOUT SECTION ==========
    // Define the About Us section container
    $wp_customize->add_section('my_theme_about_section', array(
        'title'       => __('About Section', 'my-theme'),
        'description' => __('Customize the contents of the about section', 'my-theme'),
        'panel'       => 'my_theme_homepage_panel',
        'priority'    => 30,
    ));

    // 1. About Section Visibility Toggle
    $wp_customize->add_setting('my_theme_about_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('my_theme_about_enabled', array(
        'label'    => __('Enable About Section', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'type'     => 'checkbox',
    ));

    // 2. About Section Tag/Badge (Fixed: Was missing entirely)
    $wp_customize->add_setting('my_theme_about_tag', array(
        'default'           => 'About Us',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_about_tag', array(
        'label'    => __('Section Tag/Badge', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'type'     => 'text',
    ));

    // 3. About Section Title (Fixed: Synced default text with your design layout)
    $wp_customize->add_setting('my_theme_about_title', array(
        'default'           => 'We Deliver Excellence in IT Services Since 2015',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_about_title', array(
        'label'    => __('About Title', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'type'     => 'textarea',
    ));

    // 4. About Description (Fixed: Synced setting ID with your HTML call 'my_theme_about_desc' & optimized to textarea)
    $wp_customize->add_setting('my_theme_about_desc', array(
        'default'           => 'TechSolutions Pro is a leading IT service provider helping businesses transform digitally. Our team of 50+ experts delivers innovative solutions tailored to your needs.',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('my_theme_about_desc', array(
        'label'    => __('About Description', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'type'     => 'textarea',
    ));

    // 5. Dynamic Features List Settings & Controls (Fixed: Added fields for your HTML feature loop)
    $features_defaults = array(
        1 => '8+ Years Experience',
        2 => 'Certified Professionals',
        3 => 'Global Client Base',
        4 => '99.9% Uptime Guarantee'
    );

    foreach ($features_defaults as $i => $default_text) {
        $wp_customize->add_setting("my_theme_about_feature{$i}", array(
            'default'           => $default_text,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("my_theme_about_feature{$i}", array(
            'label'    => sprintf(__('Feature Keypoint %d', 'my-theme'), $i),
            'section'  => 'my_theme_about_section',
            'type'     => 'text',
        ));
    }

    // 6. Action Button Properties (Fixed: Added settings for your target button parameters)
    $wp_customize->add_setting('my_theme_about_btn_text', array(
        'default'           => 'Learn More About Us →',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_about_btn_text', array(
        'label'    => __('Button Text', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('my_theme_about_btn_url', array(
        'default'           => 'about.php',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_about_btn_url', array(
        'label'    => __('Button Destination URL', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'type'     => 'url',
    ));

    // 7. About Right Side Image Media Control
    $wp_customize->add_setting('my_theme_about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_theme_about_image', array(
        'label'    => __('About Featured Image', 'my-theme'),
        'section'  => 'my_theme_about_section',
        'settings' => 'my_theme_about_image',
    )));


    // CTA Enable/Disable
    $wp_customize->add_setting('my_theme_cta_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('my_theme_cta_enabled', array(
        'label'    => __('Enable CTA Section', 'my-theme'),
        'section'  => 'my_theme_cta_section',
        'type'     => 'checkbox',
    ));

    // CTA Title
    $wp_customize->add_setting('my_theme_cta_title', array(
        'default'           => __('Ready to Get Started?', 'my-theme'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_cta_title', array(
        'label'    => __('CTA Title', 'my-theme'),
        'section'  => 'my_theme_cta_section',
        'type'     => 'text',
    ));

    // CTA Description
    $wp_customize->add_setting('my_theme_cta_description', array(
        'default'           => __('Contact us today for a free consultation.', 'my-theme'),
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_cta_description', array(
        'label'    => __('CTA Description', 'my-theme'),
        'section'  => 'my_theme_cta_section',
        'type'     => 'textarea',
    ));

    // CTA Button Text
    $wp_customize->add_setting('my_theme_cta_btn_text', array(
        'default'           => __('Contact Us', 'my-theme'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_cta_btn_text', array(
        'label'    => __('CTA Button Text', 'my-theme'),
        'section'  => 'my_theme_cta_section',
        'type'     => 'text',
    ));

    // CTA Button URL
    $wp_customize->add_setting('my_theme_cta_btn_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('my_theme_cta_btn_url', array(
        'label'    => __('CTA Button URL', 'my-theme'),
        'section'  => 'my_theme_cta_section',
        'type'     => 'url',
    ));

    // ========== FOOTER SECTION ==========
    require_once $customizer_path . 'footer-customize.php';
    

    /*----------    FAQ section     ------------*/
   require_once $customizer_path . 'faq-customize.php';

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


    // =======================================================
    // TEAM SECTION CUSTOMIZER
    // =======================================================
    $wp_customize->add_section('my_theme_team_section', array(
        'title'       => __('Team Section', 'my-theme'),
        'description' => __('Customize the team leadership profiles section', 'my-theme'),
        'panel'       => 'my_theme_homepage_panel',
        'priority'    => 60,
    ));

    // Section visibility toggle
    $wp_customize->add_setting('my_theme_team_enabled', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('my_theme_team_enabled', array(
        'label'    => __('Enable Team Section', 'my-theme'),
        'section'  => 'my_theme_team_section',
        'type'     => 'checkbox',
    ));

    // Section tag
    $wp_customize->add_setting('my_theme_team_tag', array(
        'default'           => 'Our Experts',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_team_tag', array(
        'label'    => __('Section Tag/Badge', 'my-theme'),
        'section'  => 'my_theme_team_section',
        'type'     => 'text',
    ));

    // Section heading
    $wp_customize->add_setting('my_theme_team_title', array(
        'default'           => 'Meet Our Leadership Team',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('my_theme_team_title', array(
        'label'    => __('Section Title', 'my-theme'),
        'section'  => 'my_theme_team_section',
        'type'     => 'text',
    ));

    // Team members default loop data
    $team_defaults = array(
        1 => array('name' => 'David Wilson', 'role' => 'CEO & Founder'),
        2 => array('name' => 'Dr. Lisa Park', 'role' => 'CTO'),
        3 => array('name' => 'James Martinez', 'role' => 'Head of Operations')
    );

    foreach ($team_defaults as $i => $member) {
        // Member Name
        $wp_customize->add_setting("my_theme_team_name{$i}", array(
            'default'           => $member['name'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("my_theme_team_name{$i}", array(
            'label'    => sprintf(__('Member %d: Full Name', 'my-theme'), $i),
            'section'  => 'my_theme_team_section',
            'type'     => 'text',
        ));

        // Member Designation / Role
        $wp_customize->add_setting("my_theme_team_role{$i}", array(
            'default'           => $member['role'],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("my_theme_team_role{$i}", array(
            'label'    => sprintf(__('Member %d: Designation', 'my-theme'), $i),
            'section'  => 'my_theme_team_section',
            'type'     => 'text',
        ));

        // Image Selection (Media Upload)
        $wp_customize->add_setting("my_theme_team_image{$i}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "my_theme_team_image{$i}", array(
            'label'    => sprintf(__('Member %d: Profile Image', 'my-theme'), $i),
            'section'  => 'my_theme_team_section',
        )));
    }
}
add_action('customize_register', 'my_theme_customizer_register');
