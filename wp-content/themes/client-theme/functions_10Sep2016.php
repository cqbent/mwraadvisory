<?php
// Enqueue Child Theme Sheet
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

	register_sidebar( array(
		'name'          => __( 'Top Header', 'twentyfourteen' ),
		'id'            => 'top-header',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Newsletter', 'twentyfourteen' ),
		'id'            => 'home-newsletter',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Blog', 'twentyfourteen' ),
		'id'            => 'home-blog',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Menu', 'twentyfourteen' ),
		'id'            => 'footer-menu',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Copyright', 'twentyfourteen' ),
		'id'            => 'footer-copyright',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Slider Search', 'twentyfourteen' ),
		'id'            => 'header-slider-search',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Recent Blog', 'twentyfourteen' ),
		'id'            => 'home-recent-blog',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	function replace_search_placeholder_text() { ?>
    <script type="text/javascript">
    jQuery( document ).ready(function() {
        jQuery('#search-3 input[type="search"]').attr('placeholder','What can we help you find?');
    });
    </script>
	<?php }
	add_action( 'wp_footer', 'replace_search_placeholder_text' );
	
	
	//custom post types
	
		function register_cus_post_types(){
			// CPT Slders
			/*
			 * Wordpress Admin icons - https://developer.wordpress.org/resource/dashicons/#download
			 * */
			register_post_type('cpt-community', array( 'label' => 'Community','description' => 'Community','public' => true,'show_ui' => true,'show_in_menu' => true,'menu_icon'=> 'dashicons-groups','capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'community'),'query_var' => true,'supports' => array('title','thumbnail','editor','excerpt','page-attributes'),'labels' => array (
			  'name' => 'Community',
			  'singular_name' => 'Community',
			  'menu_name' => 'Community',
			  'add_new' => 'Add Community',
			  'add_new_item' => 'Add New Community',
			  'edit' => 'Edit',
			  'edit_item' => 'Edit Community',
			  'new_item' => 'New Community',
			  'view' => 'View Community',
			  'view_item' => 'View Community',
			  'search_items' => 'Search Community',
			  'not_found' => 'No Community Found',
			  'not_found_in_trash' => 'No Community Found in Trash',
			  'parent' => 'Parent Community',
			),) );
			

			register_post_type('cpt-library', array( 'label' => 'Library','description' => 'Library',	'public' => true,'show_ui' => true,'show_in_menu' => true,'menu_icon'=> 				'dashicons-portfolio','capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => 'libraries'),'query_var' => true,'supports' => array('title','thumbnail','editor','excerpt','page-attributes','tags'),'has_archive' => true, 'labels' => array (
				'name' => 'Documents',
				'singular_name' => 'Documents',
				'menu_name' => 'Documents',
				'add_new' => 'Add Document',
				'add_new_item' => 'Add New Document',
				'edit' => 'Edit',
				'edit_item' => 'Edit Document',
				'new_item' => 'New Document',
				'view' => 'View Document',
				'view_item' => 'View Document',
				'search_items' => 'Search Document',
				'not_found' => 'No Document Found',
				'not_found_in_trash' => 'No Document Found in Trash',
				'parent' => 'Parent Document',
			),) );
			register_taxonomy('library_tags', 'cpt-library', array(
				'hierarchical' => false, 
				'label' => "Tags", 
				'singular_name' => "Tag", 
				'rewrite' => array('slug' => 'document-library-tag','hierarchical' => 'true','with_front' => false), 
				'query_var' => true
				)
			);
			$library_cat_labels = array(
				'name'                => _x( 'Categories', 'taxonomy general name' ),
				'singular_name'       => _x( 'Category', 'taxonomy singular name' ),
				'search_items'        => __( 'Search Category' ),
				'all_items'           => __( 'All Category' ),
				'parent_item'         => __( 'Parent Category' ),
				'parent_item_colon'   => __( 'Parent Category:' ),
				'edit_item'           => __( 'Edit Category' ), 
				'update_item'         => __( 'Update Category' ),
				'add_new_item'        => __( 'Add New Category' ),
				'new_item_name'       => __( 'New Category Name' ),
				'menu_name'           => __( 'Categories' ),
                                'taxonomies' => array('library_tags')
			  );
			
		   $library_cat_args = array('hierarchical' => true,'show_ui' => true,'query_var' => true,'menu_icon'=>'dashicons-info','rewrite' => array('slug' => 'libraries-category'),'labels' => $library_cat_labels);
		   
		   register_taxonomy('library-cat','cpt-library', $library_cat_args);
	}
	add_action( 'init', 'register_cus_post_types' );
	function my_et_builder_post_types( $post_types ){
            $post_types[] ="cpt-community";
			$post_types[] ="cpt-library";
           return $post_types;
        }
  add_filter('et_builder_post_types','my_et_builder_post_types');
   function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
   }
   // Event Title
   add_filter('tribe_get_events_title', 'my_get_events_title');
/* ################################*/
function gform_column_splits($content, $field, $value, $lead_id, $form_id) {
if(!is_admin()) { // only perform on the front end
    if($field['type'] == 'section') {
        $form = RGFormsModel::get_form_meta($form_id, true);

        // check for the presence of multi-column form classes
        $form_class = explode(' ', $form['cssClass']);
        $form_class_matches = array_intersect($form_class, array('two-column', 'three-column'));

        // check for the presence of section break column classes
        $field_class = explode(' ', $field['cssClass']);
        $field_class_matches = array_intersect($field_class, array('gform_column'));

        // if field is a column break in a multi-column form, perform the list split
        if(!empty($form_class_matches) && !empty($field_class_matches)) { // make sure to target only multi-column forms

            // retrieve the form's field list classes for consistency
            $form = RGFormsModel::add_default_properties($form);
            $description_class = rgar($form, 'descriptionPlacement') == 'above' ? 'description_above' : 'description_below';

            // close current field's li and ul and begin a new list with the same form field list classes
            return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty">';

        }
    }
}

return $content;
}

add_filter('gform_field_content', 'gform_column_splits', 100, 5);
/* #################################*/

/* Include the shorcodes */ 
include_once ('inc/short_codes.php');
/*Incude Some hooks and functions */
include_once ('inc/additional-functions.php');

function wpse10691_alter_query( $query ){

    if ( $query->is_home() ||  $query->is_category() ||  $query->is_tag() ){
        //$query->set(array('caller_get_posts'=>'DESC','modified' => 'DESC'));
        $query->set( 'orderby', 'modified' );
        $query->set( 'order', 'desc' );
   
	}
  
}
//add_action( 'pre_get_posts', 'wpse10691_alter_query' );



function expand_all_checkbox($param) {
$section_no = $param['section_no'];
$output ='';
$output.='<div class="et_pb_module et_pb_toggle et_pb_accordion_item_'.$section_no.' et_pb_toggle_close">
<h5  class="et_pb_toggle_title sub" data="'.$section_no.'"><span style="color: #4ebcf9;">More Posts...</span></h5>';
$output.= '<div class="all_collapse_expand all_custom_collapse_expand_'.$section_no.'" ><input class="open_all" id="myonoffswitch_'.$section_no.'"  type="checkbox"  data="'.$section_no.'" value="'.$section_no.'">
<label class="onoffswitch-label" for="myonoffswitch_'.$section_no.'">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
</div>
<style>
.all_collapse_expand {
    position: relative; width: 137px;margin-top:15px ! important;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.open_all {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999 ! important; border-radius: 25px ! important;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100% ! important;
    transition: margin 0.3s ease-in 0s ! important;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 28px; padding: 0; line-height: 28px;
    font-size: 12px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "COLLAPSE ALL";
    padding-left: 10px;
    background-color: #4ebcf9 ! important;
    color: #ffffff;
    font-size: 11px;
    text-indent: 7px;
}
.onoffswitch-inner:after {
    content: "EXPAND ALL";
    padding-right: 10px;   
    background-color: #4ebcf9 ! important; color: #FFFFFF;
    text-align: left;
    text-indent: 43px;
    font-size: 11px;
}
.onoffswitch-switch {
    display: block; width: 11px; margin: 8px ! important;
    background: #FFFFFF ! important;
    position: absolute; top: 3px ! important; bottom: 3px ! important;
    right: 90px;
    border: 2px solid #999999; border-radius: 25px ! important;
    transition: all 0.3s ease-in 0s; 
}
.open_all:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0 ! important;
}
.open_all:checked + .onoffswitch-label .onoffswitch-switch {
    right: 9px; 
}
</style>
'; 
	
return $output;

}

add_shortcode('expand_all_checkbox', 'expand_all_checkbox');


function expand_all_checkbox_newer($attr) {
$button_no = $attr['button_no'];

$output = '<div class="all_collapse_expand_newer" ><input class="open_all_newer"  type="checkbox" id="myonoffswitch-'.$button_no.'">
<label class="onoffswitch-label" for="myonoffswitch-'.$button_no.'">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
<style>
.all_collapse_expand_newer {
    position: relative; width: 137px;margin-top:15px ! important;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.open_all_newer{
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999 ! important; border-radius: 25px ! important;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100% ! important;
    transition: margin 0.3s ease-in 0s ! important;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 28px; padding: 0; line-height: 28px;
    font-size: 12px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "COLLAPSE ALL";
    padding-left: 10px;
    background-color: #4ebcf9 ! important;
    color: #ffffff;
    font-size: 11px;
    text-indent: 7px;
}
.onoffswitch-inner:after {
    content: "EXPAND ALL";
    padding-right: 10px;   
	background-color: #4ebcf9 ! important; color: #FFFFFF;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 11px; margin: 8px ! important;
    background: #FFFFFF ! important;
    position: absolute; top: 3px ! important; bottom: 3px ! important;
    right: 100px;
    border: 2px solid #999999; border-radius: 25px ! important;
    transition: all 0.3s ease-in 0s; 
}
.open_all_newer:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0 ! important;
}
.open_all_newer:checked + .onoffswitch-label .onoffswitch-switch {
    right: 9px; 
}
</style>
'; 
	
return $output;

}

add_shortcode('expand_all_checkbox_newer', 'expand_all_checkbox_newer');



function post_orderby_modified($atts){
ob_start();
	 $category_id = $atts['cat'];
$limit_no=$atts['limits']+2;

	 
	  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $sticky=get_option('sticky_posts');

	$argue = array(
        'post__in' => $sticky,
        'cat'=>$category_id,
        'paged'=>$paged ); 
	
     query_posts($argue);
	  ?>
      <?php $html_string = ""; ?>
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
            <!--$i = 0-->
            <?php $j=0;  ?>
			<?php while ( have_posts() ) : the_post(); ?>
                            <?php  $j++;  ?>
				<?php


					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php //get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
  <?php  
  
?>

<?php 
   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
   $sticky=get_option('sticky_posts');
	$argue = array(
        'post__not_in' => $sticky,
        'cat'=>$category_id,
        'paged'=>$paged,
        'posts_per_page' => $limit_no,
        'orderby' => 'modified',
        'order' => 'DESC'


         ); 

	
     query_posts($argue);
	  ?>
      
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php $i=0;  ?>
			<?php while ( have_posts() ) : the_post(); ?>
                         
                          <?php  $i++;  ?>
				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					 if($i<3){
					get_template_part( 'template-parts/content', get_post_format() );
					}else{
					
				?>
				<?php if($i==3){ ?>
				<div class="et_pb_module et_pb_toggle et_pb_accordion_item_1 et_pb_toggle_close">
<h5 id="new_post_block" class="et_pb_toggle_title"><span style="color: #4ebcf9;">More Posts…</span></h5>
<?php echo expand_all_checkbox_newer('2'); ?>


</div>
<?php } ?>
                     <div class="et_pb_module et_pb_accordion  et_pb_accordion_newer" style="display:none">
				
<p>
</p><div class="et_pb_module et_pb_toggle  et_pb_accordion_item_100<?php echo $i; ?> et_pb_toggle_close">

<h5 class="et_pb_toggle_title"><?php echo the_title(); ?></h5>
				<div class="et_pb_toggle_content clearfix">
					
<ul>
<li><?php echo the_content(); ?></li>
</ul>

				</div> <!-- .et_pb_toggle_content -->
				
			</div> 
			</div>

                <?php } ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php //get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; 
		wp_reset_query();
	return ob_get_clean();
  
  }
 add_shortcode('sticky_post_orderby_modified', 'post_orderby_modified'); 
  
 function template_chooser($template)   
{    
	 global $wp_query;   
	 $post_type = get_query_var('post_type');   
	 $cat = get_query_var('cat');   
	 if( isset($_GET['s']) && $post_type == 'cpt-library' && $cat == ""  )   
	 {
		return locate_template('library-search.php'); 
	 }
	 elseif (isset($_GET['s']) && $post_type == 'cpt-library' && $cat != "")
	 {
		return locate_template('library-video-search.php'); 
	 }   
	 return $template;   
}
add_filter('template_include', 'template_chooser'); 