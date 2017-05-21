<?php 
require_once('../../../Connections/MyConnect.php'); 
mysql_select_db('cwie_db');
$w = $_GET['term'];
$sql = "Select * From major_info Where major_name Like'%{$w}%'";
$rs = mysql_query($sql);
$json = array();
while($row = mysql_fetch_assoc($rs)){
	$json[] = $row['major_name'];
	
	}
mysql_free_result($rs);
mysql_close($MyConnect);
$json = json_encode($json);
echo $json;
?> 

