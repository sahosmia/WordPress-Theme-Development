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
                <div class="logo">🚀 TechSolutions</div>
                <?php 
                wp_nav_menu( array(
                    'theme_location' => 'primary_menu', 
                    'menu_class'     => 'nav-menu',     
                    'container'      => false,          
                    'fallback_cb'    => false,          
                ) ); 
                ?>
                <a href="#contact" class="btn-primary">Contact Us</a>
            </nav>
        </div>
    </header>