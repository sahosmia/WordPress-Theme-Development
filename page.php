<?php get_header(); ?>
<main>
    <!-- Hero Section -->
    <?php if (get_theme_mod('my_theme_hero_enabled', true)) : ?>
        <section id="home" class="hero">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <?php if ($badge = get_theme_mod('my_theme_hero_badge', 'Premium IT Services')) : ?>
                            <span class="badge"><?php echo esc_html($badge); ?></span>
                        <?php endif; ?>
                        <h1>
                            <?php
                            $title = get_theme_mod('my_theme_hero_title', 'Future-Ready <span>Tech Solutions</span> for Your Business');
                            echo wp_kses($title, array('span' => array()));
                            ?>
                        </h1>
                        <p class="hero-subtitle">
                            <?php
                            $subtitle = get_theme_mod('my_theme_hero_subtitle', 'We provide cutting-edge IT services including cloud computing, cybersecurity, software development, and 24/7 technical support.');
                            echo esc_html($subtitle);
                            ?>
                        </p>


                        <div class="hero-buttons">
                            <?php
                            $btn1_text = get_theme_mod('my_theme_hero_btn_text', 'Get Started →');
                            $btn1_url  = get_theme_mod('my_theme_hero_btn_url', '#contact');
                            if (! empty($btn1_text)) : ?>
                                <a href="<?php echo esc_url($btn1_url); ?>" class="btn-primary"><?php echo esc_html($btn1_text); ?></a>
                            <?php endif; ?>

                            <?php
                            $btn2_text = get_theme_mod('my_theme_hero_btn2_text', 'Explore Services');
                            $btn2_url  = get_theme_mod('my_theme_hero_btn2_url', '#services');
                            if (! empty($btn2_text)) : ?>
                                <a href="<?php echo esc_url($btn2_url); ?>" class="btn-outline"><?php echo esc_html($btn2_text); ?></a>
                            <?php endif; ?>
                        </div>


                        <div class="stats">
                            <?php
                            for ($i = 1; $i <= 3; $i++) {
                                $stat = get_theme_mod("my_theme_hero_stat{$i}");
                                if (! empty($stat)) {
                                    $parts = explode(' ', $stat, 2);
                                    echo '<div>';
                                    if (count($parts) == 2) {
                                        echo '<strong>' . esc_html($parts[0]) . '</strong><br>' . esc_html($parts[1]);
                                    } else {
                                        echo esc_html($stat);
                                    }
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>


                    <div class="hero-image">
                        <?php
                        $hero_img = get_theme_mod('my_theme_hero_bg_image');
                        if (! empty($hero_img)) : ?>
                            <img width="100%" src="<?php echo esc_url($hero_img); ?>" alt="<?php bloginfo('name'); ?> Hero Image">
                        <?php else : ?>
                            <div class="hero-illustration">
                                💻
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif ?>

    <!-- About Section -->
    <?php if (get_theme_mod('my_theme_about_enabled', true)) :    ?>
        <section id="about" class="about">
            <div class="container">
                <div class="about-grid">
                    <div class="about-content">

                        <!-- Section Tag/Badge Element -->
                        <?php if ($about_tag = get_theme_mod('my_theme_about_tag', 'About Us')) : ?>
                            <span class="section-tag"><?php echo esc_html($about_tag); ?></span>
                        <?php endif; ?>

                        <!-- Main Section Heading Header -->
                        <h2>
                            <?php
                            $about_title = get_theme_mod('my_theme_about_title', 'We Deliver Excellence in IT Services Since 2015');
                            echo esc_html($about_title);
                            ?>
                        </h2>

                        <!-- Core Editorial Context Narrative Description -->
                        <p class="about-desc-text">
                            <?php
                            $about_desc = get_theme_mod('my_theme_about_desc', 'TechSolutions Pro is a leading IT service provider helping businesses transform digitally. Our team of 50+ experts delivers innovative solutions tailored to your needs.');
                            echo wp_kses_post($about_desc);
                            ?>
                        </p>

                        <!-- Value Proposition Checklist Feature Grid -->
                        <div class="about-features">
                            <?php
                            for ($i = 1; $i <= 4; $i++) {
                                $feature = get_theme_mod("my_theme_about_feature{$i}");
                                if (! empty($feature)) {
                                    echo '<div>✅ ' . esc_html($feature) . '</div>';
                                }
                            }
                            ?>
                        </div>

                        <!-- Context Call-to-Action Link Hyperlink Button Layout -->
                        <?php
                        $about_btn_text = get_theme_mod('my_theme_about_btn_text', 'Learn More About Us →');
                        $about_btn_url  = get_theme_mod('my_theme_about_btn_url', 'about.php');
                        if (! empty($about_btn_text)) : ?>
                            <a href="<?php echo esc_url($about_btn_url); ?>" class="btn-outline"><?php echo esc_html($about_btn_text); ?></a>
                        <?php endif; ?>
                    </div>

                    <!-- Layout Image Container Illustration Media Frame Block -->
                    <div class="about-image">
                        <?php
                        $about_img = get_theme_mod('my_theme_about_image');
                        if (! empty($about_img)) : ?>
                            <img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?> - About Image">
                        <?php else : ?>
                            <!-- Structural Design Placeholder Graphic Fallback Object View -->
                            <div class="image-placeholder">🏢</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">What We Offer</span>
                <h2>Comprehensive IT Services</h2>
                <p>End-to-end technology solutions to accelerate your business growth</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">☁️</div>
                    <h3>Cloud Computing</h3>
                    <p>AWS, Azure, Google Cloud migration and management services.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔒</div>
                    <h3>Cybersecurity</h3>
                    <p>Advanced threat protection, security audits, and compliance.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">💻</div>
                    <h3>Software Dev</h3>
                    <p>Custom web, mobile apps, and enterprise software solutions.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <h3>Data Analytics</h3>
                    <p>Business intelligence, big data, and predictive analytics.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">🖥️</div>
                    <h3>IT Consulting</h3>
                    <p>Strategic IT planning and digital transformation advisory.</p>
                    <a href="#">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔧</div>
                    <h3>24/7 Support</h3>
                    <p>Round-the-clock technical support and maintenance.</p>
                    <a href="#">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-us" class="why-choose">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Why Choose Us</span>
                <h2>What Makes Us Different</h2>
            </div>
            <div class="choose-grid">
                <div class="choose-item">
                    <div class="choose-icon">⚡</div>
                    <h3>Fast Delivery</h3>
                    <p>Agile methodology ensures quick turnaround times.</p>
                </div>
                <div class="choose-item">
                    <div class="choose-icon">💎</div>
                    <h3>Quality Assurance</h3>
                    <p>Rigorous testing and quality checks at every stage.</p>
                </div>
                <div class="choose-item">
                    <div class="choose-icon">🤝</div>
                    <h3>Dedicated Support</h3>
                    <p>Personal account manager and 24/7 assistance.</p>
                </div>
                <div class="choose-item">
                    <div class="choose-icon">💰</div>
                    <h3>Best Value</h3>
                    <p>Competitive pricing with enterprise-grade solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <?php if (get_theme_mod('my_theme_testimonials_enabled', true)) : ?>
        <section id="testimonials" class="testimonials">
            <div class="container">
                <div class="section-header">
                    <?php if ($t_tag = get_theme_mod('my_theme_testimonials_tag', 'Client Feedback')) : ?>
                        <span class="section-tag selector-t-tag"><?php echo esc_html($t_tag); ?></span>
                    <?php endif; ?>
                    <h2 class="selector-t-title"><?php echo esc_html(get_theme_mod('my_theme_testimonials_title', 'What Our Clients Say')); ?></h2>
                </div>

                <div class="testimonials-grid">
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        $text = get_theme_mod("my_theme_testimonial_text{$i}");
                        $name = get_theme_mod("my_theme_testimonial_name{$i}");
                        $desc = get_theme_mod("my_theme_testimonial_desc{$i}");

                        if (! empty($text) || ! empty($name)) : ?>
                            <div class="testimonial-card">
                                <div class="quote">"</div>
                                <p class="selector-t-text<?php echo $i; ?>"><?php echo wp_kses_post($text); ?></p>
                                <div class="client">
                                    <div class="client-avatar"><?php echo ($i % 2 === 0) ? '👨' : '👩'; ?></div>
                                    <div>
                                        <strong class="selector-t-name<?php echo $i; ?>"><?php echo esc_html($name); ?></strong><br>
                                        <small class="selector-t-desc<?php echo $i; ?>"><?php echo esc_html($desc); ?></small>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endif;
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (get_theme_mod('my_theme_team_enabled', true)) : ?>
        <section id="team" class="team">
            <div class="container">
                <div class="section-header">
                    <?php if ($team_tag = get_theme_mod('my_theme_team_tag', 'Our Experts')) : ?>
                        <span class="section-tag selector-team-tag"><?php echo esc_html($team_tag); ?></span>
                    <?php endif; ?>
                    <h2 class="selector-team-title"><?php echo esc_html(get_theme_mod('my_theme_team_title', 'Meet Our Leadership Team')); ?></h2>
                </div>

                <div class="team-grid">
                    <?php
                    // Array containing emojis to act as custom fallbacks if image path properties are null
                    $emoji_fallbacks = array(1 => '👨‍💼', 2 => '👩‍💻', 3 => '👨‍🔧');

                    for ($i = 1; $i <= 3; $i++) {
                        $m_name  = get_theme_mod("my_theme_team_name{$i}");
                        $m_role  = get_theme_mod("my_theme_team_role{$i}");
                        $m_image = get_theme_mod("my_theme_team_image{$i}");

                        if (! empty($m_name)) : ?>
                            <div class="team-card">
                                <div class="team-image-wrapper">
                                    <?php if (! empty($m_image)) : ?>
                                        <img src="<?php echo esc_url($m_image); ?>" alt="<?php echo esc_attr($m_name); ?>" class="team-custom-img">
                                    <?php else : ?>
                                        <div class="team-image"><?php echo $emoji_fallbacks[$i]; ?></div>
                                    <?php endif; ?>
                                </div>
                                <h3 class="selector-team-name<?php echo $i; ?>"><?php echo esc_html($m_name); ?></h3>
                                <p class="selector-team-role<?php echo $i; ?>"><?php echo esc_html($m_role); ?></p>
                                <div class="social-links">🔗</div>
                            </div>
                    <?php
                        endif;
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- FAQ Section -->
    <?php
    if (get_theme_mod('my_theme_faq_enabled', true)) :
    ?>
        <!-- FAQ Section -->
        <section id="faq" class="faq">
            <div class="container">
                <div class="section-header">
                    <!-- Dynamic Tag/Badge Context Field Selector -->
                    <?php if ($faq_tag = get_theme_mod('my_theme_faq_tag', 'Common Questions')) : ?>
                        <span class="section-tag selector-faq-tag"><?php echo esc_html($faq_tag); ?></span>
                    <?php endif; ?>

                    <!-- Dynamic Section Main Heading Element Header -->
                    <h2 class="selector-faq-title">
                        <?php echo esc_html(get_theme_mod('my_theme_faq_title', 'Frequently Asked Questions')); ?>
                    </h2>
                </div>

                <!-- Grid Layout Processing Target Array Blocks -->
                <div class="faq-grid">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                        $question = get_theme_mod("my_theme_faq_q{$i}");
                        $answer   = get_theme_mod("my_theme_faq_a{$i}");

                        // Render individual question blocks only if fields are populated
                        if (! empty($question) || ! empty($answer)) : ?>
                            <div class="faq-item">
                                <h3 class="selector-faq-q<?php echo $i; ?>"><?php echo esc_html($question); ?></h3>
                                <p class="selector-faq-a<?php echo $i; ?>"><?php echo wp_kses_post($answer); ?></p>
                            </div>
                    <?php
                        endif;
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Let's Discuss Your Project</h2>
                    <p>Ready to transform your business with cutting-edge IT solutions?</p>
                    <div class="contact-details">
                        <div>📞 +1 (555) 123-4567</div>
                        <div>✉️ hello@techsolutions.com</div>
                        <div>📍 123 Tech Street, Silicon Valley, CA</div>
                    </div>
                </div>
                <form class="contact-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <textarea rows="4" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn-primary">Send Message →</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>