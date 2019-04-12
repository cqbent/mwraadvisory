<?php 

require_once('../../../../wp-load.php');

 $tribe_event_id = (isset($_REQUEST['tribe_event_id']) && !empty($_REQUEST['tribe_event_id']))?$_REQUEST['tribe_event_id']:'';


$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

 $event_id = $tribe_event_id ;


?>
<div class="single-tribe_events popup-events-details">
<div class="container">
<div id="tribe-events">
<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices($event_id) ?>
   
	<h1 class="tribe-events-single-event-title" style="padding-bottom:10px"><?php echo get_the_title( $event_id ); ?></h1>
  
	<div class="tribe-events-schedule tribe-clearfix">
	<p>	<?php echo tribe_events_event_schedule_details( $event_id, '<p style="margin-bottom:10px">', '</p>' ); ?> </p>
		<?php if ( tribe_get_cost($event_id) ) : ?>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->

	<?php 
	query_posts("p=$event_id&post_type=tribe_events");
	while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>
		
			<!-- Event meta -->
			
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' );

			?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			
		</div> <!-- #post-x -->
		
			<!-- .tribe-events-single-event-description -->
		
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
           
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
</div><!-- #tribe-events -->
</div><!-- .container --->
</div>
<?php exit; ?>