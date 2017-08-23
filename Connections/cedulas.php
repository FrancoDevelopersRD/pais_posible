<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cedulas = "localhost:3306";
$database_cedulas = "datos_externos";
$username_cedulas = "root";
$password_cedulas = "root";
$cedulas = mysql_connect($hostname_cedulas, $username_cedulas, $password_cedulas) or trigger_error(mysql_error(),E_USER_ERROR); 
?>