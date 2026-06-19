<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $icon = get_post_meta(get_the_ID(), '_service_icon', true);
    ?>
    <section class="service-single-header">
        <div class="container">
            <div class="service-icon-large"><?php echo esc_html($icon); ?></div>
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="service-single-content">
        <div class="container">
            <div class="service-layout-grid">
                <div class="service-main-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-featured-image">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <div class="service-sidebar">
                    <div class="contact-box">
                        <h3>Need help?</h3>
                        <p>Contact our experts to discuss your requirements.</p>
                        <a href="index.php#contact" class="btn-primary">Get in Touch</a>
                    </div>
                    
                    <div class="other-services">
                        <h3>Other Services</h3>
                        <ul>
                            <?php
                            $args = array(
                                'post_type' => 'service',
                                'posts_per_page' => 5,
                                'post__not_in' => array(get_the_ID()),
                            );
                            $other_services = new WP_Query($args);
                            if ($other_services->have_posts()) :
                                while ($other_services->have_posts()) : $other_services->the_post();
                                    echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
