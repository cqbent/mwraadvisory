<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Knoxweb
 */

$post = get_post();
	?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="img-entery">
        <div class="image-class">
            <?php
            $library_type = get_post_meta($post_ID, 'select_library_type', true);
            
            ?>
            <?php if ( has_post_thumbnail() && $library_type !='video'  ) : ?>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        	<img src="<?php the_post_thumbnail_url('thumbnail'); ?>"/>
        	</a>
        <?php endif; ?> 
            
        </div>
        <div class="entery-class">
        <header class="entry-header">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    
            <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php knoxweb_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
    <div class="entry-content">
       
<p><?php //echo substr($post->post_content, 0, 300); ?></p>
            <?php
            
          
            //substr($content, 0, 300);
          
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
        <div class="border"></div>
        
        </div>
        
    </div>
        
    </article><!-- #post-## -->
	<?php
//}
?>