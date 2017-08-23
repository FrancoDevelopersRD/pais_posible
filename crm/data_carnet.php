<?php

$host="localhost:3306";
$user="root";
$password="root";
$dbname = "pais_posible";

$conn = mysqli_connect($host, $user, $password, $dbname);
$link_pais_posible = mysqli_connect("localhost:3306", "root", "root", "pais_posible");

  /*$query_contactos2 = mysqli_query($link_quality, "SELECT (id+1) AS contacto FROM contacto_telefonico ORDER BY id DESC LIMIT 1");
  $contacto2 = mysqli_fetch_assoc($query_contactos2);*/

?>

<?php

$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$agente_creador = $_POST['agente_creador'];
$provincia = $_POST['provincia'];
$municipio = $_POST['municipio'];
$sector = $_POST['sector'];
$circunscripcion = $_POST['circunscripcion'];
$codigo_recinto = $_POST['codigorecinto'];
$nombre_recinto = $_POST['recinto'];
$direccion_recinto = $_POST['direccion_recinto'];
$colegio_electoral = $_POST['colegio_electoral'];
$nivel_acceso = $_POST['nivel_acceso'];
$pruebaSweet = 12;


if(!empty($_FILES['archivo']['name'])) {
$nombreimg = $_FILES['archivo']['name'];
$archivo = $_FILES['archivo']['tmp_name'];
$extension = end(explode(".", $_FILES['archivo']['name']));
$ruta = "fotos";
$ruta = $ruta."/".$nombreimg;
move_uploaded_file($archivo, $ruta);
} else {

if(empty($_FILES['archivo']['name']) AND $sexo == "M") {
	$ruta = "fotos/hombre.png";
}

if(empty($_FILES['archivo']['name']) AND $sexo == "F") {
	$ruta = "fotos/mujer.png";
}

}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

      $query_cliente = "INSERT INTO carnet (cedula, nombres, apellidos, sexo, fecha_nacimiento, provincia, municipio, sector, circunscripcion, codigo_recinto, nombre_recinto, direccion_recinto, colegio_electoral, nivel_acceso, foto, agente_creador, estatus) VALUES ('$cedula','$nombres','$apellidos','$sexo','$fecha_nacimiento','$provincia','$municipio','$sector','$circunscripcion','$codigo_recinto','$nombre_recinto','$direccion_recinto','$colegio_electoral','$nivel_acceso','$ruta','$agente_creador',1)";

      

  mysqli_query($conn, $query_cliente);
  header("Location: carnet_generado.php?cedula=".$cedula."");



?>
