<?php
session_start();
include("conectarBaseDeDatos.php");

for ($x=1; $x<=30; $x++) {
	$sql = "INSERT INTO reservas (cod_vuelo, categoria, estado)
	VALUES (8, 'primera', 'pendiente de pago')";

	mysqli_query($conexion, $sql);
} 
?>