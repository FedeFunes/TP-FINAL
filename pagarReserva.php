<?php
session_start();
include("conectarBaseDeDatos.php"); 

$sql = "UPDATE reservas SET estado = 2 WHERE idReserva = ".$_SESSION["idReserva"].";"; // estado = 2 es el id de "Pendiente de Check-In" 
mysqli_query($conexion, $sql);

header("location: resultadoPagarReserva.php");
?>