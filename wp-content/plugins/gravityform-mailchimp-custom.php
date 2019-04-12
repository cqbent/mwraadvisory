<?php
/*
 * Plugin Name: Gravity form Mailchimp
 * Plugin URI: http://jamtechtechnologies.com/
 * Version: 1.0
 * Description: Plugin for code i did for conditional form with Gravity of mailchimp
 * Author: Ajay Prakash Shukla
 * Author URI: http://ajaywebphp.blogspot.com
 */
// Code for gravity form submit hook

add_action( 'gform_after_submission_8', 'after_submission_gravity_signup', 10, 2 );

function after_submission_gravity_signup($entry,$form){
    global $wpdb;
	
    $selection = $entry['1'];
    $array_list = array();
    if($selection=="a Ratepayer"){
     $my_email_variable = $entry['8'];
     $array_list[]      = $entry['15.1'];
     $array_list[]      = $entry['15.2']; 
     $array_list[]      = $entry['15.3']; 
 
    }elseif($selection=="an Advisory Board Member"){
     $my_email_variable = $entry['9'];
     $array_list[]      = $entry['16.1'];
     $array_list[]      = $entry['16.2']; 
     $array_list[]      = $entry['16.3'];
     $array_list[]      = $entry['16.4'];
     $array_list[]      = $entry['16.5']; 
     $array_list[]      = $entry['16.6'];

    }elseif($selection=="an Elected Official"){
     $my_email_variable = $entry['14'];
     $array_list[]      = $entry['17.1'];
     $array_list[]      = $entry['17.2']; 
     $array_list[]      = $entry['17.3'];
     $array_list[]      = $entry['17.4'];
     $array_list[]      = $entry['17.5']; 
     $array_list[]      = $entry['17.6'];
    }elseif($selection=="interested in Environmental System Information"){
     $my_email_variable = $entry['11'];
     $array_list[]      = $entry['18.1'];
     $array_list[]      = $entry['18.2']; 
     $array_list[]      = $entry['18.3'];
    }elseif($selection=="a Member of the Press"){
     $my_email_variable = $entry['10'];
     $array_list[]      = $entry['19.1'];
     $array_list[]      = $entry['19.2']; 
     $array_list[]      = $entry['19.3'];
	 $array_list[]      = $entry['19.4'];
    }
	 
	//Register User 
	if (email_exists(trim($my_email_variable)) == false ) {
		$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );		
		$my_username_variable = explode("@",trim($my_email_variable));
		$wpuser_id = wp_create_user( $my_username_variable[0], $random_password, trim($my_email_variable) );
	} else {
		$user = get_user_by( 'email', trim($my_email_variable) );
		$wpuser_id = $user->ID; 
		$my_username_variable[0] = $user->user_login; 
	} 
		
	//Remove update before 
	$query = "UPDATE ".$wpdb->prefix."wysija_user SET wpuser_id='' WHERE wpuser_id='".$wpuser_id."' ";
	$wpdb->query($query);
		
    $user_data = array(
		'wpuser_id' => $wpuser_id,
        'email' => $my_email_variable,
        'firstname' => $my_username_variable[0],
        'lastname' => ''
        );
    $list = array_diff($array_list, array('') );
   
    $data_subscriber = array(
      'user' => $user_data,
      'user_list' => array('list_ids' =>$list)
    );
 	
    $helper_user = WYSIJA::get('user','helper');
    $helper_user->addSubscriber($data_subscriber);
}

?>