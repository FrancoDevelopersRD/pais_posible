<?php
$host="localhost:3306";
$user="root";
$password="root";

$link = mysql_connect ($host, $user, $password) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
?>


<?php
   $dbname="datos_externos";
   $tablename="rnc";
   $rnc = $_POST['buscar_rnc'];
   $query="SELECT * FROM rnc WHERE rnc = '$rnc'";
   $result=mysql_db_query ($dbname, $query, $link);
   $row = mysql_fetch_array ($result);
   //$row_razon_social = $row[razon_social];
   //$row_nombre_comercial = $row[nombre_comercial];

   if ($row['rnc'] != '') {
    echo json_encode(array("razon_social"=>$row['razon_social'],"nombre_comercial"=>$row['nombre_comercial'],"website"=>$row['website']));
   }else{
    echo json_encode(array("razon_social"=>"", "nombre_comercial"=>"", "website"=>""));
   }


    mysql_free_result($result);
?>
