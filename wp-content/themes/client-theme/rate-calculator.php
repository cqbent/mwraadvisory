<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Rate Calculator
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package knoxweb
 */

// get_header('rate'); ?>
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				//Duplicate remove 
				session_start(); 				
				unset($_SESSION['do_not_duplicate']);
				
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					//get_template_part( 'content', 'page' );
					?>
                   <article>
                   
					<?php /*?><header class="entry-header">
                        <h1 class="entry-title"><?php the_title();?></h1>
                    </header><?php */?><!-- .entry-header -->
                    
                    <div class="entry-content">
                        
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                    
                </article>
                
                    <?php

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
				endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php // get_footer(); ?>
