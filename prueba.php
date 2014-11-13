<?php
session_start();
include("conectarBaseDeDatos.php");

for ($x=1; $x<=8; $x++) {
	$sql = "INSERT INTO reservas (cod_vuelo, categoria)
	VALUES (8, 'primera')";

	mysqli_query($conexion, $sql);
} 
?>