<?php

$host="localhost:3306;";
$user="root";
$password="root";
$dbname = "pais_posible";

$conn = mysqli_connect($host, $user, $password, $dbname);
$link_quality = mysqli_connect("localhost:3306;", "root", "root", "pais_posible");

?>

<?php

$nivel = $_GET['nivel'];
$agente_creador = $_GET['agente_creador'];

$nivel_agregado = 1;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
      $query_niveles_acceso = "INSERT INTO niveles_acceso (nivel_acceso, agente_creador) VALUES ('$nivel','$agente_creador')";


  mysqli_query($conn, $query_niveles_acceso);

  header("Location: niveles_acceso.php?nivel_agregado=".$nivel_agregado."&nuevo_nivel=".$nivel."");
  

?>
