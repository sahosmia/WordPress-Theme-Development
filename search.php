<?php get_header()?>
<main>
    <section class="search-header">
        <div class="container">
            <h1>Search Results for: "cloud security"</h1>
            <form class="search-form-large">
                <input type="search" placeholder="Search again..." value="cloud security">
                <button type="submit" class="btn-primary">Search</button>
            </form>
            <p>Found 8 results</p>
        </div>
    </section>

    <section class="search-results">
        <div class="container">
            <?php for($i=1; $i<=5; $i++): ?>
            <div class="search-item">
                <h2><a href="single.php">Cloud Security Guide: Protecting Your Data in 2026</a></h2>
                <div class="search-url">techsolutions.com/blog/cloud-security-2026</div>
                <p>Comprehensive guide to implementing robust security measures for cloud infrastructure...</p>
            </div>
            <?php endfor; ?>
            
            <div class="no-results" style="display:none;">
                <p>No results found. Try different keywords.</p>
            </div>
        </div>
    </section>
</main>
<?php get_footer()?>
