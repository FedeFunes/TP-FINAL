<?php

$tipoViaje = $_POST["tipoViaje"];

$provinciaOrigen = $_POST["provinciaOrigen"];

$ciudadOrigen = $_POST["ciudadOrigen"];

$provinciaDestino = $_POST["provinciaDestino"];

$ciudadOrigen = $_POST["ciudadOrigen"];

$fechaIda = $_POST["fechaIda"];
$date = date_create_from_format("d-m-Y",$fechaIda); // crea un object datetime de $fecha_ida y le indico el formato de $fecha_ida 
$diaIda = date_format($date,"l"); // obtiene el nombre del día de la fecha PERO lo obtiene en inglés
echo $diaIda; // para que vean

$fechaVuelta = $_POST["fechaVuelta"];
$date = date_create_from_format("d-m-Y",$fechaVuelta);  
$diaVuelta = date_format($date,"l");
echo $diaVuelta; // para que vean


?>
