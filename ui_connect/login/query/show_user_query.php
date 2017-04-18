<?php

require_once '../../db_connect/dbconnection.php';
$show_user_queries = mysqli_query($link, "SELECT * from login_info ORDER BY login_id;")

?>