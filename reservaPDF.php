<?php
session_start();
include("conectarBaseDeDatos.php"); 

require('/fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(40,10,"RESERVA",0,1);
$pdf->Cell(40,10,"Nombre y Apellido: ".$_SESSION["nombre"]." ".$_SESSION["apellido"]."",0,1);
$pdf->Cell(40,10,"Nro de Reserva - Ida: ".$_SESSION["idReservaIda"]."",0,1);
$pdf->Cell(40,10,"Id Vuelo - Ida: ".$_SESSION["idVueloIda"]."",0,1);
if($_SESSION["tipoViaje"] == "idaVuelta") {
	$pdf->Cell(40,10,"Nro de Reserva - Vuelta: ".$_SESSION["idReservaVuelta"]."",0,1);
	$pdf->Cell(40,10,"Id Vuelo - Vuelta: ".$_SESSION["idVueloVuelta"]."",0,1);	
}
$pdf->Cell(40,10,"Origen: ".$_SESSION["nombreProvinciaOrigen"]." - ".$_SESSION["nombreCiudadOrigen"]."",0,1);  
$pdf->Cell(40,10,"Destino: ".$_SESSION["nombreProvinciaDestino"]." - ".$_SESSION["nombreCiudadDestino"]."",0,1);
$pdf->Cell(40,10,"Categoria: ".$_SESSION["categoriaNombre"]."",0,1);
$pdf->Cell(40,10,"Precio: ".$_SESSION["precioCategoria"]."",0,1);

$pdf->Output();

session_destroy(); 

?>

