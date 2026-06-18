<?php
/**
 * The main index template file
 * 
 * @package YourThemeName
 */

get_header();
?>

<div class="site-container">
    <main class="site-main">
        <div class="container">
            <div class="content-area">
                <?php if (have_posts()) : ?>
                    
                    <div class="page-header">
                        <h1 class="page-title">
                            <?php 
                            if (is_home() && !is_front_page()) {
                                single_post_title();
                            } elseif (is_search()) {
                                printf(__('Search Results for: %s', 'yourthemetextdomain'), '<span>' . get_search_query() . '</span>');
                            } elseif (is_archive()) {
                                the_archive_title('<h1>', '</h1>');
                                the_archive_description('<div class="archive-description">', '</div>');
                            } else {
                                _e('Latest Posts', 'yourthemetextdomain');
                            }
                            ?>
                        </h1>
                    </div>
                    
                    <div class="posts-grid">
                        <?php 
                        // Start the loop
                        while (have_posts()) : the_post();
                            // Include the reusable template part
                            get_template_part('template-parts/content', get_post_type());
                        endwhile;
                        ?>
                    </div>
                    
                    <div class="pagination">
                        <?php 
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('<i class="fas fa-chevron-left"></i> Previous', 'yourthemetextdomain'),
                            'next_text' => __('Next <i class="fas fa-chevron-right"></i>', 'yourthemetextdomain'),
                            'screen_reader_text' => __('Posts navigation', 'yourthemetextdomain'),
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    
                    <div class="no-posts-found">
                        <div class="no-content-box">
                            <i class="fas fa-newspaper"></i>
                            <h2><?php _e('No Posts Found', 'yourthemetextdomain'); ?></h2>
                            <p><?php _e('It seems we couldn\'t find any posts. Try searching for something else.', 'yourthemetextdomain'); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>