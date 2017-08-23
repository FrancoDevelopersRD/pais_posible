<?php

$host="localhost:3306;";
$user="root";
$password="root";
$dbname = "pais_posible";

$conn = mysqli_connect($host, $user, $password, $dbname);
$link_quality = mysqli_connect("localhost:3306;", "root", "root", "pais_posible");

?>

<?php

$nivel_nuevo = $_GET['nivel_nuevo'];
$nivel_actual = $_GET['nivel_actual'];
$agente_creador = $_GET['agente_creador'];

$nivel_editado = 1;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
      $query_niveles_acceso = "UPDATE niveles_acceso SET nivel_acceso = '$nivel_nuevo' WHERE nivel_acceso = '$nivel_actual'";


  mysqli_query($conn, $query_niveles_acceso);

  header("Location: niveles_acceso.php?nivel_editado=".$nivel_editado."");
  

?>