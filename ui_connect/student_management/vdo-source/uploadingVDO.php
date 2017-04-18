<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.facebook.com/exequiel.s.vibar">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sampol upload ni zick</title>
</head>
<?php
include'connect_to_db.php';//connection to database
?>
<body>
<br><br>
<center>
<?php
//code for uploading videos...
if(isset($_POST['video'])){//button for Upload
$target = "uploaded_folder/"; //folder where to save the uploaded file/video
 $target = $target . basename( $_FILES['uploaded']['name']) ; //gets the name of the upload file
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
     $query =mysql_query( "INSERT INTO tbl_video(video_name) VALUES ('$target')");//insertion to database
 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 }
}
 ?>
 
 <form enctype="multipart/form-data" method="POST">
     Please choose a file: <input name="uploaded" type="file" /><br />
     <input type="submit" value="Upload" name="video"/>
 </form> 
 
<br><br>
<br>
</center>
</body>
</html>