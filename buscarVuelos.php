<?php
session_start();
include("conectarBaseDeDatos.php");

//obtengo los datos del formulario
$tipoViaje = $_POST["tipoViaje"]; 
$provinciaOrigen = $_POST["provinciaOrigen"]; // recibe el id de la provincia
$ciudadOrigen = $_POST["ciudadOrigen"]; // recibe el id del aeropuerto que esta en esa ciudad
$provinciaDestino = $_POST["provinciaDestino"]; // idem
$ciudadDestino = $_POST["ciudadDestino"]; // idem
$categoria = $_POST["categoria"]; // recibe el id de la categoría

$fechaIda = $_POST["fechaIda"];
$date = date_create($fechaIda); // retorna un DateTime object de la fecha que le pasé así puedo usar la siguiente función
$diaIda = date_format($date,"l"); // me devuelve el nombre del día de la fecha que le pasé pero en ingles

$fechaVuelta = $_POST["fechaVuelta"];
$date = date_create($fechaVuelta);  // idem
$diaVuelta = date_format($date,"l"); // idem


// guardo los datos que puedo necesitar en la session 
$_SESSION["provinciaOrigen"] = $provinciaOrigen;
$_SESSION["ciudadOrigen"] = $ciudadOrigen;
$_SESSION["provinciaDestino"] = $provinciaDestino;
$_SESSION["ciudadDestino"] = $ciudadDestino;
$_SESSION["tipoViaje"] = $tipoViaje;
$_SESSION["categoria"] = $categoria;
$_SESSION["fechaIda"] = $fechaIda;
$_SESSION["fechaVuelta"] = $fechaVuelta;

// variables no seteadas que puedo necesitar en reservarVuelo.php
$_SESSION["idProgramacionVuelo"] = null;
$_SESSION["idVueloIda"] = null;
$_SESSION["idVueloVuelta"] = null;
	// 2 posibles estados: lista de espera/reserva
$_SESSION["estadoVueloIda"] = null; 
$_SESSION["estadoVueloVuelta"] = null; 

// según el id de la categoría, creo y le seteo el nombre de la categoría en cuestión a $categoriaNombre
switch ($categoria) {
	case '1':
		$categoriaNombre = "primera";
		$_SESSION["categoriaNombre"] = "Primera"; 
 		break;
 	case '2':
		$categoriaNombre = "economy";
		$_SESSION["categoriaNombre"] = "Economy"; 
 		break;
 }

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
// y si en el avion que realiza el vuelo existe esa $categoriaNombre
$query = "SELECT * FROM programacionvuelos
INNER JOIN aviones
ON programacionvuelos.cod_avion = aviones.idAvion
WHERE cod_aeropuerto_origen = $ciudadOrigen
AND cod_aeropuerto_destino = $ciudadDestino
AND $vuelo_dia = 1
AND $categoriaNombre != 0;";


$result = mysqli_query($conexion,$query);
// mysqli_num_rows() retorna el número de filas que devuelve la consulta
$cantDeFilasDevueltas = mysqli_num_rows($result); 

if ($cantDeFilasDevueltas == 0) { // en caso de que no exista 

	$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha ida: $fechaIda o no existe la categoria que eligió en el avión que realiza este vuelo.";
	header("location: vueloNoDisponible.php"); 
	die(); // Corto la ejecución del php

} else { // si existe 
			
	$rowProgramacionVuelos = mysqli_fetch_array($result);
	
	// guardo el id en la session 
	$_SESSION["idProgramacionVuelo"] = $rowProgramacionVuelos['idProgramacionVuelo'];  

	// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaIda
	$query = "SELECT * FROM vuelos 
	WHERE (cod_programacion_vuelo = ".$rowProgramacionVuelos['idProgramacionVuelo']."
	AND fecha_vuelo = '$fechaIda')
	AND tipo_viaje = 1;"; // tipo_viaje = ida 

	$result = mysqli_query($conexion,$query);
	$cantDeFilasDevueltas = mysqli_num_rows($result); 

	if ($cantDeFilasDevueltas != 0) { // si existe  
				
		$rowVuelos = mysqli_fetch_array($result); 	

		// guardo el id en la session
		$_SESSION["idVueloIda"] = $rowVuelos['idVuelo'];  

		// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este para la categoría que eligió el usuario
		$query = "SELECT * FROM reservas 
		WHERE cod_vuelo = ".$rowVuelos['idVuelo']."
		AND categoria = '$categoria';"; 

		$result = mysqli_query($conexion,$query);					
		
		$cantidadDeReservasHechas = mysqli_num_rows($result);

		// Consulto cuál es el limite de reservas en esa categoría en el avión que va a realizar el vuelo
		$query = "SELECT $categoriaNombre FROM programacionvuelos
		INNER JOIN aviones
		ON programacionvuelos.cod_avion = aviones.idAvion
		WHERE idProgramacionVuelo = ".$rowProgramacionVuelos['idProgramacionVuelo'].";";

		$result = mysqli_query($conexion,$query);
		$rowLimiteDeReservas = mysqli_fetch_array($result);	
		$limiteDeReservas = $rowLimiteDeReservas[0];
			
		// limite de reservas más la cantidad de reservas que pueden quedar en lista de espera
		$limiteDeReservasMasListaDeEspera = $limiteDeReservas + 10; 
		
		// si la cantidad de reservas hechas supera el limite pero puede quedar en lista de espera
		if ($cantidadDeReservasHechas >= $limiteDeReservas && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
			$_SESSION["estadoVueloIda"] = 4; // 4 es el id de "En lista de espera"
		}

		// si la lista de espera esta llena 
		if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
			$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar en el recorrido con fecha ida: $fechaIda";
			header("location: vueloNoDisponible.php");
			die();
		}

		// esto nunca tiene que pasar
		if ($cantidadDeReservasHechas > $limiteDeReservasMasListaDeEspera) {
			die("Error: CantidadDeReservasHechas ($cantidadDeReservasHechas) > LimiteDeReservaMasListaDeEspera ($limiteDeReservasMasListaDeEspera)");
		}
	}	
}

if($_SESSION["estadoVueloIda"] == null) {
	$_SESSION["estadoVueloIda"] = 1; // 1 es el id de "Pendiente de Pago"	
} 


if($tipoViaje == "idaVuelta") {

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


	// Consulto en la tabla-programacionvuelos si existe el recorrido ($ciudadOrigen-$ciudadDestino) con $fechaVuelta 
	// y si en el avion que realiza el vuelo existe esa $categoriaNombre
	$query = "SELECT * FROM programacionvuelos
	INNER JOIN aviones
	ON programacionvuelos.cod_avion = aviones.idAvion
	WHERE cod_aeropuerto_origen = $ciudadOrigen
	AND cod_aeropuerto_destino = $ciudadDestino
	AND $vuelo_dia = 1
	AND $categoriaNombre != 0;";

	$result = mysqli_query($conexion,$query);
	// mysqli_num_rows() retorna el número de filas que devuelve la consulta
	$cantDeFilasDevueltas = mysqli_num_rows($result); 

	if ($cantDeFilasDevueltas == 0) { // en caso de que no exista 
			
		$_SESSION["resultadoBuscarVuelo"] = "No existe este recorrido con fecha vuelta: $fechaVuelta o no existe la categoria que eligió en el avión que realiza este vuelo.";
		header("location: vueloNoDisponible.php"); 
		die();

	} else { // si existe 
				
		$rowProgramacionVuelos = mysqli_fetch_array($result);
		
		// guardo el id en la session 
		$_SESSION["idProgramacionVuelo"] = $rowProgramacionVuelos['idProgramacionVuelo'];  

		// Consulto en la tabla-vuelos si ya existe un vuelo de este recorrido en esa $fechaIda
		$query = "SELECT * FROM vuelos 
		WHERE (cod_programacion_vuelo = ".$rowProgramacionVuelos['idProgramacionVuelo']."
		AND fecha_vuelo = '$fechaVuelta')
		AND tipo_viaje = 2;"; //tipo_viaje = vuelta 

		$result = mysqli_query($conexion,$query);
		$cantDeFilasDevueltas = mysqli_num_rows($result); 

		if ($cantDeFilasDevueltas != 0) { // si existe  
					
			$rowVuelos = mysqli_fetch_array($result); 	

			// guardo el id en la session
			$_SESSION["idVueloVuelta"] = $rowVuelos['idVuelo'];  

			// Consulto en la tabla-reservas por este vuelo para conocer el cupo de este para la categoría que eligió el usuario
			$query = "SELECT * FROM reservas 
			WHERE cod_vuelo = ".$rowVuelos['idVuelo']."
			AND categoria = '$categoria';"; 

			$result = mysqli_query($conexion,$query);		
			
			$cantidadDeReservasHechas = mysqli_num_rows($result);


			// Consulto cuál es el limite de reservas en esa categoría en el avión que va a realizar el vuelo
			$query = "SELECT $categoriaNombre FROM programacionvuelos
			INNER JOIN aviones
			ON programacionvuelos.cod_avion = aviones.idAvion
			WHERE idProgramacionVuelo = ".$rowProgramacionVuelos['idProgramacionVuelo'].";";

			$result = mysqli_query($conexion,$query);
			$rowLimiteDeReservas = mysqli_fetch_array($result);	
			$limiteDeReservas = $rowLimiteDeReservas[0];
				
			// limite de reservas más la cantidad de reservas que pueden quedar en lista de espera
			$limiteDeReservasMasListaDeEspera = $limiteDeReservas + 10; 
			
			// si la cantidad de reservas hechas supera el limite pero puede quedar en lista de espera
			if ($cantidadDeReservasHechas >= $limiteDeReservas && $cantidadDeReservasHechas < $limiteDeReservasMasListaDeEspera) { 
				$_SESSION["estadoVueloVuelta"] = 4; // 4 es el id de "En lista de espera"
			}

			// si la lista de espera esta llena 
			if ($cantidadDeReservasHechas == $limiteDeReservasMasListaDeEspera) { 
				$_SESSION["resultadoBuscarVuelo"] = "No hay cupo en la categoria que quiere viajar en el recorrido con fecha vuelta: $fechaVuelta";
				header("location: vueloNoDisponible.php");
				die();
			}

			// esto nunca tiene que pasar
			if ($cantidadDeReservasHechas > $limiteDeReservasMasListaDeEspera) {
				die("Error: CantidadDeReservasHechas ($cantidadDeReservasHechas) > LimiteDeReservaMasListaDeEspera ($limiteDeReservasMasListaDeEspera)");
			}
		}	
	}	

}

if($_SESSION["estadoVueloVuelta"] == null) {
	$_SESSION["estadoVueloVuelta"] = 1; // 1 es el id de "Pendiente de Pago"	
} 

header("location: reservar.php");
?>