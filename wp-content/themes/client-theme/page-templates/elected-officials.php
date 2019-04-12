<?php
/**
 * Template Name: Elected Officials Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package knoxweb
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php /*?><main id="main" class="site-main" role="main"><?php */?>
			
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					//get_template_part( 'content', 'page' );
					?>
				
					  <div class="entry-content">
						<?php the_content(); ?>
					  </div>
                                  
                    <?php

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
				endwhile;
			?>
			
		<?php /*?></main><!-- #main --><?php */?>
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
