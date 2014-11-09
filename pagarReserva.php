<?php
session_start();
include("conectarBaseDeDatos.php");

$nroReserva = $_SESSION["nroReserva"]; 

$sql = "UPDATE reservas SET estado='pagada' WHERE id=$nroReserva";
mysqli_query($conn, $sql);

// redirecciona a la pagina que va a crear el pdf
// header(""); 
?>