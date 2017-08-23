<?php
$hostname_quality = "localhost:3306";
$database_quality = "quality";
$username_quality = "root";
$password_quality = "root";
$quality = mysql_connect($hostname_quality, $username_quality, $password_quality) or trigger_error(mysql_error(),E_USER_ERROR);

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
function buscar_empleado($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_empleado = "SELECT nombre, apellido FROM empleados WHERE id = ".$id;
	$empleado = mysql_query($query_empleado, $GLOBALS['quality']) or die(mysql_error());
	$row_empleado = mysql_fetch_assoc($empleado);
	$totalRows_empleado = mysql_num_rows($empleado);
	$nombre = nombre($row_empleado['nombre'])." ".$row_empleado['apellido'];
	return($nombre);
}
function buscar_lugar_carta($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_lugar = "SELECT abreviatura FROM lugares WHERE id = ".$id;
	$lugar = mysql_query($query_lugar, $GLOBALS['quality']) or die(mysql_error());
	$row_lugar = mysql_fetch_assoc($lugar);
	$totalRows_lugar = mysql_num_rows($lugar);
	return($row_lugar['abreviatura']);
}
function buscar_curso($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_curso = "SELECT nombre FROM tipo_capacitaciones WHERE id = ".$id;
	$curso = mysql_query($query_curso, $GLOBALS['quality']) or die(mysql_error());
	$row_curso = mysql_fetch_assoc($curso);
	$totalRows_curso = mysql_num_rows($curso);
	return($row_curso['nombre']);
}
function buscar_nomenclatura($id){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_curso = "SELECT nomenclatura FROM tipo_capacitaciones WHERE id = ".$id;
	$curso = mysql_query($query_curso, $GLOBALS['quality']) or die(mysql_error());
	$row_curso = mysql_fetch_assoc($curso);
	$totalRows_curso = mysql_num_rows($curso);
	return($row_curso['nomenclatura']);
}
function cambio_fecha($dato){
	setlocale(LC_ALL,"es_ES");
	$fecha = date_create($dato);
	$nombre_dia = date_format($fecha, "l");
	switch ($nombre_dia){
		case"Monday":
		$nombre_dia = "Lunes";
		break;
		case"Tuesday":
		$nombre_dia = "Martes";
		break;
		case"Wednesday":
		$nombre_dia = "Mi&eacute;rcoles";
		break;
		case"Thursday":
		$nombre_dia = "Jueves";
		break;
		case"Friday":
		$nombre_dia = "Viernes";
		break;
		case"Saturday":
		$nombre_dia = "Sabado";
		break;
		case"Sunday":
		$nombre_dia = "Domingo";		
	}
	$fecha_final = $nombre_dia." ".date_format($fecha, "d-m-Y");
	return($fecha_final);
}
function clean_url($url){
	$url1 = str_replace("http://", "", $url);
	$url2 = str_replace("https://", "", $url1);
	return($url2);
}
function hour_change($dato){
	$hora = date("h:i A", strtotime($dato));
	return($hora);
}
function moneda($dato){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_moneda = "SELECT abreviatura FROM moneda WHERE id = id";
	$moneda = mysql_query($query_moneda, $GLOBALS['quality']) or die(mysql_error());
	$row_moneda = mysql_fetch_assoc($moneda);
	$totalRows_moneda = mysql_num_rows($moneda);
	
	return($row_moneda['abreviatura']);

}
function cupo($dato){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	
	$query_cupo = "SELECT count(id) FROM correos_enviados WHERE evento = '$dato' and estatus = '4'";
	$cupo = mysql_query($query_cupo, $GLOBALS['quality']) or die(mysql_error());
	$row_cupo = mysql_fetch_assoc($cupo);
	$totalRows_cupo = mysql_num_rows($cupo);
	
	return($row_cupo['count(id)']);

}
function interesado($dato){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	
	$query_cupo = "SELECT count(id) FROM correos_enviados WHERE evento = '$dato' and estatus = '1'";
	$cupo = mysql_query($query_cupo, $GLOBALS['quality']) or die(mysql_error());
	$row_cupo = mysql_fetch_assoc($cupo);
	$totalRows_cupo = mysql_num_rows($cupo);
	
	return($row_cupo['count(id)']);

}
function portencial($dato){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	
	$query_cupo = "SELECT count(id) FROM correos_enviados WHERE evento = '$dato' and estatus = '2'";
	$cupo = mysql_query($query_cupo, $GLOBALS['quality']) or die(mysql_error());
	$row_cupo = mysql_fetch_assoc($cupo);
	$totalRows_cupo = mysql_num_rows($cupo);
	
	return($row_cupo['count(id)']);

}
function ventas($dato){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	
	$query_cupo = "SELECT count(id) FROM correos_enviados WHERE evento = '$dato' and estatus = '3'";
	$cupo = mysql_query($query_cupo, $GLOBALS['quality']) or die(mysql_error());
	$row_cupo = mysql_fetch_assoc($cupo);
	$totalRows_cupo = mysql_num_rows($cupo);
	
	return($row_cupo['count(id)']);

}
function declinado($dato){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	
	$query_cupo = "SELECT count(id) FROM correos_enviados WHERE evento = '$dato' and estatus = '5'";
	$cupo = mysql_query($query_cupo, $GLOBALS['quality']) or die(mysql_error());
	$row_cupo = mysql_fetch_assoc($cupo);
	$totalRows_cupo = mysql_num_rows($cupo);
	
	return($row_cupo['count(id)']);

}
function cambiosexo($sex){
		switch($sex){
			case "1":
			$sex_result = "M";
			break;
			case "0":
			$sex_result = "F";
		}
		return $sex_result;
}
function sepmiles($cantidad){
	return(number_format($cantidad, 2, '.', ','));
}
function descuento($cantidad, $porcentaje){
	$descuento = $cantidad*$porcentaje/100;
	$desc_final = $cantidad-$descuento;
	return(sepmiles($desc_final));
}
function cambio_fecha2($dato){
	setlocale(LC_ALL,"es_ES");
	$fecha = date_create($dato);
	$fecha_final = date_format($fecha, "d-m-Y");
	return($fecha_final);
}	
function cambio_fecha3($dato){
	setlocale(LC_ALL,"es_ES");
	$fecha = date_create($dato);
	$mes = date_format($fecha, "F");
	switch($mes){
		case "January":
		$mes = "Enero";
		break;
		case "February":
		$mes = "Febrero";
		break;
		case "March":
		$mes = "Marzo";
		break;
		case "April":
		$mes = "Abril";
		break;
		case "May":
		$mes = "Mayo";
		break;
		case "June":
		$mes = "Junio";
		break;
		case "July":
		$mes = "Julio";
		break;
		case "August":
		$mes = "Agosto";
		break;
		case "September":
		$mes = "Septiembre";
		break;
		case "October":
		$mes = "Octubre";
		break;
		case "November":
		$mes = "Noviembre";
		break;
		case "December":
		$mes = "Diciembre";		
	}
	
	return($mes.date(" Y"));
}
function cupos($dato){
	switch($dato){
		case 2:
		$cupo = 50;
		break;
		default:
		$cupo = 30;
	}
	return ($cupo);
}
function restantes($dato1, $dato2){
	return($dato1-$dato2);
}
function porciento_dashventas($dato1, $dato2){
	$porciento = $dato1/$dato2*100;
	
	switch($porciento){
		case($porciento > 82.99):
		$respuesta = "success";
		break;
		case(($porciento < 82.99) and ($porciento > 49.99)):
		$respuesta = "warning";
		break;
		case($porciento > 50):
		$respuesta = "danger";
	}
	return ($respuesta);
}
function cambio_fecha4($dato){
	setlocale(LC_ALL,"es_ES");
	$fecha = date_create($dato);
	$nombre_dia = date_format($fecha, "l");
	switch ($nombre_dia){
		case"Monday":
		$nombre_dia = "Lunes";
		break;
		case"Tuesday":
		$nombre_dia = "Martes";
		break;
		case"Wednesday":
		$nombre_dia = "Mi&eacute;rcoles";
		break;
		case"Thursday":
		$nombre_dia = "Jueves";
		break;
		case"Friday":
		$nombre_dia = "Viernes";
		break;
		case"Saturday":
		$nombre_dia = "Sabado";
		break;
		case"Sunday":
		$nombre_dia = "Domingo";		
	}
	return($nombre_dia);
}
function cambiaf_mysql($fechadb){
	list($date,$time)=explode(" ",$fechadb);
//vamos a suponer que recibmos el formato MySQL básico de YYYY-MM-DD
//lo primero es separar cada elemento en una variable
    list($yy,$mm,$dd)=explode("-",$date);
//si viniera en otro formato, adaptad el explode y el orden de las variables a lo que necesitéis
//creamos un objeto DateTime (existe desde PHP 5.2)
	$ano = floatval($yy);
	$mes = floatval($mm);
	$dia = floatval($dd);
	list($hh,$mm,$ss)=explode(":",$time);
	$hora = floatval($hh);
	$minuto = floatval($mm);
	$segundos = floatval($ss);
    $fecha = new DateTime();
//definir hora
	$fecha->setTime($hora,$minuto,$segundos);
//definimos la fecha pasándole las variabes antes extraídas
        $fecha->setDate($ano, $mes, $dia);
//y ahora el propio objeto nos permite definir el formato de fecha para imprimir que queramos       
    return ($fecha->format('d-m-Y h:i:s a'));
}
function date_cambiar($dato){
	if($dato==''){
		$fecha = '0000-00-00 00:00:00 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;';
		return($fecha);
	}else{
		$fecha = $dato;
		return(cambiaf_mysql($fecha));
	}
	
}
function url_exists( $url) {

    if( empty( $url ) ){
        return false;
    }

    // get_headers() realiza una petición GET por defecto
    // cambiar el método predeterminadao a HEAD
    // Ver http://php.net/manual/es/function.get-headers.php
    stream_context_set_default(
        array(
            'http' => array(
                'method' => 'HEAD'
             )
        )
    );
    $headers = @get_headers( $url );
    sscanf( $headers[0], 'HTTP/%*d.%*d %d', $httpcode );

    //Aceptar solo respuesta 200 (Ok), 301 (redirección permanente) o 302 (redirección temporal)
    $accepted_response = array( 200, 301, 302 );
    if( in_array( $httpcode, $accepted_response ) ) {
        return true;
    } else {
        return false;
    }
}
function buscar_suma_estatus($fecha, $estatus){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_suma = "SELECT count(id) FROM correos_enviados WHERE date(fecha) = '$fecha' and estatus = '$estatus'";
	$suma = mysql_query($query_suma, $GLOBALS['quality']) or die(mysql_error());
	$row_suma = mysql_fetch_assoc($suma);
	$totalRows_suma = mysql_num_rows($suma);	
	return($row_suma['count(id)']);	
}
function buscar_suma_estatus_null($fecha){
	mysql_select_db($GLOBALS['database_quality'], $GLOBALS['quality']);
	$query_suma = "SELECT count(id) FROM correos_enviados WHERE date(fecha) = '$fecha' and estatus is NULL";
	$suma = mysql_query($query_suma, $GLOBALS['quality']) or die(mysql_error());
	$row_suma = mysql_fetch_assoc($suma);
	$totalRows_suma = mysql_num_rows($suma);	
	return($row_suma['count(id)']);	
}
?>