<?php
/**
 * Template Name: Policy Position
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					//get_template_part( 'content', 'page' );
					?>
                   <article>
                   
					<?php /*?><header class="entry-header">
                        <h1 class="entry-title"><?php the_title();?></h1>
                    </header><?php */?><!-- .entry-header -->
                    
                    <div class="entry-content">
                        
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                    
                </article>
                
                    <?php

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
				endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<script type='text/javascript' src='http://mwra.knoxtest.com/wp-content/plugins/divi-builder/framework/scripts/frontend-builder-custom-scripts.js?ver=1.1.1'></script>
<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function(){	

 jQuery(".accordion").click(function() {
			
            if(jQuery(this).next("div").is(":visible")){
                jQuery(this).next("div").slideUp("slow");
				jQuery(this).removeClass('active');
            } else {		
				jQuery(".accordion").removeClass('active');
			    jQuery(this).addClass('active');
                jQuery(".tag-list-panel").slideUp("slow");
                jQuery(this).next("div").slideToggle("slow");
				
            }
     });
	 
	  jQuery(".expand_all").click(function() {	
	//  alert('expand');
			    jQuery(".accordion").addClass('active');
                jQuery(".tag-list-panel").slideToggle("slow"); 
				jQuery(".expand_all").hide();$(".collapse_all").show();		
     });
	 
	 jQuery(".collapse_all").click(function() {	
	// alert('colasp');
			    jQuery(".accordion").removeClass('active');
                jQuery(".tag-list-panel").slideUp("slow"); 
				jQuery(".collapse_all").hide();$(".expand_all").show();		
     });

  
  
    //jQuery("a[rel^='prettyPhoto']").prettyPhoto({autoplay_slideshow: false});
	jQuery("#menu-primary-menu  li  a.shiftnav-target").click(function(){
		//alert("Hello");
             jQuery("#shiftnav-toggle-main").trigger("click");
	});
	
	jQuery(function($){
  jQuery('.et_pb_toggle_title').click(function(){   
 
    var $toggle = $(this).closest('.et_pb_toggle');
    
    if (!$toggle.hasClass('et_pb_accordion_toggling')) {	
    
      var $accordion = $toggle.closest('.et_pb_accordion');
      // If Toggle open     
	 if ($toggle.hasClass('et_pb_toggle_open')) {
	  $toggle.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
        $toggle.find('.et_pb_toggle_content').slideUp(700, function() { 
		  }); 
        
      }
      else {
		  $hide = jQuery(".et_pb_module").closest('.et_pb_toggle');	 
		// $hide.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
		
		
		  $toggle.removeClass('et_pb_toggle_close').addClass('et_pb_toggle_open');  
	  }
	  
	
    } 
	
  });
});




jQuery(function($){
    jQuery('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
    jQuery('.et_pb_accordion_1 .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
	
    jQuery('.et_pb_accordion .et_pb_toggle').click(function() {
     $this = $(this);
	  
      setTimeout(function(){
        $this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
      },700);
    });
});


jQuery("body").on("click", "input.open_all", function(){


    var temp = jQuery(this).prop('checked');
   
    var section_no = jQuery(this).attr('data'); 
    var tempid = jQuery(this).prop('id');
 
    var button_no_array = tempid.split('-');
    //console.log(button_no_array);
    var button_no = button_no_array[1];
   //alert('#accordian_custom_'+section_no+' .et_pb_toggle_close');
    //console.log(button_no);
   
    if(temp){
	jQuery('#accordion_custom_'+section_no+' .et_pb_toggle_close').addClass('et_pb_toggle_open').removeClass('et_pb_toggle_close');
	jQuery('#accordion_custom_'+section_no+' .et_pb_toggle_content').css( "display", "block" );
	}else{
	jQuery('#accordion_custom_'+section_no+' .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
	jQuery('#accordion_custom_'+section_no+' .et_pb_toggle_content').css( "display", "none" );
	}
});


jQuery("body").on("click", "input.open_all_newer", function(){
    var temp = $(this).prop('checked');
    if(temp){
	jQuery('.et_pb_accordion_newer .et_pb_toggle_close').addClass('et_pb_toggle_open').removeClass('et_pb_toggle_close');
	jQuery('.et_pb_accordion_newer .et_pb_toggle_content').css( "display", "block" );
	}else{
	jQuery('.et_pb_accordion_newer .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
	jQuery('.et_pb_accordion_newer .et_pb_toggle_content').css( "display", "none" );
	}
});


	
}); 
</script>

<script type="text/javascript">// <![CDATA[

jQuery( document ).ready(function() {
/*add more space for show title*/
      jQuery("#homebanner-whoweare").click(function(){
		jQuery("#whoweare").addClass("addpadding-whoweare");
	});
	jQuery(".menu-item-197 a").click(function(){
		jQuery("#whoweare").removeClass("addpadding-whoweare");
	});
jQuery( ".ab_policy_accordion_page .et_pb_accordion" ).css( "display", "none" );
jQuery( ".ab_policy_accordion_page .et_pb_accordion_0" ).css( "display", "none" );
  jQuery( ".ab_policy_accordion_page .et_pb_accordion_newer" ).css( "display", "none" );
jQuery( ".ab_policy_accordion_page .all_collapse_expand" ).css( "display", "none" );
jQuery( ".ab_policy_accordion_page .all_collapse_expand_newer" ).css( "display", "none" );
});
jQuery(".sub").click(function () {
var section_no = jQuery(this).attr('data');


jQuery(".collapse_all").hide();jQuery(".expand_all").show();
jQuery( ".ab_policy_accordion_page .et_pb_accordion_custom_"+section_no).slideToggle("slow");
jQuery( ".ab_policy_accordion_page .all_custom_collapse_expand_"+section_no ).slideToggle("slow");

 
});

jQuery("#new_post_block").click(function () {

jQuery( ".ab_policy_accordion_page .et_pb_accordion_newer" ).slideToggle("slow");
jQuery( ".ab_policy_accordion_page .all_collapse_expand_newer" ).slideToggle("slow");
});



// ]]></script>
<?php //get_footer(); ?>
<?php get_footer('custom'); ?>
