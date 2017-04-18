<?php
        ob_start();
        session_start();

        //If session is set, this page won't show up
        if (isset($_SESSION['user'])!=""){
            header("Location:../../index.php");
            exit;
        }

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