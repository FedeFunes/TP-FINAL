<?php
	include('conectarBaseDeDatos.php');

	$idCiudad=$_REQUEST["idCiudad"];

	// CANT DE PASAJES VENDIDOS ECONOMY
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
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$cantPasajesVendidosEconomy = mysqli_num_rows($result); 

	// CANT DE PASAJES VENDIDOS PRIMERA
	
	$query = "SELECT C.idCiudad
				FROM reservas R JOIN
					vuelos V ON R.cod_vuelo = V.idVuelo JOIN
					programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN
					aeropuertos A ON PV.cod_aeropuerto_destino = A.idAeropuerto JOIN
					ciudades C ON A.cod_ciudad = C.idCiudad
				WHERE R.estado IN (2, 5)
				AND R.categoria = 1
				AND C.idCiudad = $idCiudad";
	
	$result = mysqli_query($conexion,$query);
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$cantPasajesVendidosPrimera = mysqli_num_rows($result); 

	echo "</br> Cantidad Pasajes Vendidos Economy: $cantPasajesVendidosEconomy";
	echo "</br> Cantidad Pasajes Vendidos Primera: $cantPasajesVendidosPrimera";
	echo "</br>";

	if($cantPasajesVendidosEconomy == 0 and $cantPasajesVendidosPrimera == 0) {
		echo "No existe pasajes vendidos con este destino.";
		die();
	} else {
		echo "<img src='graficoCategoriaYDestino.php?idCiudad=".$idCiudad."&cantPasajesVendidosEconomy=".$cantPasajesVendidosEconomy."&cantPasajesVendidosPrimera=".$cantPasajesVendidosPrimera."'/>";
	}
?>
