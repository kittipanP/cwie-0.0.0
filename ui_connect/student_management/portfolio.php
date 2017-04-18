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






$colname_Recordset1_stu = "-1";
if (isset($_GET['s_id'])) {
  $colname_Recordset1_stu = $_GET['s_id'];
}
mysql_select_db($database_MyConnect, $MyConnect);
$query_Recordset1_stu = sprintf("SELECT student_info.s_id, title.title_name, student_info.s_fname, student_info.s_lname, student_status.status_desc, major_info.major_name, degree_info.degree_name, university_info.uni_name, collage_info.collage_name, student_contact_details.email_adress, student_contact_details.contact_no
			FROM student_info
			INNER JOIN title ON title.title_id = student_info.title_title_id
			INNER JOIN student_status ON student_status.status_id = student_info.status_id
			LEFT JOIN student_contact_details ON student_contact_details.s_id = student_info.s_id
			LEFT JOIN education_info ON student_info.s_id = education_info.s_id
			LEFT JOIN major_info ON major_info.major_id = education_info.major_id
			LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
			LEFT JOIN university_info ON university_info.uni_id = education_info.uni_id
			LEFT JOIN collage_info ON collage_info.collage_id = education_info.collage_id WHERE student_info.s_id = %s", GetSQLValueString($colname_Recordset1_stu, "int"));
$Recordset1_stu = mysql_query($query_Recordset1_stu, $MyConnect) or die(mysql_error());
$row_Recordset1_stu = mysql_fetch_assoc($Recordset1_stu);
$totalRows_Recordset1_stu = mysql_num_rows($Recordset1_stu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portfolio</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
	.mySlides {display:none}
    </style>

</head>

<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="../../img/Avatar/useri.jpg" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $row_Recordset1_stu['s_fname'];
					  echo "&nbsp;&nbsp;";
					  echo $row_Recordset1_stu['s_lname'];  ?></h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>
		  <?php echo $row_Recordset1_stu['degree_name']; 
		  		echo " OF ";
				echo $row_Recordset1_stu['major_name'];?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>
		  	<?php echo $row_Recordset1_stu['uni_name']; ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
          	<?php echo $row_Recordset1_stu['email_adress']; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>
          	<?php echo $row_Recordset1_stu['contact_no']; ?></p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          <p>Skill 1</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
          </div>
          <p>Skill 2</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              <div class="w3-center w3-text-white">80%</div>
            </div>
          </div>
          <p>Skill 3</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">75%</div>
          </div>
          <p>Skill 4</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
          </div>
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>Languages 1</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p>Languages 2</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
          </div>
          <p>Languages 3</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
          </div>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Resume, Transcript and Other Documents</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Resume</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Page | 1<span class="w3-tag w3-teal w3-round"><!--aaaaaaaaaa--></span></h6>
          <div align="center">
		  <?php include 'index-load-pdf.php'?>
          </div>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity">&nbsp;</h5>
        </div>
        <div class="w3-container"><br>
        </div>
      </div>
      <div class="w3-container w3-card-2 w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>VDO </h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>111111111</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>222222222222          </h6>
          <hr>
        </div>  
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>

    <!-- End Right Column -->
    </div>
    <p>&nbsp;</p>

    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-16">
      <h5>Footer</h5>
    </footer>
    
    <footer class="w3-container w3-theme-d5">
       <p>By <a href="http://www.facebook.com/Bon.KP" target="_blank">บอนไง จะใครล่ะ ^^</a></p>
    </footer>
   


</body>
</html>

<?php
//mysql_free_result($studentSet);
?>
