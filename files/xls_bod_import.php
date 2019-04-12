<?php
require('../wp-config.php');
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Connection Error");
mysql_select_db(DB_NAME) or die("Database Error");
include 'phpexcelreader/excel_reader.php';     // include the class

// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;

$user_list = 'BOD';
$file = "BOD Database.xls";
$datetime = date('Y-m-d H:i:s');

$excel->read('xls/'.$file);

// this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
function sheetData($sheet) {
  global $user_list, $file, $datetime;
  	
  $re = '<table>';     // starts html table
	
	if($user_list=='BOD')	
	{
		//wp_users
		$wp_users_columns = array('display_name','user_nicename','user_pass','user_login','user_email','user_url','user_registered','user_activation_key','user_status');
		
		//wp_usermeta
		$wp_usermeta_columns = array('meta_key','meta_value','user_id');	
		
		//wp_cimy_uef_data
		$wp_cimy_uef_data_columns = array('FIELD_ID','VALUE','USER_ID');	
		
		//wp_wysija_user
		$wp_wysija_user_columns = array('firstname','lastname','email','domain','created_at','status','wpuser_id');		
		
		//wp_wysija_user_list
		$wp_wysija_user_list_columns = array('list_id','sub_date','unsub_date','user_id');		
					  
		$x = 1;
		$sql_wp_user_values = array();
		while($x <= $sheet['numRows']) {
			$re .= "<tr>\n";
			$y = 1;
			$display_name = '';
			$user_nicename = '';
			$user_nickname = '';
			$Email = '';
			
			$wp_user_values = array();			
			$wp_usermeta_values = array();
			$wp_cimy_uef_data_values = array();
			$wp_wysija_user_values = array();
			$wp_wysija_user_list_values = array();
						
			while($y <= $sheet['numCols']) {				
							
				//Name Field								
				if($y==1 || $y==2)
				{
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					
					if($display_name!="")
					{
						$display_name.= " ".addslashes(trim($cell));
						$user_nickname.= ".".addslashes(trim($cell));
						$user_nicename.= "-".addslashes(trim(strtolower(str_replace(",","-",str_replace(".","",str_replace(" ","-",$cell))))));
					}
					else
					{
						$display_name.= addslashes(trim($cell));
						$user_nickname.= addslashes(trim($cell));
						$user_nicename.= addslashes(trim(strtolower(str_replace(",","-",str_replace(".","",str_replace(" ","-",$cell))))));						
					}
					
					if($y==1)
					{
						$wp_usermeta_values[] = " VALUES('first_name','".addslashes(trim($cell))."', '%s')";
							
						//MailPoet User
						$wp_wysija_user_values[] = addslashes(trim($cell)); //First Name
					}
					
					if($y==2)
					{
						$wp_user_values[] = $display_name;
						$wp_user_values[] = $user_nicename;
						$wp_user_values[] = md5($user_nicename);
												
						$wp_usermeta_values[] = " VALUES('last_name','".addslashes(trim($cell))."', '%s')";	
						$wp_usermeta_values[] = " VALUES('nickname','".$user_nickname."', '%s')";
						
						//MailPoet User
						$wp_wysija_user_values[] = addslashes(trim($cell));	 //Last Name
					}					
				}	
				else if($y==3)	//Email Field
				{
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$cell = addslashes($cell);
					$Email = trim($cell);
					
					$wp_user_values[] = trim($cell);
					$wp_user_values[] = trim($cell);
					$wp_user_values[] = '';
					$wp_user_values[] = $datetime;
					$wp_user_values[] = '';
					$wp_user_values[] = 0;
					
					//Another Fields For UserMeta Table
					$wp_usermeta_values[] = " VALUES('description','', '%s')";
					$wp_usermeta_values[] = " VALUES('rich_editing','true', '%s')";	
					$wp_usermeta_values[] = " VALUES('comment_shortcuts','false', '%s')";	
					$wp_usermeta_values[] = " VALUES('admin_color','fresh', '%s')";
					$wp_usermeta_values[] = " VALUES('use_ssl','0', '%s')";
					$wp_usermeta_values[] = " VALUES('show_admin_bar_front','true', '%s')";
					$wp_usermeta_values[] = " VALUES('wp_capabilities','a:1:{s:10:\"subscriber\";b:1;}', '%s')";
					$wp_usermeta_values[] = " VALUES('wp_user_level','0', '%s')";
					$wp_usermeta_values[] = " VALUES('dismissed_wp_pointers','', '%s')";	
					$wp_usermeta_values[] = " VALUES('cupp_meta','', '%s')";
					$wp_usermeta_values[] = " VALUES('cupp_upload_meta','', '%s')";	
					$wp_usermeta_values[] = " VALUES('cupp_upload_edit_meta','', '%s')";	
					$wp_usermeta_values[] = " VALUES('googleplus','', '%s')";	
					
					//MailPoet User
					$wp_wysija_user_values[] = trim($cell); //Email	
					$cell_temp = explode("@",trim($cell));					
					$wp_wysija_user_values[] = $cell_temp[1]; //Domain			 			
					$wp_wysija_user_values[] = strtotime($datetime); //Created At						
					$wp_wysija_user_values[] = 1; //Status
					$wp_wysija_user_values[] = '%s'; //Wp User Id	
					
				}
				else if($y==4)	//Job Title Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';					
					$wp_cimy_uef_data_values[]  = " VALUES('1','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==5)	//Street Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('2','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==6)	//City/Town Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('3','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==7)	//State Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('4','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==8)	//Zip code Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('5','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==9)	//Work Telephone Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('6','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==10)	//Fax Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('7','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==11)	//Cell Phone Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('8','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==12)	//Home Telephone Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$wp_cimy_uef_data_values[]  = " VALUES('9','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==13)	//Community Designation Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';	
					$cell = str_replace(", ",",",$cell);
					
					$wp_cimy_uef_data_values[]  = " VALUES('12','".$user_list."', '%s')"; 				
					$wp_cimy_uef_data_values[]  = " VALUES('13','".addslashes(trim($cell))."', '%s')"; 				
				}
				else if($y==14)	//Categories Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$cell = str_replace(", ",",",$cell);
					
					$wp_cimy_uef_data_values[]  = " VALUES('14','".addslashes(trim($cell))."', '%s')"; 
				}
				else if($y==15)	//Mailing Subscriptions Field
				{
					//Another Fields For User Table
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					
					//Explode Mail List
					$wp_wysija_user_list_values[]  = " VALUES('2','".strtotime($datetime)."','0','%s')"; //Default WordPress Users
					$mail_sub = explode(",",$cell);					
					if(count($mail_sub)>0){
						foreach($mail_sub as $ms){
							if(trim(strtolower($ms))=='wordPress users'){ continue; } //Is Already set default up line (2)
																					
							$query_wp_wysija_list = "SELECT list_id FROM wp_wysija_list WHERE LCASE(name)='".trim(strtolower($ms))."' ";
							$result_wp_wysija_list = mysql_query($query_wp_wysija_list);
							if(mysql_affected_rows()>0)
							{
								$row_wp_wysija_list = mysql_fetch_array($result_wp_wysija_list);
								$wp_wysija_user_list_values[]  = " VALUES('".$row_wp_wysija_list['list_id']."','".strtotime($datetime)."','0','%s')";
							}							
						}
					}
				}
				
				$re .= " <td>$cell</td>\n";  
				$y++;
			}  
			
			if($x>1)
			{							
				//Execute User
				$chk_sql_wp_user = "SELECT ID FROM `wp_users` WHERE user_login='".$Email."' or user_email='".$Email."' ";
				$chk_res_wp_user = mysql_query($chk_sql_wp_user) or die(mysql_error());	
				if(mysql_affected_rows()>0){					
					$chk_row_wp_user = mysql_fetch_array($chk_res_wp_user);
					
					$sql_delete_wp_usermeta = "DELETE FROM `wp_usermeta` WHERE user_id='".$chk_row_wp_user['ID']."' ";
					mysql_query($sql_delete_wp_usermeta) or die(mysql_error());	
					
					$sql_delete_wp_cimy_uef_data = "DELETE FROM `wp_cimy_uef_data` WHERE USER_ID='".$chk_row_wp_user['ID']."' ";
					mysql_query($sql_delete_wp_cimy_uef_data) or die(mysql_error());
					
					$sql_delete_wp_wysija_user = "DELETE wwu, wwul FROM `wp_wysija_user` as wwu JOIN `wp_wysija_user_list` as wwul ON wwu.user_id=wwul.user_id WHERE wwu.wpuser_id='".$chk_row_wp_user['ID']."' ";
					mysql_query($sql_delete_wp_wysija_user) or die(mysql_error());	
										
					$user_id = $chk_row_wp_user['ID'];	
				}
				else
				{
					$sql_wp_user = "INSERT INTO `wp_users` (`".implode("`, `",$wp_users_columns)."`) VALUES('".implode("','",$wp_user_values)."');";
					echo $sql_wp_user;
					mysql_query($sql_wp_user) or die(mysql_error());			
					$user_id = mysql_insert_id();	
					echo '<br /><br />';
				}
				
				
				
				if($user_id>0)
				{
					//Execute User Meta Fields with all collect record individual
					for($r=0;$r<count($wp_usermeta_values);$r++){
						$sql_wp_usermeta = "INSERT INTO `wp_usermeta` (`".implode("`, `",$wp_usermeta_columns)."`) ";				
						$sql_wp_usermeta.= $wp_usermeta_values[$r].";";
						echo $sql_wp_usermeta = str_replace('%s',$user_id,$sql_wp_usermeta);
						mysql_query($sql_wp_usermeta) or die(mysql_error());
						echo '<br /><br />';
					}
					
					
					//Execute User Extra Fields with all collect record individual
					for($r=0;$r<count($wp_cimy_uef_data_values);$r++){
						$sql_wp_cimy_uef_data = "INSERT INTO `wp_cimy_uef_data` (`".implode("`, `",$wp_cimy_uef_data_columns)."`) ";				
						$sql_wp_cimy_uef_data.= $wp_cimy_uef_data_values[$r].";";	
						echo $sql_wp_cimy_uef_data = str_replace('%s',$user_id,$sql_wp_cimy_uef_data);
						mysql_query($sql_wp_cimy_uef_data) or die(mysql_error());
						echo '<br /><br />';
					}
					
					
					
					//Execute User MailPoet User with all collect record individual
					$sql_wysija_user = "INSERT INTO `wp_wysija_user` (`".implode("`, `",$wp_wysija_user_columns)."`)  VALUES('".implode("','",$wp_wysija_user_values)."');";
					echo $sql_wysija_user = str_replace('%s',$user_id,$sql_wysija_user);
					mysql_query($sql_wysija_user) or die(mysql_error());
					$user2_id = mysql_insert_id();		
					$mysql_affected_rows = mysql_affected_rows();
					echo '<br /><br />';
					
					
					if($mysql_affected_rows>0)
					{	
						//Execute User MailPoet Subscription with all collect record individual	
						for($r=0;$r<count($wp_wysija_user_list_values);$r++){		
							$sql_wysija_user_list = "INSERT INTO `wp_wysija_user_list` (`".implode("`, `",$wp_wysija_user_list_columns)."`) ";				
							$sql_wysija_user_list.= $wp_wysija_user_list_values[$r].";";	
							echo $sql_wysija_user_list = str_replace('%s',$user2_id,$sql_wysija_user_list);												
							mysql_query($sql_wysija_user_list) or die(mysql_error());
							echo '<br /><br />';
						}
					}
					
					$re .= " <td style='color:#090'>Success</td>\n"; 
				}
				else
				{
					$re .= " <td style='color:#F00'>Fail</td>\n"; 
				}
			}
			else
			{
				$re .= " <td>Action</td>\n"; 
			}
			
			$re .= "</tr>\n";
			
			
			echo '<br /><br />----------------------------<br /><br />';
			
			
			$x++;
		}			
	}
	else
	{
		$x = 1;
		while($x <= $sheet['numRows']) {
			$re .= "<tr>\n";
			$y = 1;
			while($y <= $sheet['numCols']) {
				$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
				$re .= " <td>$cell</td>\n";  
				$y++;
			}  
			$re .= "</tr>\n";
			$x++;
		}
	}
	
	return $re .'</table>';     // ends and returns the html table
}

$nr_sheets = count($excel->sheets);       // gets the number of sheets
$excel_data = '';              // to store the the html tables with data of each sheet

// traverses the number of sheets and sets html table with each sheet data in $excel_data
for($i=0; $i<$nr_sheets; $i++) {
  $excel_data .= '<h4>Sheet '. ($i + 1) .' (<em>'. $excel->boundsheets[$i]['name'] .'</em>)</h4>'. sheetData($excel->sheets[$i]) .'<br/>';  
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo $file;?> Excel Reader</title>
<style type="text/css">
table {
 border-collapse: collapse;
}        
td {
 border: 1px solid black;
 padding: 0 0.5em;
}        
</style>
</head>
<body>

<?php
// displays tables with excel file data
echo $excel_data;
?>    

</body>
</html>