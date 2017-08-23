<?php session_start();

if (isset($_SESSION['cedula'])) {
 	header('Location: index.php');
 } 

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 	$cedula = filter_var(strtolower($_POST['cedula']), FILTER_SANITIZE_STRING);
 	$password = $_POST['clave'];
 	$password2 = $_POST['clave2'];
 	$nombre = $_POST['nombre'];
 	$apellido = $_POST['apellido'];
 	$correo = $_POST['correo'];
 	$telefono = $_POST['telefono'];
 	$whatsapp = $_POST['whatsapp'];
 	$organizacion = $_POST['organizacion'];

 	$errores = '';

 	if (empty($usuario) or empty($password) or empty($password2) or empty($nombre) or empty($apellido) or empty($correo) or empty($telefono) or empty($whatsapp) or empty($organizacion)) {
 		$errores .= '<li>Por favor, rellena todos los datos correctamente</li>';
 	} else {
 		try {
 			$conexion = new PDO('mysql:host=localhost;dbname=portafra_asamblea','portafra_apc','l0c0y0l0c0y0');
 		} catch (PDOException $e) {
 			echo "Error: " . $e -> getMessage();
 		}

 		$statement = $conexion -> prepare('SELECT * FROM usuarios WHERE cedula = :cedula LIMIT 1');
 		$statement -> execute(array(':cedula' => $cedula));
 		$resultado = $statement -> fetch();

 		
 		if ($resultado != false) {
 			$errores .= '<li>El usuario ya existe</li>';
 		}

 		$password = ($password);
 		$password2 = ($password2);

 		if ($password != $password2) {
 			$errores .= '<li>Las contraseñas no son iguales</li>';
 		}

 	}

 	if ($errores == '') {
 		$statement = $conexion -> prepare('INSERT INTO usuarios(id, usuario, clave, clave2, nombre, apellido, correo, telefono, whatsapp, organizacion) VALUES (null, :usuario, :clave, :clave2, :nombre, :apellido, :correo, :telefono, :whatsapp, :organizacion)');
 		$statement -> execute(array(':usuario' => $usuario, ':clave' => $password, ':clave2' => $password2, ':nombre' => $nombre, ':apellido' => $apellido, ':correo' => $correo, ':telefono' => $telefono, ':whatsapp' => $whatsapp, ':organizacion' => $organizacion));

 		header('Location: login.php');
 	}

 }

require 'views/registrate.view.php';

?>