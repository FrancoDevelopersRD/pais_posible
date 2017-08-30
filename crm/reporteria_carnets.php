<?php 
$hostname = "localhost:3306";
$database = "pais_posible";
$username = "root";
$password = "root";
$pais_posible = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['cedula'])) {
  header('Location: ../index.php');
 } 

$link_pais_posible = mysqli_connect("localhost:3306", "root", "root", "pais_posible");

    $result_agente = mysqli_query($link_pais_posible, "SELECT id FROM usuarios WHERE  cedula = '".$_SESSION['cedula']."'");
    $agente = mysqli_fetch_assoc($result_agente);


$result = mysqli_query($link_pais_posible, "SELECT id, nivel_acceso FROM niveles_acceso ORDER BY id ASC");

if(!empty($_GET['nivel_agregado'])){
      $nivel_agregado = $_GET['nivel_agregado'];
      $nuevo_nivel = $_GET['nuevo_nivel'];
    } else {
      $nivel_agregado = 2;
      $nuevo_nivel = 2;
    }

    $link_pais_posible = mysqli_connect("localhost:3306", "root", "root", "pais_posible");

$result_agente = mysqli_query($link_pais_posible, "SELECT id FROM usuarios WHERE  cedula = '".$_SESSION['cedula']."'");


$result = mysqli_query($link_pais_posible, "SELECT * FROM reportes");

$link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
$result_provincia = mysqli_query($link_datos_externos, "SELECT id AS val, descripcion AS provincia FROM provincia WHERE id <= 32");

$opt_provincia = "<option></option>";
while ($row = mysqli_fetch_assoc($result_provincia)) {
    $opt_provincia .= "<option value=\"".$row['val']."\">".utf8_decode(ucwords(strtolower($row['provincia'])))."</option>";
}

$result_municipio = mysqli_query($link_datos_externos, "SELECT id AS val, descripcion AS municipio FROM municipio");

$opt_municipio = "<option></option>";
while ($row = mysqli_fetch_assoc($result_municipio)) {
    $opt_municipio .= "<option value=\"".$row['val']."\">".utf8_decode(ucwords(strtolower($row['municipio'])))."</option>";
}

$result_municipio2 = mysqli_query($link_datos_externos, "SELECT id AS val, descripcion AS municipio FROM municipio");

$opt_municipio2 = "<option></option>";
while ($row = mysqli_fetch_assoc($result_municipio2)) {
    $opt_municipio2 .= "<option value=\"".$row['val']."\">".utf8_decode(ucwords(strtolower($row['municipio'])))."</option>";
}


$result_colegio_mesa = mysqli_query($link_datos_externos, "SELECT codigocolegio AS codigocolegio FROM colegio2016");

$opt_colegio_mesa = "<option></option>";
while ($row = mysqli_fetch_assoc($result_colegio_mesa)) {
    $opt_colegio_mesa .= "<option value=\"".$row['codigocolegio']."\">".utf8_decode(ucwords(strtolower($row['codigocolegio'])))."</option>";
}

$result_colegio_mesa2 = mysqli_query($link_datos_externos, "SELECT codigocolegio AS codigocolegio FROM colegio2016");

$opt_colegio_mesa2 = "<option></option>";
while ($row = mysqli_fetch_assoc($result_colegio_mesa2)) {
    $opt_colegio_mesa2 .= "<option value=\"".$row['codigocolegio']."\">".utf8_decode(ucwords(strtolower($row['codigocolegio'])))."</option>";
}

$result_nivel = mysqli_query($link_pais_posible, "SELECT id AS val, nivel_acceso AS nivel_acceso FROM niveles_acceso");

$opt_nivel = "<option></option>";
while ($row = mysqli_fetch_assoc($result_nivel)) {
    $opt_nivel .= "<option value=\"".$row['val']."\">".utf8_decode(ucwords(strtolower($row['nivel_acceso'])))."</option>";
}

$result_circunscripcion = mysqli_query($link_pais_posible, "SELECT circunscripcion AS circunscripcion FROM circ_alternativa");
$opt_circunscripcion = "<option></option>";
while ($row = mysqli_fetch_assoc($result_circunscripcion)) {
    $opt_circunscripcion .= "<option value=\"".$row['circunscripcion']."\">".utf8_decode(ucwords(strtolower($row['circunscripcion'])))."</option>";
}



if(!empty($_GET['pruebaSweet'])){
  $pruebaSweet = $_GET['pruebaSweet'];
} else {
  $pruebaSweet = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PAÍS POSIBLE</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

     <!-- <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../css/dataTables.responsive.css">
  <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" type="text/css">
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/animate.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.min.css">
  <link rel="stylesheet" href="../css/metisMenu.min.css">
  <link rel="stylesheet" href="../css/morris.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/sb-admin-2.min.css">
  <link rel="stylesheet" href="../css/select2.min.css" type="text/css">
  <link rel="stylesheet" href="../css/sweetalert.css">
  <link rel="stylesheet" href="../css/tether.min.css">
  <link rel="stylesheet" href="../css/timeline.css">
  <link rel="stylesheet" href="../css/toastr.min.css" type="text/css">-->

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" type="text/css" href="../select2/dist/css/select2.css">
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


  <link rel="stylesheet" href="../css/select2.min.css" type="text/css">

  <!-- DataTables CSS -->
  <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

  <!-- Sweet Alert -->

  <link rel="stylesheet" href="../bower_components/sweetalert2/dist/sweetalert2.min.css">

  <!-- Custom Fonts -->
  <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <style>
                .panel { box-shadow: 10px 10px 20px -8px grey; }
            </style> 

        </head>

        <body style="background-color: #4267b2;">

            <div id="wrapper">

                <!-- Navigation -->
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <img src="logo.jpg" alt="" style="margin-left: -130px; width :4%; height :4%; margin-top: 5px; margin-bottom: 5px;">
                    <img src="nombre_pais_posible.jpg" alt="" style="width :12%; height :12%;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="panel_administrador.php">&nbsp;</a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Read All Messages</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-messages -->
                        </li>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 1</strong>
                                                <span class="pull-right text-muted">40% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 2</strong>
                                                <span class="pull-right text-muted">20% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 3</strong>
                                                <span class="pull-right text-muted">60% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Task 4</strong>
                                                <span class="pull-right text-muted">80% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Tasks</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-tasks -->
                        </li>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-comment fa-fw"></i> New Comment
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-tasks fa-fw"></i> New Task
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-alerts -->
                        </li>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../cerrar.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.navbar-top-links -->



                    <div class="navbar-default sidebar" role="navigation" style="background:rgba(138,221,45,0.8);">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="sidebar-search">
                                    <div class="input-group custom-search-form">
                                        &nbsp;
                                    </div>
                                    <!-- /input-group -->
                                </li>
                                <li>
                                    <a href="panel_administrador.php" style="color: #000;"><i class="fa fa-hand-rock-o fa-fw"></i> Bienvenida</a>
                                </li>
                                <li>
                                    <a href="#" style="color: #000;"><i class="fa fa-users fa-fw"></i> Administracion de Usuarios<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="registrar_usuario.php" style="color: #000;"><i class="fa fa-user-plus fa-gears"></i> Registar Usuario</a>
                                        </li>
                                        <li>
                                            <a href="listado_usuarios.php" style="color: #000;"><i class="fa fa-list-alt fa-fw"></i> Listado de  Usuarios</a>
                                        </li>
                                        <li>
                                            <a href="niveles_acceso.php" style="color: #000;"><i class="fa fa-key fa-signal"></i> Niveles de Acceso</a>
                                        </li>
                                        <li>
                                            <a href="asignar_nivel.php" style="color: #000;"><i class="fa fa-hand-o-right fa-signal"></i> Asignar Nivel de Acceso</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" style="color: #000;"><i class="fa fa-picture-o fa-fw" ></i> Carnet de Membresía<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="generar_carnet.php" style="color: #000;"><i class="fa fa-address-card-o fa-gears"></i> Generar Carnet</a>
                                        </li>
                                        <li>
                                            <a href="listado_carnet.php" style="color: #000;"><i class="fa fa-list-alt fa-fw"></i> Listado de Carnets</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                <a href="#" style="color: #000;"><i class="fa fa-file-pdf-o fa-fw" ></i> Reportes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="reporteria_carnets.php" style="color: #000;"><i class="fa fa-file-pdf-o fa-gears"></i> Reportes de Carnet</a>
                                    </li>
                                    <li>
                                        <a href="reporteria_posibilistas.php" style="color: #000;"><i class="fa fa-file-pdf-o fa-fw"></i> Reportes de Posibilistas</a>
                                    </li>
                                </ul>
                            </li>

                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>

                <div id="page-wrapper" style="background-color: #4267b2;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="color: #fff;"><i class=" fa fa-file-pdf-o fa fa-file-pdf-o"></i> Reportes de Carnets</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-green">
                                <div class="panel-heading" style="font-size: 23px;">Lista de Reportes de Carnets</div>
                                <div class="panel-body">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-12">
                                            <a href="generar_reporte.php?tipo_reporte=general" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte General</a>  
                                            <button type="button" id="reporte_provincia" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Por Provincia</button> 
                                            <button type="button" id="reporte_municipio" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Por Municipio</button> 
                                            <button type="button" id="reporte_mesa" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Por Mesa</button> 
                                            <button type="button" id="reporte_fecha" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Por Fecha</button> 
                                            <hr />
                                            <button type="button" id="reporte_nivel" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Por Nivel</button> 
                                            <button type="button" id="reporte_circunscripcion" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Por Provincia Y Circunscripcion</button> 
                                            <button type="button" id="reporte_combinado" class="btn btn-danger" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Reporte Combinado</button> 
                                        </div>
                                    </div> 
                                </div>                           
                                    <div class="row">
                                        <div class="col-md-12">
                                        <table  width="100%" class="table table-striped table-bordered table-hover" id="resultados">

                                                <thead><tr><th style="text-align:center">Código</th><th style="text-align:center">Tipo de Reporte</th><th style="text-align:center">Fecha</th><th style="text-align:center">Creador</th><th style="text-align:center">Ver</th></thead><tbody>

                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) { 
                                                    $link_pais_posible2 = mysqli_connect("localhost:3306", "root", "root", "pais_posible");
                                                $result_reporte_carnet_lista = mysqli_query($link_pais_posible2, "SELECT CONCAT(nombres,' ',apellidos) AS nombre_creador FROM usuarios WHERE id = '".$row['agente_creador']."'");
                                                $query_creador = mysqli_fetch_assoc($result_reporte_carnet_lista);
                                                    ?>
                                                  <tr ><td style="text-align:center"><?php echo $row['codigo']; ?></td>
                                                        <td style="text-align:center"><?php echo ucwords($row['tipo_reporte']); ?></td>
                                                        <td style="text-align:center"><?php echo ucwords($row['fecha_creacion']); ?></td>
                                                        <td style="text-align:center"><?php echo ucwords($query_creador['nombre_creador']); ?></td>
                                                        <td style="text-align:center"><a href="carnets/reportes_carnets/<?php echo $row['codigo']; ?>.pdf" class="btn btn-success" id="ver_reporte" style="color: #fff;" target="_blank"><i class="fa fa-eye " style="color: #fff;"></a></i></button>  </td>
                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->


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
            
            <script type="text/javascript" src="../select2/dist/js/select2.js"></script>

            <!-- for IE support -->
            <script src="../bower_components/sweetalert2/dist/sweetalert2.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="../dist/js/sb-admin-2.js"></script>
            <!-- Scripts de Ivan Roperto -->
            <script src="../js/functions.js"></script>

            <script type="text/javascript">

            </script>
            <script>

             $(document).ready(function() {
                $('#resultados').DataTable({
                    responsive: true,   
                    "order": [[ 2, "desc" ]],
                    paging: true

                });
            });

  var pruebaSweet= <?php echo $pruebaSweet; ?>;

               if (pruebaSweet == 13){
                  swal({
                    title: "Reporte Generado Correctamente!",
                    text: "Esta ventana se cerrará en 3 segundos.",
                    imageUrl: "https://cdn4.iconfinder.com/data/icons/customicondesignoffice2/128/success.png",
                    timer : 3000,
                    showConfirmButton: false
                });
              }

              $("#reporte_provincia").click(function () {
                swal({
                    title: 'Generar Reporte Por Provincia',
                    customClass: 'swal-wide-1',
                    html: '<select id="reportando_provincia" name="reportando_provincia" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_provincia; ?></select>',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    confirmButtonText: 'Submit',
                    
                }).then(function(){
                    var reportando_provincia = document.getElementById('reportando_provincia').value;
                    window.location.href = 'generar_reporte.php?tipo_reporte=provincia&provincia_reportada='+reportando_provincia;
  
                });

                $("#reportando_provincia").select2({
                    placeholder:"Seleccione la provincia",
                    dropdownParent: jQuery('.swal-wide-1')
                });
                
            });

              $("#reporte_municipio").click(function () {
                swal({
                    title: 'Generar Reporte Por Municipio',
                    customClass: 'swal-wide-2',
                    html: '<select id="reportando_municipio" name="reportando_municipio" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_municipio; ?></select>',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    confirmButtonText: 'Submit',
                    
                }).then(function(){
                    var reportando_municipio = document.getElementById('reportando_municipio').value;
                    window.location.href = 'generar_reporte.php?tipo_reporte=municipio&reportando_municipio='+reportando_municipio;
  
                });

                $("#reportando_municipio").select2({
                    placeholder:"Seleccione la municipio",
                    dropdownParent: jQuery('.swal-wide-2')
                });
            });
              $("#reporte_mesa").click(function () {
                swal({
                    title: 'Generar Reporte Por Colegio Electoral o Mesa',
                    customClass: 'swal-wide-3',
                    html: '<select id="reportando_municipio2" name="reportando_municipio2" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_municipio2; ?></select>'+'<br /><br /><select id="reportando_mesa" name="reportando_mesa" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_colegio_mesa2; ?></select>',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    confirmButtonText: 'Submit',
                    
                }).then(function(){
                    var reportando_mesa = document.getElementById('reportando_mesa').value;
                    var reportando_municipio2 = document.getElementById('reportando_municipio2').value;
                    window.location.href = 'generar_reporte.php?tipo_reporte=mesa&reportando_mesa='+reportando_mesa+'&reportando_municipio2='+reportando_municipio2;
  
                });

                $("#reportando_mesa").select2({
                    placeholder:"Seleccione la mesa",
                    dropdownParent: jQuery('.swal-wide-3')
                });
                $("#reportando_municipio2").select2({
                    placeholder:"Seleccione la municipio",
                    dropdownParent: jQuery('.swal-wide-3')
                });
            });
              $("#reporte_fecha").click(function () {
                swal({
                    title: 'Generar Reporte Por Rango de Fecha',
                    customClass: 'swal-wide-5',
                    html: '<label id="lab_fecha_desde">Desde</label><div class="input-group date" id="datetimepicker_fecha_desde"/><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span><input type="text" name="fecha_desde" id="fecha_desde" class="form-control"/></div>'+'<label id="lab_fecha_hasta">Hasta</label><div class="input-group date" id="datetimepicker_fecha_hasta"/><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span><input type="text" name="fecha_hasta" id="fecha_hasta" class="form-control"/></div>',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    confirmButtonText: 'Submit',
                    
                }).then(function(){
                    var fecha_desde = document.getElementById('fecha_desde').value;
                    var fecha_hasta = document.getElementById('fecha_hasta').value;
                    window.location.href = 'generar_reporte.php?tipo_reporte=fecha&reportando_fecha_desde='+fecha_desde+'&reportando_fecha_hasta='+fecha_hasta;
  
                });

                $(function () {
                        $('#datetimepicker_fecha_desde').datetimepicker({
                        format: 'YYYY-MM-DD 00:00:00'
                    });
                });
                $(function () {
                        $('#datetimepicker_fecha_hasta').datetimepicker({
                        format: 'YYYY-MM-DD 23:59:59'
                    });
                });
               });
              $("#reporte_nivel").click(function () {
                swal({
                    title: 'Generar Reporte Por Nivel de Acceso',
                    customClass: 'swal-wide-5',
                    html: '<select id="reportando_nivel" name="reportando_nivel" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_nivel; ?></select>',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    confirmButtonText: 'Submit',
                    
                }).then(function(){
                    var reportando_nivel = document.getElementById('reportando_nivel').value;
                    window.location.href = 'generar_reporte.php?tipo_reporte=nivel&reportando_nivel='+reportando_nivel;
  
                });

                $("#reportando_nivel").select2({
                    placeholder:"Seleccione el nivel",
                    dropdownParent: jQuery('.swal-wide-5')
                });
            });
              $("#reporte_circunscripcion").click(function () {
                swal({
                    title: 'Generar Reporte Por Provincia y Circunscripcion',
                    customClass: 'swal-wide-1',
                    html: '<select id="reportando_provincia" name="reportando_provincia" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_provincia; ?></select>'+'<br /><br /><select id="reportando_circunscripcion" name="reportando_circunscripcion" class="form-control" style="position:absolute; z-index:2;"><?php echo $opt_circunscripcion; ?></select>',
                    showCancelButton: true,
                    confirmButtonText: 'Generar Reporte',
                    confirmButtonText: 'Submit',
                    
                }).then(function(){
                    var reportando_provincia = document.getElementById('reportando_provincia').value;
                    var reportando_circunscripcion = document.getElementById('reportando_circunscripcion').value;
                    window.location.href = 'generar_reporte.php?tipo_reporte=provincia_circunscripcion&provincia_reportada='+reportando_provincia+'&circunscripcion_reportada='+reportando_circunscripcion;
  
                });

                $("#reportando_provincia").select2({
                    placeholder:"Seleccione la provincia",
                    dropdownParent: jQuery('.swal-wide-1')
                });
                $("#reportando_circunscripcion").select2({
                    placeholder:"Seleccione la circunscripcion",
                    dropdownParent: jQuery('.swal-wide-1')
                });
                
            });
              $("#reporte_combinado").click(function () {
                swal({
                    title: 'Reporte de Filtros Combinados',
                    input: 'text'
                });
            });
        </script>

    </body>

    </html>
