<?php

function my_awesome_theme_assets()
{
    // Enqueue Font Awesome CDN
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Enqueue the main style.css file
    wp_enqueue_style(
        'my-theme-main-style', 
        get_stylesheet_uri()
    );

    // Enqueue the custom theme CSS file from assets folder
    wp_enqueue_style(
        'my-theme-custom-style',
        get_theme_file_uri('assets/css/custom.css'),
        array('my-theme-main-style'),
        '1.0.0',
        'all'
    );

    // Enqueue the main JavaScript file
    wp_enqueue_script(
        'my-theme-main',
        get_theme_file_uri('assets/js/main.js'),
        array('jquery'),
        '1.0.0',
        true
    );
}
// Hook for front-end styles and scripts
add_action('wp_enqueue_scripts', 'my_awesome_theme_assets');


// =======================================================
// Enqueue Customizer Live Preview Script Separately
// =======================================================
function my_awesome_theme_customizer_assets() {
    wp_enqueue_script(
        'my-theme-customizer-preview',
        get_theme_file_uri('assets/js/customizer-preview.js'),
        array('jquery', 'customize-preview'), // Requires these core dependencies
        '1.0.0',
        true
    );
}
// Specific hook dedicated for Customizer live preview window
add_action('customize_preview_init', 'my_awesome_theme_customizer_assets');

/**
 * Enqueue Customizer Controls Script
 */
function my_awesome_theme_customizer_controls_assets() {
    wp_enqueue_script(
        'my-theme-customizer-controls',
        get_theme_file_uri('assets/js/customizer-controls.js'),
        array('jquery', 'customize-controls'),
        '1.0.0',
        true
    );
}
add_action('customize_controls_enqueue_scripts', 'my_awesome_theme_customizer_controls_assets');





function my_theme_output_dynamic_colors() {
    // Fetch user modifications or fall back to your configured defaults
    $primary_color   = get_theme_mod( 'my_theme_primary_color', '#2563eb' );
    $secondary_color = get_theme_mod( 'my_theme_secondary_color', '#3b82f6' );
    $dark_color      = get_theme_mod( 'my_theme_dark_color', '#1e293b' );
    ?>
    <style type="text/css" id="my-theme-customizer-colors">
        :root {
            --primary-color: <?php echo esc_attr( $primary_color ); ?>;
            --secondary-color: <?php echo esc_attr( $secondary_color ); ?>;
            --dark-color: <?php echo esc_attr( $dark_color ); ?>;
        }
    </style>
    <?php
}
// Hook this structural inline configuration output block into the wp_head runtime step
add_action( 'wp_head', 'my_theme_output_dynamic_colors' );



function my_login_logo() {
    $logo_url = '';

    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_data      = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        
        if ( ! empty( $logo_data ) ) {
            $logo_url = $logo_data[0]; 
        }
    } else {
        $logo_url = get_stylesheet_directory_uri() . '/assets/images/site-logo.png';
    }
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?php echo esc_url( $logo_url ); ?>') !important;
            height: 80px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url( '/' ); 
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );