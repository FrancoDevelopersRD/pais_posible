<?php
$host="localhost:3306";
$user="root";
$password="root";

$link = mysql_connect ($host, $user, $password) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
?>
<body>
<table>
<tr>
<td>RNC</td>
<td>Nombre</td>
</tr>
<?php
   $dbname="datos_externos";
   $tablename="rnc";
   $query="SELECT * FROM $tablename LIMIT 5";
   $result=mysql_db_query ($dbname, $query, $link);
   while ($row = mysql_fetch_array ($result))
   {
      print ("<TR>");
      print ("<TD>$row[rnc]</TD>\n");
      print ("<TD>$row[razon_social]</TD>\n");
      print ("</TR>");
    }
    mysql_free_result($result);
?>
</table>
</body>
