<?php
function my_theme_setup()
{


add_theme_support('editor-styles', true);

    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'my-theme'),
        'footer_menu'  => __('Footer Menu', 'my-theme'),
    ]);
}

add_action('after_setup_theme', 'my_theme_setup');
