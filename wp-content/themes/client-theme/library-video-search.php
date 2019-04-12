<?php
/**
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

get_header(); 

?>
<?php 
            $pid = 280; 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full'); 
			$himage ="http://mwraadvisoryboard.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
         ?>
        <div class="com_img">
		
             <img src="<?php echo ($image[0]!="")?$image[0]:$himage; ?>" />
             <div class="subpage-search">
             	<div class="container"><?php dynamic_sidebar('et_pb_widget_area_1'); ?></div>
             </div>
            <div class="pt-title-main">
                <div class="container">
                     <h1 class="pt_title"><?php echo get_the_title( $pid ); ?></h1> 
                </div>
            </div>
        </div>
<div class="libraries-main-content container">  
<div class="document-library-menu"><a href="<?php echo get_permalink( $pid ); ?>">Go to Document Library</a></div> 
<div class="libraries-search-section">
	<div class="subpage-search">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search Video Library" value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
				<input type="hidden" value="cpt-library" name="post_type">
				<input type="hidden" value="201" name="cat">
					<input type="hidden" value="<?php echo get_query_var('term'); ?>" name="tagname">
					
					
			</label>
			<input type="submit" class="search-submit" value="Search">
	</form>
	</div>
	<div class="video-library-link">
		<p>Click here for our <a href="<?php echo get_permalink( 3499 ); ?>">Video Library</a></p>
	</div>
 </div>
<div class="sidebar" id="secondary-left">
	<div class="libraries-search-list">
<h3 class="doc-cat-title">Document Categories</h3>
<div class="expand_collapse"> <a class="expand_all">Expand All</a>  <a class="collapse_all" style="display:none">Collapse All</a></div>
	 <?php 
		$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => 'ASC', 'taxonomy' => 'library-cat');
		$library_categories = get_categories( $args );

		if(!empty($library_categories)){
			echo '<div class="libraries-cat-list">';	
			foreach ($library_categories as $library_category)
			{
					
					echo '<h2 class="accordion">'.$library_category->name.'</h2>';
					echo '<div class="tag-list-panel">';
						/*echo '<ul class="libraries-archive-list">';
							wp_get_archives("post_type=cpt-library&type=yearly&cat=$library_category->term_id"); 
						echo "</ul>";*/
						
						$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
					       if(!empty($library_tags)){
						echo "<ul class='libraries-tag-list'>";
								foreach ($library_tags as $library_tag )
								{
									$getTag = get_term_by( 'id', $library_tag, 'library_tags', $output, $filter );
									echo '<li><a href="'.get_term_link($getTag ).'">'.$getTag->name.'</a></li>';
								}
						echo "</ul>";		
						}
					echo '</div>';
                                    
				
			}	
			echo "</div>";	
		}

		
	?>
	</div>
</div>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
	

			<div class="entry-content libraries-documents">
			
			
			<div class="service-listing-main" >
			<?php
			global $query_string;
			$args = array_merge( $wp_query->query_vars, array( 'posts_per_page'=> -1 ) );
			
			
			$temp_current_site_url = explode('?',$current_url);
            $query_string = str_replace("tagname", "library-cat", $temp_current_site_url[1]);
			
			
			
			
			$get_Posts = query_posts( $query_string . '&order=ASC' );
			
			if (!empty($get_Posts))
			{
				echo '<ul class="library-list-tag"> ';	
				foreach ($get_Posts as $library){								
					setup_postdata($library);					
					//$category = get_term_by('terms', $catId, 'category');				       
				       $terms = get_the_terms( $library->ID , 'library-cat' );		
				       $catName=array(0);		       
				       foreach($terms as $catname)
				       {
				       $catName[]=$catname->term_id;
				       }
				       
					
					$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($library->ID), 'thumbnail' );
					$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
					$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
					$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
					$video_attatchment = get_post_meta($library->ID, 'vimeo_attatchment', true);
			?>
					<li>
					<?php if(!in_array('201',$catName)){ ?>
					<a href="<?php echo $pdf_attatchment;?>" alt="<?php echo $library->post_title; ?>" class="fancybox-pdf">
					<img src="<?php echo $library_thumbnail; ?>" height="300" width="200" />
					</a>
					<?php }else{ ?>	
					<a href="<?php echo $video_attatchment;?>" alt="<?php echo $library->post_title; ?>" class="fancybox-vimeo">
					<img src="<?php echo $library_thumbnail; ?>" height="300" width="200" />
					</a>
					<?php }?>									
					<h4><?php echo $library->post_title; ?></h4>
					</li>
			<?php	
								
									
					}
					wp_reset_postdata();
					echo '</ul>';
					
			}
		
			?>
			
		
		
	
		</div>
		</div>
	<?php //get_sidebar(); ?>
	</div>
	
	</div><!-- #primary -->
	</main><!-- #main -->
	</div>
	</div>
<?php get_footer(); ?>
