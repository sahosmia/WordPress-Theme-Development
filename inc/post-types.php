<?php
/**
 * Register Custom Post Types
 */

/**
 * Register Team Member CPT
 */
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
        'menu_icon'          => 'dashicons-businessperson',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'team_member', $args );
}
add_action( 'init', 'my_theme_register_team_cpt' );

/**
 * Team Member Meta Boxes
 */
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

function my_theme_team_member_meta_callback( $post ) {
    wp_nonce_field( 'save_team_member_meta', 'team_member_meta_nonce' );
    $role = get_post_meta( $post->ID, '_team_member_role', true );
    ?>
    <p>
        <label for="team_member_role" style="display:block; margin-bottom:5px; font-weight:bold;"><?php _e( 'Designation / Role:', 'my-theme' ); ?></label>
        <input type="text" id="team_member_role" name="team_member_role" value="<?php echo esc_attr( $role ); ?>" class="widefat" placeholder="e.g., CEO & Founder, CTO">
    </p>
    <?php
}

function my_theme_save_team_member_meta( $post_id ) {
    if ( ! isset( $_POST['team_member_meta_nonce'] ) || ! wp_verify_nonce( $_POST['team_member_meta_nonce'], 'save_team_member_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['team_member_role'] ) ) {
        update_post_meta( $post_id, '_team_member_role', sanitize_text_field( $_POST['team_member_role'] ) );
    }
}
add_action( 'save_post_team_member', 'my_theme_save_team_member_meta' );

/**
 * Register Service Custom Post Type
 */
function my_theme_register_service_cpt() {
    $labels = array(
        'name'               => _x( 'Services', 'post type general name', 'my-theme' ),
        'singular_name'      => _x( 'Service', 'post type singular name', 'my-theme' ),
        'menu_name'          => _x( 'Services', 'admin menu', 'my-theme' ),
        'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'my-theme' ),
        'add_new'            => _x( 'Add New', 'service', 'my-theme' ),
        'add_new_item'       => __( 'Add New Service', 'my-theme' ),
        'new_item'           => __( 'New Service', 'my-theme' ),
        'edit_item'          => __( 'Edit Service', 'my-theme' ),
        'view_item'          => __( 'View Service', 'my-theme' ),
        'all_items'          => __( 'All Services', 'my-theme' ),
        'search_items'       => __( 'Search Services', 'my-theme' ),
        'not_found'          => __( 'No services found.', 'my-theme' ),
        'not_found_in_trash' => __( 'No services found in Trash.', 'my-theme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-rest-api',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' ), // Added page-attributes for sort
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'my_theme_register_service_cpt' );

/**
 * Service Meta Boxes
 */
function my_theme_service_meta_boxes() {
    add_meta_box(
        'service_details',
        __( 'Service Details', 'my-theme' ),
        'my_theme_service_meta_callback',
        'service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'my_theme_service_meta_boxes' );

function my_theme_service_meta_callback( $post ) {
    wp_nonce_field( 'save_service_meta', 'service_meta_nonce' );
    $icon      = get_post_meta( $post->ID, '_service_icon', true );
    $is_active = get_post_meta( $post->ID, '_service_is_active', true );
    $m_title   = get_post_meta( $post->ID, '_service_meta_title', true );
    $m_desc    = get_post_meta( $post->ID, '_service_meta_description', true );

    if ( $is_active === '' ) $is_active = '1';
    ?>
    <p>
        <label><b>Service Icon:</b></label>
        <input type="text" name="service_icon" value="<?php echo esc_attr( $icon ); ?>" class="widefat" placeholder="e.g., ☁️, 🔒, fas fa-code">
    </p>
    <p>
        <label><b>Is Active:</b></label>
        <select name="service_is_active" class="widefat">
            <option value="1" <?php selected($is_active, '1'); ?>>Active</option>
            <option value="0" <?php selected($is_active, '0'); ?>>Inactive</option>
        </select>
    </p>
    <hr>
    <p>
        <label><b>Meta Title:</b></label>
        <input type="text" name="service_meta_title" value="<?php echo esc_attr( $m_title ); ?>" class="widefat">
    </p>
    <p>
        <label><b>Meta Description:</b></label>
        <textarea name="service_meta_description" class="widefat" rows="3"><?php echo esc_textarea( $m_desc ); ?></textarea>
    </p>
    <?php
}

function my_theme_save_service_meta( $post_id ) {
    if ( ! isset( $_POST['service_meta_nonce'] ) || ! wp_verify_nonce( $_POST['service_meta_nonce'], 'save_service_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array('service_icon', 'service_is_active', 'service_meta_title', 'service_meta_description');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action( 'save_post_service', 'my_theme_save_service_meta' );

/**
 * Register Portfolio Custom Post Type
 */
function my_theme_register_portfolio_cpt() {
    $labels = array(
        'name'               => _x( 'Portfolios', 'post type general name', 'my-theme' ),
        'singular_name'      => _x( 'Portfolio', 'post type singular name', 'my-theme' ),
        'menu_name'          => _x( 'Portfolios', 'admin menu', 'my-theme' ),
        'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'my-theme' ),
        'add_new'            => _x( 'Add New', 'portfolio item', 'my-theme' ),
        'add_new_item'       => __( 'Add New Portfolio Item', 'my-theme' ),
        'new_item'           => __( 'New Portfolio Item', 'my-theme' ),
        'edit_item'          => __( 'Edit Portfolio Item', 'my-theme' ),
        'view_item'          => __( 'View Portfolio Item', 'my-theme' ),
        'all_items'          => __( 'All Portfolios', 'my-theme' ),
        'search_items'       => __( 'Search Portfolios', 'my-theme' ),
        'not_found'          => __( 'No portfolio items found.', 'my-theme' ),
        'not_found_in_trash' => __( 'No portfolio items found in Trash.', 'my-theme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 27,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
    );

    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'my_theme_register_portfolio_cpt' );

/**
 * Portfolio Meta Boxes
 */
function my_theme_portfolio_meta_boxes() {
    add_meta_box(
        'portfolio_details',
        __( 'Project Details', 'my-theme' ),
        'my_theme_portfolio_meta_callback',
        'portfolio',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'my_theme_portfolio_meta_boxes' );

function my_theme_portfolio_meta_callback( $post ) {
    wp_nonce_field( 'save_portfolio_meta', 'portfolio_meta_nonce' );
    
    $fields = array(
        'preview_link' => get_post_meta($post->ID, '_portfolio_live_preview_link', true),
        'short_text' => get_post_meta($post->ID, '_portfolio_short_text', true),
        'overview' => get_post_meta($post->ID, '_portfolio_project_overview', true),
        'problem' => get_post_meta($post->ID, '_portfolio_problem', true),
        'challenge' => get_post_meta($post->ID, '_portfolio_challenge', true),
        'workflow' => get_post_meta($post->ID, '_portfolio_workflow_scenario', true),
        'solutions' => get_post_meta($post->ID, '_portfolio_solutions', true),
        'is_active' => get_post_meta($post->ID, '_portfolio_is_active', true),
        'meta_title' => get_post_meta($post->ID, '_portfolio_meta_title', true),
        'meta_description' => get_post_meta($post->ID, '_portfolio_meta_description', true),
    );

    if ($fields['is_active'] === '') $fields['is_active'] = '1';
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <p>
            <label><b>Live Preview Link:</b></label><br>
            <input type="url" name="portfolio_live_preview_link" value="<?php echo esc_attr($fields['preview_link']); ?>" class="widefat">
        </p>
        <p>
            <label><b>Is Active:</b></label><br>
            <select name="portfolio_is_active" class="widefat">
                <option value="1" <?php selected($fields['is_active'], '1'); ?>>Active</option>
                <option value="0" <?php selected($fields['is_active'], '0'); ?>>Inactive</option>
            </select>
        </p>
    </div>
    <p>
        <label><b>Short Text:</b></label>
        <textarea name="portfolio_short_text" class="widefat" rows="2"><?php echo esc_textarea($fields['short_text']); ?></textarea>
    </p>
    <p>
        <label><b>Project Overview:</b></label>
        <textarea name="portfolio_project_overview" class="widefat" rows="3"><?php echo esc_textarea($fields['overview']); ?></textarea>
    </p>
    <p>
        <label><b>Problem:</b></label>
        <textarea name="portfolio_problem" class="widefat" rows="3"><?php echo esc_textarea($fields['problem']); ?></textarea>
    </p>
    <p>
        <label><b>Challenge:</b></label>
        <textarea name="portfolio_challenge" class="widefat" rows="3"><?php echo esc_textarea($fields['challenge']); ?></textarea>
    </p>
    <p>
        <label><b>Workflow Scenario:</b></label>
        <textarea name="portfolio_workflow_scenario" class="widefat" rows="3"><?php echo esc_textarea($fields['workflow']); ?></textarea>
    </p>
    <p>
        <label><b>Solutions:</b></label>
        <textarea name="portfolio_solutions" class="widefat" rows="3"><?php echo esc_textarea($fields['solutions']); ?></textarea>
    </p>
    <hr>
    <p>
        <label><b>Meta Title:</b></label>
        <input type="text" name="portfolio_meta_title" value="<?php echo esc_attr($fields['meta_title']); ?>" class="widefat">
    </p>
    <p>
        <label><b>Meta Description:</b></label>
        <textarea name="portfolio_meta_description" class="widefat" rows="3"><?php echo esc_textarea($fields['meta_description']); ?></textarea>
    </p>
    <div class="gallery-help" style="background: #f0f0f1; padding: 10px; border-left: 4px solid #2271b1; margin-top: 10px;">
        <p style="margin:0;">💡 <b>Galleries:</b> Use the standard WordPress "Add Media" button to insert images or a gallery into the main editor above. We will pull images from the content for the portfolio display.</p>
    </div>
    <?php
}

function my_theme_save_portfolio_meta( $post_id ) {
    if ( ! isset( $_POST['portfolio_meta_nonce'] ) || ! wp_verify_nonce( $_POST['portfolio_meta_nonce'], 'save_portfolio_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'portfolio_live_preview_link', 'portfolio_short_text', 'portfolio_project_overview', 
        'portfolio_problem', 'portfolio_challenge', 'portfolio_workflow_scenario', 
        'portfolio_solutions', 'portfolio_is_active', 'portfolio_meta_title', 'portfolio_meta_description'
    );

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, wp_kses_post($_POST[$field]));
        }
    }
}
add_action( 'save_post_portfolio', 'my_theme_save_portfolio_meta' );

/**
 * Register Job and Application Custom Post Types
 */
function my_theme_register_job_cpts() {
    // Job Categories Taxonomy
    register_taxonomy('job_category', 'job', array(
        'labels' => array(
            'name' => __('Job Categories', 'my-theme'),
            'singular_name' => __('Job Category', 'my-theme'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));

    // Job CPT
    register_post_type('job', array(
        'labels' => array(
            'name' => __('Jobs', 'my-theme'),
            'singular_name' => __('Job', 'my-theme'),
            'add_new' => __('Add New Job', 'my-theme'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businesswoman',
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'careers'),
        'show_in_rest' => true,
    ));

    // Application CPT (Private)
    register_post_type('job_application', array(
        'labels' => array(
            'name' => __('Applications', 'my-theme'),
            'singular_name' => __('Application', 'my-theme'),
        ),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-id-alt',
        'supports' => array('title'),
        'capability_type' => 'post',
        'capabilities' => array('create_posts' => 'do_not_allow'), // Only created via form
        'map_meta_cap' => true,
    ));
}
add_action('init', 'my_theme_register_job_cpts');

/**
 * Job Meta Boxes
 */
function my_theme_job_meta_boxes() {
    add_meta_box('job_details', __('Job Details', 'my-theme'), 'my_theme_job_meta_callback', 'job', 'normal', 'high');
}
add_action('add_meta_boxes', 'my_theme_job_meta_boxes');

function my_theme_job_meta_callback($post) {
    wp_nonce_field('save_job_meta', 'job_meta_nonce');
    
    $fields = array(
        'type' => get_post_meta($post->ID, '_job_type', true),
        'location' => get_post_meta($post->ID, '_job_location', true),
        'end_date' => get_post_meta($post->ID, '_job_end_date', true),
        'benefits' => get_post_meta($post->ID, '_job_benefits', true),
        'responsibilities' => get_post_meta($post->ID, '_job_responsibilities', true),
        'requirements' => get_post_meta($post->ID, '_job_requirements', true),
        'skills_required' => get_post_meta($post->ID, '_job_skills_required', true),
        'weekly_holidays' => get_post_meta($post->ID, '_job_weekly_holidays', true),
        'salary' => get_post_meta($post->ID, '_job_salary', true),
        'others' => get_post_meta($post->ID, '_job_others', true),
        'is_active' => get_post_meta($post->ID, '_job_is_active', true),
    );
    
    if ($fields['is_active'] === '') $fields['is_active'] = '1';

    ?>
    <div class="job-meta-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <p>
            <label><b>Job Type:</b></label><br>
            <input type="text" name="job_type" value="<?php echo esc_attr($fields['type']); ?>" class="widefat" placeholder="Full-time, Remote, etc.">
        </p>
        <p>
            <label><b>Location:</b></label><br>
            <input type="text" name="job_location" value="<?php echo esc_attr($fields['location']); ?>" class="widefat">
        </p>
        <p>
            <label><b>End Date:</b></label><br>
            <input type="date" name="job_end_date" value="<?php echo esc_attr($fields['end_date']); ?>" class="widefat">
        </p>
        <p>
            <label><b>Salary:</b></label><br>
            <input type="text" name="job_salary" value="<?php echo esc_attr($fields['salary']); ?>" class="widefat">
        </p>
        <p>
            <label><b>Weekly Holidays:</b></label><br>
            <input type="text" name="job_weekly_holidays" value="<?php echo esc_attr($fields['weekly_holidays']); ?>" class="widefat">
        </p>
        <p>
            <label><b>Is Active:</b></label><br>
            <select name="job_is_active" class="widefat">
                <option value="1" <?php selected($fields['is_active'], '1'); ?>>Active</option>
                <option value="0" <?php selected($fields['is_active'], '0'); ?>>Inactive</option>
            </select>
        </p>
    </div>
    <hr>
    <p>
        <label><b>Benefits (One per line):</b></label>
        <textarea name="job_benefits" class="widefat" rows="3"><?php echo esc_textarea($fields['benefits']); ?></textarea>
    </p>
    <p>
        <label><b>Responsibilities (One per line):</b></label>
        <textarea name="job_responsibilities" class="widefat" rows="3"><?php echo esc_textarea($fields['responsibilities']); ?></textarea>
    </p>
    <p>
        <label><b>Requirements (One per line):</b></label>
        <textarea name="job_requirements" class="widefat" rows="3"><?php echo esc_textarea($fields['requirements']); ?></textarea>
    </p>
    <p>
        <label><b>Skills Required (Comma separated):</b></label>
        <textarea name="job_skills_required" class="widefat" rows="2"><?php echo esc_textarea($fields['skills_required']); ?></textarea>
    </p>
    <p>
        <label><b>Other Info:</b></label>
        <textarea name="job_others" class="widefat" rows="3"><?php echo esc_textarea($fields['others']); ?></textarea>
    </p>
    <?php
}

function my_theme_save_job_meta($post_id) {
    if (!isset($_POST['job_meta_nonce']) || !wp_verify_nonce($_POST['job_meta_nonce'], 'save_job_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array('job_type', 'job_location', 'job_end_date', 'job_benefits', 'job_responsibilities', 'job_requirements', 'job_skills_required', 'job_weekly_holidays', 'job_salary', 'job_others', 'job_is_active');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, wp_kses_post($_POST[$field]));
        }
    }
}
add_action('save_post_job', 'my_theme_save_job_meta');

/**
 * Application Meta Box
 */
function my_theme_application_meta_boxes() {
    add_meta_box('app_details', __('Applicant Details', 'my-theme'), 'my_theme_application_meta_callback', 'job_application', 'normal', 'high');
}
add_action('add_meta_boxes', 'my_theme_application_meta_boxes');

function my_theme_application_meta_callback($post) {
    $name = get_post_meta($post->ID, '_app_name', true);
    $email = get_post_meta($post->ID, '_app_email', true);
    $exp = get_post_meta($post->ID, '_app_experience', true);
    $why = get_post_meta($post->ID, '_app_why_hire', true);
    $job_id = get_post_meta($post->ID, '_app_job_id', true);
    ?>
    <p><b>Job Applied For:</b> <?php echo get_the_title($job_id); ?> (ID: <?php echo $job_id; ?>)</p>
    <p><b>Name:</b> <?php echo esc_html($name); ?></p>
    <p><b>Email:</b> <?php echo esc_html($email); ?></p>
    <p><b>Experience:</b><br><?php echo nl2br(esc_html($exp)); ?></p>
    <p><b>Why Hire:</b><br><?php echo nl2br(esc_html($why)); ?></p>
    <?php
}
