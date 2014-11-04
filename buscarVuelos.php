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
$_SESSION["fechaIda"] = $fechaIda;
$_SESSION["fechaVuelta"] = $fechaVuelta;

//variables no seteadas que pueden ser utilizadas reservarVuelo.php
$_SESSION["idProgramacionVuelo"] = null;
$_SESSION["idVueloIda"] = null;
$_SESSION["idVueloVuelta"] = null;
// 2 posibles estados: lista de espera/reserva
$_SESSION["estadoVueloIda"] = null; 
$_SESSION["estadoVueloVuelta"] = null; 


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

if (mysqli_num_rows($result) == 0) { // en caso de que no exista 
	
	echo "</br> if: == 0 header a vueloNoDisponible.php"; // prueba
	$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha ida: $fechaIda.";
	// header("location: vueloNoDisponible.php"); 

} else { // si existe 
		
	$rowProgramacionVuelos = mysqli_fetch_array($result);
	$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo']; // uso esta variable para realizar la consulta que sigue
	$_SESSION["idProgramacionVuelo"] = $rowProgramacionVuelos['idProgramacionVuelo']; // guardo el id en la session
	
	echo "</br> else: != 0"; // prueba

	// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaIda
	$query = "SELECT * FROM cieloytierra.vuelos 
	WHERE (cod_programacion_vuelo = $idProgramacionVuelo
	AND fecha_vuelo = '$fechaIda')
	AND tipo_viaje = 'ida'"; 

	$result = mysqli_query($conexion,$query);

	if (mysqli_num_rows($result) != 0) { // si existe  
		
		echo "</br> else: != 0"; // prueba
		
		$rowVuelos = mysqli_fetch_array($result); 	

		$idVuelo = $rowVuelos['idVuelo']; // uso esta variable para realizar la consulta que sigue
		$_SESSION["idVueloIda"] = $rowVuelos['idVuelo']; // guardo el id en la session

		// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este para la categoría que eligió el usuario
		$query = "SELECT * FROM cieloytierra.reservas 
		WHERE cod_vuelo = $idVuelo
		AND categoria = '$categoria'"; 

		$result = mysqli_query($conexion,$query);
		$rowReservas = mysqli_fetch_array($result);

		if (mysqli_num_rows($result) != 0) {
			
			echo "</br> else: != 0"; // prueba						
			
			$cantidadDeReservasHechas = mysqli_num_rows($result);

			// Consulto cuál es el limite de reservas en esa categoría en el avión que va a realizar el vuelo
			$query = "SELECT $categoria FROM cieloytierra.programacionvuelos
			INNER JOIN cieloytierra.aviones
			ON programacionvuelos.cod_avion = aviones.idAvion
			WHERE idProgramacionVuelo = $idProgramacionVuelo";

			$result = mysqli_query($conexion,$query);
			$rowLimiteDeReservas = mysqli_fetch_array($result);

			$limiteDeReservasMasListaDeEspera = $rowLimiteDeReservas[0] + 10; // limite de reservas más la cantidad de reservas que pueden quedar en lista de espera
			
			if ($cantidadDeReservasHechas < $rowLimiteDeReservas[0]) {
				echo $_SESSION["resultadoBuscarVuelo"] = "Vuelo/s Disponible/s";
			}
			
			if ($cantidadDeReservasHechas >= $rowLimiteDeReservas[0] && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
				echo $_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con fecha ida: $fechaIda si realiza la reserva";					
				$_SESSION["estadoVueloIda"] = "lista de espera";
			} 

			if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
				echo $_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha ida: $fechaIda";
				// header("location: vueloNoDisponible.php");
			}
		}
	}	
}


if($tipoViaje = "idaVuelta") {

	// según $diaVuelta creo la variable $vuelo_dia para usarla en la consulta posterior
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


	// Consulto en la tabla-programacionvuelos si existe el recorrido ($ciudadOrigen-$ciudadDestino) con $fechaIda
	$query = "SELECT * FROM cieloytierra.programacionvuelos 
	WHERE (cod_aeropuerto_origen = $ciudadOrigen
	AND cod_aeropuerto_destino = $ciudadDestino)
	AND $vuelo_dia = 1";

	$result = mysqli_query($conexion,$query);

	if (mysqli_num_rows($result) == 0) { // en caso de que no exista 
		
		echo "</br> if: == 0 header a vueloNoDisponible.php";
		$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha vuelta: $fechaVuelta";
		// header("location: vueloNoDisponible.php"); 

	} else { // si existe 
			
		$rowProgramacionVuelos = mysqli_fetch_array($result);
		$idProgramacionVuelo = $rowProgramacionVuelos['idProgramacionVuelo']; // uso esta variable para realizar la consulta que sigue
		
		echo "</br> else: != 0"; // prueba

		// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaVuelta
		$query = "SELECT * FROM cieloytierra.vuelos 
		WHERE (cod_programacion_vuelo = $idProgramacionVuelo
		AND fecha_vuelo = '$fechaIda')
		AND tipo_viaje = 'ida'"; 

		$result = mysqli_query($conexion,$query);

		if (mysqli_num_rows($result) != 0) { // si existe  
			
			echo "</br> else: != 0"; // prueba
			
			$rowVuelos = mysqli_fetch_array($result); 	

			$idVuelo = $rowVuelos['idVuelo']; // uso esta variable para realizar la consulta que sigue
			$_SESSION["idVueloVuelta"] = $rowVuelos['idVuelo']; // guardo el id en la session

			// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este para la categoría que eligió el usuario
			$query = "SELECT * FROM cieloytierra.reservas 
			WHERE cod_vuelo = $idVuelo
			AND categoria = '$categoria'"; 

			$result = mysqli_query($conexion,$query);
			$rowReservas = mysqli_fetch_array($result);

			if (mysqli_num_rows($result) != 0) {
				
				echo "</br> else: != 0"; // prueba						
				
				$cantidadDeReservasHechas = mysqli_num_rows($result);

				// Consulto cuál es el limite de reservas en esa categoría en el avión que va a realizar el vuelo
				$query = "SELECT $categoria FROM cieloytierra.programacionvuelos
				INNER JOIN cieloytierra.aviones
				ON programacionvuelos.cod_avion = aviones.idAvion
				WHERE idProgramacionVuelo = $idProgramacionVuelo";

				$result = mysqli_query($conexion,$query);
				$rowLimiteDeReservas = mysqli_fetch_array($result);

				$limiteDeReservasMasListaDeEspera = $rowLimiteDeReservas[0] + 10; // limite de reservas más la cantidad de reservas que pueden quedar en lista de espera
				
				if ($cantidadDeReservasHechas < $rowLimiteDeReservas[0]) {
					echo $_SESSION["resultadoBuscarVuelo"] = "Vuelo/s Disponible/s";
				}
				
				if ($cantidadDeReservasHechas >= $rowLimiteDeReservas[0] && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
					echo $_SESSION["resultadoBuscarVuelo"] = "Va a quedar en lista de espera en el recorrido con fecha ida: $fechaIda si realiza la reserva";					
					$_SESSION["estadoVueloVuelta"] = "lista de espera";
				} 

				if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
					echo $_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar el usuario con fecha ida: $fechaIda";
					// header("location: vueloNoDisponible.php");
				}
			}
		}	
	}
}

$_SESSION["estado"]	= "reserva";		
// header("location: reservar.php");
?>