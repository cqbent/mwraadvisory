<?php
require('../wp-config.php');
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Connection Error");
mysql_select_db(DB_NAME) or die("Database Error");
include 'phpexcelreader/excel_reader.php';     // include the class

// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;

$user_list = 'Contact';
$file = "Constant Contact Database.xls";
$datetime = date('Y-m-d H:i:s');

$excel->read('xls/'.$file);

// this function creates and returns a HTML table with excel rows and columns data
// Parameter - array with excel worksheet data
function sheetData($sheet) {
  global $user_list, $file, $datetime;
  	
  $re = '<table>';     // starts html table
	
	if($user_list=='Contact')	
	{
		//wp_wysija_user
		$wp_wysija_user_columns = array('firstname','lastname','email','domain','created_at','status','wpuser_id');		
		
		//wp_wysija_user_list
		$wp_wysija_user_list_columns = array('list_id','sub_date','unsub_date','user_id');		
					  
		$x = 1;
		while($x <= $sheet['numRows']) {
			$re .= "<tr>\n";
			$y = 1;
			
			$Email = '';			
			$wp_wysija_user_values = array();
			$wp_wysija_user_list_values = array();
						
			while($y <= $sheet['numCols']) {				
							
				//Name Field								
				if($y==1 || $y==2)
				{
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';

					//MailPoet User
					$wp_wysija_user_values[] = addslashes(trim($cell)); //First Name and Last Name
					
				}	
				else if($y==3)	//Email Field
				{
					$cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
					$cell = addslashes($cell);
					$Email = trim($cell);
					
					//MailPoet User
					$wp_wysija_user_values[] = trim($cell); //Email	
					$cell_temp = explode("@",trim($cell));					
					$wp_wysija_user_values[] = $cell_temp[1]; //Domain			 			
					$wp_wysija_user_values[] = strtotime($datetime); //Created At						
					$wp_wysija_user_values[] = 1; //Status
					$wp_wysija_user_values[] = '%s'; //Wp User Id	
					
					//Explode Mail List
					$wp_wysija_user_list_values[]  = " VALUES('12','".strtotime($datetime)."','0','%s')"; //Default Constant Contact
				}
										
				$re .= " <td>$cell</td>\n";  
				$y++;
			}  
			
			if($x>1)
			{															
				$chk_sql_wp_wysija_user = "SELECT user_id FROM `wp_wysija_user` WHERE email='".$Email."' ";
				$chk_res_wp_wysija_user = mysql_query($chk_sql_wp_wysija_user) or die(mysql_error());	
				if(mysql_affected_rows()>0){	
					$chk_row_wp_wysija_user = mysql_fetch_array($chk_res_wp_wysija_user);
					
					$sql_delete_wp_wysija_user_list = "DELETE FROM `wp_wysija_user_list` WHERE user_id='".$chk_row_wp_wysija_user['user_id']."' ";
					mysql_query($sql_delete_wp_wysija_user_list) or die(mysql_error());
										
					$user2_id = $chk_row_wp_wysija_user['user_id'];		
				}
				else
				{				
					//Execute User MailPoet User with all collect record individual
					$sql_wysija_user = "INSERT INTO `wp_wysija_user` (`".implode("`, `",$wp_wysija_user_columns)."`)  VALUES('".implode("','",$wp_wysija_user_values)."');";
					echo $sql_wysija_user = str_replace('%s',0,$sql_wysija_user);
					mysql_query($sql_wysija_user) or die(mysql_error());	
					$user2_id = mysql_insert_id();	
					$mysql_affected_rows = mysql_affected_rows();
					echo '<br /><br />';
				}
				
				
				if($user2_id>0)
				{
					//Execute User MailPoet Subscription with all collect record individual
					for($r=0;$r<count($wp_wysija_user_list_values);$r++){
						$sql_wysija_user_list = "INSERT INTO `wp_wysija_user_list` (`".implode("`, `",$wp_wysija_user_list_columns)."`) ";				
						$sql_wysija_user_list.= $wp_wysija_user_list_values[$r].";";	
						echo $sql_wysija_user_list = str_replace('%s',$user2_id,$sql_wysija_user_list);												
						mysql_query($sql_wysija_user_list) or die(mysql_error());
						echo '<br /><br />';
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
	exit;
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