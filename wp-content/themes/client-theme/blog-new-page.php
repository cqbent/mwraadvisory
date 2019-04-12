<?php 
/* Template Name: Blog New Page*/

get_header();
?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
    	
        <?php 
			
			global $wpdb;
			$query = "select post_modified from wp_posts";
			$results = $wpdb->get_results($query);
			foreach($results as $row){
				$all_date = $row->post_modified;
			}
		
        	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array('post_type'=>'post','paged'=>$paged,'posts_per_page'=>-1,'order'=>'DESC','orderby'=>$all_date);
            
            $loop = query_posts($args);
            while ( have_posts() ) : the_post();
		?>
        
        		<header class="entry-header">
                	<?php 
						the_title();
						echo $loop->post_modified;
					 ?>
                </header>
                <div class="entry-content">
                	<?php
						the_content();
					?>

				</div>   
                	
                    
		<?php 
            endwhile;
        
         ?>
        	 	
	</main>
    
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>