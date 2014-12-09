<?php
	include('conectarBaseDeDatos.php');

	$idCiudadDestino=$_REQUEST["idCiudad"];
	
	// CANT DE PASAJES VENDIDOS CON ID AVION 1
	$query = "SELECT * FROM reservas R INNER JOIN 
	vuelos V ON R.cod_vuelo = V.idvuelo INNER JOIN
	programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo INNER JOIN
	aviones A ON PV.cod_avion = A.idAvion
	WHERE A.idAvion = 1
	AND PV.cod_aeropuerto_destino = $idCiudadDestino
	AND R.estado = 5;";
	
	$result = mysqli_query($conexion,$query);
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$resultadoAvionTipo1 = mysqli_num_rows($result); 


	// CANT DE PASAJES VENDIDOS CON ID AVION 2

	$query = "SELECT * FROM reservas R INNER JOIN 
	vuelos V ON R.cod_vuelo = V.idvuelo INNER JOIN
	programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo INNER JOIN
	aviones A ON PV.cod_avion = A.idAvion
	WHERE A.idAvion = 2
	AND PV.cod_aeropuerto_destino = $idCiudadDestino
	AND R.estado = 5;";
	
	$result = mysqli_query($conexion,$query);
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$resultadoAvionTipo2 = mysqli_num_rows($result); 

	// CANT DE PASAJES VENDIDOS CON ID AVION 3

	$query = "SELECT * FROM reservas R INNER JOIN 
	vuelos V ON R.cod_vuelo = V.idvuelo INNER JOIN
	programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo INNER JOIN
	aviones A ON PV.cod_avion = A.idAvion
	WHERE A.idAvion = 3
	AND PV.cod_aeropuerto_destino = $idCiudadDestino
	AND R.estado = 5;";
	
	$result = mysqli_query($conexion,$query);
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$resultadoAvionTipo3 = mysqli_num_rows($result); 

	// CANT DE PASAJES VENDIDOS CON ID AVION 4

	$query = "SELECT * FROM reservas R INNER JOIN 
	vuelos V ON R.cod_vuelo = V.idvuelo INNER JOIN
	programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo INNER JOIN
	aviones A ON PV.cod_avion = A.idAvion
	WHERE A.idAvion = 4
	AND PV.cod_aeropuerto_destino = $idCiudadDestino
	AND R.estado = 5;";
	
	$result = mysqli_query($conexion,$query);
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$resultadoAvionTipo4 = mysqli_num_rows($result); 

	echo "</br> Resultado Avion Tipo 1 (Embraer EMB-120): $resultadoAvionTipo1";
	echo "</br> Resultado Avion Tipo 2 (Embraer	ER-145 1): $resultadoAvionTipo2";
	echo "</br> Resultado Avion Tipo 3 (Embraer	ER-145 2): $resultadoAvionTipo3";
	echo "</br> Resultado Avion Tipo 4 (Embraer	ER-170): $resultadoAvionTipo4";
	echo "</br>";

	if($resultadoAvionTipo1 == 0 and $resultadoAvionTipo2 == 0 and $resultadoAvionTipo3 == 0 and $resultadoAvionTipo4 == 0) {
		echo "</br> No existe pasajes con este destino.";
		echo "</br>";
		echo "</br>";

		die();
	}

	echo "<img src='graficoAvionYDestino.php?idCiudad=".$idCiudadDestino."&resultadoAvionTipo1=".$resultadoAvionTipo1."&resultadoAvionTipo2=".$resultadoAvionTipo2."&resultadoAvionTipo3=".$resultadoAvionTipo3."&resultadoAvionTipo4=".$resultadoAvionTipo4."'/>";
?>
