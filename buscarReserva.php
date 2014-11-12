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
 	$_SESSION["categoria"] = $reserva["categoria"];
 	$_SESSION["nroReserva"] = $nroReserva;
 	header("location: miReserva.php");
 }

?>