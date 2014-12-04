<?php
	include("conectarBaseDeDatos.php"); 
	session_start();
	
	// agregamos la bibliotecas necesarias
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_bar.php');
	
	
	//definimos los datos
	$datos = $_SESSION['cantidadPasajesVendidos'];
	// Definir ancho y alto del grafico
	$ancho = 600; $alto = 250;
	//crear la instancia del objeto graph
	$graph = new Graph($ancho, $alto, 'auto');
	//especificar la escala
	$graph-> SetScale('textlin');
	//crear curva
	$curva = new BarPlot($datos);
	// Configuraciones del grafico 
	// agregar la curva al grafico
	$graph->Add($curva);
	 // mostrar el grafico
	$graph->Stroke();
?>
