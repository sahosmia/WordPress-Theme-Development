<?php get_header(); ?>
<main>
    <section class="career-header">
        <div class="container">
            <h1>Join Our Team</h1>
            <p>Explore current openings and start your journey with us.</p>
        </div>
    </section>

    <section class="job-listings">
        <div class="container">
            <div class="job-grid">
                <?php
                $args = array(
                    'post_type' => 'job',
                    'meta_query' => array(
                        array(
                            'key'     => '_job_is_active',
                            'value'   => '1',
                            'compare' => '=',
                        ),
                    ),
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $location = get_post_meta(get_the_ID(), '_job_location', true);
                        $type = get_post_meta(get_the_ID(), '_job_type', true);
                        $end_date = get_post_meta(get_the_ID(), '_job_end_date', true);
                ?>
                        <article class="job-card">
                            <div class="job-card-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="job-meta">
                                    <?php if ($location) : ?><span>📍 <?php echo esc_html($location); ?></span><?php endif; ?>
                                    <?php if ($type) : ?><span>🕒 <?php echo esc_html($type); ?></span><?php endif; ?>
                                </div>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                            <div class="job-card-action">
                                <a href="<?php the_permalink(); ?>" class="btn-outline">View Details</a>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No current openings. Please check back later.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
