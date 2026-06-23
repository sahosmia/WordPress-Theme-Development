<?php 
function my_agency_theme_widgets_init() {
    
    // Footer Column 1 (About & Social)
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'my-awesome-classic-theme' ),
        'id'            => 'footer-col-1',
        'description'   => __( 'Add agency info and social links here.', 'my-awesome-classic-theme' ),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer Column 2 (Quick Links: Services, Portfolio)
    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'my-awesome-classic-theme' ),
        'id'            => 'footer-col-2',
        'description'   => __( 'Add navigation menus or quick links here.', 'my-awesome-classic-theme' ),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // Footer Column 3 (Contact Info)
    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'my-awesome-classic-theme' ),
        'id'            => 'footer-col-3',
        'description'   => __( 'Add contact details and location here.', 'my-awesome-classic-theme' ),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'my_agency_theme_widgets_init' );