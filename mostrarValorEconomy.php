<?php
	
	include("conectarBaseDeDatos.php"); 

	$idCiudad=$_REQUEST["idCiudad"]; // OBTENGO LA VARIABLE idCiudad

	$query = "SELECT C.idCiudad
				FROM reservas R JOIN
					vuelos V ON R.cod_vuelo = V.idVuelo JOIN
					programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
					aeropuertos A ON PV.cod_aeropuerto_destino = A.idAeropuerto JOIN
					ciudades C ON A.cod_ciudad = C.idCiudad
				WHERE R.estado IN (2, 5)
				AND R.categoria = 2
				AND C.idCiudad = $idCiudad;";

	$result = mysqli_query($conexion,$query);
	$cantidadEconomy = mysqli_num_rows($result);
	
	echo $cantidadEconomy;

	mysqli_close($conexion);

?>
