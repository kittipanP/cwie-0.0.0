<?php
        ob_start();
        session_start();

        //If session is set, this page won't show up
        if (isset($_SESSION['user'])!=""){
            header("Location:../../index.php");
            exit;
        }
?>

<?php 
    //Database connection
    require_once('../../Connections/MyConnect.php'); //Connection to Database?>

<?php
    //Login Fucntion
    //require_once 'function/func_login.php';
?>

<?php ////new code
$error = false;
        //Prevent Sql Injections
        if (isset($_POST['btn-login'])){
            $email = trim($_POST['email']);
            $email = strip_tags($email);
            $email = htmlspecialchars($email);

            $pass = trim($_POST['pass']);
            $pass = strip_tags($pass);
            $pass = htmlspecialchars($pass);

            //If email error
            if (empty($email)){
                $error = true;
                $emailError = "Please enter a valid email address.";    
                } else if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                    $error = true;
                    $emailError = "Please enter vald email address.";
                }
            //If Password error    
            if (empty($pass)){
                $error = true;
                $passError = "Please enter password.";
            }

            //If no error
            if (!$error){
                $password = hash('sha256', $pass); // password hashing using SHA256
                $query_login = mysqli_query($link, "SELECT login_id, email, password  FROM login_info WHERE  email = '$email'  ");
                $row = mysqli_fetch_array($query_login);
                $count= mysqli_num_rows($query_login);

             if ($count == 1 && $row[password] == $password){
                 $_SESSION['user'] = $row['login_id'];
                 header("Location: ../../index.php");      
                }else{
                    $errMSG = "Incorrect Credentials, Try again";
                }   
            }    
}


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
    <link href="../../libs/css/font-awesome.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="../../libs/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css"></link>
    <link rel="icon" type="../../image/png" href="../../img/images/wd.png"/>
    
    <title>Login: WD Trainee</title>
</head>

<body class="w3-theme-l5">

<!-- Page Container Start -->
    <div class="w3-container w3-content" style="max-width:1400px;margin-top:2px">   
    <!-- The Grid Start -->
        <div class="w3-row"> 

            <!-- Header -->
            <header class="w3-container w3-theme w3-padding w3-round" id="myHeader">
                <div class="w3-center">
                    <h1 class="w3-xxlarge w3-animate-left">Welcome To</h1>
                    <h1 class="w3-xxxlarge w3-animate-right">Trainee Management System</h1>

                </div>
            </header>

                        <p>&nbsp;</p>
 
    <!-- Left Column -->
        <div class="w3-col m6">
            <div class="w3-row-padding w3-center w3-margin-top">

                <!-- Student Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-padding-top" style="min-height:460px">
                        <h6 class = "hcol" >Student Management</h6><br></br>
                            <i class="fa fa-group w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
                                <div class = "hcol" >
                                <p>Add, Edit, Delete</p>
                                <p>Rejected Student</p>
                                <p>Waiting On Board</p>
                                <p>Trainee</p>
                                <p>End Trainee</p>
                                </div>
                    </div>
                </div>

                <!-- Report Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-padding-top" style="min-height:460px">
                        <h6 class = "hcol">Report</h6><br></br>
                            <i class="fa fa-bar-chart-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>

                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                    </div>
                </div>

                <!-- Email Management-->
                <div class="w3-third">
                    <div class="w3-card-2 w3-padding-top" style="min-height:460px">
                        <h6 class = "hcol">E-mail Management</h6><br></br>
                            <i class="fa fa-envelope w3-margin-bottom w3-text-theme" style="font-size:120px"></i>

                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                                <p>-------------------</p>
                    </div>
                </div>

            </div>
        </div>    
    <!-- End Left Column -->
             <p>&nbsp;</p>
            <!-- Right Column Start (Login) -->
            <div class="w3-col m6">
            <p></p><!-- Just to balance the all columns -->
                <div class="w3-card-2 ">
                    <!--New Code-->
                    <hr />
                    <div class="login-form">    
                        <h3 class = "hcol">Login</h3>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">                        
                            <hr />
                            <!--PHP CODE-->
                            <?php if ( isset($errMSG) ) {?>
                            <div class="form-group">
                                
				<span class="fa fa-exclamation-circle "></span> <?php echo $errMSG; ?>
                              
                            </div>
                            <?php } ?>
            
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input class=" form-control " type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <span class="text-danger"><?php echo $emailError; ?></span>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                <input class = "form-control" type="password" name="pass" class="form-control" placeholder="Password" />
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <span class="alert"><?php echo $passError; ?></span>
                          
                            <hr />
                            
                            <div class="form-group">
                                <input type="submit" class="log-btn" name="btn-login" value = "Log In">
                                
   
                            </div>

                            <div class="form-group">
                            <br />    
                            </div>
            

                        </form>
                    </div>
                </div>
                    
                <!-- End Right Column -->
            </div>
            <!-- End The Grid -->
        </div>
        <!-- End The Page Container -->
    </div>
<p>&nbsp;</p>
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
