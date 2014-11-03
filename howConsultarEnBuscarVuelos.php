<?php
session_start();
include("conectarBaseDeDatos.php");

$tipoViaje = $_POST["tipoViaje"]; 
$provinciaOrigen = $_POST["provinciaOrigen"];
$ciudadOrigen = $_POST["ciudadOrigen"];
$provinciaDestino = $_POST["provinciaDestino"];
$ciudadDestino = $_POST["ciudadDestino"];
$categoria = $_POST["categoria"];

$fechaIda = $_POST["fechaIda"];
$date = date_create($fechaIda); // retorna un DateTime object de la fecha que le pasé
$diaIda = date_format($date,"l"); // me devuelve el nombre del día de la fecha que le pasé pero en ingles

$fechaVuelta = $_POST["fechaVuelta"];
$date = date_create($fechaVuelta);  
$diaVuelta = date_format($date,"l");

// guardo los datos en la session 
$_SESSION["tipoViaje"] = $tipoViaje;
$_SESSION["categoria"] = $categoria;
$_SESSION["provinciaOrigen"] = $provinciaOrigen;
$_SESSION["ciudadOrigen"] = $ciudadOrigen; 
$_SESSION["provinciaDestino"] = $provinciaDestino;
$_SESSION["ciudadDestino"] = $ciudadDestino;
$_SESSION["fechaIda"] = $fechaIda;
$_SESSION["fechaVuelta"] = $fechaVuelta;

// según $diaIda creo la variable $vuelo_dia para usarla en la consulta posterior
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

// Consulto en la tabla-programacionvuelos si existe el recorrido ($ciudadOrigen-$ciudadDestino) con $fechaIda
$query = "SELECT * FROM cieloytierra.programacionvuelos 
WHERE (cod_aeropuerto_origen = $ciudadOrigen
AND cod_aeropuerto_destino = $ciudadDestino)
AND $vuelo_dia = 1";

$result = mysqli_query($conexion,$query);
$rowProgramacionVuelos = mysqli_fetch_array($result);

if ( $rowProgramacionVuelos == null) { // en caso de que no exista 
	
	$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha $fechaIda.";
	header("location: vueloNoDisponible.php"); 

} else { // si existe 
		
	$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo']; 
	
	// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaIda
	$query = "SELECT * FROM cieloytierra.vuelos 
	WHERE cod_programacion_vuelo = $idProgramacionVuelo
	AND fecha_vuelo = '$fechaIda'";

	$result = mysqli_query($conexion,$query);
	$rowVuelos = mysqli_fetch_array($result);

	if ($rowVuelos != null) { // si existe  
		
		$idVuelo = $rowVuelos['idVuelo'];
		
		// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este según la categoría que eligió el usuario
		$query = "SELECT $categoria FROM cieloytierra.reservas 
		WHERE cod_vuelo = $idVuelo"; //	ERROR NO EXISTE LA COLUMNA RESERVA-RESERVA

		$result = mysqli_query($conexion,$query);
		$rowReservas = mysqli_fetch_array($result);

		if ($rowReservas != null) { 

			$cantidadDeReservasHechas = 0; // inicializo el contador

			// Cuento la cantidad de reservas hechas
			while($rowReservas = mysqli_fetch_array($result)) { // con while($rowReservas) no funciona
				$cantidadDeReservasHechas++;
			}

			$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo'];
			
			// Consulto cuál es el limite de reservas de esa categoría
			$query = "SELECT $categoria FROM cieloytierra.programacionvuelos
			INNER JOIN cieloytierra.aviones
			ON programacionvuelos.cod_avion = aviones.idAvion
			WHERE idProgramacionVuelo = $idProgramacionVuelo";

			$result = mysqli_query($conexion,$query);
			$rowLimiteDeReservas = mysqli_fetch_array($result);

			$limiteDeReservasMasListaDeEspera = $rowLimiteDeReservas[0] + 10;
			
			if ($cantidadDeReservasHechas >= $rowLimiteDeReservas[0] && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
				echo $_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con $fechaIda si realiza la reserva";					
			}

			if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
				$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha $fechaIda";
				header("location: vueloNoDisponible.php");
			}
		}	
	}
}

if($tipoViaje = "idaVuelta") {

	// según $diaIda creo la variable $vuelo_dia para usarla en la consulta posterior
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

	$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo']; 
	
	// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaVuelta
	$query = "SELECT * FROM cieloytierra.vuelos 
	WHERE cod_programacion_vuelo = $idProgramacionVuelo
	AND fecha_vuelo = '$fechaVuelta'";

	$result = mysqli_query($conexion,$query);
	$rowVuelos = mysqli_fetch_array($result);

	if ($rowVuelos != null) { // si existe  
		
		$idVuelo = $rowVuelos['idVuelo'];
		
		// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este para la categoría que eligió el usuario
		$query = "SELECT $categoria FROM cieloytierra.reservas 
		WHERE cod_vuelo = $idVuelo"; //	ERROR NO EXISTE LA COLUMNA RESERVA-RESERVA

		$result = mysqli_query($conexion,$query);
		$rowReservas = mysqli_fetch_array($result);

		if ($rowReservas != null) { 

			$cantidadDeReservasHechas = 0; // inicializo el contador

			// Cuento la cantidad de reservas hechas
			while($rowReservas = mysqli_fetch_array($result)) { // con while($rowReservas) no funciona
				$cantidadDeReservasHechas++;
			}

			$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo'];
			
			// Consulto cuál es el limite de reservas de esa categoría
			$query = "SELECT $categoria FROM cieloytierra.programacionvuelos
			INNER JOIN cieloytierra.aviones
			ON programacionvuelos.cod_avion = aviones.idAvion
			WHERE idProgramacionVuelo = $idProgramacionVuelo";

			$result = mysqli_query($conexion,$query);
			$rowLimiteDeReservas = mysqli_fetch_array($result);

			$limiteDeReservasMasListaDeEspera = $rowLimiteDeReservas[0] + 10;
			
			if ($cantidadDeReservasHechas >= $rowLimiteDeReservas[0] && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
				echo $_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con $fechaVuelta si realiza la reserva";					
			}

			if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
				$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha $fechaVuelta";
				header("location: vueloNoDisponible.php");
			}
		}	
	}
}

header("location: reservar.php");

?>