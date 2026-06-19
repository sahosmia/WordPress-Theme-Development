<?php
/**
 * Alternative version with character limit and line control
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['class' => 'featured-image', 'alt' => get_the_title()]); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default.png" 
                     alt="Default Image" 
                     class="featured-image">
            <?php endif; ?>
        </a>
    </div>
    
    <div class="post-content">
        <header class="entry-header">
            <div class="post-meta-top">
                <span class="post-category">
                    <?php 
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                    } else {
                        echo '<a href="#">Uncategorized</a>';
                    }
                    ?>
                </span>
                <span class="post-date">
                    <i class="far fa-calendar-alt"></i> 
                    <?php echo get_the_date('F j, Y'); ?>
                </span>
            </div>
            
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            
            <div class="post-meta">
                <span class="post-author">
                    <i class="far fa-user"></i> 
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php the_author(); ?>
                    </a>
                </span>
                <span class="post-comments">
                    <i class="far fa-comments"></i> 
                    <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                </span>
            </div>
        </header>
        
        <div class="entry-content">
            <?php 
            if (is_single()) {
                the_content();
            } else {
                echo '<p>' . get_limited_excerpt(150) . '</p>'; // 150 characters = 2-3 lines
            }
            ?>
        </div>
        
        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                Read More 
                <i class="fas fa-arrow-right"></i>
            </a>
        </footer>
    </div>
</article>