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
			WHERE (student_status.status_id = '3')
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
?>




<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="onProcess">
                      <h2>Rejected Lists</h2>
                      <p>Search for a name in the input field.</p>
                    
                    <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for names.." id="rejectInput" onkeyup="rejectFn()">
                    
                    <table class="w3-table-all w3-margin-top w3-hoverable" id="rejectTable">
                        <tr>
                          
                          <th style="width:5%;">Title</th>
                          <th style="width:10%;">First Name</th>
                          <th style="width:10%;">Last Name</th>
                          <th style="width:11%;">Degree</th>
                          <th style="width:24%;">Major</th>
                          <th style="width:30%;">University</th>
                          <th style="width:5%;">Edit</th>
                          <th style="width:5%;">Delete</th>
                        </tr>
                        <?php do { ?>
                            <tr>
                              <td><?php echo $row_studentSet['title_name']; ?></td>
                              <td><?php echo $row_studentSet['s_fname']; ?></td>
                              <td><?php echo $row_studentSet['s_lname']; ?></td>
                              <td><?php echo $row_studentSet['degree_name']; ?></td>
                              <td><?php echo $row_studentSet['major_name']; ?></td>
                              <td><?php echo $row_studentSet['uni_name']; ?>
                                    <?php echo $row_studentSet['collage_name']; ?></td>
                              <td><a href="student_update.php?s_id=<?php echo $row_studentSet['s_id']; ?>"><i class="fa fa-pencil w3-margin-right"></i></a></td>
                              <td><a href="student_delete.php?s_id=<?php echo $row_studentSet['s_id']; ?>"><i class="fa fa-trash w3-margin-right"></i></a></td>
                            </tr> 
                        <?php } while ($row_studentSet = mysql_fetch_assoc($studentSet)); ?>               
                    </table>
                      
                      <p>&nbsp;</p>
                      <div class="w3-center">
                    <ul class="w3-pagination">
                      <li><a class="w3-green" href="<?php printf("%s?pageNum_studentSet=%d%s", $currentPage, 0, $queryString_studentSet); ?>">&laquo;</a></li>
                      <li>
                        <?php
                            for($all_page=0;$all_page<=$totalPages_studentSet;$all_page++){
                                echo '<a href="?pageNum_studentSet=',$all_page,'">',($all_page+1),'</a>';
                                }
                        ?>
                      </li>
                      <li><a class="w3-green" onclick="w3_close()" href="<?php printf("%s?pageNum_studentSet=%d%s", $currentPage, $totalPages_studentSet, $queryString_studentSet); ?>">&raquo;</a></li>
                    </ul>
         </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
 	</div>
</div>        
         
    <script>
		function rejectFn() {
		  var input, filter, table, tr, td, i,j;
		  input = document.getElementById("rejectInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("rejectTable");
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

<?php
mysql_free_result($studentSet);
?>
