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

$agente_creador = $_POST['agente_creador'];
$clave = $_POST['clave'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$sexo = $_POST['sexo'];
$estado_civil = $_POST['estado_civil'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$rnc = $_POST['rnc'];
$razon_social = $_POST['razon_social'];
$nombre_comercial = $_POST['nombre_comercial'];
$website = $_POST['website'];
$posicion = $_POST['posicion'];
$provincia = $_POST['provincia'];
$municipio = $_POST['municipio'];
$sector = $_POST['sector'];
$circunscripcion = $_POST['circunscripcion'];
$codigo_recinto = $_POST['codigorecinto'];
$nombre_recinto = $_POST['recinto'];
$direccion_recinto = $_POST['direccion_recinto'];
$colegio_electoral = $_POST['colegio_electoral'];
$fecha_membresia = $_POST['fecha_membresia'];
$comentario = $_POST['comentario'];
$nivel_acceso = $_POST['nivel_acceso'];
$conyugue_nombres = $_POST['nombre_conyugue'];
$conyugue_apellidos = $_POST['apellido_conyugue'];
$conyugue_telefono = $_POST['telefono_conyugue'];
$conyugue_celular = $_POST['celular_conyugue'];
$conyugue_correo = $_POST['correo_conyugue'];
$hijo1_nombres = $_POST['nombre_hijo'];
$hijo1_apellidos = $_POST['apellido_hijo'];
$hijo1_telefono = $_POST['telefono_hijo'];
$hijo1_celular = $_POST['celular_hijo'];
$hijo1_correo = $_POST['correo_hijo'];
$hijo2_nombres = $_POST['nombre_hijo2'];
$hijo2_apellidos = $_POST['apellido_hijo2'];
$hijo2_telefono = $_POST['telefono_hijo2'];
$hijo2_celular = $_POST['celular_hijo2'];
$hijo2_correo = $_POST['correo_hijo2'];
$padre_nombres = $_POST['nombre_padre'];
$padre_apellidos = $_POST['apellido_padre'];
$padre_telefono = $_POST['telefono_padre'];
$padre_celular = $_POST['celular_padre'];
$padre_correo = $_POST['correo_padre'];
$madre_nombres = $_POST['nombre_madre'];
$madre_apellidos = $_POST['apellido_madre'];
$madre_telefono = $_POST['telefono_madre'];
$madre_celular = $_POST['celular_madre'];
$madre_correo = $_POST['correo_madre'];
$hermano1_nombres = $_POST['nombre_hermano'];
$hermano1_apellidos = $_POST['apellido_hermano'];
$hermano1_telefono = $_POST['telefono_hermano'];
$hermano1_celular = $_POST['celular_hermano'];
$hermano1_correo = $_POST['correo_hermano'];
$hermano2_nombres = $_POST['nombre_hermano2'];
$hermano2_apellidos = $_POST['apellido_hermano2'];
$hermano2_telefono = $_POST['telefono_hermano2'];
$hermano2_celular = $_POST['celular_hermano2'];
$hermano2_correo = $_POST['correo_hermano2'];



$pruebaSweet = 12;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

      $query_cliente = "INSERT INTO usuarios (cedula, nombres, apellidos, clave, correo, telefono, celular, sexo, estado_civil, fecha_nacimiento ,rnc, razon_social, nombre_comercial, posicion, provincia, municipio, sector, circunscripcion, codigo_recinto, nombre_recinto, direccion_recinto, colegio_electoral, comentario, conyugue_nombres, conyugue_apellidos, conyugue_telefono, conyugue_celular, conyugue_correo, hijo1_nombres, hijo1_apellidos, hijo1_telefono, hijo1_celular, hijo1_correo, hijo2_nombres, hijo2_apellidos, hijo2_telefono, hijo2_celular, hijo2_correo, padre_nombres, padre_apellidos, padre_telefono, padre_celular, padre_correo, madre_nombres, madre_apellidos, madre_telefono, madre_celular, madre_correo, hermano1_nombres, hermano1_apellidos, hermano1_telefono, hermano1_celular, hermano1_correo, hermano2_nombres, hermano2_apellidos, hermano2_telefono, hermano2_celular, hermano2_correo, nivel_acceso, agente_creador, estatus) VALUES ('$cedula','$nombres','$apellidos','$clave','$correo','$telefono','$celular','$sexo','$estado_civil','$fecha_nacimiento','$rnc','$razon_social','$nombre_comercial','$posicion','$provincia','$municipio','$sector','$circunscripcion','$codigo_recinto','$nombre_recinto','$direccion_recinto','$colegio_electoral','$comentario','$conyugue_nombres','$conyugue_apellidos','$conyugue_telefono','$conyugue_celular','$conyugue_correo','$hijo1_nombres','$hijo1_apellidos','$hijo1_telefono','$hijo1_celular','$hijo1_correo','$hijo2_nombres','$hijo2_apellidos','$hijo2_telefono','$hijo2_celular','$hijo2_correo','$padre_nombres','$padre_apellidos','$padre_telefono','$padre_celular','$padre_correo','$madre_nombres','$madre_apellidos','$madre_telefono','$madre_celular','$madre_correo','$hermano1_nombres','$hermano1_apellidos','$hermano1_telefono','$hermano1_celular','$hermano1_correo','$hermano2_nombres','$hermano2_apellidos','$hermano2_telefono','$hermano2_celular','$hermano2_correo','$nivel_acceso','$agente_creador',1)";

      

  mysqli_query($conn, $query_cliente);
  header("Location: registrar_usuario.php?pruebaSweet=".$pruebaSweet."");



?>
