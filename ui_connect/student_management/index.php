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
$query_instituteSet = "SELECT * FROM intitute_type";
$instituteSet = mysql_query($query_instituteSet, $myConnect) or die(mysql_error());
$row_instituteSet = mysql_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysql_num_rows($instituteSet);*/

mysql_select_db($database_MyConnect, $MyConnect);
$query_instituteSet = "SELECT * FROM intitute_type";
$instituteSet = mysql_query($query_instituteSet, $MyConnect) or die(mysql_error());
$row_instituteSet = mysql_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysql_num_rows($instituteSet);





/*mysql_select_db($database_myConnect, $myConnect);
$query_uniSet = "SELECT * FROM university_info";
$uniSet = mysql_query($query_uniSet, $myConnect) or die(mysql_error());
$row_uniSet = mysql_fetch_assoc($uniSet);
$totalRows_uniSet = mysql_num_rows($uniSet);*/

mysql_select_db($database_MyConnect, $MyConnect);
$query_universitySet = "SELECT * FROM university_info";
$universitySet = mysql_query($query_universitySet, $MyConnect) or die(mysql_error());
$row_universitySet = mysql_fetch_assoc($universitySet);
$totalRows_universitySet = mysql_num_rows($universitySet);
?>

<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<style>
body{width:610px;}
.frmDronpDown {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
.demoInputBox {padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
<script src="jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'ins_id='+val,
	success: function(data){
		$("#uniSelect").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
<div class="frmDronpDown">
<div class="row">


    <label for="insSelect">Institute Type</label><p>
    <select name="insSelect" id="insSelect" class="demoInputBox" onChange="getState(this.value);">
    	<option value="">Select Institute Type</option>
      <?php
do {  
?>
      <option value="<?php echo $row_instituteSet['intitute_id']?>"><?php echo $row_instituteSet['intitute_name']?></option>
      <?php
} while ($row_instituteSet = mysql_fetch_assoc($instituteSet));
  $rows = mysql_num_rows($instituteSet);
  if($rows > 0) {
      mysql_data_seek($instituteSet, 0);
	  $row_instituteSet = mysql_fetch_assoc($instituteSet);
  }
?>
    </select></p>



  <p>&nbsp;</p>
</div>
<div class="row">
<label>University/Collage : </label><br/>
<select name="state" id="uniSelect" class="demoInputBox">

</select>
</div>

</div>
</body>
</html>
<?php
mysql_free_result($instituteSet);

mysql_free_result($universitySet);
?>
