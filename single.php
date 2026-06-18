<?php get_header(); ?>
<main>
    <section class="blog-header">
        <div class="container">
            <h1>Our Blog</h1>
            <p>Latest insights, tutorials, and industry updates</p>
        </div>
    </section>

    <section class="blog-content">
        <div class="container">
            <div class="blog-grid">
                <?php for($i=1; $i<=6; $i++): ?>
                <article class="blog-post">
                    <div class="post-image">📝</div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span>📅 March <?= $i ?>, 2026</span>
                            <span>🏷️ Technology</span>
                        </div>
                        <h2>How AI is Transforming IT Services in 2026</h2>
                        <p>Discover the latest AI trends and how they're revolutionizing the IT industry...</p>
                        <a href="single.php?id=<?= $i ?>" class="read-more">Read More →</a>
                    </div>
                </article>
                <?php endfor; ?>
            </div>
            
            <div class="pagination">
                <a href="#" class="page-link">Previous</a>
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">Next</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>