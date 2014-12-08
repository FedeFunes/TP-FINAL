<?php
	include("conectarBaseDeDatos.php");
	// agregamos la bibliotecas necesarias
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_pie.php');
	//definimos los datos
	
	$resultadoAvionTipo1=$_REQUEST["resultadoAvionTipo1"]; 
	$resultadoAvionTipo2=$_REQUEST["resultadoAvionTipo2"];
	$resultadoAvionTipo3=$_REQUEST["resultadoAvionTipo3"];
	$resultadoAvionTipo4=$_REQUEST["resultadoAvionTipo4"];
	
	$datos = array($resultadoAvionTipo1,$resultadoAvionTipo2,$resultadoAvionTipo3,$resultadoAvionTipo4);
	
	// Definir ancho y alto del grafico
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
?>

