<?php get_header(); ?>
<main>
    <section class="archive-header">
        <div class="container">
            <h1><?php the_archive_title(); ?></h1>
            <p><?php the_archive_description(); ?></p>
        </div>
    </section>

    <section class="archive-content">
        <div class="container">
            <div class="blog-grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="blog-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-image-container">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php else : ?>
                        <div class="post-image">📝</div>
                    <?php endif; ?>
                    <div class="post-content">
                        <div class="post-meta">
                            <span>📅 <?php echo get_the_date(); ?></span>
                        </div>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
                    </div>
                </article>
                <?php endwhile; endif; ?>
            </div>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
