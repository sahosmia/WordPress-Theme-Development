<?php get_header(); ?>
<main>
    <section class="service-archive-header">
        <div class="container">
            <h1><?php post_type_archive_title(); ?></h1>
            <p><?php echo get_theme_mod('my_theme_services_subtitle', 'End-to-end technology solutions to accelerate your business growth'); ?></p>
        </div>
    </section>

    <section class="service-archive-grid">
        <div class="container">
            <div class="services-grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); 
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                ?>
                    <div class="service-card">
                        <div class="service-icon"><?php echo esc_html($icon); ?></div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>">Read More →</a>
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
