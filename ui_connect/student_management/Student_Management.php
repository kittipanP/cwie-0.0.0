

<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../admin/index-login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO work_experience (wex_id, wex_dateS, wex_dateE, wex_organ, wex_detail, student_info_s_id) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['wex_id'], "int"),
                       GetSQLValueString($_POST['wex_dateS'], "date"),
                       GetSQLValueString($_POST['wex_dateE'], "int"),
                       GetSQLValueString($_POST['wex_organ'], "text"),
                       GetSQLValueString($_POST['wex_detail'], "text"),
                       GetSQLValueString($_POST['student_info_s_id'], "int"));

  mysql_select_db($database_MyConnect, $MyConnect);
  $Result1 = mysql_query($insertSQL, $MyConnect) or die(mysql_error());
}
?>
<?php require_once('../../Connections/MyConnect.php'); ?>
<?php include("fn-upload.inc.php"); ?>
<?php include ("student_management_reccordset.php");
	include ("../admin/for-admin.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<title>Student Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../libs/css/w3.css">
<link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='../../libs/css/css?family=Open+Sans'>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
<link href="../../libs/css/font-awesome.min.css" rel="stylesheet">
 
  <!-- For Multi Form -->
<!--Bon	<link rel="stylesheet" href="../../libs/css/reset.min.css"> 
	<link rel="stylesheet" href="../../libs/css/style.css?ver=2001" type="text/css">
Bon-->
  	<!--<link rel="stylesheet" href="../../libs/css/style-msform.css?v=<?php echo filemtime('style-msform.css'); ?>" type="text/css">-->
    <link rel="stylesheet" href="../../libs/css/style-msform.css?v=0214i" type="text/css">
    
    	<!-- According-Form-->
      <!--<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>-->
      <link rel="stylesheet" href="../../libs/css/style-according.css?v=0228i" type="text/css">
      
      




<link rel="stylesheet" href="src/calendar.css">
</head>

<style>
html,body,h1,h2,h3,h4,h5 {	
}
header{ background: url(../../img/head/headerv.jpg);}
</style>

    <style type="text/css">
/*        html {
            font: 500 14px "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
            height: 100%;
        }

        body {
            height: 100%;
            margin: 0;
        } */

        a {
            text-decoration: none;
        }

        ul,
        ol,
        li {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        p {
            margin: 0;
        }

/*        input {
            margin: 10px 0;
            height: 28px;
            width: 200px;
            padding: 0 6px;
            border: 1px solid #ccc;
            outline: none;*/
        }

    </style>




<body class="w3-theme-l5">

    <!-- Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] ## Navbar [S] -->
    <div class="w3-top">
      <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
          <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
              <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a></li>
          <li><a href="../../index.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a></li>
          <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Stusent Management" onclick="w3_open()"><i class="fa fa-group"></i></a></li>
          <li class="w3-hide-small"><a href="../Report/Report.php" class="w3-padding-large w3-hover-white" title="Report"><i class="fa fa-bar-chart-o"></i></a></li>
          <li class="w3-hide-small"><a href="../Email_Management/Email_Management.php" class="w3-padding-large w3-hover-white" title="E-mail Management"><i class="fa fa-envelope"></i></a></li>
          <li class="w3-hide-small w3-dropdown-hover">
              <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bullhorn"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>     
                  <div class="w3-dropdown-content w3-white w3-card-4">
                      <a href="#">Kittipan will finish coop on Feb 24, 2017</a>
                      <a href="#">Extend VISA</a>
                      <a href="#">Danny eiei</a>
                  </div>
          </li>
          
          <li class="w3-hide-small w3-right"><a href="<?php echo $logoutAction ?>" class="w3-padding-large w3-hover-white" title="My Account"><img src="../../img/Avatar/boy.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></a></li>
          <li class="w3-hide-small w3-right">welcome : <?php echo $_SESSION['MM_Username']; ?>&nbsp;&nbsp;</li>
      </ul>
    </div>
    <!-- Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] ## Navbar [E] -->
    
    <!-- Navbar on Small Screens [S] ### Navbar on Small Screens [S] ### Navbar on Small Screens [S] ### Navbar on Small Screens [S] -->
    <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
      <ul class="w3-navbar w3-left-align w3-large w3-theme">
          <li><a class="w3-padding-large" href="#">Stusent Management</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/Report/Report.php">Report</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/Email_Management/Email_Management.php">E-mail Management</a></li>
          <li ><a class="w3-padding-large " href="../../ui_connect/my_profile/my_profile.php">My Profile</a></li>
      </ul>
    </div> 
		<!-- Navbar on Small Screens [E] ### Navbar on Small Screens [E] ### Navbar on Small Screens [E] ### Navbar on Small Screens [E] -->

    <!-- Navigation II [S] ## Navigation II [S] ## Navigation II [S] ## Navigation II [S] ## Navigation II [S] ## Navigation II [S] -->
		<nav class="w3-sidenav w3-white w3-animate-left" style="display:none;z-index:5" id="mySidenav">
        	<a href="javascript:void(0)" onclick="w3_close()" class="w3-closenav w3-large">Close &times;</a>
          <a onclick="document.getElementById('id01').style.display='block'" ><i class="fa fa-plus w3-margin-right"></i> Create New</a>
          <a href="#allRecent" onclick="w3_close()"><i class="fa fa-globe w3-margin-right"></i> All</a>
          <a href="#onProcess" onclick="w3_close()"><i class="fa fa-address-book w3-margin-right"></i> On Process</a>
          <a href="#waitingOnBoard" onclick="w3_close()"><i class="fa fa-thumbs-up w3-margin-right"></i> Waiting on Board</a>
          <a href="#reject" onclick="w3_close()"><i class="fa fa-ban w3-margin-right"></i> Reject</a>
          <a href="#trainee" onclick="w3_close()"><i class="fa fa-id-card w3-margin-right"></i>Trainee</a>
          <a href="#oldTrainee" onclick="w3_close()"><i class="fa fa-list w3-margin-right"></i>Old Trainee</a>
    </nav>
    <!-- Navigation II [E] ## Navigation II [E] ## Navigation II [E] ## Navigation II [E] ## Navigation II [E] ## Navigation II [E] -->
        
        <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay">
        </div>
        
         
        <div class="w3-container">

          <div id="id01" class="w3-modal">
            <?php include 'multiple-step-form-insert.php'?>
			
          </div>
        </div>
        <!-- Muti Step Form for Update [E] ## Muti Step Form for Update [E] ## Muti Step Form for Update [E] -->   
                    
        
<!--		</div> -->
        

	<!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   

    <!-- The Grid -->
    <div class="w3-row"> 
            
            
      <!-- Header -->
      <header class="w3-container w3-theme w3-padding" id="myHeader"> 

        <!-- Navigation II--> 
        <div class="w3-left">      
        <span class="w3-opennav w3-xxlarge" onclick="w3_open()">&#9776;</span>  
        </div>         
        <!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i> -->
        <div class="w3-left">
            <h4>&nbsp;</h4>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h4>Welcome to ..            </h4>
            <h1 class="w3-xxxlarge w3-animate-bottom ">Studet Management System            </h1>
            <p><!--<div class="w3-padding-32">
                  <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="#" style="font-weight:900;">ห้ามกดเด็ดขาด</button>
              </div>-->        </p>
          <p>&nbsp;</p>
          <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
            <table align="center">
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">Wex_id:</td>
                <td></td>
              </tr>
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">Wex_dateS:</td>
                <td></td>
              </tr>
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">Wex_dateE:</td>
                <td></td>
              </tr>
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">Wex_organ:</td>
                <td></td>
              </tr>
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">Wex_detail:</td>
                <td></td>
              </tr>
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">Student_info_s_id:</td>
                <td></td>
              </tr>
              <tr valign="baseline">
                <td nowrap="nowrap" align="right">&nbsp;</td>
                <td><input type="submit" value="Insert record" /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form2" />
          </form>
          <p>&nbsp;</p>
          <div class="w3-container">
          <a class="w3-button w3-xlarge w3-teal w3-card-4"> &nbsp;+&nbsp; </a>  
    	  </div>
        </div>
      </header>
      
    <!-- End The Grid -->
    </div>
  <!-- End Page Container -->
  </div>
  
  
           
      
    
      
      
    <!-- Filter Table All -->     
    <div id="allRecent">
    	<?php include 'all.php'?>	
    </div>
    <!-- Filter Table Onprocess -->
    <div id="onProcess">
    	<?php include 'on_process_student.php'?>
    </div>
    <!-- Filter Table Waiting on Board -->
    <div id="waitingOnBoard">
    	<?php include 'waiting_on_board.php'?>
    </div>
    <!-- Filter Table Trainee -->
    <div id="trainee">
    	<?php include 'trainee.php'?>
    </div>
    <!-- Filter Table End Trainee -->
    <div id="oldTrainee">
    	<?php include 'end_trainee.php'?>	
    </div>
	<div id="reject">
 		<?php include 'reject.php'?>	
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
    </div>
    
    <!--Calendar-->
    <div id="two"></div>
    <div id="three"></div>
    
    
	
    
    
    
    
    
    
    
    
    
<!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-16">
      <h5>Footer</h5>
    </footer>
    
    <footer class="w3-container w3-theme-d5">
       <p>By <a href="http://www.facebook.com/Bon.KP" target="_blank">บอนไง จะใครล่ะ ^^</a></p>
    </footer>
 
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

   
    <!-- for muti step form -->
    <script src='../../libs/js/jquery.min.js'></script>
    <script src='../../libs/js/jquery.easing.min.js'></script>
    
    <script src="../../libs/js/index.js"></script>
	
	<!--for According-->
	<script src="../../libs/js/According.js"></script>

	<!-- for jQuery Get input Text value -->
	<!--<script src="../../libs/js/jquery.js" type="text/javascript"></script>-->
	<!--<script src="../../libs/js/jquery-ui.min.js" type="text/javascript"></script>-->
    
    <!-- for get data from input -->
	<script type="text/javascript">
				$(document).ready(function() {
					$('#inputFirstname').keyup(function() {
						$('#firstnameDIVTag').html($(this).val());
						$('#firstnameDIVTagiii').html($(this).val());
						$('#firstnameDIVTagiv').html($(this).val());
					 	$('#outputFirstname').val($(this).val());
					 
					});
					
					$('#inputLastname').keyup(function() {
						$('#lastnameDIVTag').html($(this).val());
						$('#lastnameDIVTagiii').html($(this).val());
						$('#lastnameDIVTagiv').html($(this).val());
						$('#outputFullname').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnameii').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnameiii').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnameiv').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnamev').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnamevi').val($(inputFirstname).val()+'_'+$(this).val());
						$('#outputFullnamevii').val($(inputFirstname).val()+'_'+$(this).val());
					});
					
				});     
	</script> 

    
    <!-- for Institute University and Collage -->
	<script>	
	function getUniversity(val) {
			
			$.ajax({
			type: "POST",
			url: "get_university.php",
			data:'ins_id='+val,
			success: function(data){
				$("#uniSelect").html(data);
			}
			});	
    }
	function getUniversityii(val) {
			
			$.ajax({
			type: "POST",
			url: "get_collage.php",
			data:'ins_id='+val,
			success: function(data){
				$("#collageSelect").html(data);
			}
			});
	}
			
    function selectCountry(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }
    </script>

	<!-- # calendar #-->
<!--<script src="jquery-1.12.4.min.js"></script>-->
    <script src="src/calendar.js"></script>
    <script>
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var date = now.getDate();


        var data = [{
            date: year + '-' + month + '-' + (date - 1),
            value: 'hello'
        }, {
            date: year + '-' + month + '-' + date,
            value: '上班'
        }, {
            date: new Date(year, month - 1, date + 1),
            value: '吃饭睡觉打豆豆'
        }, {
            date: '2016-10-31',
            value: '2016-10-31'
        }];

        // inline
        var $ca = $('#one').calendar({
            // view: 'month',
            width: 320,
            height: 320,
            // startWeek: 0,
            // selectedRang: [new Date(), null],
            data: data,
            date: new Date(2016, 9, 31),
            onSelected: function (view, date, data) {
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            },
            viewChange: function (view, y, m) {
                console.log(view, y, m)

            }
        });

        // picker
        $('#two').calendar({
            trigger: '#dt',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });
		$('#three').calendar({
            trigger: '#dtii',
            // offset: [0, 1],
            zIndex: 999,
            data: data,
            onSelected: function (view, date, data) {
                console.log('event: onSelected')
            },
            onClose: function (view, date, data) {
                console.log('event: onClose')
                console.log('view:' + view)
                console.log('date:' + date)
                console.log('data:' + (data || '无'));
            }
        });

        // Dynamic elements
        var $demo = $('#demo');
        var UID = 1;
        $('#add').click(function () {
            $demo.append('<input id="input-' + UID + '"><div id="ca-' + UID + '"></div>');
            $('#ca-' + UID).calendar({
                trigger: '#input-' + UID++
            })
        })
    </script>
    
    <!-- add_more_file_using_jquery -->   
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus-square"></i></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
    

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
