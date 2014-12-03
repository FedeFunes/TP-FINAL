<?php
	
	include("conectarBaseDeDatos.php"); 

	$idAvion=$_REQUEST["idAvion"]; // OBTENGO LA VARIABLE idAvion

	$query = "SELECT A.modelo, A.total_pasajes-CPV.cantPasajesVendidos as PasajesVendidosPorAvion
				FROM vuelos V JOIN
					programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
					aviones A ON PV.cod_avion = A.idAvion JOIN
					reservas R ON V.idVuelo = R.cod_vuelo JOIN
					(SELECT A.idAvion, COUNT(*) as cantPasajesVendidos
					FROM reservas R JOIN
					vuelos V ON R.cod_vuelo = V.idVuelo JOIN
					programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
					aviones A ON PV.cod_avion = A.idAvion
					WHERE R.estado IN (2,5)
					GROUP BY A.idAvion) as CPV ON CPV.idAvion = A.idAvion 
				WHERE V.idVuelo = R.cod_vuelo
					AND V.cod_programacion_vuelo = PV.idProgramacionVuelo
						AND A.idAvion = PV.cod_avion
				GROUP BY A.idAvion, A.modelo, A.total_pasajes";

	$result = mysqli_query($conexion,$query);
	$cantidadAvion = mysqli_num_rows($result);
	
	echo $cantidadAvion;

	mysqli_close($conexion);

?>
