<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Knoxweb
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<base href="<?=home_url( '/' ); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<?php wp_head(); ?>
<script>
    jQuery(window).scroll(function(){
      var sticky = jQuery('.site-header, .shiftnav-toggle'),
          scroll = jQuery(window).scrollTop();
    
      if (scroll >= 20) sticky.addClass('sticky');
      else sticky.removeClass('sticky');
    });
	

</script>
</head> 
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'knoxweb' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if(!is_front_page()) { ?>
            <div class="home-icon"><a href="<?=home_url( '/' ); ?>"><i class="fa fa-home"></i></a></div>
		<?php } ?>
    	<div class="container">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<!--<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></p>-->
			<?php endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
      <?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
		</div><!-- .site-branding --> 
        <div class="top-header"><?php dynamic_sidebar('top-header'); ?></div><!-- .top-header -->

		<!--<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'knoxweb' ); ?></button>
			<?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>--><!-- #site-navigation -->
        </div><!-- .container -->
	</header><!-- #masthead -->
	<?php 
	$pid = get_the_ID(); 
	if(is_blog ()){
		$blimg = wp_get_attachment_image_src( get_post_thumbnail_id(37), 'full');	
		$image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full'); 
		$himage ="http://mwra.knoxtest.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
	?>
	<div class="com_img">
				<img src="<?php echo ($blimg [0] != "") ? $blimg [0] : $himage; ?>" />
				<div class="subpage-search">
					<div class="container"><?php dynamic_sidebar('header-slider-search'); ?></div>
				 </div>
				<div class="pt-title-main">
					<div class="container">
						<h1 class="pt_title"><?php echo get_the_title(37); ?></h1>
					</div>
				</div>
			</div>
	 <div class="clear"></div>
	<?	
	}elseif(!is_page_template('page-templates/library-template.php') && !is_front_page() && !is_tax('library_tags') && !is_tax('library-cat') && !is_search()){
		 $image = wp_get_attachment_image_src( get_post_thumbnail_id($pid), 'full'); 
		 //$himage ="http://mwra.knoxtest.com/wp-content/uploads/2016/08/MWRA-group-pic.png";
		 $himage =wp_get_attachment_image_src( get_post_thumbnail_id(3464), 'full');
	?>
	 <div class="com_img aa">
				 <!--<img src="<?php echo ($image[0] != "") ? $image[0] : $himage; ?>" />-->
                 <img src="<?php echo ($image[0] != "") ? $image[0] : $himage[0]; ?>" />
				 <div class="subpage-search">
					<div class="container"><?php dynamic_sidebar('header-slider-search'); ?></div>
				 </div>
				<div class="pt-title-main">
					<div class="container">
						 <h1 class="pt_title"><?php 
if( tribe_is_month() && !is_tax() ) { // The Main Calendar Page
echo 'Calendar';
} elseif( tribe_is_month() && is_tax() ) { // Calendar Category Pages
echo 'Calendar' . ' &raquo; ' . single_term_title('', false);
} elseif( tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
echo 'Events List';
} elseif( tribe_is_event() && is_single() ) { // Single Events
echo get_the_title();
} elseif( tribe_is_day() ) { // Single Event Days
echo 'Events on: ' . date('F j, Y', strtotime($wp_query->query_vars['eventDate']));
} elseif( tribe_is_venue() ) { // Single Venues
echo get_the_title();
} else {
echo get_the_title();
}
						//echo get_the_title( $pid ); ?></h1> 
					</div>
				</div>
	</div>
			
	<?php	
	}
	?>
	
       
	<div id="content" class="site-content">

	<?php if(is_home() || is_single() || is_category() || is_404()) { ?>
		<div class="container">
	<?php } ?>