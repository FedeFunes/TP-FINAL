b<?php
session_start();
include("conectarBaseDeDatos.php");

$nroReserva = $_POST["nroReserva"];

$query = "SELECT * FROM reservas 
WHERE idReserva = $nroReserva";

$result = mysqli_query($conexion,$query);
$cantDeFilasDevueltas = mysqli_num_rows($result);

if ($cantDeFilasDevueltas == 0) {
	// header("location: reservaNoEncontrada.php"); 	
 } else {
 	$_SESSION["nroReserva"] = $nroReserva;
 	// header("location: miReserva.php");
 }

// header("location: .php");
?>