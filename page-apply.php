<?php
/**
 * Template Name: Job Application Page
 */

get_header();

$vacancy_id = isset($_GET['vacancy_id']) ? intval($_GET['vacancy_id']) : 0;
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_application'])) {
    $name = sanitize_text_field($_POST['applicant_name']);
    $email = sanitize_email($_POST['applicant_email']);
    $exp = sanitize_textarea_field($_POST['applicant_experience']);
    $why = sanitize_textarea_field($_POST['applicant_why_hire']);
    $job_id = intval($_POST['job_id']);

    if ($name && $email && $job_id) {
        $application_id = wp_insert_post(array(
            'post_title'   => 'Application: ' . $name . ' - ' . get_the_title($job_id),
            'post_type'    => 'job_application',
            'post_status'  => 'private',
        ));

        if ($application_id) {
            update_post_meta($application_id, '_app_name', $name);
            update_post_meta($application_id, '_app_email', $email);
            update_post_meta($application_id, '_app_experience', $exp);
            update_post_meta($application_id, '_app_why_hire', $why);
            update_post_meta($application_id, '_app_job_id', $job_id);
            $success = true;
        }
    }
}
?>

<main class="application-page">
    <div class="container">
        <div class="form-container">
            <?php if ($success) : ?>
                <div class="success-message">
                    <h2>Thank you!</h2>
                    <p>Your application for <strong><?php echo get_the_title($job_id); ?></strong> has been submitted successfully. We will contact you soon.</p>
                    <a href="<?php echo home_url('/careers'); ?>" class="btn-primary">Back to Careers</a>
                </div>
            <?php else : ?>
                <h1>Apply for <?php echo $vacancy_id ? get_the_title($vacancy_id) : 'Position'; ?></h1>
                
                <form action="" method="POST" class="application-form">
                    <input type="hidden" name="job_id" value="<?php echo $vacancy_id; ?>">
                    
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="applicant_name" required>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="applicant_email" required>
                    </div>

                    <div class="form-group">
                        <label>Experience (Tell us about your previous roles)</label>
                        <textarea name="applicant_experience" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Why should we hire you?</label>
                        <textarea name="applicant_why_hire" rows="5" required></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="submit_application" class="btn-primary">Submit Application</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
