<?php
session_start();
include("conectarBaseDeDatos.php");

// CÓMO CONSULTAR EN buscarVuelos.php //

$tipoViaje = $_POST["tipoViaje"]; 

$categoria = $_POST["categoria"];
// Nota: Las provincias y las ciudades contienen los id, no el nombre de éstas
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


#Guardo las variables en la session
$_SESSION["tipoViaje"] = $tipoViaje;
$_SESSION["categoria"] = $categoria;
$_SESSION["provinciaOrigen"] = $provinciaOrigen;
$_SESSION["ciudadOrigen"] = $ciudadOrigen; 
$_SESSION["provinciaDestino"] = $provinciaDestino;
$_SESSION["ciudadOrigen"] = $ciudadOrigen;

switch ($diaIda) {
	case 'Sunday':
		$vuelo_dia = "vuelo_domingo";
 		break;
 	case 'Monday':
		$vuelo_dia = "vuelo_lunes";
 		break;
 	case 'Tuesday':
		$vuelo_dia = "vuelo_martes";
 		break;
 	case 'Wednesday':
		$vuelo_dia = "vuelo_miercoles";
 		break;
 	case 'Thursday':
		$vuelo_dia = "vuelo_jueves";
 		break;
 	case 'Friday':
		$vuelo_dia = "vuelo_viernes";
 		break;
 	case 'Saturday':
		$vuelo_dia = "vuelo_sabado";
 		break;
}

$query = "SELECT * 
FROM cieloytierra.programacionvuelos 
WHERE (cod_aeropuerto_origen = $ciudadOrigen
AND cod_aeropuerto_destino = $ciudadDestino)
AND vuelo_dia = 1";

$result = mysqli_query($conexion,$query);

# $_SESSION["resultadoBuscarVuelo"] va a ser la variable donde guarde los msjs de error o aviso que voy a
// mostrar en vueloNoDisponible.php o en reservar.php en caso de que haya avisar que queda en tiempo de espera si 
// realiza la reserva
# vueloNodisponible.php también va tener un link a grilla-vuelo.php, x ej: "Revise nuestra <a>grilla de vuelos</a>".

if ($row = mysqli_fetch_array($result) == null) { /* no existe este recorrido con $fechaIda */
	$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha $fechaIda.";
	header("location: vueloNoDisponible.php"); // redirecciono a vueloNoDisponible.php y muestro el msj de arriba;
}

if ($rowProgramacionVuelos = mysqli_fetch_array($result) != null) { /* existe este recorrido con $fechaIda */
	
	$query = "SELECT * FROM cieloytierra.vuelos 
	WHERE cod_programacion_vuelo = $rowProgramacionVuelos['idProgramacionVuelo']
	AND fecha_vuelo = $fechaIda";

	$result = mysqli_query($conexion,$query);

	if ($row = mysqli_fetch_array($result) != null) {	/* existe en la base de datos (tabla-vuelos) algun vuelo con este recorrido y con %fechaIda */
		
		$query = "SELECT * FROM cieloytierra.reservas  
		WHERE cod_vuelo = $row['idVuelo']
		AND fecha_vuelo = $fechaIda";

		$result = mysqli_query($conexion,$query);

		while($row = mysqli_fetch_array($result)) {
			$contador++;
		}

		$query = "SELECT $categoria FROM cieloytierra.programacionvuelos
		INNER JOIN cieloytierra.aviones
		ON programacionvuelos.cod_avion = aviones.idAvion
		WHERE idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo']";

		$row = mysqli_fetch_array($result);

		$limiteDeReservas = $row['$categoria'] + 10;

		if ($contador > $limiteDeReservas) { /* no hay cupo en la categoria que quiere viajar el usuario */
			$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha $fechaIda";
			header("location: vueloNoDisponible.php");
		}
		
		if ($contador > $row['$categoria'] && $contador < $limiteDeReservas) { /* va a quedar en lista de espera si realiza la reserva */
			$_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con $fechaIda si realiza la reserva"
			// muestro este msj en reservar.php						
		}
	} 
}

# MISMO PROCEDIMIENTO EN CASO DE QUE SEA IDA-VUELTA EL VIAJE

if($tipoViaje = "idaVuelta") {

	switch ($diaVuelta) {
		case 'Sunday':
			$vuelo_dia = "vuelo_domingo";
	 		break;
	 	case 'Monday':
			$vuelo_dia = "vuelo_lunes";
	 		break;
	 	case 'Tuesday':
			$vuelo_dia = "vuelo_martes";
	 		break;
	 	case 'Wednesday':
			$vuelo_dia = "vuelo_miercoles";
	 		break;
	 	case 'Thursday':
			$vuelo_dia = "vuelo_jueves";
	 		break;
	 	case 'Friday':
			$vuelo_dia = "vuelo_viernes";
	 		break;
	 	case 'Saturday':
			$vuelo_dia = "vuelo_sabado";
	 		break;
	}

	// $ciudadOrigen y $ciudadDestino van a retornar el cod_aeropuerto pertenecientes a estas ciudades
	// todavia no lo modifique en el codigo aclaro.

	$query = "SELECT * 
	FROM 
	WHERE cod_aeropuerto_origen = $ciudadOrigen 
	AND cod_aeropuerto_destino = $ciudadDestino
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
 
			if (/* no hay cupo en la categoria que quiere viajar el usuario */) {
				// $_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha $fechaVuelta";
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
	// cuantas reservas hechas tiene en las distintas categorias, para saber la disponibilidad de estas
	// para la categoria en la que quiere viajar el usuario. Si se da el caso en que puede quedar en lista de espera
	// le avisamos al usuario en reservar.php que si va realizar la reserva, va a quedar en lista de esperar. 
	// Y si ni siquiera puede quedar en lista de espera -> vueloNoDisponible.php y informamos el porque.

/*	$query = "SELECT * FROM programacionvuelos
	INNER JOIN vuelos
	ON programacionvuelos.idProgramacionVuelo = vuelos.cod_programacion_vuelo
	WHERE fecha = $fecha" ;*/

}

?>

