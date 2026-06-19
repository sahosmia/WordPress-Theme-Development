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
        'name'          => __( 'Footer Sidebar 1', 'my-awesome-classic-theme' ),
        'id'            => 'footer-sidebar-1', 
        'description'   => __( 'Widgets added here will appear in the footer.', 'my-awesome-classic-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_theme_widgets_init' );