<?php

	include("conectarBaseDeDatos.php"); 

	$idAvion=$_REQUEST["idAvion"]; // OBTENGO LA VARIABLE idAvion

	$query = "SELECT A.idAvion, COUNT(*) as cantPasajesVendidos
				FROM reservas R JOIN
				vuelos V ON R.cod_vuelo = V.idVuelo JOIN
				programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
				aviones A ON PV.cod_avion = A.idAvion
				WHERE R.estado IN (2,5)
				AND A.idAvion = $idAvion
				GROUP BY A.idAvion";

	$result = mysqli_query($conexion,$query);
	$row = mysqli_fetch_assoc($result);
	
	echo $row['cantPasajesVendidos'];
	$_SESSION['cantPasajesVendidos'] = $row['cantPasajesVendidos'];

	mysqli_close($conexion);

?>
