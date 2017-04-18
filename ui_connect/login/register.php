<?php 
    //Database connection
    require_once '../../db_connect/dbconnection.php'; //Connection to Database?>

<?php
    //Login Fucntion
    require_once 'function/func_register.php';
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
    <title>Register: Add a new user</title>
</head>
<body class="w3-theme-l5">

<!-- Navigation bar -->
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
                <div >
                    <!--New Code-->
                    
                    <div class="register-form">    
                        <h3 class = "hcol1">Register</h3>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">                        
                            <hr />
                            <!--PHP CODE-->
                            <?php if ( isset($errMSG) ) {?>
                            <div class="form-group1">
                                
				<span class="fa fa-exclamation-circle "></span> <?php echo $errMSG; ?>
                              
                            </div>
                            <?php } ?>
                            
                            <div class="form-group1">
                                <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                                <i class="fa fa-user" aria-hidden="true"></i>

                                </div>
                                <span class="text-danger"><?php echo $nameError; ?></span>
                            </div>
                            
                            
                            <div class="form-group1">
                                <div class="input-group1">
                                <input class=" form-control1 " type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <span class="text-danger"><?php echo $emailError; ?></span>
                            </div>
                            
                            <div class="form-group1">
                                <div>
                                <input class = "form-control1" type="password" name="pass"  placeholder="Password" />
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <span><?php echo $passError; ?></span>
                            </div>
                            <hr />
                            
                            <div class="form-group1">
                                <input type="submit" class="reg-btn1" name="btn-signup" value = "Sign Up"/>
                                
   
                            </div>

                            <div class="form-group1">
                            <br />    
                            </div>
            

                        </form>
                    </div>
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

</script>
</body>
</html> 
