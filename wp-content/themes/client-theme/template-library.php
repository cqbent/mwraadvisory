<?php
/*
 * Template Name: Library Page Template
 */

get_header(); ?>
<div class="libraries-main-content container">
    <div class="libraries-search-section">
        <div class="subpage-search">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search Document Library"
                           value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
                    <input type="hidden" value="cpt-library" name="post_type">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>
        </div>
        <div class="video-library-link">
            <p>Click here for our <a href="<?php echo get_permalink(3499) ?>">Video Library</a></p>
        </div>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="entry-content libraries-documents">
                <div class="most-recent-libraries">
                    <h2>Popular Topics</h2>
                    <?php print get_popular_topics(); ?>
                </div>
                <div class="documents-by-category">
                    <h3>Documents By Category</h3>
                    <?php print get_documents_by_category(); ?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
</div>


<?php get_footer(); ?>
