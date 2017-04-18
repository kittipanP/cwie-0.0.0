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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


		/*-- Reccordset Student_Info [S]--*/
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO student_info (s_id, s_fname, s_lname, thai_fname, thai_lname, s_dob, remark, origin_id, type_id, status_id, ref_id, national_id, title_title_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['s_id'], "int"),
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
                       GetSQLValueString($_POST['title_title_id'], "int"));
		
		  mysql_select_db($database_MyConnect, $MyConnect);
		  $Result1 = mysql_query($insertSQL, $MyConnect) or die(mysql_error());
		
		  $insertGoTo = "Student_Management.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO education_info (education_id, education_name, intitute_id, major_id, degree_id, s_id, uni_id, collage_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['education_id'], "int"),
                       GetSQLValueString($_POST['education_name'], "text"),
                       GetSQLValueString($_POST['intitute_id'], "int"),
                       GetSQLValueString($_POST['major_id'], "int"),
                       GetSQLValueString($_POST['degree_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"),
                       GetSQLValueString($_POST['uni_id'], "int"),
                       GetSQLValueString($_POST['collage_id'], "int"));

  mysql_select_db($database_MyConnect, $MyConnect);
  $Result1 = mysql_query($insertSQL, $MyConnect) or die(mysql_error());

  $insertGoTo = "Student_Management.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
		/*-- Reccordset Student_Info [E]--*/

		
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






$currentPage_studentInfo = $_SERVER["PHP_SELF"];

mysql_select_db($database_MyConnect, $MyConnect);
$query_degreeSet = "SELECT * FROM degree_info";
$degreeSet = mysql_query($query_degreeSet, $MyConnect) or die(mysql_error());
$row_degreeSet = mysql_fetch_assoc($degreeSet);
$totalRows_degreeSet = mysql_num_rows($degreeSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_majorSet = "SELECT * FROM major_info";
$majorSet = mysql_query($query_majorSet, $MyConnect) or die(mysql_error());
$row_majorSet = mysql_fetch_assoc($majorSet);
$totalRows_majorSet = mysql_num_rows($majorSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_resumeSet = "SELECT resume_name FROM resume";
$resumeSet = mysql_query($query_resumeSet, $MyConnect) or die(mysql_error());
$row_resumeSet = mysql_fetch_assoc($resumeSet);
$totalRows_resumeSet = mysql_num_rows($resumeSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_RecordsetStudentInfo = "SELECT * FROM `application`";
$RecordsetStudentInfo = mysql_query($query_RecordsetStudentInfo, $MyConnect) or die(mysql_error());
$row_RecordsetStudentInfo = mysql_fetch_assoc($RecordsetStudentInfo);
$totalRows_RecordsetStudentInfo = mysql_num_rows($RecordsetStudentInfo);


		/*-- titleSet [S]--*/
		mysql_select_db($database_MyConnect, $MyConnect);
		$query_titleSet = "SELECT * FROM title";
		$titleSet = mysql_query($query_titleSet, $MyConnect) or die(mysql_error());
		$row_titleSet = mysql_fetch_assoc($titleSet);
		$totalRows_titleSet = mysql_num_rows($titleSet);
		/*-- titleSet [E]--*/

mysql_select_db($database_MyConnect, $MyConnect);
$query_statusSet = "SELECT * FROM student_status";
$statusSet = mysql_query($query_statusSet, $MyConnect) or die(mysql_error());
$row_statusSet = mysql_fetch_assoc($statusSet);
$totalRows_statusSet = mysql_num_rows($statusSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_universitySet = "SELECT * FROM university_info";
$universitySet = mysql_query($query_universitySet, $MyConnect) or die(mysql_error());
$row_universitySet = mysql_fetch_assoc($universitySet);
$totalRows_universitySet = mysql_num_rows($universitySet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_educationSet = "SELECT * FROM education_info";
$educationSet = mysql_query($query_educationSet, $MyConnect) or die(mysql_error());
$row_educationSet = mysql_fetch_assoc($educationSet);
$totalRows_educationSet = mysql_num_rows($educationSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_collageSet = "SELECT * FROM collage_info";
$collageSet = mysql_query($query_collageSet, $MyConnect) or die(mysql_error());
$row_collageSet = mysql_fetch_assoc($collageSet);
$totalRows_collageSet = mysql_num_rows($collageSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_instituteSet = "SELECT * FROM intitute_type";
$instituteSet = mysql_query($query_instituteSet, $MyConnect) or die(mysql_error());
$row_instituteSet = mysql_fetch_assoc($instituteSet);
$totalRows_instituteSet = mysql_num_rows($instituteSet);
		


		/*-- StudentSet For On Process[Start]--*/
		$maxRows_studentSet = 10;
		$pageNum_studentSet = 0;
		if (isset($_GET['pageNum_studentSet'])) {
		  $pageNum_studentSet = $_GET['pageNum_studentSet'];
		}
		$startRow_studentSet = $pageNum_studentSet * $maxRows_studentSet;
		
		mysql_select_db($database_MyConnect, $MyConnect);
			$query_studentSet = "SELECT student_info.s_id, title.title_name, student_info.s_fname, student_info.s_lname, student_status.status_desc, major_info.major_name, degree_info.degree_name, university_info.uni_name, collage_info.collage_name
			FROM student_info
			INNER JOIN title ON title.title_id = student_info.title_title_id
			INNER JOIN student_status ON student_status.status_id = student_info.status_id
			LEFT JOIN education_info ON student_info.s_id = education_info.s_id
			LEFT JOIN major_info ON major_info.major_id = education_info.major_id
			LEFT JOIN degree_info ON degree_info.degree_id = education_info.degree_id
			LEFT JOIN university_info ON university_info.uni_id = education_info.uni_id
			LEFT JOIN collage_info ON collage_info.collage_id = education_info.collage_id
			WHERE (student_status.status_id = '1')
			ORDER BY student_info.s_id DESC";
		$query_limit_studentSet = sprintf("%s LIMIT %d, %d", $query_studentSet, $startRow_studentSet, $maxRows_studentSet);
		$studentSet = mysql_query($query_limit_studentSet, $MyConnect) or die(mysql_error());
		$row_studentSet = mysql_fetch_assoc($studentSet);
		
		if (isset($_GET['totalRows_studentSet'])) {
		  $totalRows_studentSet = $_GET['totalRows_studentSet'];
		} else {
		  $all_studentSet = mysql_query($query_studentSet);
		  $totalRows_studentSet = mysql_num_rows($all_studentSet);
		}
		$totalPages_studentSet = ceil($totalRows_studentSet/$maxRows_studentSet)-1;
		
		$queryString_studentSet = "";
		if (!empty($_SERVER['QUERY_STRING'])) {
		  $params = explode("&", $_SERVER['QUERY_STRING']);
		  $newParams = array();
		  foreach ($params as $param) {
			if (stristr($param, "pageNum_studentSet") == false && 
				stristr($param, "totalRows_studentSet") == false) {
			  array_push($newParams, $param);
			}
		  }
		  if (count($newParams) != 0) {
			$queryString_studentSet = "&" . htmlentities(implode("&", $newParams));
		  }
		}
		$queryString_studentSet = sprintf("&totalRows_studentSet=%d%s", $totalRows_studentSet, $queryString_studentSet);
		/*-- StudentSet For On Process [End]--*/
		

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
<link href="../../libs/css/font-awesome.min.css" rel="stylesheet">
 
  <!-- For Multi Form -->
<!--Bon	<link rel="stylesheet" href="../../libs/css/reset.min.css"> 
	<link rel="stylesheet" href="../../libs/css/style.css?ver=2001" type="text/css">
Bon-->
  	<link rel="stylesheet" href="../../libs/css/style-msform.css?v=<?php echo filemtime('./../libs/css/style-msform.css') ?>" type="text/css">
    
    	<!-- According-Form-->
      <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>-->
      <link rel="stylesheet" href="../../libs/css/styleii.css">
      
    
</head>

<body>

			<!--<div id="id01" class="w3-modal">-->
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="msform">
                    
              <!-- progressbar -->
              <ul id="progressbar">
                  <li class="active">Personal Detail</li>
                  <li>Education Data</li>
                  <li>File Upload</li>
              </ul>
                    
              <!-- fieldsets -->
              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Personal Detail</h2>
                <h3 class="fs-subtitle">This is step 1</h3>
                        
                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div >
                                  <!--<h4>Student Management</h4><br>-->
                                    <!--<i class="fa fa-group w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                    <!--<hr>-->
                        <label for="titleSelect">TITLE :  </label>
                        <select name="title_title_id" >
                          <?php
                              do {  
                          ?>
                                  <option name="title_title_id" size="32" value="<?php echo $row_titleSet['title_id']?>"><?php echo $row_titleSet['title_name']?> </option>
                          <?php
                              } while ($row_titleSet = mysql_fetch_assoc($titleSet));
                              $rows = mysql_num_rows($titleSet);
                              if($rows > 0) {
                              mysql_data_seek($titleSet, 0);
                              $row_titleSet = mysql_fetch_assoc($titleSet);
                              }
                                                        ?>
                        </select>
                      <input class="" type="text" name="s_fname" value="" size="32" placeholder="First Name" />
                      <input type="text" name="s_lname" value="" size="32" placeholder="Last Name"/>
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            <!--<h4>Report</h4><br>-->
                                            <!--<i class="fa fa-bar-chart-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                        <input type="text" name="thai_fname" value="" size="32" placeholder="Thai First name" />
                        <input type="text" name="thai_lname" value="" size="32" placeholder="Thai Last Name"/>
                        <label for="statusSelect">Student status</label>
                        <select name="status_id">
                          <?php do {  ?>
                            <option  name="title_title_id" value="<?php echo $row_statusSet['status_id']?>"><?php echo $row_statusSet['status_desc']?></option>
                            <?php
                                } while ($row_statusSet = mysql_fetch_assoc($statusSet));
                                  $rows = mysql_num_rows($statusSet);
                                  if($rows > 0) {
                                  mysql_data_seek($statusSet, 0);
                                  $row_statusSet = mysql_fetch_assoc($statusSet);
                                  }
                            ?>
                        </select>
                    </div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                            <!--<h4>E-mail Management</h4><br>-->
                        <textarea name="remark" value="" size="32" placeholder="Remark..."></textarea>
                                            <!--<i class="fa fa-envelope w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                            <!--<hr>-->
                    </div>
                  </div>
                 
                </div>   

                        <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Eiei</h2>
                <h3 class="fs-subtitle">2222222222222222222222222222222</h3> 
                            
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->                             
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 1</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p>###########################################################################################</p>
                      </dd>
                      <!--end accordion tab 1 -->

                      <dt>
                          <!-- accordion tab 2 -->
                            <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 2</a>
                        </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">**************************************************************************</p>    
                        </div>
                      </dd>
                      <!-- end accordion tab 2 -->

                      <dt>
                          <!-- accordion tab 3 - Payment Info -->
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 3</a>
                        </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@</p>
                        </div>
                      </dd>
                      <!-- end accordion tab 3 -->

                    </dl>
                    <!-- end description list -->
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->

<!--test
                            <input type="text" name="email" placeholder="First Name" />
                             <input type="text" name="email" placeholder="Last Name" />
                             <input type="text" name="email" placeholder="Email" />
                             
test-->
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Eiei</h2>
                <h3 class="fs-subtitle">3333333333333333333</h3>
                    <input type="text" name="fname" placeholder="First Name" />
                    <input type="text" name="lname" placeholder="Last Name" />
                    <textarea name="address" placeholder="Address"></textarea>                
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="action-button" value="Submit" />
                    <input type="hidden" name="MM_insert" class="submit action-button" value="msform" />
              </fieldset>
                    <input type="hidden" name="MM_insert" value="form1" />

            </form>    

            <p>&nbsp;</p>
          </div>

        </div><!--</div>-->
        
        
 
	<script>
    // Accordion 
    function onProcessFn(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-theme-d1";
        } else { 
            x.className = x.className.replace("w3-show", "");
            x.previousElementSibling.className = 
            x.previousElementSibling.className.replace(" w3-theme-d1", "");
        }
    }
    
    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
    
    
    </script>
    

    
    
    <!-- Navigation II-->
    <script>
    	function w3_open(){
			document.getElementById("mySidenav").style.display = "block";
			document.getElementById("myOverlay").style.display = "block";
			}
		function w3_close(){
			document.getElementById("mySidenav").style.display = "none";
			document.getElementById("myOverlay").style.display = "none";
			}
			
    </script>
    
    <!-- Create New [Model Tab] -->
	<script>
		document.getElementsByClassName("tablink")[0].click();
		
		function openCity(evt, cityName) {
		  var i, x, tablinks;
		  x = document.getElementsByClassName("city");
		  for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablink");
		  for (i = 0; i < x.length; i++) {
			tablinks[i].classList.remove("w3-light-grey");
		  }
		  document.getElementById(cityName).style.display = "block";
		  evt.currentTarget.classList.add("w3-light-grey");
		}
    </script>
    
    <!-- Filter Table Onprocess -->
    <script>
		function onProcessFn() {
		  var input, filter, table, tr, td, i,j;
		  input = document.getElementById("onProcessInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("onProcessTable");
		  tr = table.getElementsByTagName("tr");
		  
		  
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
				  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}
			  }
		  
		}
	</script>

    <!-- Filter Table All -->
    <script>
		function allRecentFn() {
		  var input, filter, table, tr, td, i;
		  input = 
		  document.getElementById("allRecentInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("allRecentTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
		}
	</script>

   
    <!-- for muti step form -->
    <script src='../../libs/js/jquery.min.js'></script>
    <script src='../../libs/js/jquery.easing.min.js'></script>
    
    <script src="../../libs/js/index.js"></script>
	
	<!--for According-->
	<script src="../../libs/js/indexii.js"></script>
  
        
</body>
</html>


<?php
mysql_free_result($countrySet);


mysql_free_result($degreeSet);

mysql_free_result($majorSet);

mysql_free_result($resumeSet);

mysql_free_result($RecordsetStudentInfo);

mysql_free_result($titleSet);

mysql_free_result($statusSet);

mysql_free_result($universitySet);

mysql_free_result($educationSet);

mysql_free_result($collageSet);
  
mysql_free_result($instituteSet);

mysql_free_result($studentSet);


?>
