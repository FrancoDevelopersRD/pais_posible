<?php
$hostname_quality = "localhost:3306";
$database_quality = "quality";
$username_quality = "root";
$password_quality = "root";
$quality = mysql_pconnect($hostname_quality, $username_quality, $password_quality) or trigger_error(mysql_error(),E_USER_ERROR);

function nombre($name){
	if(strpos($name, " ")){
		$position = strpos($name, " ");
		$nombre = ucfirst(substr($name, 0,$position));
	}else{
		$nombre = ucfirst($name);
	}
	return($nombre);
}
function iconsex($sexo){
	if($sexo == 1){
		$sexicon = "male_icon";
	}else{
		$sexicon = "female_icon";
	}
	return($sexicon);
}
function suspender_ico($susp){
	if($susp == 0){
		$clase = "act_usr";
	}else{
		$clase = "susp_usr";
	}
	return($clase);
}
function buscar_area($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_area = "SELECT area FROM areas WHERE id = ".$id;
	$area = mysql_query($query_area, $GLOBALS['quality']) or die(mysql_error());
	$row_area = mysql_fetch_assoc($area);
	$totalRows_area = mysql_num_rows($area);
	return($row_area['area']);
}
function buscar_empresa($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_empresa = "SELECT abreviatura FROM empresas WHERE id = ".$id;
	$empresa = mysql_query($query_empresa, $GLOBALS['quality']) or die(mysql_error());
	$row_empresa = mysql_fetch_assoc($empresa);
	$totalRows_empresa = mysql_num_rows($empresa);
	return($row_empresa['abreviatura']);
}
function buscar_tipo_carta($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_tipo = "SELECT tipo FROM tipo_carta WHERE id = ".$id;
	$tipo = mysql_query($query_tipo, $GLOBALS['quality']) or die(mysql_error());
	$row_tipo = mysql_fetch_assoc($tipo);
	$totalRows_tipo = mysql_num_rows($tipo);
	return($row_tipo['tipo']);
}
function cambio_fecha($dato){
	$fecha = date_create($dato);
	$fecha_final = date_format($fecha, "d-m-Y");
	return($fecha_final);
}
?>