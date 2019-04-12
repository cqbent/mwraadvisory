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
jQuery('.fancybox').fancybox();
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
	
	
 

	
}); 
</script>

<script type="text/javascript">// <![CDATA[

$( document ).ready(function() {
/*add more space for show title*/
       $("#homebanner-whoweare").click(function(){
		$("#whoweare").addClass("addpadding-whoweare");
	});
	$(".menu-item-197 a").click(function(){
		$("#whoweare").removeClass("addpadding-whoweare");
	});
});

// ]]></script>

<script type="text/javascript">
var pixelRatio = window.devicePixelRatio || 1;
if(window.innerWidth/pixelRatio < 241 ) {
  easy_fancybox_handler = null;
};
</script>
</body>
</html>
