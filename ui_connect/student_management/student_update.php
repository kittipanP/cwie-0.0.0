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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL_stu = sprintf("UPDATE student_info SET s_fname=%s, s_lname=%s, thai_fname=%s, thai_lname=%s, s_dob=%s, remark=%s, origin_id=%s, type_id=%s, status_id=%s, ref_id=%s, national_id=%s, title_title_id=%s WHERE s_id=%s",
                       GetSQLValueString($_POST['s_fname'], "text"),
                       GetSQLValueString($_POST['s_lname'], "text"),
                       GetSQLValueString($_POST['thai_fname'], "text"),
                       GetSQLValueString($_POST['thai_lname'], "text"),
                       GetSQLValueString($_POST['s_dob'], "date"),
                       GetSQLValueString($_POST['remark'], "text"),
                       GetSQLValueString($_POST['origin_id'], "int"),
                       GetSQLValueString($_POST['type_id'], "int"),
                       GetSQLValueString($_POST['status_id'], "int"),
                       GetSQLValueString($_POST['ref_id'], "int"),
                       GetSQLValueString($_POST['national_id'], "int"),
                       GetSQLValueString($_POST['title_title_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"));

  mysql_select_db($database_MyConnect, $MyConnect);
  $Result1_stu = mysql_query($updateSQL_stu, $MyConnect) or die(mysql_error());

  $updateGoTo = "Student_Management.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1_stu = "-1";
if (isset($_GET['s_id'])) {
  $colname_Recordset1_stu = $_GET['s_id'];
}
mysql_select_db($database_MyConnect, $MyConnect);
$query_Recordset1_stu = sprintf("SELECT * FROM student_info WHERE s_id = %s", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_stu = mysql_query($query_Recordset1_stu, $MyConnect) or die(mysql_error());
$row_Recordset1_stu = mysql_fetch_assoc($Recordset1_stu);
$totalRows_Recordset1_stu = mysql_num_rows($Recordset1_stu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_idiiiiiiiii:</td>
      <td><?php echo $row_Recordset1_stu['s_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_fname:</td>
      <td><input type="text" name="s_fname" value="<?php echo htmlentities($row_Recordset1_stu['s_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_lname:</td>
      <td><input type="text" name="s_lname" value="<?php echo htmlentities($row_Recordset1_stu['s_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Thai_fname:</td>
      <td><input type="text" name="thai_fname" value="<?php echo htmlentities($row_Recordset1_stu['thai_fname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Thai_lname:</td>
      <td><input type="text" name="thai_lname" value="<?php echo htmlentities($row_Recordset1_stu['thai_lname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">S_dob:</td>
      <td><input type="text" name="s_dob" value="<?php echo htmlentities($row_Recordset1_stu['s_dob'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Remark:</td>
      <td><input type="text" name="remark" value="<?php echo htmlentities($row_Recordset1_stu['remark'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Origin_id:</td>
      <td><input type="text" name="origin_id" value="<?php echo htmlentities($row_Recordset1_stu['origin_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Type_id:</td>
      <td><input type="text" name="type_id" value="<?php echo htmlentities($row_Recordset1_stu['type_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status_id:</td>
      <td><input type="text" name="status_id" value="<?php echo htmlentities($row_Recordset1_stu['status_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ref_id:</td>
      <td><input type="text" name="ref_id" value="<?php echo htmlentities($row_Recordset1_stu['ref_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">National_id:</td>
      <td><input type="text" name="national_id" value="<?php echo htmlentities($row_Recordset1_stu['national_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title_title_id:</td>
      <td><input type="text" name="title_title_id" value="<?php echo htmlentities($row_Recordset1_stu['title_title_id'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="s_id" value="<?php echo $row_Recordset1_stu['s_id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1_stu);
?>
