<?php
	include("conectarBaseDeDatos.php"); 
	session_start();
	
	// agregamos la bibliotecas necesarias
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_pie.php');
	
	$idAvion = $_GET['idAvion'];
	$pasajesVendidosPorAvion = $_SESSION['cantPasajesVendidos'];
	//definimos los datos
	$queryAviones = "SELECT * FROM aviones ORDER BY modelo";
	$resultQueryAviones = mysqli_query($conexion,$queryAviones);

	while($row = mysqli_fetch_array($resultQueryAviones)) {
		$datosx = $row['modelo'];
	}
	
	$datosy = array($pasajesVendidosPorAvion);
	// Definir ancho y alto del grafico
	$ancho = 600; $alto = 250;
	//crear la instancia del objeto graph
	$graph = new PieGraph($ancho,$alto, 'auto');
	//especificar la escala
	$graph-> SetScale('intint');
	//crear curva
	$curva = new PiePlot($datosx);
	// Configuraciones del grafico
	// agregar la curva al grafico
	$graph->Add($curva);
	// mostrar el grafico
	$graph->Stroke();
?>
