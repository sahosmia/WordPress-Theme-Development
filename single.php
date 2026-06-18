<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="post-header">
        <div class="container">
            <div class="post-meta">
                <span>📅 <?php echo get_the_date(); ?></span>
                <span>🏷️ <?php the_category(', '); ?></span>
            </div>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="post-content">
        <div class="container">
            <div class="content-wrapper">
                <?php the_content(); ?>
            </div>
            
            <div class="post-navigation">
                <div class="nav-previous"><?php previous_post_link('%link', '← Previous Post'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', 'Next Post →'); ?></div>
            </div>
            
            <?php if (comments_open() || get_comments_number()) :
                comments_template();
            endif; ?>
        </div>
    </section>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
