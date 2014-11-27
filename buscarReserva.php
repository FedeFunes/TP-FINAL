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

	header("location: miReserva.php");
 }

?>