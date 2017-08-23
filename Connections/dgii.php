<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dgii = "localhost:3306";
$database_dgii = "datos_externos";
$username_dgii = "root";
$password_dgii = "root";
$dgii = mysql_pconnect($hostname_dgii, $username_dgii, $password_dgii) or trigger_error(mysql_error(),E_USER_ERROR); 
?>