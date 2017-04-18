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
  	$insertSQL_stu = sprintf("INSERT INTO student_info (s_id, s_fname, s_lname, thai_fname, thai_lname, s_dob, remark, origin_id, type_id, status_id, ref_id, national_id, title_title_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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
					   
  	$insertSQL_edt = sprintf("INSERT INTO education_info (education_id, education_name, intitute_id, major_id, degree_id, s_id, uni_id, collage_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
							   GetSQLValueString($_POST['education_id'], "int"),
							   GetSQLValueString($_POST['education_name'], "text"),
							   GetSQLValueString($_POST['intitute_id'], "int"),
							   GetSQLValueString($_POST['major_id'], "int"),
							   GetSQLValueString($_POST['degree_id'], "int"),
							   GetSQLValueString($_POST['s_id'], "int"),
							   GetSQLValueString($_POST['uni_id'], "int"),
							   GetSQLValueString($_POST['collage_id'], "int"));
	
	$insertSQL_sct = sprintf("INSERT INTO student_contact_details (contact_id, s_id, contact_no, email_adress) VALUES (%s, %s, %s, %s)",
							   GetSQLValueString($_POST['contact_id'], "int"),
							   GetSQLValueString($_POST['s_id'], "int"),
							   GetSQLValueString($_POST['contact_no'], "text"),
							   GetSQLValueString($_POST['email_adress'], "text"));
		

	$insertSQL_app = sprintf("INSERT INTO `application` (application_id, s_id, application_name, application_dateS, application_dateE) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['application_id'], "int"),
                       GetSQLValueString($_POST['s_id'], "int"),
                       GetSQLValueString($_POST['application_name'], "text"),
                       GetSQLValueString($_POST['application_dateS'], "date"),
                       GetSQLValueString($_POST['application_dateE'], "date"));	
					   
	$insertSQL_sec = sprintf("INSERT INTO student_emergency_contact (emc_id, emc_fname, emc_lname, emc_relation, emc_contact, contact_id) VALUES (%s, %s, %s, %s, %s, %s)",
							   GetSQLValueString($_POST['emc_id'], "int"),
							   GetSQLValueString($_POST['emc_fname'], "text"),
							   GetSQLValueString($_POST['emc_lname'], "text"),
							   GetSQLValueString($_POST['emc_relation'], "text"),
							   GetSQLValueString($_POST['emc_contact'], "text"),
							   GetSQLValueString($_POST['contact_id'], "int"));
	
	$insertSQL_sad = sprintf("INSERT INTO student_address (address_Id, s_id, place_name, road_name, sub_district, district, city, zip_code, province_name, country_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
							   GetSQLValueString($_POST['address_Id'], "int"),
							   GetSQLValueString($_POST['s_id'], "int"),
							   GetSQLValueString($_POST['place_name'], "text"),
							   GetSQLValueString($_POST['road_name'], "text"),
							   GetSQLValueString($_POST['sub_district'], "text"),
							   GetSQLValueString($_POST['district'], "text"),
							   GetSQLValueString($_POST['city'], "text"),
							   GetSQLValueString($_POST['zip_code'], "int"),
							   GetSQLValueString($_POST['province_name'], "text"),
							   GetSQLValueString($_POST['country_id'], "int"));
	
	$insertSQL_sre = sprintf("INSERT INTO student_relationship (relation_id, s_id, relation_type, relation_fname, relation_lname, relation_occupation, relation_contact) VALUES (%s, %s, %s, %s, %s, %s, %s)",
							   GetSQLValueString($_POST['relation_id'], "int"),
							   GetSQLValueString($_POST['s_id'], "int"),
							   GetSQLValueString($_POST['relation_type'], "text"),
							   GetSQLValueString($_POST['relation_fname'], "text"),
							   GetSQLValueString($_POST['relation_lname'], "text"),
							   GetSQLValueString($_POST['relation_occupation'], "text"),
							   GetSQLValueString($_POST['relation_contact'], "text"));
							   
	$insertSQL_ebg = sprintf("INSERT INTO education_blackgrounf (bg_id, bg_durationS, bg_durationE, bg_major, bg_institute_name, bg_degree, bg_gpax, student_info_s_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
							   GetSQLValueString($_POST['bg_id'], "int"),
							   GetSQLValueString($_POST['bg_durationS'], "date"),
							   GetSQLValueString($_POST['bg_durationE'], "date"),
							   GetSQLValueString($_POST['bg_major'], "text"),
							   GetSQLValueString($_POST['bg_institute_name'], "text"),
							   GetSQLValueString($_POST['bg_degree'], "int"),
							   GetSQLValueString($_POST['bg_gpax'], "int"),
							   GetSQLValueString($_POST['student_info_s_id'], "int"));
							   
	$insertSQL_vdo = sprintf("INSERT INTO video (video_name, video_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['video_name'], "text"),
                       GetSQLValueString(upload($_FILES['video_file'],'./vdo-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));
					   
	$insertSQL_res = sprintf("INSERT INTO resume (resume_name, resume_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['resume_name'], "text"),
                       GetSQLValueString(upload($_FILES['resume_file'],'./resume-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

  	$insertSQL_tra = sprintf("INSERT INTO transcript (transcript_name, transcript_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['transcript_name'], "text"),
					   GetSQLValueString(upload($_FILES['transcript_file'],'./transcript-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

  	$insertSQL_vis = sprintf("INSERT INTO visa (visa_name, visa_file, application_application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['visa_name'], "text"),
					   GetSQLValueString(upload($_FILES['visa_file'],'./visa-source/'), "text"),
                       GetSQLValueString($_POST['application_application_id'], "int"));

  	$insertSQL_oth = sprintf("INSERT INTO other_doc (other_name, other_file, application_application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['other_name'], "text"),
					   GetSQLValueString(upload($_FILES['other_file'],'./other-source/'), "text"),
                       GetSQLValueString($_POST['application_application_id'], "int"));


		  mysql_select_db($database_MyConnect, $MyConnect);
		  $Result1_stu = mysql_query($insertSQL_stu, $MyConnect) or die(mysql_error());
		  $Result1_edt = mysql_query($insertSQL_edt, $MyConnect) or die(mysql_error());
		  $Result1_sct = mysql_query($insertSQL_sct, $MyConnect) or die(mysql_error());
		  $Result1_app = mysql_query($insertSQL_app, $MyConnect) or die(mysql_error());
		  $Result1_sec = mysql_query($insertSQL_sec, $MyConnect) or die(mysql_error());
		  $Result1_sad = mysql_query($insertSQL_sad, $MyConnect) or die(mysql_error());	
		  $Result1_sre = mysql_query($insertSQL_sre, $MyConnect) or die(mysql_error());
		  $Result1_ebg = mysql_query($insertSQL_ebg, $MyConnect) or die(mysql_error());
		  
		  $Result1_vdo = mysql_query($insertSQL_vdo, $MyConnect) or die(mysql_error());
		  $Result1_res = mysql_query($insertSQL_res, $MyConnect) or die(mysql_error());	  
		  $Result1_tra = mysql_query($insertSQL_tra, $MyConnect) or die(mysql_error());
		  $Result1_vis = mysql_query($insertSQL_vis, $MyConnect) or die(mysql_error());
		  $Result1_oth = mysql_query($insertSQL_oth, $MyConnect) or die(mysql_error());
		
		  $insertGoTo = "Student_Management.php";
		  if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		  }
		  header(sprintf("Location: %s", $insertGoTo));
		}



		/*-- Reccordset Student_Info [E]--*/
		
		
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
$query_educationSet = "SELECT * FROM education_info";
$educationSet = mysql_query($query_educationSet, $MyConnect) or die(mysql_error());
$row_educationSet = mysql_fetch_assoc($educationSet);
$totalRows_educationSet = mysql_num_rows($educationSet);

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

/*mysql_select_db($database_MyConnect, $MyConnect);
$query_studentSet = "SELECT * FROM student_info";
$studentSet = mysql_query($query_studentSet, $MyConnect) or die(mysql_error());
$row_studentSet = mysql_fetch_assoc($studentSet);
$totalRows_studentSet = mysql_num_rows($studentSet);*/

mysql_select_db($database_MyConnect, $MyConnect);
$query_stu_addressSet = "SELECT * FROM student_address";
$stu_addressSet = mysql_query($query_stu_addressSet, $MyConnect) or die(mysql_error());
$row_stu_addressSet = mysql_fetch_assoc($stu_addressSet);
$totalRows_stu_addressSet = mysql_num_rows($stu_addressSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_stu_relationshipSet = "SELECT * FROM student_relationship";
$stu_relationshipSet = mysql_query($query_stu_relationshipSet, $MyConnect) or die(mysql_error());
$row_stu_relationshipSet = mysql_fetch_assoc($stu_relationshipSet);
$totalRows_stu_relationshipSet = mysql_num_rows($stu_relationshipSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_ed_bgSet = "SELECT * FROM education_blackgrounf";
$ed_bgSet = mysql_query($query_ed_bgSet, $MyConnect) or die(mysql_error());
$row_ed_bgSet = mysql_fetch_assoc($ed_bgSet);
$totalRows_ed_bgSet = mysql_num_rows($ed_bgSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_appSet = "SELECT * FROM `application`
	ORDER BY application.application_id DESC";
$appSet = mysql_query($query_appSet, $MyConnect) or die(mysql_error());
$row_appSet = mysql_fetch_assoc($appSet);
$totalRows_appSet = mysql_num_rows($appSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_videoSet = "SELECT * FROM video";
$videoSet = mysql_query($query_videoSet, $MyConnect) or die(mysql_error());
$row_videoSet = mysql_fetch_assoc($videoSet);
$totalRows_videoSet = mysql_num_rows($videoSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_transcriptSet = "SELECT * FROM transcript";
$transcriptSet = mysql_query($query_transcriptSet, $MyConnect) or die(mysql_error());
$row_transcriptSet = mysql_fetch_assoc($transcriptSet);
$totalRows_transcriptSet = mysql_num_rows($transcriptSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_visaSet = "SELECT * FROM visa";
$visaSet = mysql_query($query_visaSet, $MyConnect) or die(mysql_error());
$row_visaSet = mysql_fetch_assoc($visaSet);
$totalRows_visaSet = mysql_num_rows($visaSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_other_docSet = "SELECT * FROM other_doc";
$other_docSet = mysql_query($query_other_docSet, $MyConnect) or die(mysql_error());
$row_other_docSet = mysql_fetch_assoc($other_docSet);
$totalRows_other_docSet = mysql_num_rows($other_docSet);


mysql_select_db($database_MyConnect, $MyConnect);
$query_stu_contactSet = "SELECT * FROM student_contact_details
	ORDER BY student_contact_details.contact_id DESC";
$stu_contactSet = mysql_query($query_stu_contactSet, $MyConnect) or die(mysql_error());
$row_stu_contactSet = mysql_fetch_assoc($stu_contactSet);
$totalRows_stu_contactSet = mysql_num_rows($stu_contactSet);

mysql_select_db($database_MyConnect, $MyConnect);
$query_secSet = "SELECT * FROM student_emergency_contact
	ORDER BY student_emergency_contact.contact_id DESC";
$secSet = mysql_query($query_secSet, $MyConnect) or die(mysql_error());
$row_secSet = mysql_fetch_assoc($secSet);
$totalRows_secSet = mysql_num_rows($secSet);				

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


/*if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO video (video_name, video_file, application_id) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['video_name'], "text"),
                       GetSQLValueString(dwUploadv($_FILES['video_file'],'./vdo-source/'), "text"),
                       GetSQLValueString($_POST['application_id'], "int"));

  mysql_select_db($database_MyConnect, $MyConnect);
  $Result1 = mysql_query($insertSQL, $MyConnect) or die(mysql_error());

}*/	
?>


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

/*mysql_free_result($studentSet);*/

mysql_free_result($stu_addressSet);

mysql_free_result($stu_relationshipSet);

mysql_free_result($ed_bgSet);

mysql_free_result($appSet);

mysql_free_result($videoSet);

mysql_free_result($transcriptSet);

mysql_free_result($visaSet);

mysql_free_result($other_docSet);

//mysql_free_result($Recordset1);

mysql_free_result($stu_contactSet);

mysql_free_result($secSet);


?>