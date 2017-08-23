<?php  session_start();

if (isset($_SESSION['cedula'])) {
 	header('Location: crm/panel_administrador.php');
 } 

 $errores = '';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 	$cedula = filter_var(strtolower($_POST['cedula']), FILTER_SANITIZE_STRING);
 	$password = $_POST['password'];
 	//$password = hash('sha512', $password);

 	try {
 		$conexion = new PDO('mysql:host=localhost:3306;dbname=pais_posible', 'root', 'root');
 	} catch (PDOException $e) {
 		echo "Error: " . $e -> getMessage();
 	}

 	$statement = $conexion -> prepare('SELECT * FROM usuarios WHERE cedula = :cedula AND clave = :password');
 	$statement -> execute(array(':cedula' => $cedula, ':password' => $password));
 	$resultado = $statement -> fetch();
 	
 	if ($resultado !== false) {
 		$_SESSION['cedula'] = $cedula;
 		header('Location: index.php');
 	} else {
 		$errores .= '<li>Datos Incorrectos</li>';
 	}
 	
 }

require 'views/login.view.php';

?>