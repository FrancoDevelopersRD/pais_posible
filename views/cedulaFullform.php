<?php
$host="localhost:3306";
$user="root";
$password="root";

$link = mysql_connect ($host, $user, $password) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
?>


<?php
   $dbname="datos_externos";
   $tablename="padron";
   $cedula = $_POST['buscar_cedTodo'];

  $link_quality = mysqli_connect($host, $user, $password, "datos_externos");

  $query_existe = "SELECT cedula from padron WHERE  cedula = '$cedula'";
  $result_existe = mysqli_query($link_quality, $query_existe);
  $row_existe = mysqli_fetch_assoc($result_existe);



  if (!($row_existe['cedula']=='')){
    $query = "SELECT nombresplastico, apellidosplastico, DATE(FechaNacimiento) AS nacimiento FROM padron WHERE cedula = '$cedula'";
    $result = mysqli_query($link_quality, $query);
    $row = mysqli_fetch_assoc($result);

    $nacimiento = fecha($row[nacimiento]);

    echo json_encode(
      array(
        "nombre"             => "$row[nombresplastico]", 
        "apellido"              => "$row[apellidosplastico]"
        )
      );
   }else{
    echo json_encode(
      array(
        "nombre"        => "",
        "apellido"                   => ""
        )
      );

  } 
  mysql_free_result($result_existe);
?>