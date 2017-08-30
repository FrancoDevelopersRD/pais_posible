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
$link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
$link_quality = mysqli_connect("localhost:3306", "root", "root", "quality");

    $result_agente = mysqli_query($link_pais_posible, "SELECT id FROM usuarios WHERE  cedula = '".$_SESSION['cedula']."'");
    $agente = mysqli_fetch_assoc($result_agente);

    $result_provincias = mysqli_query($link_datos_externos, "SELECT id as val, descripcion as descripcion from provincia where zona != 'x' order by descripcion asc");

  $opt_provincias = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_provincias)) {
    $opt_provincias .= "<option value='".$row['val']."'>".ucwords(strtolower($row['descripcion']))."</option>";
  }

  $result_municipios = mysqli_query($link_datos_externos, "SELECT id as val, descripcion as descripcion from municipio order by descripcion asc");

  $opt_municipios = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_municipios)) {
    $opt_municipios .= "<option value='".$row['val']."'>".ucwords(strtolower($row['descripcion']))."</option>";
  }

  $result_sectores = mysqli_query($link_datos_externos, "SELECT id as val, descripcion as descripcion from sectorparaje order by descripcion asc");

  $opt_sectores = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_sectores)) {
    $opt_sectores .= "<option value='".$row['val']."'>".ucwords(strtolower($row['descripcion']))."</option>";
  }

  $result_niveles_acceso = mysqli_query($link_pais_posible, "SELECT id as val, nivel_acceso as nivel from niveles_acceso order by id asc");

  $opt_niveles_acceso = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_niveles_acceso)) {
    $opt_niveles_acceso .= "<option value='".$row['val']."'>".ucwords(strtolower($row['nivel']))."</option>";
  }

   $result_sexo = mysqli_query($link_datos_externos, "SELECT id as val, sexo as sexo from sexo order by sexo desc");

  $opt_sexo = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_sexo)) {
    $opt_sexo .= "<option value='".$row['val']."'>".ucwords(strtolower($row['sexo']))."</option>";
  }

  $result_estado_civil = mysqli_query($link_datos_externos, "SELECT id as val, estado_civil as estado_civil from estado_civil order by estado_civil desc");

  $opt_estado_civil = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_estado_civil)) {
    $opt_estado_civil .= "<option value='".$row['val']."'>".ucwords(strtolower($row['estado_civil']))."</option>";
  }

   $result_posicion = mysqli_query($link_quality, "SELECT id as val, posicion as posicion from posiciones_clientes order by posicion asc");

  $opt_posicion = "<option></option>";
  while ($row = mysqli_fetch_assoc($result_posicion)) {
    $opt_posicion .= "<option value='".$row['val']."'>".ucwords(strtolower($row['posicion']))."</option>";
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

    <!-- Custom Fonts -->
  <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../select2/dist/css/select2.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!--Estilos de ToastR-->
    <link href="../toastr/build/toastr.css" rel="stylesheet" type="text/css">

    <!--Estilos de DatePicker-->
    <link href="../css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

    <!-- Estilos upload -->
    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

     <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="../bower_components/sweetalert2/dist/sweetalert2.min.css">
    <script src="../bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script>
    tinymce.init({
      selector: '#comentario',
      height: '100',
    });
    </script>



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


            <div id="page-wrapper" style="background-color: #4267b2; min-height: 436px;">
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header" style="color: #fff;"><i class=" fa-user-plus fa fa-lg"></i> Registro de Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
              </div>
              <div class="row">
               <div class="col-lg-12">
                <div class="panel panel-green">
                  <div class="panel-heading" id="division_top">
                    Datos del Usuario
                  </div>
                  <form action="" method="POST" id="form_lugar" enctype="multipart/form-data">
                    <div class="panel-body">

                      <div class="panel panel-green">
                        <div class="panel-heading">Información Personal</div>
                        <div class="panel-body">
                         <div class="row">

                          <div class="col-md-2">
                            <label id="lab_cedula">Cédula</label>
                            <input type="text" name="cedula" id="cedula" class="form-control"/>
                            <input type="hidden" name="id" id="id" class="form-control"/>
                            <input type="hidden" name="agente_creador" id="agente_creador" value="<?php echo $agente ['id']?>" />
                            <input type="hidden" name="last_id" id="last_id" class="form-control"/>
                            <input type="hidden" name="company" id="company" class="form-control" value="1" />
                            <input type="hidden" name="cambiador" id="cambiador" class="form-control" value="1" />
                            <input type="hidden" id="action_cliente" name="action_cliente" value="insert">
                          </div>

                          <div class="col-md-2">
                            <label id="lab_nombres">Nombre</label>
                            <input type="text" name="nombres" id="nombres" class="form-control"/>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_apellidos">Apellido</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" value=" " />
                          </div>

                          <div class="col-md-2">

                            <br>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#busquedaCedFull" style="color: #fff;"><i class="fa fa-search">  Buscar Personas</i></a>
                            <div class="modal fade" id="busquedaCedFull" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="">Busqueda de Personas por Nombres</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <input type="text" name="searchFull" id="search_boxCedFull" class="form-control">
                                      </div>
                                      <div class="col-md-2">
                                        <a class="btn btn-primary" href="#" id="searchCedFull">Buscar <i class="fa fa-search"></i></a>
                                      </div>
                                    </div>
                                    <div id="result_searchCedFull">

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_clave">Contraseña</label>
                            <input type="password" name="clave" id="clave" class="form-control" value="" />
                          </div>

                          <div class="col-md-2">
                            <label id="lab_telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control"/>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_celular">Celular</label>
                            <input type="text" name="celular" id="celular" class="form-control"/>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_correo">Correo</label>
                            <input type="text" name="correo" id="correo" class="form-control"/>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_provincia">Provincia</label>
                            <select name="provincia" id="provincia" class="form-control">
                              <?php echo $opt_provincias; ?>
                            </select>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_municipio">Municipio</label>
                            <select name="municipio" id="municipio" class="form-control">
                              <?php echo $opt_municipios; ?>
                            </select>
                          </div>

                           <div class="col-md-2">
                            <label id="lab_sector">Sector</label>
                            <select name="sector" id="sector" class="form-control">
                              <?php echo $opt_sectores; ?>
                            </select>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_colegio_electoral">Colegio Electoral</label>
                            <input type="text" name="colegio_electoral" id="colegio_electoral" class="form-control"/>
                          </div>

                         </div> 

                        <div class="row">

                          <div class="col-md-2">
                            <label id="lab_circunscripcion">Circunscripción</label>
                            <input type="text" name="circunscripcion" id="circunscripcion" class="form-control"/>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_codigorecinto">Codigo Recinto</label>
                            <input type="text" name="codigorecinto" id="codigorecinto" class="form-control"/>
                          </div>

                          <div class="col-md-4">
                            <label id="lab_recinto">Recinto</label>
                            <input type="text" name="recinto" id="recinto" class="form-control"/>
                          </div>

                          <div class="col-md-4">
                            <label id="lab_direccion_recinto">Dirección del Recinto</label>
                            <input type="text" name="direccion_recinto" id="direccion_recinto" class="form-control"/>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_fecha_nacimiento">Nacimiento</label>
                            <div class='input-group date' id='datetimepicker4'/>
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                              <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"/>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                              <?php echo $opt_sexo; ?>
                            </select>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_estado_civil">Estado Civil</label>
                            <select name="estado_civil" id="estado_civil" class="form-control">
                              <?php echo $opt_estado_civil; ?>
                            </select>
                          </div>

                          <div class="col-md-2">
                            <label id="lab_nivel_acceso">Nivel de Acceso</label>
                            <select name="nivel_acceso" id="nivel_acceso" class="form-control">
                              <?php echo $opt_niveles_acceso; ?>
                            </select>
                          </div>

                        </div>

                      
                    </div>

                    </div>


                    <div class="panel panel-green">
                      <div class="panel-heading">Información Laboral</div>
                      <div class="panel-body">

                        <div class="row">

                          <div class="col-md-2">
                            <label id="lab_rnc">RNC</label>
                            <input type="text" name="rnc" id="rnc" class="form-control" />
                          </div>

                          <div class="col-md-4" >
                            <label id="lab_celular">Web Site</label>
                            <input type="text" name="website" id="website" class="form-control" />
                          </div>

                          <div class="col-md-3 col-md-offset-1">
                            <label id="lab_posicion">Posición</label>
                            <select name="posicion" id="posicion" class="form-control">
                              <?php echo $opt_posicion; ?>
                            </select>
                        </div>


                        <button type="button" class="btn btn-success col-md-0"  style="margin-top: 20px;" data-toggle="modal" data-target="#myModal3">
                          <i class="fa fa-plus-square" aria-hidden="true" style="margin-right: 10px;"></i>Nueva Posición
                        </button>

                          <!--<button type="button" class="btn btn-danger col-md-0"  style="margin-top: 20px; margin-left: 40px;" id="verDatos" onclick="history.back()">
                            <i class="fa fa-file-text" aria-hidden="true" style="margin-right: 10px;"></i>Ver Datos
                          </button>-->



                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <label id="lab_razon_social">Razón Social</label>
                            <input type="text" name="razon_social" id="razon_social" class="form-control" />
                          </div>

                          <div class="col-md-1">
                            <br>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#busqueda"><i class="fa fa-search" style="color: #fff;"></i></a>
                            <div class="modal fade" id="busqueda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="">Buscar RNC Por Razón Social</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <input type="text" name="search" id="search_box" class="form-control">
                                      </div>
                                      <div class="col-md-2">
                                        <a class="btn btn-primary" href="#" id="search">Buscar <i class="fa fa-search"></i></a>
                                      </div>
                                    </div>
                                    <div id="result_search">

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <label id="lab_nombre_comercial">Nombre Comercial</label>
                            <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control" />
                          </div>

                          <div class="col-md-1">
                            <br>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#busquedaComercial"><i class="fa fa-search" style="color: #fff;"></i></a>
                            <div class="modal fade" id="busquedaComercial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="">Buscar RNC Por Nombre Comercial</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <input type="text" name="searchNombreComercial" id="search_boxComercial" class="form-control">
                                      </div>
                                      <div class="col-md-2">
                                        <a class="btn btn-primary" href="#" id="searchNombreComercial">Buscar <i class="fa fa-search"></i></a>
                                      </div>
                                    </div>
                                    <div id="result_searchComercial">

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="panel panel-green">
                                      <div class="panel-heading"> Información Familiar</div>
                                      <div class="panel-body">

                                        <div class="row">
                                          <div class="col-md-3">
                                            <label id="lab_nombre_conyugue">Cónyugue</label>
                                            <input type="text" id="nombre_conyugue" name="nombre_conyugue" placeholder="Ingrese el nombre" class="form-control" />
                                            <label id="lab_nombre_hijo">Hijo</label>
                                            <input type="text" id="nombre_hijo" name="nombre_hijo" placeholder="Ingrese el nombre" class="form-control" />
                                            <label id="lab_nombre_hijo2">Hijo</label>
                                            <input type="text" id="nombre_hijo2" name="nombre_hijo2" placeholder="Ingrese el nombre" class="form-control" />
                                            <label id="lab_nombre_padre">Padre</label>
                                            <input type="text" id="nombre_padre" name="nombre_padre" placeholder="Ingrese el nombre" class="form-control" />
                                            <label id="lab_nombre_madre">Madre</label>
                                            <input type="text" id="nombre_madre" name="nombre_madre" placeholder="Ingrese el nombre" class="form-control" />
                                            <label id="lab_nombre_hermano">Hermano</label>
                                            <input type="text" id="nombre_hermano" name="nombre_hermano" placeholder="Ingrese el nombre" class="form-control" />
                                            <label id="lab_nombre_hermano2">Hermano</label>
                                            <input type="text" id="nombre_hermano2" name="nombre_hermano2" placeholder="Ingrese el nombre" class="form-control" />
                                          </div>

                                          <div class="col-md-3">
                                            <label id="lab_apellido_conyugue" style="color: white;">Cónyugue</label>
                                            <input type="text" id="apellido_conyugue" name="apellido_conyugue" placeholder="Ingrese el apellido" class="form-control" />
                                            <label id="lab_apellido_hijo" style="color: white;">Hijo</label>
                                            <input type="text" id="apellido_hijo" name="apellido_hijo" placeholder="Ingrese el apellido" class="form-control" />
                                            <label id="lab_apellido_hijo2" style="color: white;">Hijo</label>
                                            <input type="text" id="apellido_hijo2" name="apellido_hijo2" placeholder="Ingrese el apellido" class="form-control" />
                                            <label id="lab_apellido_padre" style="color: white;">Padre</label>
                                            <input type="text" id="apellido_padre" name="apellido_padre" placeholder="Ingrese el apellido" class="form-control" />
                                            <label id="lab_apellido_madre" style="color: white;">Madre</label>
                                            <input type="text" id="apellido_madre" name="apellido_madre" placeholder="Ingrese el apellido" class="form-control" />
                                            <label id="lab_apellido_hermano" style="color: white;">Hermano</label>
                                            <input type="text" id="nombre_hermano" name="apellido_hermano" placeholder="Ingrese el apellido" class="form-control" />
                                            <label id="lab_apellido_hermano2" style="color: white;">Hermano</label>
                                            <input type="text" id="apellido_hermano2" name="apellido_hermano2" placeholder="Ingrese el apellido" class="form-control" />
                                          </div>

                                          <div class="col-md-2">
                                            <label id="lab_telefono_conyugue" style="color: white;">Cónyugue</label>
                                            <input type="text" id="telefono_conyugue" name="telefono_conyugue" placeholder="Ingrese telefono" class="form-control" />
                                            <label id="lab_telefono_hijo" style="color: white;">Hijo</label>
                                            <input type="text" id="telefono_hijo" name="telefono_hijo" placeholder="Ingrese telefono" class="form-control" />
                                            <label id="lab_telefono_hijo2" style="color: white;">Hijo</label>
                                            <input type="text" id="telefono_hijo2" name="telefono_hijo2" placeholder="Ingrese telefono" class="form-control" />
                                            <label id="lab_telefono_padre" style="color: white;">Padre</label>
                                            <input type="text" id="telefono_padre" name="telefono_padre" placeholder="Ingrese telefono" class="form-control" />
                                            <label id="lab_telefono_madre" style="color: white;">Madre</label>
                                            <input type="text" id="telefono_madre" name="telefono_madre" placeholder="Ingrese telefono" class="form-control" />
                                            <label id="lab_telefono_hermano" style="color: white;">Hermano</label>
                                            <input type="text" id="telefono_hermano" name="telefono_hermano" placeholder="Ingrese telefono" class="form-control" />
                                            <label id="lab_telefono_hermano2" style="color: white;">Hermano</label>
                                            <input type="text" id="telefono_hermano2" name="telefono_hermano2" placeholder="Ingrese telefono" class="form-control" />
                                          </div>

                                          <div class="col-md-2">
                                            <label id="lab_celular_conyugue" style="color: white;">Cónyugue</label>
                                            <input type="text" id="celular_conyugue" name="celular_conyugue" placeholder="Ingrese celular" class="form-control" />
                                            <label id="lab_celular_hijo" style="color: white;">Hijo</label>
                                            <input type="text" id="celular_hijo" name="celular_hijo" placeholder="Ingrese celular" class="form-control" />
                                            <label id="lab_celular_hijo2" style="color: white;">Hijo</label>
                                            <input type="text" id="celular_hijo2" name="celular_hijo2" placeholder="Ingrese celular" class="form-control" />
                                            <label id="lab_celular_padre" style="color: white;">Padre</label>
                                            <input type="text" id="celular_padre" name="celular_padre" placeholder="Ingrese celular" class="form-control" />
                                            <label id="lab_celular_madre" style="color: white;">Madre</label>
                                            <input type="text" id="celular_madre" name="celular_madre" placeholder="Ingrese celular" class="form-control" />
                                            <label id="lab_celular_hermano" style="color: white;">Hermano</label>
                                            <input type="text" id="celular_hermano" name="celular_hermano" placeholder="Ingrese celular" class="form-control" />
                                            <label id="lab_celular_hermano2" style="color: white;">Hermano</label>
                                            <input type="text" id="celular_hermano2" name="celular_hermano2" placeholder="Ingrese celular" class="form-control" />
                                          </div>

                                          <div class="col-md-2">
                                            <label id="lab_correo_conyugue" style="color: white;">Cónyugue</label>
                                            <input type="text" id="correo_conyugue" name="correo_conyugue" placeholder="Ingrese correo" class="form-control" />
                                            <label id="lab_correo_hijo" style="color: white;">Hijo</label>
                                            <input type="text" id="correo_hijo" name="correo_hijo" placeholder="Ingrese correo" class="form-control" />
                                            <label id="lab_correo_hijo2" style="color: white;">Hijo</label>
                                            <input type="text" id="correo_hijo2" name="correo_hijo2" placeholder="Ingrese correo" class="form-control" />
                                            <label id="lab_correo_padre" style="color: white;">Padre</label>
                                            <input type="text" id="correo_padre" name="correo_padre" placeholder="Ingrese correo" class="form-control" />
                                            <label id="lab_correo_madre" style="color: white;">Madre</label>
                                            <input type="text" id="correo_madre" name="correo_madre" placeholder="Ingrese correo" class="form-control" />
                                            <label id="lab_correo_hermano" style="color: white;">Hermano</label>
                                            <input type="text" id="correo_hermano" name="correo_hermano" placeholder="Ingrese correo" class="form-control" />
                                            <label id="lab_correo_hermano2" style="color: white;">Hermano</label>
                                            <input type="text" id="correo_hermano2" name="correo_hermano2" placeholder="Ingrese correo" class="form-control" />
                                          </div>
                                        </div>

                                      </div>
                                    </div>



                                    <div class="panel panel-green">
                                      <div class="panel-heading">Seguimiento del Usuario</div>
                                      <div class="panel-body">

                                        <div class="row">

                                        <div class="col-md-12">
                                          <label id="lab_comentario">Comentario</label>
                                          <textarea name="comentario" id="comentario" class="form-control" style="margin-bottom: 20px;"></textarea>
                                        </div>
                                      </div>

                                    </div>

                                  </div>
                                </div>
                                 <div class="panel-footer">
<div class="row">
                            <div class="col-md-3 col-md-offset-10" style="font-size:15px;">
                              <button id="botonGuardar" type="submit" class="btn btn-success" style="padding: 8px 26px;" onclick=this.form.action="data_registrar_usuario.php"> <i class="fa fa-pencil-square-o" style="padding-right: 4px;"></i>Registrar</b> </button>
                            </div>
                          </div>
                          </div>
                              </div>

                            </div>

                          </div>
                        </div>


                        <input type="hidden" name="agente" value="<?php echo $agente ['id']?>">

                       
                          
                        
                      </div>
                      <!--<input type="hidden" name="MM_insert" value="form_lugar">-->
                    </form>
                    <!--<div id="result"></div>-->
                  </div>
                </div>
              </div>
            </div>
            <!-- /#page-wrapper -->


            <!-- /#page-wrapper -->


</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script language="javascript" src="../jQueryAssets/jquery-1.11.1.min.js"></script>

<!-- Monent -->
<script language="javascript" src="../bower_components/bootstrap/js/moment.js"></script>

<!-- transition -->
<script language="javascript" src="../bower_components/bootstrap/js/transition.js"></script>

<!-- collapse -->
<script language="javascript" src="../bower_components/bootstrap/js/collapse.js"></script>

<!-- datepicker -->
<script language="javascript" src="../bower_components/bootstrap/js/bootstrap-datetimepicker.js"></script>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script type="text/javascript" src="../select2/dist/js/select2.js"></script>

<!-- Toast script -->
<script src="../toastr/toastr.js"></script>

<!-- Upload Script-->
<script src="../upload_script/src/bootstrap-filestyle.js"></script>

<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

    <script>

    $(function(){
      $('select[value]').each(function(){
        $(this).val(this.getAttribute("value"));
      });
    });

    $("#provincia").select2({
      placeholder:"Elija provincia"
    });
    $("#municipio").select2({
      placeholder:"Elija municipio"
    });
    $("#sector").select2({
      placeholder:"Elija sector"
    });
    $("#sexo").select2({
      placeholder:"Elija sexo"
    });
    $("#estado_civil").select2({
      placeholder:"Elija estado civil"
    });
    $("#posicion").select2({
      placeholder:"Seleccione su posicion"
    });
    $("#nivel_acceso").select2({
      placeholder:"Asignar Nivel"
    });

    $(function () {
      $('#datetimepicker4').datetimepicker({
       format: 'DD/MM/YYYY hh:mm a'
     });
    });


    $("#cedula").change(function () {
      var valor = $(this).val();
      if (valor.length==11) {
        $.post("../data/buscar_cedula.php", {'buscar_cedTodo':$(this).val()}, function (data){
          $("#nombres").val(data.nombres.toLowerCase());
          $("#apellidos").val(data.apellidos.toLowerCase());
          $("#circunscripcion").val(data.circunscripcion);
          $("#fecha_nacimiento").val(data.fecha_nacimiento);
          $("#codigorecinto").val(data.codigorecinto);
          $("#recinto").val(data.recinto.toLowerCase());
          $("#provincia").val(data.provincia);
          $("#provincia").trigger("change");
          $("#municipio").val(data.municipio);
          $("#municipio").trigger("change");
          $("#colegio_electoral").val(data.colegio_electoral);
          $("#direccion_recinto").val(data.direccion_recinto.toLowerCase());
          $("#clave").val('');
          $("#sexo").val(data.sexo);
          $("#sexo").trigger("change");
          $("#estado_civil").val(data.estado_civil);
          $("#estado_civil").trigger("change");
          $("#sector").val(data.sector);
          $("#sector").trigger("change");
          $("#telefono").val(data.telefono);
          $("#celular").val(data.celular);
          $("#correo").val(data.correo);
          $("#clave").val(data.clave);
          $("#nivel_acceso").val(data.nivel_acceso);
          $("#comentario").val(data.comentario);
        },"json");
  }else{
    $("#nombres").val('');
    $("#apellidos").val('');
    $("#circunscripcion").val('');
    $("#fecha_nacimiento").val('');
    $("#codigorecinto").val('');
    $("#recinto").val('');
    $("#provincia").val('');
    $("#municipio").val('');
    $("#colegio_electoral").val('');
    $("#direccion_recinto").val('');
    $("#clave").val('');
    $("#sexo").val('');
    $("#estado_civil").val('');
    $("#sector").val('');
    $("#telefono").val('');
    $("#celular").val('');
    $("#correo").val('');
    $("#clave").val('');
    $("#nivel_acceso").val('');
    $("#comentario").val('');
  };

});
    $("#cedula").keyup(function () {
      $.post("../data/buscar_cedula.php",{'buscar_cedTodo':$(this).val()}, function (data) {

                    $("#nombres").val(data.nombres.toLowerCase());
                    $("#apellidos").val(data.apellidos.toLowerCase());
                    $("#circunscripcion").val(data.circunscripcion);
                    $("#fecha_nacimiento").val(data.fecha_nacimiento);
                    $("#codigorecinto").val(data.codigorecinto);
                    $("#recinto").val(data.recinto.toLowerCase());
                    $("#provincia").val(data.provincia);
                    $("#provincia").trigger("change");
                    $("#municipio").val(data.municipio);
                    $("#municipio").trigger("change");
                    $("#colegio_electoral").val(data.colegio_electoral);
                    $("#direccion_recinto").val(data.direccion_recinto.toLowerCase());
                    $("#clave").val('');
                    $("#sexo").val(data.sexo);
                    $("#sexo").trigger("change");
                    $("#estado_civil").val(data.estado_civil);
                    $("#estado_civil").trigger("change");
                    $("#sector").val(data.sector);
                    $("#sector").trigger("change");
                    $("#telefono").val(data.telefono);
                    $("#celular").val(data.celular);
                    $("#correo").val(data.correo);
                    $("#clave").val(data.clave);
                    $("#nivel_acceso").val(data.nivel_acceso);
                    $("#comentario").val(data.comentario);
                  }, "json");
  });

    $("#rnc").keyup(function () {
      var valor = $(this).val();
      if ((valor.length==9)||(valor.length==11)) {
        $.post("../data/rnc3form.php", {'buscar_rnc':$(this).val()}, function (data){
          $("#nombre_comercial").val(data.nombre_comercial);
          $("#razon_social").val(data.razon_social);
          $("#website").val(data.website);
        },"json");
      }else{
        $("#nombre_comercial").val('');
        $("#razon_social").val('');
        $("#website").val('');
      };

    });

    $("#rnc").change(function () {
      var valor = $(this).val();
      if ((valor.length==9)||(valor.length==11)) {
        $.post("../data/rnc3form.php", {'buscar_rnc':$(this).val()}, function (data){
          $("#nombre_comercial").val(data.nombre_comercial);
          $("#razon_social").val(data.razon_social);
          $("#website").val(data.website);
        },"json");
      }else{
        $("#nombre_comercial").val('');
        $("#razon_social").val('');
        $("#website").val('');
      };

    });
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- Scripts de Ivan Roperto -->
    <script src="../js/functions.js"></script>
  </body>

  </html>