<?php
session_start();
include("conectarBaseDeDatos.php"); 

require('/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(40,10,"BOARDING PASS",0,1);
$pdf->Cell(40,10,"Categoria: ".$_SESSION["categoriaNombre"]."",0,1);
$pdf->Cell(40,10,"Fila: ".$_SESSION["fila"]."",0,1);
$pdf->Cell(40,10,"Columna: ".$_SESSION["columna"]."",0,1);
$pdf->Cell(40,10,"Cod de Vuelo: ".$_SESSION["codVuelo"]."",0,1);
$pdf->Cell(40,10,"Fecha Vuelo: ".$_SESSION["fechaVuelo"]."",0,1);
$pdf->Cell(40,10,"Hora Vuelo: ".$_SESSION["horarioPartida"]."",0,1);
$pdf->Output();

session_destroy();

?>
