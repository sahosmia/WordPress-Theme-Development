<?php get_header(); ?>
<main>
    <section class="about-hero">
        <div class="container">
            <h1 class="selector-about-page-hero-title"><?php echo esc_html(get_theme_mod('my_theme_about_page_hero_title', 'About TechSolutions Pro')); ?></h1>
            <p class="selector-about-page-hero-subtitle"><?php echo esc_html(get_theme_mod('my_theme_about_page_hero_subtitle', 'Innovative IT solutions for the modern enterprise')); ?></p>
        </div>
    </section>

    <section class="company-story">
        <div class="container">
            <div class="story-grid">
                <div class="story-content">
                    <h2 class="selector-about-page-journey-title"><?php echo esc_html(get_theme_mod('my_theme_about_page_journey_title', 'Our Journey')); ?></h2>
                    <p class="selector-about-page-journey-content"><?php echo wp_kses_post(get_theme_mod('my_theme_about_page_journey_content', 'Founded in 2015, TechSolutions Pro started with a mission to democratize enterprise-grade IT services for businesses of all sizes. Today, we serve over 120 clients globally, providing cutting-edge solutions in cloud computing, cybersecurity, and software development.')); ?></p>
                    <h3>Our Mission</h3>
                    <p>To empower businesses with innovative technology solutions that drive growth, efficiency, and security.</p>
                    <h3>Our Vision</h3>
                    <p>To become the most trusted IT partner for businesses worldwide, delivering excellence in every project.</p>
                </div>
                <div class="story-image">
                    <div class="image-placeholder">🏢 Our Office</div>
                </div>
            </div>
        </div>
    </section>

    <section class="company-values">
        <div class="container">
            <h2>Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">🎯</div>
                    <h3>Excellence</h3>
                    <p>Delivering high-quality solutions that exceed expectations.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3>Integrity</h3>
                    <p>Building trust through transparent and ethical practices.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">💡</div>
                    <h3>Innovation</h3>
                    <p>Continuously evolving with emerging technologies.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">👥</div>
                    <h3>Collaboration</h3>
                    <p>Working together to achieve client success.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-showcase">
        <div class="container">
            <h2>Meet Our Leadership</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-avatar">👨‍💼</div>
                    <h3>David Wilson</h3>
                    <p>CEO & Founder</p>
                    <p>20+ years in IT leadership</p>
                </div>
                <div class="team-member">
                    <div class="member-avatar">👩‍💻</div>
                    <h3>Dr. Lisa Park</h3>
                    <p>Chief Technology Officer</p>
                    <p>PhD in Computer Science</p>
                </div>
                <div class="team-member">
                    <div class="member-avatar">👨‍🔧</div>
                    <h3>James Martinez</h3>
                    <p>Head of Operations</p>
                    <p>15+ years in project management</p>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
