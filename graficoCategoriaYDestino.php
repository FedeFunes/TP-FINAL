<?php
	// agregamos la bibliotecas necesarias
	include('conectarBaseDeDatos.php');
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_pie.php');
	//definimos los datos
	
	$idCiudadDestino=$_REQUEST["idCiudad"]; // OBTENGO LA VARIABLE idCiudad
	$cantPasajesVendidosEconomy=$_REQUEST["cantPasajesVendidosEconomy"]; // OBTENGO LA VARIABLE idCiudad
	$cantPasajesVendidosPrimera=$_REQUEST["cantPasajesVendidosPrimera"]; // OBTENGO LA VARIABLE idCiudad	

	$datos = array($cantPasajesVendidosEconomy,$cantPasajesVendidosPrimera);
	//Definir ancho y alto del grafico
	$ancho = 600; $alto = 250;
	//crear la instancia del objeto graph
	$graph = new PieGraph($ancho,$alto, 'auto');
	//especificar la escala
	$graph-> SetScale('intint');
	//crear curva
	$curva = new PiePlot($datos);
	// Configuraciones del grafico
	// agregar la curva al grafico
	$graph->Add($curva);
	// mostrar el grafico
	$graph->Stroke();
?>

