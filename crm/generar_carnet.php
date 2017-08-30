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

$result_niveles_acceso = mysqli_query($link_pais_posible, "SELECT id as val, nivel_acceso as nivel from niveles_acceso where id != 7 order by id asc");

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
                      <h1 class="page-header" style="color: #fff;"><i class=" fa-picture-o fa fa-lg"></i> Generar Carnet</h1>
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

                                <div class="col-md-3">
                                    <label id="lab_nombres">Nombre</label>
                                    <input type="text" name="nombres" id="nombres" class="form-control"/>
                                </div>

                                <div class="col-md-3">
                                    <label id="lab_apellidos">Apellido</label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control" value=" " />
                                </div>

                                <div class="col-md-2">
                                    <label id="lab_nivel_acceso">Nivel</label>
                                    <select name="nivel_acceso" id="nivel_acceso" class="form-control" value=6>
                                      <?php echo $opt_niveles_acceso; ?>
                                  </select>
                              </div>

                              <div class="col-md-2">
                                <label id="lab_sexo">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control">
                                  <?php echo $opt_sexo; ?>
                              </select>
                          </div>

                      </div> 

                      <div class="row">

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
                <label id="lab_colegio_electoral">Colegio (Mesa)</label>
                <input type="text" name="colegio_electoral" id="colegio_electoral" class="form-control"/>
            </div>

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
                <label>Cargar Foto</label>
                <input class="form-control archivo" type="file" name="archivo" id="archivo" style="height: 40px;" />
            </div>

        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-md-3 col-md-offset-10" style="font-size:15px;">
                  <button id="botonGuardar" type="submit" class="btn btn-success" style="padding: 8px 26px;" onclick=this.form.action="data_carnet.php"> <i class="fa fa-gears" style="padding-right: 10px;"></i>Generar</b> </button>
              </div>
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

$(function(){
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
          $("#nombres").val(data.nombres);
          $("#apellidos").val(data.apellidos);
          $("#circunscripcion").val(data.circunscripcion);
          $("#codigorecinto").val(data.codigorecinto);
          $("#recinto").val(data.recinto);
          $("#provincia").val(data.provincia);
          $("#provincia").trigger("change");
          $("#municipio").val(data.municipio);
          $("#municipio").trigger("change");
          $("#colegio_electoral").val(data.colegio_electoral);
          $("#direccion_recinto").val(data.direccion_recinto);
          $("#sexo").val(data.sexo);
          $("#sexo").trigger("change");
          $("#fecha_nacimiento").val(data.fecha_nacimiento);
          $("#sector").val(data.sector);
          $("#sector").trigger("change");
          $("#nivel_acceso").val(data.nivel_acceso);
      },"json");
    }else{
        $("#nombres").val('');
        $("#apellidos").val('');
        $("#circunscripcion").val('');
        $("#codigorecinto").val('');
        $("#recinto").val('');
        $("#provincia").val('');
        $("#municipio").val('');
        $("#colegio_electoral").val('');
        $("#direccion_recinto").val('');
        $("#sexo").val('');
        $("#fecha_nacimiento").val('');
        $("#sector").val('');
        $("#nivel_acceso").val('');
    };

});
    $("#cedula").keyup(function () {
      $.post("../data/buscar_cedula.php",{'buscar_cedTodo':$(this).val()}, function (data) {

        $("#nombres").val(data.nombres);
        $("#apellidos").val(data.apellidos);
        $("#circunscripcion").val(data.circunscripcion);
        $("#codigorecinto").val(data.codigorecinto);
        $("#recinto").val(data.recinto);
        $("#provincia").val(data.provincia);
        $("#provincia").trigger("change");
        $("#municipio").val(data.municipio);
        $("#municipio").trigger("change");
        $("#colegio_electoral").val(data.colegio_electoral);
        $("#direccion_recinto").val(data.direccion_recinto);
        $("#sexo").val(data.sexo);
        $("#sexo").trigger("change");
        $("#fecha_nacimiento").val(data.fecha_nacimiento);
        $("#sector").val(data.sector);
        $("#sector").trigger("change");
        $("#nivel_acceso").val(data.nivel_acceso);
    }, "json");
  });
</script>
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<!-- Scripts de Ivan Roperto -->
<script src="../js/functions.js"></script>
</body>

</html>