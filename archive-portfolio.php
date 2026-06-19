<?php get_header(); ?>
<main>
    <section class="portfolio-archive-header">
        <div class="container">
            <h1><?php post_type_archive_title(); ?></h1>
            <p><?php echo get_theme_mod('my_theme_portfolio_subtitle', 'Showcasing our latest work and success stories'); ?></p>
        </div>
    </section>

    <section class="portfolio-archive-grid">
        <div class="container">
            <div class="portfolio-grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <div class="image-placeholder">🖼️</div>
                            <?php endif; ?>
                            <div class="portfolio-overlay">
                                <a href="<?php the_permalink(); ?>" class="view-project">View Project</a>
                            </div>
                        </div>
                        <div class="portfolio-content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
