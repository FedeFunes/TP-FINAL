<?php
session_start();
include("conectarBaseDeDatos.php"); 

require('/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(40,10,"RESERVA",0,1);
$pdf->Cell(40,10,"Nro de Reserva - Ida: ".$_SESSION["idReservaIda"]."",0,1);
$pdf->Cell(40,10,"Nro de Reserva - Vuelta: ".$_SESSION["idReservaVuelta"]."",0,1);
$pdf->Cell(40,10,"Origen: ".$_SESSION["provinciaOrigen"]." - ".$_SESSION["ciudadOrigen"]."",0,1);  
$pdf->Cell(40,10,"Destino: ".$_SESSION["provinciaDestino"]." - ".$_SESSION["ciudadDestino"]."",0,1);
$pdf->Cell(40,10,"Categoria: ".$_SESSION["categoria"]."",0,1);
$pdf->Output();

?>

