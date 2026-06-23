<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<main class="contact-page">
    <section class="contact-hero">
        <div class="container">
            <h1 class="selector-contact-page-hero-title"><?php echo esc_html(get_theme_mod('my_theme_contact_page_hero_title', 'Get in Touch')); ?></h1>
            <p class="selector-contact-page-hero-subtitle"><?php echo esc_html(get_theme_mod('my_theme_contact_page_hero_subtitle', "Have a project in mind? We'd love to hear from you.")); ?></p>
        </div>
    </section>

    <section class="contact-content-area">
        <div class="container">
            <div class="contact-page-grid">
                <div class="contact-page-info">
                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-text">
                            <h3>Phone</h3>
                            <p><?php echo esc_html(get_theme_mod('my_theme_contact_phone', '+1 (555) 123-4567')); ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">✉️</div>
                        <div class="info-text">
                            <h3>Email</h3>
                            <p><?php echo esc_html(get_theme_mod('my_theme_contact_email', 'hello@techsolutions.com')); ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-text">
                            <h3>Office</h3>
                            <p><?php echo esc_html(get_theme_mod('my_theme_contact_address', '123 Tech Street, Silicon Valley, CA')); ?></p>
                        </div>
                    </div>
                    
                    <div class="social-connect">
                        <h3>Follow Us</h3>
                        <div class="social-icons">
                            <?php
                            $socials = array(
                                'facebook'  => 'fa-brands fa-facebook-f',
                                'twitter'   => 'fa-brands fa-twitter',
                                'linkedin'  => 'fa-brands fa-linkedin-in',
                                'instagram' => 'fa-brands fa-instagram',
                                'whatsapp'  => 'fa-brands fa-whatsapp',
                            );
                            foreach ($socials as $id => $icon_class) {
                                $url = get_theme_mod('my_theme_' . $id . '_url');
                                if ($url) {
                                    echo '<a href="' . esc_url($url) . '" class="social-icon-' . $id . '" target="_blank"><span><i class="' . esc_attr($icon_class) . '"></i></span></a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="contact-page-form">
                    <div class="form-wrapper">
                        <h3>Send us a message</h3>
                        <form class="main-contact-form">
                            <div class="form-row">
                                <input type="text" placeholder="Your Name" required>
                                <input type="email" placeholder="Your Email" required>
                            </div>
                            <input type="text" placeholder="Subject" required>
                            <textarea rows="6" placeholder="How can we help?"></textarea>
                            <button type="submit" class="btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $map_code = get_theme_mod('my_theme_contact_map');
    if ($map_code) : ?>
        <section class="contact-map">
            <div class="map-container">
                <?php echo $map_code; ?>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
