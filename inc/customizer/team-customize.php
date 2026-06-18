<?php

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
