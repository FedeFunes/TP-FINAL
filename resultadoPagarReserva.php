<?php
session_start();
include("conectarBaseDeDatos.php"); 

require('/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(40,10,"PASAJE",0,1);
$pdf->Cell(40,10,"Nro de Reserva: ".$_SESSION["nroReserva"]."",0,1);
$pdf->Cell(40,10,"Cod de Vuelo: ".$_SESSION["codVuelo"]."",0,1);
$pdf->Cell(40,10,"Fecha Vuelo: ".$_SESSION["fechaVuelo"]."",0,1);
$pdf->Cell(40,10,"Origen: ".$_SESSION["provinciaOrigen"]." - ".$_SESSION["ciudadOrigen"]."",0,1);  
$pdf->Cell(40,10,"Origen: ".$_SESSION["provinciaDestino"]." - ".$_SESSION["ciudadDestino"]."",0,1);
$pdf->Cell(40,10,"Categoria: ".$_SESSION["categoria"]."",0,1);
$pdf->Cell(40,10,"Precio: ".$_SESSION["precioCategoria"]."",0,1);
$pdf->Output();

?>
