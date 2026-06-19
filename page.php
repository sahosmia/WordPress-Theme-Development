<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<div class="container">
    <main id="primary" class="site-main" style="padding: 80px 0;">
        <?php
        while ( have_posts() ) :
            the_post();

            the_title( '<h1 class="entry-title">', '</h1>' );
            
            if ( has_post_thumbnail() ) : ?>
                <div class="featured-image" style="margin: 2rem 0;">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif;

            echo '<div class="entry-content" style="margin-top: 2rem;">';
            the_content();
            echo '</div>';

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </main>
</div>

<?php get_footer();
