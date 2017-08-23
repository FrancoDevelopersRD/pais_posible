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
    $result_carnet = mysqli_query($link_pais_posible, "SELECT * FROM carnet");
    //$query_carnet = mysqli_fetch_assoc($result_carnet);

    $link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
    $result_provincia = mysqli_query($link_datos_externos, "SELECT descripcion AS provincia FROM provincia WHERE id = '".$query_carnet['provincia']."'");
    $query_provincia = mysqli_fetch_assoc($result_provincia);

    $inicio_cedula = substr($query_carnet['cedula'], 0, 3);
    $medio_cedula = substr($query_carnet['cedula'], 3, 7);
    $final_cedula = substr($query_carnet['cedula'], -1);
    $cedula_completa = $inicio_cedula.'-'.$medio_cedula.'-'.$final_cedula;

    



    class PDF extends FPDF
{
function Header()
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',17);
    $this->SetY(10);
    $this->SetX(36);
    $this->MultiCell(135,5,utf8_decode('REPORTE GENERAL DE CARNETS DE MEMBRESÍA'),0,'C',false);
    $this->SetY(22);
    $this->SetX(36);
    $this->SetFont('Arial','B',14);
    $this->MultiCell(135,5,utf8_decode('AL 19/08/2017'),0,'C',false);
    $this->Image('pais_posible.jpg',8,8,30);
    $this->Image('milton_morrison.jpg',168,8,30);
    $this->SetFont('Arial','',10);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}

//Pie de página
function Footer()
{
$this->SetY(276);
$this->SetFont('Arial','B',8);
$this->SetTextColor(0,0,0);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$margen_vertical_inicial = 50;
$margen_vertical_sumatorio = 0;
$margen_vertical_inicial2 = 50;
$margen_vertical_sumatorio2 = 0;
$margen_vertical_inicial3 = 50;
$margen_vertical_sumatorio3 = 0;
$margen_check = 48;

$contador = 0;

 while ($query_carnet2 = mysqli_fetch_assoc($result_carnet)) {

    if($contador<=6){

    $link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
    $result_provincia = mysqli_query($link_datos_externos, "SELECT descripcion AS provincia FROM provincia WHERE id = '".$query_carnet2['provincia']."'");
    $query_provincia = mysqli_fetch_assoc($result_provincia);

    $inicio_cedula = substr($query_carnet2['cedula'], 0, 3);
    $medio_cedula = substr($query_carnet2['cedula'], 3, 7);
    $final_cedula = substr($query_carnet2['cedula'], -1);
    $cedula_completa = $inicio_cedula.'-'.$medio_cedula.'-'.$final_cedula;

$pdf->Image('checkbox.png',65,$margen_check+$margen_vertical_sumatorio,7);
$pdf->Image($query_carnet2['foto'],10,50+$margen_vertical_sumatorio,18);
$pdf->SetY($margen_vertical_inicial+$margen_vertical_sumatorio);
$pdf->SetX(29);
$pdf->MultiCell(102,5,$cedula_completa.utf8_decode('          VOTÓ'),0,'L',false);
$pdf->SetX(29);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet2['nombres'])),0,'L',false);
$pdf->SetX(29);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet2['apellidos'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'PROVINCIA: '.utf8_decode(strtoupper($query_provincia['provincia'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'CIRCUNSCRIPCION: '.utf8_decode(strtoupper($query_carnet2['circunscripcion'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'COLEGIO: '.utf8_decode(strtoupper($query_carnet2['colegio_electoral'])).'                              FIRMA',0,'L',false);
$margen_vertical_sumatorio = $margen_vertical_sumatorio + 30;
}
    if($contador>6 AND $contador<14){

    $link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
    $result_provincia = mysqli_query($link_datos_externos, "SELECT descripcion AS provincia FROM provincia WHERE id = '".$query_carnet2['provincia']."'");
    $query_provincia = mysqli_fetch_assoc($result_provincia);

    $inicio_cedula = substr($query_carnet2['cedula'], 0, 3);
    $medio_cedula = substr($query_carnet2['cedula'], 3, 7);
    $final_cedula = substr($query_carnet2['cedula'], -1);
    $cedula_completa = $inicio_cedula.'-'.$medio_cedula.'-'.$final_cedula;

$pdf->Image('checkbox.png',128,$margen_check+$margen_vertical_sumatorio2,7);
$pdf->Image($query_carnet2['foto'],73,50+$margen_vertical_sumatorio2,18);
$pdf->SetY($margen_vertical_inicial2+$margen_vertical_sumatorio2);
$pdf->SetX(92);
$pdf->MultiCell(102,5,$cedula_completa.utf8_decode('          VOTÓ'),0,'L',false);
$pdf->SetX(92);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet2['nombres'])),0,'L',false);
$pdf->SetX(92);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet2['apellidos'])),0,'L',false);
$pdf->SetX(73);
$pdf->MultiCell(102,5,'PROVINCIA: '.utf8_decode(strtoupper($query_provincia['provincia'])),0,'L',false);
$pdf->SetX(73);
$pdf->MultiCell(102,5,'CIRCUNSCRIPCION: '.utf8_decode(strtoupper($query_carnet2['circunscripcion'])),0,'L',false);
$pdf->SetX(73);
$pdf->MultiCell(102,5,'COLEGIO: '.utf8_decode(strtoupper($query_carnet2['colegio_electoral'])).'                              FIRMA',0,'L',false);
$margen_vertical_sumatorio2 = $margen_vertical_sumatorio2 + 30;
}
if($contador>13 AND $contador<22){

    $link_datos_externos = mysqli_connect("localhost:3306", "root", "root", "datos_externos");
    $result_provincia = mysqli_query($link_datos_externos, "SELECT descripcion AS provincia FROM provincia WHERE id = '".$query_carnet2['provincia']."'");
    $query_provincia = mysqli_fetch_assoc($result_provincia);

    $inicio_cedula = substr($query_carnet2['cedula'], 0, 3);
    $medio_cedula = substr($query_carnet2['cedula'], 3, 7);
    $final_cedula = substr($query_carnet2['cedula'], -1);
    $cedula_completa = $inicio_cedula.'-'.$medio_cedula.'-'.$final_cedula;

$pdf->Image('checkbox.png',191,$margen_check+$margen_vertical_sumatorio3,7);
$pdf->Image($query_carnet2['foto'],136,50+$margen_vertical_sumatorio3,18);
$pdf->SetY($margen_vertical_inicial3+$margen_vertical_sumatorio3);
$pdf->SetX(155);
$pdf->MultiCell(102,5,$cedula_completa.utf8_decode('          VOTÓ'),0,'L',false);
$pdf->SetX(155);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet2['nombres'])),0,'L',false);
$pdf->SetX(155);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet2['apellidos'])),0,'L',false);
$pdf->SetX(136);
$pdf->MultiCell(102,5,'PROVINCIA: '.utf8_decode(strtoupper($query_provincia['provincia'])),0,'L',false);
$pdf->SetX(136);
$pdf->MultiCell(102,5,'CIRCUNSCRIPCION: '.utf8_decode(strtoupper($query_carnet2['circunscripcion'])),0,'L',false);
$pdf->SetX(136);
$pdf->MultiCell(102,5,'COLEGIO: '.utf8_decode(strtoupper($query_carnet2['colegio_electoral'])).'                              FIRMA',0,'L',false);
$margen_vertical_sumatorio3 = $margen_vertical_sumatorio3 + 30;
}
$contador++;
}

$pdf->Line(10,50,10,80);
$pdf->Line(73,50,73,80);
$pdf->Line(136,50,136,80);
$pdf->Line(199,50,199,80);
$pdf->Line(10,80,199,80);
$pdf->Line(10,50,199,50);

$pdf->Line(10,80,10,110);
$pdf->Line(73,80,73,110);
$pdf->Line(136,80,136,110);
$pdf->Line(199,80,199,110);
$pdf->Line(10,110,199,110);

$pdf->Line(10,110,10,140);
$pdf->Line(73,110,73,140);
$pdf->Line(136,110,136,140);
$pdf->Line(199,110,199,140);
$pdf->Line(10,140,199,140);

$pdf->Line(10,140,10,170);
$pdf->Line(73,140,73,170);
$pdf->Line(136,140,136,170);
$pdf->Line(199,140,199,170);
$pdf->Line(10,170,199,170);

$pdf->Line(10,170,10,200);
$pdf->Line(73,170,73,200);
$pdf->Line(136,170,136,200);
$pdf->Line(199,170,199,200);
$pdf->Line(10,200,199,200);

$pdf->Line(10,200,10,230);
$pdf->Line(73,200,73,230);
$pdf->Line(136,200,136,230);
$pdf->Line(199,200,199,230);
$pdf->Line(10,230,199,230);

$pdf->Line(10,230,10,260);
$pdf->Line(73,230,73,260);
$pdf->Line(136,230,136,260);
$pdf->Line(199,230,199,260);
$pdf->Line(10,260,199,260);


$pdf->SetMargins(5, 25 , 30);

$pdf->SetAutoPageBreak(true,25);

$pdf->Ln(-20);


$pdf->Output('F','carnets/reportes_carnets/reporte_prueba.pdf');
header("Location: listado_carnet.php?pruebaSweet=13");

    ?>
