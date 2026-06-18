<?php get_header(); ?>
<main>
    <section class="search-header">
        <div class="container">
            <h1>Search Results for: "<?php echo get_search_query(); ?>"</h1>
            <form class="search-form-large" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <input type="search" name="s" placeholder="Search again..." value="<?php echo get_search_query(); ?>">
                <button type="submit" class="btn-primary">Search</button>
            </form>
            <p><?php
                global $wp_query;
                echo $wp_query->found_posts . ' results found';
            ?></p>
        </div>
    </section>

    <section class="search-results">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="search-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="search-url"><?php the_permalink(); ?></div>
                <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
            </div>
            <?php endwhile; else : ?>
            <div class="no-results">
                <p>No results found. Try different keywords.</p>
                <?php get_search_form(); ?>
            </div>
            <?php endif; ?>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
