<?php
/**
 * Template Name: Blog Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package knoxweb
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$sticky=get_option('sticky_posts');

     //query_posts("cat=9&paged=$paged); 

	$argue = array(
        'post__in' => $sticky,
        'cat'=>9,
        'paged'=>$paged ); 
	
        $argue1 = array( 'cat' =>9, 'posts_per_page' => $paged);
 query_posts($argue);
	  ?>
      
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                            <?php the_modified_date(); ?>
				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
  <?php  
  
?>

<?php 
   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
   $sticky=get_option('sticky_posts');
	$argue = array(
        'post__not_in' => $sticky,
        'cat'=>9,
        'paged'=>$paged,
        'orderby' => 'modified',
        'order' => 'DESC'
         ); 
	
        $argue1 = array( 'cat' =>9, 'posts_per_page' => $paged);
     query_posts($argue);
	  ?>
      
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                            <?php the_modified_date(); ?>
				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
  <?php  
  
?>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
