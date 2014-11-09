<?php
session_start();
include("conectarBaseDeDatos.php");

$nroReserva = $_POST["nroReserva"];
$_SESSION["nroReserva"] = $nroReserva;

$query = "SELECT * FROM reservas 
WHERE idReserva = $nroReserva";

$result = mysqli_query($conexion,$query);
$cantDeFilasDevueltas = mysqli_num_rows($result);

if ($cantDeFilasDevueltas == 0) {
	// header("location: reservaNoEncontrada.php"); 	
 } else {
 	// header("location: miReserva.php");
 }

// header("location: .php");
?>