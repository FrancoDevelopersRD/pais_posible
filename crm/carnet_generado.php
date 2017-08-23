    <?php
    require_once('../Connections/pais_posible.php');
    require('../fpdf/fpdf.php');
    //include('../fpdf/lib_funciones.php');
    ?>
    <?php
    if (!isset($_SESSION)) {
      session_start();
    }
    ?>
    <?php

    $link_pais_posible = mysqli_connect("localhost:3306", "root", "root", "pais_posible");
    $link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");

    $cedula = $_GET['cedula'];


    $result_carnet = mysqli_query($link_pais_posible, "SELECT *, DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') AS nacimiento FROM carnet WHERE cedula = '".$cedula."'");
    $query_carnet = mysqli_fetch_assoc($result_carnet);

    $result_cedula = mysqli_query($link_datos_externos, "SELECT padron.cedula AS cedula, padron.nombresplastico AS nombresplastico, padron.fechanacimiento AS nacimiento, padron.codigorecinto AS codigorecinto, colegio2016.codigocolegio AS colegio, padron.apellidosplastico AS apellidosplastico, padron.codigocircunscripcion AS codigocircunscripcion, provincia.descripcion AS provincia, municipio.descripcion AS municipio, recinto.descripcion AS recinto, recinto.direccion AS direccion, sectorparaje.descripcion AS sector, padron.idsexo AS sexo, padron.idestadocivil AS estado_civil FROM padron INNER JOIN recinto ON padron.codigorecinto = recinto.codigorecinto INNER JOIN sectorparaje ON sectorparaje.id = recinto.idsectorparaje INNER JOIN colegio2016 ON padron.colegio = colegio2016.codigocolegio INNER JOIN sexo ON padron.idsexo = sexo.id INNER JOIN provincia ON provincia.id = padron.idprovincia INNER JOIN municipio ON municipio.id = padron.idmunicipio INNER JOIN estado_civil ON padron.idestadocivil = estado_civil.id WHERE cedula = '".$cedula."'");
    $query_cedula = mysqli_fetch_assoc($result_cedula);

    $inicio_cedula = substr($query_carnet['cedula'], 0, 3);
    $medio_cedula = substr($query_carnet['cedula'], 3, 7);
    $final_cedula = substr($query_carnet['cedula'], -1);

    if($query_carnet['sexo'] == 'M'){
      $sexo = 'Hombre';
    }

    if($query_carnet['sexo'] == 'F'){
      $sexo = 'Mujer';
    }

    if(empty($query_carnet['sexo'])){
      $sexo = 'Indefinido';
    }

    $cedula_completa = $inicio_cedula.'-'.$medio_cedula.'-'.$final_cedula;

    class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Line break
    $this->Ln(20);
}

}



//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(92, 184, 92);


 //html_entity_decode("&aacute;");
//$this->SetY(20);
// $pdf->Image('quality2.png',10,15,-120);
// $pdf->SetY(30);
//$pdf->SetX(70);
//$pdf->MultiCell(60,5,'Quality Global Business',0,'L',false);
$pdf->Image('pais_posible_carnet.jpg',0,0,220,40);
$pdf->Image('fondo_carnet.jpg',0,40,220,110);
$pdf->Image($query_carnet['foto'],5,45,50,50);
$pdf->SetFont('Arial','',20);
$pdf->SetTextColor(255,255,255);
$pdf->SetY(50);
$pdf->SetX(60);
$pdf->MultiCell(50,5,utf8_decode('Cédula: '),0,'L',false);
$pdf->SetY(60);
$pdf->SetX(60);
$pdf->MultiCell(50,5,utf8_decode('Nombres: '),0,'L',false);
$pdf->SetY(70);
$pdf->SetX(60);
$pdf->MultiCell(50,5,utf8_decode('Apellidos: '),0,'L',false);
$pdf->SetY(80);
$pdf->SetX(60);
$pdf->MultiCell(50,5,utf8_decode('Sexo: '),0,'L',false);
$pdf->SetY(90);
$pdf->SetX(60);
$pdf->MultiCell(50,5,utf8_decode('Nacimiento: '),0,'L',false);

$pdf->SetY(100);
$pdf->SetX(5);
$pdf->MultiCell(50,5,utf8_decode('Provincia: '),0,'L',false);
$pdf->SetY(110);
$pdf->SetX(5);
$pdf->MultiCell(50,5,utf8_decode('Municipio: '),0,'L',false);
$pdf->SetY(120);
$pdf->SetX(5);
$pdf->MultiCell(50,5,utf8_decode('Sector: '),0,'L',false);

$pdf->SetY(100);
$pdf->SetX(110);
$pdf->MultiCell(80,5,utf8_decode('Circunscripción: '),0,'L',false);
$pdf->SetY(110);
$pdf->SetX(110);
$pdf->MultiCell(80,5,utf8_decode('Colegio (Mesa): '),0,'L',false);
$pdf->SetY(120);
$pdf->SetX(110);
$pdf->MultiCell(80,5,utf8_decode('Codigo Recinto: '),0,'L',false);

$pdf->SetY(130);
$pdf->SetX(5);
$pdf->MultiCell(80,5,utf8_decode('Nombre del Recinto: '),0,'L',false);
$pdf->SetY(140);
$pdf->SetX(5);
$pdf->MultiCell(80,5,utf8_decode('Ubicación del Recinto: '),0,'L',false);

$pdf->SetFont('Arial','',14);
$pdf->SetTextColor(92,184,92);
$pdf->SetY(50);
$pdf->SetX(101);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($cedula_completa))),0,'L',false);
$pdf->SetY(60);
$pdf->SetX(101);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_carnet['nombres']))),0,'L',false);
$pdf->SetY(70);
$pdf->SetX(101);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_carnet['apellidos']))),0,'L',false);
$pdf->SetY(80);
$pdf->SetX(101);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($sexo))),0,'L',false);
$pdf->SetY(90);
$pdf->SetX(101);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_carnet['nacimiento']))),0,'L',false);
$pdf->SetY(100);
$pdf->SetX(163);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_carnet['circunscripcion']))),0,'L',false);
$pdf->SetY(110);
$pdf->SetX(163);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_carnet['colegio_electoral']))),0,'L',false);
$pdf->SetY(120);
$pdf->SetX(163);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_carnet['codigo_recinto']))),0,'L',false);
$pdf->SetY(130);
$pdf->SetX(79);
$pdf->MultiCell(120,5,ucwords(strtolower(utf8_decode($query_carnet['nombre_recinto']))),0,'L',false);
$pdf->SetY(140);
$pdf->SetX(79);
$pdf->MultiCell(120,5,ucwords(strtolower(utf8_decode($query_carnet['direccion_recinto']))),0,'L',false);
$pdf->SetY(100);
$pdf->SetX(39);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_cedula['provincia']))),0,'L',false);
$pdf->SetY(110);
$pdf->SetX(39);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_cedula['municipio']))),0,'L',false);
$pdf->SetY(120);
$pdf->SetX(39);
$pdf->MultiCell(80,5,ucwords(strtolower(utf8_decode($query_cedula['sector']))),0,'L',false);

$pdf->SetDrawColor(255,255,255);
$pdf->Line(102,55,202,55);
$pdf->Line(102,65,202,65);
$pdf->Line(102,75,202,75);
$pdf->Line(102,85,202,85);
$pdf->Line(102,95,202,95);

$pdf->Line(40,105,101,105);
$pdf->Line(40,115,101,115);
$pdf->Line(40,125,101,125);

$pdf->Line(164,105,202,105);
$pdf->Line(164,115,202,115);
$pdf->Line(164,125,202,125);

$pdf->Line(80,135,202,135);
$pdf->Line(80,145,202,145);

$pdf->Output('F','carnets/'.$cedula.'.pdf');
header("Location: listado_carnet.php?pruebaSweet=12");

    ?>
