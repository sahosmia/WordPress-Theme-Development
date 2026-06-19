<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $job_id = get_the_ID();
        $fields = array(
            'preview_link' => get_post_meta($job_id, '_portfolio_live_preview_link', true),
            'short_text' => get_post_meta($job_id, '_portfolio_short_text', true),
            'overview' => get_post_meta($job_id, '_portfolio_project_overview', true),
            'problem' => get_post_meta($job_id, '_portfolio_problem', true),
            'challenge' => get_post_meta($job_id, '_portfolio_challenge', true),
            'workflow' => get_post_meta($job_id, '_portfolio_workflow_scenario', true),
            'solutions' => get_post_meta($job_id, '_portfolio_solutions', true),
        );
    ?>
    <section class="portfolio-single-header">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <?php if ($fields['short_text']) : ?>
                <p class="lead"><?php echo esc_html($fields['short_text']); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="portfolio-single-content">
        <div class="container">
            <div class="portfolio-layout-grid">
                <div class="portfolio-main-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="portfolio-featured-image">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($fields['overview']) : ?>
                        <div class="project-block">
                            <h3>Project Overview</h3>
                            <p><?php echo wp_kses_post($fields['overview']); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="project-details-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 2rem 0;">
                        <?php if ($fields['problem']) : ?>
                            <div class="project-block">
                                <h3>The Problem</h3>
                                <p><?php echo wp_kses_post($fields['problem']); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($fields['challenge']) : ?>
                            <div class="project-block">
                                <h3>The Challenge</h3>
                                <p><?php echo wp_kses_post($fields['challenge']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($fields['workflow']) : ?>
                        <div class="project-block">
                            <h3>Workflow Scenario</h3>
                            <p><?php echo wp_kses_post($fields['workflow']); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($fields['solutions']) : ?>
                        <div class="project-block">
                            <h3>Our Solutions</h3>
                            <p><?php echo wp_kses_post($fields['solutions']); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <div class="portfolio-sidebar">
                    <div class="project-info-box">
                        <h3>Project Info</h3>
                        <ul class="project-details-list">
                            <li><strong>Date:</strong> <?php echo get_the_date(); ?></li>
                            <?php if ($fields['preview_link']) : ?>
                                <li><strong>Live Link:</strong> <a href="<?php echo esc_url($fields['preview_link']); ?>" target="_blank">Visit Site</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="contact-box">
                        <h3>Interested?</h3>
                        <p>Let's build something amazing together.</p>
                        <a href="<?php echo home_url('/#contact'); ?>" class="btn-primary">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
