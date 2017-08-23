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


$result = mysqli_query($link_pais_posible, "SELECT carnet.*, carnet.id AS val, CONCAT(carnet.nombres,' ',carnet.apellidos) AS nombre_completo, niveles_acceso.nivel_acceso AS nivel_acceso, ciudades.ciudad AS ciudad FROM carnet INNER JOIN ciudades ON carnet.provincia = ciudades.id INNER JOIN niveles_acceso ON carnet.nivel_acceso = niveles_acceso.id");



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
                    <img src="pais_posible.jpg" alt="" style="margin-left: -60px; width :5%; height :5%;">
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

                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>

                <div id="page-wrapper" style="background-color: #4267b2;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="color: #fff;"><i class=" fa fa-gears fa fa-gears"></i> Carnets Generados</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-green">
                                <div class="panel-heading" style="font-size: 23px;">Listado de Carnets</div>
                                <div class="panel-body">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-3">
                                            <a href="generar_reporte.php" class="btn btn-success" style="margin-left: 20px; color: #fff;"><i class="fa fa-file-pdf-o" style="color: #fff;"> </i> Generar Reporte</a>  
                                        </div>
                                        <div class="col-md-3 col-md-offset-6">
                                            <a href="generar_carnet.php" class="btn btn-primary" style="margin-left: 20px; color: #fff;"><i class="fa fa-gears" style="color: #fff;"> </i> Nuevo Carnet</a>  
                                        </div>
                                    </div>                            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table  width="100%" class="table table-striped table-bordered table-hover" id="resultados">

                                                <thead><tr>
                                                    <th style="text-align:center">Cedula</th>
                                                    <th style="text-align:center">Nombre Completo</th>
                                                    <th style="text-align:center">Provincia</th>
                                                    <th style="text-align:center">Municipio</th>
                                                    <th style="text-align:center">Circ.</th>
                                                    <th style="text-align:center">Sector</th>
                                                    <th style="text-align:center">Colegio (Mesa)</th>
                                                    <th style="text-align:center">Nombre Recinto</th>
                                                    <th style="text-align:center">Nivel</th>
                                                    <th style="text-align:center">Ver Carnet</th>

                                                </thead><tbody>

                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) { 
                                                    $link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
 $result_cedula = mysqli_query($link_datos_externos, "SELECT padron.cedula AS cedula, padron.nombresplastico AS nombresplastico, padron.fechanacimiento AS nacimiento, padron.codigorecinto AS codigorecinto, colegio2016.codigocolegio AS colegio, padron.apellidosplastico AS apellidosplastico, padron.codigocircunscripcion AS codigocircunscripcion, provincia.descripcion AS provincia, municipio.descripcion AS municipio, recinto.descripcion AS recinto, recinto.direccion AS direccion, sectorparaje.descripcion AS sector, padron.idsexo AS sexo, padron.idestadocivil AS estado_civil FROM padron INNER JOIN recinto ON padron.codigorecinto = recinto.codigorecinto INNER JOIN sectorparaje ON sectorparaje.id = recinto.idsectorparaje INNER JOIN colegio2016 ON padron.colegio = colegio2016.codigocolegio INNER JOIN sexo ON padron.idsexo = sexo.id INNER JOIN provincia ON provincia.id = padron.idprovincia INNER JOIN municipio ON municipio.id = padron.idmunicipio INNER JOIN estado_civil ON padron.idestadocivil = estado_civil.id WHERE cedula = '".$row['cedula']."'");
    $query_cedula = mysqli_fetch_assoc($result_cedula);
                                                    ?>
                                                  <tr >
                                                    <td style="text-align:center"><a href="regenerar_carnet.php?id_carnet=<?php echo $row['val']; ?>"><img src="<?php echo $row['foto'] ?>" style="height:40px; margin-bottom:-4px; margin-left:20px;" class="img img-responsive img-circle" /><?php echo $row['cedula']; ?></a></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($row['nombre_completo']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($query_cedula['provincia']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($query_cedula['municipio']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($row['circunscripcion']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($query_cedula['sector']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($query_cedula['colegio']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($row['nombre_recinto']))); ?></td>
                                                    <td style="text-align:center"><?php echo ucwords(strtolower(utf8_decode($row['nivel_acceso']))); ?></td>
                                                    <td style="text-align:center"><a href="carnets/<?php echo $row['cedula'];?>.pdf" class="btn btn-success" id="ver_carnet" style="color: #fff;" target="_blank"><i class="fa fa-eye " style="color: #fff;"></a></i></button>  </td>
                                                    <?php }  ?>
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
                    responsive: true   


                });
            });

               var pruebaSweet= <?php echo $pruebaSweet; ?>;

               if (pruebaSweet == 12){
                  swal({
                    title: "Carnet Generado Correctamente!",
                    text: "Esta ventana se cerrará en 3 segundos.",
                    imageUrl: "https://cdn4.iconfinder.com/data/icons/customicondesignoffice2/128/success.png",
                    timer : 3000,
                    showConfirmButton: false
                });
              }

          </script>

      </body>

      </html>
