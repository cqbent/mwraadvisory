<?php
/**
 * Template Name: Video Library Page
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

<style>
div.pagination {
	float: left;
    margin: 3px;
    padding: 3px;
    width: 100%;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
	.bx-wrapper {
    max-width: 100%!important;
    }
</style>
<?php	 
	 if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') ){
	     
	  $catId = get_tags_in_use($_GET['term_id'],'id','cpt-library', 'library_tags');   
	     
	 }else{
	     
	     	$get_catgory_data = get_term_by("slug",get_query_var('term'),'library_tags');
	        $catId = $get_catgory_data->term_id;
	 }
	 


?>

<script type="text/javacript">
	    
	    jQuery(document).ready(function(){
	        
	        
	        /*jQuery('#order_by').change(function(){
	            var order_by_value = jQuery(this).value();
	            window.location  = window.location.href+"?order_by="+order_by_value;
	        });*/
	        
	    });
	    
	</script>
	
<?php 
             $pid = 280; 
             $image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full'); 
	     $himage ="http://mwraadvisoryboard.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
         ?>
        
<div class="libraries-main-content container">   
<div class="document-library-menu"><a href="<?php echo get_permalink( $pid ); ?>">Go to Document Library</a></div>
<div class="libraries-search-section">
	<div class="subpage-search">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search Document Library" value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
				<input type="hidden" value="cpt-library" name="post_type">
				
			</label>
			<input type="submit" class="search-submit" value="Search">
	</form>
	</div>
	<!--<div class="video-library-link">
		<p>Click here for our <a href="<?php echo get_permalink(3499) ?>">Video Library</a></p>
		
		
	</div>-->

	<div class="video-library-link2">
	    
		
		
		<?php
     if(isset($_GET[cat_order]) && $_GET['cat_order'] !=""){
	    $cat_order = $_GET[cat_order];
	     
	 }else{
	     
	     $cat_order = 'ASC';
	 }
    
    ?>
     
        <div id="categories-panel-part">
               <div style="float:right">
                 
    		
    	<?php
    	
    	$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => $cat_order , 'taxonomy' => 'library-cat','hide_empty' => 1);
		$all_library_categories = get_categories( $args );
		$video_cat_list = array();
		
		foreach($all_library_categories as $lib_category){
		    
		    if(strpos( $lib_category->slug, 'video') !== false ){
		       $video_cat_list[] =   $lib_category;
		    }
		    
		}
		$library_categories =  $video_cat_list;
    	//echo "<pre>"; print_r($video_cat_list);
    	//exit;
    	
    	
    	
    	//$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => $cat_order , 'taxonomy' => 'library-cat','hide_empty' => 1,    
            //'exclude'  =>array(211,212,213));
		//$library_categories = get_categories( $args );
    	//echo "<pre>"; print_r($library_categories);
    	?>
    
     <p><a href="#secondary-left" id="categories" style="font-size:14px; line-height:26px; color:white; padding: 6px; background-color: red;">See All Categories</a></p>
  
    		</div>
     </div>
     
	
		
		
	</div>
 </div>



<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

			<div class="entry-content libraries-documents">
			<div class="most-recent-libraries">
		<h2>Popular Topics</h2>
		<?php
		       /*
				$most_popular_args = array('post_type'=> 'cpt-library', 'posts_per_page'=> 7,'order'=>'ASC',
										   'orderby'  => 'ID',
										   'meta_key' => 'wpb_post_views_count',
										   'orderby'  => 'meta_value_num',
									  );
						*/			  
									  
						$most_popular_args = array('post_type'=> 'cpt-library', 'posts_per_page'=> 7,'order'=>'ASC',
										   'orderby'  => 'ID',
										   //'meta_key' => 'show_in_popular_topics',
										  // 'meta_value' => '1',
										   
										  'meta_query' => array(
                                        		array(
                                        			'key' => 'show_in_popular_topics',
                                        			'value' => '1',
                                        		),
                                        		array(
                                        		      'key'   => 'select_library_type', 
									                  'value' => 'video',
                                        		    
                                        		    )
                                        	),
										   'orderby'  => 'meta_value_num',
									  );				  
									  
									  
									  
						$getmost_Posts = get_posts( $most_popular_args);					
						if (!empty($getmost_Posts))
						{
							echo '<ul class="library-most-popular-list-slider " style="width:100% !important"> ';	
							foreach ($getmost_Posts as $library){	
								setup_postdata($library);
								
								$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($library->ID),  array('232','300') );
								$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment_id = get_post_meta($library->ID, 'vimeo_attatchment', true);
								$video_attatchment = wp_get_attachment_url( $video_attatchment_id );
								
								$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
								$library_thumbnail_style = ($library_thumbnail_url[0] != '') ?'width: 100%;object-fit: cover;height: 100%;' :'width: 100%;height: 100%;';
							
								$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment = get_post_meta($library->ID, 'vimeo_attatchment', true);								
                                $library_type = get_post_meta($library->ID, 'select_library_type', true);
		?>
									<li class="library-list">
						<?php if($library_type == 'video'){ ?>			
					<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
						<img src="<?php echo $library_thumbnail; ?>"  style="<?php echo $library_thumbnail_style ?>" />
					</a> 
			<?php } else{ ?>
				<a href="#pdf_document-<?php echo $library->ID ?>" class="fancybox-inline"><img src="<?php echo $library_thumbnail; ?>" style="<?php echo $library_thumbnail_style ?>" /></a>
				<div style="display:none" class="fancybox-hidden">
					<div id="pdf_document-<?php echo $library->ID ?>" class="hentry" style="width:1000px;max-width:100%;">
					<?php echo $document = $pdf_attatchment; ?>
					<?php //echo do_shortcode('[pdfjs-viewer url='.$document.'  viewer_width=600px viewer_height=700px fullscreen=true download=true print=true]'); ?>
					<?php echo do_shortcode('[pdfviewer  beta="true/false"]'.$document.'[/pdfviewer]'); ?>
					
					</div>
				</div>	
		<?php } ?>
	
									
									
									
									
                                    <h4 style="font-size: 13px;left;width: 157px;word-break: initial; padding-top:17px;"><?php echo $library->post_title;?></h4>
									</li>
		<?php	
							
								
							}
							wp_reset_postdata();
							echo '</ul>';
							
						}
		?>				
	</div>
			<div class="service-listing-main" >
			<div class="sidebar" id="secondary-left" style="width:100%;padding-bottom:50px;">
		<!--	<div class="showhide_taglist" style="padding-top:15px;padding-bottom:15px"> <a class="show_taglist" >Show Document Tags List</a>  <a class="hide_taglist" style="display:none">Show Document Categories List</a></div>     -->
	<div class="libraries-search-list">
	  
	     <?php 
	      /* $increament = 0;
			foreach ($library_categories as $library_category)
			{
					
				
					echo '<div class="tag-link-list-panel" style="display:none">';
					
					if($increament == 0){
					  echo '<h3 class="doc-cat-title">Tags List</h3>';
					    
					}
					
					$increament++;	
					?>
				
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
				
			}*/	
		
		?>
	    
	    
	    
	    

	<?php
		
		
		if(!empty($library_categories)){
			echo '<div class="libraries-cat-list">';
		?>	
		<h3 class="doc-cat-title" id="categories_list">Document Categories</h3>	
		<div class="expand_collapse"> <a class="expand_all">Expand All</a>  <a class="collapse_all" style="display:none">Collapse All</a></div>
		 
		<?php	
	        $category = array();
			foreach ($library_categories as $library_category)
			{
			   // echo $sql = "SELECT wp_posts.*, wp_term_relationships.* FROM wp_posts INNER JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id AND wp_term_relationships.term_taxonomy_id=$library_category->cat_ID AND wp_posts.post_status='publish' ORDER BY wp_posts.post_date DESC LIMIT 5";
				//	$category['name'] = $library_category->cat_name;
				   //print_r( $library_category);
					echo '<h2 class="lib-accordion">'.$library_category->name.'</h2>';
					echo '<div class="tag-list-panel">';
						/*echo '<ul class="libraries-archive-list">';
							wp_get_archives("post_type=cpt-library&type=yearly&cat=$library_category->term_id"); 
						echo "</ul>";*/
						
						/*$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
					       if(!empty($library_tags)){
						echo "<ul class='libraries-tag-list'>";
						
						//echo '<li><a href="/document-library-tag/'.$library_category->term_id .'">'.$library_category->name.'</a></li>';  
						
						
								foreach ($library_tags as $key => $library_tag )
								{
									$getTag = get_term_by( 'id', $library_tag, 'library_tags', $output, $filter );
									
										if($key=='0'){ 
									 echo '<li><a href="/document-library-tag/'.$getTag->slug .'/?term=all&term_id='.$library_category->term_id.'">'.'See All</a></li>';  
									}
									
									echo '<li><a href="'.get_term_link($getTag ).'">'.$getTag->name.'</a></li>';
								}
						echo "</ul>";		
						}*/
					
					
					
						
                        global $wpdb;
                        
$sql = "SELECT wp_posts.*, wp_term_relationships.* FROM wp_posts INNER JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id AND wp_term_relationships.term_taxonomy_id=$library_category->cat_ID AND wp_posts.post_status='publish' ORDER BY wp_posts.post_date DESC LIMIT 4";



$args = array(
    'post_status' => 'publish',
	'post_type'  =>  'cpt-library',
	'orderby'    => 'post_date',
	'order'      => 'DESC',
	'posts_per_page' => '4',
	'post_limits' => '5',
	/*
	'meta_query' => array(
		array(
			'key'     => 'show_on_document_gallery',
			'value'   => '1',
			'compare' => '='
		),
	),
	*/
	'tax_query' => array(
            array(
                'taxonomy' => 'library-cat',
                'field' => 'term_id',
                'terms' => $library_category->cat_ID
            )
        )
	
);
$query = new WP_Query( $args );
$posts =  $query->get_posts();


//$posts = $wpdb->get_results($sql);
//echo "<pre>"; print_r($posts);
                          
                        
						echo "<ul class='libraries-tag-list'>";
						$i=0;
					
					if($library_category->cat_ID == '132'){	
						//echo "<pre>";print_r($posts);
					}
						foreach($posts as $latest_post){
						   // $sql_show = "SELECT meta_value FROM wp_postmeta WHERE meta_key='show_on_document_gallery' AND post_id=".$latest_post->ID;
						   // $show_documents = $wpdb->get_results($sql_show);
						    //print_r($show_documents);
						   // $result = unserialize($show_documents[0]->meta_value);
						    //if($result[0]=='yes'){
						        
						        
						   // setup_postdata($latest_post);
								
								
								$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($latest_post->ID), array('232','300') );
								$pdf_attatchment_id = get_post_meta($latest_post->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment_id = get_post_meta($latest_post->ID, 'vimeo_attatchment', true);
								$video_attatchment = wp_get_attachment_url( $video_attatchment_id );
								
								$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
								$library_thumbnail_style = ($library_thumbnail_url[0] != '') ? 'width: 100%;object-fit: cover;height: 100%;' :'width: 100%;height: 100%;';
								$pdf_attatchment_id = get_post_meta($latest_post->ID, 'pdf_attatchment', true);
								$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
								$video_attatchment = get_post_meta($latest_post->ID, 'vimeo_attatchment', true);								
                                $library_type = get_post_meta($latest_post->ID, 'select_library_type', true);
						   // echo "<pre>"; print_r($latest_post);
						  ?>
						   
						     	<li class="library-list" style='float:left;width:22%'>
						<?php if($library_type == 'video'){?>			
        					<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
        						<img src="<?php echo $library_thumbnail; ?>"  style="<?php echo $library_thumbnail_style ?>" />
        					</a> 
        					<h4 style="font-size: 13px;left;width: 220px;word-break: initial; padding-top:17px;"><?php echo $latest_post->post_title; ?></h4>
            		     	<?php } else{ ?>
                				<a href="<?php echo $pdf_attatchment ?>" class="fancybox-pdf"><img src="<?php echo $library_thumbnail; ?>" style="<?php echo $library_thumbnail_style ?>" /></a>
                				<div style="display:none" class="fancybox-hidden doc-lib">
                					<div id="pdf_document-<?php echo $library->ID ?>" class="hentry" >
                					<?php echo $document = $pdf_attatchment; ?>
                					<?php //echo do_shortcode('[pdfjs-viewer url='.$document.'  viewer_width=600px viewer_height=700px fullscreen=true download=true print=true]'); ?>
                					<?php echo do_shortcode('[pdfviewer  beta="true/false"]'.$document.'[/pdfviewer]'); ?>
                					</div>
                				</div>	
                				<h4 style="font-size: 13px;left;width: 220px;word-break: initial; padding-top:17px;"><?php echo $latest_post->post_title;  ?></h4>
            	     	<?php } ?>
		                  </li>
                       <?php 
						  $i++;   
						//}  // End yes condition	".get_category_link($library_category->term_id )."#content'
				
						    if($i==4)
            				    {?>
            				        <li style='float:right; margin-top:75px;'><a onclick="window.location.href='<?php echo get_category_link($library_category->term_id ).'#category_content'?>'; return false;" href='<?php echo get_category_link($library_category->term_id ).'#category_content'?>' style='color:white; width:120px; background-color:red; padding:6px; font-size:14px;'>See All</a></li>
            				 <?php   }
						    
						}	 
				 
						 echo "</ul>";
                    
					echo '</div>';
			}	
			echo "</div>";	
		}

		
	?>
	</div>
</div>
			
		</div>
		</div>
	<?php //get_sidebar(); ?>
	</div>
	
	</div><!-- #primary -->
	</main><!-- #main -->
	</div>
	</div>
	
	
	
<?php get_footer(); ?>
<script>
jQuery("#categories").click(function() {
 jQuery('html, body').animate({
        scrollTop: jQuery("#categories_list").offset().top
    }, 1000);
});
</script>
