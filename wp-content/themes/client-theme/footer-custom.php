<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knoxweb
 */

?>

	<?php if(is_home() || is_single() || is_archive() || is_category() || is_search() || is_404()) { ?>
		</div>
	<?php } ?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="foot-left"><?php dynamic_sidebar('footer-menu'); ?></div><!-- .foot-left -->
			<div class="foot-right"><?php dynamic_sidebar('footer-copyright'); ?></div> <!-- .foot-right -->
        </div><!-- .container -->
			
	</footer><!-- #colophon -->
	

	
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
 jQuery('.library-list-slider').bxSlider({
    slideWidth: 200,
    minSlides: 4,
    maxSlides: 4,
    moveSlides: 4,
    pager: false,	
    slideMargin: 10,
    infiniteLoop: false,
    controls: (jQuery(".library-list-slider> li ").length > 5) ? true: false,

  });
 jQuery('.library-most-popular-list-slider').bxSlider({
    slideWidth: 200,
    minSlides: 4,
    maxSlides: 4,
    moveSlides: 1,
    pager: false,	
    slideMargin: 10,
    infiniteLoop: false,
    controls: (jQuery(".library-list-slider> li ").length > 5) ? true: false,

  });
    
   jQuery('.fancybox').fancybox();
});
</script>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->

<!--<script type="text/javascript" src="wp-content/themes/client-theme/js/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(function() {
    jQuery('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = jquery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          jQuery('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });
</script>
-->




<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function(){	   
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({autoplay_slideshow: false});
	jQuery("#menu-primary-menu  li  a.shiftnav-target").click(function(){
		//alert("Hello");
              $("#shiftnav-toggle-main").trigger("click");
	});
	
	/*
	
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
				$(".expand_all").hide();$(".collapse_all").show();		
     });
	 
	 jQuery(".collapse_all").click(function() {	
	// alert('colasp');
			    jQuery(".accordion").removeClass('active');
                jQuery(".tag-list-panel").slideUp("slow"); 
				$(".collapse_all").hide();$(".expand_all").show();		
     });
	
	
	
	jQuery(function($){
  $('.et_pb_toggle_title').click(function(){   
 
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
		  $hide = $(".et_pb_module").closest('.et_pb_toggle');	 
		// $hide.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
		
		
		  $toggle.removeClass('et_pb_toggle_close').addClass('et_pb_toggle_open');  
	  }
	  
	
    } 
	
  });
});




jQuery(function($){
    $('.et_pb_accordion .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
    $('.et_pb_accordion_1 .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
	
    $('.et_pb_accordion .et_pb_toggle').click(function() {
     //$this = $(this);
	  
      setTimeout(function(){
        $this.closest('.et_pb_accordion').removeClass('et_pb_accordion_toggling');
      },700);
    });
});


$("body").on("click", "input.open_all", function(){


    var temp = $(this).prop('checked');
   
    var section_no = $(this).attr('data'); 
    var tempid = $(this).prop('id');
 
    var button_no_array = tempid.split('-');
    //console.log(button_no_array);
    var button_no = button_no_array[1];
   //alert('#accordian_custom_'+section_no+' .et_pb_toggle_close');
    //console.log(button_no);
   
    if(temp){
	$('#accordion_custom_'+section_no+' .et_pb_toggle_close').addClass('et_pb_toggle_open').removeClass('et_pb_toggle_close');
	$('#accordion_custom_'+section_no+' .et_pb_toggle_content').css( "display", "block" );
	}else{
	$('#accordion_custom_'+section_no+' .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
	$('#accordion_custom_'+section_no+' .et_pb_toggle_content').css( "display", "none" );
	}
});


$("body").on("click", "input.open_all_newer", function(){
    var temp = $(this).prop('checked');
    if(temp){
	$('.et_pb_accordion_newer .et_pb_toggle_close').addClass('et_pb_toggle_open').removeClass('et_pb_toggle_close');
	$('.et_pb_accordion_newer .et_pb_toggle_content').css( "display", "block" );
	}else{
	$('.et_pb_accordion_newer .et_pb_toggle_open').addClass('et_pb_toggle_close').removeClass('et_pb_toggle_open');
	$('.et_pb_accordion_newer .et_pb_toggle_content').css( "display", "none" );
	}
});


	
}); 


$( document ).ready(function() {
/*add more space for show title*/

  jQuery(function($){
  
       $("#homebanner-whoweare").click(function(){
		$("#whoweare").addClass("addpadding-whoweare");
	});
	$(".menu-item-197 a").click(function(){
		$("#whoweare").removeClass("addpadding-whoweare");
	});
	
});
	/*
	
$( ".ab_policy_accordion_page .et_pb_accordion" ).css( "display", "none" );
 $( ".ab_policy_accordion_page .et_pb_accordion_0" ).css( "display", "none" );
  $( ".ab_policy_accordion_page .et_pb_accordion_newer" ).css( "display", "none" );
$( ".ab_policy_accordion_page .all_collapse_expand" ).css( "display", "none" );
$( ".ab_policy_accordion_page .all_collapse_expand_newer" ).css( "display", "none" );
});
$(".sub").click(function () {
var section_no = $(this).attr('data');


$(".collapse_all").hide();$(".expand_all").show();
$( ".ab_policy_accordion_page .et_pb_accordion_custom_"+section_no).slideToggle("slow");
$( ".ab_policy_accordion_page .all_custom_collapse_expand_"+section_no ).slideToggle("slow");

 
});

$("#new_post_block").click(function () {

$( ".ab_policy_accordion_page .et_pb_accordion_newer" ).slideToggle("slow");
$( ".ab_policy_accordion_page .all_collapse_expand_newer" ).slideToggle("slow");
*/
});



// ]]></script>


<script type="text/javascript">
//$( document ).ready(function() {
    
jQuery(function($){    

$('.et_pb_toggle_title').click( function(){
			var $this_heading         = $(this),
				$module               = $this_heading.closest('.et_pb_toggle'),
				$section              = $module.parents( '.et_pb_section' ),
				$content              = $module.find('.et_pb_toggle_content'),
				$accordion            = $module.closest( '.et_pb_accordion' ),
				is_accordion          = $accordion.length,
				is_accordion_toggling = $accordion.hasClass( 'et_pb_accordion_toggling' ),
				$accordion_active_toggle;

			if ( is_accordion ) {
				if ( $module.hasClass('et_pb_toggle_open') || is_accordion_toggling ) {
					return false;
				}

				//$accordion.addClass( 'et_pb_accordion_toggling' );
				//$accordion_active_toggle = $module.siblings('.et_pb_toggle_open');
			}

			if ( $content.is( ':animated' ) ) {
				return;
			}

			$content.slideToggle( 700, function() {
				if ( $module.hasClass('et_pb_toggle_close') ) {
					// $module.removeClass('et_pb_toggle_close').addClass('et_pb_toggle_open'); 
				} else {
					 //$module.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close'); 
				}

				if ( $section.hasClass( 'et_pb_section_parallax' ) && !$section.children().hasClass( 'et_pb_parallax_css') ) {
					$.proxy( et_parallax_set_height, $section )();
				}
			} );
			
           /*
			if ( is_accordion ) {
				$accordion_active_toggle.find('.et_pb_toggle_content').slideToggle( 700, function() {
					$accordion_active_toggle.removeClass( 'et_pb_toggle_open' ).addClass('et_pb_toggle_close');
					$accordion.removeClass( 'et_pb_accordion_toggling' );
				} );
			}
			*/
		} );




});
</script>

<script type="text/javascript">
var pixelRatio = window.devicePixelRatio || 1;
if(window.innerWidth/pixelRatio < 241 ) {
  easy_fancybox_handler = null;
};
</script>
</body>
</html>
