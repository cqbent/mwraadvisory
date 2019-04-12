<?php
/*Plugin Name: Old Post*/

function show_older_post($atts){
	
	$rt = "";
	global $wpdb;
	$limit=$atts['limit'];
	
	$rt .= '<div class="et_pb_module et_pb_toggle et_pb_accordion_item_1 et_pb_toggle_close">
<h5 id="new_post_block" class="et_pb_toggle_title"><span style="color: #4ebcf9;">Older Posts…</span></h5>
'.expand_all_checkbox_newer_old('2').'</div>';
	
	
	$query = "select * from ".$wpdb->prefix."posts where post_date <= '2016-06-14 00:00:00' and post_type='post' and post_status='publish' limit 0,".$limit."";
	$results = $wpdb->get_results($query);
	foreach($results as $row){
		
		/*$rt.= '<div><a class="helooo" href="http://mwraadvisoryboard.com/'.$row->post_name.'">'.$row->post_title.'</a></div>';
		$rt.='<div>'.$row->post_content.'</div>';*/
		
	$rt .= '<div class="et_pb_module et_pb_accordion  et_pb_accordion_newer" style="display:none"><p></p><div class="et_pb_module et_pb_toggle  et_pb_accordion_item_100'.$row->ID.' et_pb_toggle_close"><h5 class="et_pb_toggle_title"><a href="http://mwraadvisoryboard.com/'.$row->post_name.'">'.$row->post_title.'</a></h5><div class="et_pb_toggle_content clearfix"><ul><li>'.$row->post_content.'</li></ul></div></div></div>';
		
	}
	
	return $rt;
}
add_shortcode('older_posts_display','show_older_post');

//********************************************************************************************************8

function expand_all_checkbox_newer_old($attr) {
$button_no = $attr['button_no'];

$output = '<div class="all_collapse_expand_newer" ><input class="open_all_newer"  type="checkbox" id="myonoffswitch-'.$button_no.'">
<label class="onoffswitch-label" for="myonoffswitch-'.$button_no.'">
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

add_shortcode('expand_all_checkbox_newer_old', 'expand_all_checkbox_newer_old');

?>