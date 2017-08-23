<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos2.css">
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Roperto's CSS -->

  <link href="../css/roperto.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

  <!-- Timeline CSS -->
  <link href="../dist/css/timeline.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!--Estilos de DatePicker-->
  <link href="../css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

  <!-- DataTables CSS -->
  <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

  <!-- Sweet Alert -->

  <link rel="stylesheet" href="../bower_components/sweetalert2/dist/sweetalert2.min.css">

  <!-- Custom Fonts -->
  <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Registrate</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo" style="color: #fff;">Registrate</h1>
		<hr class="border">
		
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login" >
			
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="cedula" id="cedula" class="cedula" placeholder="Cedula" style="width: calc(100% - 52px);">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" id="nombre" class="nombre" placeholder="Nombre" style="width: calc(100% - 52px);">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="apellido" id="apellido" class="apellido" placeholder="Apellido" style="width: calc(100% - 52px);">
			</div>			

			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="correo" class="correo" placeholder="Correo" style="width: calc(100% - 52px);">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="telefono" class="telefono" placeholder="Telefono" style="width: calc(100% - 52px);">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="whatsapp" class="whatsapp" placeholder="Whatsapp" style="width: calc(100% - 52px);">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="organizacion" class="organizacion" placeholder="Organización" style="width: calc(100% - 52px);">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="clave" class="clave" placeholder="Contraseña" style="width: calc(100% - 52px);">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="clave2" class="clave2" placeholder="Repetir Contraseña" style="width: calc(100% - 105px);">
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
			¿ Ya tienes cuenta ?
			<a href="index.php" style="color: #4267b2; margin-bottom: 20px;">Iniciar Sesión</a>
		</p>

	</div>
	  <!-- jQuery -->
            <script src="../bower_components/jquery/dist/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

            <!-- Monent -->
            <script language="javascript" src="../bower_components/bootstrap/js/moment.js"></script>

            <!-- transition -->
            <script language="javascript" src="../bower_components/bootstrap/js/transition.js"></script>

            <!-- collapse -->
            <script language="javascript" src="../bower_components/bootstrap/js/collapse.js"></script>

            <!-- datepicker -->
            <script language="javascript" src="../bower_components/bootstrap/js/bootstrap-datetimepicker.js"></script>

            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

            <!-- DataTables JavaScript -->
            <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
            <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

            <!-- Sweet Alert-->

            <!-- for IE support -->
            <script src="../bower_components/sweetalert2/dist/sweetalert2.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="../dist/js/sb-admin-2.js"></script>
            <!-- Scripts de Ivan Roperto -->
            <script src="../js/functions.js"></script>

            <script type="text/javascript">

            </script>
            <script>

            $("#cedula").change(function () {
      var valor = $(this).val();
      if (valor.length==11) {
        $.post("cedulaFullform.php", {'buscar_cedTodo':$(this).val()}, function (data){
          $("#nombre").val(data.nombre);
          $("#apellido").val(data.apellido);
        },"json");
  }else{
    $("#nombre").val('');
    $("#apellido").val('');
  };

});

	 $("#cedula").keyup(function () {
      $.post("cedulaFullform.php",{'buscar_cedTodo':$(this).val()}, function (data) {

        var nombres = data.nombres;
                    //$("#id").val(id);
                    $("#nombre").val(nombre);
                    $("#nombre").val(data.nombre);
                    $("#apellido").val(apellido);
                    $("#apellido").val(data.apellido);
                  }, "json");
  });
	 </script>
</body>
</html>