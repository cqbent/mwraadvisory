<?php /**
 * Plugin Name: My Advisory Board
 * Plugin URI: http://mwraadvisoryboard.com/advisory-board/
 * Description: This plugin show the list of CEO and Designees to our single posts.
 */
add_shortcode('show_advisory_list','advisory_list');
function advisory_list($attr){
global $wpdb,$wp_query,$current_user;
$type = strtolower($attr['type']);

	if($type == 'advisoryboard'){	
	$query = "SELECT u1.ID,u1.display_name,u1.user_login, m1.meta_value AS community, m2.meta_value AS ceo FROM wp_users u1
JOIN wp_usermeta m1 ON ( m1.user_id = u1.ID AND m1.meta_key =  'city' ) JOIN wp_usermeta m2 ON ( m2.user_id = u1.ID AND m2.meta_key =  'user_list' AND (m2.meta_value =  'CEO' || m2.meta_value =  'Designees')) GROUP BY community,ceo ORDER BY community ASC";
		
		//echo $query;exit;
		$result = $wpdb->get_results($query); //echo '<pre>'; print_r($result);
		$myarr  = array();
		foreach($result as $kk => $vv){
			
			if($vv->ceo == 'CEO'){
				$city1 = $vv->community;
				$ceo = $vv->ceo;
                $ceo_id = $vv->ID;
				$ceo_name = $vv->display_name;
			}elseif($vv->ceo == 'Designees'){
				$city2 = $vv->community;
				$designees = $vv->ceo;
				$designees_id = $vv->ID;
				$designees_name = $vv->display_name;
			}
			if($city1 == $city2){
				$ceo = $ceo;
                $ceo_id = $ceo_id;
				$designees = $designees;
				$designees_id = $designees_id;
				$designees_name = $designees_name;
				$ceo_name = $ceo_name;
				$city = $city1 = $city2;
				$myarr[] = array(
							'community' => $city,
							'ceo' => $ceo,
							'designees' => $designees,
							'ceo_id' => $ceo_id,
							'designees_id' => $designees_id,
							'ceo_name' => $ceo_name,
							'designees_name' => $designees_name
				        );
			}	
		}
		
		//echo '<pre>'; print_r($myarr);
 //exit;
}
?>
<table class="executive-committee-table" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
            <tr class="table-tit">
                <td><b>Community</b></td>
                <td><b>CEO</b></td>
                <td><b>Designee</b></td>
            </tr>
		
			<?php
            if(count($myarr)>0){
				foreach($myarr as $row => $em)
				{
					?>
					<tr>
						<td><?php echo $em['community'];?></td>
						<td><?php echo $em['ceo_name'];?></td>
						<td><?php echo $em['designees_name'];?></td>
					</tr>
					<?php
				}
            }
			else
			{
				?>
                <tr>
					<td colspan="3" align="center">No Record Found!</td>
                </tr>        
                <?php
			}
            ?>				             
		</tbody></table>
<?php }?>