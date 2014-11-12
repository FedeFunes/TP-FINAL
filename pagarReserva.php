<?php
session_start();
include("conectarBaseDeDatos.php"); 

$sql = "UPDATE reservas SET estado='pendiente de check-in' WHERE idReserva=".$_SESSION["nroReserva"].";";
mysqli_query($conexion, $sql);

header("location: resultadoPagarReserva.php");
?>