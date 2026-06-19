<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post();
        $job_id = get_the_ID();
        $type = get_post_meta($job_id, '_job_type', true);
        $location = get_post_meta($job_id, '_job_location', true);
        $salary = get_post_meta($job_id, '_job_salary', true);
        $holidays = get_post_meta($job_id, '_job_weekly_holidays', true);
        $end_date = get_post_meta($job_id, '_job_end_date', true);
        $benefits = explode("\n", get_post_meta($job_id, '_job_benefits', true));
        $responsibilities = explode("\n", get_post_meta($job_id, '_job_responsibilities', true));
        $requirements = explode("\n", get_post_meta($job_id, '_job_requirements', true));
        $skills = get_post_meta($job_id, '_job_skills_required', true);
        $others = get_post_meta($job_id, '_job_others', true);
    ?>
        <section class="job-detail-header">
            <div class="container">
                <div class="job-header-flex">
                    <div class="job-title-area">
                        <h1><?php the_title(); ?></h1>
                        <div class="job-main-meta">
                            <?php if ($location) : ?><span>📍 <?php echo esc_html($location); ?></span><?php endif; ?>
                            <?php if ($type) : ?><span>🕒 <?php echo esc_html($type); ?></span><?php endif; ?>
                        </div>
                    </div>
                    <div class="job-apply-btn">
                        <a href="<?php echo esc_url(add_query_arg('vacancy_id', $job_id, home_url('/apply'))); ?>" class="btn-primary">Apply for this position</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="job-detail-body">
            <div class="container">
                <div class="job-detail-grid">
                    <div class="job-main-info">
                        <div class="job-description">
                            <h3>About the role</h3>
                            <?php the_content(); ?>
                        </div>

                        <?php if (!empty(array_filter($responsibilities))) : ?>
                            <div class="job-section">
                                <h3>Responsibilities</h3>
                                <ul>
                                    <?php foreach ($responsibilities as $item) if (trim($item)) echo '<li>' . esc_html($item) . '</li>'; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty(array_filter($requirements))) : ?>
                            <div class="job-section">
                                <h3>Requirements</h3>
                                <ul>
                                    <?php foreach ($requirements as $item) if (trim($item)) echo '<li>' . esc_html($item) . '</li>'; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ($skills) : ?>
                            <div class="job-section">
                                <h3>Skills Required</h3>
                                <p><?php echo esc_html($skills); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <aside class="job-sidebar">
                        <div class="job-info-card">
                            <h3>Job Overview</h3>
                            <ul class="job-overview-list">
                                <li><strong>Salary:</strong> <?php echo $salary ? esc_html($salary) : 'Negotiable'; ?></li>
                                <li><strong>Holidays:</strong> <?php echo $holidays ? esc_html($holidays) : 'Standard'; ?></li>
                                <li><strong>Deadline:</strong> <?php echo $end_date ? date('F j, Y', strtotime($end_date)) : 'Until filled'; ?></li>
                            </ul>
                        </div>

                        <?php if (!empty(array_filter($benefits))) : ?>
                            <div class="job-info-card">
                                <h3>Benefits</h3>
                                <ul class="benefits-list">
                                    <?php foreach ($benefits as $item) if (trim($item)) echo '<li>🎁 ' . esc_html($item) . '</li>'; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ($others) : ?>
                            <div class="job-info-card">
                                <h3>Other Info</h3>
                                <p><?php echo nl2br(esc_html($others)); ?></p>
                            </div>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
