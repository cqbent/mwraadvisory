<?php
/* get Tags by category */
function get_tags_in_use($category_ID, $type = 'name', $post_type = "", $tag_type="library_tags" ){
    // Set up the query for our posts
    $args = array('post_type'=> $post_type,'posts_per_page'=>-1,'order'=>'ASC',
		  'orderby'	=> 'ID',
		  'tax_query' => array(
						array(
							'taxonomy' => 'library-cat',
							'field' => 'term_id',
							'terms' => $category_ID,
						),
				),);	
	$get_Posts = get_posts( $args);
    // Initialize our tag arrays
    $tags_by_id = array();
    $tags_by_name = array();
    $tags_by_slug = array();

    // If there are posts in this category, loop through them
    if (!empty($get_Posts)): 
	foreach ($get_Posts as $my_posts):

      // Get all tags of current post
	  $args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
	  //$tags = wp_get_object_terms($library_category->term_id, 'library_tag', $args );
      //$post_tags = wp_get_post_tags($my_posts->post->ID);
      $post_tags = wp_get_object_terms($my_posts->ID, $tag_type, $args );
      // Loop through each tag
      foreach ($post_tags as $tag):

        // Set up our tags by id, name, and/or slug
        $tag_id = $tag->term_id;
        $tag_name = $tag->name;
        $tag_slug = $tag->slug;

        // Push each tag into our main array if not already in it
        if (!in_array($tag_id, $tags_by_id))
          array_push($tags_by_id, $tag_id);

        if (!in_array($tag_name, $tags_by_name))
          array_push($tags_by_name, $tag_name);

        if (!in_array($tag_slug, $tags_by_slug))
          array_push($tags_by_slug, $tag_slug);

      endforeach;
    endforeach; 
	endif;

    // Return value specified
    if ($type == 'id')
        return $tags_by_id;

    if ($type == 'name')
        return $tags_by_name;

    if ($type == 'slug')
        return $tags_by_slug;
}
/**
 * Changes the WHERE clause for wp_get_archives to select only posts for the categories in the
 * 'cat' parameter.
 *
 * @param String $where
 *             a SQL WHERE clause.
 * @param Array $args
 *             arguments passed to the wp_get_archives() function.
 *
 * @return String
 *             modified SQL WHERE clause with additional selection by category if $args contains a
 *             parameter called cat.
 */
function kwebble_getarchives_where_for_category($where, $args){
	
	global $kwebble_getarchives_data, $wpdb;

	if (isset($args['cat'])){
		// Preserve the category for later use.
		$kwebble_getarchives_data['cat'] = $args['cat'];
		
		// Split 'cat' parameter in categories to include and exclude.
		$allCategories = explode(',', $args['cat']);

		// Element 0 = included, 1 = excluded.
		$categories = array(array(), array());
		foreach ($allCategories as $cat) {
			if (strpos($cat, ' ') !== FALSE) {
				// Multi category selection.
			}
			$idx = $cat < 0 ? 1 : 0;
			$categories[$idx][] = abs($cat);
		}

		$includedCatgories = implode(',', $categories[0]);
		$excludedCatgories = implode(',', $categories[1]);
		
		// Add SQL to perform selection.
		if (get_bloginfo('version') < 2.3){
			$where .= " AND $wpdb->posts.ID IN (SELECT DISTINCT ID FROM $wpdb->posts JOIN $wpdb->post2cat post2cat ON post2cat.post_id=ID";

			if (!empty($includedCatgories)) {
				$where .= " AND post2cat.category_id IN ($includedCatgories)";
			}
			if (!empty($excludedCatgories)) {
				$where .= " AND post2cat.category_id NOT IN ($excludedCatgories)";
			}

			$where .= ')';
		} else{
			
			$where .= ' AND ' . $wpdb->prefix . 'posts.ID IN (SELECT DISTINCT ID FROM ' . $wpdb->prefix . 'posts'
					. ' JOIN ' . $wpdb->prefix . 'term_relationships term_relationships ON term_relationships.object_id = ' . $wpdb->prefix . 'posts.ID'
					. ' JOIN ' . $wpdb->prefix . 'term_taxonomy term_taxonomy ON term_taxonomy.term_taxonomy_id = term_relationships.term_taxonomy_id'
					. ' WHERE term_taxonomy.taxonomy = \'category\' OR term_taxonomy.taxonomy = \'library-cat\'';
			if (!empty($includedCatgories)) {
				$where .= " AND term_taxonomy.term_id IN ($includedCatgories)";
			}
			if (!empty($excludedCatgories)) {
				$where .= " AND term_taxonomy.term_id NOT IN ($excludedCatgories)";
			}

			$where .= ')';
		}
	}

	return $where;
}
/**
 * Changes the archive link to include the categories from the 'cat' parameter.
 * 
 * @param String
 *             $url the generated URL for an archive.
 *
 * @return String
 *             modified URL that includes the category.
 */
function kwebble_archive_link_for_category($url){
	global $kwebble_getarchives_data;
	
	if (isset($kwebble_getarchives_data['cat'])){
		$url .= strpos($url, '?') === false ? '?' : '&';
		$url .= 'cat=' . $kwebble_getarchives_data['cat'];
	}
	return $url;
}

/*
 * Add the filters.
 */

// Prevent error if executed outside WordPress.
if (function_exists('add_filter')){
	add_filter('getarchives_where', 'kwebble_getarchives_where_for_category', 10, 2);

	//add_filter('year_link', 'kwebble_archive_link_for_category', 11, 3);
	//add_filter('month_link', 'kwebble_archive_link_for_category', 11, 3);
	//add_filter('day_link', 'kwebble_archive_link_for_category', 11, 3);

}
/* Most Viewed Libraries Function */
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
/**
 * Display a custom taxonomy dropdown in admin
 * @author  Subhash SST
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'cpt-library'; // change to your post type
	$taxonomy  = 'library-cat'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/**
 * Filter posts by taxonomy in admin
 * @author  Subhash SST
 * 
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'cpt-library'; // change to your post type
	$taxonomy  = 'library-cat'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
?>