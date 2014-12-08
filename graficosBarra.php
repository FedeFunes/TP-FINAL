<?php
	include("conectarBaseDeDatos.php"); 
	session_start();
	
	// agregamos la bibliotecas necesarias
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_bar.php');
	
	// Recupero las variables y las guardo en una nueva
	$pasajesVendidos = $_SESSION['cantidadVendidas'];
	$cantidadTotalEconomy = $_SESSION['cantidadEconomy'];
	$cantidadTotalPrimera = $_SESSION['cantidadPrimera'];
	$totalReservasCaidas = $_SESSION['reservasCaidas'];
	//definimos los datos
	$datos = array($pasajesVendidos,$cantidadTotalEconomy,$cantidadTotalPrimera,$totalReservasCaidas);
	// Definir ancho y alto del grafico
	$ancho = 580; $alto = 500;
	//crear la instancia del objeto graph
	$graph = new Graph($ancho, $alto, 'auto');
	// $graph->xaxis->title->Set("Días");
	$graph->title->SetFont(FF_ARIAL, FS_BOLD, 28);
	//especificar la escala
	$cant = "Cantidad";
	$graph-> SetScale('textint');
	//crear curva
	$curva = new BarPlot($datos);
	// Configuraciones del grafico 
	// agregar la curva al grafico
	$graph->Add($curva);
	 // mostrar el grafico
	$graph->Stroke();
?>

