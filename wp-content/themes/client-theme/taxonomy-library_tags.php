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
<div class="document-library-menu"><a href="<?php echo get_permalink( $pid ); ?>">Go to Document Library </a></div>
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
	<div class="video-library-link">
		<p>Click here for our <a href="<?php echo get_permalink(3499) ?>">Video Library</a></p>
		
	</div>
	<?php
	if(isset($_GET['order_by']) && $_GET['order_by'] !=''){
						    
						   $order_by = $_GET['order_by']; 
						}else{
						    
						     $order_by = 'date'; 
						}		
								
						
						if(isset($_GET['order']) && $_GET['order'] !='' ){
						    
						    $order = $_GET['order'];
				
						}else{
						    
						     $order = 'DESC';
						}	
						
						if(isset($_GET['page_limit']) && $_GET['page_limit'] !='' ){
						    
						    $limit = $_GET['page_limit'];
				
						}else{
						    
						     $limit = 10;
						}
						
	
	?>
	
	<div class="video-library-link2">
	    <div class="order_wrapper">
	        <p>Document per page
    		   <select id="page_limit">
    		          <option value=""> Select</option>
    		            <option value="5" <?php if ($limit == 5) echo "selected='selected'";?>>5</option>
    		            <option value="10" <?php if ($limit == 10) echo "selected='selected'";?>>10</option>
    		            <option value="20" <?php if ($limit == 20) echo "selected='selected'";?>>20</option>
    		            <option value="50" <?php if ($limit == 50) echo "selected='selected'";?>>50</option>
    		  </select>
    		</p>
    		<p>
    		   Order by<select id="order_by">
    		          <option value=" "> Select Order By</option>
    		            <option value="post_date" <?php if ($order_by == "post_date") echo "selected='selected'";?>>Publish Date</option>
    		            <option value="post_title" <?php if ($order_by == "post_title") echo "selected='selected'";?>>Document title</option>
    		  </select>
    		</p>
    		<p>
    		   Order <select id="order">
    		        <option value=" "> Select Order</option>
    		          <option value="ASC" <?php if ($order == "ASC") echo "selected='selected'";?>>Ascending</option>
    		          <option value="DESC" <?php if ($order == "DESC") echo "selected='selected'";?>>Descending</option>
    		          
    		  </select>
    		   <input type="hidden" name="term" id="term" value="<?php if(isset($_GET['term'])){ echo $_GET['term']; } ?>" />
    		   <input type="hidden" name="term_id" id="term_id" value="<?php if(isset($_GET['term_id'])){ echo $_GET['term_id']; } ?>" />
    		</p>
		</div>
	</div>
 </div>
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
    		        Categories Order </br> <select id="cat_order">
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
   
    		  Categories <select id="cat_menu">
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
		
		//echo '<pre>'; print_r($library_categories); exit;
		
		
		if(!empty($library_categories)){
			echo '<div class="libraries-cat-list">';
		?>	
			
		<div class="expand_collapse"> <a class="expand_all">Expand All</a>  <a class="collapse_all" style="display:none">Collapse All</a></div>
		 
		<?php	
			foreach ($library_categories as $library_category)
			{
					
					echo '<h2 class="lib-accordion">'.$library_category->name.'</h2>';
					echo '<div class="tag-list-panel">';
						/*echo '<ul class="libraries-archive-list">';
							wp_get_archives("post_type=cpt-library&type=yearly&cat=$library_category->term_id"); 
						echo "</ul>";*/
						
						$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
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
				global $wpdb;						
			/*$args = array('post_type'=> 'cpt-library','posts_per_page'=>-1,'order'=>'ASC',
						  'orderby'	=> 'ID',
						  'tax_query' => array(
										array(
											'taxonomy' => 'library_tags',
											'field' => 'term_id',
											'field'=>'tag_id',
											'terms' => $catId,
										),
								),); */
								
						$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
								
				$args = array(
							'post_type'=> 'cpt-library',
							'posts_per_page'=>2,
							'order'=>$order,
							'orderby'	=> $order_by,
							'paged' => $paged,
							'tax_query' => array(
												array(
												'taxonomy' => 'library_tags',
												'field' => 'term_id',
												'field'=>'tag_id',
												'terms' => $catId,
												'operator' => 'IN'
												))
							);					
			//echo '<pre>';
			//print_r($args);
			//exit;
				
			//$get_Posts = query_posts( $args); 
			
			//echo $GLOBALS['wp_query']->request;
			//echo '<pre>';
			//print_r($get_Posts);
			//echo '</pre>';
			
		if (strpos($_SERVER['REQUEST_URI'], '?page=') !== false || strpos($_SERVER['REQUEST_URI'], '&page=') !== false ) {
            	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
            	$temp = explode("&",$uri_parts[1]);
    
                $searchword = 'page=';
                $matches = array();
                foreach($temp as $k=>$v) {
                    if(preg_match("/\b$searchword\b/i", $v)) {
                         $matches[$k] = $v;
                          unset($temp[$k]);
                    }
                }
               
            	 $alertered_uri = implode("&",$temp);
            	$current_url=site_url().$uri_parts[0]."?".$alertered_uri;
            	
           }else{
               
               	$current_url=site_url().$_SERVER['REQUEST_URI']; 
           }	
			
			
	
       
	
		if(is_array($catId))
		 $cat = implode(',',$catId);
		else
		  $cat = $catId;
  
			$p_count =  "SELECT SQL_CALC_FOUND_ROWS wp_posts.ID FROM wp_posts INNER JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) WHERE 1=1 AND ( wp_term_relationships.term_taxonomy_id IN ($cat)) AND wp_posts.post_type = 'cpt-library' AND (wp_posts.post_status = 'publish') GROUP BY wp_posts.ID ORDER BY wp_posts.post_date DESC";
			$cc= $wpdb->get_results($p_count); ;
			//$count_posts = wp_count_posts('cpt-library');
			$total_pages = count($cc);
		//	$limit = 10; 
            $adjacents = 3;			
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
			if($page) 
			$start = ($page - 1) * $limit; 			//first item to display on this page
			else
			$start = 0;
		
			$start_from = ($page-1) * $limit; 
			$prev = $page - 1;							//previous page is page - 1
			$next = $page + 1;
            //$total_pages = ceil($total / $limit);
			$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;
			
			$pagination = "";
	 if($lastpage > 1)
	 {	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1){
			if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
			$pagination.= "<a href=\"$current_url&page=$prev\">previous</a>";
		    else
			$pagination.= "<a href=\"$current_url?page=$prev\">previous</a>";	
		}else{
			$pagination.= "<span class=\"disabled\">previous</span>";	
		}
			
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$pagination.= "<span class=\"current\">$counter</span>";
				}	
				else{
					if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
					$pagination.= "<a href=\"$current_url&page=$counter\">$counter </a>";
					else
					$pagination.= "<a href=\"$current_url?page=$counter\">$counter </a>";	
				}
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page){
						$pagination.= "<span class=\"current\">$counter</span>";
					}
						
					else{
						if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
						$pagination.= "<a href=\"$current_url&page=$counter\">$counter</a>";
						else
						$pagination.= "<a href=\"$current_url?page=$counter\">$counter</a>";
					}	
				}
				$pagination.= "...";
				if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
				$pagination.= "<a href=\"$current_url&page=$lpm1\">$lpm1</a>";
				else
				$pagination.= "<a href=\"$current_url?page=$lpm1\">$lpm1</a>";
			
				if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
				$pagination.= "<a href=\"$current_url&page=$lastpage\">$lastpage</a>";
				else
				$pagination.= "<a href=\"$current_url?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') ){
					$pagination.= "<a href=\"$current_url&page=1\">1</a>";
					$pagination.= "<a href=\"$current_url&page=2\">2</a>";
				}
				
				else{
					$pagination.= "<a href=\"$current_url?page=1\">1</a>";
					$pagination.= "<a href=\"$current_url?page=2\">2</a>";
				}
				
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page){
						$pagination.= "<span class=\"current\">$counter</span>";
					}	
					else{
						if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
						$pagination.= "<a href=\"$current_url&page=$counter\">$counter</a>";
						else
						$pagination.= "<a href=\"$current_url?page=$counter\">$counter</a>";
					}				
				}
				$pagination.= "...";
				if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
				$pagination.= "<a href=\"$current_url&page=$lpm1\">$lpm1</a>";
				else
				$pagination.= "<a href=\"$current_url?page=$lpm1\">$lpm1</a>";
			
				if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
				$pagination.= "<a href=\"$current_url&page=$lastpage\">$lastpage</a>";
				else
				$pagination.= "<a href=\"$current_url?page=$lastpage\">$lastpage</a>";			
			}
			//close to end; only hide early pages
			else
			{
				if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') ){
					$pagination.= "<a href=\"$current_url&page=1\">1</a>";
					$pagination.= "<a href=\"$current_url&page=2\">2</a>";
				}
				
				else{
					$pagination.= "<a href=\"$current_url?page=1\">1</a>";
					$pagination.= "<a href=\"$current_url?page=2\">2</a>";
				}
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
				    
				    
					if ($counter == $page){
						$pagination.= "<span class=\"current\">$counter</span>";
					}	
					else{
						if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
						$pagination.= "<a href=\"$current_url&page=$counter\">$counter</a>";
						else
						$pagination.= "<a href=\"$current_url?page=$counter\">$counter</a>";
					}	
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) {
			if((isset($_GET['term']) && $_GET['term']=='all') && (isset($_GET['term_id']) && $_GET['term_id']!='') )
						$pagination.= "<a href=\"$current_url&page=$next\">next</a>";
						else
						$pagination.= "<a href=\"$current_url?page=$next\">next</a>";
		}
		else{
			$pagination.= "<span class=\"disabled\">next</span>";
			$pagination.= "</div>\n";
		}	
	}
			
            $sql = "SELECT SQL_CALC_FOUND_ROWS wp_posts.ID FROM wp_posts INNER JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) WHERE 1=1 AND ( wp_term_relationships.term_taxonomy_id IN ($cat)) AND wp_posts.post_type = 'cpt-library' AND (wp_posts.post_status = 'publish') GROUP BY wp_posts.ID ORDER BY wp_posts.post_date DESC LIMIT $start_from, $limit";
  
			$res1= $wpdb->get_results($sql);
			if (!empty($res1))
			{ echo '<ul class="library-list-tag"> ';	
				foreach ($res1 as $library){
				//setup_postdata($library);
                $post = get_post($library->ID);				
     
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
				<h4 style="font-size: 13px;left;width: 157px;word-break: initial;"><?php echo $post->post_title;?></h4>
				</li>
			<?php		
					}
				echo '</ul>'; 
			}			
			echo $pagination; 
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
