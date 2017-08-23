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
    $result_carnet = mysqli_query($link_pais_posible, "SELECT * FROM carnet WHERE cedula = '22301055772'");
    $query_carnet = mysqli_fetch_assoc($result_carnet);

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
}

//Pie de página
function Footer()
{
$this->SetY(286);
$this->SetFont('Arial','B',8);
$this->SetTextColor(0,0,0);
$this->Line(132,285,162,285);
$this->Line(170,285,200,285);
$this->SetY(286);
$this->SetX(136);
$this->Cell(50,5,'Autorizado Por',0,'C',false);
$this->SetY(286);
$this->SetX(176);
$this->Cell(50,5,'Firma Cliente',0,'C',false);
}

}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$pdf->Image('checkbox.png',65,48,7);
$pdf->Line(10,50,10,80);
$pdf->Line(73,50,73,80);
$pdf->Line(136,50,136,80);
$pdf->Line(199,50,199,80);
$pdf->Line(10,80,199,80);
$pdf->Line(10,50,199,50);
$pdf->Image($query_carnet['foto'],10,50,18);
$pdf->SetY(50);
$pdf->SetX(29);
$pdf->MultiCell(102,5,$cedula_completa.utf8_decode('          VOTÓ'),0,'L',false);
$pdf->SetX(29);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet['nombres'])),0,'L',false);
$pdf->SetX(29);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet['apellidos'])),0,'L',false);
$pdf->SetY(65);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'PROVINCIA: '.utf8_decode(strtoupper($query_provincia['provincia'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'CIRCUNSCRIPCION: '.utf8_decode(strtoupper($query_carnet['circunscripcion'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'COLEGIO: '.utf8_decode(strtoupper($query_carnet['colegio_electoral'])).'                              FIRMA',0,'L',false);

$pdf->SetY(200);
$pdf->Image('checkbox.png',65,48,7);
$pdf->Line(10,50,10,80);
$pdf->Line(73,50,73,80);
$pdf->Line(136,50,136,80);
$pdf->Line(199,50,199,80);
$pdf->Line(10,80,199,80);
$pdf->Line(10,50,199,50);
$pdf->Image($query_carnet['foto'],10,50,18);
$pdf->SetY(50);
$pdf->SetX(29);
$pdf->MultiCell(102,5,$cedula_completa.utf8_decode('          VOTÓ'),0,'L',false);
$pdf->SetX(29);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet['nombres'])),0,'L',false);
$pdf->SetX(29);
$pdf->MultiCell(102,5,utf8_decode(strtoupper($query_carnet['apellidos'])),0,'L',false);
$pdf->SetY(65);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'PROVINCIA: '.utf8_decode(strtoupper($query_provincia['provincia'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'CIRCUNSCRIPCION: '.utf8_decode(strtoupper($query_carnet['circunscripcion'])),0,'L',false);
$pdf->SetX(10);
$pdf->MultiCell(102,5,'COLEGIO: '.utf8_decode(strtoupper($query_carnet['colegio_electoral'])).'                              FIRMA',0,'L',false);

$pdf->SetMargins(5, 25 , 30);

$pdf->SetAutoPageBreak(true,25);

$pdf->Ln(-20);


$pdf->Output('F','carnets/reportes_carnets/'.$query_carnet['id'].'.pdf');
header("Location: listado_carnet.php?pruebaSweet=13");

    ?>
