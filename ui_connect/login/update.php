<?php
    //Session Query
    require_once '../../ui_connect/login/query/session.php';?>
<?php 
    //Show all user query
    require_once '../../ui_connect/login/query/show_user_query.php';
    
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    <link rel="stylesheet" href="../../libs/css/w3.css"></link>
    <link rel="stylesheet" href="../../libs/css/w3-theme-blue-grey.css"></link>
    <link rel='stylesheet' href='../../libs/css/family=open_and_san.css'></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link rel="icon" type="image/png" href="../../img/images/wd.png"/>
    <title>Update: Update an old user</title>
</head>
<body class="w3-theme-l5">

<!-- Navigation bar Code -->
<?php 
    require_once '../../web_elements/nav_bar.php';
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">   
    <!-- The Grid -->
    <div class="w3-row"> 
    <!-- Header -->
	<header class="w3-container w3-theme w3-padding w3-round" id="myHeader">
            <!--<i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>-->
                <div class="w3-center">
                	<h1 class="w3-xxlarge w3-animate-left">Welcome To</h1>
                        <h1 class="w3-xxxlarge w3-animate-right">Trainee Management System</h1>
                </div>
            
                <div class = "w3-right-align">
                      
                    <h5>Current User: <?php echo $userRow['full_name'];?></h5>  
                </div>
	</header>
        <p>&nbsp;</p>

    <!-- Left Column -->
        
            <!-- Just to balance the all columns -->
                <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="allRecent">
              <h2><strong>All Users</strong></h2>
              <p>Search for a user in the input field.</p>
              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search for a user" id="allRecentInput" onkeyup="allRecentFn()">
                  <div class="addnew ">
                      <h3 > <a href="register.php" title="Add new a user" class="textdecoration"><strong>Add new  </strong><i class="fa fa-pencil w3-margin-right"></i></a></h3>
                  </div>
            
        
            
        <table class="w3-table-all w3-margin-top w3-hoverable" ><!--Add a new css-->
                <tr class="tr_heading">
                  <th style="width:15%;">Full Name</th>
                  <th style="width:15%;">Email Address</th>
                  <th style="width:10%;">Account Created</th>
                  <th style="width:5%;">Edit</th>
                  <th style="width:5%;">Delete</th>
                </tr>
                
            <?php while ($row= mysqli_fetch_array($show_user_queries)): ?>
                    <tr>
                        <!--Data from Database-->
                        
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['created_details']; ?></td>
                        
                      <!---Icons-->
                      <td><a href="#" title = "Edit"><i class="fa fa-pencil w3-margin-left"></i></a></td>
                        <td><a href="#" title = "Delete"><i class="fa fa-trash w3-margin-left"></i></a></td>
                        
                    </tr>
                    
            <?php endwhile;  ?> 
            
                
        </table>  
         
        <p>&nbsp;</p>
        
        <div class="w3-center ">
            <ul class="w3-pagination ">
              <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Previous">&laquo;</a></li>
              <li>
			  	
              </li>
              <li><a class="w3-green w3-round" style = "color: #435761;" href="" title = "Next">&raquo;</a></li>
            </ul>
         </div>
        <p>&nbsp;</p>

                </div>
                    
                <!-- End Right Column -->
            </div>    
    <!-- End Left Column -->

            
    <!-- End The Grid -->
        </div>
    <!-- End The Page Container -->

    
<p>&nbsp;</p>
  
 
<!-- End Page Container -->


<?php 
    //Footer
    require_once '../../web_elements/footer.php'; ?> 

<?php
    //Script for toggling menu bar on small screen
    require_once '../../web_elements/script_menu.php';?>

</body>
</html> 
