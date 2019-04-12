<?php
/*
Plugin Name: gf Custom export
Description: Plugin used for export form entries.
Author: Ajay Shukla
Version: 1.0

*/
add_shortcode('forms_enteries_export','forms_enteries_export_fun');
function forms_enteries_export_fun()
{	
		gf_add_export_button();
		$output ='';
		$output .='<div><form action="" method="post" id="gf_export">';
		$output .='<select id="form_id" name="form_id">';
		$output .='<option value="">Select form</option><option value="32">survey 2016</option>';
		$output .='</select><br/>';
		$output .='<input type="hidden" id="gf_nonce" name="gf_nonce" value="'.wp_create_nonce('gf_export_nonce').'"><input type="submit" class="button button-large button-primary" name="btn_export" id="btn_export" value="Export">';
		$output .='</form></div>';
		
		return $output;
	
}
function gf_add_export_button() {
	
    wp_enqueue_script( 'gf_custom_script', get_stylesheet_directory_uri() . '/js/gf_custom_script.js' );
}
//add_action( 'admin_enqueue_scripts', 'gf_add_export_button' );


function gf_custom_export_entries_fun()
{
	
	$my_nonce = $_POST['my_nonce'];
	$action = $_POST['action'];
	
	if(isset($_POST['btn_export']) && wp_verify_nonce($_POST['gf_nonce'], 'gf_export_nonce'))
	{
		$form_id = $_POST['form_id'];
		if ( empty( $form_id ) ) {
			die();
		}
		$form = GFAPI::get_form( $form_id );
		if ( empty( $form ) ) {
			die();
		}

        $filename = sanitize_title_with_dashes( $form['title'] ) . '-' . gmdate( 'Y-m-d', GFCommon::get_local_timestamp( time() ) ) . '.xls';
		
		
		
		$entries = GFAPI::get_entries( $form_id );
		
		
		
		$header = '';
        $result ='';
		
		$fields  = get_all_form_fields($form_id);
		echo "<pre>";
		//print_r($fields);
		//print_r($entries);
		//exit;
		$table1_len = unserialize($entries[1][141]);
		for($i=0;$i<3;$i++){
			$blank['Range']='';
			$blank['Unit']='';
			$blank['Rate']='';
			$main_blank[]=$blank;
		}
		$r=array_merge($table1_len,$main_blank);
		//print_r($main_blank);
		print_r($r);
		exit;
		foreach($fields as $filds_arr)
		{
			$fid[] = $filds_arr[0];
			$fname[] = $filds_arr[1];
			$header .= '"' .$filds_arr[1].'"' ."\t";
		}
		
		//echo $header;
				//exit;
		foreach($entries as $data)
		{
			//$header .= $key."\t";
			$line = '';
			$count=0;
			foreach($fid as $fid_val)
			{
				        if ( ( !isset( $data[$fid_val] ) ) || ( $data[$fid_val] == "" ) )
						{
							$data[$fid_val] = "\t";
						}
						else
						{
							$data[$fid_val] = str_replace( '"' , '""' , $data[$fid_val] );
							$data[$fid_val] = '"' . $data[$fid_val] . '"' . "\t";
						}
						$line .= $data[$fid_val];
			}
			$result .= trim( $line ) . "\n";
			
		}
		
		$charset = get_option( 'blog_charset' );
		/*header( 'Content-Description: File Transfer' );
		header( "Content-Disposition: attachment; filename=$filename" );
		header( 'Content-Type: text/csv; charset=' . $charset, true );
		$buffer_length = ob_get_length(); //length or false if no buffer
		if ( $buffer_length > 1 ) {
			ob_clean();
		}*/
		
		/*header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$filename");
		header("Pragma: no-cache");
		header("Expires: 0");*/
		header('Content-type: text/csv; charset=' . $charset, true);  
    header("Content-Disposition: attachment; filename=$filename");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
		
		echo ucwords($header) . "\n" . $result . "\n"; 
		
		
		
		exit;
		
	}
}
add_action('init','gf_custom_export_entries_fun');
//add_action('wp_ajax_gf_custom_export_entries', 'gf_custom_export_entries_fun');
//add_action('wp_ajax_nopriv_gf_custom_export_entries', 'gf_custom_export_entries_fun');

function get_all_form_fields($form_id){
        $form = RGFormsModel::get_form_meta($form_id);
        $fields = array();

        if(is_array($form["fields"])){
            foreach($form["fields"] as $field){
                if(isset($field["inputs"]) && is_array($field["inputs"])){

                    foreach($field["inputs"] as $input)
                        $fields[] =  array($input["id"], GFCommon::get_label($field, $input["id"]));
                }
                else if(!rgar($field, 'displayOnly')){
                    $fields[] =  array($field["id"], GFCommon::get_label($field));
                }
            }
        }
        //echo "<pre>";
        //print_r($fields);
        //echo "</pre>";
        return $fields;
    }

?>