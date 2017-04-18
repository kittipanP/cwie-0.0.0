<?php 
       
       ob_start();
       session_start();
       require_once '../../db_connect/dbconnection.php';
       
       //If session is not set, the page redirect to login
        if (!isset($_SESSION['user'])){
            header("Location: ../../ui_connect/login/login.php");
            exit;
        }
        $query_session = mysqli_query($link, "SELECT * from login_info where login_id = " .$_SESSION['user']);
        $userRow = mysqli_fetch_array($query_session);
        //Checking user loing in end//
        ?>
<?php
        $error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
        // basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
                //basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$result =mysqli_query($link, "SELECT email FROM login_info WHERE email='$email'");
			
			$link = mysqli_num_rows($result);
			if($link!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
                
                // if there's no error, continue to signup
		if( !$error ) {
			
			$signup_query =mysqli_query( $link, "INSERT INTO login_info (full_name,email,password) VALUES('$name','$email','$password')");
			
				
			if ($signup_query) {
				$errTyp = "success";
				$errMSG = "Successfully registered";
				unset($name);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}

?>