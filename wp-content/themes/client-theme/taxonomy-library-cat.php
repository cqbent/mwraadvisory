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
	
	$get_catgory_data = get_term_by("slug",get_query_var('term'),'library-cat');
	$catId = $get_catgory_data->term_id;

    $sql = "SELECT wp_posts.*, wp_term_relationships.* FROM wp_posts INNER JOIN wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id AND wp_term_relationships.term_taxonomy_id=$catId AND wp_posts.post_status='publish' ORDER BY wp_posts.post_date DESC LIMIT 1";
    $posts = $wpdb->get_results($sql);
   #print_r($posts);
    $post_ID = $posts[0]->ID;
    $library_type = get_post_meta($post_ID, 'select_library_type', true);
?>
<script>
    jQuery("#category_content").ready(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#category_content").offset().top
    }, 2000);
});
</script>
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
    .search-field-extra{
    
    width: 70%;
    height: 50px;
    margin-top: 10px;
    border: 1px solid #236697;
    line-height: 58px;
    background: #fff;
    text-align: left;
    color: #333;
    font-size: 1.429em;
    font-weight: 300;
    padding: 0 75px 0 20px;
    border-radius: 2px;
    box-sizing: border-box;
}
.search_lable {width:30%;margin: 18px 0 0 12px;}
</style>


    
</div>


  <?php 
             $pid = 280; 
             $image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full'); 
			 #$himage ="http://mwra.knoxtest.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
			 $himage ="http://mwraadvisoryboard.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
         ?>
         
   <?php
     $temp_category =  explode('-',get_query_var('term'));
     $orginal_category= array();
     foreach( $temp_category as $t_value){
         
        $orginal_category[] = ucfirst($t_value); 
     }
     $category_heading = implode(' ',$orginal_category);
     //$category_term = implode('+',$orginal_category);
     ?>     
         
         
      
        <div class="com_img">
		
             <img src="<?php echo ($image[0]!="")?$image[0]:$himage; ?>" />
             <div class="subpage-search">
             	<div class="container"><?php dynamic_sidebar('et_pb_widget_area_1'); ?></div>
             </div>
            <div class="pt-title-main">
                <div class="container">
                    <?php if($library_type=='video') { ?>   
                     <h1 class="pt_title">Video Library</h1> 
                    <?php } else {?>
                    <h1 class="pt_title">Document Library</h1> 
                    <?php } ?>
                </div>
            </div>
        </div>
  
<div class="libraries-main-content container">   
<?php if($library_type=='video') { ?>   
<div class="document-library-menu"><a href="<?php echo get_permalink( $pid ); ?>">Go to Document Library</a></div>
<?php } else {?>
<div class="document-library-menu"><a href="<?php echo get_permalink( $pid ); ?>">Go to Document Library</a></div>
<div class="document-library-menu"><a href="<?php echo site_url() ?>/video-library">Go to Video Library</a></div>
<?php } ?>
<div class="libraries-search-section">
	<div class="subpage-search" id="category_content">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	    
	    <!--<div style="width:100%">
                        <div style="float:left">
                      <span class="search_lable" ><h5>Search By Title or Tag:</h5></span>
                      </div>
                       <div style="float:right">
                      <select name="seach_by"  class="search-field-extra">
                          <option value="post_name_content">Document Name and Content</option>
                           <option value="post_tag">Document Tag</option>
                      </select>
                      </div>
                      </div>
	    
	    
			<label>-->
				<span class="screen-reader-text">Search for:</span>
				<?php if($library_type=='video') { ?>   
				<input type="search" class="search-field" placeholder=" <?php echo "Search ".$category_heading ?>" value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
				<?php } else {?>
				<input type="search " class="search-field" placeholder=" <?php echo "Search ".$category_heading ?>" value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
				<?php }?>
				
				<input type="hidden" value="cpt-library" name="post_type">
				
			
                	<input type="hidden" value="<?php echo get_query_var('term'); ?>" name="tagname">
				
				
				
			</label>
			<input type="submit" class="search-submit" value="Search">
	</form>
	</div>
	
 </div> 
<!-- <div class="container">  -->
<div class="sidebar" id="secondary-left">
    	<?php
    	
    		if(isset($_GET['order'])){
		    $order = $_GET['order'];
		    
    		}else{
    		    $order = 'ASC';
    		}
    	
    	
    	if($library_type=='video') { ?>   
	<div class="libraries-search-list">
	<h3 class="doc-cat-title">Video Categories</h3>
	
	
		<?php 
		
	
	    
		$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1,'order' => $order, 'taxonomy' => 'library-cat','hide_empty' => 1);
		$libraries_categories = get_categories( $args );
	  
		
		echo '<div class="libraries-cat-list">';
		
		if(!empty($libraries_categories))
					{
						foreach ($libraries_categories as $library_category )
						{
						     if(strpos( $library_category->slug, 'video') != false ){
		?>				    
				<h2 class="accordion"><a href="#" onclick="window.location.href='<?php echo get_category_link($library_category->term_id ).'#category_content'?>';return false;"><?php echo $library_category->name; ?></a></h2>
		<?php
						     }
						}
					}
		echo '</div>';	
	?>

	 <?php 
	
	
       
		
		$video_args = array('post_type'=> 'cpt-library', 'posts_per_page'=> -1, 'meta_key'   => 'select_library_type', 
									   'meta_value' => 'video'
									);	
									
		$video_Posts = get_posts( $video_args);	
		$checkExist_catID = array();
		/*
		if(!empty($video_Posts)){
			echo '<div class="libraries-cat-list">';	
			foreach ($video_Posts as $video_library)
			{
				    $libraries_categories = get_the_terms( $video_library, 'library-cat' );	
									
					if(!empty($libraries_categories))
					{
						foreach ($libraries_categories as $library_category )
						{	
							if($library_category->term_id != 201)
							{
								if(!in_array($library_category->term_id, $checkExist_catID))
								{
									?>
									<h2 class="accordion"><a href="#" onclick="window.location.href='<?php echo get_category_link($library_category->term_id ).'#category_content'?>';return false;"><?php echo $library_category->name ?></a></h2>
									<?php
									echo '<div class="tag-list-panel">';
									
									
									$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
									if(!empty($library_tags))
									{
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
								
							}
								
								
							$checkExist_catID[] = $library_category->term_id;
						}
					}
				
                                    
				
			}
			echo '</div>';	
			
		}
		*/
		
		
		
	?>
	</div>
	<?php } else { ?>
		<div class="libraries-search-list">
	<h3 class="doc-cat-title">Document Categories</h3>
	<?php 
		
	
	    
		$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1,'order' => $order, 'taxonomy' => 'library-cat','hide_empty' => 1);
		$libraries_categories = get_categories( $args );
	  
		
		echo '<div class="libraries-cat-list">';
		
		if(!empty($libraries_categories))
					{
						foreach ($libraries_categories as $library_category )
						{
						     if(strpos( $library_category->slug, 'video') == false ){
		?>				    
				<h2 class="accordion"><a href="#" onclick="window.location.href='<?php echo get_category_link($library_category->term_id ).'#category_content'?>';return false;"><?php echo $library_category->name; ?></a></h2>
		<?php
						     }
						}
					}
		echo '</div>';	
	/*
		$pdf_args = array('post_type'=> 'cpt-library', 'posts_per_page'=> -1,'meta_key' => 'select_library_type', 
									   'meta_value' => 'pdf'
									);	
									
		$pdf_Posts = get_posts( $pdf_args);	
		$checkExist_catID = array();
		if(!empty($pdf_Posts)){
			echo '<div class="libraries-cat-list">';	
			foreach ($pdf_Posts as $pdf_library)
			{
				    $libraries_categories = get_the_terms( $pdf_library, 'library-cat' );	
									
					if(!empty($libraries_categories))
					{
						foreach ($libraries_categories as $library_category )
						{	
							if($library_category->term_id != 201)
							{
								if(!in_array($library_category->term_id, $checkExist_catID))
								{
									?>
									<h2 class="accordion"><a href="#" onclick="window.location.href='<?php echo get_category_link($library_category->term_id ).'#category_content'?>';return false;"><?php echo $library_category->name ?></a></h2>
									<?php
									echo '<div class="tag-list-panel">';
								
									
									$library_tags = get_tags_in_use($library_category->term_id,'id','cpt-library', 'library_tags');
									if(!empty($library_tags))
									{
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
								
							}
								
								
							$checkExist_catID[] = $library_category->term_id;
						}
					}
				
                                    
				
			}
			echo '</div>';	
			
		}
		*/
		
	?>
	 	</div>
	<?php } ?>
	
	
	<?php
	if(isset($_GET['order'])){
			    
			  $order =  $_GET['order']; 
			}else{
			    
			    $order = 'ASC';
			}
			
			if(isset($_GET['from_year'])){
			    
			    $from_date = $_GET['from_year'];
			}
			
			if(isset($_GET['to_year'])){
			    
			    $to_date = $_GET['to_year'];
			    
			}
			
	
	?>
	
	
</div>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
     <div class="o-f-t"> 
     <center><H1><?php echo $category_heading; ?> </H1></center>
     </div>
              <div class="o-f-t">
                <p>
    		        Order  <select id="order_result">
    		        <option value="default"> Select Order</option>
    		        <option value="ASC" <?php if ($order == "ASC") echo "selected='selected'";?>  >Ascending</option>
    		        <option value="DESC" <?php if ($order == "DESC") echo "selected='selected'";?> >Descending</option>
    		          </select>
    		      </p>
    		      
    		      
    		       <p>
    		           
    		        From Year  <select id="from_year">
    		        <option value="default"> Select Year</option>
    		        <option value="ASC" <?php if ($cat_order == "ASC") echo "selected='selected'";?>  >Ascending</option>
    		        <option value="DESC" <?php if ($cat_order == "DESC") echo "selected='selected'";?> >Descending</option>
    		          </select>
    		      </p>
    		      
    		      
    		       <p>
    		           
    		        To Year  <select id="to_year">
    		       <option value="default"> Select Year</option>
    		        <option value="ASC" <?php if ($cat_order == "ASC") echo "selected='selected'";?>  >Ascending</option>
    		        <option value="DESC" <?php if ($cat_order == "DESC") echo "selected='selected'";?> >Descending</option>
    		          </select>
    		      </p>
    		      
    		       <p>
    		           
    		  <input type="button" value="Filter" name ="Filter" id="filter" />
    		      </p>
    		      
    		      </div>
    		      <style>
    		           .o-f-t p {

                            float: left;
                            margin: 0px 20px 15px 0px;
                            font-size: 15px !important;
                            font-family: 'Montserrat', sans-serif !important;
                         
                                }
                                
                          .o-f-t p select {    padding: 7px 10px;
                            margin: 0px 5px;
                            min-width: 118px;  
                          }   
                                
                       .o-f-t p:last-child {
                                     margin-top: -3px;
                                }
                                #filter {
    padding:13px 14px;
}
    		      </style>
    
	<div class="entry-content libraries-documents">
		<div class="service-listing-main">
			<?php
			
			
			if($to_date !='' && $from_date !=''){
			    
			    
			    $args = array('post_type'=> 'cpt-library','posts_per_page'=>12,'order'=>'ASC',
						 'orderby'	=> 'post_date',
						  'order' => $order,
						  'paged' => get_query_var( 'paged' ),
						  'date_query' => array(
                                		array(
                                		'after'     => 'January 1st,'.$from_date,
                                			'before'    => array(
                                				'year'  => $to_date,
                                				'month' => 12,
                                				'day'   => 30,
                                			),
                                			'inclusive' => true,
                                		),	
								
								),	
							
						  'tax_query' => array(
										array(
											'taxonomy' => 'library-cat',
											'field' => 'term_id',
											'terms' => $catId,
										),
								)
								
							);
				
			    
			}else{
			    
			    
			    $args = array('post_type'=> 'cpt-library','posts_per_page'=>12,
						  'orderby'	=> 'post_date',
						  'order' => 'DESC',
						  'paged' => get_query_var( 'paged' ),
						  'tax_query' => array(
										array(
											'taxonomy' => 'library-cat',
											'field' => 'term_id',
											'terms' => $catId,
										),
								)
								
							);
			    
			}
			
			
    
					
            $query      =  new WP_Query($args);
          	$get_Posts = $query->get_posts();
			//$get_Posts = get_posts( $args);
			
		
		    //echo '<pre>';
		    //print_r($args);
		    //echo '<pre>';
			//print_r($get_Posts);
			//exit;
			
		
			
			if (!empty($get_Posts))
			{
				echo '<ul class="library-list-cat"> ';	
				foreach ($get_Posts as $library){	
					setup_postdata($library);
					
					$library_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($library->ID), array('232','300') );
					$library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] :get_stylesheet_directory_uri().'/images/mwra-no-image.png';
					$library_thumbnail_style = ($library_thumbnail_url[0] != '') ?'width: 100%;object-fit: cover;height: 100%;' :'width: 100%;height: 100%;';
					
					$pdf_attatchment_id = get_post_meta($library->ID, 'pdf_attatchment', true);
					$pdf_attatchment = wp_get_attachment_url( $pdf_attatchment_id );
			       $video_attatchment = get_post_meta($library->ID, 'vimeo_attatchment', true);
					 $library_type = get_post_meta($library->ID, 'select_library_type', true);			
								?>
									<li>
									    
									    
						
				                      <!--<a href="<?php echo $video_attatchment;?>" class="fancybox-vimeo" alt="<?php echo $library->post_title; ?> ">
									<img src="<?php echo $library_thumbnail; ?>" />
									</a>
                                    <h4 style="font-size: 13px;left;width: 157px;word-break:initial;"><?php echo $library->post_title; ?></h4>-->
                                    
                                   
                                    <?php if(!in_array('201',$catName)){ ?>
					<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
									<img src="<?php echo $library_thumbnail; ?>" style="<?php echo $library_thumbnail_style ?>"/>
									</a>
					<?php }else{ ?>	
					<a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment;?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' :'fancybox-pdf';?>" alt="<?php echo $library->post_title; ?> ">
									<img src="<?php echo $library_thumbnail; ?>"  style="<?php echo $library_thumbnail_style ?>" />
					</a>
					<?php }?>									
					<h4><?php echo $library->post_title;  ?></h4>
                                    
                                    

                                    
									</li>
		<?php	
							
					}
					
				   $paginate_links = paginate_links( 
				                                     array(
                                                   
                                                    'current' => max( 1, get_query_var('paged') ),
                                                    'total' => $query->max_num_pages,
                                                    'prev_text'    => __('« prev'),
                                                    'next_text'    => __('next »')
                                                    
                                                    ));
				
					
					echo '</ul>';
					echo '<div style="width: 100%;float: left;">';
					
                    if ($paginate_links) {
                        
                      echo "<nav class='custom-pagination'>";
                      echo $paginate_links;
                      echo "</nav>";
                    }
					echo '</div>';
					
					wp_reset_postdata();
			}
		
			?>
	
		</div>
	
	</div>
	</div>
	</div><!-- #primary -->
</main><!-- #main -->
</div>

<script type="text/javascript">
       
var start = 1985;
var end = new Date().getFullYear();
var options = "";
var options_to_year = "";
var options_from_year = "";

var from_year = "<?php  echo $_GET['from_year']; ?>";
var to_year = "<?php echo $_GET['to_year']; ?>";



for(var year = start ; year <=end; year++){
    if(year == to_year && year != ""){
  options_to_year += "<option selected='select'>"+ year +"</option>";
    }else{
     options_to_year += "<option>"+ year +"</option>";   
        
    }
}



for(var year = start ; year <=end; year++){
    if(year == from_year && year != ""){
   options_from_year += "<option selected='select' >"+ year +"</option>";
    }else{
        
     options_from_year += "<option>"+ year +"</option>";   
    }
}




document.getElementById("to_year").innerHTML = options_to_year;
document.getElementById("from_year").innerHTML = options_from_year;



 jQuery(document).ready(function() {
 
 
 //jQuery('#order_result,#to_year,#from_year').change(function(){
  jQuery('#filter').click(function(){   
     
 
        var order_value =  jQuery('#order_result').val();
        var to_year =  jQuery('#to_year').val();
        var from_year =  jQuery('#from_year').val();
        
        var $query_string = '';
      
        
        if(order_value != 'default'){
            
           $query_string =  '?order='+order_value;
        }else{
            
            $query_string = '';
        }
        
        
        if(from_year !=  'default' & to_year !=  'default'){
          
            if($query_string == ''){
                
               $query_string = '?from_year='+from_year+'&to_year='+to_year;
               
                
            }else{
                $query_string += '&from_year='+from_year+'&to_year='+to_year; 
            }
           
           
            
            if(parseInt(from_year) > parseInt(to_year)){
                
                alert('From Year Shuld be Greater then To Year');
                return false;
            }
            
            
        }else{
           
            
            
        }
        
        
       
       
       if($query_string != ''){
           
            window.location  = "<?php echo site_url(); ?>/libraries-category/<?php echo get_query_var('term'); ?>/"+$query_string;
       }else{
            window.location  = "<?php echo site_url(); ?>/libraries-category/<?php echo get_query_var('term'); ?>/";
           
       }
       
       
        
        
 });      
 
 
 /*
 
 jQuery('#to_year').change(function(){
 
        var order_value =  jQuery('#order_result').val();
        var to_year =  jQuery('#to_year').val();
        var from_year =  jQuery('#from_year').val();
       
        window.location  = "<?php echo site_url(); ?>/libraries-category/<?php echo get_query_var('term'); ?>/"+"?order="+order_value+"&to_year="+to_year+"&from_year="+from_year;
        
        
 });      
 
 
 jQuery('#from_year').change(function(){
 
        var order_value =  jQuery('#order_result').val();
        var to_year =  jQuery('#to_year').val();
        var from_year =  jQuery('#from_year').val();
       
        window.location  = "<?php echo site_url(); ?>/libraries-category/<?php echo get_query_var('term'); ?>/"+"?order="+order_value+"&to_year="+to_year+"&from_year="+from_year;
        
        
 }); 
 
 */

});
       

       
   </script> 





<div>
   
	
<?php get_footer(); ?>

