<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Knoxweb
 */

$post = get_post();
//if(!in_array($post->ID,@$_SESSION['do_not_duplicate'])){  
	//$_SESSION['do_not_duplicate'][] = $post->ID;	
	?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            
             <?php if ( 'cpt-library' === get_post_type() ) { 
             
                     $post_id = get_the_ID();
                    
					
					
					$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'medium' );
					$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
					
				   $pdf_attatchment_id = get_post_meta($post_id, 'pdf_attatchment', true);
					$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
					
			       $video_attatchment = get_post_meta($post_id, 'vimeo_attatchment', true);
					 $library_type = get_post_meta($post_id, 'select_library_type', true);		
             
             ?>
             
             	<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
									<img src="<?php echo $library_thumbnail; ?>"  style="width: 221px !important;height: 289px !important;"/>
									</a>
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="'.$pdf_attatchment.'" rel="bookmark" class="fancybox-pdf" >', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            
           <?php }else{ ?>

          <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            
           <?php } ?>
          
          
            <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php knoxweb_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
    <div class="entry-content">
            <?php
            
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'knoxweb' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>
    
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'knoxweb' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
        <!-- .entry-content -->
    
        <footer class="entry-footer">
            <?php knoxweb_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->
	<?php
//}
?>