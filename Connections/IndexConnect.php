<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_IndexConnect = "localhost";
$database_IndexConnect = "urr_dbiii";
$username_IndexConnect = "root";
$password_IndexConnect = "Kp5610761!";
$IndexConnect = mysql_pconnect($hostname_IndexConnect, $username_IndexConnect, $password_IndexConnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>