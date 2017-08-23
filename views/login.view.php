<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos2.css">
	<title>Iniciar Sesión</title>
</head>
<body>
	<div class="contenedor" style="margin-top: 200px;">
		<h1 class="titulo" style="color:#fff;">Bienvenido a País Posible</h1>
		<hr class="border">
		
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="cedula" class="cedula" placeholder="Cedula">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()" style="background-color: #4267b2;"></i>
			</div>

			<?php if(!empty($errores)): ?>
				<div class= "error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>

		</form>

		<p class="texto-registrate">
			¿ Aún no tienes cuenta ?
			<a href="registrate.php" style="color:#4267b2;">Registrate</a>
		</p>

	</div>
</body>
</html>