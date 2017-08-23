<?php
$menu_lateral = '<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    &nbsp;
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="panel_administrador.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Estadísticas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="estd_agentes.php"><i class="fa fa-fw fa-gears"></i> Desempeño Agentes</a>
                                    </li>
                                    <li>
                                        <a href="estd_clientes.php"><i class="fa fa-fw fa-signal"></i> Comportamiento Clientes</a>
                                    </li>
                                    <li>
                                        <a href="estd_publicidad.php"><i class="fa fa-thumbs-o-up fa-fw"></i> Respuestas Publicidad</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                            	<a href="tasks.php"><i class="fa fa-tasks fa-fw"></i> Tareas</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-phone fa-fw"></i> Interacción Cliente<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="nuevo_ingreso_persona.php"><i class="fa fa-address-book"></i> Ingreso de Contactos</a>
                                    </li>
                                    <li>
                                        <a href="nuevo_ingreso_empresa.php"><i class="fa fa-building-o"></i> Ingreso de Empresas</a>
                                    </li>
                                    <li>
                                        <a href="ingresos_personas.php"><i class="fa fa-search"></i> Busqueda y revisión</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-envelope-o fa-fw"></i> Envío de Correos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                	<li>
                                    	<a href="correos_ventas.php"><i class="fa fa-credit-card"></i> Ventas</a>
                                    </li>
                                    <li>
                                    	<a href="correos_bienvenida.php"><i class="fa fa-child"></i> Bienvenida</a>
                                    </li>
                                    <li>
                                    	<a href="thanksmail.php"><i class="fa fa-gift"></i> Agradecimiento</a>
                                    </li>
                                    <li>
                                    	<a href="correos_cobros.php"><i class="fa fa-money"></i> Cobros</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            	<a href="#"><i class="fa fa-sign-in fa-fw"></i> Registro<span class="fa arrow"></span></a>
                            	<ul class="nav nav-second-level">
                                    <li>
                                        <a href="inscribir.php">Formulario</a>
                                    </li>
                                    <li>
                                        <a href="inscritos.php">Inscritos</a>
                                    </li>
                                    <li>
                                        <a href="entrada_de_datos.php">Entrada de Datos</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            	<a href="#"><i class="fa fa-edit fa-fw"></i> Cotizaciones<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="cotiza_curso.php">Capacitaciones</a>
                                    </li>
                                    <li>
                                        <a href="cotiza_servicio.php"> Productos y Servicios</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> Administración CRM<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                	<li>
                                        <a href="empleados.php"><i class="fa fa-users fa-fw"></i> Empleados</a>
                                    </li>
                                    <li>
                                        <a href="posiciones.php"><i class="fa fa-address-card fa-fw"></i> Posiciones</a>
                                    </li>
                                    <li>
                                        <a href="bonos.php"><i class="fa fa-ticket fa-fw"></i> Bonos Partners</a>
                                    </li>
                                    <li>
                                        <a href="empresas.php"><i class="fa fa-building fa-fw"></i> Empresas</a>
                                    </li>
                                    <li>
                                        <a href="monedas.php"><i class="fa fa-money fa-fw"></i> Monedas</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-inbox fa-fw"></i> Cartas<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                        	<li>
                                            	<a href="tipo_cartas.php"><i class="fa fa-envelope-o fa-fw"></i> Tipos de Cartas</a>
                                            </li>
                                            <li>
                                            	<a href="cartas.php"><i class="fa fa-list fa-fw"></i> Listado de Cartas</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="salones_entrenamiento.php"><i class="fa fa-building-o fa-fw"></i> Salones de Entrenamiento</a>
                                    </li>
                                        <li>
                                            <a href="#"><i class="fa fa-book fa-fw"></i> Recursos<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="recursos.php"><i class="fa fa-handshake-o fa-fw"></i> Recursos Asignados</a>
                                                </li>
                                                <li>
                                                    <a href="tipo_recursos.php"><i class="fa fa-cubes fa-fw"></i> Tipos de Recursos</a>
                                                </li>

                                                <li>
                                                    <a href="marcas.php"><i class="fa fa-maxcdn fa-fw"></i> Listado de Marcas</a>
                                                </li>
                                                <li>
                                                    <a href="colores.php"><i class="fa fa-paint-brush fa-fw"></i> Colores</a>
                                                </li>
                                            </ul>
                                        </li>
                                    <li>
                                        <a href="lugares.php"><i class="fa fa-home fa-fw"></i> Lugares</a>
                                    </li>
                                    <li>
                                        <a href="universidades.php"><i class="fa fa-bank fa-fw"></i> Listado de Universidades</a>
                                    </li>

                                    <li>
                                        <a href="tipo_llamada.php"><i class="fa fa-volume-control-phone fa-fw"></i> Tipos de Llamadas</a>
                                    </li>

                                    <li>
                                        <a href="fuentes_publicitarias.php"><i class="fa fa-newspaper-o fa-fw"></i> Fuentes Publicitarias</a>
                                    </li>
                                </ul>

                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="historial.php"><i class="fa fa-refresh fa-fw"></i> Historico General</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-search fa-fw"></i> Consultas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="correos_enviados.php"><i class="fa fa-send-o fa-fw"></i> Correos Enviados</a>
                                    </li>
                                    <li>
                                        <a href="search_mail.php"><i class="fa fa-search fa-fw"></i> Busqueda de Correos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Capacitaciones<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="areas.php">Areas</a>
                                    </li>
                                    <li>
                                        <a href="tipo_capacitaciones.php">Capacitaciones</a>
                                    </li>
                                    <li>
                                        <a href="eventos.php">Eventos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Clientes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="busq_cliente.php?type=ind">Individuales</a>
                                    </li>
                                    <li>
                                        <a href="busq_cliente_corporativos.php?type=corp">Corporativos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-suitcase fa-fw"></i> Contratos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="nuevos_contratos.php"><i class="fa fa-cog fa-spin fa-fw"></i> Generar</a>
                                    </li>
                                    <li>
                                        <a href="contratos_pendientes.php"><i class="fa fa-spinner fa-spin fa-fw"></i> Pendientes Aprobación</a>
                                    </li>
                                    <li>
                                        <a href="contratos.php"><i class="fa fa-binoculars fa-fw"></i> Seguimiento</a>
                                    </li>
                                    <li>
                                        <a href="mensajeria.php"><i class="fa fa-motorcycle fa-fw"></i> Mensajería</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>';
?>
