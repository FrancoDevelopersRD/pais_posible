<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_quality = "localhost:3306";
$database_quality = "pais_posible";
$username_quality = "root";
$password_quality = "root";
$quality = mysql_pconnect($hostname_quality, $username_quality, $password_quality) or trigger_error(mysql_error(),E_USER_ERROR); 
?>