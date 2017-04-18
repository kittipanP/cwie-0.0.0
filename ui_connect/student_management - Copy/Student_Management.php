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
header{ background: url(../../img/head/headervi.jpg);}
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
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="msform" enctype="multipart/form-data">
                    
              <!-- progressbar -->
              <ul id="progressbar">
                  <li class="active">Personal Detail</li>
                  <li>Education Data</li>
                  <li>Other Information</li>
                  <li>File Upload</li>
              </ul>
                    
              <!-- fieldsets -->
              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Personal Detail</h2>
                <h3 class="fs-subtitle">This is step 1</h3>
                        
                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                                  <!--<h4>Student Management</h4><br>-->
                                    <!--<i class="fa fa-group w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                    <!--<hr>-->
                                    
                      	<input type="hidden" name="s_dob" value="" size="32" />
                        <input type="hidden" name="origin_id" value="" size="32" />
                        <input type="hidden" name="type_id" value="" size="32" />
                        <input type="hidden" name="ref_id" value="" size="32" />
                        <input type="hidden" name="national_id" value="" size="32" />
                        <input type="hidden" name="title_title_id" value="" size="32" />
                         <div align="left">
                      	<label for="titleSelect"> Title : </label>
                     	 </div>
                        <!--<label for="titleSelect">TITLE :  </label>-->
                        <div align="left">
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
                        </select></div>
                      <div align="left">
                      	<label for="s_fname"> First Name : </label>
                      </div>
                      <input id="inputFirstname" class="" type="text" name="s_fname" value="" size="32" placeholder="KITTIPAN" />
                      <div align="left">
                      	<label for="s_lname"> Last Name : </label>
                      </div>
                      <input id="inputLastname" type="text" name="s_lname" value="" size="32" placeholder="PRASERTSANG"/>
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            <!--<h4>Report</h4><br>-->
                                            <!--<i class="fa fa-bar-chart-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                        <div align="left">
                      	<label for="thai_fname"> Thai First Name : </label>
                      	</div>
                        <input type="text" name="thai_fname" value="" size="32" placeholder="กิตติพันธ์" />
                        <div align="left">
                      	<label for="thai_lname"> Thai Last Name : </label>
                      	</div>
                        <input type="text" name="thai_lname" value="" size="32" placeholder="ประเสริฐสังข์"/>
                        <div align="left">
                      	<label for="statusSelect"> Student status : </label>
                      	</div>
                        <select name="status_id" style="width: 100%;">
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
                        <input type="hidden" name="contact_id" value="" size="32" /> 
                        <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                       
                        <div align="left">
                      	<label for="contact_no"> Tel : </label>
                      	</div>
                        <input type="text" name="contact_no" value="" size="32" placeholder="08 4722 2174"/>
                        
                        <div align="left">
                      	<label for="email_adress"> E-mail address : </label>
                      	</div>
                        <input type="text" name="email_adress" value="" size="32" placeholder="kittipan.prasertsang@gmail.com"/>
                        
                        
                        <div align="left">
                      	<label for="remark"> Remark : </label>
                      	</div>
                        <textarea name="remark" value="" size="32" placeholder="Remark..."></textarea>
                        
                        
                                     
                         
                        

                                            <!--<i class="fa fa-envelope w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
                                            <!--<hr>-->
                    </div>
                  </div>
                 
                </div>   
                <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->             
          		<!--<input type="hidden" name="MM_insert" value="form3" />-->         
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">Address and Contact Data</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                        <div class="w3-row-padding w3-center w3-margin-top">
        				  <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Emergency Cantact Data</p></div>
                          <div class="w3-third">
                            <div>   
                               
								<input type="hidden" name="emc_id" value="" size="32" />
                        		<input type="hidden" name="contact_id" value="<?php echo $row_stu_contactSet['contact_id']+1?>" size="32" />
                                <div align="left">
                                <label for="emc_fname"> First Name : </label>
                                </div>
                                <input type="text" name="emc_fname" value="" size="32" placeholder="First Name"/>
        
                            </div>
                          </div>
               
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_lname"> Last Name : </label>                     	
                                </div>
                                <input type="text" name="emc_lname" value="" size="32" placeholder="Last Name"/>
                                
                            </div>
                          </div>
                                
                          <div class="w3-third">
                            <div >
                                                   
                                <div align="left"> 
                                <label for="emc_relation"> Relationship : </label>                     
                                </div>
                                <input type="text" name="emc_relation" value="" size="32" placeholder="Relationship"/> 
                                <div align="left"> 
                                <label for="emc_contact"> Contact No : </label>                     
                                </div>
                                <input type="text" name="emc_contact" value="" size="32" placeholder="Contact No."/>      
        
                            </div>
                          </div>
                         
                        </div>
                        
                        <div class="w3-row-padding w3-center w3-margin-top">
                        <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Student Address</p></div>
                          <div class="w3-third">
                            <div>
                                <input type="hidden" name="address_Id" value="" size="32" />
                                <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />         
                                <div align="left">
                                <label for="place_name"> Place/Village : </label> 
                                </div>
                                <input type="text" name="place_name" value="" size="32"  placeholder="Sermsook"/>
                                <div align="left">
                                <label for="district"> District : </label> 
                                </div>
                                <input type="text" name="district" value="" size="32" placeholder="Phonphisai"/>
                                <div align="left">
                                <label for="province_name"> Province : </label> 
                                </div>
                                <input type="text" name="province_name" value="" size="32" placeholder="Nong Khai"/>
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                              
                                <div align="left">
                                <label for="road_name"> Road/Street : </label>                      	
                                </div> 
                                <input type="text" name="road_name" value="" size="32" placeholder="N/A"/>
                                <div align="left">
                                <label for="city"> City : </label> 
                                </div>
                                <input type="text" name="city" value="" size="32" placeholder="N/A"/> 
                                <div align="left">
                                <label for="country_id"> Country : </label> 
                                </div>
                                <input type="text" name="country_id" value="" size="32" placeholder="Thailand"/>   
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">  
                                <label for="sub_district"> Sub-district : </label>                    
                                </div> 
                                <input type="text" name="sub_district" value="" size="32" placeholder="Jhumphol"/>
                                <div align="left">
                                <label for="zip_code"> Zip Code/Post : </label> 
                                </div>
                                <input type="text" name="zip_code" value="" size="32" placeholder="43120"/>     
                            </div>
                          </div>
                        </div>
                        









                      </dd>
                      <!--end accordion tab 1 -->

                      <dt>
                          <!-- accordion tab 2 -->
                            <a href="#accordion2" aria-expanded="false" aria-controls="accordion2" class="accordion-title accordionTitle js-accordionTrigger">Student's Relation Data</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion2" aria-hidden="true">
                        
                            <p class="headings"></p> 
                            <div class="w3-row-padding w3-center w3-margin-top">
                            <div class="w3-panel w3-gray w3-card-8 w3-center-align"><p>Relation Data</p></div>
                              <div class="w3-third">
                                <div>   
                                    <input type="hidden" name="relation_id" value="" size="32" />
                                    <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />                                      
                                    <div align="left">
                                    <label for="relation_fname"> First Name : </label>
                                    </div>
                                    <input type="text" name="relation_fname" value="" size="32" placeholder="Bongkoch"/>
                                    <div align="left"> 
                                    <label for="relation_occupation"> Occupation : </label>                     
                                    </div>
                                    <input type="text" name="relation_occupation" value="" size="32" placeholder="Officer"/>

                                </div>
                              </div>
                              <div class="w3-third">
                                <div >                              
                                    <div align="left"> 
                                    <label for="relation_lname"> Last Name : </label>                     	
                                    </div>    
                                    <input type="text" name="relation_lname" value="" size="32" placeholder="Prasertsang"/> 
                                    <div align="left"> 
                                    <label for="relation_contact"> Contact : </label>                     
                                    </div>
                                    <input type="text" name="relation_contact" value="" size="32" placeholder="08 6223 86XX "/> 
                                </div>
                              </div>          
                              <div class="w3-third">
                                <div >                                                 
                                    <div align="left"> 
                                    <label for="relation_type"> Relation Type : </label>                     
                                    </div> 
                                    <input type="text" name="relation_type" value="" size="32" placeholder="Mother"/>     
                                </div>
                              </div>
                            </div>	    
                      </dd>
                      <!-- end accordion tab 2 -->

                      <!--<dt>
                         
                            <a href="#accordion3" aria-expanded="false" aria-controls="accordion3" class="accordion-title accordionTitle js-accordionTrigger">Accordion tab 3</a>
                        </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion3" aria-hidden="true">
                        <div class="container-fluid" style="padding-top: 20px;">
                            <p class="headings">@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@</p>
                        </div>
                      </dd>-->
                     

                    </dl>
                   
                  </div>
                  <!-- Accordion [E] ## Accordion [E] ## Accordion [E] ## Accordion [E]-->        
				


              	<input type="button" name="next" class="next action-button" value="Next" />
                        
                        
              </fieldset>

              <fieldset>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-padding-top">&times;</span>
                <h2 class="fs-title">Education Data</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTag" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTag" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>

                <div class="w3-row-padding w3-center w3-margin-top">

                  <div class="w3-third">
                    <div>
                         <input type="hidden" name="education_id" value="" size="32" />
                         <input type="hidden" name="education_name" value="" size="32" id="outputFullname" readonly="readonly" />
                         <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" />    
                         <div align="left">
                         <label for="degree_id"> Degree : </label>
                     	 </div>
                         <select name="degree_id" id="degreeSelect" style="width: 100%;">
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_degreeSet['degree_id']?>"><?php echo $row_degreeSet['degree_name']?></option>
                                    <?php
                        } while ($row_degreeSet = mysql_fetch_assoc($degreeSet));
                          $rows = mysql_num_rows($degreeSet);
                          if($rows > 0) {
                              mysql_data_seek($degreeSet, 0);
                              $row_degreeSet = mysql_fetch_assoc($degreeSet);
                          }
                        ?>
                        </select>
                         <!--<input type="text" name="degree_id" value="" size="32" />-->
                         
                        <div align="left">
                        <label for="major_id"> Major : </label>
                        </div>
                        <select name="major_id" id="majorSelect" style="width: 100%;">
                                    <?php
                        do {  
                        ?>
                                    <option value="<?php echo $row_majorSet['major_id']?>"><?php echo $row_majorSet['major_name']?></option>
                                    <?php
                        } while ($row_majorSet = mysql_fetch_assoc($majorSet));
                          $rows = mysql_num_rows($majorSet);
                          if($rows > 0) {
                              mysql_data_seek($majorSet, 0);
                              $row_majorSet = mysql_fetch_assoc($majorSet);
                          }
                        ?>
                        </select>
                        <!--<input type="text" name="major_id" value="" size="32" />-->
                        
                      <div align="left"> 	
                      </div>
                      
                      <div align="left">
                      </div>
                     
                    </div>
                  </div>
       
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">  
                        <label for="intitute_id"> Institute : </label>                    	
                      	</div>
                        <select name="intitute_id" id="insSelect" onChange="(getUniversity(this.value) , getUniversityii(this.value))" style="width: 100%; " >
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
                        </select>
                        <!--<input type="text" name="intitute_id" value="" size="32" />-->
                       
                        <div align="left">                      	
                      	</div>
                        
                        <div align="left">                      	
                      	</div>
                        
                  	</div>
                  </div>
                        
                  <div class="w3-third">
                    <div >
                                            
                        <div align="left">   
                        <label for="uni_id"> University : </label>                   	
                      	</div>
                        <select name="uni_id" id="uniSelect" style="width: 100%;" >                        	
							<option value="" >Select Institute Type First</option>
						</select>
                        <!--<input type="text" name="uni_id" value="" size="32" />-->
                        
                        <div align="left">  
                        <label for="collage_id"> Collage : </label>                   	
                      	</div>
                        <select name="collage_id" id="collageSelect" style="width: 100%;">
                        	<option value="">Select Institute Type First</option>
                        </select>
                        <p id='eiei'></p>
                        <!--<input type="text" name="collage_id" value="" size="32" />-->
                        
                    </div>
                  </div>
                 
                </div>              
                                     
                             <!-- Used some part of the code from Chris Wright (http://codepen.io/chriswrightdesign/)'s Pen  -->
                             
                  <!-- Accordion [S] ## Accordion [S] ## Accordion [S] ## Accordion [S]-->
          <!--<input type="hidden" name="MM_insert" value="form3" />-->         
                  <div class="accordion">
                    <dl>
                      <!-- description list -->

                      <dt>
                            <!-- accordion tab 1 -->
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger"> Educational Background</a>
                      </dt>
                      <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <p></p>
                      	<div class="w3-row-padding w3-center w3-margin-top">
                          <div class="w3-third">
                            <div>      
                            	
                                <input type="hidden" name="bg_id" value="" size="32" />
                                <input type="hidden" name="student_info_s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /> 
                                <div align="left">
                                </div>
                                <div align="left">
                                <label for=""> Duration : </label>                      	
                                </div> <table><tr>
                                <td><input type="text" name="bg_durationS" value="" size="32" /></td>
 								<td>&nbsp;&nbsp;&nbsp;to&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="text" name="bg_durationE" value="" size="32" /></td></tr></table>
                                
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
                                <div align="left">
                                <label for="bg_degree"> Degree : </label>                      	
                                </div> 
                                <input type="text" name="bg_degree" value="" size="32" placeholder="Senior High School"/>
                                <div align="left">
                                <label for="bg_major"> Major : </label>                      	
                                </div> 
                                <input type="text" name="bg_major" value="" size="32" placeholder="Science-mathematics"/>
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">                      
                                </div>   
                                <div align="left">
                                <label for="bg_institute_name"> Institute Name : </label>                      	
                                </div> 
                                <input type="text" name="bg_institute_name" value="" size="32" placeholder="Chumpholphonphisai School"/>
                                <div align="left">
                                <label for="bg_gpax"> GPAX : </label>                      	
                                </div> 
                                <input type="text" name="bg_gpax" value="" size="32" placeholder="4.01"/>   
                            </div>
                          </div>
                        </div>
                        
                        
                            
                      </dd>
                      <!--end accordion tab 1 -->
                      
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
                <h2 class="fs-title">Other Information</h2>
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTagiii" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTagiii" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>
                            
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
                            <p></p>
                            <div class="w3-row-padding w3-center w3-margin-top">
                          <div class="w3-third">
                            <div>      
                            	
                                <div align="left">
                                </div>
                            </div>
                          </div>
                          <div class="w3-third">
                            <div >                 
          						
                                <div align="left">
                                                      	
                                </div>  
                                
                                
                                
                            </div>
                          </div>          
                          <div class="w3-third">
                            <div >                                                 
                                <div align="left">                      
                                </div>      
                            </div>
                          </div>
                        </div>
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
                <div align="center">
                    <h3 class="fs-subtitle" >
                        <table>
                            <tr>
                                <td><div id="firstnameDIVTagiv" ></div></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><div id="lastnameDIVTagiv" ></div></td>
                            </tr>
                        </table>
                    
                    </h3>
                </div>
                 <div class="w3-row-padding w3-center w3-margin-top">
                 	<div class="w3-col s6" >
                    
                     <div clall="w3-col">
                      <div class="w3-panel w3-light-grey" id="demo">         
                       <table style="width: 100%;">   
                       	<p>&nbsp;</p>
                        <tr>
                         <td><input type="hidden" name="application_id" value="" size="32" />
                           <input type="hidden" name="s_id" value="<?php echo $row_studentSet['s_id']+1?>" size="32" /></td>
                         <td><input type="hidden" name="application_name" value="" size="32" id="outputFullnameii" readonly="readonly"/></td>
                        </tr>
                        <tr>
                         <td nowrap="nowrap" align="left">Starting Date </td>
                         <td><input name="application_dateS" type="text"  placeholder="trigger calendar" id="dt"/></td>
                        </tr>
                       <tr>
                        <td nowrap="nowrap" align="left">Ending Date </td>
                        <td><input type="text" name="application_dateE" value="" size="32" id="dtii" placeholder="trigger calendar"/></td>
                       </tr>
                       <tr>
                        <td><p>&nbsp;</p></td>
                       </tr>  
                      </table>                                           
                    </div>
                   </div>
                   
                   <div class="w3-col">
                    <div class="w3-panel w3-light-grey">  
                       <table style="width: 100%;">  
                       <p>&nbsp;</p>     
                        <tr valign="baseline">
                          <td><input type="hidden" name="other_name" value="" size="32" id="outputFullnamevii" readonly="readonly" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Other Documents</td>
                          <td><input type="file" name="other_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                      </table>   
                    </div>
                   </div>          
                   
               </div>

               <div class="w3-col s6">
                    <div class="w3-panel w3-light-grey">                              
                       <table style="width: 100%;">
                       <p>&nbsp;</p>
                        <tr valign="baseline">
                          <td><input type="hidden" name="resume_name" value="" size="32" id="outputFullnameiv" readonly="readonly" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Resume</td>
                          <td><input type="file" name="resume_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                        

                        <tr valign="baseline">
                          <td><input type="hidden" name="video_name" value="" size="32" id="outputFullnameiii" readonly="readonly" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Video</td>
                          <td><input type="file" name="video_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
              
                        <tr valign="baseline">
                          <td><input type="hidden" name="transcript_name" value="" size="32" id="outputFullnamev" readonly="readonly" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Transcript : </td>
                          <td><input type="file" name="transcript_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                        
                        <tr valign="baseline">
                          <td><input type="hidden" name="visa_name" value="" size="32" id="outputFullnamevi" readonly="readonly" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="left">Visa : </td>
                          <td><input type="file" name="visa_file" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td><input type="hidden" name="application_application_id" value="<?php echo $row_appSet['application_id']+1?>" size="32" /></td>
                        </tr>
                       </table>  
                    </div>
               </div> 
                              
              </div>          	  
                    
                    
                           
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="action-button" value="Submit" />
                    <input type="hidden" name="MM_insert" class="submit action-button" value="msform" />
              </fieldset>
                    <input type="hidden" name="MM_insert" value="form1" />
                    

            </form>    
			
            <p>&nbsp;</p>
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
            <h4>Welcome to ..</h4>
            <h1 class="w3-xxxlarge w3-animate-bottom ">Studet Management System</h1>

              <!--<div class="w3-padding-32">
                  <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="#" style="font-weight:900;">ห้ามกดเด็ดขาด</button>
              </div>-->
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
    

</body>
</html>

