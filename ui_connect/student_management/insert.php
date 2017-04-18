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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_countrySet = 10;
$pageNum_countrySet = 0;
if (isset($_GET['pageNum_countrySet'])) {
  $pageNum_countrySet = $_GET['pageNum_countrySet'];
}
$startRow_countrySet = $pageNum_countrySet * $maxRows_countrySet;

mysql_select_db($database_MyConnect, $MyConnect);
$query_countrySet = "SELECT * FROM country_list";
$query_limit_countrySet = sprintf("%s LIMIT %d, %d", $query_countrySet, $startRow_countrySet, $maxRows_countrySet);
$countrySet = mysql_query($query_limit_countrySet, $MyConnect) or die(mysql_error());
$row_countrySet = mysql_fetch_assoc($countrySet);

if (isset($_GET['totalRows_countrySet'])) {
  $totalRows_countrySet = $_GET['totalRows_countrySet'];
} else {
  $all_countrySet = mysql_query($query_countrySet);
  $totalRows_countrySet = mysql_num_rows($all_countrySet);
}
$totalPages_countrySet = ceil($totalRows_countrySet/$maxRows_countrySet)-1;

$queryString_countrySet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_countrySet") == false && 
        stristr($param, "totalRows_countrySet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_countrySet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_countrySet = sprintf("&totalRows_countrySet=%d%s", $totalRows_countrySet, $queryString_countrySet);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../libs/css/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../../libs/css/style.css">
<link rel="stylesheet" href="../../libs/css/reset.min.css">
</head>

<body>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="insertii.php">INSERT NEW RECORD</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>ewrtaetae <?php echo $totalRows_countrySet ?> aertasrafafe</p>
<p>&nbsp;</p>
<p>&nbsp;<?php echo ($startRow_countrySet + 1) ?>| <?php echo min($startRow_countrySet + $maxRows_countrySet, $totalRows_countrySet) ?></p>
<table border="1">
  <tr>
    <td>country_id</td>
    <td>country_name</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_countrySet['country_id']; ?></td>
      <td><?php echo $row_countrySet['country_name']; ?></td>
    </tr>
    <?php } while ($row_countrySet = mysql_fetch_assoc($countrySet)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;หน้าที่	: 
<?php
for($dw_i=1;$dw_i<=$totalPages_countrySet;$dw_i++){
	echo '<a href="?pageNum_countrySet=',$dw_i,'">',$dw_i,'</a> ';
	}

?>
<table border="0">
  <tr>
    <td><?php if ($pageNum_countrySet > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_countrySet=%d%s", $currentPage, 0, $queryString_countrySet); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_countrySet > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_countrySet=%d%s", $currentPage, max(0, $pageNum_countrySet - 1), $queryString_countrySet); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_countrySet < $totalPages_countrySet) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_countrySet=%d%s", $currentPage, min($totalPages_countrySet, $pageNum_countrySet + 1), $queryString_countrySet); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_countrySet < $totalPages_countrySet) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_countrySet=%d%s", $currentPage, $totalPages_countrySet, $queryString_countrySet); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
</p>
</body>
</html>
<?php
mysql_free_result($countrySet);
?>
