<?php
/**
 * FAQ Section Customizer
 */

require_once get_template_directory() . '/inc/customizer/custom-controls.php';

// Define the FAQ section container
$wp_customize->add_section('my_theme_faq_section', array(
    'title'       => __('FAQ Section', 'my-theme'),
    'description' => __('Customize the contents of your FAQ section', 'my-theme'),
    'panel'       => 'my_theme_homepage_panel',
    'priority'    => 40,
));

// FAQ Section Visibility Toggle
$wp_customize->add_setting('my_theme_faq_enabled', array(
    'default'           => true,
    'sanitize_callback' => 'wp_validate_boolean',
));
$wp_customize->add_control('my_theme_faq_enabled', array(
    'label'    => __('Enable FAQ Section', 'my-theme'),
    'section'  => 'my_theme_faq_section',
    'type'     => 'checkbox',
));

// FAQ Section Tag/Badge
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

// FAQ Section Main Title
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

// FAQ Items Repeater
$faq_defaults = array(
    array(
        'q' => '❓ What IT services do you offer?',
        'a' => 'We offer cloud computing, cybersecurity, software development, IT consulting, data analytics, and 24/7 support.'
    ),
    array(
        'q' => '❓ How long does a typical project take?',
        'a' => 'Project timelines vary from 2 weeks to 3 months depending on complexity and requirements.'
    ),
    array(
        'q' => '❓ Do you provide ongoing support?',
        'a' => 'Yes, we offer 24/7 support and maintenance packages for all our clients.'
    ),
    array(
        'q' => '❓ What industries do you serve?',
        'a' => 'We serve healthcare, finance, e-commerce, education, and manufacturing industries.'
    )
);

/**
 * Sanitize Repeater JSON
 */
function my_theme_sanitize_repeater_json($input) {
    $decoded = json_decode($input, true);
    if (!is_array($decoded)) {
        return '';
    }
    foreach ($decoded as &$item) {
        $item['q'] = sanitize_text_field($item['q']);
        $item['a'] = wp_kses_post($item['a']);
    }
    return json_encode($decoded);
}

$wp_customize->add_setting('my_theme_faq_items', array(
    'default'           => json_encode($faq_defaults),
    'transport'         => 'refresh',
    'sanitize_callback' => 'my_theme_sanitize_repeater_json',
));

$wp_customize->add_control(new My_Theme_Repeater_Control($wp_customize, 'my_theme_faq_items', array(
    'label'       => __('FAQ Items', 'my-theme'),
    'section'     => 'my_theme_faq_section',
    'settings'    => 'my_theme_faq_items',
    'description' => __('Add, remove, or edit your frequently asked questions.', 'my-theme'),
)));
