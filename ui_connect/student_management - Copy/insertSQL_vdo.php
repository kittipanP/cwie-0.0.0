<?php if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL_vdo = sprintf("INSERT INTO video (video_name, video_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['video_name'], "text"),
                       GetSQLValueString(dwUploadii($_FILES['video_file'],'./vdo-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

  mysql_select_db($database_MyConnect, $MyConnect);
  $Result1_vdo = mysql_query($insertSQL_vdo, $MyConnect) or die(mysql_error());
}
?>