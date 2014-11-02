<?php

include("conectarBaseDeDatos.php");

// CÓMO CONSULTAR EN buscarVuelos.php

$tipoViaje = $_POST["tipoViaje"]; // este dato solo nos interesa para tabla "reservas"

// Nota: las provincias y las ciudades contienen los número de id, no el nombre de estás

$provinciaOrigen = $_POST["provinciaOrigen"];

$ciudadOrigen = $_POST["ciudadOrigen"];

$provinciaDestino = $_POST["provinciaDestino"];

$ciudadOrigen = $_POST["ciudadOrigen"];

$fechaIda = $_POST["fechaIda"];
$date = date_create_from_format("d-m-Y",$fechaIda); // crea un object datetime de $fecha_ida y le indico el formato de $fecha_ida 
$diaIda = date_format($date,"l"); // obtiene el nombre del día de la fecha PERO lo obtiene en inglés

$fechaVuelta = $_POST["fechaVuelta"];
$date = date_create_from_format("d-m-Y",$fechaVuelta);  
$diaVuelta = date_format($date,"l");


primera consulta

Qué tablas necesito?

"programacionvuelos", "aeropuertos"

busca en tabla programacionvuelos con los atributos ,
si la busqueda no concuerda, vueloNodisponible.php. 
si la busqueda concuerda, mostramos reservar.php


switch ($diaIda) {
	case 'Sunday':
		$vuelo_dia = "vuelo_domingo";
 		break;
	// así con todos los días...
	default:
		break;
}

// $ciudadOrigen y $ciudadDestino van a retornar el cod_aeropuerto pertenecientes a estas ciudades
// todavia no lo modifique en el codigo aclaro.

$query = "SELECT * 
FROM programacionvuelos
WHERE cod_aeropuerto_origen = $ciudadOrigen 
AND cod_aeropuerto_destino = $ciudadDestino
AND $vuelo_dia = 1";

"SELECT * 
FROM programacionvuelos
WHERE cod_aeropuerto_origen = $ciudadOrigen 
AND cod_aeropuerto_destino = $ciudadDestino
AND $vuelo_dia = 1";"SELECT * 
FROM programacionvuelos
WHERE cod_aeropuerto_origen = $ciudadOrigen 
AND cod_aeropuerto_destino = $ciudadDestino
AND $vuelo_dia = 1";

$result = mysqli_query($conexion,$query);

if(mysqli_fetch_array($result) == null) {
	// redirecciono a vueloNoEncontrado.php y le decimos que no existe vuelo que concuerde con la busqueda 
	// y linkeamos vuelos.php
} 

if(mysqli_fetch_array($result) != null) {
	
	// si existe el vuelo en nuestra programación de vuelos ahora lo que tengo hacer es 
	// vericar si ya existe este vuelo en la tabla "vuelos" en esa "fecha de partida" y si existe, averiguar en la tabla "reservas"
	// cuantas reservas hechas tiene en las distintas categorías, para saber la disponibilidad de estas
	// para la categoría en la que quiere viajar el usuario. Si se da el caso en que puede quedar en lista de espera
	// le avisamos al usuario en reservar.php que si va realizar la reserva, va a quedar en lista de esperar. 
	// Y si ni siquiera puede quedar en lista de espera -> vueloNoDisponible.php y informamos el porque.

	$query = "SELECT * FROM programacionvuelos
	INNER JOIN vuelos
	ON programacionvuelos.idProgramacionVuelo = vuelos.cod_programacion_vuelo
	WHERE fecha = $fecha" ;

}

?>


