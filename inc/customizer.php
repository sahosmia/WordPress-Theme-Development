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

    // Load separate customizer files
    require_once $customizer_path . 'colors-customize.php';
    require_once $customizer_path . 'header-customize.php';
    require_once $customizer_path . 'hero-customize.php';
    require_once $customizer_path . 'about-customize.php';
    require_once $customizer_path . 'services-customize.php';
    require_once $customizer_path . 'cta-customize.php';
    require_once $customizer_path . 'why-choose-us-customize.php';
    require_once $customizer_path . 'testimonials-customize.php';
    require_once $customizer_path . 'faq-customize.php';
    require_once $customizer_path . 'team-customize.php';
    require_once $customizer_path . 'contact-customize.php';
    require_once $customizer_path . 'footer-customize.php';
    require_once $customizer_path . 'about-page-customize.php';
    require_once $customizer_path . 'error-404-customize.php';
}
add_action('customize_register', 'my_theme_customizer_register');
