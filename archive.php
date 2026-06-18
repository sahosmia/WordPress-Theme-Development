<?php get_header(); ?>
<main>
    <section class="archive-header">
        <div class="container">
            <h1>Archive: March 2026</h1>
            <p>Monthly archive of all posts published in March 2026</p>
        </div>
    </section>

    <section class="archive-listings">
        <div class="container">
            <div class="yearly-archive">
                <h2>2026</h2>
                <ul class="archive-months">
                    <li><a href="#">March 2026</a> (8 posts)</li>
                    <li><a href="#">February 2026</a> (6 posts)</li>
                    <li><a href="#">January 2026</a> (5 posts)</li>
                </ul>
                
                <h2>2025</h2>
                <ul class="archive-months">
                    <li><a href="#">December 2025</a> (7 posts)</li>
                    <li><a href="#">November 2025</a> (4 posts)</li>
                </ul>
            </div>
            
            <div class="archive-posts">
                <h3>Posts from March 2026</h3>
                <?php for($i=1; $i<=8; $i++): ?>
                <article class="archive-post-item">
                    <div class="post-date">March <?= $i ?>, 2026</div>
                    <h4><a href="single.php">The Impact of AI on IT Services</a></h4>
                </article>
                <?php endfor; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>