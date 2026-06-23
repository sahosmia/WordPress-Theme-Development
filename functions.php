<?php




// Register Navigation Menus
require get_template_directory() . '/inc/theme_setup.php';

// Helper functions
require get_template_directory() . '/inc/functions-helpers.php';

// Post Types
require get_template_directory() . '/inc/post-types.php';


// Theme Function 
require get_template_directory() . '/inc/customizer.php';

// Enquee all style and script
require get_template_directory() . '/inc/enqueue_style_script.php';


function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 1 (Quick Links)', 'my-theme' ),
        'id'            => 'footer-sidebar-1', 
        'description'   => __( 'Widgets added here will appear in the second column of the footer.', 'my-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar 2 (Latest Posts)', 'my-theme' ),
        'id'            => 'footer-sidebar-2', 
        'description'   => __( 'Widgets added here will appear in the third column of the footer.', 'my-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );