<?php
/**
 * Template Name: PopUp Page Template
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
wp_redirect("http://mwraadvisoryboard.com/community/arlington/");
get_header('popup'); ?>

	<div class="content-area community-select-area">
	<!-- <h2 class="cmty-title">Select Your Community</h2>--->
	
		<?php /*?><main id="main" class="site-main" role="main"><?php */?>
			
			<?php
				$args = array(
				 'post_type' => 'cpt-community',
				 'posts_per_page' => 5, 
				 'orderby'=>'title',
				 'order'=>'asc'
				 );
                               
                   //$loop = new WP_Query( $args );

				 global $wpdb;
	      $query = 'SELECT *  FROM wp_posts WHERE post_type = "cpt-community" AND post_status = "publish" ORDER BY post_title asc';
				 $loop = $wpdb->get_results($query);	
				//echo '<pre>'; print_r($loop);	
				$community_array = "";

			     /*	while ( $loop->have_posts() ) : $loop->the_post();
					if(!empty(get_the_title())){
						$community_array .='"'.get_permalink().'": "'.get_the_title().'",';
					}
					
				endwhile; */

				 foreach($loop as $ck => $cv){ 
				 if(!empty($cv->post_title)){
				   $community_array .='"'.get_permalink($cv->ID).'": "'.$cv->post_title.'",';
                                   
				 }
				 }

				?>
		
	<div id="autocomplete-field-sec">
		<input type="text" name="country" placeholder="Select Your Community" id="autocomplete-community" style="position: absolute; z-index: 2;">
		<span class="cm-ui-icon-dropdown"></span>
	</div>
</div><!-- #primary -->

<?php //get_sidebar();  ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.autocomplete.js"></script>
 <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/countries.js"></script>
 <script type="text/javascript">
 var communties = <?php echo '{'.$community_array.'}'; ?>;
  var communtiesArray = $.map(communties, function (value, key) { return { value: value, data: key }; });

 $('#autocomplete-community').autocomplete({
	 
        // serviceUrl: '/autosuggest/service/url',
		minChars: 0,
        lookup: communtiesArray,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            //alert(' You selected: ' + suggestion.value + ', ' + suggestion.data);
			window.top.location.href = suggestion.data; 
        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });

 </script>
</body>
</html>