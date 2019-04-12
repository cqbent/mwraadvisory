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
    ul.library-list-tag a {
    height: auto !important;
    overflow: hidden;
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
<?php
$pid = 280;
$image = wp_get_attachment_image_src(get_post_thumbnail_id($pid), 'full');
$himage = "http://mwraadvisoryboard.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
?>

<?php
if (isset($_GET['tagname']) && $_GET['tagname'] != "") {

    $temp_category = explode('-', $_GET['tagname']);
    
    $orginal_category = array();
    foreach ($temp_category as $t_value) {

        $orginal_category[] = ucfirst($t_value);
    }
    $category_heading = implode(' ', $orginal_category);
}
?>    
<div class="com_img">

    <img src="<?php echo ($image[0] != "") ? $image[0] : $himage; ?>" />
    <div class="subpage-search">
        <div class="container"><?php dynamic_sidebar('et_pb_widget_area_1'); ?></div>
    </div>

    <div class="pt-title-main">
        <div class="container">
            <h1 class="pt_title"><?php echo get_the_title($pid); ?></h1> 
        </div>
    </div>

</div>

<div class="libraries-main-content container">   
    <div class="document-library-menu"><a href="<?php echo get_permalink(280); ?>">Go to Document Library</a></div>
    <div class="libraries-search-section">
        <div class="subpage-search">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                
                <!-- <div style="width:100%">
                        <div style="float:left">
                      <span class="search_lable" ><h5>Search By Title or Tag:</h5></span>
                      </div>
                       <div style="float:right">
                      <select name="seach_by"  class="search-field-extra">
                          <option value="post_name_content">Document Name and Content</option>
                           <option value="post_tag">Document Tag</option>
                      </select>
                      </div>
                      </div>-->
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="<?php echo "Search " . $category_heading; ?>" value="<?php echo $_GET['s']; ?>" name="s" title="Search for:">
                   
                    <input type="hidden" value="cpt-library" name="post_type">
<?php if (isset($_GET['tagname'])) { ?>

                        <input type="hidden" value="<?php echo $_GET['tagname']; ?>" name="tagname">
                    <?php } ?>	


                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>
        </div>
        <div class="video-library-link">
            <p>Click here for our <a href="<?php echo get_permalink(3499) ?>">Video Library</a></p>
        </div>
<?php

if (isset($_GET['order_by']) && $_GET['order_by'] != '') {
    $order_by = $_GET['order_by'];
} else {
    $order_by = 'date';
}

if (isset($_GET['order']) && $_GET['order'] != '') {
    $order = $_GET['order'];
} else {
    $order = 'DESC';
}

if (isset($_GET['posts_per_page']) && $_GET['posts_per_page'] != '') {

    $limit = $_GET['posts_per_page'];
} else {

    $limit = 10;
}

?>

        <div class="video-library-link2">
            <div class="order_wrapper">
                <p>Document per page
                    <select id="search_page_limit">
                        <option value=""> Select</option>
                        <option value="5" <?php if ($limit == 5) echo "selected='selected'"; ?>>5</option>
                        <option value="10" <?php if ($limit == 10) echo "selected='selected'"; ?>>10</option>
                        <option value="20" <?php if ($limit == 20) echo "selected='selected'"; ?>>20</option>
                        <option value="50" <?php if ($limit == 50) echo "selected='selected'"; ?>>50</option>
                    </select>
                </p>
                <p>
                    Order by<select id="search_order_by">
                        <option value=" "> Select Order By</option>
                        <option value="post_date" <?php if ($order_by == "post_date") echo "selected='selected'"; ?>>Publish Date</option>
                        <option value="post_title" <?php if ($order_by == "post_title") echo "selected='selected'"; ?>>Document title</option>
                    </select>
                </p>
                <p>
                    Order <select id="search_order">
                        <option value=" "> Select Order</option>
                        <option value="ASC" <?php if ($order == "ASC") echo "selected='selected'"; ?>>Ascending</option>
                        <option value="DESC" <?php if ($order == "DESC") echo "selected='selected'"; ?>>Descending</option>

                    </select>
                </p>
            </div>
        </div>
    </div>
    <div class="sidebar" id="secondary-left">
        <div class="libraries-search-list">
            <h3 class="doc-cat-title">Document Categories</h3>


<?php
if (isset($_GET[cat_order]) && $_GET['cat_order'] != "") {
    $cat_order = $_GET[cat_order];
} else {

    $cat_order = 'ASC';
}
?>



            <div class="showhide_taglist"> <a class="show_taglist">Tags List</a>  <a class="hide_taglist" style="display:none">Categories List</a></div> 
            <div id="categories-panel-part">
                <p>
                    Categories Order <select id="search_cat_order">
                        <option value=" "> Select Order</option>
                        <option value="ASC" <?php if ($cat_order == "ASC") echo "selected='selected'"; ?>  >Ascending</option>
                        <option value="DESC" <?php if ($cat_order == "DESC") echo "selected='selected'"; ?> >Descending</option>

                    </select>
                </p>

<?php
$args = array('type' => 'cpt-library', 'orderby' => 'name', 'hide_empty' => 1, 'order' => $cat_order, 'taxonomy' => 'library-cat', 'hide_empty' => 1,
    'exclude' => array(213));

$library_categories = get_categories($args);
?>

                <p>

                    Categories <select id="cat_menu">
                        <option value=" "> Select Categories</option>

                <?php
                foreach ($library_categories as $library_category) {
                    ?> 


                            <option value="<?php echo $library_category->name; ?>"  ><?php echo $library_category->name; ?></option>
<?php } ?>        
                    </select>
                </p> 
            </div>






            <div class="expand_collapse"> <a class="expand_all">Expand All</a>  <a class="collapse_all" style="display:none">Collapse All</a></div>
<?php

$args = array('type' => 'cpt-library', 'order' => $cat_order, 'orderby' => 'name', 'hide_empty' => 1, 'taxonomy' => 'library-cat');
$library_categories = get_categories($args);


foreach ($library_categories as $library_category) {


    echo '<div class="tag-link-list-panel" style="display:none">';
    ?>

                <?php
                $library_tags = get_tags_in_use($library_category->term_id, 'id', 'cpt-library', 'library_tags');
                
                if (!empty($library_tags)) {
                    echo "<p class=''>";

                    foreach ($library_tags as $key => $library_tag) {
                        $getTag = get_term_by('id', $library_tag, 'library_tags', $output, $filter);

                        echo '<a href="' . get_term_link($getTag) . '">' . $getTag->name . '</a>';
                    }
                    echo "</p>";
                }
                echo '</div>';
            }



            if (!empty($library_categories)) {
                echo '<div class="libraries-cat-list">';
               
                foreach ($library_categories as $library_category) {
                  
                    // echo '<h2 class="lib-accordion">' . $library_category->name . '</h2>';
                    echo	'<h2 class="accordion"><a href="'.get_category_link($library_category->term_id ).'">'. $library_category->name .'</a></h2>';
                    /*
                    echo '<div class="tag-list-panel">';
                  

                    $library_tags = get_tags_in_use($library_category->term_id, 'id', 'cpt-library', 'library_tags');
                    if (!empty($library_tags)) {
                        echo "<ul class='libraries-tag-list'>";

                        foreach ($library_tags as $key => $library_tag) {
                            $getTag = get_term_by('id', $library_tag, 'library_tags', $output, $filter);

                            echo '<li><a href="' . get_term_link($getTag) . '">' . $getTag->name . '</a></li>';
                        }
                        echo "</ul>";
                    }
                    echo '</div>';
                    */
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">





            <?php if (isset($category_heading)) { ?>
                <div class="o-f-t"> 
                    <center><H1><?php echo $category_heading; ?> </H1></center>
                </div>

            <?php } ?>

            <div class="entry-content libraries-documents">


                <div class="service-listing-main" >
            <?php
            global $query_string;
            global $wpdb;

            $current_url = site_url() . $_SERVER['REQUEST_URI'];
            $temp_current_site_url = explode('?', $current_url);

            $query_string = str_replace("tagname", "library-cat", $temp_current_site_url[1]);

            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

             
           
             $keword  = $_GET['s'];
             $post_type = $_GET['post_type'];
             
             if(isset($_GET['tagname'])){
                 
             $category_slug = $_GET['tagname'];
             
             }
             
             if(isset($_GET['paged'])){
                 
             $paged = $_GET['paged'];
             
             }else{
                $paged = 1; 
                 
             }
             
            
             if(isset($category_slug)){
                 
             $query_search_keyword_args = array(  
                                 's' => $keword,
                                 'post_type' => $post_type,
                                 'post_status' => 'publish',
                                 'paged' => $paged,
                                 'order' =>'DESC',
                                  'orderby'	=> 'post_date',
                                 'tax_query' => array(
                                     	 'relation' => 'AND',   
										array(
									
										'taxonomy' => 'library-cat',
											'field' => 'slug',
											'terms' => $category_slug,
										)
										
								)
                             
                 
                 );
                 
             }else{
                 
                  $query_search_keyword_args = array(  
                                 's' => $keword,
                                 'post_type' => $post_type,
                                 'post_status' => 'publish',
                                 'paged' => $paged,
                                 'order' =>'DESC',
                                  'orderby'	=> 'post_date'
                 );
                 
                 
             }
             
            $query_search_by_keyword  = new WP_Query($query_search_keyword_args);
           $get_Posts =  $query_search_by_keyword->get_posts();
           	


            if (!empty($get_Posts)) {
                echo '<ul class="library-list-tag"> ';
                foreach ($get_Posts as $temp) {

                    $terms = get_the_terms($temp, 'library-cat');
                    $catName = array(0);
                    foreach ($terms as $catname) {
                        $catName[] = $catname->term_id;
                    }


                    $library_thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($temp->ID), 'thumbnail');
                    $library_thumbnail = ($library_thumbnail_url[0] != '') ? $library_thumbnail_url[0] : get_stylesheet_directory_uri() . '/images/mwra-no-image.png';
                    $pdf_attatchment_id = get_post_meta($temp->ID, 'pdf_attatchment', true);
                    $pdf_attatchment = wp_get_attachment_url($pdf_attatchment_id);
                    $video_attatchment = get_post_meta($temp->ID, 'vimeo_attatchment', true);
                    $library_type = get_post_meta($temp->ID, 'select_library_type', true);
                    ?>
                            <li>
                            <?php if (!in_array('201', $catName)) { ?>
                                    <a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment; ?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' : 'fancybox-pdf'; ?>" alt="<?php echo $temp->post_title; ?> ">
                                        <img src="<?php echo $library_thumbnail; ?>"  width="300" height="200"/>
                                    </a>
                            <?php } else { ?>	
                                    <a href="<?php echo ($library_type == 'video') ? $video_attatchment : $pdf_attatchment; ?>" class="<?php echo ($library_type == 'video') ? 'fancybox-vimeo' : 'fancybox-pdf'; ?>" alt="<?php echo $temp->post_title; ?> ">
                                        <img src="<?php echo $library_thumbnail; ?>"  width="300" height="200" />
                                    </a>
                            <?php } ?>									
                                <h4><?php echo get_the_title($temp->ID); ?></h4>
                            </li>
                            <?php
                        }

                        echo '</ul>';
                        
                        
                        
                        
                    }
                   
                   $paginate_links = paginate_links(
                            );
                   

                    echo '<div style="width: 100%;float: left;margin:20px;">';

                    if ($paginate_links) {
                        echo "<nav class='custom-pagination'>";
                        echo $paginate_links;
                        echo "</nav>";
                    }
                    echo '</div>';

                    wp_reset_postdata();
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
