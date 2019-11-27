<?php

/* Template Name: taxonomy-clone */

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
        max-width: 100% !important;
    }
</style>
<?php
if ((isset($_GET['term']) && $_GET['term'] == 'all') && (isset($_GET['term_id']) && $_GET['term_id'] != '')) {

    $catId = get_tags_in_use($_GET['term_id'], 'id', 'cpt-library', 'library_tags');

} else {

    $get_catgory_data = get_term_by("slug", get_query_var('term'), 'library_tags');
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
$image = wp_get_attachment_image_src(get_post_thumbnail_id($pid), 'full');
$himage = "http://mwra.testplanets.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
?>
<!--<div class="com_img">
		
             <img src="<?php //echo ($image[0]!="")?$image[0]:$himage; ?>" />
             <div class="subpage-search">
             	<div class="container"><?php //dynamic_sidebar('et_pb_widget_area_1'); ?></div>
             </div>
            <div class="pt-title-main">
                <div class="container">
                     <h1 class="pt_title"><?php //echo get_the_title( $pid ); ?></h1> 
                </div>
            </div>
        </div>-->
<div class="libraries-main-content container">
    <div class="document-library-menu"><a href="<?php echo get_permalink($pid); ?>">Go to Document Library</a></div>
    <div class="libraries-search-section">
        <div class="subpage-search">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search Document Library"
                           value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
                    <input type="hidden" value="cpt-library" name="post_type">

                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>
        </div>
        <div class="video-library-link">
            <p>Click here for our <a href="<?php echo get_permalink(3499) ?>">Video Library</a></p>


        </div>

        <div class="video-library-link2">


            <?php
            $cat_order = 'ASC';
            if (isset($_GET['cat_order']) && $_GET['cat_order'] != "") {
                $cat_order = $_GET['cat_order'];

            }

            ?>

            <div id="categories-panel-part">
                <div style="float:right">
                    <!--<p >
    		        Categories Order </br> <select id="cat_order_dc_clone">
    		        <option value=" "> Select Order</option>
    		        <option value="ASC" <?php //if ($cat_order == "ASC") echo "selected='selected'";?>  >Ascending</option>
    		        <option value="DESC" <?php //if ($cat_order == "DESC") echo "selected='selected'";?> >Descending</option>
    		          </select>
    		      </p>-->

                    <?php

                    $args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => $cat_order, 'taxonomy' => 'library-cat', 'hide_empty' => 1);
                    $all_library_categories = get_categories($args);
                    $doc_cat_list = array();

                    foreach ($all_library_categories as $lib_category) {

                        if (strpos($lib_category->slug, 'video') == false) {
                            $doc_cat_list[] = $lib_category;
                        }

                    }
                    $library_categories = $doc_cat_list;


                    //	$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => $cat_order , 'taxonomy' => 'library-cat','hide_empty' => 1,
                    // 'exclude'  =>array(211,212,213));
                    //$library_categories = get_categories( $args );
                    //echo "<pre>"; print_r($library_categories);
                    ?>

                    <p><a href="#secondary-left" id="categories"
                          style="font-size:14px; line-height:26px; color:white; padding: 6px; background-color: red;">See
                            All Categories</a></p>
                    <!-- 		<p >
   
    		  Categories <select id="cat_menu">
    		        <option value=" "> Select Categories</option>
    		        
    		       <?php

                    //	foreach ($library_categories as $library_category)
                    //		{ ?>
    		        
    		         
    		          <option value="<?php //echo $library_category->name;  ?>"  ><?php //echo $library_category->name; ?></option>
    		  <?php // } ?>        
    		  </select>
    		</p>-->
                </div>
            </div>


        </div>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="entry-content libraries-documents">
                <div class="most-recent-libraries">
                    <h2>Popular Topics</h2>
                    <?php print get_popular_topics(); ?>
                </div>
                <div class="documents-by-category">
                    <?php print get_documents_by_category(); ?>
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

    jQuery("#categories").click(function () {
        jQuery('html, body').animate({
            scrollTop: jQuery("#secondary-left").top
        }, 300);
    });

</script>
