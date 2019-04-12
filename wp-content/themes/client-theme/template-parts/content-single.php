<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Knoxweb
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
		if($_REQUEST['wysija-page']==1 && $_REQUEST['controller']=='confirm' && $_REQUEST['action']=='unsubscribe'){
		}else{
			the_title( '<h1 class="entry-title">', '</h1>' ); 
		}
		?>
		
        <?php
		if($_REQUEST['wysija-page']==1 && $_REQUEST['controller']=='confirm'){
		}else{
			?>
			<div class="entry-meta">
				<?php knoxweb_posted_on(); ?>	
			</div><!-- .entry-meta -->
            <?php
		}
		?>
        
	</header><!-- .entry-header -->
<?php if ( has_post_thumbnail() ) {
    //the_post_thumbnail();
}  ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'knoxweb' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php knoxweb_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

