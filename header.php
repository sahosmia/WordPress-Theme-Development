<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Header/Navigation -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo selector-logo-text"><?php echo esc_html(get_theme_mod('my_theme_logo_text', '🚀 TechSolutions')); ?></div>
                <?php 
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu', 
                    'menu_class'     => 'nav-menu',     
                    'container'      => false,          
                    'fallback_cb'    => false,          
                ) ); 
                ?>
                <?php
                $header_btn_text = get_theme_mod('my_theme_header_btn_text', 'Contact Us');
                $header_btn_url  = get_theme_mod('my_theme_header_btn_url', '#contact');
                if ($header_btn_text) :
                ?>
                    <a href="<?php echo esc_url($header_btn_url); ?>" class="btn-primary selector-header-btn"><?php echo esc_html($header_btn_text); ?></a>
                <?php endif; ?>
            </nav>
        </div>
    </header>