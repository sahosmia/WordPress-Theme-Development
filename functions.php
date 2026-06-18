<?php




// Register Navigation Menus
require get_template_directory() . '/inc/theme_setup.php';


// Theme Function 
require get_template_directory() . '/inc/customizer.php';

// Enquee all style and script
require get_template_directory() . '/inc/enqueue_style_script.php';





function my_theme_register_team_cpt() {
    $labels = array(
        'name'               => _x( 'Team Members', 'post type general name', 'my-theme' ),
        'singular_name'      => _x( 'Team Member', 'post type singular name', 'my-theme' ),
        'menu_name'          => _x( 'Team Members', 'admin menu', 'my-theme' ),
        'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'my-theme' ),
        'add_new'            => _x( 'Add New', 'team member', 'my-theme' ),
        'add_new_item'       => __( 'Add New Team Member', 'my-theme' ),
        'new_item'           => __( 'New Team Member', 'my-theme' ),
        'edit_item'          => __( 'Edit Team Member', 'my-theme' ),
        'view_item'          => __( 'View Team Member', 'my-theme' ),
        'all_items'          => __( 'All Team Members', 'my-theme' ),
        'search_items'       => __( 'Search Team Members', 'my-theme' ),
        'not_found'          => __( 'No team members found.', 'my-theme' ),
        'not_found_in_trash' => __( 'No team members found in Trash.', 'my-theme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-businessperson', // ড্যাশবোর্ড আইকন
        'supports'           => array( 'title', 'thumbnail' ), // নাম (Title) এবং ছবি (Featured Image)
    );

    register_post_type( 'team_member', $args );
}
add_action( 'init', 'my_theme_register_team_cpt' );

function my_theme_team_meta_boxes() {
    add_meta_box(
        'team_member_details',
        __( 'Member Details', 'my-theme' ),
        'my_theme_team_member_meta_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'my_theme_team_meta_boxes' );

// মেটাবক্সের UI ইন্টারফেস (HTML Form Field)
function my_theme_team_member_meta_callback( $post ) {
    // Security check nonce
    wp_nonce_field( 'save_team_member_meta', 'team_member_meta_nonce' );

    // এক্সিস্টিং ডাটা রিট্রিভ করা
    $role = get_post_meta( $post->ID, '_team_member_role', true );
    ?>
    <p>
        <label for="team_member_role" style="display:block; margin-bottom:5px; font-weight:bold;"><?php _e( 'Designation / Role:', 'my-theme' ); ?></label>
        <input type="text" id="team_member_role" name="team_member_role" value="<?php echo esc_attr( $role ); ?>" class="widefat" placeholder="e.g., CEO & Founder, CTO">
    </p>
    <?php
}

/**
 * Save Meta Box Data securely on Post Save
 */
function my_theme_save_team_member_meta( $post_id ) {
    // Nonce ভ্যালিডেশন
    if ( ! isset( $_POST['team_member_meta_nonce'] ) || ! wp_verify_nonce( $_POST['team_member_meta_nonce'], 'save_team_member_meta' ) ) {
        return;
    }
    // অটোসেভ চেক
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // ইউজার পারমিশন চেক
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // ডাটা স্যানিটাইজ করে সেভ করা
    if ( isset( $_POST['team_member_role'] ) ) {
        update_post_meta( $post_id, '_team_member_role', sanitize_text_field( $_POST['team_member_role'] ) );
    }
}
add_action( 'save_post_team_member', 'my_theme_save_team_member_meta' );


function get_limited_excerpt($limit = 150) {
    $excerpt = get_the_excerpt();
    if (empty($excerpt)) {
        $excerpt = get_the_content();
    }
    
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    
    // বাংলা বা অন্যান্য ভাষার জন্য mb_strlen এবং mb_substr ব্যবহার করা হয়েছে
    if (mb_strlen($excerpt, 'UTF-8') > $limit) {
        $excerpt = mb_substr($excerpt, 0, $limit, 'UTF-8') . '...';
    }
    
    return $excerpt;
}