<?php
$host = "localhost:3306";
$user = "root";
$password = "root";
$link = mysql_connect ($host, $user, $password) or die ("<center>No se puede conectar con la base de datos\n</center>\n");
?>


<?php
   $dbname="datos_externos";
   $cedula = $_POST['buscar_cedTodo'];
   $query="SELECT padron.cedula AS cedula, padron.nombresplastico AS nombresplastico, padron.fechanacimiento AS nacimiento, padron.codigorecinto AS codigorecinto, colegio2016.codigocolegio AS colegio, padron.apellidosplastico AS apellidosplastico, padron.codigocircunscripcion AS codigocircunscripcion, padron.idprovincia AS idprovincia, padron.idmunicipio AS idmunicipio, recinto.descripcion AS recinto, recinto.direccion AS direccion, recinto.idsectorparaje AS idsectorparaje, padron.idsexo AS sexo, padron.idestadocivil AS estado_civil FROM padron INNER JOIN recinto ON padron.codigorecinto = recinto.codigorecinto INNER JOIN sectorparaje ON sectorparaje.id = recinto.idsectorparaje INNER JOIN colegio2016 ON padron.colegio = colegio2016.codigocolegio INNER JOIN sexo ON padron.idsexo = sexo.id INNER JOIN estado_civil ON padron.idestadocivil = estado_civil.id WHERE cedula = '$cedula'";
   $result=mysql_db_query ($dbname, $query, $link);
   $row = mysql_fetch_array ($result);

   if ($row['cedula'] != '') {
    echo json_encode(array(
      "nombres"=>$row['nombresplastico'],
      "apellidos"=>$row['apellidosplastico'],
      "circunscripcion"=>$row['codigocircunscripcion'],
      "provincia"=>$row['idprovincia'],
      "municipio"=>$row['idmunicipio'],
      "colegio_electoral"=>$row['colegio'],
      "codigorecinto"=>$row['codigorecinto'],
      "recinto"=>$row['recinto'],
      "direccion_recinto"=>$row['direccion'],
      "sexo"=>$row['sexo'],
      "estado_civil"=>$row['estado_civil'],
      "fecha_nacimiento"=>$row['nacimiento'],
      "sector"=>$row['idsectorparaje']));
   }else{
    json_encode(array(
      "nombres"=>"", 
      "apellidos"=>"", 
      "circunscripcion"=>"",
      "sector"=>"",
      "provincia"=>"",
      "municipio"=>"",
      "colegio_electoral"=>"",
      "codigorecinto"=>"",
      "recinto"=>"",
      "direccion_recinto"=>"",
      "sexo"=>"",
      "estado_civil"=>"",
      "fecha_nacimiento"=>"",
      "telefono"=>"",
      "celular"=>"",
      "correo"=>"",
      "clave"=>"",
      "nivel_acceso"=>"",
      "comentario"=>"",
      "sector"=>""));
   }
  
  ?>