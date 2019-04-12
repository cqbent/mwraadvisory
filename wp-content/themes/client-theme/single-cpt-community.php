<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package knoxweb
 */

get_header("community"); ?>



	<div class="content-area">
		<!-- <h2 class="cmty-title">Select Your Community</h2>--->
	
		<?php /*?><main id="main" class="site-main" role="main"><?php */?>
			
			<?php
				$args = array(
				 'post_type' => 'cpt-community',
				 'posts_per_page' => 5, 
				 'orderby'=>'title',
				 'order'=>'ASC'
				 );
				//$loop = new WP_Query( $args );
				 global $wpdb;
				 $query = 'SELECT *  FROM wp_posts WHERE post_type = "cpt-community" AND post_status = "publish" ORDER BY post_title ASC ';
				 $loop = $wpdb->get_results($query);	
				 //echo '<pre>'; print_r($loop);	
				$community_array = "";
				/* while ( $loop->have_posts() ) : $loop->the_post();
					if(!empty(get_the_title())){
						$community_array .='"'.get_permalink().'": "'.get_the_title().'",';
					}
					
				endwhile;*/
				 foreach($loop as $ck => $cv){ 
				 if(!empty($cv->post_title)){
				  // $community_array .='"'.$cv->guid.'": "'.$cv->post_title.'",';
				    $community_array .='"'.get_permalink($cv->ID).'": "'.$cv->post_title.'",';
				 }
				 }

				?>
		
	<div id="autocomplete-field-sec">
		<input type="text" name="country" placeholder="Select Your Community" id="autocomplete-community" style="position: absolute; z-index: 2;">
		<span class="cm-ui-icon-dropdown"></span>
	</div>
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php //the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				//if ( comments_open() || get_comments_number() ) :
					//comments_template();
				//endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.autocomplete.js"></script>
 <script type="text/javascript">
 var communties = <?php echo '{'.$community_array.'}'; ?>;

  var communtiesArray = jQuery.map(communties, function (value, key) { return { value: value, data: key }; });

 jQuery('#autocomplete-community').autocomplete({
	
        // serviceUrl: '/autosuggest/service/url',
		minChars: 0,
        lookup: communtiesArray,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + jQuery.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            //alert(' You selected: ' + suggestion.value + ', ' + suggestion.data);
			window.top.location.href = suggestion.data; 
        },
        onHint: function (hint) {
            jQuery('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
           jQuery('#selction-ajax').html('You selected: none');
        }
    });

 </script>
<?php get_footer(); ?>

<style>
.entry-meta { display:none; }
.entry-footer { display:none; }
</style>
