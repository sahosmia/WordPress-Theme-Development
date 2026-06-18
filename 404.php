<?php get_header(); ?>
<main>
    <!-- 404 Hero Section -->
    <section class="error-404">
        <div class="container">
            <div class="error-content">
                <div class="error-animation">
                    <div class="error-number">4</div>
                    <div class="error-icon">🔧</div>
                    <div class="error-number">4</div>
                </div>
                
                <h1>Oops! Page Not Found</h1>
                <p>We searched high and low, but couldn't find the page you're looking for. It might have been moved, deleted, or never existed.</p>
                
                <div class="error-actions">
                    <a href="index.php" class="btn-primary">🏠 Back to Homepage</a>
                    <a href="index.php#contact" class="btn-outline">📞 Contact Support</a>
                </div>
                
                <!-- Search Form -->
                <div class="error-search">
                    <h3>Search our website:</h3>
                    <form class="search-form-404" action="search.php" method="get">
                        <input type="text" name="s" placeholder="Type keywords..." required>
                        <button type="submit" class="btn-primary">🔍 Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Pages Section -->
    <section class="popular-pages">
        <div class="container">
            <h2>Popular Pages You Might Need</h2>
            <div class="popular-grid">
                <a href="index.php" class="popular-card">
                    <div class="popular-icon">🏠</div>
                    <h3>Homepage</h3>
                    <p>Return to our main page</p>
                </a>
                <a href="index.php#services" class="popular-card">
                    <div class="popular-icon">💻</div>
                    <h3>Our Services</h3>
                    <p>View all IT solutions</p>
                </a>
                <a href="blog.php" class="popular-card">
                    <div class="popular-icon">📝</div>
                    <h3>Blog</h3>
                    <p>Latest tech insights</p>
                </a>
                <a href="index.php#contact" class="popular-card">
                    <div class="popular-icon">✉️</div>
                    <h3>Contact Us</h3>
                    <p>Get in touch with experts</p>
                </a>
                <a href="index.php#about" class="popular-card">
                    <div class="popular-icon">👥</div>
                    <h3>About Us</h3>
                    <p>Learn about our company</p>
                </a>
                <a href="index.php#faq" class="popular-card">
                    <div class="popular-icon">❓</div>
                    <h3>FAQ</h3>
                    <p>Frequently asked questions</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Recent Blog Posts Section -->
    <section class="recent-posts-404">
        <div class="container">
            <h2>Recent Blog Posts</h2>
            <div class="recent-grid">
                <article class="recent-post">
                    <div class="post-icon">☁️</div>
                    <h3><a href="single.php">Cloud Computing Trends 2026</a></h3>
                    <p>Discover the latest innovations in cloud technology...</p>
                    <a href="single.php" class="read-more">Read More →</a>
                </article>
                <article class="recent-post">
                    <div class="post-icon">🔒</div>
                    <h3><a href="single.php">Cybersecurity Best Practices</a></h3>
                    <p>Protect your business from modern threats...</p>
                    <a href="single.php" class="read-more">Read More →</a>
                </article>
                <article class="recent-post">
                    <div class="post-icon">🤖</div>
                    <h3><a href="single.php">How AI is Transforming IT</a></h3>
                    <p>The role of artificial intelligence in modern IT...</p>
                    <a href="single.php" class="read-more">Read More →</a>
                </article>
            </div>
        </div>
    </section>

    <!-- Error Help Section -->
    <section class="error-help">
        <div class="container">
            <div class="help-box">
                <div class="help-icon">🆘</div>
                <h3>Still Need Help?</h3>
                <p>Our support team is available 24/7 to assist you</p>
                <div class="help-links">
                    <a href="index.php#contact" class="btn-outline">Live Chat</a>
                    <a href="index.php#contact" class="btn-outline">Email Support</a>
                    <a href="tel:+15551234567" class="btn-outline">Call Us</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>