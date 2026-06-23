<footer class="footer" style="background-color: <?php echo get_theme_mod('my_theme_footer_bg', '#0f172a'); ?>;">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1: Logo, Short Description, Contact, Social -->
            <div class="footer-column footer-about">
                <div class="footer-logo">
                    <?php 
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . esc_url(home_url('/')) . '" class="footer-logo-text">' . get_bloginfo('name') . '</a>';
                    }
                    ?>
                </div>
                <div class="footer-short-desc">
                    <p><?php echo wp_kses_post(get_theme_mod('my_theme_footer_short_desc', __('Professional WordPress theme development for modern businesses.', 'my-theme'))); ?></p>
                </div>
                <div class="footer-contact-info">
                    <?php if ($phone = get_theme_mod('my_theme_contact_phone')) : ?>
                        <p class="footer-info-item">📞 <?php echo esc_html($phone); ?></p>
                    <?php endif; ?>
                    <?php if ($email = get_theme_mod('my_theme_contact_email')) : ?>
                        <p class="footer-info-item">✉️ <?php echo esc_html($email); ?></p>
                    <?php endif; ?>
                    <?php if ($address = get_theme_mod('my_theme_contact_address')) : ?>
                        <p class="footer-info-item">📍 <?php echo esc_html($address); ?></p>
                    <?php endif; ?>
                </div>
                <div class="footer-social-links">
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
                            echo '<a href="' . esc_url($url) . '" class="social-icon-' . $id . '" target="_blank"><i class="' . esc_attr($icon_class) . '"></i></a>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Column 2: Quick Links Sidebar -->
            <div class="footer-column footer-sidebar-1">
                <?php if (is_active_sidebar('footer-sidebar-1')) : ?>
                    <?php dynamic_sidebar('footer-sidebar-1'); ?>
                <?php else : ?>
                    <h3 class="widget-title">Quick Links</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Column 3: Latest Posts/Custom Sidebar -->
            <div class="footer-column footer-sidebar-2">
                <?php if (is_active_sidebar('footer-sidebar-2')) : ?>
                    <?php dynamic_sidebar('footer-sidebar-2'); ?>
                <?php else : ?>
                    <h3 class="widget-title">Latest Posts</h3>
                    <?php
                    $latest_posts = new WP_Query(array(
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                    ));
                    if ($latest_posts->have_posts()) :
                        echo '<ul>';
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found.</p>';
                    endif;
                    ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="copyright">
            <p><?php echo wp_kses_post(get_theme_mod('my_theme_copyright_text', __('© 2026 My Website. All rights reserved.', 'my-theme'))); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>