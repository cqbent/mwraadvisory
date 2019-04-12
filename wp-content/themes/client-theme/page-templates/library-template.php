<?php
/**
 * Template Name: libraries Page 
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
             $pid = get_the_ID(); 
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
<div class="libraries-search-section">
	<div class="subpage-search">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search Document Library" value="" name="s" title="Search for:">
				<input type="hidden" value="cpt-library" name="post_type">
			</label>
			<input type="submit" class="search-submit" value="Search">
	</form>
	</div>
	<div class="video-library-link">
		<p>Click here for our <a href="<?php echo get_permalink( 3499 ); ?>">Video Library</a></p>
		
			
		
	</div>
 </div>
<!-- <div class="container">  -->
<div class="sidebar" id="secondary-left">
	<div class="libraries-search-list">
	<h3 class="doc-cat-title">Document Categories</h3>
	
	
	<?php
     if(isset($_GET[cat_order]) && $_GET['cat_order'] !=""){
	    $cat_order = $_GET[cat_order];
	     
	 }else{
	     
	     $cat_order = 'ASC';
	 }
    
    
    
    ?>
     <div class="showhide_taglist"> <a class="show_taglist">Tags List</a>  <a class="hide_taglist" style="display:none">Categories List</a></div> 
        <div id="categories-panel-part">
                 <p>
    		        Categories Order </br> <select id="document_cat_order" style="width:80%">
    		        <option value=" "> Select Order</option>
    		        <option value="ASC" <?php if ($cat_order == "ASC") echo "selected='selected'";?>  >Ascending</option>
    		        <option value="DESC" <?php if ($cat_order == "DESC") echo "selected='selected'";?> >Descending</option>
    		          </select>
    		      </p>
    		
            	<?php
            	
            	$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => $cat_order , 'taxonomy' => 'library-cat');
        		$library_categories = get_categories( $args );
        		
            	?>
    
           
    		<p>
   
    		  Categories <select id="cat_menu" style="width:80%" >
    		        <option value=" "> Select Categories</option>
    		        
    		       <?php 
	
	         
			foreach ($library_categories as $library_category)
			{ ?> 
    		        
    		         
    		          <option value="<?php echo $library_category->name;  ?>"  ><?php echo $library_category->name; ?></option>
    		  <?php  } ?>        
    		  </select>
    		</p> 
    	
     </div>
     
                  
    		
 		

	 <?php
	
			foreach ($library_categories as $library_category)
			{
					
				
					echo '<div class="tag-link-list-panel" style="display:none">';
					?>
				<div class="expand_collapse"> <a class="expand_all">Expand All</a>  <a class="collapse_all" style="display:none">Collapse All</a></div>
					<?php
					
						
						$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
					       if(!empty($library_tags)){
						echo "<p class=''>";
						
						
						
								foreach ($library_tags as $key => $library_tag )
								{
									$getTag = get_term_by( 'id', $library_tag, 'library_tags', $output, $filter );
									
									echo '<a href="'.get_term_link($getTag ).'">'.$getTag->name.'</a>';
								}
						echo "</p>";		
						}
					echo '</div>';
                                    
				
			}	
		
		?>
	
	
	
	
	
	
	
	 <?php 	
	 
	//	$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => 'ASC', 'taxonomy' => 'library-cat');
	//	$library_categories = get_categories( $args );

		if(!empty($library_categories)){ 
			echo '<div class="libraries-cat-list">';	
			foreach ($library_categories as $library_category)
			{
					
					echo '<h2 class="lib-accordion">'.$library_category->name.'</h2>';
					echo '<div class="tag-list-panel">';
						/*echo '<ul class="libraries-archive-list">';
							wp_get_archives("post_type=cpt-library&type=yearly&cat=$library_category->term_id"); 
						echo "</ul>"; */ 
						
						$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
					       if(!empty($library_tags)){
						echo "<ul class='libraries-tag-list'>";
								foreach ($library_tags as $key => $library_tag )
								{
									$getTag = get_term_by( 'id', $library_tag, 'library_tags', $output, $filter );
									if($key=='0'){ 
                                    echo '<li><a href="/document-library-tag/'.$getTag->slug .'/?term=all&term_id='.$library_category->term_id.'">'.'See All</a></li>';  
                                   }
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
	<div class="most-recent-libraries">
		<h2>Popular Topics</h2>
		<?php
				$most_popular_args = array('post_type'=> 'cpt-library', 'posts_per_page'=> 7,'order'=>'ASC',
										   'orderby'  => 'ID',
										   'meta_key' => 'wpb_post_views_count', 
										   'orderby'  => 'meta_value_num',
									  );	
						$getmost_Posts = get_posts( $most_popular_args);					
						if (!empty($getmost_Posts))
						{
							echo '<ul class="library-most-popular-list-slider "> ';	
							foreach ($getmost_Posts as $library){	
								setup_postdata($library);
								
								$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($library->ID), 'medium' );
								$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment_id = get_post_meta($library->ID, 'vimeo_attatchment', true);
								$video_attatchment = wp_get_attachment_url( $video_attatchment_id );
								
								$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
								$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment = get_post_meta($library->ID, 'vimeo_attatchment', true);								
                                $library_type = get_post_meta($library->ID, 'select_library_type', true);
		?>
									<li class="library-list">
						<?php if($library_type == 'video'){ ?>			
					<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
						<img src="<?php echo $library_thumbnail; ?>" />
					</a> 
			<?php } else{ ?>
				<a href="#pdf_document-<?php echo $library->ID ?>" class="fancybox-inline"><img src="<?php echo $library_thumbnail; ?>" /></a>
				<div style="display:none" class="fancybox-hidden">
					<div id="pdf_document-<?php echo $library->ID ?>" class="hentry" style="width:1000px;max-width:100%;">
					<?php echo $document = $pdf_attatchment; ?>
					<?php //echo do_shortcode('[pdfjs-viewer url='.$document.'  viewer_width=600px viewer_height=700px fullscreen=true download=true print=true]'); ?>
					<?php echo do_shortcode('[pdfviewer  beta="true/false"]'.$document.'[/pdfviewer]'); ?>
					
					</div>
				</div>	
		<?php } ?>
	
									
									
									
									
                                    <h4 style="font-size: 13px;left;width: 157px;word-break: initial;"><?php echo $library->post_title;?></h4>
									</li>
		<?php	
							
								
							}
							wp_reset_postdata();
							echo '</ul>';
							
						}
		?>				
	</div>
        
		<div class="service-listing-main" >
		<?php
           
			if(!empty($library_categories)){
				foreach ($library_categories as $library_category)
				{
				
					$cat_id = $library_category->cat_ID;
					if($cat_id!='201'){
						echo "<h2>".$library_category->name."</h2>";							
						$args = array('post_type'=> 'cpt-library','posts_per_page'=>-1,'order'=>'ASC',
									  'orderby'	=> 'ID',
									  'tax_query' => array(
													array(
														'taxonomy' => 'library-cat',
														'field' => 'term_id',
														'terms' => $library_category->term_id,
													),
											),);	
						$get_Posts = get_posts( $args);
						if (!empty($get_Posts))
						{
							echo '<ul class="library-list-slider "> ';	
							foreach ($get_Posts as $library){	
								setup_postdata($library);
								
								$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($library->ID), 'medium' );
								$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
				
								$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment = get_post_meta($library->ID, 'vimeo_attatchment', true);
								
                                $library_type = get_post_meta($library->ID, 'select_library_type', true);
		?>
									<li>
									    
									   <?php if($library_type == 'video'){ ?>			
					<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
					<?php echo $library->post_title; ?>	
					</a> 
			<?php } else{ ?>
				<a href="<?php echo $pdf_attatchment ?>" target="_blank"><?php echo $library->post_title; ?></a>
				<!--<a target="_blank" href="<?php  echo $pdf_attatchment; ?>"><?php echo $library->post_title; ?></a>-->
		<?php } ?> 
									    
									    
									    
									    
									    
									    
									    
									  
                                     
									</li>
		<?php	
							
								
							}
							wp_reset_postdata();
							echo '</ul>';
							
						}
						
				}
				else
				{
						echo "<h2>".$library_category->name."</h2>";							
						$args = array('post_type'=> 'cpt-library','posts_per_page'=>-1,'order'=>'ASC',
									  'orderby'	=> 'ID',
									  'tax_query' => array(
													array(
														'taxonomy' => 'library-cat',
														'field' => 'term_id',
														'terms' => $library_category->term_id,
													),
											),);	
						$get_Posts = get_posts( $args);
						
						
						if (!empty($get_Posts))
						{
							echo '<ul class="library-list-slider videotab"> ';	
							foreach ($get_Posts as $library){	
								setup_postdata($library);
								
								$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($library->ID), 'medium' );
								$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
                                $pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
                                $library_type = get_post_meta($library->ID, 'select_library_type', true);
                                $video_attatchment = get_post_meta($library->ID, 'vimeo_attatchment', true);
								
								?>
									<li>
							<?php    ?>		    
			
                                   
                                   
                                    <a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
								<?php echo $library->post_title; ?>
									</a>
                                    
                                    
									</li>
		<?php	
							
								
							}
							wp_reset_postdata();
							echo '</ul>';
							
						}
				}
						 
				}	
			}
		?>
		
	
	<?php  ?>

		</div>
		
		
	</div>
	<?php //get_sidebar(); ?>
	</div>
	</div>
	</div><!-- #primary -->
	</main><!-- #main -->
	</div>
	
<?php get_footer(); ?>