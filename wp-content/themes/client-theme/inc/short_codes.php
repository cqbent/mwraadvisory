<?php
/**
 * Shortcode for latest events
 **/
if(!function_exists('srt_cd_get_events_list_popup')){
	function srt_cd_get_events_list_popup($atts){
			
		$return = '';
		$atts = shortcode_atts( array(
				'limit' => 3,
				'ids'   => '', 
				'view_all_events' => 'View Full MWRA Advisory Board Calendar' 	
		), $atts, 'EVENTS_LIST_POPUP' );

		$limit = $atts['limit'];
		$view_all_events = $atts['view_all_events'];	
		$ids = $atts['ids'];
		
		
		
		$latest_events_args = array(
                                   'posts_per_page' => $limit,
                                   'start_date' => date( 'Y-m-d H:i:s' )
                                    );
$latest_events = tribe_get_events( $latest_events_args  );
		//$latest_events = get_posts($latest_events_args);
		
		if(!empty($latest_events)){
				
		
			$return .= '<div class="events_popup_list_section">';
				$return .= '<ul class="events_popup_lists">';
					foreach($latest_events as $latest_event){
						
						$return .= '<li>';
							$return .= '<a  class="various fancybox.ajax"  href="'.get_stylesheet_directory_uri().'/actions/action_show_event.php?tribe_event_id='.$latest_event->ID.'">'.truncatebywords(strip_tags($latest_event->post_title),10);							
							$return .= '<p>'.tribe_get_start_date($latest_event->ID).'</p>';
							$return .= '<p>'.tribe_get_venue($latest_event->ID).'</p>';
							$return .= '</a>';
							
							/*
							 $link_text = truncatebywords(strip_tags($latest_event->post_title),10);
						 	 $link_text .= '<p>'.tribe_get_start_date($latest_event->ID).'</p>';
						     $link_text .= '<p>'.tribe_get_venue($latest_event->ID).'</p>';
							 $return .= do_shortcode('[wp_colorbox_media url="'.get_stylesheet_directory_uri().'/actions/action_show_event.php?tribe_event_id='.$latest_event->ID.'" type="iframe" hyperlink="'.$link_text.'"]');
							 */
						$return .= '</li>';
				
			}
			
			$return .= '</ul>';	
			$return .= '<a href="'. esc_url( tribe_get_events_link() ) .'" rel="bookmark">'.esc_html__( $view_all_events, 'the-events-calendar' ).'</a>';			
			$return .= '</div>';
		}
		
		return $return;
	}
	add_shortcode( 'EVENTS_LIST_POPUP', 'srt_cd_get_events_list_popup' );
}
if ( !function_exists( 'truncatebywords' ) ){
	function truncatebywords($phrase, $max_words){
	   $phrase_array = explode(' ',$phrase);
	   if(count($phrase_array) > $max_words && $max_words > 0)
		  $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).' ...';
	   return $phrase;
	}
}

if ( !function_exists( 'truncatebychars' ) ){
	function truncatebychars($chars, $limit){ 
		if(strlen($chars) <= $limit)
			return $chars; 
		else
			return substr($chars,0,$limit);
	}
}
?>