<?php require_once('../../Connections/MyConnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

/*mysql_select_db($database_myConnect, $myConnect);
$query_uniSet = "SELECT * FROM university_info";
$uniSet = mysql_query($query_uniSet, $myConnect) or die(mysql_error());
$row_uniSet = mysql_fetch_assoc($uniSet);
$totalRows_uniSet = mysql_num_rows($uniSet);

mysql_select_db($database_myConnect, $myConnect);
$query_insSet = "SELECT * FROM intitute_type";
$insSet = mysql_query($query_insSet, $myConnect) or die(mysql_error());
$row_insSet = mysql_fetch_assoc($insSet);
$totalRows_insSet = mysql_num_rows($insSet);

mysql_select_db($database_myConnect, $myConnect);
$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysql_query($query_collageSet, $myConnect) or die(mysql_error());
$row_collageSet = mysql_fetch_assoc($collageSet);
$totalRows_collageSet = mysql_num_rows($collageSet);*/

mysql_select_db($database_MyConnect, $MyConnect);
$query_instituteSet = "SELECT * FROM intitute_type";
$instituteSet = mysql_query($query_instituteSet, $MyConnect) or die(mysql_error());
$row_instituteSet = mysql_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysql_num_rows($instituteSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_universitySet = "SELECT * FROM university_info";
$universitySet = mysql_query($query_universitySet, $MyConnect) or die(mysql_error());
$row_universitySet = mysql_fetch_assoc($universitySet);
$totalRows_universitySet = mysql_num_rows($universitySet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysql_query($query_collageSet, $MyConnect) or die(mysql_error());
$row_collageSet = mysql_fetch_assoc($collageSet);
$totalRows_collageSet = mysql_num_rows($collageSet);
?>
<?php
require_once("../../ui_connect/student_management/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["ins_id"])) {
	//$query ="SELECT * FROM intitute_type WHERE intitute_id = '" . $_POST["ins_id"] . "'";
	$results = $db_handle->runQuery($query);
?>  
	
   	<?php if($_POST["ins_id"]=='1'){?>
    <option value="">Can Not Select Collage</option>
    <?php }elseif($_POST["ins_id"]=='2'){?> 
    <option value="">Select Collage</option>
    <?php
	do {  
	?>
	  <option value="<?php echo $row_collageSet['collage_id']?>"><?php echo $row_collageSet['collage_name']?></option>
	  <?php
	} while ($row_collageSet = mysql_fetch_assoc($collageSet));
	  $rows = mysql_num_rows($collageSet);
	  if($rows > 0) {
		  mysql_data_seek($collageSet, 0);
		  $row_collageSet = mysql_fetch_assoc($collageSet);
	  }
	?>
    
    <?php }
} ?>





<?php

mysql_free_result($universitySet);
mysql_free_result($instituteSet);
mysql_free_result($collageSet);
 
?>


