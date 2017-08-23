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
                                </ul>
                            </li>


                            <li>
                                <a href="historial_ventas.php"><i class="fa fa-refresh fa-fw"></i> Historico General</a>
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
                                <a href="eventos_ventas.php"><i class="fa fa-graduation-cap fa-fw"></i> Eventos</a>                                
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

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>';
?>
