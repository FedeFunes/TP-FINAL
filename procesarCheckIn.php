<?php
session_start();
include("conectarBaseDeDatos.php");

$asiento = $_POST['asiento'];
$asientoArray = explode("-",$asiento); // http://www.w3schools.com/php/func_string_explode.asp

$fila = $asientoArray['0'];
$columna = $asientoArray['1'];

$_SESSION['fila'] = $fila; 
$_SESSION['columna'] = $columna; 

$sql = "INSERT INTO asientos (fila, columna, cod_reserva)
VALUES ($fila, $columna, ".$_SESSION['idReserva'].")";

mysqli_query($conexion, $sql);

?>