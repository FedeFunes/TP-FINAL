<?php
session_start();
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

$_SESSION["tipoViaje"] = $tipoViaje;
$_SESSION["provinciaOrigen"] = $provinciaOrigen;
$_SESSION["ciudadOrigen"] = $ciudadOrigen; 
$_SESSION["provinciaDestino"] = $provinciaDestino;
$_SESSION["ciudadOrigen"] = $ciudadOrigen;

/*
primera consulta

Qué tablas necesito?

"programacionvuelos" y "aereopuertos"

busca en tabla programacionvuelos con los atributos ,
si la busqueda no concuerda, vueloNodisponible.php. 
si la busqueda concuerda, mostramos reservar.php
que pasa si el vuelo encontrado, 
*/

switch ($diaIda) {
	case 'Sunday':
		$vuelo_dia = "vuelo_domingo";
 		break;
	// así con todos los días
	default:
		# code...
		break;
}

// $ciudadOrigen y $ciudadDestino van a retornar el cod_aeropuerto pertenecientes a estas ciudades
// todavia no lo modifique en el codigo aclaro.

$query = "SELECT * 
FROM programacionvuelos
WHERE cod_aereopuerto_origen = $ciudadOrigen 
AND cod_aereopuerto_destino = $ciudadDestino
AND $vuelo_dia = 1";

$result = mysqli_query($conexion,$query);

# $_SESSION["resultadoBuscarVuelo"] va a ser la variable donde guarde los msjs de error o aviso que voy 
// en vueloNoDisponible.php o reservar.php en caso de que haya avisar que queda en tiempo de espera si 
// realiza la reserva
# vueloNodisponible.php también va tener un link a grilla-vuelo.php, x ej: "Revise nuestra <a>grilla de vuelos</a>".

if (mysqli_fetch_array($result) == null /* no existe este recorrido con $fechaIda */) {
	// $_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha $fechaIda.";
	// redirecciono a vueloNoDisponible.php y muestro el msj de arriba;
}

if (mysqli_fetch_array($result) != null /* existe este recorrido con $fechaIda */) {
	
	// consultas sql para responder el if de abajo

	if (/* existe en la base de datos (tabla-vuelos) algun vuelo con este recorrido y con %fechaIda */) {	
		
		// consultas sql para responder el if de abajo
 
		if (/* no hay cupo en la categoría que quiere viajar el usuario */) {
			// $_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoría que quiere viajar el usuario con fecha $fechaIda";
			// redirecciono a vueloNoDisponible.php
		}
		
		if (/* va a quedar en lista de espera si realiza la reserva */) {
			// $_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con $fechaIda si realiza la reserva"
			// muestro este msj en reservar.php						
		}
	} 
}

# MISMO PROCEDIMIENTO EN CASO DE QUE EXISTA IDA-VUELTA

if($tipoViaje = "idaVuelta") {

	switch ($diaVuelta) {
		case 'Sunday':
			$vuelo_dia = "vuelo_domingo";
	 		break;

		// así con todos los días

		default:
			# code...
			break;
	}

	// $ciudadOrigen y $ciudadDestino van a retornar el cod_aeropuerto pertenecientes a estas ciudades
	// todavia no lo modifique en el codigo aclaro.

	$query = "SELECT * 
	FROM programacionvuelos
	WHERE cod_aereopuerto_origen = $ciudadOrigen 
	AND cod_aereopuerto_destino = $ciudadDestino
	AND $vuelo_dia = 1";

	$result = mysqli_query($conexion,$query);
	
	if (mysqli_fetch_array($result) == null /* no existe este recorrido con $fechaVuelta */) {
	// $_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha $fechaVuelta.";
	// redirecciono a vueloNoDisponible.php y muestro el msj de arriba;
	}

	if (mysqli_fetch_array($result) != null /* existe este recorrido con $fechaVuelta */) {
	
	// consultas sql para responder el if de abajo

		if (/* existe en la base de datos (tabla-vuelos) algun vuelo con este recorrido y con $fechaVuelta */) {	
		
			// consultas sql para responder el if de abajo
 
			if (/* no hay cupo en la categoría que quiere viajar el usuario */) {
				// $_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoría que quiere viajar el usuario con fecha $fechaVuelta";
				// redirecciono a vueloNoDisponible.php
			}
			
			if (/* va a quedar en lista de espera si realiza la reserva */) {
				// $_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con $fechaVuelta si realiza la reserva"
				// muestro este msj en reservar.php						
			}
		} 
	}
}

// Redirecciono a reservar.php

#########################################################################################################################################

if(mysqli_fetch_array($result) == null) {
	// redirecciono a vueloNoEncontrado.php y le decimos que no existe vuelo que concuerde con la busqueda 
	// y linkeamos vuelos.php
} 

if(mysqli_fetch_array($result) != null) {
	
	// si existe el vuelo en nuestra programación de vuelos ahora lo que tengo hacer es 
	// vericar si ya existe este vuelo en la tabla "vuelos" y si existe, averiguar en la tabla "reservas"
	// cuantas reservas hechas tiene en las distintas categorías, para saber la disponibilidad de estas
	// para la categoría en la que quiere viajar el usuario. Si se da el caso en que puede quedar en lista de espera
	// le avisamos al usuario en reservar.php que si va realizar la reserva, va a quedar en lista de esperar. 
	// Y si ni siquiera puede quedar en lista de espera -> vueloNoDisponible.php y informamos el porque.

/*	$query = "SELECT * FROM programacionvuelos
	INNER JOIN vuelos
	ON programacionvuelos.idProgramacionVuelo = vuelos.cod_programacion_vuelo
	WHERE fecha = $fecha" ;*/

}

?>

