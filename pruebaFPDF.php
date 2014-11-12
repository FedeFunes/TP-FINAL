<?php
require('/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(40,10,"Nro de Reserva:".$_SESSION["nroReserva"]."", 1); 
$pdf->Ln(0);
$pdf->Cell(40,10,"Hola, Mundo:", 1); 
$pdf->Cell(60,10,'Hecho con FPDF.',0,1,'C');
$pdf->Ln(0);
$pdf->Cell(40,10,"Hola, Mundo:", 1); 
$pdf->Cell(60,10,'Hecho con FPDF.',0,1,'C');
$pdf->Ln(0); 
$pdf->Output();

?>

