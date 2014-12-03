<?php
session_start();
include("conectarBaseDeDatos.php");

$nroReserva = $_POST["nroReserva"];

$query = "SELECT * FROM reservas 
WHERE idReserva = $nroReserva";

$result = mysqli_query($conexion,$query);
$cantDeFilasDevueltas = mysqli_num_rows($result);

if ($cantDeFilasDevueltas == 0) {

	header("location: reservaNoEncontrada.php"); 	
	die();
 
 } else {

	$reserva = mysqli_fetch_array($result);

	// Datos de la Reserva
	$_SESSION["idReserva"] = $reserva["idReserva"];
	$_SESSION["dniPasajero"] = $reserva["dni"];
	$_SESSION["codVuelo"] = $reserva["cod_vuelo"];	
	$_SESSION["estado"] = $reserva["estado"];
	$_SESSION["categoria"] = $reserva["categoria"];

	switch ($_SESSION["categoria"]) {
		case '1':
			$_SESSION["categoriaNombre"] = "Primera";
	        $precio_categoria = 'precio_primera';
			break;
		case '2':
			$_SESSION["categoriaNombre"] = "Economy";
	        $precio_categoria = 'precio_economy';
			break;
	}

	$query = "SELECT P1.descripcion as provinciaOrigen, C1.descripcion as ciudadOrigen,
	P2.descripcion as provinciaDestino, C2.descripcion as ciudadDestino, 
	PV.$precio_categoria as precioCategoria, PV.hora_partida as horarioPartida, 
	V.fecha_vuelo as fechaVuelo, E.descripcion as estadoNombre
	FROM reservas R JOIN 
	vuelos V ON R.cod_vuelo = V.idVuelo JOIN
	estados_reservas E ON R.estado = E.idEstadoReserva JOIN 
	programacionvuelos PV ON V.cod_programacion_vuelo = PV.idProgramacionVuelo JOIN 
	aeropuertos A1 ON A1.idAeropuerto = PV.cod_aeropuerto_origen JOIN 
	aeropuertos A2 ON A2.idAeropuerto = PV.cod_aeropuerto_destino JOIN 
	ciudades C1 ON C1.idCiudad = A1.cod_ciudad JOIN 
	ciudades C2 ON C2.idCiudad = A2.cod_ciudad JOIN 
	provincias P1 ON C1.cod_provincia = P1.idProvincia JOIN
	provincias P2 ON C2.cod_provincia = P2.idProvincia
	WHERE R.idReserva = ".$_SESSION["idReserva"].";"; 

	$result = mysqli_query($conexion,$query);
	$miReserva = mysqli_fetch_array($result);

	$_SESSION["provinciaOrigen"] = $miReserva["provinciaOrigen"];
	$_SESSION["ciudadOrigen"] = $miReserva["ciudadOrigen"];
	$_SESSION["provinciaDestino"] = $miReserva["provinciaDestino"]; 
	$_SESSION["ciudadDestino"] = $miReserva["ciudadDestino"];
	$_SESSION["precioCategoria"] = $miReserva["precioCategoria"];
	$_SESSION["fechaVuelo"] = $miReserva["fechaVuelo"];
	$_SESSION["horarioPartida"] = $miReserva["horarioPartida"];
	$_SESSION["estadoNombre"] = $miReserva["estadoNombre"];

	// die();
	header("location: miReserva.php");
 }

?>