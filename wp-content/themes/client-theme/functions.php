<?php

add_action('admin_head', 'my_custom_css');

function my_custom_css()
{
    echo '<style>
  #message { display: none; }
  </style>';
}

// Enqueue Child Theme Sheet
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('FontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
    wp_enqueue_style('Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i');
    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i');
    wp_enqueue_script('mwraScript', get_stylesheet_directory_uri() . '/js/script.js', ['jquery'], null, true);
}

function mwra_enqueue_scripts() {
}

register_sidebar(array(
    'name' => __('Top Header', 'twentyfourteen'),
    'id' => 'top-header',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));
register_sidebar(array(
    'name' => __('Home Newsletter', 'twentyfourteen'),
    'id' => 'home-newsletter',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));
register_sidebar(array(
    'name' => __('Home Blog', 'twentyfourteen'),
    'id' => 'home-blog',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));
register_sidebar(array(
    'name' => __('Footer Menu', 'twentyfourteen'),
    'id' => 'footer-menu',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));
register_sidebar(array(
    'name' => __('Footer Copyright', 'twentyfourteen'),
    'id' => 'footer-copyright',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));
register_sidebar(array(
    'name' => __('Header Slider Search', 'twentyfourteen'),
    'id' => 'header-slider-search',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));
register_sidebar(array(
    'name' => __('Home Recent Blog', 'twentyfourteen'),
    'id' => 'home-recent-blog',
    'description' => __('Additional sidebar that appears on the right.', 'twentyfourteen'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));

function replace_search_placeholder_text()
{ ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#search-3 input[type="search"]').attr('placeholder', 'What can we help you find?');
        });
    </script>
<?php }

add_action('wp_footer', 'replace_search_placeholder_text');

//custom post types

function register_cus_post_types()
{
    // CPT Slders
    /*
     * Wordpress Admin icons - https://developer.wordpress.org/resource/dashicons/#download
     * */
    register_post_type('cpt-community', array('label' => 'Community', 'description' => 'Community', 'public' => true, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-groups', 'capability_type' => 'post', 'hierarchical' => false, 'rewrite' => array('slug' => 'community'), 'query_var' => true, 'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'), 'labels' => array(
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
    ),));

    register_taxonomy('community', 'cpt-community', array(
            'hierarchical' => true,
            'label' => "Services",
            'singular_name' => "Service",
            'rewrite' => true,
            'query_var' => true
        )
    );


    register_post_type('cpt-library', array('label' => 'Library', 'description' => 'Library', 'public' => true, 'show_ui' => true, 'show_in_menu' => true, 'menu_icon' => 'dashicons-portfolio', 'capability_type' => 'post', 'hierarchical' => false, 'rewrite' => array('slug' => 'libraries'), 'query_var' => true, 'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes', 'tags'), 'has_archive' => true, 'labels' => array(
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
    ),));
    register_taxonomy('library_tags', 'cpt-library', array(
            'hierarchical' => false,
            'label' => "Tags",
            'singular_name' => "Tag",
            'rewrite' => array('slug' => 'document-library-tag', 'hierarchical' => 'true', 'with_front' => false),
            'query_var' => true
        )
    );
    $library_cat_labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Category'),
        'all_items' => __('All Category'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
        'taxonomies' => array('library_tags')
    );

    $library_cat_args = array('hierarchical' => true, 'show_ui' => true, 'query_var' => true, 'menu_icon' => 'dashicons-info', 'rewrite' => array('slug' => 'libraries-category'), 'labels' => $library_cat_labels);

    register_taxonomy('library-cat', 'cpt-library', $library_cat_args);
}

add_action('init', 'register_cus_post_types');
function my_et_builder_post_types($post_types)
{
    $post_types[] = "cpt-community";
    $post_types[] = "cpt-library";
    return $post_types;
}

add_filter('et_builder_post_types', 'my_et_builder_post_types');
function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Event Title
//add_filter('tribe_get_events_title', 'my_get_events_title');

/* add_filter('get_search_form', 'my_search_for');
  function my_search_form($html) {
   $html = '<input type="hidden" value="cpt-library" name="post_type">';
   return $html;
  }*/

add_filter('gform_register_init_scripts', 'gform_my_function');
function gform_my_function($form)
{

    $script = '(function($){' .
        'jQuery("#field_38_64").keyup(function(){
           var intRegex = /^\d+$/;
           
           var percent_input = jQuery("#field_38_64").val();
           alert(percent_input);
         /* var percent_input = jQuery("#field_38_64").val();
          if(intRegex.test(percent_input)) {
            
          }
          else{
             alert("Enter Only Numeric Value.");   
           }*/
         });' .
        '})(jQuery);';

    GFFormDisplay::add_init_script($form['id'], 'gform_my_function', GFFormDisplay::ON_PAGE_RENDER, $script);
    return $form;
}

/* ################################*/
function gform_column_splits($content, $field, $value, $lead_id, $form_id)
{
    if (!is_admin()) { // only perform on the front end
        if ($field['type'] == 'section') {
            $form = RGFormsModel::get_form_meta($form_id, true);

            // check for the presence of multi-column form classes
            $form_class = explode(' ', $form['cssClass']);
            $form_class_matches = array_intersect($form_class, array('two-column', 'three-column'));

            // check for the presence of section break column classes
            $field_class = explode(' ', $field['cssClass']);
            $field_class_matches = array_intersect($field_class, array('gform_column'));

            // if field is a column break in a multi-column form, perform the list split
            if (!empty($form_class_matches) && !empty($field_class_matches)) { // make sure to target only multi-column forms

                // retrieve the form's field list classes for consistency
                $form = RGFormsModel::add_default_properties($form);
                $description_class = rgar($form, 'descriptionPlacement') == 'above' ? 'description_above' : 'description_below';

                // close current field's li and ul and begin a new list with the same form field list classes
                return '</li></ul><ul class="gform_fields ' . $form['labelPlacement'] . ' ' . $description_class . ' ' . $field['cssClass'] . '"><li class="gfield gsection empty">';

            }
        }
    }

    return $content;
}

add_filter('gform_field_content', 'gform_column_splits', 100, 5);


/* #################################*/

/* Include the shorcodes */
include_once('inc/short_codes.php');
/*Incude Some hooks and functions */
include_once('inc/additional-functions.php');

function wpse10691_alter_query($query)
{

    if ($query->is_home() || $query->is_category() || $query->is_tag()) {
        //$query->set(array('caller_get_posts'=>'DESC','modified' => 'DESC'));

        // $query->set( 'orderby', 'post_date' );
        //$query->set( 'orderby', 'modified' );


        //$query->set( 'order', 'desc' );

    }

}

//add_action( 'pre_get_posts', 'wpse10691_alter_query' );


function expand_all_checkbox($param)
{
    $section_no = $param['section_no'];
    $label_text = $param['label'];
    if ($label_text == "") {
        $label_text = "More...";
    }
    $output = '';
    $output .= '<div class="et_pb_module et_pb_toggle et_pb_accordion_item_' . $section_no . ' et_pb_toggle_close">
<h5  class="et_pb_toggle_title sub" data="' . $section_no . '"><span style="color: #4ebcf9;">' . $label_text . '</span></h5>';
    $output .= '<div class="all_collapse_expand all_custom_collapse_expand_' . $section_no . '" ><input class="open_all" id="myonoffswitch_' . $section_no . '"  type="checkbox"  data="' . $section_no . '" value="' . $section_no . '">
<label class="onoffswitch-label" for="myonoffswitch_' . $section_no . '">
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


function expand_all_checkbox_newer($attr)
{
    $button_no = $attr['button_no'];

    $output = '<div class="all_collapse_expand_newer" ><input class="open_all_newer"  type="checkbox" id="myonoffswitch-' . $button_no . '">
<label class="onoffswitch-label" for="myonoffswitch-' . $button_no . '">
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


function post_orderby_modified($atts)
{
    ob_start();
    $category_id = $atts['cat'];
    $limit_no = $atts['limits'] + 2;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $sticky = get_option('sticky_posts');

    $argue_sticky_post = array(
        'post__in' => $sticky,
        'cat' => $category_id,
        'paged' => $paged);

    query_posts($argue_sticky_post);

    ?>
    <?php $html_string = ""; ?>
    <?php if (have_posts()) : ?>

    <?php if (is_home() && !is_front_page()) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <?php /* Start the Loop */ ?>
    <!--$i = 0-->
    <?php $j = 0; ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php $j++; ?>
        <?php


        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        if (is_sticky()) {
            get_template_part('template-parts/content', get_post_format());
        }
        ?>

    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

<?php else : ?>

    <?php //get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>
    <?php
    wp_reset_query();
    ?>

    <?php
    if (isset($_REQUEST['page_no']) && $_REQUEST['page_no'] == "show_all") {
        $show_limit = "all";
    }
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $sticky = get_option('sticky_posts');
    $argue_non_sticky_post = array(
        'post__not_in' => $sticky,
        'cat' => $category_id,
        'paged' => $paged,
        //'posts_per_page' => $limit_no,
        'orderby' => 'modified',
        'order' => 'DESC'


    );

    query_posts($argue_non_sticky_post);
    ?>

    <?php if (have_posts()) : ?>

    <?php if (is_home() && !is_front_page()) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <?php /* Start the Loop */ ?>
    <?php $i = 0; ?>
    <?php while (have_posts()) : the_post(); ?>
        <div style="margin-bottom:20px;">
            <?php $i++; ?>
            <?php

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            if (!is_sticky()) {

                if ($show_limit == "all") {

                    get_template_part('template-parts/content', get_post_format());
                } else {
                    if ($i < 3) {
                        get_template_part('template-parts/content', get_post_format());
                    } else {
                        /*

                    ?>
                    <?php if($i==3){ ?>
                    <div class="et_pb_module et_pb_toggle et_pb_accordion_item_1 et_pb_toggle_close">
                    <h5 id="new_post_block" class="et_pb_toggle_title"><span style="color: #4ebcf9;">More Posts…</span></h5>
                    <?php echo expand_all_checkbox_newer('2'); ?>
                                   </div>
                                  <?php } ?>
                         <div class="et_pb_module et_pb_accordion  et_pb_accordion_newer" style="display:none">
                          <p></p>
                        <div class="et_pb_module et_pb_toggle  et_pb_accordion_item_100<?php echo $i; ?> et_pb_toggle_close">
                        <h5 class="et_pb_toggle_title"><?php echo the_title(); ?></h5>
                <div class="et_pb_toggle_content clearfix">
                    <ul>
                    <li><?php echo the_content(); ?></li>
                    </ul>

              </div> <!-- .et_pb_toggle_content -->
             </div>
             </div>

                    <?php
                    */
                    }
                }
            } ?>
        </div>
    <?php endwhile; ?>
    <?php
    $navarg = array(
        'prev_text' => __('All Recent Posts'),
        'next_text' => __('Newer posts'),
        'screen_reader_text' => __('Posts navigation'),
    );
    ?>
    <?php //the_posts_navigation($navarg);
    $parts = explode("/", $_SERVER['REQUEST_URI']);
    $post_slug = $parts[1];
    $url = site_url() . '/' . $post_slug;
    ?>
    <?php if ($show_limit == "all") { ?>
        <nav class="navigation posts-navigation" role="navigation">
            <h2 class="screen-reader-text">Posts navigation</h2>
            <div class="nav-links">
                <div class="nav-next"><a href="<?php echo $url; ?>">Newer posts</a></div>
            </div>

        </nav>

    <?php } else { ?>

        <nav class="navigation posts-navigation" role="navigation">
            <h2 class="screen-reader-text">Posts navigation</h2>
            <div class="nav-links">
                <div class="nav-previous"><a href="<?php echo $url; ?>?page_no=show_all">All Recent Posts</a></div>
            </div>

        </nav>

    <?php } ?>


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
    if (isset($_GET['s']) && $post_type == 'cpt-library' && $cat == "") {
        return locate_template('library-search.php');
    } elseif (isset($_GET['s']) && $post_type == 'cpt-library' && $cat != "") {
        return locate_template('library-video-search.php');
    }
    return $template;
}

add_filter('template_include', 'template_chooser');


/* New Update 10 Sep 2016 */
function show_community_user_list($atts)
{
    ob_start();
    global $wpdb, $wp_query, $current_user;
    $name = $wp_query->query['name'];

    $name1 = str_replace("-", " ", $wp_query->query['name']);
    $type = strtolower($atts['type']);


    switch ($type) {
        case 'services':

            /*OLD
            $query = "SELECT (SELECT VALUE FROM ".$wpdb->prefix."cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=13) as community_designation FROM ".$wpdb->prefix."cimy_uef_data as cud JOIN ".$wpdb->prefix."users as u ON u.ID=cud.USER_ID WHERE FIND_IN_SET('".$name."',LCASE(cud.VALUE)) and cud.USER_ID IN(SELECT USER_ID FROM ".$wpdb->prefix."cimy_uef_data WHERE VALUE='Designees') GROUP BY u.ID ";*/

            /*OLD 2
            $query = "SELECT (SELECT VALUE FROM ".$wpdb->prefix."cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=13) as community_designation FROM ".$wpdb->prefix."cimy_uef_data as cud JOIN ".$wpdb->prefix."users as u ON u.ID=cud.USER_ID WHERE cud.FIELD_ID='3' AND FIND_IN_SET('".$name."',LCASE(cud.VALUE)) GROUP BY u.ID ";*/

            $query = "SELECT t.name as community_designation FROM " . $wpdb->prefix . "posts as p 
			JOIN " . $wpdb->prefix . "term_relationships as tr ON tr.object_id=p.ID  
			JOIN " . $wpdb->prefix . "term_taxonomy as tt ON tt.term_taxonomy_id=tr.term_taxonomy_id and (tt.taxonomy='community')
			JOIN " . $wpdb->prefix . "terms as t ON t.term_id=tt.term_id
			WHERE (LCASE(p.post_title)='" . $name . "' OR LCASE(p.post_title)='" . $name1 . "') and p.post_type='cpt-community' ";
            $result = $wpdb->get_results($query);

            $cdesig = array();
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $temp_c = explode(",", $row->community_designation);
                    foreach ($temp_c as $tv) {
                        if ($tv != "") {
                            $cdesig[] = trim($tv);
                        }
                    }
                }
            }
            $cdesig = array_unique($cdesig);
            ?>
            <p><h6 style="text-align: center;"><?php echo implode("/", $cdesig); ?></h6></p>
            <?php

            break;

        case 'ceo':

            //$query = "SELECT CONCAT((SELECT meta_value FROM ".$wpdb->prefix."usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM ".$wpdb->prefix."usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name FROM ".$wpdb->prefix."cimy_uef_data as cud JOIN ".$wpdb->prefix."users as u ON u.ID=cud.USER_ID WHERE cud.FIELD_ID=3 and (FIND_IN_SET('".$name."',LCASE(cud.VALUE)) OR FIND_IN_SET('".$name1."',LCASE(cud.VALUE))) and cud.USER_ID IN(SELECT USER_ID FROM ".$wpdb->prefix."cimy_uef_data WHERE FIELD_ID=12 AND VALUE='CEO') GROUP BY u.ID ";
            $query = "SELECT CONCAT((SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name FROM " . $wpdb->prefix . "cimy_uef_data as cud JOIN " . $wpdb->prefix . "users as u ON u.ID=cud.USER_ID WHERE (cud.FIELD_ID=15   and (FIND_IN_SET('" . $name . "',LCASE(cud.VALUE)) OR FIND_IN_SET('" . $name1 . "',LCASE(cud.VALUE))))   and cud.USER_ID IN(SELECT USER_ID FROM " . $wpdb->prefix . "cimy_uef_data WHERE FIELD_ID=12 AND VALUE='CEO') GROUP BY u.ID ";
            $result = $wpdb->get_results($query);

            if (count($result) > 0) {
                foreach ($result as $row) {
                    ?>
                    <p><?php echo $row->name ?></p>
                    <?php
                }
            }

            break;

        case 'designee':

            //$query = "SELECT CONCAT((SELECT meta_value FROM ".$wpdb->prefix."usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM ".$wpdb->prefix."usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name FROM ".$wpdb->prefix."cimy_uef_data as cud JOIN ".$wpdb->prefix."users as u ON u.ID=cud.USER_ID WHERE ((cud.FIELD_ID=15   and (FIND_IN_SET('".$name."',LCASE(cud.VALUE)) OR FIND_IN_SET('".$name1."',LCASE(cud.VALUE)))) or (cud.FIELD_ID=3   and (FIND_IN_SET('".$name."',LCASE(cud.VALUE)) OR FIND_IN_SET('".$name1."',LCASE(cud.VALUE)))) ) and cud.USER_ID IN(SELECT USER_ID FROM ".$wpdb->prefix."cimy_uef_data WHERE FIELD_ID=12 AND VALUE='Designees') GROUP BY u.ID ";
            $query = "SELECT CONCAT((SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name FROM " . $wpdb->prefix . "cimy_uef_data as cud JOIN " . $wpdb->prefix . "users as u ON u.ID=cud.USER_ID WHERE ((cud.FIELD_ID=15   and (FIND_IN_SET('" . $name . "',LCASE(cud.VALUE)) OR FIND_IN_SET('" . $name1 . "',LCASE(cud.VALUE)))) or (cud.FIELD_ID=3   and (FIND_IN_SET('" . $name . "',LCASE(cud.VALUE)) OR FIND_IN_SET('" . $name1 . "',LCASE(cud.VALUE)))) ) and cud.USER_ID IN(SELECT USER_ID FROM " . $wpdb->prefix . "cimy_uef_data WHERE FIELD_ID=12 AND VALUE='Designees') GROUP BY u.ID ";
            $result = $wpdb->get_results($query);


            if (count($result) > 0) {
                foreach ($result as $row) {
                    ?>
                    <p><?php echo $row->name ?></p>
                    <?php
                }
            }


            break;

        case 'legislators':

            $query = "SELECT (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=1) as job_title , u.user_url, CONCAT((SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name FROM " . $wpdb->prefix . "cimy_uef_data as cud JOIN " . $wpdb->prefix . "users as u ON u.ID=cud.USER_ID WHERE cud.FIELD_ID=15 and (FIND_IN_SET('" . $name . "',LCASE(cud.VALUE)) OR FIND_IN_SET('" . $name1 . "',LCASE(cud.VALUE))) and cud.USER_ID IN(SELECT USER_ID FROM " . $wpdb->prefix . "cimy_uef_data WHERE FIELD_ID=12 AND VALUE='Legislators') GROUP BY u.ID ";
            $result = $wpdb->get_results($query);

            if (count($result) > 0) {
                foreach ($result as $row) {

                    if ($row->user_url != "") {
                        ?>
                        <p><?php echo $row->job_title ?> <a href="<?php echo $row->user_url; ?>"
                                                            target="_blank"><?php echo $row->name ?></a></p>
                        <?php
                    } else {
                        ?>
                        <p><?php echo $row->job_title ?><?php echo $row->name ?></p>
                        <?php
                    }
                }
            }

            break;
    }

    return ob_get_clean();
}

add_shortcode('communityuserlist', 'show_community_user_list');

/* New Update 13 Sep 2016 */
function show_executive_committee_table($atts)
{
    ob_start();
    global $wpdb, $wp_query, $current_user;
    $type = strtolower($atts['type']);
    $theme = wp_get_theme();

    ?>
    <style>
        .executive-committee-table table {
            width: auto;
            margin: 0px;
            padding: 0px;
        }

        .executive-committee-table table tr td {
            border: none !important;
            padding: 0px !important;
            margin: 0px;
        }

        .executive-committee-table table tr td img {
            padding: 2px !important;
        }

        .fancybox_content {
            font-weight: normal;
            min-width: 600px;
            padding-bottom: 10px;
        }

        .fancybox_content img {
            float: left;
            margin: 0px 20px 20px 0px;
        }

        .fancybox_content h6 {
            clear: none;
            padding-bottom: 0px;
        }

        .fancybox_content span.position {
            text-transform: uppercase;
            color: #939597;
        }
    </style>


    <?php

    switch ($type) {
        case 'officers':

            $query = "SELECT CONCAT((SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name, (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='cupp_upload_meta' LIMIT 1) as profile_upload_photo,(SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='cupp_meta' LIMIT 1) as profile_photo, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=3) as community, cud.VALUE as position, user_email, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=7) as fax, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=2) as address, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=6) as work_phone, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=8) as cell_phone, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=9) as home_phone, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=17) as bio FROM " . $wpdb->prefix . "cimy_uef_data as cud JOIN " . $wpdb->prefix . "users as u ON u.ID=cud.USER_ID WHERE cud.VALUE!='Member at Large' and cud.VALUE!='' and cud.FIELD_ID='16' GROUP BY u.ID ORDER BY FIELD(LCASE(position),'chair','vice-chair of operations','vice-chair of finance','treasurer','secretary') ASC ";
            $result = $wpdb->get_results($query);
            ?>
            <table class="executive-committee-table" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr class="table-tit">
                    <td><b>Name</b></td>
                    <td><b>Community</b></td>
                    <td><b>Position</b></td>
                </tr>

                <?php
                if (count($result) > 0) {
                    $r = 1;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td valign="middle">
                                <table>
                                    <tr>
                                        <td valign="middle">
                                            <a class="fancybox-inline" href="#officer<?php echo $r; ?>">
                                                <?php
                                                $profile_photo = '';
                                                if ($row->profile_upload_photo != '' || $row->profile_photo != '') {
                                                    $profile_photo = $row->profile_upload_photo != "" ? $row->profile_upload_photo : $row->profile_photo;
                                                }

                                                if ($profile_photo != '') { ?>
                                                    <img src="<?php echo $profile_photo; ?>" width="50"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimage.png"
                                                         width="50"/>
                                                <?php } ?>
                                            </a>
                                        </td>
                                        <td valign="middle">&nbsp; <a class="fancybox-inline"
                                                                      href="#officer<?php echo $r; ?>"><?php echo $row->name; ?></a>

                                            <div style="display:none" class="fancybox-hidden">
                                                <div id="officer<?php echo $r; ?>"
                                                     style="overflow-x: auto;overflow-y: auto;">
                                                    <div class="fancybox_content">

                                                        <?php if ($profile_photo != '') { ?>
                                                            <img class="fancyimg" src="<?php echo $profile_photo; ?>"/>
                                                        <?php } else { ?>
                                                            <img class="fancyimg"
                                                                 src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimage.png"/>
                                                        <?php } ?>

                                                        <p>
                                                        <h6><?php echo $row->name; ?></h6>
                                                        <span class="position"><?php echo $row->position; ?>, <?php echo $row->community; ?></span><br/><br/>
                                                        +
                                                        <?php echo $row->bio; ?>

                                                        <!--<b>Email:</b> <a href="mailto:<?php echo $row->user_email; ?>"><?php echo $row->user_email; ?></a><br  />-->
                                                        <?php
                                                        /*$phone = array();
                                                        if($row->work_phone!='' || $row->cell_phone!='' || $row->home_phone!='')
                                                        {
                                                            if($row->work_phone!="")
                                                            {
                                                                $temp_phone = explode("-",$row->work_phone); $work_phone = "(".$temp_phone[0].")"; foreach($temp_phone as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ $work_phone.='-'; } $work_phone.=$tf; }
                                                                $phone[] = $work_phone;
                                                            }

                                                            if($row->cell_phone!="")
                                                            {
                                                                if(count($phone)<=0)
                                                                {
                                                                    $temp_phone = explode("-",$row->cell_phone); $cell_phone = "(".$temp_phone[0].")"; foreach($temp_phone as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ $cell_phone.='-'; } $cell_phone.=$tf; }
                                                                    $phone[] = $cell_phone;
                                                                }
                                                            }

                                                            if($row->home_phone!="")
                                                            {
                                                                if(count($phone)<=0)
                                                                {
                                                                    $temp_phone = explode("-",$row->home_phone); $home_phone = "(".$temp_phone[0].")"; foreach($temp_phone as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ $home_phone.='-'; } $home_phone.=$tf; }
                                                                    $phone[] = $home_phone;
                                                                }
                                                            }
                                                            ?>
                                                            <b>Phone:</b> <?php echo implode(", ",$phone); ?>
                                                            <br  />
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if($row->fax!='')
                                                        {
                                                            ?>
                                                            <b>Fax:</b> <?php $temp_fax = explode("-",$row->fax); echo "(".$temp_fax[0].")"; foreach($temp_fax as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ echo '-'; } echo $tf; } ?>
                                                            <br  />
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if($row->address!='')
                                                        {
                                                            ?>
                                                            <b>Address:</b> <?php echo $row->address;?>
                                                            <br  />
                                                            <?php
                                                        }*/
                                                        ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td><?php echo $row->community; ?></td>
                            <td><?php echo $row->position; ?></td>
                        </tr>
                        <?php
                        $r++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="3" align="center">No Record Found!</td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>

            <?php

            break;

        case 'member at large':

            $query = "SELECT CONCAT((SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name, (SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='cupp_upload_meta' LIMIT 1) as profile_upload_photo,(SELECT meta_value FROM " . $wpdb->prefix . "usermeta WHERE user_id=u.ID and meta_key='cupp_meta' LIMIT 1) as profile_photo, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=3) as community, cud.VALUE as position, user_email, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=7) as fax, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=2) as address, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=6) as work_phone, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=8) as cell_phone, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=9) as home_phone, (SELECT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE USER_ID=u.ID and FIELD_ID=17) as bio FROM " . $wpdb->prefix . "cimy_uef_data as cud JOIN " . $wpdb->prefix . "users as u ON u.ID=cud.USER_ID WHERE LCASE(cud.VALUE)='member at large' and cud.VALUE!='' and cud.FIELD_ID='16' GROUP BY u.ID ORDER BY community ASC ";
            $result = $wpdb->get_results($query);
            ?>
            <table class="executive-committee-table" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr class="table-tit">
                    <td><b>Name</b></td>
                    <td><b>Community</b></td>
                </tr>

                <?php
                if (count($result) > 0) {
                    $r = 0;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td valign="middle">
                                <table>
                                    <tr>
                                        <td valign="middle">
                                            <a class="fancybox-inline" href="#member_at_large<?php echo $r; ?>">
                                                <?php
                                                $profile_photo = '';
                                                if ($row->profile_upload_photo != '' || $row->profile_photo != '') {
                                                    $profile_photo = $row->profile_upload_photo != "" ? $row->profile_upload_photo : $row->profile_photo;
                                                }

                                                if ($profile_photo != '') { ?>
                                                    <img src="<?php echo $profile_photo; ?>" width="50"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimage.png"
                                                         width="50"/>
                                                <?php } ?>
                                            </a>
                                        </td>
                                        <td valign="middle">&nbsp; <a class="fancybox-inline"
                                                                      href="#member_at_large<?php echo $r; ?>"><?php echo $row->name; ?></a>

                                            <div style="display:none" class="fancybox-hidden">
                                                <div id="member_at_large<?php echo $r; ?>"
                                                     style="overflow-x: auto;overflow-y: auto;">
                                                    <div class="fancybox_content">

                                                        <?php if ($profile_photo != '') { ?>
                                                            <img class="fancyimg" src="<?php echo $profile_photo; ?>"/>
                                                        <?php } else { ?>
                                                            <img class="fancyimg"
                                                                 src="<?php echo get_stylesheet_directory_uri(); ?>/images/noimage.png"/>
                                                        <?php } ?>

                                                        <p>
                                                        <h6><?php echo $row->name; ?></h6>
                                                        <span class="position"><?php echo $row->position; ?>, <?php echo $row->community; ?></span><br/><br/>
                                                        <?php echo $row->bio; ?>

                                                        <!--<b>Email:</b> <a href="mailto:<?php echo $row->user_email; ?>"><?php echo $row->user_email; ?></a><br  />-->
                                                        <?php
                                                        /*$phone = array();
                                                        if($row->work_phone!='' || $row->cell_phone!='' || $row->home_phone!='')
                                                        {
                                                            if($row->work_phone!="")
                                                            {
                                                                $temp_phone = explode("-",$row->work_phone); $work_phone = "(".$temp_phone[0].")"; foreach($temp_phone as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ $work_phone.='-'; } $work_phone.=$tf; }
                                                                $phone[] = $work_phone;
                                                            }

                                                            if($row->cell_phone!="")
                                                            {
                                                                if(count($phone)<=0)
                                                                {
                                                                    $temp_phone = explode("-",$row->cell_phone); $cell_phone = "(".$temp_phone[0].")"; foreach($temp_phone as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ $cell_phone.='-'; } $cell_phone.=$tf; }
                                                                    $phone[] = $cell_phone;
                                                                }
                                                            }

                                                            if($row->home_phone!="")
                                                            {
                                                                if(count($phone)<=0)
                                                                {
                                                                    $temp_phone = explode("-",$row->home_phone); $home_phone = "(".$temp_phone[0].")"; foreach($temp_phone as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ $home_phone.='-'; } $home_phone.=$tf; }
                                                                    $phone[] = $home_phone;
                                                                }
                                                            }
                                                            ?>
                                                            <b>Phone:</b> <?php echo implode(", ",$phone); ?>
                                                            <br  />
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if($row->fax!='')
                                                        {
                                                            ?>
                                                            <b>Fax:</b> <?php $temp_fax = explode("-",$row->fax); echo "(".$temp_fax[0].")"; foreach($temp_fax as $tk=>$tf){ if($tk==0){ continue; } if($tk>1){ echo '-'; } echo $tf; } ?>
                                                            <br  />
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if($row->address!='')
                                                        {
                                                            ?>
                                                            <b>Address:</b> <?php echo $row->address;?>
                                                            <br  />
                                                            <?php
                                                        }*/
                                                        ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td><?php echo $row->community; ?></td>
                        </tr>
                        <?php
                        $r++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="2" align="center">No Record Found!</td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
            <?php

            break;

    }

    return ob_get_clean();
}

add_shortcode('executive_committee_table', 'show_executive_committee_table');

/* New Update 14 Sep 2016 */
function show_advisory_board_table($atts)
{
    ob_start();
    global $wpdb, $wp_query, $current_user;
    $type = strtolower($atts['type']);

    switch ($type) {
        case 'advisoryboard':

            /* $query = "SELECT m1.meta_value AS community FROM wp_users u1 JOIN wp_usermeta m1 ON ( m1.user_id = u1.ID AND m1.meta_key =  'city' ) JOIN wp_usermeta m2 ON ( m2.user_id = u1.ID AND m2.meta_key =  'user_list' AND (m2.meta_value =  'CEO' || m2.meta_value =  'Designees'))GROUP BY community ORDER BY community ASC"; */

// $query = "SELECT DISTINCT(`post_title`)  FROM `wp_posts` WHERE `post_status` = 'publish' AND `post_type` = 'cpt-community' ORDER BY `post_name` ASC";

            $query = "SELECT wp_posts.post_title, wp_posts.ID, mt1.meta_value as community_types FROM wp_posts LEFT JOIN wp_postmeta AS mt1 ON (wp_posts.ID = mt1.post_id AND mt1.meta_key='community_type') WHERE wp_posts.post_type = 'cpt-community' AND (wp_posts.post_status = 'publish') AND (mt1.meta_value = 'MWRA') ORDER BY wp_posts.post_name ASC";

            $result = $wpdb->get_results($query); //echo '<pre>'; print_r($result);

            ?>
            <table class="executive-committee-table" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr class="table-tit">
                    <td><b>Community</b></td>
                    <td><b>CEO</b></td>
                    <td><b>Designee</b></td>
                </tr>

                <?php
                if (count($result) > 0) {
                    //foreach($myarr as $row => $em)
                    foreach ($result as $kk => $vv) {
                        $query1 = "SELECT us.ID FROM wp_users us JOIN wp_usermeta um1 ON ( um1.user_id = us.ID AND um1.meta_key =  'representing' AND um1.meta_value ='" . ucfirst(strtolower($vv->post_title)) . "') JOIN wp_usermeta um2 ON ( um2.user_id = us.ID AND um2.meta_key = 'user_list' AND (um2.meta_value =  'CEO'))";
                        $query2 = "SELECT us.ID FROM wp_users us JOIN wp_usermeta um1 ON ( um1.user_id = us.ID AND um1.meta_key =  'representing' AND um1.meta_value ='" . ucfirst(strtolower($vv->post_title)) . "') JOIN wp_usermeta um2 ON ( um2.user_id = us.ID AND um2.meta_key = 'user_list' AND (um2.meta_value =  'Designees'))";

                        //$query1	 = "SELECT us.ID FROM wp_users us JOIN wp_usermeta um1 ON ( um1.user_id = us.ID AND um1.meta_key =  'city' AND um1.meta_value ='".ucfirst(strtolower($vv->post_title))."') JOIN wp_usermeta um2 ON ( um2.user_id = us.ID AND um2.meta_key = 'user_list' AND (um2.meta_value =  'CEO'))";
//$query2	 = "SELECT us.ID FROM wp_users us JOIN wp_usermeta um1 ON ( um1.user_id = us.ID AND um1.meta_key =  'city' AND um1.meta_value ='".ucfirst(strtolower($vv->post_title))."') JOIN wp_usermeta um2 ON ( um2.user_id = us.ID AND um2.meta_key = 'user_list' AND (um2.meta_value =  'Designees'))";


                        //$query1	 = "SELECT us.ID FROM wp_users us JOIN ".$wpdb->prefix."cimy_uef_data um1 ON ( um1.USER_ID = us.ID AND um1.FIELD_ID =  '15' AND um1.VALUE ='%".ucfirst(strtolower($vv->post_title))."%') JOIN ".$wpdb->prefix."cimy_uef_data um2 ON ( um2.USER_ID = us.ID AND um2.FIELD_ID = '14' AND (um2.VALUE =  'CEO'))";
                        //$query2	 = "SELECT us.ID FROM wp_users us JOIN ".$wpdb->prefix."cimy_uef_data um1 ON ( um1.USER_ID = us.ID AND um1.FIELD_ID =  '15' AND um1.VALUE ='%".ucfirst(strtolower($vv->post_title))."%') JOIN ".$wpdb->prefix."cimy_uef_data um2 ON ( um2.USER_ID = us.ID AND um2.FIELD_ID = '12' AND (um2.VALUE =  'Designees'))";


                        //	$query = "SELECT CONCAT((SELECT meta_value FROM ".$wpdb->prefix."usermeta WHERE user_id=u.ID and meta_key='first_name' LIMIT 1) , ' ' , (SELECT meta_value FROM ".$wpdb->prefix."usermeta WHERE user_id=u.ID and meta_key='last_name' LIMIT 1)) as name FROM ".$wpdb->prefix."cimy_uef_data as cud JOIN ".$wpdb->prefix."users as u ON u.ID=cud.USER_ID WHERE ((cud.FIELD_ID=15   and (FIND_IN_SET('".$name."',LCASE(cud.VALUE)) OR FIND_IN_SET('".$name1."',LCASE(cud.VALUE)))) or (cud.FIELD_ID=3   and (FIND_IN_SET('".$name."',LCASE(cud.VALUE)) OR FIND_IN_SET('".$name1."',LCASE(cud.VALUE)))) ) and cud.USER_ID IN(SELECT USER_ID FROM ".$wpdb->prefix."cimy_uef_data WHERE FIELD_ID=12 AND VALUE='Designees') GROUP BY u.ID ";
                        //$result = $wpdb->get_results($query);

                        $res = $wpdb->get_results($query1, ARRAY_A);


                        $newceoarr = array_map('current', $res);

                        foreach ($newceoarr as $key => $temp) {
                            $newceoarr[$key] = get_user_meta($temp, 'first_name', true) . ' ' . get_user_meta($temp, 'last_name', true);

                        }

                        $ceo_name = implode(' | ', $newceoarr);

                        $res2 = $wpdb->get_results($query2, ARRAY_A);


                        $newdesigneesarr = array_map('current', $res2);


                        foreach ($newdesigneesarr as $key => $temp) {
                            $newdesigneesarr[$key] = get_user_meta($temp, 'first_name', true) . ' ' . get_user_meta($temp, 'last_name', true);
                        }

                        $designees_name = implode(' | ', $newdesigneesarr);
                        ?>
                        <tr>
                            <td><?php echo ucfirst(strtolower($vv->post_title)); ?></td>
                            <td><?php echo $ceo_name; ?></td>
                            <td><?php echo $designees_name; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="3" align="center">No Record Found!</td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
            <?php

            break;
    }

    return ob_get_clean();
}

add_shortcode('advisory_board_table', 'show_advisory_board_table');

/* New Update 16 Sep 2016 */
function restrict_community_filter_to_user_listing()
{
    global $wpdb;
    $query = "SELECT DISTINCT VALUE FROM " . $wpdb->prefix . "cimy_uef_data WHERE FIELD_ID=3 and VALUE!='' ORDER BY VALUE";
    $result = $wpdb->get_results($query);

    print('&nbsp;<select id="user-community-listing" name="community" style="float: none;">');
    print('<option value="">Filter By Community</option>');
    if (count($result) > 0) {
        foreach ($result as $row) {
            $selected = ($_REQUEST['community'] == $row->VALUE) ? ' selected' : '';
            print('<option value="' . $row->VALUE . '" ' . $selected . ' >' . $row->VALUE . '</option>');
        }
    }
    print('</select>');
    print('<input id="community-filter-button" class="button" type="button" value="Filter" name="">');
}

add_action('restrict_manage_users', 'restrict_community_filter_to_user_listing');

/* New Update 16 Sep 2016 */
function add_footer_community_filter_to_user_listing()
{
    global $pagenow;
    if ($pagenow == "users.php") {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                /*var filter_html = "";alert(filter_html);
                jQuery(".tablenav-pages").before("<div class=\"alignleft actions\"><form method=\"get\" action=\"\">"+filter_html+"</form></div>");*/
                //add action to filter button
                jQuery("#community-filter-button").live("click", function () {
                    //get club id
                    var community_id_value = jQuery("#user-community-listing").val();
                    //alert("user listing filter");
                    window.location = "users.php?community=" + community_id_value;
                });
            });
        </script>
        <?php
    }
}

add_action('admin_footer', 'add_footer_community_filter_to_user_listing');

/* New Update 16 Sep 2016 */
function admin_users_filter($query)
{
    global $wpdb, $pagenow;
    if (is_admin() && $pagenow == 'users.php' && isset($_REQUEST['community']) && $_REQUEST['community'] != '') {
        $community = strtolower(trim(urldecode($_REQUEST['community'])));
        if (!is_null($community)) {
            $query->query_from .= " INNER JOIN " . $wpdb->prefix . "cimy_uef_data ON " .
                "{$wpdb->users}.ID=" . $wpdb->prefix . "cimy_uef_data.USER_ID AND " .
                "" . $wpdb->prefix . "cimy_uef_data.FIELD_ID='3' AND " .
                "LCASE(" . $wpdb->prefix . "cimy_uef_data.VALUE) LIKE '%{$community}%'";
        }
    }
    //echo $query->query_from;exit;
}

add_filter('pre_user_query', 'admin_users_filter');


/* New Update 05 Oct 2016 add list mailpeot */
add_action('show_user_profile', 'my_show_extra_profile_fields');
add_action('edit_user_profile', 'my_show_extra_profile_fields');
add_action('user_new_form', 'my_show_extra_profile_fields');
function my_show_extra_profile_fields($user)
{ //echo '<pre>'; print_r($user);
    global $wpdb;
    $query = "SELECT list_id,name FROM " . $wpdb->prefix . "wysija_list ORDER BY name ";
    $result = $wpdb->get_results($query);

    $user_id = '';
    $query = "SELECT user_id FROM " . $wpdb->prefix . "wysija_user WHERE wpuser_id='" . $user->ID . "' ";
    $result2 = $wpdb->get_results($query);
    if (count($result2) > 0) {
        $user_id = $result2[0]->user_id;
    }
    $check_query = "SELECT list_id,user_id FROM " . $wpdb->prefix . "wysija_user_list WHERE user_id='" . $user_id . "'";
    $check_res = $wpdb->get_results($check_query);
    //$check_res = $check_res[0];

    ?>
    <style type="text/css">
        .wysija-unsubscribed-on {
            color: #bbbbbb;
        }
    </style>
    <h3>Subscribers Information</h3>
    <table class="form-table">
        <tr>
            <th><label for="Lists">Lists</label></th>
            <td>
                <?php
                if (count($result) > 0) {
                    foreach ($result as $row) {

                        $unsub_text = '';
                        $select = '';
                        if (is_array($_POST['wysija']['user_list']['list_id']) && isset($_POST['wysija']['user_list']['list_id']) && in_array($row->list_id, $_POST['wysija']['user_list']['list_id'])) {
                            $select = ' checked';
                        }


                        if (!empty($user_id)) {
                            $query2 = "SELECT * FROM " . $wpdb->prefix . "wysija_user_list WHERE list_id='" . $row->list_id . "' and user_id='" . $user_id . "' ";
                            $result2 = $wpdb->get_results($query2);
                            if (count($result2) > 0) {
                                if ($result2[0]->unsub_date > 0) {
                                    $unsub_text = '/ <span class="wysija-unsubscribed-on"> Unsubscribed on Thu, 13 Oct 2016 17:22:22 ' . date('D, j M Y H:i:s', $result2[0]->unsub_date) . '</span>';
                                } else {
                                    $select = ' checked';
                                }
                            }
                        }


                        ?>
                        <p class="labelcheck"><input name="wysija[user_list][list_id][]"
                                                     value="<?php echo $row->list_id; ?>"
                                                     id="list<?php echo $row->list_id; ?>" class=""
                                                     type="checkbox" <?php echo $select; ?> ><label
                                    for="list<?php echo $row->list_id; ?>"><?php echo $row->name; ?></label> <?php echo $unsub_text; ?>
                        </p>
                        <?php
                    }
                }
                ?>
            </td>
        </tr>
    </table>
    <?php
}

/* New Update 05 Oct 2016 save list mailpeot */
add_action('profile_update', 'save_mailpeot_permission_field');
add_action('edit_user_profile_update', 'save_mailpeot_permission_field');
add_action('user_register', 'save_mailpeot_permission_field'); //, 10, 1
function save_mailpeot_permission_field($wpuser_id)
{
    global $wpdb;

    /*Update user first*/
    $new_email = strtolower($_POST['email']);
    $query = "SELECT user_email FROM " . $wpdb->prefix . "users WHERE ID='" . $wpuser_id . "' ";
    $result = $wpdb->get_results($query);
    if (count($result) > 0) {
        $old_email = strtolower($result[0]->user_email);

        if ($new_email != $old_email && !empty($new_email) && !empty($old_email)) {
            $query2 = "SELECT user_id FROM " . $wpdb->prefix . "wysija_user WHERE LCASE(email)='" . $new_email . "' ";
            $result2 = $wpdb->get_results($query2);
            if (count($result2) > 0) {
                $s_user_id2 = $result2[0]->user_id;

                $query3 = "SELECT user_id FROM " . $wpdb->prefix . "wysija_user WHERE LCASE(email)='" . $old_email . "' ";
                $result3 = $wpdb->get_results($query3);
                if (count($result3) > 0) {
                    $s_user_id3 = $result2[0]->user_id;

                    //Delete Exists List
                    $de_query = "DELETE FROM " . $wpdb->prefix . "wysija_user_list WHERE user_id='" . $s_user_id2 . "' ";
                    $wpdb->query($de_query);

                    //Copy List to New Email in Same Table
                    $co_query = "INSERT INTO wp_wysija_user_list (list_id, user_id, sub_date, unsub_date) SELECT list_id, '" . $s_user_id2 . "', sub_date, unsub_date FROM wp_wysija_user_list WHERE user_id = '" . $s_user_id3 . "' ";
                    $wpdb->query($co_query);

                    //Delete Final Old Email Subscriber with List
                    $de_query = "DELETE t1.*, t2.* FROM wp_wysija_user as t1 LEFT JOIN wp_wysija_user_list as t2 ON t2.user_id = t1.user_id WHERE t1.user_id = '" . $s_user_id3 . "' ";
                    $wpdb->query($de_query);
                }
            }
        }
    }
    /*End Update user first*/

    $user_id = '';
    $query = "SELECT user_id FROM " . $wpdb->prefix . "wysija_user WHERE wpuser_id='" . $wpuser_id . "' ";
    $result = $wpdb->get_results($query);
    if (count($result) > 0) {
        $user_id = $result[0]->user_id;
    }

    if (!empty($user_id)) {
        //$query = "DELETE FROM ".$wpdb->prefix."wysija_user_list WHERE user_id='".$user_id."' ";
        //$wpdb->query($query);

        //Unsubscribe first
        $query = "UPDATE " . $wpdb->prefix . "wysija_user_list SET unsub_date='" . time() . "' WHERE user_id='" . $user_id . "' ";
        $wpdb->query($query);

        if (count($_POST['wysija']['user_list']['list_id']) > 0) {
            foreach ($_POST['wysija']['user_list']['list_id'] as $list_id) {

                $chk_query = "SELECT * FROM " . $wpdb->prefix . "wysija_user_list WHERE user_id='" . $user_id . "' AND list_id='" . $list_id . "'  ";
                $chk_result = $wpdb->get_results($chk_query);
                if (count($chk_result) > 0) {
                    $up_query = "UPDATE " . $wpdb->prefix . "wysija_user_list SET sub_date='" . time() . "', unsub_date='' WHERE user_id='" . $user_id . "' AND list_id='" . $list_id . "' ";
                    $wpdb->query($up_query);
                } else {
                    $in_query = "INSERT " . $wpdb->prefix . "wysija_user_list SET user_id='" . $user_id . "', list_id='" . $list_id . "', sub_date='" . time() . "', unsub_date='' ";
                    $wpdb->query($in_query);
                }

            }
        }
    }
}

/* New Update 27 Oct 2016 update email to user on backend process */
add_action('init', 'mailpoet_email_update_to_user_backend');
function mailpoet_email_update_to_user_backend()
{
    global $wpdb;
    if (class_exists('WYSIJA')) {
        //$model_config = WYSIJA::get('config','model');
        //$model_config->save(array('allow_wpmail' => true));
        if (isset($_POST['wysija']['user']['email']) && $_POST['action'] == 'save' && isset($_GET['id']) && $_GET['page'] == 'wysija_subscribers') {
            $query = "SELECT wpuser_id FROM " . $wpdb->prefix . "wysija_user WHERE user_id = '" . $_GET['id'] . "' ";
            $wpuser = $wpdb->get_col($query);
            if (!empty($wpuser[0])) {
                $query = "UPDATE " . $wpdb->prefix . "users SET user_email='" . $_POST['wysija']['user']['email'] . "' WHERE ID='" . $wpuser[0] . "' ";
                $wpdb->query($query);
            }
        }
    }
}

/***********08-12-2016 **************/
/***
 * @dynamic update all extra fields to show admin custom pro drop-down list which reflect on column
 ***/
add_action('edit_user_profile_update', 'update_extra_profile_fields');
function update_extra_profile_fields($user_id)
{
    global $wpdb;

    if (current_user_can('edit_user', $user_id)) {

        $myArr = $_POST; //echo '<pre>'; print_r($myArr);
        $keyArr = array();


        foreach ($myArr as $k => $v) {

            if (strpos($k, 'cimy_uef') !== false && strpos($k, 'prev_value') == false) {
                $myk = strtolower(substr($k, 9));
                $chk_data = substr($k, 9);

                /********/
                /* $qq = 'SELECT *  FROM wp_cimy_uef_fields WHERE NAME ="USER_LIST" AND TYPE = "dropdown"';
                  $res = $wpdb->get_results($qq);
                 echo '<pre>'; print_r($res);
                  $record = $res[0];

                  if($record && $chk_data =='USER_LIST'){
                   $curr_val =  $record->LABEL;
                  if(strpos($curr_val,$v) !== false)
                       $myv = $v;
                    }
                    else{
                    $myv = '';
                     }
                  } */
                /*******/
                if (is_array($v)) {

                    $myv = implode(',', $v);
                } else {
                    $myv = $v;
                }
            }
            if (!empty($myk)) {
                update_user_meta($user_id, $myk, $myv);
            }
        }


    }
}

// add_filter( 'gform_export_fields', 'add_custom_fields', 10, 1 );
// function add_custom_fields( $form ) {
//     array_push( $form['fields'], array( 'id' => 'custom_field1', 'label' => __( 'Custom Field 1', 'gravityforms' ) ) );
//     array_push( $form['fields'], array( 'id' => 'custom_field2', 'label' => __( 'Custom Field 2', 'gravityforms' ) ) );

//     return $form;
// }

add_action('pre_user_query', 'filter_users_wpse_10742');

function filter_users_wpse_10742($user_search)
{
    global $pagenow;
    if ('users.php' != $pagenow)
        return;

    $user = wp_get_current_user();

    if ($user->roles[0] != 'administrator') {
        global $wpdb;

        $user_search->query_where =
            str_replace('WHERE 1=1',
                "WHERE 1=1 AND {$wpdb->users}.ID IN (
                 SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta 
                    WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}user_level' 
                    AND {$wpdb->usermeta}.meta_value != 9)",
                $user_search->query_where
            );
    }
}

/**********28-01-2017 start***********/
/*add_action( 'gform_pre_submission', 'pre_submission_handler' );
function pre_submission_handler( $form ) { //echo 'ddddd'; echo '<pre>'; print_r($form);
//echo '<pre>'; print_r($form['fields'][37]->content);
//$ff = $form['fields'][37]->content;

if($_POST['gform_submit'] == '29'){
//echo '<pre>'; print_r($_POST);
$_POST['input_44'] = array('ddf','ff');
/*$_POST['input_44'] = array(
array($_POST['range_1'],$_POST['unit_1'],$_POST['unit_1']),
array($_POST['range_2'],$_POST['unit_2'],$_POST['unit_2']),
array($_POST['range_3'],$_POST['unit_3'],$_POST['unit_3']),
);	*/
/*$_POST['input_44.1.2'] = $_POST['unit_1'];	
$_POST['input_44.1.3'] = $_POST['rate_1'];	
$_POST['input_44.2.1'] = $_POST['range_2'];	
$_POST['input_44.2.2'] = $_POST['unit_2'];	
$_POST['input_44.2.3'] = $_POST['rate_2'];
$_POST['input_44.3.1'] = $_POST['range_3'];	
$_POST['input_44.3.2'] = $_POST['unit_3'];	
$_POST['input_44.3.3'] = $_POST['rate_3'];	
}
//echo '<pre>'; print_r($_POST);
//$_POST['range_1'];
 //exit;
  //  $_POST['input_14'] = rgpost( 'input_5' );
} */

//add_filter( 'gform_pre_render_29', 'form29_table_fun' );
function form29_table_fun($form)
{ //echo 'fff'; echo '<pre>'; print_r($form); exit;
    return $form;
}

/*******30-01-2017 export function *******/
//add_filter( 'gform_leads_before_export', 'use_user_display_name_for_export', 10,5  );

function use_user_display_name_for_export($entries, $form, $paging, $field_rows, $field_cols)
{
//echo '<pre>'; 
//print_r($entries);

    foreach ($entries as &$entry) {

        foreach ($entry as $subkk => $subvv) {
            if (is_serialized($subvv)) {


                $max_table_entry = $field_rows[$subkk] * $field_cols[$subkk];

                $data = unserialize($entry[$subkk]);
                $data_array = array();

                $entry_inc = 0;
                foreach ($data as $k => $v) {

                    foreach ($v as $temp_value) {
                        $data_array[]['Column 1'] = $temp_value;
                        $entry_inc++;
                    }


                }

                $remaining_entry_count = $max_table_entry - $entry_inc;


                for ($incre = 0; $incre < $remaining_entry_count; $incre++) {
                    $data_array[]['Column 1'] = '';

                }

                //print_r($data_array);
                $entry[$subkk] = serialize($data_array);

            }
        }

    }
    return $entries;
}


/* Function which remove Plugin Update Notices – Gravity Form*/
function disable_plugin_updates($value)
{
    unset($value->response['gravityforms/gravityforms.php']);
    return $value;
}

//add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );


/**** remove wordpress update notices ****/


add_action('admin_menu', 'wphidenag');
function wphidenag()
{
    remove_action('admin_notices', 'update_nag', 3);
}


/**** remove mailpoint update notices ****/


function remove_core_updates()
{
    global $wp_version;
    return (object)array('last_checked' => time(), 'version_checked' => $wp_version,);
}

add_filter('pre_site_transient_update_core', 'remove_core_updates');
//add_filter('pre_site_transient_update_plugins','remove_core_updates');
//add_filter('pre_site_transient_update_themes','remove_core_updates');


function hover_box_effect($atts)
{

    if (isset($atts)) {
        $image_url = $atts['src'];
        $bio = $atts['bio'];
        $name = $atts['name'];
    } else {

        $image_url = "";
        $bio = "";
        $name = "";
    }
    $output = '';

    $output .= '<div id="whower" class="service-listing-main">';
    $output .= '<div class="service-listing-l" style="width: 100% !important;">';
    $output .= '<div class="listing">';
    $output .= '<div class="link-img">';
    $output .= '<img src="' . $image_url . '" alt="Executive Committee"></div>';
    $output .= '<div class="list-detail">';
    $output .= '<h2>' . $name . '</h2>';
    $output .= '<div style="color:black">';
    $output .= '<p style="color:#fff !important">' . $bio . '</p>';


    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    $output .= '</div>';

    return $output;
}

add_shortcode('photo_content_box', 'hover_box_effect');
function staff_member_detail($att)
{
    $data = $att['id'];
    $user_info = get_userdata($data);
    $name = $user_info->display_name;
    $email = $user_info->user_email;
    $all_meta_for_user = get_user_meta($data);
    //echo '<pre>';
    //print_r($all_meta_for_user);
    $img_url = get_avatar_url($data);
    //echo 'sada';
    $job_title = $all_meta_for_user['job_title'][0];
    $fax = $all_meta_for_user['fax'][0];
    $phone = $all_meta_for_user['work_telephone'][0];
    $address = $all_meta_for_user['street'][0] . '&nbsp;' . $all_meta_for_user['city'][0] . '&nbsp;' . $all_meta_for_user['state'][0] . '&nbsp;' . $all_meta_for_user['zip_code'][0];
    $div = '
<table>
<tbody>
<tr>';
    $div .= '
<td valign="middle"><a class="fancybox-inline" href="#advisory1' . $data . '">';
    $div .= '<img src="' . $img_url . '" alt="" width="50"></a></td>';
    $div .= '<td valign="middle">&nbsp; <a class="fancybox-inline" href="#advisory1' . $data . '">' . $name . '</a>';
    $div .= '<div class="fancybox-hidden" style="display: none;">
<div id="advisory1' . $data . '" style="overflow-x: auto; overflow-y: auto;">
<div class="fancybox_content">';
    $div .= '<img src="' . $img_url . '" alt="">
<h6>' . $name . '</h6>
<span class="position">' . $job_title . '</span></br>
<b>Email:</b> <a href="mailto:' . $email . '">' . $email . '</a></br>
<b>Phone:</b> ' . $phone . '</br>
<b>Fax:</b> ' . $fax . '</br>
<b>Address:</b>' . $address . '
</div>';
    return $div .= '</div></div></td></tr></tbody></table></td>';
}

add_shortcode('staff_member_detail', 'staff_member_detail');


add_action('admin_menu', 'my_admin_menu');

/*function my_admin_menu() {
	add_menu_page( 'Add Entry', 'Add Entry', 'manage_options', 'add-entries.php', 'addEntriesInAdmin', 'dashicons-tickets', 1 );
}

function addEntriesInAdmin(){
    echo do_shortcode('[gravityform id="6" title="true" description="true"]');

}*/

/************* CUSTOM ADMIN CSS *****************/

function custom_admin_css()
{
    echo '<style type="text/css">
            #gf_dashboard_message { display: none; }
         </style>';
}

add_action('admin_head', 'custom_admin_css');


/************* Gravity Form Validation *****************/

//add_filter('gform_validation_38', 'custom_validation_5');

// 	function custom_validation_5($validation_result){


//       $form = $validation_result["form"];
// if(isset($_POST['input_54'])  && $_POST['gform_source_page_number_38'] == '4'){

//         $all_numeric = true;
//         foreach ($_POST['input_54'] as $key=>$value) {
//             if (!(is_numeric($value))) {
//                 $all_numeric = false;
//                 break;
//             }

//         }


//             $total_field_count = count($_POST['input_54']);
//             $field_in_row = count($form["fields"][46]['choices']);
//             $field_row_count = $total_field_count/$field_in_row;
//             $all_in_correct_formate = true;
//             $next_tier_min_range_formate = true;

//             for($i=0;$i<$field_row_count;$i++){


//                 if($i != 0){
//                 $tier_start = ($i*4);
//                 $tier_end =  $tier_start +1;
//                 }else{

//                      $tier_start = 0;
//                     $tier_end =  $tier_start +1;
//                 }


//                 if($_POST['input_54'][$tier_start] > $_POST['input_54'][$tier_end]){

//                      $all_in_correct_formate = false;
//                     break;

//                 }


//                 if($i != 0){


//                 if($_POST['input_54'][$tier_start] != $_POST['input_54'][$tier_start-3]+1){

//                      $next_tier_min_range_formate = false;
//                     break;

//                 }
//              }

//             }


//          if($next_tier_min_range_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][46]["failed_validation"] = true;
//     	    	$form["fields"][46]["validation_message"] = 'Next Tier Start should start with Previous Tier End +1 ';
//         }


//         if($all_in_correct_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][46]["failed_validation"] = true;
//     	    	$form["fields"][46]["validation_message"] = 'Tier End  should be greater then Tier Start';

//         }

//       if ($all_numeric == false) {
//             $validation_result["is_valid"] = false;
// 	    	$form["fields"][46]["failed_validation"] = true;
// 	    	$form["fields"][46]["validation_message"] = 'Tier End,Tier Start and Rate field should be numeric value';
//          }


// }


//  if(isset($_POST['input_55'])  && $_POST['gform_source_page_number_38'] == '4'){

//         $all_numeric = true;
//         foreach ($_POST['input_55'] as $key=>$value) {
//             if (!(is_numeric($value))) {
//                 $all_numeric = false;
//                 break;
//             }
//         }


//         $total_field_count = count($_POST['input_55']);
//             $field_in_row = count($form["fields"][47]['choices']);
//             $field_row_count = $total_field_count/$field_in_row;
//             $all_in_correct_formate = true;
//             $next_tier_min_range_formate = true;

//             for($i=0;$i<$field_row_count;$i++){


//                 if($i != 0){
//                 $tier_start = ($i*4);
//                 $tier_end =  $tier_start +1;
//                 }else{

//                      $tier_start = 0;
//                     $tier_end =  $tier_start +1;
//                 }


//                 if($_POST['input_55'][$tier_start] > $_POST['input_55'][$tier_end]){

//                      $all_in_correct_formate = false;
//                     break;

//                 }


//                 if($i != 0){


//                 if($_POST['input_55'][$tier_start] != $_POST['input_55'][$tier_start-3]+1){

//                      $next_tier_min_range_formate = false;
//                     break;

//                 }
//              }

//             }


//  if($next_tier_min_range_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][47]["failed_validation"] = true;
//     	    	$form["fields"][47]["validation_message"] = 'Next Tier Start should start with Previous Tier End +1 ';
//         }


//         if($all_in_correct_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][47]["failed_validation"] = true;
//     	    	$form["fields"][47]["validation_message"] = 'Tier End  should be greater then Tier Start';

//         }

//       if ($all_numeric == false) {
//             $validation_result["is_valid"] = false;
// 	    	$form["fields"][47]["failed_validation"] = true;
// 	    	$form["fields"][47]["validation_message"] = 'Tier End,Tier Start and Rate field should be numeric value';
//          }


// }

// Validation for Screen 6 14th August

// if(isset($_POST['input_77'])  && $_POST['gform_source_page_number_38'] == '6'){

//         $all_numeric = true;
//         foreach ($_POST['input_77'] as $key=>$value) {
//             if (!(is_numeric($value))) {
//                 $all_numeric = false;
//                 break;
//             }

//         }


//             $total_field_count = count($_POST['input_77']);
//             $field_in_row = count($form["fields"][62]['choices']);
//             $field_row_count = $total_field_count/$field_in_row;
//             $all_in_correct_formate = true;
//             $next_tier_min_range_formate = true;

//             for($i=0;$i<$field_row_count;$i++){


//                 if($i != 0){
//                 $tier_start = ($i*4);
//                 $tier_end =  $tier_start +1;
//                 }else{

//                      $tier_start = 0;
//                     $tier_end =  $tier_start +1;
//                 }


//                 if($_POST['input_77'][$tier_start] > $_POST['input_77'][$tier_end]){

//                      $all_in_correct_formate = false;
//                     break;

//                 }


//                 if($i != 0){


//                 if($_POST['input_77'][$tier_start] != $_POST['input_77'][$tier_start-3]+1){

//                      $next_tier_min_range_formate = false;
//                     break;

//                 }
//              }

//             }


//          if($next_tier_min_range_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][62]["failed_validation"] = true;
//     	    	$form["fields"][62]["validation_message"] = 'Next Tier Start should start with Previous Tier End +1 ';
//         }


//         if($all_in_correct_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][62]["failed_validation"] = true;
//     	    	$form["fields"][62]["validation_message"] = 'Tier End  should be greater then Tier Start';

//         }

//       if ($all_numeric == false) {
//             $validation_result["is_valid"] = false;
// 	    	$form["fields"][62]["failed_validation"] = true;
// 	    	$form["fields"][62]["validation_message"] = 'Tier End,Tier Start and Rate field should be numeric value';
//          }


// }

// if(isset($_POST['input_78'])  && $_POST['gform_source_page_number_38'] == '4'){

//         $all_numeric = true;
//         foreach ($_POST['input_78'] as $key=>$value) {
//             if (!(is_numeric($value))) {
//                 $all_numeric = false;
//                 break;
//             }
//         }


//         $total_field_count = count($_POST['input_78']);
//             $field_in_row = count($form["fields"][63]['choices']);
//             $field_row_count = $total_field_count/$field_in_row;
//             $all_in_correct_formate = true;
//             $next_tier_min_range_formate = true;

//             for($i=0;$i<$field_row_count;$i++){


//                 if($i != 0){
//                 $tier_start = ($i*4);
//                 $tier_end =  $tier_start +1;
//                 }else{

//                      $tier_start = 0;
//                     $tier_end =  $tier_start +1;
//                 }


//                 if($_POST['input_78'][$tier_start] > $_POST['input_78'][$tier_end]){

//                      $all_in_correct_formate = false;
//                     break;

//                 }


//                 if($i != 0){


//                 if($_POST['input_78'][$tier_start] != $_POST['input_78'][$tier_start-3]+1){

//                      $next_tier_min_range_formate = false;
//                     break;

//                 }
//              }

//             }


//  if($next_tier_min_range_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][63]["failed_validation"] = true;
//     	    	$form["fields"][63]["validation_message"] = 'Next Tier Start should start with Previous Tier End +1 ';
//         }


//         if($all_in_correct_formate == false){
//                 $validation_result["is_valid"] = false;
//     	    	$form["fields"][63]["failed_validation"] = true;
//     	    	$form["fields"][63]["validation_message"] = 'Tier End  should be greater then Tier Start';

//         }

//       if ($all_numeric == false) {
//             $validation_result["is_valid"] = false;
// 	    	$form["fields"][63]["failed_validation"] = true;
// 	    	$form["fields"][63]["validation_message"] = 'Tier End,Tier Start and Rate field should be numeric value';
//          }


// }

// End of validation for Screen 6

//  	   $validation_result["form"] = $form;

//   return $validation_result;
// }
add_filter('gform_validation_38_steps_1', 'custom_validation');
function custom_validation($validation_result)
{

    $form = $validation_result["form"];
    $email = $_POST["input_22"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $validation_result["is_valid"] = false;
        $form["fields"][22]["failed_validation"] = true;
        $form["fields"][22]["validation_message"] = 'Please enter a valid email address';

    }


    // update the form in the validation result with the form object you modified
    $validation_result["form"] = $form;

    return $validation_result;

}


add_filter('gform_pre_render_38', 'populate_multipage_form_field');


function populate_multipage_form_field($form)
{


    $state = (Array)json_decode('{"AL":"Alabama","AK":"Alaska","AS":"American Samoa","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FM":"Federated States Of Micronesia","FL":"Florida","GA":"Georgia","GU":"Guam","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MH":"Marshall Islands","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","MP":"Northern Mariana Islands","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PW":"Palau","PA":"Pennsylvania","PR":"Puerto Rico","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VI":"Virgin Islands","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"}');

    $items = array();
    $items[] = array('text' => 'Select State', 'value' => '');

    foreach ($state as $key => $value) {
        $items[] = array('value' => $key, 'text' => $key);
    }

    /* $communities_items = array();
     $communities_items[] = array( 'text' => 'Select Communities', 'value' => '' );

    $agrs = array('post_type'=>'cpt-community',
                   'post_status' => 'publish',
                    'numberposts' => -1

         );
     $communities = get_posts($agrs);


     foreach ( $communities as $communitie ) {
         $communities_items[] = array( 'value' => $communitie->post_title, 'text' => $communitie->post_title );
     }

     if ( $field->id == 136 ) {
             $field->choices = $communities_items;
         }
     */


    foreach ($form['fields'] as &$field) {
        if ($field->id == 135) {
            $field->choices = $items;
        }


    }


    return $form;
}

add_filter('gform_pre_render_44', 'populate_multipage_form_field1');

function populate_multipage_form_field1($form)
{


    $state = (Array)json_decode('{"AL":"Alabama","AK":"Alaska","AS":"American Samoa","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FM":"Federated States Of Micronesia","FL":"Florida","GA":"Georgia","GU":"Guam","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MH":"Marshall Islands","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","MP":"Northern Mariana Islands","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PW":"Palau","PA":"Pennsylvania","PR":"Puerto Rico","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VI":"Virgin Islands","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"}');

    $items = array();
    $items[] = array('text' => 'Select State', 'value' => '');

    foreach ($state as $key => $value) {
        $items[] = array('value' => $key, 'text' => $key);
    }


    foreach ($form['fields'] as &$field) {
        if ($field->id == 135) {
            $field->choices = $items;
        }


    }


    return $form;
}


function searchfilter($query)
{

    if ($query->is_search && !is_admin()) {

        if (!isset($_GET['order']) || $_GET['order'] != '') {

            $query->set('order', 'DESC');
        }
        if (!isset($_GET['orderby']) || $_GET['orderby'] != '') {
            $query->set('orderby', 'publish_date');
        }

    }

    return $query;
}


add_filter('pre_get_posts', 'searchfilter');
add_filter('gform_enable_field_label_visibility_settings', '__return_true');

//add_filter( 'gform_save_field_value_38_41', 'default_year', 10, 3 );
//add_filter( 'gform_save_field_value_38_42', 'default_year', 10, 3 );
//add_filter( 'gform_save_field_value_38_46', 'default_year', 10, 3 );
//add_filter( 'gform_save_field_value_38_48', 'default_year', 10, 3 );


//add_filter( 'gform_save_field_value_45_41', 'default_year', 10, 3 );
//add_filter( 'gform_save_field_value_45_42', 'default_year', 10, 3 );
//add_filter( 'gform_save_field_value_45_46', 'default_year', 10, 3 );
//add_filter( 'gform_save_field_value_45_48', 'default_year', 10, 3 );

add_filter('gform_save_field_value_45_152', 'default_year', 10, 3);
add_filter('gform_save_field_value_38_152', 'default_year', 10, 3);
add_filter('gform_save_field_value_44_149', 'default_year', 10, 3);

function default_year($value, $entry, $field)
{

    if (!is_admin()) {
        $value = date("Y");


    }
    return $value;
}

add_action('save_post', 'add_thumbnail_id_to_post');

function add_thumbnail_id_to_post($post_id)
{

    $post_type = get_post_type($post_id);

    $select_library_type = get_post_meta($post_id, 'select_library_type', true);

    if ($post_type == 'cpt-library' && $select_library_type == 'pdf') {

        $attachment_id = get_post_meta($post_id, 'pdf_attatchment', true);

        update_post_meta($post_id, '_thumbnail_id', $attachment_id);

        set_post_thumbnail_size(232, 300);
    }

}


function ptag_shortcode($atts = [], $content = null)
{

    // $content = '<div style="display:none" >'.$content.'</div>';
    $content = '<div style="display:none" >' . $atts['content'] . '</div>';

    return $content;
}

add_shortcode('ptag', 'ptag_shortcode');

//add_filter("the_excerpt", "plugin_myContentFilter");
//add_filter("the_content", "plugin_myContentFilter");

function plugin_myContentFilter($content)
{
    // Take the existing content and return a subset of it
    return substr($content, 0, 300);
}


add_filter('et_pb_blog_image_height', 'blog_size_h');
add_filter('et_pb_blog_image_width', 'blog_size_w');

function blog_size_h($height)
{
    return '250';
}

function blog_size_w($width)
{
    return '300';
}