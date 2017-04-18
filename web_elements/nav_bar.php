<?php 
    //Database Connection
    require_once '../../db_connect/dbconnection.php';?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <div class="w3-top">
        <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
             <!--Some Icon-->
            <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
            <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            </li>
            <!--Home Icon-->
            <li><a href="../../index.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a></li>
            <!--Student Icon-->
            <li class="w3-hide-small"><a href="../../ui_connect/Student_Management/Student_Management.php" class="w3-padding-large w3-hover-white" title="Student Management"><i class="fa fa-group"></i></a></li>
            <!--Report Icon-->
            <li class="w3-hide-small"><a href="../../ui_connect/Report/Report.php" class="w3-padding-large w3-hover-white" title="Report"><i class="fa fa-bar-chart-o"></i></a></li>
            <!--Report Icon-->
            <li class="w3-hide-small"><a href="../../ui_connect/Email_Management/Email_Management.php" class="w3-padding-large w3-hover-white" title="E-mail Management"><i class="fa fa-envelope"></i></a></li>
            <!-- Activity Icon-->
            <li class="w3-hide-small"><a href="../../ui_connect/activity_management/activity.php" class="w3-padding-large w3-hover-white" title="Activities Management"><i class="fa fa-puzzle-piece"></i></a></li>
            <!-- Notification Icon-->
            <li class="w3-hide-small w3-dropdown-hover"><a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bullhorn"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>     
                <div class="w3-dropdown-content w3-white w3-card-4">
                    <!--PHP Code here for the notifications-->
                    <a href="#">Notification 1</a>
                    <a href="#">Notification 2</a>
                    <a href="#">Notification 3</a>
                </div>
            </li>
            <!--Account Ask Bon to Help-->
            <li class=" w3-right w3-dropdown-hover  ">
                <a href="#" class=" w3-hide-small w3-padding-large w3-hover-white w3-avatar" title="<?php echo $userRow['full_name'];?>"><img src="../../img/Avatar/boy.png" alt="Avatar" width="106" height="102" class="w3-circle" style="height:25px;width:25px"></img></a>
            <!--Drop Down Menu for Account-->
                <div class="w3-dropdown-content w3-white w3-card-4 ">
                    <!--PHP Code here for the username to show-->
                    <a style="font-size: 16px;" href="#"><?php echo $userRow['full_name'];?></a>
                    <a style="font-size: 16px;" href="../../ui_connect/login/register.php">Add a user</a>
                    <a style="font-size: 16px;" href="../../ui_connect/login/update.php">Update a user</a>
                    <a style="font-size: 16px;" href="../../ui_connect/login/logout.php?logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- Navigation bar on small screens -->
    <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
        <ul class="w3-navbar w3-left-align w3-large w3-theme">
          <li><a class="w3-padding-large" href="../../ui_connect/Student_Management/Student_Management.php">Student Management</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/Report/Report.php">Report</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/Email_Management/Email_Management.php">E-mail Management</a></li>
          <li><a class="w3-padding-large" href="../../ui_connect/my_profile/my_profile.php">Profile</a></li>
        </ul>
    </div>
    
</body>
</html>