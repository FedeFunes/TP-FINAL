<?php
session_start();

include("conectarBaseDeDatos.php"); 
include('/phpqrcode/qrlib.php');
include('config.php');
require('/fpdf/fpdf.php');

$destino = 'C:\xampp\htdocs\tpFinal\phpqrcode';
//Datos
$categoriaNombre = $_SESSION["categoriaNombre"];
$fila = $_SESSION["fila"];
$columna = $_SESSION["columna"];
$codVuelo = $_SESSION["codVuelo"];
$fechaVuelo = $_SESSION["fechaVuelo"];
$horarioPartida = $_SESSION["horarioPartida"];
//Contruir datos

$codeContents.='Código de Vuelo: '.$codVuelo."\n";
$codeContents.='Fecha de Vuelo: '.$fechaVuelo."\n";
$codeContents.='Horario de Partida: '.$horarioPartida."\n";
$codeContents.='Categoría :'.$categoriaNombre."\n";
$codeContents.='Fila: '.$fila."\n";
$codeContents.='Columna: '.$columna."\n";

//Generar
QRcode::png($codeContents,$destino.'boardingPass.png',QR_ECLEVEL_L,3);
//Mostrar
echo'<imgsrc="'.$destino.'boardingPass.png"/>';

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',16); 
$pdf->Cell(40,10,"BOARDING PASS",0,1);
$pdf->Cell(40,10,"Cod de Vuelo: ".$_SESSION["codVuelo"]."",0,1);
$pdf->Cell(40,10,"Fecha Vuelo: ".$_SESSION["fechaVuelo"]."",0,1);
$pdf->Cell(40,10,"Hora Vuelo: ".$_SESSION["horarioPartida"]."",0,1);
$pdf->Cell(40,10,"Categoria: ".$_SESSION["categoriaNombre"]."",0,1);
$pdf->Cell(40,10,"Fila: ".$_SESSION["fila"]."",0,1);
$pdf->Cell(40,10,"Columna: ".$_SESSION["columna"]."",0,1);
$pdf->Image(''.$destino.'boardingPass.png',100,5,80,0,'PNG');

ob_end_clean();
$pdf->Output();


session_destroy();

?>