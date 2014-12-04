<?php
	
	include("conectarBaseDeDatos.php"); 

	$idAvion=$_REQUEST["idAvion"]; // OBTENGO LA VARIABLE idAvion
	$idCiudad = $_REQUEST["idCiudad"];

	$query = "SELECT AV.idAvion, C.idCiudad, COUNT(*) as cantPasajesVendidos
				FROM reservas R JOIN
					vuelos V ON R.cod_vuelo = V.idVuelo JOIN
					programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
					aviones AV ON PV.cod_avion = AV.idAvion JOIN
					aeropuertos AE ON PV.cod_aeropuerto_destino = AE.idAeropuerto JOIN
					ciudades C ON AE.cod_ciudad = C.idCiudad
				WHERE R.estado IN (2,5)
					AND C.idCiudad = $idCiudad
						AND AV.idAvion = $idAvion
				GROUP BY AV.idAvion, C.idCiudad";

	$result = mysqli_query($conexion,$query);
	$row = mysqli_fetch_assoc($result);
	
	if ($row != NULL)
		echo $row['cantPasajesVendidos'];
	else
		echo 0;

	mysqli_close($conexion);

?>
