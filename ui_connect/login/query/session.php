<?php
//User Session   
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
